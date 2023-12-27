function validarCorreo(correo) {
    // Utilizar una expresión regular para validar el formato del correo electrónico
    var regexCorreo = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    return regexCorreo.test(correo);
}

function registro() {
    // Obtener valores de los campos
    var nombre = document.getElementsByName('nombre')[0].value;
    var apellido = document.getElementsByName('apellido')[0].value;
    var fechaNacimiento = document.getElementsByName('fecha_nacimiento')[0].value;
    var numeroDocumento = document.getElementsByName('numero_documento')[0].value;
    var correo = document.getElementsByName('correo')[0].value;
    var telefono = document.getElementsByName('telefono')[0].value;
    var idCiudad = document.getElementsByName('idCiudad')[0].value;
    var idOcupacion = document.getElementsByName('idOcupacion')[0].value;

    // Realizar validaciones, por ejemplo:
    if (nombre === '' || apellido === '' || fechaNacimiento === '' || numeroDocumento === '' || correo === '' || telefono === '' || idCiudad === '' || idOcupacion === '') {
        alert('No se pudo registrar, mire que su información sea correcta');
        return false; // Impide que el formulario se envíe si hay campos vacíos
    } 
    
    // Validar el formato del correo electrónico
    if (!validarCorreo(correo)) {
        alert('Al correo le hace falta el "@" o el "."');
        return false;
    }

    // Si todas las validaciones son exitosas, mostrar el mensaje emergente
    alert('Usuario registrado correctamente.');
    return true; // Permite que el formulario se envíe
}

function actualizar() {
    // Obtener valores de los campos
    var nombre = document.getElementsByName('nombre')[0].value;
    var apellido = document.getElementsByName('apellido')[0].value;
    var fechaNacimiento = document.getElementsByName('fecha_nacimiento')[0].value;
    var numeroDocumento = document.getElementsByName('numero_documento')[0].value;
    var correo = document.getElementsByName('correo')[0].value;
    var telefono = document.getElementsByName('telefono')[0].value;
    var idCiudad = document.getElementsByName('idCiudad')[0].value;
    var idOcupacion = document.getElementsByName('idOcupacion')[0].value;

    // Realizar validaciones, por ejemplo:
    if (nombre === '' || apellido === '' || fechaNacimiento === '' || numeroDocumento === '' || correo === '' || telefono === '' || idCiudad === '' || idOcupacion === '') {
        alert('No se pudo registrar, mire que su información sea correcta');
        return false; // Impide que el formulario se envíe si hay campos vacíos
    } 
    
    // Validar el formato del correo electrónico
    if (!validarCorreo(correo)) {
        alert('Al correo le hace falta el "@" o el "."');
        return false;
    }

    // Si todas las validaciones son exitosas, mostrar el mensaje emergente
    alert('Usuario actualizado correctamente.');
    return true; // Permite que el formulario se envíe
}

function ordenarLista() {
    // Obtener el valor seleccionado de la lista desplegable
    var criterio = document.getElementById("ordenarPor").value;
    
    // Construir la URL con el nuevo criterio
    var url = 'listar.php?criterio=' + criterio;
    
    // Redirigir a la nueva URL
    window.location.href = url;
}