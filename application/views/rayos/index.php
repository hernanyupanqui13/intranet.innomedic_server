<?php
            if (!empty($rayos_view_register)) {
             foreach ($rayos_view_register as $xx) {

                $dni = $xx->dni;
                $nombres_completos = $xx->apellido_paterno.' '.$xx->apellido_materno.', '.$xx->nombre;
                $id_sexo = $xx->id_sexo;
                $fecha_nacimiento= $xx->fecha_nacimiento;
                $empresa = $xx->empresa;
                $ruc = $xx->ruc;
                $edad = $xx->edad;	
                $id_paquete = $xx->id_paquete;
                $id_unico = $xx->Id;
                

            }
        }else{
                redirect(base_url().'Examenes/Ordenes/');
            } ?>

<?php
            if (!empty($vista_rayox)) {
             foreach ($vista_rayox as $xx) {
                $motivo = $xx->motivo;
                $motivo1 = $xx->motivo1;

            }
        }else{
               
            } ?>


            
            
<div class="row">
	<div class="col-md-12">
		<div class="card">
			<div class="card-body">
	            <div class="card-header bg-warning ">
                    <h4 class="m-b-0 text-white text-center ">Rayos X </h4>
                </div>
                <div class="card-body">
                   
                        <div class="row">
                        	<?php if ($empresa=="" || $empresa==null) {?>
                        		<div class="col-md-12">
                        			<h3 class="card-title">Datos del Paciente</h3>
	                            	<hr>
	                            		<div class="row">
			                                <div class="col-md-6">
			                                    <span class="font-weight-bold">Nro. Doc:</span>
			                                    <p> <?php echo  $dni; ?> </p>
			                                </div>
			                                <!--/span-->
			                                <div class="col-md-6">
			                                    <span class="font-weight-bold">Apellidos y Nombres:</span><br>
			                                    <p> <?php echo $nombres_completos; ?></p>
			                                </div>
			                                <!--/span-->
			                                <div class="col-md-6">
			                                	<?php foreach ($seleccione_sexo as $key) { 
									                  if($id_sexo == $key->Id){ ?>
									                  	<span class="font-weight-bold">Sexo:</span>
				                                            <p> <?php echo  $key->nombre; ?></p>
									                 <?php }else{
									                 	echo "";
									                  }
									               } ?>
			                                </div>
			                                <!--/span-->
			                                <div class="col-md-3">
			                                    <span class="font-weight-bold">Fecha Nacimiento:</span>
			                                    <p><?php echo $fecha_nacimiento; ?> </p>
			                                </div>
			                                 <div class="col-md-3">
			                                 	<span class="font-weight-bold">Edad:</span>
			                                    <p> <?php echo $edad; ?> </p>
			                                </div>
			                            </div>
			                            <!--/row-->
			                    </div>
		                        <div class="col-md-12">
	                        	<?php if ($empresa =="" || $empresa==null) {?>
	                            <?php }else{?>
	                            	<h3 class="card-title">Datos de la empresa</h3>
		                            <hr>
		                            <!--/row-->
		                            <div class="row">
	                            		<div class="col-md-12">
	                            			<span class="font-weight-bold">Empresa:</span>
	                                        <div class="col-md-9">
	                                            <p> <?php echo $empresa; ?> </p>
	                                        </div>
	                                    </div>
	                                </div>
	                                <div class="col-md-12">
	                                		<span class="font-weight-bold">Ruc:</span>
	                                        <p> <?php echo $ruc; ?> </p>
	                                </div>
	                                <!--/span-->
			                    </div>
	                            <?php } ?>
			                        </div>
                        	<?php }else{?>
                        		<div class="col-md-8">
                        		<h3 class="card-title">Datos del Paciente</h3>
                    			<hr>
                        			<div class="row">
		                                <div class="col-md-6">
		                                    <span class="font-weight-bold">Nro. Doc:</span>
		                                    <p> <?php echo  $dni; ?> </p>
		                                </div>
		                                <!--/span-->
		                                <div class="col-md-6">
		                                    <span class="font-weight-bold">Apellidos y Nombres:</span><br>
		                                    <p> <?php echo $nombres_completos; ?></p>    
		                                </div>
		                                <!--/span-->
		                                <div class="col-md-6">
		                                	<?php foreach ($seleccione_sexo as $key) { 
								                  if($id_sexo == $key->Id){ ?>
								                  	<span class="font-weight-bold">Sexo:</span>
			                                            <p> <?php echo  $key->nombre; ?> </p>
								                 <?php }else{
								                 	echo "";
								                  }
								               } ?>
		                                </div>
		                                <!--/span-->
		                                <div class="col-md-6">
		                                    <span class="font-weight-bold">Fecha Nacimiento:</span>
		                                    <p> <?php echo $fecha_nacimiento; ?> </p>
		                                    
		                                </div>
		                                <div class="col-md-6">
		                                	<span class="font-weight-bold">Edad:</span>
		                                    <p> <?php echo $edad; ?> </p>
		                                </div>
			                        </div>
	                        	</div>
	                        	<div class="col-md-4">
	                        	<?php if ($empresa =="" || $empresa==null) {?>
                        	
	                            <?php }else{?>
	                            	<h3 class="card-title">Datos de la empresa</h3>
		                            <hr>
		                            <!--/row-->
			                            <div class="row">
			                            	<div class="col-md-12">
			                                    <label class="font-weight-bold">Empresa:</label>
			                                     <p> <?php echo $empresa; ?> </p>
			                                </div>
			                                <div class="col-md-12">

			                                    <label class="font-weight-bold">Ruc:</label>
			                                    <p > <?php echo $ruc; ?> </p>
			                                </div>
			                            </div>
		                                <!--/span-->
		                            </div>
	                            <?php } ?>
			                        </div>
                        	<?php } ?>
                        </div>
                        <div class="row">
                        	<div class="col-md-12">
                        		<div class="text-right">
                        			<button type="button" id="print_prueba_rapida_oit" class="btn btn-outline-dark btn btn-rounded btn-lg font-weight-bold"><i class=" fas fa-print"></i>&nbsp;Imprimir OIT</button>
                        			<button type="button" id="print_prueba_consentimiento" class="btn btn-outline-dark btn btn-rounded btn-lg font-weight-bold"><i class=" fas fa-print"></i>&nbsp;Imprimir Consentimiento</button>
                        		</div>
                        	</div>
                        </div>

                        <!--de aqui en adelnate es pàra el tab-->
					
                        <div class="row">
                        	<div class="col-md-12">
		                     
		                            <!-- Nav tabs -->
		                            <ul class="nav nav-tabs customtab" role="tablist">
		                                <li class="nav-item"> <a class="nav-link active" data-toggle="tab" href="#home2" id="mostramos_datos" role="tab" aria-selected="true"><span class="hidden-sm-up"><i class="ti-home"></i></span> <span class="hidden-xs-down font-weight-bold">OIT</span></a> </li>
		                                <li class="nav-item"> <a class="nav-link" data-toggle="tab" id="ocultamos_y_mostramis" href="#profile2" role="tab" aria-selected="false"><span class="hidden-sm-up"><i class="ti-user"></i></span> <span class="hidden-xs-down font-weight-bold">Declaración Radiografía Torax</span></a> </li>
		                          
		                            </ul>
		                            <form class="letritas"  method="post" id="form_register_rayox_x" enctype="multipart/form-data" >
			                            <!-- Tab panes gracias totales -->
			                            <div class="tab-content">
			                                <div class="tab-pane active" id="home2" role="tabpanel" >
			                                    <div class="p-20" id="eliminamos">
									            	<div class="table-responsive overflow-hidden">
									            		<table class="table">
									            			<tbody>
									            				<tr>
									            					<td class="font-weight-bold text-center">Fecha Lectura: <input type="text" class="form-control btn-rounded text-center" name="fechalec" id="mdate" value="<?php echo date('Y-m-d');?>"></td>
									            					<td class="font-weight-bold text-center">Fecha Radiografía: <input type="text" name="fecha_rad" id="mdatex" class="form-control btn-rounded text-center" value="<?php echo date('Y-m-d');?>"></td>
									            				</tr>
									            			</tbody>
									            		</table>
									            		<span class="font-weight-bold"></span>
									            		<table class="table color-bordered-table info-bordered-table">
									            			<thead>
									            				<tr>
									            					<th>I. CALIDAD RADIOGRAFÍCA</th>
									            					<th></th>
									            					<th></th>
									            			
									            				</tr>
									            			</thead>
									            			<tbody>
									            				<tr class="text-center">
									            					<td>Calidad Radiografica</td>
									            					<td>
									            						<table>
									            							<tbody>
									            								<tr>
									            									<td>1</td>
									            									<td>2</td>
									            									<td>3</td>
									            									<td>4</td>
									            								</tr>
									            								<!--mosytramos los datyos de la publicidads-->
									            								
									            								<tr>
									            									<td><input type="radio" name="eacalidad" id="eacalidad" value="A" ></td>
									            									<td><input type="radio" name="eacalidad" id="eacalidad" value="B" checked=""></td>
									            									<td><input type="radio" name="eacalidad" id="eacalidad" value="C" ></td>
									            									<td><input type="radio" name="eacalidad" id="eacalidad" value="D" ></td>
									            								</tr>
									            							</tbody>
									            						</table>
									            					</td>
									            					<td>
									            						<table>
									            							<tbody>
									            								<tr>
									            									<td ><strong>Causas</strong></td>
										                                            <td>1</td>
										                                            <td>Sobre Exposición</td>
										                                            <td><input type="checkbox" name="cauradio" id="cauradio" value="1"></td>
										                                            <td>5</td>
										                                            <td>Escapulas</td>
										                                            <td><input type="checkbox" name="cauradio5" id="cauradio5" value="5"></td>
									            								</tr>
									            								<tr>
									            									<td>&nbsp;</td>
									            									<td>2</td>
										                                            <td>Sub Exposición</td>
										                                            <td><input type="checkbox" name="cauradio2" id="cauradio2" value="2"></td>
										                                            <td>6</td>
										                                            <td>Artefactos</td>
										                                            <td>
										                                                <input type="checkbox" name="cauradio6" id="cauradio6" value="6">
										                                            </td>
									            								</tr>	
									            								<tr>
									            									<td>&nbsp;</td>
										                                            <td >3</td>
										                                            <td >Posición centrado</td>
										                                            <td><input type="checkbox" name="cauradio3" id="cauradio3" value="3" checked=""></td>
										                                            <td>7</td>
										                                            <td>Otros</td>
										                                            <td>
										                                                <input type="checkbox" name="cauradio7" id="cauradio7" value="7">
										                                            </td>
										                                        </tr>
										                                        <tr>
										                                        	<td>&nbsp;</td>
										                                            <td>4</td>
										                                            <td>Inspiración Insuficiente</td>
										                                            <td><input type="checkbox" name="cauradio4" id="cauradio4" value="4"></td>
										                                            <td>&nbsp;</td>
										                                        </tr>

									            							</tbody>
									            						</table>
									            					</td>
									            				</tr>
									            			</tbody>
									            		</table>
									            		<strong class="font-weight-bold">Comentario sobre defectos Técnicos...</strong>
									                    <textarea name="antecedentes" cols="100" rows="3" class="form-control" id="antecedentes" placeholder="Ingrese defectos técnicos ....."></textarea>
									                    <div class="card-header bg-warning font-weight-bold text-dark">II.ANORMALIDADES PARENQUIMATOSAS (si NO hay anormalidades parenquimatosas pase a III A. Pleurales)</div>
									                    <table class="table  color-bordered-table info-bordered-table">
									                    	<tbody>
									                    		<thead>
									                    			<tr>
									                    				<th><strong>2.1. Zonas Afectadas</strong><br>
										                                                (marque TODAS las zonas afectadas)</th>
									                    				<th><strong>2.2. Porfusión (Pequeñas Opacidades )(escala de 12 puntos) </strong>(Consulte las radiografias estándar - marque la subcategoria de profusión)</th>
									                    				<th><strong>2.3. Forma y Tamaño:</strong><br> (Consulte las radiografias estándar, se requieren dos simbolos; marque un primario y un secundario)</th>
									                    				<th style="width: 40%;">2.4. Opacidades Grandes</strong> (Marque O si no hay ninguna o marque A, B o C)</th>
									                    		</thead>
									                    		<tbody>
									                    			<tr>
									                    				<td>
									                    					<table>
									                    						<tbody>
									                    							<tr>
									                    								<td>&nbsp;</td>
									                    								<td>Der.</td>
									                    								<td>Izq.</td>
									                    							</tr>
									                    							<tr>
									                    								<td class="font-weight-bold">Superior</td>
									                    								<td><input type="checkbox" name="suder" id="suder" class="bloquea1" value="suder"></td>
									                    								<td><input type="checkbox" name="suizq" id="suizq" class="bloquea1" value="suizq"></td>
									                    							</tr>
									                    							<tr>
									                    								<td class="font-weight-bold">Medio</td>
											                                            <td><input type="checkbox" name="meder" id="meder" class="bloquea1" value="meder"></td>
											                                            <td><input type="checkbox" name="meizq" id="meizq" class="bloquea1" value="meizq"></td>               								
									                    							</tr>
									                    							<tr>
									                    								 <td class="font-weight-bold">Inferior</td>
									                    								 <td><input type="checkbox" name="infder" id="infder" class="bloquea1" value="infder"></td>
									                    								 <td><input type="checkbox" name="infizq" id="infizq" class="bloquea1" value="infizq"></td>

									                    							</tr>
									                    						</tbody>
									                    					</table>
									                    				</td>
									                    				<!--de auqi abajo es otro-->
									                    				<td>
									                    					<table>
									                    						<tbody>
									                    							<tr>
									                    								 <td>0/-</td> 
									                    								 <td><input type="radio" name="rxcem" id="rxcem" value="1" class="bloquea1"></td>
									                    								 <td>0/0</td>
									                    								 <td><input type="radio" name="rxcem" id="rxcem" value="2"  class="bloquea1" checked=""></td>
									                    								 <td>0/1</td>
									                    								 <td><input type="radio" name="rxcem" id="rxcem" value="3" class="bloquea1"></td>
									                    							</tr>
									                    							<tr>
									                    								<td>1/0</td>
											                                            <td><input type="radio" name="rxcem" id="rxun" value="4" class="bloquea1" ></td>
											                                            <td>1/1</td>
											                                            <td><input type="radio" name="rxcem" id="rxun" value="5" class="bloquea1"></td>
											                                            <td>1/2</td>
											                                            <td><input type="radio" name="rxcem" id="rxun" value="6" class="bloquea1" ></td>
									                    							</tr>
									                    							<tr>
									                    								<td>2/1</td>
									                    								<td><input type="radio" name="rxcem" id="x2" value="7" class="bloquea1"></td>
									                    								<td>2/2</td>
									                    								<td><input type="radio" name="rxcem" id="x2" value="8" class="bloquea1" ></td>
									                    								<td>2/3</td>
									                    								<td><input type="radio" name="rxcem" id="x2" value="9" class="bloquea1"></td>
									                    							</tr>
									                    							<tr>
									                    								<td>3/2</td>
									                    								<td><input type="radio" name="rxcem" id="x3" value="10" class="bloquea1"></td>
									                    								<td>3/3</td>
									                    								<td><input type="radio" name="rxcem" id="x3" value="11" class="bloquea1"></td>
									                    								<td>3/+</td>
									                    								<td><input type="radio" name="rxcem" id="x3" value="12" class="bloquea1"></td>
									                    							</tr>
									                    						</tbody>
									                    					</table>
									                    				</td>
									                    				<!--de aqui abajo es optro-->
									                    				<td >
									                    					<table>
									                    						<tbody>
									                    							<tr>
									                    								<td></td>
									                    								<td></td>
									                    								<td class="font-weight-bold">PRIMARIA</td>
									                    								<td></td>
									                    								<td></td>
									                    								<td class="font-weight-bold">SECUNDARIA</td>
									                    								<td></td>
									                    								<td></td>
									                    							
									                    							</tr>
									                    							<tr>
									                    								<td><input type="radio" name="pepe" id="pepe2" value="p" class="bloquea1"></td>
									                    								<td>p</td>
									                    								<td><input type="radio" name="pepe" id="pepe5" value="s" class="bloquea1"></td>
									                    								<td>s</td>
									                    								<td><input type="radio" name="sepe" id="sepe2" value="p" class="bloquea1"></td>
									                    								<td>p</td>
									                    								<td><input type="radio" name="sepe" id="sepe5" value="s" class="bloquea1"></td>
									                    								<td>s</td>
									                    							</tr>
									                    							<tr>
									                    								<td><input type="radio" name="pepe" id="pepe3" value="q" class="bloquea1"></td>
									                    								<td>q</td>
									                    								<td><input type="radio" name="pepe" id="pepe6" value="t" class="bloquea1"></td>
									                    								<td>t</td>
									                    								<td><input type="radio" name="sepe" id="sepe3" value="q" class="bloquea1"></td>
									                    								<td>q</td>
									                    								<td><input type="radio" name="sepe" id="sepe6" value="t" class="bloquea1"></td>
									                    								<td>t</td>
									                    							</tr>
									                    							<tr>
									                    								<td><input type="radio" name="pepe" id="pepe4" value="r" class="bloquea1"></td>
									                    								<td>r</td>
									                    								<td><input type="radio" name="pepe" id="pepe" value="u" class="bloquea1"></td>
									                    								<td>u</td>
									                    								<td><input type="radio" name="sepe" id="sepe4" value="r" class="bloquea1"></td>
									                    								<td>r</td>
									                    								<td><input type="radio" name="sepe" id="sepe6" value="u" class="bloquea1"></td>
									                    								<td>u</td>
									                    							</tr>
									                    						</tbody>

									                    					</table>
									                    					<!--otro-->
									                    					
									                    				</td>
									                    				<td>
									                    					<table>
									                    						<tbody>
									                    							<tr>
									                    								<td><input type="radio" name="opacig" id="opacig" value="O"  class="bloquea1" checked=""></td>
									                    								<td>O</td>
									                    							</tr>
									                    							<tr>
									                    								<td><input type="radio" name="opacig" id="opacig1" value="A" class="bloquea1"></td>
									                    								<td>A</td>
									                    							</tr>
									                    							<tr>
									                    								<td><input type="radio" name="opacig" id="opacig2" value="B" class="bloquea1"></td>
									                    								<td>B</td>
									                    							</tr>
									                    							<tr>
									                    								<td><input type="radio" name="opacig" id="opacig3" value="C" class="bloquea1"></td>
									                    								<td>C</td>
									                    							</tr>
									                    							
									                    						</tbody>
									                    					</table>
									                    					
									                    				</td>
									                    			</tr>
									                    		</tbody>
									                    	</tbody>
									                    </table>
									                    <div class="card-header bg-warning">
									                    <div class="row">
									                    	<div class="col md-9 font-weight-bold">
									                    		III.ANORMALIDADES PLEURALES (si NO hay anormalidades pase a simbolos)<br>
									                    		<span>3.1 Placas Pleurales (0=Ninguna, D=Hemitórax)</span>
									                    	</div>

									                    	<div class="col-md-3 text-center font-weight-bold">
									                    		<select name="anopleu" id="anopleu" class="form-control btn-rounded select2x bg-warning" tabindex="0" style="width: 100%;">
									                            <option value="">Seleccione</option>
									                            <option value="S">Si</option>
									                            <option value="N" selected="">No</option>
									                        </select>
									                    	</div>
									                    </div>
									                    </div>
									                    
									                    <table class="table   color-bordered-table info-bordered-table" >
									                    	<thead>
									                    		<tr>
									                    			<th style="width: 35%;">Sitio (Marque las casillas adecuadas)</th>
									                    			<th style="width: 15%;">Calcificación (marque)</th>
									                    			<th>Extensión (pared Torácica; combinada para placas de perfil y de frente)
									                    			<table>
									                    					<tbody>
									                    						<tr>
									                    							<td>1</td>
									                    							<td>< 1/4 de la pared lateral del tórax</td>
									                    						</tr>
									                    						<tr>
									                    							<td>2</td>
									                    							<td>Entre 1/4 y 1/2 de la pared lateral del tórax</td>
									                    						</tr>
									                    						<tr>
									                    							<td>3</td>
									                    							<td>> 1/2 de la pared lateral del tórax</td>
									                    						</tr>
									                    					</tbody>
									                    				</table></th>
									                    			<th>Ancho (opcional) (ancho minimo exigido: 3 mm)
									                    			<table>
									                    					<tbody>
									                    						<tr>
									                    							<td>a</td>
									                    							<td>De 3 a 5 mm</td>
									                    						</tr>
									                    						<tr>
									                    							<td>b</td>
									                    							<td>De 5 a 10 mm</td>
									                    						</tr>
									                    						<tr>
									                    							<td>c</td>
									                    							<td>Mayor a 10 mm</td>
									                    						</tr>
									                    					</tbody>
									                    				</table>
									                    			</th>


									                    		</tr>
									                    		<tr>
									                    			 <div class="card-header bg-warning">
													                    <div class="row">
													                    	<div class="col md-9 font-weight-bold">
													                    		3.1 Placas Pleurales (0=Ninguna, D=Hemitórax)
													                    	</div>

													                    	
													                    </div>
									                    			</div>
									                    		</tr>

									                    	</thead>
									                    	<tbody>
									                    
									                    		<tr>
									                    			<td>
									                    				<table>
									                        				<tbody>
									                        					<tr>
									                        						<td>Pared torácica de perfil</td>
									                        						<td>
									                        							<input type="radio" name="sipao" id="sipao" value="1" class="bloquea2" disabled="disabled">&nbsp;O
									                        						</td>
									                        						<td>
									                        							<input type="radio" name="sipao" id="sipao" value="2" class="bloquea2 " disabled="disabled">&nbsp;D
									                        						</td>
									                        						<td>
									                        							<input type="radio" name="sipao" id="sipao" value="3" class="bloquea2" disabled="disabled">&nbsp;I
									                        						</td>
									                        					</tr>
									                        					<tr>
									                        						<td>De frente</td>
									                        						<td>
									                        							<input type="radio" name="sifreo" id="sifreo" value="1" class="bloquea2" disabled="disabled">&nbsp;0
									                        						</td>
									                        						<td>
									                        							<input type="radio" name="sifreo" id="sifreo" value="2" class="bloquea2" disabled="disabled">&nbsp;D
									                        						</td>
									                        						<td>
									                        							<input type="radio" name="sifreo" id="sifreo" value="3" class="bloquea2" disabled="disabled">&nbsp;I
									                        						</td>
									                        					</tr>
									                        					<tr>
									                        						<td>Diafragma</td>
									                        						<td>
									                        							<input type="radio" name="sidiao" id="sidiao" value="1" class="bloquea2" disabled="disabled">&nbsp;0
									                        						</td>
									                        						<td>
									                        							<input type="radio" name="sidiao" id="sidiao" value="2" class="bloquea2" disabled="disabled">&nbsp;D
									                        						</td>
									                        						<td>
									                        							<input type="radio" name="sidiao" id="sidiao" value="3" class="bloquea2" disabled="disabled">&nbsp;I
									                        						</td>
									                        					</tr>
									                        					<tr>
									                        						<td>Otro(s) Sitio(s)</td>
									                        						<td>
									                        							<input type="radio" name="siotro" id="siotro" value="1" class="bloquea2" disabled="disabled">&nbsp;0
									                        						</td>
									                        						<td>
									                        							<input type="radio" name="siotro" id="siotro" value="2" class="bloquea2" disabled="disabled">&nbsp;D
									                        						</td>
									                        						<td>
									                        							<input type="radio" name="siotro" id="siotro" value="3" class="bloquea2" disabled="disabled">&nbsp;I
									                        						</td>
									                        					</tr>
									                        					<tr>
									                        						<td>Obliteración del Angulo Costofrenico</td>
									                        						<td></td>
									                        						<td></td>
									                        					</tr>

									                        				</tbody>	
									                        			</table>
									                    			</td>

									                    			<td>
									                    				<table>
									                    					
									                        				<tbody>
									                        					<tr >
									                        						<td>
									                        							<input type="radio" name="calpao" id="calpao" value="1" class="bloquea2" disabled="disabled">&nbsp;O
									                        						</td>
									                        						<td>
									                        							<input type="radio" name="calpao" id="calpao" value="2" class="bloquea2" disabled="disabled">&nbsp;D
									                        						</td>
									                        						<td>
									                        							<input type="radio" name="calpao" id="calpao" value="3" class="bloquea2" disabled="disabled">&nbsp;I
									                        						</td>
									                        							
									                        					</tr>
									                        					<tr>
									                        						<td>
									                        							<input type="radio" name="calfreo" id="calfreo" value="1" class="bloquea2 " disabled="disabled">&nbsp;0
									                        						</td>
									                        						<td>
									                        							<input type="radio" name="calfreo" id="calfreo" value="2" class="bloquea2 " disabled="disabled">&nbsp;D
									                        						</td>
									                        						<td>
									                        							<input type="radio" name="calfreo" id="calfreo" value="3" class="bloquea2" disabled="disabled">&nbsp;I
									                        						</td>
									                        					</tr>
									                        					<tr>
									                        						<td><input type="radio" name="caldiao" id="caldiao" value="1" class="bloquea2">&nbsp;0</td>
									                        						<td><input type="radio" name="caldiao" id="caldiao" value="2" class="bloquea2">&nbsp;D</td>
									                        						<td><input type="radio" name="caldiao" id="caldiao" value="3" class="bloquea2">&nbsp;I</td>
									                        					</tr>
									                        					<tr>
									                        						<td><input type="radio" name="calotro" id="calotro" value="1" class="bloquea2">&nbsp;0</td>
									                        						<td><input type="radio" name="calotro" id="calotro" value="2" class="bloquea2">&nbsp;D</td>
									                        						<td><input type="radio" name="calotro" id="calotro" value="3" class="bloquea2">&nbsp;I</td>
									                        					</tr>
									                        					<tr>
									                        						<td>
									                        							<input type="checkbox" name="oblito" id="oblito" class="bloquea2" disabled="disabled" value="oblito">&nbsp;0
									                        						</td>
									                        						<td>
									                        							<input type="checkbox" name="oblitd" id="oblitd" class="bloquea2" disabled="disabled" value="oblitd">&nbsp;D
									                        						</td>
									                        						<td>
									                        							<input type="checkbox" name="obliti" id="obliti" class="bloquea2" disabled="disabled" value="obliti">&nbsp;I
									                        						</td>
									                        					</tr>
									                        					

									                        				</tbody>	
									                        			</table>
									                    			</td>
									                    			<td>
									                    					<table>
									                    						<thead>
										                    						<tr>
										                    							<th><td><input type="radio" name="extpla" id="extpla4" value="0" class="bloquea2 " disabled="disabled">&nbsp;0&nbsp;&nbsp;D</td></th>
										                    							<th></th>
										                    							<th><td>
									                    								<input type="radio" name="extplb" id="extplb4" value="0" class="bloquea2" disabled="disabled">&nbsp;0&nbsp;&nbsp;I
									                    							</td></th>
										                    						</tr>
									                    						</thead>
									                    						<tbody>
									                    							<tr>
									                    								
									                    								<td>
									                									<input type="radio" name="extpla" id="extpla2" value="1" class="bloquea2" disabled="disabled">&nbsp;1
										                								</td>
										                								<td>
										                									<input type="radio" name="extpla" id="extpla3" value="2" class="bloquea2" disabled="disabled">&nbsp;2
										                								</td>
										                								<td>
										                									<input type="radio" name="extpla" id="extpla" value="3" class="bloquea2" disabled="disabled">&nbsp;3
										                								</td>
										                								<!--de aqui es otro-->
										                								<td>
									                    								<input type="radio" name="extplb" id="extplb2" value="1" class="bloquea2" disabled="disabled">&nbsp;1
										                    							</td>
										                    							<td>
										                    								<input type="radio" name="extplb" id="extplb3" value="2" class="bloquea2" disabled="disabled">&nbsp;2
										                    							</td>
										                    							<td>
										                    								<input type="radio" name="extplb" id="extplb" value="3" class="bloquea2" disabled="disabled">&nbsp;3
										                    							</td>
									                    							</tr>


									                    							
									                    						</tbody>
									                    					</table>
									                    				
									                    			</td>
									                    			<td>
									                    				<table class="bg-white" >
									                    					<thead class="bg-white">
									                    						<tr>
									                    							<th><td>
									                    								D
									                    							</td></th>
									                    							<th></th>
									                    							<th><td>
									                    								I
									                    							</td></th>
									                    						</tr>
									                    					</thead>
									                    					<tbody>
									                    						<tr>
									                    							<td>
									                    								<input type="radio" name="ancpla" id="ancpla2" value="a" class="bloquea2">&nbsp;a
									                    							</td>
									                    							<td>
									                    								<input type="radio" name="ancpla" id="ancpla3" value="b" class="bloquea2">&nbsp;b
									                    							</td>
									                    							<td>
									                    								<input type="radio" name="ancpla" id="ancpla" value="c" class="bloquea2">&nbsp;c
									                    							</td>
									                    							<!--de aqui abjo es otro-->
									                    							<td>
									                    								<input type="radio" name="ancplb" id="ancplb2" value="a" class="bloquea2">&nbsp;a
									                    							</td>
									                    							<td>
									                    								<input type="radio" name="ancplb" id="ancplb3" value="b" class="bloquea2">&nbsp;b
									                    							</td>
									                    							<td>
									                    								<input type="radio" name="ancplb" id="ancplb" value="c" class="bloquea2">&nbsp;c
									                    							</td>
									                    						</tr>
									                    					</tbody>
									                    				</table>
									                    			</td>
									                    			
									                    			
									                    		</tr>
									                    	</tbody>



									                    </table>
									                    <div class="card-header bg-warning text-dark font-weight-bold">
									                    	3.2 Engrosamiento Difuso de la Pleura (0=Ninguna, D=Hemitórax, I=Hemitórax izquierdo)
									                    </div>
									                    <table class="table color-bordered-table info-bordered-table " cellpadding="0" cellspacing="0">
									                    
									                		<thead>
									                			<tr>
									                				<th class="text-center">Pared Torácica</th>
									                				<th class="text-center">Calcificación</th>
									                				<th class="text-center">Extensión</th>
									                				<th class="text-center">Ancho</th>
									                				
									                			</tr>
									                		</thead>
									                    	
									                    	<tbody>
									                    		<tr>
									                    			<td>
									                    				<table>
									                    					<tbody>
									                    						<tr>
									                    							<td>De perfil</td>
									                								<td>
									                									<input type="radio" name="parpero" id="parpero" value="1" class="bloquea2" disabled="disabled">&nbsp;0
									                								</td>
									                								<td>
									                									<input type="radio" name="parpero" id="parpero" value="2" class="bloquea2" disabled="disabled">&nbsp;D
									                								</td>
									                								<td>
									                									<input type="radio" name="parpero" id="parpero" value="3" class="bloquea2" disabled="disabled">&nbsp;I
									                								</td>
									                    						</tr>
									                    					</tbody>
									                    				</table>
									                    			</td>
									                    			<td>
									                    				<table>
									                    					<tbody>
									                    						<tr>
									                    							<td>
									                    								<input type="radio" name="calpero" id="calpero" value="1" class="bloquea2" disabled="disabled">&nbsp;0
									                    							</td>
									                    							<td>
									                    								<input type="radio" name="calpero" id="calpero" value="2" class="bloquea2" disabled="disabled">&nbsp;D
									                    							</td>
									                    							<td>
									                    								<input type="radio" name="calpero" id="calpero" value="3" class="bloquea2" disabled="disabled">&nbsp;I
									                    							</td>
									                    						</tr>
									                    					</tbody>
									                    				</table>
									                    			</td>
									                    			<td class="text-center">
									                    				<table>
									                    					<tbody>
									                    						<tr>
									                    							<td></td>
									                    							<td></td>
									                    							<td>
									                    								<input type="radio" name="extpar" id="extpar" value="0" class="bloquea2" disabled="disabled">&nbsp;0 &nbsp;D
									                    							</td>
									                    							<td></td>
									                    							<td>
									                    								<input type="radio" name="extparb" id="extparb4" value="0" class="bloquea2" disabled="disabled">&nbsp;0 &nbsp;I
									                    							</td>
									                    						</tr>
									                    					</tbody>
									                    				</table>
									                    			</td>
									                    			<td>
									                    				<table>
									                    					<tbody>
									                    						<tr>
									                    							<td></td>
									                    							<td></td>
									                    							<td>D</td>
									                    							<td></td>
									                    							<td></td>
									                    							<td></td>
									                    							<td></td>
									                    							<td></td>
									                    							<td>I</td>
									                    						</tr>
									                    					</tbody>
									                    				</table>
									                    			</td>
									                    		</tr>
									                    		<tr>
									                    			<td>&nbsp;</td>
									                    			<td>&nbsp;</td>
									                    			<td>
									                    				<table>
									                    					
									                    					<tbody>
									                    						<tr>
									                    							<td>
									                    								<input type="radio" name="extpar" id="extpar" value="1" class="bloquea2" disabled="disabled">&nbsp;1
									                    							</td>
									                    							<td>
									                    								<input type="radio" name="extpar" id="extpar" value="2" class="bloquea2" disabled="disabled">&nbsp;2
									                    							</td>
									                    							<td>
									                    								<input type="radio" name="extpar" id="extpar" value="3" class="bloquea2" disabled="disabled">&nbsp;3
									                    							</td>
									                    							<td>
									                    								<input type="radio" name="extparb" id="extparb2" value="1" class="bloquea2" disabled="disabled">&nbsp;1
									                    							</td>
									                    							<td>
									                    								<input type="radio" name="extparb" id="extparb3" value="2" class="bloquea2" disabled="disabled">&nbsp;2
									                    							</td>
									                    							<td>
									                    								<input type="radio" name="extparb" id="extparb" value="3" class="bloquea2" disabled="disabled">&nbsp;3
									                    							</td>
									                    						</tr>
									                    						
									                    					</tbody>
									                    				</table>
									                    			</td>
									                    			<td>
									                    				<table>
									                    					<tbody>
									                    						<tr>
									                    							<td>
									                    								<input type="radio" name="ancpara" id="ancpara2" value="a" class="bloquea2" disabled="disabled">&nbsp;a
									                    							</td>
									                    							<td>
									                    								<input type="radio" name="ancpara" id="ancpara3" value="b" class="bloquea2" disabled="disabled">&nbsp;b
									                    							</td>
									                    							<td>
									                    								<input type="radio" name="ancpara" id="ancpara" value="c" class="bloquea2" disabled="disabled">&nbsp;c
									                    							</td>
									                    							<td></td>
									                    							<td>
									                    								<input type="radio" name="ancparb" id="ancparb2" value="a" class="bloquea2" disabled="disabled">&nbsp;a
									                    							</td>
									                    							<td>
									                    								<input type="radio" name="ancparb" id="ancparb3" value="b" class="bloquea2" disabled="disabled">&nbsp;b
									                    							</td>
									                    							<td>
									                    								<input type="radio" name="ancparb" id="ancparb" value="c" class="bloquea2" disabled="disabled">&nbsp;c
									                    							</td>
									                    						</tr>
									                    					</tbody>
									                    				</table>
									                    			</td>
									                    			
									                    		</tr>
									                    		<tr>
									                    			<td>
									                    				<table>
									                    					<tbody>
									                    						<tr>
									                    							<td>De frente</td>
									                    							<td><input type="radio" name="parfreo" id="parfreo" value="1" class="bloquea2" disabled="disabled">&nbsp;0
									                    							</td>
									                    							<td>
									                    								<input type="radio" name="parfreo" id="parfreo" value="2" class="bloquea2" disabled="disabled">&nbsp;D
									                    							</td>
									                    							<td>
									                    								<input type="radio" name="parfreo" id="parfreo" value="3" class="bloquea2" disabled="disabled">&nbsp;I
									                    							</td>
									                    						</tr>
									                    					</tbody>
									                    				</table>
									                    			</td>
									                    			<td>
									                    				<table>
									                    					<tbody>
									                    						<tr>
									                    							<td>
									                    								<input type="radio" name="calfreno" id="calfreno" value="1" class="bloquea2" disabled="disabled">&nbsp;0
									                    							</td>
									                    							<td>
									                    								<input type="radio" name="calfreno" id="calfreno" value="2" class="bloquea2" disabled="disabled">&nbsp;D
									                    							</td>
									                    							<td>
									                    								<input type="radio" name="calfreno" id="calfreno" value="3" class="bloquea2" disabled="disabled">&nbsp;I
									                    							</td>
									                    						</tr>
									                    					</tbody>
									                    				</table>
									                    			</td>
									                    			<td></td>
									                    			<td></td>
									                    			
									                    			
									                    		</tr>
									                    		

									                    		
									                    	</tbody>
									                    </table>
									                    <div class="">
									                    	<div class="card-header bg-warning">
									                    		<div class="row">
									                    			<div class="col-md-9 font-weight-bold text-dark">					                                				
																		IV. SIMBOLOS *<br>
																		<span>(Rodee con un círculo la respuesta adecuada; si rodea od, escriba a continuación un COMENTARIO)</span>
									                    			</div>
									                    			<div class="col-md-3 text-center font-weight-bold">
									                    				<select name="simbolos" id="simbolos" class="form-control clasecombo select2 font-weight-bold" style="width: 100%;"  >
									                                    	<option value="">Seleccione</option>
									                                        <option value="S">Si</option>
									                                        <option value="N" selected="" >No</option>
									                                    </select>
									                    			</div>
									                    		</div>
									                    	</div>				
									                    </div>
									                    <table class="table color-bordered-table info-bordered-table">
									                    	<tbody>
									                    		<tr>
									                    			<td>
									                    				<input type="checkbox" name="simaa" id="simaa" class="bloquea3" disabled="disabled" value="simaa">
									                    				aa
									                    			</td>
									                    			<td>
									                    				<input type="checkbox" name="simat" id="simat" class="bloquea3" disabled="disabled" value="simat">
									                    				at
									                    			</td>
									                    			<td>
									                    				<input type="checkbox" name="simax" id="simax" class="bloquea3" disabled="disabled" value="simax">
									                    				ax
									                    			</td>
									                    			<td><input type="checkbox" name="simbu" id="simbu" class="bloquea3" disabled="disabled" value="simbu">
										                                bu
									                                </td>
									                                <td><input type="checkbox" name="simca" id="simca" class="bloquea3" disabled="disabled" value="simca">
									                                    ca
									                                </td>
									                                <td><input type="checkbox" name="simcg" id="simcg" class="bloquea3" disabled="disabled" value="simcg">
									                                    cg
									                                </td>
									                                <td><input type="checkbox" name="simcn" id="simcn" class="bloquea3" disabled="disabled" value="simcn">
									                                    cn
									                                </td>
									                                <td><input type="checkbox" name="simco" id="simco" class="bloquea3" disabled="disabled" value="simco">
									                                    co
									                                </td>
									                                <td><input type="checkbox" name="simcp" id="simcp" class="bloquea3" disabled="disabled" value="simcp">
									                                    cp
									                                </td>
									                                <td><input type="checkbox" name="simcv" id="simcv" class="bloquea3" disabled="disabled" value="simcv">
									                                    cv
									                                </td>
									                                <td><input type="checkbox" name="simdi" id="simdi" class="bloquea3" disabled="disabled" value="simdi">
									                                    di
									                                </td>
									                                <td><input type="checkbox" name="simef" id="simef" class="bloquea3" disabled="disabled" value="simef">
									                                    ef
									                                </td>
									                                <td><input type="checkbox" name="simem" id="simem" class="bloquea3" disabled="disabled" value="simem">
									                                    em
									                                </td>
									                                <td><input type="checkbox" name="simes" id="simes" class="bloquea3" disabled="disabled" value="simes">
									                                    es
									                                </td>
									                    		</tr>
									                    		<tr>
									                    			<td><input type="checkbox" name="simfr" id="simfr" class="bloquea3" disabled="disabled" value="simfr">
										                               fr
									                                </td>
									                                <td><input type="checkbox" name="simhi" id="simhi" class="bloquea3" disabled="disabled" value="simhi">
									                                    hi
									                                </td>
									                                <td><input type="checkbox" name="simho" id="simho" class="bloquea3" disabled="disabled" value="simho">
									                                    ho
									                                </td>
									                                <td><input type="checkbox" name="simid" id="simid" class="bloquea3" disabled="disabled" value="simid">
									                                    id
									                                </td>
									                                <td><input type="checkbox" name="simih" id="simih" class="bloquea3" disabled="disabled" value="simih">
									                                    ih
									                                </td>
									                                <td><input type="checkbox" name="simkl" id="simkl" class="bloquea3" disabled="disabled" value="simkl">
									                                    kl
									                                </td>
									                                <td><input type="checkbox" name="simme" id="simme" class="bloquea3" disabled="disabled" value="simme">
									                                    me
									                                </td>
									                                <td><input type="checkbox" name="simpa" id="simpa" class="bloquea3" disabled="disabled" value="simpa">
									                                    pa
									                                </td>
									                                <td><input type="checkbox" name="simpb" id="simpb" class="bloquea3" disabled="disabled" value="simpb">
									                                    pb
									                                </td>
									                                <td><input type="checkbox" name="simpi" id="simpi" class="bloquea3" disabled="disabled" value="simpi">
									                                    pi
									                                </td>
									                                <td><input type="checkbox" name="simpx" id="simpx" class="bloquea3" disabled="disabled" value="simpx">
									                                    px
									                                </td>
									                                <td><input type="checkbox" name="simra" id="simra" class="bloquea3" disabled="disabled" value="simra">
									                                    ra
									                                </td>
									                                <td><input type="checkbox" name="simrp" id="simrp" class="bloquea3" disabled="disabled" value="simrp">
									                                    rp
									                                </td>
									                                <td><input type="checkbox" name="simtb" id="simtb" class="bloquea3" disabled="disabled" value="simtb">
									                                    tb
									                                </td>
									                    			
									                    		</tr>
									                    		<tr>
									                    			<td>OD <input type="checkbox" name="simod" id="simod"></td>
									                    			<td>
									                    			</td>
									                                <td>&nbsp;</td>
									                                <td>&nbsp;</td>
									                                <td>&nbsp;</td>
									                                <td>&nbsp;</td>
									                                <td>&nbsp;</td>
									                                <td>&nbsp;</td>
									                                <td>&nbsp;</td>
									                                <td>&nbsp;</td>
									                                <td>&nbsp;</td>
									                                <td>&nbsp;</td>
									                                <td>&nbsp;</td>
									                                <td>&nbsp;</td>
									                    		</tr>
									                    	</tbody>
									                    	<tfoot>
									                    		 <span id="mostrr_od"><input type="text" class="form-control" name="od_radiogra" id="od_radiogra" placeholder="Ingrese info....."></span>
									                    	</tfoot>
									                    
									                    </table>
									                   
									                    <div class="card-header bg-warning">
									                    	<div class="row">
									                    		<div class="col-md-7 font-weight-bold">
									                    			Comentarios
									                    		</div>
									                    		<div class="col-md-5">
									                    			<div class="form-group font-weight-bold">
									                    				<input type="radio" name="sidiad" id="sidiad" value="N" checked="">
									                                    Normal&nbsp;
									                                    <input type="radio" name="sidiad" id="sidiad" value="A">
									                                    Anormal
									                    			</div>
									                    		</div>
									                    	</div>
									                    </div>
									                    	<div class="row">
									                    		<div class="col-md-12">
									                    			<textarea name="diagnostico" id="diagnostico" cols="8" rows="4" class="form-control">RADIOGRAFIA DE TORAX NORMAL.</textarea>
									                    		</div>
									                    	</div>
									                    
									                    	<div class="row mt-1">
									                        	<div class="col-md-12 text-right">
									                        		<button class="btn btn-outline-success btn-rounded add_more_oit_" role="button"><span class="ui-button-text">Agregar mas archivos</span></button> 
									                        	</div>
									                        	<div class="col-md-12 mt-2" id="aplicamos_archivos">
									                        		<div class="input-group mb-3" id="row1">
																	  <input type="file" name="archivo[]" class="form-control file_input"  >
																	  <div class="input-group-append" style="height: 37px;">
																	    <span class="input-group-text " id="eliminar_file"><a href="javascript:void(0)" class="btn btn-danger" ><i class=" fas fa-times-circle"></i></a></span>
																	  </div>
																	</div>
									                        	</div>

									                        	<div class="col-md-12 mt-2" id="aplicamos_archivos1">
									                        		
									                        	</div>
									                        </div>
									                    
									                    <!--<div class="container-fluid">
									                    	<div class="row mt-3">
									                        	<div class="col-md-3">
									                        		<span class="font-weight-bold">CIE 10</span>
									                        		<input name="cie_10" type="text" class="form-control" id="cie_10" value="" size="14" autocomplete="off">
									                        	</div>
									                        	<div class="col-md-9">
									                        		<span class="font-weight-bold">DIAGNOSTICO</span>
									                        		<input type="text" class="form-control FacetInput " size="140" name="diag" id="diag" value="" autocomplete="off">
									                        	</div>
									                        	<div class="col-md-12">
									                        		<span class="font-weight-bold">Recomendación:</span>
									                        		<textarea name="reco1" cols="140" rows="4" class="form-control" id="reco1" placeholder="Ingrese Diagnostico...."></textarea>
									                        	</div>
									                        </div>

									                        <div class="row">
									                        	<div class="col-md-3">
									                        		<span class="font-weight-bold">CIE 10</span>
									                        		<input name="cie_102" type="text" class="form-control" id="cie_102" value="" size="14" autocomplete="off">
									                        	</div>
									                        	<div class="col-md-9">
									                        		<span class="font-weight-bold">DIAGNOSTICO</span>
									                        		<input type="text" class="form-control FacetInput " size="140" name="diag2" id="diag2" value="" autocomplete="off">
									                        	</div>
									                        	<div class="col-md-12">
									                        		<span class="font-weight-bold">Recomendación:</span>
									                        		<textarea name="reco2" cols="140" rows="4" class="form-control" id="reco2" placeholder="Ingrese Diagnostico...."></textarea>
									                        	</div>
									                        </div>
									                        <div class="row">
									                        	<div class="col-md-3">
									                        		<span class="font-weight-bold">CIE 10</span>
									                        		<input name="cie_103" type="text" class="form-control" id="cie_103" value="" size="14" autocomplete="off">
									                        	</div>
									                        	<div class="col-md-9">
									                        		<span class="font-weight-bold">DIAGNOSTICO</span>
									                        		<input type="text" class="form-control FacetInput " size="140" name="diag3" id="diag3" value="" autocomplete="off">
									                        	</div>
									                        	<div class="col-md-12">
									                        		<span class="font-weight-bold">Recomendación:</span>
									                        		<textarea name="reco3" cols="140" rows="4" class="form-control" id="reco3" placeholder="Ingrese Diagnostico...."></textarea>
									                        	</div>
									                        </div>
									                    </div>-->
									                </div>
									            </div>
			                                </div>

			                                <div class="tab-pane p-20" id="profile2" role="tabpanel">
			                                	<div class="container-fluid">
			                                		<div class="row ">
			                                			<div class="col-md-12 bg-info p-2 font-weight-bold text-white text-center">
			                                				<p>DECLARACIÓN JURADA DE NO ACEPTACIÓN DE TOMA DE PLACA RADIOGRAFICA</p>
			                                			</div>
			                                			<div class="col-md-12">
			                                				<table class="table">
			                                					<tbody>
			                                						<tr>
			                                						<td>
			                                							<p>Quien suscribe la presente,&nbsp;<span class="font-weight-bold"><?php echo $nombres_completos; ?></span>  Identificado(a) coN DNI Nro, <span class="font-weight-bold"><?php echo $dni; ?></span><br><p>Expongo</p><br>
			                                						    Que por motivos que líneas abajo no doy consentimiento para realizar el examen de rayos X indicado.</p>
			                                					    </td>
			                                					</tr>
			                                					</tbody>
			                                					
			                                				</table>
			                                			</div>
			                                			<div class="col-md-6">
			                                				<table class="table">
			                                					<tbody>
			                                						<tr>
			                                							<td>
			                                								<select name="motivo" id="motivo" class="select2 form-control" style="width: 100%;">
			                                									<option value="">-- Seleccione Motivo --</option>
			                                									<?php $query = $this->db->query("select * from exam_motivos");
			                                									 foreach ($query->result() as $xx) {?>
			                                									 	<?php if ($motivo==$xx->Id) {
			                                									 		$select = "selected";
			                                									 	}else{
			                                									 		$select = "";
			                                									 	} ?>
			                                										<option value="<?php echo $xx->Id; ?>" <?php echo $select; ?>><?php echo $xx->nombre; ?></option>
			                                									<?php } ?>
			                                								</select>
			                                								
			                                							</td>
			                                							
			                                						</tr>
			                                					</tbody>
			                                				</table>
			                                			</div>
			                                			
			                                			</div>


			                                			
			                                			<div class="col-md-12" style="display: none;" id="view_motivos">
				                                				<textarea name="motivo1" id="motivo1" cols="8" rows="7" class="form-control" placeholder="Ingrese Motivo....."></textarea>
				                                		</div>
				                                		<div class="col-md-12">
			                                				<div class="alert alert-danger alert-rounded btn-rounded"> <img src="<?php echo base_url().'assets_sistema/';?>images/users/1.jpg" width="30" class="img-circle" alt="img"> Si los cambios no son guardados de manera correcta actualizar la Pagina "F5"
				                                            <button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">×</span> </button>
				                                        </div>
			                                		
			                                		</div>
			                                	</div>
			                                </div>
			                      
			                            </div>

		                        
					                    </div>
			                        </div>
			                            

				                     <div class="row">
			                            <div class="col-md-12">
			                              <div class="text-center">
			                                <input type="hidden" name="id_unico_rayox" id="id_unico_rayox" value="<?php echo $id_unico; ?>">
			                                <a href="javascript:void(0)" onclick="return cancelar_fijo_id_tipoexamen()" class="btn btn-danger btn-rounded btn-lg"><i class="fas fa-times-circle"></i>&nbsp;Cancelar</a>
			                                <button type="submit" class="btn btn-info btn-rounded btn-lg" id="actualizar_rayox_x"><i class="fas fa-check-circle"></i>&nbsp;Actualizar Información</button>
			                              </div>
			                            </div>
			                          </div>
			                          </form>

                </div>
                
			</div>
		</div>
	</div>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script>
	$(document).ready(function() {
		$("body").on('click', '#eliminar_file', function (e) {
            e.preventDefault();

            if($("#aplicamos_archivos div.input-group:last-child").attr('id') != 'row1'){
                    $("#aplicamos_archivos div.input-group:last-child").remove();
                   // $('#aplicamos_archivo div.input-group:not(:first-child)').slice(0)
               // .remove();
                }


            
        });
	});

	  $("#simod").click(function() {
          /* Act on the event */
          if(!$(this).prop('checked')){
                $('#mostrr_od').hide();
                //$("#od_radiogra").val("");
               
            }else{
                $('#mostrr_od').show();
            }
        });

	$(document).ready(function() {


		var id_paciente =  <?php echo $this->uri->segment(4,0); ?>;
		$.ajax({
			url: '<?php echo base_url().'Rayos/Rayos/mostrar_registros_via_ajax/';?>',
			type: 'POST',
			dataType: 'json',
			data: {id_paciente: id_paciente},
		})
		.done(function(data) {
			console.log("success");
			//alert("hola");
			//$("ancpara")
			$("input[name=ancpara][value='"+data.ancpara+"']").prop("checked",true);
			//$("ancparb")
			$("input[name=ancparb][value='"+data.ancparb+"']").prop("checked",true);
			//$("calfreno")
			$("input[name=calfreno][value='"+data.calfreno+"']").prop("checked",true);
			//$("calfreo")
			$("input[name=calfreo][value='"+data.calfreo+"']").prop("checked",true);
			//$("calpao")
			$("input[name=calpao][value='"+data.calpao+"']").prop("checked",true);
			//$("calpero")
			$("input[name=calpero][value='"+data.calpero+"']").prop("checked",true);
			//$("cauradio")
			$("input[name=cauradio][value='"+data.cauradio+"']").prop("checked",true);
			//$("cauradio2")cauradio4 checked
			$("input[name=cauradio2][value='"+data.cauradio2+"']").prop("checked",true);
			//$("cauradio3")
			$("input[name=cauradio3][value='"+data.cauradio3+"']").prop("checked",true);
			//$("cauradio4")
			$("input[name=cauradio4][value='"+data.cauradio4+"']").prop("checked",true);
			//$("cauradio5")
			$("input[name=cauradio5][value='"+data.cauradio5+"']").prop("checked",true);
			//$("cauradio6")
			$("input[name=cauradio6][value='"+data.cauradio6+"']").prop("checked",true);
			//$("cauradio7")
			$("input[name=cauradio7][value='"+data.cauradio7+"']").prop("checked",true);
			/*$("cie_10")
			$("cie_102")
			$("cie_103")
			$("diag")
			$("diag2")
			$("diag3")
			$("diagnostico")*/
			//$("eacalidad")
			//$("#eacalidad").attr('checked', 'checked');
			$("input[name=eacalidad][value='"+data.eacalidad+"']").prop("checked",true);
			//checked=""
			//$("extpar")
			$("input[name=extpar][value='"+data.extpar+"']").prop("checked",true);
			//$("extparb")
			$("input[name=extparb][value='"+data.extparb+"").prop("checked",true);
			//$("extpla")
			$("input[name=extpla][value='"+data.extpla+"").prop("checked",true);
			
			//$("extplb")
			$("input[name=extplb][value='"+data.extplb+"").prop("checked",true);
			/*$("fecha_rad")
			$("fechalec")
			$("hora")
			$("id_paciente")*/
			//$("infder")
			$("input[name=infder][value='"+data.infder+"").prop("checked",true);
			
			//$("infizq")
			$("input[name=infizq][value='"+data.infizq+"']").prop("checked",true);
			//$("meder")
			$("input[name=meder][value='"+data.meder+"']").prop("checked",true);
			//$("meizq")
			$("input[name=meizq][value='"+data.meizq+"']").prop("checked",true);
		/*	$("motivo")
			$("motivo1")*/
			//$("oblitd")
			$("input[name=oblitd][value='"+data.oblitd+"']").prop("checked",true);
			//$("obliti")
			$("input[name=obliti][value='"+data.obliti+"']").prop("checked",true);
			//$("oblito")
			$("input[name=oblito][value='"+data.oblito+"']").prop("checked",true);
			//$("opacig")
			$("input[name=opacig][value='"+data.opacig+"']").prop("checked",true);
			//$("parfreo")
			$("input[name=parfreo][value='"+data.parfreo+"']").prop("checked",true);
			//$("parpero")
			$("input[name=parpero][value='"+data.parpero+"']").prop("checked",true);
			//$("pepe")
			$("input[name=pepe][value='"+data.pepe+"']").prop("checked",true);
			//$("reco1")
			//$("reco2")
			//$("reco3")
			//$("rxcem")
			$("input[name=rxcem][value='"+data.rxcem+"']").prop("checked",true);
			//$("sepe")
			$("input[name=sepe][value='"+data.sepe+"']").prop("checked",true);
			/*$("sidiad")*/
			$("input[name=sidiad][value='"+data.sidiad+"']").prop("checked",true);

			//$("simaa")
			$("input[name=simaa][value='"+data.simaa+"']").prop("checked",true);
			//$("simat")
			$("input[name=simat][value='"+data.simat+"']").prop("checked",true);
			//$("simax")
			$("input[name=simax][value='"+data.simax+"']").prop("checked",true);
			//$("simbu")
			$("input[name=simbu][value='"+data.simbu+"']").prop("checked",true);
			//$("simca")
			$("input[name=simca][value='"+data.simca+"']").prop("checked",true);
			//$("simcg")
			$("input[name=simcg][value='"+data.simcg+"']").prop("checked",true);
			//$("simcn")
			$("input[name=simcn][value='"+data.simcn+"']").prop("checked",true);
			//$("simco")
			$("input[name=simco][value='"+data.simco+"']").prop("checked",true);
			//$("simcp")
			$("input[name=simcp][value='"+data.simcp+"']").prop("checked",true);
			//$("simcv")
			$("input[name=simcv][value='"+data.simcv+"']").prop("checked",true);
			//$("simdi")
			$("input[name=simdi][value='"+data.simdi+"']").prop("checked",true);
			//$("simef")
			$("input[name=simef][value='"+data.simef+"']").prop("checked",true);
			//$("simem")
			$("input[name=simem][value='"+data.simem+"']").prop("checked",true);
			//$("simes")
			$("input[name=simes][value='"+data.simes+"']").prop("checked",true);
			//$("simfr")
			$("input[name=simfr][value='"+data.simfr+"']").prop("checked",true);
			//$("simhi")
			$("input[name=simhi][value='"+data.simhi+"']").prop("checked",true);
			//$("simho")
			$("input[name=simho][value='"+data.simho+"']").prop("checked",true);
			//$("simid")
			$("input[name=simid][value='"+data.simid+"']").prop("checked",true);
			//$("simih")
			$("input[name=simih][value='"+data.simih+"']").prop("checked",true);
			//$("simkl")
			$("input[name=simkl][value='"+data.simkl+"']").prop("checked",true);
			//$("simme")
			$("input[name=simme][value='"+data.simme+"']").prop("checked",true);
			//$("simod")
			$("input[name=simod][value='"+data.simod+"']").prop("checked",true);
			//$("simpa")
			$("input[name=simpa][value='"+data.simpa+"']").prop("checked",true);
			//$("simpb")
			$("input[name=simpb][value='"+data.simpb+"']").prop("checked",true);
			//$("simpi")
			$("input[name=simpi][value='"+data.simpi+"']").prop("checked",true);
			//$("simpx")
			$("input[name=simpx][value='"+data.simpx+"']").prop("checked",true);
			//$("simra")
			$("input[name=simra][value='"+data.simra+"']").prop("checked",true);
			//$("simrp")
			$("input[name=simrp][value='"+data.simrp+"']").prop("checked",true);
			//$("simtb")
			$("input[name=simtb][value='"+data.simtb+"']").prop("checked",true);


			//$("siotro")
			$("input[name=siotro][value='"+data.siotro+"']").prop("checked",true);
			//$("sidiao")
			$("input[name=sidiao][value='"+data.sidiao+"']").prop("checked",true);
			//$("sifreo")
			$("input[name=sifreo][value='"+data.sifreo+"']").prop("checked",true);
			//$("sipao")
			$("input[name=sipao][value='"+data.sipao+"']").prop("checked",true);
			//$("suder")
			$("input[name=suder][value='"+data.suder+"']").prop("checked",true);
			//$("suizq")
			$("input[name=suizq][value='"+data.suizq+"']").prop("checked",true);


			//bloquea2
			if (data.sipao=="" && data.sifreo=="" && data.sidiao=="" && data.siotro=="" && data.calpao=="" && data.calfreo=="" && data.oblitd=="" && data.obliti=="" && data.oblito=="" && data.extpla=="" && data.extplb=="" && data.parpero=="" && data.calpero=="" && data.parfreo=="" && data.calfreno=="" && data.extpar=="" && data.extparb=="" && data.ancpara=="") {
				$(".bloquea2").prop('disabled', true);
			}else{
				$(".bloquea2").prop('disabled', false);
				//$("input[name=sipao][value='"+data.sipao+"']").prop("checked",true);
			}

			//bloquea3
			if (data.simaa=="" && data.simat=="" && data.simax=="" && data.simbu=="" && data.simca=="" && data.simcg=="" && data.simcn=="" && data.simco=="" && data.simcp=="" && data.simcv=="" && data.simdi=="" && data.simef=="" && data.simem=="" && data.simes=="" && data.simfr=="" && data.simhi=="" && data.simho=="" && data.simid=="" && data.simih=="" && data.simkl=="" && data.simme=="" &&  data.simpa=="" && data.simpb=="" && data.simpi=="" && data.simpx=="" && data.simra=="" && data.simrp=="" && data.simtb=="") {
				$(".bloquea3").prop('disabled', true);
			}else{
				$(".bloquea3").prop('disabled', false);
			}


			//MOSTRAMOS REGISTROS
			//$("od_radiogra")
			if (data.od_radiogra=="" || data.od_radiogra==null ) {
				$("#simod").prop("checked", false);
				 $('#mostrr_od').hide();
			}else{
				$("#simod").prop("checked", true);
				$("input[name=od_radiogra]").val(data.od_radiogra);
			}
			if (data.antecedentes=="" || data.antecedentes==null) {
				$("#antecedentes").text("");
			}else{
				$("#antecedentes").text(data.antecedentes);
			}


			if (data.anopleu=="N") {
				$(".bloquea2").prop('disabled', true);
			}else if (data.anopleu=="S") {
				$(".bloquea2").prop('disabled', false);
				//$("#anopleu option[value='S']").attr("selected", true);
			$("#anopleu option[value='S']").attr("selected",true).parent().select2();
			}else{
				
				//$("#anopleu option[value='S']").attr("selected", true);

			}
			if (data.simbolos=="N") {
				$(".bloquea3").prop('disabled', true);

			}else{
				$(".bloquea3").prop('disabled', false);
				//$("#simbolos option[value='S']").attr("selected", true);
				$("#simbolos option[value='S']").attr("selected",true).parent().select2();
			}

			//agregados ultimo

			
			//$("caldiao")
			$("input[name=caldiao][value='"+data.caldiao+"']").prop("checked",true);
			//$("calotro")
			$("input[name=calotro][value='"+data.calotro+"']").prop("checked",true);

			//$("ancpla")
			$("input[name=ancpla][value='"+data.ancpla+"']").prop("checked",true);

			//$("ancplb")
			$("input[name=ancplb][value='"+data.ancplb+"']").prop("checked",true);
			




			
			

			


			
			

			
			
		})
		.fail(function() {
			console.log("error");
		})
		.always(function() {
			console.log("complete");
		});
		
     });
	
	$(document).ready(function() {
		var id_paciente =  <?php echo $this->uri->segment(4,0); ?>;
		$.ajax({
			url: '<?php echo base_url().'Rayos/Rayos/mostrar_registros_via_ajax_archivos/';?>',
			type: 'POST',
			//dataType: 'json',
			data: {id_paciente: id_paciente},
		})
		.done(function(data) {
			console.log("success");

			var resultado = JSON.parse(data);
                var contenido = '';                
                $.each(resultado, function(index, value) {
                	contenido += `<div class="input-group mb-3 juana " id="row2">
					  <input type="file" name="archivo[]" class="form-control file_input" style="display:none;"  >
					  <div class="input-group-append" style="height: 37px;">
					    <span class="input-group-text eliminar_file_delete" id="`+value.Id+`"><a href="javascript:void(0)"  class="btn btn-danger " ><i class=" fas fa-times-circle"></i>&nbsp;</a></span>
					    <span><a href="javascript:void(0)"  id="`+value.Id+`" class="btn btn-dark view_archvios_xx" ><i class="fas fa-eye"></i></a></span>
					  </div>
					</div>`;
				});

                $("#aplicamos_archivos1 ").append(contenido);

		})
		.fail(function() {
			console.log("error");
		})
		.always(function() {
			console.log("complete");
		});

		
		
	});

  
