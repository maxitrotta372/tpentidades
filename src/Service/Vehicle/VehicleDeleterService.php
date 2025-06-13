<?php 

namespace Src\Service\Vehicle;

use Src\Infrastructure\Repository\Vehicle\VehicleRepository;

final readonly class VehicleDeleterService {
    private VehicleRepository $repository;
    private VehicleFinderService $finder;

    public function __construct() {
        $this->repository = new VehicleRepository();
        $this->finder = new VehicleFinderService();
    }

    public function delete(int $id): void
    {
        $vehicle = $this->finder->find($id);

        $vehicle->delete();

        $this->repository->update($vehicle);
    } 
}