           
            <?php
            if (!empty($update)) {
             foreach ($update as $show) {
                $id = $show->Id;
                $name_users = $show->nombres.' '. $show->apellido_paterno.' '.$show->apellido_materno;
                $users = $show->nombres;
                $last_name_pater = $show->apellido_paterno;
                $last_name_mater= $show->apellido_materno;
                $profile = $show->txtperfil;
                $gender = $show->txtgenero;
                $birthdate = $show->fecha_nacimiento;
                $mail = $show->email;
                $picturex = $show->imagen;
                //redes sociales y website
                $websitex = $show->website;
                $facebookx = $show->facebook;
                $googlex = $show->google;
                $instagramx = $show->instagram;
                $linkedInx = $show->linkedIn; 

                //status fro users
                $status = $show->status;
                $edadx = $show->edad;

                //telefonos
                $telephone = $show->telefono;
                $celphone = $show->celular;

                //direccion del cliente

                $addrress = $show->direccion;
                $departament = $show->id_departamento;
                $provinciax =$show->id_provincia;
                $distritox = $show->id_distrito;
                $country = $show->pais;

                //
                $id_gen = $show->id_genero;

                
            }
        }else{
                redirect(base_url().'Mantenimiento/Usuario/');
            } ?>
                 <!-- Row -->
                <!-- Row -->
                <div class="row animated bounce" id="myimg">
                    <div class="col-lg-12">
                        <div class="card ">
                            <div class="card-header bg-info">
                                <h4 class="m-b-0 text-white">Datos de: <?php echo $name_users; ?></h4>
                            </div>

                            <div class="card-body" id="your_div_id">
                                <form  autocomplete="off"  class="form-horizontal" id="user_form_x" onsubmit="return ValidarDatos();" enctype="multipart/form-data">
                                    <div class="form-body">
                                        <input type="hidden" name="Id" value="<?php echo $this->uri->segment(4,0)?>" >
                                    
                                        <h3 class="box-title">Información Personal</h3>
                                        <hr class="m-t-0 m-b-40">
                                        <div class="text-right"><img src="" id="profile-img-tag" width="100px" class="img-circle" /></div>
                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="form-group row">
                                                    <label class="control-label text-right col-md-3">Nombre</label>
                                                    <div class="col-md-9">
                                                        <input type="text" name="nombre" class="form-control" id="nombre"  value="<?php echo $users ?>" >
                                                        </div>
                                                </div>
                                            </div>
                                            <!--/span-->
                                            <div class="col-md-4">
                                                <div class="form-group row">
                                                    <label class="control-label text-right col-md-3">Apellido Paterno</label>
                                                    <div class="col-md-9">
                                                        <input type="text" name="apellido_paterno" class="form-control" value="<?php echo $last_name_pater; ?>">
                                                        </div>
                                                </div>
                                            </div> 
                                            <!--/span-->
                                            <div class="col-md-4">
                                                <div class="form-group row">
                                                    <label class="control-label text-right col-md-3">Apellido Materno</label>
                                                    <div class="col-md-9">
                                                        <input type="text" name="apellido_materno" class="form-control" value="<?php echo $last_name_mater; ?>">
                                                        </div>
                                                </div>
                                            </div>
                                        </div>
                                         <!--/row-->
                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="form-group row">
                                                    <label class="control-label text-right col-md-3">Gender</label>
                                                    <div class="col-md-9">
                                                        <select class="form-control custom-select" name="id_genero">
                                                            <option value="">--seleccionar--</option>
                                                            <?php foreach ($genero_list as $gg) {?>
                                                            <?php if ($gg->Id==$id_gen){
                                                               $activo ="selected"; 
                                                            }else{
                                                                $activo="";
                                                            } ?>

                                                           <option value="<?php echo $gg->Id;?>" <?php if ($activo=='') {
                                                               echo "";
                                                           }else{
                                                            echo $activo;
                                                           };?>><?php echo $gg->genero; ?></option>
                                                            
                                                           
                                                      <?php } ?>
                                                        </select>
                                                        </div>
                                                </div>
                                            </div>
                                            <!--/span-->
                                            <div class="col-md-4">
                                                <div class="form-group row">
                                                    <label class="control-label text-right col-md-3">Fecha de Nacimiento</label>
                                                    <div class="col-md-9">
                                                        <input type="text" class="form-control" name="fecha_nacimiento"  value="<?php 
                                                        if($birthdate=="0000-00-00"){
                                                            echo "";
                                                        }else{
                                                            echo $birthdate;
                                                        }
                                                            ?>" id="mdate" >
                                                        
                                                        
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!--/row-->
                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="form-group row">
                                                    <label class="control-label text-right col-md-3">Celular</label>
                                                    <div class="col-md-9"> 
                                                        <input type="text" name="celular" value="<?php echo $celphone; ?>" class="form-control">
                                                        
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group row">
                                                    <label class="control-label text-right col-md-3">Telefono</label>
                                                    <div class="col-md-9"> 
                                                        <input type="text" name="telefono" value="<?php echo $telephone; ?>" class="form-control">
                                                        
                                                    </div>
                                                </div>
                                            </div>
                                            <!--/span-->
                                            <div class="col-md-4">
                                                <div class="form-group row">
                                                    <label class="control-label text-right col-md-3">Email</label>
                                                    <div class="col-md-9"> 
                                                        <input type="text" name="email" value="<?php echo $mail; ?>" class="form-control">
                                                        
                                                    </div>
                                                </div>
                                            </div>
                                            
                                            <!--/span-->
                                        </div>
                                        <div class="row text-center"  id="div_contenido" >
                                            <div class="col-lg-12 col-md-12">
                                                <div class="card">
                                                    <div class="card-body">
                                                        <img src="<?php echo base_url().'upload/';?>images/<?php if($picturex==""){echo "otros.jpg";}else{echo $picturex;} ?>" alt="" class="img-circle"  width="100px">


                                                    </div>
                                                     <a href="javascript:void(0)" data-toggle="modal" data-target="#exampleModal1" class="btn btn-outline-success btn-rounded">Actualizar Imagen</a>
                                                </div>
                                            </div>
                                           
                                        </div>
                                        <h3 class="box-title">Dirección</h3>
                                        <hr class="m-t-0 m-b-40">
                                        <!--/row-->
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group row">
                                                    <label class="control-label text-right col-md-3">Dirección</label>
                                                    <div class="col-md-9">
                                                        <input type="text" name="direccion" class="form-control" value="<?php echo $addrress ?>">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group row">
                                                    <label class="control-label text-right col-md-3">Departamento</label>
                                                    <div class="col-md-9">
                                                        <input type="text" name="departamento" class="form-control" value="<?php echo $departament;?>">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group row">
                                                    <label class="control-label text-right col-md-3">Provincia</label>
                                                    <div class="col-md-9">
                                                        <input type="text" name="provincia" class="form-control" value="<?php echo $provinciax; ?>">
                                                    </div>
                                                </div>
                                            </div>
                                            <!--/span-->
                                            <div class="col-md-6">
                                                <div class="form-group row">
                                                    <label class="control-label text-right col-md-3">Distrito</label>
                                                    <div class="col-md-9">
                                                        <input type="text" name="distrito" class="form-control" value="<?php echo $distritox;?>">
                                                    </div>
                                                </div>
                                            </div>
                                            <!--/span-->
                                        </div>
                                        <!--/row-->
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group row">
                                                    <label class="control-label text-right col-md-3">Pais</label>
                                                    <div class="col-md-9">
                                                        <!--modificar pais-->
                                                        <input type="text" name="pais" class="form-control" value="<?php echo $country;?>">
                                                    </div>
                                                </div>
                                            </div>
                                            <!--/span-->
                                            
                                            <!--/span-->
                                        </div>
                                        <!--/row-->
                                        <h3 class="box-title">Información de WebSite</h3>
                                        <hr class="m-t-0 m-b-40">
                                        <!--/row-->
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group row">
                                                    <label class="control-label text-right col-md-3">Website</label>
                                                    <div class="col-md-9">
                                                        <input type="text" name="website" class="form-control" value="<?php echo $websitex ?>">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!--Hola como estas??-->
                                        <h3 class="box-title">Información de Redes Sociales</h3>
                                        <hr class="m-t-0 m-b-40">
                                        <!--/row-->
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group row">
                                                    <label class="control-label text-right col-md-3">Facebook</label>
                                                    <div class="col-md-9">
                                                        <input type="text" name="facebook" class="form-control" value="<?php echo $facebookx ?>" >
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group row">
                                                    <label class="control-label text-right col-md-3">Google</label>
                                                    <div class="col-md-9">
                                                        <input type="text" name="google" class="form-control" value="<?php echo $googlex ?>">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group row">
                                                    <label class="control-label text-right col-md-3">Instagram</label>
                                                    <div class="col-md-9">
                                                        <input type="text" name="instagram" class="form-control" value="<?php echo $instagramx ?>">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group row">
                                                    <label class="control-label text-right col-md-3">LinkedIn</label>
                                                    <div class="col-md-9">
                                                        <input type="text" name="linkedIn" class="form-control" value="<?php echo $linkedInx ?>">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                       
                                    </div>
                                    <hr>
                                    <div class="form-actions">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="row text-center">
                                                    <div class="col-md-offset-3 col-md-12">
                                                        <a href="" onclick="return regresar();" class="btn btn-outline-danger btn-rounded">Regresar</a>
                                                        <button type="submit" class="btn btn-outline-success btn-rounded">Actualizar</button>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6"> </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Row -->
                <!-- Row -->

    <!--agregar con ajax  el producto-->

                <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

                <script>  
                  $(document).on('submit', '#user_form_x', function(event){  
                       event.preventDefault();  
                       var nombre = $('#nombre').val();  
                       var descripcion = $('#descripcion').val();  
                       var picture = $('#picture').val();  
                       var producto = $('#producto').val();  
                       var cliente = $('#cliente').val();
             
                       if(nombre != '' && descripcion != '')  
                       { 
                                
                     
                            $.ajax({  
                                 url:"<?php echo base_url().'Mantenimiento/Usuario/data_actualizar/'?>",  
                                 method:'POST',  
                                 data:new FormData(this),   
                                 contentType:false,  
                                 processData:false,  
                                 success:function(data)  
                                 {  
                                     var json = JSON.parse(data);

                                     Swal.fire({
                                      title: 'Muy Bien',
                                      text: ""+json.mensaje+"",
                                      icon: 'success',
                                      showCancelButton: false,
                                      confirmButtonColor: '#3085d6',
                                      cancelButtonColor: '#d33',
                                      confirmButtonText: 'ok'
                                    }).then((result) => {
                                      if (result.value) {
                            
                                      }
                                    })
                      
                                       form.ajax.reload();  
                                 },
                                 error: function(jqXHR, textStatus, errorThrown)
                                 {
                                    Swal.fire(
                                          'Algo Pasó!',
                                          'Ponte en Contacto con el Administrador',
                                          'warning'
                                        )
                                }

                            });  
                        }
                       
             
                  });  



                  
                  
              
             </script> 

             <script>
                 function ValidarDatos() {
                     nombrex = document.getElementById("nombre").value;
                     if (nombrex =="") {
                        alert("Ingrese Nombre");
                        return false;
                     }
                 }
             </script>

             <script>
                 function regresar() {
                    Swal.fire({
                          title: '¿Estás seguro?',
                          text: "¡Estas apunto de salir de Ventana Actualizar",
                          icon: 'warning',
                          showCancelButton: true,
                          confirmButtonColor: '#3085d6',
                          cancelButtonColor: '#d33',
                          confirmButtonText: 'Si salir!',
                          cancelButtonText: 'No, todavia!'
                        }).then((result) => {
                          if (result.value) {
                            Swal.fire(
                              'Saliendo',
                              'Estas regresando a la pagina de Usuario.',
                              'success'
                            )
                            window.location ="<?php echo base_url().'Mantenimiento/Usuario/';?>"
                          }
                        
                
                        })
                        return false;
                 }
             </script>




            <div class="modal fade" id="exampleModal1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Cambiar imagen de <span class="text-success"><?php echo $name_users; ?></span></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body">
                    <form action="" method='post' role="form" class="form-horizontal" id="user_form-file">
                        <input type="hidden" name="Id" value="<?php echo $id;?>">
                        <div class="row" >
                            <div class="col-md-12">
                                <div class="form-group">
                                    <input type="file" id="input-file-now-custom-1" class="dropify" data-default-file="<?php echo base_url().'upload/';?>images/<?php if($picturex==""){echo "otros.jpg";}else{echo $picturex;} ?>" name="picture"/>
                                </div>
                            </div>
                        </div>
                        <hr>
                        <div class="row text-center">
                            <div class="col-md-12">
                                <div class="form-group">
                                     <button type="button" class="btn btn-outline-danger btn-rounded" data-dismiss="modal">Cerrar</button>
                                     <button type="submit" class="btn btn-outline-success btn-rounded">Actualizar</button>
                                </div>
                            </div>
                        </div>
                    </form>
                  </div>
                </div>
              </div>
            </div>
            
            <script>  
                  $(document).on('submit', '#user_form-file', function(event){  
                       event.preventDefault();  
                       var clave = $('#input-file-now-custom-1').val();  

                      
                        if (clave=='') {
                            alert("debe Ingresar Archivo");
                            return false;
                        } 
                       if(clave !="" )  
                       { 
                                
                     
                            $.ajax({  
                                 url:"<?php echo base_url().'Mantenimiento/Usuario/Cambiar_imagen/'?>",  
                                 method:'POST',  
                                 data:new FormData(this),  
                                 contentType:false,  
                                 processData:false,  
                                 success:function(data)  
                                 {  

                                    if (true) {
                                            Swal.fire({
                                              title: 'Muy Bien?',
                                              text: ''+ data+'',
                                              type: 'success',
                                              showCancelButton: false,
                                              confirmButtonColor: '#3085d6',
                                              cancelButtonColor: '#d33',
                                              confirmButtonText: 'OK'
                                            }).then((result) => {
                                              if (result.value) {

                                                

                                              }
                                            })

                                            $("#exampleModal1").modal('hide');//ocultamos el modal
                                             //clear on focus
                                            $('#input-file-now-custom-1').val("");
                                            //lo maximo estaba buscandp
                                            $("#div_contenido").load(location.href+" #div_contenido>*","");                           
                                             
                                    }
                                        
                                        
                                 },
                                 error: function()
                                 {
                                    Swal.fire(
                                          'Algo Pasó!',
                                          'Ponte en Contacto con el Administrador',
                                          'warning'
                                        )
                                }
    

                            });  
                        }
                       
             
                  });  







             </script> 



 