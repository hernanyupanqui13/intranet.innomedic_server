 
<!-- Examenes Clinicos - Agregar -->
<div class="row  animated pulse delay-3s">
  <div class="col-md-12">
    <div class="card">
      <div class="card-body">
        <div class="card-header bg-dark">
          <h4 class="m-b-0 card-title text-white">Exámenes Clínicos</h4>
        </div><br>

        <!-- Nav tabs -->
        <ul class="nav nav-tabs" role="tablist" >
          <li class="nav-item"> 
            <a class="nav-link active" id="add_exam_trigger" data-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample">
              <span class="hidden-sm-up"></span>
              <span class="hidden-xs-down font-weight-bold btn-dark btn btn-rounded"><i class="ti-home"></i>&nbsp;Nueva Orden de Atención</span>
            </a> 
          </li>
          <span id="agregar_nav_link"></span>
        </ul>

        <!-- Tab panes gracias 5-->
        <div class="tab-content tabcontent-border collapse" id="collapseExample">
          <div class="tab-pane active" id="home" role="tabpanel">
            <div class="p-20">
              <div class="col-lg-12">
                <div class="card ">
                  <div class="card-body">
                    <form class="evaristoescuderohuillcamascco" id="registrar_datos_generales" autocomplete="off">                      
                      <!--<div class="form-group btn  custom-control custom-checkbox pt-2" id="ocultar_iddddddd">
                        <input type="checkbox" name="cbmostrar"  class="fantasmass custom-control-input mr-sm-2" id="checkbox2" >
                        <label class="custom-control-label" for="checkbox2"><span class="btn-dark btn btn-rounded"><i class="fas fa-plus-circle"></i>&nbsp;Programar otra fecha</span></label>
                      </div>-->
                      <div class="btn-group" data-toggle="buttons" id="ocultar_iddddddd">
                        <label class="btn btn-dark btn-rounded">
                          <div class="custom-control custom-checkbox mr-sm-2">
                            <input type="checkbox" class="custom-control-input fantasmass" id="checkbox1" >
                            <label class="custom-control-label" for="checkbox1"><i class="fas fa-plus-circle"></i>&nbsp;Programar otra fecha</label>
                          </div>
                        </label>
                      </div>
                      
                      <div class="row" style="display: none;" id="dvOcultar">
                        <div class="col-md-12 col-sm-12 col-xs-12 col-lg-4">
                          <label for="input14" class="text-dark">Nº </label>
                          <div class="form-group  m-b-40">
                            <input type="text" class="form-control btn-rounded border border-dark " id="nro_edentificador_insert" name="nro_identificador_insert" value="" readonly="" style="background: #ffffff; "><span class="bar"></span>                                                        
                          </div>
                        </div>                        
                        <div class="col-md-12 col-sm-12 col-xs-12 col-lg-8">
                          <label for="input14" class="text-dark">Fecha </label>
                          <div class="form-group m-b-40">
                            <input type="text" class="form-control btn-rounded border border-dark" id="min-date" value="" placeholder="<?php echo date('Y-m-d H:i.s') ?>" name="fecha_atencionx" ><span class="bar"></span>
                          </div>
                        </div>
                      </div>

                      <div class="row" id="agregamos_fecha_hora" style="display: none;">
                        <div class="col-md-12 col-lg-4">
                          <label for="">Nº</label>
                          <div class="form-group m-b-40">
                            <input type="text" class="form-control btn-rounded border border-dark" value="" name="nro_identificador" id="nro_identificador">
                            <span class="bar"></span>
                          </div>
                        </div>
                        <div class="col-md-12 col-sm-12 col-xs-12 col-lg-4">
                          <label for="input14" class="text-dark">Fecha a actualizar </label>
                          <div class="form-group m-b-40">
                            <input type="text" class="form-control btn-rounded border border-dark" id="min-date_update" value="" name="fecha_atencion_update" ><span class="bar"></span>
                          </div>
                        </div>
                      </div>
                      
                      <div class="btn-group" data-toggle="buttons">
                        <label class="btn btn-dark btn-rounded">
                          <div class="custom-control custom-checkbox mr-sm-2">
                            <input type="checkbox" class="custom-control-input evaristo_el_unico" id="checkbox0" >
                            <label class="custom-control-label" for="checkbox0"><i class="fas fa-plus-circle"></i>&nbsp;Empresa</label>
                          </div>
                        </label>
                      </div>

                      <div class="row" id="agregamos_empresa_si_o_no" style="display: none;">
                        <div class="col-md-8" >                                            
                          <a href="javascript:void(0)" class="btn btn-dark btn-sm btn-rounded" data-toggle="modal" data-target=".bd-example-modal-lgs">
                            <i class="fas fa-plus-circle"></i>&nbsp; Agregar Empresa
                          </a>
                          <label for="input14" class="text-dark">Empresa </label>
                          <div class="form-group ">
                            <input type="text" class="form-control btn-rounded border border-dark" id="empresa_xxxxxxxxxxx" value="" name="empresa" placeholder="Ingrese empresa">
                            <span class="bar"></span>
                            <input type="hidden" id="empresa_id_x">
                            <span class="help-block"><small>Ingrese Empresa y preciona "Enter"</small></span>
                          </div>
                        </div>

                        <div class="col-md-4">
                          <label for="input14" class="text-dark">RUC </label>
                          <div class="form-group ">
                            <input type="text" class="form-control btn-rounded border border-dark" id="ruc_xxxx_empresa_xxx" value="" name="ruc_xx_empl" readonly="" placeholder="Ingrese ruc" ><span class="bar"></span>
                          </div>
                        </div>                                                
                      </div> 

                      <hr>
                      <h4 class="m-b-25 font-weight-bold ">Datos del Paciente</h4>
                      <div class="row">
                        <div class="col-md-2">
                          <div class="dni-select-container">
                            <select name="tipo_documento" id="tipo_documento" class="form-control btn-rounded border border-dark " required>                                                        
                              <option value="dni">DNI</option>
                              <option value="pasaporte">Pasaporte</option>
                              <option value="carnet_extranjeria">Carnet de Extranjeria</option>
                            </select> 
                          </div>
                          <div class="form-group">
                            <input type="hidden" id="dni_mostrar_dni" value="" name="dni">
                            <input type="text" class="form-control btn-rounded border border-dark" id="dni_evaristo" value="" name="update_dni" placeholder="Ingrese el documento" pattern="[0-9]{8}" maxlength="8">
                            <span class="bar"></span>
                            <button style="display: none;" id="botoncito_xxx" class="botoncito btn btn-outline-success">Buscar</button>                                                        
                            <span class="help-block"><small id="dni_help_message">Ingrese en Nº de Documento y presione "Enter"</small></span>
                          </div>
                        </div>
                        <div class="col-md-2">
                          <div class="form-group">
                            <label for="input14" class="text-dark">Nombres </label>
                            <input type="text" class="form-control btn-rounded border border-dark " id="nombres_completos" value="" name="nombres_completos" placeholder="Ingrese nombres" required="" >
                            <span class="bar"></span>
                          </div>
                        </div>
                        <div class="col-md-3">
                          <div class="form-group">
                            <label for="input14" class="text-dark">Apellido Paterno </label>
                            <input type="text" class="form-control btn-rounded border border-dark" id="apellido_paterno_x" value="" name="apellido_paterno" placeholder="Ingrese apellido paterno" required=""><span class="bar"></span>                                                      
                          </div>
                        </div>
                        <div class="col-md-3">
                          <div class="form-group">
                            <label for="input14" class="text-dark">Apellido Materno </label>
                            <input type="text" class="form-control btn-rounded border border-dark" id="apellido_materno" value="" name="apellido_materno" placeholder="Ingrese apellido materno" required=""><span class="bar"></span>                                                        
                          </div>
                        </div>
                        <div class="col-md-2">
                          <div class="form-group mostrarsexo">
                            <label for="input14" class="text-dark">Sexo </label>
                            <select name="sexo" id="sexo" class="form-control btn-rounded border border-dark " required>                                                        
                            </select> 
                          </div>
                        </div>
                        <div class="col-md-3">
                          <div class="form-group"> 
                            <label for="input14" class="text-dark">Fecha Nacimiento </label>
                            <input type="date" class="form-control btn-rounded border border-dark" id="fecha_nacimiento" value="" name="fecha_nacimiento" placeholder="Ingrese Fecha de Nacimiento" required=""><span class="bar"></span>                                                        
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group">
                            <label for="input14" class="text-dark">Correo Electronico </label>
                            <input type="email" class="form-control btn-rounded border border-dark" id="correo_electronico" value="" name="correo_electronico" placeholder="Ingrese Correo Eléctronico" required=""><span class="bar"></span>                                                        
                          </div>
                        </div>
                        <div class="col-md-3">
                          <div class="form-group">
                            <label for="input14" class="text-dark">Telefono/celular </label>
                            <input type="text" class="form-control btn-rounded border border-dark" id="telefono_celular" value="" name="telefono_celular" placeholder="Ingrese Telefono celular" required=""><span class="bar"></span>
                          </div>
                        </div>                                                               
                      </div>
                        
                      <hr>

                      <h4 class="font-weight-bold">Información General</h4>
                      <div class="row" id="ocultanos_parta_actualizar">
                        <div class="btn-group mt-3" data-toggle="buttons" role="group">
                          <label class="btn btn-outline btn-info">
                            <div class="custom-control custom-radio" id="customRadio1_xxxx">
                              <input type="radio"  name="paquete" value="1" class="custom-control-input">
                              <label class="custom-control-label" for="customRadio1_xxxx"> <i class="ti-check text-active" aria-hidden="true"></i> Paquete en General</label>
                            </div>
                          </label>
                          <label class="btn btn-outline btn-info">
                            <div class="custom-control custom-radio" id="genewral_paquetes_idd">
                              <input type="radio" id="customRadio2" name="paquete" value="2" class="custom-control-input">
                              <label class="custom-control-label" for="customRadio2"> <i class="ti-check text-active" aria-hidden="true"></i> Exámenes en general</label>
                            </div>
                          </label>
                        </div>
                      </div>

                      <div class="row">                                                              
                        <div class="col-md-4" style="display: none;" id="mostrar_paquete">
                          <div class="col-md-12">
                            <a href="javascript:void(0)" class="btn btn-dark btn-sm btn-rounded" data-toggle="modal" data-target=".bd-example-modal-lg_paquete_general">
                              <i class="fas fa-plus-circle"></i>&nbsp; Agregar Paquete
                            </a>
                            <label for="input14" class="text-dark">Paquete </label>
                            <div class="form-group mostrararea">
                              <select name="paquete" id="agregar_detalle__por_paquete" class="form-control btn-rounded border border-dark " required=""></select>                                                            
                            </div>
                          </div>
                        </div>

                        <div class="col-md-4">
                          <a href="javascript:void(0)" class="btn btn-dark btn-sm btn-rounded" data-toggle="modal" data-target=".bd-example-modal-lg_xxx">
                            <i class="fas fa-plus-circle"></i>&nbsp; Agregar Tipo Pago
                          </a>
                          <label for="input14" class="text-dark">Tipo de Pago </label>
                          <div class="form-group tipo_pago_xx m-b-40">
                            <select name="tipo_pagoxx" id="tipo_pago" class="form-control  btn-rounded border border-dark" required=""></select>
                          </div>
                        </div>

                        <div class="col-md-4">
                          <!--<a href="javascript:void(0)" class="btn btn-dark btn-sm btn-rounded"><i class="fas fa-plus-circle"></i>&nbsp; Agregar Tipo Comprobante</a>-->
                          <label for="input14" class="text-dark">Tipo de Comprobante </label>
                          <div class="form-group tipocomprobante_id m-b-40">
                            <select name="tipocomprobante" id="tipocomprobante" class="form-control  btn-rounded border border-dark" required=""></select>
                          </div>
                        </div>


                        <div class="col-md-12">                                                
                          <div class="col-md-12">
                            <label for="input14" class="text-dark">Observación </label>
                            <div class="form-group ">
                              <textarea name="observacion" id="observacion" cols="2" rows="3" class="form-control border border-dark " placeholder="Ingrese observación"></textarea>                                                            
                            </div>
                          </div>                                                 
                        </div>                            
                      </div>


                      <div class="row">
                        <div class="btn-group" data-toggle="buttons">
                          <label class="btn btn-warning btn-rounded">
                            <div class="custom-control custom-checkbox mr-sm-2">
                              <input type="checkbox" class="custom-control-input fantasmasssss" id="checkbox0">
                              <label class="custom-control-label" for="checkbox0">Adjuntar Boleta de Pago</label>
                            </div>
                          </label>                              
                        </div>
                      </div> 
            
                      <div class="row" style="display: none;" id="dvOcultar_iddd">
                        <div class="col-lg-12 col-md-12">
                          <input type="file" id="identity_picture" name="imagen" class="dropify"  accept="image/gif, image/jpeg, image/png, image/jpg, application/pdf" data-default-file="<?php echo base_url().'upload/';?>boleta_cliente/boleta_no_borrarw.jpg" onchange="fileValidatiosn(this);"/>
                        </div>
                      </div>
                    
                      <hr>

                      <div class="row" style="display: none;" id="mostrar_datos_paquetes">
                        <div class="table-responsive" id="mostramos_datos_pequenois">                            
                      </div>

                      <div class="col-md-8 alo"></div>
                        <div class="col-md-4">
                          <div class="table-responsive" id="mostramos_datos_paquetes_precios"></div>
                        </div>
                      </div>
                    
                      <!--desde aqui son los paquetes en general-->
                      <hr>

                      <div class="row" style="display: none;" id="mostramos_los_campos_agregar_uno_por_no">
                        <div class="col-md-8">
                          <a href="javascript:void(0)" class="btn btn-dark btn-sm btn-rounded" data-toggle="modal" data-target=".nuevo_examen_md">
                            <i class="fas fa-plus-circle"></i>&nbsp; Agregar Examen
                          </a>
                          <label for="">Asignar Tipo Exámen</label>
                          <div class="form-group">
                            <input type="text" id="examen_idddd" class="form-control btn-rounded border border-dark " placeholder="Ingrese Exámen........." >
                            <input type="hidden" value="" name="examen" id="examen_evaristo">
                            <input type="hidden" value="" name="id_examen" id="examen_evaristo_id">
                          </div>
                        </div>
                        <div class="col-md-4 text-center mt-4">
                          <div class="form-group">
                            <a href="javascript:void(0)" id="agregar_detalle_value" class="btn-rounded btn btn-warning btn-lg btn-block"><i class=" fas fa-plus-circle"></i>&nbsp;Agregar Examen</a>
                          </div>
                        </div> 
                      </div>
                      <div class="row" style="display: none;" id="general_poaquetes_id">
                        <div class="table-responsive" id="mostramos_datos_desde_ajax"></div>
                        <div class="col-md-8"></div>
                        <div class="col-md-4" >
                          <div class="table-responsive" id="mostramos_datos_del_igv_total_subtotal"></div>
                        </div>
                      </div>
                      <!--hasta aqui-->
                      <div class="row">
                        <div class="col-md-12 text-center">
                          <hr>
                          <input type="hidden" name="fecha_atencion_id" id="fecha_atencion_id" value="">
                          <input type="hidden" name="nro_identificador_update" id="nro_identificador_update" value="">
                  
                          <a href="javascript:void(0)" onclick="return regresar_id();" class="btn btn-danger btn-rounded btn-lg"><i class="fas fa-times-circle"></i>&nbsp;Cancelar</a>
                          <button type="submit" class="btn btn-info btn-rounded btn-lg" id="cambio_nombre_boton"><i class="fas fa-check-circle"></i>&nbsp;Nuevo Registro</button>
                          <hr>
                        </div>
                      </div>
                    </form>
                  </div>
                </div>
              </div>
            </div>
          </div>                    
        </div>
      </div>
    </div>
  </div>
