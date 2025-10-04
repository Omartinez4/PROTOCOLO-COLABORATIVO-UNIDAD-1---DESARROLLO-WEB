<?php

/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/PHPClass.php to edit this template
 */

/**
 * Description of RecordarContrasenaUseCase
 *
 * @author OCTAVIO MARTINEZ
 */

namespace Application\UseCases\Usuario;

use Domain\Repositories\UsuarioRepository;

class RecordarContrasenaUseCase {
    private UsuarioRepository $repository;

    public function __construct(UsuarioRepository $repository) {
        $this->repository = $repository;
    }

    public function execute(string $nombre): string {
        $usuario = $this->repository->buscarPorNombre($nombre);
        if (!$usuario) {
            throw new \Exception("Usuario no encontrado");
        }
        return "Se ha enviado un enlace de recuperación al correo asociado (simulado)";
    }
}

