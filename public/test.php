<?php

use App\Core\Security;
use App\Core\Session;

require_once __DIR__ . '/../vendor/autoload.php';

Session::start();

var_dump($_SESSION);
echo "<br>";
var_dump(Security::generateCsrfToken());