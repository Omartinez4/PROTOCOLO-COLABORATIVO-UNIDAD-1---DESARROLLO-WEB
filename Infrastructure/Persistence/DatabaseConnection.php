<?php

/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/PHPClass.php to edit this template
 */

/**
 * Description of DatabaseConnection
 *
 * @author OCTAVIO MARTINEZ
 */

namespace Infrastructure\Persistence;

use PDO;

class DatabaseConnection {
    private PDO $connection;

    public function __construct() {
        $this->connection = new PDO('mysql:host=localhost;dbname=usuariosdb', 'root', '110420Juan*');
        $this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }

    public function getConnection(): PDO {
        return $this->connection;
    }
}

