<?php

/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/PHPClass.php to edit this template
 */

/**
 * Description of MySQLUsuarioRepository
 *
 * @author OCTAVIO MARTINEZ
 */

namespace Infrastructure\Persistence;

use Domain\Repositories\UsuarioRepository;
use Domain\Entities\Usuario;
use Domain\ValueObjects\Clave;
use PDO;

class MySQLUsuarioRepository implements UsuarioRepository {
    private PDO $db;

    public function __construct(DatabaseConnection $connection) {
        $this->db = $connection->getConnection();
    }

    public function crear(Usuario $usuario): void {
        $stmt = $this->db->prepare("INSERT INTO usuarios (clave, nombre, rol) VALUES (?, ?, ?)");
        $stmt->execute([$usuario->getClave()->getValor(), $usuario->getNombre(), $usuario->getRol()]);
    }

    public function consultar(int $id): ?Usuario {
        $stmt = $this->db->prepare("SELECT * FROM usuarios WHERE id = ?");
        $stmt->execute([$id]);
        $data = $stmt->fetch(PDO::FETCH_ASSOC);

        if (!$data) return null;
        return new Usuario($data['id'], new Clave($data['clave']), $data['nombre'], $data['rol']);
    }

    public function actualizar(Usuario $usuario): void {
        $stmt = $this->db->prepare("UPDATE usuarios SET nombre=?, rol=? WHERE id=?");
        $stmt->execute([$usuario->getNombre(), $usuario->getRol(), $usuario->getId()]);
    }

    public function eliminar(int $id): void {
        $stmt = $this->db->prepare("DELETE FROM usuarios WHERE id=?");
        $stmt->execute([$id]);
    }

    public function listar(): array {
        $stmt = $this->db->query("SELECT * FROM usuarios");
        $usuarios = [];

        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $usuarios[] = new Usuario($row['id'], new Clave($row['clave']), $row['nombre'], $row['rol']);
        }
        return $usuarios;
    }

    public function buscarPorNombre(string $nombre): ?Usuario {
        $stmt = $this->db->prepare("SELECT * FROM usuarios WHERE nombre = ?");
        $stmt->execute([$nombre]);
        $data = $stmt->fetch(PDO::FETCH_ASSOC);

        if (!$data) return null;
        return new Usuario($data['id'], new Clave($data['clave']), $data['nombre'], $data['rol']);
    }
}

