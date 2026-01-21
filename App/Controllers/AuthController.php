<?php
    namespace App\Controllers;

    use App\Controllers\Controller;
    use App\Repositories\UserRepository;
    use App\Core\Database;



    class AuthController extends Controller{
        
        public function authRegister(string $full_name, string $email, string $password, string $password_confirmation){

            $pdo = DATABASASE::get_Instance();
            $userrepo = new UserRepository($pdo);
            $service = new UserService($userrepo);

            $table = $service->register($full_name, $email, $password, $password_confirmation);

            if(!$table['success']){
                return $this->redirect("auth/signup");
            }

            return $this->redirect("auth/login");

        }
    }