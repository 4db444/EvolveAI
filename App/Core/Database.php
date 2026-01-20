<?php
    namespace App\Core;

    use PDO;

    class Database {
        private static ?Database $instance = NULL;
        private ?PDO $connection = NULL;

        private function __construct () {
            $this->connection = new PDO(DATABASE . ":host=" . DATABASE_HOST . ";dbname=" . DATABASE_NAME, DATABASE_USER, DATABASE_PASSWORD);
        }

        public static function get_instance(){
            if (!self::$instance) self::$instance = new self();
            return self::$instance->connection;
        }
    }