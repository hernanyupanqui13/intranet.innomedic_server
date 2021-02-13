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
    <title><?php echo $title[0];?></title>
    
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
    <!-- ============================================================== -->
    <!-- Main wrapper - style you can find in pages.scss -->
    <!-- ============================================================== -->
    <section id="wrapper" class="login-register login-sidebar" style="background-image:url('<?php echo base_url().'assets_sistema/';?>images/background/login-register.jpg');">
        <div class="login-box card">
            <div class="card-body">
                <form class="form-horizontal form-material text-center" id="frm_login" action="" method="post" autocomplete="off">
                    <a href="javascript:void(0)" class="db"><!--<img src="<?php echo base_url().'assets_sistema/';?>images/logo-icon.png" alt="Home" />--><br/><img src="<?php echo base_url().'assets/';?>images/logo.png?v=<?php echo rand();?>" alt="Home" /></a>
                    <div class="form-group m-t-40">
                        <div class="col-xs-12">
                            <input class="form-control" type="text" name="username" id="username" required="" placeholder="Usuario">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-xs-12">
                            <input class="form-control" type="password" name="password" id="password" required="" placeholder="Password">
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-md-12">
                            <div class="d-flex no-block align-items-center">
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input" id="customCheck1">
                                    <label class="custom-control-label" for="customCheck1">Recuerdame</label>
                                </div> 
                                <div class="ml-auto">
                                    <!--<a href="javascript:void(0)" id="to-recover" class="text-muted"><i class="fas fa-lock m-r-5"></i> Olvidate Contraseña?</a> -->
                                   <!-- <a href="<?php echo base_url().'Main/forgot/';?>" class="text-muted"><i class="fas fa-lock m-r-5"></i> Olvidaste Contraseña?</a> -->
                                </div>
                            </div>   
                        </div>
                    </div>
                    <div class="form-group text-center m-t-20">
                        <div class="col-xs-12">
                            <button class="btn btn-info btn-lg btn-block text-uppercase btn-rounded" type="submit">Ingresar al Sistema</button>
                        </div>
                    </div>
                    <div class="form-group" id="alert"></div>

                     <!--   
                    <div class="row">
                        <div class="col-xs-12 col-sm-12 col-md-12 m-t-10 text-center">
                            <div class="social">
                                <button class="btn  btn-facebook" data-toggle="tooltip" title="Login with Facebook"> <i aria-hidden="true" class="fab fa-facebook-f"></i> </button>
                                <button class="btn btn-googleplus" data-toggle="tooltip" title="Login with Google"> <i aria-hidden="true" class="fab fa-google-plus-g"></i> </button>
                            </div>
                        </div>
                    </div>-->
                    <div class="form-group m-b-0">
                        <div class="col-sm-12 text-center">
                            ¿No tienes una cuenta? <a data-toggle="modal" data-target="#exampleModal" href="<?php echo "javascript:void(0);" ?>" class="text-primary m-l-5"><b>Regístrate</b></a>
                        </div>
                    </div>
                </form>
                <br>

                <?php
                    $arr = $this->session->flashdata(); 
                    if(!empty($arr['flash_message'])){
                        $html = '<div class="bg-success text-white container flash-message btn_rounded">';
                        $html .= $arr['flash_message']; 
                        $html .= '</div>';
                        echo $html;
                    }
                ?>
                <form class="form-horizontal" id="recoverform" action="#">
                    <div class="form-group ">
                        <div class="col-xs-12">
                            <h3>Recuperar contraseña</h3>
                            <p class="text-muted">¡Ingrese su correo electrónico y le enviaremos las instrucciones!  </p>
                        </div>
                    </div>
                    <div class="form-group ">
                        <div class="col-xs-12">
                            <input class="form-control" type="text" required="" name="forget_email" id="forget_email" placeholder="Ingrese su email">
                        </div>
                    </div>
                    <div class="form-group text-center m-t-20">
                        <div class="col-xs-12">
                            <button class="btn btn-outline-success btn-rounded btn-lg btn-block text-uppercase waves-effect waves-light" id="action_forget_password"><i class=" fas fa-chevron-circle-right"></i>&nbsp;Recuperar</button>
                        </div>
                    </div>
                </form>

            </div>
        </div>
    </section>

  





    <!-- Button trigger modal -->

    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" data-backdrop="static" data-keyboard="false">
      <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content ">
          <div class="modal-header">
             <div class="text-center">
                    Ingrese los datos requeridos
              </div>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <form class="form-horizontal" role="form" method="post" name="busqueda" id="busqueda" >
                <div class="card border-info">
                  <div class="card-body">
                    <div class="row">
                      <div class="col-md-12">
                        <input type="number" class="form-control" name="nruc" id="nruc" placeholder="Ingrese RUC" pattern="([0-9][0-9][0-9][0-9][0-9][0-9][0-9][0-9][0-9][0-9][0-9]|[0-9][0-9][0-9][0-9][0-9][0-9][0-9][0-9])" autofocus onkeypress="return soloNumeros(event);">
                      </div>
                    </div>
                  </div>
                  <div class="text-center">
                    <button type="submit" class="btn btn-outline-success btn-rounded btn-md" name="btn-submit" id="btn-submit">
                      <i class="fa fa-search"></i> Buscar
                    </button>
                  </div>
                </div>
              </form>
              <!--de aqui para arriba es de sunat-->
            <form action="#" id="user_form">
             <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Empresa</label>
                    <input type="text" class="form-control" id="usuario" name="usuario" readonly=""  placeholder="Empresa" value="" onkeypress="return soloLetras(event);">
                  </div>
                </div>
                <div class="col-md-6">
                   <div class="form-group">
                    <label for="exampleInputEmail1">Ruc</label>
                    <input type="text" class="form-control" id="rucx" name="rucx" readonly="" placeholder="Ruc" onkeypress="return soloNumeros(event);" maxlength="11" minlength="8">
                  </div>
                </div> 
            </div>
            <div class="row">
             <div class="col-md-12">
                 <div class="form-group">
                  <label for="exampleInputEmail1">Direccion</label>
                  <input type="text" class="form-control" id="direccionx" name="direccionx" placeholder="Dirección" value="">
                </div>
              </div>
              <!--<div class="col-md-4">
                 <div class="form-group">
                  <label for="exampleInputEmail1">Rubro</label>
                  <select class="form-control" name="rubro" id="rubro">
                    <option value="0">--Seleccione--</option>
                    <?php foreach ($ts_rubro as $xx) {?>
                     <option value=""><?php echo $xx->nombre;?></option>
                    <?php } ?>
                  </select>
                </div>
              </div>-->
            </div>
            <div class="row">
               <div class="col-md-12">
                   <div class="form-group">
                    <label for="exampleInputEmail1">E-mail</label>
                    <input type="text" class="form-control" id="emailx" name="emailx" placeholder="Ingrese E-mail Valido" value="">
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="exampleInputPassword1">Contraseña</label>
                    <input type="password" class="form-control" id="clavex" name="clave" placeholder="Contraseña">
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="form-group">
                    <label for="exampleInputPassword2">Repetir contraseña</label>
                    <input type="password" class="form-control" id="clavex1" name="clave_repeat" placeholder="Repeat Contraseña">
                  </div>
                </div>
            </div>
              
              <div class="text-center">
                <button type="button" class="btn btn-outline-danger btn-lg btn-rounded" data-dismiss="modal"><i class=" far fa-times-circle"></i>&nbsp;Cancelar</button>
                <button type="submit" class="btn btn-outline-success btn-lg btn-rounded"><i class="  fas fa-arrow-circle-right"></i>&nbsp;Registrarse</button>
              </div>
            </form>
      
          </div>
          
        </div>
      </div>
    </div>
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
     <script src="<?php echo base_url().'assets_sistema/';?>js/login.js?v=<?php echo rand();?>"></script>
    <!--<script src="https://cdn.jsdelivr.net/npm/sweetalert2@8.18.6/dist/sweetalert2.all.min.js"></script> -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9.1.5/dist/sweetalert2.all.min.js"></script>
   
    <!--Custom JavaScript -->
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
            $("#frm_login").slideUp();
            $("#recoverform").fadeIn();
        });
    </script>



