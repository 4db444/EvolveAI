<?php
    namespace App\Controllers;

    use App\Core\Controller;
    use App\Services\AiService;
    use App\Services\UserProfileService;
    use App\Repositories\UserProfileRepository;
    use App\Repositories\OpportunityRepository;
    use App\Repositories\TaskRepository;
    use App\Repositories\TaskProgressRepository;
    use App\Services\OpportunityService;
    use App\Services\TaskService;
    use App\Services\TaskProgressService;
    use App\Core\Database;
    
    class OpportunityController extends Controller{

        public function show (int $id) {
            $opportunity_service = new OpportunityService(new OpportunityRepository(Database::get_instance()));
            $task_service = new TaskService(new TaskRepository(Database::get_instance()));
            $task_progress_service = new TaskProgressService(new TaskProgressRepository(Database::get_instance()));

            $opportunity = $opportunity_service->getById($id);
            $tasks = $task_service->getTasksByOpportunity($opportunity->getId());
            
            foreach($tasks as $task){
                $task->progress = $task_progress_service->getTaskProgressByTaskId($task->getId());
                $task->resources = $task_service->getResources($task->getId()); 
            }
            

            $this->render("tasks", [
                "opportunity" => $opportunity,
                "tasks" => $tasks,
                "currentTaskFound" => false
            ]);
        }

        public function opportunity(){
            $opportunity_service = new OpportunityService(new OpportunityRepository(Database::get_instance()));
            $opportunities = $opportunity_service->getByUserId($_SESSION["user"]->getId());
            return $this->render("opportunity", [
                'opportunities' => $opportunities,
                "user" => $_SESSION["user"]
            ]);
        }

        public function suggestions (string $user_interest) {
            $user_profile = new UserProfileService(new UserProfileRepository(Database::get_instance()));

            $opportunities_suggestions = AiService::create_suggestions($_SESSION["user"]->getId(), $user_profile->findByUserId($_SESSION["user"]->getId()), $user_interest);
            
            $this->render("opportunity", [ "opportunities_suggestions" => $opportunities_suggestions]);
        }
            
        public function commit (string $title, string $description) {
            $opportunity_service = new OpportunityService(new OpportunityRepository(Database::get_instance()));
            $task_service = new TaskService(new TaskRepository(Database::get_instance()));
            $task_progress_service = new TaskProgressService(new TaskProgressRepository(Database::get_instance()));

            $response = AiService::create_opportunity($title, $description, (new \DateTime())->format("Y-m-d"));
            
            $opportunity = $response->opportunity;
            $tasks = $response->tasks;

            $opportunity = $opportunity_service->createOpportunity(
                $_SESSION["user"]->getId(),
                $opportunity->title,

                $opportunity->description,
                $opportunity->earning_estimate
            );

            foreach($tasks as $task){

                $saved_task = $task_service->save(
                    $opportunity->getId(), 
                    $task->title, 
                    $task->description, 
                    $task->deadline,
                    $task->order_index, 
                    $task->target_skill
                );

                foreach($task->resources as $resource){
                    $task_service->createResource(
                        $saved_task->getId(),
                        $resource->title,
                        $resource->type,
                        $resource->link,
                        $resource->generated_by_ai
                    );
                }

                $task_progress_service->save($saved_task->getId(), false, null, null);
            }
            
            $this->redirect("/opportunity");
        }
    }