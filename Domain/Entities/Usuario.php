<?php

/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/PHPClass.php to edit this template
 */

/**
 * Description of Usuario
 *
 * @author OCTAVIO MARTINEZ
 */

namespace Domain\Entities;

use Domain\ValueObjects\Clave;

class Usuario {
    private int $id;
    private Clave $clave;
    private string $nombre;
    private string $rol;

    public function __construct(int $id, Clave $clave, string $nombre, string $rol) {
        $this->id = $id;
        $this->clave = $clave;
        $this->nombre = $nombre;
        $this->rol = $rol;
    }

    public function getId(): int { return $this->id; }
    public function getClave(): Clave { return $this->clave; }
    public function getNombre(): string { return $this->nombre; }
    public function getRol(): string { return $this->rol; }

    public function actualizarDatos(string $nombre, string $rol): void {
        $this->nombre = $nombre;
        $this->rol = $rol;
    }
}

