<div class="row">
			
			<div class="col-12">
				<div class="card">
					<div class="card-body">
						 <div class="card-header badge-info">
                  <h4 class="m-b-0 text-white">Nuevo Pedido </h4>
                </div>
						
	          <br>
	          <div class="text-left" id="ocultar_print">
              <a href="<?php echo base_url().'Mantenimiento/Pedidos/';?>" class="btn btn-danger" ><i class="fa fa-reply m-r-5"></i><span> Regresar </span></a>
              
            </div>
								<br>
	          <?php $queryx = $this->db->query("select *, CONCAT(nombres,' ', apellido_paterno,' ', apellido_materno) AS nombres,
         
		          CASE
		            WHEN id_genero = 1 THEN 'varon.png'
		            WHEN id_genero = 2 THEN 'mujer.png'
		            WHEN id_genero = 3 THEN 'medio.png'
		            ELSE 'distinto.png'
		          END as id_otros
		         from ts_datos_personales as t where id_usuario=".$this->session->userdata("session_id")."");
		        foreach ($queryx->result() as $xx) {
		           $nombres_completosxx = $xx->nombres;
		           $nombres = $xx->nombres;
		           $imagen = $xx->imagen;
		           $id_otrosx = $xx->Id;
		           $dnix = $xx->nro_documento;
		           $telefonox = $xx->telefono_movil;
		         } ?>
	          <form action="#" id="registrar_cabecera" method="POST">
						 <div class="col-md-12">
							 	<div class="row">
		            		 <div id="results"></div>
		            		<div class="col-md-3">
		            			<div class="form-group">
		            				<label  for="">Serie</label>
		            				<input type="text" name="serie" id="serie" class="form-control btn-rounded" placeholder="" readonly="" value="0001" style=" cursor: not-allowed;">
		            			</div>
		            		</div>
		            		<div class="col-md-3">
	            				<div class="form-group">
		            				<label  for="">Numero</label>
		            				<input type="text" name="numero" id="numero" class="form-control btn-rounded" placeholder="" readonly="" value="" style=" cursor: not-allowed;">
		            			</div>
		            		</div>
										<div class="col-md-3 col-lg-3 col-xl-3 col-sm-12 col-xs-12">
											<div class="form-group">
												<label  for="">Area</label>
												<select name="areaDelUsuario" id="areaDelUsuario" class="form-control btn btn-rounded"  style="width: 100%; height: 50px;" required>
													<option value="no seleccionada">--Seleccione-- </option>		
													<?php foreach($areas_lista  as $one_area) {?> 											  

														<option value="<?php echo $one_area ?>"><?php echo $one_area ?></option>			   
													<?php }?>         					
												</select>											
											</div>
		            		</div>
		            		<div class="col-md-3 col-lg-3 col-xl-3 col-sm-12 col-xs-12">
	            				<div class="form-group">
		            				<label  for="">Fecha</label><br>
		            				
		            				<input type="hidden" name="fecha" id="date-format" class="form-control btn-rounded "  value="<?php echo date('Y-m-d h:i:s'); ?>" readonly="" >
		            				<span class="form-control btn-rounded " readonly><?php echo date('Y-m-d h:i:s'); ?></span>
		            				
		            			</div>
		            		</div>
										
										
		            		
		            	</div>
		            	<h5 class="card-title">Mi datos personales </h5> 
		            	<div class="row">
		            		<div class="col-md-4 col-lg-4 col-xl-4 col-sm-12 col-xs-12">
	            				<div class="form-group">
		            				<label  for="">Trabajador</label>
		            				<input type="text" name="trabajador" id="trabajadores_emple_xx_x" class="form-control btn-rounded" placeholder=""  value="<?php echo $nombres_completosxx; ?>" maxlength="5" readonly="" style=" cursor: not-allowed;"  onkeyup="aMays(event, this)">
		            				<input type="hidden" name="id_usuario_id_xx" id="trabajadores_empl_id" value="<?php echo $id_otrosx;?>">
		            				
		            			</div>
		            		</div>
		            		<div class="col-md-4 col-lg-4 col-xl-4 col-sm-12 col-xs-12">
	            				<div class="form-group">
		            				<label  for="">DNI</label>
		            				<input type="text" name="dni_xx" id="dni_emple" class="form-control btn-rounded" placeholder=""  onkeydown="return soloNumeros(event)" readonly="" style=" cursor: not-allowed;" value="<?php echo $dnix; ?>">
		            			</div>
		            		</div>
		            		<div class="col-md-4 col-lg-4 col-xl-4 col-sm-12 col-xs-12">
	            				<div class="form-group">
		            				<label  for="">Telefono</label>
		            				<input type="text" name="telefono_xx" id="telefono_emple" class="form-control btn-rounded" placeholder="Ingrese Teléfono (Teléfono)" value="<?php echo $telefonox; ?>"  onkeydown="return soloNumeros(event)" readonly="" style=" cursor: not-allowed;">
		            			</div>
		            		</div>
		            	</div> 
							 	
		            	 

		            	<h5 class="card-title">Busqueda de Producto</h5>
		            	<div class="row">
		            		
		            		<div class="col-md-4 col-lg-4 col-xl-4 col-sm-12 col-xs-12">
	            				<div class="form-group">
		            				<label  for="">Ingrese Producto (Click sobre ella)</label>
		            				<input type="text" name="producto" id="codigo_producto_xx" class="form-control btn-rounded" placeholder="Ingrese producto" maxlength="4" onkeyup="aMays(event, this)">
		            				<input type="hidden" name="id_usuario_id" id="codigo_producto_xx_id" value="" onkeyup="aMays(event, this)">
		            				<input type="hidden" name="id_usuario_id" id="codigo_producto_xx_xx" value="">
		            			</div>
		            		</div>
		            		<div class="col-md-4 col-lg-4 col-xl-4 col-sm-12 col-xs-12" >
	            				
									  	<div class="form-group">
												<label  for="">Seleccione UNIDADES</label>
												<select name="unidad" id="unidad" class="form-control select2 btn btn-rounded"  style="width: 100%; height: 50px;">
													<option value="">--Seleccione-- </option>													  
													<option value="1">UND</option>			            					
												</select>											
											</div>
			            	
		            		</div>
		            		<div class='col-md-2'>
		            			<label for="" >&nbsp;</label><br>
				            <button id="btn-agregar" class="btn btn-outline-success  btn-rounded"><i class="fas fa-plus-circle"></i> Agregar </button>
				          </div>
		            		
		            	</div>
	            	
	          </div> 
	          </form>

	           
						<form   id="registrar_pedido_detalle_view" >
	          <!--tabla-->
	          <div class="table-responsive">

                  <table id="show_date" class="table table-bordered table-striped table-hover aplica_data" cellspacing="0" width="100%" >
                  	<thead>
                  		<tr >
                        <th>#</th>
                        <th>Codigo</th>
                        <th >Nombre</th>
                        <th >Unidad Medida</th>
                        <th>Stock Max</th>
                        <th>Cantidad</th>
                        <th>Opciones</th>
                      </tr>
                  	</thead>
                  	<tbody>
                  		
                  	</tbody >
                  </table>
                  <button style="display: none;" id="ocultar___" type="submit" class="btn-success btn btn-rounded"><i class=" fas fa-sign-out-alt"></i> Registrar</button>
                </div>
						</form>
					</div>
				</div>
				
			</div>
			
		</div>

		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
		<script>
		/*	function registrar_codigo(e) {
				if (e.keyCode === 13 && !e.shiftKey) {
				 	 var id_codigo = $("#codigo_barras").val();
				 	 $.ajax({
				 	 	url: '<?php base_url().'Inventario/Pedidos/agregar_por_codigo/';?>',
				 	 	type: 'POST',
				 	 	dataType: 'json',
				 	 	data: {id_codigo:id_codigo},
				 	 })
				 	 .done(function(data) {
				 	 	
				 	 	var $html =`<tr class="jdr1" id="` + rowid + `">
	                 	<td><span class="btn btn-sm btn-default"></span>` + $sr + `</span><input type="hidden" name="count[]" value="6437"></td>'</td>
	                 	<td><input type="hidden" name="codigo[]" value="`+data.codigo+`" />`+data.codigo+`</td>
	                 	<td><input type="hidden" name="nombre[]" value="`+data.nombre+`" />`+data.nombre+`</td>
	                 	<td>15</td>
	                 	<td style="width:20%;"><input type='text' class='form-control form-control-danger  requerido btn-rounded ' id='inputHorizontalDnger' name='cantidad[]' placeholder='' value='0' <?php echo numero_();?> maxlength="4"></td>
	                <td>
	              		<a class="btn-outline-danger btn btn-remove-producto" id="" href="javascript:void(0)"><i class="fas fa-times-circle"></i></a>
	              	</td>
	              </tr>`;
	       			 $("#show_date tbody").append($html);	

	       			 //$("#show_date").show();
				 	 })
				 	 .fail(function() {
				 	 	console.log("error");
				 	 })
				 	 .always(function() {
				 	 	console.log("complete");
				 	 });
				 	 

				 }else{
				 	$("#codigo_barras").val("");
				 }
			}
*/
		</script>


		<script>
			/* Codigo de barra */

			function mensaje() {
				Swal.fire({
				  icon: 'error',
				  title: 'Oops...',
				  text: 'Lector de codigo de barras desconectado, Verificar y actualize la web',
				  allowOutsideClick: false,
				 
				})
			}
			function vista_previa(e) {
				//if (event.keyCode == 13 && !event.shiftKey) {
					 if (e.keyCode === 13 && !e.shiftKey) {
					 	var id_codigo = $("#codigo_barrasx").val();
					 	var rowid = Math.random();
				    var $sr = ($(".jdr1").length + 1);
				    $('#btn-agregar').attr('disabled', true); 
					 	 $.ajax({
					 	 	url: "<?php echo base_url().'Inventario/Pedidos/agregar_por_codigo/';?>",

					 	 	type: 'POST',
					 	 	dataType: 'json',
					 	 	data: {id_codigo:id_codigo},
					 	 })
					 	 .done(function(data) {
					 	 	var info_data = data.nombre;
					 	 	var stcock_ = data.stock;

					 	 	var nombre = $("[name='nombre[]']").val();
							for (var info_data; info_data == nombre; info_data++) {
								Swal.fire({
									  icon: 'error',
									  title: 'Oops...',
									  text: 'El producto '+info_data+' ya esta en el detalle'
									 
									})
								nombre[info_data]
								return false;

							}
								if (stcock_==0 || stcock_<1) {
							Swal.fire({
								  icon: 'error',
								  title: 'Oops...',
								  text: 'Tienes que actualizar el stock del producto "'+stcock_+'"',
								  footer: `Te quedan <b>&nbsp;&nbsp;`+stcock_+`&nbsp;&nbsp;</b> en stock`
								 
								})
							return false;
							}
							if (stcock_<2 || stcock_==1) {
								var mueesta_sctock = `<span class="label label-danger">Solo te quedan <b>`+stcock_+`</b> en stock</span>`
								Swal.fire({
									  icon: 'error',
									  title: 'Oops...',
									  text: 'Tienes que actualizar el stock del producto "'+info_data+'"',
									  footer: `Solo te quedan <b>&nbsp;&nbsp;`+stcock_+`&nbsp;&nbsp;</b> en stock`
									 
									})
								 
							}else{
								var mueesta_sctock = stcock_
							}
						 	 	
					 	 	var $html =`<tr class="jdr1" id="` + rowid + `">
                     	<td><span class="btn btn-sm btn-default"></span>` + $sr + `</span><input type="hidden" name="count[]" value="6437"></td>'</td>
                     	<td><input type="hidden" name="id_producto[]" value="`+data.Id+`" />`+data.codigo+`</td>
                     	<td><input type="hidden" name="nombre[]" value="`+data.nombre+`" />`+data.nombre+`</td>
                     	<td><input type="hidden" name="stock[]" value="`+data.stock+`" /><p>`+mueesta_sctock+`</p></td>
                     	<td style="width:20%;"><input type='text' class='form-control form-control-danger  requerido btn-rounded ' id='inputHorizontalDnger' name='cantidad[]' placeholder='' value='1' <?php echo numero_();?> maxlength="4"></td>
                    <td><button type='button' class='btn btn-danger btn-remove-producto'><i class='fas fa-times-circle'></i></button></td>
                    <input type='hidden' name='codigo[]' value='`+data.codigo+`'/>
                  </tr>`;
		       			 $("#show_date tbody").append($html);	
		       			 $("#ocultar___").show();
	
		       			 //$("#show_date").show();
					 	 })
					 	 .fail(function() {
					 	 	console.log("error");
					 	 })
					 	 .always(function() {
					 	 	console.log("complete");
					 	 });
					 	 

					 }else{
					 	$("#codigo_barras").val("");
					 }
			}
			

			$(document).ready(function() {
				//para insertar por codi
		/*	$("#").keypress(function(event) {
					/* Act on the event 
				
					
				//$(document).on('keypress','#codigo_barrasx', function(event) 

					event.preventDefault();
					$('#btn-agregar').attr('disabled', true); 
					
					   

					//if (event.keyCode == 13 && !event.shiftKey) {
					 if (event.keyCode === 13 && !event.shiftKey) {
					 	 var id_codigo = $("#codigo_barrasx").val();
					 	 var rowid = Math.random();
				    var $sr = ($(".jdr1").length + 1);
					 	 $.ajax({
					 	 	type: 'POST',
					 	 	url: '<?php base_url().'Inventario/Pedidos/agregar_por_codigo/';?>',
					 	 	//dataType: 'json',
					 	 	data: {id_codigo:id_codigo},
					 	 })
					 	 .done(function(data) {
					 	 	
					 	 	var $html =`<tr class="jdr1" id="` + rowid + `">
                     	<td><span class="btn btn-sm btn-default"></span>` + $sr + `</span><input type="hidden" name="count[]" value="6437"></td>'</td>
                     	<td><input type="hidden" name="codigo[]" value="`+data.codigo+`" />`+data.codigo+`</td>
                     	<td><input type="hidden" name="nombre[]" value="`+data.nombre+`" />`+data.nombre+`</td>
                     	<td>15</td>
                     	<td style="width:20%;"><input type='text' class='form-control form-control-danger  requerido btn-rounded ' id='inputHorizontalDnger' name='cantidad[]' placeholder='' value='0' <?php echo numero_();?> maxlength="4"></td>
                    <td>
                  		<a class="btn-outline-danger btn btn-remove-producto" id="" href="javascript:void(0)"><i class="fas fa-times-circle"></i></a>
                  	</td>
                  </tr>`;
		       			 $("#show_date tbody").append($html);	
	
		       			 //$("#show_date").show();
					 	 })
					 	 .fail(function() {
					 	 	console.log("error");
					 	 })
					 	 .always(function() {
					 	 	console.log("complete");
					 	 });
					 	 

					 }else{
					 	$("#codigo_barras").val("");
					 }
				});*/
				/*$(document).on('click', '#btn-agregar', function(event) {
					event.preventDefault();
					/* Act on the event 

					var producto = $("#codigo_producto_xx").val();
					var id_producto = $("#codigo_producto_xx_id").val();

				  if(producto == null || producto.length == 0 || /^\s+$/.test(producto) ){
				     Swal.fire({
							  icon: 'error',
							  title: 'Oops...',
							  text: 'Ingrese un producto'
							})
				    return false;
				  };
				  var rowid = Math.random();
				  var $sr = ($(".jdr1").length + 1);


				  
				  $.ajax({
				  	url: '<?php echo base_url().'Inventario/Pedidos/listar_datos_producto/';?>',
				  	type: 'POST',
				  	dataType: 'json',
				  	data: {id_producto:id_producto},
				  	
				  })
				  .done(function(data) {
				  	
				  	
				  		
				  })
				  .fail(function() {
				  	console.log("error");
				  })
				  .always(function(data) {
				  	var $html = `<tr class="jdr1" id="` + rowid + `">
                     	<td><span class="btn btn-sm btn-default"></span>` + $sr + `</span><input type="hidden" name="count[]" value="6437"></td>'</td>
                     	<td><input type="hidden" name="codigo[]" value="`+data.codigo+`" />`+data.codigo+`</td>
                     	<td><input type="hidden" name="nombre[]" value="`+data.nombre+`" />`+data.nombre+`</td>
                     	<td>15</td>
                     	<td style="width:20%;"><input type='text' class='form-control form-control-danger  requerido btn-rounded ' id='inputHorizontalDnger' name='cantidad[]' placeholder='' value='0' <?php echo numero_();?> maxlength="4"></td>
                    <td>
                  		<a class="btn-outline-danger btn btn-remove-producto" id="" href="javascript:void(0)"><i class="fas fa-times-circle"></i></a>
                  	</td>
                  </tr>`;
		       			 $(".aplica_data tbody").append($html);	
		       			 $(".aplica_data tbody").append($html);	
		       			 $("#show_date").show();

				  });
				  
				});*/

				//$(document).on('click', '#btn-agregar', function(event) {
				$("#btn-agregar").on("click",function(){
					event.preventDefault();
					/* Act on the event */
					var rowid = Math.random();
				  var $sr = ($(".jdr1").length + 1);


				  //con esto obtenemos los valores que estamos obtniendo de la base de datos
				  //AQUI OBTENEMOS LA UNIDADES POR PRODCUTO
				  unidad = $("#unidad").val();
				  unidadx = $('select[name="unidad"] option:selected').text();

				  if (unidad=="" || unidad==0) {
				  	Swal.fire(
							  'Unidad Medida',
							  'Debes seleccionar la unidad Medida',
							  'info'
							)
				  	return false;
				  }

					data = $(this).val();
					
					if (data !='') {
						infoproducto = data.split("*");
						var info_data = infoproducto[2]
						var stcock_ = infoproducto[3]

						//aqui validamos para que no se inserte dos veces el registro en el campo

						var nombre = $("[name='nombre[]']").val();
						for (var info_data; info_data == nombre; info_data++) {
							Swal.fire({
								  icon: 'error',
								  title: 'Oops...',
								  text: 'El producto '+info_data+' ya esta en el detalle'
								 
								})
							nombre[info_data]
							return false;

						}


						/*if (
							==0 || stcock_<1) {
							Swal.fire({
								  icon: 'error',
								  title: 'Oops...',
								  text: 'Tienes que actualizar el stock del producto "'+infoproducto[2]+'"',
								  footer: `Te quedan <b>&nbsp;&nbsp;`+infoproducto[3]+`&nbsp;&nbsp;</b> en stock`
								 
								})
							return false;
						}
						/*if (stcock_<2 || stcock_==1) {
							var mueesta_sctock = `<span class="label label-danger">Solo te quedan <b>`+infoproducto[3]+`</b> en stock</span>`
							Swal.fire({
								  icon: 'error',
								  title: 'Oops...',
								  text: 'Tienes que actualizar el stock del producto "'+infoproducto[2]+'"',
								  footer: `Solo te quedan <b>&nbsp;&nbsp;`+infoproducto[3]+`&nbsp;&nbsp;</b> en stock`
								 
								})
							
						}else{
							var mueesta_sctock = infoproducto[3]
						}*/
						//Validacion para nombres

            html = "<tr class='jdr1' id='"+ rowid +"'>";
            html += "<td><span class='btn btn-sm btn-default'></span>"+ $sr + "</span><input type='hidden' name='count[]'' value='"+Math.floor((Math.random() * 10000) + 1)+"'></td>";
			      html += "<td><input type='hidden'  name='id_producto[]' value='"+infoproducto[0]+"'>"+infoproducto[1]+"</td>";
			      html += "<td><input type='hidden' name='nombre[]' class='requerido' value='"+infoproducto[2]+"'><p>"+infoproducto[2]+"</p></td>";
			      html += "<td><input type='hidden' name='unidad[]' class='requerido' value='"+ unidad+"'><p>"+ unidadx+"</p></td>";
			      html += "<td><input type='hidden' name='stock[]' id='stock' value='"+infoproducto[3]+"'>"+infoproducto[3]+"</td>";
						html +="<td style='width:20%;''><input type='text' id='cantidad' class='form-control form-control-danger  requerido  btn-rounded ' id='inputHorizontalDnger' name='cantidad[]' placeholder='' value='1'  maxlength='4'></td>";

			      html += "<td><button type='button' class='btn btn-danger btn-remove-producto'><i class='fas fa-times-circle'></i></button></td>";
			      html += "<input type='hidden' name='codigo[]' value='"+infoproducto[1]+"'/>";
			      html += "</tr>";

            $("#show_date tbody").append(html);	
            $("#ocultar___").show();
            $("#btn-agregar").val(null);
            $("#codigo_producto_xx").val("");
            $('#unidad').val(null).trigger('change');
             

					}else{
						Swal.fire({
						  icon: 'error',
						  title: 'Oops...',
						  text: 'Ingrese producto, a entregar',
						  allowOutsideClick: false,
						 
						})
						//72905384
						return false;
					}


				});


				//remover el pedido
				$(document).on("click",".btn-remove-producto", function(){
			    $(this).closest("tr").remove();
			     
			     
			  });

			  //numero
			  


	      //registrar 

	      $(document).on('submit', '#registrar_pedido_detalle_view', function(event) {
	      	event.preventDefault();
	      	$("#ocultar___").show();

	      	
					if( document.querySelector("#areaDelUsuario").value == "no seleccionada" ) {
							console.log("si esta ");
							return Swal.fire({
								title: 'Hubo un problema',
								text: "Llena el area en la que actualmente estas asignado",
								icon: 'warning',
								showCancelButton: false,
								confirmButtonColor: '#3085d6',
								cancelButtonColor: '#d33',
								confirmButtonText: 'OK'
							});
						} else {
							console.log("no esta");
						}

	      	var error = 0;

      		$('.requerido').each(function(i, elem){
						if($(elem).val() == '' || $(elem).val() == 0){
							$(elem).css({'border':'1px solid red'});
							error++;
				    }else{
				      $(elem).css({'border':'1px solid green'});
				    }
				  });
					if(error > 0){
						event.preventDefault();
						Swal.fire("Error!", "Ingresar datos en los campos vacios...", "error", {
						  button: "ok",
						});
				    return false;
				  }

      	//validamos que el stock del producto actual no sea mayor que el valor 	que esta mandando al registrar 
      	 
      	  var cantidad = $("#cantidad").val();//document.getElementsByName('cantidad[]').value;
      	  var stock = $("#stock").val();//document.getElementsByName('stock[]').value;

      	 /*  
			      
			      $('table#show_date tbody tr').each(function(){
			        if ($(this).find('input.codprod').val() > $("#stock").val()){
			        	alert("cantidad supera al stock");
			          return false;
			        }else{
			        	return true;
			        }

			        return false;

			      });

			     */   
			       
			    
			      	 
			
      	 /*for (cantidad ; cantidad > stock; cantidad++) {

      	  	if (cantidad > stock ) {
      	  		Swal.fire(
						  'Oops...',
						  'La cantidad supera al Stock',
						  'error'
						)
						
      	  		$("[name='cantidad[]']").css({'border':'1px solid red'});
      	  		return false;

						}else{
							
						 $("[name='cantidad[]']").css({'border':'1px solid green'});
						// stock[cantidad];
					}
						
					

      	//  }
*/
      	  //Validamos para que la cantidad  no sea mayor al stock


      	 

	      	//desder aqui estamos validando que ningun campo este vacio
	      	

				  //que viene desde aqui

	      
	      	
        
		        /*  for (i=0; i<nombresx.length; i++)
		          {
		           if (nombresx[i].value == "")
		            {
		            Swal.fire({
		              position: 'top-end',
		              icon: 'error',
		              text: 'El campo nombre esta vacio',
		              showConfirmButton: false,
		              timer: 1500
		            })



		            $("[name='nombres[]']").focus();
		            $("#input:text:visible:first").focus()
		            $("[name='nombres[]']").css("border","1px solid #117864");
		            $("[name='nombres[]']").focus(function(){
		              $(this).css({"background":"#1ABC9C","color":"#ffffff"})
		            })
		             
		             
		             return false;
		            }
		          }*/

	      	//validamos los productos que si si o si tiene que ingresar 

					console.log("Innomed");
	      	/* Act on the event */
	      	$("#registrar_cabecera").submit(function(event) {
	      		/* Act on the event */
	      		event.preventDefault();
						console.log("klas fgotrmausd");
	      		$('#registrar_cabecera').serialize();

						
	      	});
	      	$.ajax({
	      		url: '<?php echo base_url().'Mantenimiento/Pedidos/registrar_entrada/';?>',
	      		type: 'POST',
	      		data: $("form").serialize(),
	      		statusCode: {
                400: function(xhr) {
                  var json = JSON.parse(xhr.responseText);
                  if (json.error_registro) {
                    Swal.fire({
                      title: 'Lo siento mucho',
                      text: "" + json.error_registro + "",
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
	      	.done(function(data) { 
	      		console.log("success");
	      		 var json = JSON.parse(data);
            Swal.fire({
              title: 'Muy bien',
              text: ""+json.registro+"",
              icon: 'success',
              showCancelButton: false,
              confirmButtonColor: '#3085d6',
              cancelButtonColor: '#d33',
              confirmButtonText: 'Muy bien!'
            }).then((result) => { 
              if (result.value) {
              $('#registrar_pedido_detalle_view')[0].reset();  
              $('#registrar_cabecera')[0].reset();
              $('#ocultar___').hide();


              //desde aqui

			        if($("#show_date tr:last-child").attr('id') != 'row1'){
			          //$('#show_date tr:not(:first-child)')
			          $('#show_date tr:not(:first)')
			        .slice(0)
			        .remove();
			        }

			        $("#trabajadores_emple_xx").val("");
			        window.location = "<?php echo base_url().'Mantenimiento/Pedidos/';?>"
              //hasta qui
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

	      //agregamos los classes para editar el formulario


	      $(document).on('change', '.fantasma', function(event) {
	      	event.preventDefault();
	      	/* Act on the event */
	      	 if($(this).prop('checked')){
	         // $('#dvOcultar').hide();
	          //	$("#dni_emple").removeAttr("readonly");
	          	$("#telefono_emple").removeAttr("readonly");
	         	//$("#dni_emple").removeClass("myClass noClass").addClass("yourClass");
		        }else{
		         // $("#dni_emple").attr('readonly', '');
		        $("#telefono_emple").attr('readonly', '');
		        }
	      	//
	      });

	       
       	/*$('.fantasma').change(function(){
	       
	      
	      })
*/



			});  

			/*validar numero*/
			function aMays(e, elemento) {
      tecla=(document.all) ? e.keyCode : e.which; 
       elemento.value = elemento.value.toUpperCase();
      }
			function soloNumeros(e)
      {
        if(e.shiftKey)
         {
          e.preventDefault();
         }

         if (e.keyCode == 46 || e.keyCode == 8)  {
         }
         else {
          if (e.keyCode < 95) {
            if (e.keyCode < 48 || e.keyCode > 57) {
              e.preventDefault();
            }
          } 
          else {
              if (e.keyCode < 96 || e.keyCode > 105) {
                e.preventDefault();
              }
          }
          }
      }



			/* combobox de producto */

			


			
		</script>


		<script>
		function sendRequest(){
		  $.ajax({
		  url: "<?php echo base_url().'Mantenimiento/Pedidos/correlativo_numer_venta/';?>",
		  success:
		    function(result){ 
		/* si es success mostramos resultados */
		   // $('#register').val(result);
		     $('#numero').val('000'+result);
		     
		  
		  },
		  complete: function() { 
		/* solo una vez que la petición se completa (success o no success) 
		   pedimos una nueva petición en 3 segundos */
		     setTimeout(function(){
		     sendRequest();
		     }, 10);
		    }
		  });
		  };

		/* primera petición que echa a andar la maquinaria */
		$(function() {
		  sendRequest();
		});

		</script>

