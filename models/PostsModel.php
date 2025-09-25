<?php

class PostsModel
{
    private $pdo;

    public function __construct($pdo)
    {
        $this->pdo = $pdo;
    }

    public function getAllPosts()
    {
        $tablePrefix = $_ENV['TABLE_PREFIX'];
        try {
            $sql = "SELECT * FROM $tablePrefix"."posts ORDER BY id desc";
            $stmnt = $this->pdo->prepare($sql);
            $stmnt->execute();
            return $stmnt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            throw $e;
        }
    }

    public function getPostsBySection($section)
    {
        $tablePrefix = $_ENV['TABLE_PREFIX'];
        try {
            $sql = "SELECT * FROM $tablePrefix"."posts WHERE section = :section ORDER BY id DESC";
            $stmt = $this->pdo->prepare($sql);
            $stmt->execute(['section' => $section]);
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            throw $e;
        }
    }
}
