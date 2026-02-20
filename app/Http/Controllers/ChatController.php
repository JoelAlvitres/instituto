<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class ChatController extends Controller
{
    public function chat(Request $request)
    {
        if (!$request->has('message') || empty($request->message)) {
            return response()->json([
                'error' => 'Por favor escribe un mensaje'
            ], 400);
        }

        $mensajeUsuario = $request->message;
        $apiKey = env('OPENROUTER_API_KEY');

        if (!$apiKey) {
            Log::error('OPENROUTER_API_KEY no está configurada');
            return response()->json([
                'error' => 'Error de configuración del servidor'
            ], 500);
        }

        try {
            // Prompt del sistema MEJORADO con información completa
            $systemPrompt = $this->getSystemPrompt();

            $response = Http::withHeaders([
                'Authorization' => 'Bearer ' . $apiKey,
                'HTTP-Referer' => request()->getSchemeAndHttpHost(),
                'X-Title' => 'Instituto Von Humboldt Chatbot',
                'Content-Type' => 'application/json'
            ])->timeout(30)->post('https://openrouter.ai/api/v1/chat/completions', [
                'model' => 'nvidia/nemotron-3-nano-30b-a3b:free',
                'messages' => [
                    ['role' => 'system', 'content' => $systemPrompt],
                    ['role' => 'user', 'content' => $mensajeUsuario]
                ],
                'temperature' => 0.7, // Controla la creatividad (0.0-1.0)
                'top_p' => 0.9, // Nucleus sampling
                'max_tokens' => 800 // Límite de respuesta
            ]);

            if ($response->failed()) {
                Log::error('Error en OpenRouter', [
                    'status' => $response->status(),
                    'body' => $response->body()
                ]);
                
                return response()->json([
                    'error' => 'Error al comunicarse con el servicio'
                ], 500);
            }

            $respuesta = $response->json();
            
            return response()->json([
                'reply' => $respuesta['choices'][0]['message']['content'] ?? 'Lo siento, no pude procesar tu mensaje.'
            ]);

        } catch (\Exception $e) {
            Log::error('Excepción en ChatController', [
                'message' => $e->getMessage(),
                'trace' => $e->getTraceAsString()
            ]);
            
            return response()->json([
                'error' => 'Error interno del servidor'
            ], 500);
        }
    }

    /**
     * Prompt del sistema con información completa del instituto
     */
    private function getSystemPrompt(): string
    {
        return <<<EOT
Eres el asistente virtual OFICIAL del Instituto Von Humboldt. Tu función es proporcionar información precisa y útil sobre el instituto.

INFORMACIÓN INSTITUCIONAL:
- Nombre completo: Instituto de Educación Superior Von Humboldt
- Ubicación: Tupac Yupanqui 273, frente a la plazuela Pinillos - TRUJILLO
- Teléfono: 972 33 9876
- Email: informes@instituto.edu.pe
- Horario de atención: Lunes a Viernes 8:00 AM - 8:00 PM, Sábados 9:00 AM - 2:00 PM

CARRERAS OFRECIDAS (ÚNICAMENTE ESTAS DOS):

1. CONTABILIDAD
   - Duración: 3 años (6 semestres)
   - Modalidad: Presencial
   - Perfil del egresado: Profesional capacitado en gestión contable, tributaria y financiera, con habilidades para administrar recursos empresariales y tomar decisiones estratégicas.
   - Campo laboral: Empresas privadas, estudios contables, auditorías, entidades financieras, sector público, emprendimiento propio.

2. ENFERMERÍA TÉCNICA
   - Duración: 3 años (6 semestres)
   - Modalidad: Presencial
   - Perfil del egresado: Profesional técnico capacitado para brindar cuidados de enfermería en diferentes niveles de atención, promoviendo la salud y previniendo enfermedades.
   - Campo laboral: Hospitales, clínicas, centros de salud, postas médicas, programas de salud comunitaria, cuidados domiciliarios.

PROCESO DE ADMISIÓN:
- Inicio de clases: Marzo de cada año
- Requisitos: DNI, foto carnet, certificado de estudios secundarios (original y copia), ficha de inscripción completa
- Evaluación: Examen de admisión (conocimientos generales y aptitud)
- Inversión: Consultar en oficinas de admisión para información actualizada sobre costos de matrícula y pensiones

SERVICIOS INSTITUCIONALES:
- Biblioteca Digital: Acceso a recursos académicos 24/7
- Bolsa de Trabajo: Ofertas laborales y prácticas profesionales
- Bienestar Estudiantil: Orientación psicológica, tutorías y apoyo social
- Aula Virtual: Plataforma de aprendizaje en línea

INFORMACIÓN ADICIONAL:
- El instituto cuenta con convenios con instituciones aliadas para prácticas pre-profesionales
- Se realizan ferias laborales y eventos de networking
- Hay programas de becas y descuentos (consultar vigencia)

REGLAS DE COMPORTAMIENTO:
1. Responde SIEMPRE en español, de manera profesional, amable y clara.
2. No inventes información. Si no sabes algo, sugiere contactar directamente al instituto.
3. Sé conciso pero completo en tus respuestas.
4. Si preguntan por carreras que no existen, indícalo amablemente y menciona SOLO las dos carreras oficiales.
5. Para información muy específica (costos actualizados, fechas exactas), recomienda contactar a informes@instituto.edu.pe o llamar al 972 33 9876.

RECUERDA: Representas al Instituto Von Humboldt, mantén un tono acogedor y profesional.
EOT;
    }
}