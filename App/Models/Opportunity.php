<?php
namespace App\Models;

class Opportunity{
    private ?int $id;
    private int $user_id;
    private string $title;
    private string $description;
    private string $earning_estimate;
    private string $status;

    public function __construct(?int $id, int $user_id, string $title, string $description, string $earning_estimate, string $status){
        $this->id = $id;
        $this->user_id = $user_id;
        $this->title = $title;
        $this->description = $description;
        $this->earning_estimate = $earning_estimate;
        $this->status = $status;
    }

    //Getters

    public function getId() : ?int {
        return $this->id;
    }

    public function getUser_id() : int {
        return $this->user_id;
    }

    public function getTitle() : string {
        return $this->title;
    }

    public function getDescription() : string {
        return $this->description;
    }

    public function getEarning_estimate() : string {
        return $this->earning_estimate;
    }


    public function getStatus() : string {
        return $this->status;
    }

    //Setters

    public function setId(int $id){
        $this->id = $id;
    }

    public function setUser_id(int $user_id){
        $this->user_id = $user_id;
    }

    public function setTitle(string $title){
        $this->title = $title;
    }

    public function setDescription(string $description){
        $this->description = $description;
    }

    public function setEarning_estimate(string $earning_estimate){
        $this->earning_estimate = $earning_estimate;
    }

    public function setStatus(string $status){
        $this->status = $status;
    }

    public static function OpportunityFromArray (array $opportunity){
        return new self(
            $opportunity["id"],
            $opportunity["user_id"],
            $opportunity["title"],
            $opportunity["description"],
            $opportunity["earning_estimate"],
            $opportunity["status"]
        );
    }
    
}