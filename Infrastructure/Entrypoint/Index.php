<?php


error_reporting(E_ALL);
ini_set('display_errors', 1);

require_once __DIR__ . '/vendor/autoload.php';

use Infrastructure\Controllers\UsuarioController;



header("Content-Type: application/json");

$controller = new UsuarioController();
$uri = $_SERVER['REQUEST_URI'];
$method = $_SERVER['REQUEST_METHOD'];

// Limpia parámetros tipo /usuarios/3
$uriParts = explode('/', trim($uri, '/'));
$route = $uriParts[0] ?? null;
$id = $uriParts[1] ?? null;

if ($route === 'usuarios') {
    switch ($method) {
        case 'POST':
            if ($id === 'crear') {
                $controller->crear();
            } elseif ($id === 'login') {
                $controller->login();
            } elseif ($id === 'logout') {
                $controller->logout();
            } elseif ($id === 'recordar') {
                $controller->recordar();
            }
            break;

        case 'GET':
            if ($id) {
                $controller->consultar((int) $id);
            } else {
                $controller->listar();
            }
            break;

        case 'PUT':
            if ($id) {
                $controller->actualizar((int) $id);
            }
            break;

        case 'DELETE':
            if ($id) {
                $controller->eliminar((int) $id);
            }
            break;

        default:
            echo json_encode(["error" => "Método no soportado"]);
    }
} else {
    echo json_encode(["error" => "Ruta no encontrada"]);
}

