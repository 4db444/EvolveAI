<?php
    namespace App\Controllers;

    use App\Core\Controller;
    
    class TasksControler extends Controller{

        public function tasks(){
            return $this->render("tasks");
        }
    }