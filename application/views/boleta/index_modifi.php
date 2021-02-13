<div class="row"> 
	<div class="col-md-12">
		<div class="card"> 
			<div class="card-body">
				<h4 class="card-title">Registro de Envío de Boletas</h4>
                <!--<h6 class="card-subtitle">Lista registro de bole</h6>-->
                <div class="m-b-20">
                    <button type="button" class="btn btn-info" data-page-size="10">10</button>
                    <button type="button" class="btn btn-info" data-page-size="20">20</button>
                    <button type="button" class="btn btn-info" data-page-size="30">30</button>
                </div>
				<div class="table-responsive">
					 <table id="demo-foo-pagination" class="table table-bordered  toggle-arrow-tiny" data-filtering="true" data-paging="true" data-sorting="true">
                    <!--<table id="demo-foo-pagination" class="table table-bordered toggle-arrow-tiny" data-sorting="true" data-paging="true" data-paging-size="5">-->
                        <thead>
                            <tr>
                                <th>#</th>
                                <th data-toggle="true"> Nº Boleta </th>
                                <th> Empresa </th>
                                <th data-hide="phone"> Fecha Envio </th>
                                <th data-hide="all"> Estado </th>
                                <th data-hide="all"> Opciones </th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($lista_boleta_entrega as $xx) {?>
                            <tr>
                                
                                    <td>#</td>
                                    <td><a  href="<?php echo base_url().'Boleta/Boleta/view_bolesta_users/'.$xx->url;?>/"><?php echo $xx->nro; ?></a></td>
                                    <td><?php echo $xx->empresa; ?></td>
                                    <td><?php echo $xx->fecha_recibido_xx; ?></td>
                                    <td><?php if ($xx->estado==1) {?>
                                        <span class="label label-table label-success">Enviado</span>
                                    <?php } ?></td>
                                    <td>
                                        <a href="" class="btn  btn-outline-danger" ><i class=" fas fa-times-circle"></i></a>
                                    </td>
                                
                            </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
			</div>
		</div>
		
	</div>
</div>

<script type="text/javascript">
	function validate_xx(e) {
		// body...
        
		window.location = "<?php echo base_url().'Boleta/Boleta/Nuevo_boleta/';?>"+e;
	}
</script>
