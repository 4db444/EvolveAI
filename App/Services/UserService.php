<?php
namespace App\Services;

use App\Repositories\Interfaces\UserRepositoryInterface;
use App\Models\User;

class UserService{
    private UserRepositoryInterface $userRepo;
    
    public function __construct(UserRepositoryInterface $userRepo){
        $this->userRepo = $userRepo;
    }

    public function register(string $fullname , string $email , string $password , string $confirmationPassword) : array{

        $errors=[];

        if (filter_var(trim($email), FILTER_VALIDATE_EMAIL)) $errors["email"] = "invalide email";

        if ($this->userRepo->findByEmail(trim($email))) $errors["email"] = "this email already existe";

        if (strlen($password) < 8 ) $errors["password"] = "the password must be at least 8 characters";

        if ( $password != $confirmationPassword ) $errors["password_confirmation"] = "those passwords are not comparable";
        
        if (!strlen(trim($fullname))) $errors["fullname"] = "full name is required ";


        if ($errors) return [
            "success" => false,
            "errors" => $errors
        ];

            
        $user = new User(null , $fullname , $email , $password);

        $this->userRepo->save($user);

        return [
            "success" => true,
        ];
    }

    public function login(string $email , string $password) : array{

        $user = $this->userRepo->findByEmail(trim($email));

        if ($user && $user->verifyPassword($password)) {
            return [
                "success" => true,
                "user" => $user
            ];
        }

        return [
            "success" => false,
            "message" => "Wrong Credentials !"
        ];
    }
}