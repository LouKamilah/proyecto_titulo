<?php
require_once __DIR__ . '/../models/Carga.php';

class CargaController {
    private $model;

    public function __construct() {
        $this->model = new Carga();
    }

    public function listarCargas() {
        return $this->model->obtenerCargas();
    }

     public function crearCarga($sacos_asignados, $id_cliente, $id_jefeArea_responsable) {
        return $this->model->crearCarga($sacos_asignados, $id_cliente, $id_jefeArea_responsable);
    }

    public function obtenerCargaPorId($id_carga) {
        $stmt = $this->db->prepare("
            SELECT c.*, cl.nombre_cliente
            FROM carga c
            INNER JOIN clientes cl ON c.id_cliente = cl.id_cliente
            WHERE c.id_carga = ?
        ");
        $stmt->execute([$id_carga]);
        $carga = $stmt->fetch(PDO::FETCH_ASSOC);
        // Si no encuentra nada, devuelve un array vacío en vez de false
        return $carga ?: [];
    }
}