    <?php  $query_users = $this->db->query("SET lc_time_names = 'es_PE'");
     $query_users = $this->db->query("select *, DATE_FORMAT(fecha_ingreso_sistema,'%d de %M %Y' ' ' '%r' ) AS fecha_txt,
    (select imagen from ts_datos_personales where id_usuario=a.Id) as imagen,
    (select 
    CASE
        WHEN id_genero = 1 THEN 'varon.png'
        WHEN id_genero = 2 THEN 'mujer.png'
        WHEN id_genero = 3 THEN 'medio.png'
        ELSE 'distinto.png'
    END
     from ts_datos_personales where id_usuario=a.Id) as id_otros,
    (select id_genero from ts_datos_personales where id_usuario=a.Id) as id_genero,
    (select url from ts_datos_personales where id_usuario=a.Id) as url,
    (select email from ts_datos_personales where id_usuario=a.Id) as email
    from ts_usuario a where Id=".$this->session->userdata("session_id")."");
    foreach ($query_users->result() as $xx) {
         $nombrex = $xx->nombre." ".$xx->apellido_paterno ." ". $xx->apellido_materno;
         $nombrexx = $xx->nombre ." ".$xx->apellido_paterno;
         $nombresxxx = $xx->nombre;
         $picturex = $xx->imagen;
         $urlx = $xx->url;
         $id_generox = $xx->id_genero;
         $id_otros = $xx->id_otros; 
         $emailx = $xx->email;
         $idx = $xx->Id;
         $ultimo_acceso = $xx->fecha_txt;
     } ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta http-equiv="Content-Type" content="text/html" charset="UTF-8" />

    
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Evaristo Escudero Huillcamascco">
    <meta http-equiv="Cache-Control" content="no-store"/> 

    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="<?php echo base_url().'assets_sistema/';?>images/favicon.png">
    <?php $bar = $nombresxxx;
        $bar = ucfirst($bar);             // HELLO WORLD!
        $bar = ucfirst(strtolower($bar)); // Hello world! 
    ?>
    <title><?php echo ucfirst(strtolower($bar)); ?>&nbsp;<?php echo $title[0]?></title>
    <!---->
     <link href="<?php echo base_url().'assets_sistema/';?>node_modules/bootstrap-material-datetimepicker/css/bootstrap-material-datetimepicker.css" rel="stylesheet">
    <!-- Page plugins css -->
    <link href="<?php echo base_url().'assets_sistema/';?>node_modules/clockpicker/dist/jquery-clockpicker.min.css" rel="stylesheet">
    <!-- Color picker plugins css -->
    <link href="<?php echo base_url().'assets_sistema/';?>node_modules/jquery-asColorPicker-master/dist/css/asColorPicker.css" rel="stylesheet">
    <!-- Daterange picker plugins css -->
    <link href="<?php echo base_url().'assets_sistema/';?>node_modules/timepicker/bootstrap-timepicker.min.css" rel="stylesheet">
    <link href="<?php echo base_url().'assets_sistema/';?>node_modules/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet">
    <!-- page css -->
    <link href="<?php echo base_url().'assets_sistema/';?>node_modules/morrisjs/morris.css" rel="stylesheet">
    <!-- Dropzone css -->
    <link href="<?php echo base_url().'assets_sistema/';?>node_modules/dropzone-master/dist/dropzone.css" rel="stylesheet" type="text/css" />
      <!-- page css -->
    <link href="<?php echo base_url().'assets_sistema/';?>dist/css/pages/inbox.css" rel="stylesheet">
    <!-- toast CSS -->
    <link href="<?php echo base_url().'assets_sistema/';?>node_modules/toast-master/css/jquery.toast.css" rel="stylesheet">
    <link href="<?php echo base_url().'assets_sistema/';?>dist/css/pages/other-pages.css" rel="stylesheet">
    <link href="<?php echo base_url().'assets_sistema/';?>dist/css/pages/stylish-tooltip.css" rel="stylesheet">
    <!-- page CSS -->
    <!-- page css -->
    <link href="<?php echo base_url().'assets_sistema/';?>dist/css/pages/floating-label.css" rel="stylesheet">
    <!-- Dashboard 1 Page CSS -->
    <link href="<?php echo base_url().'assets_sistema/';?>dist/css/pages/dashboard1.css?v=<?php echo rand();?>" rel="stylesheet">
    <link href="<?php echo base_url().'assets_sistema/';?>node_modules/bootstrap-datepicker/bootstrap-datepicker.min.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url().'assets_sistema/';?>node_modules/select2/dist/css/select2.min.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url().'assets_sistema/';?>node_modules/switchery/dist/switchery.min.css" rel="stylesheet" />
    <link href="<?php echo base_url().'assets_sistema/';?>node_modules/bootstrap-select/bootstrap-select.min.css" rel="stylesheet" />
    <link href="<?php echo base_url().'assets_sistema/';?>node_modules/bootstrap-tagsinput/dist/bootstrap-tagsinput.css" rel="stylesheet" />
    <link href="<?php echo base_url().'assets_sistema/';?>node_modules/bootstrap-touchspin/dist/jquery.bootstrap-touchspin.min.css" rel="stylesheet" />
    <link href="<?php echo base_url().'assets_sistema/';?>node_modules/multiselect/css/multi-select.css" rel="stylesheet" type="text/css" />
    <!--view_js-->

    <!-- This Page CSS -->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url().'assets_sistema/';?>node_modules/summernote/dist/summernote-bs4.css">
     <!-- Custom CSS -->
    <link rel="stylesheet" href="<?php echo base_url().'assets_sistema/';?>node_modules/html5-editor/bootstrap-wysihtml5.css" />
    <!--chat-->
      <!-- Page CSS -->
    <link href="<?php echo base_url().'assets_sistema/';?>dist/css/pages/chat-app-page.css" rel="stylesheet">
    <link href="<?php echo base_url().'assets_sistema/';?>dist/css/style.min.css" rel="stylesheet">

   <!--para tablas intranet view-->
    <?php if (base_url().'View_intranet/View/') {?>
    <link href="<?php echo base_url().'assets_sistema/';?>node_modules/datatables/media/css/dataTables.bootstrap4.css" rel="stylesheet">
   <?php  }else{
    echo "ok";
   } ?>
   <!-- Footable CSS -->
    <link href="<?php echo base_url().'assets_sistema/';?>node_modules/footable/css/footable.bootstrap.min.css" rel="stylesheet">
    <!-- Page CSS -->
    <link href="<?php echo base_url().'assets_sistema/';?>dist/css/pages/contact-app-page.css" rel="stylesheet">
    <link href="<?php echo base_url().'assets_sistema/';?>dist/css/pages/footable-page.css" rel="stylesheet">
    <link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/themes/smoothness/jquery-ui.css">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="<?php echo base_url().'assets_sistema/';?>node_modules/dropify/dist/css/dropify.min.css">
    <link href="<?php echo base_url().'assets_sistema/';?>dist/css/pages/pricing-page.css" rel="stylesheet">
    <link href="<?php echo base_url().'assets_sistema/';?>dist/css/pages/tab-page.css" rel="stylesheet">
     <!-- Bootstrap responsive table CSS -->
    <link href="<?php echo base_url().'assets_sistema/';?>node_modules/tablesaw/dist/tablesaw.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css"
        href="<?php echo base_url().'assets_sistema/';?>node_modules/datatables.net-bs4/css/dataTables.bootstrap4.css">
    <link rel="stylesheet" type="text/css"
        href="<?php echo base_url().'assets_sistema/';?>node_modules/datatables.net-bs4/css/responsive.dataTables.min.css">
    <script src="https://kit.fontawesome.com/dc5ae8b9ac.js" crossorigin="anonymous"></script>
    <style>

        ::-webkit-scrollbar{
            width: 5px;
            background-color: #EFE9E9 ;
            border-radius: 20px;
        }
        ::-webkit-scrollbar-track{
            -webkit-box-shadow: inset 0 0 6px rgba(0,0,0,0.3);
            background-color: #EFE9E9  ;
        }
        ::-webkit-scrollbar-thumb{
            border-radius: 20px;
            background-color: #BDBDBD; 
         
        }
        
        .left-sidebar {
            z-index:15 !important;     
        }

        
        
    </style>

    <script src="http://www.position-absolute.com/creation/print/jquery.min.js"></script>
    <script src="http://www.position-absolute.com/creation/print/jquery.printPage.js"></script>

 


 
</head>
<body class="skin-blue fixed-layout ">
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
    <div id="main-wrapper">
        <!-- ============================================================== -->
        <!-- Topbar header - style you can find in pages.scss -->
        <!-- ============================================================== -->
        <header class="topbar">
            <nav class="navbar top-navbar navbar-expand-md navbar-dark">
                <!-- ============================================================== -->
                <!-- Logo -->
                <!-- ============================================================== -->
                <div class="navbar-header">
                    <a class="navbar-brand" href="<?php echo base_url().'Intranet_view/';?>">
                        <!-- Logo icon --><b>
                            <!--You can put here icon as well // <i class="wi wi-sunset"></i> //-->
                            <!-- Dark Logo icon -->
                            <img src="<?php echo base_url().'assets_sistema/';?>images/logo-icon.png" alt="homepage" class="dark-logo" />
                            <!-- Light Logo icon -->
                            <img src="<?php echo base_url().'assets_sistema/';?>images/logo-light-icon.png" alt="homepage" class="light-logo" />
                        </b>
                        <!--End Logo icon -->
                        <span class="hidden-xs"><span class="font-bold">nomedic</span></span>
                    </a>
                </div>
                <!-- ============================================================== -->
                <!-- End Logo -->
                <!-- ============================================================== -->
                <div class="navbar-collapse">
                    <!-- ============================================================== -->
                    <!-- toggle and nav items -->
                    <!-- ============================================================== -->
                    <ul class="navbar-nav mr-auto">
                        <!-- This is  -->
                        <li class="nav-item"> <a class="nav-link nav-toggler d-block d-md-none waves-effect waves-dark" href="javascript:void(0)"><i class="ti-menu"></i></a> </li>
                        <li class="nav-item"> <a class="nav-link sidebartoggler d-none d-lg-block d-md-block waves-effect waves-dark" href="javascript:void(0)"><i class="icon-menu"></i></a> </li>
                        <!-- ============================================================== -->
                        <!-- Search -->
                        <!-- ============================================================== -->
                        <!--<li class="nav-item">
                            <form class="app-search d-none d-md-block d-lg-block">
                                <input type="text" class="form-control" placeholder="Buscar y Enter">
                            </form>
                        </li>-->
                    </ul>
                    <!-- ============================================================== -->
                    <!-- User profile and search -->
                    <!-- ============================================================== -->
                    <ul class="navbar-nav my-lg-0">
                        <!-- ============================================================== -->
                        <!-- Comment -->

                        <!-- ============================================================== -->
                        <li class="nav-item dropdown u-pro">
                           <a class="nav-link dropdown-toggle waves-effect waves-dark profile-pic text-white" aria-haspopup="true" aria-expanded="false"><span class="hidden-md-down">Ultimo Acceso: <?php echo $ultimo_acceso; ?> &nbsp;<i class="far fa-clock"></i></span> </a>

                            
                        </li>
                        <!-- ============================================================== -->
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle waves-effect waves-dark" href="" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="ti-email"></i>
                                <div class="notify" id="aplicamos">  </div>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right mailbox animated bounceInDown">
                                <ul>
                                    <li>
                                        <div class="drop-title">Notificaciones</div>
                                    </li>
                                    <li>
                                        <div class="message-center" >
                                            <span id="listar_notificacion_por_usuario"></span>
                                            <!--aqui va las notificaiones de boletas y otras cosas mas vfdgr-->
                                            <!--<img src="<?php echo base_url().'upload/';?>images/emoji.png" alt="">-->
                                           
                                             
                                        </div>
                                    </li>
                                    <li>
                                        <a class="nav-link text-center link" href="javascript:void(0);"> <strong>Verifica todas las notificaciones</strong> <i class="fa fa-angle-right"></i> </a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                        <!-- ============================================================== -->
                        <!-- ============================================================== -->
                        <!-- User Profile -->
                        <!-- ============================================================== -->
                        <li class="nav-item dropdown u-pro">
                           <a class="nav-link dropdown-toggle waves-effect waves-dark profile-pic" href="" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><img src="<?php echo base_url().'upload/';?>images/<?php if($picturex=="" or $picturex==NULL){ echo "$id_otros";}else{echo "$picturex";} ?>" alt="<?php echo $nombresxxx; ?>" class=""> <span class="hidden-md-down"><?php echo $nombrex; ?> &nbsp;<i class="fa fa-angle-down"></i></span> </a>

                            <div class="dropdown-menu dropdown-menu-right animated flipInY">
                                <!-- text-->
                                <a href="<?php echo base_url().'Mantenimiento/Perfil/Mostrar_perfil_empleado/'.$urlx;?>/" class="dropdown-item"><i class="ti-user"></i> Mi Perfil</a>
                                <div class="dropdown-divider"></div>
                                <!-- text-->
                                <a href="<?php echo base_url().'Mantenimiento/Configuracion/view_users/'.$urlx;?>/" class="dropdown-item"><i class="ti-settings"></i> Configuración de cuenta</a>
                                <!-- text-->
                                <div class="dropdown-divider"></div>
                                <!-- text-->
                                <a href="javascript:void(0);" onclick="return salir_users();" class="dropdown-item"><i class="fa fa-power-off"></i> Salir</a>
                                <!-- text-->
                            </div>
                        </li>
                        <!-- ============================================================== -->
                        <!-- End User Profile -->
                        <!-- ============================================================== -->
                        <li class="nav-item right-side-toggle"> <a class="nav-link  waves-effect waves-light" href="javascript:void(0)"><i class="ti-settings"></i></a></li>
                    </ul>
                </div>
            </nav>
        </header>
        <!-- ============================================================== -->
        <!-- End Topbar header -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->
        <aside class="left-sidebar">
            <!-- Sidebar scroll-->
            <div class="scroll-sidebar">
                <!-- Sidebar navigation-->
                <nav class="sidebar-nav">
                    <ul id="sidebarnav">
                        <li class="user-pro"> <a class="has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><img  src="<?php echo base_url().'upload/';?>images/<?php if($picturex=="" or $picturex==NULL){ echo "$id_otros";}else{echo "$picturex";} ?>" alt="<?php echo $nombresxxx; ?>" class="img-circle"><span class="hide-menu"><?php echo $nombrexx;?></span></a>
                            <ul aria-expanded="false" class="collapse">
                                <li><a href="<?php echo base_url().'Mantenimiento/Perfil/Mostrar_perfil_empleado/'.$urlx;?>/"><i class="ti-user"></i> Mi Perfil</a></li>
                                <!--<li><a href="javascript:void(0)"><i class="ti-wallet"></i> My Balance</a></li>
                                <li><a href="javascript:void(0)"><i class="ti-email"></i> Inbox</a></li>-->
                                <li><a href="<?php echo base_url().'Mantenimiento/Configuracion/view_users/'.$urlx;?>/"><i class="ti-settings"></i> Configuración de cuenta</a></li>
                                <li><a href="javascript:void(0);" onclick="return salir_users(event);"><i class="fa fa-power-off"></i> Salir</a></li>
                            </ul>
                        </li>
                        <li class="nav-small-cap">--- PERSONAL</li>
                        <li> <a class="waves-effect waves-dark" href="<?php echo base_url().'Intranet_view/';?>"><i class="icon-speedometer"></i><span class="hide-menu">Dashboard</span></a>
                        </li>
                        <?php if ($this->session->userdata("session_perfil")==36 ) {?>
                        <?php }else{?>
                            <li> <a class=" waves-effect waves-dark" href="<?php echo base_url().'View_intranet/Ficha_personal/';?>" ><i class="ti-layout-grid2"></i><span class="hide-menu">Datos Personales</a>
                               
                            </li>
                        <?php } ?>
                        

                       <?php if ($this->session->userdata("session_perfil")==7) {?>
                        <li><a class="has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i class="ti-layout-grid2"></i><span class="hide-menu">Atenciones</span></a>
                            <ul  aria-expanded="false" class="collapse">
                                <li><a href="<?php echo base_url().'Atencion/Historial/';?>">Historial</a></li>
                            </ul>
                        </li>
                       <?php } ?>

                       <?php if ($this->session->userdata("session_perfil")==36 || $this->session->userdata("session_perfil")==37 || $this->session->userdata("session_perfil")==38 || $this->session->userdata("session_perfil")==39) {?>
                          
                       <?php }else{?>
                            <li><a class="has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i class="ti-layout-grid2"></i><span class="hide-menu">RRHH</span></a>
                                <ul  aria-expanded="false" class="collapse">
                                    <li><a href="<?php echo base_url().'Boleta/Boleta/';?>"><i class="fas fa-book"></i>&nbsp; Boletas</a></li>
                                    <li><a href="javascript:void(0)"><i class="fas fa-book"></i>&nbsp; Politicas RRHH</a></li>
                                    <li><a href="<?php echo base_url().'AreaRrhh/AreaRrhh/RIT/';?>"><i class="fas fa-book"></i>&nbsp; Reglamento Interno de Trabajo</a></li>
                                    <?php if ( in_array($this->session->userdata("session_perfil"), array(40, 1))) { ?>
                                        <li><a href="<?php echo base_url();?>AreaRrhh/AreaRrhh/sstAdminPanel"><i class="fas fa-user-lock"></i>&nbsp;Admin Panel</a></li>
                                    <?php } ?>


                                </ul>
                            </li>
                       <?php } ?>


                       <?php if ($this->session->userdata("session_perfil")==36 || $this->session->userdata("session_perfil")==37 || $this->session->userdata("session_perfil")==38 || $this->session->userdata("session_perfil")==39) {?>
                          
                       <?php }else{?>
                             <!--pedidos realizar-->
                        <li><a class="has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i class="ti-layout-grid2"></i><span class="hide-menu">Logistica</span></a>
                            <ul  aria-expanded="false" class="collapse">
                                <?php $query = $this->db->query("select *,
                                    (select url from ts_menu_pedido where Id=menu) as urlx,
                                    (select nombre from ts_menu_pedido where Id=menu) as menux 
                                    from ts_menu_items_pedido where perfil = '".$this->session->userdata("session_perfil")."' ");
                                foreach ($query->result() as $xx) {?>
                                    <li><a href="<?php echo base_url().$xx->urlx;?>"><?php echo $xx->menux;?></a></li>

                                 <?php } ?>

                                 <li><a href="<?php echo base_url().$xx->urlx;?>"><?php echo $xx->menux;?></a></li>
                            </ul>
                        </li>
                       <?php } ?>
                        <?php if ($this->session->userdata("session_perfil")==29 || $this->session->userdata("session_perfil")==5 || $this->session->userdata("session_perfil")==19 || $this->session->userdata("session_perfil")==1) {?>
                            <li><a class="has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i class="ti-layout-grid2"></i><span class="hide-menu">Inventario</span></a>
                                <ul aria-expanded="false" class="collapse">
                                    <li><a href="<?php echo base_url().'Inventario/View_Inventario/';?>">Inventario</a></li>
                                    <li><a href="<?php echo base_url().'Inventario/Almacen/';?>">Almacen</a></li>
                                </ul>
                            </li>
                       <?php  }else{
                            echo "";
                        } ?>

                        <?php if ($this->session->userdata("session_perfil")==36 || $this->session->userdata("session_perfil")==1 || $this->session->userdata("session_perfil")==19) {?>
                            <li><a class="has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i class="ti-layout-grid2"></i><span class="hide-menu">RR-HH</span></a>
                                <ul  aria-expanded="false" class="collapse">
                                    <?php 
                                    $count = 0;
                                    $query = $this->db->query("select *,
                                        (select url from ts_menu_rrhh where Id=menu) as urlx,
                                        (select nombre from ts_menu_rrhh where Id=menu) as menux,
                                        (select icono from ts_menu_rrhh where Id=menu) as icono 
                                        from ts_menu_items_rrhh where perfil = '36'"); 
                                    foreach ($query->result() as $xx) {
                                        $count +=1;
                                        ?>
                                       <!-- <?php if ($xx->menu == 2) {
                                            $mostrar = date('m').'?='.rand();
                                        }else{
                                            $mostrar = "";
                                        } ?>-->

                                        <?php if ($this->session->userdata("session_perfil")==19 && $count!=1) {
                                            echo "";
                                        } else {?>                            
                                        <li><a href="<?php echo base_url().$xx->urlx?>"><i class="<?php echo $xx->icono;?>"></i>&nbsp;<?php echo $xx->menux;?></a></li>
                                        <?php }?>
                                     <?php } ?>
                                </ul>
                            </li>
                            
                        <?php }else{?>

                        <?php } ?>

                        <!-- Seguridad y Salud en el Trabajo -->
                        <li><a class="has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i class="ti-layout-grid2"></i><span class="hide-menu">Seguridad y Salud en el Trabajo</span></a>
                            <ul  aria-expanded="false" class="collapse">
                                <li><a href="<?php echo base_url();?>sst/sst/politicas"><i class="fas fa-hard-hat"></i>&nbsp;Políticas</a></li>
                                <li><a href="<?php echo base_url();?>sst/sst/reglamentos"><i class="fas fa-book"></i></i>&nbsp;Reglamento Interno de SST</a></li>
                                <li><a href="<?php echo base_url();?>sst/sst/planProgramasSst"><i class="fas fa-thumbtack"></i>&nbsp;Plan y Programas de SST</a></li>
                                <!--<li><a href="<?php echo base_url();?>sst/sst/objetivos_sst"><i class="fas fa-bullseye"></i>&nbsp;Objetivos de SST</a></li>-->                                
                                <?php if ( in_array($this->session->userdata("session_perfil"), array(40, 1))) { ?>
                                    <li><a href="<?php echo base_url();?>sst/sst/sstAdminPanel"><i class="fas fa-user-lock"></i>&nbsp;Admin Panel</a></li>
                                <?php } ?>
                            </ul>
                        </li>

                        <!-- Area de Sistemas  -->
                        <li><a class="has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i class="ti-layout-grid2"></i><span class="hide-menu">Área de T.I</span></a>
                            <ul  aria-expanded="false" class="collapse">
                                <li><a href="<?php echo base_url();?>AreaSistemas/AreaSistemas/politicas"><i class="fas fa-hard-hat"></i>&nbsp;Políticas</a></li>
                            </ul>
                        </li>

                        <!-- Area de Sistemas  -->
                        <li><a class="has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i class="ti-layout-grid2"></i><span class="hide-menu">Área de Comunicaciones</span></a>
                            <ul  aria-expanded="false" class="collapse">
                            <li><a href="<?php echo base_url();?>AreaComunicaciones/AreaComunicaciones/politicas"><i class="fas fa-hard-hat"></i>&nbsp;Manual de Identidad</a></li>
                            </ul>
                        </li>

                        <?php 
                            if ($this->session->userdata("session_perfil")==14 || $this->session->userdata("session_perfil")==23 || $this->session->userdata("session_perfil")==38 || $this->session->userdata("session_perfil")==1 || $this->session->userdata("session_perfil")==12) {?>
                                <li> <a class="waves-effect waves-dark" href="<?php echo base_url().'Examenes/Examenes/' ?>" aria-expanded="false"><i class="far fa-circle text-success"></i><span class="hide-menu">Exámenes Clínicos</span></a></li>
                            <?php }
                         ?>
                        
                        <?php if ($this->session->userdata("session_perfil")==37 || $this->session->userdata("session_perfil")==38 || $this->session->userdata("session_perfil")==39 || $this->session->userdata("session_perfil")==1 || $this->session->userdata("session_perfil")==12) {?>
                            <li> <a class="waves-effect waves-dark" href="<?php echo base_url().'Examenes/Ordenes/' ?>" aria-expanded="false"><i class="far fa-circle text-warning"></i><span class="hide-menu">Órdenes de Atención</span></a></li>
                        <?php } ?>

                        <?php if ($this->session->userdata("session_perfil")==38 || $this->session->userdata("session_perfil")==1 || $this->session->userdata("session_perfil")==12) {?>
                             <li> <a class="waves-effect waves-dark" href="<?php echo base_url().'ResultadoFinal/ResultadoFinal/Process/';?>" aria-expanded="false"><i class="far fa-circle text-info"></i><span class="hide-menu">Resultado Final</span></a></li>
                        <?php } ?>

                        

                        <!-- Generaor de plantillas de correo -->
                        <?php if ($this->session->userdata("session_perfil") == 2) { ?>
                        <li> <a class="waves-effect waves-dark" href="<?php echo base_url().'Correo_generator/';?>" aria-expanded="false"><i class="far fa-circle text-info"></i><span class="hide-menu">Editor de Plantillas</span></a></li>
                        <?php } ?>

                        <!-- Chat de Recursos Humanos -->
                        
                        <li>
                            <a class="waves-effect waves-dark" href="<?php echo base_url().'Chat/Chat/';?>" aria-expanded="false">
                                <i class="fa fa-comment-dots"></i>
                                <span class="hide-menu">Chat de RRHH</span>
                                <span class="total_unread_msg"></span>
                            </a>
                        </li>
                        
                    </ul>
                </nav>
                <!-- End Sidebar navigation -->
            </div>
            <!-- End Sidebar scroll-->
        </aside>

         <script>
            function salir_users(event) {
                Swal.fire({
                  title: '¿Estás seguro?',
                  text: "Estas apunto de cerrar sesión",
                  icon: 'warning',
                  showCancelButton: true,
                  allowOutsideClick: false,

                  confirmButtonColor: '#3085d6',
                  cancelButtonColor: '#d33',
                  confirmButtonText: 'Sí, salir ahora!',
                  cancelButtonText: 'No, Cancelar!'
                }).then((result) => {
                  if (result.value) {

                    let timerInterval
                        Swal.fire({
                          title: 'Auto close alert!',
                          html: 'Se cerrará en <b> </b> segundos. te estaremos esperando',
                          timer: 2000,
                          timerProgressBar: true,
                          onBeforeOpen: () => {
                            Swal.showLoading()
                            timerInterval = setInterval(() => {
                              const content = Swal.getContent()
                              if (content) {
                                const b = content.querySelector('b')
                                if (b) {
                                  b.textContent = Swal.getTimerLeft()
                                }
                              }
                            }, 100)
                          },
                          onClose: () => {
                            clearInterval(timerInterval)
                          }
                        }).then((result) => {
                          /* Read more about handling dismissals below */
                          if (result.dismiss === Swal.DismissReason.timer) {
                             window.location="<?php echo base_url().'Intranet/salir/';?>";
                          }
                        })
                  }
                })
            }   
            // Showing the total number of unread messages in the menu  
            $( document ).ready(function() {
                console.log("ready");
                let reg = /[cC]hat\/[cC]hat/;

                // If we are not in the chat window, we will request a total of unread messages
                if (!reg.test(window.location.href)) {

                    let xhttp = new XMLHttpRequest();
                    xhttp.onreadystatechange = function() {
                        if (this.readyState == 4 && this.status == 200) {
                            let show_number = "";
                            const unread_msg_container = document.querySelector(".total_unread_msg");
                            
                            if (this.responseText == 0) {
                                unread_msg_container.innerHTML = "";
                                unread_msg_container.style.backgroundColor = "transparent";

                            } else {
                                unread_msg_container.innerHTML = this.responseText;
                                unread_msg_container.style.backgroundColor = "#00c292";
                            }
                    
                        }
                    };

                    xhttp.open("GET", "<?=base_url();?>Chat/Chat/getTotalNumberUnreadMsg/35", true);
                    xhttp.send();
                    
                }                         
            });

            

        </script>

        <style>
            .total_unread_msg {
                float: right;
                width: 25px;
                height: 25px;
                text-align: center;
                border-radius: 50%;
                display: flex;
                justify-content: center;
                align-items: center;
                transform: translate(0, -3px);
                color: white;
            }
            .evaristo_{
                width: 100%;
                height: auto;
            }

            #tipo_documento {
                background-color: #343a40;
                color: white;
                margin: 5px 0;
            }
        </style>
        <!-- ============================================================== -->
        <!-- End Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Page wrapper  -->
        <!-- ============================================================== -->
        <div class="page-wrapper">
            <!-- ============================================================== -->
            <!-- Container fluid  -->
            <!-- ============================================================== -->
            <div class="container-fluid">
                <!-- ============================================================== -->
                <!-- Bread crumb and right sidebar toggle -->
                <!-- ============================================================== -->