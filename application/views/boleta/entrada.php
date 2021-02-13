                
                <?php $query = $this->db->query("select count(*) as total from ts_email_enviado_users");
                foreach ($query->result() as $xx) {
                    $total_xxx = $xx->total;
                 } ?>
                <!--total de enviados-->
                 <?php $query = $this->db->query("select count(*) as total from ts_entrega_boleta");
                foreach ($query->result() as $xx) {
                    $total_xx = $xx->total;
                 } ?>


                <!-- ============================================================== -->
                <!-- End Bread crumb and right sidebar toggle -->
                <!-- ============================================================== -->
                <!-- ============================================================== -->
                <!-- Start Page Content -->
                <!-- ============================================================== -->
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="row">
                                <div class="col-lg-3 col-md-4">
                                    <div class="card-body inbox-panel"><a href="<?php echo base_url().'Mantenimiento/Enviar_Boleta_Pago/Agregar_Nuevo/';?>" class="btn btn-danger m-b-20 p-10 btn-block waves-effect waves-light">Nuevo Mensaje <i class=" fas fa-comment-dots"></i></a>
                                        <ul class="list-group list-group-full">
                                           <li class="list-group-item active "> <a href="<?php echo base_url().'Mantenimiento/Enviar_Boleta_Pago/entrada/';?>"><i class="mdi mdi-gmail"></i> Bandeja de entrada </a><span class="badge badge-success ml-auto"><?php if ($total_xxx=="" || $total_xxx==null) {
                                                   echo "0";
                                                 }else{
                                                    echo $total_xxx;
                                                }?></span></li>
                                           <!-- <li class="list-group-item">
                                                <a href="javascript:void(0)"> <i class="mdi mdi-star"></i> Mensajes destacados </a>
                                            </li>
                                            <li class="list-group-item">
                                                <a href="javascript:void(0)"> <i class="mdi mdi-send"></i> Redactada </a><span class="badge badge-danger ml-auto">3</span></li>-->
                                            <li class="list-group-item ">
                                                <a href="<?php echo base_url().'Mantenimiento/Enviar_Boleta_Pago/';?>"> <i class="mdi mdi-file-document-box "></i> Correo enviado </a><span class="badge badge-success ml-auto"><?php if ($total_xx=="" || $total_xx==null) {
                                                   echo "0";
                                                 }else{
                                                    echo $total_xx;
                                                }?></span>
                                            </li>
                                           <!-- <li class="list-group-item">
                                                <a href="javascript:void(0)"> <i class="mdi mdi-delete"></i> Basura </a>
                                            </li>-->
                                        </ul>
                                        <h3 class="card-title m-t-40">Etiquetas</h3>
                                       <div class="list-group b-0 mail-list"> 
                                            <a href="javascript:void(0)" class="list-group-item"><span class="fa fa-circle text-info m-r-10"></span>Trabajador</a> 
                                           <!-- <a href="javascript:void(0)" class="list-group-item"><span class="fa fa-circle text-warning m-r-10"></span>Familia</a> 
                                            <a href="javascript:void(0)" class="list-group-item"><span class="fa fa-circle text-purple m-r-10"></span>Privado</a> 
                                            <a href="javascript:void(0)" class="list-group-item"><span class="fa fa-circle text-danger m-r-10"></span>Amigos</a> 
                                            <a href="javascript:void(0)" class="list-group-item"><span class="fa fa-circle text-success m-r-10"></span>Corporación</a> -->
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-9 col-md-8 bg-light border-left">
                                    <div class="card-body">
                                        <div class="btn-group m-b-10 m-r-10" role="group" aria-label="Button group with nested dropdown">
                                            <button type="button" class="btn btn-secondary font-18"><i class="mdi mdi-inbox-arrow-down"></i></button>
                                            <button type="button" class="btn btn-secondary font-18"><i class="mdi mdi-alert-octagon"></i></button>
                                            <button type="button" class="btn btn-secondary font-18"><i class="mdi mdi-delete"></i></button>
                                        </div>
                                        <!--<div class="btn-group m-b-10 m-r-10" role="group" aria-label="Button group with nested dropdown">
                                            <div class="btn-group" role="group">
                                                <button id="btnGroupDrop1" type="button" class="btn btn-secondary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="mdi mdi-folder font-18 "></i> </button>
                                                <div class="dropdown-menu" aria-labelledby="btnGroupDrop1"> <a class="dropdown-item" href="javascript:void(0)">Dropdown link</a> <a class="dropdown-item" href="javascript:void(0)">Dropdown link</a> </div>
                                            </div>
                                            <div class="btn-group" role="group">
                                                <button id="btnGroupDrop1" type="button" class="btn btn-secondary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="mdi mdi-label font-18"></i> </button>
                                                <div class="dropdown-menu" aria-labelledby="btnGroupDrop1"> <a class="dropdown-item" href="javascript:void(0)">Dropdown link</a> <a class="dropdown-item" href="javascript:void(0)">Dropdown link</a> </div>
                                            </div>
                                        </div>-->
                                        <button type="button " class="btn btn-secondary m-r-10 m-b-10"><i class="mdi mdi-reload font-18"></i></button>
                                       <!-- <div class="btn-group" role="group">
                                            <button id="btnGroupDrop1" type="button" class="btn m-b-10 btn-secondary font-18 dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> More </button>
                                            <div class="dropdown-menu" aria-labelledby="btnGroupDrop1"> <a class="dropdown-item" href="javascript:void(0)">Mark as all read</a> <a class="dropdown-item" href="javascript:void(0)">Dropdown link</a> </div>
                                        </div>-->
                                    </div>
                                    <div class="card-body p-t-0">
                                        <div class="card b-all shadow-none">
                                            <div class="inbox-center table-responsive">
                                                <!--<table class="table table-hover no-wrap ">-->
                                                     <!--<table id="myTable" class="table table-bordered table-striped">-->
                                                        <!-- <table id="demo-foo-addrow" class="table table-bordered m-t-30 table-hover contact-list" data-paging="true" data-paging-size="7">-->
                                                    <table id="demo-foo-accordion" class="table  m-b-0 toggle-arrow-tiny" data-filtering="true" data-paging="true" data-sorting="true" data-paging-size="7">
                                                        <thead >
                                                            <th>#</th>
                                                            <th>Visto</th>
                                                            <th>Trabajador</th>
                                                            <th>Mensaje</th>
                                                            <th>Fecha enviado</th>
                                                        </thead>
                                                    <tbody>
                                                        <?php  foreach ($lista_boleta_entrada as $xx) {?>
                                                        <tr class="unread">
                                                            <td class="max-texts" >
                                                            <input type="hidden" value="<?php echo $xx->Id;?>" id="id_x">
                                                            <input type="hidden" value="<?php echo $xx->Id;?><?php echo $xx->nombre_usuario;?><?php echo $xx->email_users;?><?php echo $xx->id_usuario;?>" id="url_x">
                                                            <input type="hidden" value="<?php echo $xx->id_usuario;?>" id="id_usuario">
                                                            <input type="hidden" value="<?php echo $xx->email_users; ?>" id="email_users">
                                                            <input type="hidden" value="<?php echo $xx->nombre_usuario; ?>" id="nombre_usuario">
                                                            <button type="button" class="btn btn-success registrar_reponse" id="<?php echo $xx->id_usuario ;?>"><i class="fas fa-share" ></i></button>
                                                            <button type="button" class="btn btn-danger"><i class="fas fa-window-close"></i></button>  
                                                            </td>
                                                            <td class="hidden-xs-down"><?php if ($xx->view==0) {?>
                                                             
                                                            <?php }else{?>
                                                                <i class="fa fa-star text-danger"></i><br><small><?php echo $xx->fecha_recibido ?></small>
                                                           <?php  } ?></td>
                                                            <td class="hidden-xs-down"><?php echo $xx->nombre_usuario; ?></td>
                                                            <td class="max-texts"> <a href="javascript:void(0)" onclick="return mensaje_()" /><span class="label label-info m-r-10">Trabajador</span> <?php echo $xx->mensaje;?></td>
                                                         
                                                            <td class="text-left"> <?php echo $xx->fecha_enviado;?> </td>
                                                        </tr>
                                                        <?php } ?>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
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

                 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
                <script>
                    function mensaje_() {
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
                          icon: 'info',
                          title: 'Estamos trabajando en ello'
                        })
                    }

                  /*  $(document).ready(function() {
                        $(document).on('click', '.registrar_reponse', function(event) {
                            event.preventDefault();
                            
                            var user_id = $(this).attr("id"); 
                            var id = $("#id_x").val();
                            var url_x = $("#url_x").val();
                            var id_usuario = $("#id_usuario").val();
                            var email_users = $("#email_users").val();
                            var nombre_usuario = $("#nombre_usuario").val();

                            $.ajax({
                                url: '<?php echo base_url().'Mantenimiento/Pedidos/recargar_pagina_response/'?>',
                                type: 'POST',
                                data: {user_id:user_id,id:id,url_x:url_x,id_usuario:id_usuario,email_users:email_users,nombre_usuario,nombre_usuario},
                            })
                            .done(function(data) {
                              
                                console.log("success");
                               window.location = "<?php echo base_url().'Mantenimiento/Pedidos/mostrar_por_reposnse/'?>"+user_id+'/?<?php echo sha1("innomedic_ionternacional_ei_elr"); ?>'; 
                            })
                            .fail(function() {
                                console.log("error");
                            })
                            .always(function() {
                                console.log("complete");
                            });
                        });
                    });*/

                    //reescribimos nuestro codigo pero a base de mofificaciones
                    //
                    $(document).ready(function() {
                        $(document).on('click', '.registrar_reponse', function(event) {
                            event.preventDefault();
                            /* Act on the event */
                            var user_id = $(this).attr("id"); 
                            window.location = "<?php echo base_url().'Mantenimiento/Pedidos/mostrar_por_reposnse/'?>"+user_id+'/?<?php echo sha1("innomedic_ionternacional_ei_elr"); ?>'; 
                        });
                    });




                  
                        
                        
             
                </script>



              