<script>

</script>

<script>
    function soloNumeros(e){

      var key = window.event ? e.which : e.keyCode;
      if (key < 48 || key > 57) {
        e.preventDefault();
      }

}           
</script>

    <script>
        function mensaje() {
             
            Swal.fire({
              position: 'top-start',
              type: 'warning',
              text: 'Próximamente se estará habilitando',
              showConfirmButton: false,
              timer: 1500
            })
        }
    </script>

    <script>
         $(document).ready(function(){  
         $(document).on('submit', '#user_form', function(event){  
           event.preventDefault();  

           var clavexx = $("#clavex").val();
           var clavexx1 = $("#clavex1").val();
           var usuariox = $("#usuario").val();
           var rucxx = $("#rucx").val();
           var direccionxx = $("#direccionx").val();
           var emailxx = $("#emailx").val();



           //mandar a pintar a todos los campos

           /*if (usuariox=="" || rucxx=="" || direccionxx=="" || clavexx=="" || clavexx1=="") {

              $("#clavex").css("border","1px solid #117864");
              $("#clavex1").css("border","1px solid #117864");
              $("#usuario").css("border","1px solid #117864");
              $("#rucx").css("border","1px solid #117864");
              $("#direccionx").css("border","1px solid #117864");

              return false;
           }*/

           if (usuariox=="" || usuariox ==0) {
            Swal.fire({
              position: 'top-end',
              icon: 'warning',
              text: 'El campo empresa esta vacio',
              showConfirmButton: false,
              timer: 1500
            })
            $("#usuario").focus();
            $("#usuario").css("border","1px solid #117864");
           return false;

           }else if(usuariox.length<2){
            Swal.fire({
              position: 'top-end',
              icon: 'warning',
              text: 'El campo empresa debe ser mayor a 2 caracteres',
              showConfirmButton: false,
              timer: 1500
            })
            $("#usuario").focus();
            $("#usuario").css("border","1px solid #117864");
           return false;
           }else if(usuariox.length>100){
              Swal.fire({
                position: 'top-end',
                icon: 'warning',
                text: 'El campo empresa debe ser menor a 100 caracteres',
                showConfirmButton: false,
                timer: 1500
              })
              $("#usuario").focus();
              $("#usuario").css("border","1px solid #117864");
             return false;
           }else{

           }

           //ruc

           if (rucxx=="" || rucxx==0) {
            Swal.fire({
                position: 'top-end',
                icon: 'warning',
                text: 'El campo ruc esta vacio',
                showConfirmButton: false,
                timer: 1500
              })
              $("#rucx").focus();
              $("#rucx").css("border","1px solid #117864");
             return false;
           }else if(rucxx.length<8 || rucxx.length>11){
              Swal.fire({
                position: 'top-end',
                icon: 'warning',
                text: 'El campo ruc debe tener entre 8 a 11 caracteres',
                showConfirmButton: false,
                timer: 1500
              })
                $("#rucx").focus();
                $("#rucx").css("border","1px solid #117864");
               return false;
           }

           //validar campo direccion
           if (direccionxx=="" || direccionxx ==0) {
            Swal.fire({
              position: 'top-end',
              icon: 'warning',
              text: 'El campo dirección esta vacio',
              showConfirmButton: false,
              timer: 1500
            })
            $("#direccionx").focus();
            $("#direccionx").css("border","1px solid #117864");
           return false;

           }else if(direccionxx.length<10){
            Swal.fire({
              position: 'top-end',
              icon: 'warning',
              text: 'El campo dirección debe ser mayor a 10 caracteres',
              showConfirmButton: false,
              timer: 1500
            })
            $("#direccionx").focus();
            $("#direccionx").css("border","1px solid #117864");
           return false;
           }else if(direccionxx.length>200){
              Swal.fire({
                position: 'top-end',
                icon: 'warning',
                text: 'El campo dirección debe ser menor a 200 caracteres',
                showConfirmButton: false,
                timer: 1500
              })
              $("#direccionx").focus();
              $("#direccionx").css("border","1px solid #117864");
             return false;
           }else{

           }

          //email valido

         expr = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;

          if ( !expr.test(emailxx) ){

            Swal.fire({
              position: 'top-end',
              icon: 'warning',
              text: "La dirección de correo " + emailxx + " es incorrecta.",
              showConfirmButton: false,
              timer: 1500
            })
            $("#emailx").focus();
            $("#emailx").css("border","1px solid #117864");
            return false;
          }else{

          }
        



           //clave

           if (clavexx=="" || clavexx==0) {
              Swal.fire({
                position: 'top-end',
                icon: 'warning',
                text: 'El campo Password esta vacio',
                showConfirmButton: false,
                timer: 1500
              })
              $("#clavex").focus();
              $("#clavex").css("border","1px solid #117864");
             return false;

           }

           //clave2 

           if (clavexx1=="" || clavexx1==0) {
              Swal.fire({
                position: 'top-end',
                icon: 'warning',
                text: 'El campo repeat-Password esta vacio',
                showConfirmButton: false,
                timer: 1500
              })
              $("#clavex1").focus();
              $("#clavex1").css("border","1px solid #117864");
             return false;

           }

           //comparacion de las contraseñas

           if (clavexx != clavexx1) {
            Swal.fire({
                position: 'top-end',
                icon: 'warning',
                text: 'Ambas contraseñas deben ser iguales',
                showConfirmButton: false,
                timer: 1500
              })
            //  $("#clavex").focus();
              $("#clavex").css("border","1px solid #117864");
              $("#clavex1").css("border","1px solid #117864");
             return false;
           }



            $.ajax({  
                 url:"<?php echo base_url().'Inicio/registrar/';?>",
                 method:'POST',  
                 data:new FormData(this),  
                 contentType:false,  
                 processData:false,  
                 success:function(data)  
                 {  
                    var json = JSON.parse(data);
                      Swal.fire({
                          position: 'top-end',
                          icon: 'success',
                          text: ''+json.mensaje+'',
                          showConfirmButton: false,
                          timer: 1500
                        })  
                      $('#user_form')[0].reset();  
                      $('#exampleModal').modal('hide');  
                     // $('#div_load').load(location.href+" #div_load>*","");
                     // dataTable.ajax.reload();  
                 },statusCode:{
                  400: function(xhr){

                    var json = JSON.parse(xhr.responseText);
                    if (json.alerta) {
                      Swal.fire({
                          title: 'Lo siento mucho (︶︿︶)',
                          text: ""+json.alerta+"",
                          icon: 'warning',
                          showCancelButton: false,
                          confirmButtonColor: '#3085d6',
                          cancelButtonColor: '#d33',
                          confirmButtonText: 'OK (⌣́_⌣̀)!'
                        }).then((result) => {
                          if (result.value) {
                            
                          }
                        })
                     /* $("#alert").html('<div class="alert alert-success text-center" id="alerta" role="alert">'+json.alerta+'</div>'); */
                    }
                  }
                    
                  } 
            });  
           
            
      });  
     });
    </script>

    <script src="<?php echo base_url().'sunatphp-master/';?>example/js/ajaxview.js"></script>
    <script>
      $(document).ready(function(){
        $("#btn-submit").click(function(e){
          var $this = $(this);
          e.preventDefault();
          //$this.button('loading');
          $.ajaxblock();
          $.ajax({
            data: { "nruc" : $("#nruc").val() },
            type: "POST",
            dataType: "json",
            url: "<?php echo base_url().'sunatphp-master/';?>example/consulta.php/",
          }).done(function( data, textStatus, jqXHR ){
            if(data['success']!="false" && data['success']!=false)
            {
              $("#json_code").text(JSON.stringify(data, null, '\t'));
              if(typeof(data['result'])!='undefined')
              {
                $("#tbody").html("");
                $.each(data['result'], function(i, v)
                {
                  $("#usuario").val(data['result']['razon_social']);
                  $("#rucx").val(data['result']['ruc']);
                  $("#direccionx").val(data['result']['direccion']);
                  
                });
              }
              //$this.button('reset');
              $("#error").hide();
              $(".result").show();
              $.ajaxunblock();
            }
            else
            {
              if(typeof(data['msg'])!='undefined')
              {
                alert( data['msg'] );
              }
              //$this.button('reset');
              $.ajaxunblock();
            }
          }).fail(function( jqXHR, textStatus, errorThrown ){
            alert( "Solicitud fallida:" + textStatus );
            $this.button('reset');
            $.ajaxunblock();
          });
        });
      });
    </script>


    <script>
       $('#action_forget_password').click(function(){
          var forget_email = $('#forget_email').val();
          if(ValidateEmail(forget_email)){
          $.post("<?php echo base_url().'Recover_password/forget_password/';?>",
          {
          forget_email: forget_email
          },
          function(data){
          $('#msg').html(data);
          });
          }else{
          $('#msg').html('<strong style="color: red;">Invalid Email Format.</strong>');
          $("#forget_email").focus();
          }
          });
    </script>
    
</body>

</html>