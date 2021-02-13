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
    <link rel="icon" type="image/png" sizes="16x16" href="<?php echo base_url().'assets_sistema/';?>/images/favicon.png">
    <title>Restablecer Contraseña</title>
    
    <!-- page css -->
    <link href="<?php echo base_url().'assets_sistema/';?>dist/css/pages/login-register-lock.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="<?php echo base_url().'assets_sistema/';?>dist/css/style.min.css" rel="stylesheet">
    
    
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->
</head>

<body>
    <!-- ============================================================== -->
    <!-- Preloader - style you can find in spinners.css -->
    <!-- ============================================================== -->
    <div class="preloader">
        <div class="loader">
            <div class="loader__figure"></div>
            <p class="loader__label">Innomedic.pe</p>
        </div>
    </div>

        <section id="wrapper">
        <div class="login-register" style="background-image:url('<?php echo base_url().'assets_sistema/';?>images/background/login-register.jpg');">

            <div class="login-box card">
                <div class="card-body">

                  <div class="col-lg-12">
                      <h2>Restablecer su contraseña</h2>
                      <h5>Hola <span class=""><?php echo $nombre; ?></span>, Ingrese su contraseña 2x a continuación para restablecer su usuario es: <b><?php echo $usuario; ?></b></h5>     
                  <?php 
                      $fattr = array('class' => 'form-signin');
                      echo form_open(base_url().'Main/reset_password/token/'.$token, $fattr); ?>
                      <div class="form-group">
                        <?php echo form_password(array('name'=>'password', 'id'=> 'password', 'placeholder'=>'Password', 'class'=>'form-control', 'value' => set_value('password'))); ?>
                        <?php echo form_error('password') ?>
                      </div>
                      <div class="form-group">
                        <?php echo form_password(array('name'=>'passconf', 'id'=> 'passconf', 'placeholder'=>'Confirm Password', 'class'=>'form-control', 'value'=> set_value('passconf'))); ?>
                        <?php echo form_error('passconf') ?>
                      </div>
                     <!-- <?php echo form_hidden('user_id', $user_id);?>-->
                      <?php echo form_submit(array('value'=>'Reset Password', 'class'=>'btn btn-lg btn-success btn-block')); ?>
                      <?php echo form_close(); ?>
                     
                  </div>
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
    
</body>

</html>


