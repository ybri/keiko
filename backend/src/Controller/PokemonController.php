<?php

namespace App\Controller;

use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Serializer\Normalizer\NormalizerInterface;
use App\Entity\Pokemon;

/**
 * @Route("/pokemon")
 */
class PokemonController
{
    /**
     * @var NormalizerInterface
     */
    private $normalizer;

    /**
     * @var EntityManagerInterface
     */
    private $entityManager;

    /**
     * @param NormalizerInterface    $normalizer
     * @param EntityManagerInterface $entityManager
     */
    public function __construct(NormalizerInterface $normalizer, EntityManagerInterface $entityManager) {
        $this->normalizer = $normalizer;
        $this->entityManager = $entityManager;
    }

    /**
     * @Route("", methods={"GET"})
     *
     * @return JsonResponse
     */
    public function getAll(): JsonResponse
    {
        $pokemonRepository = $this->entityManager->getRepository(Pokemon::class);
        $pokemons = $pokemonRepository->findAll();
        $response = $this->normalizer->normalize($pokemons, 'json');

        return new JsonResponse($response);
    }

    /**
     * @Route("", methods={"POST"})
     *
     * @return Response
     */
    public function create(): JsonResponse
    {
        $pokemon = new Pokemon();
        $pokemon->setName('jean-michel');
        $pokemon->setWeight(100);
        $pokemon->setHeight(100);

        $this->entityManager->persist($pokemon);
        $this->entityManager->flush();

        $response = $this->normalizer->normalize($pokemon, 'json');

        return new JsonResponse($response);
    }
}
