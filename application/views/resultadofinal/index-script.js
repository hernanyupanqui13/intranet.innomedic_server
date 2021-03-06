console.log("extenrod index bien");

const footable_columns = [
    { "name": "nro_identificador", "title": "Codigo", "breakpoints": "xs", "sorted": "true" },
    { "name": "fecha_registro", "title": "Fecha Atención" ,"breakpoints": "xs"},
    { "name": "nombrex", "title": "Paciente" },			
    { "name": "final", "title": "Impresión Final", "breakpoints": "xs sm md", "classes":"centrado"},
    { "name": "monto", "title": "Monto Total", "breakpoints": "xs sm md", "classes":"centrado"},
    { "name": "estado", "title": "Estado", "breakpoints": "xs sm md", "classes":"centrado estado_progress_container"},
    { "name": "boleta", "title": "Boleta", "breakpoints": "xs sm md", "classes":"centrado"},
    { "name": "enviar", "title": "Enviar al Correo", "breakpoints": "xs sm md", "classes":"centrado"}
];

let data_for_download; 





$('[data-page-size]').on('click', function(e){
    e.preventDefault();
    var newSize = $(this).data('pageSize');
    FooTable.get('#showcase-example-1').pageSize(newSize);
});


jQuery(function($){

    ft = FooTable.init('#showcase-example-1', {

        "columns": footable_columns,
            
        "rows": getRowsData(),

        "on": {
            "ready.ft.table": function(e, ft){
                fillEstadoProgreso();
					}, 
            "after.ft.paging": function(e, ft){
                fillEstadoProgreso();
            } 					
        }
        
    })



});

$(document).ready(function() {

    $(document).on('click', '#buscar_registro_por_ajax', function(event) {
        event.preventDefault();

        let fecha_inicio = $("#fecha_inicio").val();

        if(fecha_inicio!="") {
            fecha_inicio = fecha_inicio.split("/");
            fecha_inicio = fecha_inicio[2] + "-" + fecha_inicio[0] + "-" + fecha_inicio[1];
        } else {
            fecha_inicio="null";
        }
        
        
        // Obteniendo la fecha y dando formato para que sea complatible con MySql
        let fecha_fin = $("#fecha_fin").val();
        if(fecha_fin!="") {
            fecha_fin = fecha_fin.split("/");
            fecha_fin = fecha_fin[2] + "-" + fecha_fin[0] + "-" + fecha_fin[1];    
        } else {
            fecha_fin = "null";
        }
        
        let nombre_busqueda = $("#nombre_busqueda").val();
        let dni_busqueda = $("#dni_busqueda").val();

        if(nombre_busqueda == null || nombre_busqueda =="") {
            nombre_busqueda = "null";		
        } 

        if(dni_busqueda == null || dni_busqueda =="") {
            dni_busqueda =  "null";					
        }

        let tipo_de_examen = $("#tipo_de_examen").val();
        console.log(tipo_de_examen);
        if(tipo_de_examen == null || tipo_de_examen == "") {
            tipo_de_examen = "null";
        }


        
        $('#showcase-example-1').footable({
            "columns": footable_columns,

            "rows":getRowsData(fecha_inicio, fecha_fin, nombre_busqueda, dni_busqueda, tipo_de_examen),
            
            "on": {
                "ready.ft.table": function(e, ft){
                    fillEstadoProgreso();
                }, 
                "after.ft.paging": function(e, ft){
                    fillEstadoProgreso();
                } 					
            }
       });


    });
});

function limpiar_campos() {
    $("#fecha_inicio").val("");
    $("#fecha_fin").val("");
    $("#nombre_busqueda").val("");
    $("#dni_busqueda").val("");
}






























function laboraorio(id) {
    window.open(`${window.location.origin}/Laboratorio/Laboratorio/Mostrar_registros/${id}`, '_blank');
}

function rayosx(url) {
    window.open(`${window.location.origin}/Rayos/Rayos/Mostrar_registros/${url}`,'_blank');
}


