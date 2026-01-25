<?php
namespace App\Models;

class Restorepassword{
    private ?int $user_id;
    private string $email;
    private string $password;
  

    public function __construct(?int $user_id, string $email , string $password) {
        $this->user_id = $user_id;
        $this->email = $email;
        $this->password = $password;
    }
        
    //hash password
    public function setPassword(string $password) : void {
        $this->password = password_hash($password , PASSWORD_DEFAULT);
    }

    //Getters
    public function getId() : ?int {
        return $this->user_id;
    }

    public function getEmail() : string {
        return $this->email;
    }

    public function getPassword() : string {
        return $this->password;
    }
    
    //Setters
    public function setEmail(string $email) : void {
        $this->email = $email;
    }

    public function setId(int $user_id) : void {
        $this->user_id = $user_id;
    }

    public static function RestorepasswordFromArray (array $Restorepassword){
        return new self(
            $Restorepassword["email"],
            $Restorepassword["password_hash"]
        );
    }

}