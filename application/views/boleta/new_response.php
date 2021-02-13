				<?php $query = $this->db->query("select count(*) as total from ts_email_enviado_users");
                foreach ($query->result() as $xx) {
                    $total_xxx = $xx->total;
                 } ?>

        <?php
           
	            $data_ficha_personal = $this->db->query("select id_usuario,apellido_paterno,apellido_materno,nombres
	            from ts_datos_personales where id_usuario=".$this->session->userdata("session_id")."");
	            foreach ($data_ficha_personal->result() as $xx) {
	                $nombres_completosx = $xx->apellido_paterno." " . $xx->apellido_materno.", ".$xx->nombres;
	                $id_usuario_x = $xx->id_usuario;

	      } ?>

				<?php $query = $this->db->query("select count(*) as total from ts_entrega_boleta");
          foreach ($query->result() as $xx) {
              $total_xx = $xx->total;
        } ?>

      <?php 
        foreach ($mostrar_registro_reponse as $xx) {
         $email_users = $xx->email_users;
         $nombres_userio = $xx->nombre_usuario;
         $id_user = $xx->id_usuario;
         $mensaje_users = $xx->mensaje;
         $asunto___users = $xx->asunto;
        }
      ?>


            

				<!-- ============================================================== -->
                <!-- End Bread crumb and right sidebar toggle -->
                <!-- ============================================================== -->
                <!-- ============================================================== -->
                <!-- Start Page Content -->
                <!-- ============================================================== -->
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="row">
                                <div class="col-xlg-2 col-lg-3 col-md-4 ">
                                    <div class="card-body inbox-panel"><a href="<?php echo base_url().'Mantenimiento/Enviar_Boleta_Pago/Agregar_Nuevo/';?>" class="btn btn-danger m-b-20 p-10 btn-block waves-effect waves-light">Nuevo Mensaje <i class=" fas fa-comment-dots"></i></a>
                                        <ul class="list-group list-group-full">
                                          <li class="list-group-item "> <a href="<?php echo base_url().'Mantenimiento/Enviar_Boleta_Pago/entrada/';?>"><i class="mdi mdi-gmail"></i> Bandeja de entrada </a><span class="badge badge-success ml-auto"><?php if ($total_xxx=="" || $total_xxx==null) {
                                                   echo "0";
                                                 }else{
                                                    echo $total_xxx;
                                                }?></span></li>
                                           <!-- <li class="list-group-item "> <a href="javascript:void(0)"><i class="mdi mdi-gmail"></i> Bandeja de entrada </a><span class="badge badge-success ml-auto">6</span></li>
                                            <li class="list-group-item">
                                                <a href="javascript:void(0)"> <i class="mdi mdi-star"></i> Mensajes destacados </a>
                                            </li>
                                            <li class="list-group-item">
                                                <a href="javascript:void(0)"> <i class="mdi mdi-send"></i> Redactada </a><span class="badge badge-danger ml-auto">3</span></li>-->
                                            <li class="list-group-item active">
                                                <a href="<?php echo base_url().'Mantenimiento/Enviar_Boleta_Pago/';?>"> <i class="mdi mdi-file-document-box "></i> Correo enviado </a><span class="badge badge-success ml-auto"><?php if ($total_xx=="" || $total_xx==null) {
                                                   echo "0";
                                                 }else{
                                                    echo $total_xx;
                                                }?></span>
                                            </li>
                                           <!-- <li class="list-group-item">
                                                <a href="javascript:void(0)"> <i class="mdi mdi-delete"></i> Basura </a>
                                            </li>-->
                                        </ul>
                                        <h3 class="card-title m-t-40">Etiquetas</h3>
                                        <div class="list-group b-0 mail-list"> 
                                            <a href="javascript:void(0)" class="list-group-item"><span class="fa fa-circle text-info m-r-10"></span>Trabajador</a> 
                                           <!-- <a href="javascript:void(0)" class="list-group-item"><span class="fa fa-circle text-warning m-r-10"></span>Familia</a> 
                                            <a href="javascript:void(0)" class="list-group-item"><span class="fa fa-circle text-purple m-r-10"></span>Privado</a> 
                                            <a href="javascript:void(0)" class="list-group-item"><span class="fa fa-circle text-danger m-r-10"></span>Amigos</a> 
                                            <a href="javascript:void(0)" class="list-group-item"><span class="fa fa-circle text-success m-r-10"></span>Corporación</a> -->
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xlg-10 col-lg-9 col-md-8 bg-light border-left">
                                    <div class="card-body">
                                    	<form action="" id="registrar_data_boleta">
                                    		<input type="hidden" name="nombres_completos" value="<?php echo  $nombres_completosx;?>">

	                                        <h3 class="card-title">Responder correo a: <?php echo $nombres_userio;?></h3>
	                                        <div class="form-group">
	                                            <input class="form-control" readonly="" placeholder="Para:" name="para" id="mostrar_registros_usuario_email" maxlength="5" value="<?php echo $nombres_userio;?> <<?php echo $email_users?>>">
	                                            <input type="hidden" name="id_usuario" id="id_usuario_id___" value="<?php echo $email_users;?>">
	                                            <input type="hidden" name="id_usuario_id" id="id_usuario_id_xxx" value="<?php echo $id_user;?>">
	                                        </div>
	                                        <div class="form-group">
	                                            <input class="form-control" readonly="" placeholder="Asunto:" name="asunto" id="asunto___" value="<?php echo "Reenviado <$asunto___users>"; ?>">
	                                        </div>
	                                        <div class="form-group">
	                                            <textarea class="textarea_editor form-control" rows="15" placeholder="Ingrese su mensaje" name="mensaje" id="mensaje_____" ><?php echo "
                                              <br>
                                              <br>$mensaje_users "; ?></textarea>
	                                        </div>
	                                        <h4><i class="ti-link"></i> Adjunto archivo</h4>
	                                        <div class="form-group">
					                            <input type="file" id="picture" class="dropify" name="picture"  onchange="fileValidatiosn(this);"/>
	                                        </div>
	                                       
	                                        <button type="submit" class="btn btn-success m-t-20"><i class="fa fa-envelope-o"></i> Send</button>
	                                        <button class="btn btn-dark m-t-20"><i class="fa fa-times"></i> Discard</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- ============================================================== -->
                <!-- End Page Content -->
                <!-- ============================================================== -->
                <!-- ============================================================== -->
                <!-- Right sidebar -->
                <!-- ============================================================== -->
                <!-- .right-sidebar -->
                <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

                <script>
                	$(document).ready(function() {
                		$(document).on('submit', '#registrar_data_boleta', function(event) {
                			event.preventDefault();

                			var mostrar_registros_usuario_email = $("#mostrar_registros_usuario_email").val();
                			var asunto___ = $("#asunto___").val();
                			var mensaje_____ = $("#mensaje_____").val();
                			var picture = $("#picture").val();

                			if (mostrar_registros_usuario_email == null || mostrar_registros_usuario_email.length == 0 || /^\s+$/.test(mostrar_registros_usuario_email) ) {
                				Swal.fire({
		                          title: 'Destinatario',
		                          text: "Este mensaje debe tener un destinatario.",
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
                			//ASUNTO
                			if (asunto___ == null || asunto___.length == 0 || /^\s+$/.test(asunto___) ) {
                				Swal.fire({
		                          title: 'Asunto',
		                          text: "Ingrese Asunto.",
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
                			//mensaje

                			if (mensaje_____ == null || mensaje_____.length == 0 || /^\s+$/.test(mensaje_____) ) {
                				Swal.fire({
		                          title: 'Mensaje',
		                          text: "Ingrese su mensaje.",
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

                			//archivo

                			if (picture == null || picture.length == 0 || /^\s+$/.test(picture) ) {
		                        Swal.fire({
		                          title: 'Ingrese Archivo pdf/png/Jpge//',
		                          text: "Ingrese archivo esta vacio",
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
                			/* Act on the event */
                			var datos = jQuery(this).serialize();
                			$.ajax({
                				url: '<?php echo base_url().'Mantenimiento/Enviar_Boleta_Pago/agregar_nuevo_registro/';?>',
                				type: 'POST',
                				data:new FormData(this),  
				                contentType:false,  
				                processData:false,
				                cache: false,  
                			
                			})
                			.done(function() {
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
								  title: 'Se registro correctamente'
								})
								$('#registrar_data_boleta')[0].reset(); 
                 window.location = "<?php echo base_url().'Mantenimiento/Enviar_Boleta_Pago/entrada/' ;?>";
								
								
                				console.log("success");
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
                          title: 'Solicitud de Ajax abortada ' + jqXHR.responseText+''
                        })


                      }
                })
                			.always(function() {
                				console.log("complete");
                			});
                			
                		});
                	});
                </script>

                <script>
            function fileValidatiosn(obj){
                var uploadFile = obj.files[0];

                if (!window.FileReader) {
                    alert('El navegador no soporta la lectura de archivos');
                    return;
                }

                if (!(/\.(jpg|png|gif|pdf)$/i).test(uploadFile.name)) {
                  Swal.fire({
                  title: 'Files',
                  text: "El archivo a adjuntar no es una imagen solo acepta jpg|png|gif|pdf",
                  icon: 'warning',
                  showCancelButton: false,
                  confirmButtonColor: '#3085d6',
                  cancelButtonColor: '#d33',
                  confirmButtonText: 'ok'
                }).then((result) => {
                  if (result.value) {
                    $("#picture").val("");
                   // $("#user_image").val("");
                  }
                })
                   
                }

                var uploadFile = obj.files[0];
                var img = new Image();
                img.onload = function ()
                {
              /*  if (this.width.toFixed(0) != 600 && this.height.toFixed(0) != 600)
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

              
                }*/
                };
                img.src = URL.createObjectURL(uploadFile);
                
                                                       
            }
        </script>

        <script>
        	function validate_xx() {
        		window.location="<?php echo base_url().'Mantenimiento/Enviar_Boleta_Pago/Agregar_Nuevo/';?>"
        	}
        </script>

              