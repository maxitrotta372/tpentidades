<?php 

use Src\Utils\ControllerUtils;
use Src\Service\Vehicle\VehicleCreatorService;

final readonly class VehiclePostController {
    private VehicleCreatorService $service;

    public function __construct() {
        $this->service = new VehicleCreatorService();
    }

    public function start(): void
    {
        $clientId = ControllerUtils::getPost("clientId");
        $licensePlate = ControllerUtils::getPost("licensePlate");
        $brand = ControllerUtils::getPost("brand");
        $model = ControllerUtils::getPost("model");
        $year = ControllerUtils::getPost("year");
        $color = ControllerUtils::getPost("color");

        $this->service->create($clientId, $licensePlate, $brand, $model, $year, $color);
    }
}