function enviarcorreo($id) {

    var id_paciente = $id;
    $.ajax({
        url: `${window.location.origin}/ResultadoFinal/ResultadoFinal/mostramosdatos_del_paciente/`,
        type: 'POST',
        dataType: 'json',
        data: {id_paciente: id_paciente},
    })
    .done(function(data) {
        console.log("success");

        $("#exampleModal1").modal("show");
        $("#id_paciente_update").val($id);
        $("#nombres_completos_idd").text(data.nombres);
        

        $("#nombres_completos_result_url").attr({
            href: `${window.location.origin}/ResultadoFinal/ResultadoFinal/view_result_data_list_details/${data.url_unico}`,
            title:  data.nombres,
            target: "_blank",
        });

        $("#text").text(data.nombres);
        $("#correo_valid").val(data.correo);

        

    })
    .fail(function() {
        console.log("error");
    })
    .always(function() {
        console.log("complete");
    });	 
    
}

function adjuntar_boleta_pago($id) {
    // body...
    var id_paciente = $id;
    $.ajax({
        url: `${window.location.origin}/ResultadoFinal/ResultadoFinal/mostramosdatos_del_paciente/`,
        type: 'POST',
        dataType: 'json',
        data: {id_paciente: id_paciente},
    })
    .done(function(data) {
        console.log("success");

        $("#exampleModal11").modal("show");
        $("#id_paciente_update_boleta").val($id);
        $("#nombres_completos_idd_boleta").text(data.nombres);
        //$("#nombres_completos_result_url").text(data.url_unico);
        /*$("#nombres_completos_result_url").attr({
            href: '<?php echo base_url().'ResultadoFinal/ResultadoFinal/view_result_data_list_details/'?>'+data.url_unico,
            title:  data.nombres,
            target: "_blank",
        });
        $("#text").text(data.nombres);
        $("#correo_valid").val(data.correo);*/

        

    })
    .fail(function() {
        console.log("error");
    })
    .always(function() {
        console.log("complete");
    });
}

function ver_boleta(id) {
    // body...
    var id_paciente = id;
    $.ajax({
        url: `${window.location.origin}/ResultadoFinal/ResultadoFinal/mostramosdatos_del_paciente/`,
        type: 'POST',
        dataType: 'json',
        data: {id_paciente: id_paciente},
    })
    .done(function(data) {
        console.log("success");

        $("#exampleModal12").modal("show");
        $("#nombres_completos_idd_boleta_boletas").text(data.nombres);
        $("#pdfdoc_impre_boleta").html(`<iframe  class="responsive-iframe" src="${window.location.origin}/upload/boleta_cliente/${data.boleta_pago}" width="100%" height="700px" frameBorder="0"></iframe>`);


    })
    .fail(function() {
        console.log("error");
    })
    .always(function() {
        console.log("complete");
    });
}



