<?php

namespace Source\Models;

use Source\Core\Connect;
use Source\Core\Model;

class Market extends Model
{
    private $id;
    private $name;
    private $adress;
    private $number;
    private $message;

    public function __construct(
        int $id = null,
        string $name = null,
        string $adress = null,
        string $number = null
    )
    {
        $this->id = $id;
        $this->name = $name;
        $this->adress = $adress;
        $this->number = $number;
        $this->entity = "markets";
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function getAdress(): ?string
    {
        return $this->adress;
    }

    public function getNumber(): ?string
    {
        return $this->number;
    }

    public function getMessage(): ?string
    {
        return $this->message;
    }

    public function setId(int $id): void
    {
        $this->id = $id;
    }

    public function setName(string $name): void
    {
        $this->name = $name;
    }

    public function setAdress(string $adress): void
    {
        $this->adress = $adress;
    }

    public function setNumber(string $number): void
    {
        $this->number = $number;
    }

    public function setMessage(string $message): void
    {
        $this->message = $message;
    }
 
    public function listMarket()
    {
        $query = "SELECT * FROM markets";
        $conn = Connect::getInstance();
        $stmt = $conn->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll();
    }

    public function insertMarket(): ?int
    {

        $conn = Connect::getInstance();

        $query = "INSERT INTO markets (name, adress, number) 
                  VALUES (:name, :adress, :number)";
        $stmt = $conn->prepare($query);
        $stmt->bindParam(":name", $this->name);
        $stmt->bindParam(":adress", $this->adress);
        $stmt->bindParam(":number", $this->number);

        try {
            $stmt->execute();
            return $conn->lastInsertId();
        } catch (PDOException) {
            $this->message = "Por favor, informe todos os campos!";
            return false;
        }
    }

    public function listById (int $id): ?array
    {
        $query = "SELECT 
        markets.id, 
        markets.name, 
        markets.adrees, 
        markets.number,
        FROM markets
        WHERE id = :id";
        $conn = Connect::getInstance();
        $stmt = $conn->prepare($query);
        $stmt->bindParam(":id", $id);
        $stmt->execute();
        return $stmt->fetchAll();
    }

    public function update () : bool
    {
        $conn = Connect::getInstance();

        $query = "UPDATE markets 
        SET name = :name, 
        adress = :adress, 
        number = :number, 
        WHERE id = :id";


        $stmt = $conn->prepare($query);
        $stmt->bindParam(":name", $this->name);
        $stmt->bindParam(":adress", $this->adress);
        $stmt->bindParam(":number", $this->number);
        $stmt->bindParam(":id", $this->id);


        try {
            $stmt->execute();
            $this->message = "Funcionário atualizado com sucesso!";
            return true;
        } catch (PDOException $exception) {
            $this->message = "Erro ao atualizar: {$exception->getMessage()}";
            return false;
        }

    }

    public function delete (int $id): bool
    {
        $conn = Connect::getInstance(); 

        $query = "DELETE FROM markets WHERE id = :id";
        $stmt = $conn->prepare($query);
        $stmt->bindParam(":id", $id);

        try {
            $stmt->execute();
            return true;
        } catch (PDOException $exception) {
            $this->message = "Erro ao excluir: {$exception->getMessage()}";
            return false;
        } finally {
            $stmt = null; 
        }
    }
}