</script>
<script>
	
	$(document).ready(function() {
		$(document).on('click', '.eliminar_file_delete', function(event) {
			event.preventDefault();
			/* Act on the event */
			var user_id = $(this).attr("id"); 
			// var c_obj = $(this).parents("div");
          	Swal.fire({
			  title: '¿Estás seguro?',
			  text: "¡No podrás revertir esto!",
			  icon: 'warning',
			  showCancelButton: true,
			  confirmButtonColor: '#3085d6',
			  cancelButtonColor: '#d33',
			  confirmButtonText: '¡Sí, bórralo!'
			}).then((result) => {
			  if (result.value) {
			  	$.ajax({
			  		url: '<?php echo base_url().'Rayos/Rayos/delete_archivo_id_paciente/';?>',
			  		method: 'POST',
			  		data: {user_id: user_id},
			  	})
			  	.done(function() {
			  		console.log("success");
			  		 Swal.fire(
				      '¡Eliminado!',
				      'Su archivo ha sido eliminado.',
				      'success'
				    )
				   if($("#aplicamos_archivos1 div.juana:last-child").attr('id')){
	                    $("#aplicamos_archivos1 div.juana:last-child").remove();
	                   // $('#aplicamos_archivo div.input-group:not(:first-child)').slice(0)
	               // .remove();
	                }
			  	})
			  	.fail(function() {
			  		console.log("error");
			  	})
			  	.always(function() {
			  		console.log("complete");
			  	});
			  	
			   
			   
			  }
			})


		});
	//	$(".clasecombo").selectmenu();
		$(document).on('click', '.view_archvios_xx', function(event) {
			event.preventDefault();
			/* Act on the event */

			var user_id = $(this).attr("id"); 
           // var c_obj = $(this).parents("tr");

           $.ajax({
           	url: '<?php echo base_url().'Rayos/Rayos/mostramos_archivos_pdf/';?>',
           	type: 'POST',
           	dataType: 'json',
           	data: {user_id: user_id},
           })
           .done(function(data) {
           	console.log("success");
           	$("#pdfdoc").html('<iframe class="responsive-iframe img-responsive" src="<?php echo base_url().'upload/archivos/rayos/'?>'+data.archivo+'"  style="width:100%;height:750px;"></iframe>');
           	$(".bd-example-modal-lg").modal("show");


           })
           .fail(function() {
           	console.log("error");
           })
           .always(function() {
           	console.log("complete");
           });
           
			//alert(user_id);
		});


		
	});
	$(document).ready(function() {
		
		$(".add_more_oit_").click(function(event) {
			event.preventDefault();
			/* Act on the event */
			aplicamos = `<div class="input-group mb-3" >
						  <input type="file" name="archivo[]" class="form-control"  >
						  <div class="input-group-append" style="height: 37px;">
						    <span class="input-group-text " id="eliminar_file"><a href="javascript:void(0)" class="btn btn-danger" ><i class=" fas fa-times-circle"></i></a></span>
						  </div>
						</div>`;

			$("#aplicamos_archivos").append(aplicamos);

		});

		$("#simbolos").change(function(event) {
			/* Act on the event */
			event.preventDefault();
			var s = $("#simbolos").val();
			if (s=="S") {
				$(".bloquea3").prop('disabled', false);
			}else if(s=="N"){

				$(".bloquea3").prop('disabled', true);
				$(".bloquea3").prop("checked", false); 
			}else{

			}

		});

		$("#anopleu").change(function(event) {
			/* Act on the event */
			event.preventDefault();
			var s = $("#anopleu").val();
			if (s=="S") {
				$(".bloquea2").prop('disabled', false);
			}else if(s=="N"){

				$(".bloquea2").prop('disabled', true);
				$(".bloquea2").prop("checked", false); 
			}else{

			}
		});

		/*$("#eliminar_file").click(function(event) {
			/* Act on the event *
			event.preventDefault();

			alert("hola_eliminamos");
		});*/

		


        //mandamos a registrar mediante ajax

       
	});

	$(document).ready(function() {
		 $(document).on('submit', '#form_register_rayox_x', function(event) {
        	event.preventDefault();
        	/* Act on the event */
        	/* Act on the event */
			/*$("#form_register_rayox_x").submit(function(event) {
        		 Act on the event 
        		event.preventDefault();
        		$('#form_register_rayox_x').serialize();
        	});*/
        
        	$.ajax({
        		url: '<?php echo base_url().'Rayos/Rayos/Register_users_id/';?>',
        		type: 'POST',
        		//data: $("#form_register_rayox_x").serialize(),
        		data: new FormData(this),  
	            contentType: false,
	            processData: false,
        	})
        	.done(function(data) {
        		//datos que se registran como nuevo
        		
        		var json= JSON.parse(data);
				console.log("success");
					Swal.fire({
					  imageUrl: '<?php echo base_url().'upload/';?>stiker/tenor.gif?version=<?php echo rand(); ?>',
					  imageHeight: 100,
					  imageAlt: 'Felidades',
					  icon: 'success',
					  allowOutsideClick:false,
					  title: '¡Muy bien!',
					  text: ''+json.mensaje+''
					 
					})
					//limpiamos campos que no se actualzian

					$("#calid_01").text("");
					$("#calid_02").text("");
					$("#calid_03").text("");
					$("#calid_04").text("");


					$("#id_o").attr('style', '');
					$("#id_00").attr('style', '');
					$("#id_01").attr('style', '');
					$("#id_10").attr('style', '');
					$("#id_11").attr('style', '');
					$("#id_12").attr('style', '');
					$("#id_21").attr('style', '');
					$("#id_22").attr('style', '');
					$("#id_23").attr('style', '');
					$("#id_32").attr('style', '');
					$("#id_33").attr('style', '');
					$("#id_333").attr('style', '');
					//limpimaos los campos
					$("#pepe_01").attr('style', '');
					$("#pepe_02").attr('style', '');
					$("#pepe_03").attr('style', '');
					$("#pepe_04").attr('style', '');
					$("#pepe_05").attr('style', '');
					$("#pepe_06").attr('style', '');

					//limpiamos los sepes

					$("#sepe_01").attr('style', '');
					$("#sepe_02").attr('style', '');
					$("#sepe_03").attr('style', '');
					$("#sepe_04").attr('style', '');
					$("#sepe_05").attr('style', '');
					$("#sepe_06").attr('style', '');
					//limpiamos los opacing
					$("#opacig_O").attr('style', '');
					$("#opacig_A").attr('style', '');
					$("#opacig_B").attr('style', '');
					$("#opacig_C").attr('style', '');

					$("#anopleu_NO").html("");
					$("#anopleu_SI").html("");
					$("#simbolos_NO").html("");
					$("#simbolos_SI").html("");

					$("#sipao_01").attr('style', '');
					$("#sipao_02").attr('style', '');
					$("#sipao_03").attr('style', '');

					$("#sifreo_01").attr('style', '');
					$("#sifreo_02").attr('style', '');
					$("#sifreo_03").attr('style', '');

					$("#sidiao_01").attr('style', '');
					$("#sidiao_02").attr('style', '');
					$("#sidiao_03").attr('style', '');

					$("#siotro_01").attr('style', '');
					$("#siotro_02").attr('style', '');
					$("#siotro_03").attr('style', '');

					$("#calpao_01").attr('style', '');
					$("#calpao_02").attr('style', '');
					$("#calpao_03").attr('style', '');

					$("#calotro_01").attr('style', '');
					$("#calotro_02").attr('style', '');
					$("#calotro_03").attr('style', '');

					$("#caldiao_01").attr('style', '');
					$("#caldiao_02").attr('style', '');
					$("#caldiao_03").attr('style', '');

					$("#calfreo_01").attr('style', '');
					$("#calfreo_02").attr('style', '');
					$("#calfreo_03").attr('style', '');

					$("#extpla_00").attr('style', '');
					$("#extpla_01").attr('style', '');
					$("#extpla_02").attr('style', '');
					$("#extpla_03").attr('style', '');

					$("#extplb_00").attr('style', '');
					$("#extplb_01").attr('style', '');
					$("#extplb_02").attr('style', '');
					$("#extplb_03").attr('style', '');

					

					$("#ancpara_01").attr('style', '');
					$("#ancpara_02").attr('style', '');
					$("#ancpara_03").attr('style', '');

					$("#ancpla_01").attr('style', '');
					$("#ancpla_02").attr('style', '');
					$("#ancpla_03").attr('style', '');

					$("#ancplb_01").attr('style', '');
					$("#ancplb_02").attr('style', '');
					$("#ancplb_03").attr('style', '');



					$("#ancparb_01").attr('style', '');
					$("#ancparb_02").attr('style', '');
					$("#ancparb_03").attr('style', '');

					$("#extpar_00").attr('style', '');
					$("#extpar_01").attr('style', '');
					$("#extpar_02").attr('style', '');
					$("#extpar_03").attr('style', '');

					$("#parpero_00").attr('style', '');
					$("#parpero_01").attr('style', '');
					$("#parpero_02").attr('style', '');

					//ancpara_02
					//extparb
					$("#calpero_00").attr('style', '');
					$("#calpero_01").attr('style', '');
					$("#calpero_02").attr('style', '');

					$("#parfreo_00").attr('style', '');
					$("#parfreo_01").attr('style', '');
					$("#parfreo_02").attr('style', '');


					$("#calfreno_01").attr('style', '');
					$("#calfreno_02").attr('style', '');
					$("#calfreno_03").attr('style', '');

					

					


					


					
					
					
				

					

				


        	})
        	.fail(function() {
        		console.log("error");

        		//retoanrmos los errores que estan por pasar
        	})
        	.always(function() {

        		//aqui completamos los datos que se completan como nuevo
        		console.log("complete");
        	});
        	
        });

		 //mostramos y ocultamos
		$("#ocultamos_y_mostramis").click(function(event) {
			/* Act on the event */
			event.preventDefault();
			$("#eliminamos").hide();
			//$("#profile2").html(``);
			$(".letritas").attr('id', 'registar_consentimiento');

		});
		//mostramos
		$("#mostramos_datos").click(function(event) {
			/* Act on the event */
			event.preventDefault();
            $("#eliminamos").show();

			$("#profile2").show();
			$(".letritas").attr('id', 'form_register_rayox_x');
			
		});

		// cuando selecciona otros motivos que salga algo
		$("#motivo").change(function(event) {
			/* Act on the event */
			event.preventDefault();

			var valor = $("#motivo").val();
			if (valor==4) {
				$("#view_motivos").show(800);
				$("#motivo1").val("<?php echo $motivo1;?>").fadeIn();
			}else{
				$("#view_motivos").hide(800);
				$("#motivo1").val("");

			}
			
		});

		$(document).on('submit', '#registar_consentimiento', function(event) {
			event.preventDefault();
			/* Act on the event */
			$.ajax({
				url: '<?php echo base_url().'Rayos/Rayos/actualizar_consentimiento/';?>',
				type: 'POST',
				//dataType: 'default: Intelligent Guess (Other values: xml, json, script, or html)',
				data: $("#registar_consentimiento").serialize(),
			})
			.done(function(data) {
				 var json= JSON.parse(data);
				console.log("success");
					Swal.fire({
					  imageUrl: '<?php echo base_url().'upload/';?>stiker/tenor.gif?version=<?php echo rand(); ?>',
					  imageHeight: 100,
					  imageAlt: 'Felidades',
					  icon: 'success',
					  allowOutsideClick:false,
					  title: '¡Muy bien!',
					  text: ''+json.mensaje+''
					 
					})

					cargamos();

					
				 



			})
			.fail(function() {
				console.log("error");
			})
			.always(function() {
				console.log("complete");
			});
			
		});


		function mostramos_datos() {
			// body...
	        <?php if ($motivo1=="" || $motivo==null) {?>
	        	$("#view_motivos").hide(800);
				$("#motivo1").val("");

			<?php }else{?>
				$("#view_motivos").show(800);
				$("#motivo1").val("<?php echo $motivo1;?>").fadeIn();
			<?php } ?>


		}



		//aqui consultamos a ajax y lo traemos de nuevo para mostrar registros
	
			// body...
			
			

		

		setTimeout(function(){
           mostramos_datos();
 
           
         });

		

		

	});
	$(document).ready(function() {
		$(document).on('click', '#print_prueba_consentimiento', function(event) {
			event.preventDefault();
			/* Act on the event */

			var user_id = <?php echo $this->uri->segment(4,0); ?>;
			//alert("impimimos"+ user_id);
			$.ajax({
				url: '<?php echo base_url().'Rayos/Rayos/imprimir_data_oit/';?>',
				type: 'POST',
				dataType: 'json',
				data: {user_id: user_id},
			})
			.done(function(data) {
				console.log("success");
				$(".bd-example-modal-lg_consentimiento").modal("show");
				
			})
			.fail(function() {
				console.log("error");
			})
			.always(function() {
				console.log("complete");
			});
			
		});

		//alert("impimimos"+ user_id);




		

		
	});

	

	function cargamos() {
		// body..
		
		
		// body...
		$.ajax({
			url: '<?php echo base_url().'Rayos/Rayos/mostrar_registros_motivos_list/';?>',
			method: 'POST',
			contentType:false,
            processData:false,
		})
		.done(function(data) {
			console.log("success");
			var resultado = JSON.parse(data);
            var contenido = '';                
            $.each(resultado, function(index, value) {
            	let aplicamosx
            	if (value.Id==<?php echo $motivo;?> ) {
            		aplicamosx = `<span aria-hidden="true" style="
								                    border: 2px solid #210202;
								                    border-radius: 0%;
								                ">&nbsp;&nbsp;&times;&nbsp;&nbsp;</span>`;
            	}else{
            		aplicamosx = ``;
            	}
            	let aplicamosmensaje

            	if (value.Id==4 ) {
            		aplicamosmensaje = '<?php echo $motivo1;?>';

            	}else{
            		aplicamosmensaje = ``;
            	}

            	let ocultar
            	if (value.Id==4 ) {
            		ocultar=``;
            		
            	}else{
            		ocultar =`style="display:none"`;
            	}
            	contenido += `<table class="table" border="0">
	    					<tbody>
	    					<tr>
		            			<td>`+value.nombre+`</td>
		            			<td>`+aplicamosx+`</td>
		            		</tr>
		            		<tr `+ocultar+`>
		            		<td>`+aplicamosmensaje+`</td>
		            		</tr>
	    					</tbody>
	    				</table>
	    				`;
			});

            $("#mostrar_consentimiento_eva").html(contenido);
			

		})
		.fail(function() {
			console.log("error");
			
		})
		.always(function() {
			console.log("complete");

			setTimeout(function(){
			 cargamos();
			}, 2000);
		});




	}

	$(function() {
        cargamos();
    });




	
	

	$(document).ready(function() {
		$(document).on('click', '#print_prueba_rapida_oit', function(event) {
			event.preventDefault();
			/* Act on the event */
			var id_paciente = <?php echo $this->uri->segment(4,0);?>;

			$.ajax({
				url: '<?php echo base_url().'Rayos/Rayos/mostrar_rwegistros_online_del_oit/';?>',
				type: 'POST',
				dataType: 'json',
				data: {id_paciente: id_paciente},
			})
			.done(function(data) {
				console.log("success");
				$(".bd-example-modal-oit").modal("show");
				$("#anox").text(data.anox);
				$("#diasx").text(data.diasx);
				$("#mesx").text(data.mesx);
				//fecha_rad
				$("#anox_rad").text(data.anox_rad);
				$("#diasx_rad").text(data.diasx_rad);
				$("#mesx_rad").text(data.mesx_rad);

				//conclcciojn
				$("#concluccionxx").text(data.diagnostico);
				//validamos los datos que se salen eaclidad calidad radiogfrafica
				switch (data.pepe) {
				    case "p":
				        $("#pepe_01").attr('style', 'background-image:url("<?php echo base_url().'upload/'; ?>aspa/ico_aspa-negra.jpg?v=<?php echo rand(); ?>");background-position:center;background-repeat:no-repeat');
				        break;
				    case "q":
				         $("#pepe_02").attr('style', 'background-image:url("<?php echo base_url().'upload/'; ?>aspa/ico_aspa-negra.jpg?v=<?php echo rand(); ?>");background-position:center;background-repeat:no-repeat');
				        break;
				    case "r":
				         $("#pepe_03").attr('style', 'background-image:url("<?php echo base_url().'upload/'; ?>aspa/ico_aspa-negra.jpg?v=<?php echo rand(); ?>");background-position:center;background-repeat:no-repeat');
				        break;
				    case "s":
				         $("#pepe_04").attr('style', 'background-image:url("<?php echo base_url().'upload/'; ?>aspa/ico_aspa-negra.jpg?v=<?php echo rand(); ?>");background-position:center;background-repeat:no-repeat');
				        break;
				    case "t":
				         $("#pepe_05").attr('style', 'background-image:url("<?php echo base_url().'upload/'; ?>aspa/ico_aspa-negra.jpg?v=<?php echo rand(); ?>");background-position:center;background-repeat:no-repeat');
				        break;
				    case "u":
				         $("#pepe_06").attr('style', 'background-image:url("<?php echo base_url().'upload/'; ?>aspa/ico_aspa-negra.jpg?v=<?php echo rand(); ?>");background-position:center;background-repeat:no-repeat');
				        break;
				}

				//OPACING
				switch (data.opacig) {
				    case "O":
				        $("#opacig_O").attr('style', 'background-image:url("<?php echo base_url().'upload/'; ?>aspa/ico_aspa-negra.jpg?v=<?php echo rand(); ?>");background-position:center;background-repeat:no-repeat');
				        break;
				    case "A":
				         $("#opacig_A").attr('style', 'background-image:url("<?php echo base_url().'upload/'; ?>aspa/ico_aspa-negra.jpg?v=<?php echo rand(); ?>");background-position:center;background-repeat:no-repeat');
				        break;
				    case "B":
				         $("#opacig_B").attr('style', 'background-image:url("<?php echo base_url().'upload/'; ?>aspa/ico_aspa-negra.jpg?v=<?php echo rand(); ?>");background-position:center;background-repeat:no-repeat');
				        break;
				    case "C":
				         $("#opacig_C").attr('style', 'background-image:url("<?php echo base_url().'upload/'; ?>aspa/ico_aspa-negra.jpg?v=<?php echo rand(); ?>");background-position:center;background-repeat:no-repeat');
				        break;
				  
				}

				//sepe

				switch (data.sepe) {
				    case "p":
				        $("#sepe_01").attr('style', 'background-image:url("<?php echo base_url().'upload/'; ?>aspa/ico_aspa-negra.jpg?v=<?php echo rand(); ?>");background-position:center;background-repeat:no-repeat');
				        break;
				    case "q":
				         $("#sepe_02").attr('style', 'background-image:url("<?php echo base_url().'upload/'; ?>aspa/ico_aspa-negra.jpg?v=<?php echo rand(); ?>");background-position:center;background-repeat:no-repeat');
				        break;
				    case "r":
				         $("#sepe_03").attr('style', 'background-image:url("<?php echo base_url().'upload/'; ?>aspa/ico_aspa-negra.jpg?v=<?php echo rand(); ?>");background-position:center;background-repeat:no-repeat');
				        break;
				    case "s":
				         $("#sepe_04").attr('style', 'background-image:url("<?php echo base_url().'upload/'; ?>aspa/ico_aspa-negra.jpg?v=<?php echo rand(); ?>");background-position:center;background-repeat:no-repeat');
				        break;
				    case "t":
				         $("#sepe_05").attr('style', 'background-image:url("<?php echo base_url().'upload/'; ?>aspa/ico_aspa-negra.jpg?v=<?php echo rand(); ?>");background-position:center;background-repeat:no-repeat');
				        break;
				    case "u":
				         $("#sepe_06").attr('style', 'background-image:url("<?php echo base_url().'upload/'; ?>aspa/ico_aspa-negra.jpg?v=<?php echo rand(); ?>");background-position:center;background-repeat:no-repeat');
				        break;
				}

				switch (data.eacalidad) {
				    case "A":
				        $("#calid_01").html("<strong>X</strong>");
				        break;
				    case "B":
				         $("#calid_02").html("<strong>X</strong>");
				        break;
				    case "C":
				         $("#calid_03").html("<strong>X</strong>");
				        break;
				    case "D":
				         $("#calid_04").html("<strong>X</strong>");
				        break;
				}

				switch (data.extpla) {
				    case "0":
				        $("#extpla_00").attr('style', 'background-image:url("<?php echo base_url().'upload/'; ?>aspa/ico_aspa-negra.jpg?v=<?php echo rand(); ?>");background-position:center;background-repeat:no-repeat');
				        break;
				    case "1":
				         $("#extpla_01").attr('style', 'background-image:url("<?php echo base_url().'upload/'; ?>aspa/ico_aspa-negra.jpg?v=<?php echo rand(); ?>");background-position:center;background-repeat:no-repeat');
				        break;
				    case "2":
				         $("#extpla_02").attr('style', 'background-image:url("<?php echo base_url().'upload/'; ?>aspa/ico_aspa-negra.jpg?v=<?php echo rand(); ?>");background-position:center;background-repeat:no-repeat');
				        break;
				    case "3":
				         $("#extpla_03").attr('style', 'background-image:url("<?php echo base_url().'upload/'; ?>aspa/ico_aspa-negra.jpg?v=<?php echo rand(); ?>");background-position:center;background-repeat:no-repeat');
				}
				  

				switch (data.extplb) {
				    case "0":
				        $("#extplb_00").attr('style', 'background-image:url("<?php echo base_url().'upload/'; ?>aspa/ico_aspa-negra.jpg?v=<?php echo rand(); ?>");background-position:center;background-repeat:no-repeat');
				        break;
				    case "1":
				         $("#extplb_01").attr('style', 'background-image:url("<?php echo base_url().'upload/'; ?>aspa/ico_aspa-negra.jpg?v=<?php echo rand(); ?>");background-position:center;background-repeat:no-repeat');
				        break;
				    case "2":
				         $("#extplb_02").attr('style', 'background-image:url("<?php echo base_url().'upload/'; ?>aspa/ico_aspa-negra.jpg?v=<?php echo rand(); ?>");background-position:center;background-repeat:no-repeat');
				        break;
				    case "3":
				         $("#extplb_03").attr('style', 'background-image:url("<?php echo base_url().'upload/'; ?>aspa/ico_aspa-negra.jpg?v=<?php echo rand(); ?>");background-position:center;background-repeat:no-repeat');
				}




				switch (data.ancpara) {
				    case "a":
				        $("#ancpara_01").attr('style', 'background-image:url("<?php echo base_url().'upload/'; ?>aspa/ico_aspa-negra.jpg?v=<?php echo rand(); ?>");background-position:center;background-repeat:no-repeat');
				        break;
				    case "b":
				         $("#ancpara_02").attr('style', 'background-image:url("<?php echo base_url().'upload/'; ?>aspa/ico_aspa-negra.jpg?v=<?php echo rand(); ?>");background-position:center;background-repeat:no-repeat');
				        break;
				    case "c":
				         $("#ancpara_03").attr('style', 'background-image:url("<?php echo base_url().'upload/'; ?>aspa/ico_aspa-negra.jpg?v=<?php echo rand(); ?>");background-position:center;background-repeat:no-repeat');
				        break;

				}

				switch (data.ancpla) {
				    case "a":
				        $("#ancpla_01").attr('style', 'background-image:url("<?php echo base_url().'upload/'; ?>aspa/ico_aspa-negra.jpg?v=<?php echo rand(); ?>");background-position:center;background-repeat:no-repeat');
				        break;
				    case "b":
				         $("#ancpla_02").attr('style', 'background-image:url("<?php echo base_url().'upload/'; ?>aspa/ico_aspa-negra.jpg?v=<?php echo rand(); ?>");background-position:center;background-repeat:no-repeat');
				        break;
				    case "c":
				         $("#ancpla_03").attr('style', 'background-image:url("<?php echo base_url().'upload/'; ?>aspa/ico_aspa-negra.jpg?v=<?php echo rand(); ?>");background-position:center;background-repeat:no-repeat');
				        break;

				}

				switch (data.ancplb) {
				    case "a":
				        $("#ancplb_01").attr('style', 'background-image:url("<?php echo base_url().'upload/'; ?>aspa/ico_aspa-negra.jpg?v=<?php echo rand(); ?>");background-position:center;background-repeat:no-repeat');
				        break;
				    case "b":
				         $("#ancplb_02").attr('style', 'background-image:url("<?php echo base_url().'upload/'; ?>aspa/ico_aspa-negra.jpg?v=<?php echo rand(); ?>");background-position:center;background-repeat:no-repeat');
				        break;
				    case "c":
				         $("#ancplb_03").attr('style', 'background-image:url("<?php echo base_url().'upload/'; ?>aspa/ico_aspa-negra.jpg?v=<?php echo rand(); ?>");background-position:center;background-repeat:no-repeat');
				        break;

				}

				

				




				switch (data.ancparb) {
				    case "a":
				        $("#ancparb_01").attr('style', 'background-image:url("<?php echo base_url().'upload/'; ?>aspa/ico_aspa-negra.jpg?v=<?php echo rand(); ?>");background-position:center;background-repeat:no-repeat');
				        break;
				    case "b":
				         $("#ancparb_02").attr('style', 'background-image:url("<?php echo base_url().'upload/'; ?>aspa/ico_aspa-negra.jpg?v=<?php echo rand(); ?>");background-position:center;background-repeat:no-repeat');
				        break;
				    case "c":
				         $("#ancparb_03").attr('style', 'background-image:url("<?php echo base_url().'upload/'; ?>aspa/ico_aspa-negra.jpg?v=<?php echo rand(); ?>");background-position:center;background-repeat:no-repeat');
				        break;

				}

				switch (data.extpar) {
					case "0":
				        $("#extpar_00").attr('style', 'background-image:url("<?php echo base_url().'upload/'; ?>aspa/ico_aspa-negra.jpg?v=<?php echo rand(); ?>");background-position:center;background-repeat:no-repeat');
				        break;
				    case "1":
				        $("#extpar_01").attr('style', 'background-image:url("<?php echo base_url().'upload/'; ?>aspa/ico_aspa-negra.jpg?v=<?php echo rand(); ?>");background-position:center;background-repeat:no-repeat');
				        break;
				    case "2":
				         $("#extpar_02").attr('style', 'background-image:url("<?php echo base_url().'upload/'; ?>aspa/ico_aspa-negra.jpg?v=<?php echo rand(); ?>");background-position:center;background-repeat:no-repeat');
				        break;
				    case "3":
				         $("#extpar_03").attr('style', 'background-image:url("<?php echo base_url().'upload/'; ?>aspa/ico_aspa-negra.jpg?v=<?php echo rand(); ?>");background-position:center;background-repeat:no-repeat');
				        break;

				}

				switch (data.extparb) {
					case "0":
				        $("#extparb_00").attr('style', 'background-image:url("<?php echo base_url().'upload/'; ?>aspa/ico_aspa-negra.jpg?v=<?php echo rand(); ?>");background-position:center;background-repeat:no-repeat');
				        break;
				    case "1":
				        $("#extparb_01").attr('style', 'background-image:url("<?php echo base_url().'upload/'; ?>aspa/ico_aspa-negra.jpg?v=<?php echo rand(); ?>");background-position:center;background-repeat:no-repeat');
				        break;
				    case "2":
				         $("#extparb_02").attr('style', 'background-image:url("<?php echo base_url().'upload/'; ?>aspa/ico_aspa-negra.jpg?v=<?php echo rand(); ?>");background-position:center;background-repeat:no-repeat');
				        break;
				    case "3":
				         $("#extparb_03").attr('style', 'background-image:url("<?php echo base_url().'upload/'; ?>aspa/ico_aspa-negra.jpg?v=<?php echo rand(); ?>");background-position:center;background-repeat:no-repeat');
				        break;

				}

				switch (data.calfreno) {
					case "1":
				        $("#calfreno_00").attr('style', 'background-image:url("<?php echo base_url().'upload/'; ?>aspa/ico_aspa-negra.jpg?v=<?php echo rand(); ?>");background-position:center;background-repeat:no-repeat');
				        break;
				    case "2":
				        $("#calfreno_01").attr('style', 'background-image:url("<?php echo base_url().'upload/'; ?>aspa/ico_aspa-negra.jpg?v=<?php echo rand(); ?>");background-position:center;background-repeat:no-repeat');
				        break;
				    case "3":
				         $("#calfreno_02").attr('style', 'background-image:url("<?php echo base_url().'upload/'; ?>aspa/ico_aspa-negra.jpg?v=<?php echo rand(); ?>");background-position:center;background-repeat:no-repeat');
				        break;
				   

				}

			

				

				


				

				






				switch (data.rxcem) {
				    case "1":
				        $("#id_o").attr('style', 'background-image:url("<?php echo base_url().'upload/'; ?>aspa/ico_aspa-negra.jpg?v=<?php echo rand(); ?>");background-position:center;background-repeat:no-repeat');
				        break;
				    case "2":
				         $("#id_00").attr('style', 'background-image:url("<?php echo base_url().'upload/'; ?>aspa/ico_aspa-negra.jpg?v=<?php echo rand(); ?>");background-position:center;background-repeat:no-repeat');
				        break;
				    case "3":
				         $("#id_01").attr('style', 'background-image:url("<?php echo base_url().'upload/'; ?>aspa/ico_aspa-negra.jpg?v=<?php echo rand(); ?>");background-position:center;background-repeat:no-repeat');
				        break;
				    case "4":
				         $("#id_10").attr('style', 'background-image:url("<?php echo base_url().'upload/'; ?>aspa/ico_aspa-negra.jpg?v=<?php echo rand(); ?>");background-position:center;background-repeat:no-repeat');
				        break;
				    case "5":
				         $("#id_11").attr('style', 'background-image:url("<?php echo base_url().'upload/'; ?>aspa/ico_aspa-negra.jpg?v=<?php echo rand(); ?>");background-position:center;background-repeat:no-repeat');
				        break;
				    case "6":
				         $("#id_12").attr('style', 'background-image:url("<?php echo base_url().'upload/'; ?>aspa/ico_aspa-negra.jpg?v=<?php echo rand(); ?>");background-position:center;background-repeat:no-repeat');
				        break;
				    case "7":
				         $("#id_21").attr('style', 'background-image:url("<?php echo base_url().'upload/'; ?>aspa/ico_aspa-negra.jpg?v=<?php echo rand(); ?>");background-position:center;background-repeat:no-repeat');
				        break;
				    case "8":
				         $("#id_22").attr('style', 'background-image:url("<?php echo base_url().'upload/'; ?>aspa/ico_aspa-negra.jpg?v=<?php echo rand(); ?>");background-position:center;background-repeat:no-repeat');
				        break;
				    case "9":
				         $("#id_23").attr('style', 'background-image:url("<?php echo base_url().'upload/'; ?>aspa/ico_aspa-negra.jpg?v=<?php echo rand(); ?>");background-position:center;background-repeat:no-repeat');
				        break;
				    case "10":
				         $("#id_32").attr('style', 'background-image:url("<?php echo base_url().'upload/'; ?>aspa/ico_aspa-negra.jpg?v=<?php echo rand(); ?>");background-position:center;background-repeat:no-repeat');
				        break;
				    case "11":
				         $("#id_33").attr('style', 'background-image:url("<?php echo base_url().'upload/'; ?>aspa/ico_aspa-negra.jpg?v=<?php echo rand(); ?>");background-position:center;background-repeat:no-repeat');
				        break;
				    case "12":
				         $("#id_333").attr('style', 'background-image:url("<?php echo base_url().'upload/'; ?>aspa/ico_aspa-negra.jpg?v=<?php echo rand(); ?>");background-position:center;background-repeat:no-repeat');
				        break;

				}

				//rxcem cargamos

				//mostramos datos del eucarido cauradio_07 del 1 - 7

				if (data.cauradio=="1") {
					$("#cauradio_01").html("<strong>X</strong>");
				}else{
					$("#cauradio_01").html("");
				}
				if (data.cauradio2=="2") {
					$("#cauradio_02").html("<strong>X</strong>");
				}else{
					$("#cauradio_02").html("");
				}

				if (data.cauradio3=="3") {
					$("#cauradio_03").html("<strong>X</strong>");
				}else{
					$("#cauradio_03").html("");
				}

				if (data.cauradio4=="4") {
					$("#cauradio_04").html("<strong>X</strong>");
				}else{
					$("#cauradio_04").html("");
				}

				if (data.cauradio5=="5") {
					$("#cauradio_05").html("<strong>X</strong>");
				}else{
					$("#cauradio_05").html("");
				}
				if (data.cauradio6=="6") {
					$("#cauradio_06").html("<strong>X</strong>");
				}else{
					$("#cauradio_06").html("");
				}
				if (data.cauradio7=="7") {
					$("#cauradio_07").html("<strong>X</strong>");
				}else{
					$("#cauradio_07").html("");
				}

				//suder y infeder

				if (data.suder=="suder") {
					$("#suder01").html("<strong>X</strong>");
				}else{
					$("#suder01").html("");
				}

				if (data.suizq=="suizq") {
					$("#suizq01").html("<strong>X</strong>");
				}else{
					$("#suizq01").html("");
				}

				if (data.meder=="meder") {
					$("#meder01").html("<strong>X</strong>");
				}else{
					$("#meder01").html("");
				}

				if (data.meizq=="meizq") {
					$("#meizq01").html("<strong>X</strong>");
				}else{
					$("#meizq01").html("");
				}

				if (data.infder=="infder") {
					$("#infder_01").html("<strong>X</strong>");
				}else{
					$("#infder_01").html("");
				}

				if (data.infizq=="infizq") {
					$("#infizq01").html("<strong>X</strong>");
				}else{
					$("#infizq01").html("");
				}

				//antecendentes

				$("#antecedentes_id").text(data.antecedentes);

				//SI O NO
				switch (data.anopleu) {
				    case "N":
				        $("#anopleu_NO").html("<strong>X</strong>");
				        break;
				    case "S":
				         $("#anopleu_SI").html("<strong>X</strong>");
				        break;

				}

				switch (data.sipao) {
				    case "1":
				        $("#sipao_01").attr('style', 'background-image:url("<?php echo base_url().'upload/'; ?>aspa/ico_aspa-negra.jpg?v=<?php echo rand(); ?>");background-position:center;background-repeat:no-repeat');
				        break;
				    case "2":
				         $("#sipao_02").attr('style', 'background-image:url("<?php echo base_url().'upload/'; ?>aspa/ico_aspa-negra.jpg?v=<?php echo rand(); ?>");background-position:center;background-repeat:no-repeat');
				        break;
				    case "3":
				         $("#sipao_03").attr('style', 'background-image:url("<?php echo base_url().'upload/'; ?>aspa/ico_aspa-negra.jpg?v=<?php echo rand(); ?>");background-position:center;background-repeat:no-repeat');
				        break;

				}

				switch (data.sifreo) {
				    case "1":
				        $("#sifreo_01").attr('style', 'background-image:url("<?php echo base_url().'upload/'; ?>aspa/ico_aspa-negra.jpg?v=<?php echo rand(); ?>");background-position:center;background-repeat:no-repeat');
				        break;
				    case "2":
				         $("#sifreo_02").attr('style', 'background-image:url("<?php echo base_url().'upload/'; ?>aspa/ico_aspa-negra.jpg?v=<?php echo rand(); ?>");background-position:center;background-repeat:no-repeat');
				        break;
				    case "3":
				         $("#sifreo_03").attr('style', 'background-image:url("<?php echo base_url().'upload/'; ?>aspa/ico_aspa-negra.jpg?v=<?php echo rand(); ?>");background-position:center;background-repeat:no-repeat');
				        break;

				}

				switch (data.sidiao) {
				    case "1":
				        $("#sidiao_01").attr('style', 'background-image:url("<?php echo base_url().'upload/'; ?>aspa/ico_aspa-negra.jpg?v=<?php echo rand(); ?>");background-position:center;background-repeat:no-repeat');
				        break;
				    case "2":
				         $("#sidiao_02").attr('style', 'background-image:url("<?php echo base_url().'upload/'; ?>aspa/ico_aspa-negra.jpg?v=<?php echo rand(); ?>");background-position:center;background-repeat:no-repeat');
				        break;
				    case "3":
				         $("#sidiao_03").attr('style', 'background-image:url("<?php echo base_url().'upload/'; ?>aspa/ico_aspa-negra.jpg?v=<?php echo rand(); ?>");background-position:center;background-repeat:no-repeat');
				        break;

				}

				switch (data.siotro) {
				    case "1":
				        $("#siotro_01").attr('style', 'background-image:url("<?php echo base_url().'upload/'; ?>aspa/ico_aspa-negra.jpg?v=<?php echo rand(); ?>");background-position:center;background-repeat:no-repeat');
				        break;
				    case "2":
				         $("#siotro_02").attr('style', 'background-image:url("<?php echo base_url().'upload/'; ?>aspa/ico_aspa-negra.jpg?v=<?php echo rand(); ?>");background-position:center;background-repeat:no-repeat');
				        break;
				    case "3":
				         $("#siotro_03").attr('style', 'background-image:url("<?php echo base_url().'upload/'; ?>aspa/ico_aspa-negra.jpg?v=<?php echo rand(); ?>");background-position:center;background-repeat:no-repeat');
				        break;

				}

				switch (data.calpao) {
				    case "1":
				        $("#calpao_01").attr('style', 'background-image:url("<?php echo base_url().'upload/'; ?>aspa/ico_aspa-negra.jpg?v=<?php echo rand(); ?>");background-position:center;background-repeat:no-repeat');
				        break;
				    case "2":
				         $("#calpao_02").attr('style', 'background-image:url("<?php echo base_url().'upload/'; ?>aspa/ico_aspa-negra.jpg?v=<?php echo rand(); ?>");background-position:center;background-repeat:no-repeat');
				        break;
				    case "3":
				         $("#calpao_03").attr('style', 'background-image:url("<?php echo base_url().'upload/'; ?>aspa/ico_aspa-negra.jpg?v=<?php echo rand(); ?>");background-position:center;background-repeat:no-repeat');
				        break;

				}

				switch (data.calotro) {
				    case "1":
				        $("#calotro_01").attr('style', 'background-image:url("<?php echo base_url().'upload/'; ?>aspa/ico_aspa-negra.jpg?v=<?php echo rand(); ?>");background-position:center;background-repeat:no-repeat');
				        break;
				    case "2":
				         $("#calotro_02").attr('style', 'background-image:url("<?php echo base_url().'upload/'; ?>aspa/ico_aspa-negra.jpg?v=<?php echo rand(); ?>");background-position:center;background-repeat:no-repeat');
				        break;
				    case "3":
				         $("#calotro_03").attr('style', 'background-image:url("<?php echo base_url().'upload/'; ?>aspa/ico_aspa-negra.jpg?v=<?php echo rand(); ?>");background-position:center;background-repeat:no-repeat');
				        break;

				}
				


				switch (data.caldiao) {
				    case "1":
				        $("#caldiao_01").attr('style', 'background-image:url("<?php echo base_url().'upload/'; ?>aspa/ico_aspa-negra.jpg?v=<?php echo rand(); ?>");background-position:center;background-repeat:no-repeat');
				        break;
				    case "2":
				         $("#caldiao_02").attr('style', 'background-image:url("<?php echo base_url().'upload/'; ?>aspa/ico_aspa-negra.jpg?v=<?php echo rand(); ?>");background-position:center;background-repeat:no-repeat');
				        break;
				    case "3":
				         $("#caldiao_03").attr('style', 'background-image:url("<?php echo base_url().'upload/'; ?>aspa/ico_aspa-negra.jpg?v=<?php echo rand(); ?>");background-position:center;background-repeat:no-repeat');
				        break;

				}
				switch (data.calfreo) {
				    case "1":
				        $("#calfreo_01").attr('style', 'background-image:url("<?php echo base_url().'upload/'; ?>aspa/ico_aspa-negra.jpg?v=<?php echo rand(); ?>");background-position:center;background-repeat:no-repeat');
				        break;
				    case "2":
				         $("#calfreo_02").attr('style', 'background-image:url("<?php echo base_url().'upload/'; ?>aspa/ico_aspa-negra.jpg?v=<?php echo rand(); ?>");background-position:center;background-repeat:no-repeat');
				        break;
				    case "3":
				         $("#calfreo_03").attr('style', 'background-image:url("<?php echo base_url().'upload/'; ?>aspa/ico_aspa-negra.jpg?v=<?php echo rand(); ?>");background-position:center;background-repeat:no-repeat');
				        break;

				}

				switch (data.parpero) {
				    case "1":
				        $("#parpero_00").attr('style', 'background-image:url("<?php echo base_url().'upload/'; ?>aspa/ico_aspa-negra.jpg?v=<?php echo rand(); ?>");background-position:center;background-repeat:no-repeat');
				        break;
				    case "2":
				         $("#parpero_01").attr('style', 'background-image:url("<?php echo base_url().'upload/'; ?>aspa/ico_aspa-negra.jpg?v=<?php echo rand(); ?>");background-position:center;background-repeat:no-repeat');
				        break;
				    case "3":
				         $("#parpero_02").attr('style', 'background-image:url("<?php echo base_url().'upload/'; ?>aspa/ico_aspa-negra.jpg?v=<?php echo rand(); ?>");background-position:center;background-repeat:no-repeat');
				        break;

				}

				switch (data.calpero) {
				    case "1":
				        $("#calpero_00").attr('style', 'background-image:url("<?php echo base_url().'upload/'; ?>aspa/ico_aspa-negra.jpg?v=<?php echo rand(); ?>");background-position:center;background-repeat:no-repeat');
				        break;
				    case "2":
				         $("#calpero_01").attr('style', 'background-image:url("<?php echo base_url().'upload/'; ?>aspa/ico_aspa-negra.jpg?v=<?php echo rand(); ?>");background-position:center;background-repeat:no-repeat');
				        break;
				    case "3":
				         $("#calpero_02").attr('style', 'background-image:url("<?php echo base_url().'upload/'; ?>aspa/ico_aspa-negra.jpg?v=<?php echo rand(); ?>");background-position:center;background-repeat:no-repeat');
				        break;

				}


				switch (data.parfreo) {
				    case "1":
				        $("#parfreo_00").attr('style', 'background-image:url("<?php echo base_url().'upload/'; ?>aspa/ico_aspa-negra.jpg?v=<?php echo rand(); ?>");background-position:center;background-repeat:no-repeat');
				        break;
				    case "2":
				         $("#parfreo_01").attr('style', 'background-image:url("<?php echo base_url().'upload/'; ?>aspa/ico_aspa-negra.jpg?v=<?php echo rand(); ?>");background-position:center;background-repeat:no-repeat');
				        break;
				    case "3":
				         $("#parfreo_02").attr('style', 'background-image:url("<?php echo base_url().'upload/'; ?>aspa/ico_aspa-negra.jpg?v=<?php echo rand(); ?>");background-position:center;background-repeat:no-repeat');
				        break;

				}
				


				

				


				




				


				
				
				





				//SI O NO

				switch (data.simbolos) {
				    case "N":
				        $("#simbolos_NO").html("<strong>X</strong>");
				        break;
				    case "S":
				         $("#simbolos_SI").html("<strong>X</strong>");
				        break;

				}

				if (data.simaa=="simaa") {
					 $("#id_aa").attr('style', 'background-image:url("<?php echo base_url().'upload/'; ?>aspa/ico_ball-negra.jpg?v=<?php echo rand(); ?>");background-position:center;background-repeat:no-repeat');
				}else{
					 $("#id_aa").attr('style', '');
				}
				if (data.simat=="simat") {
					 $("#id_at").attr('style', 'background-image:url("<?php echo base_url().'upload/'; ?>aspa/ico_ball-negra.jpg?v=<?php echo rand(); ?>");background-position:center;background-repeat:no-repeat');
				}else{
					 $("#id_at").attr('style', '');
				}
				if (data.simax=="simax") {
					 $("#id_ax").attr('style', 'background-image:url("<?php echo base_url().'upload/'; ?>aspa/ico_ball-negra.jpg?v=<?php echo rand(); ?>");background-position:center;background-repeat:no-repeat');
				}else{
					 $("#id_ax").attr('style', '');
				}
				if (data.simbu=="simbu") {
					 $("#id_bu").attr('style', 'background-image:url("<?php echo base_url().'upload/'; ?>aspa/ico_ball-negra.jpg?v=<?php echo rand(); ?>");background-position:center;background-repeat:no-repeat');
				}else{
					 $("#id_bu").attr('style', '');
				}
				if (data.simca=="simca") {
					 $("#id_ca").attr('style', 'background-image:url("<?php echo base_url().'upload/'; ?>aspa/ico_ball-negra.jpg?v=<?php echo rand(); ?>");background-position:center;background-repeat:no-repeat');
				}else{
					 $("#id_ca").attr('style', '');
				}
				if (data.simcg=="simcg") {
					 $("#id_cg").attr('style', 'background-image:url("<?php echo base_url().'upload/'; ?>aspa/ico_ball-negra.jpg?v=<?php echo rand(); ?>");background-position:center;background-repeat:no-repeat');
				}else{
					 $("#id_cg").attr('style', '');
				}
				if (data.simcn=="simcn") {
					 $("#id_cn").attr('style', 'background-image:url("<?php echo base_url().'upload/'; ?>aspa/ico_ball-negra.jpg?v=<?php echo rand(); ?>");background-position:center;background-repeat:no-repeat');
				}else{
					 $("#id_cn").attr('style', '');
				}
				if (data.simco=="simco") {
					 $("#id_co").attr('style', 'background-image:url("<?php echo base_url().'upload/'; ?>aspa/ico_ball-negra.jpg?v=<?php echo rand(); ?>");background-position:center;background-repeat:no-repeat');
				}else{
					 $("#id_co").attr('style', '');
				}
				if (data.simcp=="simcp") {
					 $("#id_cp").attr('style', 'background-image:url("<?php echo base_url().'upload/'; ?>aspa/ico_ball-negra.jpg?v=<?php echo rand(); ?>");background-position:center;background-repeat:no-repeat');
				}else{
					 $("#id_cp").attr('style', '');
				}
				if (data.simcv=="simcv") {
					 $("#id_cv").attr('style', 'background-image:url("<?php echo base_url().'upload/'; ?>aspa/ico_ball-negra.jpg?v=<?php echo rand(); ?>");background-position:center;background-repeat:no-repeat');
				}else{
					 $("#id_cv").attr('style', '');
				}
				if (data.simdi=="simdi") {
					 $("#id_di").attr('style', 'background-image:url("<?php echo base_url().'upload/'; ?>aspa/ico_ball-negra.jpg?v=<?php echo rand(); ?>");background-position:center;background-repeat:no-repeat');
				}else{
					 $("#id_di").attr('style', '');
				}
				if (data.simef=="simef") {
					 $("#id_ef").attr('style', 'background-image:url("<?php echo base_url().'upload/'; ?>aspa/ico_ball-negra.jpg?v=<?php echo rand(); ?>");background-position:center;background-repeat:no-repeat');
				}else{
					 $("#id_ef").attr('style', '');
				}

				if (data.simem=="simem") {
					 $("#id_em").attr('style', 'background-image:url("<?php echo base_url().'upload/'; ?>aspa/ico_ball-negra.jpg?v=<?php echo rand(); ?>");background-position:center;background-repeat:no-repeat');
				}else{
					 $("#id_em").attr('style', '');
				}

				if (data.simes=="simes") {
					 $("#id_es").attr('style', 'background-image:url("<?php echo base_url().'upload/'; ?>aspa/ico_ball-negra.jpg?v=<?php echo rand(); ?>");background-position:center;background-repeat:no-repeat');
				}else{
					 $("#id_es").attr('style', '');
				}

				if (data.simfr=="simfr") {
					 $("#id_fr").attr('style', 'background-image:url("<?php echo base_url().'upload/'; ?>aspa/ico_ball-negra.jpg?v=<?php echo rand(); ?>");background-position:center;background-repeat:no-repeat');
				}else{
					 $("#id_fr").attr('style', '');
				}

				if (data.simhi=="simhi") {
					 $("#id_hi").attr('style', 'background-image:url("<?php echo base_url().'upload/'; ?>aspa/ico_ball-negra.jpg?v=<?php echo rand(); ?>");background-position:center;background-repeat:no-repeat');
				}else{
					 $("#id_hi").attr('style', '');
				}

				if (data.simho=="simho") {
					 $("#id_ho").attr('style', 'background-image:url("<?php echo base_url().'upload/'; ?>aspa/ico_ball-negra.jpg?v=<?php echo rand(); ?>");background-position:center;background-repeat:no-repeat');
				}else{
					 $("#id_ho").attr('style', '');
				}
				if (data.simid=="simid") {
					 $("#id_id").attr('style', 'background-image:url("<?php echo base_url().'upload/'; ?>aspa/ico_ball-negra.jpg?v=<?php echo rand(); ?>");background-position:center;background-repeat:no-repeat');
				}else{
					 $("#id_id").attr('style', '');
				}
				if (data.simih=="simih") {
					 $("#id_ih").attr('style', 'background-image:url("<?php echo base_url().'upload/'; ?>aspa/ico_ball-negra.jpg?v=<?php echo rand(); ?>");background-position:center;background-repeat:no-repeat');
				}else{
					 $("#id_ih").attr('style', '');
				}
				if (data.simkl=="simkl") {
					 $("#id_kl").attr('style', 'background-image:url("<?php echo base_url().'upload/'; ?>aspa/ico_ball-negra.jpg?v=<?php echo rand(); ?>");background-position:center;background-repeat:no-repeat');
				}else{
					 $("#id_kl").attr('style', '');
				}
				if (data.simme=="simme") {
					 $("#id_me").attr('style', 'background-image:url("<?php echo base_url().'upload/'; ?>aspa/ico_ball-negra.jpg?v=<?php echo rand(); ?>");background-position:center;background-repeat:no-repeat');
				}else{
					 $("#id_me").attr('style', '');
				}

				if (data.simpa=="simpa") {
					 $("#id_pa").attr('style', 'background-image:url("<?php echo base_url().'upload/'; ?>aspa/ico_ball-negra.jpg?v=<?php echo rand(); ?>");background-position:center;background-repeat:no-repeat');
				}else{
					 $("#id_pa").attr('style', '');
				}
				if (data.simpb=="simpb") {
					 $("#id_pb").attr('style', 'background-image:url("<?php echo base_url().'upload/'; ?>aspa/ico_ball-negra.jpg?v=<?php echo rand(); ?>");background-position:center;background-repeat:no-repeat');
				}else{
					 $("#id_pb").attr('style', '');
				}
				if (data.simpi=="simpi") {
					 $("#id_pi").attr('style', 'background-image:url("<?php echo base_url().'upload/'; ?>aspa/ico_ball-negra.jpg?v=<?php echo rand(); ?>");background-position:center;background-repeat:no-repeat');
				}else{
					 $("#id_pi").attr('style', '');
				}
				if (data.simpx=="simpx") {
					 $("#id_px").attr('style', 'background-image:url("<?php echo base_url().'upload/'; ?>aspa/ico_ball-negra.jpg?v=<?php echo rand(); ?>");background-position:center;background-repeat:no-repeat');
				}else{
					 $("#id_px").attr('style', '');
				}
				if (data.simra=="simra") {
					 $("#id_ra").attr('style', 'background-image:url("<?php echo base_url().'upload/'; ?>aspa/ico_ball-negra.jpg?v=<?php echo rand(); ?>");background-position:center;background-repeat:no-repeat');
				}else{
					 $("#id_ra").attr('style', '');
				}

				if (data.simrp=="simrp") {
					 $("#id_rp").attr('style', 'background-image:url("<?php echo base_url().'upload/'; ?>aspa/ico_ball-negra.jpg?v=<?php echo rand(); ?>");background-position:center;background-repeat:no-repeat');
				}else{
					 $("#id_rp").attr('style', '');
				}
				if (data.simtb=="simtb") {
					 $("#id_tb").attr('style', 'background-image:url("<?php echo base_url().'upload/'; ?>aspa/ico_ball-negra.jpg?v=<?php echo rand(); ?>");background-position:center;background-repeat:no-repeat');
				}else{
					 $("#id_tb").attr('style', '');
				}

				//oblito
				if (data.oblito=="oblito") {
					 $("#id_oblito").attr('style', 'background-image:url("<?php echo base_url().'upload/'; ?>aspa/ico_aspa-negra.jpg?v=<?php echo rand(); ?>");background-position:center;background-repeat:no-repeat');
				}else{
					 $("#id_oblito").attr('style', '');
				}
				if (data.oblitd=="oblitd") {
					 $("#id_oblitd").attr('style', 'background-image:url("<?php echo base_url().'upload/'; ?>aspa/ico_aspa-negra.jpg?v=<?php echo rand(); ?>");background-position:center;background-repeat:no-repeat');
				}else{
					 $("#id_oblitd").attr('style', '');
				}

				if (data.obliti=="obliti") {
					 $("#id_obliti").attr('style', 'background-image:url("<?php echo base_url().'upload/'; ?>aspa/ico_aspa-negra.jpg?v=<?php echo rand(); ?>");background-position:center;background-repeat:no-repeat');
				}else{
					 $("#id_obliti").attr('style', '');
				}

			})
			.fail(function() {
				console.log("error");
			})
			.always(function() {
				console.log("complete");
			});
			

			//


			$.ajax({
				url: '<?php echo base_url().'Rayos/Rayos/mostramos_archivos_pdf_id_paciente/';?>',
				type: 'POST',
				//dataType: 'json',
				data: {id_paciente: id_paciente},
			})
			.done(function(data) {
				console.log("success");

				var resultado = JSON.parse(data);
	                var contenido = '';                
	                $.each(resultado, function(index, value) {
	                	contenido += `
	    				<tr>
							<td height="139" align="left" class="FacetColumnTD">
							  	<img src="<?php echo base_url().'upload/archivos/rayos/'?>`+value.archivo+`" width="678" height="880" title="">
							</td>
						</tr>`;
					});

	                $("#aplicamos_archivos2 tbody").html(contenido);
	                
			})
			.fail(function() {
				console.log("error");
			})
			.always(function() {
				console.log("complete");
			});
		});
	});

	

	
	
	
