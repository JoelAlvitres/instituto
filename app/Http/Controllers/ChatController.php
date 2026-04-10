<?php

namespace App\Http\Controllers;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;

class ChatController extends Controller
{
    public function chat(Request $request): JsonResponse
    {
        $validated = $request->validate([
            'message' => ['required', 'string', 'max:2000'],
        ]);

        $mensajeUsuario = Str::squish($validated['message']);
        if ($mensajeUsuario === '') {
            return response()->json([
                'error' => 'Por favor escribe un mensaje',
            ], 422);
        }

        $apiKey = config('services.groq.api_key');
        $model = config('services.groq.model');

        if (empty($apiKey)) {
            Log::error('GROQ_API_KEY no está configurada');

            return response()->json([
                'error' => 'El asistente no está disponible en este momento. Intenta más tarde o contáctanos por teléfono.',
            ], 503);
        }

        try {
            $systemPrompt = $this->getSystemPrompt();

            $response = Http::withHeaders([
                'Authorization' => 'Bearer '.$apiKey,
                'Content-Type' => 'application/json',
            ])->timeout(45)->post('https://api.groq.com/openai/v1/chat/completions', [
                'model' => $model,
                'messages' => [
                    ['role' => 'system', 'content' => $systemPrompt],
                    ['role' => 'user', 'content' => $mensajeUsuario],
                ],
                'temperature' => 0.7,
                'max_tokens' => 1000,
            ]);

            if ($response->failed()) {
                Log::error('Error en Groq AI', [
                    'status' => $response->status(),
                    'body' => $response->body(),
                ]);

                return response()->json([
                    'error' => 'No pudimos obtener respuesta del asistente. Intenta de nuevo en unos segundos.',
                ], 502);
            }

            $respuesta = $response->json();
            $content = data_get($respuesta, 'choices.0.message.content');

            if (! is_string($content) || $content === '') {
                Log::warning('Respuesta Groq sin contenido usable', ['json' => $respuesta]);

                return response()->json([
                    'reply' => 'Lo siento, no pude procesar tu mensaje. ¿Puedes reformular la pregunta?',
                ]);
            }

            return response()->json([
                'reply' => $content,
            ]);
        } catch (\Throwable $e) {
            Log::error('Excepción en ChatController', [
                'message' => $e->getMessage(),
                'trace' => $e->getTraceAsString(),
            ]);

            return response()->json([
                'error' => 'Error interno del servidor',
            ], 500);
        }
    }

    /**
     * Prompt del sistema con información completa del instituto
     */
    private function getSystemPrompt(): string
    {
        return <<<EOT
Eres un asistente virtual amable y profesional del Instituto Von Humboldt. Tu objetivo es ser servicial y claro, manteniendo las respuestas breves y directas al punto.

REGLAS DE RESPUESTA:
- Sé amable y educado, pero conciso (máximo 3-4 frases por respuesta).
- Evita introducciones muy largas, pero puedes saludar brevemente (ej: "¡Hola! Con gusto te ayudo...").
- Proporciona información objetiva y precisa.

INFORMACIÓN INSTITUCIONAL:
- Carreras: Contabilidad y Enfermería Técnica (3 años, presenciales).
- Itinerarios (Horarios de Clase): Ambas carreras se dictan en el Turno Vespertino de 14:00 PM a 19:00 PM.
- Ubicación: Calle Tupac Yupanqui 544-555, Trujillo.
- Contacto: 044-345333 / 044-662953 / Cel: 922022800.
- Horarios de Oficina: Lun-Vie 8am-7pm, Sáb 8am-2pm.
- Admisión 2026: Inicio en marzo. Requisitos: DNI, foto carnet, certificado de secundaria y ficha de inscripción.

CÓMO RESPONDER (EJEMPLO):
Usuario: "¿A qué hora son las clases?"
Respuesta: "¡Hola! Las clases para nuestras carreras de Contabilidad y Enfermería Técnica son en el turno vespertino, de 14:00 PM a 19:00 PM. ¿Deseas saber algo más?"

Usuario: "¿Dónde está el instituto?"
Respuesta: "Con gusto te ayudo. Nos encontramos en Calle Tupac Yupanqui 544-555, en Trujillo, frente a la plazuela Pinillos."
EOT;
    }
}