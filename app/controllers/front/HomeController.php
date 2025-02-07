<?php

namespace App\Controllers\Front;

use App\Core\View;
use App\Models\User;
use App\Models\Article;

class HomeController
{
    public function index()
    {
        $userModel = new User();
        $users = $userModel->getAll();

        $articleModel = new Article();
        $articles = $articleModel->getAll();

        $data = [
            'title' => 'Bienvenue sur la page d\'accueil',
            'content' => 'Ceci est le contenu de la page d\'accueil.',
            'users' => $users,
            'articles' => $articles
        ];

        echo View::render('front/home.twig', $data);
    }
}