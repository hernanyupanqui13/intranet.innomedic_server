<div class="card">
        <div class="card-body">
            <a href="javascript: history.back()" class="btn btn-danger" ><i class="fa fa-reply m-r-5"></i><span> Regresar </span></a>

            <div class="table-responsive m-t-40">
                <table id="myTable" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Tipo Boleta</th>
                            <th>Periodo</th>
                            <th>Empresa</th> 
                            <th>Colaborador</th>
                            <th>Visualizado</th>
                            <th>Opciones</th>
                        </tr>
                    </thead> 
                    <tbody>
                        <?php $cont=0; foreach ($lista_fecha_boleta as $xx) { $cont+=1;?>
                            <tr>
                                <td><?php echo $cont; ?></td>
                                <td><?php $tipo_boleta=  $this->db->query("select * from do_tipo_boleta"); 
                                foreach ($tipo_boleta->result() as $x) {
                                   if ($xx->tipo_boleta == $x->Id) {
                                       echo $x->nombre;
                                   }
                                }; ?></td>
                                <td><?php echo $xx->ano.' '.$xx->mes; ?></td>
                                <td><?php echo $xx->empresa; ?></td>
                                <td><a target="_blank" href="<?php echo base_url().'upload/boletas/'.$xx->archivo;?>"><?php echo $xx->para; ?></a></td>
                                <td><?php echo $xx->fecha_recibido; ?></td>
                                <td><a href="" class="btn  btn-outline-danger" ><i class=" fas fa-times-circle"></i></a></td>
                            </tr>
                       <?php  } ?>
                        
                    </tbody>
                </table>
            </div>
        </div>
    </div>