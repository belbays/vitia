<?php

namespace Source\App\Api;

use Source\Core\TokenJWT;
use Source\Models\Market;

class Markets extends Api
{
    public function __construct()
    {
        parent::__construct();
    }

    public function listMarkets()
    {
        $markets = new Market();  
        $this->back($markets->selectAll());
    }

    public function listById (array $data)
    {
        $service = new Markets();
        $market = $service->getMarketById($data["id"]);
        $this->back($market);
    }

    public function insertMarket (array $data)
    {
        //$this->auth();

        if(in_array("", $data)) {
            $this->back([
                "type" => "error",
                "message" => "Preencha todos os campos"
            ]);
            return;
        }

        $market = new Market(
            null,
            $data["name"],
            $data["adress"],
            $data["number"]
        );

        $insertMarket = $market->insert();

        if(!$insertMarket){
            $this->back([
                "type" => "error",
                "message" => $market->getMessage()
            ]);
            return;
        }

        $this->back([
            "type" => "success",
            "message" => "Estabelecimento cadastrado com sucesso!"
        ]);

    }

    public function update (array $data)
    {
        $market = new Market(
            $data["name"],
            $data["adress"],
            $data["number"]
        );

        if ($market->update()) {
            $this->back(["message" => "Estabelecimento atualizado com sucesso"]);
        } else {
            $this->back(["message" => $market->getMessage()], 400);
        }
    }
    public function delete(array $data)
    {
        if (!isset($data["id"]) || !is_int($data["id"])) {
            $this->back(["message" => "ID inválido"], 400);
            return;
        }

        $market = new Market(); 
        if ($market->delete($data["id"])) {
            $this->back(["message" => "Estabelecimento excluído com sucesso"]);
        } else {
            $this->back(["message" => "Erro ao excluir estabelecimento"], 400);
        }
    }
}

/*    public function delete (array $data)
    {
        $service = new Market();
        $success = $service->delete($data["id"]);

        if(!$success){
            $this->back([
                "type" => "error",
                "message" => $service->getMessage()
            ]);
            return;
        } 

        $this->back([
            "type" => "success",
            "message" => "Estabelecimento excluído com sucesso"
        ]);
    }*/