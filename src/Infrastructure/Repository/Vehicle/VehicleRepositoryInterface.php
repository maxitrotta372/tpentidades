<?php 

namespace Src\Infrastructure\Repository\Vehicle;

use Src\Entity\Vehicle\Vehicle;

interface VehicleRepositoryInterface {
    public function find(int $id): ?Vehicle;

    /** @return Vehicle[] */
    public function search(): array;

    /** @return Vehicle[] */
    public function searchByClient(int $clientId): array;

    public function create(Vehicle $vehicle): void;

    public function update(Vehicle $vehicle): void;
}