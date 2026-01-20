<?php
namespace App\Repositories;
use App\Repositories\Interfaces;
use App\Models\User;


    class UserRepository implements UserRepositoryInterface{
        public function __construct (
            private PDO $pdo
        ){}

        public function save(User $user): void{
            $stmt = $this->pdo->prepare("INSERT INTO users(full_name,email,password_hash) VALUES(:full_name,:email,:password_hash) ");
            $stmt->execute(
                [
                    ':full_name'=>$user->getFullName(),
                    ':email'=>$user->getEmail(),
                    ':password_hash'=>$user->getPassword()
                ]
            );
        }


        
        public function findById(int $id): ?User{
            $stmt = $this->pdo->prepare("SELECT * FROM users WHERE id = :id");
            $stmt->execute([
                ':id'=>$id
            ]);

            return $stmt->fetch[PDO::FETCH_ASSOC];
        }




        public function findByEmail(string $email): ?User{
            $stmt = $this->pdo->prepare("SELECT * FROM users WHERE id = :email");
            $stmt->execute(
                [
                    ':email'=>$email
                ]
            );
            return $stmt->fetch[PDO::FETCH_ASSOC];
        }



    }