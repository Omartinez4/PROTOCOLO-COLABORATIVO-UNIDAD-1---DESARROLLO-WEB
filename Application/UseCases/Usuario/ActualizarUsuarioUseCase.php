<?php

/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/PHPClass.php to edit this template
 */

/**
 * Description of ActualizarUsuarioUseCase
 *
 * @author OCTAVIO MARTINEZ
 */

namespace Application\UseCases\Usuario;

use Domain\Repositories\UsuarioRepository;
use Domain\Entities\Usuario;
use Domain\ValueObjects\Clave;

class ActualizarUsuarioUseCase {
    private UsuarioRepository $repository;

    public function __construct(UsuarioRepository $repository) {
        $this->repository = $repository;
    }

    public function execute(int $id, string $nombre, string $rol): void {
        $usuario = $this->repository->consultar($id);
        if (!$usuario) throw new \Exception("Usuario no encontrado");
        $usuario->actualizarDatos($nombre, $rol);
        $this->repository->actualizar($usuario);
    }
}

