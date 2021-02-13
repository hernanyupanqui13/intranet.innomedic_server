<div class="row">
    <div class="col-md-12">
        <div class="text-right">
            <button type="button" id="imprimir_prueba_rapida" onclick="vistaPreviaImprimir('prueba-antigeno-imprimir', 'modal-body-imprimir', '<?=$this->uri->segment(4,0)?>')" class="btn btn-outline-dark btn btn-rounded btn-lg font-weight-bold"><i class=" fas fa-print"></i>&nbsp;Imprimir Prueba Antigeno</button>
       
        </div>
    </div>
</div>
<ul class="nav nav-tabs" role="tablist">
    <li class="nav-item"> <a class="nav-link active show" data-toggle="tab" href="#profile" role="tab" id="mostrar_prueba_rapida" aria-selected="true"><span class="hidden-sm-up"><i class="ti-user"></i></span> <span class="hidden-xs-down font-weight-bold">Prueba Antigeno</span></a> </li>
   <!-- <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#messages" role="tab"><span class="hidden-sm-up"><i class="ti-email"></i></span> <span class="hidden-xs-down">Messages</span></a> </li>-->
</ul>
<!-- Tab panes -->
<div class="tab-content tabcontent-border">

    <div class="tab-pane  p-20 active show" id="profile" role="tabpanel">
        <div class="card-header bg-info">
            <h4 class="m-b-0 text-white text-center">Prueba Antigeno</h4>
        </div>
        <form action="#" id="registrar_prueba_antigeno">
            <div class="row m-2">
                <div class="col-md-4">
                    <div class="form-group text-center">
                        <h3>ÁREA</h3>
                        <p><strong class="font-weight-bold">Muestra: </strong>&nbsp;Hisopado Nasofaringeo<br><strong class="font-weight-bold">Metodologia: </strong>Inmunocromatografía</p>

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
                    <div class="form-group resultado_grupo">
                        <label for="antigeno_resultado_input">Resultado:&nbsp;</label>
                        <select class="form-control" id="antigeno_resultado_input" name="antigeno_resultado">
                            <option value="" selected="" disabled="">-- Seleccione el Resultado --</option>
                            <option value="positivo">POSITIVO</option>
                            <option value="negativo">NEGATIVO</option>
                        </select>
                      </div>
                </div>
            </div>
            <br/>
            <br/>
            <br/>
            <div class="row">
                <div class="col-md-12">
                    <div class="table-responsive">
                        <table width="100%" class="table">
                            <thead>
                                <tr>
                                    <th class="FacetDataTD" width="20%"></td>
                                    <th class="FacetDataTD">Interpretacion clinica</td>
                                    <th class="FacetDataTD">Recomendaciones</td>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <th class="FacetDataTD" align="center" valign="top">Positivo</td>
                                    <td class="FacetDataTD">Posibilidad de estar en la fase ACTIVA de la enfermedad.</td>
                                    <td class="FacetDataTD">Aislamiento por 14 días e iniciar tratamientos si es el caso.</td>
                                </tr>
                                <tr>
                                    <th class="FacetDataTD" align="center" valign="top">Negativo</td>
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
                    <a href="javascript:void(0)" id="imprimir_prueba_rapida" onclick="vistaPreviaImprimir('prueba-antigeno-imprimir', 'modal-body-imprimir', '<?=$this->uri->segment(4,0)?>')" class="btn btn-danger btn-rounded btn-lg"><i class=" fas fa-print"></i>&nbsp;Imprimir</a>
                    <button type="submit" class="btn btn-info btn-rounded btn-lg" ><i class="fas fa-check-circle"></i>&nbsp;Actualizar Prueba Antigeno</button>
                </div>
                </div>
            </div>

        
        </form>
    </div>
    <div class="tab-pane p-20" id="messages" role="tabpanel">3</div>
</div>
<script>

document.getElementById("antigeno_resultado_input").value = "<?=$exam_data->antigeno_resultado?>"

</script>
<script src=<?= base_url().'application/JavaScript/prueba-antigeno.js'?>></script>
