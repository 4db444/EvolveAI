<?php

namespace App\Repositories\Interfaces;

use App\Models\Task;

interface TaskRepositoryInterface {

    public function save(Task $task): Task;
    public function findById(int $id): ?Task;
    public function findByOpportunity(int $OpportunityId):array;
}