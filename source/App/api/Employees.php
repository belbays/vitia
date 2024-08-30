<?php

namespace Source\App\Api;

use Source\Core\TokenJWT;
use Source\Models\Employee;

class Employees extends Api
{
    public function __construct()
    {
        parent::__construct();
    }

    public function listEmployees ()
    {
        $employees = new Employee();
        $this->back($employees->selectAll());
    }

    public function listById (array $data)
    {
        $service = new Employees();
        $employee = $service->getEmployeeById($data["id"]);
        $this->back($employee);
    }

    public function insertEmployee (array $data)
    {
        //$this->auth();

        if(in_array("", $data)) {
            $this->back([
                "type" => "error",
                "message" => "Preencha todos os campos"
            ]);
            return;
        }

        $employee = new Employee(
            null,
            $data["name"],
            $data["email"],
            $data["number"],
            $data["functions"],
            $data["salary"],
            $data["observation"]
        );

        $insertEmployee = $employee->insert();

        if(!$insertEmployee){
            $this->back([
                "type" => "error",
                "message" => $employee->getMessage()
            ]);
            return;
        }

        $this->back([
            "type" => "success",
            "message" => "Funcionário cadastrado com sucesso!"
        ]);

    }

    public function update (array $data)
    {
        $employee = new Employee(
            $data["name"],
            $data["email"],
            $data["number"],
            $data["functions"],
            $data["salary"],
            $data["observation"]
        );

        if ($employee->update()) {
            $this->back(["message" => "Funcionário atualizado com sucesso"]);
        } else {
            $this->back(["message" => $employee->getMessage()], 400);
        }
    }

    public function delete(array $data)
    {
        if (!isset($data["id"]) || !is_int($data["id"])) {
            $this->back(["message" => "ID inválido"], 400);
            return;
        }

        $employee = new Employee(); 
        if ($employee->delete($data["id"])) {
            $this->back(["message" => "Funcionário excluído com sucesso"]);
        } else {
            $this->back(["message" => "Erro ao excluir funcionário"], 400);
        }
    }
}