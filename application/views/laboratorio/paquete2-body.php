<div class="row">
    <div class="col-md-12">
        <div class="text-right">
            <button type="button" id="imprimir_prueba_rapida" onclick="vistaPreviaImprimir('prueba-rapida-imprimir', 'modal-body-imprimir', '<?=$this->uri->segment(4,0)?>')" class="btn btn-outline-dark btn btn-rounded btn-lg font-weight-bold"><i class=" fas fa-print"></i>&nbsp;Imprimir Prueba Rapida</button>
            <button type="button" id="print_paquete1" onclick="vistaPreviaImprimir('paquete1-imprimir', 'modal-body-imprimir', '<?=$this->uri->segment(4,0)?>')" class="btn btn-outline-dark btn btn-rounded btn-lg font-weight-bold"><i class=" fas fa-print"></i>&nbsp;Imprimir Laboratorio</button>
        </div>
    </div>
</div>
<ul class="nav nav-tabs" role="tablist">
    <li class="nav-item"> <a class="nav-link active" data-toggle="tab" href="#home" role="tab"><span class="hidden-sm-up"><i class="ti-home"></i></span> <span class="hidden-xs-down font-weight-bold">Laboratorio</span></a> </li>
    <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#profile" role="tab"  id="mostrar_prueba_rapida"><span class="hidden-sm-up"><i class="ti-user"></i></span> <span class="hidden-xs-down font-weight-bold">Prueba Rapida</span></a> </li>