</script>




	<!--mostramos los archivos pdfs-->
	<div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" data-backdrop="static"> 
	  <div class="modal-dialog modal-xl">
	    <div class="modal-content">
	    	<div class="modal-header">
	    		 <h5 class="modal-title" id="exampleModalLabel"><strong>PACIENTE: </strong><?php echo  $nombres_completos;?></h5>
	    		 <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true" style="
                    border: 2px solid #210202;
                    border-radius: 50%;
                ">&nbsp;&nbsp;&times;&nbsp;&nbsp;</span>
                </button>
	    	</div>
	    	<div class="modal-body">
	    		<div class="container">
				  <span id="pdfdoc"></span>
				</div>
	    	</div>
	    </div>
	  </div>
	</div>

	<!--imprimimos los datos del consentimiento-->
	<div class="modal fade bd-example-modal-lg_consentimiento" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" data-backdrop="static"> 
	  <div class="modal-dialog modal-xl">
	    <div class="modal-content">
	    	<div class="modal-header">
	    		 <h5 class="modal-title" id="exampleModalLabel"><strong>PACIENTE: </strong><?php echo  $nombres_completos;?></h5>
	    		 <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true" style="
                    border: 2px solid #210202;
                    border-radius: 50%;
                ">&nbsp;&nbsp;&times;&nbsp;&nbsp;</span>
                </button>
	    	</div>
	    	<div class="modal-body printableAreaconsetimiento">
	    		<div class="container">
	    			<div class="row">
	    				<div class="col-md-12 m-2">
		      				<img src="<?php echo base_url().'assets/';?>images/logo.png?v=<?php echo rand(); ?>" alt="">
		      			</div>
		      			<br>
		      			<br>
		      			<br>
		      			<br>
		      			<div class="col-md-12">
		      				<h3 class="text-center font-weight-bold">DECLARACION JURADA DE NO ACEPTACION DE TOMA DE PLACA <br> RADIOGRAFICA</h3>
		      			</div>
		      			<div class="col-md-12">
		      				<h5>
								Quien suscribe la presente, <span class="font-weight-bold"><?php echo  $nombres_completos;?></span> identificado(a) con DNI Nro.  <span class="font-weight-bold"><?php echo  $dni;?></span> expongo:
								Que por motivos que líneas abajo no doy consentimiento para realizar el examen de  rayos  X indicado.</h5>
		      			</div>	
	    			</div>
	    			<br>

	    			<div class="col-md-12" id="mostrar_consentimiento_eva">
	    				
	    			</div>

	      			
				</div>
	    	</div>
	    	<div class="modal-footer">
	        <button type="button" class="btn btn-outline-danger btn btn-rounded btn-lg" data-dismiss="modal"><i class=" fas fa-window-close"></i>&nbsp;Cerrar</button>
	        <button type="button" id="print_prueba_consentimiento_consentimiento" class="btn btn-outline-dark btn btn-rounded btn-lg"><i class=" fas fa-print"></i>&nbsp;Imprimir OIT</button>
	      </div>
	    </div>
	  </div>
	</div>

	<!--imprmit oit de toda las cosas-->

	<div class="modal fade bd-example-modal-oit" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" data-backdrop="static"> 
	  	<div class="modal-dialog modal-xl">
	    	<div class="modal-content">
		    	<div class="modal-header">
		    		 <h5 class="modal-title" id="exampleModalLabel"><strong>PACIENTE: </strong><?php echo  $nombres_completos;?></h5>
		    		 <button type="button" class="close" data-dismiss="modal" aria-label="Close">
	                  <span aria-hidden="true" style="
	                    border: 2px solid #210202;
	                    border-radius: 50%;
	                ">&nbsp;&nbsp;&times;&nbsp;&nbsp;</span>
	                </button>
		    	</div>
		    	<div class="modal-footer">
		    		<!--<button type="button" class="btn btn-outline-danger btn btn-rounded btn-lg" data-dismiss="modal"><i class=" fas fa-window-close"></i>&nbsp;Cerrar</button>-->
		        <button type="button" id="prienAreadetalle_general_rayos_xxx" class="btn btn-outline-dark btn btn-rounded btn-lg"><i class=" fas fa-print"></i>&nbsp;Imprimir OIT</button>
		    	</div>
		    	<!--style=" height: 790px;
	  width: 100%;
	  overflow-y: auto;"-->
		    	<div class="modal-body prienAreadetalle_general" >
		    		<div class="container-fluid">
					   <table width="950" align="center" cellpadding="00" cellspacing="0">
					      <tbody>
					         <tr>
					            <td height="60" align="left">
					               <div class="headAll" data-titulo="" data-logo="1" data-pagi="" data-classid="for_inf" data-debug="1">
					                  <table width="100%" align="center">
					                     <tbody>
					                        <tr class="FacetFilaTD">
					                           <td width="242" align="left" valign="middle" class="FacetDataTDM">
					                              <img src="
					                                 <?php echo base_url().'assets/';?>images/logo.png?v=
					                                 <?php echo rand(); ?>" alt="">
					                              <div class="line_head"></div>
					                           </td>
					                           <td width="391" align="center" class="FacetDataTDM12">&nbsp;</td>
					                           <td width="95" align="left" class="FacetDataTDM12" valign="top">&nbsp;
					                           </td>
					                        </tr>
					                     </tbody>
					                  </table>
					               </div>
					            </td>
					         </tr>
					         <tr>
					            <td class="FacetDataTDM14" align="center" style="padding-bottom:5px;">
					               <strong class="font-weight-bold">LECTURA DE RADIOGRAFÍA DE TÓRAX UTILIZANDO LA CLASIFICACIÓN INTERNACIONAL  DE LA OIT  DE RADIOGRAFÍAS DE NEUMOCONIOSIS</strong>
					            </td>
					         </tr>
					         <tr>
					            <td>
					               <table width="950" align="left" cellpadding="0" cellspacing="0" class="" border="1">
					                  <tbody>
					                     <tr class="FacetFilaTD">
					                        <td align="left" valign="bottom" class="FacetDataTDM11"></td>
					                        <td align="left" valign="bottom" class="FacetDataTDM11"></td>
					                        <td align="left" valign="bottom" class="FacetDataTDM11"></td>
					                        <td align="left" valign="bottom" class="FacetDataTDM11"></td>
					                        <td align="left" valign="bottom" class="FacetDataTDM11"></td>
					                        <td align="left" valign="bottom" class="FacetDataTDM11"></td>
					                        <td align="left" valign="bottom" class="FacetDataTDM11"></td>
					                        <td colspan="2" align="left" valign="bottom" class="FacetDataTDM11"></td>
					                        <td width="43" align="left" valign="bottom" class="FacetDataTDM11"></td>
					                     </tr>
					                     <tr class="FacetFilaTD">
					                        <td width="64" class="FacetlineTDM11" style="padding-left:5px">
					                           <strong>HCL</strong>
					                        </td>
					                        <td width="175" class="FacetlineTDM11" style="padding-left:5px"><?php echo $dni; ?></td>
					                        <td width="91" class="FacetlineTDM11" height="20" style="padding-left:5px;border-right:1px solid white;">
					                           <!--<strong>PLACA N°</strong>-->
					                        </td>
					                        <td colspan="3" align="center" class="FacetlineTDM11"></td>
					                        <td width="50" class="FacetlineTDM11" style="padding-left:5px">
					                           <strong>Lector</strong>
					                        </td>
					                        <td colspan="3" class="FacetlineTDM11">Espinal Bravo Percy Alfredo </td>
					                     </tr>
					                     <tr class="FacetFilaTD">
					                        <td class="FacetlineTDM11" height="20" style="padding-left:5px">
					                           <strong>Nombre</strong>
					                        </td>
					                        <td colspan="6" class="FacetlineTDM11" style="padding-left:5px"><?php echo $nombres_completos; ?></td>
					                        <td class="FacetlineTDM11" style="padding-left:5px">
					                           <strong>Edad</strong>
					                        </td>
					                        <td colspan="2" align="center" class="FacetlineTDM11"><?php echo $edad; ?></td>
					                     </tr>
					                     <tr class="FacetFilaTD">
					                        <td height="20" rowspan="2" align="left" valign="middle" class="FacetlineTDM11 " style="padding-left:5px">
					                           <strong>Fecha de lectura</strong>
					                        </td>
					                        <td align="center" valign="bottom" class="FacetlineTDM11" id="diasx"></td>
					                        <td align="center" valign="bottom" class="FacetlineTDM11" id="mesx"></td>
					                        <td align="center" valign="bottom" class="FacetlineTDM11" id="anox"></td>
					                        <td rowspan="2" align="left" valign="bottom" class="FacetlineTDM11">&nbsp;</td>
					                        <td colspan="2" rowspan="2" align="center" valign="middle" class="FacetlineTDM11">
					                           <strong>Fecha de radiografía</strong>
					                        </td>
					                        <td align="center" valign="bottom" class="FacetlineTDM11" id="diasx_rad"></td>
					                        <td align="center" valign="bottom" class="FacetlineTDM11" id="mesx_rad"></td>
					                        <td align="center" valign="bottom" class="FacetlineTDM11" id="anox_rad"></td>
					                     </tr>
					                     <tr class="FacetFilaTD">
					                        <td width="42" align="center" valign="bottom" class="FacetlineTDM11">Dia</td>
					                        <td width="44" align="center" valign="bottom" class="FacetlineTDM11">Mes</td>
					                        <td width="48" align="center" valign="bottom" class="FacetlineTDM11">Año</td>
					                        <td width="43" align="center" valign="bottom" class="FacetlineTDM11">Dia</td>
					                        <td width="43" align="center" valign="bottom" class="FacetlineTDM11">Mes</td>
					                        <td align="center" valign="bottom" class="FacetlineTDM11">Año</td>
					                     </tr>
					                  </tbody>
					               </table>
					            </td>
					         </tr>
					         <tr>
					            <td>
					               <table width="950" cellpadding="0" cellspacing="0" border="1">
					                  <tbody>
					                     <tr>
					                        <td width="170" rowspan="4" valign="middle" bgcolor="#999999" class="FacetlineTDM11 NoBorderTop" style="padding-left:5px;color: #ffffff;">
					                           <strong>I. Calidad 
					                           <br>Radiográfica
					                           </strong>
					                        </td>
					                        <td width="16" height="20" align="center" class="FacetlineTDM11 NoBorderTop">
					                           <strong>1</strong>
					                        </td>
					                        <td width="80" align="left" class="FacetlineTDM11 NoBorderTop" height="15" style="padding-left:5px">Buena</td>
					                        <td width="27" align="center" class="FacetlineTDM11 NoBorderTop" id="calid_01">&nbsp;</td>
					                        <td width="87" rowspan="4" align="center" valign="middle" class="FacetlineTDM11 NoBorderTop">
					                           <strong>Causas</strong>
					                        </td>
					                        <td width="21" align="center" class="FacetlineTDM11 NoBorderTop">1</td>
					                        <td width="119" align="left" class="FacetlineTDM11 NoBorderTop" style="padding-left:5px">Sobreexposición</td>
					                        <td width="27" align="center" class="FacetlineTDM11 NoBorderTop" id="cauradio_01">&nbsp;</td>
					                        <td width="13" align="center" class="FacetlineTDM11 NoBorderTop">5</td>
					                        <td width="90" align="left" class="FacetlineTDM11 NoBorderTop" style="padding-left:5px">Escapulas</td>
					                        <td width="35" align="center" class="FacetlineTDM11 NoBorderTop" id="cauradio_05">&nbsp;</td>
					                     </tr>
					                     <tr>
					                        <td width="16" height="20" align="center" class="FacetlineTDM11">
					                           <strong>2</strong>
					                        </td>
					                        <td width="80" align="left" class="FacetlineTDM11" height="15" style="padding-left:5px">Aceptable</td>
					                        <td width="27" align="center" class="FacetlineTDM11" id="calid_02">
					                        </td>
					                        <td width="21" align="center" class="FacetlineTDM11">2</td>
					                        <td width="119" align="left" class="FacetlineTDM11" style="padding-left:5px">Subexposición</td>
					                        <td width="27" align="center" class="FacetlineTDM11" id="cauradio_02">&nbsp;</td>
					                        <td width="13" align="center" class="FacetlineTDM11">6</td>
					                        <td width="90" align="left" class="FacetlineTDM11" style="padding-left:5px">Artefacto</td>
					                        <td width="35" align="center" class="FacetlineTDM11" id="cauradio_06">&nbsp;</td>
					                     </tr>
					                     <tr>
					                        <td width="16" height="20" align="center" class="FacetlineTDM11">
					                           <strong>3</strong>
					                        </td>
					                        <td width="80" align="left" class="FacetlineTDM11" height="15" style="padding-left:5px">Baja Calidad</td>
					                        <td width="27" align="center" class="FacetlineTDM11" id="calid_03">&nbsp;</td>
					                        <td width="21" align="center" class="FacetlineTDM11">3</td>
					                        <td width="119" align="left" class="FacetlineTDM11" style="padding-left:5px">Posición centrado</td>
					                        <td width="27" align="center" class="FacetlineTDM11" id="cauradio_03">
					                        </td>
					                        <td width="13" align="center" class="FacetlineTDM11">7</td>
					                        <td width="90" align="left" class="FacetlineTDM11" style="padding-left:5px">Otros</td>
					                        <td width="35" align="center" class="FacetlineTDM11" id="cauradio_07">&nbsp;</td>
					                     </tr>
					                     <tr>
					                        <td width="16" height="20" align="center" class="FacetlineTDM11">
					                           <strong>4</strong>
					                        </td>
					                        <td width="80" align="left" class="FacetlineTDM11" height="15" style="padding-left:5px">Inaceptable</td>
					                        <td width="27" align="center" class="FacetlineTDM11" id="calid_04">&nbsp;</td>
					                        <td width="21" align="center" class="FacetlineTDM11">4</td>
					                        <td width="119" align="left" class="FacetlineTDM11" style="padding-left:5px">Inspiración Insuficiente</td>
					                        <td width="27" align="center" class="FacetlineTDM11" id="cauradio_04">&nbsp;</td>
					                        <td width="13" align="center" class="FacetlineTDM11">&nbsp;</td>
					                        <td width="90" align="left" class="FacetlineTDM11">&nbsp;</td>
					                        <td width="35" align="center" class="FacetlineTDM11">&nbsp;</td>
					                     </tr>
					                     <tr>
					                        <td align="left" class="FacetlineTDM11" colspan="2" style="padding-left:5px">Comentario sobre 
					                           <br>defectos Técnicos
					                        </td>
					                        <td colspan="9" align="left" valign="top" class="FacetlineTDM11" id="antecedentes_id">&nbsp; </td>
					                     </tr>
					                  </tbody>
					               </table>
					            </td>
					         </tr>
					         <tr>
					            <td>
					               <table width="950" cellpadding="0" cellspacing="0" border="1">
					                  <tbody>
					                     <tr>
					                        <td height="20" colspan="13" align="left" class="FacetlineTDM11 NoBorderTop" style="padding-left:5px;color: #ffffff;" bgcolor="#999999">
					                           <strong>II.ANORMALIDADES PARENQUIMATOSAS </strong>(si NO hay anormalidades  pase a III A.Pleurales)
					                        </td>
					                     </tr>
					                     <tr>
					                        <td colspan="3" align="left" class="FacetlineTDM11" style="padding-left:5px">
					                           <strong>2.1. Zonas Afectadas</strong> (marque TODAS las zonas afectadas)
					                        </td>
					                        <td colspan="3" align="left" class="FacetlineTDM11" style="padding-left:5px">
					                           <strong>2.2. Profusión (opacidad pequeñas)(escala de 12 puntos)</strong> (Consulte las radiografías estándar; marque la subcategoría)
					                        </td>
					                        <td colspan="4" align="left" class="FacetlineTDM11" style="padding-left:5px">
					                           <strong>2.3. Forma  y Tamaño</strong> (Consulte las radiografías estándar; se requieren dos simbolos; marque un primario y en secundario)
					                        </td>
					                        <td colspan="3" align="left" class="FacetlineTDM11" style="padding-left:5px">
					                           <strong>2.4. Opacidades Grandes</strong> (Marque 0 si no hay ninguna o marque A, B o C)
					                        </td>
					                     </tr>
					                     <tr>
					                        <td width="60" height="25" align="left" class="FacetlineTDM11">&nbsp;</td>
					                        <td width="32" align="center" class="FacetlineTDM11">
					                           <strong>Der.</strong>
					                        </td>
					                        <td width="30" align="center" class="FacetlineTDM11">
					                           <strong>Izq.</strong>
					                        </td>
					                        <td width="67" align="center" class="FacetlineTDM11" id="id_o">0/- </td>
					                        <td width="58" align="center" class="FacetlineTDM11" id="id_00">0/0 </td>
					                        <td width="72" align="center" class="FacetlineTDM11" id="id_01">0/1 </td>
					                        <td align="center" class="FacetlineTDM11" colspan="2">Primaria</td>
					                        <td align="center" class="FacetlineTDM11" colspan="2">Secundaria</td>
					                        <td width="40" align="center" class="FacetDataTDM11">&nbsp;</td>
					                        <td width="43" align="center" class="FacetlineTDM11" id="opacig_O">O</td>
					                        <td width="29" align="center" class="FacetlineTD NoBorderBottom">&nbsp;</td>
					                     </tr>
					                     <tr>
					                        <td height="25" align="center" class="FacetlineTDM11">
					                           <strong>Superior</strong>
					                        </td>
					                        <td align="center" class="FacetlineTDM11" id="suder01">&nbsp;</td>
					                        <td align="center" class="FacetlineTDM11" id="suizq01">&nbsp;</td>
					                        <td align="center" class="FacetlineTDM11" id="id_10">1/0 </td>
					                        <td align="center" class="FacetlineTDM11" id="id_11">1/1 </td>
					                        <td align="center" class="FacetlineTDM11" id="id_12">1/2 </td>
					                        <td width="48" align="center" class="FacetlineTDM11" id="pepe_01">p </td>
					                        <td width="43" align="center" class="FacetlineTDM11" id="pepe_04">s </td>
					                        <td width="40" align="center" class="FacetlineTDM11" id="sepe_01">p </td>
					                        <td width="43" align="center" class="FacetlineTDM11" id="sepe_04">s </td>
					                        <td align="center" class="FacetDataTDM11"></td>
					                        <td align="center" class="FacetlineTDM11" id="opacig_A">A</td>
					                        <td align="center" class="FacetlineTD NoBorderTopBottom">&nbsp;</td>
					                     </tr>
					                     <tr>
					                        <td height="25" align="center" class="FacetlineTDM11">
					                           <strong>Medio</strong>
					                        </td>
					                        <td align="center" class="FacetlineTDM11" id="meder01">&nbsp;</td>
					                        <td align="center" class="FacetlineTDM11" id="meizq01">&nbsp;</td>
					                        <td align="center" class="FacetlineTDM11" id="id_21">2/1</td>
					                        <td align="center" class="FacetlineTDM11" id="id_22">2/2 </td>
					                        <td align="center" class="FacetlineTDM11" id="id_23">2/3 </td>
					                        <td align="center" class="FacetlineTDM11" id="pepe_02">q </td>
					                        <td align="center" class="FacetlineTDM11" id="pepe_05">t </td>
					                        <td align="center" class="FacetlineTDM11" id="sepe_02">q </td>
					                        <td align="center" class="FacetlineTDM11" id="sepe05">t </td>
					                        <td align="center" class="FacetDataTDM11">&nbsp;</td>
					                        <td align="center" class="FacetlineTDM11" id="opacig_B">B</td>
					                        <td align="center" class="FacetlineTD NoBorderTopBottom">&nbsp;</td>
					                     </tr>
					                     <tr>
					                        <td height="25" align="center" class="FacetlineTDM11">
					                           <strong>Inferior</strong>
					                        </td>
					                        <td align="center" class="FacetlineTDM11" id="infder_01">&nbsp;</td>
					                        <td align="center" class="FacetlineTDM11" id="infizq01">&nbsp;</td>
					                        <td align="center" class="FacetlineTDM11" id="id_32">3/2 </td>
					                        <td align="center" class="FacetlineTDM11" id="id_33">3/3 </td>
					                        <td align="center" class="FacetlineTDM11" id="id_333">3/+ </td>
					                        <td align="center" class="FacetlineTDM11" id="pepe_03">r </td>
					                        <td align="center" class="FacetlineTDM11" id="pepe_06">u </td>
					                        <td align="center" class="FacetlineTDM11" id="sepe_03">r </td>
					                        <td align="center" class="FacetlineTDM11" id="sepe_06">u </td>
					                        <td align="center" class="FacetlineTDM11">&nbsp;</td>
					                        <td align="center" class="FacetlineTDM11" id="opacig_C">C</td>
					                        <td align="center" class="FacetlineTD NoBorderTop">&nbsp;</td>
					                     </tr>
					                  </tbody>
					               </table>
					            </td>
					         </tr>
					         <tr>
					            <td>
					               <table width="950" cellpadding="0" cellspacing="0" border="1">
					                  <tbody>
					                     <tr>
					                        <td height="20" colspan="10" align="left" class="FacetlineTDM11 NoBorderTop" style="padding-left:5px;color: #FFF; " bgcolor="#999999">
					                           <strong>III.ANORMALIDADES PLEURALES </strong>(si NO hay anormalidades pase a símbolos)
					                        </td>
					                        <td width="27" align="center" class="FacetlineTDM11 NoBorderTop">
					                           <strong>SI</strong>
					                        </td>
					                        <td width="39" align="center" class="FacetlineTDM11 NoBorderTop" id="anopleu_SI">
					                           &nbsp;
					                        </td>
					                        <td width="36" align="center" class="FacetlineTDM11 NoBorderTop">
					                           <strong>NO</strong>
					                        </td>
					                        <td width="43" align="center" class="FacetlineTDM11 NoBorderTop" id="anopleu_NO">
					                        </td>
					                     </tr>
					                     <tr>
					                        <td colspan="14" align="left" class="FacetlineTDM11" height="20" style="padding-left:5px">
					                           <strong>3.1 Placas Pleurales </strong>(0=Ninguna, D=Hemitórax derecho; I=Hemitórax izquierdo)
					                        </td>
					                     </tr>
					                  </tbody>
					               </table>
					            </td>
					         </tr>
					         <tr>
					            <td>
					               <table width="950" cellpadding="0" cellspacing="0" border="1">
					                  <tbody>
					                     <tr>
					                        <td colspan="4" rowspan="5" align="left" class="FacetlineTDM11 NoBorderTop" style="padding-left:5px">
					                           <strong>Sitio </strong>
					                           <br>
					                           (Marque)   las casillas
					                           <br> adecuadas
					                        </td>
					                        <td align="left" class="FacetlineTDM11 NoBorderTop" rowspan="5" colspan="3" style="padding-left:5px" bgcolor="#CCCCCC">
					                           <strong>Calcificación </strong>(marque)
					                        </td>
					                        <td align="left" class="FacetlineTDM11 NoBorderTop" colspan="7" style="padding-left:5px">Extensión (pared Toracica; combinada para placas de perfil y de frente)</td>
					                        <td align="left" class="FacetlineTDM11 NoBorderTop" colspan="8" style="padding-left:5px" bgcolor="#CCCCCC">Ancho (opcional) 
					                           <br>(ancho minimo exigido : 3 mm)
					                        </td>
					                     </tr>
					                     <tr>
					                        <td width="28" align="center" class="FacetlineTDM11" height="15"> 1</td>
					                        <td align="left" class="FacetlineTDM11" colspan="6" style="padding-left:5px">&lt; 1/4 de la pared lateral del tórax</td>
					                        <td width="26" align="center" class="FacetlineTDM11">a</td>
					                        <td colspan="7" align="left" class="FacetlineTDM11" style="padding-left:5px" bgcolor="#CCCCCC">De 3 a 5 mm</td>
					                     </tr>
					                     <tr>
					                        <td width="28" align="center" class="FacetlineTDM11" height="15"> 2</td>
					                        <td align="left" class="FacetlineTDM11" colspan="6" style="padding-left:5px">Entre 1/4 y 1/2 de la pared lateral del tórax</td>
					                        <td width="26" align="center" class="FacetlineTDM11">b</td>
					                        <td colspan="7" align="left" class="FacetlineTDM11" style="padding-left:5px" bgcolor="#CCCCCC">De 5 a 10 mm</td>
					                     </tr>
					                     <tr>
					                        <td width="28" align="center" class="FacetlineTDM11" height="15"> 3</td>
					                        <td align="left" class="FacetlineTDM11" colspan="6" style="padding-left:5px">&gt; 1/2 de la pared lateral del tórax</td>
					                        <td width="26" align="center" class="FacetlineTDM11">c</td>
					                        <td colspan="7" align="left" class="FacetlineTDM11" style="padding-left:5px" bgcolor="#CCCCCC">Mayor a 10 mm</td>
					                     </tr>
					                     <tr>
					                        <td align="left" class="FacetDataTDM11" height="15">&nbsp;</td>
					                        <td width="34" align="center" class="FacetlineTDM11" id="extpla_00" >0</td>
					                        <td align="center" class="FacetlineTDM11" colspan="2">D</td>
					                        <td width="37" align="center" class="FacetlineTDM11" id="extplb_00">0</td>
					                        <td align="center" class="FacetlineTDM11" colspan="2">I</td>
					                        <td align="center" class="FacetDataTDM11">&nbsp;</td>
					                        <td colspan="3" align="center" class="FacetlineTDM11" bgcolor="#CCCCCC">D</td>
					                        <td align="center" class="FacetlineTDM11" colspan="3" bgcolor="#CCCCCC">I</td>
					                     </tr>
					                     <tr>
					                        <td width="84" align="left" class="FacetlineTDM11" height="20" style="padding-left:5px">
					                           <strong> Perfil</strong>
					                        </td>
					                        <td width="22" align="center" class="FacetlineTDM11" id="sipao_01" >0</td>
					                        <td width="18" align="center" class="FacetlineTDM11" id="sipao_02">D</td>
					                        <td width="20" align="center" class="FacetlineTDM11" id="sipao_03">I</td>
					                        <td width="32" align="center" class="FacetlineTDM11" bgcolor="#CCCCCC" id="calpao_01">0</td>
					                        <td width="32" align="center" class="FacetlineTDM11" bgcolor="#CCCCCC" id="calpao_02">D</td>
					                        <td width="30" align="center" class="FacetlineTDM11" bgcolor="#CCCCCC" id="calpao_03">I</td>
					                        <td align="center" class="FacetDataTDM11">&nbsp;</td>
					                        <td align="center" class="FacetlineTDM11" id="extpla_01">1 </td>
					                        <td align="center" class="FacetlineTDM11" id="extpla_02">2 </td>
					                        <td width="32" align="center" class="FacetlineTDM11" id="extpla_03">3 </td>
					                        <td align="center" class="FacetlineTDM11" id="extplb_01">1 </td>
					                        <td width="40" align="center" class="FacetlineTDM11" id="extplb_02">2 </td>
					                        <td width="37" align="center" class="FacetlineTDM11" id="extplb_03">3 </td>
					                        <td width="26" align="center" class="FacetDataTDM11">&nbsp;</td>
					                        <td width="30" align="center" class="FacetlineTDM11" bgcolor="#CCCCCC" id="ancpla_01">a </td>
					                        <td width="30" align="center" class="FacetlineTDM11" bgcolor="#CCCCCC" id="ancpla_02">b </td>
					                        <td width="30" align="center" class="FacetlineTDM11" bgcolor="#CCCCCC" id="ancpla_03">c </td>
					                        <td width="30" align="center" class="FacetlineTDM11" bgcolor="#CCCCCC" id="ancplb_01">a </td>
					                        <td width="30" align="center" class="FacetlineTDM11" bgcolor="#CCCCCC" id="ancplb_02">b</td>
					                        <td width="30" align="center" class="FacetlineTDM11" bgcolor="#CCCCCC" id="ancplb_03">c</td>
					                     </tr>
					                     <tr>
					                        <td width="84" align="left" class="FacetlineTDM11" height="20" style="padding-left:5px">
					                           <strong>De frente</strong>
					                        </td>
					                        <td width="22" align="center" class="FacetlineTDM11" id="sifreo_01"> 0</td>
					                        <td width="18" align="center" class="FacetlineTDM11" id="sifreo_02"> D</td>
					                        <td width="20" align="center" class="FacetlineTDM11" id="sifreo_03"> I</td>
					                        <td width="32" align="center" class="FacetlineTDM11" bgcolor="#CCCCCC" id="calfreo_01"> 0</td>
					                        <td width="32" align="center" class="FacetlineTDM11" bgcolor="#CCCCCC" id="calfreo_02">D</td>
					                        <td align="center" class="FacetlineTDM11" bgcolor="#CCCCCC" id="calfreo_03"> I</td>
					                        <td width="28" align="left" class="FacetDataTDM11">&nbsp;</td>
					                        <td width="34" align="center" class="FacetDataTDM11">&nbsp;</td>
					                        <td width="32" align="center" class="FacetDataTDM11">&nbsp;</td>
					                        <td width="32" align="center" class="FacetDataTDM11">&nbsp;</td>
					                        <td width="37" align="center" class="FacetDataTDM11">&nbsp;</td>
					                        <td width="40" align="center" class="FacetDataTDM11">&nbsp;</td>
					                        <td width="37" align="center" class="FacetDataTDM11">&nbsp;</td>
					                        <td align="center" class="FacetDataTDM11">&nbsp;</td>
					                        <td align="center" class="FacetDataTDM11">&nbsp;</td>
					                        <td align="center" class="FacetDataTDM11">&nbsp;</td>
					                        <td align="center" class="FacetDataTDM11">&nbsp;</td>
					                        <td align="center" class="FacetDataTDM11">&nbsp;</td>
					                        <td align="center" class="FacetDataTDM11">&nbsp;</td>
					                        <td align="center" class="FacetDataTDM11" style="border-right: 1px solid #000000; ">&nbsp;</td>
					                     </tr>
					                     <tr>
					                        <td width="84" align="left" class="FacetlineTDM11" height="20" style="padding-left:5px">
					                           <strong>Diafragma</strong>
					                        </td>
					                        <td width="22" align="center" class="FacetlineTDM11" id="sidiao_01"> 0</td>
					                        <td width="18" align="center" class="FacetlineTDM11" id="sidiao_02"> D</td>
					                        <td width="20" align="center" class="FacetlineTDM11" id="sidiao_03"> I</td>
					                        <td width="32" align="center" class="FacetlineTDM11" bgcolor="#CCCCCC" id="caldiao_01"> 0</td>
					                        <td width="32" align="center" class="FacetlineTDM11" bgcolor="#CCCCCC" id="caldiao_02"> D</td>
					                        <td align="center" class="FacetlineTDM11" bgcolor="#CCCCCC" id="caldiao_03"> I</td>
					                        <td width="28" align="left" class="FacetDataTDM11">&nbsp;</td>
					                        <td align="center" class="FacetDataTDM11">&nbsp;</td>
					                        <td align="center" class="FacetDataTDM11">&nbsp;</td>
					                        <td width="32" align="center" class="FacetDataTDM11">&nbsp;</td>
					                        <td align="center" class="FacetDataTDM11">&nbsp;</td>
					                        <td align="center" class="FacetDataTDM11">&nbsp;</td>
					                        <td align="center" class="FacetDataTDM11">&nbsp;</td>
					                        <td align="center" class="FacetDataTDM11">&nbsp;</td>
					                        <td align="center" class="FacetDataTDM11">&nbsp;</td>
					                        <td align="center" class="FacetDataTDM11">&nbsp;</td>
					                        <td align="center" class="FacetDataTDM11">&nbsp;</td>
					                        <td align="center" class="FacetDataTDM11">&nbsp;</td>
					                        <td align="center" class="FacetDataTDM11">&nbsp;</td>
					                        <td align="center" class="FacetDataTDM11" style="border-right: 1px solid #000000; ">&nbsp;</td>
					                     </tr>
					                     <tr>
					                        <td width="84" align="left" class="FacetlineTDM11" height="20" style="padding-left:5px">
					                           <strong>Otro(s) sitio(s)</strong>
					                        </td>
					                        <td width="22" align="center" class="FacetlineTDM11" id="siotro_01"> 0</td>
					                        <td width="18" align="center" class="FacetlineTDM11" id="siotro_02"> D</td>
					                        <td width="20" align="center" class="FacetlineTDM11" id="siotro_03"> I</td>
					                        <td width="32" align="center" class="FacetlineTDM11" bgcolor="#CCCCCC" id="calotro_01"> 0</td>
					                        <td width="32" align="center" class="FacetlineTDM11" bgcolor="#CCCCCC" id="calotro_02"> D</td>
					                        <td align="center" class="FacetlineTDM11" bgcolor="#CCCCCC" id="calotro_03"> I</td>
					                        <td align="left" class="">&nbsp;</td>
					                        <td align="left" class="">&nbsp;</td>
					                        <td align="left" class="">&nbsp;</td>
					                        <td align="left" class="">&nbsp;</td>
					                        <td align="left" class="">&nbsp;</td>
					                        <td align="left" class="">&nbsp;</td>
					                        <td align="left" class="">&nbsp;</td>
					                        <td align="left" class="">&nbsp;</td>
					                        <td align="left" class="">&nbsp;</td>
					                        <td align="left" class="">&nbsp;</td>
					                        <td align="left" class="">&nbsp;</td>
					                        <td align="center" class="FacetDataTDM11">&nbsp;</td>
					                        <td align="center" class="FacetDataTDM11">&nbsp;</td>
					                        <td align="center" class="FacetDataTDM11" style="border-right: 1px solid #000000; ">&nbsp;</td>
					                     </tr>
					                     <tr>
					                        <td align="left" class="FacetlineTDM11" colspan="7" height="20" style="padding-left:5px">Obliteración del Ángulo Costofrenico</td>
					                        <td align="center" class="FacetlineTDM11" id="id_oblito">0</td>
					                        <td align="center" class="FacetlineTDM11" id="id_oblitd">D</td>
					                        <td align="center" class="FacetlineTDM11" id="id_obliti">I</td>
					                        <td colspan="11" align="center" class="FacetlineTDM11 NoBorderTop"></td>
					                     </tr>
					                  </tbody>
					               </table>
					            </td>
					         </tr>
					         <tr>
					            <td>
					               <table width="950" cellpadding="0" cellspacing="0" border="1">
					                  <tbody>
					                     <tr>
					                        <td colspan="21" align="left" class="FacetlineTDM11 NoBorderTop" height="20" style="padding-left:5px">
					                           <strong>3.2 Engrosamiento Difuso de la Pleura</strong>(0=Ninguna, D=Hemitórax derecho; I=Hemitórax izquierdo)
					                        </td>
					                     </tr>
					                     <tr>
					                        <td colspan="4" align="center" class="FacetlineTDM11" height="20">
					                           <strong>Pared Toráxica</strong>
					                        </td>
					                        <td colspan="3" align="center" class="FacetlineTDM11">
					                           <strong>Calcificación </strong>
					                        </td>
					                        <td colspan="7" align="center" class="FacetlineTDM11">
					                           <strong>Extensión </strong>
					                        </td>
					                        <td width="11" align="center" class="">&nbsp;</td>
					                        <td colspan="6" align="center" class="FacetlineTDM11">
					                           <strong>Ancho </strong>
					                        </td>
					                     </tr>
					                     <tr>
					                        <td width="76" align="left" class="FacetlineTDM11" height="20" style="padding-left:5px">De perfil</td>
					                        <td width="20" align="center" class="FacetlineTDM11" id="parpero_00">0</td>
					                        <td width="21" align="center" class="FacetlineTDM11" id="parpero_01">D</td>
					                        <td width="20" align="center" class="FacetlineTDM11" id="parpero_02">I</td>
					                        <td width="24" align="center" class="FacetlineTDM11" id="calpero_00">0</td>
					                        <td width="28" align="center" class="FacetlineTDM11" id="calpero_01">D</td>
					                        <td width="35" align="center" class="FacetlineTDM11" id="calpero_02">I</td>
					                        <td width="14" align="center" class="FacetDataTDM11">&nbsp;</td>
					                        <td width="31" height="16" align="center" class="FacetlineTDM11" id="extpar_00">0</td>
					                        <td align="center" class="FacetlineTDM11" colspan="2">D</td>
					                        <td width="31" align="center" class="FacetlineTDM11" id="extparb_00">0</td>
					                        <td colspan="2" align="center" class="FacetlineTDM11">I</td>
					                        <td align="center" class="">&nbsp;</td>
					                        <td colspan="3" align="center" class="FacetlineTDM11">D </td>
					                        <td colspan="3" align="center" class="FacetlineTDM11">I </td>
					                     </tr>
					                     <tr>
					                        <td align="left" class="FacetlineTDM11" height="20">&nbsp;</td>
					                        <td align="center" class="FacetlineTDM11">&nbsp;</td>
					                        <td align="center" class="FacetlineTDM11">&nbsp;</td>
					                        <td align="center" class="FacetlineTDM11">&nbsp;</td>
					                        <td align="center" class="FacetlineTDM11">&nbsp;</td>
					                        <td align="center" class="FacetlineTDM11">&nbsp;</td>
					                        <td align="center" class="FacetlineTDM11">&nbsp;</td>
					                        <td align="center" class="FacetDataTDM11">&nbsp;</td>
					                        <td align="center" class="FacetlineTDM11" id="extpar_01">1</td>
					                        <td width="23" align="center" class="FacetlineTDM11" id="extpar_02">2</td>
					                        <td width="30" align="center" class="FacetlineTDM11" id="extpar_03">3</td>
					                        <td align="center" class="FacetlineTDM11" id="extparb_01">1 </td>
					                        <td width="34" align="center" class="FacetlineTDM11" id="extparb_02">2 </td>
					                        <td width="28" align="center" class="FacetlineTDM11" id="extparb_03">3 </td>
					                        <td align="center">&nbsp;</td>
					                        <td width="30" align="center" class="FacetlineTDM11" id="ancpara_01">a </td>
					                        <td width="30" align="center" class="FacetlineTDM11" id="ancpara_02">b </td>
					                        <td width="25" align="center" class="FacetlineTDM11" id="ancpara_03">c </td>
					                        <td width="29" align="center" class="FacetlineTDM11" id="ancparb_01">a</td>
					                        <td width="28" align="center" class="FacetlineTDM11" id="ancparb_02">b</td>
					                        <td width="30" align="center" class="FacetlineTDM11" id="ancparb_03">c</td>
					                     </tr>
					                     <tr>
					                        <td width="76" align="left" class="FacetlineTDM11" height="20" style="padding-left:5px">De frente</td>
					                        <td width="20" align="center" class="FacetlineTDM11" id="parfreo_00"> 0</td>
					                        <td width="21" align="center" class="FacetlineTDM11" id="parfreo_01"> D</td>
					                        <td width="20" align="center" class="FacetlineTDM11" id="parfreo_02"> I</td>
					                        <td width="24" align="center" class="FacetlineTDM11" id="calfreno_00"> 0</td>
					                        <td width="28" align="center" class="FacetlineTDM11" id="calfreno_01"> D</td>
					                        <td align="center" class="FacetlineTDM11" id="calfreno_02"> I</td>
					                        <td colspan="14" align="center" class="FacetlineTDM11 NoBorderTop">&nbsp;</td>
					                     </tr>
					                  </tbody>
					               </table>
					            </td>
					         </tr>
					         <tr>
					            <td colspan="5">
					               <table width="950" cellpadding="0" cellspacing="0" border="1">
					                  <tbody>
					                     <tr>
					                        <td width="545" align="left" class="FacetlineTDM11 NoBorderTop" height="20" style="padding-left:5px">
					                           <strong>IV. SIMBOLOS *</strong>
					                        </td>
					                        <td width="34" align="center" class="FacetlineTDM11 NoBorderTop" >
					                           <strong>SI</strong>
					                        </td>
					                        <td width="29" align="center" class="FacetlineTDM11 NoBorderTop" id="simbolos_SI">&nbsp;</td>
					                        <td width="29" class="FacetlineTDM11 NoBorderTop" align="center">
					                           <strong>NO</strong>
					                        </td>
					                        <td width="26" align="center" class="FacetlineTDM11 NoBorderTop" id="simbolos_NO">
					                        </td>
					                     </tr>
					                  </tbody>
					               </table>
					            </td>
					         </tr>
					         <tr>
					            <td>
					               <table width="950" cellpadding="0" cellspacing="0" border="1">
					                  <tbody>
					                     <tr>
					                        <td align="left" class="FacetlineTDM11 NoBorderTop" colspan="15" height="15" style="padding-left:5px">(Rodee con un círculo la respuesta adecuada; si rodea 
					                           <strong>od</strong>, escriba a continuación un 
					                           <strong>COMENTARIO</strong>)
					                        </td>
					                     </tr>
					                     <tr>
					                        <td width="38" align="center" class="FacetlineTDM11" height="25" id="id_aa"> aa</td>
					                        <td width="40" align="center" class="FacetlineTDM11" id="id_at"> at</td>
					                        <td width="38" align="center" class="FacetlineTDM11" id="id_ax"> ax</td>
					                        <td width="33" align="center" class="FacetlineTDM11" id="id_bu"> bu</td>
					                        <td width="35" align="center" class="FacetlineTDM11" id="id_ca"> ca</td>
					                        <td width="36" align="center" class="FacetlineTDM11" id="id_cg"> cg</td>
					                        <td width="33" align="center" class="FacetlineTDM11" id="id_cn"> cn</td>
					                        <td width="33" align="center" class="FacetlineTDM11" id="id_co"> co</td>
					                        <td width="32" align="center" class="FacetlineTDM11" id="id_cp"> cp</td>
					                        <td width="28" align="center" class="FacetlineTDM11" id="id_cv"> cv</td>
					                        <td width="29" align="center" class="FacetlineTDM11" id="id_di"> di</td>
					                        <td width="26" align="center" class="FacetlineTDM11" id="id_ef"> ef</td>
					                        <td width="30" align="center" class="FacetlineTDM11" id="id_em"> em</td>
					                        <td width="32" align="center" class="FacetlineTDM11" id="id_es"> es</td>
					                        <td width="129" align="center" rowspan="2" class="FacetlineTDM11"></td>
					                     </tr>
					                     <tr>
					                        <td width="40" align="center" class="FacetlineTDM11" height="25" id="id_fr"> fr</td>
					                        <td width="40" align="center" class="FacetlineTDM11" id="id_hi"> hi</td>
					                        <td width="38" align="center" class="FacetlineTDM11" id="id_ho"> ho</td>
					                        <td width="33" align="center" class="FacetlineTDM11" id="id_id"> id</td>
					                        <td width="35" align="center" class="FacetlineTDM11" id="id_ih"> ih</td>
					                        <td width="36" align="center" class="FacetlineTDM11" id="id_kl"> kl</td>
					                        <td width="33" align="center" class="FacetlineTDM11" id="id_me"> me</td>
					                        <td width="33" align="center" class="FacetlineTDM11" id="id_pa"> pa</td>
					                        <td width="32" align="center" class="FacetlineTDM11" id="id_pb"> pb</td>
					                        <td width="28" align="center" class="FacetlineTDM11" id="id_pi"> pi</td>
					                        <td width="29" align="center" class="FacetlineTDM11" id="id_px"> px</td>
					                        <td width="26" align="center" class="FacetlineTDM11" id="id_ra"> ra</td>
					                        <td width="30" align="center" class="FacetlineTDM11" id="id_rp"> rp</td>
					                        <td width="32" align="center" class="FacetlineTDM11" id="id_tb"> tb</td>
					                     </tr>
					                  </tbody>
					               </table>
					            </td>
					         </tr>
					         <tr>
					            <td class="FacetDataTDM11">
					               <table width="950" cellpadding="0" cellspacing="0" border="1">
					                  <tbody>
					                     <tr>
					                        <td width="91" align="left" class="FacetDataTDM11 NoBorderTop" style="border-bottom:1px solid #000; border-left:1px solid #000;border-top:1px solid #000;font-size:10px;padding-left:5px" height="20">
					                           <strong>CONCLUSIÓN</strong>
					                        </td>
					                        <td width="584" colspan="5" align="left" class="FacetDataTDM11 NoBorderTop" id="concluccionxx" style="border-bottom:1px solid #000; border-right:1px solid #000;border-top:1px solid #000; ">.&nbsp;</td>
					                     </tr>
					                  </tbody>
					               </table>
					            </td>
					         </tr>
					         <tr>
					            <td class="FacetDataTDM11">
					               <table width="950" cellpadding="0" cellspacing="0" border="1">
					                  <tbody>
					                     <tr>
					                        <td width="188" height="82" align="center" valign="middle" class="FacetlineTDM11 NoBorderTop" style="font-size:11px">
					                           <span class="FacetDataTDM11" style="font-size:11px">
					                           <strong>Firma y sello del médico
					                           <br>  Percy Alfredo  Espinal Bravo
					                           <br>C.M.P. :034748 &nbsp; &nbsp;  &nbsp; &nbsp; 
					                           </strong>
					                           </span>
					                        </td>
					                        <td width="497" align="left" valign="middle" class="FacetlineTDM11 NoBorderTop" style="font-size:11px;padding-left:5px;">
					                           <img src="<?php echo base_url().'upload/';?>firma/518.jpg?v=<?php echo rand(); ?>" width="169" height="71" title="" oncontextmenu="return false" onkeydown="return false">
					                        </td>
					                     </tr>
					                  </tbody>
					               </table>
					            </td>
					         </tr>
					      </tbody>
					   </table>
					   <table width="950" align="center" id="aplicamos_archivos2">
					      <tbody>
					         <tr>
					            <td height="20" align="left" class="FacetColumnTD">
					               <div class="headAll" data-titulo="" data-logo="" data-pagi="" data-classid="for_inf" data-debug="2">
					                  <table width="100%" align="center">
					                     <tbody>
					                        <tr class="FacetFilaTD">
					                           <td width="242" align="left" valign="middle" class="FacetDataTDM"></td>
					                           <td width="391" align="center" class="FacetDataTDM12">&nbsp;</td>
					                           <td width="95" align="left" class="FacetDataTDM12" valign="top">&nbsp;
					                           </td>
					                        </tr>
					                     </tbody>
					                  </table>
					               </div>
					            </td>
					         </tr>
					      </tbody>
					   </table>
					</div>
				</div>
			</div>
		</div>
	</div>

<style>
	strong{
		font-weight: bold;
	}
</style>






