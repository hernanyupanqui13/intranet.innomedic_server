                <!-- ============================================================== -->
                <!-- End PAge Content -->
                <!-- ============================================================== --> 
                <!-- ============================================================== -->
                <!-- Right sidebar -->
                <!-- ============================================================== -->
                <!-- .right-sidebar -->
                <!-- .right-sidebar --> 
                <div class="right-sidebar">
                    <div class="slimscrollright"> 
                        <div class="rpanel-title"> Panel de Diseño <span><i class="ti-close right-side-toggle"></i></span> </div>
                        <div class="r-panel-body">
                            <ul id="themecolors" class="m-t-20">
                                <li><b>Con barra lateral ligera</b></li>
                                <li><a href="javascript:void(0)" data-skin="skin-default" class="default-theme">1</a></li>
                                <li><a href="javascript:void(0)" data-skin="skin-green" class="green-theme">2</a></li>
                                <li><a href="javascript:void(0)" data-skin="skin-red" class="red-theme">3</a></li>
                                <li><a href="javascript:void(0)" data-skin="skin-blue" class="blue-theme working">4</a></li>
                                <li><a href="javascript:void(0)" data-skin="skin-purple" class="purple-theme">5</a></li>
                                <li><a href="javascript:void(0)" data-skin="skin-megna" class="megna-theme">6</a></li>
                                <li class="d-block m-t-30"><b>Con barra lateral oscura</b></li>
                                <li><a href="javascript:void(0)" data-skin="skin-default-dark" class="default-dark-theme ">7</a></li> 
                                <li><a href="javascript:void(0)" data-skin="skin-green-dark" class="green-dark-theme">8</a></li>
                                <li><a href="javascript:void(0)" data-skin="skin-red-dark" class="red-dark-theme">9</a></li>
                                <li><a href="javascript:void(0)" data-skin="skin-blue-dark" class="blue-dark-theme">10</a></li>
                                <li><a href="javascript:void(0)" data-skin="skin-purple-dark" class="purple-dark-theme">11</a></li>
                                <li><a href="javascript:void(0)" data-skin="skin-megna-dark" class="megna-dark-theme ">12</a></li>
                            </ul>
                            <ul class="m-t-20 chatonline">
                               <!-- <li><b>Usuarios en Linea</b></li>
                                <div class="text-center">&nbsp;<input style="width: 90%;" type="text" class="btn-rounded  btn-sm btn-block"  id="myInput" name="descripcion" placeholder="Buscar Contacto" autocomplete="off"></div>
                                <span class="litas_evaristo" id="lista_data_result"></span>-->
                            </ul>
                            
                        </div>
                    </div>
                </div>

                <!-- ============================================================== -->
                <!-- End Right sidebar -->
                <!-- ============================================================== -->
            </div>
            <!-- ============================================================== -->
            <!-- End Container fluid  -->
            <!-- ============================================================== -->
        </div>
        <!-- ============================================================== -->
        <!-- End Page wrapper  -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- footer -->
        <!-- ============================================================== -->
        <footer class="footer text-center"> 
            &copy; 2019 - <?php  echo date('Y');?> creado por &nbsp;<?php  echo $title[3] ?>
        </footer>
        <!-- ============================================================== -->
        <!-- End footer -->
        <!-- ============================================================== -->
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
    <!-- slimscrollbar scrollbar JavaScript -->
    <script src="<?php echo base_url().'assets_sistema/';?>dist/js/perfect-scrollbar.jquery.min.js"></script>
    <!--Wave Effects -->
    <script src="<?php echo base_url().'assets_sistema/';?>dist/js/waves.js"></script>
    <!--Menu sidebar -->
    <script src="<?php echo base_url().'assets_sistema/';?>dist/js/sidebarmenu.js"></script>
    <!--Custom JavaScript -->
    <script src="<?php echo base_url().'assets_sistema/';?>dist/js/custom.min.js"></script>
    <!-- Footable -->
    <script src="<?php echo base_url().'assets_sistema/';?>node_modules/moment/moment.js"></script>
    <script src="<?php echo base_url().'assets_sistema/';?>node_modules/footable/js/footable.min.js?=<?php echo rand();?>"></script>
    <!--FooTable init-->
    <script src="<?php echo base_url().'assets_sistema/';?>dist/js/pages/footable-init.js"></script>


    <!--<script src="https://cdn.jsdelivr.net/npm/sweetalert2@9.3.1/dist/sweetalert2.all.min.js"></script>-->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9.7.1/dist/sweetalert2.all.min.js"></script>
   <!--stickey kit -->
    <script src="<?php echo base_url().'assets_sistema/';?>node_modules/sticky-kit-master/dist/sticky-kit.min.js"></script>
    <script src="<?php echo base_url().'assets_sistema/';?>node_modules/sparkline/jquery.sparkline.min.js"></script>

    <script src="<?php echo base_url().'assets_sistema/';?>node_modules/toast-master/js/jquery.toast.js"></script>
    <script src="<?php echo base_url().'assets_sistema/';?>dist/js/pages/toastr.js"></script>

     <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
    <!-- ============================================================== -->
    <!-- This page plugins -->
    <!-- ============================================================== -->
    
     <!--morris JavaScript -->
    <script src="<?php echo base_url().'assets_sistema/';?>node_modules/raphael/raphael-min.js"></script>


    <script src="<?php echo base_url().'assets_sistema/';?>node_modules/morrisjs/morris.js"></script>
    <!--<script src="<?php echo base_url().'assets_sistema/';?>dist/js/pages/morris-data.js"></script>-->

<!--   <script>
  jQuery(function($){
  $('#showcase-example-2').footable({
    "columns": [
      { "name": "Id", "title": "ID", "breakpoints": "xs" },
      { "name": "nro_identificador", "title": "First Name" },
      { "name": "dni", "title": "Last Name" },
      { "name": "nombre", "title": "Job Title", "breakpoints": "xs" },
      { "name": "apellido_paterno", "title": "Started On", "breakpoints": "xs sm" },
      { "name": "apellido_materno", "title": "DOB", "breakpoints": "xs sm md" }
    ],
    "rows": $.get('<?php echo base_url().'Examenes/Ordenes/obtener_registro_ajax/';?>'),
  });
});
</script>-->

<script>
    

    function impirmir(id) {
        // body...
        
         $("#eva").hide().show('fast', function() {
               $("#eva").show()
            });

        window.print();
       
        $("title").attr('title', "dwdwdwd");
       

    }
</script>

<script>
 /* jQuery(function($){
  $('#showcase-example-1').footable({
   // "columns": $.get('https://fooplugins.github.io/FooTable/docs/content/columns.json'),
   // "rows": $.get('https://fooplugins.github.io/FooTable/docs/content/rows.json')

  });*/
