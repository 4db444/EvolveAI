<?php
namespace App\Repositories;
use App\Repositories\Interfaces\RestorepasswordRepositoryInterface;
use App\Models\Restorepassword;
use PDO;


    class RestorepasswordRepository implements RestorepasswordRepositoryInterface{
        public function __construct (
            private \PDO $pdo
        ){}


        public function chngePassword(Restorepassword $restorepassword): void{
        
            $stmt = $this->pdo->prepare("UPDATE users SET passwrod = :password_hash WHERE email = :email");
            $stmt->execute(
                [
                    ':password_hash'=>$restorepassword->getPassword(),
                    ':email'=>$restorepassword->getEmail()
                ]
            );

            $restorepassword->setId($this->pdo->lastInsertId());

        }


        public function findByEmail(string $email): ?restorepassword{
            $stmt = $this->pdo->prepare("SELECT * FROM users WHERE email = :email");
            $stmt->execute(
                [
                    ':email'=>$email
                ]
            );

            $restorepassword = $stmt->fetch(\PDO::FETCH_ASSOC);
            return $restorepassword ? restorepassword::restorepasswordFromArray($restorepassword) : NULL;
        }

    }