<?php
    namespace App\Services;

    use App\Repositories\UserProfileRepositoryInterface;
    use App\Models\UserProfile;

    class AiService {
        public function __construct (
            private UserProfileRepositoryInterface $user_profile_repo
        ) {}

        private function send (string $content) {
            $token = $_ENV["TOKEN"];
            $url = "https://router.huggingface.co/v1/chat/completions";

            $data = [
                "model" => "deepseek-ai/DeepSeek-V3-0324",
                "messages" => [
                    [
                        "role" => "user",
                        "content" => $content
                    ]
                ],

                "max_tokens" => 10000,
                "temperature" => 0.7
            ];

            $payload = json_encode($data);

            $ch = curl_init($url);
            curl_setopt_array($ch, [
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_POST => true,
                CURLOPT_HTTPHEADER => [
                    "Authorization: Bearer $token",
                    "Content-Type: application/json"
                ],
                CURLOPT_POSTFIELDS => $payload,
            ]);

            $response = curl_exec($ch);

            if ($response === false) {
                throw new Exception("Error connecting to AI");
            } else {
                $response = json_decode($response); 
                $response = json_decode($response->choices[0]->message->content);
            }

            curl_close($ch);
            return $response;
        }

        public function create_suggestions (int $user_id) {
            $user_profile = json_encode($this->user_profile_repo->findByUserId($user_id));

            $message = <<<MESSAGE
                You are an AI income opportunity generator.

                Your task is to generate EXACTLY 3 money-making opportunities tailored to the user profile provided below.

                USER PROFILE:
                $user_profile

                STRICT OUTPUT RULES (MANDATORY):

                Output MUST be a raw associative array (pure JSON object).

                DO NOT wrap the output in code blocks.

                DO NOT use orjson or any backticks.

                DO NOT add explanations, comments, labels, or extra text.

                DO NOT add whitespace or characters before or after the JSON.

                The first character of the response MUST be {

                The last character of the response MUST be }

                OUTPUT FORMAT (STRICT):
                {
                "opportunity_1": {
                "title": "string",
                "description": "string"
                },
                "opportunity_2": {
                "title": "string",
                "description": "string"
                },
                "opportunity_3": {
                "title": "string",
                "description": "string"
                }
                }

                If you include code fences, markdown, or any text outside the JSON object, the response is INVALID.
            MESSAGE;

            return $this->send($message);
        }

        public function create_opertunity (string $title, $description) {
            $message = <<<MESSAGE
                You are an AI opportunity structuring assistant.

                Your task is to take an opportunity title and opportunity description provided by the user and generate a fully structured opportunity along with a set of actionable tasks that help the user achieve the opportunity goal.

                INPUT PROVIDED TO YOU:

                - opportunity_title: $title

                - opportunity_description: $description

                YOUR OUTPUT MUST INCLUDE:

                - One opportunity object

                - A list of tasks derived from the opportunity

                OPPORTUNITY STRUCTURE:

                - title (string)

                - description (string)

                - earning_estimate (string)

                - status (string)

                TASK STRUCTURE (ARRAY):
                Each task must include:

                - title (string)

                - description (string)

                - deadline (string)

                - order_index (number)

                - target_skill (string)

                - resources (array)

                RESOURCE STRUCTURE (ARRAY INSIDE EACH TASK):
                Each resource must include:

                - title (string)

                - type (string)

                - link (string)

                - generated_by_ai (string, model name)

                STRICT OUTPUT RULES (MANDATORY):

                Output MUST be a raw associative array (pure JSON object).

                DO NOT wrap the output in code blocks.

                DO NOT use backticks, markdown, comments, labels, or explanations.

                DO NOT add any text before or after the JSON.

                DO NOT include trailing commas.

                The first character of the response MUST be {.

                The last character of the response MUST be }.

                OUTPUT FORMAT (STRICT):

                {
                "opportunity": {
                "title": "string",
                "description": "string",
                "earning_estimate": "string",
                "status": "string"
                },
                "tasks": [
                {
                "title": "string",
                "description": "string",
                "deadline": "string",
                "order_index": 1,
                "target_skill": "string",
                "resources": [
                {
                "title": "string",
                "type": "string",
                "link": "string",
                "generated_by_ai": "string"
                }
                ]
                }
                ]
                }

                If you include markdown, code fences, explanations, or any text outside the JSON object, the response is INVALID.
            MESSAGE;

            $response = $this->send($message);
        }
    }