<?php

namespace App\Controllers\Front;

use App\Core\Controller;
use App\Core\Security;
use App\Core\View;

class ContactController extends Controller
{
    public function index()
    {
        echo View::render('front/contact.twig');
    }

    public function submit()
    {
        if (!Security::validateCsrfToken($_POST['csrf_token'])) {
            // Erreur CSRF
            echo "CSRF token invalid"; // À remplacer par une gestion d'erreur plus élégante
            return;
        }

        // Le token CSRF est valide, on peut traiter les données du formulaire
        $nom = $_POST['nom'];
        $email = $_POST['email'];
        $message = $_POST['message'];

        // Ici, vous devriez valider les données (voir prochaine étape)
        // Et ensuite, traiter le formulaire (par exemple, enregistrer les données dans la base de données, envoyer un email, etc.)

        echo "Formulaire soumis avec succès ! (Nom: " . htmlspecialchars($nom) . ", Email: " . htmlspecialchars($email) . ")"; // Échappez les données pour éviter XSS
    }
}