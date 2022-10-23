<?php
require_once ("Task.php");

class TaskProvider {

    private PDO $pdo;
    public function __construct(PDO $pdo)

    {
        $this->pdo = $pdo;
    }
    function getUndoneList():?array {
        $newArr = [];
        foreach ($_SESSION['tasklist'] as $task) {
            if($task['isdone'] === false) {
                $newArr[] = new Task($task['description'], $task['isdone']);
            }
        }
        return $newArr ?? null;
    }

    function addTask(string $text):void {
        $_SESSION['tasklist'][] = [
            "description" => '',
            "isdone" => true
        ];
        $_SESSION['tasklist'][] = [
                                    "description" => $text,
                                    "isdone" => false
                                    ];
    }
}