<?php 

use Src\Utils\ControllerUtils;
use Src\Service\Client\ClientUpdaterService;

final readonly class ClientPutController {
    private ClientUpdaterService $service;

    public function __construct() {
        $this->service = new ClientUpdaterService();
    }

    public function start(int $id): void
    {
        $dni = ControllerUtils::getPost("dni");
        $firstName = ControllerUtils::getPost("firstName");
        $lastName = ControllerUtils::getPost("lastName");
        
        $this->service->update($id, $dni, $firstName, $lastName);
    }
}