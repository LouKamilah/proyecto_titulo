<?php
require_once __DIR__ . '/../models/conexion.php';
$conexion = new Conectar();
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="../../public/assets/css/output.css" rel="stylesheet">
    <title>Fenix - Iniciar sesión</title>
</head>

<body class="bg-gray-50 min-h-screen flex items-center justify-center">

    <main class="w-full max-w-md p-6 bg-white rounded-lg shadow-lg">
        <header class="mb-6 text-center">
            <h1 class="text-5xl font-extrabold text-gray-800 my-3">FENIX</h1>
            <h1 class="text-xl font-bold text-gray-800">Iniciar sesión</h1>
            <p class="text-sm text-gray-500">Ingresa con tu cuenta para continuar</p>
        </header>

        <?php if (isset($_GET['login']) && $_GET['login'] === 'fail'): ?>
        <div class="mb-4 text-sm text-red-600">Credenciales incorrectas. Intenta de nuevo.</div>
        <?php elseif (isset($_GET['login']) && $_GET['login'] === 'ok'): ?>
        <div class="mb-4 text-sm text-green-600">Inicio de sesión exitoso.</div>
        <?php endif; ?>

        <form method="post" action="../../app/controller/UserController.php">
            <div class="mb-6">
                <label for="usuario" class="block text-sm font-medium text-gray-700">Usuario</label>
                <input type="text" id="usuario" name="usuario" required
                    class="mt-1 py-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
            </div>

            <div class="mb-4">
                <label for="password" class="block text-sm font-medium text-gray-700">Contraseña</label>
                <input type="password" id="password" name="password" required
                    class="mt-1 py-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
            </div>

            <button type="submit"
                class="w-full py-2 px-4 mt-6 bg-blue-600 text-white rounded-md hover:bg-blue-700 cursor-pointer">
                Iniciar sesión
            </button>
        </form>
    </main>

    <script src="../../node_modules/preline/preline.js"></script>
</body>

</html>