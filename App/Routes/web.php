<?php
    use App\Core\Router;
    use App\Controllers\AuthController;
    use App\Controllers\OportunityControler;
    use App\Controllers\ProfilControler;
    use App\Controllers\DashboardControler;
    use App\Controllers\TasksControler;
    use App\Controllers\UserRestorepasswordController;

    Router::Get("/landingpage", [AuthController::class, "landingpage" ]);
    Router::Get("/auth/signup", [AuthController::class, "signup"]);
    Router::Get("/auth/login", [AuthController::class, "login"]);

    Router::Post("/auth/signup", [AuthController::class, "register"]);
    Router::Post("/auth/login", [AuthController::class, "authenticate"]);
    Router::Get("/dashboard", [DashboardControler::class, "dashboard"]);
    Router::Get("/profil", [ProfilControler::class, "profil"]);
    Router::Get("/tasks", [TasksControler::class, "tasks"]);
    Router::Get("/oportunity", [OportunityControler::class, "oportunity"]);
    
    Router::Get("/checkemail", [UserRestorepasswordController::class, "checkEmail"]);
    Router::POST("/restorepassword", [UserRestorepasswordController::class, "findByEmail"]);