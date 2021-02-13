
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Evaristo Escudero Huillcamascco">
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="<?php echo base_url().'assets_sistema/';?>images/favicon.png">
    <title>BOLETA DE ENTREGA - INNOMEDIC INTERNATIONAL E.I.R.L</title>
    <!-- Custom CSS -->
    <link href="<?php echo base_url().'assets_sistema/';?>dist/css/style.min.css" rel="stylesheet">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->
</head>

<body class="skin-blue fixed-layout">

    <script>
          window.print();
          /* sobre c5 229x 162 mn */
      </script>
    <!-- ============================================================== -->
    <!-- Preloader - style you can find in spinners.css -->
    <!-- ============================================================== -->

    <!-- ============================================================== -->
    <!-- Main wrapper - style you can find in pages.scss -->
    <!-- ============================================================== -->
 
        <!-- ============================================================== -->
        <!-- Topbar header - style you can find in pages.scss -->

        <!-- End Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Page wrapper  -->
        <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- Container fluid  -->
            <!-- ============================================================== -->
            <div class="container-fluid">
                <!-- ============================================================== -->
                <!-- Bread crumb and right sidebar toggle -->
                <!-- ============================================================== -->
               
                <!-- ============================================================== -->
                <!-- End Bread crumb and right sidebar toggle -->
                <!-- ============================================================== -->
                <!-- ============================================================== -->
                <!-- Start Page Content -->
                <!-- ============================================================== -->
                <?php foreach ($lista_detalles_pedidos as $x) {
                      //  $seriecomprobante = $x->serie;
                        $numboleta = $x->numcomprobante;
                        $seriecomprobante = $x->seriecomprobante;
                        $tipocomprobante = $x->tipocomprobante;
                        $cliente = $x->usuario;
                        $estado = $x->estado;
                        $ruc = $x->ruc;
                        $dni = $x->dni;
                        $telefono = $x->telefono;
                        $entregado = $x->entregado_por;
                        $fecha_xx = $x->fecha_entregado;
                      } ?>
                    

                <div class="row">
                    <div class="col-md-12">
                        <div class="card card-body printableArea">
                            <h3><b>COMPROBANTE</b> <span class="pull-right">#<?php echo $seriecomprobante.' - '.$numboleta ;?></span></h3>
                            <hr>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="pull-left">
                                        <address>
                                            <h3> &nbsp;<b class="text-danger">Innomedic International E.I.R.L</b></h3>
                                            <p class="text-muted m-l-5">
                                              <img width="250" height="125" src="<?php echo base_url().'assets/images/innomedic.png';?>?imgen<?php echo rand(); ?>" alt="" >
                                                <h4 class="font-bold">Ruc: 20546304761</h4>
                                                <br/> Dirección  : Av. Javier Prado Este 2638, San Borja, Lima, Perú
                                                <br/> Pagina web : www.innomedic.pe
                                                <br/> Teléfono - ----</p>
                                        </address>
                                    </div>
                                    <div class="pull-right text-right">
                                        <address>
                                            <h3>Trabajador,</h3>
                                            <h4 class="font-bold"><?php foreach($listacombo1 as $x){ ?>
                                                   <?php
                                                       if($cliente==$x->Id){
                                                           echo  $x->nombres.' '.$x->apellido_paterno.' '.$x->apellido_materno;
                                                       }else{
                                                           echo "";
                                                       }
                                                   ?>
                                            <?php } ?></h4>
                                            <p class="text-muted m-l-30">
                                                <br/> DNI:  <?php echo $dni;?>
                                                <br/> Teléfono: <?php if ($telefono=="" || $telefono== null) {
                                                    echo "+51 970 885 131";
                                                   }else{
                                                    echo $telefono;
                                                   }?>
                                               
                                            <p class="m-t-30"><b>Fecha de Entrega :</b> <i class="fa fa-calendar"></i> <?php echo $fecha_xx; ?></p>
                                           <!-- <p><b>Due Date :</b> <i class="fa fa-calendar"></i> 25th Jan 2017</p>-->
                                        </address>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="table-responsive m-t-40" style="clear: both;">
                                        <table class="table table-hover">
                                            <thead>
                                                <tr>
                                                    <th class="text-center">#</th>
                                                    <th class="text-right">CANTIDAD</th>
                                                    <th class="text-center">DESCRIPCIÓN</th>
                                                    <th>UNIDAD MEDIDA</th>
                                                    <th class="text-right">FECHA PEDIDO</th>
                                                    
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php $cont=0; foreach  ($lista_detalle_pedido_general as $xx) { 
                                                  $cont +=1;
                                                ?>
                                                    <tr>
                                                      <td class="text-center"><?php echo $cont;?></td>
                                                      <td class="text-right"><?php echo $xx->cantidad; ?></td>
                                                      <td class="text-center"><?php $query = $this->db->query("select * from ta_productos");
                                                        foreach ($query->result() as $x) {
                                                          if ($x->Id == $xx->producto) {
                                                             echo $x->nombre.'('.$x->description.')';
                                                          }
                                                        }
                                                        ?></td>
                                                         <td><?php $query = $this->db->query("select * from ts_unidad");
                                                        foreach ($query->result() as $x) {
                                                          if ($x->Id == $xx->unidad) {
                                                            echo $x->nombre;
                                                          }
                                                        }
                                                        ?></td>
                                                        <td class="text-right"><?php echo $xx->fecha; ?></td>
                                                       
                                                    </tr>
                                                  <?php } ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="pull-right m-t-30 text-right">
                                       <!-- <p>Sub - Total amount: $13,848</p>
                                        <p>vat (10%) : $138 </p>
                                        <hr>-->
                                        <h3><b>Entregado por :</b> <?php echo $entregado;?></h3>
                                    </div>
                                    <div class="clearfix"></div>
                                    <hr>
                                    <!--<div class="text-right" id="ocultar_print">
                                        <a href="" class="btn btn-danger" ><i class="fa fa-reply m-r-5"></i><span> Regresar </span></a>
                                        <button id="print" class="btn btn-info " type="button"> <span><i class="fa fa-print"></i> Imprimir</span> </button>
                                    </div>-->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- ============================================================== -->
                <!-- End PAge Content -->
                <!--


                <!-- ============================================================== -->
                <!-- End PAge Content -->
                <!-- ============================================================== -->
                <!-- ============================================================== -->
                <!-- Right sidebar -->
                <!-- ============================================================== -->
             
                <!-- ============================================================== -->
                <!-- End Right sidebar -->
                <!-- ============================================================== -->
            </div>
            <!-- ============================================================== -->
            <!-- End Container fluid  -->

    <!-- All Jquery -->
    <!-- ============================================================== -->
    <script src="<?php echo base_url().'assets_sistema/';?>node_modules/jquery/jquery-3.2.1.min.js"></script>
    <!-- Bootstrap tether Core JavaScript -->

    <!--Custom JavaScript -->
    <script src="<?php echo base_url().'assets_sistema/';?>dist/js/custom.min.js"></script>
    <script src="<?php echo base_url().'assets_sistema/';?>dist/js/pages/jquery.PrintArea.js" type="text/JavaScript"></script>
    <script>
    $(document).ready(function() {
        $("#print").click(function() {
            var mode = 'iframe'; //popup
            var close = mode == "popup";
            var options = {
                mode: mode,
                popClose: close
            };
            $("div.printableArea").printArea(options);
        });
    });
    </script>
</body>

</html>


