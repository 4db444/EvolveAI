<?php
namespace App\Services;

use App\Models\Task;
use App\Repositories\Interfaces\TaskRepositoryInterface;

class TaskService {
    private TaskRepositoryInterface $taskRepository;

    public function __construct(TaskRepositoryInterface $taskRepository) {
        $this->taskRepository = $taskRepository;
    }

    public function save (int $opportunity_id, string $title, string $description, string $deadline, int $order_index, string $target_skill) {
        return $this->taskRepository->save(new Task(
            null,
            $opportunity_id,
            $title,
            $description,
            $deadline,
            $order_index,
            $target_skill
        ));
    }

    public function getTaskById(int $id): ?Task {
        $task = $this->taskRepository->findById($id);
        return $task ? $task : null;
    }

    public function getTasksByOpportunity(int $opportunity): array {
        return $opportunity = $this->taskRepository->findByOpportunity($opportunity);
    }

    public function createResource(int $task_id, string $title, string $type, string $link, string $generated_by_ai) {
        return $this->taskRepository->createResource($task_id, $title, $type, $link, $generated_by_ai);
    }
        
    public function getResources (int $task_id) {
        return $this->taskRepository->getResources($task_id);
    }
}
