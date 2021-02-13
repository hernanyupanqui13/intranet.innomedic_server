<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="<?php echo base_url().'assets_sistema/';?>css/bootstrap.min.css">

<title><?php echo $title[0] ?></title>


<style>
@media all {
   div.saltopagina{
      display: none;
   }
}

@media print {
   div.saltopagina{
      display:block;
      page-break-before:always;
   }
}

div.saltopagina{
   page-break-before:always;
}

#imprimir_boton {
   display: block;
   margin: 10px 0px;
}

body {
   display: flex;
   flex-direction: column;
   margin: 5px;
}
</style>
   

</head>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10.10.1/dist/sweetalert2.all.min.js"></script>
<script src=<?= base_url().'application/JavaScript/imprimir.js'?>></script>


<body>

<a onclick="imprimir()" id="imprimir_boton" class="btn btn-outline-dark" >
   <strong>Imprimir Información</strong>
</a>

<div  id="main-body"></div>


</body>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="<?php echo base_url().'assets_sistema/';?>dist/js/pages/jquery.PrintArea.js" type="text/JavaScript"></script>

<script>
document.getElementById("main-body").innerHTML = getPlantilla("<?=$nombre_plantilla?>", "<?=$the_id?>");
fillData(getData("<?=$the_id?>"));

</script>

</html>   




