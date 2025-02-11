<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;

class OpenAIService
{
    public function generateProject($data)
    {
        $response = Http::withHeaders([
            'Authorization' => 'Bearer ' . config('app.openai_api_key'),
        ])
        ->withBody()
        ->post('https://api.openai.com/v1/chat/completions');
    }

    public function getPrompt($data)
    {
        $prompt = 'Eres un generador de proyectos para practicar programación. Usa la siguiente información proporcionada para crear un enunciado claro y conciso sobre el proyecto que se desea desarrollar. Incluye objetivos específicos y detalla las características principales.';
        
    }
}