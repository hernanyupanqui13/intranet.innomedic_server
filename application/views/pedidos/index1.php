

    <?php $total_ventas = $this->db->query("select count(*) as total from ta_ventas  where usuario=".$this->session->userdata("session_id").""); foreach ($total_ventas->result() as $xx) {
                   $total_ventas_ = $xx->total;
   } ?>

    <?php $total_ventasxx = $this->db->query("select count(*) as total from ta_ventas  where estado=3 and  usuario=".$this->session->userdata("session_id").""); foreach ($total_ventasxx->result() as $xx) {
                   $total_ventas_eliminadas = $xx->total;
   } ?>

    <?php $total_ventasxxxxx = $this->db->query("select count(*) as total from ta_ventas  where estado=0 and  usuario=".$this->session->userdata("session_id").""); foreach ($total_ventasxxxxx->result() as $xx) {
                   $total_ventas_enviadas= $xx->total;
   } ?>

    <?php $total_ventasxxxxxxxx = $this->db->query("select count(*) as total from ta_ventas  where estado=2 and  usuario=".$this->session->userdata("session_id").""); foreach ($total_ventasxxxxxxxx->result() as $xx) {
                   $total_ventas_recibidas= $xx->total;
   } ?>

  


    <?php $query_users = $this->db->query("select * from ts_datos_personales a where id_usuario=".$this->session->userdata("session_id")."");
foreach ($query_users->result() as $xx) {
     $nombrex = $xx->nombres." ".$xx->apellido_paterno ." ". $xx->apellido_materno;

 } ?>

<div class="row">
  <div class="col-12">
    <div class="card">
      <div class="card-body">
        <div class="row">
          <div class="col-md-6">
            <?php 
              $date = date("w");
              if ($date==3 || $date==4) { ?>
                <a href="<?php echo base_url().'Mantenimiento/Pedidos/Nuevo_pedido_users/' ?>"  class="btn btn-outline-success btn-rounded btn-md"><i class=" fas fa-plus-circle"></i>&nbsp;Nuevo Pedido</a>
              <?php 
              } else if ($date==0 ||  $date==2  || $date==5 ) { ?>
                <a href="javascript:void(0)"  class="btn btn-outline-success btn-rounded btn-md" onclick="return mensaje_valitor();"><i class=" fas fa-plus-circle"></i>&nbsp;Nuevo Pedido</a>
            <?php } ?>      
          </div>
          <div class="col-md-6">
            <div class="alert alert-danger btn-rounded"> <img src="<?php echo base_url().'assets_sistema/';?>images/users/1.jpg" width="30" class="img-circle" alt="img"> <a href="javascript:void(0);"><span class="font-weight-normal text-dark"><strong>Los pedidos:&nbsp;</strong>Solo se realizan los días miércoles y Jueves de la semana </span></a>
              <button type="button" class="close" data-dismiss="" aria-label="Close"> <span aria-hidden="true">&times;</span> </button>
            </div>
          </div>          
        </div>
      </div>
    </div>
  </div>
</div>









<div class="modal fade" id="staticBackdrop" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
    
      <div class="modal-body">
        <img class="img-fluid" src="<?php echo base_url().'upload/';?>images/habilitar.jpg?=<?php echo rand();?>" alt="">
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-outline-danger btn-rounded" data-dismiss="modal">OK</button>      
      </div>
    </div>
  </div>
</div>


<script>
  function mensaje_valitor() {
    Swal.fire({
        title: '<strong><u>Expiró el tiempo de pedido</u></strong>',
        icon: 'info',
        html:
          'No se puede enviar pedido <b>Por el sistema </b>, ' +
          'Hacercate al Aréa de Logistica para que pueda Solicitarlo ' +
          '<a href="mailto:lsilva@innomedic.pe">lsilva@innomedic.pe</a>; <a href="mailto:htoscano@innomedic.pe">htoscano@innomedic.pe</a>' 
          ,
        showCloseButton: true,
        allowOutsideClick: false,
        showCancelButton: true,
        focusConfirm: false,
        confirmButtonText:
          '<i class="fa fa-thumbs-up"></i> Genial!',
        confirmButtonAriaLabel: 'Thumbs up, great!',
        cancelButtonText:
          '<i class="fa fa-thumbs-down"></i>',
        cancelButtonAriaLabel: 'Thumbs down'
      })
  }
  function mensaje_valitor_xx() {
    Swal.fire({
        title: '<strong><u>Falta confirmar su pedido</u></strong>',
        icon: 'info',
        html:
          'Confirme si recibio su <b>Pedido </b>, SI  o  NO ' +
          'Caso contrario ponte en contacto con área logística ' +
          '<a href="mailto:lsilva@innomedic.pe">lsilva@innomedic.pe</a> ' 
          ,
        showCloseButton: true,
        allowOutsideClick: false,
        showCancelButton: true,
        focusConfirm: false,
        confirmButtonText:
          '<i class="fa fa-thumbs-up"></i> Genial!',
        confirmButtonAriaLabel: 'Thumbs up, great!',
        cancelButtonText:
          '<i class="fa fa-thumbs-down"></i>',
        cancelButtonAriaLabel: 'Thumbs down'
      })
  }
