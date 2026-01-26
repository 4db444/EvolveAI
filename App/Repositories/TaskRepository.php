<?php
    namespace App\Repositories;

    use App\Models\Task;
    use App\Repositories\Interfaces\TaskRepositoryInterface;
    use PDO;

    class TaskRepository implements TaskRepositoryInterface {
        
        private PDO $pdo;
        
        public function __construct(PDO $pdo) {
            $this->pdo = $pdo;
        }
        
        public function save(Task $task): Task {
            if ($task->getId() === null) {
                // Insert new task
                $sql = "INSERT INTO tasks (opportunity_id, title, description, deadline, order_index, target_skill) 
                        VALUES (:opportunity_id, :title, :description, :deadline, :order_index, :target_skill)";
                
                $stmt = $this->pdo->prepare($sql);
                $stmt->execute([
                    ':opportunity_id' => $task->getOpportunityId(),
                    ':title' => $task->getTitle(),
                    ':description' => $task->getDescription(),
                    ':deadline' => $task->getDeadLine(),
                    ':order_index' => $task->getOrderIndex(),
                    ':target_skill' => $task->getTargetSkill()
                ]);
                
                $task->setId((int) $this->pdo->lastInsertId());
            } else {
                $sql = "UPDATE tasks 
                        SET opportunity_id = :opportunity_id,
                            title = :title,
                            description = :description,
                            deadline = :deadline,
                            order_index = :order_index,
                            target_skill = :target_skill
                        WHERE id = :id";
                
                $stmt = $this->pdo->prepare($sql);
                $stmt->execute([
                    ':id' => $task->getId(),
                    ':opportunity_id' => $task->getOpportunityId(),
                    ':title' => $task->getTitle(),
                    ':description' => $task->getDescription(),
                    ':deadline' => $task->getDeadLine(),
                    ':order_index' => $task->getOrderIndex(),
                    ':target_skill' => $task->getTargetSkill()
                ]);
            }

            return $task;
        }
        
        public function findById(int $id): ?Task {
            $sql = "SELECT * FROM tasks WHERE id = :id";
            
            $stmt = $this->pdo->prepare($sql);
            $stmt->execute([':id' => $id]);
            
            $result = $stmt->fetch(PDO::FETCH_ASSOC);
            
            if ($result === false) {
                return null;
            }
            
            return Task::taskFromArray($result);
        }
        
        public function findByOpportunity(int $opportunityId): array {
            $sql = "SELECT * FROM tasks WHERE opportunity_id = :opportunity_id ORDER BY order_index ASC";
            
            $stmt = $this->pdo->prepare($sql);
            $stmt->execute([':opportunity_id' => $opportunityId]);
            
            $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
            
            $tasks = [];
            foreach ($results as $result) {
                $tasks[] = Task::taskFromArray($result);
            }
            
            return $tasks;
        }

        public function createResource (int $task_id, string $title, string $type, string $link, string $generated_by_ai) {
            $sql = "INSERT INTO resources (task_id, title, type, link, generated_by_ai) 
            VALUES (:task_id, :title, :type, :link, :generated_by_ai)";
            
            $stmt = $this->pdo->prepare($sql);
            $stmt->execute([
                ':task_id' => $task_id,
                ':title' => $title,
                ':link' => $link,
                ':type' => $type,
                ':generated_by_ai' => $generated_by_ai
            ]);
        }

        public function getResources ($task_id) {
            $sql = "select * from resources where task_id = :task_id";
            
            $stmt = $this->pdo->prepare($sql);

            $stmt->execute([
                ':task_id' => $task_id
            ]);

            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        }
    }
