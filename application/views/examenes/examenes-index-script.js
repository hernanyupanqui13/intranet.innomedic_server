  console.log("start without problems");
  
  
 
  //agregamos registros de la fecha
  var save_method; //for save method string
  var table;



  function cancelar_fijo() {
    $(".title_paquete_asociado").text('Nuevo Paquete Asociado');
    $(".evaristo_eldulce").attr('id', 'registrar_tipo_paquete_asociado');
    $("#asociar_nombre").val("");
    $("#asociar_codigo").val("");
    
    $("#id_registrar_id_paquete_asociado").val("");
    $('#categoria_tipo_asociar').prop('selectedIndex',0);
    $("#cambio_nomre_paquete_asoaciado").html("<i class='fas fa-check-circle'></i>&nbsp;Nuevo Registro");
    $('#compromisos_xx_xx').modal('hide');
  }


  
  function cancelar_fijo_id_tipoexamen() {
    
    $(".title_paquete_tipoexamen").text('Nuevo Tipo Exámen');
    $(".evaristo_eldulce_escudero").attr('id', 'registrar_tipo_paquete_asociado');
    $("#nombre_examen_tipo").val("");
    $("#precio_tipo_examen").val("");
    $('#categoria_tipo_examen').prop('selectedIndex',0);
    $("#id_registrar_id_tipopexamen").val("");
    $("#cambio_nomre_paquete_asoaciado_escudero").html("<i class='fas fa-check-circle'></i>&nbsp;Nuevo Registro");
    $('#compromisos_xx_xx_xx').modal('hide');

      
  }

    

  function reload_table_tipo_pago()
  {
      //reload datatable ajax 
        $('#table_tipo_pago').DataTable().ajax.reload();
  }

  //actualimoz datos de paquete
  function reload_table_paquete()
  {
      $('#table_paquete_general').DataTable().ajax.reload(); //reload datatable ajax 
  }
  function reload_table_paquete_asociado() {
    // body...
    $('#table_paquete_general_asociar').DataTable().ajax.reload(); //reload datatable ajax 
  }
  function table_paquete_general_examen_reload() {
    // body...
      $('#table_paquete_general_examen').DataTable().ajax.reload(); //reload datatable ajax 
  }

  $(document).ready(function() {


    //datatables
    mis_datos = $('#myTable').DataTable({ 

        "processing": true, //Feature control the processing indicator.
        "serverSide": true, //Feature control DataTables' server-side processing mode.
        "order": [], //Initial no order.

        // Load data for the table's content from an Ajax source
        "ajax": {
            "url": window.location.href + "ajax_list/",
            "type": "POST"
        },

        //Set column definition initialisation properties.
        "columnDefs": [
            { 
                "targets": [ -1 ], //last column
                "orderable": false, //set not orderable
            },
            { 
                "targets": [ -2 ], //2 last column (photo)
                "orderable": false, //set not orderable
            },
        ],
        "lengthMenu": [[5,10, 25, 50], [5,10, 25, 50]],


        "destroy": true,
        "info":true,
        "sInfo":true,
        // "order": [[1, "desc"]],
        "language":{
        "lengthMenu": "Mostrar _MENU_ Registros por página",
        //"info": "Mostrando pagina _PAGE_ de _PAGES_",
        "sInfo":"Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
        "sInfoFiltered":   "(filtrado de un total de _MAX_ registros)",
        /*"oLanguage": {
              "sInfo": "Mostrando START a END de TOTAL registros",
              "sZeroRecords": "No se encontraron registros coincidentes" 
          },*/
        "infoEmpty": "No hay registros disponibles",
        // "infoFiltered": "(filtrada de _MAX_ registros)",
        "loadingRecords": "Cargando...",
        "processing":     "Procesando...",
        "search": "Busqueda rapida:",
        "zeroRecords":    "No se encontraron registros coincidentes",
        "paginate": {
          "next":       "Siguiente",
          "previous":   "Anterior"
        },         
      },







    });
      
      





});

  

function reload_table()
{
    //table.ajax.reload(null,false); //reload datatable ajax 
      mis_datos.ajax.reload(null,false); 
      //$('#myTable').DataTable().ajax.reload();
      
  
}
  //tipo pago
$(document).ready(function() {
  

  //datatables
  //$('#compromisos > .modal-body').css({width:'auto',height:'auto', 'max-height':'100%'});
  
  
    table = $('#table_tipo_pago').DataTable({ 

        "responsive": {
            "details": {
                "display": $.fn.dataTable.Responsive.display.modal(),
            }
        },
        
        "processing": true, //Feature control the processing indicator.
        "serverSide": true, //Feature control DataTables' server-side processing mode.
        "order": [], //Initial no order.


        // Load data for the table's content from an Ajax source
        "ajax": {
            "url": window.location.href + "tipo_pago/",
            "type": "POST"
        },

        //Set column definition initialisation properties.
        "columnDefs": [
            { 
                "targets": [ -1 ], //last column
                "orderable": false, //set not orderable
                "className": 'dt-body-right',
            },
            { 
                "targets": [ -2 ], //2 last column (photo)
                "orderable": false, //set not orderable
                "className": 'dt-body-right',
            },
        ],


          "lengthMenu": [[3,5,10, 25, 50, -1], [3,5,10, 25, 50, "All"]],
        "destroy": true,
        "info":true,
        "sInfo":true,
        // "order": [[1, "desc"]],
        "language":{
        "lengthMenu": "Mostrar _MENU_ Registros por página",
        //"info": "Mostrando pagina _PAGE_ de _PAGES_",
        "sInfo":"Registros del _START_ al _END_ total de _TOTAL_ registros",
        "sInfoFiltered":   "(filtrado de un total de _MAX_ registros)",
        /*"oLanguage": {
              "sInfo": "Mostrando START a END de TOTAL registros",
              "sZeroRecords": "No se encontraron registros coincidentes" 
          },*/
        "infoEmpty": "No hay registros disponibles",
        // "infoFiltered": "(filtrada de _MAX_ registros)",
        "loadingRecords": "Cargando...",
        "processing":     "Procesando...",
        "search": "Busqueda tipo pago:",
        "zeroRecords":    "No se encontraron registros coincidentes",
        "paginate": {
          "next":       "Siguiente",
          "previous":   "Anterior"
        },         
      },


    });
  
});



//end tipo pago-------------



//tipo exmaen agregar


  $(document).ready(function() {
  

  //datatables
  //$('#compromisos > .modal-body').css({width:'auto',height:'auto', 'max-height':'100%'});
  
  
    $('#table_paquete_general_examen').DataTable({ 

        "responsive": {
            "details": {
                "display": $.fn.dataTable.Responsive.display.modal(),
            }
        },
        
        "processing": true, //Feature control the processing indicator.
        "serverSide": true, //Feature control DataTables' server-side processing mode.
        "order": [], //Initial no order.


        // Load data for the table's content from an Ajax source
        "ajax": {
            "url": window.location.href + "tipo_examen_general/",
            "type": "POST"
        },

        //Set column definition initialisation properties.
        "columnDefs": [
            { 
                "targets": [ -1 ], //last column
                "orderable": false, //set not orderable
                "className": 'dt-body-right',
            },
            { 
                "targets": [ -2 ], //2 last column (photo)
                "orderable": false, //set not orderable
                "className": 'dt-body-right',
            },
        ],


          "lengthMenu": [[3,5,10, 25, 50, -1], [3,5,10, 25, 50, "All"]],
        "destroy": true,
        "info":true,
        "sInfo":true,
        // "order": [[1, "desc"]],
        "language":{
        "lengthMenu": "Mostrar _MENU_ Registros por página",
        //"info": "Mostrando pagina _PAGE_ de _PAGES_",
        "sInfo":"Registros del _START_ al _END_ total de _TOTAL_ registros",
        "sInfoFiltered":   "(filtrado de un total de _MAX_ registros)",
        /*"oLanguage": {
              "sInfo": "Mostrando START a END de TOTAL registros",
              "sZeroRecords": "No se encontraron registros coincidentes" 
          },*/
        "infoEmpty": "No hay registros disponibles",
        // "infoFiltered": "(filtrada de _MAX_ registros)",
        "loadingRecords": "Cargando...",
        "processing":     "Procesando...",
        "search": "Busqueda tipo Exámen:",
        "zeroRecords":    "No se encontraron registros coincidentes",
        "paginate": {
          "next":       "Siguiente",
          "previous":   "Anterior"
        },         
      },


    });
  
});

//end examen agregar


  //agrrgar paquete
$(document).ready(function() {

  
    $('#table_paquete_general').DataTable({ 

        "responsive": {
            "details": {
                "display": $.fn.dataTable.Responsive.display.modal(),
            }
        },
        
        "processing": true, //Feature control the processing indicator.
        "serverSide": true, //Feature control DataTables' server-side processing mode.
        "order": [], //Initial no order.


        // Load data for the table's content from an Ajax source
        "ajax": {
            "url": window.location.href + "table_paquete_general/",
            "type": "POST"
        },

        //Set column definition initialisation properties.
        "columnDefs": [
            { 
                "targets": [ -1 ], //last column
                "orderable": false, //set not orderable
                "className": 'dt-body-right',
            },
            { 
                "targets": [ -2 ], //2 last column (photo)
                "orderable": false, //set not orderable
                "className": 'dt-body-right',
            },
        ],


          "lengthMenu": [[3,5,10, 25, 50, -1], [3,5,10, 25, 50, "All"]],
        "destroy": true,
        "info":true,
        "sInfo":true,
        // "order": [[1, "desc"]],
        "language":{
        "lengthMenu": "Mostrar _MENU_ Registros por página",
        //"info": "Mostrando pagina _PAGE_ de _PAGES_",
        "sInfo":"Registros del _START_ al _END_ total de _TOTAL_ registros",
        "sInfoFiltered":   "(filtrado de un total de _MAX_ registros)",
        /*"oLanguage": {
              "sInfo": "Mostrando START a END de TOTAL registros",
              "sZeroRecords": "No se encontraron registros coincidentes" 
          },*/
        "infoEmpty": "No hay registros disponibles",
        // "infoFiltered": "(filtrada de _MAX_ registros)",
        "loadingRecords": "Cargando...",
        "processing":     "Procesando...",
        "search": "Busqueda paquete:",
        "zeroRecords":    "No se encontraron registros coincidentes",
        "paginate": {
          "next":       "Siguiente",
          "previous":   "Anterior"
        },         
      },


    });
  
});

//end paquete general-------------


