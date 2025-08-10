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

// 2️⃣ Fonction pour vérifier si l'utilisateur est connecté
function isLoggedIn() {
    return isset($_SESSION['user_logged_in']) && $_SESSION['user_logged_in'] === true;
}

// 3️⃣ Gestion de la connexion (traitement du formulaire de login)
if ($path === '/logingestionnaire' && $_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'] ?? '';
    $password = $_POST['password'] ?? '';
    
    // Lire les données utilisateur depuis db.json
    $dbFile = __DIR__ . '/../db.json';
    if (file_exists($dbFile)) {
        $dbData = json_decode(file_get_contents($dbFile), true);
        $users = $dbData['users'] ?? [];
        
        // Vérifier les identifiants
        foreach ($users as $user) {
            if ($user['username'] === $username && $user['password'] === $password) {
                // Connexion réussie
                $_SESSION['user_logged_in'] = true;
                $_SESSION['user_id'] = $user['id'];
                $_SESSION['username'] = $user['username'];
                
                // Redirection vers le dashboard
                header('Location: /dashboard');
                exit;
            }
        }
        
        // Connexion échouée - stocker le message d'erreur
        $_SESSION['login_error'] = 'Nom d\'utilisateur ou mot de passe incorrect !';
    } else {
        $_SESSION['login_error'] = 'Erreur système - base de données non trouvée';
    }
    
    // Redirection vers la page de connexion avec erreur
    header('Location: /logingestionnaire');
    exit;
}

// 4️⃣ Gestion de la déconnexion
if ($path === '/retour') {
    // Détruire la session
    session_unset();
    session_destroy();
    
    // Redirection vers la page d'accueil
    header('Location: /');
    exit;
}

// 5️⃣ Routes des pages avec protection
$routes = [
    '/'                 => '../views/acceuil.php',
    '/logingestionnaire'=> '../views/logingestionnaire.php',
    '/dashboard'        => '../views/dashboard.php',
    '/colis'            => '../views/colis.php',
    '/suivi'            => '../views/suivi.php',
    '/cargaison'        => '../views/cargaison.php',
    '/transport'        => '../views/transport.php',
];

// 6️⃣ Routes protégées (nécessitent une connexion)
$protectedRoutes = [
    '/dashboard',
    '/colis', 
    '/cargaison',
    '/transport'
];

// 7️⃣ Vérification de l'accès aux routes protégées
if (in_array($path, $protectedRoutes) && !isLoggedIn()) {
    // Redirection vers la page de connexion si non connecté
    header('Location: /logingestionnaire');
    exit;
}

// 8️⃣ Si déjà connecté et tentative d'accès à la page de login, rediriger vers dashboard
if ($path === '/logingestionnaire' && isLoggedIn()) {
    header('Location: /dashboard');
    exit;
}

// 9️⃣ Chargement de la bonne page
if (array_key_exists($path, $routes)) {
    require_once __DIR__ . '/' . $routes[$path];
} else {
    http_response_code(404);
    echo "404 - Page non trouvée";
}
?>