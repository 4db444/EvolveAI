<?php
namespace App\Services;

use App\Repositories\Interfaces\UserRestorepasswordRepositoryInterface;
use App\Models\UserRestorepassword;

class UserRestorepasswordService{
    private UserRestorepasswordRepositoryInterface $userrestorepasswordRepo;
    
    public function __construct(UserRestorepasswordRepositoryInterface $userrestorepasswordRepo){
        $this->userrestorepasswordRepo = $userrestorepasswordRepo;
    }


    public function checkEmail(string $email) : array{

        $errors=[];

        if (!filter_var(trim($email), FILTER_VALIDATE_EMAIL)) $errors["email"] = "invalide email";

        if (!$this->userrestorepasswordRepo->findByEmail(trim($email))) $errors["email"] = "this email not existe";

        if ($errors) return [
            "success" => false,
            "errors" => $errors
        ];

        $user = $this->userrestorepasswordRepo->findByEmail(trim($email));
        $userrestorepassword = new UserRestorepassword($user->getId(), $user->getEmail(), $user->getPassword());

        return [
            "success" => true,
            "userrestorepassword" => $userrestorepassword
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

        $user = $this->userrestorepasswordRepo->findByEmail(trim($email));
        $_SESSION["id"] = $user ? $user->getId() : $_SESSION["id"];
        $userrestorepassword = new UserRestorepassword($_SESSION["id"], $email, password_hash($password, PASSWORD_DEFAULT));

        $this->userrestorepasswordRepo->chngePassword($userrestorepassword);

        return [
            "success" => true,
            "restorepassword" => $userrestorepassword
        ];
    }

    
}