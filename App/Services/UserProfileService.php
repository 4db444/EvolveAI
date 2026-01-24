<?php
namespace App\Services;

use App\Repositories\Interfaces\UserProfileRepositoryInterface;
use App\Models\UserProfile;

class UserProfileService{
    private UserProfileRepositoryInterface $profileRepository;

    public function __construct(UserProfileRepositoryInterface $profileRepository)
    {
        $this->profileRepository = $profileRepository;
    }

    public function find(int $id): ?UserProfile
    {
        return $this->profileRepository->find($id);
    }

    public function findByUserId(int $userId): ?UserProfile
    {
        return $this->profileRepository->findByUserId($userId);
    }

    public function save(
        ?int $user_id, 
        string $age_interval, 
        string $work_rhythm, 
        string $work_hours, 
        string $financial_situation, 
        string $device, 
        string $lesson_format
    ){
        $existingProfile = $this->profileRepository->findByUserId($user_id);

        if ($existingProfile) {
            $existingProfile->setAgeInterval($age_interval);
            $existingProfile->setWorkRhythm($work_rhythm);
            $existingProfile->setWorkHours($work_hours);
            $existingProfile->setFinancialSituation($financial_situation);
            $existingProfile->setDevice($device);
            $existingProfile->setLessonFormat($lesson_format);

            return $this->profileRepository->save($existingProfile);
        }

        $newProfile = new UserProfile(
            null,
            $user_id,
            $age_interval,
            $work_rhythm,
            $work_hours,
            $financial_situation,
            $device,
            $lesson_format
        );

        return $this->profileRepository->save($newProfile);
    }
}
