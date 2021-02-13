$(document).on('submit', '#registrar_prueba_covid', function(event) {
    event.preventDefault();
    
    if(isFulFilled()) {
        actualizarLabEstado("1");
    } else {
        actualizarLabEstado("0");
    }
    
    $.ajax({
        url: window.location.origin + "/intranet.innomedic.pe" + "/Laboratorio/Laboratorio/actualizar_prueba_rapida/",
        type: 'POST',
        data: $("#registrar_prueba_covid").serialize(),
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
    const igm_input = document.getElementById("igm");
    const igg_input = document.getElementById("igg");

    let isIgmFilled = igm_input.value == "REACTIVO" || igm_input.value == "NO REACTIVO";
    let isIggFilled = igg_input.value == "REACTIVO" || igg_input.value == "NO REACTIVO";
    
    

    if(isIgmFilled && isIggFilled) {
        return true;
    } else {
        return false;
    }


}

