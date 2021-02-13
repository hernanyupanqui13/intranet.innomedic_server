<div class="row">
    <div class="col-md-12">
        <div class="text-right">
            <button type="button" id="imprimir_prueba_rapida" onclick="vistaPreviaImprimir('prueba-rapida-imprimir', 'modal-body-imprimir', '<?=$this->uri->segment(4,0)?>')" class="btn btn-outline-dark btn btn-rounded btn-lg font-weight-bold"><i class=" fas fa-print"></i>&nbsp;Imprimir Prueba Rapida</button>
        
        </div>
    </div>
</div>
<ul class="nav nav-tabs" role="tablist">
    <li class="nav-item"> <a class="nav-link active show" data-toggle="tab" href="#profile" role="tab" id="mostrar_prueba_rapida" aria-selected="true"><span class="hidden-sm-up"><i class="ti-user"></i></span> <span class="hidden-xs-down font-weight-bold">Prueba Rapida</span></a> </li>
</ul>
<!-- Tab panes -->
<div class="tab-content tabcontent-border">

    <div class="tab-pane  p-20 active show" id="profile" role="tabpanel">
        <div class="card-header bg-info">
            <h4 class="m-b-0 text-white text-center">Prueba Rapida</h4>
        </div>
        <form action="#" id="registrar_prueba_covid">
            <div class="row m-2">
                <div class="col-md-4">
                    <div class="form-group text-center">
                        <h3>ÁREA</h3>
                        <p><strong class="font-weight-bold">DETECCIÓN DE ANTICUERPOS -</strong>&nbsp;SARS-CoV-2. <br> <strong>Metodologia</strong> Inmunocromatografia</p>

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
                                    <th>Valores de Referencia</th>
                                </tr>
                            </thead>
                            <tbody class="text-center">
                                <tr>
                                    <td>Anticuerpo IgM-SARS-COV-2</td>
                                    <td>
                                        <select name="igm" id="igm" class="form-control">
                                            <option value="">--Seleccione--</option>
                                            <option value="REACTIVO">REACTIVO</option>
                                            <option value="NO REACTIVO">NO REACTIVO</option>
                                        </select>
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
                                        <select name="igg" id="igg" class="form-control">
                                            <option value="">--Seleccione--</option>
                                            <option value="REACTIVO">REACTIVO</option>
                                            <option value="NO REACTIVO">NO REACTIVO</option>
                                        </select>
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
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="text-center">
                        <input type="hidden" name="id_unico" id="id_unico">
                        <a href="javascript:void(0)" id="imprimir_prueba_rapida" onclick="vistaPreviaImprimir('prueba-rapida-cuanti-imprimir', 'modal-body-imprimir', '<?=$this->uri->segment(4,0)?>')" class="btn btn-danger btn-rounded btn-lg"><i class=" fas fa-print"></i>&nbsp;Imprimir</a>
                        <button type="submit" class="btn btn-info btn-rounded btn-lg" ><i class="fas fa-check-circle"></i>&nbsp;Actualizar Prueba Rápida</button>
                    </div>
                </div>
            </div>        
        </form>
    </div>
    <div class="tab-pane p-20" id="messages" role="tabpanel">3</div>
</div>
<script>
document.getElementById("igm").value="<?=$exam_data->igm?>";
document.getElementById("igg").value="<?= $exam_data->igg?>";
</script>

<script src=<?= base_url().'application/JavaScript/prueba_rapida-form.js'?>></script>

