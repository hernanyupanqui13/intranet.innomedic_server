$(document).on('submit', '#registrar_prueba_antigeno_cuantitativa', function(event) {
    event.preventDefault();
    
    if(isFulFilled()) {
        actualizarLabEstado("1");
    } else {
        actualizarLabEstado("0");
    }



    $.ajax({
        url: `${window.location.origin}/Laboratorio/Laboratorio/actualizar_prueba_rapida/`,
        type: 'POST',
        data: $("#registrar_prueba_antigeno_cuantitativa").serialize(),
    })

    .done(function() {
        console.log("success");
        Swal.fire(
            '!Buen Trabajo!',
            'El registro se Actualizo de Manera Correcta',
            'success'
          )
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
    const antig_result_input = document.getElementById("antigeno_resultado_input");
    const concentra_antig_input = document.getElementById("concentra_atig_input");

    let isAntigResultFilled = antig_result_input.value == "positivo" || antig_result_input.value == "negativo";
    let isConcentraFilled = concentra_antig_input.value != null && concentra_antig_input.value != "";
    return isAntigResultFilled && isConcentraFilled;
}