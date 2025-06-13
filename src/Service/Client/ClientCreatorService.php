<?php 

namespace Src\Service\Client;

use Src\Entity\Client\Client;
use Src\Infrastructure\Repository\Client\ClientRepository;

final readonly class ClientCreatorService {
    private ClientRepository $repository;

    public function __construct() {
        $this->repository = new ClientRepository();
    }

    public function create(
        int $dni,
        string $firstName,
        string $lastName
        //array $vehicles
        ): void
    {
        $client = Client::create($dni, $firstName, $lastName);
        $this->repository->create($client);
    } 
}