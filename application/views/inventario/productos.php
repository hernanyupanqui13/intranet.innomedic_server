

                        <div class="card">
                            <div class="card-body">
                     
                                 <button type="button" class="btn btn-info btn-rounded m-t-10 float-right d-lg-none" data-toggle="modal" data-target=".bd-example-modal-lg"><i class='fa fa-plus-circle'></i>&nbsp;Nuevo Producto</button>
                                <div class="table-responsive">
                                   <!-- <table id="demo-foo-row-toggler" class="table table-bordered" data-toggle-column="first">-->
                                    <table id="demo-foo-accordion" class="table table-bordered m-t-30 table-hover contact-list m-b-0 toggle-arrow-tiny" data-paging="true" data-paging-size="7" data-filtering="true"  data-sorting="true">
                                        <thead>
                                            <tr class="footable-filtering">
                                                <th data-breakpoints="xs">ID</th>
                                                <th >Fecha</th>
                                                <th >Stock</th>
                                                <th data-breakpoints="xs sm">Producto</th>
                                                <th data-breakpoints="xs">Codigo de Barra</th>
                                                <th>Estado</th>
                                                <th data-breakpoints="xs sm" data-title="Opciones">Opciones</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                           <?php $cont =0; foreach ($lista_productos as $xx) { $cont +=1;?>
                                               <tr data-expanded="true">
                                                    <td><?php echo $cont;?></td>
                                                   
                                                    <td><?php echo $xx->fecha;?></td>
                                                    <td><?php if ($xx->total=="" || $xx->total==0) {
                                                        echo "0";
                                                    }else{
                                                        echo $xx->total;
                                                    }?></td>
                                                     <td>
                                                        <a href="javascript:void(0)"><img src="<?php echo base_url().'upload/';?>productos/<?php if($xx->archivo=="" || $xx->archivo == null){ echo "nuevo.png";}else{ echo $xx->archivo;} ?>" alt="user" width="40" class="img-circle" /> <?php echo $xx->nombre;?>(<small><?php echo $xx->description; ?></small>)</a>
                                                    </td>
                                                    
                                                    <td><?php echo $xx->codigo;?></td>
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
                        <h5 class="modal-title" id="exampleModalLabel">Nuevo Producto</h5>
                        <button type="button" class="close btn_cerrar" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="" class="form-horizontal form-material registrar_nuevo_prodcuto" id="registrar_nuevo_producto" enctype="multipart/form-data">
                            <div class="row">
                                <div class="col-md-6 m-b-20">
                                    <input type="text" class="form-control" name="codigo" id="codigo" placeholder="Codigo" onkeypress="return sololetrasnumeros(event);" onkeyup="aMays(event, this)">
                                </div>
                                <div class="col-md-6 m-b-20">
                                    <input type="text" class="form-control" name="nombre" id="nombre" placeholder="Nombre"  onkeyup="aMays(event, this)" onkeypress="return sololetrasnumeros_puntos(event);">
                                </div>
                                <div class="col-md-12 m-b-20">
                                    <textarea class="form-control" name="description" id="description" rows="2" placeholder="Descripción" onkeyup="aMays(event, this)" onkeypress="return sololetrasnumeros_puntos(event);"></textarea>
                                </div>
                                <div class="col-md-12 m-b-20">
                                    <div
                                        class="fileupload btn btn-danger btn-rounded waves-effect waves-light">
                                        <span><i
                                                class="ion-upload m-r-5"></i>Cargar Imagen</span>
                                        <input type="file" class="upload" name="picture" id="picture" onchange="fileValidatiosn(this);">

                                    </div>
                                     <!--<div id="archivoxx_xx"></div>-->
                                </div>
                                <!--<div class="col-md-6 m-b-20">
                                    <input type="text" class="form-control" placeholder="Stock Inicial" name="stockInicial" id="stockInicial">
                                </div>-->

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


         <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

            <script>
                function validate_modal() {
                    $('#codigo').val("");
                    $('#nombre').val("");
                    $('#description').val("");
               
                    $('.bd-example-modal-lg').show('modal');
                   

                    
                }
                // al hacer click borramos los datos que estaba ahi
                //$(".btn_cerrar").click(function(event) {
                  $(document).on('click', '.btn_cerrar', function(event) {
                    event.preventDefault();
                    /* Act on the event */
                 
                    $("#codigo").val("");
                    $("#nombre").val("");
                    $("#description").val("");
                    $("#picture").val("");
                    $('#user_id').val("");
                    $('#registrar_nuevo_producto')[0].reset();  
                    $('.modal-title').text("Nuevo Producto"); 
                    $("#registrar_nuevo_producto").removeClass("registrar_datos");
                    $("#registrar_nuevo_producto").addClass("registrar_nuevo_prodcuto");

                });
              

                $(document).ready(function() {
                    $(document).on('submit', '.registrar_nuevo_prodcuto', function(event) {
                        event.preventDefault();
                        /* Act on the event */
                        var codigo =  $('#codigo').val();
                        var nombre =  $('#nombre').val();
                        var description = $('#description').val();
                        //codigo
                          if (codigo == null || codigo.length == 0 || /^\s+$/.test(codigo) ) {
                                Swal.fire({
                                  title: 'Codigo',
                                  text: "El campo codigo esta vacio",
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
                          if (nombre == null || nombre.length == 0 || /^\s+$/.test(nombre) ) {
                                Swal.fire({
                                  title: 'Nombre',
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
                       
                       

                        $.ajax({
                            url: '<?php echo base_url().'Inventario/Productos/Nuevo_registro/';?>',
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

                function sololetrasnumeros(e) {
                    if(e.key.match(/[a-z0-9ñçáéíóú-\s]/i)===null) {
                          // Si la tecla pulsada no es la correcta, eliminado la pulsación
                          e.preventDefault();
                      }
                  }

                function sololetrasnumeros_puntos(e) {
                    if(e.key.match(/[a-z0-9ñçáéíóú,.\s()]/i)===null) {
                      // Si la tecla pulsada no es la correcta, eliminado la pulsación
                      e.preventDefault();
                    }
                }

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
                                 url:"<?php echo base_url().'Inventario/Productos/eliminar_producto/';?>",  
                                 method:"POST",  
                                 data:{user_id:user_id},  
                                 success:function(data)  
                                 {  
                                     c_obj.remove();

                                     table.ajax.reload();  
                                 }  
                            });
                      
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
                       url:"<?php echo base_url().'Inventario/Productos/fetch_single_user_experience/';?>",
                        method:"POST",  
                        data:{user_id:user_id},  
                        dataType:"json",  
                        success:function(data)  
                        {  
                             $("#registrar_nuevo_producto").addClass("registrar_datos");
                             $("#registrar_nuevo_producto").removeClass("registrar_nuevo_prodcuto");
                             $('.bd-example-modal-lg').modal('show');  
                             $('#nombre').val(data.nombre);  
                             $('#description').val(data.description);  
                            $('.modal-title').text("Actualizar Producto");  
                             $('#user_id').val(user_id);  
                             $('#nombre').val(data.nombre);
                             $('#codigo').val(data.codigo);
                             $('#archivoxx_xx').html(data.archivo);


    
                        }  
                   })  
              });
            });

            $(document).ready(function() {
                $(document).on('submit', '.registrar_datos', function(event) {
                    event.preventDefault();
                    /* Act on the event */
                    $.ajax({
                        url: '<?php echo base_url().'Inventario/Productos/actualizar_producto/';?>',
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
                       
                                //window.location.reload(); 
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