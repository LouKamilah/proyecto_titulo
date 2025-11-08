<?php
session_start();
if (!isset($_SESSION['user']) || $_SESSION['user']['tipo_usu'] !== 'Calidad') {
    header('Location: ../home.php?error=acceso');
    exit;
}
$user = $_SESSION['user'];
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <title>Escanear Carga - Calidad</title>
    <link href="../../../public/assets/css/output.css" rel="stylesheet">
    <script src="../../../public/assets/js/qr-scanner.umd.min.js"></script>
</head>

<body class="bg-gray-50 min-h-screen p-8 flex flex-col items-center">

    <h1 class="text-2xl font-bold mb-4">Escanear Carga - Área Calidad</h1>

    <div class="flex flex-col items-center gap-3 mb-6">
        <video id="video" style="width:480px;height:360px;" muted></video>
        <canvas id="snapshot" style="display:none;"></canvas>

        <div class="flex gap-2 mt-2">
            <button id="startBtn" class="bg-blue-600 text-white px-4 py-2 rounded">Abrir cámara</button>
            <button id="freezeBtn" class="text-black" disabled>Congelar imagen</button>
            <button id="scanBtn" class="bg-green-600 text-white px-4 py-2 rounded" disabled>Escanear QR</button>
            <button id="resumeBtn" class="bg-gray-500 text-white px-4 py-2 rounded" disabled>Reanudar cámara</button>
        </div>
        <div id="resultMessage" class="text-sm text-gray-600 mt-2"></div>
    </div>

    <form id="sacosForm" method="POST" action="../../controller/CalidadController.php"
        class="mt-6 w-full max-w-lg space-y-4 bg-white p-6 rounded shadow">
        <div id="sacosContainer"></div>
        <input type="hidden" name="id_carga" id="id_carga" value="">

        <div class="flex items-center gap-4 mt-4">
            <label class="flex items-center gap-2">
                <input type="radio" class="form-radio" name="resultado_qa" value="Aprobado" required>
                <span>Aprobado</span>
            </label>

            <label class="flex items-center gap-2">
                <input type="radio" class="form-radio" name="resultado_qa" value="Rechazado" required>
                <span>Rechazado</span>
            </label>

            <!-- Select de motivo rechazo -->
            <select name="motivo_rechazo" id="motivo_rechazo" class="border rounded p-2" disabled required>
                <option value="">Selecciona un motivo</option>
                <option value="Error de humedad">Error de humedad</option>
                <option value="Error de peso">Error de peso</option>
                <option value="Saco defectuoso">Saco defectuoso</option>
                <option value="Resultado muestreo">Resultado muestreo</option>
                <option value="Error de etiqueta">Error de etiqueta</option>
            </select>
        </div>

        <!-- NUEVO: Código de muestreo -->
        <div class="mt-4">
            <label for="codigo_muestreo" class="block font-semibold mb-1">Código de Muestreo:</label>
            <input type="number" name="codigo_muestreo" id="codigo_muestreo" class="border rounded p-2 w-full"
                placeholder="Ingrese código de muestreo" required>
        </div>


        <!-- NUEVO: Observaciones QA -->
        <div class="mt-4">
            <label for="observaciones_qa" class="block font-semibold mb-1">Observaciones QA:</label>
            <textarea name="observaciones_qa" id="observaciones_qa" maxlength="255"
                placeholder="Escribe observaciones generales sobre la carga..."
                class="border rounded p-2 w-full h-24 resize-none"></textarea>
        </div>

        <button type="submit" class="bg-green-600 text-white px-4 py-2 rounded w-full mt-4">Guardar Resultados</button>
    </form>

    <script>
    const idCargaUrl = new URLSearchParams(window.location.search).get('id_carga');
    if (idCargaUrl) {
        document.getElementById('id_carga').value = idCargaUrl;
    }
    </script>


    <script>
    const video = document.getElementById('video');
    const canvas = document.getElementById('snapshot');
    const ctx = canvas.getContext('2d');
    const startBtn = document.getElementById('startBtn');
    const freezeBtn = document.getElementById('freezeBtn');
    const scanBtn = document.getElementById('scanBtn');
    const resultMessage = document.getElementById('resultMessage');
    const sacosContainer = document.getElementById('sacosContainer');
    const idCargaInput = document.getElementById('id_carga');

    let stream = null;

    function createSacoInput(saco, index) {
        return `
    <div class="border p-4 rounded mb-4">
        <h2 class="font-semibold mb-2">Saco ${index + 1}</h2>
        <input type="hidden" name="sacos[${index}][id_saco]" value="${saco.id_saco}">
        <p><strong>Fecha Elaboración:</strong> <input type="date" name="sacos[${index}][fecha_elaboracion]" value="${saco.fecha_elaboracion || ''}" class="border p-1 rounded w-full"></p>
        <p><strong>Lote:</strong> <input type="text" name="sacos[${index}][lote]" value="${saco.lote || ''}" class="border p-1 rounded w-full"></p>
        <p><strong>Humedad:</strong> <input type="number" step="0.01" name="sacos[${index}][humedad]" value="${saco.humedad || ''}" class="border p-1 rounded w-full"></p>
        <p><strong>Temperatura:</strong> <input type="number" step="0.01" name="sacos[${index}][temperatura]" value="${saco.temperatura || ''}" class="border p-1 rounded w-full"></p>
        <p><strong>Kilos:</strong> <input type="number" step="0.01" name="sacos[${index}][kilos]" value="${saco.kilos || ''}" class="border p-1 rounded w-full"></p>
    </div>`;
    }

    startBtn.addEventListener('click', async () => {
        try {
            stream = await navigator.mediaDevices.getUserMedia({
                video: {
                    facingMode: 'environment'
                }
            });
            video.srcObject = stream;
            await video.play();
            freezeBtn.disabled = false;
            resultMessage.textContent = 'Cámara encendida. Alinea el QR y pulsa "Congelar imagen".';
        } catch (err) {
            resultMessage.textContent = 'Error al acceder a la cámara: ' + err.message;
        }
    });

    freezeBtn.addEventListener('click', () => {
        if (!stream) return;
        canvas.width = video.videoWidth;
        canvas.height = video.videoHeight;
        ctx.drawImage(video, 0, 0, canvas.width, canvas.height);

        // Mostrar el canvas con la imagen congelada
        canvas.style.display = 'block';
        video.style.display = 'none';

        // Detener cámara
        const [track] = stream.getVideoTracks();
        if (track) track.stop();
        stream = null;

        scanBtn.disabled = false;
        resumeBtn.disabled = false;
        freezeBtn.disabled = true;

        resultMessage.textContent = 'Imagen congelada. Pulsa "Escanear QR" o "Reanudar cámara".';
    });


    scanBtn.addEventListener('click', async () => {
        try {
            const result = await QrScanner.scanImage(canvas);
            if (!result) throw new Error('No se detectó ningún QR');

            const data = JSON.parse(result.trim());
            const idCarga = data.id_carga;

            resultMessage.textContent = 'QR leído. Consultando datos...';

            const res = await fetch(
                `../../controller/CargaController.php?action=getCarga&id_carga=${idCarga}`);
            const info = await res.json();

            if (info.error) throw new Error(info.error);

            idCargaInput.value = info.carga.id_carga;
            sacosContainer.innerHTML = '';
            info.sacos.forEach((s, i) => sacosContainer.innerHTML += createSacoInput(s, i));

            resultMessage.innerHTML = `<span class="text-green-700 font-semibold">
            Carga detectada (ID: ${info.carga.id_carga}) - Cliente: ${info.carga.nombre_cliente}
        </span>`;
        } catch (err) {
            resultMessage.textContent = 'Error: ' + err.message;
        }
    });

    resumeBtn.addEventListener('click', async () => {
        try {
            stream = await navigator.mediaDevices.getUserMedia({
                video: {
                    facingMode: 'environment'
                }
            });
            video.srcObject = stream;
            await video.play();

            // Mostrar nuevamente el video y ocultar el canvas
            video.style.display = 'block';
            canvas.style.display = 'none';

            freezeBtn.disabled = false;
            scanBtn.disabled = true;
            resumeBtn.disabled = true;

            resultMessage.textContent = 'Cámara reanudada. Puedes congelar otra imagen.';
        } catch (err) {
            resultMessage.textContent = 'Error al reanudar cámara: ' + err.message;
        }
    });
    </script>

    <!-- Manejo del select de motivo de rechazo -->
    <script>
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