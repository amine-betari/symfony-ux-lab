<?php

namespace App\Twig\Components;

use Symfony\UX\TwigComponent\Attribute\AsTwigComponent;

#[AsTwigComponent]
final class ArticleCard
{
    /** @var array{slug: string, title: string, excerpt: string, category: string, readingTime: int, icon: string, accent: string} */
    public array $article = [];
}
