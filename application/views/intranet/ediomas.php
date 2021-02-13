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
                $nombres_completosx = $xx->apellido_paterno."" . $xx->apellido_materno."".$xx->nombres;
                $apellido_paternox = $xx->apellido_paterno;
                $apellido_maternox = $xx->apellido_materno;
                $urlx = $xx->url;


                

            } ?>
                <div class="row">
                  <div class="col-md-12">
                    <div class="card">
                    <div class="card-body">
                      <a href="javascript:void(0)" data-toggle='modal' data-target='#exampleModal' class="btn btn-outline-info btn-rounded btn-md"><i class=" fas fa-plus-circle"></i>&nbsp;Agregar Edioma</a>
                    </div>
                   
                  </div>
                  </div>
                </div>
                <div class="row" id="cargar_resultado"></div>


                    <div class="modal fade bd-example-modal-lgsd" id="exampleModal" data-backdrop="static" data-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-lg">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h3 class="modal-title text-center" id="exampleModalLabel">Hola <?php echo $nombres_completosx;?></h3>                           
                                </div>
                                <div class="modal-body">
                                    <form autocomplete="on" method="post" id="insert_data">
                                        <input type="hidden" name="url" id="url" value="<?php echo $urlx; ?>">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="" class="col-form-label">Idioma</label>
                                                    <select name="ediomas_id" id="ediomas_id" class=" form-control " >
                                                        <option value="">--Seleccione--</option>
                                                        <?php foreach ($edioma as $xx) {?>
                                                            <option value="<?php echo $xx->Id ?>"><?php echo $xx->ediomas;?></option>
                                                       <?php  } ?>

                                                       
                                                    </select>
                                                   
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="" class="col-form-label">Categoria </label>
                                                    <select name="nivel_id" id="nivel_id" class="form-control">
                                                        <option value="">--Seleccione--</option>
                                                       <?php foreach ($tipo_nivel as $xx) {?>
                                                           <option value="<?php echo $xx->id_codigo;?>"><?php echo $xx->nombre; ?></option>
                                                       <?php } ?>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row text-center">
                                            <div class="col-md-12">
                                                <div class="form-actions">
                                                   <input type="hidden" name="user_id" id="user_id" />
                                                    <button type="submit" class="btn btn-success btn-rounded"> <i class="fa fa-check"></i> Agregar</button>
                                                    <button type="button" data-dismiss="modal" class="btn btn-danger btn-rounded"><i class="fa fa-times-circle"></i>&nbsp;Cancelar</button>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>




                        <!--cargar los valores con ajax-->
                 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script> 
                    
                    <script type="text/javascript">

                        function cargar_ediomas() {
                            $.ajax({
                            url: "<?php echo base_url().'View_intranet/Ediomas/Cargar_ediomas/';?>",
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
                                    <div class="col-sm-4 col-md-3 col-lg-3 col-xl-3">
                                        <div class="card card-body">
                                            <div class="row align-items-center">
                                                <div class="col-md-4 col-lg-3 text-center">
                                                    <a href="javascript:void();"><img src="<?php echo base_url().'assets_sistema/';?>/images/users/`+value.imagen+ `" alt="`+value.ediomas+ `" class="img-circle img-fluid"></a>
                                                </div>
                                                <div class="col-md-8 col-lg-9">
                                                    <h3 class="box-title m-b-0">`+value.ediomas+ `</h3> <small>`+value.categoria+ `</small>
                                                    <address>
                                                       <a href="javascript:void(0)" class="btn btn-danger delete" id="`+value.Id+`"><i class=" fas fa-trash-alt"></i></a>
                                                    </address>
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
                                 cargar_ediomas();
                               }, 3000);
                              }
                        })
                        };

                        $(function() {
                            cargar_ediomas();
                        });
                        
                    </script>

                    <script>

                $(document).ready(function() {
                    $(document).on('submit', '#insert_data', function(event){
                   event.preventDefault(); 
                    var ediomas_id =$("#ediomas_id").val();
                    var nivel_id =$("#nivel_id").val();

                   // ediomas_id = document.getElementById("id_estado").selectedIndex;
                    if( ediomas_id == null || ediomas_id == 0 ) {
                        Swal.fire({
                          title: 'Idioma',
                          text: "Ingrese estado Edioma",
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

                  //  indice = document.getElementById("id_estado").selectedIndex;
                    if( nivel_id == null || nivel_id == 0 ) {
                        Swal.fire({
                          title: 'Nivel de Idioma',
                          text: "Ingrese Nivel del Idioma",
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
                        url: '<?php echo base_url().'View_intranet/Ediomas/Insert_ediomas/';?>',
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


                            cargar_ediomas();
                  

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
                             url:"<?php echo base_url().'View_intranet/Ediomas/Eliminar_Ediomas/';?>",  
                             method:"POST",  
                             data:{user_id:user_id},  
                             success:function(data)  
                             {  
                                 c_obj.remove();
                                 table.ajax.reload();  
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