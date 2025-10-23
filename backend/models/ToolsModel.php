<?php

class ToolsModel
{
    private $pdo;

    public function __construct($pdo)
    {
        $this->pdo = $pdo;
    }

    public function getAllTools()
    {
        $tablePrefix = $_ENV['TABLE_PREFIX'];
        try {
            $sql = "SELECT * FROM $tablePrefix"."tools ORDER BY id asc";
            $stmnt = $this->pdo->prepare($sql);
            $stmnt->execute();
            return $stmnt->fetchAll(PDO::FETCH_ASSOC);

        } catch (PDOException $e) {
            throw $e;
        }
    }
}
