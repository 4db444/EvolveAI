<?php
namespace App\Services;
use App\Repositories\UserRepository;
use App\Repositories\Interfaces\UserRepositoryInterface;
use App\Models\User;
class UserService{
    private UserRepositoryInterface $userRepo;
    public function __construct(UserRepositoryInterface $userRepo){
        $this->userRepo = $userRepo;
    }

    public function register(string $fullname , string $email , string $password , string $confirmationPassword) : string{

        if ($this->userRepo->findByEmail(trim($email))) {
            return "this email already existe";
        }

        else {
            if (!strlen($password) > 8 ) {
                return "the password must be longer than 7 char";
            }
            if (!strcmp($password, $confirmationPassword)) {
                return "those passwords are not comparable";
            }
            if (empty(trim($fullname))) {
                return "enter your name";
            }
            $user = new User(null , $fullname , $email , $password);

            $this->userRepo->save($user);
            return "sing up with success";
        }
    }

    public function login(string $email , string $password) : ?string{
        if ($this->userRepo->findByEmail(trim($email))) {
            $user = $this->userRepo->findByEmail(trim($email));
            if (!$user->verifyPassword($password)) {
                return "password incorrect";
            }
            return null;
        }

        else {
            return "no account whith this email";
        }
        
    }
}