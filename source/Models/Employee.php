<?php

namespace Source\Models;

use Source\Core\Connect;
use Source\Core\Model;

class Employee extends Model
{
    private $id;
    private $name;
    private $email;
    private $number;
    private $functions;
    private $salary;
    private $observation;
    private $message;

    public function __construct(
        int $id = null,
        string $name = null,
        string $email = null,
        string $number = null,
        string $functions = null,
        float $salary = null,
        string $observation = null,
    )
    {
        $this->id = $id;
        $this->name = $name;
        $this->email = $email;
        $this->number = $number;
        $this->functions = $functions;
        $this->salary = $salary;
        $this->observation = $observation;
        $this->entity = "employees";
    }

    public function getId()
    {
        return $this->id;
    }

    public function setId($id)
    {
        $this->id = $id;
    }

    public function getName()
    {
        return $this->name;
    }

    public function setName($name)
    {
        $this->name = $name;
    }

    public function getEmail()
    {
        return $this->email;
    }

    public function setEmail($email)
    {
        $this->email = $email;
    }

    public function getNumber()
    {
        return $this->number;
    }

    public function setNumber($number)
    {
        $this->number = $number;
    }

    public function getFunctions()
    {
        return $this->functions;
    }

    public function setFunctions($functions)
    {
        $this->functions = $functions;
    }

    public function getSalary()
    {
        return $this->salary;
    }

    public function setSalary($salary)
    {
        $this->salary = $salary;
    }

    public function getObservation()
    {
        return $this->observation;
    }

    public function setObservation($observation)
    {
        $this->observation = $observation;
    }

    public function getMessage(): ?string
    {
        return $this->message;
    }

    public function setMessage($message)
    {
        $this->message = $message;
    }

    public function listEmployees()
    {
        $conn = Connect::getInstance();
        $query = "SELECT * FROM employees";
        $stmt = $conn->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll();
    }

    public function insertEmployee(): ?int
    {

        $conn = Connect::getInstance();

        if(!filter_var($this->email,FILTER_VALIDATE_EMAIL)){
            $this->message = "E-mail Inválido!";
            return false;
        }

        $query = "SELECT * FROM employees WHERE id LIKE :id";
        $stmt = $conn->prepare($query);
        $stmt->bindParam(":id", $this->id);
        $stmt->execute();

        if($stmt->rowCount() > 0) {
            $this->message = "Funcionário já cadastrado!";
            return false;
        }

        $query = "INSERT INTO employees (name, email, number , functions, salary, observation) 
                  VALUES (:name, :email, :number, :functions, :salary, :observation)";
        $stmt = $conn->prepare($query);
        $stmt->bindParam(":name", $this->name);
        $stmt->bindParam(":email", $this->email);
        $stmt->bindParam(":number", $this->number);
        $stmt->bindParam(":functions", $this->functions);
        $stmt->bindParam(":salary", $this->salary);
        $stmt->bindParam(":observation", $this->observation);

        try {
            $stmt->execute();
            $this->id = $conn->lastInsertId();
            return $this->id;
        } catch (PDOException) {
            $this->message = "Por favor, informe todos os campos!";
            return false;
        }
    }

    public function listById (int $id): ?array
    {
        $query = "SELECT 
        employees.id, 
        employees.name, 
        employees.email, 
        employees.number,
        employees.functions,
        employees.salary,
        employees.observation
        FROM employees
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

        if(!filter_var($this->email, FILTER_VALIDATE_EMAIL)){
            $this->message = "E-mail inválido!";
            return false;
        }

        $query = "SELECT * FROM employees WHERE email LIKE :email AND id != :id";
        $stmt = $conn->prepare($query);
        $stmt->bindParam(":email", $this->email);
        $stmt->bindParam(":id", $this->id);
        $stmt->execute();

        if($stmt->rowCount() == 1) {
            $this->message = "E-mail já cadastrado!";
            return false;
        }

        $query = "UPDATE employees 
        SET name = :name, 
        email = :email, 
        number = :number, 
        functions = :functions, 
        salary = :salary, 
        observation = :observation,
        WHERE id = :id";


        $stmt = $conn->prepare($query);
        $stmt->bindParam(":id", $this->id);
        $stmt->bindParam(":name", $this->name);
        $stmt->bindParam(":email", $this->email);
        $stmt->bindParam(":number", $this->number);
        $stmt->bindParam(":functions", $this->functions);
        $stmt->bindParam(":salary", $this->salary);
        $stmt->bindParam(":observation", $this->observation);

        try {
            $stmt->execute();
            $this->message = "Funcionário atualizado com sucesso!";
            return true;
        } catch (PDOException $exception) {
            $this->message = "Erro ao atualizar: {$exception->getMessage()}";
            return false;
        }

    }

    public function delete(int $id): bool
    {
        $conn = Connect::getInstance(); 
    
        $query = "DELETE FROM employees WHERE id = :id";
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


