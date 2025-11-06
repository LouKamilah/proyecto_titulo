<?php
require_once __DIR__ . '/conexion.php';

class Usuario {
    private $db;

    public function __construct() {
        $con = new Conectar();
        $this->db = $con->conexion;
    }

    // Buscar usuario por nombre
    public function findByUsuario(string $usuario) {
        $stmt = $this->db->prepare("SELECT * FROM login WHERE usuario = ? LIMIT 1");
        $stmt->execute([$usuario]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    // Verificar credenciales (texto plano)
    public function verifyCredentials(string $usuario, string $password) {
        $user = $this->findByUsuario($usuario);
        if (!$user) return false;

        // Comparar directamente las contraseñas (texto plano)
        if (isset($user['contraseña']) && $password === $user['contraseña']) {
            unset($user['contraseña']); // no devolverla nunca
            return $user;
        }

        return false;
    }

    // Crear usuario (guarda contraseña en texto plano)
    public function create(string $usuario, string $password, string $tipo_usu = 'Operador') {
        $stmt = $this->db->prepare("INSERT INTO login (usuario, contraseña, tipo_usu) VALUES (?, ?, ?)");
        $stmt->execute([$usuario, $password, $tipo_usu]);
        return $this->db->lastInsertId();
    }
}