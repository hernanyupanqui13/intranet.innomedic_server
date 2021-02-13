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

        }    
    } 
?>

        <div class="printableAreaprueba">
        <div class="container-fluid bg-white">
            <div class="row">
                <div class="col-md-12 m-2">
                    <table width="100%" align="center" class=""> 
                        <tbody><tr>
                            <td width="439" height="60" rowspan="2" align="left" valign="middle"><div class="headAll" data-titulo="" data-logo="1" data-pagi="" data-classid="for_inf" data-debug="1">

                            <table width="100%" align="center">
                                <tbody><tr class="FacetFilaTD">
                                    <td width="242" align="left" valign="middle" class="FacetDataTDM"><img src="<?php echo base_url().'assets/';?>images/logo.png?v=<?php echo rand(); ?>"><div class="line_head"></div></td>
                                    <td width="391" align="center" class="FacetDataTDM12">&nbsp;</td>
                                    <td width="95" align="left" class="FacetDataTDM12" valign="top">&nbsp;
                                    </td>
                                </tr>
                            </tbody></table>

                            </div></td>
                                        <td width="135" height="24" align="center" valign="middle" class="FacetDataTDM ">N° FICHA:</td>
                                        <td width="97" align="left" valign="middle" class="FacetDataTDM " ><?php echo $nro_ficha; ?></td>
                                    </tr>
                                    <tr>
                                        <td align="left" valign="middle" class="FacetDataTDM ">FECHA DE EVALUACIÓN:</td>
                                        <td align="left" valign="middle" class="FacetDataTDM " id="fecha_evaluacion-impr-slot"></td>
                                    </tr>
                                    <tr class="FacetFilaTD">
                                        <td height="3" colspan="3" align="left"></td>
                                    </tr>

                    </tbody>
                </table>
                </div>
                <br>
                <br>
                <!--aqui agregamos los datos_medinate un formlarios los diermas y los sello-->
                <div class="col-md-12 text-center">
                    <h4 class="font-weight-bold">RESULTADOS</h4>
                </div>
                <div class="col-md-12">
                    <div class="table-responsive">
                        <table width="100%" align="center" border="0" >
                                <tbody>
                                    <tr>
                                    <td width="118" align="left" >Apellidos y Nombres:</td>
                                    <td width="367" valign="middle" id="nombres_completos_paciente_paquet11"></td>
                                    <td width="35" height="15" align="left" >Edad:</td>
                                    <td width="50" align="left" id="edad_paquete1"></td>
                                    <td width="40" align="left" >Sexo:</td>
                                    <td width="49" id="sexo_paquete1"></td>
                                    </tr>
                                    <tr>
                                    <td align="left" id="wiw">Empresa:</td>
                                    <td id="empresa_paquete1"></td>
                                    <td height="16" align="left" valign="middle"  style="padding-left:8px">&nbsp;</td>
                                    <td align="left" style="padding-left:8px">&nbsp;</td>
                                    <td align="left" style="padding-left:8px">&nbsp;</td>
                                    <td valign="middle" style="padding-left:8px">&nbsp;</td>
                                    </tr>
                            </tbody>
                        </table>


                    </div>
                </div>

                <div class="col-md-12">

                    <div class="table-responsive">

                        <table width="100%" border="0" cellpadding="0" cellspacing="0">
                            <thead class="text-center">
                                <tr>
                                    <th><strong>ANÁLISIS</strong></th>
                                    <th><strong>RESULTADO</strong></th>
                                    <th><strong>UND.</strong></th>
                                    <th><strong>RANGO REFERENCIAL</strong></th>

                                </tr>

                            </thead>

                            <tbody class="p-2">
                                <tr>
                                    <td height="20" valign="middle" class="FacetDataTDM"><strong class="font-weight-bold">HEMOGRAMA COMPLETO</strong></td>
                                    <td height="20" align="center" valign="middle" class="FacetDataTDM">&nbsp;</td>
                                    <td height="20" align="center" valign="middle" class="FacetDataTDM">&nbsp;</td>
                                    <td height="20" colspan="2" align="center" valign="middle" class="FacetDataTDM">&nbsp;</td>
                                </tr>
                                <tr>
                                    <td height="20" valign="middle" class="FacetDataTDM">Recuento de Globulos Rojos</td>
                                    <td height="20" align="center" valign="middle" class="FacetDataTDM" id="eritrocisrc-impr-slot">5,160,000</td>
                                    <td height="20" align="center" valign="middle" class="FacetDataTDM">/mm<sup>3</sup></td>
                                    <td height="20" colspan="2" align="center" valign="middle" class="FacetDataTDM">3'800,000 - 5'800,000</td>
                                </tr>
                                                    
                                    
                                                <tr>
                                <td height="20" valign="middle" class="FacetDataTDM">Hemoglobina</td>
                                <td height="20" align="center" valign="middle" class="FacetDataTDM" id="hemoglobinarc-impr-slot"></td>
                                <td height="20" align="center" valign="middle" class="FacetDataTDM">g/dl</td>
                                <td height="20" colspan="2" align="center" valign="middle" class="FacetDataTDM">Hombres: 13.0 - 18.0 <br>Mujeres: 12.0 - 16.0 </td>
                                </tr>
                                                            <tr>
                                <td height="20" valign="middle" class="FacetDataTDM">Hematocrito</td>
                                <td height="20" align="center" valign="middle" class="FacetDataTDM" id="hematocritorc-impr-slot"></td>
                                <td height="20" align="center" valign="middle" class="FacetDataTDM">%</td>
                                <td height="20" colspan="2" align="center" valign="middle" class="FacetDataTDM">Hombres: 40 - 54 <br>
                                Mujeres: 35 - 47 </td>
                                </tr>
                                                
                                <tr>
                                <td height="20" valign="middle" class="FacetDataTDM">Leucocitos</td>
                                <td height="20" align="center" valign="middle" class="FacetDataTDM" id="copro_leuco-impr-slot"></td>
                                <td height="20" align="center" valign="middle" class="FacetDataTDM">/mm<sup>3</sup></td>
                                <td height="20" colspan="2" align="center" valign="middle" class="FacetDataTDM">Adulto: 4,500 - 10,000<br>
                    Niño: 8,000 - 11,000</td>
                                </tr>
                                <tr>
                                <td height="20" valign="middle" class="FacetDataTDM">Recuento de Plaquetas</td>
                                <td height="20" align="center" valign="middle" class="FacetDataTDM" id="plaquetas-impr-slot"></td>
                                <td height="20" align="center" valign="middle" class="FacetDataTDM">/mm<sup>3</sup></td>
                                <td height="20" colspan="2" align="center" valign="middle" class="FacetDataTDM">150,000 - 450,000</td>
                                </tr>
                                <tr>
                                <td height="20" colspan="5" valign="middle" class="FacetDataTDM11"><strong class="font-weight-bold">CONSTANTES CORPUSCULARES</strong></td>
                                </tr>
                                <tr>
                                <td height="20" valign="middle" class="FacetDataTDM">VCM</td>
                                <td height="20" align="center" valign="middle" class="FacetDataTDM" id="vcm-impr-slot"></td>
                                <td height="20" align="center" valign="middle" class="FacetDataTDM">fl</td>
                                <td height="20" colspan="2" align="center" valign="middle" class="FacetDataTDM">80 -97</td>
                                </tr>
                                <tr>
                                <td height="20" valign="middle" class="FacetDataTDM">HCM</td>
                                <td height="20" align="center" valign="middle" class="FacetDataTDM" id="hcm-impr-slot"></td>
                                <td height="20" align="center" valign="middle" class="FacetDataTDM">pg</td>
                                <td height="20" colspan="2" align="center" valign="middle" class="FacetDataTDM">27 - 32</td>
                                </tr>
                                <tr>
                                <td height="20" valign="middle" class="FacetDataTDM">CHCM</td>
                                <td height="20" align="center" valign="middle" class="FacetDataTDM" id="ccmh-impr-slot"></td>
                                <td height="20" align="center" valign="middle" class="FacetDataTDM">grHb/dl</td>
                                <td height="20" colspan="2" align="center" valign="middle" class="FacetDataTDM">30.0 - 35.0</td>
                                </tr>
                                <tr>
                                <td height="20" colspan="5" valign="middle" class="FacetDataTDM11"><strong class="font-weight-bold">FORMULA DIFERENCIAL PORCENTUAL</strong></td>
                                </tr>
                                <tr>
                                <td height="20" valign="middle" class="FacetDataTDM">Linfocitos</td>
                                <td height="20" align="center" valign="middle" class="FacetDataTDM" id="linfocitosrc-impr-slot"></td>
                                <td height="20" align="center" valign="middle" class="FacetDataTDM">%</td>
                                <td height="20" colspan="2" align="center" valign="middle" class="FacetDataTDM">25 - 40</td>
                                </tr>
                                <tr>
                                <td height="20" valign="middle" class="FacetDataTDM">Monocitos</td>
                                <td height="20" align="center" valign="middle" class="FacetDataTDM" id="monoticosrc-impr-slot">6</td>
                                <td height="20" align="center" valign="middle" class="FacetDataTDM">%</td>
                                <td height="20" colspan="2" align="center" valign="middle" class="FacetDataTDM">2 - 8</td>
                                </tr>
                                <tr>
                                <td height="20" valign="middle" class="FacetDataTDM">Eosinófilos</td>
                                <td height="20" align="center" valign="middle" class="FacetDataTDM" id="eosinofilosrc-impr-slot"></td>
                                <td height="20" align="center" valign="middle" class="FacetDataTDM">%</td>
                                <td height="20" colspan="2" align="center" valign="middle" class="FacetDataTDM">0 - 4</td>
                                </tr>

                                <tr>
                                <td height="20" valign="middle" class="FacetDataTDM">Basófilos</td>
                                <td height="20" align="center" valign="middle" class="FacetDataTDM" id="basofilosrc-impr-slot"></td>
                                <td height="20" align="center" valign="middle" class="FacetDataTDM">%</td>
                                <td height="20" colspan="2" align="center" valign="middle" class="FacetDataTDM">0 - 2</td>
                                </tr>
                                <tr>
                                <td height="20" valign="middle" class="FacetDataTDM">Segmentados</td>
                                <td height="20" align="center" valign="middle" class="FacetDataTDM" id="segmentadossrc-impr-slot"></td>
                                <td height="20" align="center" valign="middle" class="FacetDataTDM">%</td>
                                <td height="20" colspan="2" align="center" valign="middle" class="FacetDataTDM">55 - 65</td>
                                </tr>

                                <tr>
                                <td height="20" valign="middle" class="FacetDataTDM">Abastonados</td>
                                <td height="20" align="center" valign="middle" class="FacetDataTDM" id="abastonadossrc-impr-slot"></td>
                                <td height="20" align="center" valign="middle" class="FacetDataTDM">%</td>
                                <td height="20" colspan="2" align="center" valign="middle" class="FacetDataTDM">0 - 5</td>
                                </tr>
                                    
                                    
                                <tr>
                                <td height="20" colspan="5" valign="middle" class="FacetDataTDM11"><strong class="font-weight-bold">FORMULA DIFERENCIAL ABSOLUTA</strong></td>
                                </tr>
                                <tr>
                                <td height="20" valign="middle" class="FacetDataTDM">Linfocitos</td>
                                <td height="20" align="center" valign="middle" class="FacetDataTDM" id="linfocitos-impr-slot"></td>
                                <td height="20" align="center" valign="middle" class="FacetDataTDM">/mm<sup>3</sup></td>
                                <td height="20" colspan="2" align="center" valign="middle" class="FacetDataTDM">1,000 - 4,800</td>
                                </tr>
                                <tr>
                                <td height="20" valign="middle" class="FacetDataTDM">Monocitos</td>
                                <td height="20" align="center" valign="middle" class="FacetDataTDM" id="monocitos-impr-slot"></td>
                                <td height="20" align="center" valign="middle" class="FacetDataTDM">/mm<sup>3</sup></td>
                                <td height="20" colspan="2" align="center" valign="middle" class="FacetDataTDM">0 - 800</td>
                                </tr>
                                <tr>
                                <td height="20" valign="middle" class="FacetDataTDM">Eosinófilos</td>
                                <td height="20" align="center" valign="middle" class="FacetDataTDM" id="eosinofilos-impr-slot"></td>
                                <td height="20" align="center" valign="middle" class="FacetDataTDM">/mm<sup>3</sup></td>
                                <td height="20" colspan="2" align="center" valign="middle" class="FacetDataTDM">0 - 500</td>
                                </tr>


                                <!----------------------------------------------------------------------------------------------------->
                                <tr>
                                <td height="20" valign="middle" class="FacetDataTDM">Basófilos</td>
                                <td height="20" align="center" valign="middle" class="FacetDataTDM" id="basofilos-impr-slot"></td>
                                <td height="20" align="center" valign="middle" class="FacetDataTDM">/mm<sup>3</sup></td>
                                <td height="20" colspan="2" align="center" valign="middle" class="FacetDataTDM">0 - 200</td>
                                </tr>
                                <tr>
                                <td height="20" valign="middle" class="FacetDataTDM">Segmentados</td>
                                <td height="20" align="center" valign="middle" class="FacetDataTDM" id="segmentados-impr-slot"></td>
                                <td height="20" align="center" valign="middle" class="FacetDataTDM">/mm<sup>3</sup></td>
                                <td height="20" colspan="2" align="center" valign="middle" class="FacetDataTDM">1,600 - 7,000</td>
                                </tr>
                                <tr>
                                <td height="20" valign="middle" class="FacetDataTDM">Abastonados</td>
                                <td height="20" align="center" valign="middle" class="FacetDataTDM" id="abastonados-impr-slot"></td>
                                <td height="20" align="center" valign="middle" class="FacetDataTDM">/mm<sup>3</sup></td>
                                <td height="20" colspan="2" align="center" valign="middle" class="FacetDataTDM">0 - 500</td>
                                </tr>
                                                                        
                                
                        </tbody></table>
                        <br>
                        <p>Observacion: <span id="comentarios-impr-slot"></span></p>
                        <table width="100%" align="center" class="">
                            <tbody><tr>
                                <td width="96" align="left" valign="middle">&nbsp;</td>
                                <td width="216" height="57" align="center" valign="middle" class="FacetDataTDM lineabaja"><img src="<?php echo base_url().'upload/';?>firma/204.jpg" width="120" height="90"></td>
                                <td width="196" align="left" valign="middle">&nbsp;</td>
                                <td width="159" align="center" valign="bottom" class="FacetDataTDM lineabaja"><img src="<?php echo base_url().'upload/';?>firma/205.jpg" width="120" height="90"></td>
                                <td width="150" align="left" valign="middle">&nbsp;</td>
                            </tr>
                            <tr class="FacetFilaTD">
                                <td width="96" align="left" valign="middle">&nbsp;</td>
                                <td align="center" class="FacetDataTDM">Firma y Sello <br> De Médico Especialista <br> Ruiz Cotrina Jorge Martin <br> <strong>C.M.P. :</strong>040560 &nbsp; &nbsp;  &nbsp; &nbsp; <strong>R.N.E.:</strong>021633</td>
                                <td align="left" class="FacetDataTDM">&nbsp;</td>
                                <td align="center" valign="middle" class="FacetDataTDM ">Tecnólogo Médico <br> Artica Vicente Reynaldo Abdías <br> <strong>C.M.P. :</strong>10626 &nbsp; &nbsp;  &nbsp; &nbsp; </td>
                                <td width="150" align="left" valign="middle">&nbsp;</td>
                            </tr>
                            <tr class="FacetFilaTD">
                                <td colspan="4" align="left" class="FacetDataTDM" style="padding-left:30PX;">&nbsp;</td>
                            </tr>
                        </tbody></table>
                    </div>
                </div>
            </div>
            <!---de aqui abjo es bioquimica-->

            
        </div>
        <div class="agregamos_br"></div>
        <div class="container-fluid print">
            
            <div class="col-md-12">
                <div class="row ">
                    <div class="col-md-12">
                        <table width="100%" align="center" class="">
                            <tbody>
                                <tr>
                                    <td width="439" height="60" rowspan="2" align="left" valign="middle">
                                    <div class="headAll" data-titulo="" data-logo="1" data-pagi="" data-classid="for_inf" data-debug="3">
                                        <table width="100%" align="center">
                                            <tbody>
                                                <tr class="FacetFilaTD">
                                                <td width="242" align="left" valign="middle" class="FacetDataTDM">
                                                    <img src="<?php echo base_url().'assets/';?>images/logo.png?v=<?php echo rand(); ?>">
                                                    <div class="line_head"></div>
                                                </td>
                                                <td width="391" align="center" class="FacetDataTDM12">&nbsp;</td>
                                                <td width="95" align="left" class="FacetDataTDM12" valign="top">&nbsp;
                                                </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                    </td>
                                    <td width="135" height="24" align="center" valign="middle" class="FacetDataTDM ">N° FICHA:</td>
                                    <td width="97" align="left" valign="middle" class="FacetDataTDM "><?php echo $nro_ficha; ?></td>
                                </tr>
                                <tr>
                                    <td align="left" valign="middle" class="FacetDataTDM ">FECHA DE EVALUACIÓN:</td>
                                    <td align="left" valign="middle" class="FacetDataTDM " id="fecha_evaluacion-impr-slot"></td>
                                </tr>
                                <tr class="FacetFilaTD">
                                    <td height="3" colspan="3" align="left"></td>
                                </tr>
                            </tbody>
                        </table>
                        <div class="col-md-12 text-center">
                            <h4 class="font-weight-bold">RESULTADOS</h4>
                        </div>
                        <div class="col-md-12">
                            <div class="table-responsive">
                                <table width="100%" align="center" border="0" >
                                        <tbody>
                                            <tr>
                                            <td width="118" align="left" >Apellidos y Nombres:</td>
                                            <td width="367" valign="middle" id="nombres_completos_paciente_paquet12"></td>
                                            <td width="35" height="15" align="left" >Edad:</td>
                                            <td width="50" align="left" id="edad_paquete12"></td>
                                            <td width="40" align="left" >Sexo:</td>
                                            <td width="49" id="sexo_paquete12"></td>
                                            </tr>
                                            <tr>
                                            <td align="left" id="wiw12">Empresa:</td>
                                            <td id="empresa_paquete12"></td>
                                            <td height="16" align="left" valign="middle"  style="padding-left:8px">&nbsp;</td>
                                            <td align="left" style="padding-left:8px">&nbsp;</td>
                                            <td align="left" style="padding-left:8px">&nbsp;</td>
                                            <td valign="middle" style="padding-left:8px">&nbsp;</td>
                                            </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <?php if ($id_paquete=="1") {?>
                        <table width="100%" border="0" align="center">
                            <tbody>
                                <tr align="left">
                                    <td height="25" colspan="4" valign="middle" class="FacetDataTDM11"><strong class="font-weight-bold">GLUCOSA</strong></td>
                                </tr>
                                <br>
                                <tr>
                                    <td width="221" height="25" align="center" valign="middle" class="FacetDataTDM11"><strong class="font-weight-bold">ANÁLISIS</strong></td>
                                    <td width="112" height="18" align="center" valign="middle" class="FacetDataTDM11"><strong class="font-weight-bold">RESULTADO</strong></td>
                                    <td width="54" height="18" align="center" valign="middle" class="FacetDataTDM11 "><strong class="font-weight-bold">UND.</strong></td>
                                    <td width="152" align="center" valign="middle" class="FacetDataTDM11"><strong class="font-weight-bold">RANGO REFERENCIAL</strong></td>
                                </tr>
                                <br>
                                <tr>
                                    <td width="221" height="20" valign="middle" class="FacetDataTDM">GLUCOSA BASAL</td>
                                    <td width="112" height="20" align="center" valign="middle" class="FacetDataTDM" id="glucosa_paquete1"></td>
                                    <td width="54" height="20" align="center" valign="middle" class="FacetDataTDM">mg/dl</td>
                                    <td width="152" height="20" align="center" valign="middle" class="FacetDataTDM">70 - 110</td>
                                </tr>
                            </tbody>
                        </table>
                        <p>Observacion: <span id="obser_perfillipi_paquet2"></span></p>
                        <?php }else if ($id_paquete=="2") {?>
                            <table width="100%" border="0" align="center">
                                <tbody>
                                    <tr align="left">
                                        <td height="25" colspan="4" valign="middle" class="FacetDataTDM11"><strong class="font-weight-bold">Glucosa, Colesterol Total y Triglicéridos</strong></td>
                                    </tr>
                                    <br>
                                    <tr>
                                        <td width="221" height="25" align="center" valign="middle" class="FacetDataTDM11"><strong class="font-weight-bold">ANÁLISIS</strong></td>
                                        <td width="112" height="18" align="center" valign="middle" class="FacetDataTDM11"><strong class="font-weight-bold">RESULTADO</strong></td>
                                        <td width="54" height="18" align="center" valign="middle" class="FacetDataTDM11 "><strong class="font-weight-bold">UND.</strong></td>
                                        <td width="152" align="center" valign="middle" class="FacetDataTDM11"><strong class="font-weight-bold">RANGO REFERENCIAL</strong></td>
                                    </tr>
                                    <br>
                                    <tr>
                                        <td width="221" height="20" valign="middle" class="FacetDataTDM">GLUCOSA BASAL</td>
                                        <td width="112" height="20" align="center" valign="middle" class="FacetDataTDM" id="glucosa_paquete1"></td>
                                        <td width="54" height="20" align="center" valign="middle" class="FacetDataTDM">mg/dl</td>
                                        <td width="152" height="20" align="center" valign="middle" class="FacetDataTDM">70 - 110</td>
                                    </tr>
                                    <tr>
                                        <td width="221" height="12" valign="top" class="FacetDataTDM">COLESTEROL TOTAL</td>
                                        <td width="112" align="center" valign="top" class="FacetDataTDM" id="colesteroltotal-impr-slot"></td>
                                        <td width="54" align="center" valign="top" class="FacetDataTDM">mg/dl</td>
                                        <td width="152" align="center" valign="middle" class="FacetDataTDM">Normal: &lt;200<br>
                                        Limite Alto: 200 - 239<br>
                                        Alto: &gt;240
                                        </td>
                                    </tr>
                                    <tr>
                                        <td width="221" height="12" valign="top" class="FacetDataTDM">TRIGLICERIDOS</td>
                                        <td width="112" height="12" align="center" valign="top" class="FacetDataTDM" id="trigliceridos_paquete1"></td>
                                        <td width="54" height="12" align="center" valign="top" class="FacetDataTDM">mg/dl</td>
                                        <td width="152" height="12" align="center" valign="middle" class="FacetDataTDM">Normal: &lt;150<br>
                                        Limite Alto; 150 - 199<br>
                                        Alto: 200 - 499<br>
                                        Muy Alto: &gt;500
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                            <p>Observacion: <span id="obser_perfillipi_paquet2"></span></p>
                        <?php }else if ($id_paquete=="3") {?>
                            <table width="100%" border="0" align="center">
                                <tbody>
                                    <tr align="left">
                                        <td height="25" colspan="4" valign="middle" class="FacetDataTDM11"><strong class="font-weight-bold">BIOQUIMICA</strong></td>
                                    </tr>
                                    <br>
                                    <tr>
                                        <td width="221" height="25" align="center" valign="middle" class="FacetDataTDM11"><strong class="font-weight-bold">ANÁLISIS</strong></td>
                                        <td width="112" height="18" align="center" valign="middle" class="FacetDataTDM11"><strong class="font-weight-bold">RESULTADO</strong></td>
                                        <td width="54" height="18" align="center" valign="middle" class="FacetDataTDM11 "><strong class="font-weight-bold">UND.</strong></td>
                                        <td width="152" align="center" valign="middle" class="FacetDataTDM11"><strong class="font-weight-bold">RANGO REFERENCIAL</strong></td>
                                    </tr>
                                    <br>
                    
                                    <tr>
                                        <td width="221" height="20" valign="middle" class="FacetDataTDM">GLUCOSA BASAL</td>
                                        <td width="112" height="20" align="center" valign="middle" class="FacetDataTDM" id="glucosa_paquete1"></td>
                                        <td width="54" height="20" align="center" valign="middle" class="FacetDataTDM">mg/dl</td>
                                        <td width="152" height="20" align="center" valign="middle" class="FacetDataTDM">70 - 110</td>
                                    </tr>
                                    <tr>
                                        <td width="221" height="12" valign="top" class="FacetDataTDM">COLESTEROL TOTAL</td>
                                        <td width="112" align="center" valign="top" class="FacetDataTDM" id="colesteroltotal-impr-slot"></td>
                                        <td width="54" align="center" valign="top" class="FacetDataTDM">mg/dl</td>
                                        <td width="152" align="center" valign="middle" class="FacetDataTDM">Normal: &lt;200<br>
                                        Limite Alto: 200 - 239<br>
                                        Alto: &gt;240
                                        </td>
                                    </tr>
                                    <tr>
                                        <td width="221" height="12" valign="top" class="FacetDataTDM">TRIGLICERIDOS</td>
                                        <td width="112" height="12" align="center" valign="top" class="FacetDataTDM" id="trigliceridos_paquete1"></td>
                                        <td width="54" height="12" align="center" valign="top" class="FacetDataTDM">mg/dl</td>
                                        <td width="152" height="12" align="center" valign="middle" class="FacetDataTDM">Normal: &lt;150<br>
                                        Limite Alto; 150 - 199<br>
                                        Alto: 200 - 499<br>
                                        Muy Alto: &gt;500
                                        </td>
                                    </tr>

                                </tbody>
                            </table>
                            <table width="100%" border="0" align="center">
                                <tbody>
                                    <tr>
                                        <td width="221" align="center" valign="middle" class="FacetDataTDM11">&nbsp;</td>
                                        <td width="112" align="center" valign="middle" class="FacetDataTDM11">&nbsp;</td>
                                        <td width="54" align="center" valign="middle" class="FacetDataTDM11 ">&nbsp;</td>
                                        <td width="152" align="center" valign="middle" class="FacetDataTDM11">&nbsp;</td>
                                    </tr>
                                    <tr>
                                        <td width="221" height="25" align="center" valign="middle" class="FacetDataTDM11"><strong class="font-weight-bold">PERFIL HEPATICO</strong></td>
                                        <td width="112" height="18" align="center" valign="middle" class="FacetDataTDM11"><strong class="font-weight-bold">RESULTADO</strong></td>
                                        <td width="54" height="18" align="center" valign="middle" class="FacetDataTDM11 "><strong class="font-weight-bold">UND.</strong></td>
                                        <td width="152" align="center" valign="middle" class="FacetDataTDM11"><strong class="font-weight-bold">RANGO REFERENCIAL</strong></td>
                                    </tr>
                                    <tr>
                                        <td width="221" height="20" valign="middle" class="FacetDataTDM">PROTEINAS TOTALES</td>
                                        <td width="112" height="20" align="center" valign="middle" class="FacetDataTDM" id="prote_total_paquete2"></td>
                                        <td width="54" height="20" align="center" valign="middle" class="FacetDataTDM">mg/dl</td>
                                        <td width="152" height="20" align="center" valign="middle" class="FacetDataTDM">6.4 - 8.3</td>
                                    </tr>
                                    <tr>
                                        <td width="221" height="20" valign="middle" class="FacetDataTDM">ALBUMINA</td>
                                        <td width="112" height="20" align="center" valign="middle" class="FacetDataTDM" id="albumina_paquete2"></td>
                                        <td width="54" height="20" align="center" valign="middle" class="FacetDataTDM">mg/dl</td>
                                        <td width="152" height="20" align="center" valign="middle" class="FacetDataTDM">3.8 - 5.5</td>
                                    </tr>
                                    <tr>
                                        <td width="221" height="20" valign="middle" class="FacetDataTDM">GLOBULINA</td>
                                        <td width="112" height="20" align="center" valign="middle" class="FacetDataTDM" id="globulina_paquete2"></td>
                                        <td width="54" height="20" align="center" valign="middle" class="FacetDataTDM">mg/dl</td>
                                        <td width="152" height="20" align="center" valign="middle" class="FacetDataTDM">2.9 - 3.5</td>
                                    </tr>
                                    <tr>
                                        <td width="221" height="20" valign="middle" class="FacetDataTDM">RELACION Alb/Glob</td>
                                        <td width="112" height="20" align="center" valign="middle" class="FacetDataTDM" id="relacion_alb_paquete2"></td>
                                        <td width="54" height="20" align="center" valign="middle" class="FacetDataTDM">&nbsp;</td>
                                        <td width="152" height="20" align="center" valign="middle" class="FacetDataTDM">1.20 - 2.20</td>
                                    </tr>
                                    <tr>
                                        <td width="221" height="20" valign="middle" class="FacetDataTDM">BILIRRUBINA TOTAL</td>
                                        <td width="112" height="20" align="center" valign="middle" class="FacetDataTDM" id="bili_total_paquete2"></td>
                                        <td width="54" height="20" align="center" valign="middle" class="FacetDataTDM">mg/dl</td>
                                        <td width="152" height="20" align="center" valign="middle" class="FacetDataTDM">0.3 -1.4</td>
                                    </tr>
                                    <tr>
                                        <td width="221" height="20" valign="middle" class="FacetDataTDM">BILIRRUBINA DIRECTA</td>
                                        <td width="112" height="20" align="center" valign="middle" class="FacetDataTDM" id="bili_directa_paquete2"></td>
                                        <td width="54" height="20" align="center" valign="middle" class="FacetDataTDM">mg/dl</td>
                                        <td width="152" height="20" align="center" valign="middle" class="FacetDataTDM">Hasta 0.40</td>
                                    </tr>
                                    <tr>
                                        <td width="221" height="20" valign="middle" class="FacetDataTDM">BILIRRUBINA INDIRECTA</td>
                                        <td width="112" height="20" align="center" valign="middle" class="FacetDataTDM" id="bili_indirecta_paquete2"></td>
                                        <td width="54" height="20" align="center" valign="middle" class="FacetDataTDM">mg/dl</td>
                                        <td width="152" height="20" align="center" valign="middle" class="FacetDataTDM">Hasta 1.10</td>
                                    </tr>
                                    <tr>
                                        <td width="221" height="20" valign="top" class="FacetDataTDM">FOSFATASA ALCALINA</td>
                                        <td width="112" height="20" align="center" valign="top" class="FacetDataTDM" id="fosfatasa_paquete2"></td>
                                        <td width="54" height="20" align="center" valign="top" class="FacetDataTDM">U/L</td>
                                        <td width="152" height="20" align="center" valign="middle" class="FacetDataTDM">Hombres: &lt;270 U/L<br>
                                        Mujeres: &lt;240 U/L
                                        </td>
                                    </tr>
                                    <tr>
                                        <td width="221" height="20" valign="middle" class="FacetDataTDM">DESHIDROGENASA LACTICA (DHL)</td>
                                        <td width="112" height="20" align="center" valign="middle" class="FacetDataTDM" id="dhl_paquete2"></td>
                                        <td width="54" height="20" align="center" valign="middle" class="FacetDataTDM">U/L</td>
                                        <td width="152" height="20" align="center" valign="middle" class="FacetDataTDM">&lt; 300</td>
                                    </tr>
                                    <tr>
                                        <td width="221" height="18" valign="middle" class="FacetDataTDM">TRANSAMINASA OXALACETICO (TGO)</td>
                                        <td width="112" height="18" align="center" valign="middle" class="FacetDataTDM" id="tgo_paquete2"></td>
                                        <td width="54" height="18" align="center" valign="middle" class="FacetDataTDM">U/L</td>
                                        <td width="152" height="18" align="center" valign="middle" class="FacetDataTDM">&lt;40</td>
                                    </tr>
                                    <tr>
                                        <td width="221" height="20" valign="middle" class="FacetDataTDM">TRANSAMINASA PIRUVICA (TGP)</td>
                                        <td width="112" height="20" align="center" valign="middle" class="FacetDataTDM" id="tgp_paquete2"></td>
                                        <td width="54" height="20" align="center" valign="middle" class="FacetDataTDM">U/L</td>
                                        <td width="152" height="20" align="center" valign="middle" class="FacetDataTDM">Hombres: Hasta 45<br>
                                        Mujeres: Hasta 34
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                            <p>Observacion: <span id="obser_perfilhepa_paquete2"></span></p>
                        <?php }else{?>

                        <?php } ?>
                        

                        <table width="100%" align="center" class="" >
                            <tbody>
                                <tr>
                                    <td width="96" align="left" valign="middle">&nbsp;</td>
                                    <td width="216" height="57" align="center" valign="middle" class="FacetDataTDM lineabaja"><img src="<?php echo base_url().'upload/';?>firma/204.jpg" width="120" height="90"></td>
                                    <td width="196" align="left" valign="middle">&nbsp;</td>
                                    <td width="159" align="center" valign="bottom" class="FacetDataTDM lineabaja"><img src="<?php echo base_url().'upload/';?>firma/205.jpg" width="120" height="90"></td>
                                    <td width="150" align="left" valign="middle">&nbsp;</td>
                                </tr>
                                <tr class="FacetFilaTD">
                                    <td width="96" align="left" valign="middle">&nbsp;</td>
                                    <td align="center" class="FacetDataTDM">Firma y Sello <br> De Médico Especialista <br> Ruiz Cotrina Jorge Martin <br> <strong>C.M.P. :</strong>040560 &nbsp; &nbsp;  &nbsp; &nbsp; <strong>R.N.E.:</strong>021633</td>
                                    <td align="left" class="FacetDataTDM">&nbsp;</td>
                                    <td align="center" valign="middle" class="FacetDataTDM ">Tecnólogo Médico <br> Artica Vicente Reynaldo Abdías <br> <strong>C.M.P. :</strong>10626 &nbsp; &nbsp;  &nbsp; &nbsp; </td>
                                    <td width="150" align="left" valign="middle">&nbsp;</td>
                                </tr>
                                <tr class="FacetFilaTD">
                                    <td colspan="4" align="left" class="FacetDataTDM" style="padding-left:30PX;">&nbsp;</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        
        </div>