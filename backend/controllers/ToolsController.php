<?php

require_once __DIR__ . '/../models/ToolsModel.php';

class ToolsController
{
    private $pdo;

    public function __construct($pdo)
    {
        $this->pdo = $pdo;
    }

    public function index()
    {
        $model = new ToolsModel($this->pdo);
        return $model->getAllTools();
    }
}
