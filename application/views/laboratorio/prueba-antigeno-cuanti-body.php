<div class="row">
    <div class="col-md-12">
        <div class="text-right">
            <button type="button" id="imprimir_prueba_rapida" onclick="vistaPreviaImprimir('prueba-antigeno-cuanti-imprimir', 'modal-body-imprimir', '<?=$this->uri->segment(4,0)?>')" class="btn btn-outline-dark btn btn-rounded btn-lg font-weight-bold"><i class=" fas fa-print"></i>&nbsp;Imprimir Prueba Antigeno Cuantitativa</button>
        
        </div>
    </div>
</div>
<ul class="nav nav-tabs" role="tablist">
    <li class="nav-item"> <a class="nav-link active show" data-toggle="tab" href="#profile" role="tab" id="mostrar_prueba_rapida" aria-selected="true"><span class="hidden-sm-up"><i class="ti-user"></i></span> <span class="hidden-xs-down font-weight-bold">Prueba Antigeno Cuantitativa</span></a> </li>
</ul>
<!-- Tab panel -->
<div class="tab-content tabcontent-border">

    <div class="tab-pane  p-20 active show" id="profile" role="tabpanel">
        <div class="card-header bg-info">
            <h4 class="m-b-0 text-white text-center">Prueba Antigeno Cuantitativa</h4>
        </div>
        <form action="#" id="registrar_prueba_antigeno_cuantitativa">
        <div class="row m-2">
            <div class="col-md-4">
                <div class="form-group text-center">
                    <h3>ÁREA</h3>
                    <p><strong class="font-weight-bold">Muestra: </strong>&nbsp;Hisopado Nasofaringeo o nasal<br><strong class="font-weight-bold">Metodologia: </strong>Inmunoflourescencia</p>

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
                                <td>ANTÍGENO</td>
                                <td>
                                    <select name="antigeno_resultado" id="antigeno_resultado_input" class="form-control">
                                        <option value="">--Seleccione--</option>
                                        <option value="positivo">POSITIVO</option>
                                        <option value="negativo">NEGATIVO</option>
                                    </select>
                                </td>
                                <td>
                                    <span>IU/mL</span>
                                </td>
                                <td>
                                    <input type="text" name="concentra_atig" id="concentra_atig_input" class="form-control"/>
                                </td>
                                <td>
                                    <span>0-0.4</span>
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
                    <table width="100%" class="table">
                        <thead>
                            <tr class="FacetFilaTD">
                                <th class="FacetDataTD" width="20%"></th>
                                <th class="FacetDataTD">Interpretacion clinica</th>
                                <th class="FacetDataTD">Recomendaciones</th>
                            </tr>
                        </thead>
                        <hbody>
                            <tr class="FacetFilaTD">
                                <td class="FacetDataTD" align="center" valign="top">Positivo</td>
                                <td class="FacetDataTD">Posibilidad de estar en la fase ACTIVA de la enfermedad.</td>
                                <td class="FacetDataTD">Aislamiento por 14 días e iniciar tratamientos si es el caso.</td>
                            </tr>
                            <tr class="FacetFilaTD">
                                <td class="FacetDataTD" align="center" valign="top">Negativo</td>
                                <td class="FacetDataTD">No evidencia de <strong>antígeno</strong> de covid 19</td>
                                <td class="FacetDataTD">Realizar pruebas complementaria de deteccion de anticuerpos si es que hubo exposicion al covid 19.</td>
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
                <a href="javascript:void(0)" id="imprimir_prueba_rapida" onclick="vistaPreviaImprimir('prueba-antigeno-cuanti-imprimir', 'modal-body-imprimir', '<?=$this->uri->segment(4,0)?>')" class="btn btn-danger btn-rounded btn-lg"><i class=" fas fa-print"></i>&nbsp;Imprimir</a>
                <button type="submit" class="btn btn-info btn-rounded btn-lg" ><i class="fas fa-check-circle"></i>&nbsp;Actualizar Prueba Antigeno Cuantitativa</button>
                </div>
            </div>
        </div>                
    </form>
    </div>
    <div class="tab-pane p-20" id="messages" role="tabpanel">3</div>
</div>
<script>

document.getElementById("antigeno_resultado_input").value = "<?= $exam_data->antigeno_resultado?>";
document.getElementById("concentra_atig_input").value = "<?= $exam_data->concentra_atig?>";

</script>
<script src=<?= base_url().'application/JavaScript/prueba-antigeno-cuantitativa.js'?>></script>
