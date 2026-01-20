<?php
    require_once dirname(__DIR__) . "/../vendor/autoload.php";
    require_once dirname(__DIR__) . "/Routes/web.php";

    use App\Core\Router;
    use App\Core\Database;
    use App\Core\Model;
    use App\Core\QueryBuilder;

    $method = $_SERVER["REQUEST_METHOD"];

    if ($method === "POST") $method = $_POST["method"] ?? "post";
    
    Router::Dispatch($_SERVER["REQUEST_URI"], $method);