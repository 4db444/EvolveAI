<?php

namespace App\Repositories\Interfaces;

use App\Models\User;

interface UserRepositoryInterface {

    public function save(User $user): void;
    public function findById(int $id): ?User;
    public function findByEmail(string $email): ?User;
}