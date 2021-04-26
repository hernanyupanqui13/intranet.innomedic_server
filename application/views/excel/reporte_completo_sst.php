<?php 
    
    $nombre = "ReporteCompletoSst_".date('Y-m-d')."_".rand(10000,99999);
    //header('Pragma: public');
    header('Content-Disposition: attachment; filename='.$nombre.'.xls');//
    //header('Content-type: application/force-download');
    //header('Content-type: application/download');
    //header('Content-type: application/octet-stream');
    header('Content-type: application/vnd.ms-excel');
    
    //header('Content-Type: text/html; charset=utf-8');
    
    
?>
<style>
    table{
        font-family: arial; 
        font-size: 14px;
    }

    img {
      width: 200px;
      margin-top:20px;
    }

    .colortitutlo{
        background-color: #7ed9e5;
    }
</style>


<img src="<?php echo base_url().'assets/';?>images/logo.png">
<br>

<br>
<h1 style="text-align: center;">REPORTE COMPLETO SST</h1>
    
    
<br><br>


<table width='100%' border="1">
   <tr class="colortitutlo" style="text-align: center;">
        <td class="moneda" style="text-align: center;"><b>TIPO DE DOCUMENTO</b></td>
        <td class="moneda" style="text-align: center;"><b>NOMBRES</b></td>
        <td class="moneda" style="text-align: center;"><b>APELLIDO PATERNO</b></td>
        <td class="moneda" style="text-align: center;"><b>APELLIDO MATERNO</b></td>
        <td class="moneda" style="text-align: center;"><b>DNI/CE</b></td>
        <td class="moneda" style="text-align: center;"><b>FECHA DE VISUALIZACION</b></td>
    </tr>
    <?php 
    foreach ($data as $item) { ?>
        <tr style="text-align: center;">
            <td><?php echo $item->tipo_documento; ?></td>
            <td><?php echo $item->nombre; ?></td>
            <td><?php echo $item->apellido_paterno; ?></td>
            <td><?php echo $item->apellido_materno; ?></td>
            <td><?php echo $item->nro_documento; ?></td>
            <td><?php echo $item->fecha_visto; ?></td>
        </tr>
    <?php } ?>
</table>