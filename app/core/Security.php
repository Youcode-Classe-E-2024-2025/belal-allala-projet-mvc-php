<?php
namespace App\Core;

class Security {

    public static function generateCsrfToken() {
        if (empty($_SESSION['csrf_token'])) {
            $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
        }
        return $_SESSION['csrf_token'];
    }

    public static function validateCsrfToken($token) {
        if (empty($_SESSION['csrf_token']) || $_SESSION['csrf_token'] !== $token) {
            return false;
        }
        return true;
    }

    // Fonction d'échappement XSS (peut-être redondante si Twig est bien configuré)
    public static function xssClean($data) {
        return htmlspecialchars($data, ENT_QUOTES, 'UTF-8');
    }
}