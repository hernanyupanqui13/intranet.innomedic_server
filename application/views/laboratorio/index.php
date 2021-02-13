<?php
if (!empty($laboratorio_view_register)) {
	foreach ($laboratorio_view_register as $xx) {
		$idd_= $xx->Id;
		$dni = $xx->dni;
		$nombres_completos = $xx->apellido_paterno.' '.$xx->apellido_materno.', '.$xx->nombre;
		$id_sexo = $xx->id_sexo;
		$fecha_nacimiento= $xx->fecha_nacimiento;
		$empresa = $xx->empresa;
		$ruc = $xx->ruc;
		$edad = $xx->edad;
		$id_paquete = $xx->id_paquete;
		$html_paquete = $xx->html_paquete;
		$nro_ficha = $xx->nro_identificador;
		// $segmentadossrc= $xx->segmentadossrc;	
	}

} else {
	redirect(base_url());
}?>




<div class="row">
	<div class="col-md-10">
		<div class="card">
			<div class="card-body">
				<div class="card-header bg-info ">
					<h4 class="m-b-0 text-white text-center ">Laboratorio</h4>
				</div>
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

				<?php 
				if ($id_paquete=="" || $id_paquete==null) {
					echo "estamos agregando los demas paquetes";
				} else {
					echo $body_template;
				} 
				?>

			</div>
		</div>
	</div>
</div>


<div class="modal fade " id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" data-backdrop="static">
	<div class="modal-dialog modal-lg ">
		<div class="modal-content ">
			<div class="modal-header">
				<h5 class="modal-title font-weight-bold" id="exampleModalLabel">Resultado del paciente: <span class="font-weight-normal" id="nombres_completos_pacientex"></span></h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true" style="border: 2px solid #210202;border-radius: 50%;">&nbsp;&nbsp;&times;&nbsp;&nbsp;</span>
				</button>
			</div>
			<!-- Cargando la plantilla de imprimir -->
			<div class="modal-body bg-white" id="modal-body-imprimir">
				<?= $body_print?>
			</div>						
			<div class="modal-footer">
				<button type="button" class="btn btn-outline-danger btn btn-rounded" data-dismiss="modal"><i class=" fas fa-window-close"></i>&nbsp;Cerrar</button>
				<button type="button" id="print_prueba_rapida" onclick="imprimir()" class="btn btn-outline-dark btn btn-rounded"><i class=" fas fa-print"></i>&nbsp;Imprimir</button>
			</div>
		</div>
	</div>
</div>





<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>


<script src=<?= base_url().'application/JavaScript/imprimir.js'?>></script>
<script src=<?= base_url().'application/JavaScript/laboratorio-index.js'?>></script>

