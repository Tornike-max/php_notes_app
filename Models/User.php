<?php

namespace Models;

use Models\Database;

class User extends Database
{
    public function __construct()
    {
        parent::__construct();
    }

    public function create($table, $attributes)
    {
        extract($attributes);

        $this->statement = $this->pdo->prepare("insert into $table (name,email,password) values(:name,:email,:password)");
        $this->statement->bindValue(':name', $validatedData['name']);
        $this->statement->bindValue(':email', $validatedData['email']);
        $this->statement->bindValue(':password', $validatedData['password']);

        if (!$this->statement->execute()) {
            header('Location: /users');
            return false;
        } else {
            header('Location: /users');
            return true;
        }
    }
}
