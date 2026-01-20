<?php
    require_once dirname(__DIR__) . "/../vendor/autoload.php";
    require_once dirname(__DIR__) . "/Routes/web.php";

    use App\Core\Router;

    $method = $_SERVER["REQUEST_METHOD"];

    if ($method === "POST") $method = $_POST["method"] ?? "post";
    
    Router::Dispatch($_SERVER["REQUEST_URI"], $method);