<?php
    require_once dirname(__DIR__) . "/../vendor/autoload.php";
    session_start();
    
    use App\Core\Router;
    use Dotenv\Dotenv;
    
    $dotenv = Dotenv::createImmutable(dirname(dirname(__DIR__)));
    $dotenv->load();

    require_once dirname(__DIR__) . "/Routes/web.php";
    
    $method = $_SERVER["REQUEST_METHOD"];

    if ($method === "POST") $method = $_POST["method"] ?? "post";
    
    Router::Dispatch($_SERVER["REQUEST_URI"], $method);