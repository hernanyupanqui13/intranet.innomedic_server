				
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
                    $nombres_completosx = $xx->nombres." ".$xx->apellido_paterno." " . $xx->apellido_materno;
                    $apellido_paternox = $xx->apellido_paterno;
                    $apellido_maternox = $xx->apellido_materno;
                    $departamentox = $xx->departamento;
                    $provinciax = $xx->provincia;
                    $distritox = $xx->distrito;
                    $dni_mostrar_dni = $xx->nro_documento;
                    $direccionx = $xx->direccion;
                    $fecha_nacimientox =$xx->fecha_nacimiento;
                    $id_departamentox = $xx->id_departamento;
                    $id_provinciax = $xx->id_provincia;
                    $id_distritox = $xx->id_distrito;
                    $id_estadox = $xx->id_estado;
                    $estado_civilx = $xx->estado_civil;
                    $generox = $xx->id_genero;
                    $id_lugar_nacimiento_dep_x = $xx->id_lugar_nacimiento_dep;
                    $nacimiento = $xx->nacimiento;
                    $telefono_movilx = $xx->telefono_movil;
                    $telefono_domiciliox = $xx->telefono_domicilio;
                    $emailx = $xx->email;
                    $talla_pantalon_x = $xx->talla_pantalon;
                    $tallax  = $xx->talla;
                    $comunicarse_con_x = $xx->comunicarse_con;
                    $nro_emergenciax = $xx->nro_emergencia;
                    $imagenx = $xx->imagen;
                    $fecha_nac = $xx->fecha_nac_dia;
                    $urlx = $xx->url;

                } ?>

                <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" data-backdrop="static" data-keyboard="false">
                  <div class="modal-dialog modal-lg" role="document" >
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Agregar Nueva <?php echo $title[1] ?></h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <div class="modal-body">
                        <form method="POST" id="frm_submit" autocomplete="off" class="form-horizontal form-material">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="" class="">Educación&nbsp;*</label>
                                       <select name="educacion" id="educacion" class="form-control">
                                           <option value="">--Seleccione --</option>
                                           <option value="Primaria">Primaria</option>
                                           <option value="Secundaria">Secundaria</option>
                                       </select>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="" class="">Completa/Incompleta&nbsp;*</label>
                                       <select name="completa" id="completa" class="form-control">
                                           <option value="">--Seleccione --</option>
                                           <option value="Completa">Completa</option>
                                           <option value="Incompleta">Incompleta</option>
                                       </select>
                                       
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="" class="">Centro de Estudio&nbsp;* <i class="fas fa-search"></i></label>
                                        <input type="text" class="form-control" name="centro_estudios" id="centro_estudios" placeholder="Ingrese y Presione Enter" onkeydown="return numerosletrasmayus(event);">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="" class="">Desde&nbsp;*</label>
                                        <input type="text" class="form-control" name="desde" id="mdate" placeholder="<?php echo date('Y-m-d') ?>" >
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="" class="">Hasta&nbsp;*</label>
                                        <input type="text" class="form-control" name="hasta" id="mdatex" placeholder="<?php echo date('Y-m-d') ?>">
                                    </div>
                                </div>
                            </div>
                            <input type="hidden" class="" name="url" value="<?php echo $urlx;?>">
                            <div class="modal-footer">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class=" text-center  ">
                                            <button type="button" class="btn btn-outline-danger btn-rounded" data-dismiss="modal"><i class=" fas fa-times-circle"></i>&nbsp;Cerrar</button>
                                            <button type="submit" class="btn btn-outline-success btn-rounded"><i class=" fas fa-sign-out-alt"></i>&nbsp;Agregar</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <h5><span class="font-weight-bold">Leyenda:&nbsp;</span><span>Campos * Obigatorios</span></h5>
                        </form>
                      </div>
                      
                    </div>
                  </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-body">
                                <a class="btn btn-outline-success btn-rounded btn-md"  data-toggle="modal" data-target="#exampleModal" data-whatever="@mdo" href="javascript:void(0)"><i class="fas fa-street-view"></i>&nbsp;Agregar Educación</a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row" id="cargar_resultado">
                  
                </div>
                                
                    
           



            <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

             <script type="text/javascript">

                function cargar_educacion() {
                    $.ajax({
                    url: "<?php echo base_url().'View_intranet/Formacion_academica/cargar_academia/';?>",
                    method:"POST",
                    contentType:false,
                    processData:false,
                    success:function(data){

                        var resultado = JSON.parse(data);
                        var contenido = '';
              
                        $.each(resultado, function(index, value) {
                        
                            contenido += `
                            <div class="col-md-6 col-lg-6 col-xl-6" >
                                <div class="card card-body">
                                    <div class="row align-items-center">
                                        <div class="col-md-4 col-lg-3 text-center">
                                            <a href="javascript:void();"><img src="<?php echo base_url().'assets_sistema/';?>images/users/beca.png" alt="user" class="img-circle img-fluid"></a>
                                        </div>
                                        <div class="col-md-8 col-lg-9">
                                            <h3 class="box-title m-b-0">`+value.centro_estudios+`</h3> <small>`+value.educacion+`</small>
                                            <address>
                                                <span class="label label-success">`+value.comple_incomple+`</span>
                                                <br/>
                                                <br/>
                                                <abbr title="Fecha Inicio" class="label label-info">Fecha Inicio:</abbr> `+value.desde+`
                                                <abbr title="Fecha Fin"  class="label label-info">Fecha Fin:</abbr>`+value.hasta+`
                                            </address>

                                        </div>
                                        <div class="col-md-12">
                                            <div class="text-right">
                                                <a class="btn btn-success update" id="`+value.Id+`" href="javascript:void(0)"><i class="fas fa-edit"></i></a>
                                                <a class="btn btn-danger delete" id="`+value.Id+`" href="javascript:void(0)"><i class=" fas fa-trash-alt"></i></a>
                                            </div>
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
                         cargar_educacion();
                       }, 3000);
                      }
                })
                };

                $(function() {
                    cargar_educacion();
                });

              
                
            </script>
	     

            <script  type="text/javascript" charset="utf-8" async defer>

                $(document).ready(function (){

                $("#frm_submit").on('submit', function (e) {
                    e.preventDefault();  
                    var educacion = $("#educacion").val();
                    var completa = $("#completa").val();
                    var centro_estudios = $("#centro_estudios").val();
                    var mdate = $("#mdate").val();
                    var mdatex = $("#mdatex").val();

                    if (educacion == null || educacion.length == 0 || /^\s+$/.test(educacion) ) {
                        Swal.fire({
                          title: 'Educacion',
                          text: "Seleccione Educación",
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
                   //seleccione  completa
                   if (completa == null || completa.length == 0 || /^\s+$/.test(completa) ) {
                        Swal.fire({
                          title: 'Completa',
                          text: "Educación completa ou Incompleta",
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
                   //seleccione  centro_estudios
                   if (centro_estudios == null || centro_estudios.length == 0 || /^\s+$/.test(centro_estudios) ) {
                        Swal.fire({
                          title: 'Centro de Estudios',
                          text: "Ingrese Centro de Estudios",
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
                   }else if(centro_estudios.length<=3){
                        Swal.fire({
                          title: 'Centro de Estudios',
                          text: "El Centro de Estudios no puede ser menor a 3 caracteres",
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
                   }else if(centro_estudios.length>=100){
                        Swal.fire({
                          title: 'Centro de Estudios',
                          text: "El Centro de Estudios no puede ser mayor a 100 caracteres",
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
                   //desde
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
                   //desde
                   if (mdatex == null || mdatex.length == 0 || /^\s+$/.test(mdatex) ) {
                        Swal.fire({
                          title: 'Fecha Fin',
                          text: "Ingrese Fecha fin",
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
                            url: '<?php echo base_url() ?>View_intranet/Formacion_academica/insertar_datos/',
                            type: 'POST',
                            data: $("#frm_submit").serialize(),
                        })
                        .done(function(data) {
                            console.log("success");
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
                            
                           cargar_educacion();
                        })
                        .fail(function(jqXHR, textStatus, errorThrown) {
                            console.log("error");
                             var json = JSON.parse(jqXHR.responseText);
                              Swal.fire({
                                  title: 'Lo siento mucho',
                                  text: ""+json.error+"",
                                  icon: 'warning',
                                  showCancelButton: false,
                                  confirmButtonColor: '#3085d6',
                                  cancelButtonColor: '#d33',
                                  confirmButtonText: 'OK'
                                }).then((result) => {
                                  if (result.value) {
                                    
                                  }
                                })
                             
                            
                            
                        })
                        .always(function() {
                            console.log("complete");

                        });
 
                    });
                });
            </script>
      		<script type="text/javascript">
                //eliminar pedido sin recargar la pagina web
                
               $(document).on('click', '.delete', function(){  
                   var user_id = $(this).attr("Id"); 
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
                             url:"<?php echo base_url().'View_intranet/Formacion_academica/eliminar_datos/';?>",  
                             method:"POST",  
                             data:{user_id:user_id},  
                             success:function(data)  
                             {  
                                 //c_obj.remove();
                                 cargar_educacion();
                                 
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

             <script>
                $(document).ready(function() {
                    $(document).on('click', '.update', function(){  
                       var user_id = $(this).attr("id");  
                       $.ajax({  
                           url:"<?php echo base_url().'View_intranet/Formacion_academica/fetch_single_user/';?>",
                            method:"POST",  
                            data:{user_id:user_id},  
                            dataType:"json",  
                            success:function(data)  
                            {  
                                 $('#userModal').modal('show');  
                                 $('#educacionxx option').filter('option[value="'+data.educacion+'"]').attr('selected',true);
                                 $('#comple_incomplex option').filter('[value="'+data.comple_incomple+'"]').attr('selected',true);
                               //  $('.modal-title').text("Edit User");  
                                 $('#user_id').val(user_id);  
                                 $('#centro_estudiosx').val(data.centro_estudios);
                                 $('#mdatexx').val(data.desde);
                                 $('#mdatexxx').val(data.hasta);
                         
                                 //<?php echo date('Y-m-d', strtotime($fecha_nacimientox)) ?>

                                 
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
                                    <form autocomplete="on" method="post" id="user_form" class="form-horizontal form-material">
                                        
                                        <div class="row">
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label for="" class="col-form-label">Educación&nbsp; </label>
                                                    <select name="educacion" id="educacionxx" class="form-control">
                                                        <option value="">--Seleccione--</option>
                                                        <option value="Primaria">Primaria</option>
                                                        <option value="Secundaria">Secundaria</option>
                                                    </select>
                                                    <div id="educacionx"></div>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="" class="col-form-label">Completa y/o Incompleta&nbsp; </span></label>
                                                    <select name="comple_incomple"  id="comple_incomplex" class="form-control">
                                                        <option value="">--Seleccione--</option>
                                                        <option value="Completa">Completa</option>
                                                        <option value="Incompleta">Incompleta</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-5">
                                                <div class="form-group">
                                                    <label for="" class="col-form-label"><i class=" fas fa-search"></i>&nbsp;Centro de estudios</label>
                                                    <input type="text" name="centro_estudios" id="centro_estudiosx" class="form-control"  onkeydown="return numerosletrasmayus(event);">
                                                </div>
                                            </div>
                                           
                                        </div>
                                        <div class="row">
                                             <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="" class="col-form-label">Desde</label>
                                                   <input type="text" id="mdatexx" class="form-control" name="desde">
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="" class="col-form-label">Hasta</label>
                                                    <input type="text" id="mdatexxx" class="form-control" name="hasta">
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

                        $.ajax({  
                             url:"<?php echo base_url().'View_intranet/Formacion_academica/user_action/';?>",
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
                                   cargar_educacion();
                                 
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

            <!--datos de eduacion supero¡iopr-->


            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">
                             <button type="button" class="btn btn-outline-danger btn-rounded btn-md" data-toggle="modal" data-target="#add-contact_xx"><i class=" fas fa-street-view"></i>&nbsp;Nuevo Educacion Superior</button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row" id="cargar_eduacion_superior_result"></div>


            <!--datos de la universidad-->


            

            <div id="add-contact_xx" class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" data-backdrop="static" data-keyboard="false">
              <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Agregar Nuevo Grado Superior</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                   <form class="form-horizontal form-material" id="user_dataxxx_valida">
                    <input type="hidden" name="urlx" value="<?php echo $urlx; ?>">
                       <div class="modal-body form-horizontal form-material">
                            <div class="row">
                                <div class="col-md-6 m-b-20">
                                    <div class="form-group">
                                      <label for="" class="col-form-label">Especialidad</label>
                                        <input type="text" name="espacialidad_vali" id="especialidadx" class="form-control" placeholder="Buscar especialidad" >
                                        <!--<input type="hidden" id="especialidadxx" name="espacialidad_vali"> -->
                                    </div>
                                </div>
                                <div class="col-md-6 m-b-20">
                                    <div class="form-group">
                                      <label for="" class="col-form-label">Centro de Estudios</label>
                                       <input type="text" id="centro_estudiosxx" name="centro_estudios_vali" class="form-control" placeholder="Buscar Centro de estudios" > 
                                    <!--<input type="hidden" id="centro_estudios_vali" name="centro_estudios_vali">-->
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                      <label for="" class="col-form-label">Desde</label>
                                        <input type="text" id="fechainicio_x" class="form-control" name="desde" placeholder="<?php echo date('Y-m-d') ?>"> 
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                      <label for="" class="col-form-label">Hasta</label>
                                        <input type="text" id="fecha_fin_x" class="form-control" name="hasta" placeholder="<?php echo date('Y-m-d') ?>"> 
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6 m-b-20">
                                   <div class="form-group">
                                     <label for="" class="col-form-label">Completa y/o Incompleta&nbsp; </label>
                                        <select name="comple_incomple" id="comple_incomple" class="form-control">
                                            <option value="">--Seleccione--</option>
                                            <option value="Completa">Completo</option>
                                            <option value="Incompleto">Incompleto</option>
                                        </select>
                                   </div>
                                </div>
                                <div class="col-md-6 m-b-20">
                                    <div class="form-group">
                                      <label for="" class="col-form-label">Grado Acádemico</label>
                                        <input type="text" name="grado_acedemico_x" id="grado_academico" class="form-control" placeholder="Buscar Grado Academico" > 
                                        <!--<input type="hidden" id="grado_acedemico_x" name="grado_acedemico_x">-->
                                    </div>
                                </div>
                            </div>

                                
                        </div>
                         
                         
                        
                      
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-success btn-rounded"><i class="fas fa-chevron-circle-right"></i>&nbsp;Agregar</button>
                            <button type="button" class="btn btn-danger waves-effect btn-rounded" data-dismiss="modal"><i class="fa fa-times-circle"></i>&nbsp;Cancelar</button>
                        </div>
                </form>
                </div>
              </div>
            </div>


            <script>
                 function cargar_eduacion_superior() {
                    $.ajax({
                    url: "<?php echo base_url().'View_intranet/Formacion_academica/cargar_academia_educacion_superiro/';?>",
                    method:"POST",
                    contentType:false,
                    processData:false,
                    success:function(data){

                        var resultado = JSON.parse(data);
                        var contenido = '';
              
                        $.each(resultado, function(index, value) {
                        
                            contenido += `
                            <div class="col-md-6 col-lg-6 col-xl-6" >
                                <div class="card card-body">
                                    <div class="row align-items-center">
                                        <div class="col-md-4 col-lg-3 text-center">
                                            <a href="javascript:void();"><img src="<?php echo base_url().'assets_sistema/';?>images/users/estudiante.png?ver=<?php echo rand(); ?>" alt="user" class="img-circle img-fluid"></a>
                                        </div>
                                        <div class="col-md-8 col-lg-9">
                                            <h3 class="box-title m-b-0">`+value.centro_estudios+`</h3> <small>`+value.especialidad+`</small>
                                            <address>
                                                <span class="label label-success">`+value.comple_incomple+`</span>
                                                <span class="label label-danger">Grado:&nbsp;<span class="">`+value.grado_academica+`</span></span>
                                                <br/>
                                                <br/>
                                                <abbr title="Fecha Inicio" class="label label-warning">Fecha Inicio:</abbr> `+value.desde+`
                                                <abbr title="Fecha Fin"  class="label label-warning">Fecha Fin:</abbr>`+value.hasta+`
                                            </address>

                                        </div>
                                        <div class="col-md-12">
                                            <div class="text-right">
                                                <a class="btn btn-success update_x" id="`+value.Id+`" href="javascript:void(0)"><i class="fas fa-edit"></i></a>
                                                <a class="btn btn-danger delete_x" id="`+value.Id+`" href="javascript:void(0)"><i class=" fas fa-trash-alt"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            `;
                        });

                        $("#cargar_eduacion_superior_result").html(contenido);
                    },
                    complete: function() { 
                /* solo una vez que la petición se completa (success o no success) 
                   pedimos una nueva petición en 3 segundos */
                       setTimeout(function(){
                         cargar_eduacion_superior();
                       }, 3000);
                      }
                })
                };

                $(function() {
                    cargar_eduacion_superior();
                });

                
            </script>


            


  




            <script>
                $(document).ready(function() {
                  $(document).on('submit', '#user_dataxxx_valida', function(event) {
                      event.preventDefault();
                      var educacion = $("#especialidadx").val();
                      var centro_estudios = $("#centro_estudiosxx").val();
                      var mdate = $("#fechainicio_x").val();
                      var mdatex = $("#fecha_fin_x").val();
                      var completa = $("#comple_incomple").val();
                      var grado_academico = $("#grado_academico").val();

                      if (educacion == null || educacion.length == 0 || /^\s+$/.test(educacion)) {
                          Swal.fire({
                              title: 'Especialidad',
                              text: "Ingrese Especialidad",
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
                      //seleccione  centro_estudios
                      if (centro_estudios == null || centro_estudios.length == 0 || /^\s+$/.test(centro_estudios)) {
                          Swal.fire({
                              title: 'Centro de Estudios',
                              text: "Ingrese Centro de Estudios",
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
                      } else if (centro_estudios.length <= 3) {
                          Swal.fire({
                              title: 'Centro de Estudios',
                              text: "El Centro de Estudios no puede ser menor a 3 caracteres",
                              icon: 'error',
                              showCancelButton: false,
                              confirmButtonColor: '#3085d6',
                              cancelButtonColor: '#d33',
                              confirmButtonText: 'ok'
                          }).then((result) => {
                              if (result.value) {}
                          })
                          return false;
                      } else if (centro_estudios.length >= 100) {
                          Swal.fire({
                              title: 'Centro de Estudios',
                              text: "El Centro de Estudios no puede ser mayor a 100 caracteres",
                              icon: 'error',
                              showCancelButton: false,
                              confirmButtonColor: '#3085d6',
                              cancelButtonColor: '#d33',
                              confirmButtonText: 'ok'
                          }).then((result) => {
                              if (result.value) {}
                          })
                          return false;
                      }

                      //desde
                      if (mdate == null || mdate.length == 0 || /^\s+$/.test(mdate)) {
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
                      //desde
                      if (mdatex == null || mdatex.length == 0 || /^\s+$/.test(mdatex)) {
                          Swal.fire({
                              title: 'Fecha Fin',
                              text: "Ingrese Fecha fin",
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

                      //seleccione  completa
                      if (completa == null || completa.length == 0 || /^\s+$/.test(completa)) {
                          Swal.fire({
                              title: 'Completa',
                              text: "Educación completa ou Incompleta",
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

                      //seleccione  completa
                      if (grado_academico == null || grado_academico.length == 0 || /^\s+$/.test(grado_academico)) {
                          Swal.fire({
                              title: 'Grado Academico',
                              text: "Ingrese Grado Académico",
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
                          url: "<?php echo base_url().'View_intranet/Formacion_academica/add_grado_academico/';?>",
                          method: 'POST',
                          data: new FormData(this),
                          contentType: false,
                          processData: false,
                          success: function(data) {
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
                                  title: '' + json.mensaje + ''
                              })
                               cargar_eduacion_superior();
                              $('#user_dataxxx_valida')[0].reset();
                              $('#add-contact_xx').modal('hide');
                             
                          },
                          statusCode: {
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
                
               $(document).on('click', '.delete_x', function(){  
                   var user_id = $(this).attr("id"); 
                   var c_obj = $(this).parents("tr");
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
                             url:"<?php echo base_url().'View_intranet/Formacion_academica/eliminar_datos_idx/';?>",  
                             method:"POST",  
                             data:{user_id:user_id},  
                             success:function(data)  
                             {  
                                 c_obj.remove();
                                 cargar_eduacion_superior();
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

            <script>
                $(document).ready(function() {
                  $(document).on('click', '.update_x', function() {
                      var user_id = $(this).attr("id");
                      $.ajax({
                          url: "<?php echo base_url().'View_intranet/Formacion_academica/fetch_single_user_superior/';?>",
                          method: "POST",
                          data: {
                              user_id: user_id
                          },
                          dataType: "json",
                          success: function(data) {
                              $('#userModal_x').modal('show');
                              $("#especialidad_upating").val(data.especialidad);
                              $("#especialidadxx_updating").val(data.especialidad);
                              $('#comple_incomplexx option').filter('option[value="' + data.comple_incomple + '"]').attr('selected', true);
                              //  $('.modal-title').text("Edit User");  
                              $('#user_id_x').val(user_id);
                              $('#centro_estudios_xx_updating').val(data.centro_estudios);
                              $("#grado_academico_xx_updating").val(data.grado_academica);
                              $('#mdatexxxx').val(data.desde);
                              $('#mdatexxxxx').val(data.hasta);

                              //<?php echo date('Y-m-d', strtotime($fecha_nacimientox)) ?>

                          }
                      })
                  });
                });
            </script>

            <!--modal de actualizar datps-->
            <div class="modal fade bd-example-modal-lgsd" id="userModal_x" data-backdrop="static" data-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
              <div class="modal-dialog modal-lg">
                  <div class="modal-content">
                      <div class="modal-header">
                          <h3 class="modal-title text-center" id="exampleModalLabel">Hola <?php echo $nombres_completosx;?>&nbsp; actualiza tus datos</h3>
                      </div>
                      <div class="modal-body">
                          <form autocomplete="on" method="post" id="user_form_grado_superior" class="form-horizontal form-material">
                              <div class="row">
                                  <div class="col-md-6">
                                      <div class="form-group">
                                          <label for="" class="col-form-label">Especialidad&nbsp;</label>
                                          <input type="text" class="form-control" name="espacialidad_vali" id="especialidad_upating" >
                                      
                                      </div>
                                  </div>
                                  <div class="col-md-6">
                                      <div class="form-group">
                                          <label for="" class="col-form-label">Completa y/o Incompleta&nbsp; </label>
                                          <select name="comple_incomplex" id="comple_incomplexx" class="form-control">
                                              <option value="">--Seleccione--</option>
                                              <option value="Completa">Completa</option>
                                              <option value="Incompleta">Incompleta</option>
                                          </select>
                                      </div>
                                  </div>
                              </div>
                              <div class="row">
                                  <div class="col-md-12">
                                      <div class="form-group">
                                          <label for="" class="col-form-label"><i class=" fas fa-search"></i>&nbsp;Centro de estudios</label>
                                          <input type="text" name="centro_estudios_valix" id="centro_estudios_xx_updating" class="form-control" placeholder="">
                                        
                                      </div>
                                  </div>
                              </div>
                              <div class="row">
                                  <div class="col-md-4">
                                      <div class="form-group">
                                          <label for="" class="col-form-label">Desde</label>
                                          <input type="text" id="mdatexxxx" name="desde_x" class="form-control">
                                      </div>
                                  </div>
                                  <div class="col-md-4">
                                      <div class="form-group">
                                          <label for="" class="col-form-label">Hasta</label>
                                          <input type="text" name="hasta_x" id="mdatexxxxx" class="form-control">
                                      </div>
                                  </div>
                              </div>
                              <div class="row">
                                  <div class="col-md-6">
                                      <div class="form-group">
                                          <label for="">Grado academico</label>
                                          <input type="text" class="form-control" id="grado_academico_xx_updating" name="grado_academico_validate_xx_updating_xx" >
                                      </div>
                                  </div>
                              </div>

                              <div class="row text-center">
                                  <div class="col-md-12">
                                      <div class="form-actions">
                                          <input type="hidden" name="user_id_x" id="user_id_x" />
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
                function numerosletrasmayus(e){
                   if(e.key.match(/[A-Z0-9\sºª.ñ\/]/i)===null) {
                        // Si la tecla pulsada no es la correcta, eliminado la pulsación
                        e.preventDefault();
                    }
                }
            </script>

            <script >
                $(document).ready(function() {
                    $(document).on('submit', '#user_form_grado_superior', function(event) {
                        event.preventDefault();

                        var educacion = $("#especialidad_upating").val();
                        var centro_estudios = $("#centro_estudios_xx_updating").val();
                        var mdate = $("#mdatexxxx").val();
                        var mdatex = $("#mdatexxxxx").val();
                        var completa = $("#comple_incomplexx").val();
                        var grado_academico = $("#grado_academico_xx_updating").val();

                        if (educacion == null || educacion.length == 0 || /^\s+$/.test(educacion)) {
                            Swal.fire({
                                title: 'Especialidad',
                                text: "Ingrese Especialidad",
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
                        //seleccione  centro_estudios
                        if (centro_estudios == null || centro_estudios.length == 0 || /^\s+$/.test(centro_estudios)) {
                            Swal.fire({
                                title: 'Centro de Estudios',
                                text: "Ingrese Centro de Estudios",
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
                        } else if (centro_estudios.length <= 3) {
                            Swal.fire({
                                title: 'Centro de Estudios',
                                text: "El Centro de Estudios no puede ser menor a 3 caracteres",
                                icon: 'error',
                                showCancelButton: false,
                                confirmButtonColor: '#3085d6',
                                cancelButtonColor: '#d33',
                                confirmButtonText: 'ok'
                            }).then((result) => {
                                if (result.value) {}
                            })
                            return false;
                        } else if (centro_estudios.length >= 100) {
                            Swal.fire({
                                title: 'Centro de Estudios',
                                text: "El Centro de Estudios no puede ser mayor a 100 caracteres",
                                icon: 'error',
                                showCancelButton: false,
                                confirmButtonColor: '#3085d6',
                                cancelButtonColor: '#d33',
                                confirmButtonText: 'ok'
                            }).then((result) => {
                                if (result.value) {}
                            })
                            return false;
                        }
                        //desde
                        if (mdate == null || mdate.length == 0 || /^\s+$/.test(mdate)) {
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
                        //desde
                        if (mdatex == null || mdatex.length == 0 || /^\s+$/.test(mdatex)) {
                            Swal.fire({
                                title: 'Fecha Fin',
                                text: "Ingrese Fecha fin",
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
                        //seleccione  completa
                        if (completa == null || completa.length == 0 || /^\s+$/.test(completa)) {
                            Swal.fire({
                                title: 'Completa',
                                text: "Educación completa ou Incompleta",
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
                        //seleccione  completa
                        if (grado_academico == null || grado_academico.length == 0 || /^\s+$/.test(grado_academico)) {
                            Swal.fire({
                                title: 'Grado Academico',
                                text: "Ingrese Grado Académico",
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
                        /* Act on the event */
                        $.ajax({
                                url: '<?php echo base_url().'View_intranet/Formacion_academica/actualizar_datos_grado_superior/';?>',
                                type: 'POST',
                                data:new FormData(this),  
                                contentType:false,  
                                processData:false,  
                                statusCode: {
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
                            })
                            .done(function(data) {
                                console.log("success");
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
                                cargar_eduacion_superior();
                            })
                            .fail(function(jqXHR, textStatus, errorThrown) {
                               Swal.fire({
                                title: '<strong>Error <u>Sistema</u></strong>',
                                icon: 'info',
                                html:
                                  'Ponte en contacto con el administrador<b>bold text</b>, ' +
                                  '<a href="tel:51924543121">(+51)924543121</a> ' +
                                  'Responde de Inmediato',
                                showCloseButton: true,
                                showCancelButton: true,
                                focusConfirm: false,
                                confirmButtonText:
                                  '<i class="fa fa-thumbs-up"></i> Great!',
                                confirmButtonAriaLabel: 'Ok, gracias!',
                                cancelButtonText:
                                  '<i class="fa fa-thumbs-down"></i>',
                                cancelButtonAriaLabel: 'Thumbs down'
                              })
                               
                            })
                            .always(function() {
                                console.log("complete");
                            });

                    });
                }); 
            </script>


