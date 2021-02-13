                
                  <div class="modal fade view_cita" id="exampleModal" data-backdrop="static" data-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                  <div class="modal-dialog" role="document">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel" >Mensaje de : <span class="label label-success" id="nombrex">  </span></h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <div class="modal-body">
                        <form>
                          <div class="form-group">
                            <label for="recipient-name" class="col-form-label">Email:</label>
                             <h3 class="box-title m-b-0" id="emailx"></h3> 
                          </div>
                          <div class="form-group">
                            <label for="message-text" class="col-form-label">Mensaje:</label>
                              <p class="text-themecolor text-justify" id="messagex"></p>
                          </div>
                        </form>
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-outline-success" data-dismiss="modal">Cerrar</button>
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
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Data Export</h4>
                                <h6 class="card-subtitle">Export data to Copy, CSV, Excel, PDF & Print</h6>
                                <div class="table-responsive m-t-40">
                                    <table id="example23" class="display nowrap table table-hover table-striped table-bordered" cellspacing="0" width="100%">
                                        <thead>
                                            <tr>
                                                <th>Nombre</th>
                                                <th>Email</th>
                                                <th>Phone</th>
                                                <th>Fecha</th>
                                                <th>Empresa</th>
                                                <th>Mensaje</th>
                                                <th>Opciones</th>
                                                
                                            </tr>
                                        </thead>
                                        <tfoot>
                                            <tr>
                                                <th>Nombre</th>
                                                <th>Email</th>
                                                <th>Phone</th>
                                                <th>Fecha</th>
                                                <th>Empresa</th>
                                                <th>Mensaje</th>
                                                <th>Opciones</th>
                                                
                                            </tr>
                                        </tfoot>
                                        <tbody>
                                            <?php foreach ($cargar_cita_online as $cita) { ?>
                                                 <tr>
                                                    <td><?php echo $cita->name;?></td>
                                                    <td><?php echo $cita->email;?></td>
                                                    <td><?php echo $cita->phone;?></td>
                                                    <td><?php echo $cita->date;?></td>
                                                    <td><?php echo $cita->employe;?></td>
                                                    <td><a  href="javascrip:void(0)" class="updateview" Id="<?php echo $cita->Id;?>">View Message</a>
                                                        <!--<span class=" label label-danger"> <i class="fas fa-eye"></i></span>-->
                                                    </td>
                                                    <td>  
                                                        <a href="#" class="btn waves-effect waves-light btn-outline-success"><i class=" far fa-edit"></i></a>
                                                        <a href="#" class="btn waves-effect waves-light btn-outline-warning"><i class=" far fa-eye-slash"></i></a>
                                                        <a href="#" class="btn waves-effect waves-light btn-outline-danger"><i class="far fa-times-circle"></i></a>
                                                    </td>
                                                </tr>
                                            <?php  } ?>
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

                <!--mostrar datos por modal-->

              

              

                <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

                <script type="text/javascript" language="javascript" >
                   
                    $(document).ready(function(){  
                        $(document).on('click', '.updateview', function(){  
                           var user_id = $(this).attr("id");  
                           $.ajax({  
                               url:"<?php echo base_url().'Cotizacion/fetch_single_user/';?>",
                                method:"POST",  
                                data:{user_id:user_id},  
                                dataType:"json",  
                                success:function(data)  
                                {  
                                     $('.view_cita').modal('show');  
                                     $('#nombrex').html(data.name);  
                                     $('#messagex').html(data.message); 
                                     $('#emailx').html('<a href="'+data.email+'" title="">'+data.email+'</a>'); 
                                     
                                }  
                           })  
                      });
                    });
                    
                </script>
    

