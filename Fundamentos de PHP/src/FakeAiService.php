<?php

namespace App;

class FakeAiService  implements AIServiceInterface
{
    public function getResponse(array $messages): string
    {
        sleep(2);

        $lastMessage = end($messages);
        $question = $lastMessage['content'];

        if (strpos(strtolower($question), 'php') !== false) {
            return 'Ai: Claro, puedo ayudarte con PHP.';
        } else if (strpos($question, 'Hola') !== false) {
            return 'Ai: Hola Sr en que te puedo ayudar';
        }  else {
            return 'AI: Solo puedo responder preguntas sobre PHP.';
        }
        
    }
};