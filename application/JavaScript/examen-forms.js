// Cambio de atributo
const tipo_documento = document.getElementById("tipo_documento");
const dni_input = document.getElementById("dni_evaristo");

// Si no es dni el documento se eliminan las restricciones para ingresar datos
tipo_documento.addEventListener("change", function() {

    if(tipo_documento.value!="dni") {   
        dni_input.removeAttribute("pattern");
        dni_input.removeAttribute("maxlength");
    } else {
        dni_input.setAttribute("maxlength", "8");
        dni_input.setAttribute("pattern", "[0-9]{8}");
        dni_input.value = "";
    }    
    
});


// Validacion de del input DNI
const help_message = document.getElementById("dni_help_message");

dni_input.addEventListener("keyup", function() {

    var patt = new RegExp("[^\\d]");

    if (patt.test(dni_input.value)) {
        help_message.innerHTML="Ingrese solo numeros y presione Enter";
        help_message.style.color ="red";
    } else {
        help_message.innerHTML='Ingrese el Nª de documento y presione "Enter"';
        help_message.style.color ="black";
    }

});


/*---------------------------------------------------------------------------------------------------------------------*/