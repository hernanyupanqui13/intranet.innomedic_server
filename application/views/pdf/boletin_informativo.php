
<?php $lista_usuario = $this->db->query("select *,(select departamento from ts_departamento where Id=id_departamento) as departamento, (select provincia from ts_provincia where Id=id_departamento) as provincia, 
(select distrito from ts_distrito where Id=id_departamento) as distrito, TIMESTAMPDIFF(YEAR,fecha_nacimiento,CURDATE()) AS edad, (select genero from ts_genero where Id=id_genero) as txtgenero, 
(select civil from ts_estado_civil where Id=id_estado) as txt_civil, 
(select departamento from ts_departamento where Id=id_lugar_nacimiento_dep) as lugar_nacimiento, 
(select cantidad_hijos from ts_datos_familiares where id_datos_personales=a.Id) as cantidad_hijos, 
(select hijos_estudian from ts_datos_familiares where id_datos_personales=a.Id) as hijos_estudian, 
(select hijos_menores_18 from ts_datos_familiares where id_datos_personales=a.Id) as hijos_menores_18, 
(select hijos_menores_3 from ts_datos_familiares where id_datos_personales=a.Id) as hijos_menores_3, 
(select id_tipo_emfermedad from ts_datos_salud where id_datos_personales=a.Id) as salud, 
(select regimen from ts_datos_regimen_pensionario where id_datos_personales=a.Id) as pension 
from ts_datos_personales a where url='".$this->uri->segment(4,0)."'");

	 foreach ($lista_usuario->result() as $emp) {
			      $nombrex = $emp->apellido_paterno." ".$emp->apellido_materno.", ".$emp->nombres;
            $nombrex_pe =$emp->nombres.", ".$emp->apellido_paterno." ".$emp->apellido_materno;
            $idx = $emp->Id;
            $firma_xx = $emp->firma;
            $huella_xx = $emp->huella;
            $imagenx = $emp->imagen;
            $dnix = $emp->nro_documento;

      			
} ?>

<?php //Se define el timezone que sea necesario
      function fechaES($fecha){
            $mes = array(
                'January' => 'Enero',
                'February' => 'Febrero',
                'March' => 'Marzo',
                'April' => 'Abril',
                'May' => 'Mayo',
                'June' => 'Junio',
                'July' => 'Julio',
                'August' => 'Agosto',
                'September' => 'Septiembre',
                'October' => 'Octubre',
                'November' => 'Noviembre',
                'December' => 'Diciembre'
            );

            return strtr($fecha, $mes);
        }

        

        ini_set('date.timezone', 'America/LIma'); 

        //Dia-Mes-Año Hora:Minutos:Segundos
        $fecha = date('d-m-Y H:i:s'); 
      ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="<?php echo base_url().'assets_sistema/';?>images/favicon.png">
    <title><?php echo $nombrex; ?> - Boletín Informativo</title>
    <!-- Custom CSS -->
    <link href="<?php echo base_url().'assets_sistema/';?>dist/css/style.min.css" rel="stylesheet">
     <link href="<?php echo base_url().'pdf/';?>normalize.css" rel="stylesheet">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->
<style>
  .cetury-golf { 
  font-family: Century Gothic,CenturyGothic,AppleGothic,sans-serif; 
  }

</style>

</head>

<body class="skin-blue fixed-layout bg-white cetury-golf">
    <!-- ============================================================== -->
    <!-- Preloader - style you can find in spinners.css -->
    <!-- ============================================================== -->
    <div class="preloader">
        <div class="loader">
            <div class="loader__figure"></div>
            <p class="loader__label"><?php echo $nombrex; ?>  </p>
        </div>
    </div>

    <div class="container mt-0">    
        <!-- ============================================================== -->
        <!-- Row -->
        <div class="row">
            <!-- Column -->
            <div class="col-lg-12 col-xl-12 col-md-12">
                <div class="card">
                    <div class="card-body">
                        <div class="row border border-dark rounded-pill ">
                          <div class="col-md-4">
                            <img src="<?php echo base_url().'assets/';?>images/logo.png" alt="">
                          </div>
                          <div class="col-md-4 mt-2">
                            <h4 class="text-center font-weight-bold"><small>BOLETIN INFORMATIVO DE LAS CARACTERÍSTICAS DEL SISTEMA PRIVADO(SPP) Y DEL SISTEMA NACIONAL DE PENSIONES (ONP)</small></h4>
                          </div>
                          <div class="col-md-4 mt-2 text-center">
                            <span>Codigo: FT-RRHH-00<?php echo $idx; ?> <?php echo fechaES(strftime('%Y')); ?></span>
                          </div>
                        </div>
                        <div class="row m-2">
                          <p><b class="font-weight-bold">1.- ¿Por qué es importante informarse adecuadamente respecto de los sistemas pensionarios?</b></p>
                          <p class="text-justify">Porque los beneficios y condiciones que puedan obtener los trabajadores con derecho a una pensión dependerán de su elección entre los dos sistemas (publico y privado) actualmente existentes en el país. La elección de uno de estos dos sistemas determinara su nivel de protección ante los riesgos que se originen ante la contingencia de terminar su vida laboral (jubilación, incluyendo la invalidez y el fallecimiento).</p>
                          <p><b class="font-weight-bold">2.- ¿Entre qué sistemas de pensiones debe elegir un trabajador?&nbsp;</b></p>
                          <p class="text-justify">Un trabajador debe elegir entre los siguientes sistemas:</p>
                          <div class="table-responsive">
                            <table width="100%" border="1">
                              <thead class="text-center ">
                                <tr class="font-weight-bold">
                                  <td class="font-weight-bold">Sistema Privado de Pensiones – SPP</td>
                                  <td class="font-weight-bold">Sistema Nacional de Pensiones – SNP</td>
                                </tr>
                              </thead>
                              <tbody>
                                <tr class="text-left">
                                  <td class="p-3" style="width: 50%;">. A cargo de las Administradoras Privadas de Fondos de Pensiones (AFP) que son empresas privadas sujetas a regulación y supervisión por parte del Estado. <br> . El SPP funciona mediante una cuenta individual de capitalización (CIC) que pertenece a cada afiliado, donde se abonan los aportes que realiza a lo largo de su vida laboral. <br> 
                                  . El nivel de la pensión depende de los aportes y la rentabilidad que acumule en dicha cuenta más el valor del Bono de Reconocimiento, de ser el caso.</td>
                                  <td class="p-3" style="width: 50%;">. Administrado por la Oficina de Normalización Previsional (ONP) <br>. Los aportes realizados por el trabajador activo forman parte de un fondo común que sirve para financiar el pago de las pensiones de los actuales jubilados del SNP. <br>. El nivel de la pensión depende del cumplimiento de los requisitos de años de aportación realizados y del promedio de sus remuneraciones en los últimos 12, 24, 36,48 o 60 meses de vida laboral, según la ley aplicable.</td>
                                </tr>
                              </tbody>
                              
                            </table>
                            <p class="text-justify">Ambos sistemas tienen por finalidad satisfacer las necesidades del afiliado y su familia cuando llegue la etapa de su jubilación, o, con anterioridad, si sufre alguna invalidez o fallece, otorgando protección a sus beneficiarios</p>
                          </div>

                           <p class="text-justify"><b class="font-weight-bold">3.- ¿Qué plazo tiene el trabajador para decidir a que sistema pensionario afiliarse?</b></p>
                          
                            <p class="text-justify">El trabajador tiene un plazo de diez (10) días contados desde la entrega del presente boletín informativo para expresar su voluntad de afiliarse al SPP o al SNP, teniendo diez (10) días adicionales para cambiar de decisión, siendo el plazo máximo de elección, la fecha en que percibe su remuneración asegurable.</p>
                            <p class="text-justify">Vencido este plazo, sin que el trabajador haya hecho su elección, el empleador le requerirá afiliarse a una AFP</p>
                            <p class="text-justify">Dicha afiliación se hará a la AFP que cobre la menor comisión por administración </p>

                         
                            <p class="text-justify">1 Conforme a lo previsto por la Ley 29903, los nuevos afiliados a partir del 24 de setiembre de 2012, solo se pueden incorporar a la AFP que menor comisión ofrece.</p>
                            <div class="container">
                              <p class="text-justify">Recuerde que si se afilia al SPP ya no podrá regresar al SNP (la decisión es irreversible). Por el contrario, si se afilia al SNP, puede eventualmente migrar al SPP, en cuyo caso seria conveniente la verificación de los aportes efectuados al SNP que se pueden recuperar a través de un Bono de Reconocimiento.</p>
                            </div>
                            <p><b class="font-weight-bold">4.- ¿Qué variables se debe tomar en cuenta para decidir un sistema pensionario?</b></small></p>
                            <div class="container">
                              <p class="text-justify">Al momento de decidir el sistema pensionario al cual afiliarse, el trabajador debería evaluar, entre otros aspectos, lo siguiente:</p>
                              <p class="text-justify"><b class="font-weight-bold">4.1.- Su edad:</b> En el SPP mientras mas joven sea, mayor será la posibilidad de acumulación de recursos en su cuenta individual debido a que el monto estará en relación directa con los años de aportación y la rentabilidad generada por los referidos aportes.</p>
                              <p class="text-justify">Por el contrario, en el SNP esto dependerá de los años de aportación previamente definidos por ley para gozar del beneficio. Así, el numero mínimo de años de aportación para tener derecho a una pensión de jubilación es de 20, supuesto en el cual el monto de la pensión será igual al 50 %, incrementándose en 4 % por cada año adicional de aportación, hasta llegar al 100 % de la remuneración de referencia o al tope de la pensión máxima (S/. 857.36)</p>
                              <p class="text-justify"><b class="font-weight-bold">4.2.- El nivel de sus ingresos:</b> En el SPP, mientras mayores sean los ingresos de los aportes del afiliado, mayores serán sus aportes a su cuenta individual, razón por lo cual es de esperarse que perciba una pensión mayor a la que reciban otros trabajadores con igual tiempo de aportes pero menores ingresos.</p>
                              <p class="text-justify">Por el contrario, en el SNP, si bien es cierto que la pensión esta calculada en función de la remuneración de referencia del afiliado, debe tenerse presente que en este caso el monto de la pensión se encuentra sujeto a un tope máximo (S/. 857.36); razón por la cual, alcanzado el referido tope, resulte irrelevante para el monto pensionario, cualquier incremento en la remuneración del afiliado.</p>

                            </div>
                            <p><b class="font-weight-bold">5.- ¿Cuanto se aporta mensualmente a cada sistema pensionario?</b></p>
                           
                            <p>Los nuevos afiliados se encuentran afectos al esquema siguiente:</p>
                           
                             <table width="100%" border="1">
                              <tbody>
                                <tr class="text-left pt-4">
                                  <td class="mt-2"><p class="text-left">El trabajador aporta del siguiente modo:</p>
                                    <ul style="list-style-type: disc;">
                                    <li> 10 % de la remuneraci&oacute;n asegurable destinada a la Cuenta Individual de Capitalizaci&oacute;n (CIC);</small></li>
                                    <li> Un porcentaje de la remuneraci&oacute;n asegurabledestinada a financiar las prestaciones de invalidez, sobrevivencia y gastos de sepelio.2 </li>
                                    <li> Una comisi&oacute;n porcentual sobre su remuneraci&oacute;n asegurable (comisi&oacute;n por flujo) y/o una comisi&oacute;n sobre el saldo del fondo de pensiones (omisi&oacute;n sobre el saldo)3 </li>
                                    </ul> </td>
                                  <td class="mt-2" style="width: 50%;">El trabajador aporta el 13 % de la remuneración mensual, monto que incluye el financiamiento de los gastos administrativos del sistema. </td>
                                </tr>
                              </tbody>
                              
                            </table>
                            <p class="text-justify font-weight-bold">2 El valor de la prima de seguro se determina en base a un proceso de licitación del seguro previsional.  </p>
                            <p class="text-justify">  3 El esquema de comisión mixta (comisión sobre el flujo +comisión sobre el saldo) se aplicara para los nuevos afiliados que se incorporen por primera vez al mercado laboral bajo el esquema de licitación, así como a aquellos afiliados que no hayan optado por permanecer en el esquema de comisión sobre el flujo. El esquema de comisión sobre el flujo será aplicable, únicamente, a los afiliados que han optado por permanecer en este. </p>
                            <br>  
                           <table width="100%" border="1">
                              <tbody>
                                <tr class="text-left pt-4">
                                  <td class="p-2 "><p class="font-weight-bold">concepto del servicio de administraci&oacute;n de los fondos del afiliado. </p>
                                  <p>Los porcentajes de la comisi&oacute;n de la AFP por la administraci&oacute;n de aportes, son variables y son determinados por cada administradora. Cabe resaltar que si el trabajador no elige un sistema previsional, ser&aacute; requerido a afiliarse a la AFP que cobre la menor comisi&oacute;n por administraci&oacute;n del sistema. </p> </td>
                                  <td class="mt-2" style="width: 50%;"> </td>
                                </tr>
                              </tbody>
                              
                            </table>
                            <p> <b class="font-weight-bold">6.- ¿A qué beneficios se tiene derecho en los sistemas de Pensiones?</b> </p>
                           
                            <p class="text-justify"> Ambos sistema cubren las contingencias de la jubilación, invalidez así como el fallecimiento, en cuyo caso, otorgan pensiones de sobrevivencia al viudo(a), hijos y/o padres del afiliado o asegurado fallecido, según las disposiciones de cada sistema. </p>
                              <p> Así, de modo comparativo, los principales beneficios que provee cada sistema son: </p>

                            <table width="100%" border="1">
                              <thead class="text-center font-weight-bold">
                                <tr>
                                  <td> SPP </td>
                                  <td> SNP </td>
                                </tr>
                              </thead>
                              <tbody>
                                <tr class="text-left">
                                  <td width="50%"><p class="m-2"> 1.Pensi&oacute;n de jubilaci&oacute;n </p>
                                    <p class="m-2"> 2.Pensi&oacute;n invalidez </p>
                                    <p class="m-2"> 3.Pensi&oacute;n de sobrevivencia 4 (no excede del 100 </p>
                                    <p class="m-2"> % de la remuneraci&oacute;n mensual del afiliado) </p>
                                    <p class="m-2"> - 42 % para la viuda sin hijos;  </p>
                                    <p class="m-2"> - 35 % para la viuda con hijos;  </p>
                                    <p class="m-2"> - 14 % para cada hijo  </p>
                                    <p class="m-2"> - 14 % para los padres, en caso se encuentren  </p>
                                    <p class="m-2"> en condici&oacute;n de dependencia y sean mayores de 60  </p>
                                    <p class="m-2"> a&ntilde;os.</p>
                                    <p class="m-2"> Los hijos reciben pensi&oacute;n hasta los 18 a&ntilde;os de  </p>
                                    <p class="m-2"> edad o m&aacute;s all&aacute; de dicha edad si es que se encuentran  </p>
                                    <p class="m-2"> incapacitados de manera total y permanente para el  </p>
                                    <p class="m-2"> trabajo.  </p>
                                    <p class="m-2">   4.Gastos de sepelio.</p>  </td>
                                  <td>
                                    <p class="m-2"> 1.Pensi&oacute;n de jubilaci&oacute;n  </p>
                                    <p class="m-2">  2.Pensi&oacute;n invalidez  </p>
                                    <p class="m-2">  3.Pensi&oacute;n de sobrevivencia (no excede del 100 % de la pensi&oacute;n mensual del asegurado).  </p>
                                    <p class="m-2"> &nbsp;- 50 % para la viuda.   </p>
                                    <p class="m-2"> - 50 % para los hijos menores de 18 a&ntilde;os. La pensi&oacute;n se puede exceder mas all&aacute; de tal edad, si es que est&aacute;n incapacitados para el trabajo o siguen estudios de nivel b&aacute;sico o superior de manera ininterrumpida.   </p>
                                    <p class="m-2"> - 20 % para cada uno de los padres; siempre que no hubiera beneficiarios de viudez u orfandad, sea discapacitado o tengan mas de 60 o mas a&ntilde;os de edad en el caso del padre y 55 en caso de la madre.  </p>
                                    <p class="m-2"> Adicionalmente, estos deben depender econ&oacute;micamente del causante y no percibir ingresos superiores a la probable pensi&oacute;n.  </p>
                                    <p class="m-2"> 4. Capital de defunci&oacute;n que cumple las mismas funciones que los gastos de sepelio.  </p>  </td>
                                </tr>
                              </tbody>
                              
                            </table>
                            
                            <p class="text-justify"> 4 A partir de la entrada en vigencia de la Ley Nro. 29903, las condiciones de acceso a las pensiones de sobrevivencia relativas a la edad serán las mimas que las aplicables en el SNP, incluyendo las referidas al hijo mayor de edad que sigue estudios de manera ininterrumpida de nivel básico o superior, así como también respecto a la edad de la madre, (55) años de edad.  </p>
                         

                          <p> <b class="font-weight-bold">7.- ¿Qué mecanismos de protección en cuanto a jubilación otorga el Estado a los sistemas pensionarios?</b>  </p>
                          <p class="text-justify"> El Estado, garantiza el pago de una pensión mínima para los afiliados al SPP o al SNP, siempre que estos cumplan con los requisitos y exigencias definidos en cada sistema. Así, comparativamente se tiene lo siguiente:  </p>

                          <table width="100%" border="1">
                            <thead>
                              <tr class="text-center font-weight-bold">
                                <td> SPP  </td>
                                <td> SNP  </td>
                              </tr>
                            </thead>
                            <tbody>
                              <tr class="text-center pt-2">
                                <td class="m-2"> En el caso de la jubilación, la pensión mínima es de S/.5,810 anuales que equivale a 12 pagos mensuales de S/.484.17  </td>
                                <td class="m-2"> En el caso de jubilación, la pensión mínima asciende a S/. 5,810 anuales que equivale a 14 pagos mensuales de S/.415  </td>
                              </tr>
                            </tbody>
                          </table>
                          <p class="font-weight-bold"> 8.- ¿Qué requisitos se deben cumplir para tener derecho a la pensión mínima? &nbsp;</p>
                          <p> En ambos sistema, la exigencia es tener 65 años de edad.  </p>
                          <p class="text-justify"> En el caso del Sistema Nacional además deberá contar con 20 años de aportación, para este efecto deben efectuarse aportes sobre una base no menor a la remuneración mínima vital (RMV) vigente en  </p>
                          <p class="text-justify"> En el caso del SPP, además de los requisitos señalados, solo tienen posibilidad de acceder a esta pensión mínima quienes hayan pertenecido al SNP hasta el mes de diciembre de 1992 y luego se hayan incorporado al SPP siempre que la pensión que se alcance con lo acumulado en la Cuenta individual y el Bono de Reconocimiento no llegue a la pensión mínima  </p>
                          <p> <b class="font-weight-bold">9.- ¿Existe un tope en el monto de la pensión que se percibe en los sistemas</b>  </p>
                          <p class="text-justify"> En el SPP <span style="text-decoration: underline;">no existe un valor tope   a la pensión, dado que su valor esta en función a los aportes acumulados por el afiliado en su cuenta individual, el rendimiento alcanzado por dichos aportes a lo largo de los años, y de ser el caso, el valor del bono de reconocimiento. En consecuencia, debe tenerse presente que el pago de la pensión siempre deberá estar respaldado por el saldo en la cuenta individual de capitalización del afiliado. </span> </p>
                          <p class="text-justify"> En el SNP, la pensión si tiene un tope que es determinado por el Estado. A la fecha, la pensión máxima que se otorga en este sistema es S/. 857.3  </p>
                          <p> <b class="font-weight-bold">10.- ¿A qué edad se alcanza la jubilación en ambos sistemas pensionario</b>  </p>
                          <p> ionarios? Tanto en el SPP como el SNP la jubilación se puede alcanzar desde los 65 años  </p>
                          <p> <b class="font-weight-bold">65 años. 11.- ¿Se puede acceder a una jubilación antes de la edad de 65 años?</b>  </p>
                          <p> En ambos sistemas existe la posibilidad de jubilarse antes de los 65 años, teniendo en cuenta las siguientes consideraciones:  </p>

                          <table width="100%" border="1">
                            <thead>
                              <tr class="text-center font-weight-bold">
                                <td> SPP  </td>
                                <td> SNP  </td>
                              </tr>
                            </thead>
                            <tbody>
                              <tr class="text-left pt-2">
                                <td class="mt-2"> 
                                <p class="m-2"> <strong>Jubilaci&oacute;n anticipada ordinaria:</strong>  </p>
                                <p class="m-2"> Si la pensi&oacute;n es igual o superior al 50%5 de la remuneraci&oacute;n promedio de los &uacute;ltimos 120 meses, y registra un m&iacute;nimo de 72 aportes en el referido periodo. Para esta opci&oacute;n no hay una edad m&iacute;nima exigible.  </p>
                                <p class="m-2"> En este caso, el afiliado se puede pensionar, bajo la modalidad de pensi&oacute;n que elija.  </p>
                                <p class="m-2"> <strong>R&eacute;gimen Especial de Jubilaci&oacute;n Anticipada: </strong>  </p>
                                <p class="m-2"> A partir de 55 a&ntilde;os los hombres y 50 a&ntilde;os las mujeres; siempre que se encuentren en situaci&oacute;n de desempleo por doce (12) meses anteriores a la presentaci&oacute;n de la solicitud. Si la pensi&oacute;n es igual o mayor a la Remuneraci&oacute;n M&iacute;nima Vital se otorgara pensi&oacute;n, pero si resulta menor se podr&aacute; devolver el 50 % del monto acumulado en la cuenta individual.  </p>
                                <p class="m-2"> Este r&eacute;gimen culmina el 31 de diciembre de 2013.  </p>  </td>
                                              <td class="mt-2"> <p> Jubilaci&oacute;n Adelantada  </p>
                                <ul>
                                <li> Hombres: A partir de los 55 a&ntilde;os de edad y 30 a&ntilde;os de aporte;  </li>
                                <li> Mujeres: A partir de los 50 a&ntilde;os de edad y 25 a&ntilde;os de aporte.  </li>
                                </ul>
                                <p class="m-2"> En caso de jubilaci&oacute;n adelantada la pensi&oacute;n se reduce en 4 % por cada a&ntilde;o de adelanto respecto de los 65 a&ntilde;os de edad.  </p>
                                <p class="m-2"> Cabe se&ntilde;alar que, adem&aacute;s se otorga pensi&oacute;n por los llamados reg&iacute;menes especiales a los trabajadores mineros, de construcci&oacute;n civil, de la industria del cuero, mar&iacute;timos, pilotos y periodistas, de acuerdo a su legislaci&oacute;n particular.  </p>  </td>
                              </tr>
                            </tbody>
                          </table>
                          <p> <b class="font-weight-bold">12.- ¿Que otras características tienen cada uno de los sistemas pensionario?</b> &nbsp;</p>
                          <p> Cuando el afiliado se encuentra trabajando:  </p>
                          <p class="text-justify"> En el caso del SPP, el afiliado puede eventualmente cambiar a otra AFP si así lo decide, salvo que se trate de un afiliado licitado a la AFP que ofrecía la menor comisión de administración de fondos, pues en tal caso, deberá respetar el plazo de permanencia obligatorio, contados a partir de la fecha de su afiliación en la mencionada AFP. <br>  
                          Excepcionalmente, el afiliado podrá traspasar sus fondos a otra AFP durante el periodo de permanencia obligatorio a una AFP si la rentabilidad neta de comisión por tipo de Fondo de tal AFP resulte menor en comparación al mercado o si esta es declarada en quiebra, disolución o se encuentre en proceso de liquidación.  </p>
                          <p> Asimismo, en el SPP, el afiliado puede escoger entre cuatro tipos de fondos para realizar sus aportes:  </p>

                          <div class="container">
                            <p> <ol style="list-style-type: lower-alpha;">
                              <li> Fondo 0 o de protecci&oacute;n6 (muy bajo riesgo) obligatorio para todos los afiliados al cumplir 65 a&ntilde;os y hasta que opten por una pensi&oacute;n de jubilaci&oacute;n.  </li>
                              <li> Fondo 1 o Conservador (bajo riesgo), de car&aacute;cter obligatorio para la administraci&oacute;n de recursos de todos los afiliados mayores de 60 y menores de 65 a&ntilde;os.  </li>
                              <li> Fondo 2 o Mixto (riesgo medio);&nbsp;  </li>
                              </ol>  </p>
                          </div>

                          <p> A partir de la entrada en vigencia de la Ley Nro. 29903, el porcentaje que regirá será de 40 % de la remuneración promedio. <br> 6 Este tipo de Fondo será aplicable una vez que la Ley Nro 29903 entre en vigencia.  </p>

                          <div class="container">
                            <p> <ol style="list-style-type: lower-alpha;">
                              <li>  Fondo 3 o de mayor riesgo (pero mayor rentabilidad esperada).  </li>
                        
                              </ol>  </p>
                          </div>
                        <p> El trabajador tiene la opción de cambiar de tipo de fondo en base al nivel de riesgo que este dispuesto a asumir. Adicionalmente, puede realizar aportes voluntarios con la finalidad de incrementar el saldo de su cuenta individual y mejorar su pensión en el futuro. <br> En el caso del SNP, el trabajador realiza sus aportes a un solo fondo de carácter colectivo por tanto no existen elecciones adicionales que tomar.  </p>

                        <p> <b class="font-weight-bold">13.- ¿Que otras características son aplicables al momento en que se percibe de algún beneficio?</b>  </p>
                        <p> Cuando el afiliado o sus beneficiarios van a recibir algún beneficio (jubilación, invalidez o sobrevivencia):  </p>
                        <p><ul>
                        <li> En el SPP, el afiliado o sus beneficiarios pueden optar por percibir su pensi&oacute;n en nuevos soles (ajustados a la inflaci&oacute;n o una tasa fija anual del 2 %) o en d&oacute;lares americanos (ajustados a una tasa fija anual del 2 %). En el SNP la pensi&oacute;n se otorga &uacute;nicamente en nuevos soles y sin ning&uacute;n mecanismo autom&aacute;tico de ajuste en el tiempo.  </li>
                        <li> &nbsp;En ambos sistemas, se proveen pensiones de car&aacute;cter vitalicio que otorgan protecci&oacute;n ante la jubilaci&oacute;n o invalidez del afiliado o asegurado, as&iacute; como de protecci&oacute;n al grupo familiar o beneficiarios, en caso de fallecimiento, de acuerdo con lo antes se&ntilde;alado  . <br>   Lima <?php echo fechaES(strftime('%d de %B de %Y')); ?></li>
                        </ul></p>
                          
                        </div>
                        <div class="row">
                          <div class="table-responsive">
                              <table border="0" width="100%">
                                  <thead >
                                      <tr class="text-center p-5 m-5">
                                          <th> <div class="col-md-6 text-center m-5 p-5">
                                  <p ><span><img class="img-fluid " style="width: 313px; height: 135px;" src="<?php echo base_url().'upload/';?>archivos/<?php echo $firma_xx; ?>" alt=""></span><br><span style="text-decoration: overline;">FIRMA DEL TRABAJADOR</span><br><span>DNI: <?php echo $dnix; ?></span></p>
                              </div></th>
                                          <th><div class="col-md-6 text-center ">
                                  <p ><span><img class="img-fluid " style="width: 250px; height: 180px;" src="<?php echo base_url().'upload/';?>archivos/<?php echo $huella_xx;?>" alt=""></span><br><span>HUELLA DIGITAL</span></p>
                              </div></th>

                                      </tr>
                                  </thead>
                              </table>
                          </div>
                        </div>
                        
                    </div>
                </div>
             </div>
        </div>
    </div>





    <!-- End Wrapper -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- All Jquery -->
    <!-- ============================================================== -->
    <script src="<?php echo base_url().'assets_sistema/';?>node_modules/jquery/jquery-3.2.1.min.js"></script>
    <!-- Bootstrap tether Core JavaScript -->
    <script src="<?php echo base_url().'assets_sistema/';?>node_modules/popper/popper.min.js"></script>
    <script src="<?php echo base_url().'assets_sistema/';?>node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- slimscrollbar scrollbar JavaScript -->
    <script src="<?php echo base_url().'assets_sistema/';?>dist/js/perfect-scrollbar.jquery.min.js"></script>
    <!--Wave Effects -->
    <script src="<?php echo base_url().'assets_sistema/';?>dist/js/waves.js"></script>
    <!--Menu sidebar -->
    <script src="<?php echo base_url().'assets_sistema/';?>dist/js/sidebarmenu.js"></script>
    <!--stickey kit -->
    <script src="<?php echo base_url().'assets_sistema/';?>node_modules/sticky-kit-master/dist/sticky-kit.min.js"></script>
    <script src="<?php echo base_url().'assets_sistema/';?>node_modules/sparkline/jquery.sparkline.min.js"></script>
    <!--Custom JavaScript -->
    <script src="<?php echo base_url().'assets_sistema/';?>dist/js/custom.min.js"></script>
</body>

</html>
