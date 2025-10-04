<?php

/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/PHPInterface.php to edit this template
 */

/**
 *
 * @author OCTAVIO MARTINEZ
 */

namespace Domain\Repositories;

use Domain\Entities\Usuario;

interface UsuarioRepository {
    public function crear(Usuario $usuario): void;
    public function consultar(int $id): ?Usuario;
    public function actualizar(Usuario $usuario): void;
    public function eliminar(int $id): void;
    public function listar(): array;
    public function buscarPorNombre(string $nombre): ?Usuario;
}

