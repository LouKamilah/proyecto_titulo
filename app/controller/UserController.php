<?php
require_once __DIR__ . '/../models/Usuario.php';
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $usuario = trim($_POST['usuario'] ?? '');
    $password = $_POST['password'] ?? '';

    if ($usuario === '' || $password === '') {
        header('Location: ../views/home.php?error=campos');
        exit;
    }

    $usuarioModel = new Usuario();
    $user = $usuarioModel->verifyCredentials($usuario, $password);

    if ($user) {
        $_SESSION['user'] = $user;

        // Redirección directa a la vista del rol
        switch ($user['tipo_usu']) {
            case 'Operador':
                header('Location: ../views/operador/operador.php');
                break;
            case 'Jefe Area':
                header('Location: ../views/jefe_area/jefe.php');
                break;
            case 'Administrador':
                header('Location: ../views/admin/admin.php');
                break;
            case 'Calidad':
                header('Location: ../views/calidad/calidad.php');
                break;
            case 'Despacho':
                header('Location: ../views/despacho/despacho.php');
                break;
            default:
                session_destroy();
                header('Location: ../views/home.php?error=rol');
                break;
        }
        exit;
    }

    header('Location: ../views/home.php?error=credenciales');
    exit;
}