<?php 

namespace Src\Service\Vehicle;

use Src\Entity\Vehicle\Vehicle;
use Src\Infrastructure\Repository\Vehicle\VehicleRepository;

final readonly class VehiclesSearcherByClientService {
    private VehicleRepository $repository;

    public function __construct() {
        $this->repository = new VehicleRepository();
    }

    /** @return Vehicle[] */
    public function searchByClient(int $clientId): array
    {
        return $this->repository->searchByClient($clientId);
    }
}