<?php


namespace App\Repositories;

use App\Models\TaskProgress;
use App\Repositories\Interfaces\TaskProgressRepositoryInterface;
use PDO;

class TaskProgressRepository implements TaskProgressRepositoryInterface
{
    private PDO $pdo;

    public function __construct(PDO $pdo)
    {
        $this->pdo = $pdo;
    }

    public function save(TaskProgress $taskProgress): void
    {
        if ($taskProgress->getId()) {
            // Update existing record
            $sql = "UPDATE task_progress 
                    SET is_completed = :is_completed,
                        submitted_result = :submitted_result,
                        ai_feedback = :ai_feedback,
                        updated_at = :updated_at
                    WHERE id = :id";

            $stmt = $this->pdo->prepare($sql);
            $stmt->execute([
                ':id' => $taskProgress->getId(),
                ':is_completed' => $taskProgress->isCompleted() ? 1 : 0,
                ':submitted_result' => $taskProgress->getSubmittedResult(),
                ':ai_feedback' => $taskProgress->getAiFeedback(),
                ':updated_at' => $taskProgress->getUpdatedAt()
            ]);
        } else {
            // Insert new record
            $sql = "INSERT INTO task_progress (task_id, is_completed, submitted_result, ai_feedback, updated_at)
                    VALUES (:task_id, :is_completed, :submitted_result, :ai_feedback, :updated_at)";

            $stmt = $this->pdo->prepare($sql);
            $stmt->execute([
                ':task_id' => $taskProgress->getTaskId(),
                ':is_completed' => $taskProgress->isCompleted() ? 1 : 0,
                ':submitted_result' => $taskProgress->getSubmittedResult(),
                ':ai_feedback' => $taskProgress->getAiFeedback(),
                ':updated_at' => $taskProgress->getUpdatedAt()
            ]);

            // Set the ID using reflection since there's no setter
            $reflection = new \ReflectionClass($taskProgress);
            $property = $reflection->getProperty('id');
            $property->setAccessible(true);
            $property->setValue($taskProgress, (int)$this->pdo->lastInsertId());
        }
    }

    public function findById(int $id): ?TaskProgress
    {
        $sql = "SELECT * FROM task_progress WHERE id = :id LIMIT 1";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([':id' => $id]);

        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        if (!$row) {
            return null;
        }

        return $this->hydrateTaskProgress($row);
    }

    public function findByTaskId(int $taskId): ?TaskProgress
    {
        $sql = "SELECT * FROM task_progress WHERE task_id = :task_id LIMIT 1";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([':task_id' => $taskId]);

        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        if (!$row) {
            return null;
        }

        return $this->hydrateTaskProgress($row);
    }

    private function hydrateTaskProgress(array $row): TaskProgress
    {
        $taskProgress = TaskProgress::TaskProgressFromArray($row);

        // Set the ID using reflection
        $reflection = new \ReflectionClass($taskProgress);
        $property = $reflection->getProperty('id');
        $property->setAccessible(true);
        $property->setValue($taskProgress, (int)$row['id']);

        return $taskProgress;
    }
}