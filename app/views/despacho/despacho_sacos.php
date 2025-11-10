<?php
session_start();
if (!isset($_SESSION['user']) || $_SESSION['user']['tipo_usu'] !== 'Despacho') {
    header('Location: ../home.php?error=acceso');
    exit;
}

require_once __DIR__ . '/../../controller/CargaController.php';

$user = $_SESSION['user'];
$id_despacho_responsable = $user['id_empleado'] ?? null;

$cargaController = new CargaController();
$id_carga_url = $_GET['id_carga'] ?? null;
$carga = $id_carga_url ? $cargaController->obtenerCargaPorId($id_carga_url) : null;
$error = null;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id_carga_form = $_POST['id_carga'] ?? null;

    // 1. Validar coincidencia
    if ($id_carga_url !== $id_carga_form) {
        $error = "El QR no coincide con la carga actual.";
    } else {
        // 2. Validar estado
        $carga_post = $cargaController->obtenerCargaPorId($id_carga_form);
        if ($carga_post && $carga_post['estado_actual'] === 'Rechazada') {
            $error = "No se puede despachar una carga rechazada.";
        } else {
            // 3. Guardar datos
            $nombre_chofer = trim($_POST['nombre_chofer'] ?? '');
            $apellido_chofer = trim($_POST['apellido_chofer'] ?? '');
            $patente_camion = trim($_POST['patente_camion'] ?? '');
            $observaciones = trim($_POST['observaciones'] ?? '');

            if ($nombre_chofer && $apellido_chofer && $patente_camion) {
                $responsable_traslado = "$nombre_chofer $apellido_chofer";
                $cargaController->finalizarDespacho(
                    $id_carga_form,
                    $responsable_traslado,
                    $patente_camion,
                    $observaciones,
                    $id_despacho_responsable
                );
                header("Location: despacho_sacos.php?id_carga=$id_carga_form&success=1");
                exit;
            } else {
                $error = "Por favor completa todos los campos obligatorios.";
            }
        }
    }
}
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <link href="../../../public/assets/css/output.css" rel="stylesheet">
    <script src="https://unpkg.com/html5-qrcode" type="text/javascript"></script>
    <title>Despacho de Carga</title>
</head>

<body class="bg-gray-100 min-h-screen flex flex-col items-center justify-center">

    <main class="w-full max-w-md p-6 bg-white rounded-lg shadow-lg">
        <h1 class="text-2xl font-bold mb-4 text-center">Despacho de Carga #<?= htmlspecialchars($id_carga_url) ?></h1>

        <?php if (isset($_GET['success'])): ?>
        <div class="text-center bg-green-100 text-green-700 p-3 rounded mb-4">
            Despacho finalizado correctamente.
        </div>
        <?php endif; ?>

        <?php if ($error): ?>
        <div class="text-center bg-red-100 text-red-700 p-3 rounded mb-4">
            <?= htmlspecialchars($error); ?>
        </div>
        <?php endif; ?>

        <!-- LECTOR QR -->
        <div class="mb-4">
            <h2 class="text-lg font-semibold mb-2 text-center">Escanear código QR</h2>
            <div id="reader" class="w-full border rounded"></div>
        </div>

        <form id="formDespacho" method="POST" class="space-y-4 opacity-50 pointer-events-none">
            <div>
                <label class="block text-sm font-medium text-gray-700">ID Carga</label>
                <input type="text" id="id_carga" name="id_carga" readonly class="w-full border p-2 rounded bg-gray-100">
            </div>

            <hr class="my-4">

            <div>
                <label for="nombre_chofer" class="block text-sm font-medium text-gray-700">Nombre del chofer</label>
                <input type="text" id="nombre_chofer" name="nombre_chofer" required class="w-full border p-2 rounded">
            </div>

            <div>
                <label for="apellido_chofer" class="block text-sm font-medium text-gray-700">Apellido del chofer</label>
                <input type="text" id="apellido_chofer" name="apellido_chofer" required
                    class="w-full border p-2 rounded">
            </div>

            <div>
                <label for="patente_camion" class="block text-sm font-medium text-gray-700">Patente del camión</label>
                <input type="text" id="patente_camion" name="patente_camion" required class="w-full border p-2 rounded">
            </div>

            <div>
                <label for="observaciones" class="block text-sm font-medium text-gray-700">Observaciones del
                    despacho</label>
                <textarea id="observaciones" name="observaciones" rows="3" class="w-full border p-2 rounded"></textarea>
            </div>

            <button type="submit" class="w-full bg-blue-600 text-white py-2 rounded hover:bg-blue-700">
                Finalizar Despacho
            </button>
        </form>

        <div class="mt-4 text-center">
            <a href="despacho.php" class="text-blue-600 hover:underline">Volver al panel</a>
        </div>
    </main>

    <script>
    const html5QrCode = new Html5Qrcode("reader");
    const idUrl = "<?= htmlspecialchars($id_carga_url) ?>";

    function bloquearFormulario(mensaje) {
        alert(mensaje);
        const form = document.getElementById("formDespacho");
        form.classList.add("opacity-50", "pointer-events-none");
        form.querySelector("button[type='submit']").disabled = true;
    }

    function habilitarFormulario() {
        const form = document.getElementById("formDespacho");
        form.classList.remove("opacity-50", "pointer-events-none");
        form.querySelector("button[type='submit']").disabled = false;
    }

    function onScanSuccess(decodedText) {
        try {
            const data = JSON.parse(decodedText);
            document.getElementById("id_carga").value = data.id_carga || "";

            if (!data.id_carga) {
                bloquearFormulario("El código QR no contiene un ID de carga válido.");
                return;
            }

            if (data.id_carga.toString() !== idUrl.toString()) {
                bloquearFormulario("El QR no coincide con la carga actual.");
                return;
            }

            if (data.estado_actual && data.estado_actual.toLowerCase() === "rechazada") {
                bloquearFormulario("Esta carga fue RECHAZADA. No se puede continuar con el despacho.");
                return;
            }

            habilitarFormulario();

        } catch (e) {
            bloquearFormulario("Código QR no válido.");
        }
    }

    html5QrCode.start({
            facingMode: "environment"
        }, {
            fps: 10,
            qrbox: {
                width: 250,
                height: 250
            }
        },
        onScanSuccess
    ).catch(err => console.error("Error al iniciar cámara: ", err));
    </script>

</body>

</html>