<?php

namespace Models;

use PDO;
use PDOException;

class Database
{
    protected $pdo;
    public $statement;

    public function __construct()
    {
        $this->pdo = new PDO('mysql:host=localhost;port=3307;dbname=php_test', 'root', '');
        $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }

    public function query($sql)
    {
        $this->statement = $this->pdo->prepare($sql);
        if ($this->statement->execute()) {
            $data = $this->statement->fetchAll(PDO::FETCH_ASSOC);
            return $data;
        } else {
            throw new PDOException();
        }
    }

    public function find($table, $id)
    {
        $this->statement = $this->pdo->prepare("SELECT * FROM $table WHERE id = :id");
        $this->statement->bindValue(':id', $id);

        if ($this->statement->execute()) {
            $data = $this->statement->fetch(PDO::FETCH_ASSOC);
            return $data;
        } else {
            http_response_code(401);
            throw new PDOException();
        }
    }

    public function findOrFail($table, $id)
    {
        $data = $this->find($table, $id);

        if (!$data) {
            throw new PDOException("No data found for ID: $id");
        }

        return $data;
    }
}
