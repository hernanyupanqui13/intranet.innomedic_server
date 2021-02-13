
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-body">
           <!-- <button type="button" class="btn btn-info btn-rounded m-t-10 float-right" data-toggle="modal" data-target="#staticBackdrop">Agregar Nuevo Paciente</button>-->
               <a href="javascript:void(0)" class="btn btn-info btn-rounded m-t-10 float-right" onclick="myFunction()"><i class="fas fa-plus-circle"></i>&nbsp;Agregar Nuevo Paciente</a>
                    <!-- Add Contact Popup Model -->
                   <button class="btn btn-success btn-rounded" onclick="reload_table()" type="button"><span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>Reloading...</button>

                <h4 class="card-title">Registro de Historial</h4>
                <h6 class="card-subtitle">Paciente - Historial</h6>
              <!--  <button class="btn btn-success" onclick="add_person()"><i class="glyphicon glyphicon-plus"></i> Add Person</button>-->
                   
                <div class="table-responsive">
                    <table id="table" class="table m-t-30 table-striped table-bordered table-hover no-wrap contact-list" cellspacing="0" width="100%">
                        <thead>
                            <tr> 
                                <th>#</th>
                                <th>Codigo</th>
                                <th>Fecha</th>
                                <th>Paciente</th>
                                <th>DNI</th>
                                <th>Calidad</th>
                                <th>Estado</th>
                                <th>Empresa</th>
                                <th style="width:150px;">Opción</th>
                            </tr>
                        </thead>
                        <tbody>
                        </tbody>

                        <tfoot>
                        <tr>
                            <th>#</th>
                            <th>Codigo</th>
                            <th>Fecha</th>
                            <th>Paciente</th>
                            <th>DNI</th>
                            <th>Calidad</th>
                            <th>estado</th>
                            <th>Empresa</th>
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
<div class="modal fade bd-example-modal-lgsd" id="staticBackdrop_xx" data-backdrop="static" data-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog ">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title text-center"  id="exampleModalLabel">Agregar de nuevo Paciente </h3>                           
            </div>
            <div class="modal-body">
                <form autocomplete="on" method="post" id="registrar_historial_xx_registrar" class="form-horizontal form-material" autocomplete="off">

                    
                    <div class="row">
                        <div class="col-md-12 m-b-20">
                        <input type="text" name="codigo_id" id="codigo_idx" class="form-control" placeholder="Ingrese el 000642" onkeydown="return numerosletrasmayus(event);"> 
                        <div id="error_codigo"></div>
                    </div>
                        <div class="col-md-12 m-b-20">
                        <input type="text" name="paciente" id="pacientex" class="form-control" placeholder="Paciente" value="" onkeydown="return soloLetras(event);"> 
                    </div>

                    <div class="col-md-12 m-b-20">
                        <input type="text"  name="dni" id="dnix" class="form-control" placeholder="DNI" onkeydown="return soloNumeros(event);"> 
                    </div>
                    <div class="col-md-12 m-b-20" >
                        <h6 class="card-title">Paso calidad</h6>
                        <div class="btn-group mt-3" data-toggle="buttons" role="group" >
                            <label class="btn btn-outline btn-info">
                                <div class="custom-control custom-radio">
                                    <input type="radio" id="check" name="check" value="Si" class="custom-control-input"  >
                                    <label class="custom-control-label" for="check"> <i class="ti-check text-active" aria-hidden="false"></i> Si</label>
                                </div>
                            </label>
                            <label class="btn btn-outline btn-info">
                                <div class="custom-control custom-radio">
                                    <input type="radio" id="checkx" name="check" value="No" class="custom-control-input">
                                    <label class="custom-control-label" for="checkx"> <i class="ti-check text-active" aria-hidden="true"></i> NO</label>
                                </div>
                            </label>
                            <label class="btn btn-outline btn-danger ">
                                <div class="custom-control custom-radio">
                                    <input type="radio" id="checkxx" name="check" value="n/a" class="custom-control-input">
                                    <label class="custom-control-label" for="checkxx"> <i class="ti-check text-active" aria-hidden="true"></i> N/A</label>
                                </div>
                            </label>
                        </div>
                    </div>

                    <div class="col-md-12 m-b-20">
                        <input type="text" name="empresa" id="empresa_lis_xx" class="form-control" placeholder="Buscar Empresa" onkeydown="return soloLetras(event);"> 
                    </div>
                    <div class="col-md-12 m-b-20">
                        <textarea name="observaciones" id="observacionesx" cols="30" rows="10" class="form-control" placeholder="Observaciones" onkeypress="return sololetrasnumeros(event)"></textarea>
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


