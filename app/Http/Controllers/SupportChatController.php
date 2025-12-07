<?php

namespace App\Http\Controllers;

use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class SupportChatController extends Controller
{
    public function chat(Request $request)
    {
        // Вопрос приходит из Flutter уже с контекстом
        $full_prompt = $request->input('question');

        if (!$full_prompt) {
            return response()->json(['answer' => 'Пожалуйста, введите вопрос.']);
        }

        // Берем токен и модель из config/services.php
        $token = config('services.huggingface.api_token');
        $model = config('services.huggingface.model');

        try {
            $response = Http::withHeaders([
                'Authorization' => "Bearer $token",
            ])->post("https://api-inference.huggingface.co/models/$model", [
                "inputs" => $full_prompt,
                "parameters" => [
                    "max_new_tokens" => 200,
                ],
            ]);

            $answerData = $response->json();

            // Логируем ответ HuggingFace для дебага
            Log::info('HF Response:', (array) $answerData);

            $text = "Извините, я не смог ответить на ваш вопрос.";

            // Обрабатываем разные структуры ответа
            if ($response->successful()) {
                if (is_array($answerData) && isset($answerData[0]['generated_text'])) {
                    $text = trim($answerData[0]['generated_text']);
                } elseif (isset($answerData['generated_text'])) {
                    $text = trim($answerData['generated_text']);
                }
            } else {
                Log::info('HF Full Response:', ['body' => $response->body()]);
            }

            return response()->json(['answer' => $text]);
        } catch (Exception $e) {
            Log::error("Support Chat Error: " . $e->getMessage());
            return response()->json(['answer' => 'Ошибка соединения с AI. Попробуйте позже.']);
        }
    }
}
