<?php

declare(strict_types=1);

namespace App\Tests;

use Symfony\Bundle\FrameworkBundle\Client;

trait AuthenticationTrait
{
    /**
     * Create a client with a default Authorization header.
     *
     * @param Client $client
     * @param string $username
     * @param string $password
     *
     * @return \Symfony\Bundle\FrameworkBundle\Client
     */
    protected function authenticateClient(Client $client, string $username = 'jean_moust', string $password = 'lolilol'): Client
    {
        $client->request(
            'POST',
            '/auth/jwt/create',
            [],
            [],
            ['CONTENT_TYPE' => 'application/json'],
            sprintf('{"username": "%s", "password": "%s"}', $username, $password)
        );

        $this->assertTrue($client->getResponse()->isOk(), 'Authentication failed, check that the provided credentials are valid and that the authentication works.');

        $data = json_decode($client->getResponse()->getContent(), true);

        $client->setServerParameter('HTTP_Authorization', sprintf('Bearer %s', $data['token']));

        return $client;
    }
}
