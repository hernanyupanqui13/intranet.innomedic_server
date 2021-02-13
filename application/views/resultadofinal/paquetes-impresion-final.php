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
        }else{
                redirect(base_url().'Examenes/Ordenes/');
            } ?>



<a href="javascript:void(0);" onclick="impirmir('<?php echo $nombres_completos; ?>');" id="eva" class="btn btn-outline-dark" ><strong>Imprimir Información</strong></a> <!--id="print"-->

<div class="printableArea">
  <div class="container bg-white ">
      <div class="row">
          <div class="col-md-12 m-2">
              <img src="<?php echo base_url().'assets/';?>images/logo.png?v=<?php echo rand(); ?>" alt="">
          </div>
          <br>
          <br>
          <br>
          <br>
          <br>
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
                                  <span class="font-weight-bold" id="igm-impr-slot"></span>
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
                                  <span class="font-weight-bold" id="igg-impr-slot"></span>
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
          <!--aqui agregamos los datos_medinate un formlarios los diermas y los sello-->
          <div class="col-md-12">
              <div class="table-responsive">
                  <table border="0" width="100%" class="text-center" >
                      <thead class="text-center" >
                          <tr class="text-center p-5 m-5">
                              <th> 
                                  <div class="col-md-6 text-center m-4 p-4">
                                    <p><span><img class="img-fluid"  src="<?php echo base_url().'upload/';?>firma/720.jpg?ver=<?php echo rand(); ?>" alt=""></span><br>
                                    <small>Firma y Sello<br>
                                      RUIZ COTRINA JORGE MARTIN<br>
                                      Patólogo Clínico<br>
                                      <strong>C.M.P. :</strong>40503   </small>     
                                      </p>
                                  </div>
                              </th>
                              <th> 
                                  <div class="col-md-6 text-center ">
                                    <p><span><img class="img-fluid "  src="<?php echo base_url().'upload/';?>firma/721.jpg?ver=<?php echo rand(); ?>" alt=""></span><br><small>
                                          Firma y Sello<br>
  Ruiz Cotrina Jorge Martin<br>
  Patólogo Clínico<br>
  <strong>C.M.P. :</strong>040560   <strong>R.N.E.:</strong>021633
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

  <div class="saltopagina"></div>
  
  

  <!--laborartorio-->
  <div class="container bg-white ">
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
  <div class="saltopagina"></div>
  <div class="agregamos_br"></div>
  <div class="container ">
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

  <div class="saltopagina"></div>
  <!--rayos x-->
  <div class="container">
     <table width="950" align="center" cellpadding="00" cellspacing="0">
        <tbody>
           <tr>
              <td height="60" align="left">
                 <div class="headAll" data-titulo="" data-logo="1" data-pagi="" data-classid="for_inf" data-debug="1">
                    <table width="100%" align="center">
                       <tbody>
                          <tr class="FacetFilaTD">
                             <td width="242" align="left" valign="middle" class="FacetDataTDM">
                                <img src="
                                   <?php echo base_url().'assets/';?>images/logo.png?v=
                                   <?php echo rand(); ?>" alt="">
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
           </tr>
           <tr>
              <td class="FacetDataTDM14" align="center" style="padding-bottom:5px;">
                 <strong class="font-weight-bold">LECTURA DE RADIOGRAFÍA DE TÓRAX UTILIZANDO LA CLASIFICACIÓN INTERNACIONAL  DE LA OIT  DE RADIOGRAFÍAS DE NEUMOCONIOSIS</strong>
              </td>
           </tr>
           <tr>
              <td>
                 <table width="950" align="left" cellpadding="0" cellspacing="0" class="" border="1">
                    <tbody>
                       <tr class="FacetFilaTD">
                          <td align="left" valign="bottom" class="FacetDataTDM11"></td>
                          <td align="left" valign="bottom" class="FacetDataTDM11"></td>
                          <td align="left" valign="bottom" class="FacetDataTDM11"></td>
                          <td align="left" valign="bottom" class="FacetDataTDM11"></td>
                          <td align="left" valign="bottom" class="FacetDataTDM11"></td>
                          <td align="left" valign="bottom" class="FacetDataTDM11"></td>
                          <td align="left" valign="bottom" class="FacetDataTDM11"></td>
                          <td colspan="2" align="left" valign="bottom" class="FacetDataTDM11"></td>
                          <td width="43" align="left" valign="bottom" class="FacetDataTDM11"></td>
                       </tr>
                       <tr class="FacetFilaTD">
                          <td width="64" class="FacetlineTDM11" style="padding-left:5px">
                             <strong>HCL</strong>
                          </td>
                          <td width="175" class="FacetlineTDM11" style="padding-left:5px"><?php echo $dni; ?></td>
                          <td width="91" class="FacetlineTDM11" height="20" style="padding-left:5px;border-right:1px solid white;">
                             <!--<strong>PLACA N°</strong>-->
                          </td>
                          <td colspan="3" align="center" class="FacetlineTDM11"></td>
                          <td width="50" class="FacetlineTDM11" style="padding-left:5px">
                             <strong>Lector</strong>
                          </td>
                          <td colspan="3" class="FacetlineTDM11">Espinal Bravo Percy Alfredo </td>
                       </tr>
                       <tr class="FacetFilaTD">
                          <td class="FacetlineTDM11" height="20" style="padding-left:5px">
                             <strong>Nombre</strong>
                          </td>
                          <td colspan="6" class="FacetlineTDM11" style="padding-left:5px"><?php echo $nombres_completos; ?></td>
                          <td class="FacetlineTDM11" style="padding-left:5px">
                             <strong>Edad</strong>
                          </td>
                          <td colspan="2" align="center" class="FacetlineTDM11"><?php echo $edad; ?></td>
                       </tr>
                       <tr class="FacetFilaTD">
                          <td height="20" rowspan="2" align="left" valign="middle" class="FacetlineTDM11 " style="padding-left:5px">
                             <strong>Fecha de lectura</strong>
                          </td>
                          <td align="center" valign="bottom" class="FacetlineTDM11" id="diasx"></td>
                          <td align="center" valign="bottom" class="FacetlineTDM11" id="mesx"></td>
                          <td align="center" valign="bottom" class="FacetlineTDM11" id="anox"></td>
                          <td rowspan="2" align="left" valign="bottom" class="FacetlineTDM11">&nbsp;</td>
                          <td colspan="2" rowspan="2" align="center" valign="middle" class="FacetlineTDM11">
                             <strong>Fecha de radiografía</strong>
                          </td>
                          <td align="center" valign="bottom" class="FacetlineTDM11" id="diasx_rad"></td>
                          <td align="center" valign="bottom" class="FacetlineTDM11" id="mesx_rad"></td>
                          <td align="center" valign="bottom" class="FacetlineTDM11" id="anox_rad"></td>
                       </tr>
                       <tr class="FacetFilaTD">
                          <td width="42" align="center" valign="bottom" class="FacetlineTDM11">Dia</td>
                          <td width="44" align="center" valign="bottom" class="FacetlineTDM11">Mes</td>
                          <td width="48" align="center" valign="bottom" class="FacetlineTDM11">Año</td>
                          <td width="43" align="center" valign="bottom" class="FacetlineTDM11">Dia</td>
                          <td width="43" align="center" valign="bottom" class="FacetlineTDM11">Mes</td>
                          <td align="center" valign="bottom" class="FacetlineTDM11">Año</td>
                       </tr>
                    </tbody>
                 </table>
              </td>
           </tr>
           <tr>
              <td>
                 <table width="950" cellpadding="0" cellspacing="0" border="1">
                    <tbody>
                       <tr>
                          <td width="170" rowspan="4" valign="middle" bgcolor="#999999" class="FacetlineTDM11 NoBorderTop" style="padding-left:5px;color: #ffffff;">
                             <strong>I. Calidad 
                             <br>Radiográfica
                             </strong>
                          </td>
                          <td width="16" height="20" align="center" class="FacetlineTDM11 NoBorderTop">
                             <strong>1</strong>
                          </td>
                          <td width="80" align="left" class="FacetlineTDM11 NoBorderTop" height="15" style="padding-left:5px">Buena</td>
                          <td width="27" align="center" class="FacetlineTDM11 NoBorderTop" id="calid_01">&nbsp;</td>
                          <td width="87" rowspan="4" align="center" valign="middle" class="FacetlineTDM11 NoBorderTop">
                             <strong>Causas</strong>
                          </td>
                          <td width="21" align="center" class="FacetlineTDM11 NoBorderTop">1</td>
                          <td width="119" align="left" class="FacetlineTDM11 NoBorderTop" style="padding-left:5px">Sobreexposición</td>
                          <td width="27" align="center" class="FacetlineTDM11 NoBorderTop" id="cauradio_01">&nbsp;</td>
                          <td width="13" align="center" class="FacetlineTDM11 NoBorderTop">5</td>
                          <td width="90" align="left" class="FacetlineTDM11 NoBorderTop" style="padding-left:5px">Escapulas</td>
                          <td width="35" align="center" class="FacetlineTDM11 NoBorderTop" id="cauradio_05">&nbsp;</td>
                       </tr>
                       <tr>
                          <td width="16" height="20" align="center" class="FacetlineTDM11">
                             <strong>2</strong>
                          </td>
                          <td width="80" align="left" class="FacetlineTDM11" height="15" style="padding-left:5px">Aceptable</td>
                          <td width="27" align="center" class="FacetlineTDM11" id="calid_02">
                          </td>
                          <td width="21" align="center" class="FacetlineTDM11">2</td>
                          <td width="119" align="left" class="FacetlineTDM11" style="padding-left:5px">Subexposición</td>
                          <td width="27" align="center" class="FacetlineTDM11" id="cauradio_02">&nbsp;</td>
                          <td width="13" align="center" class="FacetlineTDM11">6</td>
                          <td width="90" align="left" class="FacetlineTDM11" style="padding-left:5px">Artefacto</td>
                          <td width="35" align="center" class="FacetlineTDM11" id="cauradio_06">&nbsp;</td>
                       </tr>
                       <tr>
                          <td width="16" height="20" align="center" class="FacetlineTDM11">
                             <strong>3</strong>
                          </td>
                          <td width="80" align="left" class="FacetlineTDM11" height="15" style="padding-left:5px">Baja Calidad</td>
                          <td width="27" align="center" class="FacetlineTDM11" id="calid_03">&nbsp;</td>
                          <td width="21" align="center" class="FacetlineTDM11">3</td>
                          <td width="119" align="left" class="FacetlineTDM11" style="padding-left:5px">Posición centrado</td>
                          <td width="27" align="center" class="FacetlineTDM11" id="cauradio_03">
                          </td>
                          <td width="13" align="center" class="FacetlineTDM11">7</td>
                          <td width="90" align="left" class="FacetlineTDM11" style="padding-left:5px">Otros</td>
                          <td width="35" align="center" class="FacetlineTDM11" id="cauradio_07">&nbsp;</td>
                       </tr>
                       <tr>
                          <td width="16" height="20" align="center" class="FacetlineTDM11">
                             <strong>4</strong>
                          </td>
                          <td width="80" align="left" class="FacetlineTDM11" height="15" style="padding-left:5px">Inaceptable</td>
                          <td width="27" align="center" class="FacetlineTDM11" id="calid_04">&nbsp;</td>
                          <td width="21" align="center" class="FacetlineTDM11">4</td>
                          <td width="119" align="left" class="FacetlineTDM11" style="padding-left:5px">Inspiración Insuficiente</td>
                          <td width="27" align="center" class="FacetlineTDM11" id="cauradio_04">&nbsp;</td>
                          <td width="13" align="center" class="FacetlineTDM11">&nbsp;</td>
                          <td width="90" align="left" class="FacetlineTDM11">&nbsp;</td>
                          <td width="35" align="center" class="FacetlineTDM11">&nbsp;</td>
                       </tr>
                       <tr>
                          <td align="left" class="FacetlineTDM11" colspan="2" style="padding-left:5px">Comentario sobre 
                             <br>defectos Técnicos
                          </td>
                          <td colspan="9" align="left" valign="top" class="FacetlineTDM11" id="antecedentes_id">&nbsp; </td>
                       </tr>
                    </tbody>
                 </table>
              </td>
           </tr>
           <tr>
              <td>
                 <table width="950" cellpadding="0" cellspacing="0" border="1">
                    <tbody>
                       <tr>
                          <td height="20" colspan="13" align="left" class="FacetlineTDM11 NoBorderTop" style="padding-left:5px;color: #ffffff;" bgcolor="#999999">
                             <strong>II.ANORMALIDADES PARENQUIMATOSAS </strong>(si NO hay anormalidades  pase a III A.Pleurales)
                          </td>
                       </tr>
                       <tr>
                          <td colspan="3" align="left" class="FacetlineTDM11" style="padding-left:5px">
                             <strong>2.1. Zonas Afectadas</strong> (marque TODAS las zonas afectadas)
                          </td>
                          <td colspan="3" align="left" class="FacetlineTDM11" style="padding-left:5px">
                             <strong>2.2. Profusión (opacidad pequeñas)(escala de 12 puntos)</strong> (Consulte las radiografías estándar; marque la subcategoría)
                          </td>
                          <td colspan="4" align="left" class="FacetlineTDM11" style="padding-left:5px">
                             <strong>2.3. Forma  y Tamaño</strong> (Consulte las radiografías estándar; se requieren dos simbolos; marque un primario y en secundario)
                          </td>
                          <td colspan="3" align="left" class="FacetlineTDM11" style="padding-left:5px">
                             <strong>2.4. Opacidades Grandes</strong> (Marque 0 si no hay ninguna o marque A, B o C)
                          </td>
                       </tr>
                       <tr>
                          <td width="60" height="25" align="left" class="FacetlineTDM11">&nbsp;</td>
                          <td width="32" align="center" class="FacetlineTDM11">
                             <strong>Der.</strong>
                          </td>
                          <td width="30" align="center" class="FacetlineTDM11">
                             <strong>Izq.</strong>
                          </td>
                          <td width="67" align="center" class="FacetlineTDM11" id="id_o">0/- </td>
                          <td width="58" align="center" class="FacetlineTDM11" id="id_00">0/0 </td>
                          <td width="72" align="center" class="FacetlineTDM11" id="id_01">0/1 </td>
                          <td align="center" class="FacetlineTDM11" colspan="2">Primaria</td>
                          <td align="center" class="FacetlineTDM11" colspan="2">Secundaria</td>
                          <td width="40" align="center" class="FacetDataTDM11">&nbsp;</td>
                          <td width="43" align="center" class="FacetlineTDM11" id="opacig_O">O</td>
                          <td width="29" align="center" class="FacetlineTD NoBorderBottom">&nbsp;</td>
                       </tr>
                       <tr>
                          <td height="25" align="center" class="FacetlineTDM11">
                             <strong>Superior</strong>
                          </td>
                          <td align="center" class="FacetlineTDM11" id="suder01">&nbsp;</td>
                          <td align="center" class="FacetlineTDM11" id="suizq01">&nbsp;</td>
                          <td align="center" class="FacetlineTDM11" id="id_10">1/0 </td>
                          <td align="center" class="FacetlineTDM11" id="id_11">1/1 </td>
                          <td align="center" class="FacetlineTDM11" id="id_12">1/2 </td>
                          <td width="48" align="center" class="FacetlineTDM11" id="pepe_01">p </td>
                          <td width="43" align="center" class="FacetlineTDM11" id="pepe_04">s </td>
                          <td width="40" align="center" class="FacetlineTDM11" id="sepe_01">p </td>
                          <td width="43" align="center" class="FacetlineTDM11" id="sepe_04">s </td>
                          <td align="center" class="FacetDataTDM11"></td>
                          <td align="center" class="FacetlineTDM11" id="opacig_A">A</td>
                          <td align="center" class="FacetlineTD NoBorderTopBottom">&nbsp;</td>
                       </tr>
                       <tr>
                          <td height="25" align="center" class="FacetlineTDM11">
                             <strong>Medio</strong>
                          </td>
                          <td align="center" class="FacetlineTDM11" id="meder01">&nbsp;</td>
                          <td align="center" class="FacetlineTDM11" id="meizq01">&nbsp;</td>
                          <td align="center" class="FacetlineTDM11" id="id_21">2/1</td>
                          <td align="center" class="FacetlineTDM11" id="id_22">2/2 </td>
                          <td align="center" class="FacetlineTDM11" id="id_23">2/3 </td>
                          <td align="center" class="FacetlineTDM11" id="pepe_02">q </td>
                          <td align="center" class="FacetlineTDM11" id="pepe_05">t </td>
                          <td align="center" class="FacetlineTDM11" id="sepe_02">q </td>
                          <td align="center" class="FacetlineTDM11" id="sepe05">t </td>
                          <td align="center" class="FacetDataTDM11">&nbsp;</td>
                          <td align="center" class="FacetlineTDM11" id="opacig_B">B</td>
                          <td align="center" class="FacetlineTD NoBorderTopBottom">&nbsp;</td>
                       </tr>
                       <tr>
                          <td height="25" align="center" class="FacetlineTDM11">
                             <strong>Inferior</strong>
                          </td>
                          <td align="center" class="FacetlineTDM11" id="infder_01">&nbsp;</td>
                          <td align="center" class="FacetlineTDM11" id="infizq01">&nbsp;</td>
                          <td align="center" class="FacetlineTDM11" id="id_32">3/2 </td>
                          <td align="center" class="FacetlineTDM11" id="id_33">3/3 </td>
                          <td align="center" class="FacetlineTDM11" id="id_333">3/+ </td>
                          <td align="center" class="FacetlineTDM11" id="pepe_03">r </td>
                          <td align="center" class="FacetlineTDM11" id="pepe_06">u </td>
                          <td align="center" class="FacetlineTDM11" id="sepe_03">r </td>
                          <td align="center" class="FacetlineTDM11" id="sepe_06">u </td>
                          <td align="center" class="FacetlineTDM11">&nbsp;</td>
                          <td align="center" class="FacetlineTDM11" id="opacig_C">C</td>
                          <td align="center" class="FacetlineTD NoBorderTop">&nbsp;</td>
                       </tr>
                    </tbody>
                 </table>
              </td>
           </tr>
           <tr>
              <td>
                 <table width="950" cellpadding="0" cellspacing="0" border="1">
                    <tbody>
                       <tr>
                          <td height="20" colspan="10" align="left" class="FacetlineTDM11 NoBorderTop" style="padding-left:5px;color: #FFF; " bgcolor="#999999">
                             <strong>III.ANORMALIDADES PLEURALES </strong>(si NO hay anormalidades pase a símbolos)
                          </td>
                          <td width="27" align="center" class="FacetlineTDM11 NoBorderTop">
                             <strong>SI</strong>
                          </td>
                          <td width="39" align="center" class="FacetlineTDM11 NoBorderTop" id="anopleu_SI">
                             &nbsp;
                          </td>
                          <td width="36" align="center" class="FacetlineTDM11 NoBorderTop">
                             <strong>NO</strong>
                          </td>
                          <td width="43" align="center" class="FacetlineTDM11 NoBorderTop" id="anopleu_NO">
                          </td>
                       </tr>
                       <tr>
                          <td colspan="14" align="left" class="FacetlineTDM11" height="20" style="padding-left:5px">
                             <strong>3.1 Placas Pleurales </strong>(0=Ninguna, D=Hemitórax derecho; I=Hemitórax izquierdo)
                          </td>
                       </tr>
                    </tbody>
                 </table>
              </td>
           </tr>
           <tr>
              <td>
                 <table width="950" cellpadding="0" cellspacing="0" border="1">
                    <tbody>
                       <tr>
                          <td colspan="4" rowspan="5" align="left" class="FacetlineTDM11 NoBorderTop" style="padding-left:5px">
                             <strong>Sitio </strong>
                             <br>
                             (Marque)   las casillas
                             <br> adecuadas
                          </td>
                          <td align="left" class="FacetlineTDM11 NoBorderTop" rowspan="5" colspan="3" style="padding-left:5px" bgcolor="#CCCCCC">
                             <strong>Calcificación </strong>(marque)
                          </td>
                          <td align="left" class="FacetlineTDM11 NoBorderTop" colspan="7" style="padding-left:5px">Extensión (pared Toracica; combinada para placas de perfil y de frente)</td>
                          <td align="left" class="FacetlineTDM11 NoBorderTop" colspan="8" style="padding-left:5px" bgcolor="#CCCCCC">Ancho (opcional) 
                             <br>(ancho minimo exigido : 3 mm)
                          </td>
                       </tr>
                       <tr>
                          <td width="28" align="center" class="FacetlineTDM11" height="15"> 1</td>
                          <td align="left" class="FacetlineTDM11" colspan="6" style="padding-left:5px">&lt; 1/4 de la pared lateral del tórax</td>
                          <td width="26" align="center" class="FacetlineTDM11">a</td>
                          <td colspan="7" align="left" class="FacetlineTDM11" style="padding-left:5px" bgcolor="#CCCCCC">De 3 a 5 mm</td>
                       </tr>
                       <tr>
                          <td width="28" align="center" class="FacetlineTDM11" height="15"> 2</td>
                          <td align="left" class="FacetlineTDM11" colspan="6" style="padding-left:5px">Entre 1/4 y 1/2 de la pared lateral del tórax</td>
                          <td width="26" align="center" class="FacetlineTDM11">b</td>
                          <td colspan="7" align="left" class="FacetlineTDM11" style="padding-left:5px" bgcolor="#CCCCCC">De 5 a 10 mm</td>
                       </tr>
                       <tr>
                          <td width="28" align="center" class="FacetlineTDM11" height="15"> 3</td>
                          <td align="left" class="FacetlineTDM11" colspan="6" style="padding-left:5px">&gt; 1/2 de la pared lateral del tórax</td>
                          <td width="26" align="center" class="FacetlineTDM11">c</td>
                          <td colspan="7" align="left" class="FacetlineTDM11" style="padding-left:5px" bgcolor="#CCCCCC">Mayor a 10 mm</td>
                       </tr>
                       <tr>
                          <td align="left" class="FacetDataTDM11" height="15">&nbsp;</td>
                          <td width="34" align="center" class="FacetlineTDM11" id="extpla_00" >0</td>
                          <td align="center" class="FacetlineTDM11" colspan="2">D</td>
                          <td width="37" align="center" class="FacetlineTDM11" id="extplb_00">0</td>
                          <td align="center" class="FacetlineTDM11" colspan="2">I</td>
                          <td align="center" class="FacetDataTDM11">&nbsp;</td>
                          <td colspan="3" align="center" class="FacetlineTDM11" bgcolor="#CCCCCC">D</td>
                          <td align="center" class="FacetlineTDM11" colspan="3" bgcolor="#CCCCCC">I</td>
                       </tr>
                       <tr>
                          <td width="84" align="left" class="FacetlineTDM11" height="20" style="padding-left:5px">
                             <strong> Perfil</strong>
                          </td>
                          <td width="22" align="center" class="FacetlineTDM11" id="sipao_01" >0</td>
                          <td width="18" align="center" class="FacetlineTDM11" id="sipao_02">D</td>
                          <td width="20" align="center" class="FacetlineTDM11" id="sipao_03">I</td>
                          <td width="32" align="center" class="FacetlineTDM11" bgcolor="#CCCCCC" id="calpao_01">0</td>
                          <td width="32" align="center" class="FacetlineTDM11" bgcolor="#CCCCCC" id="calpao_02">D</td>
                          <td width="30" align="center" class="FacetlineTDM11" bgcolor="#CCCCCC" id="calpao_03">I</td>
                          <td align="center" class="FacetDataTDM11">&nbsp;</td>
                          <td align="center" class="FacetlineTDM11" id="extpla_01">1 </td>
                          <td align="center" class="FacetlineTDM11" id="extpla_02">2 </td>
                          <td width="32" align="center" class="FacetlineTDM11" id="extpla_03">3 </td>
                          <td align="center" class="FacetlineTDM11" id="extplb_01">1 </td>
                          <td width="40" align="center" class="FacetlineTDM11" id="extplb_02">2 </td>
                          <td width="37" align="center" class="FacetlineTDM11" id="extplb_03">3 </td>
                          <td width="26" align="center" class="FacetDataTDM11">&nbsp;</td>
                          <td width="30" align="center" class="FacetlineTDM11" bgcolor="#CCCCCC" id="ancpla_01">a </td>
                          <td width="30" align="center" class="FacetlineTDM11" bgcolor="#CCCCCC" id="ancpla_02">b </td>
                          <td width="30" align="center" class="FacetlineTDM11" bgcolor="#CCCCCC" id="ancpla_03">c </td>
                          <td width="30" align="center" class="FacetlineTDM11" bgcolor="#CCCCCC" id="ancplb_01">a </td>
                          <td width="30" align="center" class="FacetlineTDM11" bgcolor="#CCCCCC" id="ancplb_02">b</td>
                          <td width="30" align="center" class="FacetlineTDM11" bgcolor="#CCCCCC" id="ancplb_03">c</td>
                       </tr>
                       <tr>
                          <td width="84" align="left" class="FacetlineTDM11" height="20" style="padding-left:5px">
                             <strong>De frente</strong>
                          </td>
                          <td width="22" align="center" class="FacetlineTDM11" id="sifreo_01"> 0</td>
                          <td width="18" align="center" class="FacetlineTDM11" id="sifreo_02"> D</td>
                          <td width="20" align="center" class="FacetlineTDM11" id="sifreo_03"> I</td>
                          <td width="32" align="center" class="FacetlineTDM11" bgcolor="#CCCCCC" id="calfreo_01"> 0</td>
                          <td width="32" align="center" class="FacetlineTDM11" bgcolor="#CCCCCC" id="calfreo_02">D</td>
                          <td align="center" class="FacetlineTDM11" bgcolor="#CCCCCC" id="calfreo_03"> I</td>
                          <td width="28" align="left" class="FacetDataTDM11">&nbsp;</td>
                          <td width="34" align="center" class="FacetDataTDM11">&nbsp;</td>
                          <td width="32" align="center" class="FacetDataTDM11">&nbsp;</td>
                          <td width="32" align="center" class="FacetDataTDM11">&nbsp;</td>
                          <td width="37" align="center" class="FacetDataTDM11">&nbsp;</td>
                          <td width="40" align="center" class="FacetDataTDM11">&nbsp;</td>
                          <td width="37" align="center" class="FacetDataTDM11">&nbsp;</td>
                          <td align="center" class="FacetDataTDM11">&nbsp;</td>
                          <td align="center" class="FacetDataTDM11">&nbsp;</td>
                          <td align="center" class="FacetDataTDM11">&nbsp;</td>
                          <td align="center" class="FacetDataTDM11">&nbsp;</td>
                          <td align="center" class="FacetDataTDM11">&nbsp;</td>
                          <td align="center" class="FacetDataTDM11">&nbsp;</td>
                          <td align="center" class="FacetDataTDM11" style="border-right: 1px solid #000000; ">&nbsp;</td>
                       </tr>
                       <tr>
                          <td width="84" align="left" class="FacetlineTDM11" height="20" style="padding-left:5px">
                             <strong>Diafragma</strong>
                          </td>
                          <td width="22" align="center" class="FacetlineTDM11" id="sidiao_01"> 0</td>
                          <td width="18" align="center" class="FacetlineTDM11" id="sidiao_02"> D</td>
                          <td width="20" align="center" class="FacetlineTDM11" id="sidiao_03"> I</td>
                          <td width="32" align="center" class="FacetlineTDM11" bgcolor="#CCCCCC" id="caldiao_01"> 0</td>
                          <td width="32" align="center" class="FacetlineTDM11" bgcolor="#CCCCCC" id="caldiao_02"> D</td>
                          <td align="center" class="FacetlineTDM11" bgcolor="#CCCCCC" id="caldiao_03"> I</td>
                          <td width="28" align="left" class="FacetDataTDM11">&nbsp;</td>
                          <td align="center" class="FacetDataTDM11">&nbsp;</td>
                          <td align="center" class="FacetDataTDM11">&nbsp;</td>
                          <td width="32" align="center" class="FacetDataTDM11">&nbsp;</td>
                          <td align="center" class="FacetDataTDM11">&nbsp;</td>
                          <td align="center" class="FacetDataTDM11">&nbsp;</td>
                          <td align="center" class="FacetDataTDM11">&nbsp;</td>
                          <td align="center" class="FacetDataTDM11">&nbsp;</td>
                          <td align="center" class="FacetDataTDM11">&nbsp;</td>
                          <td align="center" class="FacetDataTDM11">&nbsp;</td>
                          <td align="center" class="FacetDataTDM11">&nbsp;</td>
                          <td align="center" class="FacetDataTDM11">&nbsp;</td>
                          <td align="center" class="FacetDataTDM11">&nbsp;</td>
                          <td align="center" class="FacetDataTDM11" style="border-right: 1px solid #000000; ">&nbsp;</td>
                       </tr>
                       <tr>
                          <td width="84" align="left" class="FacetlineTDM11" height="20" style="padding-left:5px">
                             <strong>Otro(s) sitio(s)</strong>
                          </td>
                          <td width="22" align="center" class="FacetlineTDM11" id="siotro_01"> 0</td>
                          <td width="18" align="center" class="FacetlineTDM11" id="siotro_02"> D</td>
                          <td width="20" align="center" class="FacetlineTDM11" id="siotro_03"> I</td>
                          <td width="32" align="center" class="FacetlineTDM11" bgcolor="#CCCCCC" id="calotro_01"> 0</td>
                          <td width="32" align="center" class="FacetlineTDM11" bgcolor="#CCCCCC" id="calotro_02"> D</td>
                          <td align="center" class="FacetlineTDM11" bgcolor="#CCCCCC" id="calotro_03"> I</td>
                          <td align="left" class="">&nbsp;</td>
                          <td align="left" class="">&nbsp;</td>
                          <td align="left" class="">&nbsp;</td>
                          <td align="left" class="">&nbsp;</td>
                          <td align="left" class="">&nbsp;</td>
                          <td align="left" class="">&nbsp;</td>
                          <td align="left" class="">&nbsp;</td>
                          <td align="left" class="">&nbsp;</td>
                          <td align="left" class="">&nbsp;</td>
                          <td align="left" class="">&nbsp;</td>
                          <td align="left" class="">&nbsp;</td>
                          <td align="center" class="FacetDataTDM11">&nbsp;</td>
                          <td align="center" class="FacetDataTDM11">&nbsp;</td>
                          <td align="center" class="FacetDataTDM11" style="border-right: 1px solid #000000; ">&nbsp;</td>
                       </tr>
                       <tr>
                          <td align="left" class="FacetlineTDM11" colspan="7" height="20" style="padding-left:5px">Obliteración del Ángulo Costofrenico</td>
                          <td align="center" class="FacetlineTDM11" id="id_oblito">0</td>
                          <td align="center" class="FacetlineTDM11" id="id_oblitd">D</td>
                          <td align="center" class="FacetlineTDM11" id="id_obliti">I</td>
                          <td colspan="11" align="center" class="FacetlineTDM11 NoBorderTop"></td>
                       </tr>
                    </tbody>
                 </table>
              </td>
           </tr>
           <tr>
              <td>
                 <table width="950" cellpadding="0" cellspacing="0" border="1">
                    <tbody>
                       <tr>
                          <td colspan="21" align="left" class="FacetlineTDM11 NoBorderTop" height="20" style="padding-left:5px">
                             <strong>3.2 Engrosamiento Difuso de la Pleura</strong>(0=Ninguna, D=Hemitórax derecho; I=Hemitórax izquierdo)
                          </td>
                       </tr>
                       <tr>
                          <td colspan="4" align="center" class="FacetlineTDM11" height="20">
                             <strong>Pared Toráxica</strong>
                          </td>
                          <td colspan="3" align="center" class="FacetlineTDM11">
                             <strong>Calcificación </strong>
                          </td>
                          <td colspan="7" align="center" class="FacetlineTDM11">
                             <strong>Extensión </strong>
                          </td>
                          <td width="11" align="center" class="">&nbsp;</td>
                          <td colspan="6" align="center" class="FacetlineTDM11">
                             <strong>Ancho </strong>
                          </td>
                       </tr>
                       <tr>
                          <td width="76" align="left" class="FacetlineTDM11" height="20" style="padding-left:5px">De perfil</td>
                          <td width="20" align="center" class="FacetlineTDM11" id="parpero_00">0</td>
                          <td width="21" align="center" class="FacetlineTDM11" id="parpero_01">D</td>
                          <td width="20" align="center" class="FacetlineTDM11" id="parpero_02">I</td>
                          <td width="24" align="center" class="FacetlineTDM11" id="calpero_00">0</td>
                          <td width="28" align="center" class="FacetlineTDM11" id="calpero_01">D</td>
                          <td width="35" align="center" class="FacetlineTDM11" id="calpero_02">I</td>
                          <td width="14" align="center" class="FacetDataTDM11">&nbsp;</td>
                          <td width="31" height="16" align="center" class="FacetlineTDM11" id="extpar_00">0</td>
                          <td align="center" class="FacetlineTDM11" colspan="2">D</td>
                          <td width="31" align="center" class="FacetlineTDM11" id="extparb_00">0</td>
                          <td colspan="2" align="center" class="FacetlineTDM11">I</td>
                          <td align="center" class="">&nbsp;</td>
                          <td colspan="3" align="center" class="FacetlineTDM11">D </td>
                          <td colspan="3" align="center" class="FacetlineTDM11">I </td>
                       </tr>
                       <tr>
                          <td align="left" class="FacetlineTDM11" height="20">&nbsp;</td>
                          <td align="center" class="FacetlineTDM11">&nbsp;</td>
                          <td align="center" class="FacetlineTDM11">&nbsp;</td>
                          <td align="center" class="FacetlineTDM11">&nbsp;</td>
                          <td align="center" class="FacetlineTDM11">&nbsp;</td>
                          <td align="center" class="FacetlineTDM11">&nbsp;</td>
                          <td align="center" class="FacetlineTDM11">&nbsp;</td>
                          <td align="center" class="FacetDataTDM11">&nbsp;</td>
                          <td align="center" class="FacetlineTDM11" id="extpar_01">1</td>
                          <td width="23" align="center" class="FacetlineTDM11" id="extpar_02">2</td>
                          <td width="30" align="center" class="FacetlineTDM11" id="extpar_03">3</td>
                          <td align="center" class="FacetlineTDM11" id="extparb_01">1 </td>
                          <td width="34" align="center" class="FacetlineTDM11" id="extparb_02">2 </td>
                          <td width="28" align="center" class="FacetlineTDM11" id="extparb_03">3 </td>
                          <td align="center">&nbsp;</td>
                          <td width="30" align="center" class="FacetlineTDM11" id="ancpara_01">a </td>
                          <td width="30" align="center" class="FacetlineTDM11" id="ancpara_02">b </td>
                          <td width="25" align="center" class="FacetlineTDM11" id="ancpara_03">c </td>
                          <td width="29" align="center" class="FacetlineTDM11" id="ancparb_01">a</td>
                          <td width="28" align="center" class="FacetlineTDM11" id="ancparb_02">b</td>
                          <td width="30" align="center" class="FacetlineTDM11" id="ancparb_03">c</td>
                       </tr>
                       <tr>
                          <td width="76" align="left" class="FacetlineTDM11" height="20" style="padding-left:5px">De frente</td>
                          <td width="20" align="center" class="FacetlineTDM11" id="parfreo_00"> 0</td>
                          <td width="21" align="center" class="FacetlineTDM11" id="parfreo_01"> D</td>
                          <td width="20" align="center" class="FacetlineTDM11" id="parfreo_02"> I</td>
                          <td width="24" align="center" class="FacetlineTDM11" id="calfreno_00"> 0</td>
                          <td width="28" align="center" class="FacetlineTDM11" id="calfreno_01"> D</td>
                          <td align="center" class="FacetlineTDM11" id="calfreno_02"> I</td>
                          <td colspan="14" align="center" class="FacetlineTDM11 NoBorderTop">&nbsp;</td>
                       </tr>
                    </tbody>
                 </table>
              </td>
           </tr>
           <tr>
              <td colspan="5">
                 <table width="950" cellpadding="0" cellspacing="0" border="1">
                    <tbody>
                       <tr>
                          <td width="545" align="left" class="FacetlineTDM11 NoBorderTop" height="20" style="padding-left:5px">
                             <strong>IV. SIMBOLOS *</strong>
                          </td>
                          <td width="34" align="center" class="FacetlineTDM11 NoBorderTop" >
                             <strong>SI</strong>
                          </td>
                          <td width="29" align="center" class="FacetlineTDM11 NoBorderTop" id="simbolos_SI">&nbsp;</td>
                          <td width="29" class="FacetlineTDM11 NoBorderTop" align="center">
                             <strong>NO</strong>
                          </td>
                          <td width="26" align="center" class="FacetlineTDM11 NoBorderTop" id="simbolos_NO">
                          </td>
                       </tr>
                    </tbody>
                 </table>
              </td>
           </tr>
           <tr>
              <td>
                 <table width="950" cellpadding="0" cellspacing="0" border="1">
                    <tbody>
                       <tr>
                          <td align="left" class="FacetlineTDM11 NoBorderTop" colspan="15" height="15" style="padding-left:5px">(Rodee con un círculo la respuesta adecuada; si rodea 
                             <strong>od</strong>, escriba a continuación un 
                             <strong>COMENTARIO</strong>)
                          </td>
                       </tr>
                       <tr>
                          <td width="38" align="center" class="FacetlineTDM11" height="25" id="id_aa"> aa</td>
                          <td width="40" align="center" class="FacetlineTDM11" id="id_at"> at</td>
                          <td width="38" align="center" class="FacetlineTDM11" id="id_ax"> ax</td>
                          <td width="33" align="center" class="FacetlineTDM11" id="id_bu"> bu</td>
                          <td width="35" align="center" class="FacetlineTDM11" id="id_ca"> ca</td>
                          <td width="36" align="center" class="FacetlineTDM11" id="id_cg"> cg</td>
                          <td width="33" align="center" class="FacetlineTDM11" id="id_cn"> cn</td>
                          <td width="33" align="center" class="FacetlineTDM11" id="id_co"> co</td>
                          <td width="32" align="center" class="FacetlineTDM11" id="id_cp"> cp</td>
                          <td width="28" align="center" class="FacetlineTDM11" id="id_cv"> cv</td>
                          <td width="29" align="center" class="FacetlineTDM11" id="id_di"> di</td>
                          <td width="26" align="center" class="FacetlineTDM11" id="id_ef"> ef</td>
                          <td width="30" align="center" class="FacetlineTDM11" id="id_em"> em</td>
                          <td width="32" align="center" class="FacetlineTDM11" id="id_es"> es</td>
                          <td width="129" align="center" rowspan="2" class="FacetlineTDM11"></td>
                       </tr>
                       <tr>
                          <td width="40" align="center" class="FacetlineTDM11" height="25" id="id_fr"> fr</td>
                          <td width="40" align="center" class="FacetlineTDM11" id="id_hi"> hi</td>
                          <td width="38" align="center" class="FacetlineTDM11" id="id_ho"> ho</td>
                          <td width="33" align="center" class="FacetlineTDM11" id="id_id"> id</td>
                          <td width="35" align="center" class="FacetlineTDM11" id="id_ih"> ih</td>
                          <td width="36" align="center" class="FacetlineTDM11" id="id_kl"> kl</td>
                          <td width="33" align="center" class="FacetlineTDM11" id="id_me"> me</td>
                          <td width="33" align="center" class="FacetlineTDM11" id="id_pa"> pa</td>
                          <td width="32" align="center" class="FacetlineTDM11" id="id_pb"> pb</td>
                          <td width="28" align="center" class="FacetlineTDM11" id="id_pi"> pi</td>
                          <td width="29" align="center" class="FacetlineTDM11" id="id_px"> px</td>
                          <td width="26" align="center" class="FacetlineTDM11" id="id_ra"> ra</td>
                          <td width="30" align="center" class="FacetlineTDM11" id="id_rp"> rp</td>
                          <td width="32" align="center" class="FacetlineTDM11" id="id_tb"> tb</td>
                       </tr>
                    </tbody>
                 </table>
              </td>
           </tr>
           <tr>
              <td class="FacetDataTDM11">
                 <table width="950" cellpadding="0" cellspacing="0" border="1">
                    <tbody>
                       <tr>
                          <td width="91" align="left" class="FacetDataTDM11 NoBorderTop" style="border-bottom:1px solid #000; border-left:1px solid #000;border-top:1px solid #000;font-size:10px;padding-left:5px" height="20">
                             <strong>CONCLUSIÓN</strong>
                          </td>
                          <td width="584" colspan="5" align="left" class="FacetDataTDM11 NoBorderTop" id="concluccionxx" style="border-bottom:1px solid #000; border-right:1px solid #000;border-top:1px solid #000; ">.&nbsp;</td>
                       </tr>
                    </tbody>
                 </table>
              </td>
           </tr>
           <tr>
              <td class="FacetDataTDM11">
                 <table width="950" cellpadding="0" cellspacing="0" border="1">
                    <tbody>
                       <tr>
                          <td width="188" height="82" align="center" valign="middle" class="FacetlineTDM11 NoBorderTop" style="font-size:11px">
                             <span class="FacetDataTDM11" style="font-size:11px">
                             <strong>Firma y sello del médico
                             <br>  Percy Alfredo  Espinal Bravo
                             <br>C.M.P. :034748 &nbsp; &nbsp;  &nbsp; &nbsp; 
                             </strong>
                             </span>
                          </td>
                          <td width="497" align="left" valign="middle" class="FacetlineTDM11 NoBorderTop" style="font-size:11px;padding-left:5px;">
                             <img src="<?php echo base_url().'upload/';?>firma/518.jpg?v=<?php echo rand(); ?>" width="169" height="71" title="" oncontextmenu="return false" onkeydown="return false">
                          </td>
                       </tr>
                    </tbody>
                 </table>
              </td>
           </tr>
        </tbody>
     </table>
     <center>
         <table width="950" align="center" id="aplicamos_archivos2">
        <tbody>
          
        </tbody>
     </table>
     </center>
  </div>
