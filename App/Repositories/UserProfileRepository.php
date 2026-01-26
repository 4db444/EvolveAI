<?php
namespace App\Repositories;

use App\Repositories\Interfaces\UserProfileRepositoryInterface;
use App\Models\UserProfile;
use PDO;

class UserProfileRepository implements UserProfileRepositoryInterface{
    private PDO $db;

    public function __construct(PDO $db)
    {
        $this->db = $db;
    }

    public function find(int $id): ?UserProfile
    {
        $stmt = $this->db->prepare(
            "SELECT * FROM user_profiles WHERE id = :id"
        );

        $stmt->execute(['id' => $id]);

        $user = $stmt->fetch(PDO::FETCH_ASSOC); 

        return $user ? UserProfile::UserProfileFromArray($user) : NULL;
    }
    
     public function findByUserId(int $userId): ?UserProfile
    {
        $stmt = $this->db->prepare(
            "SELECT * FROM user_profiles WHERE user_id = :user_id"
        );
        $stmt->execute(['user_id' => $userId]);

        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        return $user ? UserProfile::UserProfileFromArray($user) : NULL;

    }
    public function save(UserProfile $profile)
    {
        //insert
        if ($profile->getId() === null) {
            $stmt = $this->db->prepare(
                "INSERT INTO user_profiles (user_id, age_interval, work_rhythm, work_hours, financial_situation, device, lesson_format)
                 VALUES (:user_id, :age_interval, :work_rhythm, :work_hours, :financial_situation, :device, :lesson_format)"
            );

            $stmt->execute([
                ':user_id' => $profile->getUserId(),
                ':age_interval' => $profile->getAgeInterval(),
                ':work_rhythm' => $profile->getWorkRhythm(),
                ':work_hours' => $profile->getWorkHours(),
                ':financial_situation' => $profile->getFinancialSituation(),
                ':device' => $profile->getDevice(),
                ':lesson_format' => $profile->getLessonFormat(),
            ]);

            $profile->setId($this->db->lastInsertId());
        }else {
            $stmt = $this->db->prepare(
                "UPDATE user_profiles
                 SET age_interval = :age_interval,
                     work_rhythm = :work_rhythm,
                     work_hours = :work_hours,
                     financial_situation = :financial_situation,
                     device = :device,
                     lesson_format = :lesson_format,
                 WHERE id = :id"
            );
    
            return $stmt->execute([
                ':id' => $profile->getId(),
                ':age_interval' => $profile->getAgeInterval(),
                ':work_rhythm' => $profile->getWorkRhythm(),
                ':work_hours' => $profile->getWorkHours(),
                ':financial_situation' => $profile->getFinancialSituation(),
                ':device' => $profile->getDevice(),
                ':lesson_format' => $profile->getLessonFormat(),
            ]);
        }
    }
}