<?php
    include 'conexion.php';

    $data = json_decode(file_get_contents("php://input"), true);

    // Comprueba si los datos están presentes
    if (!is_array($data) || !isset($data['idMarker']) || !isset($data['idEmpleado'])) {
        echo json_encode(["status" => "error", "message" => "Datos no proporcionados"]);
        exit;
    }

    $idMarker = $data['idMarker'];
    $idEmpleado = $data['idEmpleado'];

    // Crea una instancia de la clase de conexión
    $conexion = new conexion();

    // Prepara y ejecuta la consulta SQL para actualizar la base de datos
    try {
        $sql = "UPDATE servicio SET id_empleado = :idEmpleado WHERE id = :idMarker"; // Reemplaza 'prueba1' con el nombre de tu tabla
        $stmt = $conexion->getConexion()->prepare($sql);
        $stmt->bindParam(':idEmpleado', $idEmpleado, PDO::PARAM_INT);
        $stmt->bindParam(':idMarker', $idMarker, PDO::PARAM_INT);
        $stmt->execute();

        // Envía una respuesta de éxito
        echo json_encode(["status" => "success"]);
    } catch (PDOException $e) {
        // Envía una respuesta de error si algo sale mal
        echo json_encode(["status" => "error", "message" => $e->getMessage()]);
    }
?>
