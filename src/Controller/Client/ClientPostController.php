<?php 

use Src\Utils\ControllerUtils;
use Src\Service\Client\ClientCreatorService;

final readonly class ClientPostController {
    private ClientCreatorService $service;

    public function __construct() {
        $this->service = new ClientCreatorService();
    }

    public function start(): void
    {
        $dni = ControllerUtils::getPost("dni");
        $firstName = ControllerUtils::getPost("firstName");
        $lastName = ControllerUtils::getPost("lastName");
        //$vehicles = ControllerUtils::getPost("vehicles");
        //$deleted = ControllerUtils::getPost("deleted");

        $this->service->create( $dni, $firstName, $lastName);
    }
}