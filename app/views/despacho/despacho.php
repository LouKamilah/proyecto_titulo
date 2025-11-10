<?php

session_start();
if (!isset($_SESSION['user']) || $_SESSION['user']['tipo_usu'] !== 'Despacho') {
    header('Location: ../home.php?error=acceso');
    exit;
}

require_once __DIR__ . '/../../models/conexion.php';
require_once __DIR__ . '/../../controller/CargaController.php';

$user = $_SESSION['user'];
$cargaController = new CargaController();
$cargas = $cargaController->listarCargas();
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <link href="../../../public/assets/css/output.css" rel="stylesheet">
    <title>Panel Despacho - Fenix</title>
</head>

<?php require_once '../layout/side_bar.php'; //se importa la barra ?>
<?php require_once '../layout/header.php'; ?>

<body class="bg-gray-50">

    <!-- Contenedor alineado con header/sidebar -->
    <div class="w-full lg:ps-76 pt-10 p-12">
        <div class="overflow-x-auto">
            <!-- Table Section -->
            <div class=" px-4 py-4 sm:px-6 lg:px-8 mx-auto">
                <!-- Card -->
                <div class="flex flex-col">
                    <div class="-m-1.5 overflow-x-auto">
                        <div class="p-1.5 min-w-full inline-block align-middle">
                            <div class="bg-white border border-gray-200 rounded-xl shadow-2xs overflow-hidden ">
                                <!-- Header -->
                                <div
                                    class="px-6 py-4 grid gap-3 md:flex md:justify-between md:items-center border-b border-gray-20r">
                                    <div>
                                        <h2 class="text-xl font-semibold text-gray-800 ">
                                            Cargas
                                        </h2>
                                        <p class="text-sm text-gray-600 mt-1">
                                            Listado de cargas disponibles para despacho.
                                        </p>
                                    </div>

                                    <!-- <div>
                                        <div class="inline-flex gap-x-2">
                                            <a class="py-2 px-3 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg border border-gray-200 bg-white text-gray-800 shadow-2xs hover:bg-gray-50 focus:outline-hidden focus:bg-gray-50 disabled:opacity-50 disabled:pointer-events-none    "
                                                href="#">
                                                View all
                                            </a>

                                            <a class="py-2 px-3 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg border border-transparent bg-blue-600 text-white hover:bg-blue-700 focus:outline-hidden focus:bg-blue-700 disabled:opacity-50 disabled:pointer-events-none"
                                                href="#">
                                                <svg class="shrink-0 size-4" xmlns="http://www.w3.org/2000/svg"
                                                    width="24" height="24" viewBox="0 0 24 24" fill="none"
                                                    stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                                    stroke-linejoin="round">
                                                    <path d="M5 12h14" />
                                                    <path d="M12 5v14" />
                                                </svg>
                                                Create
                                            </a>
                                        </div>
                                    </div> -->
                                </div>
                                <!-- End Header -->

                                <!-- Table -->
                                <table class="min-w-full divide-y divide-gray-200 ">
                                    <thead class="bg-gray-50">
                                        <tr>
                                            <th scope="col" class="ps-6 py-3 text-start">

                                            </th>

                                            <th scope="col" class="px-6 py-3 text-start">
                                                <div class="flex items-center gap-x-2">
                                                    <span class="text-xs font-semibold uppercase text-gray-800 ">
                                                        ID Carga
                                                    </span>
                                                </div>
                                            </th>

                                            <th scope="col" class="px-6 py-3 text-start">
                                                <div class="flex items-center gap-x-2">
                                                    <span class="text-xs font-semibold uppercase text-gray-800 ">
                                                        Cliente
                                                    </span>
                                                </div>
                                            </th>

                                            <th scope="col" class="px-6 py-3 text-start">
                                                <div class="flex items-center gap-x-2">
                                                    <span class="text-xs font-semibold uppercase text-gray-800 ">
                                                        Sacos Asignados
                                                    </span>
                                                </div>
                                            </th>

                                            <th scope="col" class="px-6 py-3 text-start">
                                                <div class="flex items-center gap-x-2">
                                                    <span class="text-xs font-semibold uppercase text-gray-800 ">
                                                        Estado
                                                    </span>
                                                </div>
                                            </th>

                                            <th scope="col" class="px-6 py-3 text-start">
                                                <div class="flex items-center gap-x-2">
                                                    <span class="text-xs font-semibold uppercase text-gray-800 ">
                                                        Elaboración
                                                    </span>
                                                </div>
                                            </th>

                                            <th scope="col" class="px-6 py-3 text-end"></th>
                                        </tr>
                                    </thead>

                                    <tbody class="divide-y divide-gray-200 ">
                                        <?php foreach ($cargas as $c): ?>
                                        <?php if ($c['estado_actual'] === 'Despacho'): ?>
                                        <tr>
                                            <td class="size-px whitespace-nowrap">
                                            </td>

                                            <td class="size-px whitespace-nowrap">
                                                <div class="px-6 py-3">
                                                    <span class="text-sm text-gray-600 "><?= $c['id_carga']; ?></span>
                                                </div>
                                            </td>
                                            <td class="size-px whitespace-nowrap">
                                                <div class="px-6 py-3">
                                                    <div class="flex items-center gap-x-2">
                                                        <div class="grow">
                                                            <span
                                                                class="text-sm text-gray-600 "><?= htmlspecialchars($c['nombre_cliente']); ?></span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="size-px whitespace-nowrap">
                                                <div class="px-6 py-3">
                                                    <button type="button"
                                                        class="py-2 px-12 inline-flex items-center gap-x-2 text-xs rounded-lg border border-gray-200 bg-white text-gray-800 shadow-2xs hover:bg-gray-50 focus:outline-hidden focus:bg-gray-50 disabled:opacity-50 disabled:pointer-events-none    ">
                                                        <?= $c['sacos_asignados']; ?>
                                                    </button>
                                                </div>
                                            </td>
                                            <td class="size-px whitespace-nowrap">
                                                <div class="px-6 py-3">
                                                    <span
                                                        class="py-1 px-1.5 inline-flex items-center gap-x-1 text-xs font-medium bg-teal-100 text-teal-800 rounded-full ">
                                                        <svg class="size-2.5" xmlns="http://www.w3.org/2000/svg"
                                                            width="16" height="16" fill="currentColor"
                                                            viewBox="0 0 16 16">
                                                            <path
                                                                d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z" />
                                                        </svg>
                                                        <?= $c['estado_actual']; ?>
                                                    </span>
                                                </div>
                                            </td>
                                            <td class="size-px whitespace-nowrap">
                                                <div class="px-6 py-3">
                                                    <span
                                                        class="text-sm text-gray-600 "><?= $c['fecha_creacion']; ?></span>
                                                </div>
                                            </td>
                                            <td class="size-px whitespace-nowrap">
                                                <div class="px-6 py-2">
                                                    <a href="../../views/despacho/despacho_sacos.php?id_carga=<?= $c['id_carga']; ?>"
                                                        class="font-semibold text-sm bg-blue-600 text-white px-5 py-1.5 rounded hover:bg-blue-700">
                                                        Detalles
                                                    </a>
                                                </div>
                                            </td>
                                        </tr>


                                        <?php endif; ?>
                                        <?php endforeach; ?>
                                    </tbody>
                                </table>
                                <!-- End Table -->

                                <!-- Footer -->
                                <div
                                    class="px-6 py-4 grid gap-3 md:flex md:justify-between md:items-center border-t border-gray-20r">
                                    <div>
                                    </div>

                                    <div>
                                        <div class="inline-flex gap-x-2">
                                            <button type="button"
                                                class="py-2 px-3 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg border border-gray-200 bg-white text-gray-800 shadow-2xs hover:bg-gray-50 focus:outline-hidden focus:bg-gray-50 disabled:opacity-50 disabled:pointer-events-none    ">
                                                <svg class="shrink-0 size-4" xmlns="http://www.w3.org/2000/svg"
                                                    width="24" height="24" viewBox="0 0 24 24" fill="none"
                                                    stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                                    stroke-linejoin="round">
                                                    <path d="m15 18-6-6 6-6" />
                                                </svg>
                                                Prev
                                            </button>

                                            <button type="button"
                                                class="py-2 px-3 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg border border-gray-200 bg-white text-gray-800 shadow-2xs hover:bg-gray-50 focus:outline-hidden focus:bg-gray-50 disabled:opacity-50 disabled:pointer-events-none    ">
                                                Next
                                                <svg class="shrink-0 size-4" xmlns="http://www.w3.org/2000/svg"
                                                    width="24" height="24" viewBox="0 0 24 24" fill="none"
                                                    stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                                    stroke-linejoin="round">
                                                    <path d="m9 18 6-6-6-6" />
                                                </svg>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                                <!-- End Footer -->
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End Card -->
            </div>
            <!-- End Table Section -->

</body>

</html>