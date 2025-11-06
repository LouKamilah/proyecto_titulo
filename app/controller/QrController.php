<?php
require_once __DIR__ . '/../models/Carga.php';
require_once __DIR__ . '/../models/Saco.php';
require_once __DIR__ . '/../libs/phpqrcode/qrlib.php';

class QrController {
    public function generarQR($id_carga) {
        $cargaModel = new Carga();
        $sacoModel = new Saco();

        // Obtenemos datos de la carga y los sacos asociados
        $carga = $cargaModel->obtenerCargaPorId($id_carga);
        $sacos = $sacoModel->obtenerSacosPorCarga($id_carga);

        if (!$carga) {
            throw new Exception("Carga no encontrada");
        }

        // Estructuramos los datos para el QR
        $data = [
            'carga' => $carga,
            'sacos' => $sacos,
            'timestamp' => date('Y-m-d H:i:s')
        ];

        // Convertimos a JSON
        $jsonData = json_encode($data, JSON_UNESCAPED_UNICODE);

        // Ruta donde se guardará el QR
        $dir = __DIR__ . '/../../public/assets/img/';
        if (!file_exists($dir)) {
            mkdir($dir, 0777, true);
        }

        $filename = $dir . "qr_carga_" . $id_carga . ".png";

        // Generamos el código QR
        QRcode::png($jsonData, $filename, QR_ECLEVEL_L, 4);

        return basename($filename);
    }
}

// --------------------------------------
// Evitar que el QR se genere automáticamente
// --------------------------------------
// Solo generamos el QR si viene explícitamente con "action=generate"

if (isset($_GET['action']) && $_GET['action'] === 'generate' && isset($_GET['id_carga'])) {
    try {
        $controller = new QrController();
        $filename = $controller->generarQR($_GET['id_carga']);
        header("Location: ../../public/assets/img/$filename");
        exit;
    } catch (Exception $e) {
        echo "Error generando QR: " . $e->getMessage();
    }
}