<?php

$url = $_SERVER['REQUEST_URI'];
$path = parse_url($url, PHP_URL_PATH);
require __DIR__ . '/../views/logingestionnaire.php';
$routes = [
    '/' => '../views/acceuil.php',
    '/logingestionnaire' => '../views/logingestionnaire.php',
    '/dashboard' => '../views/dashboard.php',
    '/colis' => '../views/colis.php',
    '/suivi' => '../views/suivi.php',
    '/retour' => '../views/acceuil.php',
    '/cargaison' => '../views/cargaison.php',
    '/transport' => '../views/transport.php',
];
if (array_key_exists($path, $routes)) {
    require_once $routes[$path];
} else {
    http_response_code(404);
    echo "404 - Page non trouvée";
}

