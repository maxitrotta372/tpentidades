<?php 

namespace Src\Infrastructure\Repository\Vehicle;

use Src\Infrastructure\PDO\PDOManager;
use Src\Entity\Vehicle\Vehicle;

final readonly class VehicleRepository extends PDOManager implements VehicleRepositoryInterface {
    public function find(int $id): ?Vehicle
    {
        $query = <<<HEREDOC
                        SELECT 
                            *
                        FROM
                            vehicle V
                        WHERE
                            V.id = :id AND V.deleted = 0
                    HEREDOC;

        $parameters = [
            "id" => $id,
        ];

        $result = $this->execute($query, $parameters);

        return $this->toVehicle($result[0] ?? null);
    }

    /** @return Vehicle[] */
    public function search(): array
    {
        $query = <<<HEREDOC
                        SELECT
                            V.*
                        FROM
                            vehicle V
                        WHERE
                            V.deleted = 0
                    HEREDOC;
        
        $results = $this->execute($query);

        $vehicles = [];
        foreach($results as $result) {
            $vehicles[] = $this->toVehicle($result);
        }

        return $vehicles;
    }

    /** @return Vehicle[] */
    public function searchByClient(int $clientId): array
    {
        $query = <<<HEREDOC
                        SELECT
                            V.*
                        FROM
                            vehicle V
                        WHERE
                            V.deleted = 0 AND V.client_id = :clientId
                    HEREDOC;
        
        $parameters = [
            'clientId' => $clientId,
        ];

        $results = $this->execute($query, $parameters);

        $vehicles = [];
        foreach($results as $result) {
            $vehicles[] = $this->toVehicle($result);
        }

        return $vehicles;
    }


    public function create(Vehicle $vehicle): void
    {
        $query = <<<INSERT_QUERY
                        INSERT INTO vehicle (client_id, licensePlate, brand, model, year, color, deleted)
                        VALUES (:clientId, :licensePlate, :brand, :model, :year, :color,:deleted)
                    INSERT_QUERY;

        $parameters = [
            "clientId" => $vehicle->clientId(),
            "licensePlate" => $vehicle->licensePlate(),
            "brand" => $vehicle->brand(),
            "model" => $vehicle->model(),
            "year" => $vehicle->year(),
            "color" => $vehicle->color(),
            "deleted" => $vehicle->isDeleted(),
        ];

        $this->execute($query, $parameters);
    }

    public function update(Vehicle $vehicle): void
    {
        $query = <<<UPDATE_CATEGORY
                    UPDATE
                        vehicle
                    SET
                        client_id = :clientId,
                        licensePlate = :licensePlate,
                        brand = :brand,
                        model = :model,
                        year = :year,
                        color = :color,
                        deleted = :deleted
                    WHERE
                        id = :id
                UPDATE_CATEGORY;
        
        $parameters = [
            "clientId" => $vehicle->clientId(),
            "licensePlate" => $vehicle->licensePlate(),
            "brand" => $vehicle->brand(),
            "model" => $vehicle->model(),
            "year" => $vehicle->year(),
            "color" => $vehicle->color(),
            "deleted" => $vehicle->delete(),
            "id" => $vehicle->id(),
        ];

        $this->execute($query, $parameters);
    }

    private function toVehicle(?array $primitive): ?Vehicle {
        if ($primitive === null) {
            return null;
        }

        return new Vehicle(
            $primitive["id"],
            $primitive["client_id"],
            $primitive["licensePlate"],
            $primitive["brand"],
            $primitive["model"],
            $primitive["year"],
            $primitive["color"],
            $primitive["deleted"]
        );
    }
}