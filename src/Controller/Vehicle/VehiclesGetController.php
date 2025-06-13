<?php 

use Src\Service\Vehicle\VehiclesSearcherService;

final readonly class VehiclesGetController {
    private VehiclesSearcherService $service;

    public function __construct() {
        $this->service = new VehiclesSearcherService();
    }

    public function start(): void
    {
        $vehicles = $this->service->search();

        echo json_encode($this->toResponse($vehicles));
    }

    private function toResponse(array $vehicles): array 
    {
        $responses = [];
        
        foreach($vehicles as $vehicle) {
            $responses[] = [
                "id" => $vehicle->id(),
                "clientId" => $vehicle->clientId(),
                "licensePlate" => $vehicle->licensePlate(),
                "brand" => $vehicle->brand(),
                "model" => $vehicle->model(),
                "year" => $vehicle->year(),
                "color" => $vehicle->color()
            ];
        }

        return $responses;
    }
}