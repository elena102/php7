<?php
class User
{
   private string $username;
   private string $name; 

   public function __construct(string $username)
   {
       $this->username = $username;
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

   public function getUsername(): string
   {
       return $this->username;
   }

   public function setUsername(string $username): self
   {
       $this->username = $username;

       return $this;
   }
}