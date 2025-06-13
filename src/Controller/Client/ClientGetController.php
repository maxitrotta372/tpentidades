<?php 

use Src\Entity\Vehicle\Vehicle;
use Src\Service\Client\ClientDetailProjectionFinderService;

final readonly class ClientGetController {
    private ClientDetailProjectionFinderService $service;

    public function __construct() {
        $this->service = new ClientDetailProjectionFinderService();
    }

    public function start(int $id): void 
    {
        $client = $this->service->find($id);

        $vehiculos = [];
        foreach ($client->vehicles() as $vehiculo) {
            $vehiculos[] = [
                "id" => $vehiculo->id(),
                "brand" => $vehiculo->brand(),
                "model" => $vehiculo->model(),
                "year" => $vehiculo->year(),
                "color" => $vehiculo->color(),

            ];
        }

        echo json_encode([
            "id" => $client->id(),
            "dni" => $client->dni(),
            "firstName" => $client->firstName(),
            "lastName" => $client->lastName(),
            "vehicles" => $vehiculos,
        ], true);
    }
}
