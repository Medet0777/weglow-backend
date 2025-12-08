<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class SupportChatController extends Controller
{
    public function chat(Request $request)
    {
        $message = $request->input('question');

        if (!$message) {
            return response()->json(['answer' => 'Введите вопрос.']);
        }

        $apiKey = config('services.openrouter.api_key');
        $model = config('services.openrouter.model');
        $baseUrl = config('services.openrouter.base_url');
        $systemPrompt = config('services.openrouter.system_prompt');

        try {
            $response = Http::withHeaders([
                'Authorization' => "Bearer $apiKey",
                'Content-Type' => 'application/json',
                'Accept' => 'application/json',
            ])->post("$baseUrl/chat/completions", [
                'model' => $model,
                'messages' => [
                    ['role' => 'system', 'content' => $systemPrompt],
                    ['role' => 'user', 'content' => $message],
                ],
                'temperature' => 0.7,
                'max_tokens' => 500,
            ]);

            $json = $response->json();

            // Логируем корректно
            Log::info("OpenRouter Response:", is_array($json) ? $json : []);

            $answer = 'AI не смог ответить';
            if (!empty($json['choices']) && !empty($json['choices'][0]['message']['content'])) {
                $answer = $json['choices'][0]['message']['content'];
            }

            return response()->json(['answer' => $answer]);
        } catch (\Exception $e) {
            Log::error("AI Error: " . $e->getMessage());
            return response()->json(['answer' => 'Ошибка AI']);
        }
    }
}
