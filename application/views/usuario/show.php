			
			<?php
			if (!empty($show_users)) {
			 foreach ($show_users as $show) {
				$name_users = $show->nombres.' '. $show->apellido_paterno.' '.$show->apellido_materno;
				$users = $show->nombres;
				$last_name_pater = $show->apellido_paterno;
				$last_name_mater= $show->apellido_materno;
				$profile = $show->txtperfil;
				$gender = $show->txtgenero;
				$birthdate = $show->fecha_nacimiento;
				$mail = $show->email;
                $users_admin = $show->usuario_txt;
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

				
			}
		}else{
				redirect(base_url().'Mantenimiento/Usuario/');
			} ?>
	

			<!-- Row -->
                <!-- Row -->
                <div class="row animated bounce">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-header bg-info">
                                <h4 class="m-b-0 text-white"> info: <?php echo $name_users;?></h4>
                            </div>
                            <div class="card-body">
                                <form class="form-horizontal" role="form">
                                    <div class="form-body">
                                    	<h3 class="box-title">Información de Usuario</h3>
                                        <hr class="m-t-0 m-b-40">
                                        <div class="row">
                                        	<div class="col-md-3">
                                                <div class="form-group row">
                                                    <label class="control-label text-right col-md-3">Users:</label>
                                                    <div class="col-md-9">
                                                        <p class="form-control-static">
                                                        <?php if ($users_admin=="") {?>
	                                                        	<span class="label label-danger">Falta Agregar Usuario</span>
	                                                    <?php }else{?>
	                                                        	<?php echo $users_admin;?>
	                                                    <?php } ?>  </p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group row">
                                                    <label class="control-label text-right col-md-3">Perfil:</label>
                                                    <div class="col-md-9">
                                                        <p class="form-control-static">
                                                        <?php if ($profile==null) {?>
	                                                        	<span class="label label-danger">Falta Agregar Perfil</span>
	                                                    <?php }else{?>
	                                                        	<?php echo $profile;?>
	                                                    <?php } ?>  </p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group row">
                                                    <label class="control-label text-right col-md-3">Pass:</label>
                                                    <div class="col-md-9">
                                                        <p class="form-control-static">
														<?php echo "<span class='label label-success'>Confidencial!</span>"; ?>
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>
                                             <div class="col-md-3">
                                                <div class="form-group row">
                                                    <label class="control-label text-right col-md-3">Status</label>
                                                    <div class="col-md-9">
                                                        <p class="form-control-static"> 
                                                        	<?php if ($status==1) {?>
	                                                        	<span class="label label-success">Activado</span>
	                                                       <?php }else if($status==2){?>
	                                                        	<span class="label label-info">Pendiente</span>
	                                                       <?php }else if($status==3){?>
	                                                       		<span class="label label-danger">Anulado</span>
	                                                       <?php }else{?>
																<span class="label label-warning">otro motivo</span>
	                                                       <?php } ?> </p>
                                                    </div>
                                                </div>
                                            </div>
                                            <!--/span-->
                                        </div>
                                        <h3 class="box-title">Información Personal</h3>
                                        <hr class="m-t-0 m-b-40">
                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="form-group row">
                                                    <label class="control-label text-right col-md-3">Nombre:</label>
                                                    <div class="col-md-9">
                                                        <p class="form-control-static">
	                                                    <?php if ($users=="") {?>
	                                                        	<span class="label label-danger">Falta Agregar Nombre</span>
	                                                    <?php }else{?>
	                                                        	<?php echo $users;?>
	                                                    <?php } ?> </p>
	                                                      
                                                    </div>
                                                </div>
                                            </div>
                                            <!--/span-->
                                            <div class="col-md-4">
                                                <div class="form-group row">
                                                    <label class="control-label text-right col-md-3">Apellido Paterno:</label>
                                                    <div class="col-md-9">
                                                        <p class="form-control-static"> 
	                                                        <?php if ($last_name_pater=="") {?>
	                                                        	<span class="label label-danger">Falta Agregar Apellido Paterno</span>
	                                                       <?php }else{?>
	                                                        	<?php echo $last_name_pater;?>
	                                                       <?php } ?> 
                                                    	</p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group row">
                                                    <label class="control-label text-right col-md-3">Apellido Materno:</label>
                                                    <div class="col-md-9">
                                                        <p class="form-control-static"> 
                                                        	<?php if ($last_name_mater=="") {?>
	                                                        	<span class="label label-danger">Falta Agregar Apellido Materno</span>
	                                                       <?php }else{?>
	                                                        	<?php echo $last_name_mater;?>
	                                                       <?php } ?> </p>

                                                    </div>
                                                </div>
                                            </div>
                                            <!--/span-->
                                        </div>
                                        <!--/row-->
                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="form-group row">
                                                    <label class="control-label text-right col-md-3">Genero:</label>
                                                    <div class="col-md-9">
                                                        <p class="form-control-static"> <?php echo $gender; ?> </p>
                                                    </div>
                                                </div>
                                            </div>
                                            <!--/span-->
                                            <div class="col-md-4">
                                                <div class="form-group row">
                                                    <label class="control-label text-right col-md-3">Fecha de Nacimiento:</label>
                                                    <div class="col-md-9">
                                                        <p class="form-control-static"> 
                                                        <?php if ($birthdate=='0000-00-00') {?>
                                                        	<span class="label label-danger">Falta Agregar fecha nacimiento</span>
                                                      <?php  }else{?>
                                                        	<?php echo $birthdate;?>
                                                      <?php  }?> </p>
                                                    </div>
                                                </div>
                                            </div>
                                            <!--/span-->
                                        </div>
                                        <!--/row-->
                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="form-group row">
                                                    <label class="control-label text-right col-md-3">Email:</label>
                                                    <div class="col-md-9">
                                                        <p class="form-control-static"> 
                                                        	<?php if ($mail=="") {?>
	                                                        	<span class="label label-danger">Falta Agregar Email</span>
	                                                       <?php }else{?>
	                                                        	<?php echo $mail;?>
	                                                       <?php } ?>                                               </p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group row">
                                                    <label class="control-label text-right col-md-3">Edad:</label>
                                                    <div class="col-md-9">
                                                        <p class="form-control-static"> 
                                                        	<?php if ($edadx=="") {?>
	                                                        	<span class="label label-danger">Tienes que actualizar tu fecha de nacimiento, por ahora no existe tu edad <?php echo $users; ?></span>
	                                                       <?php }else{?>
	                                                        	<?php echo $edadx;?>
	                                                       <?php } ?>                                               </p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group row">
                                                    <label class="control-label text-right col-md-3">Celular:</label>
                                                    <div class="col-md-9">
                                                        <p class="form-control-static"> 
                                                        	<?php if ($celphone=="") {?>
	                                                        	<span class="label label-danger">Aun no as Agregado  Celular</span>
	                                                       <?php }else{?>
	                                                        	<?php echo $celphone;?>
	                                                       <?php } ?>                                               </p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group row">
                                                    <label class="control-label text-right col-md-3">Telefóno:</label>
                                                    <div class="col-md-9">
                                                        <p class="form-control-static"> 
                                                        	<?php if ($telephone=="") {?>
	                                                        	<span class="label label-danger">Aun no as Agregado Telefono</span>
	                                                       <?php }else{?>
	                                                        	<?php echo $telephone;?>
	                                                       <?php } ?>                                               </p>
                                                    </div>
                                                </div>
                                            </div>
                                            <!--/span-->
                                           
                                            <!--/span-->
                                        </div>
                                        <!--/row-->
                                        <h3 class="box-title">Dirección</h3>
                                        <hr class="m-t-0 m-b-40">
                                        <div class="row">
                                        	<div class="col-md-4">
                                                <div class="form-group row">
                                                    <label class="control-label text-right col-md-3">Address:</label>
                                                    <div class="col-md-9">
                                                        <p class="form-control-static">
                                                        	<?php if ($addrress=="") {?>
	                                                        	<span class="label label-danger">Falta Agregar Dirección</span>
	                                                       	<?php }else{?>
	                                                        	<?php echo $addrress;?>
	                                                       	<?php } ?>
	                                                    </p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group row">
                                                    <label class="control-label text-right col-md-6">Departamento:</label>
                                                    <div class="col-md-6">
                                                        <p class="form-control-static">
                                                        <?php if ($departament=="") {?>
	                                                        	<span class="label label-danger">Falta Agregar Departamento</span>
	                                                       	<?php }else{?>
	                                                        	<?php echo $departament;?>
	                                                       	<?php } ?>  
	                                                    </p>
                                                    </div>
                                                </div>
                                            </div>
                                            <!--/span-->
                                            <div class="col-md-4">
                                                <div class="form-group row">
                                                    <label class="control-label text-right col-md-3">Provincia:</label>
                                                    <div class="col-md-9">
                                                        <p class="form-control-static">
                                                        <?php if ($provinciax=="") {?>
	                                                        	<span class="label label-danger">Falta Agregar Provincia</span>
	                                                       	<?php }else{?>
	                                                        	<?php echo $provinciax;?>
	                                                       	<?php } ?>    </p>
                                                    </div>
                                                </div>
                                            </div>
                                            <!--/span-->
                                            <div class="col-md-4">
                                                <div class="form-group row">
                                                    <label class="control-label text-right col-md-3">Distrito:</label>
                                                    <div class="col-md-9">
                                                        <p class="form-control-static">
                                                        <?php if ($distritox=="") {?>
	                                                        	<span class="label label-danger">Falta Agregar Distrito</span>
	                                                       	<?php }else{?>
	                                                        	<?php echo $distritox;?>
	                                                       	<?php } ?>    </p>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-md-4">
                                                <div class="form-group row">
                                                    <label class="control-label text-right col-md-3">Pais:</label>
                                                    <div class="col-md-9">
                                                        <p class="form-control-static">  
                                                        	<?php if ($country=="") {?>
	                                                        	<span class="label label-danger">Falta Agregar Distrito</span>
	                                                       	<?php }else{?>
	                                                        	<?php echo $country;?>
	                                                       	<?php } ?>     
	                                                    </p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                

                                        <h3 class="box-title"> Información de Website</h3>
                                        <hr class="m-t-0 m-b-40">
                                        <div class="row">
                                        	<div class="col-md-4">
                                                <div class="form-group row">
                                                    <label class="control-label text-right col-md-3">Website:</label>
                                                    <div class="col-md-9">
                                                        <p class="form-control-static">
                                                        <?php if ($websitex=="") {?>
	                                                        	<span class="label label-danger">Aun no as Insertado la URL de tu Web</span>
	                                                    <?php }else{?>
	                                                        	<?php echo $websitex;?>
	                                                    <?php } ?>  </p>
                                                    </div>
                                                </div>
                                            </div>
                                            <!--/span-->
                                        </div>
                                        <h3 class="box-title">Información de Redes Sociales</h3>
                                        <hr class="m-t-0 m-b-40">
                                        <div class="row">
                                        	<div class="col-md-6">
                                                <div class="form-group row">
                                                    <label class="control-label text-right col-md-3">Facebook:</label>
                                                    <div class="col-md-9">
                                                        <p class="form-control-static">
                                                        <?php if ($facebookx=="") {?>
	                                                        	<span class="label label-danger">Aun no as Insertado la URL de Facebook</span>
	                                                    <?php }else{?>
	                                                        	<?php echo $facebookx;?>
	                                                    <?php } ?>  </p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group row">
                                                    <label class="control-label text-right col-md-3">Google:</label>
                                                    <div class="col-md-9">
                                                        <p class="form-control-static">
                                                        <?php if ($googlex==null) {?>
	                                                        	<span class="label label-danger">Aun no as Insertado la URL de Google</span>
	                                                    <?php }else{?>
	                                                        	<?php echo $googlex;?>
	                                                    <?php } ?>  </p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group row">
                                                    <label class="control-label text-right col-md-3">LinkedIn:</label>
                                                    <div class="col-md-9">
                                                        <p class="form-control-static">
                                                        <?php if ($linkedInx==null) {?>
	                                                        	<span class="label label-danger">Aun no as Insertado la URL de Instagram</span>
	                                                    <?php }else{?>
	                                                        	<?php echo $linkedInx;?>
	                                                    <?php } ?>  </p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group row">
                                                    <label class="control-label text-right col-md-3">Instagram:</label>
                                                    <div class="col-md-9">
                                                        <p class="form-control-static">
                                                        <?php if ($instagramx==null) {?>
	                                                        	<span class="label label-danger">Aun no as Insertado la URL de Instagram</span>
	                                                    <?php }else{?>
	                                                        	<?php echo $instagramx;?>
	                                                    <?php } ?>  </p>
                                                    </div>
                                                </div>
                                            </div>
                                            <!--/span-->
                                        </div>

                                    </div>
                                    <div class="form-actions">
                                        <div class="row text-center">
                                            <div class="col-md-12">
                                                <div class="row">
                                                    <div class="col-md-offset-3 col-md-12">
                                                        <a href="" onclick="return regresar();" class="btn btn-outline-success btn-rounded"> <i class="fa fa-pencil"></i> Regresar</a>
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

                <script>
                	
                		 	
                	function regresar() {
                		Swal.fire({
						  title: '¿Estás seguro?',
						  text: "¡Estas apunto de salir de Ventana Mostrar",
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