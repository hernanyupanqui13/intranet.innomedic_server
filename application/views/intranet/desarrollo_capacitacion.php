				
   <?php
            $data_ficha_personal = $this->db->query("SET lc_time_names = 'es_PE'");
            $data_ficha_personal = $this->db->query("select *,(
            select departamento from ts_departamento where Id=id_departamento) as departamento,
            (select provincia from ts_provincia where Id=id_provincia) as provincia,
            (select distrito from ts_distrito where Id=id_distrito) as distrito,
            (select civil from ts_estado_civil where Id=id_estado ) as estado_civil,
            (select departamento from ts_departamento where Id=id_lugar_nacimiento_dep) as nacimiento,
            DATE_FORMAT(fecha_nacimiento,'%d de %M %Y') AS fecha_nac_dia
            from ts_datos_personales where id_usuario=".$this->session->userdata("session_id")."");
            foreach ($data_ficha_personal->result() as $xx) {
                $nombres_completosx = $xx->apellido_paterno." ". $xx->apellido_materno." ".$xx->nombres;
                $apellido_paternox = $xx->apellido_paterno;
                $apellido_maternox = $xx->apellido_materno;
                $urlx = $xx->url;


                

            } ?>
              <div class="row">
                <div class="col-12">
                  <div class="card">
                    <div class="card-body">
                      <a href="javascript:void(0)" data-toggle='modal' data-target='#exampleModal' class="btn btn-outline-success btn-rounded btn-md"><i class=" fas fa-plus-circle"></i>&nbsp;Agregar Nuevo</a>
                    </div>
                   
                  </div>
                </div> 
              </div>


                <div class="row" id="cargar_resultado">
                	<!--aqui es la carga de data-->
                </div>
                <!-- /.row -->


                <div class="modal fade bd-example-modal-lgsd" id="exampleModal" data-backdrop="static" data-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-lg ">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h3 class="modal-title text-center" id="exampleModalLabel"><?php echo $nombres_completosx;?></h3>                           
                                </div>
                                <div class="modal-body">
                                    <form autocomplete="on" method="post" id="insert_data" class="form-material">
                                      <input type="hidden" name="url" id="url" value="<?php echo $urlx;?>">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="" class="col-form-label">Curso</label>
                                                   <input type="text" name="curso" id="curso" placeholder="Ingrese Cargo" class="form-control" onkeypress="return sololetrasnumeros(event);">
                                                   
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="" class="col-form-label">Centro de Estudio </label>
                                                    <input type="text" name="centro_estudio" id="centro_estudio" class="form-control" placeholder="Ingrese Empresa" onkeypress="return sololetrasnumeros(event);">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label for="" class="col-form-label">Fecha Inicio</label>
                                                   <input type="text" name="fecha_inicio" id="mdate" placeholder="<?php echo date('Y-m-d') ?>" class="form-control">
                                                   
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label for="" class="col-form-label">Fecha Fin </label>
                                                    <input type="text" name="fecha_fin" id="mdatex" class="form-control" placeholder="<?php echo date('Y-m-d') ?>">
                                                </div>
                                            </div>
                                            <div class="col-md-2">
                                                <div class="form-group">
                                                    <label for="" class="col-form-label">Horas</label>
                                                   <input type="text" name="horas" id="horas" maxlength="4" placeholder="Horas" class="form-control" onkeydown="return soloNumeros(event);">
                                                   
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="" class="col-form-label">Creditos </label>
                                                    <input type="text" name="creditos" id="creditos" class="form-control" maxlength="2" placeholder="Ingrese Créditos" onkeydown="return soloNumeros(event);">
                                                </div>
                                            </div>
                                        </div>

                                         <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label for="" class="col-form-label">Archivo</label>
                                                   <input type="file" name="archivo" id="archivo" class="dropify" onchange="fileValidatiosn(this);">
                                                   
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row text-center">
                                            <div class="col-md-12">
                                                <div class="form-actions">
                                                   
                                                    <button type="submit" class="btn btn-success btn-rounded"> <i class="fa fa-check"></i> Registrar</button>
                                                    <button type="button" data-dismiss="modal" class="btn btn-danger btn-rounded"><i class="fa fa-times-circle"></i>&nbsp;Cancelar</button>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                </div>
               
                <script>
                    function soloNumeros(event)
                    {
                        if(event.shiftKey)
                       {
                            event.preventDefault();
                       }

                       if (event.keyCode == 46 || event.keyCode == 8)    {
                       }
                       else {
                            if (event.keyCode < 95) {
                              if (event.keyCode < 48 || event.keyCode > 57) {
                                    event.preventDefault();
                              }
                            } 
                            else {
                                  if (event.keyCode < 96 || event.keyCode > 105) {
                                      event.preventDefault();
                                  }
                            }
                          }
                    }

                    function sololetras(e) {
                          if(e.key.match(/[a-zñçáéíóú,.\s]/i)===null) {
                            // Si la tecla pulsada no es la correcta, eliminado la pulsación
                            e.preventDefault();
                        }
                    }
                    function sololetrasnumeros(e) {
                      if(e.key.match(/[a-z0-9ñçáéíóú,.\s]/i)===null) {
                            // Si la tecla pulsada no es la correcta, eliminado la pulsación
                            e.preventDefault();
                        }
                    }

                </script>


                        <!--cargar los valores con ajax-->
                 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script> 
                  
                    
                    <script type="text/javascript">

                        function cargar_desarrollo_capacitacion() {
                            $.ajax({
                            url: "<?php echo base_url().'View_intranet/Desarrollo_Capacitacion/Desarrollo_Capacitacion_view/';?>",
                            method:"POST",
                            contentType:false,
                            processData:false,
                            success:function(data){

                                var resultado = JSON.parse(data);
                                var contenido = '';
                                var contador = 0;
                                
                    

                                $.each(resultado, function(index, value) {


                                    contador+=1;
                                    contenido += `
                        <div class="col-md-6 col-lg-6 col-xl-6">
	                        <div class="card card-body">
		                        <div class="row align-items-center" >
                                   <div class="col-md-4 col-lg-3 text-center">
                                        <a href="javascript:void();"><img src="<?php echo base_url().'assets_sistema/';?>images/users/ensenar.png" alt="user" class="img-circle img-fluid"></a>
                                    </div>
		                                
	                                <div class="col-md-8 col-lg-9">
	                                    <h3 class="box-title m-b-0">`+value.curso+`</h3> <small>`+value.centro_estudio+`</small>
	                                    <address>
	                                     <a download href="<?php echo base_url().'upload/';?>archivos/`+value.archivo+`" title="">Descargar Certificado
	                                      <i class="fas fa-cloud-download-alt"></i></a>
	                                        <p>`+value.fecha_txt+`&nbsp; a &nbsp;`+value.fecha_txt_fin+`</p>
	                                        <p class="label label-success">Duración Total: `+value.totaltxt+` meses</p>
	                                       
	                                        <span class="label label-primary">`+value.creditos+` creditos</span>
	                                    </address>
	                                </div>
	                                <div class="col-md-12 col-lg-12 text-right">
	                                    <a class="btn btn-outline-danger delete" id="`+value.Id+`" href="javascript:void(0)"><i class="fas fa-trash-alt"></i></a>
	                                    <a class="btn btn-outline-success update" id="`+value.Id+`" href="javascript:void(0)"><i class="fas fa-edit"></i></a>
                                      <a class="btn btn-outline-success update_x" id="`+value.Id+`" href="javascript:void(0)"><i class="fas fa-cloud-upload-alt"></i></a>
	                                    
	                                </div>
                                  

	                    		</div>
	                        </div>
	                    </div>
                                    `;
                                });

                                $("#cargar_resultado").html(contenido);
                            },
                            complete: function() { 
                        /* solo una vez que la petición se completa (success o no success) 
                           pedimos una nueva petición en 3 segundos */
                               setTimeout(function(){
                                 cargar_desarrollo_capacitacion();
                               }, 3000);
                              }
                        })
                        };

                        $(function() {
                            cargar_desarrollo_capacitacion();
                        });
                        
                    </script>

                    <script>


                $(document).ready(function() {
                    $(document).on('submit', '#insert_data', function(event){
                     event.preventDefault(); 
                    var curso =$("#curso").val();
                    var centro_estudio =$("#centro_estudio").val();
                    var mdate = $("#mdate").val();
                    var mdatex = $("#mdatex").val();
                    var horas =$("#horas").val();
                    var creditos=$("#creditos").val();
                    var archivo = $("#archivo").val();


                  //CURSO
                  if (curso == null || curso.length == 0 || /^\s+$/.test(curso) ) {
                        Swal.fire({
                          title: 'Curso',
                          text: "El campo curso esta vacio",
                          icon: 'error',
                          showCancelButton: false,
                          confirmButtonColor: '#3085d6',
                          cancelButtonColor: '#d33',
                          confirmButtonText: 'ok'
                        }).then((result) => {
                          if (result.value) {
                            
                          }
                        })
                    return false;
                  }else if(curso.length<=2){
                        Swal.fire({
                          title: 'Curso',
                          text: "El curso no puede ser menor a 2 caracteres",
                          icon: 'error',
                          showCancelButton: false,
                          confirmButtonColor: '#3085d6',
                          cancelButtonColor: '#d33',
                          confirmButtonText: 'ok'
                        }).then((result) => {
                          if (result.value) {
                           
                          }
                        })
                        return false;
                  }else if(curso.length>=60){
                        Swal.fire({
                          title: 'Curso',
                          text: "El curso no puede ser mayor a 60 caracteres",
                          icon: 'error',
                          showCancelButton: false,
                          confirmButtonColor: '#3085d6',
                          cancelButtonColor: '#d33',
                          confirmButtonText: 'ok'
                        }).then((result) => {
                          if (result.value) {
                          
                          }
                        })
                        return false;
                  }

                   //CENTRO DE ESTUDIOS
                  if (centro_estudio == null || centro_estudio.length == 0 || /^\s+$/.test(centro_estudio) ) {
                        Swal.fire({
                          title: 'Centro de Estudios',
                          text: "El campo centro estudios esta vacio",
                          icon: 'error',
                          showCancelButton: false,
                          confirmButtonColor: '#3085d6',
                          cancelButtonColor: '#d33',
                          confirmButtonText: 'ok'
                        }).then((result) => {
                          if (result.value) {
                            
                          }
                        })
                    return false;
                  }else if(centro_estudio.length<=2){
                        Swal.fire({
                          title: 'Centro de Estudios',
                          text: "El centro estudios no puede ser menor a 2 caracteres",
                          icon: 'error',
                          showCancelButton: false,
                          confirmButtonColor: '#3085d6',
                          cancelButtonColor: '#d33',
                          confirmButtonText: 'ok'
                        }).then((result) => {
                          if (result.value) {
                           
                          }
                        })
                        return false;
                  }else if(centro_estudio.length>=60){
                        Swal.fire({
                          title: 'Centro de Estudios',
                          text: "El centro estudios no puede ser mayor a 60 caracteres",
                          icon: 'error',
                          showCancelButton: false,
                          confirmButtonColor: '#3085d6',
                          cancelButtonColor: '#d33',
                          confirmButtonText: 'ok'
                        }).then((result) => {
                          if (result.value) {
                          
                          }
                        })
                        return false;
                  }

                   //fecha inciio
                  if (mdate == null || mdate.length == 0 || /^\s+$/.test(mdate) ) {
                        Swal.fire({
                          title: 'Fecha Inicio',
                          text: "Ingrese Fecha Inicio",
                          icon: 'error',
                          showCancelButton: false,
                          confirmButtonColor: '#3085d6',
                          cancelButtonColor: '#d33',
                          confirmButtonText: 'ok'
                        }).then((result) => {
                          if (result.value) {
                            
                          }
                        })
                    return false;
                  }
                     //fecha inciio
                  if (mdatex == null || mdatex.length == 0 || /^\s+$/.test(mdatex) ) {
                        Swal.fire({
                          title: 'Fecha Fin',
                          text: "Ingrese Fecha Fin",
                          icon: 'error',
                          showCancelButton: false,
                          confirmButtonColor: '#3085d6',
                          cancelButtonColor: '#d33',
                          confirmButtonText: 'ok'
                        }).then((result) => {
                          if (result.value) {
                            
                          }
                        })
                    return false;
                  }



                   //Hora
                  if (horas == null || horas.length == 0 || /^\s+$/.test(horas) ) {
                        Swal.fire({
                          title: 'Hora',
                          text: "El campo Hora esta vacio",
                          icon: 'error',
                          showCancelButton: false,
                          confirmButtonColor: '#3085d6',
                          cancelButtonColor: '#d33',
                          confirmButtonText: 'ok'
                        }).then((result) => {
                          if (result.value) {
                            
                          }
                        })
                    return false;
                  }else if(horas.length>=5){
                        Swal.fire({
                          title: 'Hora',
                          text: "La Hora no puede ser mayor a 5 caracteres",
                          icon: 'error',
                          showCancelButton: false,
                          confirmButtonColor: '#3085d6',
                          cancelButtonColor: '#d33',
                          confirmButtonText: 'ok'
                        }).then((result) => {
                          if (result.value) {
                          
                          }
                        })
                        return false;
                  }

                   //Creditop
                  if (creditos == null || creditos.length == 0 || /^\s+$/.test(creditos) ) {
                        Swal.fire({
                          title: 'Credito',
                          text: "El campo creditos esta vacio",
                          icon: 'error',
                          showCancelButton: false,
                          confirmButtonColor: '#3085d6',
                          cancelButtonColor: '#d33',
                          confirmButtonText: 'ok'
                        }).then((result) => {
                          if (result.value) {
                            
                          }
                        })
                    return false;
                  }else if(creditos.length>=5){
                        Swal.fire({
                          title: 'Credito',
                          text: "El creditos no puede ser mayor a 6 caracteres",
                          icon: 'error',
                          showCancelButton: false,
                          confirmButtonColor: '#3085d6',
                          cancelButtonColor: '#d33',
                          confirmButtonText: 'ok'
                        }).then((result) => {
                          if (result.value) {
                          
                          }
                        })
                        return false;
                  }

                     //fecha inciio
                  if (mdatex == null || mdatex.length == 0 || /^\s+$/.test(mdatex) ) {
                        Swal.fire({
                          title: 'Fecha Fin',
                          text: "Ingrese Fecha Fin",
                          icon: 'error',
                          showCancelButton: false,
                          confirmButtonColor: '#3085d6',
                          cancelButtonColor: '#d33',
                          confirmButtonText: 'ok'
                        }).then((result) => {
                          if (result.value) {
                            
                          }
                        })
                    return false;
                  }

                     //Imgane - pdf - word
                  if (archivo == null || archivo.length == 0 || /^\s+$/.test(archivo) ) {
                        Swal.fire({
                          title: 'Ingrese Archivo pdf/png/Jpge/word/',
                          text: "Ingrese archivo esta vacio",
                          icon: 'error',
                          showCancelButton: false,
                          confirmButtonColor: '#3085d6',
                          cancelButtonColor: '#d33',
                          confirmButtonText: 'ok'
                        }).then((result) => {
                          if (result.value) {
                            
                          }
                        })
                    return false;
                  }


                   $.ajax({
                        url: '<?php echo base_url().'View_intranet/Desarrollo_Capacitacion/Insert_desarrollo_capacitacion/';?>',
                        method:'POST',  
                        data:new FormData(this),  
                        contentType:false,  
                        processData:false,  
                        success:function(data){
                            //devolvemos los datos del from
                            var json = JSON.parse(data);

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
                              title: ''+json.mensaje+''
                            })
                            $('#exampleModal').modal('hide')
                            $('#insert_data')[0].reset(); 


                            cargar_desarrollo_capacitacion();
                  

                        },statusCode: {
                              400: function(xhr) {
                                  var json = JSON.parse(xhr.responseText);
                                  if (json.error) {
                                      Swal.fire({
                                          title: 'Lo siento mucho',
                                          text: "" + json.error + "",
                                          icon: 'warning',
                                          showCancelButton: false,
                                          confirmButtonColor: '#3085d6',
                                          cancelButtonColor: '#d33',
                                          confirmButtonText: 'OK'
                                      }).then((result) => {
                                          if (result.value) {

                                          }
                                      })


                                  }

                              }
                          }

                   });
                  });


                });
                
            </script>

            <script type="text/javascript">
                //eliminar pedido sin recargar la pagina web
                
               $(document).on('click', '.delete', function(){  
                   var user_id = $(this).attr("id"); 
                  // var c_obj = $(this).parents("tr");
                   if(Swal.fire({
                      title: '¿Estás seguro?',
                      text: "¡No podrás revertir esto!",
                      icon: 'warning',
                      showCancelButton: true,
                      confirmButtonColor: '#3085d6',
                      cancelButtonColor: '#d33',
                      confirmButtonText: 'Yes, delete it!'
                    }).then((result) => {
                      if (result.value) {
                        $.ajax({  
                             url:"<?php echo base_url().'View_intranet/Desarrollo_Capacitacion/eliminar_desarrollo/';?>",  
                             method:"POST",  
                             data:{user_id:user_id},  
                             success:function(data)  
                             {  
                                // c_obj.remove();
                                // table.ajax.reload();  
                                  cargar_desarrollo_capacitacion();
                             }  
                        }); 
                        Swal.fire(
                          'Eliminado!',
                          'Su registro ha sido eliminado.',
                          'success'
                        )
                      }
                    }))

                 {

                 }
                   else  
                   {  
                        return false;       
                   }  
              });  
            </script>

            <script  type="text/javascript">
                $(document).ready(function() {
                    $(document).on('click', '.update', function(){  
                       var user_id = $(this).attr("id");  
                       $.ajax({  
                           url:"<?php echo base_url().'View_intranet/Desarrollo_Capacitacion/fetch_single_user_experience/';?>",
                            method:"POST",  
                            data:{user_id:user_id},  
                            dataType:"json",  
                            success:function(data)  
                            {  
                                 $('#userModal').modal('show');  
                                 $('#cursox').val(data.curso);  
                                 $('#centro_estudiox').val(data.centro_estudio);  
                               //  $('.modal-title').text("Edit User");  
                                 $('#user_id').val(user_id);  
                                 $('#horasx').val(data.horas);
                                 $('#creditosx').val(data.creditos);
                                 $('#archivoxx').html(data.archivo);

                                 $('#descripcion_laboralxx').html(data.descripcion_laboral);
                                 $('#mdatexxxxxx').val(data.fecha_inicio);
                                 $('#mdatexxxxxxx').val(data.fecha_fin);

        
                            }  
                       })  
                  });
                });
            </script>


                 <!--modal de actualizar datps-->
            <div class="modal fade bd-example-modal-lgsd" id="userModal" data-backdrop="static" data-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-lg">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h3 class="modal-title text-center" id="exampleModalLabel">Hola <?php echo $nombres_completosx;?></h3>                           
                                </div>
                                <div class="modal-body">
                                    <form autocomplete="on" method="post" id="user_form" class="form-material">
                                        
                                        <div class="row">
                                            <div class="col-md-5">
                                                <div class="form-group">
                                                    <label for="">Cargo</label>
                                                    <input class="form-control" type="text" id="cursox" name="curso">
                                                </div>
                                            </div>
                                            <div class="col-md-7">
                                               <label for="">Centro Estudio</label>
                                               <input type="text" id="centro_estudiox" name="centro_estudio" class="form-control">
                                            </div>
                                        </div>
                                        <div class="row">
                                             <div class="col-md-3">
                                                <div class="form-group">
                                                    <label for="" class="col-form-label">Fecha Inicio</label>
                                                   <input type="text" id="mdatexxxxxx" name="fecha_inicio_xx" class="form-control">
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label for="" class="col-form-label">Fecha Fin</label>
                                                   <input type="text" class="form-control" name="fecha_fin_xx" id="mdatexxxxxxx">
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label for="" class="col-form-label">Hora</label>
                                                    <input type="text" name="hora" id="horasx" value="" placeholder="" class="form-control" maxlength="3">
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label for="" class="col-form-label">Creditos</label>
                                                    <input type="text" name="creditos" id="creditosx" value="" placeholder="" class="form-control" maxlength="2">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12">
                                            	<div class="form-group">
                                                <span id="archivoxx"></span>
	                                               <input type="file" id="input-file-now" name="user_image" class="dropify" onchange="fileValidatiosn(this);"/>
	                                           </div>
                                            </div>

                                          
                                        </div>


                                        <div class="row text-center">
                                            <div class="col-md-12">
                                                <div class="form-actions">
                                                   <input type="hidden" name="user_id" id="user_id" />
                                                    <button type="submit" class="btn btn-success btn-rounded"> <i class="fa fa-check"></i> Actualizar</button>
                                                    <button type="button" data-dismiss="modal" class="btn btn-danger btn-rounded"><i class="fa fa-times-circle"></i>&nbsp;Cancelar</button>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
            </div>


            <script>
                $(document).ready(function(){


                  $(document).on('submit', '#user_form', function(event){  
			            event.preventDefault(); 
                  var curso =$("#cursox").val();
                    var centro_estudio =$("#centro_estudiox").val();
                    var mdate = $("#mdatexxxxxx").val();
                    var mdatex = $("#mdatexxxxxxx").val();
                    var horas =$("#horasx").val();
                    var creditos=$("#creditosx").val();
                    
                  //CURSO
                  if (curso == null || curso.length == 0 || /^\s+$/.test(curso) ) {
                        Swal.fire({
                          title: 'Curso',
                          text: "El campo curso esta vacio",
                          icon: 'error',
                          showCancelButton: false,
                          confirmButtonColor: '#3085d6',
                          cancelButtonColor: '#d33',
                          confirmButtonText: 'ok'
                        }).then((result) => {
                          if (result.value) {
                            
                          }
                        })
                    return false;
                  }else if(curso.length<=2){
                        Swal.fire({
                          title: 'Curso',
                          text: "El curso no puede ser menor a 2 caracteres",
                          icon: 'error',
                          showCancelButton: false,
                          confirmButtonColor: '#3085d6',
                          cancelButtonColor: '#d33',
                          confirmButtonText: 'ok'
                        }).then((result) => {
                          if (result.value) {
                           
                          }
                        })
                        return false;
                  }else if(curso.length>=60){
                        Swal.fire({
                          title: 'Curso',
                          text: "El curso no puede ser mayor a 60 caracteres",
                          icon: 'error',
                          showCancelButton: false,
                          confirmButtonColor: '#3085d6',
                          cancelButtonColor: '#d33',
                          confirmButtonText: 'ok'
                        }).then((result) => {
                          if (result.value) {
                          
                          }
                        })
                        return false;
                  }

                   //CENTRO DE ESTUDIOS
                  if (centro_estudio == null || centro_estudio.length == 0 || /^\s+$/.test(centro_estudio) ) {
                        Swal.fire({
                          title: 'Centro de Estudios',
                          text: "El campo centro estudios esta vacio",
                          icon: 'error',
                          showCancelButton: false,
                          confirmButtonColor: '#3085d6',
                          cancelButtonColor: '#d33',
                          confirmButtonText: 'ok'
                        }).then((result) => {
                          if (result.value) {
                            
                          }
                        })
                    return false;
                  }else if(centro_estudio.length<=2){
                        Swal.fire({
                          title: 'Centro de Estudios',
                          text: "El centro estudios no puede ser menor a 2 caracteres",
                          icon: 'error',
                          showCancelButton: false,
                          confirmButtonColor: '#3085d6',
                          cancelButtonColor: '#d33',
                          confirmButtonText: 'ok'
                        }).then((result) => {
                          if (result.value) {
                           
                          }
                        })
                        return false;
                  }else if(centro_estudio.length>=60){
                        Swal.fire({
                          title: 'Centro de Estudios',
                          text: "El centro estudios no puede ser mayor a 60 caracteres",
                          icon: 'error',
                          showCancelButton: false,
                          confirmButtonColor: '#3085d6',
                          cancelButtonColor: '#d33',
                          confirmButtonText: 'ok'
                        }).then((result) => {
                          if (result.value) {
                          
                          }
                        })
                        return false;
                  }

                   //fecha inciio
                  if (mdate == null || mdate.length == 0 || /^\s+$/.test(mdate) ) {
                        Swal.fire({
                          title: 'Fecha Inicio',
                          text: "Ingrese Fecha Inicio",
                          icon: 'error',
                          showCancelButton: false,
                          confirmButtonColor: '#3085d6',
                          cancelButtonColor: '#d33',
                          confirmButtonText: 'ok'
                        }).then((result) => {
                          if (result.value) {
                            
                          }
                        })
                    return false;
                  }
                     //fecha inciio
                  if (mdatex == null || mdatex.length == 0 || /^\s+$/.test(mdatex) ) {
                        Swal.fire({
                          title: 'Fecha Fin',
                          text: "Ingrese Fecha Fin",
                          icon: 'error',
                          showCancelButton: false,
                          confirmButtonColor: '#3085d6',
                          cancelButtonColor: '#d33',
                          confirmButtonText: 'ok'
                        }).then((result) => {
                          if (result.value) {
                            
                          }
                        })
                    return false;
                  }



                   //Hora
                  if (horas == null || horas.length == 0 || /^\s+$/.test(horas) ) {
                        Swal.fire({
                          title: 'Hora',
                          text: "El campo Hora esta vacio",
                          icon: 'error',
                          showCancelButton: false,
                          confirmButtonColor: '#3085d6',
                          cancelButtonColor: '#d33',
                          confirmButtonText: 'ok'
                        }).then((result) => {
                          if (result.value) {
                            
                          }
                        })
                    return false;
                  }else if(horas.length>=5){
                        Swal.fire({
                          title: 'Hora',
                          text: "La Hora no puede ser mayor a 5 caracteres",
                          icon: 'error',
                          showCancelButton: false,
                          confirmButtonColor: '#3085d6',
                          cancelButtonColor: '#d33',
                          confirmButtonText: 'ok'
                        }).then((result) => {
                          if (result.value) {
                          
                          }
                        })
                        return false;
                  }

                   //Creditop
                  if (creditos == null || creditos.length == 0 || /^\s+$/.test(creditos) ) {
                        Swal.fire({
                          title: 'Credito',
                          text: "El campo creditos esta vacio",
                          icon: 'error',
                          showCancelButton: false,
                          confirmButtonColor: '#3085d6',
                          cancelButtonColor: '#d33',
                          confirmButtonText: 'ok'
                        }).then((result) => {
                          if (result.value) {
                            
                          }
                        })
                    return false;
                  }else if(creditos.length>=5){
                        Swal.fire({
                          title: 'Credito',
                          text: "El creditos no puede ser mayor a 6 caracteres",
                          icon: 'error',
                          showCancelButton: false,
                          confirmButtonColor: '#3085d6',
                          cancelButtonColor: '#d33',
                          confirmButtonText: 'ok'
                        }).then((result) => {
                          if (result.value) {
                          
                          }
                        })
                        return false;
                  }

			            $.ajax({  
			                 url:"<?php echo base_url().'View_intranet/Desarrollo_Capacitacion/user_action/';?>",
			                 method:'POST',  
			                 data:new FormData(this),  
			                 contentType:false,  
			                 processData:false,  
			                 success:function(data)  
			                 {  
			                    var json = JSON.parse(data);
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
                                      title: ''+json.mensaje+''
                                    })    
			                      $('#user_form')[0].reset();  
			                      $('#userModal').modal('hide');  
			                     cargar_desarrollo_capacitacion();
			                    
			                 },statusCode: {
                              400: function(xhr) {
                                  var json = JSON.parse(xhr.responseText);
                                  if (json.error) {
                                      Swal.fire({
                                          title: 'Lo siento mucho',
                                          text: "" + json.error + "",
                                          icon: 'warning',
                                          showCancelButton: false,
                                          confirmButtonColor: '#3085d6',
                                          cancelButtonColor: '#d33',
                                          confirmButtonText: 'OK'
                                      }).then((result) => {
                                          if (result.value) {

                                          }
                                      })


                                  }

                              }
                          }  
			            });  
			           
			            
			      });  


                     
                });

            </script>


             <script  type="text/javascript">
                $(document).ready(function() {
                    $(document).on('click', '.update_x', function(){  
                       var user_id = $(this).attr("id");  
                       $.ajax({  
                           url:"<?php echo base_url().'View_intranet/Desarrollo_Capacitacion/fetch_single_user_experience_x/';?>",
                            method:"POST",  
                            data:{user_id:user_id},  
                            dataType:"json",  
                            success:function(data)  
                            {  
                                 $('#userModal_x').modal('show');  
                               //  $('.modal-title').text("Edit User");  
                                 $('#user_id_x').val(user_id);  
                                 $('#archivoxx_xx').html(data.archivo);

        
                            }  
                       })  
                  });


                  });


                
            </script>
    

             <div class="modal fade bd-example-modal-lgsd" id="userModal_x" data-backdrop="static" data-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                  <div class="modal-dialog modal-lg">
                      <div class="modal-content">
                          <div class="modal-header">
                              <h3 class="modal-title text-center" id="exampleModalLabel">Hola, <?php echo $nombres_completosx;?></h3>                           
                          </div>
                          <div class="modal-body">
                              <form autocomplete="on" method="post" id="user_form_x" class="form-material">
                                  <div class="row">
                                      <div class="col-md-12">
                                        <div class="form-group">
                                          <div id="archivoxx_xx"></div>
                                          <label for="">Subir archivo</label>
                                           <input type="file" id="user_image" name="user_image" class="dropify" onchange="fileValidatiosn(this);"/>
                                       </div>
                                      </div>
                                  </div>
                                  <div class="row text-center">
                                      <div class="col-md-12">
                                          <div class="form-actions">
                                             <input type="hidden" name="user_id" id="user_id_x" />
                                              <button type="submit" class="btn btn-success btn-rounded"> <i class="fa fa-check"></i> Actualizar</button>
                                              <button type="button" data-dismiss="modal" class="btn btn-danger btn-rounded"><i class="fa fa-times-circle"></i>&nbsp;Cancelar</button>
                                          </div>
                                      </div>
                                  </div>
                              </form>
                          </div>
                      </div>
                  </div>
            </div>
