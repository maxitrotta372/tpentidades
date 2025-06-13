<?php

namespace src\Entity\Client;

final class Client
{
    public function __construct(
        private readonly ?int $id,
        private string $dni,
        private string $firstName,
        private string $lastName,
        private bool $deleted
    ) {
    }

    // Getters
    public function id(): ?int
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

    public function delete(): void
    {
        $this->deleted = true;
    }

    public function isDeleted(): int
    {
        return $this->deleted ? 1 : 0;
    }

    public static function create(
        int $dni,
        string $firstName,
        string $lastName,
    ): self {
        return new self(null, $dni, $firstName, $lastName, false);
    }

    //Métodos para gestionar vehículos
    public function modify(
        int $dni,
        string $firstName,
        string $lastName,
    ): void {
        $this->dni = $dni;
        $this->firstName = $firstName;
        $this->lastName = $lastName;
    }
}