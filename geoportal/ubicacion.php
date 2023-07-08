<?php
include 'conexion.php';

$conexion = new conexion();
$db = $conexion->getConexion();

$query = "SELECT id,id_empleado, direccion, descripcion, foto, solicitud, precio, pago, ST_X(ubicacion) as longitud, ST_Y(ubicacion) as latitud FROM servicio";
$stmt = $db->prepare($query);
$stmt->execute();

$result = $stmt->fetchAll(PDO::FETCH_ASSOC);

echo json_encode($result);
?>