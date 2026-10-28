<?php

namespace App\Twig\Components;

use Symfony\UX\TwigComponent\Attribute\AsTwigComponent;

#[AsTwigComponent]
final class ArticleCard
{
    public string $slug;
    public string $title;
    public string $excerpt;
    public string $category;
    public int $readingTime;
    public string $icon;
    public string $accent;
    public string $variant = 'default';
}
