	

        <?php
            if (!empty($update)) {
             foreach ($update as $show) {
                $id = $show->id_usuario;
                $name_users = $show->nombres.' '. $show->apellido_paterno.' '.$show->apellido_materno;
                $profile = $show->id_perfil;
                $users_admin = $show->usuario_txt;
                //status fro users
                $status = $show->status;



                
            }
        }else{
                redirect(base_url().'Mantenimiento/Usuario/');
            } ?>
         <!-- Row -->
		         <div class="row animated bounce">
		        	<div class="col-md-12">
		        		<div class="card">
			        		<div class="card-body">
			        			<a href="javascript:void(0);" class="btn btn-outline-success btn-rounded" data-toggle="modal" data-target="#exampleModal"><i class=" fas fa-edit"></i>&nbsp;Actualizar Password </a>
			        		</div>
			        	</div>
		        	</div>
		        </div>


		        <!-- Modal -->
				<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
				  <div class="modal-dialog" role="document">
				    <div class="modal-content">
				      <div class="modal-header">
				        <h5 class="modal-title" id="exampleModalLabel">Actualizar contraseña de <span class="text-success"><?php echo $name_users; ?></span></h5>
				        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
				          <span aria-hidden="true">&times;</span>
				        </button>
				      </div>
				      <div class="modal-body">
				        <div class="container-fluid">
				        	<form autocomplete="off" action="" class="form-horizontal" id="update_from" onsubmit="return validarclave();">
				        		<input type="hidden" name="id" value="<?php echo $id;?>">
				        		<div class="row"> 
					        		<div class="col-md-6">
					        			<div class="form-group">
						        			<label for="" class="">Nueva Clave</label>
						        			<input type="password" name="clave" id="clave" class="form-control input" placeholder="********">
						        		</div>
					        		</div>
					        		<div class="col-md-6">
					        			<div class="form-group">
						        			<label for="" class="">Nuevamente Clave</label>
						        			<input type="password" name="clave_repeat" id="clave_repeat" class="form-control input" placeholder="*************">
						        		</div>
					        		</div>
					        	</div>
					        	<div class="row">
						        	<div class="col-12 text-center">
						        			<button type="button" class="btn btn-outline-danger btn-rounded" data-dismiss="modal">Cerrar</button>
						        			<button type="submit" class="btn btn-outline-success btn-rounded button">Actualizar</button>
						        	</div>
						        </div>
				        	</form>
				        </div>

				      </div>
				        
				    </div>
				  </div>
				</div>
                <!-- Row -->
                <div class="row animated bounce">
                    <div class="col-lg-12">
                        <div class="card ">
                            <div class="card-header bg-info">
                                <h4 class="m-b-0 text-white">Actualizar datos de: <?php echo $name_users; ?></h4>
                            </div>
                            
                            <div class="card-body" id="your_div_id">
                                <form  autocomplete="off" action="" class="form-horizontal" id="user_form" >
                                    <div class="form-body">
                                        <input type="hidden" name="Id" value="<?php echo $this->uri->segment(4,0)?>" >
                                    
                                        <h3 class="box-title">Información del usuario <span class="text-success"><?php echo $users_admin; ?></span></h3>
                                        <hr class="m-t-0 m-b-40">
                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="form-group row">
                                                    <label class="control-label text-right col-md-3">Usuario</label>
                                                    <div class="col-md-9">
                                                        <input type="text" name="usuario" class="form-control" id="usuario"  value="<?php echo $users_admin ?>" >
                                                        </div>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group row">
                                                    <label class="control-label text-right col-md-3">Perfil</label>
                                                    <div class="col-md-9">
                                                        <select class="form-control custom-select" name="id_perfil">
                                                            <?php foreach ($perfil_list as $gg) {?>
                                                            <?php if ($profile==$gg->Id){
                                                               $activo ="selected"; 
                                                            }else{
                                                                $activo="";
                                                            } ?>
                                                           <option value="<?php echo $gg->Id;?>" <?php echo $activo;?>><?php echo $gg->perfil; ?></option>
                                                            
                                                           
                                                      <?php } ?>
                                                        </select>
                                                        </div>
                                                </div>
                                            </div>
                                            <!--/span-->
                                            <div class="col-md-4">
                                                <div class="form-group row">
                                                    <label class="control-label text-right col-md-3">Estado</label>
                                                    <div class="col-md-9">
                                                        <select name ="estado"  id="estado" class="form-control">
                                                        	<?php foreach ($list_status as $list) {?>
                                                        		<?php if ($list->id_codigo==$status) {
                                                        			$act="selected";
                                                        		}else{
                                                        			$act="";
                                                        		} ?>
                                                        		<option value="<?php echo $list->Id;?>" <?php echo $act; ?>><?php echo $list->nombre; ?></option>
                                                        	<?php } ?>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            
                                            <!--/span-->
                                        </div>
                                       
                                   	 </div>
                                    <hr>
                                    <div class="form-actions">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="row text-center">
	                                                <div class="col-md-offset-3 col-md-12">
	                                                    <a href="javascript:void(0)" onclick="return regresar();" class="btn btn-outline-danger btn-rounded">Regresar</a>
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

                <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

                <script>  
                  $(document).on('submit', '#user_form', function(event){  
                       event.preventDefault();  
                       var nombre = $('#nombre').val();  
                       var descripcion = $('#descripcion').val();  
                       var picture = $('#picture').val();  
                       var producto = $('#producto').val();  
                       var cliente = $('#cliente').val();
             
                       if(nombre != '' && descripcion != '')  
                       { 
                                
                     
                            $.ajax({  
                                 url:"<?php echo base_url().'Mantenimiento/Usuario/update_users/'?>",  
                                 method:'POST',  
                                 data:new FormData(this),  
                                 contentType:false,  
                                 processData:false,  
                                 success:function(data)  
                                 {  

                                        if (true) {
                                            Swal.fire(
                                          'Muy Bien!',
                                          data,
                                          'success'
                                        )
                                        }
                                    //  swal($data)
                                      //$('#user_form')[0].reset();  
                                      //Esto manda que se recargue el div. y se cargue de manera automatica
                                       $("#your_div_id").load(" #your_div_id");
                                     // $('#userModal').modal('hide');  
                                    //  dataTable.ajax.reload();  
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




             <script>  
                  $(document).on('submit', '#update_from', function(event){  
                       event.preventDefault();  
                       var clave = $('#clave').val();  
                       var clave1 = $('#clave_repeat').val(); 
                      
             			if (clave!= clave1) {
             				alert("Deben ser iguales cojudo");
             				return false;
             			} 
                       if(clave !="" && clave1 != "")  
                       { 
                                
                     
                            $.ajax({  
                                 url:"<?php echo base_url().'Mantenimiento/Usuario/CambiarClave/'?>",  
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
											 $("#exampleModal").modal('hide');//ocultamos el modal
											 //clear on focus
											$('#clave').val("");
											$('#clave_repeat').val("");
											 
                                 	}

                                        // $("#exampleModal").load(" #exampleModal");

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
             