<!--PAQUETE Nº1-->
<script>


	
$(document).ready(function() {
	
	//actualizamos registros via ajax
	$(document).on('click', '#mostrar_prueba_rapida', function(event) {
		event.preventDefault();
		/* Act on the event */
		id_paciente = <?php echo $this->uri->segment(4,0); ?>;
		$.ajax({
			url: '<?php echo base_url().'Laboratorio/Laboratorio/Mostrar_prueba_rapida/' ?>',
			type: 'POST',
			dataType: 'json',
			data: {id_paciente: id_paciente},
		})
		.done(function(data) {
			console.log("success");

			var selectRol = $("select#igm");
			selectRol.val(data.igm).attr("selected", "selected");
			var selectRol1 = $("select#igg");
			selectRol1.val(data.igg).attr("selected", "selected");
		})
		.fail(function() {
			console.log("error");
		})
		.always(function() {
			console.log("complete");
		});
		

	});
		
		



	var agregamos =  <?php echo $this->uri->segment(4,0); ?>;
	setTimeout(function()
	{ 
		$("#id_unico").val(agregamos);
		$("#id_registrar_id_laboraortoio_paquete_1").val(agregamos);
	}, 100);

	//paquete 01
	$(document).on('submit', '#registrar_paquete_01', function(event) {
		event.preventDefault();

		$.ajax({
			url: '<?php echo base_url().'Laboratorio/Laboratorio/Registrar_paquete_01/';?>',
			type: 'POST',
			data: $("#registrar_paquete_01").serialize(),
		})
		.done(function(data) {
			var json = JSON.parse(data);
			console.log("success");
			Swal.fire(
				'¡Buen trabajo!',
				''+json.mensaje+'',
				'success'
			)
		})
		.fail(function() {
			console.log("error");
		})
		.always(function() {
			console.log("complete");
		});
		
	});


	//aqui termina paquewte01
		
	$(document).on('click', '#print_paquete1', function(event) {
		event.preventDefault();

		$.ajax({
			url: '<?php echo base_url().'Laboratorio/Laboratorio/Mostrar_prueba_rapida/' ?>',
			type: 'POST',
			dataType: 'json',
			data: {id_paciente: id_paciente},
		})
		.done(function(data) {
			console.log("success");

			$("#exampleModal").modal("show");
			

			$("#eritrocisrc-impr-slot").text(data.eritrocisrc);
			$("#hemoglobinarc-impr-slot").text(data.hemoglobinarc);
			$("#hematocritorc-impr-slot").text(data.hematocritorc);
			$("#copro_leuco-impr-slot").text(data.copro_leuco);
			$("#plaquetas-impr-slot").text(data.plaquetas);
			$("#vcm-impr-slot").text(data.vcm);
			$("#hcm-impr-slot").text(data.hcm);
			$("#ccmh-impr-slot").text(data.ccmh);
			$("#linfocitosrc-impr-slot").text(data.linfocitosrc);
			$("#monoticosrc-impr-slot").text(data.monoticosrc);
			$("#eosinofilosrc-impr-slot").text(data.eosinofilosrc);
			$("#basofilosrc-impr-slot").text(data.basofilosrc);
			$("#segmentadossrc-impr-slot").text(data.segmentadossrc);
			$("#abastonadossrc-impr-slot").text(data.abastonadossrc);

			$("#nuevocampo_1").text(data.nuevocampo_1);//3
			$("#nuevocampo_2").text(data.nuevocampo_2);//3
			$("#nuevocampo_3").text(data.nuevocampo_3);
			$("#nuevocampo_4").text(data.nuevocampo_4);
			$("#nuevocampo_5").text(data.nuevocampo_5);
			$("#nuevocampo_6").text(data.nuevocampo_6);
			$("#nuevocampo_7").text(data.nuevocampo_7);
			$("#nuevocampo_8").text(data.nuevocampo_8);
			$("#nuevocampo_9").text(data.nuevocampo_9);
			$("#nuevocampo_10").text(data.nuevocampo_10);
			$("#linfocitos-impr-slot").text(data.linfocitos);
			$("#monocitos-impr-slot").text(data.monocitos);
			$("#eosinofilos-impr-slot").text(data.eosinofilos);
			$("#basofilos-impr-slot").text(data.basofilos);
			$("#segmentados-impr-slot").text(data.segmentados);

			$("#abastonados-impr-slot").text(data.abastonados);

			$("#fecha_evaluacion-impr-slot").text(data.fecha_evaluacion);
			$("#fecha_evaluacion_paquete12").text(data.fecha_evaluacion);
			$("#comentarios-impr-slot").text(data.comentarios);
			$("#salto20-impr-slot").text(data.salto20);  // Not sure what it does
			$("#colesteroltotal_paquete1").text(data.colesteroltotal);
			$("#colesterolhdl_paquete1").text(data.colesterolhdl);
			$("#trigliceridos_paquete1").text(data.trigliceridos);
			$("#colesterolldl_paquete1").text(data.colesterolldl);
			$("#colesterolvldl_paquete1").text(data.colesterolvldl);
			$("#glucosa_paquete1").text(data.glucosa);
			
			//paquete 2 añadidod
			$("#salto21_paquete2").text(data.salto21);
			$("#prote_total_paquete2").text(data.prote_total);
			$("#albumina_paquete2").text(data.albumina);
			$("#globulina_paquete2").text(data.globulina);
			$("#relacion_alb_paquete2").text(data.relacion_alb);
			$("#bili_total_paquete2").text(data.bili_total);
			$("#bili_directa_paquete2").text(data.bili_directa);
			$("#bili_indirecta_paquete2").text(data.bili_indirecta);
			$("#fosfatasa_paquete2").text(data.fosfatasa);
			$("#dhl_paquete2").text(data.dhl);
			$("#tgo_paquete2").text(data.tgo);
			$("#tgp_paquete2").text(data.tgp);
			$("#obser_perfilhepa_paquete2").text(data.obser_perfilhepa);
			$("#obser_perfillipi_paquet2").text(data.obser_perfillipi);
			
		})
		.fail(function() {
			console.log("error");
		})
		.always(function() {
			console.log("complete");
		});
		
	});          		
				
});
		

