<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;

class PokemonController
{
    public function sayHello(): Response
    {
        return new Response("Hello World");
    }
}
