<?php $query = $this->db->query("select *, count(id_usuario) as total,
   sum(status='1') as activos,
   sum(status='2') as pendientes,
   sum(status='3') as observados,
   sum(status='4') as enviados,
   sum(status='5') as anulados
    from ts_pedidos");
   foreach ($query->result() as $xx) {
      $cantidad_usuariox = $xx->total;
      $activos_x = $xx->activos;
      $pendientes_x = $xx->pendientes;
      $observados_x = $xx->observados;
      $enviados = $xx->enviados;
      $anulados = $xx->anulados;
    } ?>
   


<div class="row">
	<div class="col-md-12">
		<div class="card">
			<div class="card-body">
				<div class="alert alert-success">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"> <!--<span aria-hidden="true">&times;</span>--> </button>
                    <h3 class="text-success"><i class="fa fa-check-circle"></i> Total de Registro por usuario</h3> Aqui puedes modificar y ver el total de pedidos por usuario &nbsp;<a href="<?php echo base_url().'Mantenimiento/Pedidos/Total_pedidos/'?>">Ver todo los Registros de los pedidos</a>
                </div>
			</div>
		</div>
	</div>
</div>
  
<div class="row">
	<div class="col-md-12">
		<div class="card">
			<div class="card-body">
				<div class="row ">
		          <!-- Column -->
		          <div class="col-md-4 col-lg-3 col-xl-2">
		              <div class="card">
		                  <div class="box bg-info text-center">
		                      <h1 class="font-light text-white"><?php echo  $cantidad_usuariox;?></h1>
		                      <h6 class="text-white">Entradas totales</h6>
		                  </div>
		              </div>
		          </div>
		          <!-- Column -->
		          <div class="col-md-4 col-lg-3 col-xl-2">
		              <div class="card">
		                  <div class="box bg-success text-center">
		                      <h1 class="font-light text-white"><?php echo  $activos_x;?></h1>
		                      <h6 class="text-white">Entregado</h6>
		                  </div>
		              </div>
		          </div>
		          <!-- Column -->
		          <div class="col-md-4 col-lg-3 col-xl-2">
		              <div class="card">
		                  <div class="box bg-warning text-center">
		                      <h1 class="font-light text-white"><?php echo $pendientes_x;?></h1>
		                      <h6 class="text-white">Pendientes</h6>
		                  </div>
		              </div>
		          </div>
		          <!-- Column -->
		          <div class="col-md-4 col-lg-3 col-xl-2">
		              <div class="card">
		                  <div class="box bg-dark text-center">
		                      <h1 class="font-light text-white"><?php echo $observados_x;?></h1>
		                      <h6 class="text-white">Observados</h6>
		                  </div>
		              </div>
		          </div>
		           <!-- Column -->
		          <div class="col-md-4 col-lg-3 col-xl-2">
		              <div class="card">
		                  <div class="box bg-primary text-center">
		                      <h1 class="font-light text-white"><?php echo $enviados;?></h1>
		                      <h6 class="text-white">Enviados</h6>
		                  </div>
		              </div>
		          </div>
		          <div class="col-md-4 col-lg-3 col-xl-2">
		              <div class="card">
		                  <div class="box bg-danger text-center">
		                      <h1 class="font-light text-white"><?php echo  $anulados;?></h1>
		                      <h6 class="text-white">Anulados</h6>
		                  </div>
		              </div>
		          </div>
		          <!-- Column -->
		      </div>
		      <div class="table-responsive">
		      	<table id="demo-foo-accordion" class="table table-bordered m-b-0 toggle-arrow-tiny display nowrap  table-hover table-striped table-bordered" data-filtering="true" data-paging="true" data-sorting="true"  data-paging-size="5">
		      		 <thead>
                        <tr>
                            <th data-breakpoints="xs">ID</th>
                            <th>Nombres y Apellidos Completos</th>
                            <th>Lista Pedido</th>
                            <th>Fecha Pedido</th>
                            <th>Fecha Entregado</th>
                            <th data-breakpoints="xs">Estado</th>
                   
                        </tr>
                    </thead>
                    <tbody>
                    	<?php $cont=0; foreach ($lista_pedidos as $xx) { $cont+=1;?>	
                        <tr>
                        	<?php $estado= $xx->status;?>
                    		<td><?php echo $cont; ?></td>
                    		<td>
                            <a href="javascript:void(0)"><img src="<?php echo base_url().'upload/';?>images/<?php if($xx->imagen==""){ echo "foto.png";}else{ echo $xx->imagen; } ?>" alt="user" width="40" class="img-circle" /> <?php echo $xx->nombres_completos;?></a>
	                        </td>
	                        <!--<td><a href="javascript:void(0)" class="text-success cargar_lista" id="<?php echo $xx->id_usuario;?>"><i class="fas fa-eye"></i>Ver pedidos</a></td>-->
	                        <td><a href="<?php echo base_url().'Mantenimiento/Pedidos/View_pedido/'.$xx->Id;?>" class="text-success " id="<?php echo $xx->id_usuario;?>"><i class="fas fa-eye"></i>Ver pedidos</a></td>
	                        <td><?php echo $xx->fecha_pedido;?></td>
	                        <td><?php echo $xx->fecha_entregado;?></td>
	                   
	                        <td><?php if ($xx->status==1) {
			                        echo "<span class='label label-success'>Entregado</span>";
			                    }else if($xx->status==2){
			                        echo "<span class='label label-primary'>Pendiente</span>";
			                    }else if($xx->status==3){
			                        echo "<span class='label label-warning'>Observado</span>";
			                    }else if($xx->status==4){
			                        echo "<span class='label label-info'>Recibido</span>";
			                    }else{
			                       echo "<span class='label label-danger'>Anulado</span>";
			                    } ?>	
			                </td>
                        </tr>
                        <?php } ?>
                    </tbody>
		      	</table>
		      </div>
		       <div class="text-center">
		          <h4 class="mt-4"><span class="font-weight-bold">Leyenda:</span>  <small>&nbsp;Observación - Anulado - Pendiente</small>&nbsp;<span class="bg-danger btn">&nbsp;&nbsp;</span>&nbsp;<small>&nbsp;Entregado</small>&nbsp;<span class="bg-info btn">&nbsp;&nbsp;</span><small>&nbsp;Nuevo</small>&nbsp;<span class=" btn btn-outline-dark bg-white">&nbsp;&nbsp;</span></h4>
		        </div>
			</div>
		</div>
	</div>
</div>





	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

	<script>
		$(document).ready(function() {
			$(document).on("click",".cargar_lista", function(){
			//$(".cargar_lista").click(function() {
				var user_id = $(this).attr("Id"); 
				$.ajax({
					url: '<?php echo base_url().'Mantenimiento/Pedidos/obtener_lista_pedidos/';?>',
					type: 'POST',
					dataType: 'html',	
					data: {user_id:user_id},
				})
				.done(function(data) {

					var resultado = JSON.parse(data); 
                    var contenido = '';

					$.each(resultado, function(index, value) {
						//validacion de observacion
						let observacionesx;
						if (value.observacion==null || value.observacion=="") {
							observacionesx = ""
						}else{
							observacionesx = ""+value.observacion+""
						}
					  
					  	let mensaje
					   	if (value.status==1) {
							mensaje = '<span class="label label-success">Pedido Entregado</span>'
						}else if(value.status==2){
							mensaje = '<span class="label label-info">Pedido Pendiente</span>'
						}else if(value.status==3){
 							mensaje = '<span class="label label-warning">Pedido Observado</span>'
						}else if(value.status==4){
 							mensaje = '<span class="label label-primary">Pedido Recibido</span>'
						}else if(value.status==5){
							mensaje = '<span class="label label-danger">Pedido Anulado</span>'
						}else{
							mensaje = '<span class="">Error</span>'
						}

						$("#estado_xxx option[value="+ data.id_unidad_medida +"]").attr("selected",true);
						
						//----.

						let mensajever
						if (value.status==1 || value.status==2 || value.status==3 || value.status==4) {	
							mensajever = `  <div class="price-row" ><a class="text-success cambiar_coultar"  data-toggle="collapse" href="#label`+value.Id+`sucess" aria-expanded="false" aria-controls="label`+value.Id+`sucess" id="myCollapsible">Cambiar Estado</a>
							    <div class="collapse multi-collapse text-center" id="label`+value.Id+`sucess">
							    <div class="card card-body ">
							      <div class="row col-md-12">
								      <form action="" id="actualizando_estado" class="form-horizontal form-material">
								      <input type="hidden" value="`+value.Id+`" class="" name="id" />
								       <input type="hidden" value="1" class="" name="x" />
									      <div class="col-md-12">
									      <label for="" class="text-danger text-left">Cantidad Entregado</label>
											<div class="form-group">
												<input type="number" class="form-control" name="cantidad_entregado" id="cantidad_entregado"  placeholder="Cantidad entregado" required="">
											</div>
										</div>
										<div class="col-md-12">

											<div class="form-group">
												<select name="estado" id="estado_xxx" class="form-control" required="">
													<option value="" selected="">-- Seleccione Estado --</option>
													<option value="1" >Entregado</option>
													<option value="3" >Observación</option>
													<option value="2" >Pendiente</option>
													<option value="5" >Anulado</option>
												</select>
											</div>
										</div>
										<div class="col-md-12">
											<div class="form-group">
												<textarea class="form-control" name="observacion" id="observacion" cols="10" rows="5" placeholder="Ingrese Observación" required="">`+observacionesx+`</textarea>
											</div>
										</div>
										<button type="submit" class="btn btn-outline-success btn-rounded"><i class="fas fa-sign-in-alt"></i>&nbsp; Actualizar</button>

								      </form>
							      </div>
							      </div>
							    </div>
							    </div>
							  `
						}else{
							mensajever =''
						}
					   contenido += `
					   <div class="col-md-4 col-xs-12 col-sm-6 no-padding">
                            <div class="pricing-box">
                                <div class="pricing-body b-l">
                                    <div class="pricing-header">
                                    	<h4 class="price-lable text-white `+value.color+`"> `+value.prioridad+`</h4>
                                        <h4 class="text-center">Cantidad</h4>
                                        <h2 class="text-center"><span class="price-sign">&</span>`+ value.cantidad+`</h2>
                                    </div>
                                    <div class="price-table-content">
                                        <div class="price-row"><i class="icon-screen-smartphone"></i> `+value.unidad_medida+`</div>
                                        <div class="price-row"><i class="icon-refresh"></i> `+value.descripcion+`</div>
                                        <div class="price-row"><i class="fas fa-calendar-alt"></i>&nbsp;`+value.fecha_pedido+`</div>
                                        <div class="price-row" id="contenido">`+mensaje+`</div>
                                        `+mensajever+`
                                      	<small>`+value.nombres+`</small>
                                    </div>
                                </div>
                            </div>
                        </div>
					   `;
					});
					//$("#cargar_resultado").html(contenido);
					$(".pricing-plan").html(contenido);
					$("#staticBackdrop").modal("show");
				
				})
				.fail(function() {
					alert("Algo paso con el sistema");
				})
				.always(function() {
                              
					console.log("complete");
				});



				
			});
		});
	</script>







	<div class="modal fade" id="staticBackdrop" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
	  <div class="modal-dialog modal-xl" role="document">
	    <div class="modal-content ">
	      <div class="modal-header">
	        <h5 class="modal-title" id="staticBackdropLabel">Lista de Pedidos</h5>

	        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
	          <span aria-hidden="true">&times;</span>
	        </button>
	      </div>
	      <div class="modal-body" id="modal-body">
	      	<?php if ($estado==1) {
	      		echo "";
	      	}else{?>
	      		<div class="alert alert-danger btn-rounded"> <img src="<?php echo base_url().'assets_sistema/';?>images/users/1.jpg" width="30" class="img-circle" alt="img"> <a href="javascript:void(0);"><span class="font-weight-normal text-dark"><strong>Los pedidos:&nbsp;</strong>Para cambiar el estado a <strong>(pendiente - Anulado - Observado )</strong> Primero todos deben estar como entregados </span></a>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">&times;</span> </button>
                </div>
	      	<?php } ?>
	      	<div class="row">
		        <div class="col-12">
		            <div class="card">
		                <div class="card-body">
		                    <div class="row pricing-plan">
		                        
		                    </div>
		                </div>
		            </div>
		        </div>
		    </div>
	      </div>
	      <div class="modal-footer">
	      	<!--<a  href="javascript:void(0)" class="btn btn-outline-success btn-rounded" onclick="printDiv('modal-body')"><i class="fas fa-print"></i>&nbsp;Imprimir</a>-->
	       <!-- <button type="button" class="btn btn-outline-danger btn-rounded cerrar" ><i class="fas fa-times-circle"></i>&nbsp;Cerrar</button>-->
	      </div>
	    </div>
	  </div>
	</div>

	<script>
		/*function printDiv(nombreDiv) {
			var contenido= document.getElementById(nombreDiv).innerHTML;
		    var contenidoOriginal= document.body.innerHTML;

		    document.body.innerHTML = contenido;

		    window.print();

		    document.body.innerHTML = contenidoOriginal; 
		}*/
	 $(".cerrar").click(function(){
        $("#staticBackdrop").modal("hide");
    });
			
		    
	</script>

	<style>
		.modal-body{
		  height: 550px;
		  width: 100%;
		  overflow-y: auto;
		}
	</style>

	<script>
		$(document).ready(function() {

		//registrando el estado de pedido

		$(document).on('submit', '#actualizando_estado', function(event) {
			event.preventDefault();

			/*var estado_xxx = $("#estado_xxx").val();
			var observacion = $("#observacion").val();
			var cantidad_entregado = $("#cantidad_entregado").val();


			if (estado_xxx == null || estado_xxx.length == 0 || /^\s+$/.test(estado_xxx)) {
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
				  text: 'Primero seleccione el estado'
				})
				return false;
			}

			if (observacion == null || observacion.length == 0 || /^\s+$/.test(observacion)) {
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
				  text: 'Ingrese Observación'
				})
				return false;
			}

			if (cantidad_entregado == null || cantidad_entregado.length == 0 || /^\s+$/.test(cantidad_entregado)) {
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
				  text: 'Ingrese Cantidad Entregado'
				})
				return false;
			}*/
			  
			Swal.fire({
					  title: '¿Deseas actualizar estado?',
					  text: "Estas apunto de actualizar el estado de pedido",
					  icon: 'warning',
					  showCancelButton: true,
					  allowOutsideClick: false,
					  confirmButtonColor: '#3085d6',
					  cancelButtonColor: '#d33',
					  confirmButtonText: 'Si, actualizar'
					}).then((result) => {
					  if (result.value) {
					  	$.ajax({
							url: '<?php echo base_url().'Mantenimiento/Pedidos/actualizando_estado_pedido/' ?>',
							type: 'POST',
							data:new FormData(this),  
			                contentType:false,  
			                processData:false,  
						})
						.done(function(data) {
							console.log("success");
							Swal.fire({
							  title: 'Muy bien',
							  text: "Se actualizo Correctamente",
							  icon: 'success',
							  showCancelButton: true,
							  allowOutsideClick: false,
							  confirmButtonColor: '#3085d6',
							  cancelButtonColor: '#d33',
							  confirmButtonText: '¿Deseas cerrar la pestaña?'
							}).then((result) => {
							  if (result.value) {
							    $('#staticBackdrop').modal('hide');
							    
								$(".multi-collapse").collapse('hide'); // toggle collapse
								
							  }
							})
							// $("#contenido").html(data).fadeIn('fast');

							  $(".multi-collapse").collapse('hide');
						})
						.fail(function() {
							console.log("error");
							Swal.fire(
						      'error',
						      'Algo paso con el sistema.',
						      'error'
						    )
						})
						.always(function() {
							console.log("complete");
						});
					     
					  }
					})
			

			
		});

		      
	
			
		});
	</script>


