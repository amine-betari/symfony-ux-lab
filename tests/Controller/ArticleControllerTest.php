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
        self::assertSelectorTextContains('h1', 'favori interactif');
        self::assertCount(3, $crawler->filter('.article-card'));
        self::assertCount(3, $crawler->filter('[data-card-index]'));
        self::assertCount(1, $crawler->filter('.article-card--featured'));
        self::assertCount(3, $crawler->filter('.article-card__actions'));
        self::assertCount(1, $crawler->filter('.article-card__badge'));
        self::assertSame('Choix de la rédaction', $crawler->filter('.article-card__badge')->text());
        self::assertSame('Découvrir l’article →', trim($crawler->filter('.article-card')->first()->filter('.article-card__link')->text()));
        self::assertSame('Lire l’article →', trim($crawler->filter('.article-card')->eq(1)->filter('.article-card__link')->text()));
        self::assertCount(1, $crawler->filter('[data-controller="favorite"]'));
        self::assertSame('comprendre-twig', $crawler->filter('[data-controller="favorite"]')->attr('data-favorite-key-value'));
        self::assertCount(1, $crawler->filter('[data-action="favorite#toggle"]'));
        self::assertCount(1, $crawler->filter('[data-favorite-target="button"]'));
        self::assertCount(1, $crawler->filter('[data-favorite-target="label"]'));
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
