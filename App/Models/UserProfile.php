<?php
namespace App\Models;

class UserProfile{
    private $profile_id;
    private $user_id;
    private $income_goal;
    private $available_time;

    public function __construct(?int $id, int $user_id, int $income_goal, int $available_time){
        $this->profile_id = $profile_id;
        $this->user_id = $user_id;
        $this->income_goal = $income_goal;
        $this->available_time = $available_time;
    }

    public function getprofileId() : int {
        return $this->profile_id;
    }
    public function getUserId() : int {
        return $this->profile_id;
    }
    public function getIncomeGoal() : int {
        return $this->income_goal;
    }
    public function getAvailableTime() : int {
        return $this->available_time;
    }
    public function setprofileId() : int {
        $this->profile_id = $profile_id;
    }
    public function setUserId() : int {
        $this->profile_id = $user_id;
    }
    public function setIncomeGoal() : int {
        $this->income_goal = $income_goal;
    }
    public function setAvailableTime() : int {
        $this->available_time = $available_time;
    }
}
