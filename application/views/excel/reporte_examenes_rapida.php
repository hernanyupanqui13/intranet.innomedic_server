<?php 
    
    $nombre = "Antigeno_Rapidas_".date('Y-m-d')."_".rand(10000,99999);
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
    <h1 style="text-align: center;">PRUEBAS RAPIDAS</h1>
    
    
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
        <td class="moneda" style="text-align: center;"><b>FECHA DE LA PRUEBA</b></td>
        <td class="moneda" style="text-align: center;"><b>RESULTADOS DE LA PRIMERA PRUEBA</b></td>
        <td class="moneda" style="text-align: center;"><b>IGG</b></td>
        <td class="moneda" style="text-align: center;"><b>IGM</b></td>
    </tr>
    <?php 
    $lista = json_decode($lista);
    foreach ($lista as $item) { ?>
        <tr style="text-align: center;">
            <td><?php echo $item->fecha_; ?></td>
            <td><?php echo $item->nro_identificador; ?></td>
            <td><?php echo $item->nombrex; ?></td>
            <td><?php echo $item->edad; ?></td>
            <td><?php echo $item->dni; ?></td>
            <td><?php echo $item->sexo; ?></td>
            <td><?php echo "INNOMEDIC INTERNATIONAL E.I.R.L"; ?></td>
            <td><?php echo "PERFIL ANTIGENO"; ?></td>
            <td><?php echo "VISITA"; ?></td>
            <td><?php echo $item->fecha_de_atencion;?></td>
            <td><?php if ($item->igg == "REACTIVO" || $item->igm == "REACTIVO") {
                echo "REACTIVO";
            } else {
                echo "NO REACTIVO";
            }?>
            </td>
            <td><?php echo $item->igg;?></td>
            <td><?php echo $item->igm;?></td>
        </tr>
    <?php } ?>
</table>