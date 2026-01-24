<?php
namespace App\Models;

class UserProfile
{
    public function __construct(
        private ?int $id,
        private int $user_id,
        private string $age_interval,
        private string $work_rhythm,
        private string $work_hours,
        private string $financial_situation,
        private string $device,
        private string $lesson_format
    ) {}

    // Getters
    public function getId(): ?int
    {
        return $this->id;
    }

    public function getUserId(): int
    {
        return $this->user_id;
    }

    public function getAgeInterval(): string
    {
        return $this->age_interval;
    }

    public function getWorkRhythm(): string
    {
        return $this->work_rhythm;
    }

    public function getWorkHours(): string
    {
        return $this->work_hours;
    }

    public function getFinancialSituation(): string
    {
        return $this->financial_situation;
    }

    public function getDevice(): string
    {
        return $this->device;
    }

    public function getLessonFormat(): string
    {
        return $this->lesson_format;
    }

    // Setters
    public function setId(int $id): void
    {
        $this->id = $id;
    }
    public function setUserId(int $user_id): void
    {
        $this->user_id = $user_id;
    }

    public function setAgeInterval(string $age_interval): void
    {
        $this->age_interval = $age_interval;
    }

    public function setWorkRhythm(string $work_rhythm): void
    {
        $this->work_rhythm = $work_rhythm;
    }

    public function setWorkHours(string $work_hours): void
    {
        $this->work_hours = $work_hours;
    }

    public function setFinancialSituation(string $financial_situation): void
    {
        $this->financial_situation = $financial_situation;
    }

    public function setDevice(string $device): void
    {
        $this->device = $device;
    }

    public function setLessonFormat(string $lesson_format): void
    {
        $this->lesson_format = $lesson_format;
    }

    public static function UserProfieFromArray (array $user_profile) :UserProfile {
        return new self (
            $user_profile["id"],
            $user_profile["user_id"],
            $user_profile["age_interval"],
            $user_profile["work_rhythm"],
            $user_profile["work_hours"],
            $user_profile["financial_situation"],
            $user_profile["device"],
            $user_profile["lesson_format"],
        );
    }
}