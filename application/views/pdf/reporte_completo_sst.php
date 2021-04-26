
<!DOCTYPE html>
<html lang="en">
<head>
<!-- Required meta tags -->
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

<!-- Bootstrap CSS -->
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
<link href="<?php echo base_url().'pdf/';?>normalize.css" rel="stylesheet">

<title>Informacion Personal - Colaborador</title>



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
</head>
<body>
    <div class="row">
        <img src="<?php echo base_url().'assets/';?>images/innomedic.jpg" alt="">
    </div> 
    <br>

    <br>
    <h1 style="text-align: center;">REPORTE COMPLETO SST</h1>
        
        
    <br><br>


    <table width='100%' border="1" style="font-family: Arial, Helvetica, sans-serif;">
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
</body>
</html>
