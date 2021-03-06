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
                          <a href="javascript:void(0)" class="btn btn-danger btn-rounded" onclick="limpiar_campos()" type="button">Limpiar</a>
                        </div>
                      </div>
					  <div class="col-md-4">
						<label for="input14" class="text-dark">Paquete </label>
						<div class="form-group mostrararea">
							<select name="paquete" id="tipo_de_examen" class="form-control btn-rounded border border-dark " required="">                                                            
							</select>                                                            
						</div>
					  </div>
                    </div>

                  </div>
                </div>
                <div class="col-md-12 col-lg-12 col-xl-12 text-left">
                  <div class="row">
                      	<div class="col-md-10 col-xs-8 col-sm-8 col-lg-10 col-xl-8 ">
							<div class="form-group">
								<button class="btn btn-dark btn-rounded btn-block btn-md" id="buscar_registro_por_ajax"  type="button"><i class="fas fa-search"></i>&nbsp;Busqueda Avanzada</button>
							</div>
                         <!--<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>-->
						</div>
						<div class="col-md-4 col-xs-4 col-sm-4 col-lg-4 col-xl-4">
							<button class="btn btn-dark btn-rounded btn-block btn-md" id="dowload_button"  type="button">Descargar</button>
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
<script src=<?= base_url().'application/views/resultadofinal/index-script.js'?>></script>



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
<script src=<?= base_url().'assets/vendor/progress-bar/loading-bar.js'?>></script>



