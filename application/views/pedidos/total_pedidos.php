    <div class="card">
        <div class="card-body">
            <h4 class="card-title">Lista de Registro de Pedidos</h4>
            <h6 class="card-subtitle">Trabajador - Pedido</h6>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="demo-foo-accordion" class="table table-bordered m-b-0 toggle-arrow-tiny display nowrap  table-hover table-striped table-bordered" data-filtering="true" data-paging="true" data-sorting="true"   data-paging-size="8">
                            <thead>
                                <tr class="footable-filtering">
                                    <th>#</th>
                                    <th data-toggle="true"> Trabajador </th>
                                    <th>C. Pedido</th>
                                    <th>C. Entregada</th>
                                    <th data-hide="phone"> Descripcion</th>
                                    <th data-hide="all"> UNI.Medida </th>
                                    <th data-breakpoints="xs sm md lg">Fecha Pedido</th>
                                    <th data-breakpoints="xs sm md lg">Fecha Entregada</th>
                                    <th data-breakpoints="xs sm md lg">Observacion</th>
                                    <th data-hide="all"> Estado </th>
                                    <th>Estado de Aceptación</th>
                                    <th>Opciones</th> 
                                </tr>
                            </thead>
                            <tbody>
                                <?php $cont=0; foreach ($lista_total_pedidos as $xx) { $cont +=1;?>
                                <tr>
                                    <td><?php echo $cont; ?></td>
                                    <td><a href="javascript:void(0)"><img src="<?php echo base_url().'upload/';?>images/<?php if($xx->imagen==""){ echo "foto.png";}else{ echo $xx->imagen;} ?>" alt="user" width="40" class="img-circle" /> <?php echo $xx->nombres_completos;?></a></td>
                                    <td><?php echo $xx->cantidad;?></td>
                                    <td><?php if ($xx->cantidad_entregada=="" || $xx->cantidad_entregada==null) {
                                        echo "0";
                                    }else{
                                        echo "$xx->cantidad_entregada";
                                    } ?></td>
                                    <td><?php echo $xx->descripcion;?></td>
                                    <td><?php echo $xx->unidad_medida;?></td>
                                    <td><?php echo $xx->fecha_pedido;?></td>
                                    <td><?php echo $xx->fecha_entregado;?></td>
                                    <td><?php if ($xx->status==5) {?>
                                        <span >Se elimino el pedido, por la área Logística.  Eliminado por: <a href="javascript:void()">Luis Armando</a></span>
                                    <?php }else{?>
                                        <?php echo $xx->observacion; ?>

                                    <?php }?></td>
                                    <td><?php if ($xx->status==1) {
                                    echo "<span class='label label-success'>Entregado</span>";
                                        }else if($xx->status==2){
                                            echo "<span class='label label-primary'>Pendiente</span>";
                                        }else if($xx->status==3){
                                            echo "<span class='label label-warning'>Observado</span>";
                                        }else if($xx->status==4){
                                            echo "<span class='label label-info'>Recibido</span>";
                                        }else if($xx->status==5){
                                            echo "<span class='label label-danger'>Anulado</span>";
                                        }else{
                                           echo "<span class='label label-warning'>Error</span>";
                                        } ?>
                                            
                                    </td>
                                    
                                    <td>
                                       <?php if ($xx->status==5) {?>
                                           <span class="label label-danger">Anulado</span>
                                       <?php }else{?>
                                             <?php if ($xx->x==1) {
                                                 echo "<span class='label label-success'>Pedido en visto</span>";
                                                }else if($xx->x==2){
                                                    echo "<span class='label label-info'>Pedido Aceptado</span>";
                                                }else if($xx->x==3){
                                                    echo "<span class='label label-danger'>Pedido Rechazado</span>";
                                                }else{
                                                   echo "<span class='label label-warning'>Entrega Pendiente</span>";
                                                } ?>
                                       <?php } ?>
                                    </td>
                                    <td>
                                        <a class="btn-outline-primary btn " href="javascript:void(0)"><i class="fas fa-edit"></i></a>
                                        <a class="btn-outline-success btn " href="javascript:void(0)"><i class="fas fa-eye"></i></a>
                                        
                                    </td>
                                </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
        </div>
    </div>
