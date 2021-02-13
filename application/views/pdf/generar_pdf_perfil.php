
<?php if (!empty($listar_empresa_perfil)) {
        foreach ($listar_empresa_perfil as $emp) {
            $nombrex = $emp->razon_social;
            $rucx = $emp->ruc;
            $urlx = $emp->url;
            $direccionx = $emp->direccion; 
            $id_departamento = $emp->id_departamento;
            $id_provincia = $emp->id_provincia;
            $id_distrito = $emp->id_distrito;
            $id_rubro = $emp->id_rubro;
            $nombre_comercialx = $emp->nombre_comercial;
            $actividad_economicax = $emp->actividad_economica;
            $contactox = $emp->contacto;
            $emailx = $emp->email;
            $telefonox = $emp->telefono;
            $departamentox = $emp->departamento;
            $provinciax = $emp->provincia;
            $distritox = $emp->distrito;
            $rubrox = $emp->rubro;
            $idx = $emp->Id;
        }
    }else{

        redirect(base_url().'Sistema/');
        
    } ?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title><?php echo $nombrex;?></title>
  <link rel="stylesheet" href="">








 <style>
    @page { margin: 180px 50px; }
    #header { position: fixed; left: 0px; top: -180px; right: 0px; height: 150px; background-color: orange; text-align: center; }
    #footer { position: fixed; left: 0px; bottom: -180px; right: 0px; height: 150px; background-color: lightblue; }
    #footer .page:after { content: counter(page,decimal;); }
  </style>

 
</head>
<body>

  

    <div id="header">
        <h1>Widgets Express</h1>
    </div>
    <div id="content">
        <p>the first page</p>
        <h1><?php echo $nombrex; ?></h1>
    </div>
    <div id="footer">
        <p class="page">Pagina </p>
    </div>
  
  
</body>
</html>