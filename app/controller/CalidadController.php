<?php
session_start();

if (!isset($_SESSION['user']) || $_SESSION['user']['tipo_usu'] !== 'Calidad') {
    header('Location: ../home.php?error=acceso');
    exit;
}

require_once __DIR__ . '/../models/Conexion.php';
require_once __DIR__ . '/../models/Saco.php';
require_once __DIR__ . '/../models/Carga.php';


if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['sacos'])) {
    $sacoModel = new Saco();
    $cargaModel = new Carga();

    $id_carga = $_POST['id_carga'] ?? null;
    $id_calidad = $_SESSION['user']['id_login']; // ← igual que en operador_sacos

    // Actualizamos cada saco
    foreach ($_POST['sacos'] as $saco) {
        $id_saco = $saco['id_saco'];

        $stmt = $sacoModel->getDb()->prepare("
            UPDATE saco 
            SET humedad = ?, temperatura = ?, kilos = ?
            WHERE id_saco = ?
        ");
        $stmt->execute([
            $saco['humedad'] ?? null,
            $saco['temperatura'] ?? null,
            $saco['kilos'] ?? null,
            $id_saco
        ]);
    }


    // Determinamos resultado QA
    $resultado = '';
    if (isset($_POST['resultado_qa']) && in_array($_POST['resultado_qa'], ['Aprobado', 'Rechazado'])) {
        $resultado = $_POST['resultado_qa'];
    }

    // Campos adicionales
    $motivo_rechazo = $_POST['motivo_rechazo'] ?? null;
    $observaciones_qa = $_POST['observaciones_qa'] ?? null;
    $codigo_muestreo = $_POST['codigo_muestreo'] ?? null;

    $fecha_finalizacion = date('Y-m-d');
    $hora_finalizacion = date('H:i:s');

    // Si fue aprobada, va a Despacho; si fue rechazada, pasa a Rechazada
    $estado = ($resultado === 'Aprobado') ? 'Despacho' : 'Rechazada';

    // Actualizamos la carga completa
    $stmt = $cargaModel->getDb()->prepare("
        UPDATE carga
        SET resultado_qa = ?, 
            estado_actual = ?, 
            motivo_rechazo = ?, 
            observaciones_qa = ?, 
            codigo_muestreo = ?, 
            id_calidad_responsable = ?, 
            fecha_finalizacion_calidad = ?, 
            hora_finalizacion_calidad = ?
        WHERE id_carga = ?
    ");

    $stmt->execute([
        $resultado,
        $estado,
        $motivo_rechazo,
        $observaciones_qa,
        $codigo_muestreo,
        $id_calidad,
        $fecha_finalizacion,
        $hora_finalizacion,
        $id_carga
    ]);

    

    header("Location: ../../app/views/calidad/calidad.php?id_carga=$id_carga&success=1");
    exit;
}