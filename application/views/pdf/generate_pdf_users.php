<?php if (!empty($generate_pdf_users)) {
        foreach ($generate_pdf_users as $emp) {
            $nombrex = $emp->apellido_paterno." ".$emp->apellido_materno.", ".$emp->nombres;
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
			$pensionx = $emp->pension;
			$puesto = $emp->puesto;
			$area =  $emp->area;
			$fecha_ingreso = $emp->fecha_ingreso;
            $firma_xx = $emp->firma;
            $huella_xx = $emp->huella;

        }
    }else{

        redirect(base_url().'Mantenimiento/Usuario/');
        
    } ?>
    <?php foreach ($tipo_enfermedades as $xx) {
         $id_tipo_emfermedad_xx = $xx->id_tipo_emfermedad;
         $otros_description_xx = $xx->otros_description;
         $id_tratamiento_xx = $xx->id_tratamiento;
             
    } ?>
    <?php $query = $this->db->query("select * from ts_datos_familiares where url='".$this->uri->segment(4,0)."'");
    foreach ($query->result() as $xx) {
         $cantidad_hijos =$xx->cantidad_hijos;
        $hijos_estudian=$xx->hijos_estudian;
        $hijos_menores_18=$xx->hijos_menores_18;
        $hijos_menores_3=$xx->hijos_menores_3;
     } ?>

    <?php 
    $ixxx=$pensionx;
    switch ($ixxx) {
       case "Habitat":
             $retorna = "<strong>AFP </strong>: Habitat";
             break;
       case "Prima":
              $retorna = "<strong>AFP </strong>: Prima";
             break;
       case "Profuturo":
              $retorna = "<strong>AFP </strong>: Profuturo";
             break;
        case "Integra":
              $retorna = "<strong>AFP </strong>: Integra";
             break;
        case "ONP":
             $retorna = "<strong>ONP</strong>";
             break;
        default:
         $retorna = "<strong>Nuevo Ingreso</strong>";
    }


    ?>

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
    <title><?php echo $nombrex; ?> - Ficha Personal</title>
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


    <!-- ============================================================== -->
    <!-- Main wrapper - style you can find in pages.scss -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- Container fluid  -->
    <!-- ============================================================== -->
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
    							<h4 class="text-center font-weight-bold">FICHA DE DATOS PERSONALES DEL TRABAJADOR</h4>
    						</div>
    						<div class="col-md-4 mt-2 text-center">
    							<span>Codigo: FT-RRHH-00<?php echo $idx; ?> <?php echo fechaES(strftime('%Y')); ?></span>
    						</div>
    					</div>
                        <div class="row">
	                        <div class="col-md-8 ">
	                        	<div class="p-0 mt-5"> 
		                            <h4 class="card-title m-t-10">PUESTO: <small><?php echo $puesto;?></small></h4>
		                            <h4 class="card-title">ÁREA: <small><?php echo $area; ?></small></h4>
		                          	<h4 class="card-title">FECHA DE INGRESO: <small><?php echo $fecha_ingreso; ?></small></h4>
		                        </div>
	                        </div>
	                        <div class="col-md-4 text-center">
	                        	<div class="m-t-30"> <?php if ($imagenx=="" || $imagenx==null) {?>
                                    <img src="<?php echo base_url().'upload/';?>/images/<?php echo "foto.png";?>" class=""   />
                               <?php  }else{?>
                                    <img src="<?php echo base_url().'upload/';?>/images/<?php echo $imagenx;?>" class="" style="border: 2px solid #000000; width: 150px;"  />
                                <?php } ?>
		                            <h6 class="card-subtitle m-t-10 text-center">Imagen</h6>
		                            
		                        </div>
	                        </div>
                        </div>
                    </div>
            
                	<h5 class="font-weight-normal">1. DATOS PERSONALES</h5>
                	<div class="table-responsive">
                        <table border="1" width="100%" >
                            <thead>
                                <tr class="text-center font-weight-bold">
                                    <th>APELLIDO PATERNO</th>
                                    <th>APELLIDO MATERNO</th>
                                    <th>NOMBRES</th>  
                                </tr>
                            </thead>
                            <tbody>
                            	<tr class="text-center ">
                            		<td class="p-2"><?php echo $nombresxx;?></td>
                            		<td class="p-2"><?php echo $apellido_maternox;?></td>
                            		<td class="p-2"><?php echo $apellido_paternox; ?></td>
                            	</tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="table-responsive">
                        <table border="1" width="100%">
                            <thead>
                                <tr class="text-center ">
                                    <th>Nº DE DNI CARNET DE EXTRANJERIA</th>
                                    <th>DOMICILIO <small>(Av, Jr, Calle)- URB/COOP/AA.HH/PJ/(Residencia actual)</small></th>
                                    <th>PROVINCIA / DISTRITO <small>(residencia actual)</small></th>
                                    
                                </tr>
                            </thead>
                            <tbody>
                            	<tr class="text-center">
                            		<td class="p-2"><?php echo $dnix;?></td>
                            		<td class="p-2"><?php echo $direccionx;?> / <?php echo $numerox; ?> / <?php echo $interiorx; ?> / <?php echo $mzlotex; ?> / <?php echo $urbanizacionx; ?></td>
                            		<td class="p-2"><?php echo $distrito;?> - <?php echo $provincia; ?> - <?php echo $departamento;?> </td>
                            	
                            	</tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="table-responsive">
                        <table border="1" width="100%">
                            <thead>
                                <tr class="text-center ">
                                    <th>FECHA DE NACIMIENTO</th>
                                    <th>EDAD</th>
                                    <th>SEXO</th>
                                    <th>ESTADO CIVIL</th>
                                </tr>
                            </thead>
                            <tbody>
                            	<tr class="text-center">
                            		<td class="p-2"><?php echo $fecha_nacimiento;?></td>
                            		<td class="p-2"><?php echo $edad;?></td>
                            		<td class="p-2"><?php echo $txtgenero; ?> </td>
                            		<td class="p-2"><?php echo $txt_civil;?></td>
                            	
                            	</tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="table-responsive">
                        <table border="1" width="100%">
                            <thead>
                                <tr class="text-center ">
                                    <th>LUGAR DE NACIMIENTO</th>
                                    <th>TELEFONO DOMICILIO</th>
                                    <th>TELEFONO MOVIL</th>
                                    <th>CORREO ELECTRÓNICO</th>
                                </tr>
                            </thead>
                            <tbody>
                            	<tr class="text-center">
                            		<td class="p-2"><?php echo $lugar_nacimiento;?></td>
                            		<td class="p-2"><?php echo $telefono_domicilio;?></td>
                            		<td class="p-2"><?php echo $telefono_movil; ?> </td>
                            		<td class="p-2"><?php echo $email;?></td>
                            	</tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="table-responsive">
                        <table border="1" width="100%">
                            <thead>
                                <tr class="text-center ">
                                    <th>TALLA: <small> CHAQUETA/GUARDAPOLVO/CAMISA / BLUSA</small></th>
                                    <th>TALLA PANTALON</th>
                                    <th>INDIQUE UN Nº DE TELEFONO EN CASO DE EMERGENCIA</th>
                                </tr>
                            </thead>
                            <tbody>
                            	<tr class="text-center">
                            		<td class="p-2">Talla: <?php echo $talla;?></td>
                            		<td class="p-2">Talla: <?php echo $talla_pantalon;?></td>
                            		<td class="p-2"><b>Comunicarse con: </b><?php echo $comunicarse_con; ?><br>
                            		<b>Al Teléfono: </b> <?php echo $nro_emergencia; ?></td>
                            	</tr>
                            </tbody>
                        </table>
                    </div>
                    <h5 class="font-weight-normal mt-2">2. DATOS FAMILIARES</h5>
                    <div class="table-responsive">
                        <table border="1" width="100%">
                            <tbody>
                                <tr class="text-center">
                                    <th>CANTIDAD DE HIJOS:</th>
                                    <th style="width: 20%;"><?php echo $cantidad_hijos; ?></th>
                                    <th>HIJOS MENORES DE 18 AÑOS:</th>
                                    <th style="width: 20%;"><?php echo $hijos_menores_18; ?></th>
                                  
                                </tr>
                                <tr class="text-center">
                                	<th>HIJOS QUE ESTUDIAN:</th>
                                    <th style="width: 20%;"><?php echo $hijos_estudian; ?></th>
                                    <th>HIJOS MENORES DE 3 AÑOS:</th>
                                    <th style="width: 20%;"><?php echo $hijos_menores_3; ?></th>
                                </tr>
                            </tbody>
                           
                        </table>
                    </div>
                    <h5 class="font-weight-normal mt-2"><small>2.1 DATOS REFERENTES A LA FAMILIA DEL TRABAJADOR (PADRES, CONYUGE, HIJOS DEL TRABAJADOR)</small></h5>
                    <div class="table-responsive">
                        <table border="1" width="100%">
							<thead>
								<tr class="text-center">
									<th>APELLIDOS Y NOMBRES</th>
									<th>PARENTESCO</th>
									<th>FECHA DE NACIMIENTO</th>
									<th>OCUPACION</th>
									<th>ESTADO CIVIL</th>
									<th>VIVE</th>
								</tr>
							</thead>
                            <tbody>
                            	<?php foreach ($lista_registro_familiares_parentesco as $xx) {?>
                            		<tr class="text-center">
                                        <td class="p-2"><?php echo $xx->nombres; ?></td>
										<td class="p-2"><?php echo $xx->parentescos ?></td>
										<td class="p-2"><?php echo $xx->fecha_nacimiento;?></td>
										<td class="p-2"><?php echo $xx->ocupacion;?></td>		
										<td class="p-2"><?php echo $xx->txt_civil;?></td>
										<td class="p-2"><?php echo $xx->vive;?></td>
                                    </tr>
                            	<?php } ?>
                                
                            </tbody>
                           
                        </table>
                    </div>
                    <h5 class="font-weight-normal mt-2">3. SALUD <br><small>Enfermedades que poseo son:</small></h5>
                    <div class="table-responsive">
                        <table border="1" width="100%">
                            <tbody class="text-center">
                                <tr>
                                    <td>
                                        <?php if ($id_tipo_emfermedad_xx=="" || $id_tipo_emfermedad_xx==null) {
                                            echo "-----------------------------------------------";
                                        }else{
                                           // echo $id_tipo_emfermedad_xx;
                                            echo '<div class="tags-default">
                                                
                                                '.$id_tipo_emfermedad_xx.'
                                                </div>';
                                        }?>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <div class="text-justify p-2">
                            <h6 class="font-weight-normal">Descripción</h6>
                            <p><?php if ($otros_description_xx=="" ||  $otros_description_xx == null) {
                                echo "-----------------------------------------------------------";
                            }else{
                                echo $otros_description_xx;
                            }?></p>
                        </div>
                        <div class="text-right">
                           <p> Recibe atención médica y/o tratamiento: <strong class="border border-dark p-1 m-1"><?php if ($id_tratamiento_xx=="" || $id_tratamiento_xx == null) {
                            echo "--";
                               # code...
                           }else{
                            echo $id_tratamiento_xx;
                           } ?></strong></p>
                        </div>
                    </div>
                    <h5 class="font-weight-normal mt-2">4. REGIMEN PENSIONARIO</h5>
                    <div class="table-responsive">
                        <table border="1" width="100%">
                            <tbody>
                               
                                    <tr class="text-center">
                                        <td class="p-1"><?php echo $retorna; ?></td>
                                    </tr>

                                
                            </tbody>
                           
                        </table>
                    </div>
                    <h5 class="font-weight-normal mt-2">5. FORMACION ACADEMICA</h5>
                    <div class="table-responsive">
                        <table border="1" width="100%">
                            <thead>
                                <tr class="text-center ">
                                    <th>5.1 EDUCACIÓN</th>
                                    <th>COMPLETA Y/O INCOMPLETA</th>
                                    <th>CENTRO DE ESTUDIOS</th>
                                    <th>DESDE</th>
                                    <th>HASTA</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($ts_datos_formacion_academica as $xx) {?>
                                    <tr class="text-center">
                                        <td class="p-2"><?php echo $xx->educacion; ?></td>
                                        <td class="p-2"><?php echo $xx->comple_incomple; ?></td>
                                        <td class="p-2"><?php echo $xx->centro_estudios;?></td>
                                        <td class="p-2"><?php echo $xx->desde; ?></td>
                                        <td class="p-2"><?php echo $xx->hasta;?></td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                    <div class="table-responsive">
                        <table border="1" width="100%">
                            <thead>
                                <tr class="text-center ">
                                    <th>5.2 EDUCACIÓN SUPERIOR</th>
                                    <th>ESPECIALIDAD</th>
                                    <th>DESDE</th>
                                    <th>HASTA</th>
                                    <th>COMPLETA Y/O INCOMPLETA</th>
                                    <th>Grado Académico Obtenido <small>(Titulo, Bachiller, Egresado)</small></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($ts_datos_educacion_superior as $xx) {?>
                                    <tr class="text-center">
                                        <td class="p-2"><?php echo $xx->centro_estudios; ?></td>
                                        <td class="p-2"><?php echo $xx->especialidad; ?></td>
                                        <td class="p-2" style="width: 10%;"><?php echo $xx->desde; ?></td>
                                        <td class="p-2" style="width: 10%;"><?php echo $xx->hasta;?></td>
                                        <td class="p-2"><?php echo $xx->comple_incomple; ?></td>
                                        <td class="p-2"><?php echo $xx->grado_academica; ?></td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                    <h5 class="font-weight-normal mt-2" >6. CONOCIMIENTO DE IDIOMAS</h5>
                    <div class="table-responsive">
                        <table border="1" width="100%">
                            <thead>
                                <tr class="text-center ">
                                    <th>IDIOMA</th>
                                    <th>BASICO</th>
                                    <th>INTERMEDIO</th>
                                    <th>AVANZADO</th>
                                </tr>
                            </thead>
                            <tbody>

                                <?php foreach ($ts_datos_ediomasxx as $xx) {?>
                                    <tr class="text-center">
                                        <td class="p-2"><?php echo $xx->ediomas_idx; ?></td>
                                        <td class="p-2"><?php if ($xx->nivel_id==1) {
                                            echo $xx->nivel_idx;
                                        } ?></td>
                                        <td class="p-2"><?php if ($xx->nivel_id==2) {
                                            echo $xx->nivel_idx;
                                        } ?></td>
                                        
                                        <td class="p-2"><?php if ($xx->nivel_id==3) {
                                            echo $xx->nivel_idx;
                                        }?></td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                    <h5 class="font-weight-normal mt-2">7. EXPERIENCIA LABORAL</h5>
                    <div class="table-responsive">
                        <table border="1" width="100%">
                            <thead>
                                <tr class="text-center ">
                                    <th>CARGO</th>
                                    <th>EMPRESA</th>
                                    <th>PERIODO</th>
                                    <th>MOTIVO DE CESE</th>
                                </tr>
                            </thead>
                            <tbody>

                                <?php foreach ($ts_datos_experiencia_laboral as $xx) {?>
                                    <tr class="text-center">
                                        <td class="p-1"><?php echo $xx->cargo; ?></td>
                                        <td class="p-1"><?php echo $xx->empresa ?></td>
                                        <td class="p-1">
                                            <span><b>Inicio: </b><?php echo $xx->fecha_inicio; ?></span><br>
                                            <b>Termino: </b><span><?php echo $xx->fecha_fin; ?></span><br>
                                            <b>Duración Total: <span><?php echo $xx->totaltxt; ?> Meses</span></b></td>
                                        
                                        <td class="p-1"><?php echo $xx->motivo_cese;?></td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                    <h5 class="font-weight-normal mt-2">8. DESARROLLO Y CAPACITACIÓN</h5>
                    <div class="table-responsive">
                        <table border="1" width="100%">
                            <thead>
                                <tr class="text-center ">
                                    <th>CURSO/SEMINARIO/CONGRESO/DIPLOMADO/TALLER/ESPECIALIDAD</th>
                                    <th>CENTRO DE ESTUDIO</th>
                                    <th>DURACIÓN</th>
                                    <th>HORAS</th>
                                    <th>CRÉDITOS</th>
                                    <th>CERTIFICADO</th>
                                </tr>
                            </thead>
                            <tbody>

                                <?php foreach ($ts_datos_desarrollo_capacitacionxx as $xx) {?>
                                    <tr class="text-center">
                                        <td class="p-2"><?php echo $xx->curso; ?></td>
                                        <td class="p-2"><?php echo $xx->centro_estudio;?></td>
                                        <td class="p-2"><?php echo $xx->totaltxt; ?> Meses</td>
                                        <td class="p-2"><?php echo $xx->horas; ?></td>
                                        <td class="p-2"><?php echo $xx->creditos;?></td>
                                        <td><a target="_blank" href="<?php echo base_url().'upload/';?>archivos/<?php echo $xx->archivo;?>"><i class="fas fa-check"></i></a></td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                    <p class="text-right m-4 font-weight-normal">*DECLARO QUE TODOS LOS DATOS REGISTRADOS SON FIDEDIGNOS</p>
                    <p class="text-right m-4">Lima <?php echo fechaES(strftime('%d de %B de %Y')); ?></p>
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
                   
                        
                    <br>
                    

                </div>
            </div>
            <!-- Column -->
            <!-- Column -->
           
            <!-- Column -->
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
    </div>
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




