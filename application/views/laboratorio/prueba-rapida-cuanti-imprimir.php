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
                <p class="font-weight-bold">MUESTRA: <span class="font-weight-normal">Prueba Serologica</span></p> 
            </div>
            <div class="col-md-12">
                <p class="font-weight-bold">METODOLOGÍA: <span class="font-weight-normal">Quimioluminiscencia CLIA</span></p>
            </div>
            <div class="col-md-12">
                <div class="table-responsive">
                    <table class="table">
                        <thead class="text-center">
                            <tr>
                                <th class="font-weight-bold">Prueba</th>
                                <th class="font-weight-bold">Resultado</th>
                                <th class="font-weight-bold">Unidades</th>
                                <th class="font-weight-bold">Concentracion</th>
                                <th class="font-weight-bold">Valores de Referencia</th>
                            </tr>
                        </thead>
                        <tbody class="text-center">
                            <tr>
                                <td>2019-nCov IgM (CLIA</td>
                                <td>
                                    <span class="font-weight-bold" id="igm-impr-slot">NO REACTIVO</span>
                                </td>
                                <td>
                                    <span>AU/mL</span>
                                </td>
                                <td>
                                    <span id="concentracion_igm-impr-slot"></span>
                                </td>
                                <td>
                                    <span>0-1</span>
                                </td>
                            </tr>
                            <tr>
                                <td>2019-nCov IgG (CLIA)</td>
                                <td>
                                    <span class="font-weight-bold" id="igg-impr-slot">NO REACTIVO</span>
                                </td>
                                <td>
                                    <span>AU/mL</span>
                                </td>
                                <td>
                                    <span id="concentracion_igg-impr-slot"></span>
                                </td>
                                <td>
                                    <span>0-1</span>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="col-md-12">
                <div class="table-responsive">
                    <div class="h5 heading-exam">GLUCOSA (BIOQUIMICA)</div>
                    <table width="100%"border="0" align="left" cellpadding="0" class="table">
                        <tbody><tr class="FacetColumnTD">
                        <td width="85" align="center" valign="top"><strong>IgM</strong></td>
                        <td width="95" align="center" valign="top"><strong>IgG</strong></td>
                        <td width="255" align="center" valign="top"><strong>INTERPRETACION CLÍNICA</strong></td>
                        <td width="203" align="center" valign="top"><strong>SUGERENCIAS</strong></td>
                        </tr>
                        <tr class="FacetDataTD">
                        <td width="85" align="center" valign="middle">&nbsp;
                            No    Reactivo</td>
                        <td width="95" align="center" valign="middle">&nbsp;
                            No    Reactivo</td>
                        <td width="255" valign="top">Alta Posibilidad de <strong>NO</strong> estar    contagiado y si estuviese expuesto y no cumpliste con el distanciamiento    social, posibilidad de <strong>PERIODO DE VENTANA</strong> (primeros 5 días de la    enfermedad).</td>
                        <td width="203" align="center" valign="middle">Continuar con Distanciamiento Social, uso de Mascarilla y lavado de manos constantemente.</td>
                        </tr>
                        <tr class="FacetDataTD">
                        <td width="85" align="center" valign="middle">Reactivo</td>
                        <td width="95" align="center" valign="middle">No    Reactivo</td>
                        <td width="255" valign="top">Alta posibilidad de estar en la fase <strong>INICIAL</strong> de la enfermedad.</td>
                        <td width="203" align="center" valign="middle">Aislamiento    por 14 días</td>
                        </tr>
                        <tr class="FacetDataTD">
                        <td width="85" align="center" valign="middle">&nbsp;
                            Reactivo</td>
                        <td width="95" align="center" valign="middle">&nbsp;
                            Reactivo</td>
                        <td width="255" valign="top">Alta posibilidad de estar en la fase <strong>ACTIVA</strong> de la enfermedad o si eres <strong>ASINTOMATICO</strong> mas de 14 días, <strong>Alta</strong> posibilidad de estar en la fase de la <strong>RECUPERACIÓN.</strong></td>
                        <td width="203" align="center" valign="middle">Aislamiento    por 14 días</td>
                        </tr>
                        <tr class="FacetDataTD">
                        <td width="85" align="center" valign="middle">No Reactivo</td>
                        <td width="95" align="center" valign="middle">Reactivo</td>
                        <td width="255" valign="top">Posibilidad de haber tenido SARS COV 2 o    estar en fase de <strong>RECUPERACIÓN.</strong></td>
                        <td width="203" align="center" valign="middle">Alta médica</td>
                        </tr>
                    </tbody>
                    </table>
                </div>
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
