<?php

namespace Source\App\Api;

use Source\Models\Service;

class Services extends Api
{
    public function __construct()
    {
        parent::__construct();
        // quando todas as rotas da classe são autenticadas, o método $this->auth() pode ser evocado aqui
    }

    public function getById(array $data)
    {
        // método é chamado quando a rota precisa de autenticação
        //$this->auth();
        $service = new Service();
        $response = $service->listById($data["serviceId"]);
        $this->back($response);
    }

    public function listByCategory (array $data)
    {
        // quando a rota não necessita de autenticação, não evoca o método $this->auth()
        $service = new Service();
        $listServices = $service->listByCategory($data["categoryId"]);
        $this->back($listServices);
    }

    public function update(array $data)
    {
        $this->auth();

        $response = [
            "success" => [
                "code" => "200",
                "type" => "success",
                "message" => "Serviço alterado com sucesso"
            ]
        ];

        $this->back($response);
    }

    public function delete (array $data)
    {
        $this->auth();

        $response = [
            "success" => [
                "code" => "200",
                "type" => "success",
                "message" => "Serviço deletado com sucesso"
            ]
        ];

        $this->back($response);
    }
}