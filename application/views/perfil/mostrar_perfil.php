<!-- Row -->
                <?php if (!empty($listar_empresa_perfil)) {
                        foreach ($listar_empresa_perfil as $emp) {
                            $nombrex = $emp->razon_social;
                            $rucx = $emp->ruc;
                            $urlx = $emp->url;
                            $direccionx = $emp->direccion;
                            $id_departamento = $emp->id_departamento;
                            $id_provincia = $emp->id_provincia;
                            $id_distrito = $emp->id_distrito;
                            $nombre_comercialx = $emp->nombre_comercial;
                            $actividad_economicax = $emp->actividad_economica;
                            $contactox = $emp->contacto;
                            $emailx = $emp->email;
                            $telefonox = $emp->telefono;
                            $departamentox = $emp->departamento;
                            $provinciax = $emp->provincia;
                            $distritox = $emp->distrito;
                            $rubrox = $emp->rubro;
                            $id_rubro = $emp->id_rubro;
                            $idx = $emp->Id;
                        }
                    }else{

                        redirect(base_url().'Sistema/');
                        
                    } ?>


                <!-- Row -->
                <div class="row animated pulse " id="update">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-body">
                                <form class="form-horizontal validate" role="form">
                                    <div class="form-body">
                                        <div class="row">
                                            <div class="col-md-12 text-right">
                                                <div class="row">
                                                    <div class="col-md-offset-3 col-md-12 text-right">
                                                        <a download href="<?php echo base_url().'Mantenimiento/Perfil/exportar_pdf/'.$urlx;?>" class="btn btn-outline-success  btn-rounded"> <i class=" fas fa-download"></i>&nbsp;&nbsp;</i> Download Perfil</a>
                                                        <a href="javascript:void(0);" relid="<?php echo $idx;?>" class="btn btn-outline-danger btn-rounded view_detail"><i class="fas fa-eye"></i> View Perfil</a>
                                                      <a id='btnImprimir' href="javascript:void(0)" class="btn btn-outline-success text-right  btn-rounded "> <i class="fas fa-print"></i>&nbsp;&nbsp;Imprimir</a>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6"> </div>

                                        </div>
                                        <h3 class="box-title ">Información <?php echo $nombrex;?></h3>
                                        <hr class="m-t-0 m-b-40">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group row">
                                                    <label class="control-label text-right col-md-3">Ruc:</label>
                                                    <div class="col-md-9">
                                                        <p class="form-control-static"> <?php echo $rucx;?> </p>
                                                    </div>
                                                </div>
                                            </div>
                                            <!--/span-->
                                            <div class="col-md-6">
                                                <div class="form-group row">
                                                    <label class="control-label text-right col-md-3">Razón Social:</label>
                                                    <div class="col-md-9">
                                                        <p class="form-control-static"> <?php echo $nombrex;?> </p>
                                                    </div>
                                                </div>
                                            </div>
                                            
                                            <!--/span-->
                                        </div>
                                        <!--/row-->
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group row">
                                                    <label class="control-label text-right col-md-3">Nombre Comercial:</label>
                                                    <div class="col-md-9">
                                                        <p class="form-control-static"> <?php echo $nombre_comercialx;?> </p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group row">
                                                    <label class="control-label text-right col-md-3">Act. Economica:</label>
                                                    <div class="col-md-9">
                                                        <p class="form-control-static"> <?php echo $actividad_economicax;?> </p>
                                                    </div>
                                                </div>
                                            </div>
                                            
                                        </div>
                                        <!--/row-->
                                        <div class="row">
                                            <!--/span-->
                                            <div class="col-md-4">
                                                <div class="form-group row">
                                                    <label class="control-label text-right col-md-3">Rubro:</label>
                                                    <div class="col-md-9">
                                                        <p class="form-control-static"> <?php echo $rubrox;?> </p>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-md-4">
                                                <div class="form-group row">
                                                    <label class="control-label text-right col-md-3">Teléfono:</label>
                                                    <div class="col-md-9">
                                                        <p class="form-control-static"> <?php echo $telefonox;?> </p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group row">
                                                    <label class="control-label text-right col-md-4">Contacto:</label>
                                                    <div class="col-md-8">
                                                        <p class="form-control-static "> <?php echo $contactox;?> </p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group row">
                                                    <label class="control-label text-right col-md-3">Email:</label>
                                                    <div class="col-md-9">
                                                        <p class="form-control-static"> <?php echo $emailx;?> </p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <h3 class="box-title ">Dirección <?php echo $nombrex;?></h3>
                                        <hr class="m-t-0 m-b-40">
                                        
                                        <!--/row-->
                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="form-group row">
                                                    <label class="control-label text-right col-md-5">Departamento:</label>
                                                    <div class="col-md-7">
                                                        <p class="form-control-static"> <?php echo $departamentox;?> </p>
                                                    </div>
                                                </div>
                                            </div>
                                            <!--/span-->
                                            <div class="col-md-4">
                                                <div class="form-group row">
                                                    <label class="control-label text-right col-md-3">Provincia:</label>
                                                    <div class="col-md-9">
                                                        <p class="form-control-static"> <?php echo $provinciax; ?> </p>
                                                    </div>
                                                </div>
                                            </div>
                                            <!--/span-->
                                            <div class="col-md-4">
                                                <div class="form-group row">
                                                    <label class="control-label text-right col-md-3">Distrito:</label>
                                                    <div class="col-md-9">
                                                        <p class="form-control-static"> <?php echo $distritox;?> </p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <!--/span-->
                                            <div class="col-md-6">
                                                <div class="form-group row">
                                                    <label class="control-label text-right col-md-3">Dirección:</label>
                                                    <div class="col-md-9">
                                                        <p class="form-control-static"> <?php echo $direccionx;?></p>
                                                    </div>
                                                </div>
                                            </div>
                                            <!--/span-->
                                        </div>
                                        
                                        
                                        
                                    </div>
                                    <div class="form-actions">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="row">
                                                    <div class="col-md-offset-3 col-md-9">
                                                        <button type="button"data-toggle="modal" data-target=".bd-example-modal-lg" class="btn btn-outline-success btn-md btn-rounded"> <i class="fas fa-edit"></i> Editar</button>
                                                        <button type="button" onclick="return cancelar_perfil();" class="btn btn-outline-danger btn-md btn-rounded"><i class="fas fa-chevron-circle-left"></i> Cencelar</button>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6"> </div>

                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Row -->
                <!-- Row -->

                <script>
                    function cancelar_perfil() {
                       window.location="<?php echo base_url().'Sistema/';?>"
                    }
                </script>



                <div class="modal fade bd-example-modal-lg"  role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" data-backdrop="static" data-keyboard="false">
                  <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel"><?php echo $nombrex; ?></h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <div class="modal-body">
                          <form class="needs-validation " novalidate id="update_date_users_empresa" action="" method="post">
                                    <input type="hidden" value="<?php echo $this->session->userdata("session_id");?>" name="id_usuario" id="id_usuario">
                                    <div class="form-row">
                                        <div class="col-md-3 mb-3">
                                            <label for="validationTooltip01">Ruc</label>
                                            <input type="text" class="form-control" name="ruc" readonly="" id="validationTooltip01" value="<?php echo $rucx;?>"  required>
                                            
                                        </div>
                                        <div class="col-md-4 mb-3">
                                            <label for="validationTooltip02">Razon Social</label>
                                            <input type="text" class="form-control" name="razon_social" readonly="" id="validationTooltip02"  value="<?php echo $nombrex; ?>" required>
                                            
                                        </div>
                                        
                                        <div class="col-md-5 mb-3">
                                            <label for="validationTooltip01">Nombre Comercial <?php if ($nombre_comercialx=="") {
                                                echo "<span class='label label-danger'>Falta agregar </span>";
                                            }else{
                                                echo "";
                                            } ?></label>
                                            <input type="text" class="form-control"  id="validationTooltip01" value="<?php echo $nombre_comercialx;?>" name="nombre_comercial"  required>

                                        </div>
                                        <div class="col-md-4 mb-3">
                                            <label for="validationTooltip01">Actividad Economica</label>
                                            <input type="text" class="form-control"  id="validationTooltip01" value="<?php echo $actividad_economicax;?>" name="actividad_economica" required >

                                        </div>
                                        <div class="col-md-5 mb-3">
                                            <label for="validationTooltip01">Direccion</label>
                                            <input type="text" class="form-control" readonly="" id="validationTooltip01" value="<?php echo $direccionx;?>" name="direccion"  required>
                                        </div>
                                        <div class="col-md-3 mb-3">
                                            <label for="validationTooltip03">Rubro</label>
                                            <select class="select2 form-control custom-select" id="id_rubro" name="id_rubro" style="width: 100%; height:36px;">
                                                <option value="">--Seleccione Rubro--</option>
                                                <?php $rubro = $this->db->query("select * from ts_rubro");
                                                 foreach ($rubro->result() as $rub) {?>
                                                <?php 
                                                    if ($id_rubro == $rub->Id) {?>
                                                        <option value="<?php echo $rub->Id;?>" selected ><?php echo $rub->nombre;?></option>
                                                    <?php  }else{?>
                                                         <option value="<?php echo $rub->Id;?>" ><?php echo $rub->nombre;?></option>
                                                    <?php }?>
                                           
                                                    
                                                <?php } ?>
                                                
                                            </select>
                                        </div>


                                    </div>
                          
                                    
                                    <div class="form-row">
                                        
                                        <div class="col-md-3 mb-3">
                                            <label for="validationTooltip03">Departamento</label>
                                            <select id="id_departamento" name="id_departamento" class="select2 form-control custom-select" style="width: 100%; height:36px;">
                                                <option value="0">--Seleccione Departamento--</option>
                                                <?php foreach ($departamento as $xx) {?>
                                                    <?php if ($id_departamento==$xx->Id) {
                                                        $select =  "selected";
                                                    }else{
                                                       $select =""; 
                                                    } ?>
                                        <option value="<?php echo $xx->Id;?>" <?php echo $select;?>><?php echo $xx->departamento;?></option>
                                                <?php } ?> 
                                            </select>
                                        </div>
                                        
                                        <div class="col-md-3 mb-3">
                                            <label for="validationTooltip03">Provincia</label>
                                            <select class="select2 form-control custom-select" id="id_provincia" name="id_provincia" style="width: 100%; height:36px;">
                                                <?php if ($id_provincia==0) {?>
                                                   
                                                <?php }else{?>
                                                <option value="<?php echo $id_provincia;?>"><?php echo $provinciax;?></option>
                                               <?php  } ?>
                                            </select>

                                        </div>
                                        <div class="col-md-3 mb-3">
                                            <label for="validationTooltip03">Distrito</label>
                                            <select class="select2 form-control custom-select" id="id_distrito" name="id_distrito" style="width: 100%; height:36px;">
                                                <?php if ($id_distrito==0) {?>
                                                   
                                                <?php }else{?>
                                                <option value="<?php echo $id_distrito;?>"><?php echo $distritox;?></option>
                                               <?php  } ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="col-md-4 mb-3">
                                            <label for="validationTooltip01">Representante Legal</label>
                                            <input type="text" class="form-control"  id="validationTooltip01" value="<?php echo $contactox;?>" name="contacto"  required >

                                        </div>
                                        <div class="col-md-4 mb-3">
                                            <label for="validationTooltip01">Telefono/Celular</label>
                                            <input type="text" class="form-control" name="telefono"  id="validationTooltip01" value="<?php echo $telefonox;?>"  required >

                                        </div>
                                        <div class="col-md-4 mb-3">
                                            <label for="validationTooltip01">Email</label>
                                            <input type="text" class="form-control"  id="validationTooltip01" value="<?php echo $emailx;?>" name="email" required >

                                        </div>
                                    </div>
                                  
                            
                                    <button class="btn btn-outline-success btn-rounded btn-md" type="submit"><i class=" fas fa-chevron-circle-right"></i>&nbsp;Actualizar</button>
                                </form>
                      </div>
                    </div>
                  </div>
                </div>

                <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script> 


                <script type="text/javascript">
                    $(document).ready(function() {

                      $('.view_detail').click(function(){
                          
                          var id = $(this).attr('relid'); //get the attribute value
                          
                          $.ajax({
                              url : "<?php echo base_url(); ?>Mantenimiento/Perfil/details_perfil/",
                              data:{id : id},
                              method:'GET',
                              dataType:'json',
                              success:function(response) {
                               /* $('#student_name').html(response.razon_social); 
                                $('#nombre_comercial').html(response.nombre_comercial);
                                $('#actividad_economica').html(response.actividad_economica); //hold the response in id and show on popup
                                $('#student_email').html(response.email);
                                $('#student_phone').html(response.phone);*/

                                $('#show_modal').modal({backdrop: 'static', keyboard: true, show: true});
                               // $('#show_modal').modal({backdrop: 'static', keyboard: true, show: true});
                            }
                          });
                      });
                    });
                </script>



                <div id="show_modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                  <div class="modal-dialog modal-lg">
                    <div class="modal-content "> 
                      <div class="modal-header">

                        <h4 class="text-success"><i class="fa fa-folder"></i> <?php echo $nombrex; ?>&nbsp;&nbsp;&nbsp;&nbsp;<a id='btnImprimirx' href="javascript:void(0)" class="btn btn-outline-success text-right  btn-rounded btn-md "> <i class="fas fa-print"></i>&nbsp;&nbsp;Imprimir</a></h4>
                         <a  href="javascript:void(0)" class="btn btn-outline-danger " data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true"><i class="fas fa-times-circle"></i></span>
                        </a>
                         
                    </div>

                      <div class="modal-body">
                        <!--<div class="row">
                            <div class="col-4">
                                <label for="">Razón Social</label><br>
                                <span id="student_name"></span>
                            </div>
                            <div class="col-4">
                                <label for="">Nombre Comercial</label><br>
                                <span id="nombre_comercial"></span>
                            </div>
                            <div class="col-4">
                                <label class="label label-success" for="">Actividad Economica</label><br>
                                <span id="actividad_economica"></span>
                            </div>
                        </div>-->
                        <iframe  id='frame' style="width: 100%; height: 500px;" src="<?php echo base_url().'Mantenimiento/Perfil/exportar_pdf/'.$urlx;?>" frameborder="0" allowtransparency="no" scrolling="yes" ></iframe>
                      </div>
                      
                    </div>
                  </div>
                </div>

            
                <script>
                  $(document).ready(function(){
                    //detectamos el click en el boton de imprimir
                    $('#btnImprimir').click(function(){
                      //Hacemos foco en el iframe
                      $('#frame').get(0).contentWindow.focus(); 
                      //Ejecutamos la impresion sobre ese control
                      $("#frame").get(0).contentWindow.print(); 
                    });
                  });

                  $(document).ready(function(){
                    //detectamos el click en el boton de imprimir
                    $('#btnImprimirx').click(function(){
                      //Hacemos foco en el iframe
                      $('#frame').get(0).contentWindow.focus(); 
                      //Ejecutamos la impresion sobre ese control
                      $("#frame").get(0).contentWindow.print(); 
                    });
                  });


                </script>

                
                

                <script>
                    //document.getElementById("myiframe").src = "http://www.google.com?"+(+new Date());
                    window.setTimeout(function()
                    {
                    document.getElementById('frame').contentWindow.location.reload();
                    }, 3000); // cada 3 segundos
                </script>

              <!--- actualizar los datos de la empresa-->

              <!--https://es.stackoverflow.com/questions/151779/actualizar-div-cada-x-segundos-->


                  <!--insertar datos de empresa-->
     <script>
                        
            $(document).ready(function() {
                $(document).on('submit', '#update_date_users_empresa', function(event){
                   event.preventDefault(); 

                  $.ajax({
                    url: '<?php echo base_url().'Mantenimiento/Empresas/update_empresas_por_usuario/';?>',
                    method:'POST',  
                    data:new FormData(this),  
                    contentType:false,  
                    processData:false,  
                    success:function(data) {
                        var json = JSON.parse(data);

                        Swal.fire({
                          title: 'Muy bien',
                          text: ""+json.mensaje+"",
                          icon: 'success',
                          allowOutsideClick: false,
                          showCancelButton: false,
                          showConfirmButton : true,
                          confirmButtonColor: '#3085d6',
                          cancelButtonColor: '#d33',
                          confirmButtonText: 'Ok'
                        }).then((result) => {
                          if (result.value) {
                            $('.bd-example-modal-lg').modal('hide'); 
                              $('.validate').load(location.href+" .validate>*",""); 
                          }
                        })
                     
                     
                                                 
                        
                    }
                 
                 
                }); 
            });                        
              
            });


        </script>