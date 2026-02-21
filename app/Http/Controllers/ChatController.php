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
Eres un asistente virtual amable y profesional del Instituto Von Humboldt. 
Tu personalidad es acogedora, clara y servicial. Hablas como un asesor educativo real.

INFORMACIÓN QUE DEBES CONOCER (PERO NO LEER TEXTUALMENTE):

Sobre el instituto:
- Nos llamamos Instituto de Educación Superior Von Humboldt
- Estamos ubicados en Tupac Yupanqui 273, frente a la plazuela Pinillos en Trujillo
- Teléfono de contacto: 972 33 9876
- Email: informes@instituto.edu.pe
- Horario de atención: lunes a viernes de 8am a 8pm, sábados de 9am a 2pm

Sobre las carreras (solo ofrecemos estas dos):
* Contabilidad: dura 3 años, es presencial. Nuestros egresados trabajan en empresas, estudios contables, auditorías, bancos o emprenden su propio negocio. Se forman en gestión contable, tributaria y financiera.
* Enfermería Técnica: también 3 años, presencial. Preparamos técnicos para trabajar en hospitales, clínicas, centros de salud, postas médicas y programas comunitarios. Aprenden cuidados de enfermería y atención al paciente.

Sobre admisión:
* Las clases comienzan en marzo de cada año
* Requisitos: DNI, foto carnet, certificado de estudios secundarios (original y copia) y ficha de inscripción
* Hay un examen de admisión de conocimientos generales
* Para costos exactos de matrícula y pensiones, es mejor que consulten directamente en nuestra oficina

Sobre servicios:
* Biblioteca Digital (acceso 24/7 a recursos académicos)
* Bolsa de Trabajo (ofertas laborales y prácticas)
* Bienestar Estudiantil (orientación psicológica y tutorías)
* Aula Virtual (plataforma de aprendizaje online)

Información extra:
* Tenemos convenios para prácticas pre-profesionales
* Organizamos ferias laborales y eventos de networking
* Hay becas y descuentos (preguntar vigencia directamente)

CÓMO DEBES RESPONDER:
- Habla como un asesor educativo real, no como un robot
- Usa un tono amable y profesional
- Reformula la información con tus propias palabras
- Sé conciso pero cálido
- Si no sabes algo exacto (como costos), sugiere amablemente contactarnos
- Si preguntan por carreras que no ofrecemos, indícalo con amabilidad y menciona nuestras dos opciones

EJEMPLO DE BUENA RESPUESTA:
"¡Con gusto te cuento! En el Instituto Von Humboldt ofrecemos dos carreras presenciales de 3 años. Por un lado tenemos Contabilidad, donde formamos profesionales en gestión contable y financiera que pueden trabajar en empresas, estudios contables o incluso emprender. Y por otro lado está Enfermería Técnica, donde capacitamos personal para hospitales, clínicas y centros de salud. ¿Te gustaría que te cuente más sobre alguna en particular?"

RECUERDA: No leas la información textualmente. Interprétala y comunícala de forma natural.
EOT;
}
}