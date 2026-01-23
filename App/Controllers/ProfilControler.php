<?php
    namespace App\Controllers;

    use App\Core\Controller;
    
    class ProfilControler extends Controller{

        public function profil(){
            return $this->render("profil");
        }
    }