</div>

<!-- Resultados Busqueda de Exmenes -->
<div class="row">
  <div class="col-lg-12 col-sm-12 col-md-12">
    <div class="card">
      <div class="card-body">
        <div class="row">
          <div class="col-md-2">
            <div class="form-group">
              <button class="btn btn-success btn-rounded" onclick="reload_table()" type="button">Actualizar</button>
            </div>
          </div>            
        </div>
        <div class="row">
          <div class="col-md-12">
            <h4 class="card-title text-center" >Criterios de Busqueda avanzada</h4>
            <div class="row">
              <div class="col-md-6 col-xs-12 col-sm-12 col-lg-4 col-xl-4">
                <div class="form-group">
                  <div class="example">
                    <div class="input-daterange input-group" id="date-range">
                      <input type="text" class="form-control " name="fecha_inicio" id="fecha_inicio" placeholder="<?php echo date("Y-m-d");?>" autocomplete="off">
                      <div class="input-group-append">
                        <span class="input-group-text bg-info b-0 text-white">A</span>
                      </div>
                      <input type="text" class="form-control " name="fecha_fin" id="fecha_fin" placeholder="<?php echo date("Y-m-d");?>" autocomplete="off">
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-md-6 col-xs-12 col-sm-12 col-lg-4 col-xl-3">
                <div class="form-group">
                  <input type="text" class="form-control btn-rounded" name="nombre" id="nombre_busqueda" placeholder="Ingrese Nombre a Buscar" autocomplete="off">
                </div>
              </div>
              <div class="col-md-6 col-xs-12 col-sm-12 col-lg-4 col-xl-3">
                <div class="form-group">
                  <input type="number" class="form-control btn-rounded" name="dni" id="dni_busqueda" placeholder="Ingrese dni a Buscar" autocomplete="off">
                </div>
              </div>
              <div class="col-md-6 col-xs-12 col-sm-12 col-lg-4 col-xl-2">
                <div class="form-group">
                  <a href="javascript:void(0)" class="btn btn-danger btn-rounded" onclick="limpiar_campos()" type="button">Limpiar</a>
                </div>
              </div>
            </div>
          </div>
        </div>

        <div class="col-md-12 col-lg-12 col-xl-12 text-left">
          <div class="row">
            <div class="col-md-12 col-xs-12 col-sm-12 col-lg-12 col-xl-12 ">
              <div class="form-group">
                  <button class="btn btn-dark btn-rounded btn-block btn-md" id="buscar_registro_por_ajax"  type="button"><i class="fas fa-search"></i>&nbsp;Busqueda Avanzada</button>
              </div>
            </div>              
          </div>
        </div>

        <div class="table-responsive">
          <table id="myTable" class="table  table-striped color-table  full-color-table full-dark-table hover-table  ">
            <thead>
              <tr>
                <th>#</th>
                <th>Apellidos</th>
                <th>Nombres</th>
                <th>Dni</th>
                <th>Empresa</th>
                <th>Fecha de Atención</th>
                <th style="width: 10%;">Tipo de Pago</th>
                <th>Estado</th>
                <th style="width: 20%;">Opciones</th>
              </tr>
            </thead>
            <tbody>          
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>




