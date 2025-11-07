<?php
require_once __DIR__ . '/../models/Carga.php';
require_once __DIR__ . '/../models/Saco.php';
require_once __DIR__ . '/../models/conexion.php';

class CargaController {
    private $cargaModel;
    private $sacoModel;

    public function __construct() {
        $this->cargaModel = new Carga();
        $this->sacoModel = new Saco();
    }

    public function listarCargas() {
        return $this->cargaModel->obtenerCargas();
    }

    public function crearCarga($sacos_asignados, $id_cliente, $id_jefeArea_responsable) {
        return $this->cargaModel->crearCarga($sacos_asignados, $id_cliente, $id_jefeArea_responsable);
    }

    public function obtenerCargaPorId($id_carga) {
        $db = (new Conectar())->conexion;
        $stmt = $db->prepare("
            SELECT c.*, cl.nombre_cliente
            FROM carga c
            INNER JOIN clientes cl ON c.id_cliente = cl.id_cliente
            WHERE c.id_carga = ?
        ");
        $stmt->execute([$id_carga]);
        $carga = $stmt->fetch(PDO::FETCH_ASSOC);
        return $carga ?: [];
    }

    public function obtenerCargaCompleta($id_carga) {
        $carga = $this->cargaModel->obtenerCargaPorId($id_carga);
        if (!$carga) {
            throw new Exception("Carga no encontrada");
        }

        $sacos = $this->sacoModel->obtenerSacosPorCarga($id_carga);

        return [
            'carga' => $carga,
            'sacos' => $sacos
        ];
    }
}

// Endpoint de API (para el fetch desde JS)
if (isset($_GET['action']) && $_GET['action'] === 'getCarga') {
    header('Content-Type: application/json; charset=utf-8');
    $id_carga = intval($_GET['id_carga'] ?? 0);

    try {
        $controller = new CargaController();
        $data = $controller->obtenerCargaCompleta($id_carga);
        echo json_encode($data, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES);
    } catch (Exception $e) {
        echo json_encode(['error' => $e->getMessage()]);
    }
    exit;
}