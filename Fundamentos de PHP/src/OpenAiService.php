<?php

namespace App;

use OpenAI; // Importa la clase OpenAI
use OpenAI\Exceptions\AuthenticationException; // Importa la excepción de autenticación
use OpenAI\Exceptions\ErrorException; // Importa la excepción de error general
use OpenAI\Exceptions\RateLimitException; // Importa la excepción de límite de tasa
use InvalidArgumentException;

class OpenAiService implements AIServiceInterface
{
    protected $client;
    protected array $systemMessage = [
        'role' => 'system', 'content' => <<<EOT
            Eres un asistente especializado exclusivamente con PHP.
            -si te preguntan algo que no este relacionado con PHP, responde "No puedo ayudarte con eso".
            -si te preguntan algo relacionado con PHP, responde de forma breve y consisa. Sin rodeos
            Responde siempre en español.
        EOT
    ];

    public function __construct()
    {
       $apiKey = $_ENV['OPENAI_API_KEY'] ?? null;
       if ($apiKey === null) {
           // Lanzar una excepción es más limpio y estándar que usar die().
           throw new InvalidArgumentException("La variable de entorno OPENAI_API_KEY no está definida en tu archivo .env");
       }

       $this->client = OpenAI::client($apiKey);
    }

    public function getResponse(array $messages): string
    {
        $payload = array_merge([$this->systemMessage], $messages);

        try {
            $result = $this->client->chat()->create([
                'model' => 'gpt-4o-mini',
                'messages' => $payload,
            ]);
            return $result->choices[0]->message->content ?? 'Lo siento, no pude generar una respuesta.';
        } catch (AuthenticationException $e) {
            // Error de autenticación: clave inválida, sin crédito, etc.
            return "Error de API: Autenticación fallida. Verifica tu API Key o tu plan de facturación de OpenAI.";
        } catch (RateLimitException $e) {
            // Se ha excedido el límite de peticiones.
            return "Error de API: Has excedido tu cuota de peticiones. Por favor, espera un momento.";
        } catch (ErrorException $e) {
            // Otros errores de la API de OpenAI.
            return "Error de API: " . $e->getMessage();
        }
    }
}