</script>

      <script>
        $(function(){
            $('#botoncito').on('click', function(){
                var dni = $('#dni').val();
                //var url = '<?php echo base_url().'assets_sistema/reniec/consulta_reniec.php/';?>';
                let url = `https://dni.optimizeperu.com/api/persons/${dni}`;

                $.ajax({
                type:'GET',
                url: `${window.location.origin}/assets_sistema/dni-peru-consult/entry_point.php?dni=${dni}`,
                //data:'dni='+dni,
                success: function(datos_dni){
                  datos_dni = JSON.parse(datos_dni);
                  var datos = eval(datos_dni);
                  $('#dni_mostrar_dni').val(datos_dni.dni);
                  $('#apellido_paterno_x').val(datos_dni.apellidoPaterno);
                  $('#apellido_materno').val(datos_dni.apellidoMaterno);
                  $('#nombres_completos').val(datos_dni.nombres);                       
                }
            });
            return false;
            });
        });

        $(function(){
            $('#botoncito_xxx').on('click', function(){
              //  $('#dni_mostrar_dni').attr('placeholder', 'value');
                $('#apellido_paterno_x').attr('placeholder', 'Buscando apellido paterno...');
                $('#apellido_materno').attr('placeholder', 'Buscando apellido materno...');
                $('#nombres_completos').attr('placeholder', 'Buscando nombres...');
                $('#apellido_paterno_x').attr("readonly","true");
                $('#apellido_materno').attr("readonly","true");
                $('#nombres_completos').attr("readonly","true");
                $('#apellido_paterno_x').val("");
                $('#apellido_materno').val("");
                $('#nombres_completos').val("");
                var dni = $('#dni_evaristo').val();
                var url = `https://dni.optimizeperu.com/api/persons/${dni}`;
                $.ajax({
                type:'GET',
                url: `${window.location.origin}/assets_sistema/dni-peru-consult/entry_point.php?dni=${dni}`,
                
                success: function(datos_dni){
                  datos_dni = JSON.parse(datos_dni);
                    console.log(datos_dni);
                    
                        
                    if (datos_dni.name == "_") {
                      Swal.fire({
                          icon: 'error',
                          title: 'Oops...',
                          text: 'El DNI a consultar no existe !Verificar!',
                          footer: '<a href>Comunicate con el Administrador(Asistente T.I)</a>'
                        })
                        $('#dni_mostrar_dni').val("");
                        $('#apellido_paterno_x').val("");
                        $('#apellido_materno').val("");
                        $('#nombres_completos').val("");
                         $('#apellido_paterno_x').removeAttr("readonly");
                        $('#apellido_materno').removeAttr("readonly");
                        $('#nombres_completos').removeAttr("readonly");
                        $('#apellido_paterno_x').attr('placeholder', 'Ingrese apellido paterno').val("").focus().blur();
                        $('#apellido_materno').attr('placeholder', 'Ingrese apellido materno').val("").focus().blur();
                        $('#nombres_completos').attr('placeholder', 'Ingrese nombres').val("").focus().blur();
                        
                        
                        
                    }else{
                        $('#dni_mostrar_dni').val(datos_dni.dni);
                        $('#apellido_paterno_x').val(datos_dni.apellidoPaterno);
                        $('#apellido_materno').val(datos_dni.apellidoMaterno);
                        $('#nombres_completos').val(datos_dni.nombres);
                        $('#apellido_paterno_x').removeAttr("readonly");
                        $('#apellido_materno').removeAttr("readonly");
                        $('#nombres_completos').removeAttr("readonly");
                    }
                       
                },error: function(jqXHR, textStatus, errorThrown)
                             {
                   Swal.fire({
                    title: 'Lo siento mucho (︶︿︶)',
                    text: "Algo paso con el sistema Vuelva a intentar una vez mas",
                    icon: 'warning',
                    showCancelButton: false,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Ok!(︶︿︶)!'
                  }).then((result) => {
                    if (result.value) {
                        $('#dni_mostrar_dni').val("");
                        $('#apellido_paterno_x').val("");
                        $('#apellido_materno').val("");
                        $('#nombres_completos').val("");
                     
                    }
                  })
              }


            });
            return false;

            });
            
            
        });
        </script>

        <script>
          $(document).ready(function() {
            $(document).on('submit', '#register_form_contatuc', function(event) {
              event.preventDefault();
              /* Act on the event */
              var asunto_____________ = $("#asunto___________________").val();
              var exampleTextarea = $("#exampleTextarea").val();
             
              //validacion de asunto para el envio de mensaje

              if (asunto_____________ == null || asunto_____________.length == 0 || /^\s+$/.test(asunto_____________)) {
                const Toast = Swal.mixin({
                  toast: true,
                  position: 'top-end',
                  showConfirmButton: false,
                  timer: 3000,
                  timerProgressBar: true,
                  onOpen: (toast) => {
                    toast.addEventListener('mouseenter', Swal.stopTimer)
                    toast.addEventListener('mouseleave', Swal.resumeTimer)
                  }
                })

                Toast.fire({
                  icon: 'error',
                  text: ' Ingrese su asunto'
                })

            
                return false;
              }
              //validamos que ingrese mensaje antes de enviar los datos al sistema


               if (exampleTextarea == null || exampleTextarea.length == 0 || /^\s+$/.test(exampleTextarea)) {
                const Toast = Swal.mixin({
                  toast: true,
                  position: 'top-end',
                  showConfirmButton: false,
                  timer: 3000,
                  timerProgressBar: true,
                  onOpen: (toast) => {
                    toast.addEventListener('mouseenter', Swal.stopTimer)
                    toast.addEventListener('mouseleave', Swal.resumeTimer)
                  }
                })

                Toast.fire({
                  icon: 'error',
                  text: ' Ingrese su mensaje'
                })

            
                return false;
              }

                $.ajax({
                  url: '<?php echo base_url().'Mantenimiento/Enviar_Boleta_Pago/registrar_formulario_de_contacto/';?>',
                  type: 'POST',
                 /* data:new FormData(this),  
                  contentType:false,  
                  processData:false, */
                  data: $("#register_form_contatuc").serialize(),
                })
                .done(function() {
                  const Toast = Swal.mixin({
                      toast: true,
                      position: 'top-end',
                      showConfirmButton: false,
                      timer: 3000,
                      timerProgressBar: true,
                      onOpen: (toast) => {
                        toast.addEventListener('mouseenter', Swal.stopTimer)
                        toast.addEventListener('mouseleave', Swal.resumeTimer)
                      }
                    })

                    Toast.fire({
                      icon: 'success',
                      title: 'Se envio de manera correcta'
                    })
                  console.log("success");
                  $('#register_form_contatuc')[0].reset();  

                })
                .fail(function(jqXHR, textStatus, errorThrown) {
                  console.log("error");
                   if (jqXHR.status === 0) {
                        const Toast = Swal.mixin({
                          toast: true,
                          position: 'top-end',
                          showConfirmButton: false,
                          timer: 3000,
                          timerProgressBar: true,
                          onOpen: (toast) => {
                            toast.addEventListener('mouseenter', Swal.stopTimer)
                            toast.addEventListener('mouseleave', Swal.resumeTimer)
                          }
                        })

                        Toast.fire({
                          icon: 'error',
                          title: 'No tienes Conexion a Internet: Verifique la red.'
                        })

                      } else if (jqXHR.status == 404) {
                        const Toast = Swal.mixin({
                          toast: true,
                          position: 'top-end',
                          showConfirmButton: false,
                          timer: 3000,
                          timerProgressBar: true,
                          onOpen: (toast) => {
                            toast.addEventListener('mouseenter', Swal.stopTimer)
                            toast.addEventListener('mouseleave', Swal.resumeTimer)
                          }
                        })

                        Toast.fire({
                          icon: 'error',
                          title: 'Página solicitada no encontrada [404].'
                        })

                      } else if (jqXHR.status == 500) {
                        const Toast = Swal.mixin({
                          toast: true,
                          position: 'top-end',
                          showConfirmButton: false,
                          timer: 3000,
                          timerProgressBar: true,
                          onOpen: (toast) => {
                            toast.addEventListener('mouseenter', Swal.stopTimer)
                            toast.addEventListener('mouseleave', Swal.resumeTimer)
                          }
                        })

                        Toast.fire({
                          icon: 'error',
                          title: 'Error interno del servidor [500].'
                        })
                       

                      } else if (textStatus === 'parsererror') {

                        const Toast = Swal.mixin({
                          toast: true,
                          position: 'top-end',
                          showConfirmButton: false,
                          timer: 3000,
                          timerProgressBar: true,
                          onOpen: (toast) => {
                            toast.addEventListener('mouseenter', Swal.stopTimer)
                            toast.addEventListener('mouseleave', Swal.resumeTimer)
                          }
                        })

                        Toast.fire({
                          icon: 'error',
                          title: 'El análisis JSON solicitado ha fallado'
                        })

                      } else if (textStatus === 'timeout') {

                        const Toast = Swal.mixin({
                          toast: true,
                          position: 'top-end',
                          showConfirmButton: false,
                          timer: 3000,
                          timerProgressBar: true,
                          onOpen: (toast) => {
                            toast.addEventListener('mouseenter', Swal.stopTimer)
                            toast.addEventListener('mouseleave', Swal.resumeTimer)
                          }
                        })

                        Toast.fire({
                          icon: 'error',
                          title: 'Error de tiempo de espera.'
                        })

                      } else if (textStatus === 'abort') {

                        const Toast = Swal.mixin({
                          toast: true,
                          position: 'top-end',
                          showConfirmButton: false,
                          timer: 3000,
                          timerProgressBar: true,
                          onOpen: (toast) => {
                            toast.addEventListener('mouseenter', Swal.stopTimer)
                            toast.addEventListener('mouseleave', Swal.resumeTimer)
                          }
                        })

                        Toast.fire({
                          icon: 'error',
                          title: 'Solicitud de Ajax abortada'
                        })

                      } else {

                         const Toast = Swal.mixin({
                          toast: true,
                          position: 'top-end',
                          showConfirmButton: false,
                          timer: 3000,
                          timerProgressBar: true,
                          onOpen: (toast) => {
                            toast.addEventListener('mouseenter', Swal.stopTimer)
                            toast.addEventListener('mouseleave', Swal.resumeTimer)
                          }
                        })

                        Toast.fire({
                          icon: 'error',
                          title: 'Solicitud de Ajax abortada ' + jqXHR.responseText+''
                        })


                      }
                })
                .always(function() {
                  console.log("complete");
                });
                
              
            });
          });
        </script>


        <script>
        $(document).ready(function(){

         $('#id_departamento').change(function(){
          var country_id = $('#id_departamento').val();
          if(country_id != '')
          {
           $.ajax({
            url:"<?php echo base_url(); ?>Mantenimiento/Empresas/provincia_lis/",
            method:"POST",
            data:{country_id:country_id},
            success:function(data)
            {
             $('#id_provincia').html(data);
             $('#id_distrito').html('<option value="">--Seleccione Distrito--</option>');
            }
           });
          }
          else
          {
           $('#id_provincia').html('<option value="">--Seleccione Provincia--</option>');
           $('#id_distrito').html('<option value="">--Seleccione Distrito--</option>');
          }
         });

         $('#id_provincia').change(function(){
            var state_id = $('#id_provincia').val();
            if(state_id != '')
            {
                $.ajax({
                    url:"<?php echo base_url(); ?>Mantenimiento/Empresas/distrito_list/",
                    method:"POST",
                    data:{state_id:state_id},
                    success:function(data)
                    {
                        $('#id_distrito').html(data);
                    }
                });
            }
            else
            {
                $('#id_distrito').html('<option value="">--Seleccione Distrito--</option>');
            }
        });


      //agregar losa datos de unidad medida unidad_medida_xxx
     $("#select2xxxx").on('change',function(){
       //$('#select2xxxx').change(function(){
          $('#unidad_medida_xxx').val(null).trigger('change');
         // $("#unidad_medida_xxx").val();
          var country_id = $('#userid_xxxxxx').val();
          if(country_id != '')
          {
           $.ajax({
            url:"<?php echo base_url(); ?>Mantenimiento/Pedidos/lista_producto_x_categoria/",
            method:"POST",
            data:{country_id:country_id},
            success:function(data)
            {
             $('#unidad_medida_xxx').html(data);
            // $('#id_distrito').html('<option value="">--Seleccione Distrito--</option>');
            }
           });
          }
          else
          {
           $('#unidad_medida_xxx').html('<option value="">--Seleccione Unidad Medida--</option>');
        //   $('#id_distrito').html('<option value="">--Seleccione Distrito--</option>');
          }
         });



      //agregamos los datos del trabajador lo compleatmaosa-->
      //agregar losa datos de unidad medida unidad_medida_xxx
       $("#trabajadores_emple_xx_x").change(function(){
    //  $("#trabajadores_emple_xx_x").keypress(function() {
    

           
         
       //$('#select2xxxx').change(function(){
          //$('#unidad_medida_xxx').val(null).trigger('change');
          $('#telefono_emple').val(null).trigger('change');
          $('#dni_emple').val(null).trigger('change');
         // $("#unidad_medida_xxx").val();
          var country_id = $('#trabajadores_empl_id').val();
          if(country_id != '')
          {
           $.ajax({
           // url:"<?php echo base_url(); ?>Mantenimiento/Pedidos/lista_producto_x_categoria/",
            url:"<?php echo base_url(); ?>Inventario/Pedidos/listar_trabajadores_por_id/",
            data:{country_id:country_id},
            dataType:"JSON",
            method:"POST",
            success:function(data)
            {

             $('#dni_emple').val(data.nro_documento);
             $('#telefono_emple').val(data.telefono);
           
            // $('#id_distrito').html('<option value="">--Seleccione Distrito--</option>');
            
            }
           });
          }
          else
          {
           $('#unidad_medida_xxx').html('<option value="">--Seleccione Unidad Medida--</option>');
        //   $('#id_distrito').html('<option value="">--Seleccione Distrito--</option>');
          }
         });





        });
    </script>
    <!--cargar datos de notificacion-->
  
    <script type="text/javascript">
      // //obtener la lista de usuarios conectados al sistema
        function Notificacion() {
            $.ajax({
            url: "<?php echo base_url().'Mantenimiento/Enviar_Boleta_Pago/listar_boleta_pago_por_usuario/';?>",
            method:"POST",
            contentType:false,
            processData:false,
            success:function(data){
                var resultado = JSON.parse(data);
                var contenido = '';                
                $.each(resultado, function(index, value) {
                  if (value.view==1) {
                    $("#aplicamos").html(`<span class="heartbit"></span> <span class="point"></span>`);
                  }else{
                    $("#aplicamos").html(``);
                  }
                  let variable

                  if (value.archivo=="" || value.archivo==null ) {
                    variable ="9923e9ae4bc8a9c8da3e32943118ed89.png"
                  }else{
                    variable = ""+value.archivo+""
                  }

                  let color
                  if (value.view==2) {
                    colores = `<span id="register">
                                  <a class="data_xx_ bg-dark" target="_blank"  href="<?php echo base_url().'upload/';?>boletas/`+variable+`"  id="`+value.Id+`" >
                                      <div class="btn btn-danger btn-circle"><i class="fa fa-link"></i></div>&nbsp;<span class="label label-danger">Visto</span>
                                      <div class="mail-contnet text-white " >
                                          <h5 class="text-light">`+value.empresa+`</h5> <span class="mail-desc text-light"> Tipo de Boleta: `+value.boleta+`</span>
                                         </span><span class="time text-light"><small>`+value.fecha_enviado_xx+`</small></span> </div>
                                  </a>

                     
                                </span>  `

                  }else{
                    colores = `<span id="register">
                                  <a class="data_xx_" target="_blank"  href="<?php echo base_url().'upload/';?>boletas/`+variable+`"  id="`+value.Id+`" >
                                      <div class="btn btn-danger btn-circle cambia_Estado "><i class="fa fa-link"></i></div>&nbsp;<span class="label label-success">Nuevo</span>
                                      <div class="mail-contnet " >
                                          <h5>`+value.empresa+`</h5> <span class="mail-desc"> Tipo de Boleta: `+value.boleta+`</span>
                                         <p class=" label label-success text-white"><small>`+value.fecha_enviado_xx+`</small></p> </div>
                                  </a>

                                </span> `
                  }

                  contenido += ` `+colores+` `;
                });

                $("#listar_notificacion_por_usuario").html(contenido);
            },
            complete: function() { 
              /*solo una vez que la petición se completa (success o no success) 
              pedimos una nueva petición en 3 segundos */
              /*setTimeout(function(){
                Notificacion();
              }, 2000);
              changed by hernan
              */
            }
              
        })
      };

      $(function() {
          Notificacion();
      });

    </script>
   
   


    <script type="text/javascript">

      // //obtener la lista de usuarios conectados al sistema
       /* function connected() {
            $.ajax({
            url: "<?php echo base_url().'Intranet/obtener_lista_usuarios_connect/';?>",
            method:"POST",
            contentType:false,
            processData:false,
            success:function(data){
                var resultado = JSON.parse(data);
                var contenido = '';
                

                $.each(resultado, function(index, value) {
                  let variable
                  if (value.imagen=="" || value.imagen==null ) {
                    variable ="foto.png"
                  }else{
                    variable = ""+value.imagen+""
                  }
                    contenido += `<span class="blog-inner"><li>
                                    <a href="javascript:void(0)"><img src="<?php echo base_url().'upload/';?>images/`+variable+`" alt="user-img" class="img-circle"> <span>`+value.nombres+`<small class="`+value.color+`">`+value.conec+`</small></span></a>
                                </li></span>
                    `;
                });

                $("#lista_data_result").html(contenido);
            },
            complete: function() { 
        /* solo una vez que la petición se completa (success o no success) 
           pedimos una nueva petición en 3 segundos 
               setTimeout(function(){
                 connected();
               }, 10000);
              } 
        })
        };*/

       /* $(function() {
            connected();
        });*/

        $(document).ready(function() {
          $("#myInput").on("keyup", function() {
            var value = $(this).val().toLowerCase();
            $("body").filter(function() {
              $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
            });
          });

          //cambiar el estado a 1
          $(document).on('mouseup', '.data_xx_', function(event) {
            event.preventDefault();
            /* Act on the event */
            var user_id = $(this).attr("id"); 

            $.ajax({
              url: '<?php echo base_url().'Mantenimiento/Enviar_Boleta_Pago/cambia_estado_url/';?>',
              type: 'POST',
              data: {user_id: user_id},
            })
            .done(function() {
              console.log("success");
              $("#aplicamos").html(``);
            })
            .fail(function() {
              console.log("error");
            })
            .always(function() {
              console.log("complete");
            });
            
            

          });
        });


        
    </script>



    <!--BUSQUEDA DE TRABAJADORES-->
     
    <!--END</!-->



 <!--<script src="https://code.jquery.com/jquery-1.12.4.js"></script>-->
 

 <!--autocompletado-->
  <script type='text/javascript'>
    $(document).ready(function(){

     // Initialize 
     $( "#autouser" ).autocomplete({
        source: function( request, response ) {
          // Fetch data
          $.ajax({
            url: "<?php echo base_url().'View_intranet/Ficha_personal/lista_departamento/';?>",
            type: 'post',
            dataType: "json",
            data: {
              search: request.term
            },
            success: function( data ) {
              response( data );
            }
          });
        },
        select: function (event, ui) {
          // Set selection
          $('#autouser').val(ui.item.label); // display the selected text
          $('#userid').val(ui.item.value); // save selected id to input
          return false;
        }
      });

     //agregamos la lista de productos

     $( "#select2xxxx" ).autocomplete({
        source: function( request, response ) {
          // Fetch data
          $.ajax({
            url: "<?php echo base_url().'Mantenimiento/Pedidos/Lista_descripcion_list_add_autocomplete_lis/';?>",
            type: 'post',
            dataType: "json",
            data: {
              search: request.term
            },
            success: function( data ) {
              response( data );
            }
          });
        },
        select: function (event, ui) {
          // Set selection
          $('#select2xxxx').val(ui.item.label); // display the selected text
          $('#userid_xxxxxx').val(ui.item.value); // save selected id to input
          return false;
        }
      });

     //Buscamos los datos del trabajador-->
      // Initialize 
       $( "#trabajadores_emple_xx_x" ).autocomplete({
          source: function( request, response ) {
            // Fetch data
            $.ajax({
              url: "<?php echo base_url().'Inventario/Pedidos/lista_trabajadores/';?>",
              type: 'post',
              dataType: "json",
              data: {
                search: request.term
              },
              success: function(data) {
                response(data);
              }
            });
          },
          select: function (event, ui) { 
            // Set selection
            $('#trabajadores_emple_xx_x').val(ui.item.label); // display the selected text
            $('#trabajadores_emple_xx').val(ui.item.value); // save selected id to input
            $('#trabajadores_empl_id').val(ui.item.id); // save selected id to input
            return false;
          }
        });

       //Buscamos los datos del producto-->
      // Initialize 
       $("#codigo_producto_xx" ).autocomplete({

          source: function( request, response ) {

            //esto es una prueba de para desabilitar  
            
            // Fetch data 
            $.ajax({
              url: "<?php echo base_url().'Inventario/Pedidos/lista_productos_xx/';?>",
              type: 'post',
              dataType: "json",
              data: {
                search: request.term
              },
              success: function(data) {
                response(data);
                $('#btn-agregar').attr('disabled', false);
             
              }
            });
          },

          select: function (event, ui) {
            // Set selection
             data = ui.item.id+ "*"+ui.item.codigo+ "*"+ui.item.label+"*"+ ui.item.stock;
            $('#codigo_producto_xx').val(ui.item.label); // display the selected text
            $('#codigo_producto_xx_xx').val(ui.item.label); // save selected id to input
            $('#codigo_producto_xx_id').val(ui.item.id); // save selected id to input


            $("#btn-agregar").val(data);
            return false;

          }



        });


       //registro de exmaen
        $( "#examen_entered_by_usr" ).autocomplete({
          source: function( request, response ) {
            // Fetch data
            $.ajax({
              url: "<?php echo base_url().'Examenes/Examenes/lista_examenes/';?>",
              type: 'post',
              dataType: "json",
              data: {
                search: request.term
              },
              success: function(data) {
                response(data);
              }
            });
          },
          select: function (event, ui) { 
            // Set selection
            $('#examen_entered_by_usr').val(ui.item.label); // display the selected text
            $('#nombre_examen').val(ui.item.value); // save selected id to input
           $('#id_examen').val(ui.item.id); // save selected id to input
            return false;
          }
        });


     

    });
    </script>

    <!--centro estudios autocompletar-->


     <!--autocompletado-->
  <script type='text/javascript'>
    $(document).ready(function(){

     // Initialize 
     $( "#centro_estudiosxx" ).autocomplete({
        source: function( request, response ) {
          // Fetch data
          $.ajax({
            url: "<?php echo base_url().'View_intranet/Formacion_academica/lista_centro_estiudios/';?>",
            type: 'post',
            dataType: "json",
            data: {
              search: request.term
            },
            success: function( data ) {
              response( data );
            }
          });
        },
        select: function (event, ui) {
          // Set selection
          $('#centro_estudiosxx').val(ui.item.label); // display the selected text
          $('#centro_estudios_vali').val(ui.item.value); // save selected id to input
          return false;
        }
      });

    });
    </script>

    <!--centro de estudios de la universidad-->

     <script type='text/javascript'>
    $(document).ready(function(){

     // Initialize 
     $( "#centro_estudiosxxx" ).autocomplete({
        source: function( request, response ) {
          // Fetch data
          $.ajax({
            url: "<?php echo base_url().'View_intranet/Formacion_academica/lista_universidad/';?>",
            type: 'post',
            dataType: "json",
            data: {
              search: request.term
            },
            success: function( data ) {
              response( data );
            }
          });
        },
        select: function (event, ui) {
          // Set selection
          $('#centro_estudiosxxx').val(ui.item.label); // display the selected text
          $('#centro_estudios_valix').val(ui.item.value); // save selected id to input
          return false;
        }
      });

    });
    </script>


    <!--lista de colegios-->

    <script type='text/javascript'>
    $(document).ready(function(){

     // Initialize centro_estudios[]
    $("#centro_estudiosx").autocomplete({
        source: function( request, response ) {
          // Fetch data
          $.ajax({
            url: "<?php echo base_url().'View_intranet/Formacion_academica/lista_colegios/';?>",
            type: 'post',
            dataType: "json",
            data: {
              search: request.term
            },
            success: function( data ) {
              response( data );
            }
          });
        },
        select: function (event, ui) {
          // Set selection
          $("#centro_estudiosx").val(ui.item.label); // display the selected text
          //$('#userid_id').val(ui.item.value); // save selected id to input
          return false;
        }
      });

    });


    </script>

    <!--gradoa academico-->
     <script type='text/javascript'>
    $(document).ready(function(){

     // Initialize centro_estudios[]
    $("#grado_academico").autocomplete({
        source: function( request, response ) {
          // Fetch data
          $.ajax({
            url: "<?php echo base_url().'View_intranet/Formacion_academica/grado_academico/';?>",
            type: 'post',
            dataType: "json",
            data: {
              search: request.term
            },
            success: function( data ) {
              response( data );
            }
          });
        },
        select: function (event, ui) {
          // Set selection
          $("#grado_academico").val(ui.item.label); // display the selected text
          //$('#grado_acedemico_x').val(ui.item.value); // save selected id to input
          return false;
        }
      });

    });


    </script>

    

    <!--espcialidad-->

    <script type='text/javascript'>
    $(document).ready(function(){
     // Initialize centro_estudios[]
    $("#especialidadx").autocomplete({
        source: function( request, response ) {
          // Fetch data
          $.ajax({
            url: "<?php echo base_url().'View_intranet/Formacion_academica/lista_espcialidad/';?>",
            type: 'post',
            dataType: "json",
            data: {
              search: request.term
            },
            success: function( data ) {
              response( data );
            }
          });
        },
        select: function (event, ui) {
          // Set selection
          $("#especialidadx").val(ui.item.label); // display the selected text
          $('#especialidadxx').val(ui.item.value); // save selected id to input
          return false;
        }
      });

    });


    </script>

    <!--ts enfermedades-->

     <script type='text/javascript'>
        $(document).ready(function(){

         // Initialize centro_estudios[]
        $("#enfermedades_comunes_id_xx_data").autocomplete({
            source: function( request, response ) {
              // Fetch data
              $.ajax({
                url: "<?php echo base_url().'View_intranet/Seguro_Salud/Obetener_registros/';?>",
                type: 'post',
                dataType: "json",
                data: {
                  search: request.term
                },
                success: function( data ) {
                  response( data );
                }
              });
            },
            select: function (event, ui) {
              // Set selection
              $("#enfermedades_comunes_id_xx_data").val(ui.item.label); // display the selected text
              $('#enfermedades_comunes_id_xx_data').val(ui.item.value); // save selected id to input
              return false;
            }
          });

        });


    </script>




    <!--update-->

        <!--autocompletado-->
  <script type='text/javascript'>
    $(document).ready(function(){

     // Initialize 
     $( "#centro_estudios_xx_updating" ).autocomplete({
        source: function( request, response ) {
          // Fetch data
          $.ajax({
            url: "<?php echo base_url().'View_intranet/Formacion_academica/lista_centro_estiudios/';?>",
            type: 'post',
            dataType: "json",
            data: {
              search: request.term
            },
            success: function( data ) {
              response( data );
            }
          });
        },
        select: function (event, ui) {
          // Set selection
          $('#centro_estudios_xx_updating').val(ui.item.label); // display the selected text
          $('#centro_estudios_valix_updating').val(ui.item.value); // save selected id to input
          return false;
        }
      });

    });
    </script>

     <!--gradoa academico-->
     <script type='text/javascript'>
    $(document).ready(function(){

     // Initialize centro_estudios[]
    $("#grado_academico_xx_updating").autocomplete({
        source: function( request, response ) {
          // Fetch data
          $.ajax({
            url: "<?php echo base_url().'View_intranet/Formacion_academica/grado_academico/';?>",
            type: 'post',
            dataType: "json",
            data: {
              search: request.term
            },
            success: function( data ) {
              response( data );
            }
          });
        },
        select: function (event, ui) {
          // Set selection
          $("#grado_academico_xx_updating").val(ui.item.label); // display the selected text
          $('#grado_academico_validate_xx_updating').val(ui.item.value); // save selected id to input
          return false;
        }
      });

    });


    </script>

    

    <!--espcialidad-->

    <script type='text/javascript'>
    $(document).ready(function(){
     // Initialize centro_estudios[]
    $("#especialidad_upating").autocomplete({
        source: function( request, response ) {
          // Fetch data
          $.ajax({
            url: "<?php echo base_url().'View_intranet/Formacion_academica/lista_espcialidad/';?>",
            type: 'post',
            dataType: "json",
            data: {
              search: request.term
            },
            success: function( data ) {
              response( data );
            }
          });
        },
        select: function (event, ui) {
          // Set selection
          $("#especialidad_upating").val(ui.item.label); // display the selected text
          $('#especialidadxx_updating').val(ui.item.value); // save selected id to input
          return false;
        }
      });

    });


    </script>

    <!--hasta aqui viene el actualizacion-->






    <script type='text/javascript'>
    $(document).ready(function(){
     // Initialize centro_estudios[]
    $("#empresa_lis_xx").autocomplete({
        source: function( request, response ) {
          // Fetch data
          $.ajax({
            url: "<?php echo base_url().'Atencion/Historial/listar_empresas/';?>",
            type: 'post',
            dataType: "json",
            data: {
              search: request.term
            },
            success: function( data ) {
              response( data );
            }
          });
        },
        select: function (event, ui) {
          // Set selection
          $("#empresa_lis_xx").val(ui.item.label); // display the selected text
          $('#empresa_lis_xx_id').val(ui.item.value); // save selected id to input
          return false;
        }
      });

    });


    </script>

  <!--par actusaloizar-->






    <script type='text/javascript'>
    $(document).ready(function(){
     // Initialize centro_estudios[]
    $("#empresa_lis_xxxx").autocomplete({
        source: function( request, response ) {
          // Fetch data
          $.ajax({
            url: "<?php echo base_url().'Atencion/Historial/listar_empresas/';?>",
            type: 'post',
            dataType: "json",
            data: {
              search: request.term
            },
            success: function( data ) {
              response( data );
            }
          });
        },
        select: function (event, ui) {
          // Set selection
          $("#empresa_lis_xxxx").val(ui.item.label); // display the selected text
          $('#empresa_lis_xxxx_id').val(ui.item.value); // save selected id to input
          return false;
        }
      });

    // tabla ts_puesto

    $("#puesto_txt_busqueda").autocomplete({
        source: function( request, response ) {
          // Fetch data
          $.ajax({
            url: "<?php echo base_url().'Mantenimiento/Usuario/listar_ts_puesto/';?>",
            type: 'post',
            dataType: "json",
            data: {
              search: request.term
            },
            success: function( data ) {
              response( data );
            }
          });
        },
        select: function (event, ui) {
          // Set selection
          $("#puesto_txt_busqueda").val(ui.item.label); // display the selected text
          $('#puesto_txt_busqueda_txt').val(ui.item.value); // save selected id to input
          return false;
        }
      });


    $("#puesto").autocomplete({
        source: function( request, response ) {
          // Fetch data
          $.ajax({
            url: "<?php echo base_url().'Mantenimiento/Usuario/listar_ts_puesto/';?>",
            type: 'post',
            dataType: "json",
            data: {
              search: request.term
            },
            success: function( data ) {
              response( data );
            }
          });
        },
        select: function (event, ui) {
          // Set selection
          $("#puesto").val(ui.item.label); // display the selected text
          $('#puesto_txt_busqueda_txt').val(ui.item.value); // save selected id to input
          return false;
        }
      });


    $("#empresa_xxxxxxxxxxx").autocomplete({
        source: function( request, response ) {
          // Fetch data
          $.ajax({
            url: "<?php echo base_url().'Examenes/Examenes/listar_proveedores/';?>",
            type: 'post',
            dataType: "json",
            data: {
              search: request.term
            },
            success: function( data ) {
              response( data );
            }
          });
        },
        select: function (event, ui) {
          // Set selection
          $("#empresa_xxxxxxxxxxx").val(ui.item.label); // display the selected text
          $('#empresa_xxxxxxxxxxx').val(ui.item.value);
          $('#empresa_id_x').val(ui.item.id);
          $('#ruc_xxxx_empresa_xxx').val(ui.item.ruc);  // save selected id to input
          return false;
        }
      });

    //ts_areas

    $("#area_txt_busqueda").autocomplete({
        source: function( request, response ) {
          // Fetch data
          $.ajax({
            url: "<?php echo base_url().'Mantenimiento/Usuario/listar_ts_areas/';?>",
            type: 'post',
            dataType: "json",
            data: {
              search: request.term
            },
            success: function( data ) {
              response( data );
            }
          });
        },
        select: function (event, ui) {
          // Set selection
          $("#area_txt_busqueda").val(ui.item.label); // display the selected text
          $('#area_txt_busqueda_txt').val(ui.item.value); // save selected id to input
          return false;
        }
      });

    //lista_usuairio y email al mimso tiempo

    $("#mostrar_registros_usuario_email").autocomplete({
        source: function( request, response ) {
          // Fetch data
          $.ajax({
            url: "<?php echo base_url().'Mantenimiento/Enviar_Boleta_Pago/listar_usuarios_por_nombre_y_correo/';?>",
            type: 'post',
            dataType: "json",
            data: {
              search: request.term
            },
            success: function( data ) {
              response( data );
            }
          });
        },
        select: function (event, ui) {
          // Set selection
          $("#mostrar_registros_usuario_email").val(ui.item.label); // display the selected text
          $('#id_usuario_id___').val(ui.item.value); // save selected id to input
          $('#id_usuario_id_xxx').val(ui.item.id); // save selected id to input
          return false;
        }
      });

    });


    </script>

  <!--probelma del autocmplet-->
    <style>ul.ui-autocomplete {
    z-index: 1100;
        }  

       
    </style>


    <!-- ============================================================== -->
    <!-- Plugins for this page -->
    <!-- ============================================================== -->
    <!-- jQuery file upload -->
    <script src="<?php echo base_url().'assets_sistema/';?>node_modules/dropify/dist/js/dropify.min.js?<?php echo rand(); ?>"></script>
    <script>
    $(document).ready(function() {
        // Basic
        $('.dropify').dropify();

        // Translated
        $('.dropify-fr').dropify({
            messages: {
                default: 'Glissez-déposez un fichier ici ou cliquez',
                replace: 'Glissez-déposez un fichier ou cliquez pour remplacer',
                remove: 'Supprimer',
                error: 'Désolé, le fichier trop volumineux'
            }
        });

        // Used events
        var drEvent = $('#input-file-events').dropify();

        drEvent.on('dropify.beforeClear', function(event, element) {
            return confirm("Do you really want to delete \"" + element.file.name + "\" ?");
        });

        drEvent.on('dropify.afterClear', function(event, element) {
            alert('File deleted');
        });

        drEvent.on('dropify.errors', function(event, element) {
            console.log('Has Errors');
        });

        var drDestroy = $('#input-file-to-destroy').dropify();
        drDestroy = drDestroy.data('dropify')
        $('#toggleDropify').on('click', function(e) {
            e.preventDefault();
            if (drDestroy.isDropified()) {
                drDestroy.destroy();
            } else {
                drDestroy.init();
            }
        })
    });
    </script>

     <!-- This is data table -->
    <script src="<?php echo base_url().'assets_sistema/';?>node_modules/datatables/datatables.min.js?<?php echo rand(); ?>"></script>
 
    <!-- start - This is for export functionality only -->
    <script src="https://cdn.datatables.net/buttons/1.5.1/js/dataTables.buttons.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.5.1/js/buttons.flash.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.32/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.32/vfs_fonts.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.5.1/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.5.1/js/buttons.print.min.js"></script>

    
    <!-- end - This is for export functionality only -->
    <script>
    $(function() {
        $('#myTable').DataTable();
        $(function() {
            var table = $('#example').DataTable({
                "columnDefs": [{
                    "visible": false,
                    "targets": 2
                }],
                "order": [
                    [2, 'asc']
                ],
                "displayLength": 25,
                "drawCallback": function(settings) {
                    var api = this.api();
                    var rows = api.rows({
                        page: 'current'
                    }).nodes();
                    var last = null;
                    api.column(2, {
                        page: 'current'
                    }).data().each(function(group, i) {
                        if (last !== group) {
                            $(rows).eq(i).before('<tr class="group"><td colspan="5">' + group + '</td></tr>');
                            last = group;
                        }
                    });
                }
            });
            // Order by the grouping
            $('#example tbody').on('click', 'tr.group', function() {
                var currentOrder = table.order()[0];
                if (currentOrder[0] === 2 && currentOrder[1] === 'asc') {
                    table.order([2, 'desc']).draw();
                } else {
                    table.order([2, 'asc']).draw();
                }
            });
        });
    });
    $('#example23').DataTable({
        dom: 'Bfrtip',
        buttons: [
            'copy', 'csv', 'excel', 'pdf', 'print'
        ]
    });
    $('.buttons-copy, .buttons-csv, .buttons-print, .buttons-pdf, .buttons-excel').addClass('btn btn-primary mr-1');
    </script>


    

    <!-- ============================================================== -->
    <script src="<?php echo base_url().'assets_sistema/';?>node_modules/switchery/dist/switchery.min.js"></script>
    <script src="<?php echo base_url().'assets_sistema/';?>node_modules/select2/dist/js/select2.full.min.js" type="text/javascript"></script>
    <script src="<?php echo base_url().'assets_sistema/';?>node_modules/bootstrap-select/bootstrap-select.min.js" type="text/javascript"></script>
    <script src="<?php echo base_url().'assets_sistema/';?>node_modules/bootstrap-tagsinput/dist/bootstrap-tagsinput.min.js"></script>
    <script src="<?php echo base_url().'assets_sistema/';?>node_modules/bootstrap-touchspin/dist/jquery.bootstrap-touchspin.js" type="text/javascript"></script>
    <script src="<?php echo base_url().'assets_sistema/';?>node_modules/dff/dff.js" type="text/javascript"></script>
    <script type="text/javascript" src="<?php echo base_url().'assets_sistema/';?>node_modules/multiselect/js/jquery.multi-select.js"></script>

    <script>
        $(function () {
            // Switchery
            var elems = Array.prototype.slice.call(document.querySelectorAll('.js-switch'));
            $('.js-switch').each(function () {
                new Switchery($(this)[0], $(this).data());
            });
            // For select 2
            $(".select2").select2();
            $(".select2x").select2();
            $('#select2xx').select2();
            $(".select2xxeva").select2();

            /*proeblas con select2

                      <div id="myModal" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
                ...
                <select id="mySelect2">
                    ...
                </select>
                ...
            </div>

            ...

        
                $('#mySelect2').select2({
                    dropdownParent: $('#myModal')
                });
           

            */

            $('.selectpicker').selectpicker();
            //Bootstrap-TouchSpin
            $(".vertical-spin").TouchSpin({
                verticalbuttons: true
            });
            var vspinTrue = $(".vertical-spin").TouchSpin({
                verticalbuttons: true
            });
            if (vspinTrue) {
                $('.vertical-spin').prev('.bootstrap-touchspin-prefix').remove();
            }
            $("input[name='tch1']").TouchSpin({
                min: 0,
                max: 100,
                step: 0.1,
                decimals: 2,
                boostat: 5,
                maxboostedstep: 10,
                postfix: '%'
            });
            $("input[name='tch2']").TouchSpin({
                min: -1000000000,
                max: 1000000000,
                stepinterval: 50,
                maxboostedstep: 10000000,
                prefix: '$'
            });
            $("input[name='tch3']").TouchSpin();
            $("input[name='tch3_22']").TouchSpin({
                initval: 40
            });
            $("input[name='tch5']").TouchSpin({
                prefix: "pre",
                postfix: "post"
            });
            // For multiselect
            $('#pre-selected-options').multiSelect();
            $('#optgroup').multiSelect({
                selectableOptgroup: true
            });
            $('#public-methods').multiSelect();
            $('#select-all').click(function () {
                $('#public-methods').multiSelect('select_all');
                return false;
            });
            $('#deselect-all').click(function () {
                $('#public-methods').multiSelect('deselect_all');
                return false;
            });
            $('#refresh').on('click', function () {
                $('#public-methods').multiSelect('refresh');
                return false;
            });
            $('#add-option').on('click', function () {
                $('#public-methods').multiSelect('addOption', {
                    value: 42,
                    text: 'test 42',
                    index: 0
                });
                return false;
            });
            $(".ajax").select2({
                ajax: {
                    url: "https://api.github.com/search/repositories",
                    dataType: 'json',
                    delay: 250,
                    data: function (params) {
                        return {
                            q: params.term, // search term
                            page: params.page
                        };
                    },
                    processResults: function (data, params) {
                        // parse the results into the format expected by Select2
                        // since we are using custom formatting functions we do not need to
                        // alter the remote JSON data, except to indicate that infinite
                        // scrolling can be used
                        params.page = params.page || 1;
                        return {
                            results: data.items,
                            pagination: {
                                more: (params.page * 30) < data.total_count
                            }
                        };
                    },
                    cache: true
                },
                escapeMarkup: function (markup) {
                    return markup;
                }, // let our custom formatter work
                minimumInputLength: 1,
                //templateResult: formatRepo, // omitted for brevity, see the source of this page
                //templateSelection: formatRepoSelection // omitted for brevity, see the source of this page
            });
        });
    </script>

    <!-- wysuhtml5 Plugin JavaScript -->
    <script src="<?php echo base_url().'assets_sistema/';?>node_modules/tinymce/tinymce.min.js"></script>
    <script>
    $(document).ready(function() {

        if ($("#mymce").length > 0) {
            tinymce.init({
                selector: "textarea#mymce",
                theme: "modern",
                height: 250,
                plugins: [
                    "advlist autolink link image lists charmap print preview hr anchor pagebreak spellchecker",
                    "searchreplace wordcount visualblocks visualchars code fullscreen insertdatetime media nonbreaking",
                    "save table contextmenu directionality emoticons template paste textcolor"
                ],
                toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | l      ink image | print preview media fullpage | forecolor backcolor emoticons",

            });
        }
    });
    </script>


        <!-- Plugin JavaScript -->
 
    <script src="<?php echo base_url().'assets_sistema/';?>node_modules/bootstrap-material-datetimepicker/js/bootstrap-material-datetimepicker.js"></script>
    <!-- Clock Plugin JavaScript -->
    <script src="<?php echo base_url().'assets_sistema/';?>node_modules/clockpicker/dist/jquery-clockpicker.min.js"></script>
    <!-- Color Picker Plugin JavaScript -->
    <script src="<?php echo base_url().'assets_sistema/';?>node_modules/jquery-asColor/dist/jquery-asColor.js"></script>
    <script src="<?php echo base_url().'assets_sistema/';?>node_modules/jquery-asGradient/dist/jquery-asGradient.js"></script>
    <script src="<?php echo base_url().'assets_sistema/';?>node_modules/jquery-asColorPicker-master/dist/jquery-asColorPicker.min.js"></script>
    <!-- Date Picker Plugin JavaScript -->
    <script src="<?php echo base_url().'assets_sistema/';?>node_modules/bootstrap-datepicker/bootstrap-datepicker.min.js"></script>
    <!-- Date range Plugin JavaScript -->
    <script src="<?php echo base_url().'assets_sistema/';?>node_modules/timepicker/bootstrap-timepicker.min.js"></script>
    <script src="<?php echo base_url().'assets_sistema/';?>node_modules/bootstrap-daterangepicker/daterangepicker.js"></script>
    <script>


    $('#min-date').bootstrapMaterialDatePicker({ format: 'YYYY-MM-DD HH:MM:SS', minDate: new Date() });
    $("#min-date_update").bootstrapMaterialDatePicker({format: 'YYYY-MM-DD HH:MM:SS', minDate: new Date() });
    // MAterial Date picker    
    $('#mdate').bootstrapMaterialDatePicker({ weekStart: 0, time: false });
    $('#mdatex').bootstrapMaterialDatePicker({ weekStart: 0, time: false });
    $('#mdatexx').bootstrapMaterialDatePicker({ weekStart: 0, time: false });
    $('#mdatexxx').bootstrapMaterialDatePicker({ weekStart: 0, time: false });
    $('#mdatexxxx').bootstrapMaterialDatePicker({ weekStart: 0, time: false });
    $('#mdatexxxxx').bootstrapMaterialDatePicker({ weekStart: 0, time: false });
    $('#mdatexxxxxx').bootstrapMaterialDatePicker({ weekStart: 0, time: false });
    $('#mdatexxxxxxx').bootstrapMaterialDatePicker({ weekStart: 0, time: false });

    //validacion de fecha
    $('#fechainicio_x').bootstrapMaterialDatePicker({ weekStart: 0, time: false });
    $('#fecha_fin_x').bootstrapMaterialDatePicker({ weekStart: 0, time: false });
    //mostrar fecha
    //Calendars are not linked
    $('.timeseconds').daterangepicker({
        timePicker: true,
        timePickerIncrement: 30,
        timePicker24Hour: false,
        timePickerSeconds: true,
        locale: {
            format: 'MM-DD-YYYY h:mm:ss'
        }
    });

     $('#date-format').bootstrapMaterialDatePicker({ format: 'YYYY-MM-DD h:mm:ss' }); 



    
    $('#timepicker').bootstrapMaterialDatePicker({ format: 'HH:mm', time: true, date: false });
    $('#date-format').bootstrapMaterialDatePicker({ format: 'dddd DD MMMM YYYY - HH:mm' });

    $('#min-date').bootstrapMaterialDatePicker({ format: 'DD/MM/YYYY HH:mm', minDate: new Date() });
    // Clock pickers
    $('#single-input').clockpicker({
        placement: 'bottom',
        align: 'left',
        autoclose: true,
        'default': 'now'
    });
    $('.clockpicker').clockpicker({
        donetext: 'Done',
    }).find('input').change(function() {
        console.log(this.value);
    });
    $('#check-minutes').click(function(e) {
        // Have to stop propagation here
        e.stopPropagation();
        input.clockpicker('show').clockpicker('toggleView', 'minutes');
    });
    if (/mobile/i.test(navigator.userAgent)) {
        $('input').prop('readOnly', true);
    }
    // Colorpicker
    $(".colorpicker").asColorPicker();
    $(".complex-colorpicker").asColorPicker({
        mode: 'complex'
    });
    $(".gradient-colorpicker").asColorPicker({
        mode: 'gradient'
    });
    // Date Picker
    jQuery('.mydatepicker, #datepicker').datepicker();
    jQuery('#datepicker-autoclose').datepicker({
        autoclose: true,
        todayHighlight: true
    });
    jQuery('#date-range').datepicker({
        toggleActive: true
    });
    jQuery('#datepicker-inline').datepicker({
        todayHighlight: true
    });
    // -------------------------------
  // Start Date Range Picker
  // -------------------------------

    // Basic Date Range Picker
    $('.daterange').daterangepicker();

    // Date & Time
    $('.datetime').daterangepicker({
        timePicker: true,
        timePickerIncrement: 30,
        locale: {
            format: 'MM/DD/YYYY h:mm A'
        }
    });

    //Calendars are not linked
    $('.timeseconds').daterangepicker({
        timePicker: true,
        timePickerIncrement: 30,
        timePicker24Hour: true,
        timePickerSeconds: true,
        locale: {
            format: 'MM-DD-YYYY h:mm:ss'
        }
    });

    // Single Date Range Picker
    $('.singledate').daterangepicker({
        singleDatePicker: true,
        showDropdowns: true
    });

    // Auto Apply Date Range
    $('.autoapply').daterangepicker({
        autoApply: true,
    });

    // Calendars are not linked
    $('.linkedCalendars').daterangepicker({
        linkedCalendars: false,
    });

    // Date Limit
    $('.dateLimit').daterangepicker({
        dateLimit: {
            days: 7
        },
    });

    // Show Dropdowns
    $('.showdropdowns').daterangepicker({
        showDropdowns: true,
    });

    // Show Week Numbers
    $('.showweeknumbers').daterangepicker({
        showWeekNumbers: true,
    });

     $('.dateranges').daterangepicker({
        ranges: {
            'Today': [moment(), moment()],
            'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
            'Last 7 Days': [moment().subtract(6, 'days'), moment()],
            'Last 30 Days': [moment().subtract(29, 'days'), moment()],
            'This Month': [moment().startOf('month'), moment().endOf('month')],
            'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
        }
    });

    // Always Show Calendar on Ranges
    $('.shawCalRanges').daterangepicker({
        ranges: {
            'Today': [moment(), moment()],
            'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
            'Last 7 Days': [moment().subtract(6, 'days'), moment()],
            'Last 30 Days': [moment().subtract(29, 'days'), moment()],
            'This Month': [moment().startOf('month'), moment().endOf('month')],
            'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
        },
        alwaysShowCalendars: true,
    });

    // Top of the form-control open alignment
    $('.drops').daterangepicker({
        drops: "up" // up/down
    });

    // Custom button options
    $('.buttonClass').daterangepicker({
        drops: "up",
        buttonClasses: "btn",
        applyClass: "btn-info",
        cancelClass: "btn-danger"
    });

  jQuery('#date-range').datepicker({
        toggleActive: true
    });
    jQuery('#datepicker-inline').datepicker({
        todayHighlight: true
    });

    // Daterange picker
    $('.input-daterange-datepicker').daterangepicker({
        buttonClasses: ['btn', 'btn-sm'],
        applyClass: 'btn-danger',
        cancelClass: 'btn-inverse'
    });
    $('.input-daterange-timepicker').daterangepicker({
        timePicker: true,
        format: 'MM/DD/YYYY h:mm A',
        timePickerIncrement: 30,
        timePicker12Hour: true,
        timePickerSeconds: false,
        buttonClasses: ['btn', 'btn-sm'],
        applyClass: 'btn-danger',
        cancelClass: 'btn-inverse'
    });
    $('.input-limit-datepicker').daterangepicker({
        format: 'MM/DD/YYYY',
        minDate: '06/01/2015',
        maxDate: '06/30/2015',
        buttonClasses: ['btn', 'btn-sm'],
        applyClass: 'btn-danger',
        cancelClass: 'btn-inverse',
        dateLimit: {
            days: 6
        }
    });


   
    </script>

     <script src="<?php echo base_url().'assets_sistema/';?>node_modules/html5-editor/wysihtml5-0.3.0.js"></script>
    <script src="<?php echo base_url().'assets_sistema/';?>node_modules/html5-editor/bootstrap-wysihtml5.js"></script>
    <script src="<?php echo base_url().'assets_sistema/';?>node_modules/dropzone-master/dist/dropzone.js"></script>
    <script>
    $(document).ready(function() {

        $('.textarea_editor').wysihtml5();

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
                  $("#txt_telefono").val(data['result']['Telefono']);

                  //mostrar busqueda
                  $("#usuarioxx").html(data['result']['razon_social']);
                  $("#rucxxx").html(data['result']['ruc']);
                  $("#direccionxxx").html(data['result']['direccion']);
                  $("#txt_telefonoxx").html(data['result']['Telefono']);
                  
                });
              }
              //$this.button('reset');
              $("#error").hide();
              $(".result").show();
              $("#ocultamos_id").show().delay(5000);
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
            function numero_(e){
                tecla = (document.all) ? e.keyCode : e.which;

                //Tecla de retroceso para borrar, siempre la permite
                if (tecla==8){
                    return true;
                }

                // Patron de entrada, en este caso solo acepta numeros
                patron =/[0-9.]/;
                tecla_final = String.fromCharCode(tecla);
                return patron.test(tecla_final);
            }
        </script>




