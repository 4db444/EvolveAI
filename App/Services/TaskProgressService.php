<?php
namespace App\Services;

use App\Models\TaskProgress;
use App\Repositories\Interfaces\TaskProgressRepositoryInterface;

class TaskProgressService{
    private TaskProgressRepositoryInterface $taskProgressRepo;

    public function __construct(TaskProgressRepositoryInterface $taskProgressRepo){
        $this->taskProgressRepo = $taskProgressRepo;
    }


    public function getTaskProgressById(int $id): ?TaskProgress
    {
        $taskProgress = $this->taskProgressRepository->findById($id);
        return $taskProgress ? $taskProgress : null;
    }

    public function getTaskProgressByTaskId(int $taskId): ?TaskProgress
    {
        $taskProgress = $this->taskProgressRepository->findByTaskId($taskId);
        return $taskProgress ? $taskProgress : null;
    }


}