<?php
    use App\Core\Router;
    use App\Controllers\AuthController;
    use App\Controllers\OpportunityController;
    use App\Controllers\ProfilControler;
    use App\Controllers\DashboardControler;
    use App\Controllers\TasksControler;

    Router::Get("/", [AuthController::class, "landingpage"]);
    Router::Get("/auth/signup", [AuthController::class, "signup"]);
    Router::Get("/auth/login", [AuthController::class, "login"]);

    Router::Post("/auth/signup", [AuthController::class, "register"]);
    Router::Post("/auth/login", [AuthController::class, "authenticate"]);

    Router::Get("/dashboard", [DashboardControler::class, "dashboard"]);
    Router::Get("/profil", [ProfilControler::class, "profil"]);
    Router::Get("/tasks", [TasksControler::class, "tasks"]);
    Router::Get("/opportunity", [OpportunityController::class, "opportunity"]);

    Router::get("/opportunity/{id}", [OpportunityController::class, "show"]);

    Router::Post("/suggestions", [OpportunityController::class, "suggestions"]);
    Router::Post("/opportunity/commit", [OpportunityController::class, "commit"]);
