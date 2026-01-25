<?php
namespace App\Services;

use App\Repositories\Interfaces\RestorepasswordRepositoryInterface;
use App\Models\Restorepassword;

class UserService{
    private RestorepasswordRepositoryInterface $restorepasswordRepo;
    
    public function __construct(RestorepasswordRepositoryInterface $restorepasswordRepo){
        $this->restorepasswordRepo = $restorepasswordRepo;
    }


    public function checkEmail(string $email) : array{

        $errors=[];

        if (!filter_var(trim($email), FILTER_VALIDATE_EMAIL)) $errors["email"] = "invalide email";

        if (!$this->restorepasswordRepo->findByEmail(trim($email))) $errors["email"] = "this email not existe";

        if ($errors) return [
            "success" => false,
            "errors" => $errors
        ];

        return [
            "success" => true,
        ];
    }



    public function updatePassword(string $email , string $password ,string $confirmationPassword) : array{

        $errors=[];

        if (strlen($password) < 8 ) $errors["password"] = "the password must be at least 8 characters";

        if ( $password != $confirmationPassword ) $errors["password_confirmation"] = "those passwords are not comparable";
        

        if ($errors) return [
            "success" => false,
            "errors" => $errors
        ];

            
        $restorepassword = new Restorepassword(null ,$email , password_hash($password, PASSWORD_DEFAULT));

        $this->restorepasswordRepo->chngePassword($restorepassword);

        return [
            "success" => true,
            "restorepassword" => $restorepassword
        ];
    }

    
}