$(document).ready(function() {

  console.log("just CHECling");

  $("#buscar_registro_por_ajax").click(function(event) {
    console.log("just CHECling2222");

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

    $('#myTable').DataTable({ 
  
      "processing": true, //Feature control the processing indicator.
      "serverSide": true, //Feature control DataTables' server-side processing mode.
      "order": [], //Initial no order.

      // Load data for the table's content from an Ajax source
      "ajax": {
        "url": `${window.location.origin}/Examenes/Examenes/mostrar_datos_busqueda_avanzada/`,
        "type": "POST",
        "data": {
          "fecha_inicio" : fecha_inicio,
          "fecha_fin": fecha_fin,
          "nombre_busqueda": nombre_busqueda,
          "dni_busqueda": dni_busqueda,
        } 
      },

      //Set column definition initialisation properties.
      "columnDefs": [
        { 
          "targets": [ -1 ], //last column
          "orderable": false, //set not orderable
        },
        { 
          "targets": [ -2 ], //2 last column (photo)
          "orderable": false, //set not orderable
        },
      ],
    
      "lengthMenu": [[5,10, 25, 50], [5,10, 25, 50]],


      "destroy": true,
      "info":true,
      "sInfo":true,
      "language":{
        "lengthMenu": "Mostrar _MENU_ Registros por página",
        "sInfo":"Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
        "sInfoFiltered":   "(filtrado de un total de _MAX_ registros)",
        "infoEmpty": "No hay registros disponibles",
        "loadingRecords": "Cargando...",
        "processing":     "Procesando...",
        "search": "Busqueda rapida:",
        "zeroRecords":    "No se encontraron registros coincidentes",
        "paginate": {
          "next":       "Siguiente",
          "previous":   "Anterior"
        },         
      },

    });

    reload_table();

  });
});


$(document).ready(function() {
  $(document).on('click', '#registrar_datos_xxxxxxxxx', function(event) {
  event.preventDefault();
  $("#ocultar_iddddddd").show(800);
  $("#agregamos_fecha_hora").hide();
  $("#mostramos_datos_del_igv_total_subtotal").show(800);
  $("#mostramos_datos_desde_ajax").show(800);
  $("#ocultanos_parta_actualizar").show(800);
  $('#actualizar_registro_por_id_datos_generales')[0].reset();
  /* Act on the event */
  $('#sexo').prop('selectedIndex',0);
  $('#tipo_pago').prop('selectedIndex',0);
  // $("#agregar_detalle__por_paquete").selectmenu('refresh', true);
  $('#agregar_detalle__por_paquete').prop('selectedIndex',0);
  $("#cambio_nombre_boton").html("<i class='fas fa-check-circle'></i>&nbsp;Nuevo Registro");
  $(".evaristoescuderohuillcamascco").attr('Id', 'registrar_datos_generales');


});

});




function limpiar_campos() {

  $("#fecha_inicio").val("");
  $("#fecha_fin").val("");
  $("#nombre_busqueda").val("");
  $("#dni_busqueda").val("");
}


