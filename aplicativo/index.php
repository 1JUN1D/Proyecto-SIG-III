<?php
session_start();

// Verificar si la sesión no está iniciada
if (!isset($_SESSION['id_usuario'])) {
    header("Location: login.php");
    exit; // Asegurarse de que el script se detenga después de redirigir al usuario
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css"
    integrity="sha256-p4NxAoJBhIIN+hmNHrzRCf9tD/miZyoHS5obTRR9BMY="
    crossorigin=""/>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"
    integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo="
    crossorigin=""></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://unpkg.com/leaflet-control-geocoder/dist/Control.Geocoder.css" />

    <title>Document</title>
</head>
<body>
    <main>
        <div id="map">
        </div>
        <div class="pedir">
            <div id="elegir_servicio">
                <h2>Elige tu servicio</h2>
                <button id="continue-btn" style="display: none;" type="button" class="btn btn-primary">
                    <a href="holi.php" style="color: white; text-decoration: none;">CONTINUA</a>
                </button>
            </div>
            <div id="form_container_elec" style="display: none;">
                <form id="opciones_form_elec">
                    <div class="form_option">
                        <input type="radio" id="opcion1_elec" name="opciones" value="opcion1" class="custom-radio">
                        <label for="opcion1_elec" class="btn btn-secondary">Instalacion</label>
                    </div>
                    <div class="form_option">
                        <input type="radio" id="opcion2_elec" name="opciones" value="opcion2" class="custom-radio">
                        <label for="opcion2_elec" class="btn btn-secondary">Iluminacion</label>
                    </div>
                    <div class="form_option">
                        <input type="radio" id="opcion3_elec" name="opciones" value="opcion3" class="custom-radio">
                        <label for="opcion3_elec" class="btn btn-secondary">Diagnostico General</label>
                    </div>
                </form>
            </div>
            <div id="form_container_mec" style="display: none;">
                <form id="opciones_form_mec">
                <div class="form_option">
                        <input type="radio" id="opcion1_mec" name="opciones" value="opcion1" class="custom-radio">
                        <label for="opcion1_mec" class="btn btn-secondary">Reparacion</label>
                    </div>
                    <div class="form_option">
                        <input type="radio" id="opcion2_mec" name="opciones" value="opcion2" class="custom-radio">
                        <label for="opcion2_mec" class="btn btn-secondary">Mantenimiento</label>
                    </div>
                    <div class="form_option">
                        <input type="radio" id="opcion3_mec" name="opciones" value="opcion3" class="custom-radio">
                        <label for="opcion3_mec" class="btn btn-secondary">Instalacion</label>
                    </div>
                </form>
            </div>
            <div id="opciones">
                <button type="button" class="btn btn-outline-secondary" id="boton1">
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-bulb" width="60" height="60" viewBox="0 0 24 24" stroke-width="1.5" stroke="#2c3e50" fill="none" stroke-linecap="round" stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                        <path d="M3 12h1m8 -9v1m8 8h1m-15.4 -6.4l.7 .7m12.1 -.7l-.7 .7" />
                        <path d="M9 16a5 5 0 1 1 6 0a3.5 3.5 0 0 0 -1 3a2 2 0 0 1 -4 0a3.5 3.5 0 0 0 -1 -3" />
                        <path d="M9.7 17l4.6 0" />
                      </svg>
                      <p><strong>ELECTRICO</strong></p></button>
                <button type="button" class="btn btn-outline-secondary" id="boton2">
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-tool" width="60" height="60" viewBox="0 0 24 24" stroke-width="1.5" stroke="#2c3e50" fill="none" stroke-linecap="round" stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                        <path d="M7 10h3v-3l-3.5 -3.5a6 6 0 0 1 8 8l6 6a2 2 0 0 1 -3 3l-6 -6a6 6 0 0 1 -8 -8l3.5 3.5" />
                      </svg><p><strong>MECANICO</strong></p></button>
            </div>
            <div id="ubicacion"></div>
        </div>
    </main>
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

L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
    maxZoom: 19,
    attribution: '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>'
}).addTo(map);

var barrios = L.tileLayer.wms('http://3.209.175.188/geoserver/mus/wms', {
                layers: 'mus:Barrio',
                format: 'image/png',
                transparent: true,
                version: '1.1.0'
            }).addTo(map);

