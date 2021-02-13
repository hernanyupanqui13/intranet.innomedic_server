
<div class="row">
    <div class="col-md-12"> 
        <div class="card">
            <div class="card-body">
           <!-- <button type="button" class="btn btn-info btn-rounded m-t-10 float-right" data-toggle="modal" data-target="#staticBackdrop">Agregar Nuevo Paciente</button>-->
               <a href="javascript:void(0)" class="btn btn-info btn-rounded m-t-10 float-right" onclick="myFunction()"><i class="fas fa-plus-circle"></i>&nbsp;Agregar Nuevo Descripcion</a>
                    <!-- Add Contact Popup Model -->
                   <button class="btn btn-success btn-rounded" onclick="reload_table()" type="button"><span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>Reloading...</button>

               <h4 class="card-title">Registro de Descripcion</h4>
                <h6 class="card-subtitle">Registro de Descripcion - Unidad Medida</h6>
              <!--  <button class="btn btn-success" onclick="add_person()"><i class="glyphicon glyphicon-plus"></i> Add Person</button>-->
                   
                <div class="table-responsive">
                    <table id="the_table" class="table  table-bordered table-striped" >
                        <thead>
                            <tr> 
                                <th>#</th>
                                <th>Descripcion</th>
                                <th>Fecha</th>
                                <th>Estado</th>
                                <th style="width:150px;">Opción</th>
                            </tr>
                        </thead>
                        <tbody>
                        </tbody>

                        <tfoot> 
                        <tr>
                            <th>#</th>
                            <th>Descripción</th>
                            <th>Fecha</th>
                            <th>Estado</th>
                            <th>Opción</th>
                        </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<!--agregar-->
<div class="modal fade bd-example-modal-lgsd" id="staticBackdrop_xx" data-backdrop="static" data-keyboard="false"  role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog ">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title text-center"  id="exampleModalLabel">Agregar de nuevo Descripción </h3>                           
            </div>
            <div class="modal-body">
                <form autocomplete="on" method="post" id="registrar_historial_xx_registrar" class="form-horizontal form-material" autocomplete="off">
                    <div class="row">
                    
                    <div class="col-md-12 m-b-20">
                        <textarea name="descripcion" id="descripcionx" cols="30" rows="10" class="form-control" placeholder="Descripcion de Unidad medida" onkeypress="return sololetrasnumeros(event)"></textarea>
                    </div>

                    </div>
                    <div class="row text-center">
                        <div class="col-md-12">
                            <div class="form-actions">
                               <input type="hidden" value="" name="id"/> 
                                <button type="submit" class="btn btn-success btn-rounded" id="btnSave_x"> <i class="fas fa-sign-in-alt"></i> Agregar</button>
                                <button type="button" data-dismiss="modal" class="btn btn-danger btn-rounded"><i class="fa fa-times-circle"></i>&nbsp;Cancelar</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>






<!--actuiasliza-->


<div class="modal fade bd-example-modal-lgsd_xx" id="staticBackdrop" data-backdrop="static" data-keyboard="false"  role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog ">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title text-center" id="exampleModalLabel">Registro de nuevo Paciente </h3>                           
            </div>
            <div class="modal-body">
                <form autocomplete="on" method="post" id="registrar_historial_xx" class="form-horizontal form-material">         
                    <div class="row">
                        
                        <div class="col-md-12 m-b-20">
                            <textarea name="descripcionx" id="descripcionxc" cols="30" rows="10" class="form-control" placeholder="Descripcion de Unidad medida" onkeypress="return sololetrasnumeros(event)"></textarea>
                        </div>

                    </div>
                    <div class="row text-center">
                        <div class="col-md-12">
                            <div class="form-actions">
                               <input type="hidden" value="" name="idxx"/> 
                                <button type="submit" class="btn btn-success btn-rounded" id="btnSave"> <i class="fas fa-sign-in-alt"></i> Agregar</button>
                                <button type="button" data-dismiss="modal" class="btn btn-danger btn-rounded"><i class="fa fa-times-circle"></i>&nbsp;Cancelar</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script> 
