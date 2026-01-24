<?php
namespace App\Repositories\Interfaces;

use App\Models\UserProfile;

interface UserProfileRepositoryInterface{
    public function find(int $id) : ?UserProfile;
    public function save(UserProfile $profile);
    public function findByUserId(int $user_id) : ?UserProfile;
}