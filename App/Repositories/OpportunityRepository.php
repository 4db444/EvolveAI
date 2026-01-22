<?php
namespace App\Repositories;
use App\Repositories\Interfaces\OpportunityRepositoryInterface;
use App\Models\Opportunity;
use PDO;

    class OpportunityRepository implements OpportunityRepositoryInterface{
        public function __construct (
            private PDO $pdo
        ){}


        public function save(Opportunity $opportunity): void{

            if($opportunity->getId() === null){

                $stmt = $this->pdo->prepare("INSERT INTO opportunities(user_id, title, description, earning_estimate, status) VALUES(:user_id, :title, :description, :earning_estimate, :status)  ");
                $stmt->execute(
                    [
                        ':user_id'=>$opportunity->getUser_id(),
                        ':title'=>$opportunity->getTitle(),
                        ':description'=>$opportunity->getDescription(),
                        ':earning_estimate'=>$opportunity->getEarning_estimate(),
                        ':status'=>$opportunity->getStatus()
                    ]
                );

                $opportunity->setId($this->pdo->lastInsertId());

            }else{
                $stmt = $this->pdo->prepare("UPDATE opportunities SET user_id = :user_id, title=:title, description = :description, earning_estimate = :earning_estimate, status=:status WHERE id = :id");
                $stmt->execute(
                    [   ':user_id'=>$opportunity->getUser_id(),
                        ':title'=>$opportunity->getTitle(),
                        ':description'=>$opportunity->getDescription(),
                        ':earning_estimate'=>$opportunity->getEarning_estimate(),
                        ':status'=>$opportunity->getStatus()
                    ]
                );
            }

        }


        public function findById(int $id): ?Opportunity{

            $stmt = $this->pdo->prepare("SELECT * FROM Opportunities WHERE id = :id");
            $stmt->execute([
                ':id'=>$id
            ]);

            $opportunity = $stmt->fetch(PDO::FETCH_ASSOC);
            return $opportunity ? Opportunity::OpportunityFromArray($opportunity) : NULL;
        }


        public function findByUser(int $user_id): array{

            $stmt = $this->pdo->prepare("SELECT * FROM Opportunities WHERE user_id = :user_id");
            $stmt->execute(
                [
                    ':user_id'=>$user_id
                ]
            );

            $operunities = [];

            $results = $stmt->fetchAll(\PDO::FETCH_ASSOC);

            foreach($results as $result){
                $operunities[] = Opportunity::OpportunityFromArray($result);
            }

            return $operunities;
             
        }

        public function changeStatus(int $id, string $status) : void{
            $stmt = $this->pdo->prepare("UPDATE opportunities SET status=:status WHERE id = :id");
            $stmt->execute(
                [   
                    ':status'=>$status,
                    ':id'=>$id
                ]
            );
        }
    }
