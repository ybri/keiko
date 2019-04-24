<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Serializer\Normalizer\NormalizerInterface;
use App\Entity\Pokemon;

class PokemonController
{
    /**
     * @var NormalizerInterface
     */
    private $normalizer;

    /**
     * @param NormalizerInterface $normalizer
     */
    public function __construct(NormalizerInterface $normalizer) {
        $this->normalizer = $normalizer;
    }

    /**
     * @Route("/pokemon")
     *
     * @return JsonResponse
     */
    public function get(): JsonResponse
    {
        $pokemon = new Pokemon();
        $pokemon->setName('jean-michel');
        $pokemon->setWeight(100);
        $pokemon->setHeight(100);

        $response = $this->normalizer->normalize($pokemon, 'json');

        return new JsonResponse($response);
    }
}
