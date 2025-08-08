<?php

namespace App;

interface AIServiceInterface 
{
    public function getResponse(array $messages): string;
}
