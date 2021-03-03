<?php 
    
    $nombre = "Colaborador_".date('Y-m-d')."_".rand(10000,99999);
    header('Pragma: public');
    header('Content-Disposition: attachment; filename='.$nombre.'.xls');//
    header('Content-type: application/force-download');
    header('Content-type: application/download');
    header('Content-type: application/octet-stream');
    header('Content-type: application/vnd.ms-excel');
    header('Content-type: application/vnd.ms-excel');
    header('Content-Type: text/html; charset=utf-8');
    
    
?>
<style>
    table{
        font-family: arial; 
        font-size: 14px;
    }
    .moneda{
        text-align: right;
    }
    .colortitutlo{
        background-color: #7ed9e5;
    }
</style>


    <img src="<?php echo base_url().'assets/';?>images/logo.png">
    <br>
    
    <br>
    <h1 style="text-align: center;">REGISTRO DE ENVIO DE BOLETAS DEL A&Ntilde;O <?php echo $this->uri->segment(5,0) ?></h1>
    
    
<br><br>


<table width='100%'>
   <tr class="colortitutlo" style="text-align: center;">
        <td class="moneda" style="text-align: center;"><b>FECHA</b></td>
        <td class="moneda" style="text-align: center;"><b>NRO</b></td>
        <td class="moneda" style="text-align: center;"><b>TRABAJADOR</b></td>
        <td class="moneda" style="text-align: center;"><b>EDAD</b></td>
        <td class="moneda" style="text-align: center;"><b>DNI</b></td>
        <td class="moneda" style="text-align: center;"><b>SEXO</b></td>
        <td class="moneda" style="text-align: center;"><b>CLIENTE</b></td>
        <td class="moneda" style="text-align: center;"><b>PERFIL</b></td>
        <td class="moneda" style="text-align: center;"><b>TIPO EXAMEN</b></td>
        <td class="moneda" style="text-align: center;"><b>RESULTADO DE LA PRUEBA DE ANTIGENO</b></td>
    </tr>
    <?php $cont =0; foreach($lista as $item){ $cont+=1; ?>
        <tr style="text-align: center;">
            <td><?php echo $item->fecha_registro; ?></td>
            <td><?php echo $item->nro_identificador; ?></td>
            <td><?php echo $item->dni; ?></td>
            <td><?php echo $item->boleta; ?></td>
            <td><?php echo $item->ano; ?></td>
            <td><?php echo $item->mes; ?></td>
            <td><?php echo $item->estado_item; ?><br><?php echo $item->fecha_enviado; ?></td>
            <td><?php if ($item->conforme==1) {?>
                Recibido  Conforme
            <?php } else{?>
                
            <?php }?></td>

        </tr>
    <?php } ?>
</table>