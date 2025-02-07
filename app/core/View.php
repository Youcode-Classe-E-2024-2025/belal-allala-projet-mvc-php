<?php

namespace App\Core;

use Twig\Environment;
use Twig\Loader\FilesystemLoader;

class View
{
    private static $twig;

    public static function getTwig(): Environment
    {
        if (self::$twig === null) {
            $loader = new FilesystemLoader(__DIR__ . '/../views'); 
            self::$twig = new Environment($loader, [
                'cache' => false, 
                'debug' => true, 
            ]);
        }
        return self::$twig;
    }

    public static function render(string $template, array $data = []): string
    {
        try {
            return self::getTwig()->render($template, $data);
        } catch (\Twig\Error\LoaderError | \Twig\Error\RuntimeError | \Twig\Error\SyntaxError $e) {
            return "Erreur lors du rendu du template : " . $e->getMessage();
        }
    }
}