<?php
    namespace App\Services;

    use App\Models\UserProfile;

    class AiService {
        private static function send (string $content) {
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

        public static function create_suggestions (int $user_id, UserProfile $user_profile, string $interest) {
            $user_profile = json_encode($user_profile);

            $message = <<<MESSAGE
                You are an AI income opportunity generator.

                Your task is to generate EXACTLY 3 money-making opportunities tailored to the user profile provided below.

                USER PROFILE:
                $user_profile

                USER INTERESTS:
                $interest

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

            return self::send($message);
        }

        public static function create_opportunity (string $title, $description, string $current_date) {
            $message = <<<MESSAGE
                You are an AI opportunity structuring assistant.

                Your task is to take an opportunity title and opportunity description and the current date (to start planning from) provided by the user and generate a fully structured opportunity along with a set of actionable tasks that help the user achieve the opportunity goal.

                INPUT PROVIDED TO YOU:

                - opportunity_title: $title

                - opportunity_description: $description

                - current_date: $current_date

                YOUR OUTPUT MUST INCLUDE:

                - One opportunity object

                - A list of tasks derived from the opportunity

                OPPORTUNITY STRUCTURE:

                - title (string)

                - description (string)

                - earning_estimate (string)

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

            return self::send($message);
        }
    }