</script>
<div class="row">
	<div class="col-md-12">
		<div class="card">
			<div class="card-body">
        
				<div class="row ">
          <!-- Column -->
          <div class="col-md-4 col-lg-3 col-xl-3">
              <div class="card">
                  <div class="box bg-info text-center">
                      <h1 class="font-light text-white"><?php if ($total_ventas_==0) {
                        echo "0";
                      }else{
                        echo $total_ventas_;
                      }?></h1>
                      <h6 class="text-white">Total de Pedidos</h6>
                  </div>
              </div>
          </div>
          <!-- Column -->
          <div class="col-md-4 col-lg-3 col-xl-3">
              <div class="card">
                  <div class="box bg-success text-center">
                      <h1 class="font-light text-white"><?php echo $total_ventas_recibidas;?></h1>
                      <h6 class="text-white">Recibido</h6>
                  </div>
              </div>
          </div>
          <!-- Column -->


           <!-- Column -->
          <div class="col-md-4 col-lg-3 col-xl-3">
              <div class="card">
                  <div class="box bg-primary text-center">
                      <h1 class="font-light text-white"><?php echo  $total_ventas_enviadas;?></h1>
                      <h6 class="text-white">Enviados</h6>
                  </div>
              </div>
          </div>
          <div class="col-md-4 col-lg-3 col-xl-3">
              <div class="card">
                  <div class="box bg-danger text-center">
                      <h1 class="font-light text-white"><?php echo  $total_ventas_eliminadas;?></h1>
                      <h6 class="text-white">Anulados x Logística</h6>
                  </div>
              </div>
          </div>
          <!-- Column -->
      </div>
      <div class="card-header badge-info">
            <h4 class="m-b-0 text-white">Busqueda de pedido por fecha</h4>
        </div>
        <br>
       <form action="#" method="POST" id="buscar_registro_por_orden_fecha">
                       <div class="row">
                        
                            <div class='col-md-2 text-left' style="display: none;">
                                   <div class="form-group">
                                       <label class="control-label"><b>Numero de comprobante:</b></label>
                                       <input type="text"  class="form-control" placeholder="00001" value="<?php echo $num;?>" name="numcomprobante" id="numcomprobante">
                                   </div>
                            </div>

                            <div class='col-md-10'>
                                <label><b>Desde / Hasta:</b></label>
                               
                                <div class="input-daterange input-group" id="date-range">
                                    <input type="text" class="form-control" name="desde" id='desde' value="<?php echo $desdex;?>" />
                                    <div class="input-group-append">
                                        <span class="input-group-text bg-info b-0 text-white">a</span>
                                    </div>
                                    <input type="text" class="form-control" name="hasta" id='hasta' value="<?php echo $hastax;?>"/>
                                </div>
                            </div>

                            <div class='col-md-2'>
                              <div class="form-group p-2">
                                      <br>
                                       <button type="submit" class="btn btn-success waves-effect waves-light">
                                           <i class="fa fa-search m-r-5"></i><span> Buscar </span>
                                       </button>
                               </div>
                            </div>

                            <div class='col-md-5'>
                               &nbsp;
                            </div>
                            <div class='col-md-3'>
                               <b>Desde:</b> <?php echo $desde;?>
                            </div>
                            <div class='col-md-3'>
                               <b>Hasta:</b> <?php echo $hasta;?>
                            </div>
                            <hr>
                            <div class='col-md-12 text-right'>
                                <h4><b id="total"></b > </h4>
                            </div>
                        
                       </div>
                 </form>

				<div class="table-responsive">
					<table id="demo-foo-accordion" class="table table-bordered m-b-0 toggle-arrow-tiny display nowrap  table-hover table-striped table-bordered" data-filtering="true" data-paging="true" data-sorting="true"  data-paging-size="7" cellspacing="0" width="100%">
						<thead>
							<tr class="footable-filtering"  data-expanded="false">
                  <th data-breakpoints="xs">ID</th>
                  <th data-breakpoints="xs sm">Fecha Pedido</th>
                  <th data-breakpoints="xs sm">Fecha Entregado</th>
                  <th data-breakpoints="xs">Numero de comprobante</th>
              <th data-breakpoints="xs sm ">Tipo de comprobante</th>
                  <th data-breakpoints="xs">Entregado por</th>
                  <th data-breakpoints="xs sm ">Estado</th>
                  <th data-title="Opciones">Opciones</th>
              </tr>
						</thead>
						<tbody>
							<?php $cont =0; foreach ($lista_pedidos as $x) {
								$cont+=1;?>
                 <tr>
                                             <td><?php echo $cont;?></td>
                                    <td><?php echo $x->fecha;?></td>
                                     <td><?php echo $x->fecha_entregado;?></td>
                                    <td>
                                    <?php if($x->estado==0){?>
                                      <a class="" href="javascript:void(0)" onclick="return pedido_en_proceso('<?php echo $x->seriecomprobante." ".correlativo($x->numcomprobante);?>')" data-toggle="tooltip" title="Ver detalle">
                                        <?php echo $x->seriecomprobante." ".correlativo($x->numcomprobante);?>
                                    </a>
                                   <?php }else if($x->estado==3){?>
                                    <a class="" href="javascript:void(0)" onclick="return pedido_en_proceso_eliminar('<?php echo $x->seriecomprobante." ".correlativo($x->numcomprobante);?>')" data-toggle="tooltip" title="Ver detalle">
                                        <?php echo $x->seriecomprobante." ".correlativo($x->numcomprobante);?>
                                    </a>
                                   <?php }else{?>
                                    <a class="" href="<?php echo base_url().'Mantenimiento/Pedidos/detalles_pedido/'.$x->url_view;?>/?fecha_entregado=<?php echo $x->fecha;?>?cliente=<?php echo md5("Evaristo Escudero Huillcamascco");?>?comprobante=<?php echo correlativo($x->numcomprobante);  ?>" data-toggle="tooltip" title="Ver detalle">
                                        <?php echo $x->seriecomprobante." ".correlativo($x->numcomprobante);?>
                                    </a>
                                   <?php } ?>
                                    </td>
                                    <td>
                                    <?php 
                                   // $queryx = $this->db->query("select * from ta_correlativo where Id='2' and  numero='".$x->tipocomprobante."'");
                                    $queryx = $this->db->query("select * from ta_correlativo where Id='2'");
                                    foreach ($queryx->result() as $xx)
                                    {
                                        echo $xx->nombre;
                                    }
                                    ?>
                                    </td>
                                    <td>
                                    <?php 
                                        if ($x->estado==0) {
                                         echo "<span class='label label-info'>Estan tramitando tu pedido</span>";
                                        }else if($x->estado==2){
                                          echo $x->entregado_por;
                                        }
                                    ?>
                                    </td>
                                    <td>
                                    <?php 
                                        if($x->estado ==2){
                                            echo "<span class='label label-success'>Entregado</span>";
                                        }else if ($x->estado ==3) {
                                          echo "<span class='label label-danger'>Anulado</span>";
                                        }else if ($x->estado==0) {
                                          echo "<span class='label label-info'>Pedido Enviado</span>";
                                        }else{
                                           echo "<span class='label label-primary'>Que te valide logistica</span>";
                                        }
                                    ?>
                                    </td>
                                    <td>
                                    <?php if ($x->estado ==2) {?>
                                      
                                    <a class="btn-outline-success btn btn_imprimir_data" Id="<?php echo $x->url_view; ?>" href="javascript:void(0)"><i class="fas fa-print"></i> Ver pedido</a>
                                    <?php }else if ($x->estado==0) {?>

                                     <a class="btn-outline-danger btn " href="javascript:void(0)" onclick="return pregunta_eliminar_temporal(<?php echo $x->Id;?>);"><i class="far fa-times-circle"></i></a>
                                     <a class="btn-outline-secondary btn " Id="<?php echo $x->url_view; ?>" href="<?php echo base_url().'Mantenimiento/Pedidos/editar_pedidos/'.$x->Id;?>"><i class="fas fa-edit"></i></a>
                                    <?php }  ?>
                                    </td>
                                     

                                    
                                </tr>
                
							<?php } ?>
						</tbody>
						
					</table>
				</div>

        <div class="text-center">
          <h4 class="mt-4"><span class="font-weight-bold">Leyenda:</span>  <small>&nbsp;Observación - Anulado - Pendiente</small>&nbsp;<span class="bg-danger btn">&nbsp;&nbsp;</span>&nbsp;<small>&nbsp;Entregado</small>&nbsp;<span class="bg-info btn">&nbsp;&nbsp;</span><small>&nbsp;Nuevo</small>&nbsp;<span class=" btn btn-outline-dark">&nbsp;&nbsp;</span></h4>
        </div>
			</div>
		</div>
	</div>
