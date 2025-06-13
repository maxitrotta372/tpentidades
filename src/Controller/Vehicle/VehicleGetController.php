<?php 

use Src\Service\Vehicle\VehicleFinderService;

final readonly class VehicleGetController {
    private VehicleFinderService $service;

    public function __construct() {
        $this->service = new VehicleFinderService();
    }

    public function start(int $id): void 
    {
        $vehicle = $this->service->find($id);

        echo json_encode([
            "id" => $vehicle->id(),
            "clientId" => $vehicle->clientId(),
            "licensePlate" => $vehicle->licensePlate(),
            "brand" => $vehicle->brand(),
            "model" => $vehicle->model(),
            "year" => $vehicle->year(),
            "color" => $vehicle->color(),
        ], true);
    }
}
