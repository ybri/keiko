<?php

namespace App\Service;

use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Validator\Validator\ValidatorInterface;
use Symfony\Component\HttpKernel\Exception\BadRequestHttpException;
use App\Entity\Pokemon;

class PokemonService {

    private $entityManager;
    private $validator;

    public function __construct(EntityManagerInterface $entityManager, ValidatorInterface $validator)
    {
        $this->entityManager = $entityManager;
        $this->validator = $validator;
    }

    public function create(Pokemon $pokemon): Pokemon
    {
        $violations = $this->validator->validate($pokemon);

        if (0 !== count($violations)) {
            throw new BadRequestHttpException($violations);
        }

        $this->entityManager->persist($pokemon);
        $this->entityManager->flush();

        return $pokemon;
    }
}
