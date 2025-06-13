<?php

namespace Src\Service\Vehicle;

use Src\Entity\Vehicle\Vehicle;
use Src\Infrastructure\Repository\Vehicle\VehicleRepository;

final readonly class VehicleUpdaterService
{
    private VehicleRepository $repository;
    private VehicleFinderService $finder;

    public function __construct()
    {
        $this->repository = new VehicleRepository();
        $this->finder = new VehicleFinderService();
    }

    public function update(
        ?int $id,
        int $clientId,
        string $licensePlate,
        string $brand,
        string $model,
        ?int $year,
        ?string $color
    ): void {
        $vehicle = $this->finder->find($id);

        $vehicle->modify(
            $clientId,
            $licensePlate,
            $brand,
            $model,
            $year, 
            $color,
        );

        $this->repository->update($vehicle);
    }
}