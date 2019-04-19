<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Serializer\Normalizer\NormalizerInterface;
use Doctrine\ORM\EntityManagerInterface;
use App\Entity\Pokemon;

/**
 * @Route("/api/pokemon")
 */
class PokemonController
{
    private $normalizer;
    private $entityManager;

    public function __construct(NormalizerInterface $normalizer, EntityManagerInterface $entityManager) {
        $this->normalizer = $normalizer;
        $this->entityManager = $entityManager;
    }

    /**
     * @Route("", methods={"GET"})
     */
    public function get(): JsonResponse
    {
        $pokemon = new Pokemon();
        $pokemon->setId(1);
        $pokemon->setName("bulbasaur");
        $pokemon->setWeight(67);

        $response = $this->normalizer->normalize($pokemon, 'json');

        return new JsonResponse($response);
    }

    /**
     * @Route("", methods={"POST"})
     */
    public function create(): JsonResponse
    {
        $pokemon = new Pokemon();
        $pokemon->setName("bulbasaur");
        $pokemon->setWeight(67);

        $this->entityManager->persist($pokemon);
        $this->entityManager->flush();

        $response = $this->normalizer->normalize($pokemon, 'json');

        return new JsonResponse($response);
    }
}
