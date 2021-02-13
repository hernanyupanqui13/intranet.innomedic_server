console.log("perfectly linked");
console.log(window.location.pathname+'../..');

$(document).ready(function() {
    $(document).on('submit', '#registrar_prueba_covid_cuantitativa', function(event) {
        event.preventDefault();

        if(isFulFilled()) {
            actualizarLabEstado("1");
        } else {
            actualizarLabEstado("0");
        }


        $.ajax({
            url: window.location.origin + "/intranet.innomedic.pe" + "/Laboratorio/Laboratorio/actualizar_prueba_rapida/",
            type: 'POST',
            data: $("#registrar_prueba_covid_cuantitativa").serialize(),
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

    
});

function isFulFilled () {
    const igm_input = document.getElementById("igm");
    const igg_input = document.getElementById("igg");
    const concentra_igm_input = document.getElementById("concentracion_igm_input");
    const concentra_igg_input = document.getElementById("concentracion_igg_input");

    let isIgmFilled = igm_input.value == "REACTIVO" || igm_input.value == "NO REACTIVO";
    let isIggFilled = igg_input.value == "REACTIVO" || igg_input.value == "NO REACTIVO";
    let isConcentraIgmFilled = concentra_igm_input.value !=null && concentra_igm_input.value !="";
    let isConcentraIggFilled = concentra_igg_input.value !=null && concentra_igg_input.value !="";


    return isIggFilled && 
        isIgmFilled && 
        isConcentraIggFilled && 
        isConcentraIgmFilled
    ;

}

