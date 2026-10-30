# Symfony UX Lab

Formation progressive consacrée à Twig, Twig Components, Stimulus et Symfony UX Live Components.

## Chapitre 1 — Twig classique

Le premier exemple est volontairement construit avec du Twig classique :

- un contrôleur PHP fournit trois articles en mémoire ;
- `/articles` affiche les cartes avec une boucle Twig ;
- `/articles/{slug}` affiche un article ;
- aucun Twig Component, Stimulus ou Live Component n'est encore utilisé.

Cette base permettra de voir précisément ce que Twig Components améliorera au chapitre suivant.

## Chapitre 2 — Twig Components

La carte d'article est extraite dans un composant réutilisable :

```twig
<twig:ArticleCard :article="article" />
```

La classe `ArticleCard` déclare la donnée reçue. Le template du composant possède le HTML de la carte. Le contrôleur ne change pas et la page conserve uniquement la boucle.

## Chapitre 4 — Slots

Le composant fournit un slot `actions` avec un lien par défaut. La première carte remplace uniquement cette zone par un lien personnalisé et un badge, sans dupliquer la structure complète de `ArticleCard`.

## Chapitre 5 — Stimulus

La première carte utilise un contrôleur `favorite`. Un clic modifie le libellé du bouton sans recharger la page et son état est conservé dans le navigateur avec `localStorage`.

## Installation

Installer les dépendances :

```bash
docker run --rm \
  --user "$(id -u):$(id -g)" \
  -e COMPOSER_HOME=/tmp/composer \
  -v "$PWD:/app" \
  -w /app \
  composer:2 install
```

Démarrer l'application :

```bash
docker compose up -d
```

Ouvrir <http://localhost:8480/articles>.

## Tests

```bash
docker compose exec app php bin/phpunit
```

## Articles techniques

1. [Symfony et Twig classique : construire un mini-blog avant les composants](docs/articles/01-symfony-twig-classique-mini-blog.md)
2. [Symfony UX Twig Components : extraire une carte d'article réutilisable](docs/articles/02-symfony-ux-twig-components-article-card.md)
3. [Symfony UX Twig Components : props typées, attributs HTML et variantes](docs/articles/03-twig-components-props-attributs-variantes.md)
4. [Symfony UX Twig Components : personnaliser un composant avec les slots](docs/articles/04-twig-components-slots.md)
5. [Symfony UX Stimulus : créer un favori sans recharger la page](docs/articles/05-stimulus-favori-localstorage.md)

## Article WordPress

1. [Symfony UX Twig Components : créer une carte d’article réutilisable](https://www.abetari.com/symfony-ux-twig-components-carte-article-reutilisable/)
2. [Symfony UX Twig Components : props typées, attributs HTML et variantes](https://www.abetari.com/symfony-ux-twig-components-props-attributs-variantes/)
3. [Symfony UX Twig Components : personnaliser un composant avec les slots](https://www.abetari.com/symfony-ux-twig-components-personnaliser-composant-slots/)
4. [Symfony UX Stimulus : créer un favori sans recharger la page](https://www.abetari.com/symfony-ux-stimulus-favori-localstorage/)

## Parcours prévu

1. Twig classique
2. Twig Components
3. Props, attributs et variantes
4. Slots et composition
5. Stimulus
6. Tests Twig + Stimulus
7. Live Components
8. `LiveProp` et `LiveAction`
9. Formulaires dynamiques
10. Catalogue et panier interactifs
11. Tests et production
