<?php

class GitHubHelper
{
    public static function getReadme()
    {

        $cacheFile = __DIR__ . '/../cache/github_readme.html';
        $cacheTime = 3600; // 1 hora

        if (file_exists($cacheFile) && time() - filemtime($cacheFile) < $cacheTime) {
            return file_get_contents($cacheFile);
        }

        $token = $_ENV['GITHUB_TOKEN'] ?? null;
        $owner = $_ENV['GITHUB_OWNER'] ?? 'exequiels';
        $repo = $_ENV['GITHUB_REPO'] ?? 'thelastgaragekid';

        $url = "https://api.github.com/repos/{$owner}/{$repo}/readme";

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_USERAGENT, 'GarageKid-Wiki');

        $headers = ['Accept: application/vnd.github.v3.html'];
        if ($token) {
            $headers[] = "Authorization: Bearer {$token}";
        }
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

        $content = curl_exec($ch);
        $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        curl_close($ch);

        if ($httpCode == 200 && $content) {

            $cacheDir = dirname($cacheFile);
            if (!is_dir($cacheDir)) {
                mkdir($cacheDir, 0755, true);
            }

            file_put_contents($cacheFile, $content);
            return $content;
        }

        return '<p class="text-danger">Error Loading wiki content.</p>';
    }
}
