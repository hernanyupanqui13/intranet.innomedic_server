


                
                <div class="card">
                    <div class="card-body">
                        <form action="#" method="POST" id="buscar_registro_por_orden_fecha">
                       <div class="row">
                        
                            <div class='col-md-2 text-left'>
                                   <div class="form-group">
                                       <label class="control-label"><b>Numero de comprobante:</b></label>
                                       <input type="text"  class="form-control" placeholder="00001" value="<?php echo $num;?>" name="numcomprobante" id="numcomprobante">
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
                        
                
                         <a href="<?php echo base_url().'Inventario/Compras/Nuevo/';?>" class="btn btn-info btn-rounded m-t-10 float-right d-lg-none"><i class='fa fa-plus-circle'></i>&nbsp;Nueva Compra</a>
                        <div class="table-responsive">
                           <!-- <table id="demo-foo-row-toggler" class="table table-bordered" data-toggle-column="first">-->
                            <table id="demo-foo-accordion" class="table table-bordered m-b-0 toggle-arrow-tiny" data-filtering="true" data-paging="true" data-sorting="true" data-toggle-column="first" data-paging-size="7">
                                <thead>
                                    <tr class="footable-filtering"  data-expanded="false">
                                        <th data-breakpoints="xs">ID</th>
                                        <th data-breakpoints="xs sm">Fecha</th>
                                        <th data-breakpoints="xs">Numero de comprobante</th>
		                                <th data-breakpoints="xs sm ">Tipo de comprobante</th>
                                        <th data-breakpoints="xs">Proveedor</th>
                                        <th data-breakpoints="xs sm ">Estado</th>
                                        <th data-title="Opciones">Opciones</th>
                                    </tr>
                                </thead>
                                <tbody> 
                                  <?php $count=0; foreach($lista_compra as $x){ $count =+1;?>
                                <tr>
                                  <td> <?php echo $count; ?></td>
                                    <td><?php echo $x->fecha;?></td>
                                    <td>
                                    <a href="<?php echo base_url().'Inventario/Compras/editar/'.$x->Id;?>" data-toggle="tooltip" title="Ver detalle">
                                        <?php echo $x->seriecomprobante." ".correlativo($x->numcomprobante);?>
                                    </a>
                                    </td>
                                    <td>
                                    <?php 
                                    $queryx = $this->db->query("select * from ta_tipocomprobante where Id='".$x->tipocomprobante."'");
                                    foreach ($queryx->result() as $xx)
                                    {
                                        echo $xx->tipocomprobante;
                                    }
                                    ?>
                                    </td>
                                    <td>
                                    <?php 
                                        $queryp = $this->db->query("select * from ta_proveedores where Id='".$x->proveedor."'");
                                        foreach ($queryp->result() as $xp)
                                        {
                                            echo $xp->nombre;
                                        }
                                    ?>
                                    </td>
                                    <td>
                                    <?php 
                                        if($x->estado==0){
                                            echo "<span class='label label-warning'>Falta agregar productos (calcular)</span>";
                                        }else if($x->estado==1){
                                            echo "<span class='label label-info'>Falta finalizar</span>";
                                        }else if($x->estado==2){
                                            echo "<span class='label label-success'>Finalizado</span>";
                                        }else{
                                            echo "<span class='label label-danger'>Anulado</span>";
                                        }
                                    ?>
                                    </td>
                                    <td>
                                       <?php
                                           if($x->estado<2){
                                       ?>
                                        <a  class="btn btn-info waves-effect waves-light" data-toggle="tooltip" data-original-title="Editar" href="<?php echo base_url().'Inventario/Compras/editar/'.$x->Id;?>">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                        
                                        <?php } ?>
                                        <?php if($x->estado!=3){?>
                                        <a href="javascript:void(0)" class="btn btn-danger waves-effect waves-light" data-toggle="tooltip" data-original-title="Anular" onclick="return pregunta(<?php echo $x->Id;?>);">
                                           <i class='fas fa-times-circle'></i>
                                        </a>
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
                       $(document).on("click",".btn_imprimir_data",function(){

                            valor_id =  $(this).attr("Id"); 
                            window.open("<?php echo base_url().'Inventario/Pedidos/comprobantefactura/'?>"+valor_id,'targetWindow','toolbar=no,location=no,status=no,menubar=no,scrollbars=yes,resizable=yes,width=900,height=750');

                         
                        });
                       $(document).ready(function() {
                           $(document).on('submit', '#buscar_registro_por_orden_fecha', function(event) {

                           event.preventDefault();


                           /* Act on the event */
                           $.ajax({
                               url: '<?php echo base_url().'Inventario/Compras/buscar/';?>',
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
                              <strong>Total: </strong> <strong>`+demo+`</strong> compras a la fecha <strong><?php echo date('d-m-Y');?></strong>
                              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                              </button>
                            </div>`);

                       }, 1000);


                        function pregunta(e){
                          Swal.fire({
                          title: 'Esta seguro de anular?',
                          text: "Al aceptar se modificara el stock del producto",
                          icon: 'warning',
                          showCancelButton: true,
                          confirmButtonColor: '#DD6B55',
                          cancelButtonColor: '#d33',
                          confirmButtonText: "Anular",
                          cancelButtonText: "Cancelar", 
                        }).then((result) => {
                          if (result.value) {
                            window.location = "<?php echo base_url().'Inventario/Compras/eliminar/'?>"+e;
                          }
                          return false;
                        })
                      }






                    </script>

    