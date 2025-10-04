<?php

/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/PHPClass.php to edit this template
 */

/**
 * Description of CerrarSesionUseCase
 *
 * @author OCTAVIO MARTINEZ
 */

namespace Application\UseCases\Usuario;

class CerrarSesionUseCase {
    public function execute(): void {
        session_start();
        session_destroy();
    }
}
