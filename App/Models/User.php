<?php
namespace App\Models;

class User{
    private ?int $id;
    private string $fullname;
    private string $email;
    private string $password;

    public function __construct(?int $id ,string $fullname , string $email , string $password) {
        $this->id = $id;
        $this->fullname = $fullname;
        $this->email = $email;
        $this->password = $password;
    }


    //verifie password
    public function verifyPassword ($password) : bool {
        return password_verify($password, $this->password );
    }
        
    //hash password
    public function setPassword(string $password) : void {
        $this->password = password_hash($password , PASSWORD_DEFAULT);
    }
    //Getters

    public function getId() : ?int {
        return $this->id;
    }

    public function getFullName() : string {
        return $this->fullname;
    }

    public function getEmail() : string {
        return $this->email;
    }

    public function getPassword() : string {
        return $this->password;
    }
    
    //Setters
    public function setId(int $id) : void {
        $this->id = $id;
    }

    public function setFullName(string $fullname) : void {
        $this->fullname = $fullname;
    }

    public function setEmail(string $email) : void {
        $this->email = $email;
    }

    public static function UserFromArray (array $user){
        return new self(
            $user["id"],
            $user["full_name"],
            $user["email"],
            $user["password_hash"]
        );
    }

}