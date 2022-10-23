<?php
require_once 'User.php';

class UserProvider
{
  
   private PDO $pdo;

   public function registerUser(User $user, string $plainPassword): bool
   {
       $statement = $this->pdo->prepare(
           'INSERT INTO users (name, username, password) VALUES (:name, :username, :password)'
       );

       return $statement->execute([
           'name' => $user->getName(),
           'username' => $user->getUsername(),
           'password' => md5($plainPassword)
       ]);
   }
   
}
