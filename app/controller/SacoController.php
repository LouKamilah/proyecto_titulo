<?php
require_once __DIR__ . '/../models/Saco.php';
require_once __DIR__ . '/../models/Carga.php';

class SacoController {
    private $model;
    private $cargaModel;

    public function __construct() {
        $this->model = new Saco();
        $this->cargaModel = new Carga();
    }

    public function listarSacosPorCarga($id_carga) {
        return $this->model->obtenerSacosPorCarga($id_carga);
    }

public function crearSaco($fecha_elaboracion, $lote, $humedad, $temperatura, $kilos, $id_carga, $id_operador) {
    $carga = $this->cargaModel->obtenerCargaPorId($id_carga);
    $sacosActuales = $this->model->contarPorCarga($id_carga);

    if ($sacosActuales >= $carga['sacos_asignados']) {
        return ['success' => false, 'message' => 'Ya se ingresaron todos los sacos asignados.'];
    }

    // Insertar el nuevo saco
    $this->model->crearSaco($fecha_elaboracion, $lote, $humedad, $temperatura, $kilos, $id_carga, $id_operador);

    // Contamos los sacos actualizados
    $sacosActualizados = $this->model->contarPorCarga($id_carga);
    $completado = $sacosActualizados >= $carga['sacos_asignados'];

    // Si ya se completaron todos los sacos, actualizar estado_actual a "Calidad"
    if ($completado) {
        $this->cargaModel->actualizarEstado($id_carga, 'Calidad');
    }

    return [
        'success' => true,
        'completado' => $completado,
        'sacosActuales' => $sacosActualizados,
        'sacosAsignados' => $carga['sacos_asignados']
    ];
}

}