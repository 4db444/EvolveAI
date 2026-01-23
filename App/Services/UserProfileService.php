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

    public function findByUserId(int $userId): ?UserProfile
    {
        return $this->profileRepository->findByUserId($userId);
    }

    public function save(int $userId, int $incomeGoal, int $availableTime): bool {
        $existingProfile = $this->profileRepository->findByUserId($userId);

        if ($existingProfile) {
            $existingProfile->setIncomeGoal($incomeGoal);
            $existingProfile->setAvailableTime($availableTime);

            return $this->profileRepository->save($existingProfile);
        }

        $newProfile = new UserProfile(
            null,
            $userId,
            $incomeGoal,
            $availableTime
        );

        return $this->profileRepository->save($newProfile);
    }
}
