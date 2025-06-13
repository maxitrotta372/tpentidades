<?php 


declare(strict_types = 1);

namespace Src\Service\Client;

use Src\Entity\Client\Client;
use Src\Entity\Client\Exception\ClientNotFoundException;
use Src\Infrastructure\Repository\Client\ClientRepository;

final readonly class ClientFinderService {

    private ClientRepository $clientRepository;

    public function __construct() 
    {
        $this->clientRepository = new ClientRepository();
    }

    public function find(int $id): Client 
    {
        $client = $this->clientRepository->find($id);

        if ($client === null) {
            throw new ClientNotFoundException($id);
        }

        return $client;
    }

}
