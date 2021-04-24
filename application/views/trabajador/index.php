           

<?php $query = $this->db->query("select *,count(*) as total,
sum(status='1') as activos,
sum(status='2') as pendientes,
sum(status='3') as observados
from ts_usuario where id_usuario_statico=1");
foreach ($query->result() as $xx) {
  $cantidad_usuariox = $xx->total;
  $activos_x = $xx->activos;
  $pendientes_x = $xx->pendientes;
  $observados_x = $xx->observados;
} ?>
<div class="row">
  <div class="col-12">
    <div class="card">
      <div class="card-body">
        <a href="javascript:void(0)" data-toggle="modal" data-target=".bd-example-modal-xl" class="btn btn-outline-success btn-rounded btn-md"><i class=" fas fa-plus-circle"></i>&nbsp;Nuevo Colaborador</a>
      </div>
    </div>
  </div>
</div>
<!-- This is to check if the user has ermission to edit other things using JavaScript-->
<div style="visibility: hidden;" class="data-container" 
  data-session_perfil=<?= $this->session->userdata("session_perfil") ?>>
</div>


<!-- Registrar nuevo colaborador -->
<div class="modal fade bd-example-modal-xl" tabindex="-1" role="dialog" aria-labelledby="myExtraLargeModalLabel" aria-hidden="true" data-backdrop="static">
  <div class="modal-dialog modal-lg">
    <div class="modal-content " >
      <div class="modal-body">
        <div class="modal-header">
          <h5 class="text-dark">Registrar Nuevo Colaborador</h5>
        </div>
        <div class="modal-body">
          <form autocomplete="off" action="" role="form" class="form-horizontal form-material" id="user_form_insert" enctype="multipart/form-data">
          <div class="row">
            <div class="col-md-3">
              <div class="form-group">
                <label class="control-label ">Usuario:</label>
                <input type="text" name="usuario" class="form-control redondeado " id="usuario" placeholder="Usuario" onkeypress="return sololetrasnumeros(event);">
              </div>
            </div>
            
            <div class="col-md-3">
              <div class="form-group">
                <label for="clave"  class="control-label">Nueva Clave:</label>
                <input type="password" name="clave" class="form-control redondeado" id="clave" placeholder="password">
              </div>
            </div>
            <div class="col-md-3">
              <div class="form-group">
                <label class="control-label">Repetir Clave:</label>
                <input type="password" name="clave_repeat" class="form-control redondeado" id="repeat_clave" placeholder="repeat password">
              </div>
            </div>
            <div class="col-md-3">
              <div class="form-group">
                <label class="control-label">Perfil:</label>
                <select name="id_perfil" id="id_perfil" class="form-control fondo">
                  <option value="">--seleccionar--</option>
                  <?php foreach ($id_perfil as $perfil_id) {?>
                    <option value="<?php echo $perfil_id->Id;?>"><?php echo $perfil_id->perfil; ?></option>
                  <?php } ?>
                </select>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-6">
              <div class="form-group">
                <label for="">Puesto&nbsp; <i class="fa fa-search"></i></label>
                <input type="text" name="puesto" id="puesto_txt_busqueda" class="form-control" placeholder="Buscar puesto" onkeypress="return sololetras(event);">
              </div>
            </div> 
            <div class="col-md-6">
              <div class="form-group">
                <label for="">Fecha de Ingreso</label>
                <input type="text" name="fecha_ingreso"  class="form-control" placeholder="2017-06-04" id="mdate" >
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-12"> 
              <div class="form-group">
                <div class="form-group  custom-control custom-checkbox pt-2">
                  <input type="checkbox" name="cbmostrar"  class="fantasmaxxxxxx custom-control-input mr-sm-2" id="checkbox2">
                  <label class="custom-control-label" for="checkbox2">Registro Manual </label>
              </div>

                <label class="control-label ">Buscar - Ingrese DNI presione enter  <i class="fa fa-search"></i></label>
                <input type="text" class="dni form-control " id="dni" name="dni" placeholder="Ingrese DNI presione enter">
                <button style="display: none;" id="botoncito" class="botoncito btn btn-outline-success">Buscar</button>
              </div>
            </div>
            <div class="col-md-4">
              <div class="form-group">
                <label class="control-label ">Nombre</label>
                <input type="text" name="nombre" id="nombres_completos" class="form-control redondeado" placeholder=""  readonly="">
              </div>
            </div>
            <div class="col-md-4">
              <div class="form-group">
                <label  class="control-label ">Apellido Paterno</label>
                <input type="text" name="apellido_paterno" class="form-control redondeado" id="apellido_paterno_x" placeholder="" readonly="">
              </div>
            </div>
            <div class="col-md-4">
              <div class="form-group">
                <label class="control-label ">Apellido Materno</label>
                <input type="text" name="apellido_materno" class="form-control redondeado" id="apellido_materno" placeholder=""  readonly="">
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-12">
              <div class="form-group">
                <label  class="control-label ">Email:</label>
                <input type="text" name="email" id="email" class="form-control redondeado" placeholder="Ingrese Email Valido">
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-4">
              <div class="form-group text-center">
                <label  class="control-label">Adjuntar imagen</label>
                  <input type="file" id="input_file" class="dropify" name="picture" onchange="fileValidatiosn(this);"/>
                  <span class="text-center"><small class="label label-danger">tamaño permitido 128px x 128px</small></span>
              </div>
            </div>
            <div class="col-md-3">
              <div class="form-group">
                <label  class="control-label">Sexo:</label>
                <select name="id_genero" id="id_genero" class="form-control fondo">
                  <option value="">--seleccionar--</option>
                  <?php foreach ($id_sexo as $sexo_id) {?>
                    <option value="<?php echo $sexo_id->Id;?>"><?php echo $sexo_id->genero; ?></option>
                  <?php } ?>
                </select>
              </div>
            </div>
            <div class="col-md-3">
              <div class="form-group">
                <label  class="form-label">Nº Celular:</label>
                <input type="text" name="celular" id="celular" class="form-control redondeado" placeholder="924543121" onkeypress="return soloNumeros(event);">
              </div>
            </div>
          </div>
          
          <div class="row ">
            <div class="col-md-12 col-sm-12 col-xs-12">
              <div class="text-center">
                <a href="javascript:void(0)" class="btn btn-outline-danger btn-rounded  btn-lg " data-dismiss="modal"> <i class="fas fa-times-circle"></i>&nbsp;Cancelar</a>
              <button type="submit" class="btn btn-outline-success btn-rounded btn-lg register_data"><i class=" fas fa-check-circle"></i>&nbsp;Registrar</button>
              </div>
              
            </div>
          </div>
        </form>
        </div>
      </div>
    </div>
  </div>
</div>






<!-- ============================================================== -->
<!-- End Bread crumb and right sidebar toggle -->
<!-- ============================================================== -->
<!-- ============================================================== -->
<!-- Start Page Content -->
<!-- ============================================================== -->

<div class="row animated rubberBand" id="div_load"  >
    <div class="col-12" >
        <div class="card">
            <div class="card-body" >
                <h4 class="card-title">Registro de Colaboradores</h4>
                <h6 class="card-subtitle">Lista de entradas abiertas por colaborador</h6>
                <div class="row ">
                    <!-- Column -->
                    <div class="col-md-6 col-lg-4 col-xlg-6">
                        <div class="card">
                            <div class="box bg-info text-center">
                                <h1 class="font-light text-white"><?php echo $cantidad_usuariox;?></h1>
                                <a href="<?php echo base_url().'Mantenimiento/Trabajador/';?>"><h6 class="text-white">Total Colaboradores</h6></a>
                            </div>
                        </div>
                    </div>
                    <!-- Column -->
                    <div class="col-md-6 col-lg-4 col-xlg-6">
                        <div class="card">
                            <div class="box bg-success text-center">
                                <h1 class="font-light text-white"><?php echo $activos_x;?></h1>
                                <a href="<?php echo base_url().'Mantenimiento/Trabajador/';?>"><h6 class="text-white">Colaboradores Activos</h6></a>
                            </div>
                        </div>
                    </div>              
                    <!-- Column -->
                    <div class="col-md-6 col-lg-4 col-xlg-6">
                        <div class="card">
                            <div class="box bg-danger text-center">
                                <h1 class="font-light text-white"><?php echo $pendientes_x;?></h1>
                                  <a href="<?php echo base_url().'Mantenimiento/Trabajador/mostrar_trabajador_cesado/'; ?>"><h6 class="text-white">Colaboradores Cesados</h6></a>

                            </div>
                        </div>
                    </div>
                    <!-- Column -->
                </div>
                <div class="table-responsive m-t-40"  >
                    <table  id="demo-foo-accordion" class="table table-bordered m-b-0 toggle-arrow-tiny display nowrap  table-hover table-striped table-bordered" data-filtering="true" data-paging="true" data-sorting="true"  data-paging-size="7" cellspacing="0" width="100%">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Nombres Completos</th>
                                <th>DNI</th>
                                <th>Puesto</th>
                                <th>Fecha de Ingreso</th>
                                <th>Email</th>
                                <th>Estado</th>
                                <th>Opciones</th>
                            </tr>
                        </thead>

                        <tbody>
                        <?php
                            if (!isset($mostrar_users)) {
                                echo base_url().'Sistema';
                            }
                            $cont=0;
                            foreach ($mostrar_users as $users ) {
                            $cont+=1;?>
                            <tr>
                                <td><?php echo $cont; ?></td>
                                <td><a class="text-success" href="javascript:void(0)"><img src="<?php echo base_url().'upload/';?>images/<?php if ($users->imagen=='' || $users->imagen==null){
                                    echo "$users->id_otros"; 
                                }else{
                                      echo $users->imagen;
                                } ?>" alt="user" width="40" class="img-circle " /> <?php echo $users->apellido_paterno.' '.$users->apellido_materno.' '.$users->nombres;?></a></td>
                                <td><?php echo $users->nro_documento; ?></td>
                              
                                <td>
                                    <span class='label label-success'><?php echo $users->puesto; ?></span>
                                </td>
                                  <td><?php echo $users->fecha_ingresoxx;?></td>
                                  <td><a href="mailto:<?php echo $users->email;?>"><?php echo $users->email;?></a></td>
                                <td><?php if ($users->status==1) {
                                    echo "<span class='label label-success'>Activo</span>";
                                }else if($users->status==2){
                                    echo "<span class='label label-primary'>Cesado</span>";
                                }?></td>
                                
                                <td>
                                  <a class="btn-outline-info btn btn_actualizar_colaborador" id="<?php echo $users->Idx;?>" href="javascript:void(0)"><i class="fas fa-edit"></i></a>
                                  <a class="btn-outline-warning btn cargar_modal_hora"   title="Hora de Ingreso" id="<?php echo $users->Idx;?>" href="javascript:void(0)" ><i class="far fa-clock"></i></a>
                                  <a class="btn-outline-danger btn descargar_informacion_colaborador" onclick="descargarInformacion('<?php echo $users->Idx;?>')" href="javascript:void(0)" ><i class="far  fa-file-pdf"></i></a>                                                   
                                </td>
                            </tr>
                              <?php } ?>

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>




