<?php

require_once __DIR__ . '/../backend/vendor/autoload.php';
require_once __DIR__ . '/../backend/helpers/escape.php';
$routes = require __DIR__ . '/../backend/routes/web.php';

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__ . '/../backend');
$dotenv->load();

require_once __DIR__ . "/../backend/config/connect.php";

$basePath = rtrim(dirname($_SERVER['SCRIPT_NAME']), '/\\');
$requestPath = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

if ($basePath !== '' && strpos($requestPath, $basePath) === 0) {
    $requestPath = substr($requestPath, strlen($basePath));
}
if ($requestPath === '') {
    $requestPath = '/';
}

// $wikiSubPath = null;
// if (strpos($requestPath, '/wiki') === 0) {
//     $view = 'wiki';

//     $wikiSubPath = substr($requestPath, 5);
//     $wikiSubPath = ltrim($wikiSubPath, '/');
// } else {
//     $view = $routes[$requestPath] ?? '404';
// }
$baseUrl = $_ENV['APP_URL'] ?? $basePath;
$view = $routes[$requestPath] ?? '404';

$tools = [];
$error = null;

if ($view === 'home') {
    require_once __DIR__ . '/../backend/controllers/PostsController.php';
    $controller = new PostsController($pdo);
    $posts = $controller->index();
}

if ($view === 'projects') {
    require_once __DIR__ . '/../backend/controllers/PostsController.php';
    $controller = new PostsController($pdo);
    $posts = $controller->projects();
}

if ($view === 'tools') {
    require_once __DIR__ . '/../backend/controllers/ToolsController.php';
    $controller = new ToolsController($pdo, $baseUrl);
    $tools = $controller->index();
}

if ($view === 'wiki') {
    require_once __DIR__ . '/../backend/controllers/WikiController.php';
    $controller = new WikiController();
    $wikiContent = $controller->index();
    // $wikiContent = $controller->index($wikiSubPath);
}

require_once __DIR__ . "/views/layouts/titles.php";
require_once __DIR__ . "/views/layouts/header.php";
require_once __DIR__ . "/views/layouts/menulg.php";

$viewFile = __DIR__ . "/views/pages/{$view}.php";
if (is_file($viewFile)) {
    require $viewFile;
} else {
    http_response_code(404);
    require __DIR__ . "/views/pages/404.php";
}

require_once __DIR__ . "/views/layouts/footer.php";
