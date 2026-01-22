<?php
    namespace App\Controllers;

    use App\Core\Controller;
    use App\Repositories\UserRepository;
    use App\Services\UserService;
    use App\Core\Database;

    class AuthController extends Controller{
        
        public function authRegister(string $full_name, string $email, string $password, string $password_confirmation){

            $pdo = Database::get_Instance();
            $userrepo = new UserRepository($pdo);
            $service = new UserService($userrepo);

            $table = $service->register($full_name, $email, $password, $password_confirmation);

            if(!$table['success']){
                return $this->redirect("auth/signup");
            }

            return $this->redirect("auth/login");
        }
      
        public function login () {
            return $this->render("login");
        }

        public function signup () {
            return $this->render("signup");
        }
        
        public function landingpage(){
            return $this->render("landingpage");
        }
    }