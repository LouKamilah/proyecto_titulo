<?php
session_start();
if (!isset($_SESSION['user']) || $_SESSION['user']['tipo_usu'] !== 'Calidad') {
    header('Location: ../home.php?error=acceso');
    exit;
}
$user = $_SESSION['user'];
$id_carga_url = $_GET['id_carga'] ?? null;
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <title>Escanear Carga - Calidad</title>
    <link href="../../../public/assets/css/output.css" rel="stylesheet">
    <script src="https://unpkg.com/html5-qrcode" type="text/javascript"></script>
</head>

<body class="bg-gray-50 min-h-screen p-8 flex flex-col items-center">

    <h1 class="text-2xl font-bold mb-4">Escanear Carga - Área Calidad</h1>
    <h1 class="text-2xl font-bold mb-4 text-center">Carga #<?= htmlspecialchars($id_carga_url) ?></h1>

    <!-- LECTOR QR LIVE -->
    <div class="w-full max-w-md mb-6">
        <div id="reader" class="w-full border rounded"></div>
        <p id="resultMessage" class="text-sm text-gray-600 mt-2 text-center"></p>
    </div>

    <form id="sacosForm" method="POST" action="../../controller/CalidadController.php"
        class="mt-4 w-full max-w-lg space-y-4 bg-white p-6 rounded shadow opacity-50 pointer-events-none">
        <div id="sacosContainer"></div>
        <input type="hidden" name="id_carga" id="id_carga" value="<?= htmlspecialchars($id_carga_url) ?>">

        <div class="flex items-center gap-4 mt-4">
            <label class="flex items-center gap-2">
                <input type="radio" class="form-radio" name="resultado_qa" value="Aprobado" required>
                <span>Aprobado</span>
            </label>

            <label class="flex items-center gap-2">
                <input type="radio" class="form-radio" name="resultado_qa" value="Rechazado" required>
                <span>Rechazado</span>
            </label>

            <select name="motivo_rechazo" id="motivo_rechazo" class="border rounded p-2" disabled required>
                <option value="">Selecciona un motivo</option>
                <option value="Error de humedad">Error de humedad</option>
                <option value="Error de peso">Error de peso</option>
                <option value="Saco defectuoso">Saco defectuoso</option>
                <option value="Resultado muestreo">Resultado muestreo</option>
                <option value="Error de etiqueta">Error de etiqueta</option>
            </select>
        </div>

        <div class="mt-4">
            <label for="codigo_muestreo" class="block font-semibold mb-1">Código de Muestreo:</label>
            <input type="number" name="codigo_muestreo" id="codigo_muestreo" class="border rounded p-2 w-full"
                placeholder="Ingrese código de muestreo" required>
        </div>

        <div class="mt-4">
            <label for="observaciones_qa" class="block font-semibold mb-1">Observaciones QA:</label>
            <textarea name="observaciones_qa" id="observaciones_qa" maxlength="255"
                placeholder="Escribe observaciones generales sobre la carga..."
                class="border rounded p-2 w-full h-24 resize-none"></textarea>
        </div>

        <button type="submit" class="bg-green-600 text-white px-4 py-2 rounded w-full mt-4 hover:bg-green-700">Guardar
            Resultados</button>
    </form>

    <script>
    // ID esperado desde la URL
    const idCargaURL = "<?= htmlspecialchars($id_carga_url) ?>";
    const form = document.getElementById("sacosForm");
    const sacosContainer = document.getElementById("sacosContainer");
    const idCargaInput = document.getElementById("id_carga");
    const resultMessage = document.getElementById("resultMessage");

    // Función para crear inputs de sacos
    function createSacoInput(saco, index) {
        return `
            <div class="border p-4 rounded mb-4">
                <h2 class="font-semibold mb-2">Saco ${index + 1}</h2>
                <input type="hidden" name="sacos[${index}][id_saco]" value="${saco.id_saco}">
                <p><strong>Fecha Elaboración:</strong>
                    <input type="date" name="sacos[${index}][fecha_elaboracion]" value="${saco.fecha_elaboracion || ''}" class="border p-1 rounded w-full">
                </p>
                <p><strong>Lote:</strong>
                    <input type="text" name="sacos[${index}][lote]" value="${saco.lote || ''}" class="border p-1 rounded w-full">
                </p>
                <p><strong>Humedad:</strong>
                    <input type="number" step="0.01" name="sacos[${index}][humedad]" value="${saco.humedad || ''}" class="border p-1 rounded w-full">
                </p>
                <p><strong>Temperatura:</strong>
                    <input type="number" step="0.01" name="sacos[${index}][temperatura]" value="${saco.temperatura || ''}" class="border p-1 rounded w-full">
                </p>
                <p><strong>Kilos:</strong>
                    <input type="number" step="0.01" name="sacos[${index}][kilos]" value="${saco.kilos || ''}" class="border p-1 rounded w-full">
                </p>
            </div>`;
    }

    // QR en tiempo real
    const html5QrCode = new Html5Qrcode("reader");

    function bloquearFormulario() {
        form.classList.add("opacity-50", "pointer-events-none");
    }

    function desbloquearFormulario() {
        form.classList.remove("opacity-50", "pointer-events-none");
    }

    function onScanSuccess(decodedText) {
        try {
            const data = JSON.parse(decodedText.trim());
            const idCargaQR = String(data.id_carga || "");

            if (!idCargaQR) throw new Error("QR inválido o sin ID de carga.");

            // Verificar coincidencia
            if (idCargaQR !== idCargaURL) {
                alert("⚠️ El QR escaneado no coincide con la carga actual.");
                bloquearFormulario();
                resultMessage.textContent = "QR no coincide con la carga (ID: " + idCargaQR + ")";
                return;
            }

            // Si coincide, se desbloquea el formulario y se cargan datos
            desbloquearFormulario();
            resultMessage.textContent = "QR válido. Carga coincidente. Cargando datos...";

            fetch(`../../controller/CargaController.php?action=getCarga&id_carga=${idCargaQR}`)
                .then(res => res.json())
                .then(info => {
                    if (info.error) throw new Error(info.error);

                    idCargaInput.value = info.carga.id_carga;
                    sacosContainer.innerHTML = "";
                    info.sacos.forEach((s, i) => sacosContainer.innerHTML += createSacoInput(s, i));

                    resultMessage.innerHTML =
                        `<span class="text-green-700 font-semibold">
                            Carga detectada correctamente (ID: ${info.carga.id_carga}) - Cliente: ${info.carga.nombre_cliente}
                        </span>`;
                })
                .catch(err => {
                    bloquearFormulario();
                    resultMessage.textContent = "Error: " + err.message;
                });
        } catch (err) {
            bloquearFormulario();
            resultMessage.textContent = "Error al leer QR: " + err.message;
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
        )
        .catch(err => console.error("Error al iniciar cámara: ", err));

    // Control de motivo rechazo
    const radios = document.querySelectorAll('input[name="resultado_qa"]');
    const motivoSelect = document.getElementById('motivo_rechazo');
    motivoSelect.style.opacity = '0.5';
    motivoSelect.style.pointerEvents = 'none';

    radios.forEach(radio => {
        radio.addEventListener('change', () => {
            if (radio.value === 'Rechazado' && radio.checked) {
                motivoSelect.disabled = false;
                motivoSelect.required = true;
                motivoSelect.style.opacity = '1';
                motivoSelect.style.pointerEvents = 'auto';
            } else {
                motivoSelect.disabled = true;
                motivoSelect.required = false;
                motivoSelect.value = '';
                motivoSelect.style.opacity = '0.5';
                motivoSelect.style.pointerEvents = 'none';
            }
        });
    });
    </script>

</body>

</html>