$(document).ready(function() {

    // body...
  /*   $.ajax({
          type: "POST",
          async:true,
          url: "<?php echo base_url().'Examenes/Examenes/cargar_paquete/' ?>",
          success: function(response)
          {
              $('.mostrararea select').html(response).fadeIn();
          }
  });*/

  //mostramos los datos de sexo
  $.ajax({
          type: "POST",
          async:true,
          url: window.location.href + "cargar_sexo/",
          success: function(response)
          {
              $('.mostrarsexo select').html(response).fadeIn();
          }
  });

  

  

});
function tipo_pago_() {
  // body...
    //mostramos tipo_pago
  $.ajax({
          type: "POST",
          async:true,
          url: window.location.href + "cargar_tipo_pago/",
          success: function(response)
          {
              $('.tipo_pago_xx select').html(response).fadeIn();
          }
  });

}
function tipocomprobante_id() {
// body...
  $.ajax({
          type: "POST",
          async:true,
          url: window.location.href + "tipocomprobante/",
          success: function(response)
          {
              $('.tipocomprobante_id select').html(response).fadeIn();
          }
  });
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
function categoria_tipo_exame_cargador() {
  // body...
    //mostramos tipo_pago
  $.ajax({
          type: "POST",
          async:true,
          url: window.location.href + "cargar_paquete_tipo_examen/",
          success: function(response)
          {
              $('.categoria_tipo_examen_id select').html(response).fadeIn();
          }
  });

}



setTimeout(function(){
  tipo_pago_();
  tipo_paquete_();
  tipocomprobante_id();
  categoria_tipo_exame_cargador();
});

$(document).ready(function() {

  //actualiozmos

    $(document).on('submit', '#actualizar_registro_por_id_datos_generales', function(event) {
      event.preventDefault();

      $.ajax({
          url: window.location.href + "actualizar_registro_via_ajax_update/",
        type: 'POST',
        //data: $("#actualizar_registro_por_id_datos_generales").serialize(),
        data:new FormData(this),  
        contentType:false,  
        processData:false, 
        statusCode:{
            400: function(xhr){

              var json = JSON.parse(xhr.responseText);
              if (json.error) {
                Swal.fire({
                    title: 'Lo siento mucho',
                    text: ""+json.error+"",
                    icon: 'warning',
                    showCancelButton: false,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'OK'
                  }).then((result) => {
                    if (result.value) {
                      
                    }
                  })

              }
              
            }
          }
      })
      .done(function(data) {
        console.log("success");
        var json = JSON.parse(data);
        Swal.fire({
              title: 'Muy bien..!!',
              text: ""+json.mensaje+"",
              icon: 'success',
              showCancelButton: false,
              confirmButtonColor: '#3085d6',
              cancelButtonColor: '#d33',
              confirmButtonText: 'ok...'
            }).then((result) => {
              if (result.value) {
                reload_table();
                
              }
            })
    
      })
      .fail(function(jqXHR, textStatus, errorThrown) {
        console.log("error");
        Swal.fire(
            'Oposs..',
            'Error el sistema, comunicate con el administrador...',
            'error'
          )
      })
      .always(function() {
        console.log("complete");
      });
      

      });


  //aqui termoina
  $(document).on('click', '#agregar_detalle_value', function(event) {
    event.preventDefault();
    /* Act on the event */
      var id_codigo = $("#examen_evaristo_id").val();
      var examen_idddd = $("#examen_idddd").val();
      if (examen_idddd == null || examen_idddd.length == 0 || /^\s+$/.test(examen_idddd) ) {
      Swal.fire(
          'Oposs!',
          'Primero Ingrese el tipo Exámen',
          'error'
        )
      return false;
      }

      


      
      $.ajax({
          url: window.location.href + "agregar_detalle_tipo_examen/",
        type: 'POST',
        dataType: 'json',
        data: {id_codigo:id_codigo},
      })
      .done(function(data) {
      var rowid = Math.random();
      var $sr = ($(".jdr1").length + 1);

      $("#evaristoescuderohuillcamascco tbody tr").each(function() {
          subtotal = $(this).find("td:eq(1)").text();
          if (subtotal == data.nombre) {
            Swal.fire({
                title: 'Verficar',
                text: "Ya esta en la lista de detalle",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
              }).then((result) => {
                if (result.isConfirmed) {
                  Swal.fire(
                    'Deleted!',
                    'Your file has been deleted.',
                    'success'
                  )

                  return false;
                }
              })
              $(this).closest("tr").remove();
          }

                                  
      });
  
        var $html =`<tr class="jdr1" id="` + rowid + `">
                      <td class="text-center"><input type="hidden" name="codigo[]" value="`+data.codigo+`" />` + data.codigo + `</span><input type="hidden" name="count[]" value="`+rowid+`"></td>'</td>
                      <td class="text-center validamos_campos"><input type="hidden" name="nombre_detalle[]" value="`+data.nombre+`" />`+data.nombre+`</td>
                      <td class="text-center"><input type="hidden" name="precio_detalle[]" value="`+data.precio+`" /><p>`+data.precio+`</p></td>
                      <td class="text-right"><button type='button' class='btn btn-remove-producto btn-danger '><i class='fas fa-times-circle'></i></button></td>
                      <input type='hidden' name='codigo[]' value='`+data.codigo+`'/>
                      <input type="hidden" name="categoria_detalle[]" value="`+data.id_categoria+`" />
                  </tr>`;
        $("#evaristoescuderohuillcamascco tbody").append($html); 
        $("#examen_idddd").val("");
        sumar();


      })
      .fail(function() {
        console.log("error");
      })
      .always(function() {
        console.log("complete");

      });
      
    
  });

  //remover el pedido
    $(document).on("click",".btn-remove-producto", function(){
      $(this).closest("tr").remove();
        sumar();
      
  });

  console.log("cargar lista paquete");

  $(document).on('change', '#agregar_detalle__por_paquete', function(event) {
    event.preventDefault();
    /* Act on the event */

    var id_codigo_xx = $("#agregar_detalle__por_paquete").val();
    $.ajax({
        url: window.location.href + "cargar_lista_paquete/",
      type: 'POST',
      // method:"POST",
      // dataType: 'json',
      data: {id_codigo_xx:id_codigo_xx},
    })
    .done(function(data) {
        var resultado = JSON.parse(data);
        var contenido = '';               
        $.each(resultado, function(index, value) {
          var rowid = Math.random();
          var $sr = ($(".jdr1").length + 1);
          contenido += `
                      <tr class="jdr1" id="` + rowid + `">  
                          <td class="text-center">
                            <input type="hidden" name="codigo[]" value="`+value.codigo+`" /><span>` + value.codigo + `</span>
                            <input type="hidden" name="count[]" value="`+rowid+`">
                          </td>
                          <td class="text-center"><input type="hidden" name="nombre_detalle[]" value="`+value.nombre+`" />`+value.nombre+`</td>
                          <input type="hidden" name="categoria_detalle[]" value="`+value.id_categoria+`" />
                      </tr>`;
          /**/                           
          });
      $("#evaristoescuderohuillcamascco_iddd tbody").html(contenido); 
      $(".olo").html(contenido);
      })
    .fail(function() {
      console.log("error");
    })
    .always(function() {
      console.log("complete");
    });

  });



  //aqui obtenemos el precio

  $(document).on('change', '#agregar_detalle__por_paquete', function(event) {
    event.preventDefault();
    /* Act on the event */

    var id_codigo_xx = $("#agregar_detalle__por_paquete").val();
    $.ajax({
        url: window.location.href + "cargar_lista_precio/",
      type: 'POST',
      dataType: 'json',
      data: {id_codigo_xx:id_codigo_xx},
    })
    .done(function(data) {
      
        $("#total_id_xx").text("S/."+ data.precio);
        $("input[name=total]").val(data.precio);
        
      })
    .fail(function() {
      console.log("error");
    })
    .always(function() {
      console.log("complete");
    });

  });
});













































































































  function sumar() {
    subtotal = 0;
    $("#evaristoescuderohuillcamascco tbody tr").each(function() {
      subtotal = subtotal + Number($(this).find("td:eq(2)").text());
    });
    $("input[name=subtotal]").val(subtotal.toFixed(2));
    $("#subtotal").text("S/."+ subtotal.toFixed(2));
    porcentaje = 18;//$("#igv").val();
    igv = subtotal * (porcentaje/100);
    $("#igv_id").text("S/."+ igv.toFixed(2));
    $("input[name=igv]").val(igv.toFixed(2));
    
    total = subtotal + igv;
    $("#total_id").text("S/."+ total.toFixed(2));
    $("input[name=total_datos]").val(total.toFixed(2));
      
}

$(document).ready(function() {
  $(document).on('submit', '#registrar_datos_generales', function(event) {
    event.preventDefault();
    /* Act on the event */


      var sexo = $("sexo").val();
      var agregar_detalle__por_paquete = $("agregar_detalle__por_paquete").val();
      var tipo_pago = $("tipo_pago").val();

      sexo = document.getElementById("sexo").selectedIndex;
      if( sexo == null || sexo == 0 ) {
          Swal.fire({
            title: 'Sexo',
            text: "Sleccione Sexo",
            icon: 'error',
            showCancelButton: false,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'ok'
          }).then((result) => {
            if (result.value) {
              
            }
          })
        return false;
      }
      
      tipo_pago = document.getElementById("tipo_pago").selectedIndex;
      if( tipo_pago == null || tipo_pago == 0 ) {
          Swal.fire({
            title: 'Tipo Pago',
            text: "Seleccione Tipo Pago",
            icon: 'error',
            showCancelButton: false,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'ok'
          }).then((result) => {
            if (result.value) {
              
            }
          })
        return false;
      }
      tipocomprobante = document.getElementById("tipocomprobante").selectedIndex;
      if( tipocomprobante == null || tipocomprobante == 0 ) {
          Swal.fire({
            title: 'Paquete',
            text: "Seleccione Tipo Comprobante",
            icon: 'error',
            showCancelButton: false,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'ok'
          }).then((result) => {
            if (result.value) {
              
            }
          }) 
        return false;
      }

    $.ajax({
      url: `${window.location.origin}/Examenes/Examenes/registrar_datos/`,
      type: 'POST',
      data:new FormData(this),  
      contentType:false,  
      processData:false,  
      statusCode: {
            400: function(xhr) {
                var json = JSON.parse(xhr.responseText);
                if (json.error) {
                    Swal.fire({
                        title: 'Lo siento mucho',
                        text: "" + json.error + "",
                        icon: 'error',
                        showCancelButton: false,
                        confirmButtonColor: '#3085d6',
                        cancelButtonColor: '#d33',
                        confirmButtonText: 'OK'
                    }).then((result) => {
                        if (result.value) {

                        }
                    })


                }

            }
        }

    })
    .done(function() {
      console.log("success");
        let timerInterval
      Swal.fire({
        // icon : 'warning',
        title: 'Registrando...',
        html: 'Nuevo registro <b> </b> en proceso espere.',
        timer: 3000,
        timerProgressBar: true,
        onBeforeOpen: () => {
          Swal.showLoading()
          timerInterval = setInterval(() => {
            const content = Swal.getContent()
            if (content) {
              const b = content.querySelector('b')
              if (b) {
                b.textContent = Swal.getTimerLeft()
              }
            }
          }, 100)
        },
        onClose: () => {
          clearInterval(timerInterval)
        }
      }).then((result) => {
        const Toast = Swal.mixin({
          toast: true,
          position: 'top-end',
          showConfirmButton: false,
          timer: 3000,
          timerProgressBar: true,
          didOpen: (toast) => {
            toast.addEventListener('mouseenter', Swal.stopTimer)
            toast.addEventListener('mouseleave', Swal.resumeTimer)
          }
        })

        Toast.fire({
          icon: 'success',
          title: 'Nuevo Registro agregado'
        })
          reload_table();
          //table.ajax.reload(null,false); 
          // table.ajax.reload();
        $('#registrar_datos_generales')[0].reset();  
        $('#collapseExample').collapse('hide').delay(1000);
        $("#general_poaquetes_id").hide(800);
        $("#mostramos_los_campos_agregar_uno_por_no").hide(800);
        $("#mostrar_paquete").hide(800);
        $("#mostrar_datos_paquetes").hide(800);
        $('#dvOcultar_iddd').hide();
        $("#agregar_nav_link").html("");

      })

    

      //alert("se registro de manera correcta");
    })
    .fail(function(jqXHR, textStatus, errorThrown) {
          console.log("error");
          if (jqXHR.status === 0) {
              const Toast = Swal.mixin({
                  toast: true,
                  position: 'top-end',
                  showConfirmButton: false,
                  timer: 3000,
                  timerProgressBar: true,
                  onOpen: (toast) => {
                      toast.addEventListener('mouseenter', Swal.stopTimer)
                      toast.addEventListener('mouseleave', Swal.resumeTimer)
                  }
              })

              Toast.fire({
                  icon: 'error',
                  title: 'No tienes Conexion a Internet: Verifique la red.'
              })

          } else if (jqXHR.status == 404) {
              const Toast = Swal.mixin({
                  toast: true,
                  position: 'top-end',
                  showConfirmButton: false,
                  timer: 3000,
                  timerProgressBar: true,
                  onOpen: (toast) => {
                      toast.addEventListener('mouseenter', Swal.stopTimer)
                      toast.addEventListener('mouseleave', Swal.resumeTimer)
                  }
              })

              Toast.fire({
                  icon: 'error',
                  title: 'Página solicitada no encontrada [404].'
              })

          } else if (jqXHR.status == 500) {
              const Toast = Swal.mixin({
                  toast: true,
                  position: 'top-end',
                  showConfirmButton: false,
                  timer: 3000,
                  timerProgressBar: true,
                  onOpen: (toast) => {
                      toast.addEventListener('mouseenter', Swal.stopTimer)
                      toast.addEventListener('mouseleave', Swal.resumeTimer)
                  }
              })

              Toast.fire({
                  icon: 'error',
                  title: 'Error interno del servidor [500].'
              })


          } else if (textStatus === 'parsererror') {

              const Toast = Swal.mixin({
                  toast: true,
                  position: 'top-end',
                  showConfirmButton: false,
                  timer: 3000,
                  timerProgressBar: true,
                  onOpen: (toast) => {
                      toast.addEventListener('mouseenter', Swal.stopTimer)
                      toast.addEventListener('mouseleave', Swal.resumeTimer)
                  }
              })

              Toast.fire({
                  icon: 'error',
                  title: 'El análisis JSON solicitado ha fallado'
              })

          } else if (textStatus === 'timeout') {

              const Toast = Swal.mixin({
                  toast: true,
                  position: 'top-end',
                  showConfirmButton: false,
                  timer: 3000,
                  timerProgressBar: true,
                  onOpen: (toast) => {
                      toast.addEventListener('mouseenter', Swal.stopTimer)
                      toast.addEventListener('mouseleave', Swal.resumeTimer)
                  }
              })

              Toast.fire({
                  icon: 'error',
                  title: 'Error de tiempo de espera.'
              })

          } else if (textStatus === 'abort') {

              const Toast = Swal.mixin({
                  toast: true,
                  position: 'top-end',
                  showConfirmButton: false,
                  timer: 3000,
                  timerProgressBar: true,
                  onOpen: (toast) => {
                      toast.addEventListener('mouseenter', Swal.stopTimer)
                      toast.addEventListener('mouseleave', Swal.resumeTimer)
                  }
              })

              Toast.fire({
                  icon: 'error',
                  title: 'Solicitud de Ajax abortada'
              })

          } else {

              const Toast = Swal.mixin({
                  toast: true,
                  position: 'top-end',
                  showConfirmButton: false,
                  timer: 3000,
                  timerProgressBar: true,
                  onOpen: (toast) => {
                      toast.addEventListener('mouseenter', Swal.stopTimer)
                      toast.addEventListener('mouseleave', Swal.resumeTimer)
                  }
              })

              Toast.fire({
                  icon: 'error',
                  title: 'Solicitud de Ajax abortada ' + jqXHR.responseText + ''
              })


          }
      })
    .always(function() {
      console.log("complete");
    });
    
  });


  
  $(document).on('submit', '#registrar_nuevo_proveedor_sunat', function(event) {
      event.preventDefault();
      /* Act on the event */

      var nruc = $("#usuario").val();
      if (nruc =="") {
        Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: 'Ingrese Ruc y precione "Enter"!',
            footer: '<a href>Si es un error comunicase con Área de Sistemas?</a>'
          })
        return false;
      }
      $.ajax({
          url: `${window.location.origin}Inventario/Proveedores/Nuevo_registro/`,
          type: 'POST',
          data:$("form").serialize(),
          statusCode: {
            400: function(xhr) {
                var json = JSON.parse(xhr.responseText);
                if (json.error) {
                    Swal.fire({
                        title: 'Lo siento mucho',
                        text: "" + json.error + "",
                        icon: 'error',
                        footer: '<a href>Si es un error comunicase con Área de Sistemas?</a>',
                        showCancelButton: false,
                        confirmButtonColor: '#3085d6',
                        cancelButtonColor: '#d33',
                        confirmButtonText: 'OK'
                    }).then((result) => {
                        if (result.value) {
                          $('#registrar_nuevo_proveedor_sunat')[0].reset();  
                          $("#usuario").val("");
                          $("#rucx").val("");
                          $("#direccionx").val("");
                          $("#txt_telefono").val("");
                          $("#usuarioxx").text("");
                          $("#rucxxx").text("");
                          $("#txt_telefonoxx").text("");
                          $("#direccionxxx").text("");
                              $("#nruc").val("");
                            $('.bd-example-modal-lgs').modal('hide')
                        }
                    })


                }

            }
        } 
      })
      .done(function() {
          console.log("success");
            Swal.fire({
                title: 'Muy bien',
                text: "Se registro de manera exitosa",
                icon: 'success',
                showCancelButton: false,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Muy bien!'
              }).then((result) => { 
                if (result.value) {
                  $('#registrar_nuevo_proveedor_sunat')[0].reset();  
                  $('.bd-example-modal-lgs').modal('hide')
                  $("#usuario").val("");
                  $("#rucx").val("");
                  $("#direccionx").val("");
                  $("#txt_telefono").val("");
                  $("#usuarioxx").text("");
                  $("#rucxxx").text("");
                  $("#txt_telefonoxx").text("");
                  $("#direccionxxx").text("");
                  $("#nruc").val("");
                
                  
                }
              })
      })
      .fail(function(jqXHR, textStatus, errorThrown) {
          console.log("error");
          if (jqXHR.status === 0) {
              const Toast = Swal.mixin({
                  toast: true,
                  position: 'top-end',
                  showConfirmButton: false,
                  timer: 3000,
                  timerProgressBar: true,
                  onOpen: (toast) => {
                      toast.addEventListener('mouseenter', Swal.stopTimer)
                      toast.addEventListener('mouseleave', Swal.resumeTimer)
                  }
              })

              Toast.fire({
                  icon: 'error',
                  title: 'No tienes Conexion a Internet: Verifique la red.'
              })

          } else if (jqXHR.status == 404) {
              const Toast = Swal.mixin({
                  toast: true,
                  position: 'top-end',
                  showConfirmButton: false,
                  timer: 3000,
                  timerProgressBar: true,
                  onOpen: (toast) => {
                      toast.addEventListener('mouseenter', Swal.stopTimer)
                      toast.addEventListener('mouseleave', Swal.resumeTimer)
                  }
              })

              Toast.fire({
                  icon: 'error',
                  title: 'Página solicitada no encontrada [404].'
              })

          } else if (jqXHR.status == 500) {
              const Toast = Swal.mixin({
                  toast: true,
                  position: 'top-end',
                  showConfirmButton: false,
                  timer: 3000,
                  timerProgressBar: true,
                  onOpen: (toast) => {
                      toast.addEventListener('mouseenter', Swal.stopTimer)
                      toast.addEventListener('mouseleave', Swal.resumeTimer)
                  }
              })

              Toast.fire({
                  icon: 'error',
                  title: 'Error interno del servidor [500].'
              })


          } else if (textStatus === 'parsererror') {

              const Toast = Swal.mixin({
                  toast: true,
                  position: 'top-end',
                  showConfirmButton: false,
                  timer: 3000,
                  timerProgressBar: true,
                  onOpen: (toast) => {
                      toast.addEventListener('mouseenter', Swal.stopTimer)
                      toast.addEventListener('mouseleave', Swal.resumeTimer)
                  }
              })

              Toast.fire({
                  icon: 'error',
                  title: 'El análisis JSON solicitado ha fallado'
              })

          } else if (textStatus === 'timeout') {

              const Toast = Swal.mixin({
                  toast: true,
                  position: 'top-end',
                  showConfirmButton: false,
                  timer: 3000,
                  timerProgressBar: true,
                  onOpen: (toast) => {
                      toast.addEventListener('mouseenter', Swal.stopTimer)
                      toast.addEventListener('mouseleave', Swal.resumeTimer)
                  }
              })

              Toast.fire({
                  icon: 'error',
                  title: 'Error de tiempo de espera.'
              })

          } else if (textStatus === 'abort') {

              const Toast = Swal.mixin({
                  toast: true,
                  position: 'top-end',
                  showConfirmButton: false,
                  timer: 3000,
                  timerProgressBar: true,
                  onOpen: (toast) => {
                      toast.addEventListener('mouseenter', Swal.stopTimer)
                      toast.addEventListener('mouseleave', Swal.resumeTimer)
                  }
              })

              Toast.fire({
                  icon: 'error',
                  title: 'Solicitud de Ajax abortada'
              })

          } else {

              const Toast = Swal.mixin({
                  toast: true,
                  position: 'top-end',
                  showConfirmButton: false,
                  timer: 3000,
                  timerProgressBar: true,
                  onOpen: (toast) => {
                      toast.addEventListener('mouseenter', Swal.stopTimer)
                      toast.addEventListener('mouseleave', Swal.resumeTimer)
                  }
              })

              Toast.fire({
                  icon: 'error',
                  title: 'Solicitud de Ajax abortada ' + jqXHR.responseText + ''
              })


          }
      })
      .always(function() {
          console.log("complete");
      });
      
  });


  $("#mostramos_datos_rdes").click(function(event) {
    /* Act on the event */
    event.preventDefault();

    $("#collapseExampdle").append(``);
  });

  $('.fantasmass').change(function(){
      let current_time = new Date();
      if(!$(this).prop('checked')){
          $('#dvOcultar').hide(800);
          $("#hora").val("");
          $("#mdate").val("");
          
      }else{
          $('#dvOcultar').show(800);
          $("#hora").val(`${current_time.getHours()}:${current_time.getMinutes()}`);
          $("#mdate").val(`${current_time.getFullYear()}-${current_time.getMonth()}-${current_time.getDate()}`);
      }
    
    })
  $(".fantasmasssss").change(function() {
    /* Act on the event */
    if(!$(this).prop('checked')){
          $('#dvOcultar_iddd').hide(800);
          
      }else{
          $('#dvOcultar_iddd').show(800);
          
      }
  });

  //ocultamos y mostramos los detalles de emporesa

  $(".evaristo_el_unico").change(function() {
    /* Act on the event */
    if(!$(this).prop('checked')){
          $('#agregamos_empresa_si_o_no').hide(800);
          $('#empresa_xxxxxxxxxxx').val("");
          $('#ruc_xxxx_empresa_xxx').val("");
      }else{
          $('#agregamos_empresa_si_o_no').show(800);
          
            
      }
  });

});

