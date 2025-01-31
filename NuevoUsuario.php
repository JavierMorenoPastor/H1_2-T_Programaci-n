<?php
require_once 'conexion.php';

$conexion = (new Conexion())->conexion;

$nombre = $_POST['nombre'];
$correo = $_POST['correo'];
$edad = $_POST['edad'];
$plan_base = $_POST['plan_base'];
$paquetes = isset($_POST['paquetes']) ? implode(", ", $_POST['paquetes']) : "";
$duracion = $_POST['duracion'];

if ($edad < 18 && $paquetes != "Infantil") {
    die("Error: Los menores de 18 años solo pueden contratar el Pack Infantil.");
}

if ($plan_base == "Básico" && isset($_POST['paquetes']) && count($_POST['paquetes']) > 1) {
    die("Error: Los usuarios del Plan Básico solo pueden elegir un paquete adicional.");
}

if ($duracion == "Mensual" && isset($_POST['paquetes']) && in_array("Deporte", $_POST['paquetes'])) {
    die("Error: El Pack Deporte solo puede ser contratado si la duración es de 1 año.");
}

$precios_planes = ["Básico" => 9.99, "Estándar" => 13.99, "Premium" => 17.99];
$precios_paquetes = ["Deporte" => 6.99, "Cine" => 7.99, "Infantil" => 4.99];

$costo_total = $precios_planes[$plan_base];
if (isset($_POST['paquetes'])) {
    foreach ($_POST['paquetes'] as $pack) {
        $costo_total += $precios_paquetes[$pack];
    }
}

$sql = "INSERT INTO usuarios (nombre, correo, edad, plan_base, paquetes, duracion, costo_total) 
        VALUES (?, ?, ?, ?, ?, ?, ?)";

$stmt = $conexion->prepare($sql);
$stmt->bind_param(
    "ssissds", 
    $nombre, 
    $correo, 
    $edad, 
    $plan_base, 
    $paquetes, 
    $duracion, 
    $costo_total
);

if ($stmt->execute()) {
    header("Location: formulario.php?mensaje=Usuario registrado correctamente");
    exit;
} else {
    echo "Error: " . $stmt->error;
}

$stmt->close();
$conexion->close();