<div class="modal fade bd-example-modal-lgsd_xx" id="staticBackdrop" data-backdrop="static" data-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog ">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title text-center" id="exampleModalLabel">Registro de nuevo Paciente </h3>                           
            </div>
            <div class="modal-body">
                <form autocomplete="on" method="post" id="registrar_historial_xx" class="form-horizontal form-material">

                    
                    <div class="row">
                        <div class="col-md-12 m-b-20">
                        <input type="text" name="codigo_id" id="codigo_id" class="form-control" placeholder="Ingrese el 000642" onkeydown="return numerosletrasmayus(event);"> 
                    </div>
                        <div class="col-md-12 m-b-20">
                        <input type="text" name="paciente" id="paciente" class="form-control" placeholder="Paciente" value="" onkeydown="return soloLetras(event);"> 
                    </div>

                    <div class="col-md-12 m-b-20">
                        <input type="text" name="dni" id="dni" class="form-control" placeholder="DNI" onkeydown="return soloNumeros(event);"> 
                    </div>
                    <div class="col-md-12 m-b-20" >
                        <h6 class="card-title">Paso calidad</h6>
                        <div class="btn-group mt-3" data-toggle="buttons" role="group" >
                            <label class="btn btn-outline btn-info" id="labelx">
                                <div class="custom-control custom-radio">
                                    <input type="radio" id="checkx1" name="checkx" value="Si" class="custom-control-input"  >
                                    <label class="custom-control-label" for="checkx1"> <i class="ti-check text-active" aria-hidden="false"></i> Si</label>
                                </div>
                            </label>
                            <label class="btn btn-outline btn-info" id="labelx1">
                                <div class="custom-control custom-radio">
                                    <input type="radio" id="checkx2" name="checkx" value="No" class="custom-control-input">
                                    <label class="custom-control-label" for="checkx2"> <i class="ti-check text-active" aria-hidden="true"></i> NO</label>
                                </div>
                            </label>
                            <label class="btn btn-outline btn-danger " id="labelx2">
                                <div class="custom-control custom-radio">
                                    <input type="radio" id="checkx3" name="checkx" value="n/a" class="custom-control-input">
                                    <label class="custom-control-label" for="checkx3"> <i class="ti-check text-active" aria-hidden="true"></i> N/A</label>
                                </div>
                            </label>
                        </div>
                    </div>

                    <div class="col-md-12 m-b-20">
                        <input type="text" name="empresa" id="empresa_lis_xxxx" class="form-control" placeholder="Buscar Empresa" onkeydown="return soloLetras(event);"> 
                    </div>
                    <div class="col-md-12 m-b-20">
                        <textarea name="observaciones" id="observaciones" cols="30" rows="10" class="form-control" placeholder="Observaciones" onkeypress="return sololetrasnumeros(event)"></textarea>
                    </div>

                    </div>
                    <div class="row text-center">
                        <div class="col-md-12">
                            <div class="form-actions">
                               <input type="hidden" value="" name="id"/> 
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
    table = $('#table').DataTable({ 

        "processing": true, //Feature control the processing indicator.
        "serverSide": true, //Feature control DataTables' server-side processing mode.
        "order": [], //Initial no order.

        // Load data for the table's content from an Ajax source
        "ajax": {
            "url": "<?php echo site_url('Atencion/Historial/ajax_list/')?>",
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
        $('.modal-title').text('Agregar nuevo paciente'); // Set Title to Bootstrap modal title
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
        $('input[name="check"]').attr('checked', false);
        $("input:radio").attr("checked", false);
        $("input:checked").removeAttr("checked");
        $('#btnSave').html('<i class="fas fa-sign-in-alt"></i> Actualizar'); //change button text


        $('#btnSave').attr('disabled',false);
    
        //Ajax Load data from ajax
        $.ajax({
            url : "<?php echo base_url().'Atencion/Historial/Actualizar_historial/';?>" + id,
            type: "GET",
            dataType: "JSON",
            success: function(data)
            {

                $('[name="id"]').val(data.Id);
                $('[name="codigo_id"]').val(data.codigo_id);
                $('[name="paciente"]').val(data.paciente);
                $('[name="dni"]').val(data.dni);
                $('[name="empresa"]').val(data.empresa);
                $('[name="observaciones"]').val(data.observaciones);
                $('#staticBackdrop').modal('show'); // show bootstrap modal when complete loaded
                $('.modal-title').html('<small >Actualizar datos de <b class="label label-success">'+data.paciente+'</b></small>'); // Set title to Bootstrap modal title
                //$('#ocultar_update').hide();

                if (data.check=="Si") {
                    $("#labelx").addClass('active');
                    $('#checkx1').attr('checked',true);
                }else if(data.check=="No"){
                    $("#labelx1").addClass('active');
                    $('#checkx2').attr('checked',true);
                }else{
                    $("#labelx2").addClass('active');
                    $('#checkx3').attr('checked',true);
                }

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
            var codigo_id = $("#codigo_idx").val();
            var dnix = $("#dnix").val();
            var paciente = $("#pacientex").val();
            var empresa = $("#empresa_lis_xx").val();
            var observaciones = $("#observacionesx").val();



       

            $('#btnSave_x').html('<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> Guardando....'); //change button text
           $('#btnSave_x').attr('disabled',true); //set button disable 

           if (codigo_id == null || codigo_id.length == 0 || /^\s+$/.test(codigo_id) ) {
                Swal.fire({
                  title: 'Codigo',
                  text: "El codigo esta vacio",
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
           }else if(codigo_id<=3){
                Swal.fire({
                  title: 'Codigo',
                  text: "El codigo no puede ser menor a 2 caracteres",
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
           }else if(codigo_id.length>=20){
                Swal.fire({
                  title: 'Codigo',
                  text: "El codigo no puede ser mayor a 20 caracteres",
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

           //PACIENTE


           if (paciente == null || paciente.length == 0 || /^\s+$/.test(paciente) ) {
                Swal.fire({
                  title: 'Codigo',
                  text: "El campo paciente esta vacio",
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
           }else if(paciente.length<=2){
                Swal.fire({
                  title: 'Codigo',
                  text: "El paciente no puede ser menor a 2 caracteres",
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
           }else if(paciente.length>=60){
                Swal.fire({
                  title: 'Codigo',
                  text: "El paciente no puede ser mayor a 60 caracteres",
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


           //dni
           if (dnix == null || dnix.length == 0 || /^\s+$/.test(dnix) ) {
                 Swal.fire({
                  title: 'Dni',
                  text: "El campo DNI esta vacio",
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

          
            if( !(/^\d{8}$/.test(dnix)) ) {
                Swal.fire({
                  title: 'Dni',
                  text: "El DNI tiene que tener 8 caracteres",
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

            //radio 

             if(!$("input[name='check']").is(':checked')){
                    Swal.fire({
                      title: 'Codigo',
                      text: "Tienes que realizar un check calidad",
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

              //emppresa


              if (empresa == null || empresa.length == 0 || /^\s+$/.test(empresa) ) {
                Swal.fire({
                  title: 'Codigo',
                  text: "Realizar una busqueda por Razon Social",
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
               }else if(empresa.length<=2){
                    Swal.fire({
                      title: 'Codigo',
                      text: "El empresa no puede ser menor a 2 caracteres",
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
               }else if(empresa.length>=60){
                    Swal.fire({
                      title: 'Codigo',
                      text: "El campo empresa no puede ser mayor a 60 caracteres",
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

               //observaciones

               if(observaciones.length>=300){
                    Swal.fire({
                      title: 'Codigo',
                      text: "En observacion no puedes ingresar mas de 300 caracteres",
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
                 url:"<?php echo base_url().'Atencion/Historial/Registrar_historial/';?>",
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
                     url:"<?php echo base_url().'Atencion/Historial/Eliminar_historial/';?>",  
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
            var codigo_id = $("#codigo_id").val();
            var dnix = $("#dni").val();
            var paciente = $("#paciente").val();
            var empresa = $("#empresa_lis_xxxx").val();
            var observaciones = $("#observaciones").val();

           $('#btnSave').html('<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> Actualizando....'); //change button text
           $('#btnSave').attr('disabled',true); //set button disable 


           if (codigo_id == null || codigo_id.length == 0 || /^\s+$/.test(codigo_id) ) {
                Swal.fire({
                  title: 'Codigo',
                  text: "El codigo esta vacio",
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
           }else if(codigo_id<=3){
                Swal.fire({
                  title: 'Codigo',
                  text: "El codigo no puede ser menor a 2 caracteres",
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
           }else if(codigo_id.length>=20){
                Swal.fire({
                  title: 'Codigo',
                  text: "El codigo no puede ser mayor a 20 caracteres",
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
           }

           //PACIENTE


           if (paciente == null || paciente.length == 0 || /^\s+$/.test(paciente) ) {
                Swal.fire({
                  title: 'Codigo',
                  text: "El campo paciente esta vacio",
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
           }else if(paciente.length<=2){
                Swal.fire({
                  title: 'Codigo',
                  text: "El paciente no puede ser menor a 2 caracteres",
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
           }else if(paciente.length>=60){
                Swal.fire({
                  title: 'Codigo',
                  text: "El paciente no puede ser mayor a 60 caracteres",
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
           }


           //dni
           if (dnix == null || dnix.length == 0 || /^\s+$/.test(dnix) ) {
                 Swal.fire({
                  title: 'Dni',
                  text: "El campo DNI esta vacio",
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
           }

          
            if( !(/^\d{8}$/.test(dnix)) ) {
                Swal.fire({
                  title: 'Dni',
                  text: "El DNI tiene que tener 8 caracteres",
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
            }

            //radio 

             if(!$("input[name='checkx']").is(':checked')){
                    Swal.fire({
                      title: 'Codigo',
                      text: "Tienes que realizar un check calidad",
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
              }

              //emppresa


              if (empresa == null || empresa.length == 0 || /^\s+$/.test(empresa) ) {
                Swal.fire({
                  title: 'Codigo',
                  text: "Realizar una busqueda por Razon Social",
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
               }else if(empresa.length<=2){
                    Swal.fire({
                      title: 'Codigo',
                      text: "El empresa no puede ser menor a 2 caracteres",
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
               }else if(empresa.length>=60){
                    Swal.fire({
                      title: 'Codigo',
                      text: "El campo empresa no puede ser mayor a 60 caracteres",
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
               }

               //observaciones

               if(observaciones.length>=300){
                    Swal.fire({
                      title: 'Codigo',
                      text: "En observacion no puedes ingresar mas de 300 caracteres",
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
               }
       
            $.ajax({  
                 url:"<?php echo base_url().'Atencion/Historial/Actualizar_historial_update/';?>",
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
        if(e.key.match(/[a-z0-9ñçáéíóú,.\s]/i)===null) {
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