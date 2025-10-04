<?php

/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/PHPClass.php to edit this template
 */

/**
 * Description of UsuarioController
 *
 * @author OCTAVIO MARTINEZ
 */


namespace Infrastructure\Controllers;

use Application\UseCases\Usuario\{
    CrearUsuarioUseCase,
    ConsultarUsuarioUseCase,
    ActualizarUsuarioUseCase,
    EliminarUsuarioUseCase,
    ListarUsuariosUseCase,
    IniciarSesionUseCase,
    CerrarSesionUseCase,
    RecordarContrasenaUseCase
};
use Infrastructure\Persistence\{
    MySQLUsuarioRepository,
    DatabaseConnection
};

class UsuarioController {
    private MySQLUsuarioRepository $repository;

    public function __construct() {
        $this->repository = new MySQLUsuarioRepository(new DatabaseConnection());
    }

    public function crear() {
        $data = json_decode(file_get_contents('php://input'), true);
        $useCase = new CrearUsuarioUseCase($this->repository);
        $useCase->execute($data['clave'], $data['nombre'], $data['rol']);
        echo json_encode(["mensaje" => "Usuario creado exitosamente"]);
    }

    public function consultar($id) {
        $useCase = new ConsultarUsuarioUseCase($this->repository);
        $usuario = $useCase->execute($id);
        echo json_encode($usuario);
    }

    public function listar() {
        $useCase = new ListarUsuariosUseCase($this->repository);
        $usuarios = $useCase->execute();
        echo json_encode($usuarios);
    }

    public function actualizar($id) {
        $data = json_decode(file_get_contents('php://input'), true);
        $useCase = new ActualizarUsuarioUseCase($this->repository);
        $useCase->execute($id, $data['nombre'], $data['rol']);
        echo json_encode(["mensaje" => "Usuario actualizado correctamente"]);
    }

    public function eliminar($id) {
        $useCase = new EliminarUsuarioUseCase($this->repository);
        $useCase->execute($id);
        echo json_encode(["mensaje" => "Usuario eliminado"]);
    }

    public function login() {
        $data = json_decode(file_get_contents('php://input'), true);
        $useCase = new IniciarSesionUseCase($this->repository);
        $valido = $useCase->execute($data['nombre'], $data['clave']);

        if ($valido) {
            session_start();
            $_SESSION['usuario'] = $data['nombre'];
            echo json_encode(["mensaje" => "Inicio de sesión exitoso"]);
        } else {
            echo json_encode(["error" => "Credenciales incorrectas"]);
        }
    }

    public function logout() {
        $useCase = new CerrarSesionUseCase();
        $useCase->execute();
        echo json_encode(["mensaje" => "Sesión cerrada"]);
    }

    public function recordar() {
        $data = json_decode(file_get_contents('php://input'), true);
        $useCase = new RecordarContrasenaUseCase($this->repository);
        $msg = $useCase->execute($data['nombre']);
        echo json_encode(["mensaje" => $msg]);
    }
}