<script>
  $(document).ready(function() {
      $(document).on('submit', '#user_form_x', function(event){  
                 event.preventDefault();  
                  $.ajax({  
                       url:"<?php echo base_url().'View_intranet/Desarrollo_Capacitacion/user_action_x/';?>",
                       method:'POST',  
                       data:new FormData(this),  
                       contentType:false,  
                       processData:false,  
                       success:function(data)  
                       {  
                          var json = JSON.parse(data);
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
                                      title: ''+json.mensaje+''
                                    })    
                            $('#user_form_x')[0].reset();  
                            $('#userModal_x').modal('hide');  
                           // $('#div_load').load(location.href+" #div_load>*","");
                           // dataTable.ajax.reload();  
                       }  
                  });  
                });
  });
</script>

        <script>
            function fileValidatiosn(obj){
                var uploadFile = obj.files[0];

                if (!window.FileReader) {
                    alert('El navegador no soporta la lectura de archivos');
                    return;
                }

                if (!(/\.(jpg|png|gif|pdf|docx|docm|dotx|dotm|odt)$/i).test(uploadFile.name)) {
                  Swal.fire({
                  title: 'Files',
                  text: "El archivo a adjuntar no es una imagen solo acepta jpg|png|gif",
                  icon: 'warning',
                  showCancelButton: false,
                  confirmButtonColor: '#3085d6',
                  cancelButtonColor: '#d33',
                  confirmButtonText: 'ok'
                }).then((result) => {
                  if (result.value) {
                    $("#archivo").val("");
                   // $("#user_image").val("");
                  }
                })
                   
                }

                var uploadFile = obj.files[0];
                var img = new Image();
                img.onload = function ()
                {
                if (this.width.toFixed(0) != 600 && this.height.toFixed(0) != 600)
                {
                  Swal.fire({
                  title: 'Files',
                  text: "La imagen debe ser de tamaño 600px por 600px.",
                  icon: 'warning',
                  showCancelButton: false,
                  confirmButtonColor: '#3085d6',
                  cancelButtonColor: '#d33',
                  confirmButtonText: 'ok'
                }).then((result) => {
                  if (result.value) {
                    $("#archivo").val("");
                   // $("#user_image").val("");
                  }
                })

              
                }
                };
                img.src = URL.createObjectURL(uploadFile);
                
                                                       
            }
        </script>

         