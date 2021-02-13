
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
    <link rel="icon" type="image/png" sizes="16x16" href="../assets/images/favicon.png">
    <title><?php echo $title[0] ?></title>
    
    <!-- page css -->
    <link href="<?php echo base_url().'assets_sistema/';?>dist/css/pages/login-register-lock.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="<?php echo base_url().'assets_sistema/';?>dist/css/style.min.css?=<?php echo rand();?>" rel="stylesheet">
    
    
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->
</head>

<body class="skin-default card-no-border">
    <!-- ============================================================== -->
    <!-- Preloader - style you can find in spinners.css -->
    <!-- ============================================================== -->
    <div class="preloader">
        <div class="loader">
            <div class="loader__figure"></div>
            <p class="loader__label">Innomedic.pe</p>
        </div>
    </div>
    <!-- ============================================================== -->
    <!-- Main wrapper - style you can find in pages.scss -->
    <!-- ============================================================== -->
    <section id="wrapper">
        <div class="login-register" style="background-image:url('<?php echo base_url().'assets_sistema/';?>images/background/login-register.jpg?=<?php echo rand();?>');background-size: cover; background-repeat: no-repeat; background-size: 100%;">
            <div class="login-box card" style="border-radius: 15px; ">
                <div class="card-body">
                    <form class="form-horizontal form-material" id="frm_login"  method="post" action="">
                        <h3 class="text-center m-b-20 font-weight-normal">Ingreso a Intranet</h3>
                        <div class="text-center">
                            <img src="<?php echo base_url().'assets/';?>images/logo.png?>?v=<?php echo rand();?>" alt=""><br><br>
                        </div>
                        <div class="form-group ">
                            <div class="col-xs-12">
                                <input class="form-control" name="username" id="username" type="text" required="" placeholder="Ingrese Usuario o DNI o E-mail"> </div>
                        </div>
                        <div class="form-group">
                            <div class="col-xs-12">
                                <input class="form-control" type="password" name="password" id="password" required="" placeholder="Contraseña"> </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-12">
                                <div class="d-flex no-block align-items-center">
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="customCheck1">
                                        <label class="custom-control-label" for="customCheck1">Recordar Contraseña</label>
                                    </div>
                                    
                                    <div class="ml-auto">
                                        <a href="<?php echo base_url().'Main/forgot_passwrod/'?>"><i class="fas fa-lock m-r-5"></i> Olvide Contraseña?</a>
                                    </div>
                                    
                                </div>
                            </div>
                        </div>
                        <div class="form-group text-center">
                            <div class="col-xs-12 p-b-20">
                                <button class="btn btn-block btn-lg btn-info btn-rounded" type="submit">Ingresar</button>
                            </div>
                            <a class="text-info font-weight-bold" href="">Innomedic.pe &copy; 2019 - <?php echo date('Y');?></a><br><br>
                            <a target="_blank" href="https://www.facebook.com/escudero05">Desing By</a>
                            <!-- <?php
                    $arr = $this->session->flashdata(); 
                    if(!empty($arr['flash_messagexxx'])){
                        $html = '<div class="bg-success text-white container flash-message btn_rounded">';
                        $html .= $arr['flash_messagexxx']; 
                        $html .= '</div>';
                        echo $html;
                        }
                    ?>-->
                        </div>
                       
                    </form>
                    <div class="form-group" id="alert"></div>

                    
                    
                </div>
            </div>
        </div>

    </section>
 
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

    <script src="<?php echo base_url().'assets_sistema/';?>js/intranet.js?v=<?php echo rand();?>"></script>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9.4.0/dist/sweetalert2.all.min.js"></script>
    <!--Custom JavaScript -->
    <script type="text/javascript">
        $(function() {
            $(".preloader").fadeOut();
        });
        $(function() {
            $('[data-toggle="tooltip"]').tooltip()
        });
        // ============================================================== 
        // Login and Recover Password 
        // ============================================================== 
        $('#to-recover').on("click", function() {
            $("#loginform").slideUp();
            $("#recoverform").fadeIn();
        });
    </script>

    <script>


        <?php  $arr = $this->session->flashdata();?>
        <?php if (!empty($arr['flash_messagex'])) {?>
            window.onload=function() {

                Swal.fire({
                  icon: 'error',
                  title: 'Oops...',
                  text: 'Vuelva a Intentarlo Nuevamente',
                  footer: '<a  href="javascript:void();"><?php echo $arr['flash_messagex']?></a>'
                })
             }
       <?php  } ?>

       <?php if ($data = $this->session->flashdata("flash_messagexxx")) {?>
           window.onload=function() {

            Swal.fire({
                  icon: 'success',
                  title: 'Muy Bien',
                  text: '<?php echo $data;?>',
                  footer: '<a href="<?php echo base_url();?>">Verificar tu E-mail en span y/o No deseados</a>'
                })

             }
       <?php } ?>
       

       

   
       
    </script>





            
    
</body>

</html>