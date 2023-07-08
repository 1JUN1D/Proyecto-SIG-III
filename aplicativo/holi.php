<?php
session_start();
include("conexion.php");

if ($_POST) {

    $fecha= new DateTime();
    // Obtener los valores de los campos del formulario
    $categoria = $_POST['mostrarOpcion'];
    $direccion = $_POST['direccion'];
    $descripcion = $_POST['exampleFormControlTextarea1'];
    $imagen =$fecha->getTimestamp()."_".$_FILES['formFile']['name']; // Nombre del archivo de imagen
    $solicitud = $_POST['fecha_hora'];
    $precio = $_POST['cantidad'];
    $pago = $_POST['pago'];
    $latitud = $_POST['latitud'];
    $longitud = $_POST['longitud'];

    
    $imagen_temporal = $_FILES['formFile']['tmp_name'];
    move_uploaded_file($imagen_temporal, "img_pedido/".$imagen);

    $objConexion = new conexion();

    // Asegurarse de que el usuario haya iniciado sesión verificando si la variable de sesión existe
    if (isset($_SESSION['id_usuario'])) {
        $id_usuario = $_SESSION['id_usuario'];

        // Modificar la consulta SQL para incluir el id_usuario
        $sql = "INSERT INTO servicio (id_usuario, categoria, direccion, descripcion, foto, solicitud, precio, pago, ubicacion) VALUES ('$id_usuario', '$categoria', '$direccion', '$descripcion', '$imagen', '$solicitud', $precio, '$pago', ST_PointFromText('POINT($latitud $longitud)'))";

        // Ejecutar la consulta SQL
        $objConexion->ejecutar($sql);

        header("location:pedidos.php");
    } else {
        // Manejar el caso en que el usuario no ha iniciado sesión, por ejemplo, redirigirlo a la página de inicio de sesión
        header("location:login.php");
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles_2.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>

    <title>Document</title>
</head>
<body>

<form action="holi.php" method="POST" enctype="multipart/form-data" class="needs-validation" novalidate onsubmit="clearFields()">
    <div class="container bg-light p-4 rounded shadow-sm">
        <input type="text" readonly id="mostrarOpcion" name="mostrarOpcion" class="form-control mb-3">

        <div class="mb-3">
            <input class="form-control" type="text" placeholder="" readonly style="margin-bottom: 18px;" name="direccion">
            <a href="index.php" class="text-primary">Cambiar ubicacion</a>
        </div>

        <div id="latitudDiv" style="display: none;">
            <input type="text" id="latitud" readonly name="latitud">
        </div>

        <div id="longitudDiv" style="display: none;">
            <input type="text" id="longitud" readonly name="longitud">
        </div>

        <div class="mb-3">
            <label for="exampleFormControlTextarea1" class="form-label">DESCRIPCION DE TU PROBLEMA</label>
            <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="exampleFormControlTextarea1"></textarea>
        </div>

        <div class="mb-3">
            <label for="formFile" class="form-label">SUBE UNA TU IMAGEN DE TU PROBLEMA</label>
            <input class="form-control" type="file" id="formFile" name="formFile">
        </div>

        <div class="mb-3">
            <label for="fecha_hora">FECHA Y HORA</label>
            <input type="datetime-local" id="fecha_hora" name="fecha_hora" class="form-control">
        </div>

        <div class="mb-3">
            <label for="cantidad" class="form-label">CANTIDAD:</label>
            <input type="number" class="form-control" id="cantidad" min="5000" max="500000" step="50"  placeholder="Valor minimo: 5.000 COP" name="cantidad">
        </div>
        <label for="fecha_hora" class="d-block">METODO DE PAGO</label>
        <div class="mb-3 payment-methods">
            <button class="payment-method btn btn-outline-secondary m-1" id="efectivo">
                <img src="assets/efectivo.png" alt="Efectivo">
            </button>
            <button class="payment-method btn btn-outline-secondary m-1" id="tarjeta">
                <img src="assets/tarjeta.png" alt="Tarjeta">
            </button>
            <button class="payment-method btn btn-outline-secondary m-1" id="nequi">
                <img src="assets/nequi.png" alt="Nequi">
            </button>
            <button class="payment-method btn btn-outline-secondary m-1" id="daviplata">
                <img src="assets/daviplata.png" alt="Daviplata">
            </button>
            <input type="hidden" name="pago" id="pago">
        </div>

        <div class="d-grid gap-2">
            <button type="submit" class="btn btn-outline-primary btn-lg">SOLICITAR</button>
        </div>
    </div>
</form>


<script src="formulario.js"></script>

</body>
</html>