<?php
    namespace App\Core;

    use PDO;

    class Database {
        private static ?Database $instance = NULL;
        private ?PDO $connection = NULL;

        private function __construct () {
            $this->connection = new PDO("pgsql:host=" . $_ENV["DATABASE_HOST"] . ";dbname=" . $_ENV["DATABASE_NAME"], $_ENV["DATABASE_USER"], $_ENV["DATABASE_PASSWORD"]);
        }

        public static function get_instance(){
            if (!self::$instance) self::$instance = new self();
            return self::$instance->connection;
        }
    }