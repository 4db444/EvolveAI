<?php
namespace App\Services;

use App\Models\Opportunity;
use App\Repositories\OpportunityRepository;

class OpportunityService{
    private OpportunityRepository $opportunityRepo;

    public function __construct(OpportunityRepository $opportunityRepo)
    {
        $this->opportunityRepo = $opportunityRepo;
    }

    public function createOpportunity(int $user_id , string $title , string $description , string $earning_estimate){

        $opportunity = new Opportunity(
            null,
            $user_id,
            $title,
            $description,
            $earning_estimate,
            'active'
        );

        return $this->opportunityRepo->save($opportunity);
    }

    public function getById(int $id): ?Opportunity{
        return $this->opportunityRepo->findById($id);
    }

    public function getByUserId(int $user_id): array{
        return $this->opportunityRepo->findByUser($user_id);
    }

    public function UpdateStatus(int $id, string $status){
        $this->opportunityRepo->changeStatus($id, $status);
    }
}