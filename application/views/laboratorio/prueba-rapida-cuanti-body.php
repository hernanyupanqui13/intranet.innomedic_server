<div class="row">
    <div class="col-md-12">
        <div class="text-right">
            <button type="button" id="imprimir_prueba_rapida" onclick="vistaPreviaImprimir('prueba-rapida-cuanti-imprimir', 'modal-body-imprimir', '<?=$this->uri->segment(4,0)?>')" class="btn btn-outline-dark btn btn-rounded btn-lg font-weight-bold"><i class=" fas fa-print"></i>&nbsp;Imprimir Prueba Rapida Cuantitativa</button>
       
        </div>
    </div>
</div>
<ul class="nav nav-tabs" role="tablist">
    <li class="nav-item"> <a class="nav-link active show" data-toggle="tab" href="#profile" role="tab" id="mostrar_prueba_rapida" aria-selected="true"><span class="hidden-sm-up"><i class="ti-user"></i></span> <span class="hidden-xs-down font-weight-bold">Prueba Rapida Cuantitativa</span></a> </li>
</ul>
<!-- Tab panes -->
<div class="tab-content tabcontent-border">

    <div class="tab-pane  p-20 active show" id="profile" role="tabpanel">
        <div class="card-header bg-info">
            <h4 class="m-b-0 text-white text-center">Prueba Rapida Cuantitativa</h4>
        </div>
        <form action="#" id="registrar_prueba_covid_cuantitativa">
        <div class="row m-2">
            <div class="col-md-4">
                <div class="form-group text-center">
                    <h3>ÁREA</h3>
                    <p><strong class="font-weight-bold">Muestra: </strong>&nbsp;Prueba Serologica<br><strong class="font-weight-bold">Metodologia: </strong> Quimioluminiscencia CLIA</p>

                </div>
            </div>
            <div class="col-md-8">
                <div class="form-group text-center">
                    <h3>INMUNOLOGÍA</h3>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="table-responsive">
                    <table class="table">
                        <thead class="text-center">
                            <tr>
                                <th>Prueba</th>
                                <th>Resultado</th>
                                <th>Unidades</th>
                                <th>Concentracion</th>
                                <th>Valores de Referencia</th>
                            </tr>
                        </thead>
                        <tbody class="text-center">
                            <tr>
                                <td>2019-nCov IgM (CLIA</td>
                                <td>
                                    <select name="igm" id="igm" class="form-control">
                                        <option value="">--Seleccione--</option>
                                        <option value="REACTIVO">REACTIVO</option>
                                        <option value="NO REACTIVO">NO REACTIVO</option>
                                    </select>
                                </td>
                                <td>
                                    <span>AU/mL</span>
                                </td>
                                <td>
                                    <input type="text" name="concentracion_igm" id="concentracion_igm_input" class="form-control"/>
                                </td>
                                <td>
                                    <span>0-1</span>
                                </td>
                            </tr>
                            <tr>
                                <td>2019-nCov IgG (CLIA)</td>
                                <td>
                                    <select name="igg" id="igg" class="form-control">
                                        <option value="">--Seleccione--</option>
                                        <option value="REACTIVO">REACTIVO</option>
                                        <option value="NO REACTIVO">NO REACTIVO</option>
                                    </select>
                                </td>
                                <td>
                                    <span>AU/mL</span>
                                </td>
                                <td>
                                    <input type="text" name="concentracion_igg" id="concentracion_igg_input" class="form-control"/>
                                </td>
                                <td>
                                    <span>0-1</span>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="row">
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
        </div>
        <div class="informacion-medicos">
            <div class="informacion-medicos-item"><span>Medico:&nbsp;</span>RUIZ COTRINA JORGE MARTIN</div>
            <div class="informacion-medicos-item"><span>Tecnologo:&nbsp;</span>ARTICA VICENTE REYNALDO</div>
        </div>
        <div class="row">
            <div class="col-md-12">
              <div class="text-center">
                <input type="hidden" name="id_unico" id="id_unico">
                <a href="javascript:void(0)" id="imprimir_prueba_rapida" onclick="vistaPreviaImprimir('prueba-rapida-cuanti-imprimir', 'modal-body-imprimir', '<?=$this->uri->segment(4,0)?>')" class="btn btn-danger btn-rounded btn-lg"><i class=" fas fa-print"></i>&nbsp;Imprimir</a>
                <button type="submit" class="btn btn-info btn-rounded btn-lg"  ><i class="fas fa-check-circle"></i>&nbsp;Actualizar Prueba Rápida Cuantitativa</button>
              </div>
            </div>
        </div>

        
    </form>
    </div>
    <div class="tab-pane p-20" id="messages" role="tabpanel">3</div>
</div>
<script>
document.getElementById("concentracion_igm_input").value = "<?= $exam_data->concentracion_igm?>";
document.getElementById("concentracion_igg_input").value = "<?= $exam_data->concentracion_igg?>";
document.getElementById("igm").value = "<?=$exam_data->igm?>";
document.getElementById("igg").value = "<?= $exam_data->igg?>";

</script>

<script src=<?= base_url().'application/JavaScript/prueba-covid-cuantitativa-form.js'?>></script>
