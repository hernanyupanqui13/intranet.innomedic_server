
<?php $lista_usuario = $this->db->query("select *,
(select departamento from ts_departamento where Id=a.id_departamento) as departamento, 
(select provincia from ts_provincia where Id=a.id_provincia) as provincia, 
(select distrito from ts_distrito where Id=a.id_distrito) as distrito, 
TIMESTAMPDIFF(YEAR,fecha_nacimiento,CURDATE()) AS edad, (select genero from ts_genero where Id=id_genero) as txtgenero, 
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
            $nombresxx = $emp->nombres;
            $apellido_maternox = $emp->apellido_materno;
            $apellido_paternox = $emp->apellido_paterno;
            $dnix = $emp->nro_documento;
            $direccionx = $emp->direccion;
            $departamento = $emp->departamento;
            $provincia = $emp->provincia;
            $distrito = $emp->distrito;
            $numerox = $emp->numero;
            $interiorx = $emp->interior;
            $mzlotex = $emp->mzlote;
            $referenciax = $emp->referencia;
            $urbanizacionx = $emp->urbanizacion;
            $idx = $emp->Id;
            $imagenx = $emp->imagen;
            $fecha_nacimiento = $emp->fecha_nacimiento;
            $edad = $emp->edad;
            $txtgenero = $emp->txtgenero;
            $txt_civil = $emp->txt_civil;
            $lugar_nacimiento = $emp->lugar_nacimiento;
            $telefono_domicilio = $emp->telefono_domicilio;
            $telefono_movil = $emp->telefono_movil;
            $email = $emp->email;
            $talla = $emp->talla;
            $talla_pantalon = $emp->talla_pantalon;
            $comunicarse_con = $emp->comunicarse_con;
            $nro_emergencia = $emp->nro_emergencia;
            $cantidad_hijos =$emp->cantidad_hijos;
      			$hijos_estudian=$emp->hijos_estudian;
      			$hijos_menores_18=$emp->hijos_menores_18;
      			$hijos_menores_3=$emp->hijos_menores_3;
      			$pensionx = $emp->pension;
      			$puesto = $emp->puesto;
      			$area =  $emp->area;
      			$fecha_ingreso = $emp->fecha_ingreso;
            $firma_xx = $emp->firma;
            $huella_xx = $emp->huella;
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
    <title><?php echo $nombrex; ?>- Constancia-Boletin-Informativo</title>
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
            <p class="loader__label"><?php echo $nombrex; ?></p>
        </div>
    </div>
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="card">
            <div class="card-body">
              <div class="row border border-dark rounded-pill ">
                <div class="col-md-4">
                  <img class="mt-3" src="<?php echo base_url().'assets/';?>images/logo.png" alt="">
                </div>
                <div class="col-md-4 mt-2">
                  <h5 class="text-center font-weight-bold">CONSTANCIA DE ENTREGA DE BOLETÍN INFORMATIVO <br> <small>ACERCA DE LAS CARACTERÍSTICAS DEL SISTEMA PRIVADO DE PENSIONES(SPP) Y DEL SISTEMA NACIONAL DE PENSIONES (SNP)</small></h5>
                </div>
                <div class="col-md-4 mt-2 text-center">
                  <span class="m-5">Codigo: FT-RRHH-00<?php echo $idx; ?> <?php echo fechaES(strftime('%Y')); ?></span>
                </div>
              </div>
              <div class="row">
                <p class="m-3">Por medio del presente documento dejo constancia de:</p>
                <p><b>1.</b> Haber recibido de parte de mi empleador <b>Innomedic International E.I.R.L.,</b> con <b>RUC Nº 20546304761</b> los siguientes documentos:</p>
                <div class="container">
                    <p class="text-justify"><b>a.</b> El Boletín Informativo acerca de las caracteristicas del sistema Privado de Pensiones (SPP) y del sistema Nacional de Pensiones (SNP).</p>
                    <p class="text-justify"><b>b.</b> El formato de Elección del Sistema Pensionario, mediante elm cual podré elegir el sistema de pesiones al cual deseo afiliarme.</p>
                </div>
                <p><b>2.</b> Conocer que en caso de estar iniciando labores en esta empresa:</p>
                <div class="container">
                    <p class="text-justify"><b>a.</b> Debo entregar a mi empleador el Formato de Elección del Sistema Pensionario manifestando mi decisión en el plazo de 10 días calendarios, contados a partir de hoy. </p>
                    <p class="text-justify"><b>b.</b> De no entregar a mi empleador el formato de Elección de Sistema Pensionario manifestando mi decisión en el plazo de 10 días calendarios, contados a partir de hoy, seré afiliado por el mismo al Sistema Privado de Pensiones bajo las condiciones indicadas en el boletín informativo que me ha sido entregado.</p>
                </div>
                
              </div>
              <div class="row">
               <div class="col-md-12">
                  <h5 class=" font-weight-bold">Datos del Trabajador:</h5><br>
                  <p class="font-weight-bold"> Nombres y Apellidos: <span class="font-weight-normal"><?php echo $nombrex_pe; ?></span></p><br>
                  <p class="font-weight-bold">Tipo y Nº de Documento de Identidad: <span class="font-weight-normal"><?php echo $dnix; ?></span></p>
               </div>
              </div>
              <div class="row">
                  <div class="table-responsive">
                      <table border="0" width="100%">
                          <thead >
                              <tr class="text-center p-5 m-5">
                                  <th> <div class="col-md-6 text-center m-5 p-5">
                          <p ><span><img class="img-fluid "  src="<?php echo base_url().'upload/';?>archivos/<?php echo $firma_xx; ?>" alt=""></span><br><span style="text-decoration: overline;">FIRMA DEL TRABAJADOR</span><br><span>DNI: <?php echo $dnix; ?></span></p>
                      </div></th>
                                  <th><div class="col-md-6 text-center ">
                          <p ><span><img class="img-fluid " src="<?php echo base_url().'upload/';?>archivos/<?php echo $huella_xx;?>" alt=""></span><br><span>HUELLA DIGITAL</span></p>
                      </div></th>

                              </tr>
                          </thead>
                      </table>
                  </div>
                </div>
                <div class="text-left">
                         <p class="">Lima <?php echo fechaES(strftime('%d de %B de %Y')); ?></p>
                      </div>
            </div>
          </div>
        </div>
      </div>
    </div>



            <!-- Row -->
        <!-- ============================================================== -->
        <!-- End PAge Content -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Right sidebar -->
        <!-- ============================================================== -->
        <!-- .right-sidebar -->
        
        <!-- ============================================================== -->
        <!-- End Right sidebar -->
        <!-- ============================================================== -->
   
    <!-- ============================================================== -->
    <!-- End Container fluid  -->
    <!-- ============================================================== -->

    <!-- ============================================================== -->
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

 <!-- <!DOCTYPE html>
  <html>
    <head>
      <!--Import Google Icon Font--
      <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
      <title><?php echo $nombrex; ?></title>
      <!--Import materialize.css--
     
      <link href="<?php echo base_url().'pdf/';?>bootstrap.min.css" rel="stylesheet">
      <link href="<?php echo base_url().'pdf/';?>normalize.css" rel="stylesheet">

      <!--Let browser know website is optimized for mobile--
      <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
      <style>
      	@page { margin: 180px 50px; }
		    #header { position: fixed; left: 0px; top: -150px; right: 0px;  text-align: center; }
		   #footer { position: fixed; left: 0px; bottom: -180px; right: 0px; height: 150px; text-align: left;  }
		   /* #footer .page:after { counter-increment: section; content: " " counter(section) ": ";}*/
		    #footer .page:after { content: counter(page, decimal ); }
		    #footerx .pagex:after { content: counter(page, decimal ); }


        p.box2 {
      width:20px;
      margin:10px 80px;
      padding:40px;
      font-size:italic;
      color:#000;
      border: 2px #000000 solid;
      text-align: right;
      }
      p {

        font-family: Century Gothic,CenturyGothic,AppleGothic,sans-serif; 
        margin-top:3px; margin-bottom:3px;
        }
        small{
          font-family: Century Gothic,CenturyGothic,AppleGothic,sans-serif; 
          margin-top:3px; margin-bottom:3px;
        }
      </style>
    </head>

    <body>
    	<div id="header">
    		<table class="table table-bordered" style="border: 2px #000000 solid" >
       
        <tbody >
          <tr >
            <th scope="row" class="text-center" >
      
            <a href="http://www.innomedic.pe/" class="header-logo"><img src="assets/images/innomedic.png" alt=""  style="width: 140px; height: 90px;"></a>
          </th>
            <td style="border: 2px #000000 solid; width: 50%;"  class="font-weight-bold text-justify"><p style="font-size: 11px;">CONSTANCIA DE ENTREGA DE BOLETÍN INFORMATIVO ACERCA DE LAS CARACTERISTICAS DEL SISTEMA PRIVADO DE PENSIONES(SPP) Y DEL SISTEMA NACIONAL DE PENSIONES(SNP)</p></td>
           
           <td style="width: 30%;">
            <div  id="footerx">
              <small class="pagex"><span class="font-weight-bold">Pagina</span>: </small>
            </div>
                <!--<small class="font-weight-normal"><?php echo fechaES(strftime('%B de %Y')); ?></small>--</small>
                <small class="font-weight-bold">Codigo: <small class="font-weight-normal">FT-RRHH-00<?php echo $idx; ?> <?php echo fechaES(strftime('%Y')); ?></small></small>

          </td>

            
          </tr>
        </tbody>
      </table>
    	</div>
    	<div id="footer">
        <small class="page">Pagina </small>
        <div class="container">
          <div class="col-md-12 text-center">
            <p>Pagina web: <a href="<?php echo base_url();?>">www.innomedic.pe</a></p>
          </div>
        </div>
      </div>

    	<div id="content">
    		<div class="container-fluid">

        <p class="m-3">Por medio del presente documento dejo constancia de:</p>
        <p><b>1.</b> Haber recibido de parte de mi empleador <b>Innomedic International E.I.R.L.,</b> con <b>RUC Nº 20546304761</b> los siguientes documentos:</p>
        <div class="container">
            <p class="text-justify"><b>a.</b> El Boletín Informativo acerca de las caracteristicas del sistema Privado de Pensiones (SPP) y del sistema Nacional de Pensiones (SNP).</p>
            <p class="text-justify"><b>b.</b> El formato de Elección del Sistema Pensionario, mediante elm cual podré elegir el sistema de pesiones al cual deseo afiliarme.</p>
        </div>
        <p><b>2.</b> Conocer que en caso de estar iniciando labores en esta empresa:</p>
        <div class="container">
            <p class="text-justify"><b>a.</b> Debo entregar a mi empleador el Formato de Elección del Sistema Pensionario manifestando mi decisión en el plazo de 10 días calendarios, contados a partir de hoy. </p>
            <p class="text-justify"><b>b.</b> De no entregar a mi empleador el formato de Elección de Sistema Pensionario manifestando mi decisión en el plazo de 10 días calendarios, contados a partir de hoy, seré afiliado por el mismo al Sistema Privado de Pensiones bajo las condiciones indicadas en el boletín informativo que me ha sido entregado.</p>
        </div>
        <p><strong>Datos del Trabajador:</strong></p>
        <p> Nombres y Apellidos: <b><?php echo $nombrex_pe; ?></b></p>
        <p>Tipo y Nº de Documento de Identidad: <b><?php echo $dnix; ?></b></p>



      <div class="row">
        <table style="border-collapse:collapse; border: none; padding: 0;margin: 0; max-width: 100%; width: 100%;"  cellpadding="0" cellspacing="0" border="0">
          <tbody class="text-center">
          <tr class="text-center">
          <td style="width: 50%; text-align: center;"><small style="text-decoration: overline;margin-top: 80px; text-align: center; font-size: 15px;">Firma del trabajador</small><br>
            <small style="margin-right: 5px;"><small class="font-weight-bold">DNI:</small> <?php echo $dnix; ?></small></td>
          <td style="width: 50%; text-align: center; float: left;"><p style="margin-left: 125px;" class="box2">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</p>Huella Digital</td>
          </tr>
          </tbody>
          </table>
      </div>
      <div class="text-left">
        <p class="text-left">Lima <?php echo fechaES(strftime('%d de %B de %Y')); ?></p>
      </div>
      


    


    	</div>
    	

    	

    	
    	</div>
    	<div id="footer" class="text-center">
      <p class="page" style="display: none;">Pagina </p>
       <a class="text-center" style="display: none;" href="<?php echo base_url(); ?>"> Innomedic.pe</a>
      </div>
    	

      <!--JavaScript at end of body for optimized loading--
      <script src="<?php echo base_url().'pdf/';?>jquery-3.4.1.slim.min.js"></script>
      <script src="<?php echo base_url().'pdf/';?>popper.min.js"></script>
      <script src="<?php echo base_url().'pdf/';?>bootstrap.min.js"></script>
    </body>
  </html>-->
