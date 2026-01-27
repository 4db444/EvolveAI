<?php
    namespace App\Controllers;

    use App\Core\Controller;
    use App\Services\UserProfileService;
    use App\Services\UserService;
    use App\Repositories\UserProfileRepository;
    use App\Repositories\UserRepository;
    use App\Core\Database;
    
    class ProfilControler extends Controller{

        public function profil(){
            $userprofilerepo = new UserProfileRepository(Database::get_instance());
            $userprofileservice = new UserProfileService($userprofilerepo);
            $userprofile = $userprofileservice->findByUserId($_SESSION['user']->getId());
            $_SESSION["userprofile"] = $userprofile;
            return $this->render("profil", [
                "userprofile" => $_SESSION["userprofile"],
                "user" => $_SESSION["user"]
            ]);
        }

        public function updateInfo(
            string $full_name,
            string $email,
            string $password,
            string $password_confirmation,
           
        ){
            $UserService = new UserService(new UserRepository(Database::get_instance()));

            $result = $UserService->register(   
                $full_name,
                $email,
                $password,
                $password_confirmation
            );

            if(!$result['success']){
                return $this->render("profil");
            }

            unset($_SESSION["user"]);
            $_SESSION["user"] = $result["user"];

            return $this->render("profil",[
                "user" => $_SESSION["user"]
            ]);
        }

        public function updateQuestion(
            ?int $user_id, 
            string $age_interval, 
            string $work_rhythm, 
            string $work_hours, 
            string $financial_situation, 
            string $device, 
            string $lesson_format
        ){
            $UserProfileService = new UserProfileService(new UserProfileRepository(Database::get_instance()));
            $UserProfileService->save(
                 $user_id, 
                 $age_interval, 
                 $work_rhythm, 
                 $work_hours, 
                 $financial_situation, 
                 $device, 
                 $lesson_format
            );

            $this->profil();
        }

        
    }