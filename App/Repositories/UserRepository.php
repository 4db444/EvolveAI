<?php
namespace App\Repositories;
use App\Repositories\Interfaces\UserRepositoryInterface;
use App\Models\User;
use PDO;


    class UserRepository implements UserRepositoryInterface{
        public function __construct (
            private PDO $pdo
        ){}


        public function save(User $user): void{

            if($user->getId() === null){

                $stmt = $this->pdo->prepare("INSERT INTO users(full_name,email,password_hash) VALUES(:full_name,:email,:password_hash)  ");
                $stmt->execute(
                    [
                        ':full_name'=>$user->getFullName(),
                        ':email'=>$user->getEmail(),
                        ':password_hash'=>$user->getPassword()
                    ]
                );
                $user->setId($this->pdo->lastInsertId());


            }else{
                $stmt = $this->pdo->prepare("UPDATE users SET full_name = :full_name, email=:email, password_hash = :password_hash WHERE id = :id");
                $stmt->execute(
                    [   ':id'=>$user->getId(),
                        ':full_name'=>$user->getFullName(),
                        ':email'=>$user->getEmail(),
                        ':password_hash'=>$user->getPassword()
                    ]
                );
            }

        }

        public function findById(int $id): ?User{
            $stmt = $this->pdo->prepare("SELECT * FROM users WHERE id = :id");
            $stmt->execute([
                ':id'=>$id
            ]);

            $table = $stmt->fetch(PDO::FETCH_ASSOC);
            return $user ? User::UserFromArray($user) : NULL;
        }

        public function findByEmail(string $email): ?User{
            $stmt = $this->pdo->prepare("SELECT * FROM users WHERE email = :email");
            $stmt->execute(
                [
                    ':email'=>$email
                ]
            );

            $user = $stmt->fetch(PDO::FETCH_ASSOC);
            return $user ? User::UserFromArray($user) : NULL;
        }

     

    }