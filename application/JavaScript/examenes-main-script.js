  console.log("scripte externooooo");
  console.log($('#table_tipo_pago'));

  
  
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
        "url": window.location.origin + "/intranet.innomedic.pe" + "/Examenes/Examenes/mostrar_datos_busqueda_avanzada/",
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
          url: window.location.origin + "/intranet.innomedic.pe" + "/Examenes/Examenes/cargar_paquete/",
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
