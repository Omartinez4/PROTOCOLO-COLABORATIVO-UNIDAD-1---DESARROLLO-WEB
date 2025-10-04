<?php

/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/PHPClass.php to edit this template
 */

/**
 * Description of ConsultarUsuarioUseCase
 *
 * @author OCTAVIO MARTINEZ
 */

namespace Application\UseCases\Usuario;

use Domain\Repositories\UsuarioRepository;

class ConsultarUsuarioUseCase {
    private UsuarioRepository $repository;

    public function __construct(UsuarioRepository $repository) {
        $this->repository = $repository;
    }

    public function execute(int $id) {
        return $this->repository->consultar($id);
    }
}

