<?php


$pdo = new PDO('sqlite:database.db', null, null, [
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
 ]);
 require_once 'Student.php';
require_once 'StudentRepository.php';

$repository = new StudentRepository($pdo);

$student = $repository->getById(1);
$allStudents = $repository->getAll();

$newStudent = new Student();
$newStudent->setName('Аноним');
$repository->insert($newStudent);