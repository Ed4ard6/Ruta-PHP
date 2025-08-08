<?php

namespace App;

use ArdaGnsrn\Ollama\Ollama;
use GuzzleHttp\Exception\GuzzleException;

class OllamaAiService  implements AIServiceInterface
{
    protected $client;
    protected array $systemMessage = [
        'role' => 'system',
        'content' => 'Eres un asistente de IA. Responde a la pregunta del usuario de forma concisa y directa. No repitas la conversación anterior en tu respuesta y vas a responder unicamente en español.'
    ];

    public function __construct()
    {
        $ollamaHost = $_ENV['OLLAMA_HOST'] ?? 'http://localhost:11434';
        $this->client = Ollama::client($ollamaHost);
    }

    // Modificamos esta función para que reciba un array de mensajes
    public function getResponse(array $messages): string
    {
        $payload = array_merge([$this->systemMessage], $messages);

        try {
            // El array de 'messages' ya contiene todo el historial
            $result = $this->client->chat()->create([
                'model' => 'deepseek-r1:1.5b',
                'messages' => $payload, // Pasamos el array completo con el mensaje de sistema
            ]);

            return $result->message->content;
        } catch (GuzzleException $e) {
            return "Error al conectar con el servicio de Ollama: " . $e->getMessage();
        }
    }
}