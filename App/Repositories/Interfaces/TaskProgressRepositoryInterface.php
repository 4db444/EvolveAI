<?php
namespace App\Repositories\Interfaces;
use App\Models\TaskProgress;


interface TaskProgressRepositoryInterface {
    public function save(TaskProgress $taskProgress): void;
    public function findById(int $id): ?TaskProgress;
    public function findByTaskId(int $taskId): ?TaskProgress;
}