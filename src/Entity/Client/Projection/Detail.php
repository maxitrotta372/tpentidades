<?php

namespace src\Entity\Client\Projection;

use src\Entity\Vehicle\Vehicle;

final readonly class Detail
{
    /** @param Vehicle[] $vehicles */
    public function __construct(
        private int $id,
        private string $dni,
        private string $firstName,
        private string $lastName,
        private array $vehicles,
    ) {
    }

    // Getters
    public function id(): int
    {
        return $this->id;
    }

    public function dni(): string
    {
        return $this->dni;
    }

    public function firstName(): string
    {
        return $this->firstName;
    }

    public function lastName(): string
    {
        return $this->lastName;
    }

    /** @return Vehicle[] */
    public function vehicles(): array
    {
        return $this->vehicles;
    }
}