<?php
session_start();

$url = $_SERVER['REQUEST_URI'];
$path = parse_url($url, PHP_URL_PATH);

// 1️⃣ Gestion des fichiers statiques AVANT les routes
if (preg_match('/\.(js|css|png|jpg|jpeg|gif|ico|svg)$/i', $path)) {
    
    // Chemin vers la racine du projet (un niveau au-dessus de public/)
    $projectRoot = dirname(__DIR__);
    
    $fileToServe = null;
    
    // Si le chemin commence par /dist/ → chercher dans le dossier dist/ à la racine
    if (strpos($path, '/dist/') === 0) {
        $distPath = $projectRoot . $path; // ex: /chemin/projet + /dist/login.js
        if (file_exists($distPath)) {
            $fileToServe = $distPath;
        }
    }
    // Sinon chercher dans public/
    else {
        $publicPath = __DIR__ . $path; // ex: /chemin/projet/public + /style.css
        if (file_exists($publicPath)) {
            $fileToServe = $publicPath;
        }
    }

    // Si le fichier est trouvé, on l'envoie
    if ($fileToServe) {
        // Types MIME corrects
        $mimeTypes = [
            'js' => 'text/javascript; charset=utf-8',
            'css' => 'text/css; charset=utf-8',
            'png' => 'image/png',
            'jpg' => 'image/jpeg',
            'jpeg' => 'image/jpeg',
            'gif' => 'image/gif',
            'svg' => 'image/svg+xml',
            'ico' => 'image/x-icon'
        ];
        
        $extension = strtolower(pathinfo($fileToServe, PATHINFO_EXTENSION));
        $mimeType = $mimeTypes[$extension] ?? 'application/octet-stream';
        
        // Headers appropriés
        header('Content-Type: ' . $mimeType);
        header('Content-Length: ' . filesize($fileToServe));
        header('Cache-Control: no-cache'); // Pour le développement
        
        // Envoi du fichier
        readfile($fileToServe);
        exit;
    }

    // Fichier non trouvé
    http_response_code(404);
    header('Content-Type: text/plain');
    echo "Fichier non trouvé: " . htmlspecialchars($path);
    exit;
}

// 2️⃣ Routes des pages (après la gestion des fichiers statiques)
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
?>