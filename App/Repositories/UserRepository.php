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

            $table = $stmt->fetch[PDO::FETCH_ASSOC];
            $user = new User($table['id'] , $table['full_name'] , $table['email'] , $table['password_hash']);
            return $user;
        }




        public function findByEmail(string $email): ?User{
            $stmt = $this->pdo->prepare("SELECT * FROM users WHERE email = :email");
            $stmt->execute(
                [
                    ':email'=>$email
                ]
            );
            $table = $stmt->fetch[PDO::FETCH_ASSOC];
            $user = new User($table['id'] , $table['full_name'] , $table['email'] , $table['password_hash']);
            return $user;
        }



    }