<!-- Actualizar datos -->
<div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h3 ><small>Colaborador: <span  id="nombres"></span></small>
        </h3>      
      </div>
      <div class="modal-content">
        <div class="modal-body">
          <form action="" class="form-horizontal form-material" id="evaristoescudero">
            <div class="row">
              <div class="col-md-3">
                <div class="form-group">
                  <label class="control-label ">Usuario:</label>
                  <input disabled type="text" name="usuario" class="form-control redondeado " id="usuario-actualizar" placeholder="Usuario" onkeypress="return sololetrasnumeros(event);">
                </div>
              </div>
              
              <div class="col-md-3">
                <div class="form-group">
                  <label for="clave"  class="control-label">Nueva Clave:</label>
                  <input type="password" disabled name="clave" class="form-control redondeado" id="clave-actualizar" placeholder="password">
                </div>
              </div>

              <div class="col-md-3">
                <div class="form-group">
                  <label class="control-label">Repetir Clave:</label>
                  <input type="password" disabled name="clave_repeat" class="form-control redondeado" id="repeat_clave-actualizar" placeholder="repeat password">
                </div>
              </div>
              
              <div class="col-md-3">
                <div class="form-group">
                  <label class="control-label">Perfil:</label>
                  <select name="id_perfil" id="id_perfil-actualizar" class="form-control fondo">
                    <option value="">--seleccionar--</option>
                    <?php foreach ($id_perfil as $perfil_id) {?>
                      <option value="<?php echo $perfil_id->Id;?>"><?php echo $perfil_id->perfil; ?></option>
                    <?php } ?>
                  </select>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-4">
                <div class="form-group">
                  <label class="control-label ">Nombre</label>
                  <input type="text" name="nombre" id="nombres_completos-actualizar" class="form-control redondeado" placeholder=""  readonly="">
                </div>
              </div>
              <div class="col-md-4">
                <div class="form-group">
                  <label  class="control-label ">Apellido Paterno</label>
                  <input type="text" name="apellido_paterno" class="form-control redondeado" id="apellido_paterno_x-actualizar" placeholder="" readonly="">
                </div>
              </div>
              <div class="col-md-4">
                <div class="form-group">
                  <label class="control-label ">Apellido Materno</label>
                  <input type="text" name="apellido_materno" class="form-control redondeado" id="apellido_materno-actualizar" placeholder=""  readonly="">
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-12">
                <label for="">Puesto</label>
                   <input type="text" id="puesto" name="puesto" value="" class="form-control" placeholder="Ingrese puesto de trabajo" >
              </div>
              <div class="col-md-6">
                <label>Email</label>
                   <input type="text" id="correo" name="correo" value="" class="form-control" placeholder="Ingrese E-mail verificado">
              </div>
              <div class="col-md-6">
                <label for="">Fecha Ingreso</label>
                   <input type="text" id="mdatexxxxxx" name="fecha_ingreso" value=" " class="form-control" placeholder="Fecha Ingreso">
              </div>
            </div>
            <br>
            
            <div class="row">
              <div class="col-md-4">
                <div class="form-group text-center">
                  <label  class="control-label">Adjuntar imagen</label>
                    <input type="file" id="input_file" class="dropify" name="picture" onchange="fileValidatiosn(this);"/>
                    <span class="text-center"><small class="label label-danger">tamaño permitido 128px x 128px</small></span>
                </div>
              </div>
              <div class="col-md-3">
                <div class="form-group">
                  <label  class="control-label">Sexo:</label>
                  <select name="id_genero" id="id_genero-actualizar" class="form-control fondo">
                    <option value="">--seleccionar--</option>
                    <?php foreach ($id_sexo as $sexo_id) {?>
                      <option value="<?php echo $sexo_id->Id;?>"><?php echo $sexo_id->genero; ?></option>
                    <?php } ?>
                  </select>
                </div>
              </div>
              <div class="col-md-3">
                <div class="form-group">
                  <label  class="form-label">Nº Celular:</label>
                  <input type="text" name="celular" id="celular-actualizar" class="form-control redondeado" placeholder="924543121" onkeypress="return soloNumeros(event);">
                </div>
              </div>
            </div>
            <div id="statusxx"></div>

            <div class="form-group m-b-40 custom-control custom-checkbox pt-2">
              <input type="checkbox" name="cbmostrar"  class="fantasmass custom-control-input mr-sm-2" id="checkbox1">
              <label class="custom-control-label" for="checkbox1">Actualizar el Estado </label>
            </div>
            <span id="dvOcultar" style="display: none;">
              <div class="row">
                <div class="col-md-6">
                  <select name="estado" id="estado" class="form-control " style="width: 100%">
                    <option value="">--Seleccione estado--</option>
                    <?php foreach ($list_status as $list) {?>
                        <option value="<?php echo $list->Id;?>"><?php echo $list->nombre; ?></option>
                      <?php } ?>
                  </select>
                </div>
                <div class="col-md-6">
                  <input type="text" id="mdatexxxxxxx" name="fecha_cesado_activo" class="form-control" placeholder="Ingrese fecha de cambio">
                </div>
              </div>
            </span>
            <div class="row text-center pt-3">
              <div class="col-md-12">
                <input type="hidden" id="id_usuario" value="" name="id_usuario">
                <button type="botton" class="btn btn-outline-danger btn-rounded  btn-md" data-dismiss="modal"> <i class="fas fa-times-circle"></i>&nbsp;Cancelar</button>
                <button type="submit" class="btn btn-outline-success btn-rounded btn-md"><i class=" fas fa-check-circle"></i>&nbsp;Actualizar</button>
              </div>
            </div>
          </form>
       
        </div>
      </div>
    </div>
  </div>
</div>



<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>


<script src="<?php echo base_url().'application/views/trabajador/trabajador-index.js'?>"></script>