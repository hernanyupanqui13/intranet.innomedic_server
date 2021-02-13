

                        <div class="card">
                            <div class="card-body">
                     
                                 <button type="button" class="btn btn-info btn-rounded m-t-10 float-right d-lg-none " data-toggle="modal" data-target=".bd-example-modal-lg"><i class='fa fa-plus-circle'></i>&nbsp;Nuevo Proveedor</button>&nbsp;
                                 <button type="button" class="btn btn-info btn-rounded m-t-10 float-right " data-toggle="modal" data-target=".bd-example-modal-lgs"><i class='fa fa-plus-circle'></i>&nbsp;Buscar Proveedor</button>
                                  <br>
                                <div class="table-responsive">
                                   <!-- <table id="demo-foo-row-toggler" class="table table-bordered" data-toggle-column="first">-->
                                    <!--<table id="demo-foo-accordion" class="table table-bordered m-t-30 table-hover contact-list m-b-0 toggle-arrow-tiny" data-paging="true" data-paging-size="7" data-filtering="true"  data-sorting="true">-->
                                        <table id="demo-foo-accordion" class="table table-bordered m-b-0 toggle-arrow-tiny" data-filtering="true" data-paging="true" data-sorting="true" data-toggle-column="first" data-paging-size="7">

                                        <thead>
                                            <tr class="footable-filtering"  data-expanded="false">
                                                <th data-breakpoints="xs">ID</th>
                                                <th data-breakpoints="xs sm">Fecha</th>
                                                <th data-breakpoints="xs ">Proveedor</th>
                                                <th data-breakpoints="xs ">Ruc</th>
                                                <th data-breakpoints="xs sm">Dirección</th>
                                                <th data-breakpoints="xs sm lg">Telefono</th>
                                                <th data-breakpoints="xs sm lg">Correo</th>
                                                <th data-breakpoints="xs sm lg">Estado</th>
                                                <th  data-title="Opciones">Opciones</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                           <?php $cont =0;  foreach ($lista_productos as $xx) { $cont +=1;?>
                                               <tr>
                                                    <td><?php echo $cont;?></td>
                                                   
                                                    <td><?php echo $xx->fecha;?></td>
                                                     <td>
                                                        <a href="javascript:void(0)"><?php echo $xx->nombre;?></a>
                                                    </td>
                                                    
                                                    <td><?php echo $xx->ruc;?></td>
                                                    <td><?php echo $xx->direccion;?></td>
                                                    <td><?php echo $xx->telefono;?></td>
                                                    <td><?php echo $xx->correo;?></td>
                                                    <td><?php if ($xx->status=="1") {?>
                                                        <span class="label label-success">Activo</span>
                                                    <?php }else if ($xx->status=="2"){?>
                                                        <span class="label label-danger">Desactivado</span>
                                                    <?php }else{
                                                        echo "<span class='label label-info'>Error Interno</span>";
                                                    } ?> </td>
                                                    <td><a class="btn-outline-success btn update" id="<?php echo $xx->Id;?>" href="javascript:void(0)"><i class="fas fa-edit"></i></a>
                                        <a class="btn-outline-danger btn delete" id="<?php echo $xx->Id;?>" href="javascript:void(0)"><i class="fas fa-times-circle"></i></a></td>
                                                </tr>
                                           <?php } ?>

                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>






                        <div class="modal fade bd-example-modal-lg" tabindex="-1" keyboard="true" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" data-backdrop="static" data-keyboard="false">
                          <div class="modal-dialog modal-lg">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Nuevo Proveedor</h5>
                                    <button type="button" class="close btn_cerrar" data-dismiss="modal" aria-label="Close">
                                      <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <form action="" class="form-horizontal form-material registrar_nuevo_prodcuto" id="registrar_nuevo_producto" enctype="multipart/form-data">
                                        <div class="row">
                                            <div class="col-md-6 m-b-20">
                                                <input type="text" class="form-control" name="nombre" id="nombre" placeholder="Nombre del proveedor" onkeypress="return sololetrasnumeros(event);" onkeyup="aMays(event, this)">
                                            </div>
                                            <div class="col-md-6 m-b-20">
                                                <input type="text" class="form-control" name="ruc" id="ruc" placeholder="Ruc"  onkeyup="aMays(event, this)" onkeydown="return soloNumeros(event);">
                                            </div>
                                            <div class="col-md-6 m-b-20">
                                                <input type="text" class="form-control" name="direccion" id="direccion" placeholder="Direccion" onkeyup="aMays(event, this)" onkeypress="return sololetrasnumeros(event);">
                                            </div>
                                            <div class="col-md-6 m-b-20">
                                                <input type="text" class="form-control" placeholder="Telefono" name="telefono" id="telefono" onkeydown="return soloNumeros(event);">
                                            </div>
                                            <div class="col-md-12 m-b-20">
                                                <input type="email" class="form-control" placeholder="Correo" name="correo" id="correo" onkeyup="aMays(event, this)">
                                            </div>

                                        </div>
                                </div>
                                <div class="row text-center">
                                    <div class="col-md-12">
                                        <div class="form-actions">
                                           <input type="hidden" name="user_id" id="user_id" />
                                            <button type="submit" class="btn-outline-success btn-rounded waves-effect btn btn-md waves-light"> <i class="fas fa-check-circle"></i>&nbsp;Registrar</button>
                                            <button type="button" data-dismiss="modal" class="btn btn-outline-danger btn-rounded btn-md btn_cerrar"><i class="fa fa-times-circle"></i>&nbsp;Cancelar</button>
                                        </div>
                                    </div>
                                </div>
                                </form>

                                
                                <br>
                             
                            </div>
                          </div> 
                        </div>


                        <div class="modal fade bd-example-modal-lgs" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                          <div class="modal-dialog modal-lg">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Buscar Proveedor</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                      <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <form class="form-horizontal" role="form" method="post" name="busqueda" id="busqueda" >
                                        <div class="card border-info">
                                          <div class="card-body">
                                            <div class="row">
                                              <div class="col-md-12">
                                                <input type="number" class="form-control" name="nruc" id="nruc" placeholder="Ingrese RUC" pattern="([0-9][0-9][0-9][0-9][0-9][0-9][0-9][0-9][0-9][0-9][0-9]|[0-9][0-9][0-9][0-9][0-9][0-9][0-9][0-9])" autofocus onkeypress="return soloNumeros(event);">
                                              </div>
                                            </div>
                                          </div>
                                          <div class="text-center">
                                            <button type="submit" class="btn btn-outline-success btn-rounded btn-md" name="btn-submit" id="btn-submit">
                                              <i class="fa fa-search"></i> Buscar
                                            </button>
                                          </div>
                                        </div>
                                    </form>
                                    <br>
                                    <b>Nombre:</b> <span id="usuarioxx"></span>
                                    <br>
                                    <b>Ruc:</b> <span id="rucxxx"></span>
                                    <br>
                                    <b>Telefono:</b> <span id="txt_telefonoxx"></span>
                                    <br>
                                    <b>Direccion:</b> <span id="direccionxxx"></span>
                                    <hr>
                                    <form action="" class="form-horizontal form-material " id="registrar_nuevo_proveedor_sunat" enctype="multipart/form-data">
                                        <div class="row">
                                            <input type="hidden" name="nombre" id="usuario">
                                            <input type="hidden" name="ruc" id="rucx">
                                            <input type="hidden" name="direccion" id="direccionx">
                                            <input type="hidden" name="telefono" id="txt_telefono">
                                        </div>
                                </div>
                                <div class="row text-center" id="ocultamos_id" style="display: none;">
                                    <div class="col-md-12">
                                        <div class="form-actions">
                                            <button type="submit" class="btn-outline-success btn-rounded waves-effect btn btn-md waves-light"> <i class="fas fa-check-circle"></i>&nbsp;Registrar</button>
                                            <button type="button" data-dismiss="modal" class="btn btn-outline-danger btn-rounded btn-md "><i class="fa fa-times-circle"></i>&nbsp;Cancelar</button>
                                        </div>
                                    </div>
                                </div>
                                </form>

                                <br>
                            </div>
                          </div>
                        </div>


         <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

            <script>
                function validate_modal() {
                    $('#codigo').val("");
                    $('#nombre').val("");
                    $('#description').val("");
               
                    $('.bd-example-modal-lg').show('modal');
                
                    
                }

                $(document).on('click', '.btn_cerrar', function(event) {
                    event.preventDefault();
                    /* Act on the event */
                    $("#nombre").val("");
                    $("#ruc").val("");
                    $("#direccion").val("");
                    $("#telefono").val("");
                    $("#correo").val("");
                    $('#user_id').val("");
                    $('#registrar_nuevo_producto')[0].reset();  
                    $('.modal-title').text("Nuevo Producto"); 
                    $("#registrar_nuevo_producto").removeClass("registrar_datos");
                    $("#registrar_nuevo_producto").addClass("registrar_nuevo_prodcuto");

                });

                //ocultamos y mostramos cuando el registro esta vacio
               
                //
                // Registrar datos de la empresa
                //
                
                //registro desde la sunat
                $(document).ready(function() {
                    $(document).on('submit', '#registrar_nuevo_proveedor_sunat', function(event) {
                        event.preventDefault();
                        /* Act on the event */
                        $.ajax({
                            url: '<?php echo base_url().'Inventario/Proveedores/Nuevo_registro/';?>',
                            type: 'POST',
                            data:$("form").serialize(),
                            statusCode: {
                              400: function(xhr) {
                                  var json = JSON.parse(xhr.responseText);
                                  if (json.error) {
                                      Swal.fire({
                                          title: 'Lo siento mucho',
                                          text: "" + json.error + "",
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
                                   // $('.bd-example-modal-lg').modal('hide')
                                   window.location.reload(); 
                                   // $("#demo-foo-accordion").load(location.href+" #demo-foo-accordion>*","");
                                    setTimeout(function () { $('#demo-foo-accordion').footable(); }, 1000);
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
                });
              

                $(document).ready(function() {
                    $(document).on('submit', '.registrar_nuevo_prodcuto', function(event) {
                        event.preventDefault();
                        /* Act on the event */
                        var nombre =  $('#nombre').val();
                      
                        //nombre
                        if (nombre == null || nombre.length == 0 || /^\s+$/.test(nombre) ) {
                                Swal.fire({
                                  title: 'Nombre del Proveedor',
                                  text: "El campo nombre esta vacio",
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
                          
                          //codigo


                        $.ajax({
                            url: '<?php echo base_url().'Inventario/Proveedores/Nuevo_registro/';?>',
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
                           // data:$("form").serialize()
                        })
                        .done(function() {
                            console.log("success");
                            // var json = JSON.parse();
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
                                    $('#registrar_nuevo_producto')[0].reset();  
                                   // $('.bd-example-modal-lg').modal('hide')
                           
                                   window.location.reload(); 
                                    setTimeout(function () { $('#demo-foo-accordion').footable(); }, 1000);
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
                });

                function aMays(e, elemento) {
                tecla=(document.all) ? e.keyCode : e.which; 
                 elemento.value = elemento.value.toUpperCase();
                }
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

                function sololetrasnumeros(e) {
                    if(e.key.match(/[a-z0-9ñçáéíóú-.,\s]/i)===null) {
                          // Si la tecla pulsada no es la correcta, eliminado la pulsación
                          e.preventDefault();
                      }
                  }

                function sololetrasnumeros_puntos(e) {
                    if(e.key.match(/[a-z0-9ñçáéíóú,.\s]/i)===null) {
                      // Si la tecla pulsada no es la correcta, eliminado la pulsación
                      e.preventDefault();
                    }
                }
                //validar email
                

                $(document).on('click', '.delete', function(event) {
                    event.preventDefault();
                    /* Act on the event */
                    var user_id = $(this).attr("Id"); 
                    var c_obj = $(this).parents("tr");

                    Swal.fire({
                      title: 'Estas seguro de eliminar?',
                      text: "Eliminaras el producto",
                      icon: 'warning',
                      showCancelButton: true, 
                      confirmButtonColor: '#3085d6',
                      cancelButtonColor: '#d33',
                      cancelButtonText: 'Cancelar',
                      confirmButtonText: 'Eliminar'
                    }).then((result) => {
                      if (result.value) {
                            $.ajax({  
                                 url:"<?php echo base_url().'Inventario/Proveedores/eliminar_producto/';?>",  
                                 method:"POST",  
                                 data:{user_id:user_id},  
                                 success:function(data)  
                                 {  
                                     c_obj.remove();
                                       //$("#example23").load(" #example23");
                                      
                                     //$('#div_load').load(location.href+" #div_load>*","");

                                     table.ajax.reload();  
                                 }  
                            });
                        Swal.fire(
                          'Deleted!',
                          'Your file has been deleted.',
                          'success'
                        )
                      }
                    })
                });

                //validacion para que se cargue el imagen
                function fileValidatiosn(obj){
                    var uploadFile = obj.files[0];

                    if (!window.FileReader) {
                        alert('El navegador no soporta la lectura de archivos');
                        return;
                    }

                    if (!(/\.(jpg|png|gif)$/i).test(uploadFile.name)) {
                      Swal.fire({
                      title: 'Files',
                      text: "El archivo a adjuntar no es una imagen solo acepta jpg|png|gif",
                      icon: 'warning',
                      showCancelButton: false,
                      confirmButtonColor: '#3085d6',
                      cancelButtonColor: '#d33',
                      confirmButtonText: 'ok'
                    }).then((result) => {
                      if (result.value) {
                        $("#archivo").val("");
                       // $("#user_image").val("");
                      }
                    })
                       
                    }

                    var uploadFile = obj.files[0];
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
                        $("#archivo").val("");
                       // $("#user_image").val("");
                      }
                    })

                  
                    }
                    };
                    img.src = URL.createObjectURL(uploadFile);
                
                                                       
            }

            // funcion para actualizar el producto final
            

            $(document).ready(function() {
                $(document).on('click', '.update', function(){  
                   var user_id = $(this).attr("id");  
                   $.ajax({  
                       url:"<?php echo base_url().'Inventario/Proveedores/fetch_single_user_experience/';?>",
                        method:"POST",  
                        data:{user_id:user_id},  
                        dataType:"json",  
                        success:function(data)  
                        {  
                            $("#registrar_nuevo_producto").addClass("registrar_datos");
                            $("#registrar_nuevo_producto").removeClass("registrar_nuevo_prodcuto");
                            $('.bd-example-modal-lg').modal('show');  
                            $('.modal-title').text("Actualizar Proveedor");  
                            $('#user_id').val(user_id);  
                            $('#nombre').val(data.nombre);
                            $('#ruc').val(data.ruc);
                            $('#direccion').val(data.direccion);
                            $('#telefono').val(data.telefono);
                            $('#correo').val(data.correo);


    
                        }  
                   })  
              });
            });

            $(document).ready(function() {
                $(document).on('submit', '.registrar_datos', function(event) {
                    event.preventDefault();
                    /* Act on the event */
                    $.ajax({
                        url: '<?php echo base_url().'Inventario/Proveedores/actualizar_producto/';?>',
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
                    .done(function() {
                        console.log("success");

                        Swal.fire({
                              title: 'Muy bien',
                              text: "Se actualizo de manera exitosa",
                              icon: 'success',
                              showCancelButton: false,
                              confirmButtonColor: '#3085d6',
                              cancelButtonColor: '#d33',
                              confirmButtonText: 'Muy bien!'
                            }).then((result) => { 
                              if (result.value) {
                                $('#registrar_nuevo_producto')[0].reset();  
                                $('.bd-example-modal-lg').modal('hide')
                       
                                window.location.reload(); 
                                setTimeout(function () { $('#demo-foo-accordion').footable(); }, 1000);
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
            });


            </script>