<?php

class Student
{
   private int $id;
   private string $name;

   public function getId(): int
   {
       return $this->id;
   }

   public function getName(): string
   {
       return $this->name;
   }

   public function setName(string $name): self
   {
       $this->name = $name;

       return $this;
   }

   public function insert(PDO $pdo): bool
   {
       $statement = $pdo->prepare('INSERT INTO `students` (`name`) VALUES (?)');
       return $statement->execute([$this->getName()]);
   }
}