<?php
namespace App\Repositories\Interfaces;
use App\Models\TaskProgress;


interface TaskProgressRepositoryInterface {
    public function save(TaskProgress $taskProgress): TaskProgress;
    public function findById(int $id): ?TaskProgress;
    public function findByTaskId(int $taskId): ?TaskProgress;
}