//eliminar
$(document).on('click', '.delete', function(){  
    var user_id = $(this).attr("id"); 
    var c_obj = $(this).parents("tr");
    if(Swal.fire({
      title: '¿Estás seguro?',
      text: "¡No podrás revertir esto!",
      icon: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      confirmButtonText: 'Yes, delete it!'
    }).then((result) => {
      if (result.value) {
        $.ajax({  
              url:`${window.location.origin}/Examenes/Examenes/Eliminar_detalle/`,  
              method:"POST",  
              data:{user_id:user_id},  
              success:function(data)  
              {  
                  //c_obj.remove();
                //ajax.reload(null,false);
                reload_table();
              }  
        }); 
        Swal.fire(
          'Eliminado!',
          'Su registro ha sido eliminado.',
          'success'
        )
      }
    }))

  {

  }
    else  
    {  
        return false;       
    }  
});  
function regresar_id() {
  $('#collapseExample').collapse('hide').delay(3000);
}
//mostramos y ocultamos los datos en general

$(document).ready(function() {

$("#customRadio1_xxxx").click(function(event) {

  /* Act on the event */
  event.preventDefault();
  //ocultamos los datos a mostrar
  $("#general_poaquetes_id").hide(800);
  $("#mostramos_los_campos_agregar_uno_por_no").hide(800);
  $("#mostramos_datos_pequenois").html(`
      <table class="table full-color-table full-info-table hover-table color-bordered-table info-bordered-table" id="evaristoescuderohuillcamascco_iddd" >
          <thead>
              <tr class="bg-dark text-white text-center">
                  <th>CODIGO</th>
                  <th>DESCRIPCIÓN</th>
                  
              </tr>
          </thead>
          <tbody>
              
          </tbody>
      </table>`);
  $("#mostramos_datos_paquetes_precios").html(`
    <table class="table color-bordered-table warning-bordered-table">
      <tbody>
          <tr>
              <td class="text-right"><b>Total:</b></td>
              <td class="text-right" id="total_id_xx">0.00 </td>
              <td width="105px"><input type="hidden" name="total"></td>
          </tr>
      </tbody>
  </table>`);
    $("#mostramos_datos_desde_ajax").empty("");
    $("#mostramos_datos_del_igv_total_subtotal").empty("");
  //$("#evaristoescuderohuillcamascco tr").empty();
  //mostramos los datos
  $("#mostrar_paquete").show(800);
  $("#mostrar_datos_paquetes").show(800);

  //resetarmos el select
  
  
  
  // var dataatos =  $(".evaristoescuderohuillcamascco").attr('Id', 'registrar_datos_generales');
  var pagos = $(".evaristoescuderohuillcamascco").attr('Id', 'registrar_datos_generales');
  if (!pagos) {
    //pago
      $('#tipo_pago').prop('selectedIndex',0);
    
  }else{
    //tipo paquete
      $('#agregar_detalle__por_paquete').prop('selectedIndex',0);
  }
  

});



$("#genewral_paquetes_idd").click(function(event) {
  /* Act on the event */
    event.preventDefault();
    //ocultamos los datos que se estan mostrando
    $("#mostrar_paquete").hide(800);
    $("#mostrar_datos_paquetes").hide(800);
  // $("#evaristoescuderohuillcamascco_iddd tr").empty();
    $("#mostramos_datos_desde_ajax").html(`
      <table class="table full-color-table full-info-table hover-table color-bordered-table info-bordered-table" id="evaristoescuderohuillcamascco" >
          <thead>
              <tr class="bg-dark text-white text-center">
                  <th>CODIGO</th>
                  <th>DESCRIPCIÓN</th>
                  <th>PRECIO</th>
                  <th>&nbsp;</th>
              </tr>
          </thead>
          <tbody>
              
          </tbody>
      </table>`);
    $("#mostramos_datos_del_igv_total_subtotal").html(`
    <table class="table color-bordered-table warning-bordered-table">
          <tbody>
              <tr>
                  <td class="text-right" width="105px"><b>Sub-Total</b></td>
                  <td class="text-right" id="subtotal">0.00 </td>

                  <td width="105px"><input type="hidden" name="subtotal"></td>
              </tr>
              <tr>
                  <td class="text-right"><b>I.G.V:</b></td>
                  <td class="text-right" id="igv_id">0.00 </td>
                  <td width="105px"><input type="hidden" name="igv"></td>
              </tr>
              <tr>
                  <td class="text-right"><b>Total:</b></td>
                  <td class="text-right" id="total_id">0.00 </td>
                  <td width="105px"><input type="hidden" name="total_datos"></td>
              </tr>
          </tbody>
      </table>`);
    $("#mostramos_datos_pequenois").empty("");
    $("#mostramos_datos_paquetes_precios").empty("");
  //mostramnos
  $("#general_poaquetes_id").show(800);
  $("#mostramos_los_campos_agregar_uno_por_no").show(800);

  //resetarmos el select
  //tipo paquete
  //pago
  var pagos = $(".evaristoescuderohuillcamascco").attr('Id', 'registrar_datos_generales');
  if (!pagos) {
      //pago
      $('#tipo_pago').prop('selectedIndex',0);
      //tipo paquete
      
  }else{
    $('#agregar_detalle__por_paquete').prop('selectedIndex',0);
  }
  
//  $('#tipo_pago').prop('selectedIndex',0);
});
});


function sendRequest(){
$.ajax({
  url: `${window.location.origin}/Examenes/Examenes/correlativo_numer_exmaen/`,
  success:
    function(result){ 
/* si es success mostramos resultados */
    // $('#register').val(result);
      $('#nro_edentificador_insert').val('000'+result);
      
  
  },
  complete: function() { 
/* solo una vez que la petición se completa (success o no success) 
  pedimos una nueva petición en 3 segundos */
      setTimeout(function(){
        sendRequest();
      }, 3000);
    }
  });
};

function sendRequest_codigo_unico(){
$.ajax({
  url: `${window.location.origin}/Examenes/Examenes/correlativo_numer_codigo_unico/`,
  success:
    function(result){ 
/* si es success mostramos resultados */
    // $('#register').val(result);
      $('#nro_valido_innomedic').val('INNOMED-00'+result);
      
      
  
  },
  complete: function() { 
/* solo una vez que la petición se completa (success o no success) 
  pedimos una nueva petición en 3 segundos */
      setTimeout(function(){
        sendRequest_codigo_unico();
      }, 3000);
    }
  });
};


function sendRequest_codigo_unico_validado(){
$.ajax({
  url: `${window.location.origin}/Examenes/Examenes/correlativo_numer_codigo_unico_id/`,
  success:
    function(result){ 
/* si es success mostramos resultados */
    // $('#register').val(result);
      $('#nro_valido_innomedic_codigo').val("INNOMED-00"+result+"");
      
      
  
  },
  complete: function() { 
/* solo una vez que la petición se completa (success o no success) 
  pedimos una nueva petición en 3 segundos */
      setTimeout(function(){
        sendRequest_codigo_unico_validado();
      }, 3000);
    }
  });
};




