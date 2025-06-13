<?php 

namespace Src\Infrastructure\Repository\Client;

use Src\Infrastructure\PDO\PDOManager;
use Src\Entity\Client\Client;

final readonly class ClientRepository extends PDOManager implements ClientRepositoryInterface {
    public function find(int $id): ?Client
    {
        $query = <<<HEREDOC
                        SELECT 
                            *
                        FROM
                            client C
                        WHERE
                            C.id = :id AND C.deleted = 0
                    HEREDOC;

        $parameters = [
            "id" => $id,
        ];

        $result = $this->execute($query, $parameters);

        return $this->toClient($result[0] ?? null);
    }

    /** @return Client[] */
    public function search(): array
    {
        $query = <<<HEREDOC
                        SELECT
                            *
                        FROM
                            client C
                        WHERE
                            C.deleted = 0
                    HEREDOC;
        
        $results = $this->execute($query);

        $clients = [];
        foreach($results as $result) {
            $clients[] = $this->toClient($result);
        }

        return $clients;
    }

    public function create(Client $client): void
    {
        $query = <<<INSERT_QUERY
                        INSERT INTO client (dni, firstName, lastName, deleted)
                        VALUES (:dni, :firstName, :lastName, :deleted)
                    INSERT_QUERY;

        $parameters = [
            "dni" => $client->dni(),
            "firstName" => $client->firstName(),
            "lastName" => $client->lastName(),
            "deleted" => $client->isDeleted()
        ];

        $this->execute($query, $parameters);
    }

    public function update(Client $client): void
    {
        $query = <<<UPDATE_CATEGORY
                    UPDATE
                        client
                    SET
                        dni = :dni,
                        firstName = :firstName,
                        lastName = :lastName,
                        deleted = :deleted
                    WHERE
                        id = :id
                UPDATE_CATEGORY;
        
        $parameters = [
            "dni" => $client->dni(),
            "firstName" => $client->firstName(),
            "lastName" => $client->lastName(),
            "deleted" => $client->isDeleted(),
            "id" => $client->id(),
        ];

        $this->execute($query, $parameters);
    }

    private function toClient(?array $primitive): ?Client {
        if ($primitive === null) {
            return null;
        }

        return new Client(
            $primitive["id"],
            $primitive["dni"],
            $primitive["firstName"],
            $primitive["lastName"],
            $primitive["deleted"]
        );
    }
}