<?php if (!empty($configuracion_usuarios_x)) {
        foreach ($configuracion_usuarios_x as $emp) {
            $nombrex = $emp->razon_social;
            $rucx = $emp->ruc;
            $urlx = $emp->url;
            $direccionx = $emp->direccion;
            $id_departamento = $emp->id_departamento;
            $id_provincia = $emp->id_provincia;
            $id_distrito = $emp->id_distrito;
            $id_rubro = $emp->id_rubro;
            $nombre_comercialx = $emp->nombre_comercial;
            $actividad_economicax = $emp->actividad_economica;
            $contactox = $emp->contacto;
            $emailx = $emp->email;
            $telefonox = $emp->telefono;
            $departamentox = $emp->departamento;
            $provinciax = $emp->provincia;
            $distritox = $emp->distrito;
            $rubrox = $emp->rubro;
            $idx = $emp->Id;
            $idxx = $emp->id_usuario;
        }
    }else{

        redirect(base_url().'Sistema/');
        
    } ?>


				<!-- ============================================================== -->
                <!-- End Bread crumb and right sidebar toggle -->
                <!-- ============================================================== -->
                <!-- ============================================================== -->
                <!-- Start Page Content -->
                <!-- ============================================================== -->
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title"><?php echo $nombrex; ?></h4>
                                <form class="floating-labels m-t-40"   autocomplete="on" id="actualizar_datos" method="post" action="#" >
                                    <input type="hidden" value="<?php echo $this->session->userdata("Id");?>" name="Id">
                                    <input type="hidden" value="<?php echo $idxx;?>" name="id_usuario">
                                    <div class="form-group m-b-40">
                                        <input type="text" class="form-control" id="usuariox" name="usuariox" placeholder="" value="<?php echo $rucx;?>" readonly>
                                        <span class="bar"></span>
                                        <label for="input1">Usuario</label>
                                    </div>
                                    <div class="form-group m-b-40">
                                        <input type="text" class="form-control" id="emailx" name="emailx" placeholder="" value="<?php echo $emailx;?>" >
                                        <span class="bar"></span>
                                        <label for="input1">Email</label>
                                    </div>
                                    
                                    <div class="form-group m-b-40 custom-control custom-checkbox">
                                        <input type="checkbox" name="cbmostrar"  class="fantasma custom-control-input mr-sm-2" id="checkbox2">
                                        <label class="custom-control-label" for="checkbox2">Cambiar la contraseña</label>
                                    </div>
                                    <span id="dvOcultar" style="display: none;">
                                    <div class="form-group m-b-40">
                                        <input type="password" class="form-control" id="newpassword"  autocomplete="" name="clave" >
                                        <span class="bar"></span>
                                        <label for="input2">New Password</label>

                                    </div>
                                    <div class="form-group m-b-40">
                                        <input type="password" class="form-control" id="confirmnewpassword" value="" name="clave_repeat" >
                                        <span class="bar"></span>
                                        <label for="input2">Confirm new Password</label>
                                    </div>
                                    </span>
                                    <div class="form-group">
                                        <div class="col-sm-12">
                                            <button type="submit" class="btn btn-outline-success btn-rounded btn-md"><i class="fas fa-pencil-alt"></i>&nbsp;Actualizar Perfil</button>
                                            <a class="btn btn-outline-danger btn-rounded btn-md" href="<?php echo base_url().'Sistema/';?>"><i class="fas fa-reply"></i>&nbsp;Cancelar</a>
                                        </div>
                                    </div>


                                  
                                </form>
                            </div>
                        </div>
                       
                    </div>
                </div>


                <!-- ============================================================== -->
                <!-- End PAge Content -->
                <!-- ============================================================== -->
                <!-- ============================================================== -->
                <!-- Right sidebar -->
                <!-- ============================================================== -->
                <!-- .right-sidebar -->

                <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script> 


                <script>


                    
                    //enviamos los datos de la empresa validaciones qiue se hacen al momento de ebviar
                    //
                    //
        
                        
            $(document).ready(function() {
                $(document).on('submit', '#actualizar_datos', function(event){
                   event.preventDefault(); 
                    var emailxx = $("#emailx").val();
                    var clavexx = $("#newpassword").val();
                    var clavexx1 = $("#confirmnewpassword").val();
                    var checkbox2x = $("#checkbox2").val();


                    expr = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;

                      if ( !expr.test(emailxx) ){

                        Swal.fire({
                          position: 'top-end',
                          icon: 'warning',
                          text: "La dirección de correo " + emailxx + " es incorrecta.",
                          showConfirmButton: false,
                          timer: 1500
                        })
                        $("#emailx").focus();
                        return false;
                      }else{

                      }
                    if( $('#checkbox2').prop('checked')) {
                        
                    if (clavexx=="" || clavexx==0) {
                          Swal.fire({
                            position: 'top-end',
                            icon: 'warning',
                            text: 'El campo New-Password esta vacio',
                            showConfirmButton: false,
                            timer: 1500
                          })
                          $("#clavex").focus();

                         return false;

                       }

                       //clave2 

                       if (clavexx1=="" || clavexx1==0) {
                          Swal.fire({
                            position: 'top-end',
                            icon: 'warning',
                            text: 'El campo Confirm-Password esta vacio',
                            showConfirmButton: false,
                            timer: 1500
                          })
                          $("#clavex1").focus();
                       
                         return false;

                        }

                       if (clavexx != clavexx1) {
                            Swal.fire({
                                position: 'top-end',
                                icon: 'warning',
                                text: 'Ambas contraseñas deben ser iguales',
                                showConfirmButton: false,
                                timer: 1500
                              })
                             $("#newpassword").focus();
                             return false;
                           }

                    }else{
                        //clave

                       
                    }

                  

                  $.ajax({
                    url: '<?php echo base_url().'Mantenimiento/Configuracion/actualizar_usuario_x_empresa/';?>',
                    method:'POST',  
                    data:new FormData(this),  
                    contentType:false,  
                    processData:false,  
                    success:function(data) {
                        var json = JSON.parse(data);

                        Swal.fire({
                          title: 'Muy bien',
                          text: ""+json.mensaje+"",
                          icon: 'success',
                          allowOutsideClick: false,
                          showCancelButton: false,
                          showConfirmButton : true,
                          confirmButtonColor: '#3085d6',
                          cancelButtonColor: '#d33',
                          confirmButtonText: 'Ok'
                        }).then((result) => {
                          if (result.value) {
                           
                          }
                        })

                     
                                                 
                        
                    },statusCode:{
                  400: function(xhr){

                    var json = JSON.parse(xhr.responseText);
                    if (json.alerta) {
                      //
                      //
                      let timerInterval
                        Swal.fire({
                          title: ''+json.alerta+'',
                          html: 'Se actualizo correctamente los datos se cerrará en <b> </b> segundos.',
                          timer: 4000,
                          timerProgressBar: true,
                          onBeforeOpen: () => {
                            Swal.showLoading()
                            timerInterval = setInterval(() => {
                              Swal.getContent().querySelector('b')
                                .textContent = Swal.getTimerLeft()
                            }, 100)
                          },
                          onClose: () => {
                            clearInterval(timerInterval)
                          }
                        }).then((result) => {
                          if (
                            /* Read more about handling dismissals below */
                            result.dismiss === Swal.DismissReason.timer
                          ) {
                             window.location="<?php echo base_url().'Login/salir/';?>";
                          }
                        })
                      //
                      //
                      //
                    }
                  }
                    
                  }
                 
                 
                }); 
            });                        
              
            });



                
                </script>
         

                
