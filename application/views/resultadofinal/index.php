<!-- Table Markup -->
<div class="row">
	<div class="col-md-12">
		<div class="card">
			<div class="card-body">

				<!--<table id="showcase-example-1" class="table" data-paging="true" data-filtering="true" data-sorting="true" data-editing="true" data-state="true" data-paging-size="25"></table>-->
				<p>Mostrar registros según filtro</p>
				<button type="button" class="btn btn-primary" data-page-size="10">10</button>
				<button type="button" class="btn btn-primary" data-page-size="20">20</button>
				<button type="button" class="btn btn-primary" data-page-size="50">50</button>
				<button type="button" class="btn btn-primary" data-page-size="100">100</button>
				<button type="button" class="btn btn-primary" data-page-size="200">200</button>
				<button type="button" class="btn btn-primary" data-page-size="500">500</button>
				<br>
				<br>
				<div class="row">
                  <div class="col-md-12">
                    <h4 class="card-title text-center" >Criterios de Busqueda avanzada</h4>
                    <div class="row">
                      <div class="col-md-6 col-xs-12 col-sm-12 col-lg-4 col-xl-4">
                        <div class="form-group">
                          <div class="example">
                                <div class="input-daterange input-group" id="date-range">
                                    <input type="text" class="form-control " name="fecha_inicio" id="fecha_inicio" placeholder="<?php echo date("Y-m-d");?>" autocomplete="off">
                                    <div class="input-group-append">
                                        <span class="input-group-text bg-info b-0 text-white">A</span>
                                    </div>
                                    <input type="text" class="form-control " name="fecha_fin" id="fecha_fin" placeholder="<?php echo date("Y-m-d");?>" autocomplete="off">
                                </div>
                            </div>
                        </div>
                      </div>
                      <div class="col-md-6 col-xs-12 col-sm-12 col-lg-4 col-xl-3">
                        <div class="form-group">
                          <input type="text" class="form-control btn-rounded" name="nombre" id="nombre_busqueda" placeholder="Ingrese Nombre a Buscar" autocomplete="off">
                        </div>
                      </div>
                      <div class="col-md-6 col-xs-12 col-sm-12 col-lg-4 col-xl-3">
                        <div class="form-group">
                          <input type="number" class="form-control btn-rounded" name="dni" id="dni_busqueda" placeholder="Ingrese dni a Buscar" autocomplete="off">
                        </div>
                      </div>
                      <div class="col-md-6 col-xs-12 col-sm-12 col-lg-4 col-xl-2">
                        <div class="form-group">
                          <a href="javascript:void(0)" class="btn btn-danger btn-rounded" onclick="limpiar_campos()" type="button"><span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> Limpiar ...</a>
                        </div>
                      </div>
                    </div>

                  </div>
                </div>
                <div class="col-md-12 col-lg-12 col-xl-12 text-left">
                  <div class="row">
                      <div class="col-md-12 col-xs-12 col-sm-12 col-lg-12 col-xl-12 ">
                        <div class="form-group">
                           <button class="btn btn-dark btn-rounded btn-block btn-md" id="buscar_registro_por_ajax"  type="button"><i class="fas fa-search"></i>&nbsp;Busqueda Avanzada</button>
                        </div>
                         <!--<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>-->
                        </div>
                     
                    </div>
                </div>
				<table id="showcase-example-1" class="table "  data-filtering="true"  data-sorting="true" data-state="true" data-paging="true" data-paging-size="15"  ></table>


				<div class="text-center">
		          <h4 class="mt-4"><span class="font-weight-bold">Leyenda:</span>  <small>&nbsp;Observación - Anulado - Pendiente</small>&nbsp;<span class="bg-danger btn">&nbsp;&nbsp;</span>&nbsp;<small>&nbsp;Entregado</small>&nbsp;<span class="bg-info btn">&nbsp;&nbsp;</span><small>&nbsp;Nuevo</small>&nbsp;<span class=" btn btn-outline-dark bg-white">&nbsp;&nbsp;</span></h4>
		        </div>
				
			</div>
		</div> 
	</div>
</div>

<!-- Editing Modal Markup -->
<div class="modal fade" id="editor-modal" tabindex="-1" role="dialog" aria-labelledby="editor-title">
	<style scoped>
		/* provides a red astrix to denote required fields - this should be included in common stylesheet */
		.form-group.required .control-label:after {
			content:"*";
			color:red;
			margin-left: 4px;
		}
	</style> 
	
