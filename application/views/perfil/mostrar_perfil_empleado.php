<!-- Row --><?php if (!empty($listar_empleado_perfil)) {
                        foreach ($listar_empleado_perfil as $emp) {
                            $nombrex = $emp->nombres." ".$emp->apellido_paterno ." ". $emp->apellido_materno;
                            $picturex = $emp->imagen;
                            $urlx = $emp->url;
                            $direccionx = $emp->direccion;
                            $emailx = $emp->email;
                            $telefonox = $emp->telefono_movil;
                            $departamentox = $emp->departamento;
                            $provinciax = $emp->provincia;
                            $distritox = $emp->distrito;
                            $idx = $emp->Id;
                            $perfilx = $emp->puesto;
                            $id_otrosx = $emp->id_otros;
                        }
                    }else{ 

                        redirect(base_url().'Intranet_view/');
                        
                    } ?>



                <div class="row">
                    <!-- Column -->
                    <div class="col-lg-4 col-xlg-3 col-md-5">
                        <div class="card">
                            <div class="card-body">
                                <center class="m-t-30"> <img src="<?php echo base_url().'upload/';?>images/<?php if($picturex=="" or $picturex==NULL){ echo "$id_otrosx";}else{echo "$picturex";} ?>" alt="<?php echo $nombrex; ?>" width="150"  class="img-circle"/>
                                    <h4 class="card-title m-t-10"><?php echo $nombrex;?></h4>
                                    <h6 class="card-subtitle"><?php echo $perfilx;?></h6>
                                    <div class="row text-center justify-content-md-center">
                                        <div class="col-4"><a href="javascript:void(0)" class="link"><i class="icon-people"></i> <font class="font-medium">0</font></a></div>
                                        <div class="col-4"><a href="javascript:void(0)" class="link"><i class="icon-picture"></i> <font class="font-medium">0</font></a></div>
                                    </div>
                                </center>
                            </div>
                            <div>
                                <hr> </div>
                            <div class="card-body"> <small class="text-muted">Correo Electrónico </small>
                                <h6><?php echo $emailx;?></h6> <small class="text-muted p-t-30 db">Telefóno/Celular</small>
                                <h6><?php echo $telefonox; ?></h6> <small class="text-muted p-t-30 db">Address</small>
                                <h6><?php echo $direccionx;?></h6>
                                <div class="map-box">
                                    <!--<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d470029.1604841957!2d72.29955005258641!3d23.019996818380896!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x395e848aba5bd449%3A0x4fcedd11614f6516!2sAhmedabad%2C+Gujarat!5e0!3m2!1sen!2sin!4v1493204785508" width="100%" height="150" frameborder="0" style="border:0" allowfullscreen></iframe>-->
                                </div> <small class="text-muted p-t-30 db">Social Profile</small>
                                <br/>
                                <button class="btn btn-circle btn-secondary"><i class="fab fa-facebook-f"></i></button>
                                <button class="btn btn-circle btn-secondary"><i class="fab fa-twitter"></i></button>
                                <button class="btn btn-circle btn-secondary"><i class="fab fa-youtube"></i></button>
                            </div>
                        </div>
                    </div>
                </div>