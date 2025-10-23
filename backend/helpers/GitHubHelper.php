<?php

require_once __DIR__ . '/Parsedown.php';

class GitHubHelper
{
    public static function getReadme()
    // public static function getReadme($baseUrl = '/wiki')
    {
        $cacheFile = __DIR__ . '/../cache/github_readme.html';
        $cacheTime = 3600;

        if (file_exists($cacheFile) && time() - filemtime($cacheFile) < $cacheTime) {
            return file_get_contents($cacheFile);
        }

        $token = $_ENV['GITHUB_TOKEN'] ?? null;
        $owner = $_ENV['GITHUB_OWNER'] ?? 'exequiels';
        $repo = $_ENV['GITHUB_REPO'] ?? 'wiki-extract';


        $url = "https://api.github.com/repos/{$owner}/{$repo}/readme";

        $handle_curl = curl_init();
        curl_setopt($handle_curl, CURLOPT_URL, $url);
        curl_setopt($handle_curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($handle_curl, CURLOPT_USERAGENT, 'GarageKid-Wiki');

        $headers = ['Accept: application/vnd.github.v3.raw'];

        curl_setopt($handle_curl, CURLOPT_HTTPHEADER, $headers);

        $markdown_text = curl_exec($handle_curl);
        $httpCode = curl_getinfo($handle_curl, CURLINFO_HTTP_CODE);
        curl_close($handle_curl);

        if ($httpCode == 200 && $markdown_text) {

            $html = self::processMarkdown($markdown_text);
            // $html = self::processMarkdown($markdown_text, $baseUrl);

            $cacheDir = dirname($cacheFile);
            if (!is_dir($cacheDir)) {
                mkdir($cacheDir, 0755, true);
            }

            file_put_contents($cacheFile, $html);

            return $html;
        }

        return '<p class="text-danger">Error, Will Robinson! Our curl call failed badly we need to check this out.</p>';
    }

    // public static function getFile($path, $baseUrl = '/wiki')
    // {
    //     // 1. Sanitizar nombre para cache
    //     $cacheName = self::sanitizeCacheName($path);
    //     $cacheFile = __DIR__ . '/../cache/' . $cacheName . '.html';
    //     $cacheTime = 3600;

    //     // 2. Verificar cache
    //     if (file_exists($cacheFile) && time() - filemtime($cacheFile) < $cacheTime) {
    //         return file_get_contents($cacheFile);
    //     }

    //     // 3. Preparar variables
    //     $token = $_ENV['GITHUB_TOKEN'] ?? null;
    //     $owner = $_ENV['GITHUB_OWNER'] ?? 'exequiels';
    //     $repo = $_ENV['GITHUB_REPO'] ?? 'wiki-extract';

    //     // 4. Agregar .md si no lo tiene
    //     if (!preg_match('/\.md$/', $path)) {
    //         $path .= '.md';
    //     }
    //     // 5. Construir URL del endpoint (DIFERENTE a README)
    //     $url = "https://api.github.com/repos/{$owner}/{$repo}/contents/{$path}";

    //     // 6. Hacer llamada cURL
    //     $ch = curl_init();
    //     curl_setopt($ch, CURLOPT_URL, $url);
    //     curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    //     curl_setopt($ch, CURLOPT_USERAGENT, 'GarageKid-Wiki');

    //     $headers = ['Accept: application/vnd.github.v3.raw'];
    //     if ($token) {
    //         $headers[] = "Authorization: Bearer {$token}";
    //     }
    //     curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

    //     $markdown = curl_exec($ch);
    //     $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
    //     curl_close($ch);

    //     // 7. Procesar respuesta
    //     if ($httpCode == 200 && $markdown) {
    //         $html = self::processMarkdown($markdown, $baseUrl);

    //         $cacheDir = dirname($cacheFile);
    //         if (!is_dir($cacheDir)) {
    //             mkdir($cacheDir, 0755, true);
    //         }

    //         file_put_contents($cacheFile, $html);
    //         return $html;
    //     }

    //     // 8. Manejo de errores
    //     if ($httpCode == 404) {
    //         return '<div class="alert alert-warning">
    //                 <h3>Página no encontrada</h3>
    //                 <p>El archivo <code>' . htmlspecialchars($path) . '</code> no existe en el repositorio.</p>
    //                 <a href="/wiki" class="btn btn-primary">Volver al inicio del Wiki</a>
    //             </div>';
    //     }

    //     return '<p class="text-danger">Error al cargar el archivo. HTTP Code: ' . $httpCode . '</p>';
    // }

    private static function processMarkdown($markdown_text)
    // private static function processMarkdown($markdown_text, $baseUrl = '/wiki')
    {
        $parsedown = new Parsedown();
        $parsedown->setSafeMode(true);

        $html = $parsedown->text($markdown_text);
        // $html = $parsedown->text($markdown_text, $baseUrl);

        $html = preg_replace_callback(
            '/<a\s+href="(http[s]?:\/\/[^"]+|\/[^"]+|[^"]+)"/i',
            function ($matches) {
                // function ($matches) use ($baseUrl) {

                $url = $matches[1];

                $isExternal = (strpos($url, 'http://') === 0 || strpos($url, 'https://') === 0);

                if ($isExternal) {
                    return '<a href="' . $url . '" target="_blank" rel="noopener"';
                } else {

                    $cleanUrl = $url;

                    $cleanUrl = preg_replace('/^\.\//', '', $cleanUrl);
                    $cleanUrl = ltrim($cleanUrl, '/');
                    // $cleanUrl = preg_replace('/\.md$/', '', $cleanUrl);

                    return '<a href="https://github.com/exequiels/wiki-extract/blob/master/' . $cleanUrl . '" target="_blank" rel="noopener"';
                    // return '<a href="' . rtrim($baseUrl, '/') . '/' . $cleanUrl . '"';
                }
            },
            $html
        );

        $html = preg_replace(
            '/<img\s+([^>]*?)>/i',
            '<img $1 class="img-fluid d-block mx-auto">',
            $html
        );
        $html = preg_replace_callback(
            '/<img\s+src="([^"]+)"/i',
            function ($matches) {
                $src = $matches[1];

                // Si ya es URL completa, dejarla
                if (strpos($src, 'http') === 0) {
                    return '<img src="' . $src . '"';
                }

                // Si es ruta relativa, convertir a GitHub raw
                $owner = $_ENV['GITHUB_OWNER'] ?? 'exequiels';
                $repo = $_ENV['GITHUB_REPO'] ?? 'wiki-extract';
                $branch = 'master'; // Cambia a 'main' si es tu rama principal

                // Limpiar ../ del inicio
                $cleanSrc = $src;
                while (strpos($cleanSrc, '../') === 0) {
                    $cleanSrc = substr($cleanSrc, 3);
                }

                // Construir URL de GitHub raw
                $newSrc = "https://raw.githubusercontent.com/{$owner}/{$repo}/{$branch}/{$cleanSrc}";

                return '<img src="' . $newSrc . '"';
            },
            $html
        );
        return $html;
    }

    private static function sanitizeCacheName($path)
    {
        $clean = str_replace('/', '_', $path);

        $clean = str_replace('.md', '', $clean);

        return 'github_' . $clean;
    }
}
