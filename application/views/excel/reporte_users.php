<?php 
    
    $nombre = "Colaborador_".date('Y-m-d')."_".rand(10000,99999);
    header('Pragma: public');
    header('Content-Disposition: attachment; filename='.$nombre.'.xls');//
    header('Content-type: application/force-download');
    header('Content-type: application/download');
    header('Content-type: application/octet-stream');
    header('Content-type: application/vnd.ms-excel');
    header('Content-type: application/vnd.ms-excel');
   // header('Content-Transfer-Encoding: binary');
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
        <td width='200px'>#</td>

        <td class="moneda" style="text-align: center;"><b>COLABORADOR</b></td>
        <td class="moneda" style="text-align: center;"><b>DNI</b></td>
        <td class="moneda" style="text-align: center;"><b>TIPO DE BOLETA</b></td>
        <td class="moneda" style="text-align: center;"><b>A&Ntilde;O</b></td>
        <td class="moneda" style="text-align: center;"><b>PERIODO</b></td>
        <td class="moneda" style="text-align: center;"><b>ESTADO</b></td>
        <td class="moneda" style="text-align: center;"><b>CONFORMIDAD</b></td>
    </tr>
    <?php $cont =0; foreach($lista as $xx){ $cont+=1; ?>
        <tr style="text-align: center;">
            <td><?php echo $cont; ?></td>
            <td><?php echo $xx->para; ?></td>
            <td><?php echo $xx->dni; ?></td>
            <td><?php echo $xx->boleta; ?></td>
            <td><?php echo $xx->ano; ?></td>
            <td><?php echo $xx->mes; ?></td>
            <td><?php echo $xx->estado_xx; ?><br><?php echo $xx->fecha_enviado; ?></td>
            <td><?php if ($xx->conforme==1) {?>
                Recibido  Conforme
            <?php } else{?>
                
            <?php }?></td>

        </tr>
    <?php } ?>
</table>