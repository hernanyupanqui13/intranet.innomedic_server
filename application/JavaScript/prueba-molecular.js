console.log("location");
$(document).on('submit', '#registrar_prueba_molecular', function(event) {
    event.preventDefault();

    if(isFulFilled ()) {
        actualizarLabEstado("1");
    } else {
        actualizarLabEstado("0");
    }

    $.ajax({
        url: `${window.location.origin}/Laboratorio/Laboratorio/uploadMolecular/`,
        type: 'POST',
        data: new FormData(this),
        processData: false,
        contentType: false,
    })

    .done(function(data) {
        console.log("success jaax");
        Swal.fire(
            '!Buen Trabajo!',
            'El registro se Actualizo de Manera Correcta',
            'success'
        )
        // Actualizando el iframe con el pdf nuevo
        document.getElementById("imprimir_molecular_container").src=window.location.pathname + "/../../../../upload/resultados_molecular/" + data;

    })

    .fail(function() {
        console.log("error");
        alert("No se pudo actualizar");
    })
    
    .always(function() {        
        console.log("complete");
    });    
});




function isFulFilled () {
    const molecular_input = document.getElementById("test_input");
    
    let isMolecularFileFilled = molecular_input.value != null && molecular_input.value != "";
    
    return isMolecularFileFilled;
}