$(document).ready(function() {
    $(document).on('submit', '#register_update_link_archivo', function(event) {
        event.preventDefault();
        /* Act on the event */
        $("#eliminamos").remove();
        $("#agregamos").html(`<button class="btn btn-dark btn-rounded btn-lg " type="submit" id="eliminamos_load">
          <span class="spinner-border spinner-border-lg text-success" role="status" aria-hidden="true"></span>
          Enviar Resultados
        </button>`);
        var archivo = $("#input-file-now-custom-3").val();
        if (archivo=="" || archivo ==null) {
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: '¡Algo salió mal!',
                footer: '<a href>¿Por qué tengo este problema?</a>'
            })
            $("#eliminamos_load").remove();
            $("#agregamos").html(`<button type="submit" class="btn btn-dark btn-rounded btn-lg" id="eliminamos">Enviar Resultados</button>`);
            return false;
        }

        $.ajax({
             url: `${window.location.origin}/ResultadoFinal/ResultadoFinal/enviar_correo_datos/`,
             type: 'POST',
              data:new FormData(this),  
              contentType:false,  
              processData:false, 
             
        })
        
        .done(function() {
            console.log("success");
                 Swal.fire({
                  icon: 'success',
                  title: 'Buen trabajo',
                  text: 'Su petición ha sido enviada',
                  footer: '<a  href="javascript:void();">Administrador IT</a>'
                })
                $("#exampleModal1").modal("hide");
                $("input[name=options][value='no']").prop("checked",true);
                $("#list").removeClass('active');
                $("#list_add").addClass('active');


                 var drEvent = $('#input-file-now-custom-3').dropify();
                  drEvent = drEvent.data('dropify');
                  drEvent.resetPreview();
                  drEvent.clearElement();
                  drEvent.destroy();
                  drEvent.init();
                  $('.dropify#input-file-now-custom-3').dropify({
                  });
                $("#input-file-now-custom-3").val("");

                   $('#showcase-example-1').footable({
                    "columns": footable_columns,

                    "rows": getRowsData(),

                    "on": {
                        "ready.ft.table": function(e, ft){
                            fillEstadoProgreso();
                        }, 
                        "after.ft.paging": function(e, ft){
                            fillEstadoProgreso();
                        } 					
                    }
                });

                $("#agregamos").html(`<button type="submit" class="btn btn-dark btn-rounded btn-lg" id="eliminamos">Enviar Resultados</button>`);
                $("#eliminamos_load").remove();

        })
        .fail(function() {
            console.log("error");
            Swal.fire({
                icon: 'error',
                title: 'Oopss!',
                text: 'Su petición no ha sido enviada',
                footer: '<a  href="javascript:void();">Administrador IT</a>'
            })
        })
        .always(function() {
            console.log("complete");
        });
        
    });

    $(document).on('submit', '#register_update_link_archivo_data', function(event) {
        event.preventDefault();

        /* Act on the event */
        var archivo = $("#input-file-now-custom-4").val();
        if (archivo=="" || archivo ==null) {
            Swal.fire({
                  icon: 'error',
                  title: 'Oops...',
                  text: '¡Algo salió mal!',
                  footer: '<a href>¿Por qué tengo este problema?</a>'
                })
            return false;
        }
        $.ajax({
            url: `${window.location.origin}/ResultadoFinal/ResultadoFinal/adjuntar_boleta_pago_exit/`,
             type: 'POST',
              data:new FormData(this),  
              contentType:false,  
              processData:false, 
        })
        .done(function() {
            console.log("success");
            Swal.fire({
              icon: 'success',
              title: 'Buen trabajo',
              text: 'La boleta a sido cargada con exito',
              footer: '<a  href="javascript:void();">Administrador IT</a>'
            })
            $("#exampleModal11").modal("hide");



             var drEvent = $('#input-file-now-custom-4').dropify();
              drEvent = drEvent.data('dropify');
              drEvent.resetPreview();
              drEvent.clearElement();
              drEvent.destroy();
              drEvent.init();
            $('#showcase-example-1').footable({
                "columns": footable_columns,

                "rows": getRowsData(),

                "on": {
                    "ready.ft.table": function(e, ft){
                        fillEstadoProgreso();
                    }, 
                    "after.ft.paging": function(e, ft){
                        fillEstadoProgreso();
                    } 					
                }
            });




        })
        .fail(function() {
            console.log("error");
            Swal.fire({
              icon: 'error',
              title: 'Oopss!',
              text: 'La boleta no ha sido cargada',
              footer: '<a  href="javascript:void();">Administrador IT</a>'
            })
        })
        .always(function() {
            console.log("complete");
        });
        
    });
});



































