	

                    <?php if (!empty($lista_empresas_por_id_usuario)) {
						foreach ($lista_empresas_por_id_usuario as $emp) {
							$nombrex = $emp->razon_social;
							$rucx = $emp->ruc;
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
						}
					}else{

                        redirect(base_url().'Sistema/Programacion_online/');
						
					} ?>

                  <!--  https://www.codexworld.com/dynamic-dependent-select-box-using-jquery-ajax-php/
                  https://www.youtube.com/watch?v=lMjF79_Rc3I
              https://elshunior.blogspot.com/2017/06/ubigeo-mysql-base-de-datos-distro.html-->
				
					<div class="col-12">
                        <div class="card">
                            <div class="card-body " >
                                <h4 class="card-title"><span class="label label-success">Información de <?php if ($this->session->userdata("session_perfil")==1) {?>
                                    <?php echo $this->session->userdata("nombre") ?>
                                <?php }else{?>
                                   <?php echo $nombrex; ?>
                                <?php } ?></span></h4>
                                <form class="needs-validation  " novalidate id="<?php echo time(); ?>" action="" method="post">
                                    <input type="hidden" value="<?php echo $this->session->userdata("session_id");?>" name="id_usuario" id="id_usuario">
                                    <div class="form-row">
                                        <div class="col-md-3 mb-3">
                                            <label for="validationTooltip01">Ruc</label>
                                            <input type="text" class="form-control" name="ruc" readonly="" id="validationTooltip01" value="<?php echo $rucx;?>"  required>
                                            
                                        </div>
                                        <div class="col-md-4 mb-3">
                                            <label for="validationTooltip02">Razon Social</label>
                                            <input type="text" class="form-control" name="razon_social" readonly="" id="validationTooltip02"  value="<?php echo $nombrex; ?>" required>
                                            
                                        </div>
                                        
                                        <div class="col-md-5 mb-3">
                                            <label for="validationTooltip01">Nombre Comercial <?php if ($nombre_comercialx=="") {
                                                echo "<span class='label label-danger'>Falta agregar </span>";
                                            }else{
                                                echo "";
                                            } ?></label>
                                            <input type="text" class="form-control"  id="validationTooltip01" value="<?php echo $nombre_comercialx;?>" name="nombre_comercial"  required>

                                        </div>
                                        <div class="col-md-4 mb-3">
                                            <label for="validationTooltip01">Actividad Economica</label>
                                            <input type="text" class="form-control"  id="validationTooltip01" value="<?php echo $actividad_economicax;?>" name="actividad_economica" required >

                                        </div>
                                        <div class="col-md-5 mb-3">
                                            <label for="validationTooltip01">Direccion</label>
                                            <input type="text" class="form-control" readonly="" id="validationTooltip01" value="<?php echo $direccionx;?>" name="direccion"  required>
                                        </div>
                                        <div class="col-md-3 mb-3">
                                            <label for="validationTooltip03">Rubro</label>
                                            <select class="select2 form-control custom-select" id="id_rubro" name="id_rubro" style="width: 100%; height:36px;">
                                                <option value="">--Seleccione Rubro--</option>
                                                <?php $rubro = $this->db->query("select * from ts_rubro");
                                                 foreach ($rubro->result() as $rub) {?>
                                                <?php 
                                                    if ($id_rubro == $rub->Id) {
                                                        $rubs = "selected";
                                                  }else{
                                                        $rubs ="";
                                                   }?>
                                            <option value="<?php echo $rub->Id;?>" <?php echo $rubs;?>><?php echo $rub->nombre;?></option>
                                                    
                                                <?php } ?>
                                                
                                            </select>
                                        </div>


                                    </div>
                          
                                    
                                    <div class="form-row">
                                        
                                        <div class="col-md-3 mb-3">
                                            <label for="validationTooltip03">Departamento</label>
                                            <select id="id_departamento" name="id_departamento" class="select2 form-control custom-select" style="width: 100%; height:36px;">
                                                <option value="0">--Seleccione Departamento--</option>
                                                <?php foreach ($departamento as $xx) {?>
                                                    <?php if ($id_departamento==$xx->Id) {
                                                        $select =  "selected";
                                                    }else{
                                                       $select =""; 
                                                    } ?>
                                        <option value="<?php echo $xx->Id;?>" <?php echo $select;?>><?php echo $xx->departamento;?></option>
                                                <?php } ?> 
                                            </select>
                                        </div>
                                        
                                        <div class="col-md-3 mb-3">
                                            <label for="validationTooltip03">Provincia</label>
                                            <select class="select2 form-control custom-select" id="id_provincia" name="id_provincia" style="width: 100%; height:36px;">
                                                <?php if ($id_provincia==0) {?>
                                                   
                                                <?php }else{?>
                                                <option value="<?php echo $id_provincia;?>"><?php echo $provinciax;?></option>
                                               <?php  } ?>
                                            </select>

                                        </div>
                                        <div class="col-md-3 mb-3">
                                            <label for="validationTooltip03">Distrito</label>
                                            <select class="select2 form-control custom-select" id="id_distrito" name="id_distrito" style="width: 100%; height:36px;">
                                                <?php if ($id_distrito==0) {?>
                                                   
                                                <?php }else{?>
                                                <option value="<?php echo $id_distrito;?>"><?php echo $distritox;?></option>
                                               <?php  } ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="col-md-4 mb-3">
                                            <label for="validationTooltip01">Representante Legal</label>
                                            <input type="text" class="form-control"  id="validationTooltip01" value="<?php echo $contactox;?>" name="contacto"  required >

                                        </div>
                                        <div class="col-md-4 mb-3">
                                            <label for="validationTooltip01">Telefono/Celular</label>
                                            <input type="text" class="form-control" name="telefono"  id="validationTooltip01" value="<?php echo $telefonox;?>"  required >

                                        </div>
                                        <div class="col-md-4 mb-3">
                                            <label for="validationTooltip01">Email</label>
                                            <input type="text" class="form-control"  id="validationTooltip01" value="<?php echo $emailx;?>" name="email" required >

                                        </div>
                                    </div>
                                  
                            
                                    <button class="btn btn-outline-success btn-rounded btn-md" type="submit"><i class=" fas fa-chevron-circle-right"></i>&nbsp;Actualizar</button>
                                </form>
                            </div>
                        </div>
                    </div>


                   <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script> .-->


                   