<!--aqui buscamos proveedor y lo agregamos-->
<div class="modal fade bd-example-modal-lgs" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header bg-dark text-white">
        <h5 class="modal-title" id="exampleModalLabel">Buscar Proveedor</h5>
        <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body ">
        <form class="form-horizontal" role="form" method="post" name="busqueda" id="busqueda" >
          <div class="card border-info">
            <div class="card-body">
              <div class="row">
                <div class="col-md-12">
                  <input type="number" class="form-control" name="nruc" id="nruc" placeholder="Ingrese RUC o DNI" pattern="([0-9][0-9][0-9][0-9][0-9][0-9][0-9][0-9][0-9][0-9][0-9]|[0-9][0-9][0-9][0-9][0-9][0-9][0-9][0-9])" autofocus onkeypress="return soloNumeros(event);">
                </div>
              </div>
            </div>
            <div class="text-center">
              <button type="submit" class="btn btn-outline-success btn-rounded btn-md" name="btn-submit" id="btn-submit">
                <i class="fa fa-search"></i> Buscar Registro
              </button>
            </div>
          </div>
        </form>
        <span>
          <br>
          <b>Nombre:</b> <span id="usuarioxx"></span>
          <br>  
          <b>Ruc:</b> <span id="rucxxx"></span> 
          <hr>
        </span>
        <form action="" class="form-horizontal form-material " id="registrar_nuevo_proveedor_sunat" enctype="multipart/form-data">
          <div class="row">
            <input type="hidden" name="nombre" id="usuario">
            <input type="hidden" name="ruc" id="rucx">
            <input type="hidden" name="direccion" id="direccionx">
            <input type="hidden" name="telefono" id="txt_telefono">
          </div>
          <div class="row text-center" id="ocultamos_id" style="display: none;">
            <div class="col-md-12">
              <div class="form-actions">
                <button type="submit" class="btn-outline-success btn-rounded waves-effect btn btn-md waves-light"> <i class="fas fa-check-circle"></i>&nbsp;Registrar</button>
                <button type="button" data-dismiss="modal" class="btn btn-outline-danger btn-rounded btn-md "><i class="fa fa-times-circle"></i>&nbsp;Cancelar</button>
              </div>
            </div>
          </div>
        </form>
        <br>
      </div>
    </div>
  </div>
