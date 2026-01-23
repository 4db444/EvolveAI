<?php
    use App\Core\Router;
    use App\Controllers\AuthController;

    Router::Get("/landingpage", [AuthController::class, "landingpage"]);
    Router::Get("/auth/signup", [AuthController::class, "signup"]);
    Router::Get("/auth/login", [AuthController::class, "login"]);

    Router::Post("/auth/signup", [AuthController::class, "register"]);
    Router::Post("/auth/login", [AuthController::class, "authenticate"]);