<script>
    var save_method; //for save method string
    var table;
  //  var base_url = '<?php echo base_url();?>';

  $(document).ready(function() {

    //datatables
    table = $('#the_table').DataTable({ 

        "processing": true, //Feature control the processing indicator.
        "serverSide": true, //Feature control DataTables' server-side processing mode.
        "order": [], //Initial no order.

        // Load data for the table's content from an Ajax source
        "ajax": {
            "url": "<?php echo site_url('Mantenimiento/Pedidos/ajax_list/')?>",
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

        "destroy": true,
       // "order": [[1, "desc"]],
        "language":{
        "lengthMenu": "Mostrar _MENU_ Registros por página",
        "info": "Mostrando pagina _PAGE_ de _PAGES_",
        "infoEmpty": "No hay registros disponibles",
        "infoFiltered": "(filtrada de _MAX_ registros)",
        "loadingRecords": "Cargando...",
       // "processing":     "Procesando...",
        "search": "Buscar:",
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
        table.ajax.reload(null,false); //reload datatable ajax 
    }

    function myFunction()
    {
        save_method = 'add';
        $('#registrar_historial_xx_registrar')[0].reset(); // reset form on modals
        $(this).closest('form').trigger("reset");
        $('#staticBackdrop_xx').modal('show'); // show bootstrap modal
        $('.modal-title').text('Agregar de nuevo Descripción'); // Set Title to Bootstrap modal title
        $('#btnSave_x').html('<i class="fas fa-sign-in-alt"></i> Agregar'); //change button text

        $('#btnSave_x').attr('disabled',false);

    }

    function edit_person(id)
    {
        //$('#registrar_historial_xx')[0].reset(); // reset form on modals
        $('#registrar_historial_xx').trigger("reset");
        $("#labelx").removeClass('active');
        $("#labelx1").removeClass('active');
        $("#labelx2").removeClass('active');
        $(this).closest('form').trigger("reset");
  
        $('#btnSave').html('<i class="fas fa-sign-in-alt"></i> Actualizar'); //change button text
        $('#btnSave').attr('disabled',false);
    
        //Ajax Load data from ajax
        $.ajax({
            url : "<?php echo base_url().'Mantenimiento/Pedidos/Obtener_descripcion_unidad_medida/';?>" + id,
            type: "GET",
            dataType: "JSON",
            success: function(data)
            {

                $('[name="idxx"]').val(data.Id);

               // $("#id_unidad_medidax option[value="+ data.id_unidad_medida +"]").attr("selected",true).parent().select2();;
                //$('#id_unidad_medidaxxxx option').filter('option[value="'+data.id_unidad_medida+'"]').attr('selected');
                //$('[name="id_unidad_medidaxxxx option"]').filter('[value="'+data.id_unidad_medida+'"]').attr('selected');
                $('[name="descripcionx"]').val(data.descripcion);
                $('#staticBackdrop').modal('show'); // show bootstrap modal when complete loaded
                $('.modal-title').html('<small >Actualizar datos de <b class="label label-success">'+data.unidad_medidaxx+'</b></small>'); // Set title to Bootstrap modal title
                //$('#ocultar_update').hide();

                

            },
            error: function (jqXHR, textStatus, errorThrown)
            {
               Swal.fire({
                title: 'Lo siento mucho',
                text: "Ponte en contacto con el administrador",
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



   


</script>

<script>
    //registrar
    $(document).ready(function(){
        
        $(document).on('submit', '#registrar_historial_xx_registrar', function(event){  
           event.preventDefault();  

           // var codigo_id = $("#id_unidad_medida").val();
            var observaciones = $("#descripcionx").val();


          $('#btnSave_x').html('<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> Guardando....'); //change button text
           $('#btnSave_x').attr('disabled',true); //set button disable 

             /*  if (codigo_id == null || codigo_id.length == 0 || /^\s+$/.test(codigo_id) ) {
                    Swal.fire({
                      title: 'Unidad Medida',
                      text: "Seleccione Unidad Medida",
                      icon: 'error',
                      showCancelButton: false,
                      confirmButtonColor: '#3085d6',
                      cancelButtonColor: '#d33',
                      confirmButtonText: 'ok'
                    }).then((result) => {
                      if (result.value) {
                         $('#btnSave_x').html('<i class="fas fa-sign-in-alt"></i> Agregar');
                         $('#btnSave_x').attr('disabled',false); //set button enable 
                      }
                    })
                return false;
               }
*/

               //observaciones
               if (observaciones== null || observaciones.length == 0 || /^\s+$/.test(observaciones)) {
                    Swal.fire({
                      title: 'Descripcion',
                      text: "Ingrese Descripcion",
                      icon: 'error',
                      showCancelButton: false,
                      confirmButtonColor: '#3085d6',
                      cancelButtonColor: '#d33',
                      confirmButtonText: 'ok'
                    }).then((result) => {
                      if (result.value) {
                         $('#btnSave_x').html('<i class="fas fa-sign-in-alt"></i> Agregar');
                         $('#btnSave_x').attr('disabled',false); //set button enable 
                      }
                    })
                    return false;
               }else if(observaciones.length>=500){
                    Swal.fire({
                      title: 'Descripcion',
                      text: "En Descripcion no puedes ingresar mas de 500 caracteres",
                      icon: 'error',
                      showCancelButton: false,
                      confirmButtonColor: '#3085d6',
                      cancelButtonColor: '#d33',
                      confirmButtonText: 'ok'
                    }).then((result) => {
                      if (result.value) {
                         $('#btnSave_x').html('<i class="fas fa-sign-in-alt"></i> Agregar');
                         $('#btnSave_x').attr('disabled',false); //set button enable 
                      }
                    })
                    return false;
               }


            $.ajax({  
                 url:"<?php echo base_url().'Mantenimiento/Pedidos/Registrar_descripcion_unidad_medidia/';?>",
                 method:'POST',  
                 data:new FormData(this),  
                 contentType:false,  
                 processData:false,  
                 success:function(data)  
                 {  
                    var json = JSON.parse(data);
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
                          icon: 'success',
                          title: ''+json.mensaje+''
                        })  
                      $('#registrar_historial_xx_registrar')[0].reset();  
                      $('.bd-example-modal-lgsd').modal('hide');   
                      reload_table();
                      $('#btnSave_x').html('<i class="fas fa-sign-in-alt"></i> Agregar');
                      $('#btnSave_x').attr('disabled',false); //set button enable 
                   
                     
                 },statusCode:{
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
                            $('#btnSave_x').html('<i class="fas fa-circle-notch"></i> Reintentar'); //change button text
                            $('#btnSave_x').attr('disabled',false);
                         /* $("#alert").html('<div class="alert alert-success text-center" id="alerta" role="alert">'+json.alerta+'</div>'); */
                        }
                        
                      },
                    error: function(jqXHR, textStatus, errorThrown)
                                         {
                               Swal.fire({
                                title: 'Lo siento mucho',
                                text: "Algo paso con el sistema Vuelva a intentar una vez mas",
                                icon: 'warning',
                                showCancelButton: false,
                                confirmButtonColor: '#3085d6',
                                cancelButtonColor: '#d33',
                                confirmButtonText: 'Ok!(︶︿︶)!'
                              }).then((result) => {
                                if (result.value) {
                                 
                                }
                              })
                          }
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
                     url:"<?php echo base_url().'Examenes/Examenes/Eliminar_detalle/';?>",  
                     method:"POST",  
                     data:{user_id:user_id},  
                     success:function(data)  
                     {  
                         c_obj.remove();
                         table.ajax.reload();  
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


      //actualizar
        $(document).on('submit', '#registrar_historial_xx', function(event){  
           event.preventDefault();  
         //  var codigo_id = $("#id_unidad_medidax").val();
           var observaciones = $("#descripcionxc").val();
         

           $('#btnSave').html('<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> Actualizando....'); //change button text
           $('#btnSave').attr('disabled',true); //set button disable 
          /* if (codigo_id == null || codigo_id.length == 0 || /^\s+$/.test(codigo_id) ) {
                    Swal.fire({
                      title: 'Unidad Medida',
                      text: "Seleccione Unidad Medida",
                      icon: 'error',
                      showCancelButton: false,
                      confirmButtonColor: '#3085d6',
                      cancelButtonColor: '#d33',
                      confirmButtonText: 'ok'
                    }).then((result) => {
                      if (result.value) {
                         $('#btnSave').html('<i class="fas fa-sign-in-alt"></i> Agregar');
                         $('#btnSave').attr('disabled',false); //set button enable 
                      }
                    })
                return false;
               }*/


               //observaciones
            if (observaciones== null || observaciones.length == 0 || /^\s+$/.test(observaciones)) {
                    Swal.fire({
                      title: 'Descripcion',
                      text: "Ingrese Descripcion",
                      icon: 'error',
                      showCancelButton: false,
                      confirmButtonColor: '#3085d6',
                      cancelButtonColor: '#d33',
                      confirmButtonText: 'ok'
                    }).then((result) => {
                      if (result.value) {
                         $('#btnSave').html('<i class="fas fa-sign-in-alt"></i> Agregar');
                         $('#btnSave').attr('disabled',false); //set button enable 
                      }
                    })
                    return false;
               }else if(observaciones.length>=500){
                    Swal.fire({
                      title: 'Descripcion',
                      text: "En Descripcion no puedes ingresar mas de 500 caracteres",
                      icon: 'error',
                      showCancelButton: false,
                      confirmButtonColor: '#3085d6',
                      cancelButtonColor: '#d33',
                      confirmButtonText: 'ok'
                    }).then((result) => {
                      if (result.value) {
                         $('#btnSave').html('<i class="fas fa-sign-in-alt"></i> Agregar');
                         $('#btnSave').attr('disabled',true); //set button enable 
                      }
                    })
                    return false;
               }

       
            $.ajax({  
                 url:"<?php echo base_url().'Mantenimiento/Pedidos/Actualizar_descripcion_unidad_medida/';?>",
                 method:'POST',  
                 data:new FormData(this),  
                 contentType:false,  
                 processData:false,  
                 success:function(data)  
                 {  
                    var json = JSON.parse(data);
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
                          icon: 'success',
                          title: ''+json.mensaje+''
                        })  
                      $('#registrar_historial_xx_registrar')[0].reset();  
                      $('.bd-example-modal-lgsd_xx').modal('hide');   
                      reload_table();
                 
                   
                     
                 },statusCode:{
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
                            $('#btnSave').html('<i class="fas fa-circle-notch"></i> Reintentar'); //change button text
                            $('#btnSave').attr('disabled',false);
                         /* $("#alert").html('<div class="alert alert-success text-center" id="alerta" role="alert">'+json.alerta+'</div>'); */
                        }
                        
                      },
                    error: function()
                                         {
                               Swal.fire({
                                title: 'Lo siento mucho (︶︿︶)',
                                text: "Algo paso con el sistema Vuelva a intentar una vez mas",
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
                      }  
            });  
           
            
      });  

    });
</script>


<script>
    function soloNumeros(event)
    {
        if(event.shiftKey)
       {
            event.preventDefault();
       }

       if (event.keyCode == 46 || event.keyCode == 8)    {
       }
       else {
            if (event.keyCode < 95) {
              if (event.keyCode < 48 || event.keyCode > 57) {
                    event.preventDefault();
              }
            } 
            else {
                  if (event.keyCode < 96 || event.keyCode > 105) {
                      event.preventDefault();
                  }
            }
          }
    }

    function soloLetras(e){
       key = e.keyCode || e.which;
        tecla = String.fromCharCode(key).toString();
        letras = " áéíóúabcdefghijklmnñopqrstuvwxyzÁÉÍÓÚABCDEFGHIJKLMNÑOPQRSTUVWXYZ";//Se define todo el abecedario que se quiere que se muestre.
        especiales = [8, 37, 39, 46, 6]; //Es la validación del KeyCodes, que teclas recibe el campo de texto.

        tecla_especial = false
        for(var i in especiales) {
            if(key == especiales[i]) {
                tecla_especial = true;
                break;
            }
        }

        if(letras.indexOf(tecla) == -1 && !tecla_especial){
            return false;
          }
    }

    function sololetrasnumeros(e) {
        if(e.key.match(/[a-z0-9ñçáéíóú,."°º/\()_-\s]/i)===null) {
            // Si la tecla pulsada no es la correcta, eliminado la pulsación
            e.preventDefault();
        }
    }


    function numerosletrasmayus(e){
       if(e.key.match(/[A-Z0-9\s]/i)===null) {
            // Si la tecla pulsada no es la correcta, eliminado la pulsación
            e.preventDefault();
        }
    }

</script>