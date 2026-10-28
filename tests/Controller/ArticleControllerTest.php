<?php

namespace App\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

final class ArticleControllerTest extends WebTestCase
{
    public function testArticleListRendersTheThreeArticleComponents(): void
    {
        $client = static::createClient();
        $crawler = $client->request('GET', '/articles');

        self::assertResponseIsSuccessful();
        self::assertSelectorTextContains('h1', 'composant configurable');
        self::assertCount(3, $crawler->filter('.article-card'));
        self::assertCount(3, $crawler->filter('[data-card-index]'));
        self::assertCount(1, $crawler->filter('.article-card--featured'));
    }

    public function testArticleDetailCanBeOpened(): void
    {
        $client = static::createClient();
        $client->request('GET', '/articles/comprendre-twig');

        self::assertResponseIsSuccessful();
        self::assertSelectorTextContains('h1', 'Comprendre le rôle de Twig');
    }

    public function testUnknownArticleReturns404(): void
    {
        $client = static::createClient();
        $client->request('GET', '/articles/inconnu');

        self::assertResponseStatusCodeSame(404);
    }
}
