<?php 


declare(strict_types = 1);

namespace Src\Service\Vehicle;

use Src\Entity\Vehicle\Vehicle;
use Src\Entity\Vehicle\Exception\VehicleNotFoundException;
use Src\Infrastructure\Repository\Vehicle\VehicleRepository;

final readonly class VehicleFinderService {

    private VehicleRepository $vehicleRepository;

    public function __construct() 
    {
        $this->vehicleRepository = new VehicleRepository();
    }

    public function find(int $id): Vehicle 
    {
        $vehicle = $this->vehicleRepository->find($id);

        if ($vehicle === null) {
            throw new VehicleNotFoundException($id);
        }

        return $vehicle;
    }

}