//obteneemos la informacion para mostrar en el valor.	
$(document).ready(function() {
	var id_paciente = <?php echo $this->uri->segment(4,0); ?>;
	$.ajax({
		url: '<?php echo base_url().'Laboratorio/Laboratorio/Mostrar_paquete_01/';?>',
		method: 'POST',
		dataType: 'json',
		data: {id_paciente: id_paciente},
	})
	.done(function(data) {
		console.log("success");

		$("#eritrocisrc").val(data.eritrocisrc);
		$("#hemoglobinarc").val(data.hemoglobinarc);
		$("#hematocritorc").val(data.hematocritorc);
		$("#copro_leuco").val(data.copro_leuco);
		$("#plaquetas").val(data.plaquetas);
		$("#vcm").val(data.vcm);
		$("#hcm").val(data.hcm);
		$("#ccmh").val(data.ccmh);
		$("#linfocitosrc").val(data.linfocitosrc);
		$("#monoticosrc").val(data.monoticosrc);
		$("#eosinofilosrc").val(data.eosinofilosrc);
		$("#basofilosrc").val(data.basofilosrc);
		$("#segmentadossrc").val(data.segmentadossrc);
		$("#abastonadossrc").val(data.abastonadossrc);

		$("#nuevocampo_1").val(data.nuevocampo_1);
		$("#nuevocampo_2").val(data.nuevocampo_2);
		$("#nuevocampo_3").val(data.nuevocampo_3);
		$("#nuevocampo_4").val(data.nuevocampo_4);
		$("#nuevocampo_5").val(data.nuevocampo_5);
		$("#nuevocampo_6").val(data.nuevocampo_6);
		$("#nuevocampo_7").val(data.nuevocampo_7);
		$("#nuevocampo_8").val(data.nuevocampo_8);
		$("#nuevocampo_9").val(data.nuevocampo_9);
		$("#nuevocampo_10").val(data.nuevocampo_10);
		$("#linfocitos").val(data.linfocitos);
		$("#monocitos").val(data.monocitos);
		$("#eosinofilos").val(data.eosinofilos);
		$("#basofilos").val(data.basofilos);
		$("#segmentados").val(data.segmentados);
		$("#abastonados").val(data.abastonados);
		$("#comentarios").val(data.comentarios);
		$("#salto20-impr-slot").val(data.salto20);
		$("#colesteroltotal").val(data.colesteroltotal);
		$("#colesterolhdl").val(data.colesterolhdl);
		$("#trigliceridos").val(data.trigliceridos);
		$("#colesterolldl").val(data.colesterolldl);
		$("#colesterolvldl").val(data.colesterolvldl);
		$("#obser_perfillipi").val(data.obser_perfillipi);
		$("#glucosa").val(data.glucosa);
		$("#suma_formula").text("100");

		if (data.anormal_lab2=="on") {
			$("input[name=anormal_lab2][value='"+data.anormal_lab2+"']").prop("checked",true);
			$("#tr_anom6").show("fast");
			$("#tr_anom7").show("fast");
			$("#tr_anom8").show("fast");
			$("#tr_anom9").show("fast");
			$("#tr_anom10").show("fast");
		}else{
			$("#tr_anom6").hide("fast");
			$("#tr_anom7").hide("fast");
			$("#tr_anom8").hide("fast");
			$("#tr_anom9").hide("fast");
			$("#tr_anom10").hide("fast");
		}
		//$("#anormal_lab1").val(data.anormal_lab1);

		if (data.anormal_lab1=="on") {

			$("input[name=anormal_lab1][value='"+data.anormal_lab1+"']").prop("checked",true);
			$("#tr_anom1").show("fast");
			$("#tr_anom2").show("fast");
			$("#tr_anom3").show("fast");
			$("#tr_anom4").show("fast");
			$("#tr_anom5").show("fast");

		}else{
			$("#tr_anom1").hide("fast");
			$("#tr_anom2").hide("fast");
			$("#tr_anom3").hide("fast");
			$("#tr_anom4").hide("fast");
			$("#tr_anom5").hide("fast");
		}
		if (data.salto21=="on") {

			$("input[name=salto21][value='"+data.salto21+"']").prop("checked",true);
			

		}else{
			$("input[name=salto21][value='"+data.salto21+"']").prop("checked",false);
		}

		$("#prote_total").val(data.prote_total);
		$("#albumina").val(data.albumina);
		$("#globulina").val(data.globulina);
		$("#relacion_alb").val(data.relacion_alb);
		$("#bili_total").val(data.bili_total);
		$("#bili_directa").val(data.bili_directa);
		$("#bili_indirecta").val(data.bili_indirecta);
		$("#fosfatasa").val(data.fosfatasa);
		$("#dhl").val(data.dhl);
		$("#tgo").val(data.tgo);
		$("#tgp").val(data.tgp);
		$("#obser_perfilhepa").val(data.obser_perfilhepa);				
	})
	.fail(function() {
		console.log("error");
	})
	.always(function() {
		console.log("complete");
	});
});


$(document).ready(function() {
	id_paciente = <?php echo $this->uri->segment(4,0); ?>;	
	$.ajax({
		url: '<?php echo base_url().'Laboratorio/Laboratorio/imprimir_prueba_rapida/' ?>',
		type: 'POST',
		dataType: 'json',
		data: {id_paciente: id_paciente},
	})
	.done(function(data) {
		console.log("success");

		$("#nombres_completos_paciente_paquet1").text(data.nombre+" "+data.apellido_paterno+" "+data.apellido_materno);
		$("#nombres_completos_paciente_paquet11").text(data.nombre+" "+data.apellido_paterno+" "+data.apellido_materno);
		$("#nombres_completos_paciente_paquet12").text(data.nombre+" "+data.apellido_paterno+" "+data.apellido_materno);

		if (data.empresa==""|| data.empresa==null) {
			$("#wiw").hide();
			$("#wiw12").hide();
			$("#empresa_paquete1").hide();
			$("#empresa_paquete12").hide();
		}else{
			$("#wiw").show();
			$("#wiw12").show();
			$("#empresa_paquete1").text(data.empresa).show(500);
			$("#empresa_paquete12").text(data.empresa).show(500);
		}
		$("#sexo_paquete1").text(data.sexo);
		$("#sexo_paquete12").text(data.sexo);

		if (data.edad<1) {
			$("#edad_paquete1").text(data.edad+" "+'año')
			$("#edad_paquete12").text(data.edad+" "+'año')
		}else{
			$("#edad_paquete1").text(data.edad+" "+'años')
			$("#edad_paquete12").text(data.edad+" "+'años')
		}
	})

	.fail(function() {
		console.log("error");
	})
	
	.always(function() {
		console.log("complete");
	});
});
					
