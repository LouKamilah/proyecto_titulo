<?php
require_once __DIR__ . '/conexion.php';
require_once __DIR__ . '/../libs/phpqrcode/qrlib.php';

class Saco {
    private $db;

    public function __construct() {
        $con = new Conectar();
        $this->db = $con->conexion;
    }

    // Crear un nuevo saco
public function crearSaco($fecha_elaboracion, $lote, $humedad, $temperatura, $kilos, $id_carga, $id_operador) {
    $sql = "INSERT INTO saco (fecha_elaboracion, lote, humedad, temperatura, kilos, id_carga, id_operador_responsable)
            VALUES (?, ?, ?, ?, ?, ?, ?)";
    $stmt = $this->db->prepare($sql);
    $stmt->execute([$fecha_elaboracion, $lote, $humedad, $temperatura, $kilos, $id_carga, $id_operador]);
}

    // Obtener todos los sacos de una carga específica
 public function obtenerSacosPorCarga($id_carga) {
        $stmt = $this->db->prepare("SELECT * FROM saco WHERE id_carga = ?");
        $stmt->execute([$id_carga]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // Contador de sacos por carga específica
    public function contarPorCarga($id_carga) {
        $stmt = $this->db->prepare("SELECT COUNT(*) AS total FROM saco WHERE id_carga = ?");
        $stmt->execute([$id_carga]);
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        return $result ? (int)$result['total'] : 0;
    }


}