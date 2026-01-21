<?php
    namespace App\Core;

    abstract class Controller {
        protected function render (string $view) {
                    
            require dirname(__DIR__) . "/views/$view.php";

        }

        protected function redirect (string $location) {
            header("location: $location");
        }
    }