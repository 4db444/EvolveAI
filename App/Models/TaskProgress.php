<?php

namespace App\Models;

class TaskProgress{
    private int $id;
    private  int $taskId;
    private bool $isCompleted;
    private  string $submitted_result;
    private string $aiFeedback;
    private string $updatedAt;

    public function __construct(int $taskId, bool $isCompleted, string $submitted_result, string $aiFeedback, string $updatedAt){
        $this->taskId = $taskId;
        $this->isCompleted = $isCompleted;
        $this->submitted_result = $submitted_result;
        $this->aiFeedback = $aiFeedback;
        $this->updatedAt = $updatedAt;
    }
    //getters
    public function getId(): int{
        return $this->id;
    }
    public function getTaskId(): int{
        return $this->taskId;
    }
    public function isCompleted(): bool
    {
        return $this->isCompleted;
    }
    public function getSubmittedResult(): string{
        return $this->submitted_result;
    }
    public function getAiFeedback(): string
    {
        return $this->aiFeedback;
    }
    public function getUpdatedAt(): string{
        return $this->updatedAt;
    }
    //setters
    public function setIsCompleted(bool $isCompleted): void
    {
        $this->isCompleted = $isCompleted;
    }
    public function setSubmittedResult(string $submitted_result): void
    {
        $this->submitted_result = $submitted_result;
    }
    public function setAiFeedback(string $aiFeedback): void{
        $this->aiFeedback = $aiFeedback;
    }
    public function setUpdatedAt(string $updatedAt): void{
        $this->updatedAt = $updatedAt;
    }

    public static function TaskProgressFromArray(array $taskProgress){
        return new self(
            $taskProgress["task_id"],
            $taskProgress["is_completed"],
            $taskProgress["submitted_result"],
            $taskProgress["ai_feedback"],
            $taskProgress["updated_at"]
        );
    }


}