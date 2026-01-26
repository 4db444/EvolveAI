<?php

namespace App\Repositories\Interfaces;

use App\Models\Opportunity;

interface OpportunityRepositoryInterface {

    public function save(Opportunity $opportunity) : Opportunity;
    public function findById(int $id): ?Opportunity;
    public function findByUser(int $user_id): array;
    public function changeStatus(int $id, string $status): void;
}