/* primera petición que echa a andar la maquinaria */
$(function() {
  sendRequest();
  sendRequest_codigo_unico();
  sendRequest_codigo_unico_validado();
});


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

function fileValidatiosn(obj){
var uploadFile = obj.files[0];


if (!window.FileReader) {
  alert('El navegador no soporta la lectura de archivos');
  return;
}

if (!(/\.(jpg|png|gif|pdf|jpge)$/i).test(uploadFile.name)) {
Swal.fire({
title: 'Files',
text: "El archivo a adjuntar no es una imagen solo acepta jpg|png|gif|jpg|pdf",
icon: 'warning',
showCancelButton: false,
confirmButtonColor: '#3085d6',
cancelButtonColor: '#d33',
confirmButtonText: 'ok'
}).then((result) => {
if (result.value) {
  var drEvent = $('#identity_picture').dropify();
    drEvent = drEvent.data('dropify');
    drEvent.resetPreview();
    drEvent.clearElement();
    drEvent.destroy();
    drEvent.init();
    $('.dropify#identity_picture').dropify({
    });
  // $("#user_image").val("");
}
})
  
}

/*  var uploadFile = obj.files[0];
var img = new Image();
img.onload = function ()
{
if (this.width.toFixed(0) != 600 && this.height.toFixed(0) != 600)
{
Swal.fire({
title: 'Files',
text: "La imagen debe ser de tamaño 600px por 600px.",
icon: 'warning',
showCancelButton: false,
confirmButtonColor: '#3085d6',
cancelButtonColor: '#d33',
confirmButtonText: 'ok'
}).then((result) => {
if (result.value) {
  
  
  var drEvent = $('#identity_picture').dropify();
    drEvent = drEvent.data('dropify');
    drEvent.resetPreview();
    drEvent.clearElement();
    drEvent.settings.defaultFile = publicpath_identity_picture;
    drEvent.destroy();
    drEvent.init();
    $('.dropify#identity_picture').dropify({
    defaultFile: publicpath_identity_picture,
    });
  // $("#user_image").val("");
}
})


}
};
img.src = URL.createObjectURL(uploadFile);
*/
                                      
} 



function edit_person(id)
{
//$('#registrar_historial_xx')[0].reset(); // reset form on modals
$('#registrar_datos_generales').trigger("reset");


//Ajax Load data from ajax
$.ajax({
    url : `${window.location.origin}/Examenes/Examenes/Obtener_registros/${id}`,
    type: "GET",
    dataType: "JSON",
    success: function(data)
    {
        $("#ocultanos_parta_actualizar").hide(800);
        $("#mostramos_datos_del_igv_total_subtotal").hide(800);
        $("#mostramos_datos_desde_ajax").hide(800);


        if (data.fecha_atencion=="" || data.fecha_atencion==null) {
          $("#agregamos_fecha_hora").hide(800);
        }else{
            $("#agregamos_fecha_hora").show();
        }

        $("#dvOcultar").hide(800);
        $("#ocultar_iddddddd").hide(800);
        $(".evaristoescuderohuillcamascco").attr('Id', 'actualizar_registro_por_id_datos_generales');
        $("#fecha_atencion_id").val(data.Id);
        $("#mdatex").val(data.fecha_atencion);
        $("#hora_atemncion_update").val(data.hora);
        // $("#idxx_actualizar").val(data.fecha_registro);
        $('#collapseExample').collapse('show').delay(3000);
        $("#dni_evaristo").val(data.dni);
        $("#nombres_completos").val(data.nombre);
        $("#apellido_paterno_x").val(data.apellido_paterno);
        $("#apellido_materno").val(data.apellido_materno);
        // $("#sexo option[value="+ data.id_sexo +"]").attr("selected",true).parent();
        $("#fecha_nacimiento").val(data.fecha_nacimiento);
        $("#correo_electronico").val(data.correo);
        $("#telefono_celular").val(data.telefono_celular);
        //$("#agregar_detalle__por_paquete option[value="+ data.id_paquete +"]").attr("selected",true).parent();
        //$("#tipo_pago option[value="+ data.id_pago +"]").attr("selected",true).parent();
        var selectRol = $("select#sexo");
        selectRol.val(data.id_sexo).attr("selected", "selected");
        //tipo pago
        //tipo_pago
        var selecttipopago = $("select#tipo_pago");
        selecttipopago.val(data.id_pago).attr("selected", "selected");
        // $("#tipo_pago  option[value="+ data.id_pago +"]").attr('selected', 'selected');
        //agregamos agregaer_detalle_por paquete

        //tiupo comromprante

        var selkecttipocomprobnate = $("select#tipocomprobante");
        selkecttipocomprobnate.val(data.tipocomprobante).attr("selected", "selected");

        var selecttipopaquete = $("select#agregar_detalle__por_paquete");
        selecttipopaquete.val(data.id_paquete).attr("selected", "selected");
        //$("#observacion").text(data.observacion);
        $("#observacion").attr("placeholder", "Ingrese observación ...........").val(data.observacion).focus().blur();
        $("#empresa_xxxxxxxxxxx").val(data.empresa);

        $("#ruc_xxxx_empresa_xxx").val(data.ruc);
        $("#nro_identificador_update").val(data.nro_identificador);
        $("#nro_identificador").val(data.nro_identificador);
        $("#min-date_update").val(data.fecha_atencion);
        

        if (data.boleta_pago=="" || data.boleta_pago==null) {
          datos_imagen = "boleta_no_borrarw.jpg";
        }else{
          datos_imagen = data.boleta_pago;
        }
        var imagenUrl = `${window.location.origin}/upload/boleta_cliente/${datos_imagen}`;
        var drEvent = $('#identity_picture').dropify(
        {
          defaultFile: imagenUrl
        });
        drEvent = drEvent.data('dropify');
        drEvent.resetPreview();
        drEvent.clearElement();
        drEvent.settings.defaultFile = imagenUrl;
        drEvent.destroy();
        drEvent.init();
        

        $("#cambio_nombre_boton").html("<i class='fas fa-check-circle'></i>&nbsp;Actualizar Registro");
        $("#agregar_nav_link").html(`<li class="nav-item"> <a  class="nav-link" id="registrar_datos_xxxxxxxxx"><span class="hidden-sm-up"></span> <span class="hidden-xs-down font-weight-bold btn-dark btn btn-rounded" ><i class="fas fa-plus-circle"></i>&nbsp;Agregar Nuevo</span></a> </li>`);

        //MOSTRAMOS LOS DETALLES DE LOS CAMPOS onchange="return limpiar_campos_de_todos()"

        //mostramos la fecha si exioste op no

        


    },
    error: function (jqXHR, textStatus, errorThrown)
    {
        Swal.fire({
        title: 'Lo siento mucho',
        text: "Ponte en contacto con el Área de TI",
        type: 'warning',
        showCancelButton: false,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Ok!(︶︿︶)!'
      }).then((result) => {
        if (result.value) {
          
        }
      })
    }
});




}

//registrar nuevo tipo pago

$(document).ready(function() {
$(document).on('submit', '#registrar_nuevo_tipo_pago', function(event) {
event.preventDefault();
/* Act on the event */
var nombre_tipo_pago = $("#nombre_tipo_pago").val();
if (nombre_tipo_pago=="" || nombre_tipo_pago==0) {
  return false;
}

$.ajax({
  url: `${window.location.origin}Examenes/Examenes/registrar_tipo_pago_ajax/`,
  type: 'POST',
  // dataType: 'default: Intelligent Guess (Other values: xml, json, script, or html)',
  data: $("#registrar_nuevo_tipo_pago").serialize(),
  statusCode:{
  400: function(xhr){
    var json = JSON.parse(xhr.responseText);
    if (json.error) {
      Swal.fire({
          title: 'Lo siento mucho',
          text: ""+json.error+"",
          icon: 'error',
          showCancelButton: false,
          confirmButtonColor: '#3085d6',
          cancelButtonColor: '#d33',
          confirmButtonText: 'OK'
        }).then((result) => {
          if (result.value) {
            
          }
        })

    }
    
  }
},
})
.done(function() {
  console.log("success");
    Swal.fire({
        icon: 'success',
        title: 'Muy bien!!',
        text: 'Registro Satisfactorio',
        
      })
      reload_table_tipo_pago();
      tipo_pago_();
})
.fail(function(jqXHR, textStatus, errorThrown) {
  console.log("error");
  Swal.fire({
    title: 'Lo siento mucho',
    text: "Ponte en contacto con el Área de TI",
    type: 'warning',
    showCancelButton: false,
    confirmButtonColor: '#3085d6',
    cancelButtonColor: '#d33',
    confirmButtonText: 'Ok!(︶︿︶)!'
  }).then((result) => {
    if (result.value) {
      
    }
  })
})
.always(function() {
  console.log("complete");
});

});

$(document).on('submit', '#actualizar_registro_por_id_tipo_pago', function(event) {
event.preventDefault();
/* Act on the event */
$.ajax({
  url: `${window.location.origin}Examenes/Examenes/actualizar_tipo_pago_idd/`,
  type: 'POST',
  // dataType: 'default: Intelligent Guess (Other values: xml, json, script, or html)',
  data: $("#actualizar_registro_por_id_tipo_pago").serialize(),
  statusCode:{
  400: function(xhr){
    var json = JSON.parse(xhr.responseText);
    if (json.error) {
      Swal.fire({
          title: 'Lo siento mucho',
          text: ""+json.error+"",
          icon: 'error',
          showCancelButton: false,
          confirmButtonColor: '#3085d6',
          cancelButtonColor: '#d33',
          confirmButtonText: 'OK'
        }).then((result) => {
          if (result.value) {
            $(".title_pago").text('Nuevo Tipo Pago');
            $(".denistorotovar").attr('id', 'registrar_nuevo_tipo_pago');
            $("#cambio_nomre_tipo_pago").html("<i class='fas fa-check-circle'></i>&nbsp;Nuevo Registro");
            $("#nombre_tipo_pago").val("");
            $("#agregar_id_tipo_pago").html("");
          }
        })

    }
    
  }
},
})
.done(function(data) {
  console.log("success");
    var json = JSON.parse(data);
      Swal.fire({
        title: 'Muy bien..!!',
        text: ""+json.mensaje+"",
        icon: 'success',
        showCancelButton: false,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'ok...'
      }).then((result) => {
        if (result.value) {
          reload_table_tipo_pago();
          tipo_pago_();
          $(".title_pago").text('Nuevo Tipo Pago');
          $(".denistorotovar").attr('id', 'registrar_nuevo_tipo_pago');
          $("#cambio_nomre_tipo_pago").html("<i class='fas fa-check-circle'></i>&nbsp;Nuevo Registro");
          $("#nombre_tipo_pago").val("");
          $("#agregar_id_tipo_pago").html("");
          
        }
      })
    
})
.fail(function(jqXHR, textStatus, errorThrown) {
  console.log("error");
  Swal.fire({
    title: 'Lo siento mucho',
    text: "Ponte en contacto con el Área de TI",
    type: 'warning',
    showCancelButton: false,
    confirmButtonColor: '#3085d6',
    cancelButtonColor: '#d33',
    confirmButtonText: 'Ok!(︶︿︶)!'
  }).then((result) => {
    if (result.value) {
      
    }
  })
})
.always(function() {
  console.log("complete");
});

});
//eliminamols



});

