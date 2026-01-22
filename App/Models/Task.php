<?php  
namespace App\Models;

class Task {
    private ?int $id;
    private int $opportunityId;
    private string $title;
    private string $description;
    private string $deadLine;
    private int $orderIndex;
    private string $targetSkill;

    public function __construct(?int $id, int $opportunityId, string $title, string $description, string $deadLine, int $orderIndex, string $targetSkill){

     $this->id = $id;
     $this->opportunityId = $opportunityId;
     $this->title = $title;
     $this->description = $description;
     $this->deadLine = $deadLine;
     $this->orderIndex = $orderIndex;
     $this->targetSkill =$targetSkill;
}
 // Getters
    public function getId(): ?int {
        return $this->id;
    }
    
    public function getOpportunityId(): int {
        return $this->opportunityId;
    }
    
    public function getTitle(): string {
        return $this->title;
    }
    
    public function getDescription(): string {
        return $this->description;
    }
    
    public function getDeadLine(): string {
        return $this->deadLine;
    }
    
    public function getOrderIndex(): int {
        return $this->orderIndex;
    }
    
    public function getTargetSkill(): string {
        return $this->targetSkill;
    }
    
    // Setters
    public function setId(int $id): void {
        $this->id = $id;
    }
    
    public function setOpportunityId(int $opportunityId): void {
        $this->opportunityId = $opportunityId;
    }
    
    public function setTitle(string $title): void {
        $this->title = $title;
    }
    
    public function setDescription(string $description): void {
        $this->description = $description;
    }
    
    public function setDeadLine(string $deadLine): void {
        $this->deadLine = $deadLine;
    }
    
    public function setOrderIndex(int $orderIndex): void {
        $this->orderIndex = $orderIndex;
    }
    
    public function setTargetSkill(string $targetSkill): void {
        $this->targetSkill = $targetSkill;
    }

    public static function taskFromArray(array $task): self {
        return new self(
            $task["id"] ?? null,
            $task["opportunity_id"],
            $task["title"],
            $task["description"],
            $task["deadline"],
            $task["order_index"],
            $task["target_skill"]
        );
    }

}