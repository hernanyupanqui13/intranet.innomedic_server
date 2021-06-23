<!-- Table Markup -->
<div class="row">
	<div class="col-md-12">
		<div class="card">
			<div class="card-body">
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
				<table id="showcase-example-1" class="table "  data-filtering="true"  data-sorting="true" data-state="true" data-paging="true" data-paging-size="15"></table>


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

<!-- Imprimir Modal  -->
<div class="modal fade " id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" data-backdrop="static">
	<div class="modal-dialog modal-xl ">
		<div class="modal-content ">
			<div class="modal-header">
				<div>
					<h5 class="modal-title font-weight-bold" id="exampleModalLabel">Resultado del paciente: <span class="font-weight-normal" id="nombres_completos_pacientex"></span></h5>
					<button type="button" id="print_prueba_rapida" onclick="imprimir()" class="btn btn-outline-dark btn btn-rounded"><i class=" fas fa-print"></i>&nbsp;Imprimir</button>
				</div>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true" style="border: 2px solid #210202;border-radius: 50%;">&nbsp;&nbsp;&times;&nbsp;&nbsp;</span>
				</button>
				
			</div>
			<div class="modal-body  bg-white" id="pdfdocx">
				<div id="pdfdoc"></div>			
			</div>			
		</div>
	</div>
</div>




	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	
	<!-- External Script -->
	<script src=<?= base_url().'application/JavaScript/imprimir.js'?>></script>
	<script src=<?= base_url().'application/views/orden/orden-index.js'?>></script>

	<style>
		.centrado{ 
			text-align: center; 
		}
	</style>
