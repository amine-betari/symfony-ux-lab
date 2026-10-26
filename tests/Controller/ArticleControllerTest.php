<?php

namespace App\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

final class ArticleControllerTest extends WebTestCase
{
    public function testArticleListUsesClassicTwigMarkup(): void
    {
        $client = static::createClient();
        $crawler = $client->request('GET', '/articles');

        self::assertResponseIsSuccessful();
        self::assertSelectorTextContains('h1', 'mini-blog');
        self::assertCount(3, $crawler->filter('.article-card'));
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
