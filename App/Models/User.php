<?php
namespace App\Models;

class User{
    private int $id;
    private string $fullname;
    private string $email;
    private string $password;

    public function __construct(string $fullname , string $email , string $password) {
        $this->fullname = $fullname;
        $this->email = $email;
        $this->password = $password;
    }

    //Getters

    public function getId() : int {
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

    public function setPassword(string $password) : void {
        $this->password = $password;
    }
}