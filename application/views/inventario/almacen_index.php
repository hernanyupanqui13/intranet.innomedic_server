<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-body">
              
                    <h4 class="card-title">Listado de Almacén</h4>
                    <h6 class="card-subtitle">Listado de productos x Stock</h6>
               
                    <div class="table-responsive">
                        <table id="myTable" class="table table-bordered table-striped">
                            <thead>
                                <tr> 
                                    <th>#</th>
                                    <th>Producto</th>
                                    <th>Codigo de barra</th>
                                    <th>STOCK</th>
                                </tr>
                            </thead>
                            <tbody>
                               <?php $count=0;?>
                                <?php foreach($lista as $x){ ?>
                                   <?php $count+=1;?>
                                    <tr>
                                        <td>-></td>
                                        <td>
                                            <?php 
                                                 $queryx = $this->db->query("select * from ta_productos where Id='".$x->producto."' ");
                                                 foreach ($queryx->result() as $xx)
                                                 {
                                                     echo $xx->nombre." (".$xx->description.")";
                                                 }
                                            ?>
                                        </td>
                                        <td><?php echo $x->codigo;?></td>
                                        <td><?php echo $x->total;?></td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                    
                
            </div>
            
            
            
        </div>
    </div>
</div>