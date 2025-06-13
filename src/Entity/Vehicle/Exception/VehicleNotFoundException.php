<?php 

namespace Src\Entity\Vehicle\Exception;

use Exception;

final class VehicleNotFoundException extends Exception {
    public function __construct(int $id) {
        parent::__construct('No se encontro el vehículo con id: '.$id);
    }
}