$(document).on('click', '.delete_tipo_pago', function(){  
    var user_idd = $(this).attr("id"); 
  // var c_obj = $(this).parents("tr");
    if(Swal.fire({
      title: '¿Estás seguro?',
      text: "¡No podrás revertir esto!",
      icon: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      confirmButtonText: 'Yes, delete it!'
    }).then((result) => {
      if (result.value) {
        $.ajax({  
              url:`${window.location.origin}/Examenes/Examenes/eliminar_datos_generales_tipo_pago/`,  
              method:"POST",  
              data:{user_idd:user_idd},  
              success:function(data)  
              {  
                reload_table_tipo_pago();
                tipo_pago_();
              }  
        }); 
        Swal.fire(
          'Eliminado!',
          'Su registro ha sido eliminado.',
          'success'
        )
      }
    }))

  {

  }
    else  
    {  
        return false;       
    }  
}); 
function actualizar_tipo_pago(id) {
// body...
$('#registrar_nuevo_tipo_pago').trigger("reset");

//Ajax Load data from ajax
$.ajax({
    url : `${window.location.origin}/Examenes/Examenes/Obtener_registros_tipo_pago/${id}`,
    type: "GET",
    dataType: "JSON",
    success: function(data)
    {
        
        $(".title_pago").text('Actualizar Tipo Pago');
        $(".denistorotovar").attr('id', 'actualizar_registro_por_id_tipo_pago');
        $("#nombre_tipo_pago").val(data.nombre);
        $("#agregar_id_tipo_pago").html("<input type='hidden' value='"+data.Id+"' name='id_tipo_pago_update'>");

        $("#cambio_nomre_tipo_pago").html("<i class='fas fa-check-circle'></i>&nbsp;Actualizar Registro");
    

        


    },
    error: function (jqXHR, textStatus, errorThrown)
    {
        Swal.fire({
        title: 'Lo siento mucho',
        text: "Ponte en contacto con el Área de TI",
        type: 'warning',
        showCancelButton: false,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Ok!(︶︿︶)!'
      }).then((result) => {
        if (result.value) {
          
        }
      })
    }
});

}


//registrar nuevo paquete              

$(document).ready(function() {
$(document).on('submit', '#registrar_nuevo_paquete', function(event) {
event.preventDefault();
/* Act on the event */
var nombre_tipo_pago = $("#nuevo_paquete").val();
var nuevo_precio = $("#nuevo_precio").val();
if (nombre_tipo_pago=="" || nombre_tipo_pago==0) {
  return false;
}

if (nuevo_precio=="" || nuevo_precio==0) {
  return false;
}

$.ajax({
  url: `${window.location.origin}Examenes/Examenes/registrar_paquete_ajax/`,
  type: 'POST',
  // dataType: 'default: Intelligent Guess (Other values: xml, json, script, or html)',
  data: $("#registrar_nuevo_paquete").serialize(),
  statusCode:{
  400: function(xhr){
    var json = JSON.parse(xhr.responseText);
    if (json.error) {
      Swal.fire({
          title: 'Lo siento mucho',
          text: ""+json.error+"",
          icon: 'error',
          showCancelButton: false,
          confirmButtonColor: '#3085d6',
          cancelButtonColor: '#d33',
          confirmButtonText: 'OK'
        }).then((result) => {
          if (result.value) {
            
          }
        })

    }
    
  }
},
})
.done(function() {
  console.log("success");
    Swal.fire({
        icon: 'success',
        title: 'Muy bien!!',
        text: 'Registro Satisfactorio',
        
      })
      reload_table_paquete();
      tipo_paquete_();
})
.fail(function(jqXHR, textStatus, errorThrown) {
  console.log("error");
  Swal.fire({
    title: 'Lo siento mucho',
    text: "Ponte en contacto con el Área de TI",
    type: 'warning',
    showCancelButton: false,
    confirmButtonColor: '#3085d6',
    cancelButtonColor: '#d33',
    confirmButtonText: 'Ok!(︶︿︶)!'
  }).then((result) => {
    if (result.value) {
      
    }
  })
})
.always(function() {
  console.log("complete");
});

});

$(document).on('submit', '#actualizar_registro_por_id_paquete', function(event) {
event.preventDefault();
/* Act on the event */
$.ajax({
  url: `${window.location.origin}Examenes/Examenes/actualizar_paquete_idd/`,
  type: 'POST',
  // dataType: 'default: Intelligent Guess (Other values: xml, json, script, or html)',
  data: $("#actualizar_registro_por_id_paquete").serialize(),
  statusCode:{
  400: function(xhr){
    var json = JSON.parse(xhr.responseText);
    if (json.error) {
      Swal.fire({
          title: 'Lo siento mucho',
          text: ""+json.error+"",
          icon: 'error',
          showCancelButton: false,
          confirmButtonColor: '#3085d6',
          cancelButtonColor: '#d33',
          confirmButtonText: 'OK'
        }).then((result) => {
          if (result.value) {
            $(".title_paquete").text('Nuevo Paquete');
            $(".denistorotovar_paquete").attr('id', 'registrar_nuevo_paquete');
            $("#cambio_nomre_paquete").html("<i class='fas fa-check-circle'></i>&nbsp;Nuevo Registro");
            $("#nuevo_paquete").val("");
            $("#nuevo_precio").val("");
            $("#agregar_id_paquete").html("");
              
          }
        })

    }
    
  }
},
})
.done(function(data) {
  console.log("success");
    var json = JSON.parse(data);
      Swal.fire({
        title: 'Muy bien..!!',
        text: ""+json.mensaje+"",
        icon: 'success',
        showCancelButton: false,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'ok...'
      }).then((result) => {
        if (result.value) {
          reload_table_paquete();
          tipo_pago_();
          $(".title_paquete").text('Nuevo Paquete');
          $(".denistorotovar_paquete").attr('id', 'registrar_nuevo_paquete');
          $("#cambio_nomre_paquete").html("<i class='fas fa-check-circle'></i>&nbsp;Nuevo Registro");
          $("#nuevo_paquete").val("");
          $("#nuevo_precio").val("");
          $("#agregar_id_paquete").html("");
          
        }
      })
    
})
.fail(function(jqXHR, textStatus, errorThrown) {
  console.log("error");
  Swal.fire({
    title: 'Lo siento mucho',
    text: "Ponte en contacto con el Área de TI",
    type: 'warning',
    showCancelButton: false,
    confirmButtonColor: '#3085d6',
    cancelButtonColor: '#d33',
    confirmButtonText: 'Ok!(︶︿︶)!'
  }).then((result) => {
    if (result.value) {
      
    }
  })
})
.always(function() {
  console.log("complete");
});

});
//eliminamols



});

$(document).on('click', '.delete_paquete', function(){  
    var user_idd = $(this).attr("id"); 
  // var c_obj = $(this).parents("tr");
    if(Swal.fire({
      title: '¿Estás seguro?',
      text: "¡No podrás revertir esto!",
      icon: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      confirmButtonText: 'Yes, delete it!'
    }).then((result) => {
      if (result.value) {
        $.ajax({  
              url:`${window.location.origin}/Examenes/Examenes/eliminar_datos_generales_paquete/`,  
              method:"POST",  
              data:{user_idd:user_idd},  
              success:function(data)  
              {  
                  reload_table_paquete();
                tipo_paquete_();
              }  
        }); 
        Swal.fire(
          'Eliminado!',
          'Su registro ha sido eliminado.',
          'success'
        )
      }
    }))

  {

  }
    else  
    {  
        return false;       
    }  
}); 
function actualizar_paquete(id) {
// body...
$('#registrar_nuevo_paquete').trigger("reset");

//Ajax Load data from ajax
$.ajax({
    url : `${window.location.origin}/Examenes/Examenes/Obtener_registros_paquete/${id}`,
    type: "GET",
    dataType: "JSON",
    success: function(data)
    {
        
        $(".title_paquete").text('Actualizar Paquete');
        $(".denistorotovar_paquete").attr('id', 'actualizar_registro_por_id_paquete');
        $("#nuevo_paquete").val(data.nombre);
        $("#nuevo_precio").val(data.precio);
        $("#agregar_id_paquete").html("<input type='hidden' value='"+data.Id+"' name='id_tipo_paquete_update'>");

        $("#cambio_nomre_paquete").html("<i class='fas fa-check-circle'></i>&nbsp;Actualizar Registro");
    

        


    },
    error: function (jqXHR, textStatus, errorThrown)
    {
        Swal.fire({
        title: 'Lo siento mucho',
        text: "Ponte en contacto con el Área de TI",
        type: 'warning',
        showCancelButton: false,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Ok!(︶︿︶)!'
      }).then((result) => {
        if (result.value) {
          
        }
      })
    }
});

}


//agreamos paquete por general

$(document).ready(function() {
// table = 
  // $(".agregamos_detalle").click(function(event) {
  $(document).on('click', '.agregamos_detalle', function(event) {
    /* Act on the event */
    event.preventDefault();
    var userda_data = $(this).attr("id"); 
    

    $('#table_paquete_general_asociar').DataTable({ 
  
    "processing": true, //Feature control the processing indicator.
    "serverSide": true, //Feature control DataTables' server-side processing mode.
    "order": [], //Initial no order.

    // Load data for the table's content from an Ajax source
    "ajax": {
        "url": `${window.location.origin}/Examenes/Examenes/agregamos_lista_paquetes/`,
        "type": "POST",
        //"deferRender": true,
        //"dataSrc": "",
        "data": {
              "userda_data": userda_data,
          }
    },



    //Set column definition initialisation properties.
  
    "columnDefs": [
            { 
                "targets": [ -1 ], //last column
                "orderable": false, //set not orderable
                "className": 'dt-body-right',
            },
            { 
                "targets": [ -2 ], //2 last column (photo)
                "orderable": false, //set not orderable
                "className": 'dt-body-right',
            },
        ],
    "lengthMenu": [[5,10, 25, 50], [5,10, 25, 50]],


    "destroy": true,
    "info":true,
    "sInfo":true,
    // "order": [[1, "desc"]],
    "language":{
    "lengthMenu": "Mostrar _MENU_ Registros por página",
    "sInfo":"Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
    "sInfoFiltered":   "(filtrado de un total de _MAX_ registros)",
    //"info": "Mostrando pagina _PAGE_ de _PAGES_",
    /* "oLanguage": {
          "sInfo": "Mostrando START a END de TOTAL registros",
          "sZeroRecords": "No se encontraron registros coincidentes" 
      },*/
    "infoEmpty": "No hay registros disponibles",
    //"infoFiltered": "(filtrada de _MAX_ registros)",
    "loadingRecords": "Cargando...",
    "processing":     "Procesando...",
    "search": "Busqueda rapida:",
    "zeroRecords":    "No se encontraron registros coincidentes",
    "paginate": {
      "next":       "Siguiente",
      "previous":   "Anterior"
    },         
  },

});
    $('.bd-example-modal-lg_asociar_paquetes').modal('show');
    $("#id_registrar_id_paquete").val(userda_data);
    
});

});


