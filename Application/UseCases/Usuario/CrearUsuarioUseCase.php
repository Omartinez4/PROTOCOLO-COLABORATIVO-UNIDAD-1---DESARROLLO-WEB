<?php

/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/PHPClass.php to edit this template
 */

/**
 * Description of CrearUsuarioUseCase
 *
 * @author OCTAVIO MARTINEZ
 */

namespace Application\UseCases\Usuario;

use Domain\Repositories\UsuarioRepository;
use Domain\Entities\Usuario;
use Domain\ValueObjects\Clave;

class CrearUsuarioUseCase {
    private UsuarioRepository $repository;

    public function __construct(UsuarioRepository $repository) {
        $this->repository = $repository;
    }

    public function execute(string $clave, string $nombre, string $rol): void {
        $usuario = new Usuario(0, new Clave($clave), $nombre, $rol);
        $this->repository->crear($usuario);
    }
}

