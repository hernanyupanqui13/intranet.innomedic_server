			<?php foreach ($nombre_empresa as $xx) {
           	$empresa_name = $xx->txtempresa;
           	$nombres = $xx->nombre ." ". $xx->apellido_paterno ." ".$xx->apellido_materno;
           } ?>
			<div class="row page-titles animated bounce">
			    <div class="col-md-12 align-self-center">
			        <h4 class="text-themecolor"><?php if ($this->session->userdata('session_perfil')==1) {?>
                    <span class="label label-danger"><?php echo $titulo[2]; ?></span>&nbsp;
                       <span class="label label-info"><?php echo $nombres;?></span>
                    <?php } ?>&nbsp;<span class="label label-danger">Empresa</span> &nbsp;<span class="label label-success"><?php echo $empresa_name;?></span></h4>
			    </div>
			</div>

			<?php foreach ($miperfil as $xs) {
				$users = $xs->usuario;
				$picturex = $xs->picture;
				$nombrex = $xs->nombre;
				$apellido_paternox = $xs->apellido_paterno;
				$apellido_maternox = $xs->apellido_materno;
				$emailx =$xs->email;
				$celularx=$xs->celular;
				$direccionx = $xs->direccion;
				$url_ubicacionx = $xs->url_ubicacion;
                $paisx = $xs->pais;
                $razon_socialx = $xs->razon_social;
                $rucx = $xs->ruc;
                $webx = $xs->web;
                $imagen_empresax = $xs->imagenempresa;
				//Redes Sociales
				$facebookx = $xs->facebook;
				$twitterx = $xs->twitter;
				$youtubex = $xs->youtube;
			} ?>

			<!-- Row -->
                <div class="row">
                    <!-- Column -->
                    <div class="col-lg-4 col-xlg-3 col-md-5">
                        <div class="card">
                            <?php if ($this->session->userdata('session_perfil')==1) {?>
                               <div class="card-body">
                                <center class="m-t-30">
                                <?php if ($this->session->userdata('session_perfil')==1) {?>
                                   <img src="<?php echo index_php(base_url()).'assetsfrom/';?>/images/users/<?php echo $picturex; ?>" class="img-circle" width="150" />
                               <?php }else{?>
                                    <img src="<?php echo index_php(base_url()).'assets/';?>img/<?php if($imagen_empresax==""){echo "otros.jpg";}else{ echo $imagen_empresax;} ?>" class="img-circle" width="120"  />
                              <?php } ?>
                                    <h4 class="card-title m-t-10"><?php echo $nombrex; ?></h4>
                                    <h6 class="card-subtitle"><?php echo $apellido_paternox;?>&nbsp;<?php echo $apellido_maternox;?></h6>
                                    <div class="row text-center justify-content-md-center">
                                        <div class="col-4"><a href="javascript:void(0)" class="link"><i class="icon-people"></i> <font class="font-medium">254</font></a></div>
                                        <div class="col-4"><a href="javascript:void(0)" class="link"><i class="icon-picture"></i> <font class="font-medium">54</font></a></div>
                                    </div>
                                </center>
                            </div>
                            <?php }else{?>
                               <div class="card-body">
                                <center class="m-t-30"> 
                                <?php if ($this->session->userdata('session_perfil')==1) {?>
                                   <img src="<?php echo index_php(base_url()).'assetsfrom/';?>/images/users/<?php if($picturex==""){echo "otros.jpg";}else{ echo $picturex;} ?>" class="img-circle" width="150" />
                               <?php }else{?>
                                    <img src="<?php echo index_php(base_url()).'assets/';?>img/<?php if($imagen_empresax==""){echo "otros.jpg";}else{ echo $imagen_empresax;} ?>" class="img-circle" width="120"  />
                              <?php } ?>
                                    <h4 class="card-title m-t-10"><?php echo $empresa_name; ?></h4>
                                    <h6 class="card-subtitle"><?php echo $razon_socialx;?></h6>
                                    <div class="row text-center justify-content-md-center">
                                        <div class="col-4"><a href="javascript:void(0)" class="link"><i class="icon-people"></i> <font class="font-medium">254</font></a></div>
                                        <div class="col-4"><a href="javascript:void(0)" class="link"><i class="icon-picture"></i> <font class="font-medium">54</font></a></div>
                                    </div>
                                </center>
                            </div>
                           <?php }?>

                        
                            <div>
                                <hr> </div>
                            <div class="card-body"> <small class="text-muted">Email address </small>
                                <h6><?php echo $emailx; ?></h6> <small class="text-muted p-t-30 db">Phone</small>
                                <h6><?php echo $celularx; ?></h6> <small class="text-muted p-t-30 db">Address</small>
                                <h6><?php echo $direccionx; ?></h6>
                                <div class="map-box">
                                    <iframe src="<?php if($url_ubicacionx==""){echo "https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d470029.1604841957!2d72.29955005258641!3d23.019996818380896!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x395e848aba5bd449%3A0x4fcedd11614f6516!2sAhmedabad%2C+Gujarat!5e0!3m2!1sen!2sin!4v1493204785508";}else{echo $url_ubicacionx;}?>" width="100%" height="150" frameborder="0" style="border:0" allowfullscreen></iframe>
                                </div> <small class="text-muted p-t-30 db">Social Profile</small>
                                <br/>
                                <button class="btn btn-circle btn-secondary"><a  href="<?php if($facebookx==""){echo "javascrip:void(0)";}else{ echo $facebookx;}?>"><i class="fa fa-facebook"></i></a></button>
                                <button class="btn btn-circle btn-secondary"><a  href="<?php if($twitterx==""){echo "javascrip:void(0)";}else{ echo $twitterx;}?>"><i class="fa fa-twitter"></i></a></button>
                                <button class="btn btn-circle btn-secondary"><a  href="<?php if($youtubex==""){echo "javascrip:void(0)";}else{ echo $youtubex;}?>"><i class="fa fa-youtube"></i></a></button>
                            </div>
                        </div>
                    </div>
                    <!-- Column -->
                    <!-- Column -->
                    <div class="col-lg-8 col-xlg-9 col-md-7">
                        <div class="card">
                            <!-- Nav tabs -->
                            <ul class="nav nav-tabs profile-tab" role="tablist">
                                <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#profile" role="tab">Perfil</a> </li>
                                <?php if ($this->session->userdata('session_perfil')==1) {?>
                                    <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#settings" role="tab">Configuración Usuario</a> </li>
                               <?php } ?>
                                <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#empresa" role="tab"><?php if ($this->session->userdata('session_perfil')==1) {
                                    echo "Configuración Empresa";
                                }else{
                                    echo "Configuración";
                                } ?></a> </li>
                            </ul>
                            <!-- Tab panes gracias 6 -->
                            <div class="tab-content">
                                <!--second tab-->
                                <div class="tab-pane active" id="profile" role="tabpanel">
                                    <div class="card-body">
                                        <?php if ($this->session->userdata('session_perfil')==1) {?>
                                        <div class="row">
                                            <div class="col-md-3 col-xs-6 b-r"> <strong>Nombres Completos</strong>
                                                <br>
                                                <p class="text-muted"><?php echo $nombres; ?></p>
                                            </div>
                                            <div class="col-md-3 col-xs-6 b-r"> <strong>Celular</strong>
                                                <br>
                                                <p class="text-muted"><?php echo $celularx; ?></p>
                                            </div>
                                            <div class="col-md-3 col-xs-6 b-r"> <strong>Email</strong>
                                                <br>
                                                <p class="text-muted"><?php echo $emailx; ?></p>
                                            </div>
                                            <div class="col-md-3 col-xs-6"> <strong>Ubicación</strong>
                                                <br>
                                                <!--observacion cambiar datos del pais-->
                                                <p class="text-muted"><?php echo $paisx;?></p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-3 col-xs-6 b-r"> <strong>Empresa</strong>
                                                <br>
                                                <p class="text-muted"><?php echo $empresa_name; ?></p>
                                            </div>
                                            <div class="col-md-3 col-xs-6 b-r"> <strong>Razón Social</strong>
                                                <br>
                                                <p class="text-muted"><?php echo $razon_socialx; ?></p>
                                            </div>
                                            <div class="col-md-3 col-xs-6 b-r"> <strong>Ruc</strong>
                                                <br>
                                                <p class="text-muted"><?php echo $rucx; ?></p>
                                            </div>
                                            <div class="col-md-3 col-xs-6"> <strong>Ubicación</strong>
                                                <br>
                                                <!--observacion cambiar datos del pais-->
                                                <p class="text-muted"><?php echo "Perú";?></p>
                                            </div>
                                        </div>
                                        <?php }else{?>
                                        <div class="row">
                                            <div class="col-md-3 col-xs-6 b-r"> <strong>Empresa</strong>
                                                <br>
                                                <p class="text-muted"><?php echo $empresa_name; ?></p>
                                            </div>
                                            <div class="col-md-3 col-xs-6 b-r"> <strong>Razón Social</strong>
                                                <br>
                                                <p class="text-muted"><?php echo $razon_socialx; ?></p>
                                            </div>
                                            <div class="col-md-3 col-xs-6 b-r"> <strong>Ruc</strong>
                                                <br>
                                                <p class="text-muted"><?php echo $rucx; ?></p>
                                            </div>
                                            <div class="col-md-3 col-xs-6"> <strong>Ubicación</strong>
                                                <br>
                                                <!--observacion cambiar datos del pais-->
                                                <p class="text-muted"><?php echo "Perú";?></p>
                                            </div>
                                        </div>
                                        <?php } ?>
                                        
                                        <hr>
                                        
                                        <div class="row ">
                                            <?php foreach ($publicidad as $publi ) {?>  
                                            <div class="col-md-12 >
                                            <?php if($publi->web==""){?>
                                               <a  href="javascript:void(0)">
                                             <?php }else{?>
                                                 <a target="_blank" href="$publi->web">
                                           <?php } ?><img src="<?php echo index_php(base_url()).'assets/';?>img/publicidad/<?php if($publi->imagen==""){echo "publicidad.png";}else{echo $publi->imagen;}?>" alt=""></a>
                                            </div>
                                            <?php } ?>
                                        </div>
                                          
                                        
                                       
                                    </div>
                                </div>
                                <?php if ($this->session->userdata('session_perfil')==1) {?>
                                <div class="tab-pane" id="settings" role="tabpanel">
                                    <div class="card-body">
                                        <form class="form-horizontal form-material">
                                            <div class="form-group">
                                                <label class="col-md-12">Full Name</label>
                                                <div class="col-md-12">
                                                    <input type="text" placeholder="Johnathan Doe" class="form-control form-control-line">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="example-email" class="col-md-12">Email</label>
                                                <div class="col-md-12">
                                                    <input type="email" placeholder="johnathan@admin.com" class="form-control form-control-line" name="example-email" id="example-email">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-md-12">Password</label>
                                                <div class="col-md-12">
                                                    <input type="password" value="password" class="form-control form-control-line">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-md-12">Phone No</label>
                                                <div class="col-md-12">
                                                    <input type="text" placeholder="123 456 7890" class="form-control form-control-line">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-md-12">Message</label>
                                                <div class="col-md-12">
                                                    <textarea rows="5" class="form-control form-control-line"></textarea>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-sm-12">Select Country</label>
                                                <div class="col-sm-12">
                                                    <select class="form-control form-control-line">
                                                        <option>London</option>
                                                        <option>India</option>
                                                        <option>Usa</option>
                                                        <option>Canada</option>
                                                        <option>Thailand</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="col-sm-12">
                                                    <button class="btn btn-success">Update Profile</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                               <?php } ?>
                                <div class="tab-pane" id="empresa" role="tabpanel">
                                    <div class="card-body">
                                        <form class="form-horizontal form-material" id="update_empresa" action="" method="post" accept-charset="utf-8">
                                            <input type="hidden" value="<?php echo $this->session->userdata('session_id')?>" name="id_empresa">
                                            <div class="form-group">
                                                <label class="col-md-12">Empresa</label>
                                                <div class="col-md-12">
                                                    <input type="text" name="empresa" placeholder="Metjet S.A.C" value="<?php echo $empresa_name;?>" class="form-control form-control-line" id="empresa">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="example-email" class="col-md-12">Razon Social</label>
                                                <div class="col-md-12">
                                                    <input type="email" placeholder="" value="<?php echo $razon_socialx;?>" class="form-control form-control-line" name="razon_social" id="example-email">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-md-12">Ruc</label>
                                                <div class="col-md-12">
                                                    <input type="number" value="<?php echo $rucx;?>" name="ruc" class="form-control form-control-line">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-md-12">Web</label>
                                                <div class="col-md-12">
                                                    <input type="text" value="<?php echo $webx;?>" placeholder=" http://www.metjetconsulting.com/" name="web" class="form-control form-control-line">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-md-12">Ubicacion Google</label>
                                                <div class="col-md-12" >
                                                    <input value="<?php echo $url_ubicacionx;?>" name="url_ubicacion" class="form-control form-control-line"></input>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-sm-12">Pais</label>
                                                <div class="col-sm-12">
                                                    <select class="form-control form-control-line" name="pais">
                                                        <option value="">--Seleccionar--</option>
                                                        <?php if ($paisx=="") {
                                                           $activo ="";
                                                        }else if($paisx == NULL){
                                                            $activo ="";
                                                        }else{
                                                            $activo ="selected";
                                                        } ?>
                                                        <option value="Perú" <?php echo $activo;?>>Perú</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="col-sm-12">
                                                    <button type="submit" class="btn btn-success">Actualizar Empresa</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Column -->
                </div>
                <!-- Row -->

                <script>  
                  $(document).on('submit', '#update_empresa', function(event){  
                       event.preventDefault();  
                       var empresa = $('#empresa').val();  

                      
                        if (empresa =='') {
                            alert("debe Ingresar Archivo");
                            return false;
                        } 
                       if(empresa !="" )  
                       { 
                                
                     
                            $.ajax({  
                                 url:"<?php echo base_url().'Mantenimiento/Usuario/actualizar_empresa_id_empresa/'?>",  
                                 method:'POST',  
                                 data:new FormData(this),  
                                 contentType:false,  
                                 processData:false,  
                                 success:function(data)  
                                 {  
                                    var json = JSON.parse(data);

                                    if (true) {
                                            Swal.fire({
                                              title: 'Muy Bien?',
                                              text: ''+ json.mensaje+'',
                                              type: 'success',
                                              showCancelButton: false,
                                              confirmButtonColor: '#3085d6',
                                              cancelButtonColor: '#d33',
                                              confirmButtonText: 'OK'
                                            }).then((result) => {
                                              if (result.value) {

                                                

                                              }
                                            })

                                           $("#empresa").tab('hide');//ocultamos el modal
                                             //clear on focus
                                          //  $('#input-file-now-custom-1').val("");
                                            //lo maximo estaba buscandp
                                            //$("#div_contenido").load(location.href+" #div_contenido>*","");                           
                                             
                                    }
                                        
                                        
                                 },
                                 error: function()
                                 {
                                    Swal.fire(
                                          'Algo Pasó!',
                                          'Ponte en Contacto con el Administrador',
                                          'warning'
                                        )
                                }
    

                            });  
                        }
                       
             
                  });  







             </script> 