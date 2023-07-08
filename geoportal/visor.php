<?php
session_start();

// Verificar si la sesión no está iniciada
if (!isset($_SESSION['id_empleado'])) {
    header("Location: login.php");
    exit; // Asegurarse de que el script se detenga después de redirigir al usuario
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Tu Sitio Web</title>
    <!-- Asegúrate de tener Bootstrap incluido en tu proyecto -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://unpkg.com/leaflet/dist/leaflet.css" />
    <link rel="stylesheet" href="font/css/font-awesome.min.css">
    <link rel="stylesheet" href="css1/leaflet.extra-markers.min.css">
    <link rel="stylesheet" href="css1/Control.MiniMap.min.css" />
    <link rel="stylesheet" href="css1/L.Control.Locate.min.css" />
    <link rel="stylesheet" href="css1/leaflet-notifications.css" />
    <link rel="stylesheet" href="css1/L.Control.MousePosition.css" />
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css"/>
    <script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"></script>
    <style>

    body{
        display: flex;
        flex-direction: column;
        width: 100vw;
        height: 100vh;
        background: #ff00cc;  
        background-color: #D71BE6;
        background-color: #ffffff;
        background-color: #36D1DC;
        background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 2000 1500'%3E%3Cdefs%3E%3CradialGradient id='a' gradientUnits='objectBoundingBox'%3E%3Cstop offset='0' stop-color='%235B86E5'/%3E%3Cstop offset='1' stop-color='%2336D1DC'/%3E%3C/radialGradient%3E%3ClinearGradient id='b' gradientUnits='userSpaceOnUse' x1='0' y1='750' x2='1550' y2='750'%3E%3Cstop offset='0' stop-color='%2349ace1'/%3E%3Cstop offset='1' stop-color='%2336D1DC'/%3E%3C/linearGradient%3E%3Cpath id='s' fill='url(%23b)' d='M1549.2 51.6c-5.4 99.1-20.2 197.6-44.2 293.6c-24.1 96-57.4 189.4-99.3 278.6c-41.9 89.2-92.4 174.1-150.3 253.3c-58 79.2-123.4 152.6-195.1 219c-71.7 66.4-149.6 125.8-232.2 177.2c-82.7 51.4-170.1 94.7-260.7 129.1c-90.6 34.4-184.4 60-279.5 76.3C192.6 1495 96.1 1502 0 1500c96.1-2.1 191.8-13.3 285.4-33.6c93.6-20.2 185-49.5 272.5-87.2c87.6-37.7 171.3-83.8 249.6-137.3c78.4-53.5 151.5-114.5 217.9-181.7c66.5-67.2 126.4-140.7 178.6-218.9c52.3-78.3 96.9-161.4 133-247.9c36.1-86.5 63.8-176.2 82.6-267.6c18.8-91.4 28.6-184.4 29.6-277.4c0.3-27.6 23.2-48.7 50.8-48.4s49.5 21.8 49.2 49.5c0 0.7 0 1.3-0.1 2L1549.2 51.6z'/%3E%3Cg id='g'%3E%3Cuse href='%23s' transform='scale(0.12) rotate(60)'/%3E%3Cuse href='%23s' transform='scale(0.2) rotate(10)'/%3E%3Cuse href='%23s' transform='scale(0.25) rotate(40)'/%3E%3Cuse href='%23s' transform='scale(0.3) rotate(-20)'/%3E%3Cuse href='%23s' transform='scale(0.4) rotate(-30)'/%3E%3Cuse href='%23s' transform='scale(0.5) rotate(20)'/%3E%3Cuse href='%23s' transform='scale(0.6) rotate(60)'/%3E%3Cuse href='%23s' transform='scale(0.7) rotate(10)'/%3E%3Cuse href='%23s' transform='scale(0.835) rotate(-40)'/%3E%3Cuse href='%23s' transform='scale(0.9) rotate(40)'/%3E%3Cuse href='%23s' transform='scale(1.05) rotate(25)'/%3E%3Cuse href='%23s' transform='scale(1.2) rotate(8)'/%3E%3Cuse href='%23s' transform='scale(1.333) rotate(-60)'/%3E%3Cuse href='%23s' transform='scale(1.45) rotate(-30)'/%3E%3Cuse href='%23s' transform='scale(1.6) rotate(10)'/%3E%3C/g%3E%3C/defs%3E%3Cg transform='rotate(0 0 0)'%3E%3Cg transform='rotate(0 0 0)'%3E%3Ccircle fill='url(%23a)' r='3000'/%3E%3Cg opacity='0.5'%3E%3Ccircle fill='url(%23a)' r='2000'/%3E%3Ccircle fill='url(%23a)' r='1800'/%3E%3Ccircle fill='url(%23a)' r='1700'/%3E%3Ccircle fill='url(%23a)' r='1651'/%3E%3Ccircle fill='url(%23a)' r='1450'/%3E%3Ccircle fill='url(%23a)' r='1250'/%3E%3Ccircle fill='url(%23a)' r='1175'/%3E%3Ccircle fill='url(%23a)' r='900'/%3E%3Ccircle fill='url(%23a)' r='750'/%3E%3Ccircle fill='url(%23a)' r='500'/%3E%3Ccircle fill='url(%23a)' r='380'/%3E%3Ccircle fill='url(%23a)' r='250'/%3E%3C/g%3E%3Cg transform='rotate(0 0 0)'%3E%3Cuse href='%23g' transform='rotate(10)'/%3E%3Cuse href='%23g' transform='rotate(120)'/%3E%3Cuse href='%23g' transform='rotate(240)'/%3E%3C/g%3E%3Ccircle fill-opacity='0.1' fill='url(%23a)' r='3000'/%3E%3C/g%3E%3C/g%3E%3C/svg%3E");
        background-attachment: fixed;
        background-size: cover;
    }

    main{
        flex-grow: 1;
    }

    nav {
        background-color: #003268;
        width: 100vw;
        display: flex;
        justify-content: center;
        align-items: center;
    }

    nav ul {
        display: flex;
        justify-content: flex-end;
        margin: 0;
        padding: 0;
    }

    nav ul li {
        list-style: none;
        margin: 0;
        padding: 15px;
        margin-left: 30px;
    }

    nav ul li:first-child {
        margin-left: 0;
    }

    nav ul li a {
        text-decoration: none;
        color: #fff;
        font-weight: bold;
        text-align: center;
    }

    nav ul li a::before {
        display: block;
        content: '';
        width: 0%;
        background: #ffffff;
        height: 3px;
        top: -10px;
        transition: width 0.3s;
    }

    nav ul li a:hover::before {
        width: 100%;
    }



    header .textos-header{
        display: flex;
        width: 100%;
        align-items: center;
        justify-content: center;
        flex-direction: column;
        text-align: center;
    }

    .textos-header h1{
        font-size: 200px;
        color: #ffffff;
        text-shadow: 0 0 55px rgba(0, 29, 126, 0.8);
        border-bottom: 5px solid #ffffff;
        font-family: 'Netflix Sans', Arial, sans-serif;
    }

    .textos-header h2{
        font-size: 30px;
        font-weight: 300;
        color: azure;
    }
    .navbar {
            background-color: #1B4DB9; /* Un tono de azul de Bootstrap */
    }
    .navbar-brand, .navbar-nav .nav-link {
            color: #fff; /* Letras en blanco para contrastar con el fondo azul */
    }

    #map {
    border: 1px solid #00BDFF;
    box-shadow: 0 0 10px #00BDFF, 0 0 20px #00BDFF, 0 0 30px #00BDFF, 0 0 40px #00BDFF;
    }
    .leaflet-control-layers-selector + span {
            font-size: 1.2em; /* Cambia el tamaño de fuente */
            font-weight: bold; /* Hace el texto en negrita */
            color: #333; /* Cambia el color del texto */
    }
    </style>
