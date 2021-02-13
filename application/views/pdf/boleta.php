<?php $query = $this->db->query("select * from ts_datos_personales where id_usuario='".$this->uri->segment(4,0)."'");
        foreach ($query->result() as $emp) {
            $nombrex = $emp->apellido_paterno." ".$emp->apellido_materno.", ".$emp->nombres;
        }


         ?>




<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <link href="<?php echo base_url().'pdf/';?>normalize.css" rel="stylesheet">

    <title><?php echo  $nombrex; ?></title>

    <style>
	#footer {
   position:fixed;
   left:0px;
   bottom:0px;
   height:30px;
   width:100%;

   /*background:#999;*/
}
	</style>
  </head>
  <body>
  	<div class="card-body">
    	<div class="row border border-dark rounded-pill ">
			<div class="col-md-4">
				<img src="<?php echo base_url().'assets/';?>images/logo.jpg" alt="">
			</div>			
		</div>
      
    </div>
    <h1 class="text-center">REGISTRO DE ENVIO DE BOLETAS DEL PERIODO <?php echo $this->uri->segment(5,0) ?></h1>

    <div class="container-fluid">
    	<div class="row">
    		<table border="1" width="100%">
  <thead class="thead-dark">
    <tr class="text-center">
      <th><small style="font-weight: bold;">#</small></th>
      <th><small style="font-weight: bold;">Colaborador</small></th>
      <th><small style="font-weight: bold;">DNI</small></th>
      <th><small style="font-weight: bold;">Tipo Boleta</small></th>
      <th><small style="font-weight: bold;">Año</small></th>
      <th><small style="font-weight: bold;">Periodo</small></th>
      <th><small style="font-weight: bold;">Fecha de envío</small></th>
      <th><small style="font-weight: bold;">Estado</small></th>
      <th><small style="font-weight: bold;">Conformidad</small></th>
    </tr>
  </thead>
  <tbody>
  	 <?php $cont = 0; foreach ($cuenta as $xx) { $cont+=1;?>
			
			

    <tr class="text-center">
      <th scope="row"><small><?php echo $cont; ?></small></th>
      <td><small><?php echo $xx->para; ?></small></td>
      <td><small><?php echo $xx->dni; ?></small></td>
      <td><small><?php echo $xx->boleta; ?></small></td>
      <td><small><?php echo $xx->ano; ?></small></td>
      <td><small><?php echo $xx->mes; ?></small></td>
      <td><small><?php echo $xx->fecha_; ?></small></td>
      <td><small><?php echo $xx->estado_xx; ?><br><?php echo $xx->fecha_recibido; ?></small></td>
      <td><small><?php if ($xx->conforme==1) {?>
                Recibo Conforme
            <?php } else{?>
                
            <?php }?> </small></td>
    </tr>
    <?php } ?>
   
  </tbody>
</table>
    	</div>
    </div>

   

    <div id="footer" ><a href="<?php echo base_url();?>">Innomedic.pe</a></div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->

  </body>
</html>