</div>




	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10.10.1/dist/sweetalert2.all.min.js"></script>
	<script src=<?= base_url().'application/JavaScript/imprimir.js'?>></script>
	<link rel="stylesheet" type="text/css" href="<?= base_url().'assets/vendor/progress-bar/loading-bar.css'?>"/>
	<script src=<?= base_url().'application/JavaScript/resultado_final-index.js'?>></script>





	<script>

		const footable_columns = [
			{ "name": "nro_identificador", "title": "Codigo", "breakpoints": "xs", "sorted": "true" },
			{ "name": "fecha_registro", "title": "Fecha Atención" ,"breakpoints": "xs"},
			{ "name": "nombrex", "title": "Paciente" },			
			{ "name": "final", "title": "Impresión Final", "breakpoints": "xs sm md", "classes":"centrado"},
			{ "name": "monto", "title": "Monto Total", "breakpoints": "xs sm md", "classes":"centrado"},
			{ "name": "estado", "title": "Estado", "breakpoints": "xs sm md", "classes":"centrado estado_progress_container"},
			{ "name": "boleta", "title": "Boleta", "breakpoints": "xs sm md", "classes":"centrado"},
			{ "name": "enviar", "title": "Enviar al Correo", "breakpoints": "xs sm md", "classes":"centrado"}
		];

		



		$('[data-page-size]').on('click', function(e){
			e.preventDefault();
			var newSize = $(this).data('pageSize');
			FooTable.get('#showcase-example-1').pageSize(newSize);
		});


		jQuery(function($){

			ft = FooTable.init('#showcase-example-1', {

				"columns": footable_columns,
					
				"rows": jQuery.get({
					"url": "<?php echo base_url().'ResultadoFinal/ResultadoFinal/mostrar_datos_busqueda_avanzada/';?>",
					"dataType": "json",					
				}),

				"on": {
					"ready.ft.table": function(e, ft){
						fillEstadoProgreso();
Z					}, 
					"after.ft.paging": function(e, ft){
						fillEstadoProgreso();
					} 					
				}
				
			})


		
		});

		$(document).ready(function() {

			$(document).on('click', '#buscar_registro_por_ajax', function(event) {
				event.preventDefault();

				let fecha_inicio = $("#fecha_inicio").val();

				if(fecha_inicio!="") {
					fecha_inicio = fecha_inicio.split("/");
					fecha_inicio = fecha_inicio[2] + "-" + fecha_inicio[0] + "-" + fecha_inicio[1];
				} else {
					fecha_inicio="null";
				}
				
				
				// Obteniendo la fecha y dando formato para que sea complatible con MySql
				let fecha_fin = $("#fecha_fin").val();
				if(fecha_fin!="") {
					fecha_fin = fecha_fin.split("/");
					fecha_fin = fecha_fin[2] + "-" + fecha_fin[0] + "-" + fecha_fin[1];    
				} else {
					fecha_fin = "null";
				}
				
				let nombre_busqueda = $("#nombre_busqueda").val();
				let dni_busqueda = $("#dni_busqueda").val();

				if(nombre_busqueda == null || nombre_busqueda =="") {
					nombre_busqueda = "null";		
				} 

				if(dni_busqueda == null || dni_busqueda =="") {
					dni_busqueda =  "null";					
				} 


	            
				$('#showcase-example-1').footable({
					"columns": footable_columns,

					"rows": jQuery.post({
						"url": "<?php echo base_url().'ResultadoFinal/ResultadoFinal/mostrar_datos_busqueda_avanzada/';?>",
						"dataType": "json",
						"data": {
							"fecha_inicio": fecha_inicio,
							"fecha_fin": fecha_fin,
							"nombre_busqueda":nombre_busqueda,
							"dni_busqueda":dni_busqueda,
						},
						success:  function (response) {                 		                    
							$("#showcase-example-1 tr:last-child").remove();
						},
						error:function(errorThrown) {
							console.log(errorThrown);
							alert("error");
						}
					}),
					
					"on": {
						"ready.ft.table": function(e, ft){
							fillEstadoProgreso();
						}, 
						"after.ft.paging": function(e, ft){
							fillEstadoProgreso();
						} 					
					}
			   });


			});
		});

		function limpiar_campos() {
			$("#fecha_inicio").val("");
			$("#fecha_fin").val("");
			$("#nombre_busqueda").val("");
			$("#dni_busqueda").val("");
		}
	</script>

	<script>
		function laboraorio(id) {
			window.open(

			  '<?php echo base_url().'Laboratorio/Laboratorio/Mostrar_registros/'?>'+id+'/?<?php echo rand(9999999,00000000);?>=<?php echo time(); ?><?php echo date('Y-m-d');?>?=<?php echo md5("INNOPMEDIC INTERNATIONAL E.I.R.L");?>?=service-protect==<?php echo rand();?>?=innomedic-gps-active-url?====<?php echo $this->session->userdata("nombre");?>',
			  '_blank' // <- This is what makes it open in a new window.
			);

		}

		function rayosx(url) {
			window.open(
			  '<?php echo base_url().'Rayos/Rayos/Mostrar_registros/'?>'+url+'/?<?php echo rand(9999999,00000000);?>=<?php echo time(); ?><?php echo date('Y-m-d');?>?=<?php echo md5("INNOPMEDIC INTERNATIONAL E.I.R.L");?>?=service-protect==<?php echo rand();?>?=innomedic-gps-active-url?====<?php echo $this->session->userdata("nombre");?>" "<?php echo $this->session->userdata("apellido_paterno");?>',
			  '_blank' // <- This is what makes it open in a new window.
			);
		}


		function enviarcorreo($id) {

			var id_paciente = $id;
			$.ajax({
				url: '<?php echo base_url().'ResultadoFinal/ResultadoFinal/mostramosdatos_del_paciente/';?>',
				type: 'POST',
				dataType: 'json',
				data: {id_paciente: id_paciente},
			})
			.done(function(data) {
				console.log("success");

				$("#exampleModal1").modal("show");
				$("#id_paciente_update").val($id);
				$("#nombres_completos_idd").text(data.nombres);
				

				$("#nombres_completos_result_url").attr({
					href: '<?php echo base_url().'ResultadoFinal/ResultadoFinal/view_result_data_list_details/'?>'+data.url_unico,
					title:  data.nombres,
					target: "_blank",
				});
				$("#text").text(data.nombres);
				$("#correo_valid").val(data.correo);

				

			})
			.fail(function() {
				console.log("error");
			})
			.always(function() {
				console.log("complete");
			});	 
			
		}

		function adjuntar_boleta_pago($id) {
			// body...
			var id_paciente = $id;
			$.ajax({
				url: '<?php echo base_url().'ResultadoFinal/ResultadoFinal/mostramosdatos_del_paciente/';?>',
				type: 'POST',
				dataType: 'json',
				data: {id_paciente: id_paciente},
			})
			.done(function(data) {
				console.log("success");

				$("#exampleModal11").modal("show");
				$("#id_paciente_update_boleta").val($id);
				$("#nombres_completos_idd_boleta").text(data.nombres);
				//$("#nombres_completos_result_url").text(data.url_unico);
				/*$("#nombres_completos_result_url").attr({
					href: '<?php echo base_url().'ResultadoFinal/ResultadoFinal/view_result_data_list_details/'?>'+data.url_unico,
					title:  data.nombres,
					target: "_blank",
				});
				$("#text").text(data.nombres);
				$("#correo_valid").val(data.correo);*/

				

			})
			.fail(function() {
				console.log("error");
			})
			.always(function() {
				console.log("complete");
			});
		}

		function ver_boleta(id) {
			// body...
			var id_paciente = id;
			$.ajax({
				url: '<?php echo base_url().'ResultadoFinal/ResultadoFinal/mostramosdatos_del_paciente/';?>',
				type: 'POST',
				dataType: 'json',
				data: {id_paciente: id_paciente},
			})
			.done(function(data) {
				console.log("success");

				$("#exampleModal12").modal("show");
				$("#nombres_completos_idd_boleta_boletas").text(data.nombres);
				$("#pdfdoc_impre_boleta").html('<iframe  class="responsive-iframe" src="<?php echo base_url().'upload/boleta_cliente/'?>'+data.boleta_pago+'"  width="100%" height="700px" frameBorder="0"></iframe>');


			})
			.fail(function() {
				console.log("error");
			})
			.always(function() {
				console.log("complete");
			});
		}
	</script>

	<style>
		.centrado{ 
			text-align: center; 

		}
		.achicar{

			white-space: nowrap;
	      text-overflow: ellipsis;
	      overflow: hidden;
		}



	</style>


			<div class="modal fade " id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" data-backdrop="static">
			  <div class="modal-dialog modal-xl ">
			    <div class="modal-content ">
			      <div class="modal-header">
			        <h5 class="modal-title font-weight-bold" id="exampleModalLabel">Resultado del paciente: <span class="font-weight-normal" id="nombres_completos_pacientex"></span></h5>
			        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
			          <span aria-hidden="true" style="
                    border: 2px solid #210202;
                    border-radius: 50%;
                ">&nbsp;&nbsp;&times;&nbsp;&nbsp;</span>
			        </button>
			      </div>
			      <div class="modal-body printableAreaprueba bg-white" id="pdfdocx">

			      	<span id="pdfdoc"></span>
			      

			      </div>
			      
			    </div>
			  </div>
			</div>

			<div class="modal fade" id="exampleModal1" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" data-backdrop="static">
			  <div class="modal-dialog modal-dialog-centered">
			  	 
			    <div class="modal-content">
			      <div class="modal-header modal-md">
			        <h5 class="modal-title" >Enviar Resultaltados: <span id="nombres_completos_idd"></span></h5>
			        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
			          <span aria-hidden="true" style="border: 2px solid #210202;border-radius: 50%;">&nbsp;&nbsp;&times;&nbsp;&nbsp;</span>
			        </button>
			      </div>
			      <div class="modal-body">
			       <form id="register_update_link_archivo" >
			          <div class="form-group">
			            <label for="recipient-name" class="col-form-label">Adjuntar Link de Acceso de Resultados:</label><br>
			            <div class="btn-group mt-3" data-toggle="buttons" role="group">
						   <label class="btn btn-outline btn-info " id="list">
						      <div class="custom-control custom-radio" >
						         <input type="radio" id="customRadio1" name="options" value="si" class="custom-control-input">
						   <label class="custom-control-label" for="customRadio1"> <i class="ti-check text-active" aria-hidden="true"></i> SI</label>
						   </div>
						   </label>
						   <label class="btn btn-outline btn-info active" id="list_add">
						      <div class="custom-control custom-radio">
						         <input type="radio" id="customRadio2" name="options" value="no" class="custom-control-input" checked="">
						   <label class="custom-control-label" for="customRadio2"> <i class="ti-check text-active" aria-hidden="true"></i> NO</label>
						   </div>
						   </label>

						
						</div><br>
						<a id="nombres_completos_result_url">Link - <span id="text"></span></a>
			          </div>
			          <div class="form-group">
			          	<label for="">Correo a enviar:</label>
			          	<input type="text" name="correo_valid" id="correo_valid" placeholder="Ingrese Correo a enviar" class="form-control">
			          </div>
			          <div class="form-groupm">
			          	<label>Adjuntar Archivo PDF</label>
			          	<input type="file" id="input-file-now-custom-3" class="dropify"  name="imagen" data-height="250" data-default-file="<?php echo base_url().'assets_sistema/';?>node_modules/dropify/src/images/test-image-2.jpg" onchange="fileValidatiosn(this);">
			          </div>
			          <br>
			          <input type="hidden" name="id_paciente_update"  id="id_paciente_update" value="">
			          <div class="text-center" id="agregamos">
				        <button type="submit" class="btn btn-dark btn-rounded btn-lg" id="eliminamos">Enviar Resultados</button>
				       
				      </div>
			       </form>
			      </div>
			      
			    </div>
			     
			  </div>
			</div>

			<div class="modal fade" id="exampleModal11" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" data-backdrop="static">
			  <div class="modal-dialog modal-dialog-centered">
			  	 
			    <div class="modal-content">
			      <div class="modal-header modal-md">
			        <h5 class="modal-title" >Adjuntar Boleta de: <span id="nombres_completos_idd_boleta"></span></h5>
			        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
			          <span aria-hidden="true" style="border: 2px solid #210202;border-radius: 50%;">&nbsp;&nbsp;&times;&nbsp;&nbsp;</span>
			        </button>
			      </div>
			      <div class="modal-body">
			       <form id="register_update_link_archivo_data" >
			          <div class="form-groupm">
			          	<label>Adjuntar Boleta de Pago</label>
			          	<input type="file" id="input-file-now-custom-4" class="dropify"  name="imagen" data-height="250" data-default-file="<?php echo base_url().'assets_sistema/';?>node_modules/dropify/src/images/test-image-2.jpg" onchange="fileValidatiosn(this);">
			          </div>
			          <br>
			          	<input type="hidden" name="id_paciente_update_boleta"  id="id_paciente_update_boleta" value="">
			          <div class="text-center">
				      
				        <button type="submit" class="btn btn-dark btn-rounded btn-lg" >Adjuntar Boleta</button>
				       
				      </div>
			       </form>
			      </div>
			      
			    </div>
			     
			  </div>
			</div>


			<div class="modal fade " id="exampleModal12" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" data-backdrop="static">
			  <div class="modal-dialog modal-lg ">
			    <div class="modal-content ">
			      <div class="modal-header">
			        <h5 class="modal-title font-weight-bold" id="exampleModalLabel">Resultado del paciente: <span class="font-weight-normal" id="nombres_completos_idd_boleta_boletas"></span></h5>
			        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
			          <span aria-hidden="true" style="
                    border: 2px solid #210202;
                    border-radius: 50%;
                ">&nbsp;&nbsp;&times;&nbsp;&nbsp;</span>
			        </button>
			      </div>
			      <div class="modal-body printableAreaprueba bg-white" id="pdfdocx">

			      	<span id="pdfdoc_impre_boleta"></span>
			      

			      </div>
			      
			    </div>
			  </div>
			</div>

			<script>
				$(document).ready(function() {
					$(document).on('submit', '#register_update_link_archivo', function(event) {
						event.preventDefault();
						/* Act on the event */
						$("#eliminamos").remove();
						$("#agregamos").html(`<button class="btn btn-dark btn-rounded btn-lg " type="submit" id="eliminamos_load">
                          <span class="spinner-border spinner-border-lg text-success" role="status" aria-hidden="true"></span>
                          Enviar Resultados
                        </button>`);
						var archivo = $("#input-file-now-custom-3").val();
						if (archivo=="" || archivo ==null) {
							Swal.fire({
								icon: 'error',
								title: 'Oops...',
								text: '¡Algo salió mal!',
								footer: '<a href>¿Por qué tengo este problema?</a>'
							})
							$("#eliminamos_load").remove();
							$("#agregamos").html(`<button type="submit" class="btn btn-dark btn-rounded btn-lg" id="eliminamos">Enviar Resultados</button>`);
							return false;
						}

						$.ajax({
						 	url: '<?php echo base_url().'ResultadoFinal/ResultadoFinal/enviar_correo_datos/';?>',
						 	type: 'POST',
						  	data:new FormData(this),  
                          	contentType:false,  
                          	processData:false, 
						 	
						})
						
						.done(function() {
							console.log("success");
						 		Swal.fire({
				                  icon: 'success',
				                  title: 'Buen trabajo',
				                  text: 'Su petición ha sido enviada',
				                  footer: '<a  href="javascript:void();">Administrador IT</a>'
				                })
				                $("#exampleModal1").modal("hide");
				                $("input[name=options][value='no']").prop("checked",true);
				                $("#list").removeClass('active');
				                $("#list_add").addClass('active');


				                 var drEvent = $('#input-file-now-custom-3').dropify();
			                      drEvent = drEvent.data('dropify');
			                      drEvent.resetPreview();
			                      drEvent.clearElement();
			                      drEvent.destroy();
			                      drEvent.init();
			                      $('.dropify#input-file-now-custom-3').dropify({
			                      });
			                    $("#input-file-now-custom-3").val("");

			                   	$('#showcase-example-1').footable({
									"columns": footable_columns,

									"rows": jQuery.get({
										"url": "<?php echo base_url().'ResultadoFinal/resultadofinal/mostrar_datos_busqueda_avanzada/';?>",
										"dataType": "json",
										
									}),

									"on": {
										"ready.ft.table": function(e, ft){
											fillEstadoProgreso();
										}, 
										"after.ft.paging": function(e, ft){
											fillEstadoProgreso();
										} 					
									}
								});

								$("#agregamos").html(`<button type="submit" class="btn btn-dark btn-rounded btn-lg" id="eliminamos">Enviar Resultados</button>`);
								$("#eliminamos_load").remove();

						})
						.fail(function() {
							console.log("error");
							Swal.fire({
								icon: 'error',
								title: 'Oopss!',
								text: 'Su petición no ha sido enviada',
								footer: '<a  href="javascript:void();">Administrador IT</a>'
							})
						})
						.always(function() {
							console.log("complete");
						});
						
					});

					$(document).on('submit', '#register_update_link_archivo_data', function(event) {
						event.preventDefault();
						/* Act on the event */
						var archivo = $("#input-file-now-custom-4").val();
						if (archivo=="" || archivo ==null) {
							Swal.fire({
								  icon: 'error',
								  title: 'Oops...',
								  text: '¡Algo salió mal!',
								  footer: '<a href>¿Por qué tengo este problema?</a>'
								})
							return false;
						}
						$.ajax({
							url: '<?php echo base_url().'ResultadoFinal/ResultadoFinal/adjuntar_boleta_pago_exit/';?>',
						 	type: 'POST',
						  	data:new FormData(this),  
                          	contentType:false,  
                          	processData:false, 
						})
						.done(function() {
							console.log("success");
							Swal.fire({
			                  icon: 'success',
			                  title: 'Buen trabajo',
			                  text: 'La boleta a sido cargada con exito',
			                  footer: '<a  href="javascript:void();">Administrador IT</a>'
			                })
			                $("#exampleModal11").modal("hide");



			                 var drEvent = $('#input-file-now-custom-4').dropify();
		                      drEvent = drEvent.data('dropify');
		                      drEvent.resetPreview();
		                      drEvent.clearElement();
		                      drEvent.destroy();
		                      drEvent.init();
			                $('#showcase-example-1').footable({
								"columns": footable_columns,

								"rows": jQuery.get({
									"url": "<?php echo base_url().'ResultadoFinal/resultadofinal/mostrar_datos_busqueda_avanzada/';?>",
									"dataType": "json",
									
								}),

								"on": {
									"ready.ft.table": function(e, ft){
										fillEstadoProgreso();
									}, 
									"after.ft.paging": function(e, ft){
										fillEstadoProgreso();
									} 					
								}
							});




						})
						.fail(function() {
							console.log("error");
							Swal.fire({
			                  icon: 'error',
			                  title: 'Oopss!',
			                  text: 'La boleta no ha sido cargada',
			                  footer: '<a  href="javascript:void();">Administrador IT</a>'
			                })
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

                if (!(/\.(jpg|png|gif|pdf|docx|docm|dotx|dotm|odt)$/i).test(uploadFile.name)) {
                  Swal.fire({
                  title: 'Files',
                  text: "El archivo a adjuntar no es una imagen solo acepta pdf|jpg|png|gif",
                  icon: 'warning',
                  showCancelButton: false,
                  confirmButtonColor: '#3085d6',
                  cancelButtonColor: '#d33',
                  confirmButtonText: 'ok'
                }).then((result) => {
                  if (result.value) {
					 var drEvent = $('#input-file-now-custom-3').dropify();
                      drEvent = drEvent.data('dropify');
                      drEvent.resetPreview();
                      drEvent.clearElement();
                      drEvent.destroy();
                      drEvent.init();
                      $('.dropify#input-file-now-custom-3').dropify({
                      });
                    $("#input-file-now-custom-3").val("");

                    //validamos 

                    var drEvents = $('#input-file-now-custom-4').dropify();
                      drEvents = drEvents.data('dropify');
                      drEvents.resetPreview();
                      drEvents.clearElement();
                      drEvents.destroy();
                      drEvents.init();
                      $('.dropify#input-file-now-custom-4').dropify({
                      });
                    $("#input-file-now-custom-4").val("");
                  }
                })
                   
                }


                
                                                       
            }

             $(document).ready(function() {
                  $('.dropify').dropify({
                      messages: {
                          'default': 'Arrastre y suelte un archivo aquí o haga clic en',
                          'replace': 'Arrastra y suelta o haz clic para reemplazar',
                          'remove':  'Eliminar',
                          'error':   'Ooops, sucedió algo mal.'
                      }
                  });
                }); 
        </script>
		<script src=<?= base_url().'assets/vendor/progress-bar/loading-bar.js'?>></script>



