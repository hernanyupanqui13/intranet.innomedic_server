


                
                <div class="card">
                    <div class="card-body">
                        <form action="#" method="POST" id="buscar_registro_por_orden_fecha">
                       <div class="row">
                        
                            <div class='col-md-2 text-left'>
                                   <div class="form-group">
                                       <label class="control-label"><b>Numero de comprobante:</b></label>
                                       <input type="text" class="form-control" placeholder="00001" value="<?php echo $num;?>" name="numcomprobante" id="numcomprobante" >
                                   </div>
                            </div>
                           
                            <div class='col-md-8'>
                                <label><b>Desde / Hasta:</b></label>
                               
                                <div class="input-daterange input-group" id="date-range">
                                    <input type="text" class="form-control" name="desde" id='desde' value="<?php echo $desdex;?>" />
                                    <div class="input-group-append">
                                        <span class="input-group-text bg-info b-0 text-white">a</span>
                                    </div>
                                    <input type="text" class="form-control" name="hasta" id='hasta' value="<?php echo $hastax;?>"/>
                                </div>
                            </div>

                            <div class='col-md-2'>
                              <div class="form-group p-2">
                                      <br>
                                       <button type="submit" class="btn btn-success waves-effect waves-light">
                                           <i class="fa fa-search m-r-5"></i><span> Buscar </span>
                                       </button>
                               </div>
                            </div>

                            <div class='col-md-5'>
                               &nbsp;
                            </div>
                            <div class='col-md-3'>
                               <b>Desde:</b> <?php echo $desde;?>

                            </div>
                            <div class='col-md-3'>
                               <b>Hasta:</b> <?php echo $hasta;?>
                            </div>
                            <hr>
                            <div class='col-md-12 text-right'>
                                <h4><b id="total"></b > </h4>
                            </div>
                        
                       </div>
                       </form>
                        
                
                         <a href="<?php echo base_url().'Inventario/Pedidos/Nuevo/';?>" class="btn btn-info btn-rounded m-t-10 float-right d-lg-none"><i class='fa fa-plus-circle'></i>&nbsp;Nuevo Pedido</a>
                        <div class="table-responsive">
                           <!-- <table id="demo-foo-row-toggler" class="table table-bordered" data-toggle-column="first">-->
                            <table id="demo-foo-accordion" class="table table-bordered m-b-0 toggle-arrow-tiny" data-filtering="true" data-paging="true" data-sorting="true" data-toggle-column="first" data-paging-size="7">
                                <thead>
                                    <tr class="footable-filtering"  data-expanded="false">
                                        <th data-breakpoints="xs">ID</th>
                                        <th data-breakpoints="xs sm">Fecha</th>
                                        <th data-breakpoints="xs">Numero de comprobante</th>
		                                <th data-breakpoints="xs sm ">Tipo de comprobante</th>
                                        <th data-breakpoints="xs">Trabajador</th>
                                        <th data-breakpoints="xs sm ">Estado</th>
                                        <th data-title="Opciones">Opciones</th>
                                    </tr>
                                </thead>
                                <tbody> 
                                   <?php $cont =0; foreach ($lista_ventas as $x) { $cont +=1;?>
                                    <tr>
                                             <td><?php echo $cont;?></td>
                                    <td><?php echo $x->fecha;?></td>
                                    <td>
                                    <a class="" href="<?php echo base_url().'Inventario/Pedidos/detalles_pedido/'.$x->url_view;?>/?fecha_entregado=<?php echo $x->fecha;?>?cliente=<?php echo md5("Evaristo Escudero Huillcamascco");?>?comprobante=<?php echo correlativo($x->numcomprobante);  ?>" data-toggle="tooltip" title="Ver detalle">
                                        <?php echo $x->seriecomprobante." ".correlativo($x->numcomprobante);?>
                                    </a>
                                    </td>
                                    <td>
                                    <?php 
                                   // $queryx = $this->db->query("select * from ta_correlativo where Id='2' and  numero='".$x->tipocomprobante."'");
                                    $queryx = $this->db->query("select * from ta_correlativo where Id='2'");
                                    foreach ($queryx->result() as $xx)
                                    {
                                        echo $xx->nombre;
                                    }
                                    ?>
                                    </td>
                                    <td>
                                    <?php 
                                        $queryp = $this->db->query("select * from ts_datos_personales where Id='".$x->usuario."'");
                                        foreach ($queryp->result() as $xp)
                                        {
                                            echo $xp->nombres.' '.$xp->apellido_paterno.' '.$xp->apellido_materno;
                                           
                                        }
                                    ?>
                                    </td>
                                    <td>
                                    <?php 
                                        if($x->estado==2){
                                            echo "<span class='label label-success'>Entregado</span>";
                                        }else if($x->estado==0){
                                            echo "<span class='label label-info'>Pedidos a entregar</span>";
                                        }else if($x->estado==3){
                                           echo "<span class='label label-danger'>Anulado</span>";
                                        }
                                    ?>
                                    </td>
                                    <td>
                                      <?php
                                      if ($x->estado==0) {?>
                                         <a class="btn-outline-danger btn " href="javascript:void(0)" onclick="return pregunta_eliminar_temporal(<?php echo $x->Id;?>);"><i class="far fa-times-circle"></i></a>
                                         <a class="btn-outline-secondary btn " Id="<?php echo $x->url_view; ?>" href="<?php echo base_url().'Inventario/Pedidos/editar_pedidos/'.$x->Id;?>"><i class="fas fa-edit"></i></a>
                                       <?php } else if ($x->estado==3) {?>
                                        <a class="btn-outline-success btn btn_imprimir_data" Id="<?php echo $x->url_view; ?>" href="javascript:void(0)"><i class="fas fa-print"></i></a>
                                      <?php }else if($x->estado==2){ ?>
                                        <a class="btn-outline-success btn btn_imprimir_data" Id="<?php echo $x->url_view; ?>" href="javascript:void(0)"><i class="fas fa-print"></i></a>
                                        <a class="btn-outline-danger btn " href="javascript:void(0)" onclick="return pregunta(<?php echo $x->Id;?>);"><i class="far fa-times-circle"></i></a>
                                        
                                      <?php }else {?>
                                        
                                         <a class="btn-outline-danger btn " href="javascript:void(0)" onclick="return pregunta(<?php echo $x->Id;?>);"><i class="far fa-times-circle"></i></a>
                                          <a class="btn-outline-success btn btn_imprimir_data" Id="<?php echo $x->url_view; ?>" href="javascript:void(0)"><i class="fas fa-print"></i></a>
                                        <a class="btn-outline-secondary btn " Id="<?php echo $x->url_view; ?>" href="<?php echo base_url().'Inventario/Pedidos/editar_pedidos/'.$x->Id;?>"><i class="fas fa-edit"></i></a>
                                      <?php } ?>
                                    </td>
                                     

                                    
                                </tr>
                                   <?php } ?>

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
                <script>
                  function pregunta(e){

                    Swal.fire({
                      title: 'Esta seguro de anular?',
                      text: "Al aceptar se modificara el stock del producto",
                      icon: 'warning',
                      showCancelButton: true,
                      confirmButtonColor: '#3085d6',
                      cancelButtonColor: '#d33',
                      confirmButtonText: 'Anular',
                      cancelButtonText: "Cancelar", 
                    }).then((result) => {
                      if (result.value) {
                         window.location = "<?php echo base_url().'Inventario/Pedidos/eliminar/'?>"+e;
                      }
                      return false;
                    })

                    
                }

                function pregunta_eliminar_temporal(e) {

                  Swal.fire({
                      title: 'Esta seguro de anular?',
                      text: "Al aceptar se eliminara por completo el pedido",
                      icon: 'warning',
                      showCancelButton: true,
                      confirmButtonColor: '#3085d6',
                      cancelButtonColor: '#d33',
                      confirmButtonText: 'Anular',
                      cancelButtonText: "Cancelar", 
                    }).then((result) => {
                      if (result.value) {
                         window.location = "<?php echo base_url().'Inventario/Pedidos/eliminar_temporal_delete/'?>"+e;
                      }
                      return false;
                    })
                    
                }
                </script>

                   
                    <script>
                       $(document).on("click",".btn_imprimir_data",function(){

                            valor_id =  $(this).attr("Id"); 
                            window.open("<?php echo base_url().'Inventario/Pedidos/comprobantefactura/'?>"+valor_id,'targetWindow','toolbar=no,location=no,status=no,menubar=no,scrollbars=yes,resizable=yes,width=900,height=750');

                         
                        });
                       $(document).ready(function() {
                           $(document).on('submit', '#buscar_registro_por_orden_fecha', function(event) {

                           event.preventDefault();


                           /* Act on the event */
                           $.ajax({
                               url: '<?php echo base_url().'Inventario/Pedidos/buscar/';?>',
                               type: 'POST',
                               data: $("form").serialize()
                           })
                           .done(function(data) {
                              // console.log(json.retorno);
                               var json = JSON.parse(data);
                                //console.log(json.url);
                                window.location.replace(json.retorno);
                               
                                 
                           })
                           .fail(function() {
                               console.log("error");
                           })
                           .always(function() {
                               console.log("complete");
                           });
                           
                       });
                       });

                       demo = $('#demo-foo-accordion tbody tr:not(.footable-filtered)').length

                       setTimeout(function() {
                        $("#total").html(`<div class="alert alert-success alert-dismissible fade show" role="alert">
                              <strong>Total: </strong> <strong>`+demo+`</strong> Pedidos entregados a la fecha <strong><?php echo date('d-m-Y');?></strong>
                              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                              </button>
                            </div>`);

                       }, 1000);






                    </script>


    