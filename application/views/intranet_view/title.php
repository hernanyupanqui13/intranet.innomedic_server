                <!-- ============================================================== -->
                <!-- Bread crumb and right sidebar toggle -->
                <!-- ============================================================== -->
                <?php $date = $this->db->query("select * from ts_usuario where Id='".$this->session->userdata("session_id")."'");
                foreach ($date->result() as $xx) {
                    //$nombres_completosxx = $xx->nombre ." ". $xx->apellido_paterno." ".$xx->apellido_materno;
                     $nombres_completosxx = $xx->nombre;
                 } ?>
                    <?php
                    ini_set('date.timezone', 'America/Lima');
                        $today = getdate();
                        $hora=$today["hours"];
                        if ($hora<6) {
                        $data_mensaje = (" Hoy has madrugado mucho... ");
                        }elseif($hora<12){
                         $data_mensaje = (" ¡Buenos días, ");
                        }elseif($hora<=18){
                         $data_mensaje = ("¡Buenas Tardes, ");
                        }else{  $data_mensaje = ("Buenas Noches, "); }
                    ?>
                     <?php $bar = $nombres_completosxx;
                            $bar = ucfirst($bar);             // HELLO WORLD!
                            $bar = ucfirst(strtolower($bar)); // Hello world! 

                            if ($bar=="Rrhh") {
                                $bars ="RRHH";
                            }else{
                                $bars =  ucfirst(strtolower($bar));
                            }

                        ?>
    
                <div class="row page-titles row animated pulse">
                    <div class="col-md-7 align-self-center">
                        <h4 class="text-themecolor text-dark"><?php echo $data_mensaje ;?><?php echo $bars; ?>!</h4>
                    </div>
                    <div class="col-md-5 align-self-center text-right">
                        <div class="d-flex justify-content-end align-items-center">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="<?php echo base_url().'Intranet_view/';?>">Inicio</a></li>
                                <li class="breadcrumb-item active"><?php echo $title[1];?></li>
                            </ol>
                            <?php if ($title[2]=="") {
                               echo "";
                            }else{ ?>
                             <?php echo $title[2];?>
                           <?php  } ?>
                            
                        </div>
                    </div>
                </div>
                
                <!-- ============================================================== -->
                <!-- End Bread crumb and right sidebar toggle -->
                <!-- ============================================================== -->
                <!-- ============================================================== -->
                <!-- Info box -->
                <!-- ============================================================== -->
                <!-- Row -->


                <div class="row">
                    <div class="col-12">
                        <div id="idle-timeout-dialog" data-backdrop="static" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h4 class="modal-title">Your session is expiring soon</h4>
                                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                    </div>
                                    <div class="modal-body">
                                        <p>
                                            <i class="fa fa-warning font-red"></i> You session will be locked in
                                            <span id="idle-timeout-counter"></span> seconds.</p>
                                        <p> Do you want to continue your session? </p>
                                    </div>
                                    <div class="modal-footer text-center">
                                        <button id="idle-timeout-dialog-keepalive" type="button" class="btn btn-success" data-dismiss="modal">Yes, Keep Working</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>