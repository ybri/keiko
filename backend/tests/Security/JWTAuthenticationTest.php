<?php

declare(strict_types=1);

namespace App\Tests\Security;

use App\Tests\AuthenticationTrait;
use App\Tests\FixtureAwareCaseTrait;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;
use Symfony\Component\HttpFoundation\Response;

class JWTAuthenticationTest extends WebTestCase
{
    use FixtureAwareCaseTrait;

    use AuthenticationTrait;

    private $client;

    public function setUp()
    {
        $this->client = static::createClient();
        static::loadFixtures('jwt_authentication.yaml');
    }

    /**
     * @test
     */
    public function itShouldAuthenticateTheUser()
    {
        // Without any JWT, the request should be unauthorized

        $this->client->request(
            'GET',
            '/users'
        );
        $this->assertEquals(Response::HTTP_UNAUTHORIZED, $this->client->getResponse()->getStatusCode());

        // With a JWT, it should pass
        $authenticatedClient = $this->authenticateClient($this->client, 'jean_mousquetaire', 'lolilol');
        $authenticatedClient->request(
            'GET',
            '/users'
        );
        $this->assertTrue($authenticatedClient->getResponse()->isOk());
        $this->assertFalse($authenticatedClient->getResponse()->isEmpty());
    }
}