</div>

<!--agregamos modal para tipo de pago-->
<div id="compromisos" class="modal fade bd-example-modal-lg_xxx" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" data-backdrop="static">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-body">
        <div class="row">
          <div class="col-lg-12">
            <div class="card">
              <div class="card-body">
                <h4 class="card-title card-header bg-dark text-white text-center title_pago">Nuevo Tipo Pago</h4>
                <form action="#" class="denistorotovar" id="registrar_nuevo_tipo_pago" autocomplete="off">
                  <div class="row pt-4">
                    <div class="col-md-12 col-lg-12">
                      <div class="form-group">
                        <input type="text" name="nombre_tipo_pago" id="nombre_tipo_pago" class="form-control  btn-rounded " placeholder="Ingrese nuevo Tipo pago...... "  required="">
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-12">
                      <div class="text-center">
                        <span id="agregar_id_tipo_pago"></span>
                        <a href="javascript:void(0)" data-dismiss="modal" class="btn btn-danger btn-rounded btn-lg"><i class="fas fa-times-circle"></i>&nbsp;Cancelar</a>
                        <button type="submit" class="btn btn-info btn-rounded btn-lg" id="cambio_nomre_tipo_pago"><i class="fas fa-check-circle"></i>&nbsp;Nuevo Registro</button>
                      </div>
                    </div>
                  </div>
                </form>
                <div class="table-responsive">
                  <table id="table_tipo_pago" class="table color-table success-table  table-bordered table-striped dataTable no-footer display nowrap" role="grid" aria-describedby="myTable_info">
                    <thead>
                      <tr>
                        <th>Codigo</th>
                        <th>Estado</th>
                        <th>Descripción</th>
                        <th>Opciones</th>
                      </tr>
                    </thead>
                    <tbody>                              
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>


