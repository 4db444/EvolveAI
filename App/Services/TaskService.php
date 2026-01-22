<?php
namespace App\Services;

use App\Models\Task;
use App\Repositories\Interfaces\TaskRepositoryInterface;

class TaskService {
    private TaskRepositoryInterface $taskRepository;

    public function __construct(TaskRepositoryInterface $taskRepository) {
        $this->taskRepository = $taskRepository;
    }
    public function getTaskById(int $id): ?Task {
        $task = $this->taskRepository->findById($id);
        return $task ? $task : null;
    }
    public function getTasksByOpportunity(string $opportunity): array {
        $opportunity = $this->taskRepository->findByOpportunity($opportunity);
        if(!$opportunity === null){
            return $opportunity;
        }
        return [];
    }

}
