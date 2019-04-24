<?php

namespace App\Controller;

use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Serializer\Normalizer\NormalizerInterface;
use Symfony\Component\Serializer\SerializerInterface;
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
     * @var SerializerInterface
     */
    private $serializer;

    /**
     * @param NormalizerInterface    $normalizer
     * @param EntityManagerInterface $entityManager
     * @param SerializerInterface    $serializer
     */
    public function __construct(
        NormalizerInterface $normalizer,
        EntityManagerInterface $entityManager,
        SerializerInterface $serializer
    ) {
        $this->normalizer = $normalizer;
        $this->entityManager = $entityManager;
        $this->serializer = $serializer;
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
     * @Route("/{pokemonId}", methods={"GET"})
     *
     * @return JsonResponse
     */
    public function get(string $pokemonId): JsonResponse
    {
        $pokemonRepository = $this->entityManager->getRepository(Pokemon::class);
        $pokemons = $pokemonRepository->findOneById($pokemonId);
        $response = $this->normalizer->normalize($pokemons, 'json');

        return new JsonResponse($response);
    }

    /**
     * @Route("", methods={"POST"})
     *
     * @param Request $request
     *
     * @return Response
     */
    public function create(Request $request): JsonResponse
    {
        $pokemon = $this->serializer->deserialize($request->getContent(), Pokemon::class, 'json');

        $this->entityManager->persist($pokemon);
        $this->entityManager->flush();

        $response = $this->normalizer->normalize($pokemon, 'json');

        return new JsonResponse($response);
    }
}