</span>

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script>

      $(document).ready(function() {
           /* Act on the event */
          id_paciente = <?php echo $this->uri->segment(4,0); ?>;  
          $.ajax({
              url: '<?php echo base_url().'Laboratorio/Laboratorio/imprimir_prueba_rapida/' ?>',
              type: 'POST',
              dataType: 'json',
              data: {id_paciente: id_paciente},
          })
          .done(function(data) {
              console.log("success");
              $("#nombres_completos_paciente").text(data.nombre+" "+data.apellido_paterno+" "+data.apellido_materno);
             $("#nombres_completos_pacientex").text(data.nombre+" "+data.apellido_paterno+" "+data.apellido_materno);
              $("#dni_paciente").text(data.dni);
              if (data.empresa=="") {
                  aplicate = ``;
                  
              }else{
                  aplicate = `<div class=" text-center p-2 border ">
                          <div class="font-weight-bold text-dark">
                              EMPRESA:<span class="font-weight-normal" > `+data.empresa+`&nbsp;&nbsp;&nbsp;&nbsp;`+data.ruc+`</span>
                          </div>
                      </div>`;
                  
              }
              $("#aplicamos_cambios").html(aplicate);
              $("#sexo_id").text(data.sexo);

              $("#igm-impr-slot").text(data.igm);
              $("#igg-impr-slot").text(data.igg);
              $("#edad-impr-slot").text(data.edad);
              $("#fecha_nacimiento-impr-slot").text(data.fecha_nacimiento);
              $("#update_covid-impr-slot").text(data.update_covid);

          })
          .fail(function() {
              console.log("error");
          })
          .always(function() {
              console.log("complete");
          });
      });
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

          //  $("#salto21").val(data.salto21);
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
      $(document).ready(function() {
          $.ajax({
              url: '<?php echo base_url().'Rayos/Rayos/mostramos_archivos_pdf_id_paciente/';?>',
              type: 'POST',
              //dataType: 'json',
              data: {id_paciente: id_paciente},
          })
          .done(function(data) {
              console.log("success");

              var resultado = JSON.parse(data);
                  var contenido = '';                
                  $.each(resultado, function(index, value) {
                      contenido += `
                      <tr class="text-center">
                          <td height="139" align="left" class="text-center">
                              <img src="<?php echo base_url().'upload/archivos/rayos/'?>`+value.archivo+`" width="100%" height="880" title="">
                          </td>
                      </tr>`;
                  });

                  $("#aplicamos_archivos2 tbody").html(contenido);
                  
          })
          .fail(function() {
              console.log("error");
          })
          .always(function() {
              console.log("complete");
          });
      });
      $(document).ready(function() {
          /* Act on the event */
          var id_paciente = <?php echo $this->uri->segment(4,0);?>;

          $.ajax({
              url: '<?php echo base_url().'Rayos/Rayos/mostrar_rwegistros_online_del_oit/';?>',
              type: 'POST',
              dataType: 'json',
              data: {id_paciente: id_paciente},
          })
          .done(function(data) {
              console.log("success");
              $("#anox").text(data.anox);
              $("#diasx").text(data.diasx);
              $("#mesx").text(data.mesx);
              //fecha_rad
              $("#anox_rad").text(data.anox_rad);
              $("#diasx_rad").text(data.diasx_rad);
              $("#mesx_rad").text(data.mesx_rad);

              //conclcciojn
              $("#concluccionxx").text(data.diagnostico);
              //validamos los datos que se salen eaclidad calidad radiogfrafica
              switch (data.pepe) {
                  case "p":
                      $("#pepe_01").attr('style', 'background-image:url("<?php echo base_url().'upload/'; ?>aspa/ico_aspa-negra.jpg?v=<?php echo rand(); ?>");background-position:center;background-repeat:no-repeat');
                      break;
                  case "q":
                       $("#pepe_02").attr('style', 'background-image:url("<?php echo base_url().'upload/'; ?>aspa/ico_aspa-negra.jpg?v=<?php echo rand(); ?>");background-position:center;background-repeat:no-repeat');
                      break;
                  case "r":
                       $("#pepe_03").attr('style', 'background-image:url("<?php echo base_url().'upload/'; ?>aspa/ico_aspa-negra.jpg?v=<?php echo rand(); ?>");background-position:center;background-repeat:no-repeat');
                      break;
                  case "s":
                       $("#pepe_04").attr('style', 'background-image:url("<?php echo base_url().'upload/'; ?>aspa/ico_aspa-negra.jpg?v=<?php echo rand(); ?>");background-position:center;background-repeat:no-repeat');
                      break;
                  case "t":
                       $("#pepe_05").attr('style', 'background-image:url("<?php echo base_url().'upload/'; ?>aspa/ico_aspa-negra.jpg?v=<?php echo rand(); ?>");background-position:center;background-repeat:no-repeat');
                      break;
                  case "u":
                       $("#pepe_06").attr('style', 'background-image:url("<?php echo base_url().'upload/'; ?>aspa/ico_aspa-negra.jpg?v=<?php echo rand(); ?>");background-position:center;background-repeat:no-repeat');
                      break;
              }

              //OPACING
              switch (data.opacig) {
                  case "O":
                      $("#opacig_O").attr('style', 'background-image:url("<?php echo base_url().'upload/'; ?>aspa/ico_aspa-negra.jpg?v=<?php echo rand(); ?>");background-position:center;background-repeat:no-repeat');
                      break;
                  case "A":
                       $("#opacig_A").attr('style', 'background-image:url("<?php echo base_url().'upload/'; ?>aspa/ico_aspa-negra.jpg?v=<?php echo rand(); ?>");background-position:center;background-repeat:no-repeat');
                      break;
                  case "B":
                       $("#opacig_B").attr('style', 'background-image:url("<?php echo base_url().'upload/'; ?>aspa/ico_aspa-negra.jpg?v=<?php echo rand(); ?>");background-position:center;background-repeat:no-repeat');
                      break;
                  case "C":
                       $("#opacig_C").attr('style', 'background-image:url("<?php echo base_url().'upload/'; ?>aspa/ico_aspa-negra.jpg?v=<?php echo rand(); ?>");background-position:center;background-repeat:no-repeat');
                      break;
                
              }

              //sepe

              switch (data.sepe) {
                  case "p":
                      $("#sepe_01").attr('style', 'background-image:url("<?php echo base_url().'upload/'; ?>aspa/ico_aspa-negra.jpg?v=<?php echo rand(); ?>");background-position:center;background-repeat:no-repeat');
                      break;
                  case "q":
                       $("#sepe_02").attr('style', 'background-image:url("<?php echo base_url().'upload/'; ?>aspa/ico_aspa-negra.jpg?v=<?php echo rand(); ?>");background-position:center;background-repeat:no-repeat');
                      break;
                  case "r":
                       $("#sepe_03").attr('style', 'background-image:url("<?php echo base_url().'upload/'; ?>aspa/ico_aspa-negra.jpg?v=<?php echo rand(); ?>");background-position:center;background-repeat:no-repeat');
                      break;
                  case "s":
                       $("#sepe_04").attr('style', 'background-image:url("<?php echo base_url().'upload/'; ?>aspa/ico_aspa-negra.jpg?v=<?php echo rand(); ?>");background-position:center;background-repeat:no-repeat');
                      break;
                  case "t":
                       $("#sepe_05").attr('style', 'background-image:url("<?php echo base_url().'upload/'; ?>aspa/ico_aspa-negra.jpg?v=<?php echo rand(); ?>");background-position:center;background-repeat:no-repeat');
                      break;
                  case "u":
                       $("#sepe_06").attr('style', 'background-image:url("<?php echo base_url().'upload/'; ?>aspa/ico_aspa-negra.jpg?v=<?php echo rand(); ?>");background-position:center;background-repeat:no-repeat');
                      break;
              }

              switch (data.eacalidad) {
                  case "A":
                      $("#calid_01").html("<strong>X</strong>");
                      break;
                  case "B":
                       $("#calid_02").html("<strong>X</strong>");
                      break;
                  case "C":
                       $("#calid_03").html("<strong>X</strong>");
                      break;
                  case "D":
                       $("#calid_04").html("<strong>X</strong>");
                      break;
              }

              switch (data.extpla) {
                  case "0":
                      $("#extpla_00").attr('style', 'background-image:url("<?php echo base_url().'upload/'; ?>aspa/ico_aspa-negra.jpg?v=<?php echo rand(); ?>");background-position:center;background-repeat:no-repeat');
                      break;
                  case "1":
                       $("#extpla_01").attr('style', 'background-image:url("<?php echo base_url().'upload/'; ?>aspa/ico_aspa-negra.jpg?v=<?php echo rand(); ?>");background-position:center;background-repeat:no-repeat');
                      break;
                  case "2":
                       $("#extpla_02").attr('style', 'background-image:url("<?php echo base_url().'upload/'; ?>aspa/ico_aspa-negra.jpg?v=<?php echo rand(); ?>");background-position:center;background-repeat:no-repeat');
                      break;
                  case "3":
                       $("#extpla_03").attr('style', 'background-image:url("<?php echo base_url().'upload/'; ?>aspa/ico_aspa-negra.jpg?v=<?php echo rand(); ?>");background-position:center;background-repeat:no-repeat');
              }
                

              switch (data.extplb) {
                  case "0":
                      $("#extplb_00").attr('style', 'background-image:url("<?php echo base_url().'upload/'; ?>aspa/ico_aspa-negra.jpg?v=<?php echo rand(); ?>");background-position:center;background-repeat:no-repeat');
                      break;
                  case "1":
                       $("#extplb_01").attr('style', 'background-image:url("<?php echo base_url().'upload/'; ?>aspa/ico_aspa-negra.jpg?v=<?php echo rand(); ?>");background-position:center;background-repeat:no-repeat');
                      break;
                  case "2":
                       $("#extplb_02").attr('style', 'background-image:url("<?php echo base_url().'upload/'; ?>aspa/ico_aspa-negra.jpg?v=<?php echo rand(); ?>");background-position:center;background-repeat:no-repeat');
                      break;
                  case "3":
                       $("#extplb_03").attr('style', 'background-image:url("<?php echo base_url().'upload/'; ?>aspa/ico_aspa-negra.jpg?v=<?php echo rand(); ?>");background-position:center;background-repeat:no-repeat');
              }




              switch (data.ancpara) {
                  case "a":
                      $("#ancpara_01").attr('style', 'background-image:url("<?php echo base_url().'upload/'; ?>aspa/ico_aspa-negra.jpg?v=<?php echo rand(); ?>");background-position:center;background-repeat:no-repeat');
                      break;
                  case "b":
                       $("#ancpara_02").attr('style', 'background-image:url("<?php echo base_url().'upload/'; ?>aspa/ico_aspa-negra.jpg?v=<?php echo rand(); ?>");background-position:center;background-repeat:no-repeat');
                      break;
                  case "c":
                       $("#ancpara_03").attr('style', 'background-image:url("<?php echo base_url().'upload/'; ?>aspa/ico_aspa-negra.jpg?v=<?php echo rand(); ?>");background-position:center;background-repeat:no-repeat');
                      break;

              }

              switch (data.ancpla) {
                  case "a":
                      $("#ancpla_01").attr('style', 'background-image:url("<?php echo base_url().'upload/'; ?>aspa/ico_aspa-negra.jpg?v=<?php echo rand(); ?>");background-position:center;background-repeat:no-repeat');
                      break;
                  case "b":
                       $("#ancpla_02").attr('style', 'background-image:url("<?php echo base_url().'upload/'; ?>aspa/ico_aspa-negra.jpg?v=<?php echo rand(); ?>");background-position:center;background-repeat:no-repeat');
                      break;
                  case "c":
                       $("#ancpla_03").attr('style', 'background-image:url("<?php echo base_url().'upload/'; ?>aspa/ico_aspa-negra.jpg?v=<?php echo rand(); ?>");background-position:center;background-repeat:no-repeat');
                      break;

              }

              switch (data.ancplb) {
                  case "a":
                      $("#ancplb_01").attr('style', 'background-image:url("<?php echo base_url().'upload/'; ?>aspa/ico_aspa-negra.jpg?v=<?php echo rand(); ?>");background-position:center;background-repeat:no-repeat');
                      break;
                  case "b":
                       $("#ancplb_02").attr('style', 'background-image:url("<?php echo base_url().'upload/'; ?>aspa/ico_aspa-negra.jpg?v=<?php echo rand(); ?>");background-position:center;background-repeat:no-repeat');
                      break;
                  case "c":
                       $("#ancplb_03").attr('style', 'background-image:url("<?php echo base_url().'upload/'; ?>aspa/ico_aspa-negra.jpg?v=<?php echo rand(); ?>");background-position:center;background-repeat:no-repeat');
                      break;

              }

              

              




              switch (data.ancparb) {
                  case "a":
                      $("#ancparb_01").attr('style', 'background-image:url("<?php echo base_url().'upload/'; ?>aspa/ico_aspa-negra.jpg?v=<?php echo rand(); ?>");background-position:center;background-repeat:no-repeat');
                      break;
                  case "b":
                       $("#ancparb_02").attr('style', 'background-image:url("<?php echo base_url().'upload/'; ?>aspa/ico_aspa-negra.jpg?v=<?php echo rand(); ?>");background-position:center;background-repeat:no-repeat');
                      break;
                  case "c":
                       $("#ancparb_03").attr('style', 'background-image:url("<?php echo base_url().'upload/'; ?>aspa/ico_aspa-negra.jpg?v=<?php echo rand(); ?>");background-position:center;background-repeat:no-repeat');
                      break;

              }

              switch (data.extpar) {
                  case "0":
                      $("#extpar_00").attr('style', 'background-image:url("<?php echo base_url().'upload/'; ?>aspa/ico_aspa-negra.jpg?v=<?php echo rand(); ?>");background-position:center;background-repeat:no-repeat');
                      break;
                  case "1":
                      $("#extpar_01").attr('style', 'background-image:url("<?php echo base_url().'upload/'; ?>aspa/ico_aspa-negra.jpg?v=<?php echo rand(); ?>");background-position:center;background-repeat:no-repeat');
                      break;
                  case "2":
                       $("#extpar_02").attr('style', 'background-image:url("<?php echo base_url().'upload/'; ?>aspa/ico_aspa-negra.jpg?v=<?php echo rand(); ?>");background-position:center;background-repeat:no-repeat');
                      break;
                  case "3":
                       $("#extpar_03").attr('style', 'background-image:url("<?php echo base_url().'upload/'; ?>aspa/ico_aspa-negra.jpg?v=<?php echo rand(); ?>");background-position:center;background-repeat:no-repeat');
                      break;

              }

              switch (data.extparb) {
                  case "0":
                      $("#extparb_00").attr('style', 'background-image:url("<?php echo base_url().'upload/'; ?>aspa/ico_aspa-negra.jpg?v=<?php echo rand(); ?>");background-position:center;background-repeat:no-repeat');
                      break;
                  case "1":
                      $("#extparb_01").attr('style', 'background-image:url("<?php echo base_url().'upload/'; ?>aspa/ico_aspa-negra.jpg?v=<?php echo rand(); ?>");background-position:center;background-repeat:no-repeat');
                      break;
                  case "2":
                       $("#extparb_02").attr('style', 'background-image:url("<?php echo base_url().'upload/'; ?>aspa/ico_aspa-negra.jpg?v=<?php echo rand(); ?>");background-position:center;background-repeat:no-repeat');
                      break;
                  case "3":
                       $("#extparb_03").attr('style', 'background-image:url("<?php echo base_url().'upload/'; ?>aspa/ico_aspa-negra.jpg?v=<?php echo rand(); ?>");background-position:center;background-repeat:no-repeat');
                      break;

              }

              switch (data.calfreno) {
                  case "1":
                      $("#calfreno_00").attr('style', 'background-image:url("<?php echo base_url().'upload/'; ?>aspa/ico_aspa-negra.jpg?v=<?php echo rand(); ?>");background-position:center;background-repeat:no-repeat');
                      break;
                  case "2":
                      $("#calfreno_01").attr('style', 'background-image:url("<?php echo base_url().'upload/'; ?>aspa/ico_aspa-negra.jpg?v=<?php echo rand(); ?>");background-position:center;background-repeat:no-repeat');
                      break;
                  case "3":
                       $("#calfreno_02").attr('style', 'background-image:url("<?php echo base_url().'upload/'; ?>aspa/ico_aspa-negra.jpg?v=<?php echo rand(); ?>");background-position:center;background-repeat:no-repeat');
                      break;
                 

              }

          

              

              


              

              






              switch (data.rxcem) {
                  case "1":
                      $("#id_o").attr('style', 'background-image:url("<?php echo base_url().'upload/'; ?>aspa/ico_aspa-negra.jpg?v=<?php echo rand(); ?>");background-position:center;background-repeat:no-repeat');
                      break;
                  case "2":
                       $("#id_00").attr('style', 'background-image:url("<?php echo base_url().'upload/'; ?>aspa/ico_aspa-negra.jpg?v=<?php echo rand(); ?>");background-position:center;background-repeat:no-repeat');
                      break;
                  case "3":
                       $("#id_01").attr('style', 'background-image:url("<?php echo base_url().'upload/'; ?>aspa/ico_aspa-negra.jpg?v=<?php echo rand(); ?>");background-position:center;background-repeat:no-repeat');
                      break;
                  case "4":
                       $("#id_10").attr('style', 'background-image:url("<?php echo base_url().'upload/'; ?>aspa/ico_aspa-negra.jpg?v=<?php echo rand(); ?>");background-position:center;background-repeat:no-repeat');
                      break;
                  case "5":
                       $("#id_11").attr('style', 'background-image:url("<?php echo base_url().'upload/'; ?>aspa/ico_aspa-negra.jpg?v=<?php echo rand(); ?>");background-position:center;background-repeat:no-repeat');
                      break;
                  case "6":
                       $("#id_12").attr('style', 'background-image:url("<?php echo base_url().'upload/'; ?>aspa/ico_aspa-negra.jpg?v=<?php echo rand(); ?>");background-position:center;background-repeat:no-repeat');
                      break;
                  case "7":
                       $("#id_21").attr('style', 'background-image:url("<?php echo base_url().'upload/'; ?>aspa/ico_aspa-negra.jpg?v=<?php echo rand(); ?>");background-position:center;background-repeat:no-repeat');
                      break;
                  case "8":
                       $("#id_22").attr('style', 'background-image:url("<?php echo base_url().'upload/'; ?>aspa/ico_aspa-negra.jpg?v=<?php echo rand(); ?>");background-position:center;background-repeat:no-repeat');
                      break;
                  case "9":
                       $("#id_23").attr('style', 'background-image:url("<?php echo base_url().'upload/'; ?>aspa/ico_aspa-negra.jpg?v=<?php echo rand(); ?>");background-position:center;background-repeat:no-repeat');
                      break;
                  case "10":
                       $("#id_32").attr('style', 'background-image:url("<?php echo base_url().'upload/'; ?>aspa/ico_aspa-negra.jpg?v=<?php echo rand(); ?>");background-position:center;background-repeat:no-repeat');
                      break;
                  case "11":
                       $("#id_33").attr('style', 'background-image:url("<?php echo base_url().'upload/'; ?>aspa/ico_aspa-negra.jpg?v=<?php echo rand(); ?>");background-position:center;background-repeat:no-repeat');
                      break;
                  case "12":
                       $("#id_333").attr('style', 'background-image:url("<?php echo base_url().'upload/'; ?>aspa/ico_aspa-negra.jpg?v=<?php echo rand(); ?>");background-position:center;background-repeat:no-repeat');
                      break;

              }

              //rxcem cargamos

              //mostramos datos del eucarido cauradio_07 del 1 - 7

              if (data.cauradio=="1") {
                  $("#cauradio_01").html("<strong>X</strong>");
              }else{
                  $("#cauradio_01").html("");
              }
              if (data.cauradio2=="2") {
                  $("#cauradio_02").html("<strong>X</strong>");
              }else{
                  $("#cauradio_02").html("");
              }

              if (data.cauradio3=="3") {
                  $("#cauradio_03").html("<strong>X</strong>");
              }else{
                  $("#cauradio_03").html("");
              }

              if (data.cauradio4=="4") {
                  $("#cauradio_04").html("<strong>X</strong>");
              }else{
                  $("#cauradio_04").html("");
              }

              if (data.cauradio5=="5") {
                  $("#cauradio_05").html("<strong>X</strong>");
              }else{
                  $("#cauradio_05").html("");
              }
              if (data.cauradio6=="6") {
                  $("#cauradio_06").html("<strong>X</strong>");
              }else{
                  $("#cauradio_06").html("");
              }
              if (data.cauradio7=="7") {
                  $("#cauradio_07").html("<strong>X</strong>");
              }else{
                  $("#cauradio_07").html("");
              }

              //suder y infeder

              if (data.suder=="suder") {
                  $("#suder01").html("<strong>X</strong>");
              }else{
                  $("#suder01").html("");
              }

              if (data.suizq=="suizq") {
                  $("#suizq01").html("<strong>X</strong>");
              }else{
                  $("#suizq01").html("");
              }

              if (data.meder=="meder") {
                  $("#meder01").html("<strong>X</strong>");
              }else{
                  $("#meder01").html("");
              }

              if (data.meizq=="meizq") {
                  $("#meizq01").html("<strong>X</strong>");
              }else{
                  $("#meizq01").html("");
              }

              if (data.infder=="infder") {
                  $("#infder_01").html("<strong>X</strong>");
              }else{
                  $("#infder_01").html("");
              }

              if (data.infizq=="infizq") {
                  $("#infizq01").html("<strong>X</strong>");
              }else{
                  $("#infizq01").html("");
              }

              //antecendentes

              $("#antecedentes_id").text(data.antecedentes);

              //SI O NO
              switch (data.anopleu) {
                  case "N":
                      $("#anopleu_NO").html("<strong>X</strong>");
                      break;
                  case "S":
                       $("#anopleu_SI").html("<strong>X</strong>");
                      break;

              }

              switch (data.sipao) {
                  case "1":
                      $("#sipao_01").attr('style', 'background-image:url("<?php echo base_url().'upload/'; ?>aspa/ico_aspa-negra.jpg?v=<?php echo rand(); ?>");background-position:center;background-repeat:no-repeat');
                      break;
                  case "2":
                       $("#sipao_02").attr('style', 'background-image:url("<?php echo base_url().'upload/'; ?>aspa/ico_aspa-negra.jpg?v=<?php echo rand(); ?>");background-position:center;background-repeat:no-repeat');
                      break;
                  case "3":
                       $("#sipao_03").attr('style', 'background-image:url("<?php echo base_url().'upload/'; ?>aspa/ico_aspa-negra.jpg?v=<?php echo rand(); ?>");background-position:center;background-repeat:no-repeat');
                      break;

              }

              switch (data.sifreo) {
                  case "1":
                      $("#sifreo_01").attr('style', 'background-image:url("<?php echo base_url().'upload/'; ?>aspa/ico_aspa-negra.jpg?v=<?php echo rand(); ?>");background-position:center;background-repeat:no-repeat');
                      break;
                  case "2":
                       $("#sifreo_02").attr('style', 'background-image:url("<?php echo base_url().'upload/'; ?>aspa/ico_aspa-negra.jpg?v=<?php echo rand(); ?>");background-position:center;background-repeat:no-repeat');
                      break;
                  case "3":
                       $("#sifreo_03").attr('style', 'background-image:url("<?php echo base_url().'upload/'; ?>aspa/ico_aspa-negra.jpg?v=<?php echo rand(); ?>");background-position:center;background-repeat:no-repeat');
                      break;

              }

              switch (data.sidiao) {
                  case "1":
                      $("#sidiao_01").attr('style', 'background-image:url("<?php echo base_url().'upload/'; ?>aspa/ico_aspa-negra.jpg?v=<?php echo rand(); ?>");background-position:center;background-repeat:no-repeat');
                      break;
                  case "2":
                       $("#sidiao_02").attr('style', 'background-image:url("<?php echo base_url().'upload/'; ?>aspa/ico_aspa-negra.jpg?v=<?php echo rand(); ?>");background-position:center;background-repeat:no-repeat');
                      break;
                  case "3":
                       $("#sidiao_03").attr('style', 'background-image:url("<?php echo base_url().'upload/'; ?>aspa/ico_aspa-negra.jpg?v=<?php echo rand(); ?>");background-position:center;background-repeat:no-repeat');
                      break;

              }

              switch (data.siotro) {
                  case "1":
                      $("#siotro_01").attr('style', 'background-image:url("<?php echo base_url().'upload/'; ?>aspa/ico_aspa-negra.jpg?v=<?php echo rand(); ?>");background-position:center;background-repeat:no-repeat');
                      break;
                  case "2":
                       $("#siotro_02").attr('style', 'background-image:url("<?php echo base_url().'upload/'; ?>aspa/ico_aspa-negra.jpg?v=<?php echo rand(); ?>");background-position:center;background-repeat:no-repeat');
                      break;
                  case "3":
                       $("#siotro_03").attr('style', 'background-image:url("<?php echo base_url().'upload/'; ?>aspa/ico_aspa-negra.jpg?v=<?php echo rand(); ?>");background-position:center;background-repeat:no-repeat');
                      break;

              }

              switch (data.calpao) {
                  case "1":
                      $("#calpao_01").attr('style', 'background-image:url("<?php echo base_url().'upload/'; ?>aspa/ico_aspa-negra.jpg?v=<?php echo rand(); ?>");background-position:center;background-repeat:no-repeat');
                      break;
                  case "2":
                       $("#calpao_02").attr('style', 'background-image:url("<?php echo base_url().'upload/'; ?>aspa/ico_aspa-negra.jpg?v=<?php echo rand(); ?>");background-position:center;background-repeat:no-repeat');
                      break;
                  case "3":
                       $("#calpao_03").attr('style', 'background-image:url("<?php echo base_url().'upload/'; ?>aspa/ico_aspa-negra.jpg?v=<?php echo rand(); ?>");background-position:center;background-repeat:no-repeat');
                      break;

              }

              switch (data.calotro) {
                  case "1":
                      $("#calotro_01").attr('style', 'background-image:url("<?php echo base_url().'upload/'; ?>aspa/ico_aspa-negra.jpg?v=<?php echo rand(); ?>");background-position:center;background-repeat:no-repeat');
                      break;
                  case "2":
                       $("#calotro_02").attr('style', 'background-image:url("<?php echo base_url().'upload/'; ?>aspa/ico_aspa-negra.jpg?v=<?php echo rand(); ?>");background-position:center;background-repeat:no-repeat');
                      break;
                  case "3":
                       $("#calotro_03").attr('style', 'background-image:url("<?php echo base_url().'upload/'; ?>aspa/ico_aspa-negra.jpg?v=<?php echo rand(); ?>");background-position:center;background-repeat:no-repeat');
                      break;

              }
              


              switch (data.caldiao) {
                  case "1":
                      $("#caldiao_01").attr('style', 'background-image:url("<?php echo base_url().'upload/'; ?>aspa/ico_aspa-negra.jpg?v=<?php echo rand(); ?>");background-position:center;background-repeat:no-repeat');
                      break;
                  case "2":
                       $("#caldiao_02").attr('style', 'background-image:url("<?php echo base_url().'upload/'; ?>aspa/ico_aspa-negra.jpg?v=<?php echo rand(); ?>");background-position:center;background-repeat:no-repeat');
                      break;
                  case "3":
                       $("#caldiao_03").attr('style', 'background-image:url("<?php echo base_url().'upload/'; ?>aspa/ico_aspa-negra.jpg?v=<?php echo rand(); ?>");background-position:center;background-repeat:no-repeat');
                      break;

              }
              switch (data.calfreo) {
                  case "1":
                      $("#calfreo_01").attr('style', 'background-image:url("<?php echo base_url().'upload/'; ?>aspa/ico_aspa-negra.jpg?v=<?php echo rand(); ?>");background-position:center;background-repeat:no-repeat');
                      break;
                  case "2":
                       $("#calfreo_02").attr('style', 'background-image:url("<?php echo base_url().'upload/'; ?>aspa/ico_aspa-negra.jpg?v=<?php echo rand(); ?>");background-position:center;background-repeat:no-repeat');
                      break;
                  case "3":
                       $("#calfreo_03").attr('style', 'background-image:url("<?php echo base_url().'upload/'; ?>aspa/ico_aspa-negra.jpg?v=<?php echo rand(); ?>");background-position:center;background-repeat:no-repeat');
                      break;

              }

              switch (data.parpero) {
                  case "1":
                      $("#parpero_00").attr('style', 'background-image:url("<?php echo base_url().'upload/'; ?>aspa/ico_aspa-negra.jpg?v=<?php echo rand(); ?>");background-position:center;background-repeat:no-repeat');
                      break;
                  case "2":
                       $("#parpero_01").attr('style', 'background-image:url("<?php echo base_url().'upload/'; ?>aspa/ico_aspa-negra.jpg?v=<?php echo rand(); ?>");background-position:center;background-repeat:no-repeat');
                      break;
                  case "3":
                       $("#parpero_02").attr('style', 'background-image:url("<?php echo base_url().'upload/'; ?>aspa/ico_aspa-negra.jpg?v=<?php echo rand(); ?>");background-position:center;background-repeat:no-repeat');
                      break;

              }

              switch (data.calpero) {
                  case "1":
                      $("#calpero_00").attr('style', 'background-image:url("<?php echo base_url().'upload/'; ?>aspa/ico_aspa-negra.jpg?v=<?php echo rand(); ?>");background-position:center;background-repeat:no-repeat');
                      break;
                  case "2":
                       $("#calpero_01").attr('style', 'background-image:url("<?php echo base_url().'upload/'; ?>aspa/ico_aspa-negra.jpg?v=<?php echo rand(); ?>");background-position:center;background-repeat:no-repeat');
                      break;
                  case "3":
                       $("#calpero_02").attr('style', 'background-image:url("<?php echo base_url().'upload/'; ?>aspa/ico_aspa-negra.jpg?v=<?php echo rand(); ?>");background-position:center;background-repeat:no-repeat');
                      break;

              }


              switch (data.parfreo) {
                  case "1":
                      $("#parfreo_00").attr('style', 'background-image:url("<?php echo base_url().'upload/'; ?>aspa/ico_aspa-negra.jpg?v=<?php echo rand(); ?>");background-position:center;background-repeat:no-repeat');
                      break;
                  case "2":
                       $("#parfreo_01").attr('style', 'background-image:url("<?php echo base_url().'upload/'; ?>aspa/ico_aspa-negra.jpg?v=<?php echo rand(); ?>");background-position:center;background-repeat:no-repeat');
                      break;
                  case "3":
                       $("#parfreo_02").attr('style', 'background-image:url("<?php echo base_url().'upload/'; ?>aspa/ico_aspa-negra.jpg?v=<?php echo rand(); ?>");background-position:center;background-repeat:no-repeat');
                      break;

              }
              


              

              


              




              


              
              
              





              //SI O NO

              switch (data.simbolos) {
                  case "N":
                      $("#simbolos_NO").html("<strong>X</strong>");
                      break;
                  case "S":
                       $("#simbolos_SI").html("<strong>X</strong>");
                      break;

              }

              if (data.simaa=="simaa") {
                   $("#id_aa").attr('style', 'background-image:url("<?php echo base_url().'upload/'; ?>aspa/ico_ball-negra.jpg?v=<?php echo rand(); ?>");background-position:center;background-repeat:no-repeat');
              }else{
                   $("#id_aa").attr('style', '');
              }
              if (data.simat=="simat") {
                   $("#id_at").attr('style', 'background-image:url("<?php echo base_url().'upload/'; ?>aspa/ico_ball-negra.jpg?v=<?php echo rand(); ?>");background-position:center;background-repeat:no-repeat');
              }else{
                   $("#id_at").attr('style', '');
              }
              if (data.simax=="simax") {
                   $("#id_ax").attr('style', 'background-image:url("<?php echo base_url().'upload/'; ?>aspa/ico_ball-negra.jpg?v=<?php echo rand(); ?>");background-position:center;background-repeat:no-repeat');
              }else{
                   $("#id_ax").attr('style', '');
              }
              if (data.simbu=="simbu") {
                   $("#id_bu").attr('style', 'background-image:url("<?php echo base_url().'upload/'; ?>aspa/ico_ball-negra.jpg?v=<?php echo rand(); ?>");background-position:center;background-repeat:no-repeat');
              }else{
                   $("#id_bu").attr('style', '');
              }
              if (data.simca=="simca") {
                   $("#id_ca").attr('style', 'background-image:url("<?php echo base_url().'upload/'; ?>aspa/ico_ball-negra.jpg?v=<?php echo rand(); ?>");background-position:center;background-repeat:no-repeat');
              }else{
                   $("#id_ca").attr('style', '');
              }
              if (data.simcg=="simcg") {
                   $("#id_cg").attr('style', 'background-image:url("<?php echo base_url().'upload/'; ?>aspa/ico_ball-negra.jpg?v=<?php echo rand(); ?>");background-position:center;background-repeat:no-repeat');
              }else{
                   $("#id_cg").attr('style', '');
              }
              if (data.simcn=="simcn") {
                   $("#id_cn").attr('style', 'background-image:url("<?php echo base_url().'upload/'; ?>aspa/ico_ball-negra.jpg?v=<?php echo rand(); ?>");background-position:center;background-repeat:no-repeat');
              }else{
                   $("#id_cn").attr('style', '');
              }
              if (data.simco=="simco") {
                   $("#id_co").attr('style', 'background-image:url("<?php echo base_url().'upload/'; ?>aspa/ico_ball-negra.jpg?v=<?php echo rand(); ?>");background-position:center;background-repeat:no-repeat');
              }else{
                   $("#id_co").attr('style', '');
              }
              if (data.simcp=="simcp") {
                   $("#id_cp").attr('style', 'background-image:url("<?php echo base_url().'upload/'; ?>aspa/ico_ball-negra.jpg?v=<?php echo rand(); ?>");background-position:center;background-repeat:no-repeat');
              }else{
                   $("#id_cp").attr('style', '');
              }
              if (data.simcv=="simcv") {
                   $("#id_cv").attr('style', 'background-image:url("<?php echo base_url().'upload/'; ?>aspa/ico_ball-negra.jpg?v=<?php echo rand(); ?>");background-position:center;background-repeat:no-repeat');
              }else{
                   $("#id_cv").attr('style', '');
              }
              if (data.simdi=="simdi") {
                   $("#id_di").attr('style', 'background-image:url("<?php echo base_url().'upload/'; ?>aspa/ico_ball-negra.jpg?v=<?php echo rand(); ?>");background-position:center;background-repeat:no-repeat');
              }else{
                   $("#id_di").attr('style', '');
              }
              if (data.simef=="simef") {
                   $("#id_ef").attr('style', 'background-image:url("<?php echo base_url().'upload/'; ?>aspa/ico_ball-negra.jpg?v=<?php echo rand(); ?>");background-position:center;background-repeat:no-repeat');
              }else{
                   $("#id_ef").attr('style', '');
              }

              if (data.simem=="simem") {
                   $("#id_em").attr('style', 'background-image:url("<?php echo base_url().'upload/'; ?>aspa/ico_ball-negra.jpg?v=<?php echo rand(); ?>");background-position:center;background-repeat:no-repeat');
              }else{
                   $("#id_em").attr('style', '');
              }

              if (data.simes=="simes") {
                   $("#id_es").attr('style', 'background-image:url("<?php echo base_url().'upload/'; ?>aspa/ico_ball-negra.jpg?v=<?php echo rand(); ?>");background-position:center;background-repeat:no-repeat');
              }else{
                   $("#id_es").attr('style', '');
              }

              if (data.simfr=="simfr") {
                   $("#id_fr").attr('style', 'background-image:url("<?php echo base_url().'upload/'; ?>aspa/ico_ball-negra.jpg?v=<?php echo rand(); ?>");background-position:center;background-repeat:no-repeat');
              }else{
                   $("#id_fr").attr('style', '');
              }

              if (data.simhi=="simhi") {
                   $("#id_hi").attr('style', 'background-image:url("<?php echo base_url().'upload/'; ?>aspa/ico_ball-negra.jpg?v=<?php echo rand(); ?>");background-position:center;background-repeat:no-repeat');
              }else{
                   $("#id_hi").attr('style', '');
              }

              if (data.simho=="simho") {
                   $("#id_ho").attr('style', 'background-image:url("<?php echo base_url().'upload/'; ?>aspa/ico_ball-negra.jpg?v=<?php echo rand(); ?>");background-position:center;background-repeat:no-repeat');
              }else{
                   $("#id_ho").attr('style', '');
              }
              if (data.simid=="simid") {
                   $("#id_id").attr('style', 'background-image:url("<?php echo base_url().'upload/'; ?>aspa/ico_ball-negra.jpg?v=<?php echo rand(); ?>");background-position:center;background-repeat:no-repeat');
              }else{
                   $("#id_id").attr('style', '');
              }
              if (data.simih=="simih") {
                   $("#id_ih").attr('style', 'background-image:url("<?php echo base_url().'upload/'; ?>aspa/ico_ball-negra.jpg?v=<?php echo rand(); ?>");background-position:center;background-repeat:no-repeat');
              }else{
                   $("#id_ih").attr('style', '');
              }
              if (data.simkl=="simkl") {
                   $("#id_kl").attr('style', 'background-image:url("<?php echo base_url().'upload/'; ?>aspa/ico_ball-negra.jpg?v=<?php echo rand(); ?>");background-position:center;background-repeat:no-repeat');
              }else{
                   $("#id_kl").attr('style', '');
              }
              if (data.simme=="simme") {
                   $("#id_me").attr('style', 'background-image:url("<?php echo base_url().'upload/'; ?>aspa/ico_ball-negra.jpg?v=<?php echo rand(); ?>");background-position:center;background-repeat:no-repeat');
              }else{
                   $("#id_me").attr('style', '');
              }

              if (data.simpa=="simpa") {
                   $("#id_pa").attr('style', 'background-image:url("<?php echo base_url().'upload/'; ?>aspa/ico_ball-negra.jpg?v=<?php echo rand(); ?>");background-position:center;background-repeat:no-repeat');
              }else{
                   $("#id_pa").attr('style', '');
              }
              if (data.simpb=="simpb") {
                   $("#id_pb").attr('style', 'background-image:url("<?php echo base_url().'upload/'; ?>aspa/ico_ball-negra.jpg?v=<?php echo rand(); ?>");background-position:center;background-repeat:no-repeat');
              }else{
                   $("#id_pb").attr('style', '');
              }
              if (data.simpi=="simpi") {
                   $("#id_pi").attr('style', 'background-image:url("<?php echo base_url().'upload/'; ?>aspa/ico_ball-negra.jpg?v=<?php echo rand(); ?>");background-position:center;background-repeat:no-repeat');
              }else{
                   $("#id_pi").attr('style', '');
              }
              if (data.simpx=="simpx") {
                   $("#id_px").attr('style', 'background-image:url("<?php echo base_url().'upload/'; ?>aspa/ico_ball-negra.jpg?v=<?php echo rand(); ?>");background-position:center;background-repeat:no-repeat');
              }else{
                   $("#id_px").attr('style', '');
              }
              if (data.simra=="simra") {
                   $("#id_ra").attr('style', 'background-image:url("<?php echo base_url().'upload/'; ?>aspa/ico_ball-negra.jpg?v=<?php echo rand(); ?>");background-position:center;background-repeat:no-repeat');
              }else{
                   $("#id_ra").attr('style', '');
              }

              if (data.simrp=="simrp") {
                   $("#id_rp").attr('style', 'background-image:url("<?php echo base_url().'upload/'; ?>aspa/ico_ball-negra.jpg?v=<?php echo rand(); ?>");background-position:center;background-repeat:no-repeat');
              }else{
                   $("#id_rp").attr('style', '');
              }
              if (data.simtb=="simtb") {
                   $("#id_tb").attr('style', 'background-image:url("<?php echo base_url().'upload/'; ?>aspa/ico_ball-negra.jpg?v=<?php echo rand(); ?>");background-position:center;background-repeat:no-repeat');
              }else{
                   $("#id_tb").attr('style', '');
              }

              //oblito
              if (data.oblito=="oblito") {
                   $("#id_oblito").attr('style', 'background-image:url("<?php echo base_url().'upload/'; ?>aspa/ico_aspa-negra.jpg?v=<?php echo rand(); ?>");background-position:center;background-repeat:no-repeat');
              }else{
                   $("#id_oblito").attr('style', '');
              }
              if (data.oblitd=="oblitd") {
                   $("#id_oblitd").attr('style', 'background-image:url("<?php echo base_url().'upload/'; ?>aspa/ico_aspa-negra.jpg?v=<?php echo rand(); ?>");background-position:center;background-repeat:no-repeat');
              }else{
                   $("#id_oblitd").attr('style', '');
              }

              if (data.obliti=="obliti") {
                   $("#id_obliti").attr('style', 'background-image:url("<?php echo base_url().'upload/'; ?>aspa/ico_aspa-negra.jpg?v=<?php echo rand(); ?>");background-position:center;background-repeat:no-repeat');
              }else{
                   $("#id_obliti").attr('style', '');
              }

          })
          .fail(function() {
              console.log("error");
          })
          .always(function() {
              console.log("complete");
          });
      });

      $(document).ready(function() {
          /* Act on the event */ 
              id_paciente = "<?php echo $this->uri->segment(4,0); ?>";  
              $.ajax({
                      url: '<?php echo base_url().'ResultadoFinal/ResultadoFinal/Mostrar_prueba_rapida1/' ?>',
                      type: 'POST',
                      dataType: 'json',
                      data: {id_paciente: id_paciente},
                    })
                    .done(function(data) {
                      console.log("success");

                     
                      

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
                
                        $("#nuevocampo_1").text(data.nuevocampo_1);
                        $("#nuevocampo_2").text(data.nuevocampo_2);
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
                        $("#salto20-impr-slot").text(data.salto20);
                        $("#colesteroltotal_paquete1").text(data.colesteroltotal);
                        $("#colesterolhdl_paquete1").text(data.colesterolhdl);
                        $("#trigliceridos_paquete1").text(data.trigliceridos);
                        $("#colesterolldl_paquete1").text(data.colesterolldl);
                        $("#colesterolvldl_paquete1").text(data.colesterolvldl);
                        //$("#obser_perfillipi").text(data.obser_perfillipi);
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

  </script>


<script>
  

  function impirmir(id) {
      // body...
      
       
       

      document.getElementById("printableArea").print();

     
      
     

  }
</script>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10.10.1/dist/sweetalert2.all.min.js"></script>
<script language=JavaScript>
         <!--

         function inhabilitar(){

             Swal.fire({
              icon: 'error',
              title: 'Oops...',
              text: 'Esta función está inhabilitada.\n\nPerdonen las molestias.',
              footer: '<a href>Comunicate con el Administrador IT</a>'
            })
              return false
         }

         document.oncontextmenu=inhabilitar

         // -->
         </script>
       