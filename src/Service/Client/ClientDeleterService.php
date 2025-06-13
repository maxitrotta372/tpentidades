<?php 

namespace Src\Service\Client;

use Src\Infrastructure\Repository\Client\ClientRepository;

final readonly class ClientDeleterService {
    private ClientRepository $repository;
    private ClientFinderService $finder;

    public function __construct() {
        $this->repository = new ClientRepository();
        $this->finder = new ClientFinderService();
    }

    public function delete(int $id): void
    {
        $client = $this->finder->find($id);

        $client->delete();

        $this->repository->update($client);
    } 
}