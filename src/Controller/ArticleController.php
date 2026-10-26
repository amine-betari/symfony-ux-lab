<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class ArticleController extends AbstractController
{
    /** @var list<array{slug: string, title: string, excerpt: string, content: string, category: string, readingTime: int, icon: string, accent: string}> */
    private const ARTICLES = [
        [
            'slug' => 'comprendre-twig',
            'title' => 'Comprendre le rôle de Twig dans Symfony',
            'excerpt' => 'Séparer la préparation des données PHP de leur présentation HTML.',
            'content' => 'Le contrôleur prépare les données. Twig les transforme en HTML grâce à une syntaxe volontairement limitée. Cette séparation rend les pages plus faciles à lire, à tester et à faire évoluer.',
            'category' => 'Twig',
            'readingTime' => 4,
            'icon' => 'T',
            'accent' => '#7f56d9',
        ],
        [
            'slug' => 'premiers-composants',
            'title' => 'Pourquoi créer des composants réutilisables ?',
            'excerpt' => 'Repérer le HTML répété avant de découvrir Twig Components.',
            'content' => 'Une interface finit souvent par répéter les mêmes cartes, boutons ou alertes. Nous allons d’abord observer cette répétition en Twig classique, puis la supprimer avec un véritable composant.',
            'category' => 'Architecture',
            'readingTime' => 6,
            'icon' => 'C',
            'accent' => '#1570ef',
        ],
        [
            'slug' => 'interface-interactive',
            'title' => 'Ajouter de l’interactivité sans framework lourd',
            'excerpt' => 'Préparer le terrain pour Stimulus puis Symfony UX Live Components.',
            'content' => 'Stimulus enrichit le HTML dans le navigateur. Live Components permet ensuite de recalculer une partie de l’interface avec Symfony. Chaque outil répond à un besoin différent.',
            'category' => 'Symfony UX',
            'readingTime' => 5,
            'icon' => 'UX',
            'accent' => '#039855',
        ],
    ];

    #[Route('/', name: 'app_home', methods: ['GET'])]
    public function home(): Response
    {
        return $this->redirectToRoute('app_articles');
    }

    #[Route('/articles', name: 'app_articles', methods: ['GET'])]
    public function index(): Response
    {
        return $this->render('article/index.html.twig', [
            'articles' => self::ARTICLES,
        ]);
    }

    #[Route('/articles/{slug}', name: 'app_article_show', methods: ['GET'])]
    public function show(string $slug): Response
    {
        foreach (self::ARTICLES as $article) {
            if ($article['slug'] === $slug) {
                return $this->render('article/show.html.twig', [
                    'article' => $article,
                ]);
            }
        }

        throw $this->createNotFoundException('Article introuvable.');
    }
}
