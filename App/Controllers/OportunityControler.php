<?php
    namespace App\Controllers;

    use App\Core\Controller;
    
    class OportunityControler extends Controller{

        public function oportunity(){
            return $this->render("oportunity");
        }
    }