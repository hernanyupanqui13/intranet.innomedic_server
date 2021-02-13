				
			<?php
			$data_ficha_personal = $this->db->query("select * from ts_datos_personales where id_usuario=".$this->session->userdata("session_id")."");
			foreach ($data_ficha_personal->result() as $xx) {
				$apellido_paternox = $xx->apellido_paterno;
				$apellido_maternox = $xx->apellido_materno;
				$nombres_completosx = $xx->nombres;

			} ?>

	
			<?php 	foreach ($lista_de_salud as $xx) {
				$id_tipo_emfermedadx = $xx->id_tipo_emfermedad;
				$id_tratamientox = $xx->id_tratamiento;
				$otros_descriptionx = $xx->otros_description;
			} ?>
				<div class="row" id="ocultar_data" style="display: none;">
                    <div class="col-lg-12">
                        <div class="card ">
                            <div class="card-header bg-info">
                                <h4 class="m-b-0 text-white">Seguro de Salud</h4>
                            </div>
                            <div class="card-body">
                                <form action="#" class="form-horizontal" id="insertar_salud_x_id">
                                    <div class="form-body">
                                        <h3 class="box-title">En caso de sufrir de alguna enfermedad, complete el siguiente recuadro:</h3>
                                        <hr class="m-t-0 m-b-20">
                                        <div class="row">
                                            <div class="col-md-2">
                                                <div class="form-group">
                                                  
                                                    <div class="btn-group mt-3" data-toggle="buttons" role="group">
			                                            <label class="btn btn-outline btn-success ">
			                                                <div class="custom-control custom-radio">
			                                                    <input type="radio" id="Respiratoria" name="id_tipo_emfermedad" value="Respiratoria" class="custom-control-input" <?php 
																		$favcolor = $id_tipo_emfermedadx;

																		switch ($favcolor) {
																		    case "Respiratoria":
																		        echo "checked";
																		        break;
																		        
																		    default:
																		        echo "";
																		}
																	
																	?>>
			                                                    <label class="custom-control-label" for="Respiratoria"> <i class=" text-active" aria-hidden="true"></i> Respiratoria</label>
			                                                </div>
			                                            </label>
			                                        </div>
                                                </div>
                                            </div>
                                            <div class="col-md-2">
                                            	<div class="form-group">
                                                    <div class="btn-group mt-3" data-toggle="buttons" role="group">
			                                           <label class="btn btn-outline btn-success">
			                                                <div class="custom-control custom-radio">
			                                                    <input type="radio" id="Hipertensión" name="id_tipo_emfermedad" value="Hipertensión" class="custom-control-input" <?php 
																		$favcolor = $id_tipo_emfermedadx;

																		switch ($favcolor) {
																		    case "Hipertensión":
																		        echo "checked";
																		        break;
																		        
																		    default:
																		        echo "";
																		}
																	
																	?>>
			                                                    <label class="custom-control-label" for="Hipertensión"> <i class="text-active" aria-hidden="true"></i> Hipertensión</label>
			                                                </div>
			                                            </label>
			                                        </div>
                                                </div>
                                            </div>
                                            <div class="col-md-2">
                                            	<div class="form-group">
                                                    <div class="btn-group mt-3" data-toggle="buttons" role="group">
			                                            <label class="btn btn-outline btn-success ">
			                                                <div class="custom-control custom-radio">
			                                                    <input type="radio" id="Dermatológica" name="id_tipo_emfermedad" value="Dermatológica" class="custom-control-input" <?php 
																		$favcolor = $id_tipo_emfermedadx;

																		switch ($favcolor) {
																		    case "Dermatológica":
																		        echo "checked";
																		        break;
																		        
																		    default:
																		        echo "";
																		}
																	
																	?>>
			                                                    <label class="custom-control-label" for="Dermatológica"> <i class=" text-active" aria-hidden="true"></i> Dermatológica</label>
			                                                </div>
			                                            </label>
			                                        </div>
                                                </div>
                                            </div>

                                            <!--/span-->
                                            <div class="col-md-2">
                                                <div class="form-group">
                                                  
                                                    <div class="btn-group mt-3" data-toggle="buttons" role="group">
			                                            <label class="btn btn-outline btn-success">
			                                                <div class="custom-control custom-radio">
			                                                    <input type="radio" id="Musco-esqueléticas" name="id_tipo_emfermedad" value="Musco-esqueléticas" class="custom-control-input" <?php 
																		$favcolor = $id_tipo_emfermedadx;

																		switch ($favcolor) {
																		    case "Musco-esqueléticas":
																		        echo "checked";
																		        break;
																		        
																		    default:
																		        echo "";
																		}
																	
																	?>>
			                                                    <label class="custom-control-label" for="Musco-esqueléticas"> <i class=" text-active" aria-hidden="true"></i> Musco-esqueléticas</label>
			                                                </div>
			                                            </label>
			                                        </div>
                                                </div>
                                            </div>

                                            <div class="col-md-2">
                                            	<div class="form-group">
                                                    <div class="btn-group mt-3" data-toggle="buttons" role="group">
			                                            <label class="btn btn-outline btn-success">
			                                                <div class="custom-control custom-radio">
			                                                    <input type="radio" id="epilepsia" name="id_tipo_emfermedad" value="epilepsia" class="custom-control-input" <?php 
																		$favcolor = $id_tipo_emfermedadx;

																		switch ($favcolor) {
																		    case "epilepsia":
																		        echo "checked";
																		        break;
																		        
																		    default:
																		        echo "";
																		}
																	
																	?>>
			                                                    <label class="custom-control-label" for="epilepsia"> <i class="text-active" aria-hidden="true"></i> epilepsia</label>
			                                                </div>
			                                            </label>
			                                        </div>
                                                </div>
                                            </div>

                                           <div class="col-md-1">
	                                           <div class="form-group m-15">

	                                           	
		                                           <label class="btn btn-outline btn-success">
	                                                <div class="custom-control custom-radio">
	                                                    <input type="checkbox" id="ocultar_estado_civil" name="id_tipo_emfermedad" value="Otros" class="custom-control-input fantasma_x">
	                                                    <label class="custom-control-label" for="ocultar_estado_civil"> <i class="ti-check text-active" aria-hidden="true"></i> Otros</label>
	                                                </div>

	                                            </label>
		                                           
		                                       </div>
		                                   </div>
											
                                           
                                            
                                            <!--/span-->
                                        </div>
                                        <!--/row-->
                                        <div class="row" id="ocultando_datos_cxx" style="display: none;">
                                            <div class="col-md-12" >
                                                <div class="form-group row">
                                                    <label class="">¿Por que?</label>
                                                    <div class="col-md-12">
                                                    	 <textarea class="form-control" name="otros_description" rows="5" ><?php echo $otros_descriptionx; ?></textarea>
                                                    </div>
                                                </div>
                                            </div>
                                            <!--/span-->
                                            <div class="col-md-6">
                                                <div class="form-group row">
                                                    <label class="control-label col-md-12">Recibes atención Medica</label>
                                                    <div class="btn-group mt-3" data-toggle="buttons" role="group">
			                                            <label class="btn btn-outline btn-info">
			                                                <div class="custom-control custom-radio">
			                                                    <input type="radio" id="customRadio1" name="id_tratamiento" value="NO" class="custom-control-input"  <?php 
																		$favcolor = $id_tratamientox;

																		switch ($favcolor) {
																		    case "NO":
																		        echo "checked";
																		        break;
																		        
																		    default:
																		        echo "";
																		}
																	
																	?>>
			                                                    <label class="custom-control-label" for="customRadio1"> <i class="ti-check text-active" aria-hidden="true"></i> NO</label>
			                                                </div>
			                                            </label>
			                                            <label class="btn btn-outline btn-info">
			                                                <div class="custom-control custom-radio">
			                                                    <input type="radio" id="customRadio2" name="id_tratamiento" value="SI" class="custom-control-input"
			                                                     <?php 
																		$favcolor = $id_tratamientox;

																		switch ($favcolor) {
																		    case "SI":
																		        echo "checked";
																		        break;
																		        
																		    default:
																		        echo "";
																		}
																	
																	?>>
			                                                    <label class="custom-control-label" for="customRadio2"> <i class="ti-check text-active" aria-hidden="true"></i> SI</label>
			                                                </div>
			                                            </label>
			                                           
			                                        </div>
                                                </div>
                                            </div>
                                           
                                            <!--/span-->
                                        </div>
                                      
                                        <!--/row-->
                                    </div>
                                    <hr>
                                    <div class="form-actions">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="row">
                                                    <div class="col-md-offset-3 col-md-9">
                                                        <button type="submit" class="btn btn-outline-success btn-rounded"><i class=" fas fa-plus-circle"></i>&nbsp;Guardar</button>
                                                        <button type="button" class="btn btn-outline-danger btn-rounded" id="return_valided">Cancelar</button>
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
                <div class="row" id="mostrar_data">
                	<div class="col-lg-12">
                        <div class="card ">
                            <div class="card-header bg-info">
                                <h4 class="m-b-0 text-white">Seguro de Salud</h4>
                            </div>
                            <div class="card-body">
                            	<div class="row" id="upating_rest">
                            		<div class="col-md-4">
                            			<div class="form-group">
										    <label class="text-info">Tipo Enfermedad</label>
										    <small class="form-text text-dark"><?php echo $id_tipo_emfermedadx;?></small>
										  </div>
                            		</div>
                            		<?php if ($id_tipo_emfermedadx=="Otros") {?>
                            		<div class="col-md-2">
                            			<div class="form-group">
										    <label class="text-info">Tratamiento</label>
										    <small class="form-text text-dark"><?php echo $id_tratamientox;?></small>
										  </div>
                            		</div>
                            		<div class="col-md-6">
                            			<div class="form-group">
										    <label class="text-info">Descripción</label>
										    <small class="form-text text-dark"><?php echo $otros_descriptionx;?></small>
										  </div>
                            		</div>
                            	
	                            	<?php }else{
	                            		echo "";
	                            	} ?>
	                            		
                            		
                            	</div>

                            	<div class="form-group">
                            		<div class="col-md-12">
                            			<a href="javascript:void(0)" id="mostrar_oculto" class="btn btn-success btn-rounded"><i class=" fas fa-pencil-alt"></i>&nbsp;Editar</a>
                            		</div>
                            	</div>
                            	
                            	
                            </div>
                        </div>
                    </div>
                </div>
                

				<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>




			<script>
				$(document).ready(function(){ 
				    $("#ocultar_estado_civil").click(function() {
				    	if(!$(this).prop('checked')){
			                $('#ocultando_datos_cxx').hide();
			            }else{
			                $('#ocultando_datos_cxx').show();
			            }
				      //  $("#ocultar_vive").show();
				        
				    });

				    $("#mostrar_oculto").on( "click", function() {
                        $('#ocultar_data').show();
                        $('#mostrar_data').hide(); //muestro mediante id
                        //$('#mostrar_view').show();

                    });

                     $("#return_valided").on( "click", function() {
                        $('#ocultar_data').hide();
                        $('#mostrar_data').show(); //muestro mediante id
                        //$('#mostrar_view').show();

                    });

                    

				

				    


				});
			</script>

			 <script>
                $(document).ready(function(){
                    
                    $(document).on('submit', '#insertar_salud_x_id', function(event){  
                       event.preventDefault();  
                        $.ajax({  
                             url:"<?php echo base_url().'View_intranet/Seguro_salud/update_salud/';?>",
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
                               //   $('#user_form')[0].reset();  
                                  $('#mostrar_data').show();   
                                  $("#ocultar_data").hide();
                                  //$("#xxx_xxx").show();
                                  //$("#xx").show();
                                  $("#upating_rest").load(location.href+" #upating_rest>*","");                            
                                 //  $('#div_load_id').load("#div_load_id");
                                 // dataTable.ajax.reload();  
                             }  
                        });  
                       
                        
                  }); 


                     
                });

                
            </script>

			

            

              