<?php
namespace App\Services;

use App\Models\TaskProgress;
use App\Repositories\Interfaces\TaskProgressRepositoryInterface;

class TaskProgressService{
    private TaskProgressRepositoryInterface $taskProgressRepo;

    public function __construct(TaskProgressRepositoryInterface $taskProgressRepo){
        $this->taskProgressRepo = $taskProgressRepo;
    }

    public function save(int $task_id, bool $is_completed, ?string $submitted_result, ?string $ai_feedback) {
        return $this->taskProgressRepo->save(new TaskProgress(
            null,
            $task_id,
            $is_completed,
            $submitted_result,
            $ai_feedback
        ));
    }

    public function getTaskProgressById(int $id): ?TaskProgress
    {
        $taskProgress = $this->taskProgressRepo->findById($id);
        return $taskProgress ? $taskProgress : null;
    }

    public function getTaskProgressByTaskId(int $taskId): ?TaskProgress
    {
        return $this->taskProgressRepo->findByTaskId($taskId);
    }


}