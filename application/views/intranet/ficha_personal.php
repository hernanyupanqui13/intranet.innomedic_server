			
			<?php foreach ($data_ficha_personal as $xx) {
				$nombres_completosxx = $xx->nombres ." ". $xx->apellido_paterno." ".$xx->apellido_materno;
				$apellido_paternox = $xx->apellido_paterno;
				$apellido_maternox = $xx->apellido_materno;
				$nombres_completosx = $xx->nombres;
				$departamentox = $xx->departamento;
				$provinciax = $xx->provincia;
				$distritox = $xx->distrito;
				$dni_mostrar_dni = $xx->nro_documento;
				$direccionx = $xx->direccion;
                $numerox = $xx->numero;
                $interiorx = $xx->interior;
                $mzlotex = $xx->mzlote;
                $referenciax = $xx->referencia;
                $urbanizacionx = $xx->urbanizacion;
				$fecha_nacimientox =$xx->fecha_nacimiento;
				$id_departamentox = $xx->id_departamento;
				$id_provinciax = $xx->id_provincia;
				$id_distritox = $xx->id_distrito;
				$id_estadox = $xx->id_estado;
				$estado_civilx = $xx->estado_civil;
				$generox = $xx->id_genero;
				$id_lugar_nacimiento_dep_x = $xx->id_lugar_nacimiento_dep;
				$nacimiento = $xx->nacimiento;
				$telefono_movilx = $xx->telefono_movil;
				$telefono_domiciliox = $xx->telefono_domicilio;
				$emailx = $xx->email;
				$talla_pantalon_x = $xx->talla_pantalon;
				$tallax  = $xx->talla;
				$comunicarse_con_x = $xx->comunicarse_con;
				$nro_emergenciax = $xx->nro_emergencia;
				$imagenx = $xx->imagen;
				$fecha_nac = $xx->fecha_nac_dia;
                $id_otros = $xx->id_otros;




			} ?>
		
			<div class="row" >
				<div class="col-md-12 col-lg-6 col-xl-6">
                    <div class="card card-body" id="mostrar_view2">
                        <div class="row align-items-center" id="mostrar_view">
                            <div class="col-md-4 col-lg-3 text-center">
                                <a href="javascript:void(0)">
                                	<?php if ($imagenx==="" or $imagenx === NULL) {?>
                                    	<img  src="<?php echo base_url().'upload/';?>images/<?php echo $id_otros;?>"  alt="<?php echo $nombres_completosxx; ?>"  class="img-circle img-fluid " width="128"   >
                                    <?php }else{?>
										<img src="<?php echo base_url().'upload/';?>images/<?php echo $imagenx;?>"  alt="<?php echo $nombres_completosxx; ?>"  class="img-circle img-fluid" width="128"   >
                                    <?php } ?>  </a>

                            </div>
                            <div class="col-md-8 col-lg-9">
                                <h3 class="box-title m-b-0"><?php echo $nombres_completosxx; ?></h3> <small class="label label-success">DNI: <?php echo $dni_mostrar_dni; ?></small>
                                <small class="label label-primary">Fecha Nacimiento: <?php echo $fecha_nacimientox;?></small>
                                <address>
                                    <h4 class="m-0">Dirección:</h4>
                                    <span class="font-weight-bold">Av./Jr./Calle./Pasaje&nbsp;</span><?php echo $direccionx;?><br><span class="font-weight-bold">Nº&nbsp;</span><?php echo $numerox;?><br><span class="font-weight-bold">Interior&nbsp;</span><?php echo $interiorx;?><br><span class="font-weight-bold">Mz.Lote.Zona.Km&nbsp;</span><?php echo $mzlotex;?><br><span class="font-weight-bold">Referencia&nbsp;</span><?php echo $referenciax;?><br><span class="font-weight-bold">Urbanización&nbsp;</span><?php echo $urbanizacionx;?>
                                    <br/>
                                    <br/>
                                    <abbr title="Phone">Teléfono/Celular:</abbr> <?php echo $telefono_domiciliox; ?>&nbsp;-&nbsp;<?php echo $telefono_movilx; ?>
                                </address>


                                
                            </div>
                        </div>
                        <div class="form-actions" id="cargar" >
                        <div class="row">
                            <div class="col-md-6 text-right">
                                <div class="row">
                                    <div class="col-md-offset-3 col-md-9">
                                        <button  id="mostrar" class="btn btn-outline-success btn-rounded"> <i class=" fas fa-pencil-alt"></i> Actualizar</button>
                                        
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6"> </div>
                        </div>
                    </div>
                        
                    </div>


                </div>
			</div>

			<!--aqui sacamos los check-->
			<div class="row" id="ocultar_mostrar" style="display: none;">
			    <div class="col-lg-12">
			        <div class="card">
			           <div class="card-body">
			            	<!--esto es para actualizar-->
			            	<div >
			            		<!---->
			            		<?php if ($nombres_completosx=="") {?>
			            		<div class="">
		                    		<form method="post">
										<div class="col-md-4 has-success text-right">

											<input type="text" class="dni form-control " id="dni" name="dni" placeholder="Ingrese DNI presione enter">
										    <button style="display: none;" id="botoncito" class="botoncito btn btn-outline-success">Buscar</button>
										</div>
									</form>
		                    	</div>

			            		<?php }else{?>
									
			            		<?php } ?>

			            		
				                 <!--es hasta aqui-->
			            		<form action="" method="post" id="insertar_ficha_personal">
				                    <div class="form-body">
				                    	
				                    	<div class="row">
				                    		<div class="col-md-12 text-center">
				                                <div class="" >
				                                	<!--https://www.flaticon.es/icono-gratis/user_138659?term=user&page=1&position=14-->
				                                    <?php if ($imagenx==="" ||$imagenx===null) {?>
				                                    	<img src="<?php echo base_url().'upload/';?>images/<?php echo $id_otros; ?>" alt="" style="width: 150px; height: 150px;" class="img-circle">
				                                    <?php }else{?>
														<img src="<?php echo base_url().'upload/';?>images/<?php echo $imagenx;?>" alt="" style="width: 150px; height: 150px;" class="img-circle" >
				                                    <?php } ?>
				                                   
				                                    <a href="javascript:void(0)" data-toggle="modal" data-target="#exampleModal" class="btn btn-outline-success btn-rounded">Cambiar Imagen</a><p>Selecciona un archivo de no más de 5Mb, formatos jpg, jpeg o png  <span><a target="_blank" href="http://countingcharacters.com/image-resizer-online">Reducir Tamaño del Imagen</a></span></p>

				                                </div>

				                            </div>
				                    	</div>
				                    	
				                    	
				                        <div class="row" >
				                        	
				                            <div class="col-md-3">
				                                <div class="form-group">
				                                    <label class="control-label">Apellido Paterno</label>
				                                    <input type="text"  id="apellido_paterno" class="form-control" name="apellido_paterno" placeholder="Quispe" value="<?php echo $apellido_paternox;?> "  maxlength="80" onkeypress="return sololetras(event);"  readonly="" >
				                                     </div>
				                            </div>
				                            <!--/span-->
				                            <div class="col-md-3">
				                                <div class="form-group ">
				                                    <label class="control-label">Apellido Materno</label>
				                                    <input type="text" id="apellido_materno" name="apellido_materno" class="form-control form-control-danger" placeholder="Ramoz" value="<?php echo $apellido_maternox; ?>" maxlength="80" onkeypress="return sololetras(event);"  readonly="">
				                                     </div>
				                            </div>

				                            <div class="col-md-4">
				                                <div class="form-group ">
				                                    <label class="control-label">Nombres</label>
				                                    <input type="text" id="nombres_completos" name="nombres_completos" class="form-control form-control-danger" placeholder="Juana" value="<?php echo $nombres_completosx; ?>" maxlength="80" onkeypress="return sololetras(event);"  readonly="" >
				                                     </div>
				                            </div>
				                            <div class="col-md-2">
				                                <div class="form-group ">
				                                    <label class="control-label">DNI</label>
				                                    <input type="text" id="dni_mostrar_dni" name="dni_mostrar_dni" class="form-control form-control-danger" placeholder="70301125" value="<?php echo $dni_mostrar_dni;?>" maxlength="9" onkeydown="return soloNumeros(event);"  readonly="" >
				                                     </div>
				                            </div>
				                            <!--/span-->
				                        </div>
				                        <div class="row">
				                        	<div class="col-md-4">
				                                <div class="form-group ">
				                                    <label class="control-label">Departamento</label>
				                                    <select id="id_departamento" name="id_departamento" class="form-control select2" style="width: 100%; height:36px;">
				                                    	<option value="">--seleccione--</option>
				                                    	<?php foreach ($departamento as $xx) {?>
				                                    		<?php if ($id_departamentox==$xx->Id) {
		                                                        $select =  "selected";
		                                                    }else{
		                                                       $select =""; 
		                                                    } ?>
		                                                   
				                                    		<option value="<?php echo $xx->Id;?>"<?php echo $select;?>><?php echo $xx->departamento;?></option>
				                                    	<?php } ?>
				                                    </select>
				                                     </div>
				                            </div>
				                            <div class="col-md-4">
				                                <div class="form-group ">
				                                    <label class="control-label">Provincia</label>
				                                    <select  id="id_provincia" name="id_provincia" class="form-control select2" style="width: 100%; height:36px;">
				                                    	<?php if ($id_provinciax==0) {?>
                                                   
                                                		<?php }else{?>
		                                                <option value="<?php echo $id_provinciax;?>"><?php echo $provinciax;?></option>
		                                               <?php  } ?>
				                                    </select>
				                                     </div>
				                            </div>
				                            <div class="col-md-4">
				                                <div class="form-group ">
				                                    <label class="control-label">Distrito</label>
				                                    <select  id="id_distrito" name="id_distrito" class="form-control select2" style="width: 100%; height:36px;">
				                                    	<?php if ($id_distritox==0) {?>
                                                   
		                                                <?php }else{?>
		                                                <option value="<?php echo $id_distritox;?>"><?php echo $distritox;?></option>
		                                               <?php  } ?>
				                                    </select>
				                                     </div>
				                            </div>
				                            
				                        </div>
                                        <div class="row">
                                            <div class="col-md-3">
                                                <div class="form-group ">
                                                    <label class="control-label">Av./Jr./Calle/Pasaje</label>
                                                    <!--<input type="text" class="form-control" name="direccionx" id="direccionx" placeholder="----------" value="<?php echo $direccionx;?>" >-->

					                                        <div class="btn-group" data-toggle="buttons" role="group">
					                                            <label class="btn btn-outline btn-info <?php 
																		$direccion = $direccionx;

																		switch ($direccion) {
																		    case "Av":
																		        echo "active";
																		        break;
																		        
																		    default:
																		        echo "";
																		}
																	
																	?>">
					                                                <div class="custom-control custom-radio">
					                                                    <input type="radio" id="customRadio1" name="direccionx" value="Av" class="custom-control-input" <?php 
																		$direccion = $direccionx;

																		switch ($direccion) {
																		    case "Av":
																		        echo "checked";
																		        break;
																		        
																		    default:
																		        echo "";
																		}
																	
																	?>>
					                                                    <label class="custom-control-label" for="customRadio1"> <i class="ti-check text-active" aria-hidden="true"></i> Av</label>
					                                                </div>
					                                            </label>
					                                            <label class="btn btn-outline btn-info <?php 
																		$direccion = $direccionx;

																		switch ($direccion) {
																		    case "Jr":
																		        echo "active";
																		        break;
																		        
																		    default:
																		        echo "";
																		}
																	
																	?>">
					                                                <div class="custom-control custom-radio">
					                                                    <input type="radio" id="customRadio2" name="direccionx" value="Jr" class="custom-control-input" <?php 
																		$direccion = $direccionx;

																		switch ($direccion) {
																		    case "Jr":
																		        echo "checked";
																		        break;
																		        
																		    default:
																		        echo "";
																		}
																	
																	?>>
					                                                    <label class="custom-control-label" for="customRadio2"> <i class="ti-check text-active" aria-hidden="true"></i> Jr</label>
					                                                </div>
					                                            </label>
					                                            <label class="btn btn-outline btn-info <?php 
																		$direccion = $direccionx;

																		switch ($direccion) {
																		    case "Calle":
																		        echo "active";
																		        break;
																		        
																		    default:
																		        echo "";
																		}
																	
																	?>">
					                                                <div class="custom-control custom-radio">
					                                                    <input type="radio" id="customRadio3" name="direccionx" value="Calle" class="custom-control-input" <?php 
																		$direccion = $direccionx;

																		switch ($direccion) {
																		    case "Calle":
																		        echo "checked";
																		        break;
																		        
																		    default:
																		        echo "";
																		}
																	
																	?>>
					                                                    <label class="custom-control-label" for="customRadio3"> <i class="ti-check text-active" aria-hidden="true"></i> Calle</label>
					                                                </div>
					                                            </label>
					                                            <label class="btn btn-outline btn-info <?php 
																		$direccion = $direccionx;

																		switch ($direccion) {
																		    case "Pasaje":
																		        echo "active";
																		        break;
																		        
																		    default:
																		        echo "";
																		}
																	
																	?>">
					                                                <div class="custom-control custom-radio">
					                                                    <input type="radio" id="customRadio3" name="direccionx" value="Pasaje" class="custom-control-input" <?php 
																		$direccion = $direccionx;

																		switch ($direccion) {
																		    case "Pasaje":
																		        echo "checked";
																		        break;
																		        
																		    default:
																		        echo "";
																		}
																	
																	?>>
					                                                    <label class="custom-control-label" for="customRadio3"> <i class="ti-check text-active" aria-hidden="true"></i> Pasaje</label>
					                                                </div>
					                                            </label>
					                                        </div>
					                               
					                                </div>
                                                 
                                            </div>
                                            <div class="col-md-1">
                                                <div class="form-group ">
                                                    <label class="control-label">Nº</label>
                                                    <input type="text" class="form-control" name="numerox" id="numerox" placeholder="-----" value="<?php echo $numerox;?>" maxlength="5" onkeydown="return sololetrasnumeros(event);">
                                                 </div>
                                            </div>
                                            <div class="col-md-2">
                                                <div class="form-group ">
                                                    <label class="control-label">Interior</label>
                                                    <input type="text" class="form-control" name="interiorx" id="interiorx" placeholder="--------" value="<?php echo $interiorx;?>" maxlength="25" onkeydown="return sololetrasnumeros(event);">
                                                 </div>
                                            </div>
                                             <div class="col-md-2">
                                                <div class="form-group ">
                                                    <label class="control-label">Mz.Lote.Zona.Km</label>
                                                    <input type="text" class="form-control" name="mzlote" id="mzlote" placeholder="---------" value="<?php echo $mzlotex;?>" maxlength="25" onkeydown="return sololetrasnumeros(event);">
                                                 </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group ">
                                                    <label class="control-label">Urbanización</label>
                                                    <input type="text" class="form-control" name="urbanizacionx" id="urbanizacionx" placeholder="---------" value="<?php echo $urbanizacionx;?>" maxlength="50" onkeydown="return sololetrasnumeros(event);">
                                                 </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group ">
                                                    <label class="control-label">Referencia</label>
                                                    <input type="text" class="form-control" name="referenciax" id="referenciax" placeholder="---------" value="<?php echo $referenciax;?>" maxlength="50" onkeydown="return sololetrasnumeros(event);">
                                                 </div>
                                            </div>
                                        </div>
				                        <!--/row-->
				                        <div class="row">
				                        	

				                        	<div class="col-md-3">
				                                <div class="form-group">
				                                    <label class="control-label">Fecha de Nacimiento</label>
				                                    <input type="text" id="mdate" name="fecha_nacimiento" class="form-control" placeholder="<?php echo date('Y-m-d');?>"  value="<?php if($fecha_nacimientox=="0000-00-00"){ echo "1990-01-01";}else{ echo $fecha_nacimientox;} ?>">

				                                </div>
				                            </div>

				                            <!--/span-->
				                            <div class="col-md-5">
				                                <div class="form-group">
				                                	<label for="">Genero</label><br>
				                                    <div class="btn-group " data-toggle="buttons" role="group">
			                                            <label class="btn btn-outline btn-info <?php 
																		$favcolor = $generox;

																		switch ($favcolor) {
																		    case 2:
																		        echo "active";
																		        break;
																		        
																		    default:
																		        echo "";
																		}
																	
																	?>">
			                                                <div class="custom-control custom-radio">
			                                                    <input type="radio" id="customRadio1" name="genero" value="2" class="custom-control-input" <?php 
																		$favcolor = $generox;

																		switch ($favcolor) {
																		    case 2:
																		        echo "checked";
																		        break;
																		        
																		    default:
																		        echo "";
																		}
																	
																	?>>
			                                                    <label class="custom-control-label" for="customRadio1"> <i class="ti-check text-active" aria-hidden="true"></i> Femenino</label>
			                                                </div>
			                                            </label>
			                                            <label class="btn btn-outline btn-info <?php 
																		$favcolor = $generox;

																		switch ($favcolor) {
																		    case 1:
																		        echo "active";
																		        break;
																		        
																		    default:
																		        echo "";
																		}
																	
																	?>">
			                                                <div class="custom-control custom-radio">
			                                                    <input type="radio" id="customRadio2" name="genero" value="1" class="custom-control-input" <?php 
																		$favcolor = $generox;

																		switch ($favcolor) {
																		    case 1:
																		        echo "checked";
																		        break;
																		        
																		    default:
																		        echo "";
																		}
																	
																	?>>
			                                                    <label class="custom-control-label" for="customRadio2"> <i class="ti-check text-active" aria-hidden="true"></i> Masculino</label>
			                                                </div>
			                                            </label>
			                                            <!--<label class="btn btn-outline btn-info <?php 
																		$favcolor = $generox;

																		switch ($favcolor) {
																		    case 3:
																		        echo "active";
																		        break;
																		        
																		    default:
																		        echo "";
																		}
																	
																	?> " >
			                                                <div class="custom-control custom-radio">
			                                                    <input type="radio" id="customRadio3" name="genero" value="3" class="custom-control-input" <?php 
																		$favcolor = $generox;

																		switch ($favcolor) {
																		    case 3:
																		        echo "checked";
																		        break;
																		        
																		    default:
																		        echo "active";
																		}
																	
																	?>>
			                                                    <label class="custom-control-label" for="customRadio3"> <i class="ti-check text-active" aria-hidden="true"></i> N/A</label>
			                                                </div>
			                                            </label>-->
			                                        </div>
				                                </div>
				                            </div>
				                            <!--/span-->

				                            <div class="col-md-4">
				                                <div class="form-group">
				                                    <label class="control-label">Estado Civil</label>
				                                    <select class="form-control custom-select" name="id_estado" id="id_estado">
				                                        <option value="">--seleccione--</option>
				                                        <?php foreach ($estado_civil as $xx) {?>
				                                        	<?php if ($id_estadox==$xx->Id) {
		                                                        $select =  "selected";
		                                                    }else{
		                                                       $select =""; 
		                                                    } ?>
				                                        	<option value="<?php echo $xx->Id; ?>" <?php echo $select;?>><?php echo $xx->civil; ?></option>
				                                        <?php } ?>
				                                	</select>
				                                    
				                            	</div>
				                            </div>
				                            <!--/span-->
				                            
				                            <!--/span-->
				                        </div>          
				                    </div>
				                    <div class="row">
			                    	    <div class="col-md-3">
			                                <div class="form-group ">
			                                    <label class="control-label">Buscar lugar de Nacimiento</label>
			                                    <input type="text" id="autouser" class="form-control form-control-danger" placeholder="Lima" value="<?php echo $nacimiento;?>">
												<input type="hidden" id="userid" value='<?php echo $id_lugar_nacimiento_dep_x;?>' name="lugar_nacimiento" >
												
			                                </div>
			                            </div>
			                            <div class="col-md-2">
			                                <div class="form-group ">
			                                    <label class="control-label">Teléfono Movil</label>
			                                    <input type="text" id="telefono_movil" class="form-control form-control-danger" placeholder="+51 924543121" value="<?php echo $telefono_movilx;?>" name="telefono_movil" maxlength="9">
												
			                                </div>

			                            </div>
			                            <div class="col-md-2">
			                                <div class="form-group ">
			                                    <label class="control-label">Teléfono Domicilio</label>
			                                    <input type="text" id="telefono_domicilio" class="form-control form-control-danger" placeholder="01 624578" value="<?php echo $telefono_domiciliox ?>" name="telefono_domicilio" maxlength="11">
												
			                                </div>
			                            </div>
			                            <div class="col-md-5">
			                                <div class="form-group ">
			                                    <label class="control-label">Correo Eléctronico</label>
			                                    <input type="text" id="emailx" class="form-control form-control-danger" placeholder="info@innomedic.pe" value="<?php echo $emailx; ?>" name="emailx">
												
			                                </div>
			                            </div>
				                    </div>
				                    <div class="row">
				                    	<div class="col-md-5">
			                                <div class="form-group">
			                                	<label for="">Talla: Chaqueta/guardapolvo/Camisa / Blusa</label><br>
			                                    <div class="btn-group " data-toggle="buttons" role="group">
		                                            <label class="btn btn-outline btn-info <?php 
																		$favcolor = $tallax;

																		switch ($favcolor) {
																		    case "S":
																		        echo "active";
																		        break;
																		        
																		    default:
																		        echo "";
																		}
																	
																	?>">
		                                                <div class="custom-control custom-radio">
		                                                    <input type="radio" id="talla1" name="talla" value="S" class="custom-control-input" <?php 
																		$favcolor = $tallax;

																		switch ($favcolor) {
																		    case "S":
																		        echo "checked";
																		        break;
																		        
																		    default:
																		        echo "";
																		}
																	
																	?>>
		                                                    <label class="custom-control-label" for="talla1"> <i class="ti-check text-active" aria-hidden="true"></i> S</label>
		                                                </div>
		                                            </label>
		                                            <label class="btn btn-outline btn-info <?php 
																		$favcolor = $tallax;

																		switch ($favcolor) {
																		    case "M":
																		        echo "active";
																		        break;
																		        
																		    default:
																		        echo "";
																		}
																	
																	?>">
		                                                <div class="custom-control custom-radio">
		                                                    <input type="radio" id="talla2" name="talla" value="M" class="custom-control-input" <?php 
																		$favcolor = $tallax;

																		switch ($favcolor) {
																		    case "M":
																		        echo "checked";
																		        break;
																		        
																		    default:
																		        echo "";
																		}
																	
																	?>>
		                                                    <label class="custom-control-label" for="talla2"> <i class="ti-check text-active" aria-hidden="true"></i> M</label>
		                                                </div>
		                                            </label>
		                                            <label class="btn btn-outline btn-info <?php 
																		$favcolor = $tallax;

																		switch ($favcolor) {
																		    case "L":
																		        echo "active";
																		        break;
																		        
																		    default:
																		        echo "";
																		}
																	
																	?>">
		                                                <div class="custom-control custom-radio">
		                                                    <input type="radio" id="talla3" name="talla" value="L" class="custom-control-input"<?php 
																		$favcolor = $tallax;

																		switch ($favcolor) {
																		    case "L":
																		        echo "checked";
																		        break;
																		        
																		    default:
																		        echo "";
																		}
																	
																	?>>
		                                                    <label class="custom-control-label" for="talla3"> <i class="ti-check text-active" aria-hidden="true"></i> L</label>
		                                                </div>
		                                            </label>
		                                            <label class="btn btn-outline btn-info <?php 
																		$favcolor = $tallax;

																		switch ($favcolor) {
																		    case "XL":
																		        echo "active";
																		        break;
																		        
																		    default:
																		        echo "";
																		}
																	
																	?>">
		                                                <div class="custom-control custom-radio">
		                                                    <input type="radio" id="talla4" name="talla" value="XL" class="custom-control-input" <?php 
																		$favcolor = $tallax;

																		switch ($favcolor) {
																		    case "XL":
																		        echo "checked";
																		        break;
																		        
																		    default:
																		        echo "";
																		}
																	
																	?>>
		                                                    <label class="custom-control-label" for="talla4"> <i class="ti-check text-active" aria-hidden="true"></i> XL</label>
		                                                </div>
		                                            </label>
		                                            <label class="btn btn-outline btn-info <?php 
																		$favcolor = $tallax;

																		switch ($favcolor) {
																		    case "XXL":
																		        echo "active";
																		        break;
																		        
																		    default:
																		        echo "";
																		}
																	
																	?>">
		                                                <div class="custom-control custom-radio">
		                                                    <input type="radio" id="talla5" name="talla" value="XXL" class="custom-control-input" <?php 
																		$favcolor = $tallax;

																		switch ($favcolor) {
																		    case "XXL":
																		        echo "checked";
																		        break;
																		        
																		    default:
																		        echo "";
																		}
																	
																	?>>
		                                                    <label class="custom-control-label" for="talla5"> <i class="ti-check text-active" aria-hidden="true"></i> XXL</label>
		                                                </div>
		                                            </label>
		                                            
		                                        </div>
			                                </div>
				                            </div>
				                    	<div class="col-md-2">
				                    		<div class="form-group">
					                    		<label for="" class="control-label">Talla: Pantalón</label>
					                    		<input type="text" id="talla_pantalon" name="talla_pantalon" class="form-control" placeholder="31 - 32" value="<?php echo $talla_pantalon_x;?>">
					                    	</div>
				                    	</div>
				                    </div>
				                    <hr>
				                    <h3>Indique Un Nº De Teléfono en Caso De Emergencia</h3>
				                    <div class="row">
				                    	<div class="col-md-8">
				                    		<div class="form-group">
				                    			<label for="" class="control-label">Comunicarse con:</label>
				                    			<input type="text" class="form-control" placeholder="Juana ramoz" name="comunicare" id="comunicarse" value="<?php echo $comunicarse_con_x;?>">
				                    		</div>
				                    	</div>
				                    	<div class="col-md-4">
				                    		<div class="form-group">
				                    			<label for="" class="control-label">Al teléfono:</label>
				                    			<input type="text" class="form-control" placeholder="+51 924543121" name="telefono_comu" id="telefono_comu" value="<?php echo $nro_emergenciax;?>" maxlength="9">
				                    		</div>
				                    	</div>
				                    </div>
				                    <div class="form-actions">
				                        <button id="haciendo" type="submit" class="btn btn-outline-success"> <i class="fa fa-check"></i> Guardar</button>
				                        <a href="javascript:vodi(0)" id="regresar_id" class="btn btn-outline-danger">Cancelar</a>
				                    </div>
				                </form>			            		
			            	</div>
			                
			           </div>
			        </div>
			    </div>
			</div>


			

			<!--validamos los div para ocultar y mostrar los datos que se oueden mostra.-->

			<!--.<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>-->
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>



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

                function sololetras(e) {
                      key = e.keyCode || e.which;
                       tecla = String.fromCharCode(key).toLowerCase();
                       letras = " áéíóúabcdefghijklmnñopqrstuvwxyz";
                       especiales = "8-37-39-46";

                       tecla_especial = false
                       for(var i in especiales){
                            if(key == especiales[i]){
                                tecla_especial = true;
                                break;
                            }
                        }

                        if(letras.indexOf(tecla)==-1 && !tecla_especial){
                            return false;
                        }
                }
                function sololetrasnumeros(e) {
                  if(e.key.match(/[a-z0-9ñçáéíóú.-,\s]/i)===null) {
                        // Si la tecla pulsada no es la correcta, eliminado la pulsación
                        e.preventDefault();
                    }
                }

            </script>

            </script>



			 
			<script>

                 $("#mostrar").on( "click", function() {
                    $('#ocultar_mostrar').show();
                    $('#cargar').hide(); //muestro mediante id
                    $('#mostrar_view2').hide();
                    //$("#ocultar_mostrar").load(" #ocultar_mostrar");
                     //muestro mediante clase
                 });
                  $("#regresar_id").on( "click", function() {
                        $('#ocultar_mostrar').hide();
                        $('#cargar').show(); //muestro mediante id
                        $('#mostrar_view2').show();

                    });

				$(document).ready(function() {
				$(document).on('submit', '#insertar_ficha_personal', function(event){
                   event.preventDefault(); 
                 var nombres_completos = $("#nombres_completos").val(); 
                 var apellidop = $('#apellido_paterno').val();
                 var apellidom = $('#apellido_materno').val();
                 var dnix = $('#dni_mostrar_dni').val();
                // var direccion = $("#direccionx").val();
                 var numerox = $("#numerox").val();
                 var interiorx = $("#interiorx").val();
                 var mzlote = $("#mzlote").val();
                 var urbanizacionx = $("#urbanizacionx").val();
                 var referenciax = $("#referenciax").val();
                 var departamento = $("#id_departamento").val();
                 var provincia = $("#id_provincia").val();
                 var distrito = $("#id_distrito").val();
                 var fecha_nacimiento = $("#mdate").val();
                 var telefono_movil = $("#telefono_movil").val();
                 var emailxx = $("#emailx").val();
                 var comunicarse =$("#comunicarse").val();
                 var telefono_comu = $("#telefono_comu").val();
                 var autouser=$("#autouser").val();

                    //Nombre

                    if (nombres_completos=="" || nombres_completos==0 ) {
                        Swal.fire(
                          'Error!',
                          'El campo nombre esta vacio',
                          'error',  
                        )
                    return false;
                   }else if(nombres_completos.length<=1|| nombres_completos.length>80) {
                    Swal.fire(
                          'Error!',
                          'El campo nombre no puede ser menor a 2 caracteres ni mayor a 80 caracteres',
                          'error'
                        )
                    return false;
                   }
                   //validacion del campo apellido paterno
                   if (apellidop=="" || apellidop==0 ) {
                        Swal.fire(
                          'Error!',
                          'El campo apellido Paterno esta vacio',
                          'error',  
                        )
                    return false;
                   }else if(apellidop.length<=3|| apellidop.length>80) {
                    Swal.fire(
                          'Error!',
                          'El campo apellido Paterno no puede ser menor a 3 caracteres ni mayor a 80 caracteres',
                          'error'
                        )
                    return false;
                   }

                   if (apellidom=="" || apellidom==0) {
                    Swal.fire(
                          'Error!',
                          'El campo apellido Materno esta vacio',
                          'error'
                        )
                  
                    return false;
                   }else if(apellidom.length<=3 || apellidom.length>80) {
                    Swal.fire(
                          'Error!',
                          'El campo apellido Paterno no puede ser menor a 2 caracteres ni mayor a 80 caracteres',
                          'error'
                        )
                    return false;
                   }

                   //validacion de dni 

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
                           
                          }
                        })
                    return false;
                   }

                    /*if( !(/^\d{9}$/.test(dnix)) ) {
                        Swal.fire({
                          title: 'Dni',
                          text: "El DNI tiene que tener 8 caracteres Passaport 9 caracteres",
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
                    }*/
                    //Departamento

                    if( departamento == null || departamento == 0 ) {
                        Swal.fire({
                          title: 'Departamento',
                          text: "Seleccione departamento",
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
                    //Provincia
                    if( provincia == null || provincia == 0 ) {
                        Swal.fire({
                          title: 'Provincia',
                          text: "Seleccione provincia",
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
                    //Distrito
                    if( distrito == null || distrito == 0 ) {
                        Swal.fire({
                          title: 'Distrito',
                          text: "Seleccione distrito",
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
                    //fecha de nacimiento
                    if( fecha_nacimiento == null || fecha_nacimiento == 0 ) {
                        Swal.fire({
                          title: 'Fecha Nacimiento',
                          text: "Ingrese de Nacimiento",
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


                    //DIRECCION

                   /* if (direccion == null || direccion.length == 0 || /^\s+$/.test(direccion) ) {
                        Swal.fire({
                          title: 'Av./Jr./Calle./Pasaje',
                          text: "Ingrese Av./Jr./Calle./Pasaje",
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
                       }else if(direccion.length>=50){
                            Swal.fire({
                              title: 'Av./Jr./Calle./Pasaje',
                              text: "El campo Av./Jr./Calle./Pasaje no puede ser mayor a 50 caracteres",
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
                       }*/

                      /* if (numerox == null || numerox.length == 0 || /^\s+$/.test(numerox) ) {
                        Swal.fire({
                          title: 'Nº',
                          text: "Ingrese Nº",
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
                       if (interiorx == null || interiorx.length == 0 || /^\s+$/.test(interiorx) ) {
                        Swal.fire({
                          title: 'Interior',
                          text: "Ingrese Interior",
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

                       if (mzlote == null || mzlote.length == 0 || /^\s+$/.test(mzlote) ) {
                        Swal.fire({
                          title: 'Mz.Lote',
                          text: "Ingrese Mz.Lote",
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

                       if (urbanizacionx == null || urbanizacionx.length == 0 || /^\s+$/.test(urbanizacionx) ) {
                        Swal.fire({
                          title: 'Urbanización',
                          text: "Ingrese Urbanización",
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
                       if (referenciax == null || referenciax.length == 0 || /^\s+$/.test(referenciax) ) {
                        Swal.fire({
                          title: 'Referencia',
                          text: "Ingrese Referencia",
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
                       }*/



                    //FECHA DE NACIMIENTO

                     //falata validar campo fecha de nacimiento

                    //ESDTADO

                    indice = document.getElementById("id_estado").selectedIndex;
                    if( indice == null || indice == 0 ) {
                        Swal.fire({
                          title: 'Estado civil',
                          text: "Ingrese estado civil",
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


                    //Buscar lugar de nacimiento

                  /*if (autouser == null || autouser.length == 0 || /^\s+$/.test(autouser) ) {
                    Swal.fire({
                      title: 'Lugar de Nacimiento',
                      text: "Realizar una busqueda por Lugar de Nacimiento",
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
                   }else if(autouser.length<=2){
                        Swal.fire({
                          title: 'Lugar de Nacimiento',
                          text: "El Lugar de Nacimiento no puede ser menor a 2 caracteres",
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
                   }else if(autouser.length>=60){
                        Swal.fire({
                          title: 'Lugar de Nacimiento',
                          text: "El Lugar de Nacimiento no puede ser mayor a 70 caracteres",
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
                   }*/

                    //GENERO

                    if(!$("input[name='genero']").is(':checked')){
                        Swal.fire({
                          title: 'Genero',
                          text: "Seleccione genero",
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

                    //TELEFONO MOVIL


                    if( !(/^\d{9}$/.test(telefono_movil)) ) {
                        Swal.fire({
                          title: 'Telefóno Móvil',
                          text: "Ingrese Telefóno Celular Valido",
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

                    //CORREO - EMAIL

                    expr = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;

                  if ( !expr.test(emailxx) ){
                        Swal.fire({
                          title: 'E-mail',
                          text: "La dirección de correo " + emailxx + " es incorrecta.",
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

                  //COMUNICARSE CON

                  /*  if (comunicarse == null || comunicarse.length == 0 || /^\s+$/.test(comunicarse) ) {
                        Swal.fire({
                          title: 'comunicacion',
                          text: "El campo de comunicacion esta vacio",
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
                       }else if(comunicarse.length<=2){
                            Swal.fire({
                              title: 'comunicacion',
                              text: "El dato de comunicacion no puede ser menor a 2 caracteres",
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
                       }else if(comunicarse.length>=60){
                            Swal.fire({
                              title: 'comunicacion',
                              text: "El dato de comunicacion no puede ser mayor a 60 caracteres",
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
                       }*/

                   //TELEFONO COMUNICACION

                  /* if( !(/^\d{9}$/.test(telefono_comu)) ) {
                        Swal.fire({
                          title: 'Telefóno Móvil',
                          text: "Ingrese Telefóno de comunicación Valido",
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
                    }*/


                   $.ajax({
                   		url: '<?php echo base_url().'View_intranet/Ficha_personal/Datos_personales/';?>',
	                    method:'POST',  
	                    data:new FormData(this),  
	                    contentType:false,  
	                    processData:false,  
	                    success:function(data){
	                    	//devolvemos los datos del from
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

							$("#mostrar_view2").show();
							$("#ocultar_mostrar").hide();
							$('#cargar').show();
							$("#mostrar_view").load(location.href+" #mostrar_view>*","");
							//$("#mostrar_view1").load(location.href+" #mostrar_view1>*","");
						//	$("#mostrar_view").load(" #mostrar_view");


							

					    }

                   });
                  });
				});
				
			</script>

			<script>
	            var today = new Date();
	            var dd = today.getDate();
	            var mm = today.getMonth() + 1; //January is 0!

	            var yyyy = today.getFullYear();
	            if (dd < 10) {
	              dd = '0' + dd;
	            } 
	            if (mm < 10) {
	              mm = '0' + mm;
	            } 
	            var today = dd + '/' + mm + '-' + yyyy;
	            document.getElementById('date').value = today;
        	</script>

	      
    





	       





       		

      


            


    		<!-- Button trigger modal -->


			<!-- Modal -->
			<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
			  <div class="modal-dialog" role="document">
			    <div class="modal-content">
			      <div class="modal-header">
			        <h5 class="modal-title" id="exampleModalLabel"><?php echo $nombres_completosx;?>&nbsp;<?php echo $apellido_paternox; ?>&nbsp;<?php echo $apellido_maternox;?></h5>
			        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
			          <span aria-hidden="true">&times;</span>
			        </button>
			      </div>
			      <div class="modal-body">
			      	<span><a target="_blank" href="http://countingcharacters.com/image-resizer-online">Reducir Tamaño Imagen</a></span>
			        <form role="form" method="post" enctype="multipart/form-data" id="actualizar_imagen">
					    <div class="panel">
					        <div class="panel-body">
					            <div class="form-group">
				                        <div class="card">
				                            <div class="card-body">
				                                <h4 class="card-title">Puedes Subir tu foto <?php echo $nombres_completosx; ?></h4>
				                                <label for="input-file-now-custom-1">tamaño permitido 128px x 128px</label>
				                                <input type="file" id="input-file-now-custom-1" name="picture" class="dropify" data-default-file="<?php echo base_url().'upload/';?>images/<?php if($imagenx==="" or $imagenx === NULL){ echo $id_otros;}else{ echo $imagenx;} ?>" />
				                            </div>
				                        </div>
					            </div>
					             <div class="form-group text-center">
					                <button type="submit" class="btn btn-outline-success btn-rounded btn-md"><i class="fas fa-sign-out-alt"></i> Actualizar</button>
					            </div>
					        </div>
					    </div>
					</form>
			      </div>
			      
			    </div>
			  </div>
			</div>




			<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

            
			<script>  
                $(document).on('submit', '#actualizar_imagen', function(event){
                     event.preventDefault();  
                     var imagen = $('#input-file-now-custom-1').val();  
                    // var banderaTamano = false;
                      var o = document.getElementById('input-file-now-custom-1');
                      var foto = o.files[0];
                      var c = 0;
                      var img = new Image();

                      //if (o.files.length == 0 || !(/\.(jpg|png)$/i).test(foto.name)) {
                        if (o.files.length == 0 || !(/\.(jpge|jpg|png|jpeg)$/i).test(foto.name)) {
                        Swal.fire({
                          icon: 'warning',
                          title: 'Oops...',
                          text: 'Ingrese una imagen con el formatos: /.png|jpg|jpge.',
                         
                        })
                        //alert('Ingrese una imagen con alguno de los siguientes formatos: .jpeg/.jpg/.png.');
                        return false;
                      }
                    

                     if(imagen !="" )  
                     {   
                   
                          $.ajax({  
                               url:"<?php echo base_url().'View_intranet/Ficha_personal/uploadimg/'?>",  
                               method:'POST',  
                               data:new FormData(this),  
                               contentType:false,  
                               processData:false,  
                               success:function(data)  
                               {  
                                var json = JSON.parse(data);

                                

                                  if (true) {
                                          Swal.fire({
                                            title: 'Muy Bien?',
                                            text: ''+ json.sms+'',
                                            icon: 'success',
                                            showCancelButton: false,
                                            confirmButtonColor: '#3085d6',
                                            cancelButtonColor: '#d33',
                                            confirmButtonText: 'OK'
                                          }).then((result) => {
                                            if (result.value) {  
                                                $("#exampleModal").modal('hide');//ocultamos el modal
                                                   //clear on focus
                                                  $('#input-file-now-custom-1').val("");
                                                  //lo maximo estaba buscandp
                                                  $("#div_load").load(location.href+" #div_load>*","");
                                            }
                                          })

                                                                     
                                           
                                  }   
                                      
                               },statusCode:{
                                  400: function(xhr){

                                    var json = JSON.parse(xhr.responseText);
                                    if (json.error) {

                                      Swal.fire({
                                          title: 'Lo siento mucho (︶︿︶)',
                                          text: ""+json.error+"",
                                          icon: 'warning',
                                          showCancelButton: false,
                                          confirmButtonColor: '#3085d6',
                                          cancelButtonColor: '#d33',
                                          confirmButtonText: 'Yes,(⌣́_⌣̀)!'
                                        }).then((result) => {
                                          if (result.value) {
                                            
                                          }
                                        })
                                   
                                    }
                                    
                                  }, error: function()
                                       {
                                          Swal.fire(
                                                'Algo Pasó!',
                                                'Ponte en Contacto con el Administrador',
                                                'warning'
                                              )
                                      }
                                  }

                         
                        });  
                      }



                });  

            </script> 


            

	        <script>

		        function alertyty() {
		           Swal.fire({
		              title: '¿Estás seguro?',
		              text: "¡No podrás revertir esto!",
		              icon: 'warning',
		              showCancelButton: true,
		              confirmButtonColor: '#3085d6',
		              cancelButtonColor: '#d33',
		              confirmButtonText: 'Si, eliminar!',
		              cancelButtonText: 'No, please!',
		            }).then((result) => {
		              if (result.value) {
		                if($("#table-details tr:last-child").attr('id') != 'row1'){
		                    $('#table-details tr:not(:first-child)')
		                .slice(0)
		                .remove();
		                }
		              }
		            })

		            return false;
		        }
		         /* $("body").on('click', '.btn-remove-detail-row-detalles', function (e) {
		           // $(document).on('click', '[data-action=finish]', function(){
		                e.preventDefault();
		                if($("#table-details tr:last-child").attr('id') != 'row1'){
		                    $('#table-details tr:not(:first-child)')
		                .slice(0)
		                .remove();
		                }
		                
		            });*/
	      	</script>

            

	      	





       

        


	





			

			