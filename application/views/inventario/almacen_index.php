<iframe src="<?= base_url() . 'Inventario/Almacen/iframeTableEditor'?>" 
    frameborder="0"
    width="100%"
    style="height: 65vh;">
</iframe>

<!--
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
                                    <th>Numero</th>
                                    <th>Producto</th>
                                    <th>Codigo de Barra</th>
                                    <th>Stock</th>
                                </tr>
                            </thead>
                            <tbody>
                               <?php $count=0;?>
                                <?php foreach($lista as $x){ ?>
                                   <?php $x->Id;?>
                                    <tr>
                                        <td>-></td>
                                        <td>
                                            <?php 
                                                 $queryx = $this->db->query("select * from ta_productos where Id='".$x->producto."' ");
                                                 foreach ($queryx->result() as $xx)
                                                 {
                                                     echo $xx->nombre;
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
</div>-->

<!-- Datatables -->
<!--<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/jqc-1.12.4/dt-1.10.24/b-1.7.0/sl-1.3.3/datatables.min.css"/>
<link rel="stylesheet" type="text/css" href="<?= base_url() . "assets/vendor/"?>Editor-2.0.2/css/editor.dataTables.css">

<script type="text/javascript" src="https://cdn.datatables.net/v/dt/jqc-1.12.4/dt-1.10.24/b-1.7.0/sl-1.3.3/datatables.min.js"></script>
<script type="text/javascript" src="<?=base_url() . "assets/vendor/"?>Editor-2.0.2/js/dataTables.editor.js"></script>-->


<!--<script src="<?=base_url() . 'application/views/inventario/almacen_index-script.js?v=1';?>"></script>-->