function fileValidatiosn(obj){
    var uploadFile = obj.files[0];

    if (!window.FileReader) {
        alert('El navegador no soporta la lectura de archivos');
        return;
    }

    if (!(/\.(jpg|png|gif|pdf|docx|docm|dotx|dotm|odt)$/i).test(uploadFile.name)) {
      Swal.fire({
      title: 'Files',
      text: "El archivo a adjuntar no es una imagen solo acepta pdf|jpg|png|gif",
      icon: 'warning',
      showCancelButton: false,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      confirmButtonText: 'ok'
    }).then((result) => {
      if (result.value) {
         var drEvent = $('#input-file-now-custom-3').dropify();
          drEvent = drEvent.data('dropify');
          drEvent.resetPreview();
          drEvent.clearElement();
          drEvent.destroy();
          drEvent.init();
          $('.dropify#input-file-now-custom-3').dropify({
          });
        $("#input-file-now-custom-3").val("");

        //validamos 

        var drEvents = $('#input-file-now-custom-4').dropify();
          drEvents = drEvents.data('dropify');
          drEvents.resetPreview();
          drEvents.clearElement();
          drEvents.destroy();
          drEvents.init();
          $('.dropify#input-file-now-custom-4').dropify({
          });
        $("#input-file-now-custom-4").val("");
      }
    })
       
    }


    
                                           
}

 $(document).ready(function() {
    $('.dropify').dropify({
        messages: {
            'default': 'Arrastre y suelte un archivo aquí o haga clic en',
            'replace': 'Arrastra y suelta o haz clic para reemplazar',
            'remove':  'Eliminar',
            'error':   'Ooops, sucedió algo mal.'
        }
    });
}); 






function getRowsData(fecha_inicio = null, fecha_fin = null, nombre_busqueda = null, dni_busqueda = null, tipo_de_examen=null) {

    let data; 

    if (fecha_inicio ===null && fecha_fin===null && nombre_busqueda===null && dni_busqueda===null ) {
        data = jQuery.get({
            "url": `${window.location.origin}/ResultadoFinal/ResultadoFinal/mostrar_datos_busqueda_avanzada/`,
            "dataType": "json"		
        })
        .then(r => {

            // This is a global variable to store the data when we want to download
            data_for_download = r.list_data;
            return r.rows;

        });


        return data;
    } else {
        data = jQuery.post({
            "url": `${window.location.origin}/ResultadoFinal/ResultadoFinal/mostrar_datos_busqueda_avanzada/`,
            "dataType": "json",
            "data": {
                "fecha_inicio": fecha_inicio,
                "fecha_fin": fecha_fin,
                "nombre_busqueda":nombre_busqueda,
                "dni_busqueda":dni_busqueda,
                "tipo_de_examen":tipo_de_examen
            },
            success:  function (response) {                 		                    
                $("#showcase-example-1 tr:last-child").remove();
            },
            error:function(errorThrown) {
                console.log(errorThrown);
                alert("error");
            }
        })
        .then( r => {
            // This is a global variable to store the data when we want to download
            data_for_download = r.list_data;
            return r.rows;
        });

        
        return data;
    }
}

function tipo_paquete_() {
    // body...
      //mostramos tipo_pago
    $.ajax({
            type: "POST",
            async:true,
            url: `${window.location.origin}/Examenes/Examenes/cargar_paquete/`,
            success: function(response)
            {
                $('.mostrararea select').html(response).fadeIn();
            }
    });
  
}

tipo_paquete_()

/*
-------------------------------------------------------------------------------------------
DESCARGAR DATOS DE LA TABLA
-------------------------------------------------------------------------------------------
*/

document.getElementById("dowload_button").addEventListener("click", function () {
    
    

    let my_form = document.createElement("form");
    my_form.action = `${window.location.origin}/ResultadoFinal/ResultadoFinal/downloadExcell/`;
    my_form.method = "post";
    my_form.style.visibility ="hidden";
    my_form.innerHTML = `<input type="text" name="data" value='${JSON.stringify(data_for_download)}'>`;
    document.querySelector("body").appendChild(my_form);


    my_form.submit();

    my_form.remove();


    
});