</script>

<!--ESTO ES PARA EL PAQUETE Nº1-->






<!---PAQUETE Nº2-->





<script src="<?php echo base_url().'assets_sistema/';?>js/funciones.js"></script>
<script>


//$("#tabs").tabs();
//$(".FacetButton").button();
//$(".clasecombo").selectmenu();

$("#form").on('submit', function(e) {
	e.preventDefault();
	grabar_formato();
});

$('.add_more').click(function (e) {
	e.preventDefault();
	$(this).before("</br><input name='file[]' class='FacetButton ui-button ui-widget ui-state-default ui-corner-all' type='file'  />");
});	

// listar_historial();
mostrarcampos1();
mostrarcampos2();

antibiograma();

$("#eosinofilosrc").keyup(function(){
	sumar_porcentaje();
});
$("#linfocitosrc").keyup(function(){
	sumar_porcentaje();
});
$("#monoticosrc").keyup(function(){
	sumar_porcentaje();
});		
$("#abastonadossrc").keyup(function(){
	sumar_porcentaje();
});			
$("#segmentadossrc").keyup(function(){
	sumar_porcentaje();
});
$("#basofilosrc").keyup(function(){
	sumar_porcentaje();
});

$("#nuevocampo_1").keyup(function(){
	sumar_porcentaje();
});

$("#nuevocampo_2").keyup(function(){
	sumar_porcentaje();
});

$("#nuevocampo_3").keyup(function(){
	sumar_porcentaje();
});

$("#nuevocampo_4").keyup(function(){
	sumar_porcentaje();
});

$("#nuevocampo_5").keyup(function(){
	sumar_porcentaje();
});



function grabar_formato() {
	$("#botonera").hide(function() {
		$("#loader").show(function() {
			/*var datos=$("form").serialize();*/

			$("#subir").button({
				disabled: true
			});
			var formData = new FormData($("#form")[0]);
			$.ajax({
				url: "laboratorio_sql.php",
				data: formData,
				cache: false,
				contentType: false,
				processData: false,
				type: "post",
				cache:false,
				success: function(ret) {
					var jdatos = JSON.parse(ret);
					var mensaje = jdatos.mensaje;
					var idformato = jdatos.idformato;
					var tipo = jdatos.tipo;
					var nAccion = jdatos.nAccion;
					$("#accion").val(nAccion);
					if (nAccion == 'grabar') {
						$("#subir").val("Grabar");
					} else if (nAccion == 'editar') {
						$("#subir").val("Actualizar");
					} else if (nAccion == 'eliminar') {
						$("#subir").val("Eliminar");
					}
					mostrar_mensaje(tipo, mensaje, '');
					//actualiza_ruta();
					//cargar_cuerpo('');
				}
			});
		});
	});
}

function ValidaRangos(campo, a, b) {           
	valor = '';		
	if ($(campo).val() != '') {
		valor = parseFloat($(campo).val());					
	}

	if (valor != '') {
		if (valor>= a) {
			$(campo).removeClass("valorbajo");
		} else {
			$(campo).addClass("valorbajo");
		}
			if (valor <= b) {
			$(campo).removeClass("valoranormal");
		} else {
			$(campo).addClass("valoranormal");
		}
	} else {
		$(campo).removeClass("valoranormal");
		$(campo).removeClass("valorbajo");
	}
}


////////////////// GLOBULO ROJO /////////////
function ev_globrojo(){
	obj = $('#eritrocisrc');
	var v =obj.val();
	if( v!='' && v!=undefined){
	v = v.replace("'","");
	v = v.replace(',','');
	v = v.replace(',','');
	}
	v = parseFloat(v,10);
	//alert(v)
		if(v>5800000 && v!==''){
			console.log(obj);
			obj.addClass("valoranormal");
		}else{
			obj.removeClass("valoranormal");
		}
		if(v<3800000 && v!==''){
			console.log(obj);
			obj.addClass("valorbajo");
		}else{
			obj.removeClass("valorbajo");
		} 
}



	////////////////// plaquetas /////////////
			function ev_plaquetas(){
					obj = $('#plaquetas');
					var v =obj.val();
					if( v!='' && v!=undefined){
					v = v.replace("'","");
					v = v.replace(',','');
					v = v.replace(',','');
					}
					v = parseFloat(v,10);
					//alert(v)
						if(v>450000 && v!==''){
							console.log(obj);
							obj.addClass("valoranormal");
						}else{
							obj.removeClass("valoranormal");
						}
						if(v<150000 && v!==''){
							console.log(obj);
							obj.addClass("valorbajo");
						}else{
							obj.removeClass("valorbajo");
						} 
				}

