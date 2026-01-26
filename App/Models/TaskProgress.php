<?php

namespace App\Models;

class TaskProgress{
    private ?int $id;
    private int $taskId;
    private bool $isCompleted;
    private ?string $submitted_result;
    private ?string $aiFeedback;

    public function __construct(?int $id, int $taskId, bool $isCompleted, ?string $submitted_result, ?string $aiFeedback){
        $this->id = $id;
        $this->taskId = $taskId;
        $this->isCompleted = $isCompleted;
        $this->submitted_result = $submitted_result;
        $this->aiFeedback = $aiFeedback;
    }
    //getters
    public function getId(): ?int{
        return $this->id;
    }
    public function getTaskId(): int{
        return $this->taskId;
    }
    public function isCompleted(): bool
    {
        return $this->isCompleted;
    }
    public function getSubmittedResult(): ?string{
        return $this->submitted_result;
    }
    public function getAiFeedback(): ?string
    {
        return $this->aiFeedback;
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

    public static function TaskProgressFromArray(array $taskProgress){
        return new self(
            $taskProgress["id"],
            $taskProgress["task_id"],
            $taskProgress["completed"],
            $taskProgress["submitted_result"],
            $taskProgress["ai_feedback"]
        );
    }


}