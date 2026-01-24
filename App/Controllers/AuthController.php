<?php
    namespace App\Controllers;

    use App\Core\Controller;
    use App\Repositories\UserRepository;
    use App\Services\UserService;
    use App\Repositories\UserProfileRepository;
    use App\Services\UserProfileService;
    use App\Core\Database;

    class AuthController extends Controller{
        
        public function register(
            string $full_name,
            string $email,
            string $password,
            string $password_confirmation,
            string $age_interval,
            string $work_rhythm,
            string $work_hours,
            string $financial_situation,
            string $device,
            string $lesson_format
        ){
            $UserService = new UserService(new UserRepository(Database::get_instance()));
            $UserProfileService = new UserProfileService(new UserProfileRepository(Database::get_instance()));

            $result = $UserService->register(   
                $full_name,
                $email,
                $password,
                $password_confirmation
            );

            if(!$result['success']){
                return $this->redirect("/auth/signup");
            }

            $user = $result["user"];

            $UserProfileService->save(
                $user->getId(),
                $age_interval,
                $work_rhythm,
                $work_hours,
                $financial_situation,
                $device, $lesson_format
            );

            return $this->redirect("/auth/login");
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


        public function authenticate(string $email, string $password){

            $service = new UserService(new UserRepository(Database::get_instance()));

            $result = $service->login(
                $email,
                $password
            );

            if(!$result['success']){
                return $this->redirect("/auth/login");
            }

            $user = $result['user'];
            $_SESSION['user'] = $user;

            return $this->redirect("/dashboard");
        }

        public function logout(){
            session_destroy();
            return $this->redirect('auth/login');
        }
    }