
<div class="printableAreaprueba">
	<div class="container bg-white">
		<div class="row">
			<div class="col-md-12 m-2">
				<img src="<?php echo base_url().'assets/';?>images/logo.png?v=<?php echo rand(); ?>" alt="">
			</div>
			<br>
			<br>
			<br>
			<br>
			<br>
			<b></b>
			<b></b>
			<b></b>
			<b></b>
			<div class="col-md-12">
				<div class="table-responsive">
					<table class="table color-table info-table border border-dark" id="agregamos_empresa" >
						
						<div class="bg-info text-center p-2 border ">
							<div class="font-weight-bold text-dark">
								<b>RESULTADO DE ANALISIS</b>
							</div>
						</div>
						<tbody  class="table-bordered"  >
							<tr >
								<td style="width: 80%" class="border-0"><b class="font-weight-bold">PACIENTE:&nbsp;</b><span id="nombres_completos_paciente"></span></td>
								<td style="width: 20%;" class="border-right-0"><b class="font-weight-bold">DNI:&nbsp;</b><span id="dni_paciente"></span></td>
								
							</tr>
							
							
						</tbody>
						
					</table>
					<span id="aplicamos_cambios"></span>

					<table class="table">
						<tbody class="table-bordered" >
							<tr>
								<td class="border-right-0" ><b class="font-weight-bold">SEXO</b>:&nbsp;<span id="sexo_id"></span></td>
								<td><b class="font-weight-bold">EDAD</b>:&nbsp;<span id="edad-impr-slot"></span></td>
								<td><b class="font-weight-bold">FECHA NACIMIENTO:</b>&nbsp;<span id="fecha_nacimiento-impr-slot"></span></td>
							</tr>
						</tbody>
					</table>
					<table class="table">
						<tbody class="table-bordered " >
							<tr>
								<td class="border-right-0" ><b class="font-weight-bold">MEDICO</b>:&nbsp;<span id="medico">RUIZ COTRINA JORGE MARTIN</span></td>
								
								<td><b class="font-weight-bold">FECHA RESULTADO:</b>&nbsp;<span id="update_covid-impr-slot"></span></td>
							</tr>
						</tbody>
					</table>
				</div>
			</div>
			<div class="col-md-12">
				<div class="table-responsive">
					<table class="table text-center bg-info">
						<thead class="bg-info">
							<tr>
								<th class="font-weight-bold">ARÉA</th>
								<th class="font-weight-bold">INMUNOLOGÍA</th>
							</tr>
						</thead>
					</table>
				</div>
			</div>
			<div class="col-md-12">
				<p class="font-weight-bold">Detección de anticuerpos - <span class="font-weight-normal"> SARS-CoV-2</span></p> 
			</div>
			<div class="col-md-12">
				<p class="font-weight-bold">METODOLOGÍA: <span class="font-weight-normal">Inmunocromatografia</span></p>
			</div>
			<div class="col-md-12">
				<div class="table-responsive">
					<table class="table">
						<thead class="text-center">
							<tr>
								<th class="font-weight-bold">Prueba</th>
								<th class="font-weight-bold">Resultado</th>
								<th class="font-weight-bold">Unidades</th>
								<th class="font-weight-bold">Valores de Referencia</th>
							</tr>
						</thead>
						<tbody class="text-center">
							<tr>
								<td>Anticuerpo IgM-SARS-COV-2</td>
								<td>
									<span class="font-weight-bold" id="igm-impr-slot">NO REACTIVO</span>
								</td>
								<td>
									<span>-----------</span>
								</td>
								<td>
									<span>-----------</span>
								</td>
							</tr>
							<tr>
								<td>Anticuerpo IgG-SARS-COV-2</td>
								<td>
									<span class="font-weight-bold" id="igg-impr-slot">NO REACTIVO</span>
								</td>
								<td>
									<span>-----------</span>
								</td>
								<td>
									<span>-----------</span>
								</td>
							</tr>
						</tbody>
					</table>
				</div>
			</div>
			<div class="col-md-12">
				<h6 class="font-weight-bold">Interpretación de Resultados:</h6>
				<span>- Un resultado "Reactivo", Indica presencia de anticuerpos contra SARS-coV-2 en sangre, deberá confirmarse con una prueba molecular.</span><br>
				<span>- Un resultado "No Reactivo", Indica que no se han identificado anticuerpos contra SARS-coV-2 en sangre, no descarta la presencia de la enfermedad.</span>
			</div>	
			<br>
			<br>
			<br>
			<br>
			<br>
			<!-- Firmas y Sellos -->
            <div class="col-md-12">
                <div class="table-responsive">
                    <table border="0" width="100%" class="text-center" >
                        <thead class="text-center" >
                            <tr class="text-center">
                                <th> 
                                    <div class="col-md-6 text-center">
                                        <p><span><img class="img-fluid"  src="<?php echo base_url().'upload/';?>firma/204.jpg?ver=<?php echo rand(); ?>" alt=""></span><br>
                                        <small>Firma y Sello<br>
                                        RUIZ COTRINA JORGE MARTIN<br>
                                        Médico especialista<br>
                                        <strong>C.M.P. :</strong>040560			<strong>R.N.E.:</strong>021633</small>     
                                        </p>
                                    </div>
                                </th>
                                <th> 
                                    <div class="col-md-6 text-center ">
                                        <p><span><img class="img-fluid "  src="<?php echo base_url().'upload/';?>firma/205.jpg?ver=<?php echo rand(); ?>" alt=""></span><br><small>
                                            Firma y Sello<br>
                                            ARTICA VICENTE REYNALDO<br>
                                            Tecnólogo médico<br>
                                            <strong>C.T.M.P. :</strong>10626
                                        </small></p>
                                    </div>
                                </th>
                            </tr>
                        </thead>
                    </table>
                </div>
            </div>
		</div>
	</div>

</div>