//registrar asociacion de paquetes en general           

$(document).ready(function() {
$(document).on('submit', '#registrar_tipo_paquete_asociado', function(event) {
event.preventDefault();
/* Act on the event */
var nombre_tipo_pago = $("#asociar_nombre").val();
var categoria_tipo_asociar = $("#categoria_tipo_asociar").val();  
if (nombre_tipo_pago=="" || nombre_tipo_pago==0) {
  return false;
}
if (categoria_tipo_asociar=="" || categoria_tipo_asociar==0) {
  Swal.fire(
      'Error!',
      'Seleccione Categoria',
      'error'
    )
  return false;
}

$.ajax({
  url: `${window.location.origin}Examenes/Examenes/registrar_tipo_paquete_asociado/`,
  type: 'POST',
  // dataType: 'default: Intelligent Guess (Other values: xml, json, script, or html)',
  data: $("#registrar_tipo_paquete_asociado").serialize(),
  statusCode:{
  400: function(xhr){
    var json = JSON.parse(xhr.responseText);
    if (json.error) {
      Swal.fire({
          title: 'Lo siento mucho',
          text: ""+json.error+"",
          icon: 'error',
          showCancelButton: false,
          confirmButtonColor: '#3085d6',
          cancelButtonColor: '#d33',
          confirmButtonText: 'OK'
        }).then((result) => {
          if (result.value) {
            
          }
        })

    }
    
  }
},
})
.done(function() {
  console.log("success");
    Swal.fire({
        icon: 'success',
        title: 'Muy bien!!',
        text: 'Registro Satisfactorio',
        
      })
      $("#asociar_nombre").val(""); 
      $('#categoria_tipo_asociar').prop('selectedIndex',0);
      reload_table_paquete_asociado();

    
})
.fail(function(jqXHR, textStatus, errorThrown) {
  console.log("error");
  Swal.fire({
    title: 'Lo siento mucho',
    text: "Ponte en contacto con el Área de TI",
    type: 'warning',
    showCancelButton: false,
    confirmButtonColor: '#3085d6',
    cancelButtonColor: '#d33',
    confirmButtonText: 'Ok!(︶︿︶)!'
  }).then((result) => {
    if (result.value) {
      
    }
  })
})
.always(function() {
  console.log("complete");
});

});

$(document).on('submit', '#actualizar_registro_por_id_paquete_asociado', function(event) {
event.preventDefault();
/* Act on the event */
$.ajax({
  url: `${window.location.origin}Examenes/Examenes/actualizar_paquete_idd_asociado/`,
  type: 'POST',
  // dataType: 'default: Intelligent Guess (Other values: xml, json, script, or html)',
  data: $("#actualizar_registro_por_id_paquete_asociado").serialize(),
  statusCode:{
  400: function(xhr){
    var json = JSON.parse(xhr.responseText);
    if (json.error) {
      Swal.fire({
          title: 'Lo siento mucho',
          text: ""+json.error+"",
          icon: 'error',
          showCancelButton: false,
          confirmButtonColor: '#3085d6',
          cancelButtonColor: '#d33',
          confirmButtonText: 'OK'
        }).then((result) => {
          if (result.value) {
          

            $(".title_paquete_asociado").text('Nuevo Paquete Asociado');
            $(".evaristo_eldulce").attr('id', 'registrar_tipo_paquete_asociado');
            $("#asociar_nombre").val("");
            $("#id_registrar_id_paquete_asociado").val("");
            $('#categoria_tipo_asociar').prop('selectedIndex',0);
            $("#cambio_nomre_paquete_asoaciado").html("<i class='fas fa-check-circle'></i>&nbsp;Nuevo Registro");
              
          }
        })

    }
    
  }
},
})
.done(function(data) {
  console.log("success");
    var json = JSON.parse(data);
      Swal.fire({
        title: 'Muy bien..!!',
        text: ""+json.mensaje+"",
        icon: 'success',
        showCancelButton: false,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'ok...'
      }).then((result) => {
        if (result.value) {
          reload_table_paquete_asociado();
            $(".title_paquete_asociado").text('Nuevo Paquete Asociado');
            $(".evaristo_eldulce").attr('id', 'registrar_tipo_paquete_asociado');
            $("#asociar_nombre").val("");
            $('#categoria_tipo_asociar').prop('selectedIndex',0);
            $("#id_registrar_id_paquete_asociado").val("");
            $("#cambio_nomre_paquete_asoaciado").html("<i class='fas fa-check-circle'></i>&nbsp;Nuevo Registro");
          
        }
      })
    
})
.fail(function(jqXHR, textStatus, errorThrown) {
  console.log("error");
  Swal.fire({
    title: 'Lo siento mucho',
    text: "Ponte en contacto con el Área de TI",
    type: 'warning',
    showCancelButton: false,
    confirmButtonColor: '#3085d6',
    cancelButtonColor: '#d33',
    confirmButtonText: 'Ok!(︶︿︶)!'
  }).then((result) => {
    if (result.value) {
      
    }
  })
})
.always(function() {
  console.log("complete");
});

});
//eliminamols



});

$(document).on('click', '.delete_paquete_asociado', function(){  
    var user_idd = $(this).attr("id"); 
  // var c_obj = $(this).parents("tr");
    if(Swal.fire({
      title: '¿Estás seguro?',
      text: "¡No podrás revertir esto!",
      icon: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      confirmButtonText: 'Yes, delete it!'
    }).then((result) => {
      if (result.value) {
        $.ajax({  
              url:`${window.location.origin}/Examenes/Examenes/eliminar_datos_generales_paquete_asociado/`,  
              method:"POST",  
              data:{user_idd:user_idd},  
              success:function(data)  
              {  
                  reload_table_paquete_asociado();
              }  
        }); 
        Swal.fire(
          'Eliminado!',
          'Su registro ha sido eliminado.',
          'success'
        )
      }
    }))

  {

  }
    else  
    {  
        return false;       
    }  
}); 

/****

***/
function actualizar_paquete_asociado(id) {
// body...
$('#registrar_tipo_paquete_asociado').trigger("reset");

//Ajax Load data from ajax
$.ajax({
    url : `${window.location.origin}/Examenes/Examenes/Obtener_registros_paquete_asociados/${id}`,
    type: "GET",
    dataType: "JSON",
    success: function(data)
    {
        
        $(".title_paquete_asociado").text('Actualizar Paquete Asociado');
        $(".evaristo_eldulce").attr('id', 'actualizar_registro_por_id_paquete_asociado');
        $("#asociar_nombre").val(data.nombre);
        $("#asociar_codigo").val(data.codigo);
        $("#id_registrar_id_paquete_asociado").val(data.Id);
          var tipo_categoria_xx = $("select#categoria_tipo_asociar");
          tipo_categoria_xx.val(data.id_categoria).attr("selected", "selected");
      

        $("#cambio_nomre_paquete_asoaciado").html("<i class='fas fa-check-circle'></i>&nbsp;Actualizar Registro");
    

        


    },
    error: function (jqXHR, textStatus, errorThrown)
    {
        Swal.fire({
        title: 'Lo siento mucho',
        text: "Ponte en contacto con el Área de TI",
        type: 'warning',
        showCancelButton: false,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Ok!(︶︿︶)!'
      }).then((result) => {
        if (result.value) {
          
        }
      })
    }
});

}



//tipo examen agregamnos detalles

$(document).ready(function() {
$(document).on('submit', '#registrar_tipo_exmaen', function(event) {
event.preventDefault();
/* Act on the event */
var nombre_examen_tipo = $("#nombre_examen_tipo").val();
var precio_tipo_examen = $("#precio_tipo_examen").val();
var categoria_tipo_examen = $("#categoria_tipo_examen").val();

if (nombre_examen_tipo=="" || nombre_examen_tipo==0) {
  return false;
}
if (precio_tipo_examen=="" || precio_tipo_examen==0) {
  return false;
}
if (categoria_tipo_examen=="" || categoria_tipo_examen==0) {
  Swal.fire(
      'Oposs!',
      'Seleccione Categoria',
      'error'
    )
  return false;
}

$.ajax({
  url: `${window.location.origin}Examenes/Examenes/registrar_tipo_examen_por_ajax/`,
  type: 'POST',
  // dataType: 'default: Intelligent Guess (Other values: xml, json, script, or html)',
  data: $("#registrar_tipo_exmaen").serialize(),
  statusCode:{
  400: function(xhr){
    var json = JSON.parse(xhr.responseText);
    if (json.error) {
      Swal.fire({
          title: 'Lo siento mucho',
          text: ""+json.error+"",
          icon: 'error',
          showCancelButton: false,
          confirmButtonColor: '#3085d6',
          cancelButtonColor: '#d33',
          confirmButtonText: 'OK'
        }).then((result) => {
          if (result.value) {
            
          }
        })

    }
    
  }
},
})
.done(function() {
  console.log("success");
    Swal.fire({
        icon: 'success',
        title: 'Muy bien!!',
        text: 'Registro Satisfactorio',
        
      })
      $("#nombre_examen_tipo").val("");
    $("#precio_tipo_examen").val("");
      table_paquete_general_examen_reload();

    
})
.fail(function(jqXHR, textStatus, errorThrown) {
  console.log("error");
  Swal.fire({
    title: 'Lo siento mucho',
    text: "Ponte en contacto con el Área de TI",
    type: 'warning',
    showCancelButton: false,
    confirmButtonColor: '#3085d6',
    cancelButtonColor: '#d33',
    confirmButtonText: 'Ok!(︶︿︶)!'
  }).then((result) => {
    if (result.value) {
      
    }
  })
})
.always(function() {
  console.log("complete");
});

});

$(document).on('submit', '#actualizar_registro_por_id_paquete_tipoexmaen', function(event) {
event.preventDefault();
/* Act on the event */
$.ajax({
  url: `${window.location.origin}Examenes/Examenes/actualizar_paquete_idd_tipoexamen/`,
  type: 'POST',
  // dataType: 'default: Intelligent Guess (Other values: xml, json, script, or html)',
  data: $("#actualizar_registro_por_id_paquete_tipoexmaen").serialize(),
  statusCode:{
  400: function(xhr){
    var json = JSON.parse(xhr.responseText);
    if (json.error) {
      Swal.fire({
          title: 'Lo siento mucho',
          text: ""+json.error+"",
          icon: 'error',
          showCancelButton: false,
          confirmButtonColor: '#3085d6',
          cancelButtonColor: '#d33',
          confirmButtonText: 'OK'
        }).then((result) => {
          if (result.value) {
          
            table_paquete_general_examen_reload();
            $(".title_paquete_tipoexamen").text('Nuevo Tipo Exámen');
            $(".evaristo_eldulce_escudero").attr('id', 'registrar_tipo_paquete_asociado');
            $("#nombre_examen_tipo").val("");
            $("#precio_tipo_examen").val("");
            $('#categoria_tipo_examen').prop('selectedIndex',0);
            $("#id_registrar_id_tipopexamen").val("");
            $("#cambio_nomre_paquete_asoaciado_escudero").html("<i class='fas fa-check-circle'></i>&nbsp;Nuevo Registro");
              
          }
        })

    }
    
  }
},
})
.done(function(data) {
  console.log("success");
    var json = JSON.parse(data);
      Swal.fire({
        title: 'Muy bien..!!',
        text: ""+json.mensaje+"",
        icon: 'success',
        showCancelButton: false,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'ok...'
      }).then((result) => {
        if (result.value) {
            table_paquete_general_examen_reload();
            $(".title_paquete_tipoexamen").text('Nuevo Tipo Exámen');
            $(".evaristo_eldulce_escudero").attr('id', 'registrar_tipo_paquete_asociado');
            $("#nombre_examen_tipo").val("");
            $("#precio_tipo_examen").val("");
            $('#categoria_tipo_examen').prop('selectedIndex',0);
            $("#id_registrar_id_tipopexamen").val("");
            $("#cambio_nomre_paquete_asoaciado_escudero").html("<i class='fas fa-check-circle'></i>&nbsp;Nuevo Registro");
          
        }
      })
    
})
.fail(function(jqXHR, textStatus, errorThrown) {
  console.log("error");
  Swal.fire({
    title: 'Lo siento mucho',
    text: "Ponte en contacto con el Área de TI",
    type: 'warning',
    showCancelButton: false,
    confirmButtonColor: '#3085d6',
    cancelButtonColor: '#d33',
    confirmButtonText: 'Ok!(︶︿︶)!'
  }).then((result) => {
    if (result.value) {
      
    }
  })
})
.always(function() {
  console.log("complete");
});

});
//eliminamols



});

