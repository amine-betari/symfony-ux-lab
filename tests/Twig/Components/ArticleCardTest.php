<?php

namespace App\Tests\Twig\Components;

use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;
use Symfony\UX\TwigComponent\Test\InteractsWithTwigComponents;

final class ArticleCardTest extends KernelTestCase
{
    use InteractsWithTwigComponents;

    public function testItRendersAnArticleCard(): void
    {
        self::bootKernel();

        $rendered = $this->renderTwigComponent('ArticleCard', [
            'article' => [
                'slug' => 'tester-un-composant',
                'title' => 'Tester un composant Twig',
                'excerpt' => 'Le composant est rendu indépendamment de la page.',
                'category' => 'Tests',
                'readingTime' => 3,
                'icon' => 'T',
                'accent' => '#7f56d9',
            ],
        ]);

        $crawler = $rendered->crawler();

        self::assertCount(1, $crawler->filter('article.article-card'));
        self::assertSame('Tester un composant Twig', $crawler->filter('h2')->text());
        self::assertSame('/articles/tester-un-composant', $crawler->filter('a')->attr('href'));
    }
}
