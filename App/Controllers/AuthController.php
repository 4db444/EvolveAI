<?php
    namespace App\Controllers;

    use App\Core\Controller;
    use App\Repositories\UserRepository;
    use App\Core\Database;
    use App\Services\UserService;

    class AuthController extends Controller{
        
        public function authRegister(string $full_name,string $email, string $password, string $password_confirmation){

            $pdo = Database::get_instance();
            $userrepo = new UserRepository($pdo);
            $service = new UserService($userrepo);

            $result = $service->register(   
                $full_name,
                $email,
                $password,
                $password_confirmation
            );

            if(!$result['success']){
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


        public function authLogin(string $email, string $password){
            $pdo = Database::get_instance();
            $userrepo = new UserRepository($pdo);
            $service = new UserService($userrepo);

            $result = $service->login(
                $email,
                $password
            );

            if(!$result['success']){
                return $this->redirect("auth/login");
            }
            $user = $result['user'];
            $_SESSION['user_id'] = $user->getId();

            return $this->redirect("dashboard");
        }



        public function logout(){
            session_destroy();
            return $this->redirect('auth/login');
        }




    }