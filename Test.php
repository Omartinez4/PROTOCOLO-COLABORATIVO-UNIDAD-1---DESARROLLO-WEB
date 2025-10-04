<?php
require_once __DIR__ . '/vendor/composer/autoload.php';

use Domain\Entities\Usuario;
use Domain\ValueObjects\Clave;

$usuario = new Usuario(1, new Clave("123456"), "Juan", "Admin");
echo "Usuario creado: " . $usuario->getNombre();


