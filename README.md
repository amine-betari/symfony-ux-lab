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

## Parcours prévu

1. Twig classique
2. Twig Components
3. Props, attributs et variantes
4. Stimulus
5. Tests Twig + Stimulus
6. Live Components
7. `LiveProp` et `LiveAction`
8. Formulaires dynamiques
9. Catalogue et panier interactifs
10. Tests et production
