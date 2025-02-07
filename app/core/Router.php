<?php

namespace App\Core;

class Router
{
    private $routes = [];

    public function addRoute(string $method, string $path, $controller, string $action)
    {
        $this->routes[$method][$path] = [
            'controller' => $controller,
            'action' => $action
        ];
    }

    public function dispatch(string $method, string $uri)
    {
        $uri = $this->removeTrailingSlash($uri);

        foreach ($this->routes[$method] as $path => $route) {
            // Convertir le chemin de la route en expression régulière
            $pattern = preg_replace('/\{(\w+)\}/', '(?P<$1>[^/]+)', $path);
            $pattern = "#^" . $pattern . "$#";

            // Vérifier si l'URI correspond à l'expression régulière
            if (preg_match($pattern, $uri, $matches)) {
                $controllerName = $route['controller'];
                $actionName = $route['action'];

                // Récupérer les paramètres de l'URL
                $params = array_filter($matches, function ($key) {
                    return is_string($key);
                }, ARRAY_FILTER_USE_KEY);

                // Afficher les paramètres extraits (pour débogage)
                echo "<pre>";
                var_dump($params);
                echo "</pre>";

                // Gérer les contrôleurs (string) et les fonctions anonymes (Closure)
                if (is_string($controllerName)) {
                    $controller = new $controllerName();
                    call_user_func_array([$controller, $actionName], $params);
                } else {
                    // Exécuter la fonction anonyme
                    call_user_func_array($controllerName, $params);
                }

                return; // Arrêter la recherche après avoir trouvé une correspondance
            }
        }

        // Gérer les routes non trouvées
        echo "404 Not Found";
    }

    private function removeTrailingSlash(string $uri): string
    {
        $uri = rtrim($uri, '/');
        return $uri === "" ? "/" : $uri;
    }
}