function actualizar_tipoexamen(id) {
// body...
$('#registrar_tipo_exmaen').trigger("reset");

  //Ajax Load data from ajax
  $.ajax({
      url : `${window.localStorage.origin}/Examenes/Examenes/Obtener_registros_tipo_exmaen/${id}`,
      type: "GET",
      dataType: "JSON",
      success: function(data)
      {
          
          $(".title_paquete_tipoexamen").text('Actualizar Tipo Exámen');
          $(".evaristo_eldulce_escudero").attr('id', 'actualizar_registro_por_id_paquete_tipoexmaen');
          $("#nombre_examen_tipo").val(data.nombre);
          $("#precio_tipo_examen").val(data.precio);
          $("#id_registrar_id_tipopexamen").val(data.Id);
          $("#cambio_nomre_paquete_asoaciado_escudero").html("<i class='fas fa-check-circle'></i>&nbsp;Actualizar Registro");

          var tipo_categoria = $("select#categoria_tipo_examen");
          tipo_categoria.val(data.id_categoria).attr("selected", "selected");
      

          


      },
      error: function (jqXHR, textStatus, errorThrown)
      {
          Swal.fire({
          title: 'Lo siento mucho',
          text: "Ponte en contacto con el Área de TI",
          type: 'warning',
          showCancelButton: false,
          confirmButtonColor: '#3085d6',
          cancelButtonColor: '#d33',
          confirmButtonText: 'Ok!(︶︿︶)!'
        }).then((result) => {
          if (result.value) {
            
          }
        })
      }
  });

}


$(document).on('click', '.delete_tipoexamen_xx', function(){  
    var user_idd = $(this).attr("id"); 
  // var c_obj = $(this).parents("tr");
    if(Swal.fire({
      title: '¿Estás seguro?',
      text: "¡No podrás revertir esto!",
      icon: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      confirmButtonText: 'Yes, delete it!'
    }).then((result) => {
      if (result.value) {
        $.ajax({  
              url:`${window.localStorage.origin}/Examenes/Examenes/eliminar_datos_generales_paquete_tipoexamen/`,  
              method:"POST",  
              data:{user_idd:user_idd},  
              success:function(data)  
              {  
                  table_paquete_general_examen_reload();
              }  
        }); 
        Swal.fire(
          'Eliminado!',
          'Su registro ha sido eliminado.',
          'success'
        )
      }
    }))

  {

  }
    else  
    {  
        return false;       
    }  
}); 
$(document).ready(function() {
  $(document).on('click', '.detalle_info_print', function(event) {
    event.preventDefault();
    /* Act on the event */
    var user_id = $(this).attr("id");
    $.ajax({
      url: `${window.location.origin}Examenes/Examenes/mostrar_datos_a_imprimir/`,
      type: 'POST',
      dataType: "JSON",
      data: {user_id:user_id},
    })
    .done(function(data) {
      console.log("success");
      // var json = JSON.parse(data);
      $(".bd-example-modal-xl_view").modal("show");
      $("#numero_identificador").text('CONTROL DE ATENCIONES DE SALUD N°  '+data.nro_identificador+' (Hoja de ruta)');

      $("#numero_historia").text('Historia Nº-'+data.nro_identificador+'');
      $("#dni_view").text(data.dni);
      $("#fecha_nacimiento_view").text(data.fecha_nacimiento);
      $("#edad_view").text(data.edad);
      $("#nombres_view").text(data.nombre);
      $("#apellido_paterno_view").text(data.apellido_paterno);
      $("#apellido_amterno_view").text(data.apellido_materno);
      $("#genero_view").text(data.genero);
      $("#correo_view").text(data.correo);
      $("#telefono_celular_view").text(data.telefono_celular);
      
      $()
      
      if (data.fecha_atencion=="" || data.fecha_atencion==null) {
        data_fecha = data.fecha_registro;
      }else{
        data_fecha = data.fecha_atencion;
      }
      $("#fecha_view").text(data_fecha);
      $("#fecha_view1").text(data_fecha);

      //datos de la empresa a mostrar

      if (data.empresa=="" || data.empresa ==null) {
          data_empresa = `<br>`;
          data_mnessaje =`acepto que la Clinica Ocupacional <strong>INNOMEDIC INTERNATIONAL E.I.R.L,</strong>`;
      }else{
        data_empresa = `<br><div class="row" style="border: 2px solid #000000; border-radius: 3px;">
          <div class="col-md-12">
            
          
            <table style="width: 100%">
              <tbody>
                <tr>
                  <td style="width: 20%" class="font-weight-bold">Datos de la Empresa:</td>
                  
                </tr>

                <tbody>
            </table>
            <hr style="border: 1px solid #000000">
            <table style="border-collapse: collapse; width: 100%;border-spacing:  3px" border="0">
                  <tbody>
                  
                  <tr>
                  <td style="width: 70%;" class="font-weight-bold">Razón Social:&nbsp;<span class="font-weight-normal">`+data.empresa+`</span></td>
                  <td style="width: 30%;"  class="font-weight-bold">RUC:&nbsp;<span  class="font-weight-normal">`+data.ruc+`</span></td>

          
                  </tr>
        
                  </tbody>
            </table>
            </div>
        </div><br>`;
        data_mnessaje =`acepto que la empresa <strong>`+data.empresa+`</strong> mediante la Clinica Ocupacional <strong>INNOMEDIC INTERNATIONAL E.I.R.L,</strong>`;
      }

        $("#aceptacion_view").html(data_mnessaje);

      $("#mostramos_datos").html(data_empresa);
      $("#nombres_completos_view").text(data.nombre+" "+data.apellido_paterno+" "+data.apellido_materno);
      $("#dni_view_id").text(data.dni);


      //Impresion 2

      $("#numero_identificador1").text('CONTROL DE ATENCIONES DE SALUD N°  '+data.nro_identificador+' (Hoja de ruta)');
      $("#numero_historia1").text('Historia Nº-'+data.nro_identificador+'');

      $("#dni_view1").text(data.dni);
      $("#fecha_nacimiento_view1").text(data.fecha_nacimiento);
      $("#edad_view1").text(data.edad);
      $("#nombres_view1").text(data.nombre);
      $("#apellido_paterno_view1").text(data.apellido_paterno);
      $("#apellido_amterno_view1").text(data.apellido_materno);
      $("#genero_view1").text(data.genero);
      $("#correo_view1").text(data.correo);
      $("#telefono_celular_view1").text(data.telefono_celular);

    


      


      
      
      
    })
    .fail(function() {
      console.log("error");
    })
    .always(function() {
      console.log("complete");
    });
    

  });

  $(document).on('click', '.detalle_info_print', function(event) {
    event.preventDefault();
    /* Act on the event */
    var user_id = $(this).attr("id");
    $.ajax({
      url: `${window.location.origin}Examenes/Examenes/mostrar_datos_a_imprimir_detalles/`,
      type: 'POST',
      // dataType: "JSON",
      data: {user_id:user_id},
    })
    .done(function(data) {
      //console.log("success");

        var resultado = JSON.parse(data);
        var contenido = '';               
        $.each(resultado, function(index, value) {
            var $srx = ($(".jdr1s").length += 1);
          contenido += `<tr>
                          <td class="jdr1">`+ $srx+ `</td>
                          <td>`+value.descripcion+`</td>
                          <td></td>
                          <td></td>
                          <td></td>
                      </tr>`;
          /**/
          })
      $("#registrodetalle tbody").html(contenido); 

    })
    .fail(function() {
      console.log("error");
    })
    .always(function() {
      console.log("complete");
    });
    

  });

  //detalle por laboratorio


  $(document).on('click', '.detalle_info_print', function(event) {
    event.preventDefault();
    /* Act on the event */
    var user_id = $(this).attr("id");
    $.ajax({
      url: `${window.location.origin}Examenes/Examenes/mostrar_datos_a_imprimir_detalles_laboratorio/`,
      type: 'POST',
      // dataType: "JSON",
      data: {user_id:user_id},
    })
    .done(function(data) {
      //console.log("success");

        var resultado = JSON.parse(data);
        var contenido = '';               
        $.each(resultado, function(index, value) {
            var $srx = ($(".jdr1s").length += 1);
          contenido += `<tr>
                          <td class="jdr1">`+ $srx+ `</td>
                          <td>`+value.descripcion+`</td>
                          <td></td>
                          <td></td>
                          <td></td>
                      </tr>`;
          /**/
          })
      $("#registrodetalle_cstegoria tbody").html(contenido); 

    })
    .fail(function() {
      console.log("error");
    })
    .always(function() {
      console.log("complete");
    });
    

  });

  // Para activar el checkbox de paquetes como predeterminado
  document.getElementById("customRadio1_xxxx").click();
}); 

// Para activar el checkbox de paquetes como rpedeterminado siempre que se quiere agregar un examen
$("#add_exam_trigger").click(function(event) {
  document.getElementById("customRadio1_xxxx").click();    
});




/*
-------------------------------------------------------------------------------------
FORMS
-------------------------------------------------------------------------------------
*/

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

















console.log("end without problems");

