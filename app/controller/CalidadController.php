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

    $id_carga = null;

    foreach ($_POST['sacos'] as $saco) {
        $id_saco = $saco['id_saco'];
        $id_carga = $saco['id_carga'] ?? $id_carga;

        // Aquí podrías actualizar otros datos técnicos si lo deseas:
        // humedad, temperatura, kilos, etc.
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

    // Determinar si la carga fue aprobada o rechazada
    $resultado = '';
    if (isset($_POST['resultado_qa']) && in_array($_POST['resultado_qa'], ['Aprobado', 'Rechazado'])) {
        $resultado = $_POST['resultado_qa'];
    }

    // Actualizar la carga con el resultado QA
    $stmt = $cargaModel->getDb()->prepare("
        UPDATE carga
        SET resultado_qa = ?, estado_actual = ?
        WHERE id_carga = ?
    ");

    // Si fue aprobada, pasa a “Despacho”, si no, se queda en “Rechazada”
    $estado = ($resultado === 'Aprobado') ? 'Despacho' : 'Rechazada';
    $stmt->execute([$resultado, $estado, $id_carga]);

    header("Location: ../../public/operador/calidad.php?id_carga=$id_carga&success=1");
    exit;
}