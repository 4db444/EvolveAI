<?php
    namespace App\Controllers;

    use App\Core\Controller;
    use App\Repositories\UserRestorepasswordRepository;
    use App\Services\UserRestorepasswordService;
    use App\Core\Database;

    class UserRestorepasswordController extends Controller{
        
        public function findByEmail(
            string $email
           
        ){
            $RestorepasswordService = new UserRestorepasswordService(new UserRestorepasswordRepository(Database::get_instance()));

            $result = $RestorepasswordService->checkEmail(   
                $email
            );

            if(!$result['success']){
                return $this->redirect("/auth/signup");
            }

            
            return $this->redirect("/auth/login");
        }

        public function userrestorePassword(
            string $email,
            string $password,
            string $password_confirmation,
           
        ){
            $RestorepasswordService = new UserRestorepasswordService(new UserRestorepasswordRepository(Database::get_instance()));

            $result = $RestorepasswordService->updatePassword(   
                $email,
                $password,
                $password_confirmation,
            );

            if(!$result['success']){
                return $this->redirect("/auth/signup");
            }

            return $this->redirect("/auth/login");
        }
      
        public function restorepassword () {
            return $this->render("checkemail");
        }

        public function signup () {
            return $this->render("signup");
        }
        
        public function landingpage(){
            return $this->render("landingpage");
        }

    }