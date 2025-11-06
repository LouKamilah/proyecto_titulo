<?php
session_start();
if (!isset($_SESSION['user']) || $_SESSION['user']['tipo_usu'] !== 'Jefe Area') {
    header('Location: ../home.php?error=acceso');
    exit;
}

require_once __DIR__ . '/../../controller/CargaController.php';
require_once __DIR__ . '/../../models/conexion.php';

$user = $_SESSION['user'];
$cargaController = new CargaController();

$mensaje = '';

// Si se envía el formulario
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $sacos_asignados = $_POST['sacos_asignados'];
    $id_cliente = $_POST['id_cliente'];
    $id_jefeArea_responsable = $user['id_login']; // viene desde la sesión (login)

    if ($cargaController->crearCarga($sacos_asignados, $id_cliente, $id_jefeArea_responsable)) {
        $mensaje = "✅ Carga creada correctamente.";
    } else {
        $mensaje = "❌ Error al crear la carga.";
    }
}
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="../../../public/assets/css/output.css" rel="stylesheet">
    <title>Panel Jefe de Área - Fenix</title>
</head>

<?php require_once __DIR__ . '/../layout/header.php'; ?>
<?php require_once __DIR__ . '/../layout/side_bar.php'; ?>

<body class="bg-gray-50 min-h-screen">
    <div class="w-full lg:ps-76 pt-10">
        <main class="px-8 mx-auto">
            <h1 class="text-2xl font-bold text-gray-800 mb-6">
                Bienvenido, <?= htmlspecialchars($user['usuario']); ?> (<?= htmlspecialchars($user['tipo_usu']); ?>)
            </h1>

            <?php if ($mensaje): ?>
            <div
                class="mb-4 p-3 rounded <?= str_contains($mensaje, 'Error') ? 'bg-red-100 text-red-700' : 'bg-green-100 text-green-700' ?>">
                <?= htmlspecialchars($mensaje); ?>
            </div>
            <?php endif; ?>

            <form method="POST" class="bg-white p-6 rounded-lg shadow-md space-y-4">
                <h2 class="text-lg font-semibold text-gray-700">Registrar nueva carga</h2>

                <div>
                    <label class="block text-gray-600 mb-1" for="sacos_asignados">Sacos asignados</label>
                    <input type="number" name="sacos_asignados" id="sacos_asignados" required
                        class="border-gray-300 rounded-md w-full p-2 focus:ring focus:ring-blue-300">
                </div>

                <div>
                    <label class="block text-gray-600 mb-1" for="id_cliente">Cliente</label>
                    <select name="id_cliente" id="id_cliente" required
                        class="border-gray-300 rounded-md w-full p-2 focus:ring focus:ring-blue-300">
                        <option value="">Seleccione un cliente</option>
                        <?php
                    // obtener clientes activos
                    $conexion = new Conectar();
                    $stmt = $conexion->conexion->query("SELECT id_cliente, nombre_cliente FROM cliente");
                    $clientes = $stmt->fetchAll(PDO::FETCH_ASSOC);
                    foreach ($clientes as $cliente): ?>
                        <option value="<?= $cliente['id_cliente'] ?>">
                            <?= htmlspecialchars($cliente['nombre_cliente']); ?>
                        </option>
                        <?php endforeach; ?>
                    </select>
                </div>

                <button type="submit"
                    class="bg-blue-600 text-white px-4 py-2 rounded-md hover:bg-blue-700 transition">Guardar
                    Carga</button>
            </form>
        </main>

        <script src="../../../node_modules/preline/preline.js"></script>
</body>

</html>