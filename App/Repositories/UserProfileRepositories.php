<?php
namespace App\Repositories;

use App\Repositories\Interfaces\UserProfileRepositoryInterface;
use App\Model\UserProfile;

class UserProfileRepositorie implements UserProfileRepositoryInterface{
     private PDO $db;

    public function __construct(PDO $db)
    {
        $this->db = $db;
    }

    public function findProfile(int $id): ?UserProfile
    {
        $stmt = $this->db->prepare(
            "SELECT * FROM user_profiles WHERE id = :id"
        );
        $stmt->execute(['id' => $id]);

        $data = $stmt->fetch(PDO::FETCH_ASSOC);

        if (!$data) {
            return null;
        }

        return new UserProfile(
            $data['id'],
            $data['user_id'],
            $data['income_goal'],
            $data['available_time']
        );
    }
     public function findByUserId(int $userId): ?UserProfile
    {
        $stmt = $this->db->prepare(
            "SELECT * FROM user_profiles WHERE user_id = :user_id"
        );
        $stmt->execute(['user_id' => $userId]);

        $data = $stmt->fetch(PDO::FETCH_ASSOC);

        if (!$data) {
            return null;
        }

        return new UserProfile(
            $data['id'],
            $data['user_id'],
            $data['income_goal'],
            $data['available_time']
        );
    }
    public function SaveProfile(UserProfile $profile): bool
    {
        //insert
        if ($profile->getProfileId() === null) {
            $stmt = $this->db->prepare(
                "INSERT INTO user_profiles (user_id, income_goal, available_time)
                 VALUES (:user_id, :income_goal, :available_time)"
            );

            return $stmt->execute([
                'user_id' => $profile->getUserId(),
                'income_goal' => $profile->getIncomeGoal(),
                'available_time' => $profile->getAvailableTime()
            ]);
        }

        // Update
        $stmt = $this->db->prepare(
            "UPDATE user_profiles
             SET income_goal = :income_goal,
                 available_time = :available_time
             WHERE id = :id"
        );

        return $stmt->execute([
            'income_goal' => $profile->getIncomeGoal(),
            'available_time' => $profile->getAvailableTime(),
            'id' => $profile->getProfileId()
        ]);
    }
}