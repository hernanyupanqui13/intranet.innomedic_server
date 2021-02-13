		<div class="row">
			
			<div class="col-12">
				<div class="card">
					<div class="card-body">
						<div class="col-md-12">
	                        <h5><b>Nota:</b> Si en la lista no estan los datos del cliente. busquelos para agregarlo a la lista. Despues actualice la lista de cliente. &nbsp; <i class="fa fa-refresh m-r-5"></i></h5>
	                        
		                    
	                    </div>
	                    <br>
						 <div class="col-md-12">
						 	<form   id="registrar_pedido_detalle" >
		                      	<div class="row">
		                      		<div class='col-md-2'>
		                      			<label for="" >&nbsp;</label><br>
				                        <a href="javascript:void(0)" data-toggle="modal" data-target="#responsive-modal" class="btn btn-outline-info  btn-rounded">
				                           <i class="fas fa-user-plus"></i>&nbsp; Agregar Trabajador
				                        </a>

				                    </div>
		                      		<div class="col-md-3">
		                      			<div class="form-group">
		                      				<label  for="">Serie</label>
		                      				<input type="text" name="serie" id="serie" class="form-control btn-rounded" placeholder="" readonly="" value="0001" style=" cursor: not-allowed;">
		                      			</div>
		                      		</div>
		                      		<div class="col-md-4">
	                      				<div class="form-group">
		                      				<label  for="">Numero</label>
		                      				<input type="text" name="numero" id="numero" class="form-control btn-rounded" placeholder="" readonly="" value="<?php echo correlativo($correlativo_numer_venta);?>" style=" cursor: not-allowed;">
		                      			</div>
		                      		</div>
		                      		<div class="col-md-3 col-lg-3 col-xl-3 col-sm-12 col-xs-12">
	                      				<div class="form-group">
		                      				<label  for="">Fecha</label>
		                      				<input type="text" name="fecha" id="date-format" class="form-control btn-rounded "  value="<?php echo date('Y-m-d h:i:s'); ?>">
		                      				
		                      			</div>
		                      		</div>
		                      		
		                      	</div>
		                      	<h5 class="card-title">Busqueda de Trabajador </h5> 
		                      	<div class="form-group m-b-40 custom-control custom-checkbox">
                                    <input type="checkbox" name="cbmostrar"  class="fantasma custom-control-input mr-sm-2" id="checkbox2">
                                    <label class="custom-control-label" for="checkbox2">Actualizar datos del trabajador</label>
                                </div>
		                      	<div class="row">
		                      		<div class="col-md-4 col-lg-4 col-xl-4 col-sm-12 col-xs-12">
	                      				<div class="form-group">
		                      				<label  for="">Trabajador</label>
		                      				<input type="text" name="trabajador" id="trabajadores_emple_xx_x" class="form-control btn-rounded" placeholder="Ingrese Trabajador (Precione enter)"  value="" maxlength="5" onkeyup="aMays(event, this)">
		                      				<input type="hidden" name="id_usuario" id="trabajadores_emple_xx" value="" onkeyup="aMays(event, this)">
	                                        <input type="hidden" name="id_usuario_id" id="trabajadores_empl_id" value="">
		                      			</div>
		                      		</div>
		                      		<div class="col-md-4 col-lg-4 col-xl-4 col-sm-12 col-xs-12">
	                      				<div class="form-group">
		                      				<label  for="">DNI</label>
		                      				<input type="text" name="dni" id="dni_emple" class="form-control btn-rounded" placeholder="Ingrese Dni (DNI)" readonly="" onkeydown="return soloNumeros(event)" >
		                      			</div>
		                      		</div>
		                      		<div class="col-md-4 col-lg-4 col-xl-4 col-sm-12 col-xs-12">
	                      				<div class="form-group">
		                      				<label  for="">Telefono</label>
		                      				<input type="text" name="telefono" id="telefono_emple" class="form-control btn-rounded" placeholder="Ingrese Teléfono (Teléfono)" readonly="" onkeydown="return soloNumeros(event)">
		                      			</div>
		                      		</div>
		                      	</div>
		                      	<h5 class="card-title">Busqueda de Producto</h5>
		                      	<div class="row">
		                      		<div class="col-md-4 col-lg-4 col-xl-4 col-sm-12 col-xs-12">
	                      				<div class="form-group">
		                      				<label  for="">Codigo(Producto)</label>
		                      				<input type="text" name="codigo_barras" id="codigo_barras" class="form-control btn-rounded" placeholder="Ingrese codigo de barras" maxlength="3" style=" cursor: not-allowed;" readonly="" onclick="return mensaje()">
		                      			</div>
		                      		</div>
		                      		<div class="col-md-4 col-lg-4 col-xl-4 col-sm-12 col-xs-12">
	                      				<div class="form-group">
		                      				<label  for="">Producto</label>
		                      				<input type="text" name="producto" id="codigo_producto_xx" class="form-control btn-rounded" placeholder="Ingrese producto" maxlength="4" onkeyup="aMays(event, this)">
		                      				<input type="hidden" name="id_usuario_id" id="codigo_producto_xx_id" value="" onkeyup="aMays(event, this)">
		                      				<input type="hidden" name="id_usuario_id" id="codigo_producto_xx_xx" value="">
		                      			</div>
		                      		</div>
		                      		<div class='col-md-2'>
		                      			<label for="" >&nbsp;</label><br>
				                        <button id="btn-agregar" class="btn btn-outline-success  btn-rounded"><i class="fas fa-plus-circle"></i>&nbsp;&nbsp;&nbsp; Agregar Producto&nbsp;&nbsp;&nbsp;</button>
				                    </div>
		                      		
		                      	</div>
	                      	
	                    </div>

	                   


	                    <!--tabla-->
	                    <div class="table-responsive">
                                   <!-- <table id="demo-foo-row-toggler" class="table table-bordered" data-toggle-column="first">-->
                                    <!--<table id="demo-foo-addrow" class="table table-bordered m-t-30 table-hover contact-list m-b-0 toggle-arrow-tiny" data-paging="true" data-paging-size="7" data-filtering="false"  data-sorting="true">
                                        <thead>
                                            <tr class="footable-filtering">
                                                <th data-breakpoints="xs">ID</th>
                                                <th >Codigo</th>
                                                <th >Nombre</th>
                                                <th data-breakpoints="xs sm">Stock Max</th>
                                                <th data-breakpoints="xs">Cantidad</th>
                                                <th data-breakpoints="xs sm" data-title="Opciones">Opciones</th>
                                            </tr>
                                        </thead>
                                        <tbody id="hola">
                                               
                                        </tbody>
                                    </table>-->

                                    <table id="show_date" class="table table-bordered table-striped table-hover aplica_data" cellspacing="0" width="100%" >
                                    	<thead>
                                    		<tr >
                                                <th>#</th>
                                                <th>Codigo</th>
                                                <th >Nombre</th>
                                                <th>Stock Max</th>
                                                <th>Cantidad</th>
                                                <th>Opciones</th>
                                            </tr>
                                    	</thead>
                                    	<tbody>
                                    		
                                    		
                                    	</tbody >
                                    </table>
                                    <button type="submit" class="btn-success btn btn-rounded">Guardar</button>
                                </div>
						</form>
					</div>
				</div>
				
			</div>
			
		</div>

		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
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


			$(document).ready(function() {
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

					data = $(this).val();

					if (data !='') {
						infoproducto = data.split("*");

                        html = "<tr class='jdr1' id='"+ rowid +"'>";
                        html += "<td><span class='btn btn-sm btn-default'></span>"+ $sr + "</span><input type='hidden' name='count[]'' value='"+Math.floor((Math.random() * 10000) + 1)+"'></td>";
			            html += "<td><input type='hidden' name='idproductos[]' value='"+infoproducto[0]+"'>"+infoproducto[1]+"</td>";
			            html += "<td><input type='hidden' name='nombre[]' value='"+infoproducto[2]+"'><p>"+infoproducto[2]+"</p></td>";
			            html += "<td><input type='hidden' name='stock[]' value='"+infoproducto[3]+"'><p>"+infoproducto[3]+"</p></td>";
			            html +="<td style='width:20%;''><input type='text' class='form-control form-control-danger  requerido btn-rounded ' id='inputHorizontalDnger' name='cantidad[]' placeholder='' value='1'  maxlength='4'></td>"

			            html += "<td><button type='button' class='btn btn-danger btn-remove-producto'><span class='fa fa-remove'></span></button></td>";
			            html += "</tr>";

                        $("#show_date tbody").append(html);	



					}else{
						alert("seleccione producto ....");
					}


				});


				//remover el pedido
				$(document).on("click",".btn-remove-producto", function(){
			        $(this).closest("tr").remove();
			         
			       
			    });



			    //numero
			  


	            //registrar 

	            $(document).on('submit', '#registrar_pedido_detalle', function(event) {
	            	event.preventDefault();
	            	/* Act on the event */
	            	
	            	 //$(this).before("<input name='file[]' type='file'/>");
	            	$.ajax({
	            		url: '<?php echo base_url().'Inventario/pedidos/registrar_entrada/';?>',
	            		type: 'POST',
	            		data: $("form").serialize(),
			            
	            		//data: $("form").serialize(),
	            		//data: $("#registrar_pedido_detalle").serialize(),// + "&" + $(".aplica_data").serialize(),
                       
	            	})
	            	.done(function() {
	            		console.log("success");
	            		alert("Muy bien se registro");
	            	})
	            	.fail(function() {
	            		console.log("error");
	            		alert("Error al registro"); 
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
	                  	$("#dni_emple").removeAttr("readonly");
	                  	$("#telefono_emple").removeAttr("readonly");
	                 	//$("#dni_emple").removeClass("myClass noClass").addClass("yourClass");
		              }else{
		                $("#dni_emple").attr('readonly', '');
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

                       if (e.keyCode == 46 || e.keyCode == 8)    {
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

