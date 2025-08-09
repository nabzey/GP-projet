<?php

$url = $_SERVER['REQUEST_URI'];
$path = parse_url($url, PHP_URL_PATH);

// 1️⃣ Gestion des fichiers statiques
if (preg_match('/\.(js|css|png|jpg|jpeg|gif|ico|svg)$/i', $path)) {
    $baseDir  = dirname(__DIR__); // Racine du projet
    $distPath = realpath($baseDir . '/dist' . str_replace('/dist', '', $path));
    $publicPath = realpath($baseDir . '/public' . $path);

    $fileToServe = null;

    // Si le chemin commence par /dist → on va chercher dans dist
    if (strpos($path, '/dist/') === 0 && file_exists($distPath)) {
        $fileToServe = $distPath;
    }
    // Sinon on regarde dans public
    elseif (file_exists($publicPath)) {
        $fileToServe = $publicPath;
    }

    // Envoi du fichier si trouvé
    if ($fileToServe) {
        $mimeType = mime_content_type($fileToServe);
        header('Content-Type: ' . $mimeType);
        readfile($fileToServe);
        exit;
    }

    // Sinon erreur 404
    http_response_code(404);
    echo "Fichier non trouvé: " . htmlspecialchars($path);
    exit;
}

// 2️⃣ Routes des pages
$routes = [
    '/'                 => '../views/acceuil.php',
    '/logingestionnaire'=> '../views/logingestionnaire.php',
    '/dashboard'        => '../views/dashboard.php',
    '/colis'            => '../views/colis.php',
    '/suivi'            => '../views/suivi.php',
    '/retour'           => '../views/acceuil.php',
    '/cargaison'        => '../views/cargaison.php',
    '/transport'        => '../views/transport.php',
];

// 3️⃣ Chargement de la bonne page
if (array_key_exists($path, $routes)) {
    require_once __DIR__ . '/' . $routes[$path];
} else {
    http_response_code(404);
    echo "404 - Page non trouvée";
}