<!-- Agregamos Paquete en General-->
<div id="nuevo_paquete_modal" class="modal fade bd-example-modal-lg_paquete_general" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" data-backdrop="static">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">      
      <div class="modal-body">
        <div class="row">
          <div class="col-lg-12">
            <div class="card">
              <div class="card-body">
                <h4 class="card-title card-header bg-dark text-white text-center title_paquete">Nuevo Paquete</h4>
                <form action="#" class="denistorotovar_paquete" id="registrar_nuevo_paquete" autocomplete="off">
                  <div class="row pt-4">
                    <div class="col-md-7 col-lg-7 col-sm-12">
                      <div class="form-group">
                        <input type="text" name="nuevo_paquete" id="nuevo_paquete" class="form-control  btn-rounded " placeholder="Ingrese nuevo Paquete...... "  required="">
                      </div>
                    </div>
                    <div class="col-md-5 col-lg-5 col-sm-12">
                      <div class="form-group">
                        <input type="text" name="nuevo_precio" id="nuevo_precio" class="form-control  btn-rounded " placeholder="Ingrese precio S/.00.00 "  required="">
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-12">
                      <div class="text-center">
                        <span id="agregar_id_paquete"></span>
                        <a href="javascript:void(0)" data-dismiss="modal" class="btn btn-danger btn-rounded btn-lg"><i class="fas fa-times-circle"></i>&nbsp;Cancelar</a>
                        <button type="submit" class="btn btn-info btn-rounded btn-lg" id="cambio_nomre_paquete"><i class="fas fa-check-circle"></i>&nbsp;Nuevo Registro</button>
                      </div>
                    </div>
                  </div>
                </form>
                <div class="table-responsive">
                  <table id="tabla_paquetes" class="table color-table success-table  table-bordered table-striped dataTable no-footer display nowrap" role="grid" aria-describedby="myTable_info">
                    <thead>
                      <tr>
                        <th>Codigo</th>
                        <th>Estado</th>
                        <th>Descripción</th>
                        <th>Precio</th>
                        <th>Opciones</th>
                      </tr>
                    </thead>
                    <tbody>                        
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>


