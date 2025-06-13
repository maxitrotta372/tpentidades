<?php 

use Src\Service\Vehicle\VehicleDeleterService;

final readonly class VehicleDeleteController {
    private VehicleDeleterService $service;

    public function __construct() {
        $this->service = new VehicleDeleterService();
    }

    public function start(int $id): void
    {
        $this->service->delete($id);
    }
}