<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\Authentication\Token\Storage\TokenStorageInterface;
use Symfony\Component\Serializer\Normalizer\NormalizerInterface;

class UserController extends AbstractController
{
    /**
     * @Route("/auth/me", methods={"GET"})
     *
     * @param NormalizerInterface   $normalizer
     * @param TokenStorageInterface $tokenStorage
     *
     * @return JsonResponse
     */
    public function me(NormalizerInterface $normalizer, TokenStorageInterface $tokenStorage): JsonResponse
    {
        $token = $tokenStorage->getToken();
        if (null === $token) {
            return new JsonResponse(Response::HTTP_UNAUTHORIZED);
        }
        $user = $token->getUser();
        $response = $normalizer->normalize($user, 'json', ['groups' => ['users_read']]);

        return new JsonResponse($response, Response::HTTP_OK);
    }
}