////////////////// LEUCOCITOS /////////////
function ev_copro(){
	obj = $('#copro_leuco');
	objedad = $('#edad');
	var v =obj.val();
	var edad =objedad.val();
	if( v!='' && v!=undefined){
	v = v.replace("'","");
	v = v.replace(',','');
	v = v.replace(',','');
	}
	v = parseFloat(v,10);
	//alert(v)
	if(edad>19){
		if(v>10000 && v!==''){
			console.log(obj);
			obj.addClass("valoranormal");
		}else{
			obj.removeClass("valoranormal");
		}
		if(v<4500 && v!==''){
			console.log(obj);
			obj.addClass("valorbajo");
		}else{
			obj.removeClass("valorbajo");
		} 
	}
	
	if(edad<18){
		if(v>11000 && v!==''){
			console.log(obj);
			obj.addClass("valoranormal");
		}else{
			obj.removeClass("valoranormal");
		}
		if(v<8000 && v!==''){
			console.log(obj);
			obj.addClass("valorbajo");
		}else{
			obj.removeClass("valorbajo");
		} 
	}
	
		
}


function ValidaRangosSexo(campo, a, b, c, d) {
	valor = '';
	if ($(campo).val() != '') {
		valor = parseFloat($(campo).val());
	}

	sexo = $("#sexo").val();
	if (valor != '') {
		if (sexo == "M") {
			if (valor>= a) {
				$(campo).removeClass("valorbajo");
			} else {
				$(campo).addClass("valorbajo");
			}
				if (valor <= b) {
				$(campo).removeClass("valoranormal");
			} else {
				$(campo).addClass("valoranormal");
			}
		} 					
		else if (sexo == "F") {
			if (valor>= c) {
				$(campo).removeClass("valorbajo");
			} else {
				$(campo).addClass("valorbajo");
			}
				if (valor <= d) {
				$(campo).removeClass("valoranormal");
			} else {
				$(campo).addClass("valoranormal");
			}
		}
	} else {
		$(campo).removeClass("valoranormal");
		$(campo).removeClass("valorbajo");
	}
}

	function ValidaMax(campo, signo, a) {
		valor = '';
		if ($(campo).val() != '') {
			valor = parseFloat($(campo).val());
		}
		if (valor != '') {
			if (signo == "<") {
				if (valor < a) {
					$(campo).removeClass("valoranormal");
				} else {
					$(campo).addClass("valoranormal");
				}
			} else if (signo == ">") {
				if (valor > a) {
					$(campo).removeClass("valoranormal");
				} else {
					$(campo).addClass("valoranormal");
				}
			} else if (signo == "<=") {
				if (valor <= a) {
					$(campo).removeClass("valoranormal");
				} else {
					$(campo).addClass("valoranormal");
				}
			} else if (signo == ">=") {
				if (valor >= a) {
					$(campo).removeClass("valoranormal");
				} else {
					$(campo).addClass("valoranormal");
				}
			}
		} else {
			$(campo).removeClass("valoranormal");
		}
	}

	sumar_porcentaje();
	ev_globrojo();
	ev_plaquetas();
	ev_copro();
	
	ValidaRangos('#hemoglobina', '4.5', '6.5');

	ValidaRangos("#hemoglobinarc", '12.00', '15.30');//modifcado
	ValidaRangos("#hematocritorc", '37.00', '46.00');//modificado
	//ValidaRangos("#eritrocisrc", '3800000', '5800000');//modificado
	ValidaRangos("#leucocitosrc", '4.00', '10.00');
	ValidaRangos("#vcm", '80', '97');//modificadoo
	ValidaRangos("#hcm", '27', '32');//modificado
	ValidaRangos("#ccmh", '30.00', '35.00');//modificado
	ValidaRangos("#rdwsd", '37.00', '54.00');
	ValidaRangos("#rdwcv", '10.00', '15.00');
	ValidaRangos("#eritrosesrc", '1.00', '20.00');
	ValidaRangos("#abastonadossrc", '0', '5');//modificado
	
	ValidaRangos("#nuevocampo_1", '0', '0');//modificado
	ValidaRangos("#nuevocampo_2", '0', '0');//modificado
	ValidaRangos("#nuevocampo_3", '0', '0');//modificado
	ValidaRangos("#nuevocampo_4", '0', '0');//modificado
	ValidaRangos("#nuevocampo_5", '0', '0');//modificado
	ValidaRangos("#nuevocampo_6", '0', '0');//modificado
	ValidaRangos("#nuevocampo_7", '0', '0');//modificado
	ValidaRangos("#nuevocampo_8", '0', '0');//modificado
	ValidaRangos("#nuevocampo_9", '0', '0');//modificado
	ValidaRangos("#nuevocampo_10", '0', '0');//modificado
	
	
	
	ValidaRangos("#segmentadossrc", '55', '65');//modificado
	ValidaRangos("#eosinofilosrc", '0', '4');
	ValidaRangos("#basofilosrc", '0', '2');//modificado
	ValidaRangos("#monoticosrc", '2', '8');//modificado
	ValidaRangos("#linfocitosrc", '25.00', '40.00');//modificado
	ValidaRangos("#abastonados", '0', '500');//modificado
	ValidaRangos("#segmentados", '1600', '7000');//modificado
	ValidaRangos("#basofilos", '0', '200');//modificado
	ValidaRangos("#eosinofilos", '0', '500');//modificado
	ValidaRangos("#monocitos", '0', '800');//modificado
	ValidaRangos("#linfocitos", '1000', '4800');//modificado
	//  ValidaRangos("#plaquetas", '150000', '450000');//modificado
	ValidaRangos("#rplaquetasrc", '6.50', '11.00');

	ValidaRangos("#glucosa", '70', '110');//modificado
	
	ValidaRangos("#tgo", '0', '40'); //modificado
	ValidaRangosSexo("#aurico", '3.5', '7.2', '2.6', '6.0');
	ValidaRangos("#ggtp", '0.00', '40.00');
	ValidaRangos("#colesteroltotal", '92.00', '200.00');
	ValidaRangos("#colesterolhdl", '35', '60');//modificado
	ValidaRangos("#colesterolldl", '0', '149');//modificado
	ValidaRangos("#colesterolvldl", '5', '40');//modificado
	ValidaRangos("#trigliceridos", '0', '149');//modificado
	ValidaRangos("#lipidos", '450.00', '1000.00');
	ValidaRangos("#celulas_epitel", '0.00', '5.00');
	ValidaRangos("#leucocito", '0', '1');//modificado
	ValidaRangos("#hematies2", '0', '1');//MODIFICADO



	//nuevos
	ValidaRangosSexo("#hemoglobinarc", '13.00', '18.00', '12.00', '16.00');
	ValidaRangosSexo("#hematocritorc", '40', '54', '35', '47');
	ValidaRangos("#creatinina", '0.7', '1.4', '0.6', '1.2');
	ValidaRangosSexo("#tgp", '0', '45', '0', '34');
	ValidaRangos("#t_protombina", '10.7', '14.4');
	ValidaRangos("#sangre_2", '14', '21');
	ValidaRangos("#t_coagulacion", '200', '400');
	ValidaRangos("#inr", '0.8', '1.1');
	ValidaRangos("#t_tromboplastina", '24.9', '36.8');
	ValidaRangos("#celulas_epitel2", '2', '3');
	ValidaRangos("#leucocitos3", '0', '1');
	ValidaRangos("#hematies3", '0', '1');
	ValidaRangos("#urea", '13', '43');
	ValidaRangos("#albumina", '3.8', '5.5');
	ValidaRangos("#bili_total", '0.3', '1.4');
	ValidaRangos("#bili_directa", '0', '0.40');
	ValidaRangos("#bili_indirecta", '0', '1.10');
	ValidaRangos("#globulina", '2.90', '3.50');//modificado
	ValidaRangos("#relacion_alb", '1.20', '2.20');//modificado
	ValidaRangos("#prote_total", '6.4', '8.3');
	ValidaRangosSexo("#fosfatasa", '0', '269', '0', '239');
	ValidaRangos("#dhl", '0', '300');
	ValidaRangos("#fen_orina", '0', '74');
	ValidaRangosSexo("#sed_globu", '0', '10', '0', '20');
	ValidaRangos("#campo_tsh", '0.42', '5.45');
	ValidaRangos("#campo_t4", '4.3', '11.19');
	ValidaRangos("#campo_t3", '0.52', '1.98');
	ValidaRangos("#ana_1", '40', '50');
	ValidaRangos("#infla_leucocitos", '15', '20');
	ValidaRangos("#infla_hematies", '1', '2');


				ValidaRangos("#plomo", '0', '29.99');

			
					ValidaRangos("#alcohol_cuali", '0.3', '0.8');
			

	/*03-07-2017*/
	ValidaRangos("#microalbu", '0', '2.0');
	/*fin 03-07-2017*/
	
	//format("#eritrocisrc");	
	
	
	//LISTAR DIAGNOSTICO
	//  listar_cie10("#diag", "#cie_10","#labo_reco1");
	//  listar_cie10("#diag2", "#cie_102","#labo_reco2");
	// listar_cie10("#diag3", "#cie_103","#labo_reco3");

	//LISTAR CIE
	//listar_porcie10("#cie_10", "#diag","#labo_reco1");
	//&listar_porcie10("#cie_102", "#diag2","#labo_reco2");
	//listar_porcie10("#cie_103", "#diag3","#labo_reco3");




	function asigna_nombre(nombre, descrip)
	{
		posicion = nombre.lastIndexOf('\\');
		nombre = nombre.substring(posicion + 1, nombre.length);
		//document.form.descripcion.value=nombre;
		$("#" + descrip).val(nombre);

	}

	function abrearchivo(ruta) {
		var archivo = $("#" + ruta).val();
		var rand = Math.random();
		miPopup3 = window.open("vista2.php?archivo=" + archivo + "&rand=" + rand, "Archivo", "resizable=yes,scrollbars=yes")
		miPopup3.focus()
	}

	function mostrar_fecha(check,texto){
		if($(check).is(":checked")){
			$(texto).removeAttr("disabled");
	$(texto).val("10-11-2020");
			$(texto).show("fast");
		}else{
			$(texto).hide("fast");
			$(texto).val("");
			$(texto).attr("disabled","disabled");
		}
	}
	function marcar_checks(){
		var checks = '';
		var valor_ck = '';
		$('.ch_proc').each(function(i,e){
			if($(e).is(':checked')){
				valor_ck = $(e).val();
				checks += checks==''?valor_ck:','+valor_ck;
			}
		})
		$('#idprocedimiento').val(checks);
	}
	function marcar_fechas(){
		var checks = '';
		var valor = '';
		$('.fc_exam').each(function(i,e){
			valor = $(e).val()
			if(valor!='' && valor!=undefined){
				checks += checks==''?valor:','+valor;
			}
		})
		$('#fechas_proc').val(checks);
	}
	function llamar_ws(){
		
		$.ajax({
			url:'../../WService/consumirws',
			data:'',
			type:'',
			success: function(ret){
				
			}
		});
	}
