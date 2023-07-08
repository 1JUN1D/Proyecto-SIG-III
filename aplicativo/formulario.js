document.addEventListener('DOMContentLoaded', function() {
    console.log("El DOM está cargado");

    // Recuperar la ubicación seleccionada de localStorage
    var selectedLocationName = localStorage.getItem("selectedLocationName");
    var inputElement = document.querySelector("input[name='direccion']");
    inputElement.value = selectedLocationName;
    console.log("Ubicacion:", selectedLocationName);
    
    // Recuperar la opción seleccionada de los formularios de localStorage
    var selectedOption = localStorage.getItem("selectedOption");
    
    console.log("Opción almacenada:", selectedOption);
    
    var mostrarOpcionElement = document.getElementById("mostrarOpcion");
    
    // Mostrar la opción seleccionada en el elemento input
    if (selectedOption) {
        mostrarOpcionElement.value = selectedOption;
        console.log("Mostrando opción seleccionada");
    } else {
        console.log("No hay opción seleccionada almacenada");
    }
    
    var selectedLocationLat = localStorage.getItem("selectedLocationLat");
    var selectedLocationLng = localStorage.getItem("selectedLocationLng");
    
    // Almacenar latitud y longitud en los input correspondientes
    var latitudInput = document.getElementById("latitud");
    var longitudInput = document.getElementById("longitud");
    
    latitudInput.value = selectedLocationLat;
    longitudInput.value = selectedLocationLng;

    // Manejar la selección de métodos de pago
    var paymentButtons = document.querySelectorAll('.payment-method');
    paymentButtons.forEach(function(button) {
        button.addEventListener('click', function(event) {
            // Prevenir la recarga de la página
            event.preventDefault();

            // Remover el estilo de borde de todos los botones
            paymentButtons.forEach(function(btn) {
                btn.style.border = 'none';
            });

            // Agregar un borde al botón seleccionado
            button.style.border = '2px solid #4CAF50';
        });
    });

    document.querySelectorAll('.payment-method').forEach(button => {
        button.addEventListener('click', event => {
            document.getElementById('pago').value = event.target.alt;
        });
    });

    function clearFields() {
        document.getElementById('mostrarOpcion').value = '';
        document.getElementsByName('direccion')[0].value = '';
    }

});
