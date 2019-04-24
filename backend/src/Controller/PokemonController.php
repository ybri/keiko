<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class PokemonController
{
    /**
     * @Route("/pokemon")
     *
     * @return Response
     */
    public function helloWorld(): Response
    {
        return new Response('Hello World');
    }
}
