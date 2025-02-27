# Projet MVC PHP

Ce projet est une architecture MVC de base en PHP, conçue pour servir de point de départ à des applications web modernes. Il met l'accent sur la séparation des responsabilités, la réutilisabilité du code et l'utilisation des bonnes pratiques de développement.

## Fonctionnalités

*   **Architecture MVC :** Séparation claire entre les modèles, les vues et les contrôleurs.
*   **Routeur personnalisé :** Gestion avancée des routes avec un routeur personnalisé.
*   **Base de données :** Connexion sécurisée à PostgreSQL via PDO.
*   **Séparation Front Office / Back Office :** Structure de dossiers dédiée pour le Front Office (partie publique) et le Back Office (administration).
*   **Authentification :** Système d'authentification sécurisé avec inscription, connexion et déconnexion des utilisateurs.
*   **Autorisations :** Gestion des rôles et autorisations (ACL) simplifiée pour contrôler l'accès aux différentes parties de l'application.
*   **Moteur de templates :** Utilisation de Twig pour séparer la logique de présentation des vues.
*   **Sécurité :**
    *   Protection CSRF avec des tokens.
    *   Protection contre les injections SQL grâce à l'utilisation de requêtes préparées PDO.
    *   Protection XSS grâce à l'échappement automatique des données dans les templates Twig.
*   **Logs :** Système de logs et de gestion des erreurs basé sur Monolog.
*   **Validation :** Classe Validator pour la validation des données en entrée.
*   **Sessions :** Classe Session pour la gestion avancée des sessions.
*   **.htaccess :** Fichier .htaccess pour la réécriture des URL et la sécurité.
*   **.env :** Fichier .env pour la gestion des variables d'environnement.

## Structure du projet
/projet-mvc-php
├── public/ # Dossier public (accessible via le navigateur)
│ ├── index.php # Point d'entrée de l'application
│ └── .htaccess # Réécriture d'URL et sécurité
├── app/ # Code de l'application
│ ├── controllers/ # Contrôleurs (Logique métier)
│ │ ├── front/ # Contrôleurs du Front Office
│ │ └── back/ # Contrôleurs du Back Office (Admin)
│ ├── models/ # Modèles (Gestion de la base de données)
│ ├── views/ # Fichiers templates pour les vues
│ │ ├── front/ # Vues pour le Front Office
│ │ └── back/ # Vues pour le Back Office (Admin)
│ ├── core/ # Classes principales de l'application
│ ├── config/ # Configuration de l'application
├── logs/ # Logs d'erreurs et d’accès
├── vendor/ # Dépendances (si usage de Composer)
├── .env # Variables d’environnement
├── composer.json # Gestionnaire de dépendances PHP
└── .gitignore # Fichiers à ignorer par Git
## Installation

1.  **Clonez le dépôt :**

    ```bash
    git clone [URL du dépôt]
    ```

2.  **Installez les dépendances avec Composer :**

    ```bash
    composer install
    ```

3.  **Configurez la base de données :**

    *   Créez une base de données PostgreSQL.
    *   Copiez le fichier `.env.example` en `.env` et renseignez les informations de connexion à la base de données.

4.  **Importez le schéma de la base de données :**

    *   [Fournir un fichier SQL avec la structure de la base de données (tables users, roles, permissions, role_permissions)]

5.  **Configurez le serveur web :**

    *   Assurez-vous que votre serveur web pointe vers le dossier `public/` de votre projet.
    *   Activez le module `mod_rewrite` (pour Apache) ou configurez une règle équivalente (pour Nginx).

## Sécurité

Ce projet implémente les mesures de sécurité suivantes :

*   Protection CSRF avec des tokens.
*   Protection contre les injections SQL grâce à l'utilisation de requêtes préparées PDO.
*   Protection XSS grâce à l'échappement automatique des données dans les templates Twig.
*   Le fichier `.htaccess` interdit l'accès aux fichiers sensibles (comme `.env`)