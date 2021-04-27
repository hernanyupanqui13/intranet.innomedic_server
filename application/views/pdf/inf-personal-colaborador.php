
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

    #footer {
      position:fixed;
      left:0px;
      bottom:0px;
      height:30px;
      width:100%;
    }

    .my_label {
      font-weight: bold;
      background-color: #D3D7D9;
    }
    
    img {
      width: 200px;
      margin-top:20px;
    }

    .my_heading {
      padding-left: 20px;
    }

    .table-information {
      width: 100%;
    }

    table,
      th,
      td {
        padding: 10px;
        border: 1px solid black;
        border-collapse: collapse;
      }



</style>
</head>
<body>
    <div class="row">
      <img src="<?php echo base_url().'assets/';?>images/innomedic.jpg" alt="">
    </div>            


    <h1 class="h1 my_heading text-center">INFORMACION PERSONAL</h1>
    <div class="text-center img-perfil">
        <img src="<?= base_url() . "upload/images/". $impr->imagen ?>" class="rounded" alt="Imagen perfil"></div>

    <table class="table-information">      
      <tbody>
        <tr>
          <th scope="row">Nombres Completos:&nbsp;</th>
          <td colspan="3"><?=$impr->nombres?></td>
        </tr>
        <tr>
          <th scope="row">Apellido Paterno:&nbsp;</th>
          <td colspan="1"><?=$impr->apellido_paterno?></td>
        
          <th scope="row">Apellido Materno:&nbsp;</th>
          <td colspan="1"><?=$impr->apellido_materno?></td>          
        </tr>
        <tr>
          <th scope="row">D.N.I:&nbsp;</th>
          <td colspan="1"><?=$impr->nro_documento?></td>          
        
          <th scope="row">Sexo:&nbsp;</th>
          <td colspan="1"><?=$impr->genero?></td>          
        </tr>
        <tr>
          <th scope="row">Fecha de nacimiento:&nbsp;</th>
          <td colspan="3"><?=$impr->fecha_nacimiento?></td>          
        </tr>
        <tr>
          <th scope="row">Correo:&nbsp;</th>
          <td colspan="3"><?=$impr->email?></td>          
        </tr>
        <tr>
          <th scope="row">Telefono movil:&nbsp;</th>
          <td colspan="1"><?=$impr->celular?></td>          
        
          <th scope="row">Telefono domicilio:&nbsp;</th>
          <td colspan="1"><?=$impr->telefono_domicilio?></td>          
        </tr>
        <tr>
          <th scope="row">Direccion:&nbsp;</th>
          <td colspan="3"><?=$impr->direccion?></td>          
        </tr>
        <tr>
          <th scope="row">Puesto:&nbsp;</th>
          <td colspan="1"><?=$impr->puesto?></td>          
        
          <th scope="row">Fecha de inicio:&nbsp;</th>
          <td colspan="1"><?=$impr->fecha_ingreso?></td>          
        </tr>

      </tbody>
    </table>
    


    <div id="footer" ><a href="">Innomedic.pe</a></div>

</body>
</html>