</div>


<!--registrar nuevo usuaruo-->

		<div  class="modal fade bd-example-modal-xl"  role="dialog" aria-labelledby="myExtraLargeModalLabel" aria-hidden="true" data-backdrop="static">
              <div class="modal-dialog modal-lg">
                <div class="modal-content " >
                  <div class="modal-body">
                    <div class="modal-header">
                      <h5 class="text-dark">Registrar Nuevo Pedido</h5>
                    </div>
                    <div class="modal-body">
                      <form autocomplete="off" action="" role="form" class="form-horizontal form-material" id="user_form_insert" enctype="multipart/form-data">
                        <input type="hidden" name="nombres_completos" value="<?php echo $nombrex; ?>">
                      <div class="row">
                      	<div class="col-md-12">
                      		<label for="">Producto</label><br>
                      		<input type="text" class="btn-rounded btn-block" id="select2xxxx" name="descripcion" placeholder="¿Que producto estas buscando?">
                      		<input type="hidden" name="userid_xxxxxx" id="userid_xxxxxx">
                      	</div>
                      </div> 
                      <div class="row mt-3">
                        <div class="col-md-12">
                          <div class="form-group">
                            <label class="control-label">Unidad Medida</label>
                           <select name="unidad_medida" id="unidad_medida_xxx" class="select2x form-control " style="width: 100%; height:36px;">
                              <option value=""  >--seleccionar--</option>
                           </select>
                         </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group ">
                            <label class="control-label ">Cantidad</label>
                            <input type="number" name="cantidad"  class="form-control redondeado " id="cantidad" placeholder="Ingrese Cantidad" onkeypress="return soloNumeros(event);" maxlength="2">
                         </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group ">
                            <label class="control-label ">Prioridad</label>
                            <select name="prioridad" id="prioridad" class="form-control">
                              <option value="" disabled="" selected="">--seleccione --</option>
                              <option value="Muy Baja">Muy Baja</option>
                              <option value="Baja">Baja</option>
                              <option value="Media">Media</option>
                              <option value="Alta">Alta</option>
                              <option value="Muy Alta">Muy Alta</option>
                            </select>
                         </div>
                        </div>

                        
                      </div>
                      <div class="row text-center">
                      	<input type="hidden" name="fecha_pedido" value="<?php echo date('Y-m-d');?>">
                        <div class="col-md-12">
                          <button type="botton" class="btn btn-outline-danger btn-rounded  btn-md" data-dismiss="modal"> <i class="fas fa-times-circle"></i>&nbsp;Cancelar</button>
                          <button id="submit" type="submit" class="btn btn-outline-success btn-rounded btn-md"><i class=" fas fa-check-circle"></i>&nbsp;Verificar</button>
                        </div>
                      </div>
                    </form>
                    </div>
                  </div>
                </div>
              </div>
      </div>

      <!--mostrando el segundo modal-->

      <div  class="modal fade bd-example-modal-xl_xxx"  role="dialog" aria-labelledby="myExtraLargeModalLabel" aria-hidden="true" data-backdrop="static">
        <div class="modal-dialog modal-lg">
          <div class="modal-content " >
            <div class="modal-body">
              <div class="modal-header"> 
                <h5 class="text-dark">Detalles del Pedido</h5>
              </div>
              <div class="modal-body">
                <div class="alert alert-danger" role="alert">
                  Una vez Verificado ya no se puede actualizar ni eliminar el pedido!
                </div>
                <form autocomplete="off" action="" role="form" class="form-horizontal" id="user_form_insert" enctype="multipart/form-data">
                  <input type="hidden" name="nombres_completos" value="<?php echo $nombrex; ?>">
                  <hr class="m-t-0 m-b-40">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group row">
                                <label class="control-label text-right col-md-3">Producto:</label>
                                <div class="col-md-9">
                                    <p class="form-control-static" id="producto_list"> </p>
                                    <input type="hidden" class="btn-rounded btn-block" id="producto_list_x" name="descripcion" placeholder="¿Que producto estas buscando?">
                                </div>
                            </div>
                        </div>
                        <!--/span-->
                        <div class="col-md-6">
                            <div class="form-group row">
                                <label class="control-label text-right col-md-3">Unidad Medida:</label>
                                <div class="col-md-9">
                                    <p class="form-control-static" id="unidad_medida_list"> </p>
                                     <input type="hidden" id="unidad_medida_list_x" name="unidad_medida">
                                </div>
                            </div>
                        </div>
                        
                    </div>
                    <div class="row">
                      <div class="col-md-6">
                            <div class="form-group row">
                                <label class="control-label text-right col-md-3">Cantidad:</label>
                                <div class="col-md-4">
                                    <p class="form-control-static" id="precio_list">  </p>
                                      <input type="hidden" name="cantidad" class="form-control redondeado " id="precio_list_x" placeholder="Ingrese Cantidad" onkeypress="return soloNumeros(event);" maxlength="2">
                                </div>
                            </div>
                        </div>
                        <!--Lista prioridad-->
                        <div class="col-md-6">
                            <div class="form-group row">
                                <label class="control-label text-right col-md-3">Prioridad:</label>
                                <div class="col-md-9">
                                     <p class="form-control-static" id="prioridad_id">  </p>
                                      <input type="hidden" name="prioridad" class="form-control redondeado " id="prioridad_lis_x" placeholder="Ingrese Cantidad" onkeypress="return soloNumeros(event);">
                                </div>
                            </div>
                        </div>
                        <!--/span-->
                    </div>
               
                
                <div class="row text-center">
                  <input type="hidden" name="fecha_pedido" value="<?php echo date('Y-m-d');?>">
                  <div class="col-md-12">
                    <button type="botton" class="btn btn-outline-danger btn-rounded  btn-md" id="valiudaciones"> <i class="fas fa-times-circle"></i>&nbsp;Verificar Nuevamente</button>
                    <button id="submit" type="submit" class="btn btn-outline-success btn-rounded btn-md"><i class=" fas fa-check-circle"></i>&nbsp;Registrar Pedido</button>
                  </div>
                </div>
              </form>
              </div>
            </div>
          </div>
        </div>
      </div>
      


      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
                    <script>
                       $(document).on("click",".btn_imprimir_data",function(){

                            valor_id =  $(this).attr("Id"); 
                            window.open("<?php echo base_url().'Mantenimiento/Pedidos/comprobantefactura/'?>"+valor_id,'targetWindow','toolbar=no,location=no,status=no,menubar=no,scrollbars=yes,resizable=yes,width=900,height=750');

                         
                        });
                       $(document).ready(function() {
                           $(document).on('submit', '#buscar_registro_por_orden_fecha', function(event) {

                           event.preventDefault();


                           /* Act on the event */
                           $.ajax({
                               url: '<?php echo base_url().'Mantenimiento/Pedidos/buscar/';?>',
                               type: 'POST',
                               data: $("form").serialize()
                           })
                           .done(function(data) {
                              // console.log(json.retorno);
                               var json = JSON.parse(data);
                                //console.log(json.url);
                                window.location.replace(json.retorno);
                               
                                 
                           })
                           .fail(function() {
                               console.log("error");
                           })
                           .always(function() {
                               console.log("complete");
                           });
                           
                       });
                       });

                       demo = $('#demo-foo-accordion tbody tr:not(.footable-filtered)').length

                       setTimeout(function() {
                        $("#total").html(`<div class="alert alert-success alert-dismissible fade show" role="alert">
                              <strong>Total: </strong> <strong>`+demo+`</strong> Pedidos a la fecha <strong><?php echo date('d-m-Y');?></strong>
                              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                              </button>
                            </div>`);

                       }, 1000);


                      





                    </script>


