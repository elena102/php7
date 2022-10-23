<?php

class StudentRepository
{
   private PDO $pdo;

   public function __construct(PDO $pdo)
   {
       $this->pdo = $pdo;
   }

   public function getById(int $studentId): ?Student
   {
       $statement = $this->pdo->prepare('SELECT * FROM `students` WHERE `id` = ?');
       $statement->execute([$studentId]);
       return $statement->fetchObject(Student::class) ?: null;
   }

   public function getAll(): array
   {
       $result = [];
       $statement = $this->pdo->query('SELECT * FROM `students`');
       while ($statement && $student = $statement->fetchObject(Student::class)) {
           $result[] = $student;
       }
       return $result;
   }

   public function insert(Student $student): bool
   {
       $statement = $this->pdo->prepare('INSERT INTO `students` (`name`) VALUES (?)');
       return $statement->execute([$student->getName()]);
   }
}



