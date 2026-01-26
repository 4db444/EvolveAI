<?php
namespace App\Repositories\Interfaces;

use App\Models\UserRestorepassword;

interface UserRestorepasswordRepositoryInterface{
    public function chngePassword(UserRestorepassword $userrestorepassword): void;
    public function findByEmail(string $email): ?UserRestorepassword;
}