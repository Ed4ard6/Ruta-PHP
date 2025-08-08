<?php

namespace App;

class Chat
{
    public function __construct(
        private AIServiceInterface $aiService
        )
    { }
    public function start()
    {
        $this->welcome();

        $messages = [];


        while ($input = $this->prompt()) {
            switch (trim(strtolower($input))) {
                case 'exit':
                case 'salir':
                    echo 'Gracias por estar aqui';
                    break 2;
                /* case '':
                    continue 2; */
            }


            $messages[] = ['role' => 'user', 'content' => $input];

            $response = $this->aiService->getResponse($messages);

            $this->output($response);


            $messages[] = ['role' => 'assistant', 'content' => $response];
        }
    }
    private function welcome()
    {
        echo 'Realiza una pregunta a la IA.' . PHP_EOL;
    }
    private function prompt()
    {
        return readline('>');
    }
    private function output($response)
    {
        echo $response . PHP_EOL;
    }

    public function getResponse(string $question): string
    {
        $messages = [
            ['role' => 'user', 'content' => $question]
        ];

        return $this->aiService->getResponse($messages);
    }
}