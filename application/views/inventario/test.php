<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">

<!-- Datatables -->
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/jqc-1.12.4/dt-1.10.24/b-1.7.0/sl-1.3.3/datatables.min.css"/>
<link rel="stylesheet" type="text/css" href="<?= base_url() . "assets/vendor/"?>Editor-2.0.2/css/editor.dataTables.css">
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.24/css/dataTables.bootstrap4.min.css">


<script type="text/javascript" src="https://cdn.datatables.net/v/dt/jqc-1.12.4/dt-1.10.24/b-1.7.0/sl-1.3.3/datatables.min.js"></script>
<script type="text/javascript" src="<?=base_url() . "assets/vendor/"?>Editor-2.0.2/js/dataTables.editor.js"></script>




</head>
<body>
    
<table id="almacenTable" class="table table-bordered table-striped dataTable no-footer" role="grid" aria-describedby="myTable_info">
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
            <?php $count+=1;?>
            <tr>
                <td><?= $count ?></td>
                <td>
                    <?php 
                        $queryx = $this->db->query("select * from ta_productos where Id='".$x->producto."' ");
                        foreach ($queryx->result() as $xx) {
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
<script src="<?=base_url() . 'application/views/inventario/almacen_index-script.js?v=1';?>"></script>
</body>
</html>