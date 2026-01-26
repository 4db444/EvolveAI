<?php
    namespace App\Core;

    abstract class Controller {
        protected function render (string $view, array $vars = []) {
            extract($vars);
            require dirname(__DIR__) . "/views/$view.php";

        }

        protected function redirect (string $location) {
            header("location: " .$_ENV["BASE_PATH"].$location);
        }
    }