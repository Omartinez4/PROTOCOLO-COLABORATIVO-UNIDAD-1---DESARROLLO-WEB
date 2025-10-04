<?php

/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/PHPClass.php to edit this template
 */

/**
 * Description of IniciarSesionUseCase
 *
 * @author OCTAVIO MARTINEZ
 */

namespace Application\UseCases\Usuario;

use Domain\Repositories\UsuarioRepository;

class IniciarSesionUseCase {
    private UsuarioRepository $repository;

    public function __construct(UsuarioRepository $repository) {
        $this->repository = $repository;
    }

    public function execute(string $nombre, string $clave): bool {
        $usuario = $this->repository->buscarPorNombre($nombre);
        if (!$usuario) return false;
        return $usuario->getClave()->verificar($clave);
    }
}