<!--agregamos asociamos los paquetes en general por id-->
<div id="nuevo_paquete_modal_xx" class="modal fade bd-example-modal-lg_asociar_paquetes" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" data-backdrop="static">
  <div class="modal-dialog modal-xl">
    <div class="modal-content">      
      <div class="modal-body">
        <div class="row">
          <div class="col-lg-12">
            <div class="card">
              <div class="card-body">
                <h4 class="card-title card-header bg-dark text-white text-center title_paquete_asociado">Nuevo Paquete Asociado</h4>
                <form action="#" class="evaristo_eldulce" id="registrar_tipo_paquete_asociado" autocomplete="off">
                  <div class="row pt-4">
                    <div class="col-md-6 col-lg-6 col-sm-12">
                      <div class="form-group">
                        <input type="text" name="asociar_nombre" id="asociar_nombre" class="form-control  btn-rounded " placeholder="Ingrese nueva descripción"  required="">
                        <!--input codigo actualizar-->
                        <input type="hidden" id="asociar_codigo" name="asociar_codigo" value="">
                        <input style="display: none;" type="text" name="nro_valido_innomedic" id="nro_valido_innomedic" class="form-control  btn-rounded " placeholder="Ingrese nueva descripción"  required="">
                      </div>
                    </div>
                    <div class="col-md-6 col-lg-6 col-sm-12">
                      <div class="form-group categoria_tipo_examen_id">
                        <select name="categoria_tipo_asociar" id="categoria_tipo_asociar" class="form-control btn-rounded"></select>
                      </div>
                    </div>                          
                  </div>
                  <div class="row">
                    <div class="col-md-12">
                      <div class="text-center">
                        <input type="hidden" name="id_registrar_id_paquete" id="id_registrar_id_paquete" value="">
                        <input type="hidden" id="id_registrar_id_paquete_asociado" name="id_registrar_id_paquete_asociado" value="">
                        <a href="javascript:void(0)" onclick="return cancelar_fijo()" class="btn btn-danger btn-rounded btn-lg"><i class="fas fa-times-circle"></i>&nbsp;Cancelar</a>
                        <button type="submit" class="btn btn-info btn-rounded btn-lg" id="cambio_nomre_paquete_asoaciado"><i class="fas fa-check-circle"></i>&nbsp;Nuevo Registro</button>
                      </div>
                    </div>
                  </div>
                </form>
                <div class="table-responsive">
                  <table id="table_paquete_general_asociar" class="table color-table success-table  table-bordered table-striped dataTable no-footer display nowrap" role="grid" aria-describedby="myTable_info">
                    <thead>
                      <tr>
                        <th>Codigo</th>
                        <th>Estado</th>
                        <th>Descripción</th>
                        <th>Tipo Paquete</th>
                        <th>Opciones</th>
                      </tr>
                    </thead>
                    <tbody>                                  
                    </tbody>
                  </table>
                </div>
                <br>
                <br>
                <br>
                <br>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>


<!--aqui agreamos la ultima parte de tipo examen por -->
<!--agregamos asociamos los paquetes en general por id-->
<div id="nuevo_examen_modal" class="modal fade nuevo_examen_md" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" data-backdrop="static">
  <div class="modal-dialog modal-xl">
    <div class="modal-content">      
      <div class="modal-body">
        <div class="row">
          <div class="col-lg-12">
            <div class="card">
              <div class="card-body">
                <h4 class="card-title card-header bg-dark text-white text-center title_paquete_tipoexamen">Nuevo Tipo Exámen</h4>
                <form action="#" class="evaristo_eldulce_escudero" id="registrar_tipo_exmaen" autocomplete="off">
                  <div class="row pt-4">
                    <div class="col-md-7 col-lg-7 col-sm-12">
                      <div class="form-group">
                        <input type="text" name="nombre_examen_tipo" id="nombre_examen_tipo" class="form-control btn-rounded " placeholder="Ingrese un nuevo Exámen"  required="">
                      </div>
                    </div>
                    <div class="col-md-5 col-lg-15 col-sm-12">
                      <div class="form-group">
                        <input type="text" name="precio_tipo_examen" id="precio_tipo_examen" class="form-control  btn-rounded " placeholder="Ingrese precio S/.000.00"  required="">
                          <input style="display: none;" type="text" name="nro_valido_innomedic_codigo" id="nro_valido_innomedic_codigo" class="form-control  btn-rounded " placeholder=""  required="">
                      </div>
                    </div>
                    <div class="col-md-5 col-lg-15 col-sm-12">
                      <div class="form-group categoria_tipo_examen_id">
                        <select name="categoria_tipo_examen" id="categoria_tipo_examen" class="form-control btn-rounded"></select>                              
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-12">
                      <div class="text-center">
                        <input type="hidden" name="id_registrar_id_tipopexamen" id="id_registrar_id_tipopexamen" value="">
                        <a href="javascript:void(0)" onclick="return cancelar_fijo_id_tipoexamen()" class="btn btn-danger btn-rounded btn-lg"><i class="fas fa-times-circle"></i>&nbsp;Cancelar</a>
                        <button type="submit" class="btn btn-info btn-rounded btn-lg" id="cambio_nomre_paquete_asoaciado_escudero"><i class="fas fa-check-circle"></i>&nbsp;Nuevo Registro</button>
                      </div>
                    </div>
                  </div>
                </form>
                <div class="table-responsive">
                  <table id="tabla_examenes" class="table color-table success-table  table-bordered table-striped dataTable no-footer display nowrap" role="grid" aria-describedby="myTable_info">
                    <thead>
                      <tr>
                        <th>#</th>
                        <th>Estado</th>
                        <th>Codigo</th>
                        <th>Precio</th>
                        <th>Nombre</th>
                        <th>Opciones</th>
                      </tr>
                    </thead>
                    <tbody>  
                    </tbody>
                  </table>
                </div>
                <br>
                <br>
                <br>
                <br>


              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>


