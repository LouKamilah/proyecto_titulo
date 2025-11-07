<?php
require_once __DIR__ . '/../models/Carga.php';
require_once __DIR__ . '/../models/Saco.php';
require_once __DIR__ . '/../libs/phpqrcode/qrlib.php';

class QrController {
    public function generarQR($id_carga) {
        // Solo codificamos el ID de la carga (mucho más liviano)
        $data = [
            'id_carga' => intval($id_carga),
            'timestamp' => date('Y-m-d H:i:s')
        ];

        $jsonData = json_encode($data, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES);
        if (json_last_error() !== JSON_ERROR_NONE) {
            throw new Exception('Error al codificar JSON: ' . json_last_error_msg());
        }

        $dir = __DIR__ . '/../../public/assets/img/';
        if (!file_exists($dir)) {
            mkdir($dir, 0777, true);
        }

        $filename = $dir . "qr_carga_" . $id_carga . ".png";

        // Generamos el QR (escala 8 para que sea más grande y legible)
        QRcode::png($jsonData, $filename, QR_ECLEVEL_L, 8);

        return basename($filename);
    }
}

// Endpoint directo para generar QR
if (isset($_GET['action']) && $_GET['action'] === 'generate' && isset($_GET['id_carga'])) {
    header('Content-Type: application/json; charset=utf-8');
    try {
        $controller = new QrController();
        $filename = $controller->generarQR($_GET['id_carga']);
        echo json_encode(["qr" => "../../public/assets/img/$filename"]);
    } catch (Exception $e) {
        echo json_encode(["error" => $e->getMessage()]);
    }
    exit;
}