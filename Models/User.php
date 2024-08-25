<?php

namespace Models;

use Models\Database;

class User extends Database
{
    public function __construct()
    {
        parent::__construct();
    }

    public function create($table, $validatedData)
    {


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

    public function attempt($data)
    {
        $this->statement = $this->pdo->prepare('select * from users where email = :email');
        $this->statement->bindValue(':email', $data['email']);

        if ($this->statement->execute()) {
            $user = $this->statement->fetch();
            if (password_verify($data['password'], $user['password'])) {
                $_SESSION['user'] = $user;
                return true;
            } else {
                return false;
            }
        }
    }
}
