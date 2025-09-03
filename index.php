<?php

$basePath = rtrim(dirname($_SERVER['SCRIPT_NAME']), '/\\');
$requestPath = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

if ($basePath !== '' && strpos($requestPath, $basePath) === 0) {
    $requestPath = substr($requestPath, strlen($basePath));
}
if ($requestPath === '') {
    $requestPath = '/';
}

$routes = [
    '/'          => 'home',
    '/projects'  => 'projects',
    '/tools'     => 'tools',
    '/who'     => 'who',
    '/webrings'   => 'webrings',
    '/contact'   => 'contact',
];

$view = $routes[$requestPath] ?? '404';
$baseUrl = $basePath;

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
