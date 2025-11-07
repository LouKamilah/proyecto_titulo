<?php
session_start();
if (!isset($_SESSION['user']) || $_SESSION['user']['tipo_usu'] !== 'Operador') {
    header('Location: ../home.php?error=acceso');
    exit;
}

require_once __DIR__ . '/../../controller/SacoController.php';
require_once __DIR__ . '/../../controller/QrController.php';
require_once __DIR__ . '/../../models/Carga.php';
require_once __DIR__ . '/../../models/Saco.php';

$user = $_SESSION['user'];
$id_operador = $user['id_login'];
$id_carga = $_GET['id_carga'] ?? null;

$cargaController = new Carga();
$carga = $cargaController->obtenerCargaPorId($id_carga);

$sacoModel = new Saco();
$sacosActuales = $sacoModel->contarPorCarga($id_carga);
$completado = $sacosActuales >= $carga['sacos_asignados'];

$controller = new SacoController();

if ($_SERVER['REQUEST_METHOD'] === 'POST' && !$completado) {
    $fecha_elaboracion = $_POST['fecha_elaboracion'];
    $lote = $_POST['lote'];
    $humedad = $_POST['humedad'];
    $temperatura = $_POST['temperatura'];
    $kilos = $_POST['kilos'];

    $controller->crearSaco($fecha_elaboracion, $lote, $humedad, $temperatura, $kilos, $id_carga, $id_operador);

    // Redirección con JavaScript (evita errores de rutas relativas)
    echo "<script>window.location.href='operador_sacos.php?id_carga=$id_carga';</script>";
    exit;
}

?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <link href="../../../public/assets/css/output.css" rel="stylesheet">
    <title>Agregar Sacos</title>
</head>

<body class="bg-gray-50 min-h-screen flex flex-col items-center justify-center">

    <main class="w-full max-w-md p-6 bg-white rounded-lg shadow-lg">
        <h1 class="text-2xl font-bold mb-4 text-center">
            Carga #<?= htmlspecialchars($id_carga); ?> - Cliente: <?= htmlspecialchars($carga['nombre_cliente']); ?>
        </h1>

        <p class="text-center mb-4">
            Sacos ingresados: <strong><?= $sacosActuales; ?></strong> /
            <?= $carga['sacos_asignados']; ?>
        </p>

        <?php if (!$completado): ?>
        <form method="POST" class="space-y-4">
            <div>
                <label for="fecha_elaboracion" class="block text-sm font-medium text-gray-700">Fecha de
                    elaboración</label>
                <input type="date" id="fecha_elaboracion" name="fecha_elaboracion" required
                    class="w-full border p-2 rounded">
            </div>

            <div>
                <label for="lote" class="block text-sm font-medium text-gray-700">Lote</label>
                <input type="text" id="lote" name="lote" required class="w-full border p-2 rounded">
            </div>

            <div>
                <label for="humedad" class="block text-sm font-medium text-gray-700">Humedad (%)</label>
                <input type="number" step="0.01" id="humedad" name="humedad" required class="w-full border p-2 rounded">
            </div>

            <div>
                <label for="temperatura" class="block text-sm font-medium text-gray-700">Temperatura (°C)</label>
                <input type="number" step="0.01" id="temperatura" name="temperatura" required
                    class="w-full border p-2 rounded">
            </div>

            <div>
                <label for="kilos" class="block text-sm font-medium text-gray-700">Kilos</label>
                <input type="number" step="0.01" id="kilos" name="kilos" required class="w-full border p-2 rounded">
            </div>

            <button type="submit" class="w-full bg-blue-600 text-white py-2 rounded hover:bg-blue-700">
                Guardar Saco
            </button>
        </form>
        <?php else: ?>
        <div class="text-center">
            <p class="text-green-600 font-semibold mb-4">Todos los sacos han sido ingresados.</p>
            <a href="../../controller/QrController.php?action=generate&id_carga=<?= $id_carga; ?>"
                class="bg-green-600 text-white px-4 py-2 rounded hover:bg-green-700">
                Generar Código QR
            </a>
        </div>
        <?php endif; ?>

        <div class="mt-4 text-center">
            <a href="operador.php" class="text-blue-600 hover:underline">Volver al panel</a>
        </div>
    </main>
</body>

</html>