<?php
namespace App\Repositories\Interfaces;

use App\Models\Restorepassword;

interface RestorepasswordRepositoryInterface{
    public function chngePassword(Restorepassword $restorepassword): void;
    public function findByEmail(string $email): ?Restorepassword;
}