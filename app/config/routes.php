<?php

use App\Controllers\Front\HomeController;
use App\Controllers\Front\ArticleController;
use App\Controllers\Front\ContactController;

$router = new App\Core\Router();

$router->addRoute('GET', '/', HomeController::class, 'index');
$router->addRoute('GET', '/articles', ArticleController::class, 'index');
$router->addRoute('GET', '/articles/{id}', ArticleController::class, 'show');
$router->get('/contact', ContactController::class, 'index', 'contact.index');
$router->post('/contact', ContactController::class, 'submit', 'contact.submit');

return $router;