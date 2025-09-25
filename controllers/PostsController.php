<?php

require_once __DIR__ . '/../models/PostsModel.php';
require_once __DIR__ . '/../helpers/Parsedown.php';

class PostsController
{
    private $pdo;
    private $parsedown;

    public function __construct($pdo)
    {
        $this->pdo = $pdo;
        $this->parsedown = new Parsedown();
    }

    public function index()
    {
        $model = new PostsModel($this->pdo);
        $posts = $model->getAllPosts();
        return $this->processPosts($posts);
    }

    public function projects()
    {
        $model = new PostsModel($this->pdo);
        $posts = $model->getPostsBySection('projects');
        return $this->processPosts($posts);
    }

    private function processPosts($posts)
    {
        foreach ($posts as &$post) {
            if (!empty($post['post'])) {
                $html = $this->parsedown->text($post['post']);

                $html = preg_replace_callback(
                    '/<a\s+href="(http[s]?:\/\/[^"]+|\/[^"]+|[^"]+)"/i',
                    function ($matches) {
                        return '<a href="' . $matches[1] . '" target="_blank" rel="noopener"';
                    },
                    $html
                );

                $post['content_html'] = $html;
            }

            if (!empty($post['excerpt'])) {
                $post['excerpt_html'] = $this->parsedown->text($post['excerpt']);
            }
        }

        return $posts;
    }
}