<script src="<?php echo base_url().'assets_sistema/';?>dist/js/pages/jquery.PrintArea.js" type="text/JavaScript"></script>


    <script>


      //imoprimkr
    $(document).ready(function() {
        $("#print").click(function() {
     
   
            $("#ocultar_print").hide().show('fast', function() {
               $("#ocultar_print").show()
            });

            var mode = 'iframe'; //popup
            var close = mode == "popup";
            var options = {
                mode: mode,
                popClose: close
            };
            $("div.printableArea").printArea(options);
        });
    });

    //imprimomos

     //imoprimkr
    $(document).ready(function() {
        $("#print_evaristo_escudero").click(function() {

          //  var mode = 'popup'; //popup
            //var close = mode == "popup";
            var modes = { popup : "popup",iframe : "iframe" };
            /*var optionss = {
                mode: mode,
                popClose: close,
                popTitle : 'HOJA DE RUTA INNOMEDIC - <?php echo rand();?>'
       
              
            };*/
             var defaults = { 
                     mode : modes.iframe,
                     popHt    : 500,
                     popWd    : 400,
                     popX     : 200,
                     popY     : 200,
                     popTitle : '',
                     popClose : false };

    
            $("div.printableArea_desc").printArea(defaults);
            // window.onload = function() {  $("div.printableArea_desc").printArea(optionss); }
        });
    });

    //imprimimos los datos de prueba rapida

    
    $(document).ready(function() {
        //oit
        $("#print_prueba_consentimiento_consentimiento").click(function() {
            var mode = 'iframe'; //popup
            var close = mode == "popup";
            var options = {
                mode: mode,
                popClose: close
            };
            $("div.printableAreaconsetimiento").printArea(options);
        });


         //oit
        $("#prienAreadetalle_general_rayos_xxx").click(function() {
            var mode = 'iframe'; //popup
            var close = mode == "popup";
            var options = {
                mode: mode,
                popClose: close
            };
            $("div.prienAreadetalle_general").printArea(options);
        });

        //paquete1

         $("#print_paquete1_imprimir").click(function() {

            $(".agregamos_br").append(`<br><br>
              <br>
              <br>
              <br>
              <br>
              <br><br><br><br><br><br><br><br><br><br><br><br><br>`);

            $("#exampleModal_paquete1").modal("hide");

            var mode = 'iframe'; //popup
            var close = mode == "popup";
            var options = {
                mode: mode,
                popClose: close
            };
            $("div.printableArea_paquete1").printArea(options);
           // $("div.printAreapaquete11").printArea(options);
        });

        



        

        
    });
  







    </script>

     <script src="<?php echo base_url().'assets_sistema/';?>dist/js/pages/chat.js"></script>


    <!-- jQuery peity -->
    <script src="<?php echo base_url().'assets_sistema/';?>node_modules/tablesaw/dist/tablesaw.jquery.js"></script>
    <script src="<?php echo base_url().'assets_sistema/';?>node_modules/tablesaw/dist/tablesaw-init.js"></script>


   <script src="<?php echo base_url().'assets_sistema/';?>node_modules/datatables.net/js/jquery.dataTables.min.js?<?php echo rand(); ?>"></script>
    <script src="<?php echo base_url().'assets_sistema/';?>node_modules/datatables.net-bs4/js/dataTables.responsive.min.js?<?php echo rand(); ?>"></script>

  <!--reporytes de hichar-->
  <script src="<?php echo base_url().'assets_sistema/';?>dist/highcharts/highcharts.js?=<?php echo rand(); ?>"></script>
  <script src="<?php echo base_url().'assets_sistema/';?>dist/highcharts/exporting.js?=<?php echo rand(); ?>"></script>

