<?php
namespace App\Repositories\Interfaces;

use App\Model\UserProfile;

interface UserProfileRepositoryInterface{
    public function FindProfile() : UserProfile;
    public function SaveProfile() : Void;
    public function FindByUserId(int $id) : UserProfile;
}