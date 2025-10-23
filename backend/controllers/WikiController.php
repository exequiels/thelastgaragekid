<?php

require_once __DIR__ . '/../helpers/GitHubHelper.php';

class WikiController
{
    public function index()
    {
        return GitHubHelper::getReadme();
    }
    // public function index($path = '')
    // {
    //     $baseUrl = ($_ENV['APP_URL'] ?? '') . '/wiki';

    //     if (empty($path)) {
    //         return GitHubHelper::getReadme($baseUrl);
    //     }

    //     return GitHubHelper::getFile($path, $baseUrl);
    // }
}
