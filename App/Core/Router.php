<?php
namespace App\Core;

use ReflectionMethod;

class Router {

    public static array $routes = [
        "GET" => [],
        "POST" => [],
        "PUT" => [],
        "DELETE" => []
    ];

    public static function Get(string $path, array $action): void {
        self::addRoute("GET", $path, $action);
    }

    public static function Post(string $path, array $action): void {
        self::addRoute("POST", $path, $action);
    }

    public static function Put(string $path, array $action): void {
        self::addRoute("PUT", $path, $action);
    }

    public static function Delete(string $path, array $action): void {
        self::addRoute("DELETE", $path, $action);
    }

    private static function addRoute(string $method, string $path, array $action): void {
        $path = $_ENV["BASE_PATH"] . $path;

        // Convert /users/{id} to regex
        $pattern = preg_replace('#\{([\w]+)\}#', '(?P<$1>[^/]+)', $path);
        $pattern = "#^{$pattern}$#";

        self::$routes[$method][] = [
            'pattern' => $pattern,
            'action'  => $action
        ];
    }

    public static function Dispatch(string $path, string $method) {
        $method = strtoupper($method);
        $path = str_replace($_ENV["PUBLIC_DIR"], "", $path);
        $path = $_ENV["BASE_PATH"] . $path;

        foreach (self::$routes[$method] as $route) {
            if (preg_match($route['pattern'], $path, $matches)) {

                $action = $route['action'];
                $controller = new $action[0]();
                $methodName = $action[1];

                $urlParams = array_filter(
                    $matches,
                    fn($key) => !is_int($key),
                    ARRAY_FILTER_USE_KEY
                );

                $reflection = new ReflectionMethod($controller, $methodName);
                $parameters = $reflection->getParameters();
                $args = [];

                foreach ($parameters as $param) {
                    $name = $param->getName();

                    if (isset($urlParams[$name])) {
                        $args[] = $urlParams[$name];
                    } elseif (isset($_POST[$name])) {
                        $args[] = $_POST[$name];
                    } elseif ($param->isDefaultValueAvailable()) {
                        $args[] = $param->getDefaultValue();
                    } else {
                        echo "missing param: {$name}";
                        return;
                    }
                }

                $reflection->invokeArgs($controller, $args);
                return;
            }
        }

        echo "route does not exist";
    }
}






    
