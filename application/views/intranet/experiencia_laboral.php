				
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
                $nombres_completosx = $xx->apellido_paterno." ". $xx->apellido_materno.", ".$xx->nombres;
                $apellido_paternox = $xx->apellido_paterno;
                $apellido_maternox = $xx->apellido_materno;
                $urlx = $xx->url;


                

            } ?>
      				<!-- .row -->
      				<div class="row">
      					<div class="col-md-12">
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

                <!--cuando no funciona selecct 2 solo hacemos quitamos tabindex="-1"-->
                 <div class="modal fade bd-example-modal-lgsd" id="exampleModal" data-backdrop="static" data-keyboard="false"  role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
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
                                                    <label for="" class="col-form-label">Cargo </label>
                                                   <input type="text" name="cargo" id="cargo" placeholder="Ingrese Cargo" class="form-control" maxlength="30" onkeypress="return sololetras(event);">
                                                   
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="" class="col-form-label">Empresa </label>
                                                    <input type="text" name="empresa" id="empresa" class="form-control" placeholder="Ingrese Empresa" maxlength="50" onkeypress="return sololetras(event);">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="" class="col-form-label">Fecha Inicio </label>
                                                   <input type="text" name="fecha_inicio" id="mdate"  class="form-control" placeholder="<?php echo date('Y-m-d') ?>">
                                                   
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="" class="col-form-label">Fecha Fin </label>
                                                    <input type="text" name="fecha_fin" id="mdatex" class="form-control" placeholder="<?php echo date('Y-m-d') ?>">
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="" class="col-form-label">Motivo Cese </label>
                                                 <!--   <input type="text" name="motivo_cese" id="motivo_cese" class="form-control" placeholder="Ingrese motivo cese">-->
                                                   <select  name="motivo_cese" id="motivo_cese" class="select2x form-control custom-select" style="width: 100%; height:36px;">
                                                      <option value="">--Seleccione--</option>
                                                      <?php $x =$this->db->query("select * from ts_motivo_cese"); foreach ($x->result()  as $xx) {
                                                        echo "<option value='".$xx->nombre."'>".$xx->nombre."</option>";
                                                      } ?>

                                                    </select>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-8">
                                                <div class="form-group">
                                                    <label for="" class="col-form-label">Dirección </label>
                                                   <input type="text" name="direccion" id="direccion" placeholder="Ingrese Dirección" class="form-control"  maxlength="200" onkeypress="return sololetras(event);">
                                                   
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="" class="col-form-label">Teléfono </label>
                                                    <input type="text" name="telefono" id="telefono" class="form-control" maxlength="9" placeholder="Ingrese Teléfono celular" onkeydown="return soloNumeros(event);">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                        	<div class="col-md-12">
                                                <div class="form-group">
                                                  <label for="">Descripción Laboral </label>
                                                    <textarea name="descripcion_laboral" id="descripcion_laboral" placeholder="Ingrese descripción laboral" rows="3" class="form-control" onkeypress="return sololetras(event);"></textarea>
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
                                            <br>
                                           
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

                    </script>



                        <!--cargar los valores con ajax-->
                 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script> 
                    
                    <script type="text/javascript">

                        function cargar_experiencia_laboral() {
                            $.ajax({
                            url: "<?php echo base_url().'View_intranet/Experiencia_laboral/Cargar_Experiencia_laboral/';?>",
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
                                                        <a href="javascript:void();"><img src="<?php echo base_url().'assets_sistema/';?>images/users/seo.png" alt="user" class="img-circle img-fluid"></a>
                                                    </div>
                	                                <div class="col-md-8 col-lg-9">
                	                                    <h3 class="box-title m-b-0">`+value.empresa+`</h3> <small>`+value.cargo+`</small>
                	                                    <address>
                	                                        `+value.direccion+`
                	                                        <br/>
                	                                        <abbr title="Teléfono">P:</abbr> (01) `+value.telefono+`
                	                                    </address>
                	                                    <p>`+value.fecha_txt+`&nbsp; a &nbsp;`+value.fecha_txt_fin+`</p>
                	                                    <p class="label label-success">Duración Total: `+value.totaltxt+` meses</p>
                	                                    <p class="label label-danger">Motivo Cese: `+value.motivo_cese+`</p>
                	                                    <p>`+value.descripcion_laboral+`</p>
                	                                </div>
                	                                <div class="col-md-12 col-lg-12 text-right">
                	                                    <a class="btn btn-outline-danger delete" id="`+value.Id+`" href="javascript:void(0)"><i class="fas fa-trash-alt"></i></a>
                	                                    <a class="btn btn-outline-success update" id="`+value.Id+`" href="javascript:void(0)"><i class="fas fa-edit"></i></a>
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
                                 cargar_experiencia_laboral();
                               }, 3000);
                              }
                        })
                        };

                        $(function() {
                            cargar_experiencia_laboral();
                        });
                        
                    </script>


                    <script>

                $(document).ready(function() {
                    $(document).on('submit', '#insert_data', function(event){
                   event.preventDefault(); 
                   var cargo = $("#cargo").val();
                   var empresa = $("#empresa").val();
                   var mdate = $("#mdate").val();
                   var mdatex = $("#mdatex").val();
                   var motivo_cese = $("#motivo_cese").val();
                   var direccion = $("#direccion").val();
                   var telefono_movil = $("#telefono").val();
                   var descripcion_laboral = $("#descripcion_laboral").val();

                  //CARGO
                  if (cargo == null || cargo.length == 0 || /^\s+$/.test(cargo) ) {
                        Swal.fire({
                          title: 'Cargo',
                          text: "El campo cargo esta vacio",
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
                  }else if(cargo.length<=2){
                        Swal.fire({
                          title: 'Cargo',
                          text: "El cargo no puede ser menor a 2 caracteres",
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
                  }else if(cargo.length>=31){
                        Swal.fire({
                          title: 'Cargo',
                          text: "El cargo no puede ser mayor a 30 caracteres",
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
                  //EMPORESA

                  if (empresa == null || empresa.length == 0 || /^\s+$/.test(empresa) ) {
                        Swal.fire({
                          title: 'Empresa',
                          text: "El campo empresa esta vacio",
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
                  }else if(empresa.length<=2){
                        Swal.fire({
                          title: 'Empresa',
                          text: "El empresa no puede ser menor a 2 caracteres",
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
                  }else if(empresa.length>=51){
                        Swal.fire({
                          title: 'Empresa',
                          text: "El empresa no puede ser mayor a 50 caracteres",
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

                   //falta validar fecha de ingreso y termino


                   if (mdate == null || mdate.length == 0 || /^\s+$/.test(mdate) ) {
                        Swal.fire({
                          title: 'Fecha Inicio',
                          text: "El campo Fecha Inicio esta vacio",
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
                  if (mdatex == null || mdatex.length == 0 || /^\s+$/.test(mdatex) ) {
                        Swal.fire({
                          title: 'Fecha Fin',
                          text: "El campo Fecha Fin esta vacio",
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

                  //MOTIVO CESE
                  if (motivo_cese == null || motivo_cese.length == 0 || /^\s+$/.test(motivo_cese) ) {
                        Swal.fire({
                          title: 'Motivo cese',
                          text: "Seleccione Motivo Cese",
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

                  //DIRECCION

                  //MOTIVO CESE
                  if (direccion == null || direccion.length == 0 || /^\s+$/.test(direccion) ) {
                        Swal.fire({
                          title: 'Dirección',
                          text: "Campo  dirección esta vacio",
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
                  }else if(direccion.length<=20){
                        Swal.fire({
                          title: 'Dirección',
                          text: "El Dirección no puede ser menor a 20 caracteres",
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
                  }else if(direccion.length>=200){
                        Swal.fire({
                          title: 'Dirección',
                          text: "El Dirección no puede ser mayor a 200 caracteres",
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

                  //TELEFONO


                  
                  if( !(/^\d{9}$/.test(telefono_movil)) ) {
                        Swal.fire({
                          title: 'Telefóno Móvil',
                          text: "Ingrese Telefóno Celular Valido de 9 Digitos",
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


                  //DESCRIPCION

                   //observaciones

                   if(descripcion_laboral.length=="" || descripcion_laboral.length == 0 || /^\s+$/.test(descripcion_laboral)){
                        Swal.fire({
                          title: 'Descripcion Laboral',
                          text: "Ingrese Descripción laboral",
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
                   }else if(descripcion_laboral.length<=70){
                        Swal.fire({
                          title: 'Descripcion Laboral',
                          text: "Descripción laboral tiene que ser mayor a 70 caracteres",
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
                  }else if(descripcion_laboral.length>=500){
                        Swal.fire({
                          title: 'Dirección',
                          text: "Descripción laboral tiene que ser menor a 500 caracteres",
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
                        url: '<?php echo base_url().'View_intranet/Experiencia_laboral/Insert_experiencia_laboral/';?>',
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

                            cargar_experiencia_laboral();
                  

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
                             url:"<?php echo base_url().'View_intranet/Experiencia_laboral/Eliminar_experiencia_laboral/';?>",  
                             method:"POST",  
                             data:{user_id:user_id},  
                             success:function(data)  
                             {  
                                // c_obj.remove();
                                  cargar_experiencia_laboral();
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
                           url:"<?php echo base_url().'View_intranet/Experiencia_laboral/fetch_single_user_experience/';?>",
                            method:"POST",  
                            data:{user_id:user_id},   
                            dataType:"json",  
                            success:function(data)  
                            {  
                                 $('#userModal').modal('show');  
                                 $('#cargox').val(data.cargo);  
                                 $('#empresax').val(data.empresa);  
                               //  $('.modal-title').text("Edit User");  
                                 $('#user_id').val(user_id);  
                                 $("#motivo_cesexx option[value='"+data.motivo_cese+"']").attr("selected",true).parent().select2();
                                // $('#motivo_cesex').val(data.motivo_cese);
                                 $('#direccionx').val(data.direccion);
                                 $('#telefonoxx').val(data.telefono);
                                 $('#descripcion_laboralxx').html(data.descripcion_laboral);
                                 $('#mdatexx').val(data.fecha_inicio);
                                 $('#mdatexxx').val(data.fecha_fin);
        
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
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="">Cargo</label>
                                                    <input class="form-control" type="text" id="cargox" name="cargo">
                                                </div>
                                            </div>
                                            <div class="col-md-5">
                                               <label for="">Empresa</label>
                                               <input type="text" id="empresax" name="empresa" class="form-control">
                                            </div>
                                        </div>
                                        <div class="row">
                                             <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="" class="col-form-label">Fecha Inicio</label>
                                                     <input type="text" name="fecha_inicio" id="mdatexx" class="form-control">
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="" class="col-form-label">Fecha Fin</label>
                                                    <input type="text" name="fecha_fin" id="mdatexxx" class="form-control">
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                   
                                                  <!--- <input type="text" class="form-control" name="motivo_cese" id="motivo_cesex">-->
                                                   <label for="" class="col-form-label">Motivo Cese </label>
                                                   <select  name="motivo_cese" id="motivo_cesexx" class="select2x form-control custom-select" style="width: 100%; height:36px;">
                                                      <option value="">--Seleccione--</option>
                                                      <?php $x =$this->db->query("select * from ts_motivo_cese"); foreach ($x->result()  as $xx) {
                                                        echo "<option value='".$xx->nombre."'>".$xx->nombre."</option>";
                                                      } ?>

                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                        	<div class="col-md-8">
                                                <div class="form-group">
                                                    <label for="" class="col-form-label">Dirección</label>
                                                   <input type="text" class="form-control" name="direccion" id="direccionx">
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="" class="col-form-label">Teléfono</label>
                                                   <input type="text" class="form-control" name="telefono" id="telefonoxx">
                                                </div>
                                            </div>
                                          
                                        </div>
                                        <div class="row">
                                        	<div class="col-md-12">
                                                <div class="form-group" >
                                                  <textarea name="descripcion_laboral" id="descripcion_laboralxx" class="form-control" rows="5"></textarea>
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
                        var cargo = $("#cargox").val();
                   var empresa = $("#empresax").val();
                   var mdate = $("#mdatexx").val();
                   var mdatex = $("#mdatexxx").val();
                   var motivo_cese = $("#motivo_cesexx").val();
                   var direccion = $("#direccionx").val();
                   var telefono_movil = $("#telefonoxx").val();
                   var descripcion_laboral = $("#descripcion_laboralxx").val();

                  //CARGO
                  if (cargo == null || cargo.length == 0 || /^\s+$/.test(cargo) ) {
                        Swal.fire({
                          title: 'Cargo',
                          text: "El campo cargo esta vacio",
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
                  }else if(cargo.length<=2){
                        Swal.fire({
                          title: 'Cargo',
                          text: "El cargo no puede ser menor a 2 caracteres",
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
                  }else if(cargo.length>=31){
                        Swal.fire({
                          title: 'Cargo',
                          text: "El cargo no puede ser mayor a 30 caracteres",
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
                  //EMPORESA

                  if (empresa == null || empresa.length == 0 || /^\s+$/.test(empresa) ) {
                        Swal.fire({
                          title: 'Empresa',
                          text: "El campo empresa esta vacio",
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
                  }else if(empresa.length<=2){
                        Swal.fire({
                          title: 'Empresa',
                          text: "El empresa no puede ser menor a 2 caracteres",
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
                  }else if(empresa.length>=51){
                        Swal.fire({
                          title: 'Empresa',
                          text: "El empresa no puede ser mayor a 50 caracteres",
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

                   //falta validar fecha de ingreso y termino


                   if (mdate == null || mdate.length == 0 || /^\s+$/.test(mdate) ) {
                        Swal.fire({
                          title: 'Fecha Inicio',
                          text: "El campo Fecha Inicio esta vacio",
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
                  if (mdatex == null || mdatex.length == 0 || /^\s+$/.test(mdatex) ) {
                        Swal.fire({
                          title: 'Fecha Fin',
                          text: "El campo Fecha Fin esta vacio",
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

                  //MOTIVO CESE
                  if (motivo_cese == null || motivo_cese.length == 0 || /^\s+$/.test(motivo_cese) ) {
                        Swal.fire({
                          title: 'Motivo cese',
                          text: "Seleccione Motivo Cese",
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

                  //DIRECCION

                  //MOTIVO CESE
                  if (direccion == null || direccion.length == 0 || /^\s+$/.test(direccion) ) {
                        Swal.fire({
                          title: 'Dirección',
                          text: "Campo  dirección esta vacio",
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
                  }else if(direccion.length<=20){
                        Swal.fire({
                          title: 'Dirección',
                          text: "El Dirección no puede ser menor a 20 caracteres",
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
                  }else if(direccion.length>=200){
                        Swal.fire({
                          title: 'Dirección',
                          text: "El Dirección no puede ser mayor a 200 caracteres",
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

                  //TELEFONO


                  
                  if( !(/^\d{9}$/.test(telefono_movil)) ) {
                        Swal.fire({
                          title: 'Telefóno Móvil',
                          text: "Ingrese Telefóno Celular Valido de 9 Digitos",
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


                  //DESCRIPCION

                   //observaciones

                   if(descripcion_laboral.length=="" || descripcion_laboral.length == 0 || /^\s+$/.test(descripcion_laboral)){
                        Swal.fire({
                          title: 'Descripcion Laboral',
                          text: "Ingrese Descripción laboral",
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
                   }else if(descripcion_laboral.length<=70){
                        Swal.fire({
                          title: 'Descripcion Laboral',
                          text: "Descripción laboral tiene que ser mayor a 70 caracteres",
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
                  }else if(descripcion_laboral.length>=500){
                        Swal.fire({
                          title: 'Dirección',
                          text: "Descripción laboral tiene que ser menor a 500 caracteres",
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
                             url:"<?php echo base_url().'View_intranet/Experiencia_laboral/user_action_experience_update/';?>",
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
                                   cargar_experiencia_laboral();
                              
                                  //$("#div_load_id").load(location.href+" #div_load_id>*",""); 
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