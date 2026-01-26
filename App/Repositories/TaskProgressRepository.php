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

    public function save(TaskProgress $taskProgress): TaskProgress
    {
        if ($taskProgress->getId()) {
            // Update existing record
            $sql = "UPDATE task_progress 
                    SET completed = :completed,
                        submitted_result = :submitted_result,
                        ai_feedback = :ai_feedback
                    WHERE id = :id";

            $stmt = $this->pdo->prepare($sql);
            $stmt->execute([
                ':id' => $taskProgress->getId(),
                ':completed' => $taskProgress->isCompleted() ? 1 : 0,
                ':submitted_result' => $taskProgress->getSubmittedResult(),
                ':ai_feedback' => $taskProgress->getAiFeedback()
            ]);
        } else {
            // Insert new record
            $sql = "INSERT INTO task_progress (task_id, completed, submitted_result, ai_feedback)
                    VALUES (:task_id, :completed, :submitted_result, :ai_feedback)";

            $stmt = $this->pdo->prepare($sql);
            $stmt->execute([
                ':task_id' => $taskProgress->getTaskId(),
                ':completed' => $taskProgress->isCompleted() ? 1 : 0,
                ':submitted_result' => $taskProgress->getSubmittedResult(),
                ':ai_feedback' => $taskProgress->getAiFeedback()
            ]);

            // Set the ID using reflection since there's no setter
            $reflection = new \ReflectionClass($taskProgress);
            $property = $reflection->getProperty('id');
            $property->setAccessible(true);
            $property->setValue($taskProgress, (int)$this->pdo->lastInsertId());
        }
        return $taskProgress;
    }

    public function findById(int $id): ?TaskProgress
    {
        $sql = "SELECT * FROM task_progress WHERE id = :id LIMIT 1";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([':id' => $id]);

        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        return $row ? TaskProgress::TaskProgressFromArray($row) : null;
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

        return $row ? TaskProgress::TaskProgressFromArray($row) : null;
    }
}