</ul>
<!-- Tab panes -->
<div class="tab-content tabcontent-border">
    <div class="tab-pane active p-20" id="home" role="tabpanel">
        <form action="#" method="POST" id="registrar_paquete_01">   
            <div class="card-header bg-info">
                <h4 class="m-b-0 text-white text-center">Hemograma (Hemoglobina Hematocrito) Y Glucosa</h4>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="table-responsive">
                        <table class="table"  cellspacing="0" cellpadding="0" style="padding: 0; margin: 0;">
                            <thead class="text-center">
                                <tr>
                                    <th>ANALISIS</th>
                                    <th>RESULTADO DE ANALISIS</th>
                                    <th>UNIDAD</th>
                                    <th>RANGO DE REFERENCIA</th>
                                    <th>FUERA DE RANGO</th>
                                </tr>
                            </thead>
                            <tbody class="text-left">
                                <tr>
                                    <td style="width: 25%;">RECUENTO DE GLOBULOS DE ROJOS</td>
                                    <td>
                                        <input name="eritrocisrc" type="text" class="form-control valoranormal" id="eritrocisrc" value="" size="10" onkeyup="ev_globrojo();calcvcm();calchcm();format(this);" onchange="format(this);" placeholder="0">
                                    </td>
                                    <td>/mm^3</td>
                                    <td>3'800,000 - 5'800,000</td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td style="width: 25%;">HEMOGLOBINA</td>
                                    <td>
                                        <input name="hemoglobinarc" type="text" class="form-control" id="hemoglobinarc" value="" size="10" onkeyup="ValidaRangosSexo(this, '13.00', '18.00', '12.00', '16.00');calchcm();calcchcm();" placeholder="0">
                                    </td>
                                    <td>g/dl</td>
                                    <td>Hombres: 13.00 - 18.00 <br>Mujeres: 12.00 - 16.00</td>
                                    <td class="text-center font-weight-bold">*</td>
                                </tr>
                                <tr>
                                    <td style="width: 25%;">HEMATOCRITO</td>
                                    <td>
                                        <input name="hematocritorc" type="text" class="form-control" id="hematocritorc" value="" size="10" onkeyup="ValidaRangosSexo(this, '40', '54', '35', '47');calcvcm();calcchcm();" placeholder="0">
                                    </td>
                                    <td>%</td>
                                    <td>Hombres: 40 - 54 <br>Mujeres: 35 - 47</td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td style="width: 25%;">LEUCOCITOS</td>
                                    <td>
                                        <input name="copro_leuco" type="text" class="form-control" id="copro_leuco" value="" size="10" onkeyup="ev_copro();" placeholder="0">
                                    </td>
                                    <td>/mm^3</td>
                                    <td>Adulto: 4,500 - 10,000 <br>Niño: 8,000 - 11,000</td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td style="width: 25%;">RECUENTO DE PLAQUETAS</td>
                                    <td style="width: 15%;">
                                        <input name="plaquetas" type="text" class="form-control" id="plaquetas" value="" size="10" onkeyup="ev_plaquetas();format(this);" onchange="format(this);" placeholder="0">
                                    </td>
                                    <td>/mm^3</td>
                                    <td>150,000 - 450,000</td>
                                    <td></td>
                                </tr>
                                <!--esto de constantes-->
                                <tr class="bg-dark">
                                    <td class="font-weight-bold text-white">CONSTANTES CORPUSCULARES</td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                </tr>
                                <!--hasta auqi-->
                            </tbody>

                        </table>
                        <table class="table" cellspacing="0" cellpadding="0">
                            <thead class="text-center">
                                <tr style="display: none;">
                                    <th>ANALISIS</th>
                                    <th>RESULTADO DE ANALISIS</th>
                                    <th>UNIDAD</th>
                                    <th>RANGO DE REFERENCIA</th>
                                    <th>FUERA DE RANGO</th>
                                </tr>
                            </thead>
                            
                            <tbody class="text-left">
                                <tr>
                                    <td style="width: 25%;">VCM</td>
                                    <td>
                                        <input name="vcm" type="text" class="form-control valorbajo" id="vcm" value="" size="10" onkeyup="ValidaRangos(this, '80', '97');" placeholder="0">
                                    </td>
                                    <td>fL</td>
                                    <td>80 - 97</td>
                                    <td class="text-center font-weight-bold">*</td>
                                    
                                </tr>
                                <tr>
                                    <td style="width: 25%;">HCM</td>
                                    <td style="width: 15%;">
                                        <input name="hcm" type="text" class="form-control" id="hcm" value="" size="10" onkeyup="ValidaRangos(this, '27.00', '32.00');" placeholder="0">
                                    </td>
                                    <td>pg</td>
                                    <td>27 - 32</td>
                                    <td class="text-center font-weight-bold">*</td>
                                </tr>
                                <tr>
                                    <td style="width: 25%;">CHCM</td>
                                    <td>
                                        <input name="ccmh" type="text" class="form-control" id="ccmh" value="" size="10" onkeyup="ValidaRangos(this, '30.00', '35.00');" placeholder="0">
                                    </td>
                                    <td>g/dl</td>
                                    <td>30.00 - 35.00</td>
                                    <td class="text-center font-weight-bold">*</td>
                                </tr>
                                <tr class="bg-dark">
                                    <td class="font-weight-bold text-white">FORMULA DIFERENCIAL PORCENTUAL</td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                </tr>

                            </tbody>
                        </table>
                        <table class="table" cellspacing="0" cellpadding="0">
                            <thead class="text-center">
                                <tr style="display: none;">
                                    <th>ANALISIS</th>
                                    <th>RESULTADO DE ANALISIS</th>
                                    <th>UNIDAD</th>
                                    <th>RANGO DE REFERENCIA</th>
                                    <th>FUERA DE RANGO</th>
                                </tr>
                            </thead>
                            
                            <tbody class="text-left">
                                <tr>
                                    <td style="width: 25%;">LINFOCITOS</td>
                                    <td>
                                        <input name="linfocitosrc" type="text" class="form-control" id="linfocitosrc" value="" size="10" onkeyup="ValidaRangos(this, '25.00', '40.00');calculo(this.value,'#linfocitos');" placeholder="0">
                                    </td>
                                    <td>%</td>
                                    <td>25 - 40 </td>
                                    <td class="text-center font-weight-bold"></td>
                                    
                                </tr>
                                <tr>
                                    <td style="width: 25%;">MONOCITOS</td>
                                    <td style="width: 15%;">
                                        <input name="monoticosrc" type="text" class="form-control" id="monoticosrc" value="" size="10" onkeyup="ValidaRangos(this, '2', '8');calculo(this.value,'#monocitos');" placeholder="0">
                                    </td>
                                    <td>%</td>
                                    <td>2 - 8</td>
                                    <td class="text-center font-weight-bold"></td>
                                </tr>
                                <tr>
                                    <td style="width: 25%;">EOSINOFILOS</td>
                                    <td>
                                        <input name="eosinofilosrc" type="text" class="form-control" id="eosinofilosrc" value="" size="10" onkeyup="ValidaRangos(this, '0', '4');calculo(this.value,'#eosinofilos');" placeholder="0">
                                    </td>
                                    <td>%</td>
                                    <td>0 - 4</td>
                                    <td class="text-center font-weight-bold"></td>
                                </tr>
                                <tr>
                                    <td style="width: 25%;">BASOFILOS</td>
                                    <td>
                                        <input name="basofilosrc" type="text" class="form-control" id="basofilosrc" value="" size="10" onkeyup="ValidaRangos(this, '0', '2');calculo(this.value,'#basofilos');" placeholder="0">
                                    </td>
                                    <td>%</td>
                                    <td>0 - 2</td>
                                    <td class="text-center font-weight-bold"></td>
                                </tr>
                                <tr>
                                    <td style="width: 25%;">SEGMENTADOS</td>
                                    <td>
                                        <input name="segmentadossrc" type="text" class="form-control valorbajo" id="segmentadossrc" value="" size="10" onkeyup="ValidaRangos(this, '55', '65');calculo(this.value,'#segmentados');" placeholder="0">
                                    </td>
                                    <td>%</td>
                                    <td>55- 65</td>
                                    <td class="text-center font-weight-bold"></td>
                                </tr>
                                <tr>
                                    <td style="width: 25%;">ABASTONADOS</td>
                                    <td>
                                        <input name="abastonadossrc" type="text" class="form-control" id="abastonadossrc" value="" size="10" onkeyup="ValidaRangos(this, '0', '5');calculo(this.value,'#abastonados');" placeholder="0">
                                    </td>
                                    <td>%</td>
                                    <td>0 - 5</td>
                                    <td class="text-center font-weight-bold"></td>
                                </tr>
                                <tr>
                                    <td class="font-weight-bold">ANORMAL</td>
                                    <td>
                                        <input type="checkbox" name="anormal_lab1" id="anormal_lab1" value="on" onclick="mostrarcampos1();">
                                    </td>
                                </tr>

                                <tr class="FacetFilaTD" id="tr_anom1" style="display: table-row;">
                                        <td height="26" class="FacetDataTD">METAMIELOCITOS</td>
                                    <td align="center"><input name="nuevocampo_1" type="text" class="form-control" id="nuevocampo_1-impr-slot" value="" size="10" onkeyup="ValidaRangos(this, '0', '0');calculo(this.value,'#nuevocampo_6');" placeholder="0"></td>
                                    <td align="center" class="FacetDataTD">%</td>
                                    <td align="center" class="FacetDataTD">0</td>
                                    <td align="center" class="FacetDataTD">&nbsp;</td>
                                </tr>
                                <tr class="FacetFilaTD" id="tr_anom2" style="display: table-row;">
                                    <td height="26" class="FacetDataTD">MIELOCITOS</td>
                                    <td align="center"><input name="nuevocampo_2" type="text" class="form-control" id="nuevocampo_2-impr-slot" value="" size="10" onkeyup="ValidaRangos(this, '0', '0');calculo(this.value,'#nuevocampo_7');" placeholder="0"></td>
                                    <td align="center" class="FacetDataTD">%</td>
                                    <td align="center" class="FacetDataTD">0</td>
                                    <td align="center" class="FacetDataTD">&nbsp;</td>
                                </tr>
                                <tr class="FacetFilaTD" id="tr_anom3" style="display: table-row;">
                                    <td height="26" class="FacetDataTD">PROMIELOCITOS</td>
                                    <td align="center"><input name="nuevocampo_3" type="text" class="form-control" id="nuevocampo_3-impr-slot" value="" size="10" onkeyup="ValidaRangos(this, '0', '0');calculo(this.value,'#nuevocampo_8');" placeholder="0"></td>
                                    <td align="center" class="FacetDataTD">%</td>
                                    <td align="center" class="FacetDataTD">0</td>
                                    <td align="center" class="FacetDataTD">&nbsp;</td>
                                </tr>
                                <tr class="FacetFilaTD" id="tr_anom4" style="display: table-row;">
                                    <td height="26" class="FacetDataTD">BLASTOS</td>
                                    <td align="center"><input name="nuevocampo_4" type="text" class="form-control" id="nuevocampo_4-impr-slot" value="" size="10" onkeyup="ValidaRangos(this, '0', '0');calculo(this.value,'#nuevocampo_9');" placeholder="0"></td>
                                    <td align="center" class="FacetDataTD">%</td>
                                    <td align="center" class="FacetDataTD">0</td>
                                    <td align="center" class="FacetDataTD">&nbsp;</td>
                                </tr>
                                <tr class="FacetFilaTD" id="tr_anom5" style="display: table-row;">
                                    <td height="26" class="FacetDataTD">LINFOCITOS FORMA VARIANTE</td>
                                    <td align="center"><input name="nuevocampo_5" type="text" class="form-control" id="nuevocampo_5-impr-slot" value="" size="10" onkeyup="ValidaRangos(this, '0', '0');calculo(this.value,'#nuevocampo_10');" placeholder="0"></td>
                                    <td align="center" class="FacetDataTD">%</td>
                                    <td align="center" class="FacetDataTD">0</td>
                                    <td align="center" class="FacetDataTD">&nbsp;</td>
                                </tr>
                                <tr class="FacetFilaTD">
                                    <td height="26" align="center" class="FacetDataTD"><strong>FORMULA DIFERENCIAL</strong></td>
                                    <td height="26" align="center"><strong>(Total: <label id="suma_formula" style="color: rgb(0, 0, 0);">100</label> %)</strong></td>
                                    <td height="26" class="FacetDataTD">&nbsp;</td>
                                    <td height="26" colspan="2" class="FacetDataTD">&nbsp;</td>

                                </tr>
                                <tr class="bg-dark">
                                    <td class="font-weight-bold text-white">
                                        FORMULA DIFERENCIAL ABSOLUTA
                                    </td>
                                    <td>
                                    
                                    </td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                </tr>

                            </tbody>
                        </table>

                        <table class="table" cellspacing="0" cellpadding="0">
                            <thead class="text-center">
                                <tr style="display: none;">
                                    <th>ANALISIS</th>
                                    <th>RESULTADO DE ANALISIS</th>
                                    <th>UNIDAD</th>
                                    <th>RANGO DE REFERENCIA</th>
                                    <th>FUERA DE RANGO</th>
                                </tr>
                            </thead>
                            
                            <tbody class="text-left">
                                <tr>
                                    <td style="width: 25%;">LINFOCITOS</td>
                                    <td>
                                        <input name="linfocitos" type="text" class="form-control FacetInput valorbajo" id="linfocitos" value="" size="10" onkeyup="ValidaRangos(this, '1000', '4800');format(this);" placeholder="0">
                                    </td>
                                    <td>/mm^3</td>
                                    <td>1,000 - 4,800</td>
                                    <td class="text-center font-weight-bold"></td>
                                    
                                </tr>
                                <tr>
                                    <td style="width: 25%;">MONOCITOS</td>
                                    <td style="width: 15%;">
                                        <input name="monocitos" type="text" class="form-control" id="monocitos" value="" size="10" onkeyup="ValidaRangos(this, '0', '800');" placeholder="0">
                                    </td>
                                    <td>/mm^3</td>
                                    <td>0 - 800</td>
                                    <td class="text-center font-weight-bold"></td>
                                </tr>
                                <tr>
                                    <td style="width: 25%;">EOSINOFILOS</td>
                                    <td>
                                        <input name="eosinofilos" type="text" class="form-control" id="eosinofilos" value="" size="10" onkeyup="ValidaRangos(this, '0', '500');" placeholder="0">
                                    </td>
                                    <td>/mm^3</td>
                                    <td>0 - 500</td>
                                    <td class="text-center font-weight-bold"></td>
                                </tr>
                                <tr>
                                    <td style="width: 25%;">BASOFILOS</td>
                                    <td>
                                        <input name="basofilos" type="text" class="form-control" id="basofilos" value="" size="10" onkeyup="ValidaRangos(this, '0', '200');" placeholder="0">
                                    </td>
                                    <td>/mm^3</td>
                                    <td>0 - 200</td>
                                    <td class="text-center font-weight-bold"></td>
                                </tr>
                                <tr>
                                    <td style="width: 25%;">SEGMENTADOS</td>
                                    <td>
                                        <input name="segmentados" type="text" class="form-control " id="segmentados" value="" size="10" onkeyup="ValidaRangos(this, '1600', '7000');format(this);" placeholder="0">
                                    </td><!--valorbajo-->
                                    <td>/mm^3</td>
                                    <td>1,600 - 7,000</td>
                                    <td class="text-center font-weight-bold"></td>
                                </tr>
                                <tr>
                                    <td style="width: 25%;">ABASTONADOS</td>
                                    <td>
                                        <input name="abastonados" type="text" class="form-control" id="abastonados" value="" size="10" onkeyup="ValidaRangos(this, '0', '500');" placeholder="0">
                                    </td>
                                    <td>/mm^3</td>
                                    <td>0 - 500</td>
                                    <td class="text-center font-weight-bold"></td>
                                </tr>
                                <tr>
                                    <td class="font-weight-bold">ANORMAL</td>
                                    <td>
                                        <input type="checkbox" name="anormal_lab2" id="anormal_lab2" value="on" onclick="mostrarcampos2();">
                                    </td>
                                </tr>
                                <tr class="FacetFilaTD" id="tr_anom6" style="display: table-row;">
                                        <td height="26" class=" FacetDataTD">METAMIELOCITOS</td>
                                        <td align="center"><input name="nuevocampo_6" type="text" class="form-control FacetInput" id="nuevocampo_6-impr-slot" value="" size="10" onkeyup="ValidaRangos(this, '0', '0');" placeholder="0"></td>
                                        <td align="center" class="FacetDataTD">/mm^3</td>
                                        <td align="center" class="FacetDataTD">0</td>
                                        <td align="center" class="FacetDataTD">&nbsp;</td>
                                    </tr>
                                    <tr class="FacetFilaTD" id="tr_anom7" style="display: table-row;">
                                        <td height="26" class="FacetDataTD">MIELOCITOS</td>
                                        <td align="center"><input name="nuevocampo_7" type="text" class=" form-control FacetInput" id="nuevocampo_7-impr-slot" value="" size="10" onkeyup="ValidaRangos(this, '0', '0');" placeholder="0"></td>
                                        <td align="center" class="FacetDataTD">/mm^3</td>
                                        <td align="center" class="FacetDataTD">0</td>
                                        <td align="center" class="FacetDataTD">&nbsp;</td>
                                    </tr>
                                    <tr class="FacetFilaTD" id="tr_anom8" style="display: table-row;">
                                        <td height="26" class="FacetDataTD">PROMIELOCITOS</td>
                                        <td align="center"><input name="nuevocampo_8" type="text" class="form-control FacetInput" id="nuevocampo_8-impr-slot" value="" size="10" onkeyup="ValidaRangos(this, '0', '0');" placeholder="0"></td>
                                        <td align="center" class="FacetDataTD">/mm^3</td>
                                        <td align="center" class="FacetDataTD">0</td>
                                        <td align="center" class="FacetDataTD">&nbsp;</td>
                                    </tr>
                                    <tr class="FacetFilaTD" id="tr_anom9" style="display: table-row;">
                                        <td height="26" class="FacetDataTD">BLASTOS</td>
                                        <td align="center"><input name="nuevocampo_9" type="text" class="form-control FacetInput" id="nuevocampo_9-impr-slot" value="" size="10" onkeyup="ValidaRangos(this, '0', '0');" placeholder="0"></td>
                                        <td align="center" class="FacetDataTD">/mm^3</td>
                                        <td align="center" class="FacetDataTD">0</td>
                                        <td align="center" class="FacetDataTD">&nbsp;</td>
                                    </tr>
                                    <tr class="FacetFilaTD" id="tr_anom10" style="display: table-row;">
                                        <td height="26" class="FacetDataTD">LINFOCITOS FORMA VARIANTE</td>
                                        <td align="center"><input name="nuevocampo_10" type="text" class="form-control FacetInput" id="nuevocampo_10-impr-slot" value="" size="10" onkeyup="ValidaRangos(this, '0', '0');" placeholder="0"></td>
                                        <td align="center" class="FacetDataTD">/mm^3</td>
                                        <td align="center" class="FacetDataTD">0</td>
                                        <td align="center" class="FacetDataTD">&nbsp;</td>
                                    </tr>

                                

                                
                            </tbody>
                        </table>
                        <label for="">OBSERVACIONES</label>
                        <textarea name="comentarios" cols="130" rows="4" class="form-control FacetTextarea" id="comentarios" placeholder="Ingrese Observaciones"></textarea>
                        <table class="table" cellpadding="0" cellspacing="0">
                            <tbody>
                                    <tr class="bg-dark">
                                    <td class="font-weight-bold text-white">GLUCOSA (BIOQUIMICA)</td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                </tr>
                            </tbody>
                            
                        </table>
                        <table class="table" cellspacing="0" cellpadding="0">
                            <thead class="text-center">
                                <tr>
                                    <th>ANALISIS</th>
                                    <th>RESULTADO DE ANALISIS</th>
                                    <th>UNIDAD</th>
                                    <th>RANGO DE REFERENCIA</th>
                                    <th>FUERA DE RANGO</th>
                                </tr>
                            </thead>
                            
                            <tbody class="text-center">
                                <tr >
                                    <td style="width: 25%;" class="text-left">GLUCOSA BASAL</td>
                                    <td>
                                        <input name="glucosa" type="text" class="form-control FacetInput" id="glucosa" value="" size="10" onkeyup="ValidaRangos(this, '70', '110');" placeholder="0">
                                    </td>
                                    <td>mg/dl</td>
                                    <td>70 - 110</td>
                                    <td class="text-center font-weight-bold"></td>
                                    
                                </tr>
                                <!--<tr align="center">
                                    <td height="26" colspan="5" class="FacetDataTD"><input type="checkbox" name="salto20" id=""salto20-impr-slot" class="" value="on"><strong>&nbsp;PERFIL LIPIDICO</strong>
                                    </td>
                                </tr>-->
                                <tr>
                                    <td class="text-left">COLESTEROL TOTAL</td>
                                    <td>
                                        <input name="colesteroltotal" type="text" class="form-control FacetInput" id="colesteroltotal" value="" size="10" onkeyup="ValidaRangos(this, '0', '199');calcldl();" placeholder="0">
                                    </td>
                                    <td>mg/dl</td>
                                    <td>Normal: &lt;200<br>
                                    Límite Alto: 200 - 239<br>
                                    Alto : &gt;240</td>
                                    <td>*</td>     
                                </tr>
                                <!--<tr>
                                    <td class="text-left">
                                        COLESTEROL HDL</td>
                                    <td>
                                        <input name="colesterolhdl" type="text" class="form-control FacetInput" id="colesterolhdl" value="" size="10" onkeyup="ValidaRangos(this, '35', '60');calcldl();" placeholder="0">
                                    </td>
                                    <td>mg/dl</td>
                                    <td>35 - 60</td>
                                    <td>*</td>
                                </tr>-->
                                <tr > 
                                    <td class="text-left">
                                        TRIGLICERIDOS</td>
                                    <td>
                                        <input name="trigliceridos" type="text" class="form-control FacetInput" id="trigliceridos" value="" size="10" onkeyup="ValidaRangos(this, '0', '149');calcldl();calcvld();" placeholder="0">
                                    </td>
                                    <td>
                                        mg/dl</td>
                                    <td >Normal: &lt;150<br>
                                        Límite Alto: 150 - 199<br>
                                        Alto: 200 - 499<br>
                                        Muy Alto: &gt; 500
                                    </td>
                                    <td align="center" class="FacetDataTD">&nbsp;</td>
                                </tr>
                                <!-- <tr>
                                    <td class="text-left">COLESTEROL LDL</td>
                                    <td align="center">
                                        <input name="colesterolldl" type="text" class="form-control FacetInput" id="colesterolldl" value="" size="10" onkeyup="ValidaRangos(this, '0', '149');" placeholder="0">
                                    </td>
                                    <td>mg/dl</td>
                                    <td>&lt;150</td>
                                    <td>&nbsp;</td>
                                </tr>
                                <tr>
                                    <td class="text-left">COLESTEROL VLDL</td>
                                    <td align="center"><input name="colesterolvldl" type="text" class="form-control FacetInput" id="colesterolvldl" value="" size="10" onkeyup="ValidaRangos(this, '5', '40');" placeholder="0"></td>
                                    <td>mg/dl</td>
                                    <td>5 - 40</td>
                                    <td>&nbsp;</td>
                                </tr>-->
                                                                    

                            </tbody>
                        </table>
                        <div class="form-group">
                            <label for="">Observación</label>
                            <textarea name="obser_perfillipi" cols="130" rows="4" class="form-control FacetTextarea" id="obser_perfillipi" placeholder="Ingrese Obserrvación....."></textarea>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="text-center">
                    <input type="hidden" name="id_registrar_id_laboraortoio_paquete_1" id="id_registrar_id_laboraortoio_paquete_1" value="">
                    <a href="javascript:void(0)" onclick="return cancelar_fijo_id_tipoexamen()" class="btn btn-danger btn-rounded btn-lg"><i class="fas fa-times-circle"></i>&nbsp;Cancelar</a>
                    <button type="submit" class="btn btn-info btn-rounded btn-lg" id="cambio_nomre_paquete_asoaciado_escudero"><i class="fas fa-check-circle"></i>&nbsp;Actualizar Información</button>
                    </div>
                </div>
                </div>
        </form>
    </div>
    <div class="tab-pane  p-20" id="profile" role="tabpanel">
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
                <a href="javascript:void(0)" id="imprimir_prueba_rapida" class="btn btn-danger btn-rounded btn-lg"><i class=" fas fa-print"></i>&nbsp;Imprimir</a>
                <button type="submit" class="btn btn-info btn-rounded btn-lg" ><i class="fas fa-check-circle"></i>&nbsp;Actualizar Prueba Rápida</button>
                </div>
            </div>
            </div>
        
    </form>
    </div>
    <div class="tab-pane p-20" id="messages" role="tabpanel">3</div>
</div>