<script>
        function pedido_en_proceso(e) {
          Swal.fire({
          icon: 'info',
          title: 'Oops...',
          text: 'El pedido sigue en proceso',
          footer: '<a href="javascript:void(0)">Tu numero de Pedido es '+e+'</a>'
        })
        }
        function pedido_en_proceso_eliminar(e) {
          Swal.fire({
          icon: 'error',
          title: 'Oops...',
          text: 'El pedido se a eliminado Nº pedido es '+e+'',
          footer: '<a href="javascript:void(0)">Si es un error comunicate con aréa de logistica </a>'
        })
        }
      </script>

		<!--<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>


            <!--valñidaciones-->

            <script type="text/javascript">
                                   
                      function soloNumeros(e)
                      {
                         var key = window.Event ? e.which : e.keyCode
                          return ((key >= 48 && key <= 57) || (key==8))
                      }

                      function sololetras(e) {
                            if(e.key.match(/[a-zñçáéíóú\s]/i)===null) {
                              // Si la tecla pulsada no es la correcta, eliminado la pulsación
                              e.preventDefault();
                          }
                      }
                      function sololetrasnumeros(e) {
                        if(e.key.match(/[a-z0-9ñçáéíóú,.\s]/i)===null) {
                              // Si la tecla pulsada no es la correcta, eliminado la pulsación
                              e.preventDefault();
                          }
                      }

                      function pregunta_eliminar_temporal(e) {

                        Swal.fire({
                            title: 'Esta seguro de anular?',
                            text: "Al aceptar se eliminara por completo el pedido realizado",
                            icon: 'warning',
                            showCancelButton: true,
                            confirmButtonColor: '#3085d6',
                            cancelButtonColor: '#d33',
                            confirmButtonText: 'Anular',
                            cancelButtonText: "Cancelar", 
                          }).then((result) => {
                            if (result.value) {
                               window.location = "<?php echo base_url().'Mantenimiento/Pedidos/eliminar_temporal_delete/'?>"+e;
                            }
                            return false;
                          })
                          
                      }

                      $(document).ready(function() {
                        $("#valiudaciones").click(function (e) {
                           e.preventDefault();
                          $(".bd-example-modal-xl_xxx").modal('hide')
                        
                    
                          $(".bd-example-modal-xl").modal('show');

                          }); 
                      });

                  
            </script>

                   
               
                <script>  

                  $(document).ready(function () {
                      $('#submit').on('click', function(e) {

                        e.preventDefault();
                        $(".bd-example-modal-xl .close").click()
                        

                        var select2xx = $("#select2xxxx").val();
                        var unidad_medida_xxx = $("#unidad_medida_xxx").val();
                        var cantidad = $('#cantidad').val();  
                        var prioridad = $("#prioridad").val();
                        //descripcion producto
                        var city = $('#unidad_medida_xxx option:selected').html();
                        var city_id = $('#unidad_medida_xxx option:selected').val();

                        //prioridad
                        var prioridad_id = $('#prioridad option:selected').html();
                        var prioridad_list = $('#prioridad option:selected').val();
                      //  var unidad_medida_xxxxx =$("#unidad_medida_xxx").text();
                        $("#producto_list").html(select2xx);
                        $("#unidad_medida_list").html(city);
                        $("#precio_list").html(cantidad);
                        $("#prioridad_id").html(prioridad_id);

                        //mando aregistrar
                        $("#producto_list_x").val(select2xx);
                        $("#unidad_medida_list_x").val(city_id);
                        $("#precio_list_x").val(cantidad);
                        $("#prioridad_lis_x").val(prioridad_list);


                        

                      if( select2xx == null || select2xx == 0 ) {
                              const Toast = Swal.mixin({
                                toast: true,
                                position: 'top-end',
                                showConfirmButton: false,
                                timer: 3000,
                                timerProgressBar: true,
                                onOpen: (toast) => {
                                  toast.addEventListener('mouseenter', Swal.stopTimer)
                                  toast.addEventListener('mouseleave', Swal.resumeTimer)
                                }
                              })

                              Toast.fire({
                                icon: 'error',
                                title: 'Ingrese Producto y precione "enter"'
                              })
                            return false;
                          }

                  
                       if( unidad_medida_xxx == null || unidad_medida_xxx == 0 ) {
                              const Toast = Swal.mixin({
                                toast: true,
                                position: 'top-end',
                                showConfirmButton: false,
                                timer: 3000,
                                timerProgressBar: true,
                                onOpen: (toast) => {
                                  toast.addEventListener('mouseenter', Swal.stopTimer)
                                  toast.addEventListener('mouseleave', Swal.resumeTimer)
                                }
                              })

                              Toast.fire({
                                icon: 'error',
                                title: 'Seleccione Unidad Medida'
                              })
                            return false;
                          }


                          //Validar para que ingrese  perfil
                          //validacion de dni 
                          if (cantidad == null || cantidad.length == 0 || /^\s+$/.test(cantidad) ) {
                               const Toast = Swal.mixin({
                                  toast: true,
                                  position: 'top-end',
                                  showConfirmButton: false,
                                  timer: 3000,
                                  timerProgressBar: true,
                                  onOpen: (toast) => {
                                    toast.addEventListener('mouseenter', Swal.stopTimer)
                                    toast.addEventListener('mouseleave', Swal.resumeTimer)
                                  }
                                })

                                Toast.fire({
                                  icon: 'error',
                                  title: 'Ingrese Cantidad'
                                })
                          return false;
                         }


                        if (prioridad == null || prioridad == 0) {
                          const Toast = Swal.mixin({
                              toast: true,
                              position: 'top-end',
                              showConfirmButton: false,
                              timer: 3000,
                              timerProgressBar: true,
                              onOpen: (toast) => {
                                  toast.addEventListener('mouseenter', Swal.stopTimer)
                                  toast.addEventListener('mouseleave', Swal.resumeTimer)
                              }
                          })

                          Toast.fire({
                              icon: 'error',
                              title: 'Seleccione Tipo de Prioridad'
                          })
                          return false;
                      }


                        $('.bd-example-modal-xl_xxx').modal('show');
                      });
                      
                  });


                        $(document).ready(function() {
                           $(document).on('submit', '#buscar_registro_por_orden_fecha', function(event) {

                           event.preventDefault();


                           /* Act on the event */
                           $.ajax({
                               url: '<?php echo base_url().'Mantenimiento/Pedidos/buscar/';?>',
                               type: 'POST',
                               data: $("form").serialize()
                           })
                           .done(function(data) {
                              // console.log(json.retorno);
                               var json = JSON.parse(data);
                                //console.log(json.url);
                                window.location.replace(json.retorno);
                               
                                 
                           })
                           .fail(function() {
                               console.log("error");
                           })
                           .always(function() {
                               console.log("complete");
                           });
                           
                       });
                       });

                  $(document).on('submit', '#user_form_insert', function(event) {
                      event.preventDefault();
                      var select2xx = $("#select2xxxx").val();
                      var unidad_medida_xxx = $("#unidad_medida_xxx").val();
                      var cantidad = $('#cantidad').val();
                      var prioridad = $("#prioridad").val();

                      if (select2xx == null || select2xx == 0) {
                          const Toast = Swal.mixin({
                              toast: true,
                              position: 'top-end',
                              showConfirmButton: false,
                              timer: 3000,
                              timerProgressBar: true,
                              onOpen: (toast) => {
                                  toast.addEventListener('mouseenter', Swal.stopTimer)
                                  toast.addEventListener('mouseleave', Swal.resumeTimer)
                              }
                          })

                          Toast.fire({
                              icon: 'error',
                              title: 'Ingrese Producto y precione "enter"'
                          })
                          return false;
                      }

                      if (unidad_medida_xxx == null || unidad_medida_xxx == 0) {
                          const Toast = Swal.mixin({
                              toast: true,
                              position: 'top-end',
                              showConfirmButton: false,
                              timer: 3000,
                              timerProgressBar: true,
                              onOpen: (toast) => {
                                  toast.addEventListener('mouseenter', Swal.stopTimer)
                                  toast.addEventListener('mouseleave', Swal.resumeTimer)
                              }
                          })

                          Toast.fire({
                              icon: 'error',
                              title: 'Seleccione Unidad Medida'
                          })
                          return false;
                      }



                      //Validar para que ingrese  perfil
                      //validacion de dni 
                      if (cantidad == null || cantidad.length == 0 || /^\s+$/.test(cantidad)) {
                          const Toast = Swal.mixin({
                              toast: true,
                              position: 'top-end',
                              showConfirmButton: false,
                              timer: 3000,
                              timerProgressBar: true,
                              onOpen: (toast) => {
                                  toast.addEventListener('mouseenter', Swal.stopTimer)
                                  toast.addEventListener('mouseleave', Swal.resumeTimer)
                              }
                          })

                          Toast.fire({
                              icon: 'error',
                              title: 'Ingrese Cantidad'
                          })
                          return false;
                      }

                      if (prioridad == null || prioridad == 0) {
                          const Toast = Swal.mixin({
                              toast: true,
                              position: 'top-end',
                              showConfirmButton: false,
                              timer: 3000,
                              timerProgressBar: true,
                              onOpen: (toast) => {
                                  toast.addEventListener('mouseenter', Swal.stopTimer)
                                  toast.addEventListener('mouseleave', Swal.resumeTimer)
                              }
                          })

                          Toast.fire({
                              icon: 'error',
                              title: 'Seleccione Tipo de Prioridad'
                          })
                          return false;
                      }


                      Swal.fire({
                          title: '¿Estas seguro(a)?',
                          text: "¡No podrás eliminar este pedido ni actualizar!",
                          icon: 'warning',
                          showCancelButton: true,
                          confirmButtonColor: '#3085d6',
                          cancelButtonColor: '#d33',
                          confirmButtonText: 'Realizar Pedido!',
                          cancelButtonText: 'No, Cancelar'
                        }).then((result) => {
                          if (result.value) {
                            //dewsde
                             $.ajax({
                                url: "<?php echo base_url().'Mantenimiento/Pedidos/Agregar_nuevo/'?>",
                                method: 'POST',
                                data: new FormData(this),
                                contentType: false,
                                processData: false,
                                success: function(data) {
                                    var json = JSON.parse(data);

                                    Swal.fire({
                                        title: 'Muy Bien?',
                                        text: '' + json.mensaje + '',
                                        icon: 'success',
                                        showCancelButton: false,
                                        confirmButtonColor: '#3085d6',
                                        cancelButtonColor: '#d33',
                                        confirmButtonText: 'OK'
                                    }).then((result) => {
                                        if (result.value) {

                                        }
                                    })

                                   // $(".bd-example-modal-xl").modal('hide'); //ocultamos el modal
                                    //clear on focus
                                    $('#usuario').val("");
                                    $('#picture').val("");
                                    //lo maximo estaba buscandp
                                    location.href = "<?php echo base_url().'Mantenimiento/Pedidos/';?>";
                                    //  $("#div_load").load(location.href+" #div_load>*","");                           


                                },
                                statusCode: {
                                    400: function(xhr) {

                                        var json = JSON.parse(xhr.responseText);
                                        if (json.error) {
                                            Swal.fire({
                                                title: 'Lo siento mucho',
                                                text: "" + json.error + "",
                                                icon: 'warning',
                                                showCancelButton: false,
                                                confirmButtonColor: '#3085d6',
                                                cancelButtonColor: '#d33',
                                                confirmButtonText: 'OK'
                                            }).then((result) => {
                                                if (result.value) {

                                                }
                                            })
                                            $('#btnSave_x').html('<i class="fas fa-circle-notch"></i> Reintentar'); //change button text
                                            $('#btnSave_x').attr('disabled', false);

                                              $(".bd-example-modal-xl_xxx").modal('hide')
                                              $(".bd-example-modal-xl").modal('show');
                                            /* $("#alert").html('<div class="alert alert-success text-center" id="alerta" role="alert">'+json.alerta+'</div>'); */
                                        }

                                    },
                                    error: function(jqXHR, textStatus, errorThrown) {
                                        Swal.fire({
                                            title: 'Lo siento mucho',
                                            text: "Algo paso con el sistema Vuelva a intentar una vez mas",
                                            icon: 'warning',
                                            showCancelButton: false,
                                            confirmButtonColor: '#3085d6',
                                            cancelButtonColor: '#d33',
                                            confirmButtonText: 'Ok!(︶︿︶)!'
                                        }).then((result) => {
                                            if (result.value) {

                                            }
                                        })
                                    }
                                }


                            });  

                            //hasta aqui
                          }
                        })
       
                  });  

                //Validar si recibio el producto o no


              

              $(document).on('change', '#myform', function() {


                if ($("#mandar_xxx").val()==2) {
                  Swal.fire({
                      title: 'Estas seguro?',
                      text: "¡Estas seguro que recibiste tu pedido!",
                      icon: 'warning',
                      showCancelButton: true,
                      allowOutsideClick: false,
                      confirmButtonColor: '#3085d6',
                      cancelButtonColor: '#d33',
                      cancelButtonText: 'No',
                      confirmButtonText: 'Si,lo estoy!'
                    }).then((result) => {
                      if (result.value) {
                        //desde aqui
                        $.ajax({ 
                            url: "<?php echo base_url().'Mantenimiento/Pedidos/actualizar_pedido_recibido_si_o_no/';?>",// create an AJAX call...
                            method:'POST',  
                                  data:new FormData(this),  
                                  contentType:false,  
                                  processData:false, 
                                 }).done(function() {
                                  Swal.fire(
                            'Muy Bien',
                            'Se realizo de Manera Correcta',
                            'success'
                          )
                               $("#demo-foo-accordion").load(location.href+" #demo-foo-accordion>*","");
                        console.log("success");
                        })
                        .fail(function() {
                          console.log("error");
                        })
                        .always(function() {
                          console.log("complete");
                         /* setTimeout(function () { $('.table').footable(); }, 1000);*/
                          
                        });

                        //hasta aqui
                      }
                    })
                  }else{
                    Swal.fire({
                      title: 'Estas seguro?',
                      text: "¡Estas seguro que no recibiste tu pedido!",
                      icon: 'warning',
                      showCancelButton: true,
                      allowOutsideClick: false,
                      confirmButtonColor: '#3085d6',
                      cancelButtonColor: '#d33',
                      cancelButtonText: 'No',
                      confirmButtonText: 'Si, seguro!'
                    }).then((result) => {
                      if (result.value) {
                        //desde aqui
                        $.ajax({ 
                            url: "<?php echo base_url().'Mantenimiento/Pedidos/actualizar_pedido_recibido_si_o_no/';?>",// create an AJAX call...
                            method:'POST',  
                                  data:new FormData(this),  
                                  contentType:false,  
                                  processData:false, 
                                 }).done(function() {
                                  Swal.fire(
                            'Muy Bien',
                            'Se realizo de Manera Correcta',
                            'success'
                          )
                               $("#demo-foo-accordion").load(location.href+" #demo-foo-accordion>*","");
                        console.log("success");
                        })
                        .fail(function() {
                          console.log("error");
                        })
                        .always(function() {
                          console.log("complete");
                        /*  setTimeout(function () { $('.table').footable(); }, 1000);*/
                          
                        });

                        //hasta aqui
                      }
                    })
                  }
                  
              });

                </script> 




