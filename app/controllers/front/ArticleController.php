<?php

namespace App\Controllers\Front;

use App\Core\View;
use App\Models\Article;

class ArticleController
{
    public function index()
    {
        $articleModel = new Article();
        $articles = $articleModel->getAll();

        $data = [
            'title' => 'Liste des articles',
            'articles' => $articles
        ];

        echo View::render('front/index.twig', $data); // Modification ici
    }

    public function show(string $id)
    {
        $articleModel = new Article();
        $article = $articleModel->getById($id);

        if (!$article) {
            echo "Article non trouvé"; // Gestion simple de l'erreur
            return;
        }

        $data = [
            'title' => $article->getTitle(),
            'article' => $article
        ];

        echo View::render('front/show.twig', $data);
    }
}