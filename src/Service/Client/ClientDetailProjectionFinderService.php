<?php 


declare(strict_types = 1);

namespace Src\Service\Client;

use Src\Entity\Client\Projection\Detail;
use Src\Service\Vehicle\VehiclesSearcherByClientService;

final readonly class ClientDetailProjectionFinderService {

    private ClientFinderService $finder;
    private VehiclesSearcherByClientService $vehicleSearcherService;

    public function __construct() 
    {
        $this->finder = new ClientFinderService();
        $this->vehicleSearcherService = new VehiclesSearcherByClientService();
    }

    public function find(int $id): Detail 
    {
        $client = $this->finder->find($id);

        $vehicles = $this->vehicleSearcherService->searchByClient($client->id());
    
        return new Detail(
            $client->id(),
            $client->dni(),
            $client->firstName(),
            $client->lastName(),
            $vehicles
        );
    }
}