/*	$(".fc_exam").datepicker({
		changeYear: true,
		changeMonth: true,
		onSelect: function(fc){
			marcar_fechas();
		}
	});*/

	
	function sumar_porcentaje(){
		var eos=$("#eosinofilosrc").val()*1;
		var lin=$("#linfocitosrc").val()*1;
		var mon=$("#monoticosrc").val()*1;
		var aba=$("#abastonadossrc").val()*1;				
		var seg=$("#segmentadossrc").val()*1;
		var bas=$("#basofilosrc").val()*1;
		var nuevocampo_1=$("#nuevocampo_1").val()*1;	
		var nuevocampo_2=$("#nuevocampo_2").val()*1;	
		var nuevocampo_3=$("#nuevocampo_3").val()*1;	
		var nuevocampo_4=$("#nuevocampo_4").val()*1;
		var nuevocampo_5=$("#nuevocampo_5").val()*1;
			
		var total=eos+lin+mon+aba+seg+bas+nuevocampo_1+nuevocampo_2+nuevocampo_3+nuevocampo_4+nuevocampo_5;
		
		$("#suma_formula").html(total);
		if(total==100){
			$("#suma_formula").css({"color":"#000"});
		}else{
			$("#suma_formula").css({"color":"#F00"});
		}
	}			


	function calculo(valor,calc){
		var leucocito=$('#copro_leuco').val()
		
		if(valor!='' && leucocito!=''){
			resultado=((valor*leucocito)/100);
			$(calc).val(redondea(resultado,2));
		}
	}

	function calcldl(){
	var colesteroltotal=$('#colesteroltotal').val()
	var colesterolhdl=$('#colesterolhdl').val()
	var trigliceridos=$('#trigliceridos').val()

	if(colesteroltotal!='' && colesterolhdl!='' && trigliceridos!=''){
	resultado=colesteroltotal-colesterolhdl-(trigliceridos/5);
	$('#colesterolldl').val(redondea(resultado,1));
	ValidaRangos("#colesterolldl", '0', '149');
	}
	}

	function calcvld(){
	var trigliceridos=$('#trigliceridos').val()
	if(trigliceridos!=''){
	resultado=trigliceridos/5;
	$('#colesterolvldl').val(redondea(resultado,1));
	ValidaRangos("#colesterolvldl", '5', '40');
	}
	}

	function calcvcm(){
	var hematocritorc=$('#hematocritorc').val()
	var eritrocisrc=$('#eritrocisrc').val()
	eritrocisrc = eritrocisrc.replace("'","");
	eritrocisrc = eritrocisrc.replace(',','');
	eritrocisrc = eritrocisrc.replace(',','');

	if(eritrocisrc!='' && hematocritorc!=''){
	resultado=hematocritorc/eritrocisrc*10000000;
	$('#vcm').val(redondea(resultado,1));
	ValidaRangos('#vcm', '80', '97');
	}
	}

	//10
	//10000000

	function calchcm(){
	var hemoglobinarc=$('#hemoglobinarc').val()
	var eritrocisrc=$('#eritrocisrc').val()
	eritrocisrc = eritrocisrc.replace("'","");
	eritrocisrc = eritrocisrc.replace(',','');
	eritrocisrc = eritrocisrc.replace(',','');

	if(hemoglobinarc!='' && eritrocisrc!=''){
	resultado=hemoglobinarc/eritrocisrc*10000000;
	$('#hcm').val(redondea(resultado,1));
	ValidaRangos('#hcm','27.00', '32.00');
	}
	}

	//10
	//10000000

	function calcchcm(){
	var hemoglobinarc=$('#hemoglobinarc').val()
	var hematocritorc=$('#hematocritorc').val()
	if(hemoglobinarc!='' && hematocritorc!=''){
	resultado=hemoglobinarc/hematocritorc*100;
	$('#ccmh').val(redondea(resultado,1));
	ValidaRangos('#ccmh', '30.00', '35.00');
	}
	}

	function calcglobu(){
	var prote_total=$('#prote_total').val()
	var albumina=$('#albumina').val()
	if(prote_total!='' && albumina!=''){
	resultado=prote_total-albumina;
	$('#globulina').val(redondea(resultado,1));
	ValidaRangos('#globulina', '2.90', '3.50');
	}
	}

	function albuentreglo(){
	var globulina=$('#globulina').val()
	var albumina=$('#albumina').val()
	if(globulina!='' && albumina!=''){
	resultado=albumina/globulina;
	$('#relacion_alb').val(redondea(resultado,1));
	ValidaRangos('#relacion_alb','1.20', '2.20');
	}
	}


	function calcbiliind(){
	var bili_total=$('#bili_total').val()
	var bili_directa=$('#bili_directa').val()
	if(bili_total!='' && bili_directa!=''){
	resultado=bili_total-bili_directa;
	$('#bili_indirecta').val(redondea(resultado,1));
	ValidaRangos('#bili_indirecta', '0', '0.40');
	}
	}



	function format(input)
	{
	var num = $(input).val().replace(/\,/g,'');
	if(!isNaN(num)){
	num = num.toString().split('').reverse().join('').replace(/(?=\d*\,?)(\d{3})/g,'$1,');
	num = num.split('').reverse().join('').replace(/^[\,]/,'');
	input.value = num;
	}
	else{
		input.value = input.value.replace(/[^\d\,]*/g,'');
		}
	}

			function radio(clase){
		$(clase).prop("checked",true);
	}


	function mostrarcampos1(){
		if($("#anormal_lab1").is(":checked")){
			$("#tr_anom1").show("fast");
			$("#tr_anom2").show("fast");
			$("#tr_anom3").show("fast");
			$("#tr_anom4").show("fast");
			$("#tr_anom5").show("fast");
		}else{
			$("#tr_anom1").hide("fast");
			$("#tr_anom2").hide("fast");
			$("#tr_anom3").hide("fast");
			$("#tr_anom4").hide("fast");
			$("#tr_anom5").hide("fast");
		}	
	}

	function mostrarcampos2(){
		if($("#anormal_lab2").is(":checked")){
			$("#tr_anom6").show("fast");
			$("#tr_anom7").show("fast");
			$("#tr_anom8").show("fast");
			$("#tr_anom9").show("fast");
			$("#tr_anom10").show("fast");
		}else{
			$("#tr_anom6").hide("fast");
			$("#tr_anom7").hide("fast");
			$("#tr_anom8").hide("fast");
			$("#tr_anom9").hide("fast");
			$("#tr_anom10").hide("fast");
		}	
	}


	function antibiograma(){
		var valor = $('#culti_urocultivo :selected').val();
		if(valor=='NEGATIVO'){
			$('.antibiograma').val("");
			$('.antibiograma').css("display", "none");
			//$('.noantibiograma').css("display","table-row");
		}else if(valor=='POSITIVO'){
			$('.antibiograma').css("display","table-row");
			//$('.noantibiograma').val("");
			//$('.noantibiograma').css("display", "none");
		}else if(valor==''){
			$('.antibiograma').val("");
			//$('.noantibiograma').val("");
			$('.antibiograma').css("display", "none");
			//$('.noantibiograma').css("display","none");
		}
	}


</script>
<style type="text/css">
	.valoranormal {
		background-color: red !important;
		color: white !important;
		border-color: #a94442 !important;
		-webkit-box-shadow: inset 0 1px 1px rgba(0, 0, 0, .075) !important;
		box-shadow: inset 0 1px 1px rgba(0, 0, 0, .075) !important;
	}

	.valorbajo {
		background-color: yellow !important;
		color: black !important;
		border-color: #a94442 !important;
		-webkit-box-shadow: inset 0 1px 1px rgba(0, 0, 0, .075) !important;
		box-shadow: inset 0 1px 1px rgba(0, 0, 0, .075) !important;
	}
</style>
<link rel="stylesheet" type="text/css" href="<?= base_url() . 'application/styles/exams-body.css'?>">


	




