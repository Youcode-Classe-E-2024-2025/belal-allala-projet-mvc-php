<?php

require_once __DIR__ . '/../vendor/autoload.php';

use Dotenv\Dotenv;
use App\Core\Session;

$dotenv = Dotenv::createImmutable(__DIR__ . '/../');
$dotenv->load();

Session::start(); // Démarrez la session ici, avant tout autre code qui en dépend.

$router = require_once __DIR__ . '/../app/config/routes.php';

$uri = $_SERVER['REQUEST_URI'];
$method = $_SERVER['REQUEST_METHOD'];

$router->dispatch($method, $uri);