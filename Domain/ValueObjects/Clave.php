<?php

/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/PHPClass.php to edit this template
 */

/**
 * Description of Clave
 *
 * @author OCTAVIO MARTINEZ
 */

namespace Domain\ValueObjects;

class Clave {
    private string $valor;

    public function __construct(string $valor) {
        if (strlen($valor) < 6) {
            throw new \InvalidArgumentException("La clave debe tener al menos 6 caracteres");
        }
        $this->valor = password_hash($valor, PASSWORD_BCRYPT);
    }

    public function verificar(string $clave): bool {
        return password_verify($clave, $this->valor);
    }

    public function getValor(): string {
        return $this->valor;
    }
}

