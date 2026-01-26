<?php
    namespace App\Controllers;

    use App\Core\Controller;
    use App\Repositories\UserRestorepasswordRepository;
    use App\Services\UserRestorepasswordService;
    use App\Core\Database;

    class UserRestorepasswordController extends Controller{
        
        public function valideEmail(
            string $email
           
        ){
            $RestorepasswordService = new UserRestorepasswordService(new UserRestorepasswordRepository(Database::get_instance()));

            $result = $RestorepasswordService->checkEmail(   
                $email
            );

            if(!$result['success']){
                return $this->redirect("/auth/signup");
            }

            $_SESSION["email"] = $result["userrestorepassword"]->getEmail();
            return $this->render("restorepassword");
        }

        public function updatePassword(
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
                return $this->render("restorepassword");
            }

            return $this->redirect("/auth/login");
        }
      
        public function showcheckEmail () {
            return $this->render("showcheckEmail");
        }

        public function restorePassword () {
            return $this->render("restorepassword");
        }

        public function signup () {
            return $this->render("signup");
        }
        
        public function landingpage(){
            return $this->render("landingpage");
        }

    }