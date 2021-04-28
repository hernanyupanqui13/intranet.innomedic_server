
<!DOCTYPE html>
<html lang="en">
<head>
<!-- Required meta tags -->
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

<script src="https://kit.fontawesome.com/dc5ae8b9ac.js" crossorigin="anonymous"></script>

<title>Informacion Personal - Colaborador</title>

<style>

    body{
        font-family: Arial, Helvetica, sans-serif;
    }
    
    .strongbold {
        font-family: Arial;
        font-weight: bold;
    }


    .head_table, .head_table th,.head_table td {        
        border: 1px solid black;
        border-collapse: collapse;
    }

    .img_container {
        display: flex;
        justify-content: center;
        align-items: center;
    }


    img {
        max-width: 100%;
        width: 130px;
    }

    

    .table-headtext {
        text-align: center;
        font-family: Arial, Helvetica, sans-serif;
        padding:  0 2px;
    }

    .main_title {
        text-align: center;
    }

    .body_text-p {
        font-size: 1.3rem;
        text-align: justify;
    }

    .user_data div {
        display: block;
        font-size: 1.3rem;
    }

    .user_data li {
        margin-bottom: 10px;
    }

    .head_table {
        text-align: center;
    }


    .check_icon {
        width: 20px ;
    }


    
</style>
</head>
<body>
<header>
    <table width="100%" border="1" class="head_table">
        <tr>
            <td width="20%" rowspan="4">
                <div class="img_container">
                    <img src="<?php echo base_url().'assets/';?>images/logo.jpg">
                </div>
            </td>
            <td rowspan="2" width="55%" class="table-headtext">GESTION ORGANIZACIONAL</td>
            <td class="table-headtext">Fecha de Emision</td>
            <td>30 Septiembre 2020-1</td>
        </tr>
        <tr>
            <td class="table-headtext">Pagina</td>
            <td>1</td>
        </tr>
        <tr>
            <td rowspan="2" class="table-headtext">CARGO DE RECEPCION DEL REGLAMENTO INTERNO DE SEGURIDAD Y SALUD EN EL TRABAJO</td>
            <td class="table-headtext">Codigo</td>
            <td>CAR_RC_RISST 001 -2020</td>
        </tr>
        <tr>
            <td colspan="2" style="text-align: center;">Version 1</td>
        </tr>
    </table>
</header>
<h1 class="main_title">CARGO DE RECEPCION DE RISST</h1>
<p class="body_text-p">Conste por el presente documento, que, he recibido y se me ha 
    capacitado sobre el Reglamento Interno de Seguridad 
    y Salud en el Trabajo de INNOMEDIC INTERNATIONAL E.I.R.L.
    El cual me comprometo a cumplir estrictamente en todas sus normas y dispositivos, 
    para lo cual firmo el presente cargo
</p>

<ul class="user_data">
    <li>
        <div class="strongbold" >Nombres y Apellidos</div>
        <div><?=ucwords(mb_strtolower($user_data->nombre
            . " " . $user_data->apellido_paterno 
            . " " . $user_data->apellido_materno))?>
        </div>
    </li>
    <li>
        <div class="strongbold" >Puesto de Trabajo</div>
        <div><?=$user_data->puesto?></div>
    </li>
    <li>
        <div class="strongbold" >DNI:</div>
        <div><?=$user_data->nro_documento?></div>
    </li>
    <li>
        <div class="strongbold" >Fecha</div>
        <div><?= $user_data->fecha_visto?></div>
    </li>
    <li>
        <div class="strongbold" >Firma</div>
        <div>
            <img class="check_icon" src="<?php echo base_url().'assets/';?>images/check.png">
            <span>Firmado Digitalmente el <?=$user_data->fecha_visto?></span>
        </div> 
    </li>
</ul>

</body>
</html>