document.addEventListener('DOMContentLoaded', (event) => {


    var geocoder = L.Control.geocoder().addTo(map);
    document.getElementById('ubicacion').appendChild(geocoder.getContainer());

    const formContainerElec = document.querySelector('#form_container_elec');
    const formContainerMec = document.querySelector('#form_container_mec');
    const continueBtn = document.getElementById('continue-btn');
    let optionSelected = false;
    let locationSet = false;

    const checkContinue = () => {
        if (optionSelected && locationSet) {
            continueBtn.style.display = 'block';
        } else {
            continueBtn.style.display = 'none';
        }
    };

    const toggleFormContainerElectricista = () => {
        if (formContainerElec.style.display === 'none' || formContainerElec.style.display === '') {
            formContainerElec.style.display = 'block';
        } else {
            formContainerElec.style.display = 'none';
        }
        formContainerMec.style.display = 'none';
    };

    const toggleFormContainerMecanico = () => {
        if (formContainerMec.style.display === 'none' || formContainerMec.style.display === '') {
            formContainerMec.style.display = 'block';
        } else {
            formContainerMec.style.display = 'none';
        }
        formContainerElec.style.display = 'none';
    };

    document.querySelector('#boton1').addEventListener('click', toggleFormContainerElectricista);
    document.querySelector('#boton2').addEventListener('click', toggleFormContainerMecanico);

    //Seccion para que no se seleccionen los dos formualrios a la vez

    document.querySelectorAll('#opciones_form_elec input[type="radio"]').forEach(option => {
        option.addEventListener('change', () => {
            let labelText = document.querySelector(`label[for="${option.id}"]`).textContent;
            console.log("Opción Electricista seleccionada: ", labelText);
            optionSelected = true;
            
            // Almacena la última opción seleccionada y elimina la opción del otro formulario
            localStorage.setItem('selectedOption', labelText);
            localStorage.removeItem('selectedOptionMec');
    
            // Deselecciona las opciones en el otro formulario
            document.querySelectorAll('#opciones_form_mec input[type="radio"]').forEach(otherOption => {
                otherOption.checked = false;
            });
    
            checkContinue();
        });
    });
    
    document.querySelectorAll('#opciones_form_mec input[type="radio"]').forEach(option => {
        option.addEventListener('change', () => {
            let labelText = document.querySelector(`label[for="${option.id}"]`).textContent;
            console.log("Opción Mecánico seleccionada: ", labelText);
            optionSelected = true;
            
            // Almacena la última opción seleccionada y elimina la opción del otro formulario
            localStorage.setItem('selectedOption', labelText);
            localStorage.removeItem('selectedOptionElec');
            
            // Deselecciona las opciones en el otro formulario
            document.querySelectorAll('#opciones_form_elec input[type="radio"]').forEach(otherOption => {
                otherOption.checked = false;
            });
    
            checkContinue();
        });
    });
        
    
    //Ref_finalizacion


    var marker; // Variable para almacenar el marcador actual

    // Función para agregar un marcador y almacenar la información de la ubicación
    const addMarker = (latlng, name) => {
        console.log("Antes de agregar el marcador, marker =", marker);
    
        if (marker) { // Si ya existe un marcador, lo elimina
            console.log("Eliminando marcador existente");
            map.removeLayer(marker);
        }
    
        marker = L.marker(latlng).addTo(map);
        console.log("Después de agregar el marcador, marker =", marker);
        
        console.log("Valor de name antes de la condición:", name); // Agregamos esta línea
    
        if (!name || name === "" || name === "Nombre de la ubicación") { // Ajustamos la condición aquí
            console.log("Realizando geocodificación inversa");
            const geocodeUrl = `https://api.opencagedata.com/geocode/v1/json?q=${latlng.lat}+${latlng.lng}&key=a42998f3b647495ea0f307dae915b54e`;
            console.log("URL de geocodificación inversa:", geocodeUrl);
    
            fetch(geocodeUrl)
                .then(response => {
                    console.log("Respuesta de la API de geocodificación inversa:", response);
                    return response.json();
                })
                .then(data => {
                    console.log("Datos de geocodificación inversa:", data);
                    name = data.results[0].formatted; // Usar el nombre formateado de la primera respuesta
                    console.log("Nombre de la ubicación obtenido mediante geocodificación inversa:", name);
    
                    // Almacenar la información en localStorage
                    localStorage.setItem("selectedLocationLat", latlng.lat);
                    localStorage.setItem("selectedLocationLng", latlng.lng);
                    localStorage.setItem("selectedLocationName", name);
    
                    locationSet = true;
                    checkContinue();
                })
                .catch(error => console.error("Error al obtener el nombre de la ubicación:", error));
        } else {
            // Almacenar la información en localStorage
            localStorage.setItem("selectedLocationLat", latlng.lat);
            localStorage.setItem("selectedLocationLng", latlng.lng);
            localStorage.setItem("selectedLocationName", name);
    
            locationSet = true;
            checkContinue();
        }
    
        map.eachLayer(function (layer) {
            if (layer instanceof L.Marker) {
                map.removeLayer(layer);
            }
        });
    
        marker = L.marker(latlng).addTo(map);
    };
    
    document.getElementById('opciones_form_elec').addEventListener('change', function(e) {
        var labels = document.querySelectorAll('.form_option label');
        labels.forEach(function(label) {
            label.classList.remove('active');
        });
        var activeLabel = document.querySelector('input[type="radio"]:checked + label');
        if (activeLabel) {
            activeLabel.classList.add('active');
        }
    });

    // Evento al hacer clic en el mapa
    map.on('click', function(e) {
        var latlng = e.latlng;
        var locationName = "Nombre de la ubicación"; // Reemplazar esto con el nombre real de la ubicación
        addMarker(latlng, locationName);
    });

    // Modificar el evento 'markgeocode' para usar la función addMarker
    geocoder.on('markgeocode', function(e) {
        var latlng = e.geocode.center;
        addMarker(latlng);
    });
    

    
    let serviceText = document.querySelector('#elegir_servicio h2');
    let originalText = serviceText.textContent;

    document.querySelector('#opciones button:nth-child(1)').addEventListener('click', () => {
        if (serviceText.textContent === 'Servicio eléctrico') {
            serviceText.textContent = originalText;
        } else {
            serviceText.textContent = 'Servicio eléctrico';
        }
    });

    document.querySelector('#opciones button:nth-child(2)').addEventListener('click', () => {
        if (serviceText.textContent === 'Servicio mecánico') {
            serviceText.textContent = originalText;
        } else {
            serviceText.textContent = 'Servicio mecánico';
        }
    });

    document.getElementById("map").addEventListener("click", function(event) {
        if (event.target.getAttribute("data-action") === "continue") {
          event.preventDefault();
        }
      });
    
      
});
    </script>
    <script src="https://unpkg.com/leaflet-control-geocoder/dist/Control.Geocoder.js"></script>
</body>
</html>