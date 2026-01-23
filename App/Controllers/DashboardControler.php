<?php
    namespace App\Controllers;

    use App\Core\Controller;
    
    class DashboardControler extends Controller{

        public function dashboard(){
            return $this->render("dashboard");
        }
    }