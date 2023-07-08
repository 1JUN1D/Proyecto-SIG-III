<?php session_start(); ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <style>
        @media (max-width: 576px) {
            body {
                font-size: 0.8rem;
            }
        }
    </style>
    <title>Mis Pedidos</title>
</head>
<body>
<div class="container mt-5">
        <h1 class="text-center mb-4">Mis Pedidos</h1>
        
        <div>
            <table class="table table-striped table-hover">
                <thead class="table-light">
                    <tr>
                        <th scope="col" class="col-3">Categoría</th>
                        <th scope="col" class="col-3">Dirección</th>
                        <th scope="col" class="col-3">Solicitud</th>
                        <th scope="col" class="col-1">Precio</th>
                        <th scope="col" class="col-2">Pago</th>
                        <th scope="col" class="col-2">Estado</th> <!-- Columna de Estado agregada -->
                    </tr>
                </thead>
                <tbody>
                    <?php
                    include 'conexion.php';
                    $con = new conexion();
                    $conexion = $con->getConexion();
                    
                    // Obtén el ID del usuario de la sesión
                    $id_usuario = $_SESSION['id_usuario'];
                    
                    $sql = "SELECT id_empleado, categoria, direccion, solicitud, precio, pago, id_empleado FROM servicio WHERE id_usuario = :id_usuario";
                    $stmt = $conexion->prepare($sql);
                    $stmt->bindParam(':id_usuario', $id_usuario);
                    $stmt->execute();
                    $resultados = $stmt->fetchAll(PDO::FETCH_ASSOC);
                    foreach ($resultados as $pedido): ?>
                        <tr>
                            <td><?= $pedido['categoria'] ?></td>
                            <td><?= $pedido['direccion'] ?></td>
                            <td><?= $pedido['solicitud'] ?></td>
                            <td><?= $pedido['precio'] ?></td>
                            <td><?= $pedido['pago'] ?></td>
                            <td>
                                <?php
                                if ($pedido['id_empleado'] === null) {
                                    echo '<button type="button" class="btn btn-info">En Espera</button>
                                    ';
                                } else {
                                    // Botón verde sin funcionalidad para "Aceptado"
                                    echo '<button type="button" class="btn btn-success mb-2">Aceptado</button><br>';
                                    $id_empleado = $pedido['id_empleado'];
                                    $sql_empleado = "SELECT nombre, telefono FROM prestador WHERE id_empleado = :id_empleado";
                                    $stmt_empleado = $conexion->prepare($sql_empleado);
                                    $stmt_empleado->bindParam(':id_empleado', $id_empleado);
                                    $stmt_empleado->execute();
                                    $empleado = $stmt_empleado->fetch(PDO::FETCH_ASSOC);
                                    // Utilidades de texto para resaltar "Nombre" y "Teléfono"
                                    echo '<strong>Nombre:</strong> ' . $empleado['nombre'] . '<br>';
                                    echo '<strong>Teléfono:</strong> ' . $empleado['telefono'];
                                }
                                ?>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>
