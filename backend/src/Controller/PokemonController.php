<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class PokemonController
{
    /**
     * @Route("/api/pokemon")
     */
    public function sayHello(): Response
    {
        return new Response("Hello World");
    }
}
