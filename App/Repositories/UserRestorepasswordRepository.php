<?php
namespace App\Repositories;
use App\Repositories\Interfaces\UserRestorepasswordRepositoryInterface;
use App\Models\UserRestorepassword;
use PDO;


    class UserRestorepasswordRepository implements UserRestorepasswordRepositoryInterface{
        public function __construct (
            private \PDO $pdo
        ){}


        public function chngePassword(UserRestorepassword $userrestorepassword): void{
        
            $stmt = $this->pdo->prepare("UPDATE users SET password_hash = :password_hash WHERE id = :id");
            $stmt->execute(
                [
                    ':password_hash'=>$userrestorepassword->getPassword(),
                    ':id'=>$userrestorepassword->getId()
                ]
            );


        }


        public function findByEmail(string $email): ?UserRestorepassword{
            $stmt = $this->pdo->prepare("SELECT * FROM users WHERE email = :email");
            $stmt->execute(
                [
                    ':email'=>$email
                ]
            );

            $user = $stmt->fetch(\PDO::FETCH_ASSOC);
            return $user ? UserRestorepassword::userrestorepasswordFromArray($user) : NULL;
        }

    }