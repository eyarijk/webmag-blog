<?php

namespace App\Tests\Functional;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class NewControllerTest extends WebTestCase
{
    public function testNewPageShow(): void
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/new');

        $this->assertEquals(200, $client->getResponse()->getStatusCode());

        $this->assertTrue($crawler->filter('.post-img')->count() > 0);
    }
}
