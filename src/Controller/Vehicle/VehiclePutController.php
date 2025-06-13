<?php 

use Src\Utils\ControllerUtils;
use Src\Service\Vehicle\VehicleUpdaterService;

final readonly class VehiclePutController {
    private VehicleUpdaterService $service;

    public function __construct() {
        $this->service = new VehicleUpdaterService();
    }

    public function start(int $id): void
    {
        $clientId = ControllerUtils::getPost("clientId");
        $licensePlate = ControllerUtils::getPost("licensePlate");
        $brand = ControllerUtils::getPost("brand");
        $model = ControllerUtils::getPost("model");
        $year = ControllerUtils::getPost("year");
        $color = ControllerUtils::getPost("color");

        $this->service->update(
            $id, 
            $clientId, 
            $licensePlate, 
            $brand, 
            $model, 
            $year,
            $color
        );
    }
}