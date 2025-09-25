<?php

require_once __DIR__ . '/vendor/autoload.php';
require_once __DIR__ . '/helpers/escape.php';
$routes = require __DIR__ . '/routes/web.php';

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->load();

require_once __DIR__ . "/config/connect.php";

$basePath = rtrim(dirname($_SERVER['SCRIPT_NAME']), '/\\');
$requestPath = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

if ($basePath !== '' && strpos($requestPath, $basePath) === 0) {
    $requestPath = substr($requestPath, strlen($basePath));
}
if ($requestPath === '') {
    $requestPath = '/';
}

$view = $routes[$requestPath] ?? '404';
$baseUrl = $basePath;

$tools = [];
$error = null;

if ($view === 'home') {
    require_once __DIR__ . '/controllers/PostsController.php';
    $controller = new PostsController($pdo);
    $posts = $controller->index();
}

if ($view === 'projects') {
    require_once __DIR__ . '/controllers/PostsController.php';
    $controller = new PostsController($pdo);
    $posts = $controller->projects();
}

if ($view === 'tools') {
    require_once __DIR__ . '/controllers/ToolsController.php';
    $controller = new ToolsController($pdo, $baseUrl);
    $tools = $controller->index();
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
