
<!DOCTYPE html>
<html lang="en">
<head>
<!-- Required meta tags -->
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">



<title>Informacion Personal - Colaborador</title>

<style>
    * {
        font-family: Arial, Helvetica, sans-serif;
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

    

    .table-headtext {
        text-align: center;
        font-weight: bold;
        padding:  0 5px;
    }

    .main_title {
        text-align: center;
    }

    .body_text-p {
        font-size: 1.3rem;
        text-align: justify;
    }

    .user_data strong, .user_data span {
        display: block;
        font-size: 1.3rem;
    }

    .user_data li {
        margin-bottom: 10px;
    }

    .container {
        display: block;
        position: relative;
        padding-left: 35px;
        margin-bottom: 12px;
        cursor: pointer;
        font-size: 1.3rem;
        -webkit-user-select: none;
        -moz-user-select: none;
        -ms-user-select: none;
        user-select: none;
    }

    .container input {
        position: absolute;
        opacity: 0;
        cursor: pointer;
        height: 0;
        width: 0;
    }

    .checkmark {
        position: absolute;
        top: 0;
        left: 0;
        height: 25px;
        width: 25px;
        background-color: #eee;
    }

    /* On mouse-over, add a grey background color */
    .container:hover input ~ .checkmark {
        background-color: #ccc;
    }

    /* When the checkbox is checked, add a blue background */
    .container input:checked ~ .checkmark {
        background-color: #2196F3;
    }

    /* Create the checkmark/indicator (hidden when not checked) */
    .checkmark:after {
        content: "";
        position: absolute;
        display: none;
    }

    /* Show the checkmark when checked */
    .container input:checked ~ .checkmark:after {
        display: block;
    }

    /* Style the checkmark/indicator */
    .container .checkmark:after {
        left: 9px;
        top: 5px;
        width: 5px;
        height: 10px;
        border: solid white;
        border-width: 0 3px 3px 0;
        -webkit-transform: rotate(45deg);
        -ms-transform: rotate(45deg);
        transform: rotate(45deg);
    }

    .head_table {
        text-align: center;
    }

    .confirm_container {
        display: flex;
        align-items: center;
    }

    .confirm_checkbox {
        position: relative;
        bottom: -10px;
    }

    .confirmation_table {
        font-size: 1.3rem;
    }
</style>
</head>
<body>
<header>
    <table width="100%" border="1" class="head_table">
        <tr>
            <td width="20%" rowspan="4">
                <div class="img_container">
                    <img src="<?php echo base_url().'assets/';?>images/logo.png">
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
            <td rowspan="2" class="table-headtext">CARGO DE RECPECION DEL REGLAMENTO INTERNO DE SEGURIDAD Y SALUD EN EL TRABAJO</td>
            <td class="table-headtext">Codigo</td>
            <td>CAR_RC_RISST 001 -2020</td>
        </tr>
        <tr>
            <td colspan="2" style="text-align: center;">Version 1</td>
        </tr>
    </table>
</header>
<h1 class="main_title">Cargo de recepcion de RISST</h1>
<p class="body_text-p">Conste por el presente documento, que, he recibido y se me ha 
    capacitado sobre el Reglamento Interno de Seguridad 
    y Salud en el Trabajo de INNOMEDIC INTERNATIONAL E.I.R.L.
    El cual me comprometo a cumplir estrictamente en todas sus normas y dispositivos, 
    para lo cual firmo el presente cargo
</p>

<ul class="user_data">
    <li>
        <strong>Nombres y Apellidos</strong>
        <span><?=$user_data->nombre
            . " " . $user_data->apellido_paterno 
            . " " . $user_data->apellido_materno?>
        </span>
    </li>
    <li>
        <strong>Puesto de Trabajo</strong>
        <span><?=$user_data->puesto?></span>
    </li>
    <li>
        <strong>DNI:</strong>
        <span><?=$user_data->nro_documento?></span>
    </li>
    <li>
        <strong>Fecha</strong>
        <span><?= $user_data->fecha_visto?></span>
    </li>
    <li>
        <strong>Firma</strong>
        <table width="100%" class="confirmation_table">
            <tr>
                <td><input type="checkbox" class="confirm_checkbox" style="position: relative; top:20px;" checked onclick="event.preventDefault()"></td>
                <td style="padding-left: 15px;">Firmado Digitalmente el <?=$user_data->fecha_visto?></td>
            </tr>
        </table>
        <!--<label class="container">Firmado digitalmente el 12/04/2021
            <input type="checkbox" checked="checked">
            <span class="checkmark"></span>
        </label>-->
    </li>
</ul>

</body>
</html>