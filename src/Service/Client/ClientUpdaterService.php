<?php

namespace Src\Service\Client;

use Src\Entity\Client\Client;
use Src\Infrastructure\Repository\Client\ClientRepository;

final readonly class ClientUpdaterService
{
    private ClientRepository $repository;
    private ClientFinderService $finder;

    public function __construct()
    {
        $this->repository = new ClientRepository();
        $this->finder = new ClientFinderService();
    }

    public function update(
        ?int $id,
        int $dni,
        string $firstName,
        string $lastName,
    ): void {
        $client = $this->finder->find($id);

        $client->modify($dni, $firstName, $lastName);

        $this->repository->update($client);
    }
}