<script>
  $(document).ready(function() {
    var base_url= "<?php echo base_url();?>";
      /*Ejecucion de la funcion datagrafico*/
    
    var year = (new Date).getFullYear();
    datagrafico(base_url,year);
    $("#year").on("change",function(){
         yearselect = $(this).val();
         datagrafico(base_url,yearselect);
    });
  });

      //CAPTURAR VALORES DEL METODO FECHA Y MONTO DEL GRAFICO
       
    function datagrafico(base_url,year){  
        namesMonth = ["Ene","Feb","Mar","Abr","May","Jun","Jul","Ago","Sep","Oct","Nov","Dic"];
        $.ajax({
            url : "<?php echo base_url().'Inventario/View_Inventario/getData' ?>",
            type : "POST",
            data : { year : year },
            dataType : "json",
            success : function(data){
                var meses = new Array();
                var montos = new Array();
                $.each(data,function(key, value){
                    meses.push(namesMonth[value.mes - 1]);
                    valor = Number(value.monto);
                    montos.push(valor);
                 
                });
                graficar(meses,montos,year);
            }
        });
    }
       
    //FUNCION GRAFICOS
    function graficar(meses, montos, year){
        Highcharts.chart('grafico', {
        chart: {
        type: 'column'
        },
        title: {
        text: 'Reportes de las pedidos'
        },
        subtitle: {
        text: 'Año: ' + year
        },
        xAxis: {
            categories: meses,
            crosshair: true
        },
        yAxis: {
        min: 0,
        title: {
        text: 'Total de Pedidos'
            }
        },
        tooltip: {
        headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
       // pointFormat: '<tr><td style="color:{series.color};padding:0">Colaborador: </td>' +
        //'<td style="padding:0"><b>{point.y:.2f}</b></td></tr>',
        footerFormat: '</table>',
        shared: true,
        useHTML: true
        },
       /* plotOptions: {
            column: {
                pointPadding: 0,
                borderWidth: 0
            },
                series: {
                    dataLabels: {
                        enabled: true,
                        formatter:function(){
                            //return Highcharts.numberFormat(this.y,2)
                            return Highcharts.numberFormat(this.y,2)
                        }
                    }
                }
        },*/
        series: [{
            name: 'Total de Pedidos entregados',
            data: montos

        /*}, {
            name: 'New York',
            data: [83.6, 78.8, 98.5, 93.4, 106.0, 84.5, 105.0, 104.3, 91.2, 83.5, 106.6, 92.3]

        }, {
            name: 'London',
            data: [48.9, 38.8, 39.3, 41.4, 47.0, 48.3, 59.0, 59.6, 52.4, 65.2, 59.3, 51.2]

        }, {
            name: 'Berlin',
            data: [42.4, 33.2, 34.5, 39.7, 52.6, 75.5, 57.4, 60.4, 47.6, 39.1, 46.8, 51.1]
    */
        }]
    });
       }

   
