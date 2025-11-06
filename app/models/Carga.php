<?php
require_once __DIR__ . '/conexion.php';

class Carga {
    private $db;

    public function __construct() {
        $con = new Conectar();
        $this->db = $con->conexion;
    }

    // Obtener todas las cargas activas con el nombre del cliente
    public function obtenerCargas() {
        $sql = "SELECT 
                    c.id_carga,
                    c.sacos_asignados,
                    c.estado_actual,
                    c.id_cliente,
                    cli.nombre_cliente,
                    c.fecha_creacion,
                    c.hora_creacion
                FROM carga c
                INNER JOIN cliente cli ON c.id_cliente = cli.id_cliente
                WHERE c.visibilidad_sistema = 'Activo'";

        $stmt = $this->db->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // (Opcional) Obtener carga específica por ID
    public function obtenerCargaPorId($id_carga) {
        $sql = "SELECT 
                    c.*, 
                    cli.nombre_cliente
                FROM carga c
                INNER JOIN cliente cli ON c.id_cliente = cli.id_cliente
                WHERE c.id_carga = ?";
        $stmt = $this->db->prepare($sql);
        $stmt->execute([$id_carga]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

     // Crear una nueva carga
    public function crearCarga($sacos_asignados, $id_cliente, $id_jefeArea_responsable) {
        $sql = "INSERT INTO carga (
                    sacos_asignados,
                    estado_actual,
                    id_cliente,
                    id_jefeArea_responsable,
                    fecha_creacion,
                    hora_creacion,
                    visibilidad_sistema
                ) VALUES (
                    ?, 'Asignado', ?, ?, CURRENT_DATE(), CURRENT_TIME(), 'Activo'
                )";

        $stmt = $this->db->prepare($sql);
        return $stmt->execute([$sacos_asignados, $id_cliente, $id_jefeArea_responsable]);
    }

    public function actualizarEstado($id_carga, $nuevoEstado) {
    $stmt = $this->db->prepare("UPDATE carga SET estado_actual = ? WHERE id_carga = ?");
    return $stmt->execute([$nuevoEstado, $id_carga]);
}


}