<?php

namespace Src\Entity\Vehicle;

final class Vehicle
{
    public function __construct(
        private readonly ?int $id,
        private int $clientId,
        private string $licensePlate, // Patente
        private string $brand, // Marca
        private string $model, // Modelo
        private int $year, // Año
        private string $color,
        private bool $deleted
    ) {
    }

    public function id(): ?int
    {
        return $this->id;
    }

    public function clientId(): int
    {
        return $this->clientId;
    }

    public function licensePlate(): string
    {
        return $this->licensePlate;
    }

    public function brand(): String
    {
        return $this->brand;
    }

    public function model(): String
    {
        return $this->model;
    }

    public function year(): ?int
    {
        return $this->year;
    }

    public function color(): ?String
    {
        return $this->color;
    }

    public function delete(): bool
    {
        return $this->deleted = true;
    }

    public function isDeleted(): int
    {
        return $this->deleted ? 1 : 0;
    }

    public static function create(
        int $clientId,
        String $licensePlate,
        string $brand,
        string $model,
        int $year,
        string $color
    ): self 
    { 
        return new self(null, $clientId, $licensePlate, $brand, $model, $year, $color, false);
    }

    public function modify(
        int $clientId,
        string $licensePlate,
        string $brand,
        string $model,
        int $year,
        string $color
    ): void
    {
        $this->clientId = $clientId;
        $this->licensePlate = $licensePlate;
        $this->brand = $brand;
        $this->model = $model;
        $this->year = $year;
        $this->color = $color;
    }
}