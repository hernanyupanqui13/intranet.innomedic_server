<div class="row">
    <div class="col-md-12">
        <div class="text-right">
            <button type="button" id="imprimir_prueba_molecular" onclick="vistaPreviaImprimir('prueba-molecular-imprimir', 'modal-body-imprimir', '<?=$this->uri->segment(4,0)?>')" class="btn btn-outline-dark btn btn-rounded btn-lg font-weight-bold"><i class=" fas fa-print"></i>&nbsp;Imprimir Prueba Molecular</button>
        
        </div>
    </div>
</div>
<ul class="nav nav-tabs" role="tablist">
    <li class="nav-item"> <a class="nav-link active show" data-toggle="tab" href="#profile" role="tab" id="mostrar_prueba_rapida" aria-selected="true"><span class="hidden-sm-up"><i class="ti-user"></i></span> <span class="hidden-xs-down font-weight-bold">Prueba Molecular</span></a> </li>
</ul>

<!-- Tab panel -->
<div class="tab-content tabcontent-border">
    <div class="tab-pane  p-20 active show" id="profile" role="tabpanel">
        <div class="card-header bg-info">
            <h4 class="m-b-0 text-white text-center">Prueba Molecular</h4>
        </div>
        <form id="registrar_prueba_molecular" enctype="multipart/form-data" method="post" accept-charset="utf-8" >
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
                <div class="form-group col-md-6 molecular_file_container">
                    <label for="molecular_file">Resultado Molecular (Archivo): </label>
                    <input type="file" name="userfile" size="20" id="test_input"/>
                </div>
                <div class="col-md-6 " style="align-self:center;">
                    <label for="antigeno_resultado_input">Resultado:&nbsp;</label>
                    <select class="form-select"  id="resultado_molecular" name="resultado_molecular">
                        <option value="" selected="" disabled="">-- Seleccione el Resultado --</option>
                        <option value="detectado">DETECTADO</option>
                        <option value="no detectado">NO DETECTADO</option>
                    </select>
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
                    <a href="javascript:void(0)" id="imprimir_prueba_molecular" onclick="vistaPreviaImprimir('prueba-molecular-imprimir', 'modal-body-imprimir', '<?=$this->uri->segment(4,0)?>')" class="btn btn-danger btn-rounded btn-lg"><i class=" fas fa-print"></i>&nbsp;Imprimir</a>
                    <button type="submit" class="btn btn-info btn-rounded btn-lg" ><i class="fas fa-check-circle"></i>&nbsp;Actualizar Prueba Molecular</button>
                    </div>
                </div>
            </div>                
        </form>
    </div>
    <div class="tab-pane p-20" id="messages" role="tabpanel">3</div>
</div>
<script src=<?= base_url().'application/JavaScript/prueba-molecular.js'?>></script>
