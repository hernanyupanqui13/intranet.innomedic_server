           

           <?php $query = $this->db->query("select *,count(*) as total,
           sum(status='1') as activos,
           sum(status='2') as pendientes,
           sum(status='3') as observados
            from ts_usuario where id_usuario_statico=1");
           foreach ($query->result() as $xx) {
              $cantidad_usuariox = $xx->total;
              $activos_x = $xx->activos;
              $pendientes_x = $xx->pendientes;
              $observados_x = $xx->observados;
            } ?>
            <div class="row">
              <div class="col-12">
                <div class="card">
                  <div class="card-body">
                    <a href="javascript:void(0)" data-toggle="modal" data-target=".bd-example-modal-xl" class="btn btn-outline-success btn-rounded btn-md"><i class=" fas fa-plus-circle"></i>&nbsp;Nuevo Usuario</a>
                  </div>
                </div>
              </div>
            </div>
            

            <!--Usuario_282924322163486Usuario_470839495672781Usuario8896610883298483a9f426e2460ee5ee854fd084302e3a6.png-->

            <div class="modal fade bd-example-modal-xl" tabindex="-1" role="dialog" aria-labelledby="myExtraLargeModalLabel" aria-hidden="true" data-backdrop="static">
              <div class="modal-dialog modal-lg">
                <div class="modal-content " >
                  <div class="modal-body">
                    <div class="modal-header">
                      <h5 class="text-dark">Registrar Nuevo Usuario</h5>
                    </div>
                    <div class="modal-body">
                      <form autocomplete="off" action="" role="form" class="form-horizontal form-material" id="user_form_insert" enctype="multipart/form-data">
                      <div class="row">
                        <div class="col-md-3">
                          <div class="form-group">
                            <label class="control-label ">Usuario:</label>
                            <input type="text" name="usuario" class="form-control redondeado " id="usuario" placeholder="Usuario" onkeypress="return sololetrasnumeros(event);">
                         </div>
                        </div>
                        
                        <div class="col-md-3">
                          <div class="form-group">
                            <label for="clave"  class="control-label">Nueva Clave:</label>
                            <input type="password" name="clave" class="form-control redondeado" id="clave" placeholder="password">
                         </div>
                        </div>
                        <div class="col-md-3">
                          <div class="form-group">
                            <label class="control-label">Repetir Clave:</label>
                            <input type="password" name="clave_repeat" class="form-control redondeado" id="repeat_clave" placeholder="repeat password">
                         </div>
                        </div>
                        <div class="col-md-3">
                          <div class="form-group">
                            <label class="control-label">Perfil:</label>
                           <select name="id_perfil" id="id_perfil" class="form-control fondo">
                             <option value="">--seleccionar--</option>
                             <?php foreach ($id_perfil as $perfil_id) {?>
                                <option value="<?php echo $perfil_id->Id;?>"><?php echo $perfil_id->perfil; ?></option>
                             <?php } ?>
                           </select>
                         </div>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-md-4">
                          <div class="form-group">
                            <label for="">Puesto&nbsp; <i class="fa fa-search"></i></label>
                            <input type="text" name="puesto" id="puesto_txt_busqueda" class="form-control" placeholder="Buscar puesto" onkeypress="return sololetras(event);">
                          </div>
                        </div>
                        <div class="col-md-4">
                          <div class="form-group">
                            <label for="">Área&nbsp; <i class="fa fa-search"></i></label>
                            <input type="text" name="area" id="area_txt_busqueda" class="form-control" placeholder="Buscar área" onkeypress="return sololetras(event);">
                          </div>
                        </div>
                        <div class="col-md-4">
                          <div class="form-group">
                            <label for="">Fecha de Ingreso</label>
                            <input type="text" name="fecha_ingreso"  class="form-control" placeholder="2017-06-04" id="mdate" >
                          </div>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-md-12">
                          <div class="form-group">
   
                            <label class="control-label ">Buscar - Ingrese DNI presione enter <i class="fa fa-search"></i></label>
                            <input type="text" class="dni form-control " id="dni" name="dni" placeholder="Ingrese DNI presione enter">
                            <button style="display: none;" id="botoncito" class="botoncito btn btn-outline-success">Buscar</button>
                         </div>
                        </div>
                        <div class="col-md-4">
                          <div class="form-group">
                            <label class="control-label ">Nombre</label>
                            <input type="text" name="nombre" id="nombres_completos" class="form-control redondeado" placeholder="" >
                         </div>
                        </div>
                        <div class="col-md-4">
                          <div class="form-group">
                            <label  class="control-label ">Apellido Paterno</label>
                            <input type="text" name="apellido_paterno" class="form-control redondeado" id="apellido_paterno_x" placeholder="">
                         </div>
                        </div>
                        <div class="col-md-4">
                          <div class="form-group">
                            <label class="control-label ">Apellido Materno</label>
                            <input type="text" name="apellido_materno" class="form-control redondeado" id="apellido_materno" placeholder="" >
                         </div>
                        </div>
                        <!--<div class="col-md-4">
                          <div class="form-group">
                            <label  class="control-label ">Apellido Paterno</label>
                            <input type="text" name="apellido_paterno" class="form-control redondeado" id="apellido_paterno_x" placeholder="" readonly="">
                         </div>
                        </div>
                        <div class="col-md-4">
                          <div class="form-group">
                            <label class="control-label ">Apellido Materno</label>
                            <input type="text" name="apellido_materno" class="form-control redondeado" id="apellido_materno" placeholder="" readonly="">
                         </div>
                        </div>-->
                      </div>
                      <div class="row">
                        <div class="col-md-12">
                          <div class="form-group">
                            <label  class="control-label ">Email:</label>
                           <input type="text" name="email" id="email" class="form-control redondeado" placeholder="Ingrese Email Valido">
                         </div>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-md-4">
                          <div class="form-group text-center">
                            <label  class="control-label">Adjuntar imagen</label>
                             <input type="file" id="input_file" class="dropify" name="picture" onchange="fileValidatiosn(this);"/>
                             <span class="text-center"><small class="label label-danger">Tamaño permitido 128px x 128px</small></span>
                         </div>
                        </div>
                        <div class="col-md-3">
                          <div class="form-group">
                            <label  class="control-label">Sexo:</label>
                           <select name="id_genero" id="id_genero" class="form-control fondo">
                             <option value="">--seleccionar--</option>
                             <?php foreach ($id_sexo as $sexo_id) {?>
                                <option value="<?php echo $sexo_id->Id;?>"><?php echo $sexo_id->genero; ?></option>
                             <?php } ?>
                           </select>
                         </div>
                        </div>
                        <div class="col-md-3">
                          <div class="form-group">
                            <label  class="form-label">Nº Celular:</label>
                           <input type="text" name="celular" id="celular" class="form-control redondeado" placeholder="924543121" onkeypress="return soloNumeros(event);">
                         </div>
                        </div>
                      </div>
                      
                      <div class="row text-center">
                        <div class="col-md-12">
                          <button type="botton" class="btn btn-outline-danger btn-rounded  btn-md" data-dismiss="modal"> <i class="fas fa-times-circle"></i>&nbsp;Cancelar</button>
                          <button type="submit" class="btn btn-outline-success btn-rounded btn-md"><i class=" fas fa-check-circle"></i>&nbsp;Registrar</button>
                        </div>
                      </div>
                    </form>
                    </div>
                  </div>
                </div>
              </div>
            </div>



                <!-- ============================================================== -->
                <!-- End Bread crumb and right sidebar toggle -->
                <!-- ============================================================== -->
                <!-- ============================================================== -->
                <!-- Start Page Content -->
                <!-- ============================================================== -->
             
                <div class="row animated rubberBand" id="div_load"  >
                    <div class="col-12" >
                        <div class="card">
                            <div class="card-body" >
                                <h4 class="card-title">Registro de usuarios</h4>
                                <h6 class="card-subtitle">Lista de entradas abiertas por Usuarios</h6>
                                <div class="row ">
                                    <!-- Column -->
                                    <div class="col-md-6 col-lg-3 col-xlg-3">
                                        <div class="card">
                                            <div class="box bg-info text-center">
                                                <h1 class="font-light text-white"><?php echo $cantidad_usuariox;?></h1>
                                                <h6 class="text-white">Total Usuario</h6>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Column -->
                                    <div class="col-md-6 col-lg-3 col-xlg-3">
                                        <div class="card">
                                            <div class="box bg-success text-center">
                                                <h1 class="font-light text-white"><?php echo $activos_x;?></h1>
                                                <h6 class="text-white">Activos</h6>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Column -->
                                    <div class="col-md-6 col-lg-3 col-xlg-3">
                                        <div class="card">
                                            <div class="box bg-warning text-center">
                                                <h1 class="font-light text-white"><?php echo $observados_x;?></h1>
                                                <h6 class="text-white">Observados</h6>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Column -->
                                    <div class="col-md-6 col-lg-3 col-xlg-3">
                                        <div class="card">
                                            <div class="box bg-dark text-center">
                                                <h1 class="font-light text-white"><?php echo $pendientes_x;?></h1>
                                                <h6 class="text-white">Desactivado</h6>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Column -->
                                </div>
                                <div class="table-responsive m-t-40"  >
                                    <table  id="demo-foo-accordion" class="table table-bordered m-b-0 toggle-arrow-tiny display nowrap  table-hover table-striped table-bordered" data-filtering="true" data-paging="true" data-sorting="true"  data-paging-size="7" cellspacing="0" width="100%">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Nombre</th>
                                                <th>Perfil</th>
                                                <th>Genero</th>
                                                <th>Edad</th>
                                                <th>Estado</th>
                                                <th>Email</th>
                                                <th>Opciones</th>
                                            </tr>
                                        </thead>
          
                                        <tbody>
                                        <?php
                                            if (!isset($mostrar_users)) {
                                                echo base_url().'Sistema';
                                            }
                                            $cont=0;
                                            foreach ($mostrar_users as $users ) {
                                            $cont+=1;?>
                                            <tr>
                                                <td><?php echo $cont; ?></td>
                                                <td><a class="text-success" href="javascript:void(0)"><img src="<?php echo base_url().'upload/';?>images/<?php if ($users->imagen=='' || $users->imagen==null){
                                                    echo "$users->id_otros"; 
                                                }else{
                                                     echo $users->imagen;
                                                } ?>
                                                    
                                                " alt="user" width="40" class="img-circle " /> <?php echo $users->nombres.' '.$users->apellido_paterno.' '.$users->apellido_materno;?></a></td>
                                                <td>
                                                    <?php if ($users->txtperfil=="" || $users->txtperfil==null) {
                                                      echo "Aun falta agregar perfil";
                                                    }else{
                                                      echo "<span class='label label-success'>$users->txtperfil</span>";
                                                    }?> 
                                                </td>
                                                <td><?php if ($users->id_genero==1) {
                                                    echo "$users->txtgenero";
                                                }elseif ($users->id_genero==2) {
                                                    echo "$users->txtgenero";
                                                }else if ($users->id_genero==3) {
                                                    echo "$users->txtgenero";
                                                }else{
                                                    echo "<span class='label label-inverse'> Falta asignar Genero</span>";
                                                } ?></td>
                                                <td><?php if ($users->edad=='') {
                                                    echo "<span class='label label-danger'> No existe edad</span>";
                                                }else{
                                                    echo "".$users->edad." Años";
                                                } ?></td>
                                                <td><?php if ($users->status==1) {
                                                    echo "<span class='label label-success'>activado</span>";
                                                }else if($users->status==2){
                                                    echo "<span class='label label-primary'>Desactivado</span>";
                                                }else if($users->status==3){
                                                    echo "<span class='label label-warning'>Anulado</span>";
                                                }else{
                                                   echo "<span class='label label-danger'>Observacion</span>";
                                                } ?></td>
                                                <td><a href="mailto:<?php echo $users->email;?>"><?php echo $users->email;?></a></td>
                                                <td>
                                                    <a class="btn-outline-primary btn " href="<?php echo base_url().'Mantenimiento/Usuario/editar/'.$users->Idx; ?>"><i class="fas fa-edit"></i></a>
                                                    <a class="btn-outline-success btn " href="<?php echo base_url().'Mantenimiento/Usuario/mostrar/'.$users->Idx;?>"><i class="fas fa-eye"></i></a>
                                                    <a class="btn-outline-info btn " href="<?php echo base_url().'Mantenimiento/Usuario/update_users_clave_perfil_status/'.$users->Idx;?>"><i class="fas fa-user-plus"></i></a>

                                                    <a class="btn-outline-danger btn delete" name="delete" id="<?php echo $users->Idx;?>" href="javascript:void(0)" ><i class="fas fa-window-close"></i></a>

                                                    <a class="btn-outline-primary btn " target="_blank"  title="Boletín Informativo" id="<?php echo $users->Idx;?>" href="<?php echo base_url().'Mantenimiento/Usuario/Boletin_Informativo/'.$users->url;?>" ><i class="fas fa-file-pdf"></i></a>

                                                    <a class="btn-outline-warning btn " target="_blank"  title="Reglamento interno de Trabajo" id="<?php echo $users->Idx;?>" href="<?php echo base_url().'Mantenimiento/Usuario/Reclamento_trabajo/'.$users->url;?>" ><i class="fas fa-registered"></i></a>

                                                    <a class="btn-outline-info btn " target="_blank"  title="Boletín Informativo acerca del sistema privado" id="<?php echo $users->Idx;?>" href="<?php echo base_url().'Mantenimiento/Usuario/Constancia_entrega_boletin_informativo/'.$users->url;?>" ><i class="fas fa-mobile"></i></a>

                                                    <a class="btn-outline-danger btn " target="_blank" title="Declaración Jurada de Estudios" id="<?php echo $users->Idx;?>" href="<?php echo base_url().'Mantenimiento/Usuario/Declaracion_jurada/'.$users->url;?>" ><i class=" fas fa-allergies"></i></a>
                                                    <!--ficha personal-->
                                                    <a class="btn-outline-info btn "  target="_blank"  title="Declaración Jurada de Domicilio" id="<?php echo $users->Idx;?>" href="<?php echo base_url().'Mantenimiento/Usuario/declaracion_jurada_domicilio/'.$users->url;?>" ><i class="fab fa-houzz"></i></a>
                                                     <a class="btn-outline-success btn "  target="_blank"  title="Ficha Personal" id="<?php echo $users->Idx;?>" href="<?php echo base_url().'Mantenimiento/Usuario/Generate_ficha_personal/'.$users->url;?>" ><i class="fas fa-address-card"></i></a>
                                                   

 
                                                </td>
                                            </tr>
                                             <?php } ?>

                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
                <!-- ============================================================== -->
                <!-- End PAge Content -->
                <!-- ============================================================== -->
                <!-- ============================================================== -->
                <!-- Right sidebar -->
                <!-- ============================================================== -->
                <!-- .right-sidebar -->