<div class="modal fade bd-example-modal-xl_view" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" data-backdrop="static" style="max-height: 100%;
overflow: scroll; ">
  <div class="modal-dialog modal-xl">
    <div class="modal-content">
      <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true" style="
                border: 2px solid #210202;
                border-radius: 50%;
            ">&nbsp;&nbsp;&times;&nbsp;&nbsp;</span>
            </button>
          </div>
        <div class="row text-center">
          <div class="col-md-12 ">
          <button id="print_evaristo_escudero" class="btn btn-outline-dark btn-block btn-lg" type="button"> <span><i class="fa fa-print"></i> Imprimir</span> </button>
          </div>
        </div>                        
      </div>
      <div class="modal-body" style="height: 80vh; overflow-y: auto; width: 100%; max-width: 100%" >
        <div class="container-fluid printableArea_desc" id="printableArea_desc">
          <div class="row ">
            <div class="col-md-12">
              <div class="row">
                  <div class="col-md-12">
                    <table style="border-collapse: collapse; width: 100%;" border="0">
                        <tbody>
                          <tr>
                              <td style="width: 100%;"><img src="http://innomedic.metjetsac.com/public/assets/images/logo.png?v=1514060951" alt=""></td>
                      
                          </tr>
                          </tbody>
                    </table>
                    <table style="border-collapse: collapse; width: 100%;" border="0">
                        <tbody>
                          <tr>
                              <td style="width: 100%;" class="text-center"><br><br>
                                <h3 style="text-decoration: underline;" class="font-weight-bold">INNOMEDIC INTERNATIONAL E.I.R.L</h3>
                                <P id="numero_identificador"></P>
                              </td>
                          </tr>
                          </tbody>
                    </table>
                  </div>
                </div>
                <div class="row" style="border: 2px solid #000000; border-radius: 3px;">
                  <div class="col-md-12 m-2">                                   
                    <table style="width: 100%">
                      <tbody>
                        <tr>
                          <td style="width: 20%" class="font-weight-bold">Datos Generales:</td>
                          <td style="width: 50%" class="text-right font-weight-bold" >Fecha Atención&nbsp;<br><span class="font-weight-normal" id="fecha_view"></span></td>
                            <td style="width: 30%" class="text-right font-weight-bold" id="numero_historia"></td>
                        </tr>

                        <tbody>
                    </table>
                    <hr style="border: 1px solid #000000">
                    <table style="border-collapse: collapse; width: 100%;border-spacing:  3px" border="0" cellspacing="6" cellpadding="6">
                          <tbody>
                          
                          <tr>
                          <td style="width: 40%;" class="font-weight-bold">Nº Documento:&nbsp;<br><span id="dni_view" class="font-weight-normal"></span></td>
                          <td style="width: 40%;"  class="font-weight-bold">Fecha de Nacimiento:&nbsp;<br><span id="fecha_nacimiento_view" class="font-weight-normal"></span></td>
                          <td style="width: 40%;" class="font-weight-bold">Edad:&nbsp;<br><span id="edad_view" class="font-weight-normal"></span></td>
                  
                          </tr>
                          <tr>
                          <td style="width: 40%;" class="font-weight-bold">Nombres:&nbsp;<br> <span class="font-weight-normal" id="nombres_view"></span></td>
                          <td style="width: 40%;" class="font-weight-bold">Apellido Paterno&nbsp;<br> <span class="font-weight-normal" id="apellido_paterno_view"></span></td>
                          <td style="width: 40%;" class="font-weight-bold">Apellido Materno&nbsp;<br> <span class="font-weight-normal" id="apellido_amterno_view"></span></td>
                          </tr>
                          <tr>
                          <td style="width: 40%;" class="font-weight-bold">Genero:&nbsp;<br> <span class="font-weight-normal" id="genero_view"></span></td>
                          <td style="width: 40%;" class="font-weight-bold">E-mail:&nbsp;<br> <span class="font-weight-normal" id="correo_view"></span></td>
                          <td style="width: 40%;" class="font-weight-bold">Telefono:&nbsp;<br> <span class="font-weight-normal" id="telefono_celular_view"></span></td>

                          </tr>
                          </tbody>
                    </table>                                    
                  </div>
                </div>
                <span id="mostramos_datos">
                </span>
                <div class="row" style="border: 2px solid #000000; border-radius: 3px;">
                  <div class="col-md-12">
                    <span class="font-weight-bold">Exámenes a evaluar</span>
                    <hr style="border: 1px solid #000000">
                    <div class="table-responsive" id="registrodetalle">
                      <table class="tabletable-bordered "  width="100%"  border="1" style="width:100%;" cellspacing="10" cellpadding="10">
                        <thead class="text-center font-weight-bold">
                          <th class="font-weight-bold">Item</th>
                          <th class="font-weight-bold">Exámen</th>
                          <th class="font-weight-bold">Firma</th>
                          <th class="font-weight-bold">Fecha</th>
                          <th class="font-weight-bold">Hora Atención</th>
                          
                        </thead>
                        <tbody class="text-center">
                        </tbody>
                        
                      </table>
                      <br>
                    </div>
                  </div>
                </div>
                <br>
            </div>

            <div class="col-md-12">
              
              <div class="row">
                  <div class="col-md-12">
                    <table style="border-collapse: collapse; width: 100%;" border="0">
                        <tbody>
                          <tr>
                              <td style="width: 100%;"><img src="http://innomedic.metjetsac.com/public/assets/images/logo.png?v=1514060951" alt=""></td>                                     
                          </tr>
                          </tbody>
                    </table>
                    <table style="border-collapse: collapse; width: 100%;" border="0">
                        <tbody>
                          <tr>
                              <td style="width: 100%;" class="text-center"><br><br>
                                <h3 style="text-decoration: underline;" class="font-weight-bold">INNOMEDIC INTERNATIONAL E.I.R.L</h3>
                                <P id="numero_identificador1"></P>
                              </td>
                          </tr>
                          </tbody>
                    </table>
                  </div>
                </div>
                <div class="row" style="border: 2px solid #000000; border-radius: 3px;">
                  <div class="col-md-12 m-2">                                   
                    <table style="width: 100%">
                      <tbody>
                        <tr>
                          <td style="width: 20%" class="font-weight-bold">Datos Generales:</td>
                          <td style="width: 50%" class="text-right font-weight-bold" >Fecha Atención&nbsp;<br><span class="font-weight-normal" id="fecha_view1"></span></td>
                            <td style="width: 30%" class="text-right font-weight-bold" id="numero_historia1"></td>
                        </tr>
                        <tbody>
                    </table>
                    <hr style="border: 1px solid #000000">
                    <table style="border-collapse: collapse; width: 100%;border-spacing:  3px" border="0" cellspacing="6" cellpadding="6">
                          <tbody>
                          
                          <tr>
                          <td style="width: 40%;" class="font-weight-bold">Nº Documento:&nbsp;<br><span id="dni_view1" class="font-weight-normal"></span></td>
                          <td style="width: 40%;"  class="font-weight-bold">Fecha de Nacimiento:&nbsp;<br><span id="fecha_nacimiento_view1" class="font-weight-normal"></span></td>
                          <td style="width: 40%;" class="font-weight-bold">Edad:&nbsp;<br><span id="edad_view1" class="font-weight-normal"></span></td>
                  
                          </tr>
                          <tr>
                          <td style="width: 40%;" class="font-weight-bold">Nombres:&nbsp;<br> <span class="font-weight-normal" id="nombres_view1"></span></td>
                          <td style="width: 40%;" class="font-weight-bold">Apellido Paterno&nbsp;<br> <span class="font-weight-normal" id="apellido_paterno_view1"></span></td>
                          <td style="width: 40%;" class="font-weight-bold">Apellido Materno&nbsp;<br> <span class="font-weight-normal" id="apellido_amterno_view1"></span></td>
                          </tr>
                          <tr>
                          <td style="width: 40%;" class="font-weight-bold">Genero:&nbsp;<br> <span class="font-weight-normal" id="genero_view1"></span></td>
                          <td style="width: 40%;" class="font-weight-bold">E-mail:&nbsp;<br> <span class="font-weight-normal" id="correo_view1"></span></td>
                          <td style="width: 40%;" class="font-weight-bold">Telefono:&nbsp;<br> <span class="font-weight-normal" id="telefono_celular_view1"></span></td>

                          </tr>
                          </tbody>
                    </table>
                  </div>
                </div>
                <span id="mostramos_datos">
                </span>
                <br>
                <div class="row" style="border: 2px solid #000000; border-radius: 3px;">
                  <div class="col-md-12">
                    <span class="font-weight-bold">Exámenes a evaluar</span>
                    <hr style="border: 1px solid #000000">
                    <div class="table-responsive" id="registrodetalle_cstegoria">
                      <table class="tabletable-bordered "  width="100%"  border="1" style="width:100%;" cellspacing="10" cellpadding="10">
                        <thead class="text-center font-weight-bold">
                          <th class="font-weight-bold">Item</th>
                          <th class="font-weight-bold">Exámen</th>
                          <th class="font-weight-bold">Firma</th>
                          <th class="font-weight-bold">Fecha</th>
                          <th class="font-weight-bold">Hora Atención</th>
                        </thead>
                        <tbody class="text-center">
                        </tbody>                                        
                      </table>
                      <br>
                    </div>
                  </div>
                </div>
                <br>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>


<style>
  .dt-body-right{
    width: 100%;
  }
  
</style>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="<?php echo base_url().'application/views/examenes/examenes-index-script.js'?>"></script>