</head>
<body>
    <header>
        <nav>
            <ul>
                <li><a class="tab active" data-target="tab1" href="index.php#tab1">Inicio</a></li>
                <li><a class="tab" data-target="tab2" href="index.php#tab2">Acerca de</a></li>
                <li><a class="tab" data-target="tab3" href="visor.php">Geovisor</a></li>
                <li><a class="tab" data-target="tab4" href="index.php#tab4">Geoservicio</a></li>
                <li><a class="tab" data-target="tab5" href="index.php#tab5">Contacto</a></li>
                <li><a class="tab" data-target="tab5" href="cerrar.php">Cerrar Sesion</a></li>
            </ul>
        </nav>
    </header>
    <main>
        <div class="container-fluid h-100" style=" box-sizing: border-box;">
            <div class="row h-100" style="margin: 0;">
                <!-- Columna izquierda -->
                <div class="col-lg-3 col-md-6 h-100" style="padding: 20px;">
                    <div class="card h-80" style="height: 80vh; overflow: auto;">
                        <div class="card-header"><h6>Solicitudes aceptadas</h6></div>
                        <div class="card-body">
                            <!-- Contenido de la tarjeta aquí -->
                            <?php
                            // Conexión a la base de datos
                            include 'conexion.php';
                            $conexion = new conexion();

                            // ID del empleado
                            $idEmpleado = $_SESSION['id_empleado'];

                            // Realizar la consulta
                            $sql = "SELECT * FROM servicio WHERE id_empleado = :idEmpleado";
                            $stmt = $conexion->getConexion()->prepare($sql);
                            $stmt->bindParam(':idEmpleado', $idEmpleado, PDO::PARAM_INT);
                            $stmt->execute();

                            // Mostrar los resultados
                            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                                // Obteniendo el ID del usuario que solicitó la orden
                                $id_usuario = $row['id_usuario'];
                            
                                // Realizar una consulta para obtener el nombre y teléfono del usuario
                                $sqlUsuario = "SELECT nombre, telefono FROM usuario WHERE id_usuario = :id_usuario";
                                $stmtUsuario = $conexion->getConexion()->prepare($sqlUsuario);
                                $stmtUsuario->bindParam(':id_usuario', $id_usuario, PDO::PARAM_INT);
                                $stmtUsuario->execute();
                                $usuario = $stmtUsuario->fetch(PDO::FETCH_ASSOC);
                            
                                // Mostrando la información del usuario que solicitó la orden
                                echo '<p><strong>Persona que solicita:</strong> ' . $usuario['nombre'] . '</p>';
                                echo '<p><strong>Teléfono:</strong> ' . $usuario['telefono'] . '</p>';
                            
                                // Mostrando la información de la orden
                                echo '<p><strong>Dirección:</strong> ' . $row['direccion'] . '</p>';
                                echo '<p><strong>Descripción:</strong> ' . $row['descripcion'] . '</p>';
                                echo '<p><strong>Foto:</strong><br><img src="../prosig/img_pedido/' . $row['foto'] . '" alt="Foto" style="max-width:100px;"></p>';
                                echo '<p><strong>Solicitud:</strong> ' . $row['solicitud'] . '</p>';
                                echo '<p><strong>Precio:</strong> ' . $row['precio'] . '</p>';
                                echo '<p><strong>Pago:</strong> ' . $row['pago'] . '</p>';
                                echo '<hr>';  // Línea horizontal para separar las órdenes
                            }
                            
                            ?>
                            
                        </div>
                    </div>
                </div>
                
                <!-- Columna derecha -->
                <div class="col-lg-9 col-md-6 h-100" style="padding: 0;">
                    <div id="map" style="height:90vh; width: 70vw; margin: 15px;"></div>
                </div>
            </div>
        </div>

        <script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>
        <script src="js/leaflet.extra-markers.min.js"></script>
        <script src="js/Control.MiniMap.min.js"></script>
        <script src="js/L.Control.Locate.min.js"></script>
        <script src="js/Leaflet.OverIntent.js"></script>
        <script type="text/javascript"
            src="https://cdn.jsdelivr.net/gh/hosuaby/Leaflet.SmoothMarkerBouncing@v3.0.2/dist/bundle.js"
            crossorigin="anonymous"></script>
        <script src="js/leaflet-notifications.js"></script>
        <script src="js/L.Control.MousePosition.js"></script>
        <script>
            var map = L.map('map', {
                center: [3.3819645698125904, -76.5319123864174],
                zoom: 16,
                minZoom: 15, // Establecer el zoom mínimo permitido
                maxZoom: 19,
                maxBounds: [
                    // Esquinas del área que deseas limitar, en este caso, aproximadamente el barrio El Ingenio.
                    // Debes ajustar estos valores para que se ajusten exactamente al área que deseas.
                    [3.3788, -76.5390], // Esquina suroeste (latitud, longitud)
                    [3.38799, -76.52334]  // Esquina noreste (latitud, longitud)
                ],
                maxZoom: 17
            });

            L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                maxZoom: 19,
            }).addTo(map);

            // Agregar capa WMS de Barrios
            var barrios = L.tileLayer.wms('http://3.209.175.188/geoserver/mus/wms', {
                layers: 'mus:Barrio',
                format: 'image/png',
                transparent: true,
                version: '1.1.0'
            }).addTo(map); // Agrega esta capa al mapa por defecto

            // Agregar capa WMS de Manzanas
            var manzanas = L.tileLayer.wms('http://3.209.175.188/geoserver/mus/wms', {
                layers: 'mus:manzanas',
                format: 'image/png',
                transparent: true,
                version: '1.1.0'
            }).addTo(map); // Agrega esta capa al mapa por defecto

            // Agregar control de capas
            var overlayMaps = {
                "Barrio": barrios,
                "Manzanas": manzanas
            };

            L.control.layers(null, overlayMaps, {collapsed: false}).addTo(map);

            var osm2 = new L.TileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {minZoom: 0, maxZoom: 13});
            var miniMap = new L.Control.MiniMap(osm2, { width: 150, height: 150 }).addTo(map);

            fetch('ubicacion.php')
                .then(response => {
                    if (!response.ok) {
                        throw new Error('Network response was not ok');
                    }
                    return response.json();
                })
                .then(data => {
                    data.forEach(coordenada => {
                        console.log("Objeto coordenada:", coordenada); // Agregar esta línea
                        var latitud = parseFloat(coordenada.longitud);
                        var longitud = parseFloat(coordenada.latitud);
                        var idMarker = coordenada.id;
                        var idEmpleado = coordenada.id_empleado;

                        console.log("idMarker antes de agregar al botón:", idMarker); // Agregar esta línea

                        var popupContent;
                        if(idEmpleado){
                            popupContent = '<h3>Información del Marcador</h3>' +
                            '<p><strong>Dirección:</strong> ' + coordenada.direccion + '</p>' +
                            '<p><strong>Descripción:</strong> ' + coordenada.descripcion + '</p>' +
                            '<p><strong>Foto:</strong> <img src="../prosig/img_pedido/' + coordenada.foto + '" alt="Foto" style="max-width:100px;"></p>' +
                            '<p><strong>Solicitud:</strong> ' + coordenada.solicitud + '</p>' +
                            '<p><strong>Precio:</strong> ' + coordenada.precio + '</p>' +
                            '<p><strong>Pago:</strong> ' + coordenada.pago + '</p>' +
                            '<input type="text" value="En progreso" readonly>';
                        } else{
                            popupContent = '<h3>Información del Marcador</h3>' +
                                '<p><strong>Dirección:</strong> ' + coordenada.direccion + '</p>' +
                                '<p><strong>Descripción:</strong> ' + coordenada.descripcion + '</p>' +
                                '<p><strong>Foto:</strong> <img src="../prosig/img_pedido/' + coordenada.foto + '" alt="Foto" style="max-width:100px;"></p>' +
                                '<p><strong>Solicitud:</strong> ' + coordenada.solicitud + '</p>' +
                                '<p><strong>Precio:</strong> ' + coordenada.precio + '</p>' +
                                '<p><strong>Pago:</strong> ' + coordenada.pago + '</p>' +
                                '<button data-id="' + idMarker + '" class="btn btn-primary btn-aceptar-solicitud">Aceptar solicitud</button>';
                        }


                        var marker = L.marker([latitud, longitud]).addTo(map).bindPopup(popupContent);

                    });
                })
                .catch(error => console.error('Hubo un error:', error));
            document.addEventListener('click', function (e) {
                if (e.target.classList.contains('btn-aceptar-solicitud')) {
                    var idMarker = e.target.getAttribute('data-id');
                    var idEmpleado = "<?php echo $_SESSION['id_empleado']; ?>";

                    console.log("Datos enviados:", { idMarker: idMarker, idEmpleado: idEmpleado });

                    fetch('update_empleado.php', {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                        },
                        body: JSON.stringify({
                            idMarker: idMarker,
                            idEmpleado: idEmpleado
                        }),
                    })
                    .then(response => response.json())
                    .then(data => {
                        console.log("Respuesta del servidor:", data);

                        if (data.status === 'success') {
                            // Esconder el botón
                            e.target.style.display = 'none';

                            // Crear un elemento de entrada de solo lectura
                            var inputElement = document.createElement('input');
                            inputElement.type = 'text';
                            inputElement.readOnly = true;
                            inputElement.value = 'En proceso';

                            // Agregar el elemento de entrada después del botón
                            e.target.parentNode.insertBefore(inputElement, e.target.nextSibling);

                            alert('Datos actualizados correctamente');
                        } else {
                            // Manejar el caso en que la respuesta no sea de éxito
                            alert('Hubo un problema al actualizar los datos.');
                        }
                    })
                    .catch(error => {
                        console.error('Hubo un error:', error);
                    });
                }
            });


        </script>

    </main>
</body>
</html>
