<?php $query = $this->db->query("select *,count(*) as total,
   sum(status='1') as activos,
   sum(status='2') as pendientes,
   sum(status='3') as observados,
   sum(status='4') as enviados,
   sum(status='5') as anulados
    from ts_pedidos where id_usuario=".$this->session->userdata("session_id")."");
   foreach ($query->result() as $xx) {
      $cantidad_usuariox = $xx->total;
      $activos_x = $xx->activos;
      $pendientes_x = $xx->pendientes;
      $observados_x = $xx->observados;
      $enviados = $xx->enviados;
      $anulados = $xx->anulados;
      $xxx= $xx->x;
      $estado_xx = $xx->status;
     
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
                  <?php if ($xxx==1) {?>
                    <a href="javascript:void(0)"  class="btn btn-outline-success btn-rounded btn-md" onclick="return mensaje_valitor_xx();"><i class=" fas fa-plus-circle"></i>&nbsp;Nuevo Pedido</a>
                    <?php }else{?>
                      <?php $date = date("w");
                       if ($date == 1 || $date==3 || $date==4 || $date==5  $date==6) {?>
                        <a href="<?php echo base_url().'Mantenimiento/Pedidos/Nuevo_pedido_users/' ?>"  class="btn btn-outline-success btn-rounded btn-md"><i class=" fas fa-plus-circle"></i>&nbsp;Nuevo Pedido</a> 
                        <!--<a href="javascript:void(0)" data-toggle="modal" data-target=".bd-example-modal-xl" class="btn btn-outline-success btn-rounded btn-md"><i class=" fas fa-plus-circle"></i>&nbsp;Nuevo Pedido</a> -->
                      <?php }else if($date==0  || $date==2 ){?>
                          <a href="javascript:void(0)"  class="btn btn-outline-success btn-rounded btn-md" onclick="return mensaje_valitor();"><i class=" fas fa-plus-circle"></i>&nbsp;Nuevo Pedido</a>
                  <?php }else{} ?>
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
          'Ponte en contacto con área logística ' +
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
          <div class="col-md-4 col-lg-3 col-xl-2">
              <div class="card">
                  <div class="box bg-info text-center">
                      <h1 class="font-light text-white"><?php if ($cantidad_usuariox==0) {
                        echo "";
                      }else{
                        echo $cantidad_usuariox;
                      }?></h1>
                      <h6 class="text-white">Entradas totales</h6>
                  </div>
              </div>
          </div>
          <!-- Column -->
          <div class="col-md-4 col-lg-3 col-xl-2">
              <div class="card">
                  <div class="box bg-success text-center">
                      <h1 class="font-light text-white"><?php echo $activos_x;?></h1>
                      <h6 class="text-white">Recibido</h6>
                  </div>
              </div>
          </div>
          <!-- Column -->
          <div class="col-md-4 col-lg-3 col-xl-2">
              <div class="card">
                  <div class="box bg-warning text-center">
                      <h1 class="font-light text-white"><?php echo $pendientes_x;?></h1>
                      <h6 class="text-white">Pendientes</h6>
                  </div>
              </div>
          </div>
          <!-- Column -->
          <div class="col-md-4 col-lg-3 col-xl-2">
              <div class="card">
                  <div class="box bg-dark text-center">
                      <h1 class="font-light text-white"><?php echo  $observados_x;?></h1>
                      <h6 class="text-white">Observados</h6>
                  </div>
              </div>
          </div>
           <!-- Column -->
          <div class="col-md-4 col-lg-3 col-xl-2">
              <div class="card">
                  <div class="box bg-primary text-center">
                      <h1 class="font-light text-white"><?php echo  $enviados;?></h1>
                      <h6 class="text-white">Enviados</h6>
                  </div>
              </div>
          </div>
          <div class="col-md-4 col-lg-3 col-xl-2">
              <div class="card">
                  <div class="box bg-danger text-center">
                      <h1 class="font-light text-white"><?php echo  $anulados;?></h1>
                      <h6 class="text-white">Anulados</h6>
                  </div>
              </div>
          </div>
          <!-- Column -->
      </div>
				<div class="table-responsive">
					<table id="demo-foo-accordion" class="table table-bordered m-b-0 toggle-arrow-tiny display nowrap  table-hover table-striped table-bordered" data-filtering="true" data-paging="true" data-sorting="true"  data-paging-size="7" cellspacing="0" width="100%">
						<thead>
							<tr>
								<th data-sort-ignore="false">#</th>
								<th data-toggle="true"> Cantidad</th>
                <th data-hide="phone"> Unidad Medida </th>
                <th data-breakpoints="xs sm md "> Descripción </th>
                <th>Fecha Entregado</th>
                <th data-breakpoints="lg xs sm md">Observaciones</th>
                <th data-breakpoints="lg xs sm md">Cantidad Entregado</th>
                <th data-breakpoints="xs"> Estado Pedido </th>
                <th>Confirmar P.R</th>
							</tr>
						</thead>
						<tbody>
							<?php $count =0; foreach ($lista_pedidos as $xx) {
								$count+=1;?>
                <?php if ($xx->status==4) {?>
                 <tr>
                  <td><?php echo $count; ?></td>
                  <td><?php echo $xx->cantidad; ?></td>
                  <td><?php echo $xx->unidad_medida_xx;?></td>
                  <td><?php echo $xx->descripcion;?></td>
                  <td><?php echo $xx->fecha_entregado;?></td>
                  <td ><?php if ($xx->status==5) {?>
                    <span >Se elimino el pedido, por la área Logística.  Eliminado por: <a href="javascript:void()" class="text-white">Luis Armando</a></span>
                  <?php } else{?>
                    <?php if ($xx->observacion=="" || $xx->observacion==null) {
                    echo "No hay ninguna Observacion de parte de Logistica";
                  }else{
                    echo "$xx->observacion";
                  }?>
                  <?php } ?></td>
                 <td><?php if ($xx->status==4) {
                    echo "0";
                  }else if($xx->status==1){
                    echo "$xx->cantidad";
                  }else if($xx->status==2){
                    echo "$xx->cantidad_entregada";
                  }else if($xx->status==3){
                    echo "$xx->cantidad_entregada";
                  }else{
                    echo "Cantidad Anulada";
                  } ?>
                  </td>
                  <td>
                    <?php if ($xx->status==5) {
                       echo "<span class='label label-sucess'>Anulado</span>";
                    }else if($xx->status==2){
                       echo "<span class='label label-primary'>Pediente</span>";
                    }else{?>
                      <?php if ($xx->x==1) {?>
                         <form action="" id="myform">
                            <input type="hidden" value="<?php echo $xx->Id;?>" name="id" id="id">
                            <select name="estado" id="mandar_xxx" class="form-control" style="width: 70%;">
                              <option value="" selected="" disabled="">--Recibiste tu pedido --</option>
                              <option value="2">SI</option>
                              <option value="3">NO</option>
                            </select>
                          </form>
                      <?php }else if($xx->x==2){
                        echo "<span class='label label-success'>Pedido Recibido</span>";
                      }else if ($xx->x==3) {
                        echo "<span class='label label-danger'>Pedido No recibido</span>";
                      }else{
                        echo "<span class='label label-success'>Tramitando tu pedido</span>";
                      } ?>
                    <?php } ?>
                  </td>
                  <td><?php if ($xx->status==1) {
                        echo "<span class='label label-primary'>Recibido</span>";
                    }else if($xx->status==2){
                        echo "<span class='label label-primary'>Pendiente</span>";
                    }else if($xx->status==3){
                        echo "<span class='label label-warning'>Observado</span>";
                    }else if($xx->status==4){
                        echo "<span class='label label-info'>Enviado</span>";
                    }else{
                       echo "<span class='label label-danger'>Anulado</span>";
                    } ?>
                      
                    </td>
                    
                </tr>
              <?php }else if($xx->status==2 || $xx->status==5){?>
                <tr class="bg-danger text-white">
                  <td><?php echo $count; ?></td>
                  <td><?php echo $xx->cantidad; ?></td>
                  <td><?php echo $xx->unidad_medida_xx;?></td>
                  <td><?php echo $xx->descripcion;?></td>
                  <td><?php echo $xx->fecha_entregado;?></td>
                  <td >
                    <?php if ($xx->status==5) {?>
                    <span >Se elimino el pedido, por la área Logística.  Eliminado por: <a href="javascript:void()" class="text-white">Luis Armando</a></span>
                  <?php } else{?>
                    <?php if ($xx->observacion=="" || $xx->observacion==null) {
                    echo "No hay ninguna Observacion de parte de Logistica";
                  }else{
                    echo "$xx->observacion";
                  }?>
                  <?php } ?>
                </td>
                  <td><?php if ($xx->status==4) {
                    echo "0";
                  }else if($xx->status==1){
                    echo "$xx->cantidad";
                  }else if($xx->status==2){
                    echo "0";
                  }else if($xx->status==3){
                    echo "$xx->cantidad_entregada";
                  }else{
                    echo "Cantidad Anulada";
                  } ?>
                  </td>
                  <td><?php if ($xx->status==1) {
                        echo "<span class='label label-primary'>Recibido</span>";
                    }else if($xx->status==2){
                        echo "<span class='label label-primary'>Pendiente</span>";
                    }else if($xx->status==3){
                        echo "<span class='label label-warning'>Observado</span>";
                    }else if($xx->status==4){
                        echo "<span class='label label-info'>Enviado</span>";
                    }else{
                       echo "<span class='label label-info'>Anulado</span>";
                    } ?>
                    
                      
                    </td>
                    <td>
                      <?php if ($xx->status==5) {
                       echo "<span class='label label-info'>Anulado</span>";
                    }else if($xx->status==2){
                       echo "<span class='label label-primary'>Pediente</span>";
                    }else{?>
                      <?php if ($xx->x==1) {?>
                         <form action="" id="myform">
                            <input type="hidden" value="<?php echo $xx->Id;?>" name="id" id="id">
                            <select name="estado" id="mandar_xxx" class="form-control" style="width: 70%;">
                              <option value="" selected="" disabled="">--Recibiste tu pedido --</option>
                              <option value="2">SI</option>
                              <option value="3">NO</option>
                            </select>
                          </form>
                      <?php }else if($xx->x==2){
                        echo "<span class='label label-success'>Pedido Recibido</span>";
                      }else if ($xx->x==3) {
                        echo "<span class='label label-danger'>Pedido No recibido</span>";
                      }else{
                        echo "<span class='label label-success'>Tramitando tu pedido</span>";
                      } ?>
                    <?php } ?>
                    </td>
                </tr>
              <?php } else if($xx->status==1){ ?>
                <tr class="bg-info text-white">
                  <td><?php echo $count; ?></td>
                  <td><?php echo $xx->cantidad; ?></td>
                  <td><?php echo $xx->unidad_medida_xx;?></td>
                  <td><?php echo $xx->descripcion;?></td>
                  <td><?php echo $xx->fecha_entregado;?></td>
                  <td ><?php if ($xx->status==5) {?>
                    <span >Se elimino el pedido, por la área Logística.  Eliminado por: <a href="javascript:void()" class="text-white">Luis Armando</a></span>
                  <?php } else{?>
                    <?php if ($xx->observacion=="" || $xx->observacion==null) {
                    echo "No hay ninguna Observacion de parte de Logistica";
                  }else{
                    echo "$xx->observacion";
                  }?>
                  <?php } ?></td>
                  <td><?php if ($xx->status==4) {
                    echo "0";
                  }else if($xx->status==1){
                    echo "$xx->cantidad";
                  }else if($xx->status==2){
                    echo "$xx->cantidad_entregada";
                  }else if($xx->status==3){
                    echo "$xx->cantidad_entregada";
                  }else{
                    echo "Cantidad Anulada";
                  } ?>
                  </td>
                  <td>
                     <?php if ($xx->status==5) {
                       echo "<span class='label label-sucess'>Anulado</span>";
                    }else if($xx->status==2){
                       echo "<span class='label label-primary'>Pediente</span>";
                    }else{?>
                      <?php if ($xx->x==1) {?>
                         <form action="" id="myform">
                            <input type="hidden" value="<?php echo $xx->Id;?>" name="id" id="id">
                            <select name="estado" id="mandar_xxx" class="form-control" style="width: 70%;">
                              <option value="" selected="" disabled="">--Recibiste tu pedido --</option>
                              <option value="2">SI</option>
                              <option value="3">NO</option>
                            </select>
                          </form>
                      <?php }else if($xx->x==2){
                        echo "<span class='label label-success'>Pedido Recibido</span>";
                      }else if ($xx->x==3) {
                        echo "<span class='label label-danger'>Pedido No recibido</span>";
                      }else{
                        echo "<span class='label label-success'>Tramitando tu pedido</span>";
                      } ?>
                    <?php } ?>
                    </td>
                  <td><?php if ($xx->status==1) {
                        echo "<span class='label label-success'>Recibido</span>";
                    }else if($xx->status==2){
                        echo "<span class='label label-primary'>Pendiente</span>";
                    }else if($xx->status==3){
                        echo "<span class='label label-warning'>Observado</span>";
                    }else if($xx->status==4){
                        echo "<span class='label label-info'>Enviado</span>";
                    }else{
                       echo "<span class='label label-danger'>Anulado</span>";
                    } ?>
                     
                      
                    </td>
                    
                </tr>

              <?php }else if ($xx->observacion=="" || $xx->observacion==null) {?>
                <tr class="0">
                  <td><?php echo $count; ?></td>
                  <td><?php echo $xx->cantidad; ?></td>
                  <td><?php echo $xx->unidad_medida_xx;?></td>
                  <td><?php echo $xx->descripcion;?></td>
                  <td><?php echo $xx->fecha_entregado;?></td>
                  <td ><?php if ($xx->status==5) {?>
                    <span >Se elimino el pedido, por la área Logística.  Eliminado por: <a href="javascript:void()" class="text-white">Luis Armando</a></span>
                  <?php } else{?>
                    <?php if ($xx->observacion=="" || $xx->observacion==null) {
                    echo "No hay ninguna Observacion de parte de Logistica";
                  }else{
                    echo "$xx->observacion";
                  }?>
                  <?php } ?></td>
                  <td><?php if ($xx->status==4) {
                    echo "0";
                  }else if($xx->status==1){
                    echo "$xx->cantidad";
                  }else if($xx->status==2){
                    echo "$xx->cantidad_entregada";
                  }else if($xx->status==3){
                    echo "$xx->cantidad_entregada";
                  }else{
                    echo "Cantidad Anulada";
                  } ?>
                  </td>
                  <td>
                     <?php if ($xx->status==5) {
                       echo "<span class='label label-sucess'>Anulado</span>";
                    }else if($xx->status==2){
                       echo "<span class='label label-primary'>Pediente</span>";
                    }else{?>
                      <?php if ($xx->x==1) {?>
                         <form action="" id="myform">
                            <input type="hidden" value="<?php echo $xx->Id;?>" name="id" id="id">
                            <select name="estado" id="mandar_xxx" class="form-control" style="width: 70%;">
                              <option value="" selected="" disabled="">--Recibiste tu pedido --</option>
                              <option value="2">SI</option>
                              <option value="3">NO</option>
                            </select>
                          </form>
                      <?php }else if($xx->x==2){
                        echo "<span class='label label-success'>Pedido Recibido</span>";
                      }else if ($xx->x==3) {
                        echo "<span class='label label-danger'>Pedido No recibido</span>";
                      }else{
                        echo "<span class='label label-success'>Tramitando tu pedido</span>";
                      } ?>
                    <?php } ?>
                  </td>
                  <td><?php if ($xx->status==1) {
                        echo "<span class='label label-primary'>Recibido</span>";
                    }else if($xx->status==2){
                        echo "<span class='label label-primary'>Pendiente</span>";
                    }else if($xx->status==3){
                        echo "<span class='label label-warning'>Observado</span>";
                    }else if($xx->status==4){
                        echo "<span class='label label-info'>Enviado</span>";
                    }else{
                       echo "<span class='label label-danger'>Anulado</span>";
                    } ?>
                     
                      
                    </td>
                    
                </tr>
               <?php  }else {?>
                <tr class="bg-danger text-white">
                  <td><?php echo $count; ?></td>
                  <td><?php echo $xx->cantidad; ?></td>
                  <td><?php echo $xx->unidad_medida_xx;?></td>
                  <td><?php echo $xx->descripcion;?></td>
                  <td><?php echo $xx->fecha_entregado;?></td>
                  <td ><?php if ($xx->status==5) {?>
                    <span >Se elimino el pedido, por la área Logística.  Eliminado por: <a href="javascript:void()" class="text-white">Luis Armando</a></span>
                  <?php } else{?>
                    <?php if ($xx->observacion=="" || $xx->observacion==null) {
                    echo "No hay ninguna Observacion de parte de Logistica";
                  }else{
                    echo "$xx->observacion";
                  }?>
                  <?php } ?></td>
                  <td><?php if ($xx->status==4) {
                    echo "0";
                  }else if($xx->status==1){
                    echo "$xx->cantidad";
                  }else if($xx->status==2){
                    echo "$xx->cantidad_entregada";
                  }else if($xx->status==3){
                    echo "$xx->cantidad_entregada";
                  }else{
                    echo "Cantidad Anulada";
                  } ?>
                  </td>

                  <td>
                    <?php if ($xx->status==5) {
                       echo "<span class='label label-sucess'>Anulado</span>";
                    }else if($xx->status==2){
                       echo "<span class='label label-primary'>Pediente</span>";
                    }else{?>
                      <?php if ($xx->x==1) {?>
                         <form action="" id="myform">
                            <input type="hidden" value="<?php echo $xx->Id;?>" name="id" id="id">
                            <select name="estado" id="mandar_xxx" class="form-control" style="width: 70%;">
                              <option value="" selected="" disabled="">--Recibiste tu pedido --</option>
                              <option value="2">SI</option>
                              <option value="3">NO</option>
                            </select>
                          </form>
                      <?php }else if($xx->x==2){
                        echo "<span class='label label-success'>Pedido Recibido</span>";
                      }else if ($xx->x==3) {
                        echo "<span class='label label-danger'>Pedido No recibido</span>";
                      }else{
                        echo "<span class='label label-success'>Tramitando tu pedido</span>";
                      } ?>
                    <?php } ?>
                  </td>

                  <td><?php if ($xx->status==1) {
                        echo "<span class='label label-success'>Recibido</span>";
                    }else if($xx->status==2){
                        echo "<span class='label label-primary'>Pendiente</span>";
                    }else if($xx->status==3){
                        echo "<span class='label label-warning'>Observado</span>";
                    }else if($xx->status==4){
                        echo "<span class='label label-info'>Enviado</span>";
                    }else{
                       echo "<span class='label label-danger'>Anulado</span>";
                    } ?>
                    
                      
                    </td>
                    
                </tr>

               <?php }?>
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
                          setTimeout(function () { $('.table').footable(); }, 1000);
                          
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
                          setTimeout(function () { $('.table').footable(); }, 1000);
                          
                        });

                        //hasta aqui
                      }
                    })
                  }
                  
              });

                </script> 