</script>


<!--el probelma esta aqui final-->
      <script>
          // MAterial Date picker    
          $('#mdate').bootstrapMaterialDatePicker({ weekStart: 0, time: false });
          $('#timepicker').bootstrapMaterialDatePicker({ format: 'HH:mm', time: true, date: false });
          $('#date-format').bootstrapMaterialDatePicker({ format: 'dddd DD MMMM YYYY - HH:mm' });

          $('#min-date').bootstrapMaterialDatePicker({ format: 'DD/MM/YYYY HH:mm', minDate: new Date() });
          // Clock pickers
          $('#single-input').clockpicker({
              placement: 'bottom',
              align: 'left',
              autoclose: true,
              'default': 'now'
          });
          $('.clockpicker').clockpicker({
              donetext: 'Done',
          }).find('input').change(function() {
              console.log(this.value);
          });
          $('#check-minutes').click(function(e) {
              // Have to stop propagation here
              e.stopPropagation();
              input.clockpicker('show').clockpicker('toggleView', 'minutes');
          });
          if (/mobile/i.test(navigator.userAgent)) {
              $('input').prop('readOnly', false);//true
          }
          // Colorpicker
          $(".colorpicker").asColorPicker();
          $(".complex-colorpicker").asColorPicker({
              mode: 'complex'
          });
          $(".gradient-colorpicker").asColorPicker({
              mode: 'gradient'
          });
          // Date Picker
          jQuery('.mydatepicker, #datepicker').datepicker();
          jQuery('#datepicker-autoclose').datepicker({
              autoclose: true,
              todayHighlight: true
          });
          jQuery('#date-range').datepicker({
              toggleActive: true
          });
          jQuery('#datepicker-inline').datepicker({
              todayHighlight: true
          });
          // -------------------------------
        // Start Date Range Picker
        // -------------------------------

          // Basic Date Range Picker
          $('.daterange').daterangepicker();

          // Date & Time
          $('.datetime').daterangepicker({
              timePicker: true,
              timePickerIncrement: 30,
              locale: {
                  format: 'MM/DD/YYYY h:mm A'
              }
          });

          //Calendars are not linked
          $('.timeseconds').daterangepicker({
              timePicker: true,
              timePickerIncrement: 30,
              timePicker24Hour: true,
              timePickerSeconds: true,
              locale: {
                  format: 'MM-DD-YYYY h:mm:ss'
              }
          });

          // Single Date Range Picker
          $('.singledate').daterangepicker({
              singleDatePicker: true,
              showDropdowns: true
          });

          // Auto Apply Date Range
          $('.autoapply').daterangepicker({
              autoApply: true,
          });

          // Calendars are not linked
          $('.linkedCalendars').daterangepicker({
              linkedCalendars: false,
          });

          // Date Limit
          $('.dateLimit').daterangepicker({
              dateLimit: {
                  days: 7
              },
          });

          // Show Dropdowns
          $('.showdropdowns').daterangepicker({
              showDropdowns: true,
          });

          // Show Week Numbers
          $('.showweeknumbers').daterangepicker({
              showWeekNumbers: true,
          });

           $('.dateranges').daterangepicker({
              ranges: {
                  'Today': [moment(), moment()],
                  'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
                  'Last 7 Days': [moment().subtract(6, 'days'), moment()],
                  'Last 30 Days': [moment().subtract(29, 'days'), moment()],
                  'This Month': [moment().startOf('month'), moment().endOf('month')],
                  'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
              }
          });

          // Always Show Calendar on Ranges
          $('.shawCalRanges').daterangepicker({
              ranges: {
                  'Today': [moment(), moment()],
                  'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
                  'Last 7 Days': [moment().subtract(6, 'days'), moment()],
                  'Last 30 Days': [moment().subtract(29, 'days'), moment()],
                  'This Month': [moment().startOf('month'), moment().endOf('month')],
                  'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
              },
              alwaysShowCalendars: true,
          });

          // Top of the form-control open alignment
          $('.drops').daterangepicker({
              drops: "up" // up/down
          });

          // Custom button options
          $('.buttonClass').daterangepicker({
              drops: "up",
              buttonClasses: "btn",
              applyClass: "btn-info",
              cancelClass: "btn-danger"
          });

        jQuery('#date-range').datepicker({
              toggleActive: true
          });
          jQuery('#datepicker-inline').datepicker({
              todayHighlight: true
          });

          // Daterange picker
          $('.input-daterange-datepicker').daterangepicker({
              buttonClasses: ['btn', 'btn-sm'],
              applyClass: 'btn-danger',
              cancelClass: 'btn-inverse'
          });
          $('.input-daterange-timepicker').daterangepicker({
              timePicker: true,
              format: 'MM/DD/YYYY h:mm A',
              timePickerIncrement: 30,
              timePicker12Hour: true,
              timePickerSeconds: false,
              buttonClasses: ['btn', 'btn-sm'],
              applyClass: 'btn-danger',
              cancelClass: 'btn-inverse'
          });
          $('.input-limit-datepicker').daterangepicker({
              format: 'MM/DD/YYYY',
              minDate: '06/01/2015',
              maxDate: '06/30/2015',
              buttonClasses: ['btn', 'btn-sm'],
              applyClass: 'btn-danger',
              cancelClass: 'btn-inverse',
              dateLimit: {
                  days: 6
              }
          });
      </script>

    <!--el probelma esta aqui final-->




    <script src="<?php echo base_url().'assets_sistema/';?>node_modules/summernote/dist/summernote-bs4.min.js"></script>
    <script>
    $(function() {

        $('.summernote').summernote({
            height: 350, // set editor height
            minHeight: null, // set minimum height of editor
            maxHeight: null, // set maximum height of editor
            focus: false, // set focus to editable area after initializing summernote
            
        });

        $('.inline-editor').summernote({
            airMode: true
        });
      $('.click2edit').summernote({focus: true});

      $('.note-editor').find('textarea').attr('name','title');
     
       

    });


    window.edit = function() {
            $(".click2edit").summernote()
            
        },
        window.save = function() {
            $(".click2edit").summernote('destroy');
        }
    </script>





     <!-- Session-timeout-idle -->
    <script src="<?php echo base_url().'assets_sistema/';?>node_modules/session-timeout/idle/jquery.idletimeout.js?v=<?php echo rand(); ?>"></script>
    <script src="<?php echo base_url().'assets_sistema/';?>node_modules/session-timeout/idle/jquery.idletimer.js?v=<?php echo rand(); ?>"></script>
   <!-- <script src="<?php echo base_url().'assets_sistema/';?>node_modules/session-timeout/idle/session-timeout-idle-init.js?v=<?php echo rand(); ?>"></script>-->
   <!--<script>
     var UIIdleTimeout = function() {
    return {
        init: function() {
            var o;
            $("body").append(""), $.idleTimeout("#idle-timeout-dialog", ".modal-content button:last", {
                idleAfter: 5,
                timeout: 3e4,
                pollingInterval: 5,
                keepAliveURL: "/keep-alive",
                serverResponseEquals: "OK",
                onTimeout: function() {
                    window.location = "<?php echo base_url().'Lockscreen/salir/';?>";
                },
                onIdle: function() {
                    $("#idle-timeout-dialog").modal("show"), o = $("#idle-timeout-counter"), $("#idle-timeout-dialog-keepalive").on("click", function() {
                        $("#idle-timeout-dialog").modal("hide")
                    })
                },
                onCountdown: function(e) {
                    o.html(e)
                }
            })
        }
    }
}();
jQuery(document).ready(function() {
    UIIdleTimeout.init()
});
   </script>-->



</body>

</html>