<!--eliminar con ajax-->

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script>
                    function fileValidatiosn(obj){
                        var uploadFile = obj.files[0];

                        if (!window.FileReader) {
                            alert('El navegador no soporta la lectura de archivos');
                            return;
                        }

                        if (!(/\.(jpg|png|gif|pdf|docx|)$/i).test(uploadFile.name)) {
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
                            $("#input_file").val("");
                           // $("#user_image").val("");
                          }
                        })
                           
                        }

                        var uploadFile = obj.files[0];
                        var img = new Image();
                        img.onload = function ()
                        {
                        if (this.width.toFixed(0) != 128 && this.height.toFixed(0) != 128)
                        {
                          Swal.fire({
                          title: 'Files',
                          text: "La imagen debe ser de tamaño 128px por 128px.",
                          icon: 'warning',
                          showCancelButton: false,
                          confirmButtonColor: '#3085d6',
                          cancelButtonColor: '#d33',
                          confirmButtonText: 'ok'
                        }).then((result) => {
                          if (result.value) {
                            $("#input_file").val("");
                           // $("#user_image").val("");
                          }
                        })
                        }
                        };
                        img.src = URL.createObjectURL(uploadFile);
                        
                                                               
                    }
                </script>

                <script type="text/javascript">
                                   
                      function soloNumeros(e)
                      {
                         var key = window.Event ? e.which : e.keyCode
                          return ((key >= 48 && key <= 57) || (key==8))
                      }

                      function sololetras(e) {
                            if(e.key.match(/[a-zñçáéíóú\s]/i)===null) {
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

<script type="text/javascript">
    //eliminar pedido sin recargar la pagina web
    
   $(document).on('click', '.delete', function(){  
       var user_id = $(this).attr("Id"); 
       var c_obj = $(this).parents("tr");
     // var c_objee = $("#your_div_id").load("div");
     //  var dataTable = $('#user_data').dataTable(); 
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
                 url:"<?php echo base_url().'Mantenimiento/Usuario/eliminar_usuario/';?>",  
                 method:"POST",  
                 data:{user_id:user_id},  
                 success:function(data)  
                 {  
                     c_obj.remove();
                       //$("#example23").load(" #example23");
                      
                     //$('#div_load').load(location.href+" #div_load>*","");

                     table.ajax.reload();  
                 }  
            }); 
            Swal.fire(
              'Deleted!',
              'Your file has been deleted.',
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
    $(document).on('submit', '#user_form_insert', function(event){  
         event.preventDefault();  
         var usuario = $('#usuario').val();  
         var clavexx = $("#clave").val();
         var clavexx1 = $("#repeat_clave").val();
         var perfil = $("#id_perfil").val();
         var puesto_txt_busqueda = $("#puesto_txt_busqueda").val();
         var area_txt_busqueda=$("#area_txt_busqueda").val();
         var fecha_ingreso = $("#mdate").val();
         var dnix = $("#dni").val();
         var nombres_completos = $("#nombres_completos").val();
         var apellido_paterno = $("#apellido_paterno_x").val();
         var apellido_materno = $("#apellido_materno").val();
         var emailxx = $("#email").val();
         var sexo = $("#id_genero").val();
         var telefono_movil=$("#celular").val();
         var imagen = $('#input_file').val();  


        //Campo Usuario
        if (usuario=='' || usuario.length == 0 || /^\s+$/.test(usuario)) {
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
                  title: 'El campo usuario esta vacio'
                })
              return false;
          }else if(usuario.length<6 || usuario.length>20){
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
                  title: 'usuario no puede ser menor a 6 caracteres ni mayor a  20'
                })
              return false;
          }

          //VALIDACION DE DOS CLAVES IGUALES

          if (clavexx=="" || clavexx==0) {
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
                title: 'Ingrese clave'
              })
             return false;

           }

           //clave2 

           if (clavexx1=="" || clavexx1==0) {
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
                title: 'Repetir la nueva contraseña'
              })
             return false;

           }

          if (clavexx != clavexx1) {
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
                title: 'Las contraseñas no son iguales'
              })
             return false;
           }

           //Validar para que ingrese  perfil

            if( perfil == null || perfil == 0 ) {
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
                  title: 'Seleccione Perfil'
                })
              return false;
            }

        //validacion de puesto

        if (puesto_txt_busqueda=='' || puesto_txt_busqueda.length == 0 || /^\s+$/.test(puesto_txt_busqueda)) {
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
                    title: 'Buscar puesto (Presiona "ENTER")'
                  })
              return false;

        }
        //VALIDACION DE AREA

        if (area_txt_busqueda=='' || area_txt_busqueda.length == 0 || /^\s+$/.test(area_txt_busqueda)) {
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
                    title: 'Buscar Area (Presiona "ENTER")'
                  })
              return false;

        }

        // validar fecha ingreso
         
        if (fecha_ingreso == null || fecha_ingreso.length == 0 || /^\s+$/.test(fecha_ingreso) ) {
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
                  title: 'Ingrese fecha Ingreso'
                })
          return false;
         
        }
       // varables =  /^(0[1-9]|[12]\d|3[01])\/(0[1-9]|1[0-2])\/(19|20)\d{2}$/.test(fecha);
       
          //validacion de dni 


          if (dnix == null || dnix.length == 0 || /^\s+$/.test(dnix) ) {
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
                  title: 'Ingrese DNI y precione Enter'
                })
          return false;
         }

          /*if( !(/^\d{9}$/.test(dnix)) ) {
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
              title: 'Ingrese DNI valido'
            })
            return false;
          }*/

          //validar campos que estan en reonly


          if (nombres_completos.length =="" ) {
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
                  title: 'Ingrese campos vacios, Realiza una busqueda  por DNI'
                })
                return false;
          }

          //email

          expr = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;

            if ( !expr.test(emailxx) ){
                  Swal.fire({
                    title: 'E-mail',
                    text: "La dirección de correo " + emailxx + " es incorrecta.",
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

          //validar sexo

          //Validar para que ingrese  perfil

          if( sexo == null || sexo == 0 ) {
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
                  title: 'Seleccione Sexo'
                })
              return false;
            }

          //celular

          if( !(/^\d{9}$/.test(telefono_movil)) ) {
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
                  title: 'Ingrese celular valido'
                })
            return false;
          }


          //adjuntar imagen


      /*  // var banderaTamano = false;
          var o = document.getElementById('input_file');
          var foto = o.files[0];
          var c = 0;
          var img = new Image();

          //if (o.files.length == 0 || !(/\.(jpg|png)$/i).test(foto.name)) {
            if (o.files.length == 0 || !(/\.(jpge|jpg|png)$/i).test(foto.name)) {
            Swal.fire({
              icon: 'warning',
              title: 'Oops...',
              text: 'Ingrese una imagen con el formatos: /.png|jpg|jpge.',
             
            })
            //alert('Ingrese una imagen con alguno de los siguientes formatos: .jpeg/.jpg/.png.');
            return false;
          }
*/
        
       
          $.ajax({  
               url:"<?php echo base_url().'Mantenimiento/Usuario/Agregar_nuevo/'?>",  
               method:'POST',  
               data:new FormData(this),  
               contentType:false,  
               processData:false,  
               success:function(data)  
               {  
                 var json = JSON.parse(data);

                Swal.fire({
                  title: 'Muy Bien?',
                  text: ''+json.mensaje+'',
                  icon: 'success',
                  showCancelButton: false,
                  confirmButtonColor: '#3085d6',
                  cancelButtonColor: '#d33',
                  confirmButtonText: 'OK'
                }).then((result) => {
                  if (result.value) {  

                  }
                })

                $(".bd-example-modal-xl").modal('hide');//ocultamos el modal
                 //clear on focus
                $('#usuario').val("");
                $('#picture').val("");
                //lo maximo estaba buscandp
                location.href= "<?php echo base_url().'Mantenimiento/Usuario/';?>";
              //  $("#div_load").load(location.href+" #div_load>*","");                           

                      
          },statusCode:{
                400: function(xhr){

                  var json = JSON.parse(xhr.responseText);
                  if (json.error) {
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
                      $('#btnSave_x').html('<i class="fas fa-circle-notch"></i> Reintentar'); //change button text
                      $('#btnSave_x').attr('disabled',false);
                   /* $("#alert").html('<div class="alert alert-success text-center" id="alerta" role="alert">'+json.alerta+'</div>'); */
                  }
                  
                },
            error: function(jqXHR, textStatus, errorThrown)
                                 {
                       Swal.fire({
                        title: 'Lo siento mucho',
                        text: "Algo paso con el sistema Vuelva a intentar una vez mas",
                        icon: 'warning',
                        showCancelButton: false,
                        confirmButtonColor: '#3085d6',
                        cancelButtonColor: '#d33',
                        confirmButtonText: 'Ok!(︶︿︶)!'
                      }).then((result) => {
                        if (result.value) {
                         
                        }
                      })
                  }
              }  


        });  
         
         

    });  

</script> 
<!--carga masiva de datos-->

<script>
  $(document).ready(function() {

    $(document).on('click', '.ficha_personal', function(){ 
     $("#modal_ficha_personal").modal('show');
   });

  });
</script>


<div class="modal fade bd-example-modal-xl" id="modal_ficha_personal" tabindex="-1" role="dialog" aria-labelledby="myExtraLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-xl" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h1>Imprimir data <a href="javascript:void(0)" class="btn btn-outline-success btn-rounded text-left">Imprimir</a></h1>
      </div>
      <div class="modal-body">
        <iframe src="" frameborder="0"></iframe>
        
      </div>
    </div>
  </div>
</div>
 