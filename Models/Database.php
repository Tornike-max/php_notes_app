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

    public function leftJoin($leftTable, $rightTable, $id)
    {
        $this->statement = $this->pdo->prepare("SELECT * FROM $leftTable join $rightTable on $leftTable.id = $rightTable.user_id where $rightTable.id = :id");
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

    public function update($table, $id, $data)
    {
        $setPart = implode(', ', array_map(fn($key) => "$key = :$key", array_keys($data)));

        $this->statement = $this->pdo->prepare("UPDATE $table SET $setPart WHERE id = :id");

        $this->statement->bindValue(':id', $id);

        foreach ($data as $key => $val) {
            $this->statement->bindValue(":$key", $val);
        }

        if ($this->statement->execute()) {
            return $data;
        } else {
            http_response_code(401);
            throw new PDOException("Failed to update record in $table");
        }
    }

    public function delete($table, $id)
    {
        $this->statement = $this->pdo->prepare("delete from $table where id = :id");
        $this->statement->bindValue(':id', $id);

        if ($this->statement->execute()) {
            return true;
        } else {
            return false;
        }
    }
}
