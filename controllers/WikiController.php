<?php

require_once __DIR__ . '/../helpers/GitHubHelper.php';

class WikiController
{
    public function index()
    {
        return GitHubHelper::getReadme();
    }
}
