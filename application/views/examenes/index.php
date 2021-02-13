 
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
                        <!--<div class="col-md-12 col-sm-12 col-xs-12 col-lg-4">
                          <label  class="text-dark">Hora</label>
                            <div class="form-group   m-b-40 input-group clockpicker " data-placement="left" data-align="top" data-autoclose="true">
                              <input type="text" class="form-control btn-rounded border border-dark" value="" name="horax" id="hora"><span class="bar"></span>

                              <div class="input-group-append">
                                <span class="input-group-text"><i class=" fas fa-clock"></i></span>
                              </div>
                                
                            </div>
                        </div>-->
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
                          <a href="javascript:void(0)" class="btn btn-dark btn-sm btn-rounded" data-toggle="modal" data-target=".bd-example-modal-lgs"><i class="fas fa-plus-circle"></i>&nbsp; Agregar Empresa</a>
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
                                <a href="javascript:void(0)" class="btn btn-dark btn-sm btn-rounded" data-toggle="modal" data-target=".bd-example-modal-lg_paquete_general"><i class="fas fa-plus-circle"></i>&nbsp; Agregar Paquete</a>
                                <label for="input14" class="text-dark">Paquete </label>
                                <div class="form-group mostrararea">
                                  <select name="paquete" id="agregar_detalle__por_paquete" class="form-control btn-rounded border border-dark " required="">                                                            
                                  </select>                                                            
                                </div>
                              </div>
                            </div>

                            <div class="col-md-4">
                              <a href="javascript:void(0)" class="btn btn-dark btn-sm btn-rounded" data-toggle="modal" data-target=".bd-example-modal-lg_xxx"><i class="fas fa-plus-circle"></i>&nbsp; Agregar Tipo Pago</a>
                              <label for="input14" class="text-dark">Tipo de Pago </label>
                              <div class="form-group tipo_pago_xx m-b-40">
                                <select name="tipo_pagoxx" id="tipo_pago" class="form-control  btn-rounded border border-dark" required="">                                                      
                                </select>
                              </div>
                            </div>

                            <div class="col-md-4">
                              <!--<a href="javascript:void(0)" class="btn btn-dark btn-sm btn-rounded"><i class="fas fa-plus-circle"></i>&nbsp; Agregar Tipo Comprobante</a>-->
                              <label for="input14" class="text-dark">Tipo de Comprobante </label>
                              <div class="form-group tipocomprobante_id m-b-40">
                                <select name="tipocomprobante" id="tipocomprobante" class="form-control  btn-rounded border border-dark" required="">                                
                                </select>
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
                              <!-- -->
                          </div>
                        </div>
                        <hr>
                        <div class="row" style="display: none;" id="mostrar_datos_paquetes">
                          <div class="table-responsive" id="mostramos_datos_pequenois">
                            
                        </div>
                        <div class="col-md-8 alo"></div>
                          <div class="col-md-4">
                              <div class="table-responsive" id="mostramos_datos_paquetes_precios">
                                  
                              </div>
                        </div>
                      </div>
                      <!--desde aqui son los paquetes en general-->
                      <hr>
                        <div class="row" style="display: none;" id="mostramos_los_campos_agregar_uno_por_no">
                          <div class="col-md-8">
                            <a href="javascript:void(0)" class="btn btn-dark btn-sm btn-rounded" data-toggle="modal" data-target=".bd-example-modal-lg_tipoexamen_id"><i class="fas fa-plus-circle"></i>&nbsp; Agregar Examén</a>
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
                          <div class="table-responsive" id="mostramos_datos_desde_ajax">
                            
                        </div>
                        <div class="col-md-8"></div>
                            <div class="col-md-4" >
                              <div class="table-responsive" id="mostramos_datos_del_igv_total_subtotal">
                                  
                              </div>
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
              <button class="btn btn-success btn-rounded" onclick="reload_table()" type="button"><span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>&nbsp;Actualizar...</button>
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
                  <a href="javascript:void(0)" class="btn btn-danger btn-rounded" onclick="limpiar_campos()" type="button"><span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> Limpiar ...</a>
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
          <br>
          <b>Telefono:</b> <span id="txt_telefonoxx"></span>
          <br>
          <b>Direccion:</b> <span id="direccionxxx"></span>
          <hr>
        </span>
        <form action="" class="form-horizontal form-material " id="registrar_nuevo_proveedor_sunat" enctype="multipart/form-data">
          <div class="row">
            <input type="hidden" name="nombre" id="usuario">
            <input type="hidden" name="ruc" id="rucx">
            <input type="hidden" name="direccion" id="direccionx">
            <input type="hidden" name="telefono" id="txt_telefono">
          </div>
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
<div id="compromisos_xx" class="modal fade bd-example-modal-lg_paquete_general" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" data-backdrop="static">
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
                  <table id="table_paquete_general" class="table color-table success-table  table-bordered table-striped dataTable no-footer display nowrap" role="grid" aria-describedby="myTable_info">
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
<div id="compromisos_xx_xx" class="modal fade bd-example-modal-lg_asociar_paquetes" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" data-backdrop="static">
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
                            <select name="categoria_tipo_asociar" id="categoria_tipo_asociar" class="form-control btn-rounded">
                              
                            </select>
                            
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


<!--aqui agreamos la ultima parte de  de tipo examen por -->
  <!--agregamos asociamos los paquetes en general por id-->
<div id="compromisos_xx_xx_xx" class="modal fade bd-example-modal-lg_tipoexamen_id" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" data-backdrop="static">
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
                            <select name="categoria_tipo_examen" id="categoria_tipo_examen" class="form-control btn-rounded">
                              
                            </select>
                            
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
                        <table id="table_paquete_general_examen" class="table color-table success-table  table-bordered table-striped dataTable no-footer display nowrap" role="grid" aria-describedby="myTable_info">
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

<style>
  .dt-body-right{
    width: 100%;
  }
  
</style>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="<?php echo base_url().'application/JavaScript/examenes-main-script.js'?>"></script>

<script type="text/javascript">
  
  function sumar() {
      subtotal = 0;
      $("#evaristoescuderohuillcamascco tbody tr").each(function() {
        subtotal = subtotal + Number($(this).find("td:eq(2)").text());
      });
      $("input[name=subtotal]").val(subtotal.toFixed(2));
      $("#subtotal").text("S/."+ subtotal.toFixed(2));
      porcentaje = 18;//$("#igv").val();
      igv = subtotal * (porcentaje/100);
      $("#igv_id").text("S/."+ igv.toFixed(2));
      $("input[name=igv]").val(igv.toFixed(2));
      
      total = subtotal + igv;
      $("#total_id").text("S/."+ total.toFixed(2));
      $("input[name=total_datos]").val(total.toFixed(2));
        
  }

  $(document).ready(function() {
    $(document).on('submit', '#registrar_datos_generales', function(event) {
      event.preventDefault();
      /* Act on the event */


        var sexo = $("sexo").val();
        var agregar_detalle__por_paquete = $("agregar_detalle__por_paquete").val();
        var tipo_pago = $("tipo_pago").val();

        sexo = document.getElementById("sexo").selectedIndex;
        if( sexo == null || sexo == 0 ) {
            Swal.fire({
              title: 'Sexo',
              text: "Sleccione Sexo",
              icon: 'error',
              showCancelButton: false,
              confirmButtonColor: '#3085d6',
              cancelButtonColor: '#d33',
              confirmButtonText: 'ok'
            }).then((result) => {
              if (result.value) {
                
              }
            })
          return false;
        }
        
        tipo_pago = document.getElementById("tipo_pago").selectedIndex;
        if( tipo_pago == null || tipo_pago == 0 ) {
            Swal.fire({
              title: 'Tipo Pago',
              text: "Seleccione Tipo Pago",
              icon: 'error',
              showCancelButton: false,
              confirmButtonColor: '#3085d6',
              cancelButtonColor: '#d33',
              confirmButtonText: 'ok'
            }).then((result) => {
              if (result.value) {
                
              }
            })
          return false;
        }
        tipocomprobante = document.getElementById("tipocomprobante").selectedIndex;
        if( tipocomprobante == null || tipocomprobante == 0 ) {
            Swal.fire({
              title: 'Paquete',
              text: "Seleccione Tipo Comprobante",
              icon: 'error',
              showCancelButton: false,
              confirmButtonColor: '#3085d6',
              cancelButtonColor: '#d33',
              confirmButtonText: 'ok'
            }).then((result) => {
              if (result.value) {
                
              }
            }) 
          return false;
        }

      $.ajax({
        url: '<?php echo base_url().'Examenes/Examenes/registrar_datos/'?>',
        type: 'POST',
        //dataType: 'default: Intelligent Guess (Other values: xml, json, script, or html)',
      //  data: $("form").serialize(),
        data:new FormData(this),  
        contentType:false,  
        processData:false,  
        statusCode: {
              400: function(xhr) {
                  var json = JSON.parse(xhr.responseText);
                  if (json.error) {
                      Swal.fire({
                          title: 'Lo siento mucho',
                          text: "" + json.error + "",
                          icon: 'error',
                          showCancelButton: false,
                          confirmButtonColor: '#3085d6',
                          cancelButtonColor: '#d33',
                          confirmButtonText: 'OK'
                      }).then((result) => {
                          if (result.value) {

                          }
                      })


                  }

              }
          }

      })
      .done(function() {
        console.log("success");
          let timerInterval
        Swal.fire({
          // icon : 'warning',
          title: 'Registrando...',
          html: 'Nuevo registro <b> </b> en proceso espere.',
          timer: 3000,
          timerProgressBar: true,
          onBeforeOpen: () => {
            Swal.showLoading()
            timerInterval = setInterval(() => {
              const content = Swal.getContent()
              if (content) {
                const b = content.querySelector('b')
                if (b) {
                  b.textContent = Swal.getTimerLeft()
                }
              }
            }, 100)
          },
          onClose: () => {
            clearInterval(timerInterval)
          }
        }).then((result) => {
          const Toast = Swal.mixin({
            toast: true,
            position: 'top-end',
            showConfirmButton: false,
            timer: 3000,
            timerProgressBar: true,
            didOpen: (toast) => {
              toast.addEventListener('mouseenter', Swal.stopTimer)
              toast.addEventListener('mouseleave', Swal.resumeTimer)
            }
          })

          Toast.fire({
            icon: 'success',
            title: 'Nuevo Registro agregado'
          })
            reload_table();
            //table.ajax.reload(null,false); 
            // table.ajax.reload();
          $('#registrar_datos_generales')[0].reset();  
          $('#collapseExample').collapse('hide').delay(1000);
          $("#general_poaquetes_id").hide(800);
          $("#mostramos_los_campos_agregar_uno_por_no").hide(800);
          $("#mostrar_paquete").hide(800);
          $("#mostrar_datos_paquetes").hide(800);
          $('#dvOcultar_iddd').hide();
          $("#agregar_nav_link").html("");

        })

      

        //alert("se registro de manera correcta");
      })
      .fail(function(jqXHR, textStatus, errorThrown) {
            console.log("error");
            if (jqXHR.status === 0) {
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
                    title: 'No tienes Conexion a Internet: Verifique la red.'
                })

            } else if (jqXHR.status == 404) {
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
                    title: 'Página solicitada no encontrada [404].'
                })

            } else if (jqXHR.status == 500) {
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
                    title: 'Error interno del servidor [500].'
                })


            } else if (textStatus === 'parsererror') {

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
                    title: 'El análisis JSON solicitado ha fallado'
                })

            } else if (textStatus === 'timeout') {

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
                    title: 'Error de tiempo de espera.'
                })

            } else if (textStatus === 'abort') {

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
                    title: 'Solicitud de Ajax abortada'
                })

            } else {

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
                    title: 'Solicitud de Ajax abortada ' + jqXHR.responseText + ''
                })


            }
        })
      .always(function() {
        console.log("complete");
      });
      
    });


    
    $(document).on('submit', '#registrar_nuevo_proveedor_sunat', function(event) {
        event.preventDefault();
        /* Act on the event */

        var nruc = $("#usuario").val();
        if (nruc =="") {
          Swal.fire({
              icon: 'error',
              title: 'Oops...',
              text: 'Ingrese Ruc y precione "Enter"!',
              footer: '<a href>Si es un error comunicase con Área de Sistemas?</a>'
            })
          return false;
        }
        $.ajax({
            url: '<?php echo base_url().'Inventario/Proveedores/Nuevo_registro/';?>',
            type: 'POST',
            data:$("form").serialize(),
            statusCode: {
              400: function(xhr) {
                  var json = JSON.parse(xhr.responseText);
                  if (json.error) {
                      Swal.fire({
                          title: 'Lo siento mucho',
                          text: "" + json.error + "",
                          icon: 'error',
                          footer: '<a href>Si es un error comunicase con Área de Sistemas?</a>',
                          showCancelButton: false,
                          confirmButtonColor: '#3085d6',
                          cancelButtonColor: '#d33',
                          confirmButtonText: 'OK'
                      }).then((result) => {
                          if (result.value) {
                            $('#registrar_nuevo_proveedor_sunat')[0].reset();  
                            $("#usuario").val("");
                            $("#rucx").val("");
                            $("#direccionx").val("");
                            $("#txt_telefono").val("");
                            $("#usuarioxx").text("");
                            $("#rucxxx").text("");
                            $("#txt_telefonoxx").text("");
                            $("#direccionxxx").text("");
                                $("#nruc").val("");
                              $('.bd-example-modal-lgs').modal('hide')
                          }
                      })


                  }

              }
          } 
        })
        .done(function() {
            console.log("success");
              Swal.fire({
                  title: 'Muy bien',
                  text: "Se registro de manera exitosa",
                  icon: 'success',
                  showCancelButton: false,
                  confirmButtonColor: '#3085d6',
                  cancelButtonColor: '#d33',
                  confirmButtonText: 'Muy bien!'
                }).then((result) => { 
                  if (result.value) {
                    $('#registrar_nuevo_proveedor_sunat')[0].reset();  
                    $('.bd-example-modal-lgs').modal('hide')
                    $("#usuario").val("");
                    $("#rucx").val("");
                    $("#direccionx").val("");
                    $("#txt_telefono").val("");
                    $("#usuarioxx").text("");
                    $("#rucxxx").text("");
                    $("#txt_telefonoxx").text("");
                    $("#direccionxxx").text("");
                    $("#nruc").val("");
                  
                    
                  }
                })
        })
        .fail(function(jqXHR, textStatus, errorThrown) {
            console.log("error");
            if (jqXHR.status === 0) {
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
                    title: 'No tienes Conexion a Internet: Verifique la red.'
                })

            } else if (jqXHR.status == 404) {
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
                    title: 'Página solicitada no encontrada [404].'
                })

            } else if (jqXHR.status == 500) {
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
                    title: 'Error interno del servidor [500].'
                })


            } else if (textStatus === 'parsererror') {

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
                    title: 'El análisis JSON solicitado ha fallado'
                })

            } else if (textStatus === 'timeout') {

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
                    title: 'Error de tiempo de espera.'
                })

            } else if (textStatus === 'abort') {

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
                    title: 'Solicitud de Ajax abortada'
                })

            } else {

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
                    title: 'Solicitud de Ajax abortada ' + jqXHR.responseText + ''
                })


            }
        })
        .always(function() {
            console.log("complete");
        });
        
    });


    $("#mostramos_datos_rdes").click(function(event) {
      /* Act on the event */
      event.preventDefault();

      $("#collapseExampdle").append(``);
    });

    $('.fantasmass').change(function(){
        if(!$(this).prop('checked')){
            $('#dvOcultar').hide(800);
            $("#hora").val("");
            $("#mdate").val("");
            
        }else{
            $('#dvOcultar').show(800);
            $("#hora").val("<?php echo date('h:i');?>");
            $("#mdate").val("<?php echo date('Y-m-d');?>");
        }
      
      })
    $(".fantasmasssss").change(function() {
      /* Act on the event */
      if(!$(this).prop('checked')){
            $('#dvOcultar_iddd').hide(800);
            
        }else{
            $('#dvOcultar_iddd').show(800);
            
        }
    });

    //ocultamos y mostramos los detalles de emporesa

    $(".evaristo_el_unico").change(function() {
      /* Act on the event */
      if(!$(this).prop('checked')){
            $('#agregamos_empresa_si_o_no').hide(800);
            $('#empresa_xxxxxxxxxxx').val("");
            $('#ruc_xxxx_empresa_xxx').val("");
        }else{
            $('#agregamos_empresa_si_o_no').show(800);
            
              
        }
    });

  });

//eliminar
$(document).on('click', '.delete', function(){  
      var user_id = $(this).attr("id"); 
      var c_obj = $(this).parents("tr");
      if(Swal.fire({
        title: '¿Estás seguro?',
        text: "¡No podrás revertir esto!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, delete it!'
      }).then((result) => {
        if (result.value) {
          $.ajax({  
                url:"<?php echo base_url().'Examenes/Examenes/Eliminar_detalle/';?>",  
                method:"POST",  
                data:{user_id:user_id},  
                success:function(data)  
                {  
                    //c_obj.remove();
                  //ajax.reload(null,false);
                  reload_table();
                }  
          }); 
          Swal.fire(
            'Eliminado!',
            'Su registro ha sido eliminado.',
            'success'
          )
        }
      }))

    {

    }
      else  
      {  
          return false;       
      }  
});  
function regresar_id() {
    $('#collapseExample').collapse('hide').delay(3000);
}
//mostramos y ocultamos los datos en general

$(document).ready(function() {
  
  $("#customRadio1_xxxx").click(function(event) {

    /* Act on the event */
    event.preventDefault();
    //ocultamos los datos a mostrar
    $("#general_poaquetes_id").hide(800);
    $("#mostramos_los_campos_agregar_uno_por_no").hide(800);
    $("#mostramos_datos_pequenois").html(`
        <table class="table full-color-table full-info-table hover-table color-bordered-table info-bordered-table" id="evaristoescuderohuillcamascco_iddd" >
            <thead>
                <tr class="bg-dark text-white text-center">
                    <th>CODIGO</th>
                    <th>DESCRIPCIÓN</th>
                    
                </tr>
            </thead>
            <tbody>
                
            </tbody>
        </table>`);
    $("#mostramos_datos_paquetes_precios").html(`
      <table class="table color-bordered-table warning-bordered-table">
        <tbody>
            <tr>
                <td class="text-right"><b>Total:</b></td>
                <td class="text-right" id="total_id_xx">0.00 </td>
                <td width="105px"><input type="hidden" name="total"></td>
            </tr>
        </tbody>
    </table>`);
      $("#mostramos_datos_desde_ajax").empty("");
      $("#mostramos_datos_del_igv_total_subtotal").empty("");
    //$("#evaristoescuderohuillcamascco tr").empty();
    //mostramos los datos
    $("#mostrar_paquete").show(800);
    $("#mostrar_datos_paquetes").show(800);

    //resetarmos el select
    
    
    
    // var dataatos =  $(".evaristoescuderohuillcamascco").attr('Id', 'registrar_datos_generales');
    var pagos = $(".evaristoescuderohuillcamascco").attr('Id', 'registrar_datos_generales');
    if (!pagos) {
      //pago
        $('#tipo_pago').prop('selectedIndex',0);
      
    }else{
      //tipo paquete
        $('#agregar_detalle__por_paquete').prop('selectedIndex',0);
    }
    
  
  });

  

  $("#genewral_paquetes_idd").click(function(event) {
    /* Act on the event */
      event.preventDefault();
      //ocultamos los datos que se estan mostrando
      $("#mostrar_paquete").hide(800);
      $("#mostrar_datos_paquetes").hide(800);
    // $("#evaristoescuderohuillcamascco_iddd tr").empty();
      $("#mostramos_datos_desde_ajax").html(`
        <table class="table full-color-table full-info-table hover-table color-bordered-table info-bordered-table" id="evaristoescuderohuillcamascco" >
            <thead>
                <tr class="bg-dark text-white text-center">
                    <th>CODIGO</th>
                    <th>DESCRIPCIÓN</th>
                    <th>PRECIO</th>
                    <th>&nbsp;</th>
                </tr>
            </thead>
            <tbody>
                
            </tbody>
        </table>`);
      $("#mostramos_datos_del_igv_total_subtotal").html(`
      <table class="table color-bordered-table warning-bordered-table">
            <tbody>
                <tr>
                    <td class="text-right" width="105px"><b>Sub-Total</b></td>
                    <td class="text-right" id="subtotal">0.00 </td>

                    <td width="105px"><input type="hidden" name="subtotal"></td>
                </tr>
                <tr>
                    <td class="text-right"><b>I.G.V:</b></td>
                    <td class="text-right" id="igv_id">0.00 </td>
                    <td width="105px"><input type="hidden" name="igv"></td>
                </tr>
                <tr>
                    <td class="text-right"><b>Total:</b></td>
                    <td class="text-right" id="total_id">0.00 </td>
                    <td width="105px"><input type="hidden" name="total_datos"></td>
                </tr>
            </tbody>
        </table>`);
      $("#mostramos_datos_pequenois").empty("");
      $("#mostramos_datos_paquetes_precios").empty("");
    //mostramnos
    $("#general_poaquetes_id").show(800);
    $("#mostramos_los_campos_agregar_uno_por_no").show(800);

    //resetarmos el select
    //tipo paquete
    //pago
    var pagos = $(".evaristoescuderohuillcamascco").attr('Id', 'registrar_datos_generales');
    if (!pagos) {
        //pago
        $('#tipo_pago').prop('selectedIndex',0);
        //tipo paquete
        
    }else{
      $('#agregar_detalle__por_paquete').prop('selectedIndex',0);
    }
    
  //  $('#tipo_pago').prop('selectedIndex',0);
  });
});


function sendRequest(){
  $.ajax({
    url: "<?php echo base_url().'Examenes/Examenes/correlativo_numer_exmaen/';?>",
    success:
      function(result){ 
/* si es success mostramos resultados */
      // $('#register').val(result);
        $('#nro_edentificador_insert').val('000'+result);
        
    
    },
    complete: function() { 
/* solo una vez que la petición se completa (success o no success) 
    pedimos una nueva petición en 3 segundos */
        setTimeout(function(){
          sendRequest();
        }, 3000);
      }
    });
  };

function sendRequest_codigo_unico(){
  $.ajax({
    url: "<?php echo base_url().'Examenes/Examenes/correlativo_numer_codigo_unico/';?>",
    success:
      function(result){ 
/* si es success mostramos resultados */
      // $('#register').val(result);
        $('#nro_valido_innomedic').val('INNOMED-00'+result);
        
        
    
    },
    complete: function() { 
/* solo una vez que la petición se completa (success o no success) 
    pedimos una nueva petición en 3 segundos */
        setTimeout(function(){
          sendRequest_codigo_unico();
        }, 3000);
      }
    });
  };


  function sendRequest_codigo_unico_validado(){
  $.ajax({
    url: "<?php echo base_url().'Examenes/Examenes/correlativo_numer_codigo_unico_id/';?>",
    success:
      function(result){ 
/* si es success mostramos resultados */
      // $('#register').val(result);
        $('#nro_valido_innomedic_codigo').val("INNOMED-00"+result+"");
        
        
    
    },
    complete: function() { 
/* solo una vez que la petición se completa (success o no success) 
    pedimos una nueva petición en 3 segundos */
        setTimeout(function(){
          sendRequest_codigo_unico_validado();
        }, 3000);
      }
    });
  };


  

/* primera petición que echa a andar la maquinaria */
$(function() {
    sendRequest();
    sendRequest_codigo_unico();
    sendRequest_codigo_unico_validado();
});


$(document).ready(function() {
  $('.dropify').dropify({
      messages: {
          'default': 'Arrastre y suelte un archivo aquí o haga clic en',
          'replace': 'Arrastra y suelta o haz clic para reemplazar',
          'remove':  'Eliminar',
          'error':   'Ooops, sucedió algo mal.'
      }
  });
});    

function fileValidatiosn(obj){
var uploadFile = obj.files[0];


if (!window.FileReader) {
    alert('El navegador no soporta la lectura de archivos');
    return;
}

if (!(/\.(jpg|png|gif|pdf|jpge)$/i).test(uploadFile.name)) {
  Swal.fire({
  title: 'Files',
  text: "El archivo a adjuntar no es una imagen solo acepta jpg|png|gif|jpg|pdf",
  icon: 'warning',
  showCancelButton: false,
  confirmButtonColor: '#3085d6',
  cancelButtonColor: '#d33',
  confirmButtonText: 'ok'
}).then((result) => {
  if (result.value) {
    var drEvent = $('#identity_picture').dropify();
      drEvent = drEvent.data('dropify');
      drEvent.resetPreview();
      drEvent.clearElement();
      drEvent.destroy();
      drEvent.init();
      $('.dropify#identity_picture').dropify({
      });
    // $("#user_image").val("");
  }
})
    
}

/*  var uploadFile = obj.files[0];
var img = new Image();
img.onload = function ()
{
if (this.width.toFixed(0) != 600 && this.height.toFixed(0) != 600)
{
  Swal.fire({
  title: 'Files',
  text: "La imagen debe ser de tamaño 600px por 600px.",
  icon: 'warning',
  showCancelButton: false,
  confirmButtonColor: '#3085d6',
  cancelButtonColor: '#d33',
  confirmButtonText: 'ok'
}).then((result) => {
  if (result.value) {
    
    
    var drEvent = $('#identity_picture').dropify();
      drEvent = drEvent.data('dropify');
      drEvent.resetPreview();
      drEvent.clearElement();
      drEvent.settings.defaultFile = publicpath_identity_picture;
      drEvent.destroy();
      drEvent.init();
      $('.dropify#identity_picture').dropify({
      defaultFile: publicpath_identity_picture,
      });
    // $("#user_image").val("");
  }
})


}
};
img.src = URL.createObjectURL(uploadFile);
*/
                                        
} 



function edit_person(id)
{
  //$('#registrar_historial_xx')[0].reset(); // reset form on modals
  $('#registrar_datos_generales').trigger("reset");


  //Ajax Load data from ajax
  $.ajax({
      url : "<?php echo base_url().'Examenes/Examenes/Obtener_registros/';?>"+id,
      type: "GET",
      dataType: "JSON",
      success: function(data)
      {
          $("#ocultanos_parta_actualizar").hide(800);
          $("#mostramos_datos_del_igv_total_subtotal").hide(800);
          $("#mostramos_datos_desde_ajax").hide(800);


          if (data.fecha_atencion=="" || data.fecha_atencion==null) {
            $("#agregamos_fecha_hora").hide(800);
          }else{
              $("#agregamos_fecha_hora").show();
          }

          $("#dvOcultar").hide(800);
          $("#ocultar_iddddddd").hide(800);
          $(".evaristoescuderohuillcamascco").attr('Id', 'actualizar_registro_por_id_datos_generales');
          $("#fecha_atencion_id").val(data.Id);
          $("#mdatex").val(data.fecha_atencion);
          $("#hora_atemncion_update").val(data.hora);
          // $("#idxx_actualizar").val(data.fecha_registro);
          $('#collapseExample').collapse('show').delay(3000);
          $("#dni_evaristo").val(data.dni);
          $("#nombres_completos").val(data.nombre);
          $("#apellido_paterno_x").val(data.apellido_paterno);
          $("#apellido_materno").val(data.apellido_materno);
          // $("#sexo option[value="+ data.id_sexo +"]").attr("selected",true).parent();
          $("#fecha_nacimiento").val(data.fecha_nacimiento);
          $("#correo_electronico").val(data.correo);
          $("#telefono_celular").val(data.telefono_celular);
          //$("#agregar_detalle__por_paquete option[value="+ data.id_paquete +"]").attr("selected",true).parent();
          //$("#tipo_pago option[value="+ data.id_pago +"]").attr("selected",true).parent();
          var selectRol = $("select#sexo");
          selectRol.val(data.id_sexo).attr("selected", "selected");
          //tipo pago
          //tipo_pago
          var selecttipopago = $("select#tipo_pago");
          selecttipopago.val(data.id_pago).attr("selected", "selected");
          // $("#tipo_pago  option[value="+ data.id_pago +"]").attr('selected', 'selected');
          //agregamos agregaer_detalle_por paquete

          //tiupo comromprante

          var selkecttipocomprobnate = $("select#tipocomprobante");
          selkecttipocomprobnate.val(data.tipocomprobante).attr("selected", "selected");

          var selecttipopaquete = $("select#agregar_detalle__por_paquete");
          selecttipopaquete.val(data.id_paquete).attr("selected", "selected");
          //$("#observacion").text(data.observacion);
          $("#observacion").attr("placeholder", "Ingrese observación ...........").val(data.observacion).focus().blur();
          $("#empresa_xxxxxxxxxxx").val(data.empresa);

          $("#ruc_xxxx_empresa_xxx").val(data.ruc);
          $("#nro_identificador_update").val(data.nro_identificador);
          $("#nro_identificador").val(data.nro_identificador);
          $("#min-date_update").val(data.fecha_atencion);
          

          if (data.boleta_pago=="" || data.boleta_pago==null) {
            datos_imagen = "boleta_no_borrarw.jpg";
          }else{
            datos_imagen = data.boleta_pago;
          }
          var imagenUrl = "<?php echo base_url().'upload/';?>boleta_cliente/"+datos_imagen+"";
          var drEvent = $('#identity_picture').dropify(
          {
            defaultFile: imagenUrl
          });
          drEvent = drEvent.data('dropify');
          drEvent.resetPreview();
          drEvent.clearElement();
          drEvent.settings.defaultFile = imagenUrl;
          drEvent.destroy();
          drEvent.init();
          

          $("#cambio_nombre_boton").html("<i class='fas fa-check-circle'></i>&nbsp;Actualizar Registro");
          $("#agregar_nav_link").html(`<li class="nav-item"> <a  class="nav-link" id="registrar_datos_xxxxxxxxx"><span class="hidden-sm-up"></span> <span class="hidden-xs-down font-weight-bold btn-dark btn btn-rounded" ><i class="fas fa-plus-circle"></i>&nbsp;Agregar Nuevo</span></a> </li>`);

          //MOSTRAMOS LOS DETALLES DE LOS CAMPOS onchange="return limpiar_campos_de_todos()"

          //mostramos la fecha si exioste op no

          


      },
      error: function (jqXHR, textStatus, errorThrown)
      {
          Swal.fire({
          title: 'Lo siento mucho',
          text: "Ponte en contacto con el Área de TI",
          type: 'warning',
          showCancelButton: false,
          confirmButtonColor: '#3085d6',
          cancelButtonColor: '#d33',
          confirmButtonText: 'Ok!(︶︿︶)!'
        }).then((result) => {
          if (result.value) {
            
          }
        })
      }
  });




}

//registrar nuevo tipo pago

$(document).ready(function() {
$(document).on('submit', '#registrar_nuevo_tipo_pago', function(event) {
  event.preventDefault();
  /* Act on the event */
  var nombre_tipo_pago = $("#nombre_tipo_pago").val();
  if (nombre_tipo_pago=="" || nombre_tipo_pago==0) {
    return false;
  }

  $.ajax({
    url: '<?php echo base_url().'Examenes/Examenes/registrar_tipo_pago_ajax/';?>',
    type: 'POST',
    // dataType: 'default: Intelligent Guess (Other values: xml, json, script, or html)',
    data: $("#registrar_nuevo_tipo_pago").serialize(),
    statusCode:{
    400: function(xhr){
      var json = JSON.parse(xhr.responseText);
      if (json.error) {
        Swal.fire({
            title: 'Lo siento mucho',
            text: ""+json.error+"",
            icon: 'error',
            showCancelButton: false,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'OK'
          }).then((result) => {
            if (result.value) {
              
            }
          })

      }
      
    }
  },
  })
  .done(function() {
    console.log("success");
      Swal.fire({
          icon: 'success',
          title: 'Muy bien!!',
          text: 'Registro Satisfactorio',
          
        })
        reload_table_tipo_pago();
        tipo_pago_();
  })
  .fail(function(jqXHR, textStatus, errorThrown) {
    console.log("error");
    Swal.fire({
      title: 'Lo siento mucho',
      text: "Ponte en contacto con el Área de TI",
      type: 'warning',
      showCancelButton: false,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      confirmButtonText: 'Ok!(︶︿︶)!'
    }).then((result) => {
      if (result.value) {
        
      }
    })
  })
  .always(function() {
    console.log("complete");
  });
  
});

$(document).on('submit', '#actualizar_registro_por_id_tipo_pago', function(event) {
  event.preventDefault();
  /* Act on the event */
  $.ajax({
    url: '<?php echo base_url().'Examenes/Examenes/actualizar_tipo_pago_idd/';?>',
    type: 'POST',
    // dataType: 'default: Intelligent Guess (Other values: xml, json, script, or html)',
    data: $("#actualizar_registro_por_id_tipo_pago").serialize(),
    statusCode:{
    400: function(xhr){
      var json = JSON.parse(xhr.responseText);
      if (json.error) {
        Swal.fire({
            title: 'Lo siento mucho',
            text: ""+json.error+"",
            icon: 'error',
            showCancelButton: false,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'OK'
          }).then((result) => {
            if (result.value) {
              $(".title_pago").text('Nuevo Tipo Pago');
              $(".denistorotovar").attr('id', 'registrar_nuevo_tipo_pago');
              $("#cambio_nomre_tipo_pago").html("<i class='fas fa-check-circle'></i>&nbsp;Nuevo Registro");
              $("#nombre_tipo_pago").val("");
              $("#agregar_id_tipo_pago").html("");
            }
          })

      }
      
    }
  },
  })
  .done(function(data) {
    console.log("success");
      var json = JSON.parse(data);
        Swal.fire({
          title: 'Muy bien..!!',
          text: ""+json.mensaje+"",
          icon: 'success',
          showCancelButton: false,
          confirmButtonColor: '#3085d6',
          cancelButtonColor: '#d33',
          confirmButtonText: 'ok...'
        }).then((result) => {
          if (result.value) {
            reload_table_tipo_pago();
            tipo_pago_();
            $(".title_pago").text('Nuevo Tipo Pago');
            $(".denistorotovar").attr('id', 'registrar_nuevo_tipo_pago');
            $("#cambio_nomre_tipo_pago").html("<i class='fas fa-check-circle'></i>&nbsp;Nuevo Registro");
            $("#nombre_tipo_pago").val("");
            $("#agregar_id_tipo_pago").html("");
            
          }
        })
      
  })
  .fail(function(jqXHR, textStatus, errorThrown) {
    console.log("error");
    Swal.fire({
      title: 'Lo siento mucho',
      text: "Ponte en contacto con el Área de TI",
      type: 'warning',
      showCancelButton: false,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      confirmButtonText: 'Ok!(︶︿︶)!'
    }).then((result) => {
      if (result.value) {
        
      }
    })
  })
  .always(function() {
    console.log("complete");
  });
  
});
//eliminamols



});

$(document).on('click', '.delete_tipo_pago', function(){  
      var user_idd = $(this).attr("id"); 
    // var c_obj = $(this).parents("tr");
      if(Swal.fire({
        title: '¿Estás seguro?',
        text: "¡No podrás revertir esto!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, delete it!'
      }).then((result) => {
        if (result.value) {
          $.ajax({  
                url:"<?php echo base_url().'Examenes/Examenes/eliminar_datos_generales_tipo_pago/';?>",  
                method:"POST",  
                data:{user_idd:user_idd},  
                success:function(data)  
                {  
                  reload_table_tipo_pago();
                  tipo_pago_();
                }  
          }); 
          Swal.fire(
            'Eliminado!',
            'Su registro ha sido eliminado.',
            'success'
          )
        }
      }))

    {

    }
      else  
      {  
          return false;       
      }  
}); 
function actualizar_tipo_pago(id) {
// body...
$('#registrar_nuevo_tipo_pago').trigger("reset");

  //Ajax Load data from ajax
  $.ajax({
      url : "<?php echo base_url().'Examenes/Examenes/Obtener_registros_tipo_pago/';?>"+id,
      type: "GET",
      dataType: "JSON",
      success: function(data)
      {
          
          $(".title_pago").text('Actualizar Tipo Pago');
          $(".denistorotovar").attr('id', 'actualizar_registro_por_id_tipo_pago');
          $("#nombre_tipo_pago").val(data.nombre);
          $("#agregar_id_tipo_pago").html("<input type='hidden' value='"+data.Id+"' name='id_tipo_pago_update'>");

          $("#cambio_nomre_tipo_pago").html("<i class='fas fa-check-circle'></i>&nbsp;Actualizar Registro");
      

          


      },
      error: function (jqXHR, textStatus, errorThrown)
      {
          Swal.fire({
          title: 'Lo siento mucho',
          text: "Ponte en contacto con el Área de TI",
          type: 'warning',
          showCancelButton: false,
          confirmButtonColor: '#3085d6',
          cancelButtonColor: '#d33',
          confirmButtonText: 'Ok!(︶︿︶)!'
        }).then((result) => {
          if (result.value) {
            
          }
        })
      }
  });

}


//registrar nuevo paquete              

$(document).ready(function() {
$(document).on('submit', '#registrar_nuevo_paquete', function(event) {
  event.preventDefault();
  /* Act on the event */
  var nombre_tipo_pago = $("#nuevo_paquete").val();
  var nuevo_precio = $("#nuevo_precio").val();
  if (nombre_tipo_pago=="" || nombre_tipo_pago==0) {
    return false;
  }

  if (nuevo_precio=="" || nuevo_precio==0) {
    return false;
  }

  $.ajax({
    url: '<?php echo base_url().'Examenes/Examenes/registrar_paquete_ajax/';?>',
    type: 'POST',
    // dataType: 'default: Intelligent Guess (Other values: xml, json, script, or html)',
    data: $("#registrar_nuevo_paquete").serialize(),
    statusCode:{
    400: function(xhr){
      var json = JSON.parse(xhr.responseText);
      if (json.error) {
        Swal.fire({
            title: 'Lo siento mucho',
            text: ""+json.error+"",
            icon: 'error',
            showCancelButton: false,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'OK'
          }).then((result) => {
            if (result.value) {
              
            }
          })

      }
      
    }
  },
  })
  .done(function() {
    console.log("success");
      Swal.fire({
          icon: 'success',
          title: 'Muy bien!!',
          text: 'Registro Satisfactorio',
          
        })
        reload_table_paquete();
        tipo_paquete_();
  })
  .fail(function(jqXHR, textStatus, errorThrown) {
    console.log("error");
    Swal.fire({
      title: 'Lo siento mucho',
      text: "Ponte en contacto con el Área de TI",
      type: 'warning',
      showCancelButton: false,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      confirmButtonText: 'Ok!(︶︿︶)!'
    }).then((result) => {
      if (result.value) {
        
      }
    })
  })
  .always(function() {
    console.log("complete");
  });
  
});

$(document).on('submit', '#actualizar_registro_por_id_paquete', function(event) {
  event.preventDefault();
  /* Act on the event */
  $.ajax({
    url: '<?php echo base_url().'Examenes/Examenes/actualizar_paquete_idd/';?>',
    type: 'POST',
    // dataType: 'default: Intelligent Guess (Other values: xml, json, script, or html)',
    data: $("#actualizar_registro_por_id_paquete").serialize(),
    statusCode:{
    400: function(xhr){
      var json = JSON.parse(xhr.responseText);
      if (json.error) {
        Swal.fire({
            title: 'Lo siento mucho',
            text: ""+json.error+"",
            icon: 'error',
            showCancelButton: false,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'OK'
          }).then((result) => {
            if (result.value) {
              $(".title_paquete").text('Nuevo Paquete');
              $(".denistorotovar_paquete").attr('id', 'registrar_nuevo_paquete');
              $("#cambio_nomre_paquete").html("<i class='fas fa-check-circle'></i>&nbsp;Nuevo Registro");
              $("#nuevo_paquete").val("");
              $("#nuevo_precio").val("");
              $("#agregar_id_paquete").html("");
                
            }
          })

      }
      
    }
  },
  })
  .done(function(data) {
    console.log("success");
      var json = JSON.parse(data);
        Swal.fire({
          title: 'Muy bien..!!',
          text: ""+json.mensaje+"",
          icon: 'success',
          showCancelButton: false,
          confirmButtonColor: '#3085d6',
          cancelButtonColor: '#d33',
          confirmButtonText: 'ok...'
        }).then((result) => {
          if (result.value) {
            reload_table_paquete();
            tipo_pago_();
            $(".title_paquete").text('Nuevo Paquete');
            $(".denistorotovar_paquete").attr('id', 'registrar_nuevo_paquete');
            $("#cambio_nomre_paquete").html("<i class='fas fa-check-circle'></i>&nbsp;Nuevo Registro");
            $("#nuevo_paquete").val("");
            $("#nuevo_precio").val("");
            $("#agregar_id_paquete").html("");
            
          }
        })
      
  })
  .fail(function(jqXHR, textStatus, errorThrown) {
    console.log("error");
    Swal.fire({
      title: 'Lo siento mucho',
      text: "Ponte en contacto con el Área de TI",
      type: 'warning',
      showCancelButton: false,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      confirmButtonText: 'Ok!(︶︿︶)!'
    }).then((result) => {
      if (result.value) {
        
      }
    })
  })
  .always(function() {
    console.log("complete");
  });
  
});
//eliminamols



});

$(document).on('click', '.delete_paquete', function(){  
      var user_idd = $(this).attr("id"); 
    // var c_obj = $(this).parents("tr");
      if(Swal.fire({
        title: '¿Estás seguro?',
        text: "¡No podrás revertir esto!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, delete it!'
      }).then((result) => {
        if (result.value) {
          $.ajax({  
                url:"<?php echo base_url().'Examenes/Examenes/eliminar_datos_generales_paquete/';?>",  
                method:"POST",  
                data:{user_idd:user_idd},  
                success:function(data)  
                {  
                    reload_table_paquete();
                  tipo_paquete_();
                }  
          }); 
          Swal.fire(
            'Eliminado!',
            'Su registro ha sido eliminado.',
            'success'
          )
        }
      }))

    {

    }
      else  
      {  
          return false;       
      }  
}); 
function actualizar_paquete(id) {
// body...
$('#registrar_nuevo_paquete').trigger("reset");

  //Ajax Load data from ajax
  $.ajax({
      url : "<?php echo base_url().'Examenes/Examenes/Obtener_registros_paquete/';?>"+id,
      type: "GET",
      dataType: "JSON",
      success: function(data)
      {
          
          $(".title_paquete").text('Actualizar Paquete');
          $(".denistorotovar_paquete").attr('id', 'actualizar_registro_por_id_paquete');
          $("#nuevo_paquete").val(data.nombre);
          $("#nuevo_precio").val(data.precio);
          $("#agregar_id_paquete").html("<input type='hidden' value='"+data.Id+"' name='id_tipo_paquete_update'>");

          $("#cambio_nomre_paquete").html("<i class='fas fa-check-circle'></i>&nbsp;Actualizar Registro");
      

          


      },
      error: function (jqXHR, textStatus, errorThrown)
      {
          Swal.fire({
          title: 'Lo siento mucho',
          text: "Ponte en contacto con el Área de TI",
          type: 'warning',
          showCancelButton: false,
          confirmButtonColor: '#3085d6',
          cancelButtonColor: '#d33',
          confirmButtonText: 'Ok!(︶︿︶)!'
        }).then((result) => {
          if (result.value) {
            
          }
        })
      }
  });

}


//agreamos paquete por general

$(document).ready(function() {
// table = 
    // $(".agregamos_detalle").click(function(event) {
    $(document).on('click', '.agregamos_detalle', function(event) {
      /* Act on the event */
      event.preventDefault();
      var userda_data = $(this).attr("id"); 
      

      $('#table_paquete_general_asociar').DataTable({ 
    
      "processing": true, //Feature control the processing indicator.
      "serverSide": true, //Feature control DataTables' server-side processing mode.
      "order": [], //Initial no order.

      // Load data for the table's content from an Ajax source
      "ajax": {
          "url": "<?php echo base_url().'Examenes/Examenes/agregamos_lista_paquetes/' ?>",
          "type": "POST",
          //"deferRender": true,
          //"dataSrc": "",
          "data": {
                "userda_data": userda_data,
            }
      },



      //Set column definition initialisation properties.
    
      "columnDefs": [
              { 
                  "targets": [ -1 ], //last column
                  "orderable": false, //set not orderable
                  "className": 'dt-body-right',
              },
              { 
                  "targets": [ -2 ], //2 last column (photo)
                  "orderable": false, //set not orderable
                  "className": 'dt-body-right',
              },
          ],
      "lengthMenu": [[5,10, 25, 50], [5,10, 25, 50]],


      "destroy": true,
      "info":true,
      "sInfo":true,
      // "order": [[1, "desc"]],
      "language":{
      "lengthMenu": "Mostrar _MENU_ Registros por página",
      "sInfo":"Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
      "sInfoFiltered":   "(filtrado de un total de _MAX_ registros)",
      //"info": "Mostrando pagina _PAGE_ de _PAGES_",
      /* "oLanguage": {
            "sInfo": "Mostrando START a END de TOTAL registros",
            "sZeroRecords": "No se encontraron registros coincidentes" 
        },*/
      "infoEmpty": "No hay registros disponibles",
      //"infoFiltered": "(filtrada de _MAX_ registros)",
      "loadingRecords": "Cargando...",
      "processing":     "Procesando...",
      "search": "Busqueda rapida:",
      "zeroRecords":    "No se encontraron registros coincidentes",
      "paginate": {
        "next":       "Siguiente",
        "previous":   "Anterior"
      },         
    },

  });
      $('.bd-example-modal-lg_asociar_paquetes').modal('show');
      $("#id_registrar_id_paquete").val(userda_data);
      
  });

});


//registrar asociacion de paquetes en general           

$(document).ready(function() {
$(document).on('submit', '#registrar_tipo_paquete_asociado', function(event) {
  event.preventDefault();
  /* Act on the event */
  var nombre_tipo_pago = $("#asociar_nombre").val();
  var categoria_tipo_asociar = $("#categoria_tipo_asociar").val();  
  if (nombre_tipo_pago=="" || nombre_tipo_pago==0) {
    return false;
  }
  if (categoria_tipo_asociar=="" || categoria_tipo_asociar==0) {
    Swal.fire(
        'Error!',
        'Seleccione Categoria',
        'error'
      )
    return false;
  }

  $.ajax({
    url: '<?php echo base_url().'Examenes/Examenes/registrar_tipo_paquete_asociado/';?>',
    type: 'POST',
    // dataType: 'default: Intelligent Guess (Other values: xml, json, script, or html)',
    data: $("#registrar_tipo_paquete_asociado").serialize(),
    statusCode:{
    400: function(xhr){
      var json = JSON.parse(xhr.responseText);
      if (json.error) {
        Swal.fire({
            title: 'Lo siento mucho',
            text: ""+json.error+"",
            icon: 'error',
            showCancelButton: false,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'OK'
          }).then((result) => {
            if (result.value) {
              
            }
          })

      }
      
    }
  },
  })
  .done(function() {
    console.log("success");
      Swal.fire({
          icon: 'success',
          title: 'Muy bien!!',
          text: 'Registro Satisfactorio',
          
        })
        $("#asociar_nombre").val(""); 
        $('#categoria_tipo_asociar').prop('selectedIndex',0);
        reload_table_paquete_asociado();

      
  })
  .fail(function(jqXHR, textStatus, errorThrown) {
    console.log("error");
    Swal.fire({
      title: 'Lo siento mucho',
      text: "Ponte en contacto con el Área de TI",
      type: 'warning',
      showCancelButton: false,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      confirmButtonText: 'Ok!(︶︿︶)!'
    }).then((result) => {
      if (result.value) {
        
      }
    })
  })
  .always(function() {
    console.log("complete");
  });
  
});

$(document).on('submit', '#actualizar_registro_por_id_paquete_asociado', function(event) {
  event.preventDefault();
  /* Act on the event */
  $.ajax({
    url: '<?php echo base_url().'Examenes/Examenes/actualizar_paquete_idd_asociado/';?>',
    type: 'POST',
    // dataType: 'default: Intelligent Guess (Other values: xml, json, script, or html)',
    data: $("#actualizar_registro_por_id_paquete_asociado").serialize(),
    statusCode:{
    400: function(xhr){
      var json = JSON.parse(xhr.responseText);
      if (json.error) {
        Swal.fire({
            title: 'Lo siento mucho',
            text: ""+json.error+"",
            icon: 'error',
            showCancelButton: false,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'OK'
          }).then((result) => {
            if (result.value) {
            

              $(".title_paquete_asociado").text('Nuevo Paquete Asociado');
              $(".evaristo_eldulce").attr('id', 'registrar_tipo_paquete_asociado');
              $("#asociar_nombre").val("");
              $("#id_registrar_id_paquete_asociado").val("");
              $('#categoria_tipo_asociar').prop('selectedIndex',0);
              $("#cambio_nomre_paquete_asoaciado").html("<i class='fas fa-check-circle'></i>&nbsp;Nuevo Registro");
                
            }
          })

      }
      
    }
  },
  })
  .done(function(data) {
    console.log("success");
      var json = JSON.parse(data);
        Swal.fire({
          title: 'Muy bien..!!',
          text: ""+json.mensaje+"",
          icon: 'success',
          showCancelButton: false,
          confirmButtonColor: '#3085d6',
          cancelButtonColor: '#d33',
          confirmButtonText: 'ok...'
        }).then((result) => {
          if (result.value) {
            reload_table_paquete_asociado();
              $(".title_paquete_asociado").text('Nuevo Paquete Asociado');
              $(".evaristo_eldulce").attr('id', 'registrar_tipo_paquete_asociado');
              $("#asociar_nombre").val("");
              $('#categoria_tipo_asociar').prop('selectedIndex',0);
              $("#id_registrar_id_paquete_asociado").val("");
              $("#cambio_nomre_paquete_asoaciado").html("<i class='fas fa-check-circle'></i>&nbsp;Nuevo Registro");
            
          }
        })
      
  })
  .fail(function(jqXHR, textStatus, errorThrown) {
    console.log("error");
    Swal.fire({
      title: 'Lo siento mucho',
      text: "Ponte en contacto con el Área de TI",
      type: 'warning',
      showCancelButton: false,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      confirmButtonText: 'Ok!(︶︿︶)!'
    }).then((result) => {
      if (result.value) {
        
      }
    })
  })
  .always(function() {
    console.log("complete");
  });
  
});
//eliminamols



});

$(document).on('click', '.delete_paquete_asociado', function(){  
      var user_idd = $(this).attr("id"); 
    // var c_obj = $(this).parents("tr");
      if(Swal.fire({
        title: '¿Estás seguro?',
        text: "¡No podrás revertir esto!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, delete it!'
      }).then((result) => {
        if (result.value) {
          $.ajax({  
                url:"<?php echo base_url().'Examenes/Examenes/eliminar_datos_generales_paquete_asociado/';?>",  
                method:"POST",  
                data:{user_idd:user_idd},  
                success:function(data)  
                {  
                    reload_table_paquete_asociado();
                }  
          }); 
          Swal.fire(
            'Eliminado!',
            'Su registro ha sido eliminado.',
            'success'
          )
        }
      }))

    {

    }
      else  
      {  
          return false;       
      }  
}); 

/****

***/
function actualizar_paquete_asociado(id) {
// body...
$('#registrar_tipo_paquete_asociado').trigger("reset");

  //Ajax Load data from ajax
  $.ajax({
      url : "<?php echo base_url().'Examenes/Examenes/Obtener_registros_paquete_asociados/';?>"+id,
      type: "GET",
      dataType: "JSON",
      success: function(data)
      {
          
          $(".title_paquete_asociado").text('Actualizar Paquete Asociado');
          $(".evaristo_eldulce").attr('id', 'actualizar_registro_por_id_paquete_asociado');
          $("#asociar_nombre").val(data.nombre);
          $("#asociar_codigo").val(data.codigo);
          $("#id_registrar_id_paquete_asociado").val(data.Id);
            var tipo_categoria_xx = $("select#categoria_tipo_asociar");
            tipo_categoria_xx.val(data.id_categoria).attr("selected", "selected");
        

          $("#cambio_nomre_paquete_asoaciado").html("<i class='fas fa-check-circle'></i>&nbsp;Actualizar Registro");
      

          


      },
      error: function (jqXHR, textStatus, errorThrown)
      {
          Swal.fire({
          title: 'Lo siento mucho',
          text: "Ponte en contacto con el Área de TI",
          type: 'warning',
          showCancelButton: false,
          confirmButtonColor: '#3085d6',
          cancelButtonColor: '#d33',
          confirmButtonText: 'Ok!(︶︿︶)!'
        }).then((result) => {
          if (result.value) {
            
          }
        })
      }
  });

}



//tipo examen agregamnos detalles

$(document).ready(function() {
$(document).on('submit', '#registrar_tipo_exmaen', function(event) {
  event.preventDefault();
  /* Act on the event */
  var nombre_examen_tipo = $("#nombre_examen_tipo").val();
  var precio_tipo_examen = $("#precio_tipo_examen").val();
  var categoria_tipo_examen = $("#categoria_tipo_examen").val();

  if (nombre_examen_tipo=="" || nombre_examen_tipo==0) {
    return false;
  }
  if (precio_tipo_examen=="" || precio_tipo_examen==0) {
    return false;
  }
  if (categoria_tipo_examen=="" || categoria_tipo_examen==0) {
    Swal.fire(
        'Oposs!',
        'Seleccione Categoria',
        'error'
      )
    return false;
  }

  $.ajax({
    url: '<?php echo base_url().'Examenes/Examenes/registrar_tipo_examen_por_ajax/';?>',
    type: 'POST',
    // dataType: 'default: Intelligent Guess (Other values: xml, json, script, or html)',
    data: $("#registrar_tipo_exmaen").serialize(),
    statusCode:{
    400: function(xhr){
      var json = JSON.parse(xhr.responseText);
      if (json.error) {
        Swal.fire({
            title: 'Lo siento mucho',
            text: ""+json.error+"",
            icon: 'error',
            showCancelButton: false,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'OK'
          }).then((result) => {
            if (result.value) {
              
            }
          })

      }
      
    }
  },
  })
  .done(function() {
    console.log("success");
      Swal.fire({
          icon: 'success',
          title: 'Muy bien!!',
          text: 'Registro Satisfactorio',
          
        })
        $("#nombre_examen_tipo").val("");
      $("#precio_tipo_examen").val("");
        table_paquete_general_examen_reload();

      
  })
  .fail(function(jqXHR, textStatus, errorThrown) {
    console.log("error");
    Swal.fire({
      title: 'Lo siento mucho',
      text: "Ponte en contacto con el Área de TI",
      type: 'warning',
      showCancelButton: false,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      confirmButtonText: 'Ok!(︶︿︶)!'
    }).then((result) => {
      if (result.value) {
        
      }
    })
  })
  .always(function() {
    console.log("complete");
  });
  
});

$(document).on('submit', '#actualizar_registro_por_id_paquete_tipoexmaen', function(event) {
  event.preventDefault();
  /* Act on the event */
  $.ajax({
    url: '<?php echo base_url().'Examenes/Examenes/actualizar_paquete_idd_tipoexamen/';?>',
    type: 'POST',
    // dataType: 'default: Intelligent Guess (Other values: xml, json, script, or html)',
    data: $("#actualizar_registro_por_id_paquete_tipoexmaen").serialize(),
    statusCode:{
    400: function(xhr){
      var json = JSON.parse(xhr.responseText);
      if (json.error) {
        Swal.fire({
            title: 'Lo siento mucho',
            text: ""+json.error+"",
            icon: 'error',
            showCancelButton: false,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'OK'
          }).then((result) => {
            if (result.value) {
            
              table_paquete_general_examen_reload();
              $(".title_paquete_tipoexamen").text('Nuevo Tipo Exámen');
              $(".evaristo_eldulce_escudero").attr('id', 'registrar_tipo_paquete_asociado');
              $("#nombre_examen_tipo").val("");
              $("#precio_tipo_examen").val("");
              $('#categoria_tipo_examen').prop('selectedIndex',0);
              $("#id_registrar_id_tipopexamen").val("");
              $("#cambio_nomre_paquete_asoaciado_escudero").html("<i class='fas fa-check-circle'></i>&nbsp;Nuevo Registro");
                
            }
          })

      }
      
    }
  },
  })
  .done(function(data) {
    console.log("success");
      var json = JSON.parse(data);
        Swal.fire({
          title: 'Muy bien..!!',
          text: ""+json.mensaje+"",
          icon: 'success',
          showCancelButton: false,
          confirmButtonColor: '#3085d6',
          cancelButtonColor: '#d33',
          confirmButtonText: 'ok...'
        }).then((result) => {
          if (result.value) {
              table_paquete_general_examen_reload();
              $(".title_paquete_tipoexamen").text('Nuevo Tipo Exámen');
              $(".evaristo_eldulce_escudero").attr('id', 'registrar_tipo_paquete_asociado');
              $("#nombre_examen_tipo").val("");
              $("#precio_tipo_examen").val("");
              $('#categoria_tipo_examen').prop('selectedIndex',0);
              $("#id_registrar_id_tipopexamen").val("");
              $("#cambio_nomre_paquete_asoaciado_escudero").html("<i class='fas fa-check-circle'></i>&nbsp;Nuevo Registro");
            
          }
        })
      
  })
  .fail(function(jqXHR, textStatus, errorThrown) {
    console.log("error");
    Swal.fire({
      title: 'Lo siento mucho',
      text: "Ponte en contacto con el Área de TI",
      type: 'warning',
      showCancelButton: false,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      confirmButtonText: 'Ok!(︶︿︶)!'
    }).then((result) => {
      if (result.value) {
        
      }
    })
  })
  .always(function() {
    console.log("complete");
  });
  
});
//eliminamols



});

function actualizar_tipoexamen(id) {
  // body...
  $('#registrar_tipo_exmaen').trigger("reset");

    //Ajax Load data from ajax
    $.ajax({
        url : "<?php echo base_url().'Examenes/Examenes/Obtener_registros_tipo_exmaen/';?>"+id,
        type: "GET",
        dataType: "JSON",
        success: function(data)
        {
            
            $(".title_paquete_tipoexamen").text('Actualizar Tipo Exámen');
            $(".evaristo_eldulce_escudero").attr('id', 'actualizar_registro_por_id_paquete_tipoexmaen');
            $("#nombre_examen_tipo").val(data.nombre);
            $("#precio_tipo_examen").val(data.precio);
            $("#id_registrar_id_tipopexamen").val(data.Id);
            $("#cambio_nomre_paquete_asoaciado_escudero").html("<i class='fas fa-check-circle'></i>&nbsp;Actualizar Registro");

            var tipo_categoria = $("select#categoria_tipo_examen");
            tipo_categoria.val(data.id_categoria).attr("selected", "selected");
        

            


        },
        error: function (jqXHR, textStatus, errorThrown)
        {
            Swal.fire({
            title: 'Lo siento mucho',
            text: "Ponte en contacto con el Área de TI",
            type: 'warning',
            showCancelButton: false,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Ok!(︶︿︶)!'
          }).then((result) => {
            if (result.value) {
              
            }
          })
        }
    });

}


$(document).on('click', '.delete_tipoexamen_xx', function(){  
      var user_idd = $(this).attr("id"); 
    // var c_obj = $(this).parents("tr");
      if(Swal.fire({
        title: '¿Estás seguro?',
        text: "¡No podrás revertir esto!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, delete it!'
      }).then((result) => {
        if (result.value) {
          $.ajax({  
                url:"<?php echo base_url().'Examenes/Examenes/eliminar_datos_generales_paquete_tipoexamen/';?>",  
                method:"POST",  
                data:{user_idd:user_idd},  
                success:function(data)  
                {  
                    table_paquete_general_examen_reload();
                }  
          }); 
          Swal.fire(
            'Eliminado!',
            'Su registro ha sido eliminado.',
            'success'
          )
        }
      }))

    {

    }
      else  
      {  
          return false;       
      }  
}); 
$(document).ready(function() {
    $(document).on('click', '.detalle_info_print', function(event) {
      event.preventDefault();
      /* Act on the event */
      var user_id = $(this).attr("id");
      $.ajax({
        url: '<?php echo base_url().'Examenes/Examenes/mostrar_datos_a_imprimir/';?>',
        type: 'POST',
        dataType: "JSON",
        data: {user_id:user_id},
      })
      .done(function(data) {
        console.log("success");
        // var json = JSON.parse(data);
        $(".bd-example-modal-xl_view").modal("show");
        $("#numero_identificador").text('CONTROL DE ATENCIONES DE SALUD N°  '+data.nro_identificador+' (Hoja de ruta)');

        $("#numero_historia").text('Historia Nº-'+data.nro_identificador+'');
        $("#dni_view").text(data.dni);
        $("#fecha_nacimiento_view").text(data.fecha_nacimiento);
        $("#edad_view").text(data.edad);
        $("#nombres_view").text(data.nombre);
        $("#apellido_paterno_view").text(data.apellido_paterno);
        $("#apellido_amterno_view").text(data.apellido_materno);
        $("#genero_view").text(data.genero);
        $("#correo_view").text(data.correo);
        $("#telefono_celular_view").text(data.telefono_celular);
        
        $()
        
        if (data.fecha_atencion=="" || data.fecha_atencion==null) {
          data_fecha = data.fecha_registro;
        }else{
          data_fecha = data.fecha_atencion;
        }
        $("#fecha_view").text(data_fecha);
        $("#fecha_view1").text(data_fecha);

        //datos de la empresa a mostrar

        if (data.empresa=="" || data.empresa ==null) {
            data_empresa = `<br>`;
            data_mnessaje =`acepto que la Clinica Ocupacional <strong>INNOMEDIC INTERNATIONAL E.I.R.L,</strong>`;
        }else{
          data_empresa = `<br><div class="row" style="border: 2px solid #000000; border-radius: 3px;">
            <div class="col-md-12">
              
            
              <table style="width: 100%">
                <tbody>
                  <tr>
                    <td style="width: 20%" class="font-weight-bold">Datos de la Empresa:</td>
                    
                  </tr>

                  <tbody>
              </table>
              <hr style="border: 1px solid #000000">
              <table style="border-collapse: collapse; width: 100%;border-spacing:  3px" border="0">
                    <tbody>
                    
                    <tr>
                    <td style="width: 70%;" class="font-weight-bold">Razón Social:&nbsp;<span class="font-weight-normal">`+data.empresa+`</span></td>
                    <td style="width: 30%;"  class="font-weight-bold">RUC:&nbsp;<span  class="font-weight-normal">`+data.ruc+`</span></td>
  
            
                    </tr>
          
                    </tbody>
              </table>
              </div>
          </div><br>`;
          data_mnessaje =`acepto que la empresa <strong>`+data.empresa+`</strong> mediante la Clinica Ocupacional <strong>INNOMEDIC INTERNATIONAL E.I.R.L,</strong>`;
        }

          $("#aceptacion_view").html(data_mnessaje);

        $("#mostramos_datos").html(data_empresa);
        $("#nombres_completos_view").text(data.nombre+" "+data.apellido_paterno+" "+data.apellido_materno);
        $("#dni_view_id").text(data.dni);


        //Impresion 2

        $("#numero_identificador1").text('CONTROL DE ATENCIONES DE SALUD N°  '+data.nro_identificador+' (Hoja de ruta)');
        $("#numero_historia1").text('Historia Nº-'+data.nro_identificador+'');

        $("#dni_view1").text(data.dni);
        $("#fecha_nacimiento_view1").text(data.fecha_nacimiento);
        $("#edad_view1").text(data.edad);
        $("#nombres_view1").text(data.nombre);
        $("#apellido_paterno_view1").text(data.apellido_paterno);
        $("#apellido_amterno_view1").text(data.apellido_materno);
        $("#genero_view1").text(data.genero);
        $("#correo_view1").text(data.correo);
        $("#telefono_celular_view1").text(data.telefono_celular);

      


        


        
        
        
      })
      .fail(function() {
        console.log("error");
      })
      .always(function() {
        console.log("complete");
      });
      

    });

    $(document).on('click', '.detalle_info_print', function(event) {
      event.preventDefault();
      /* Act on the event */
      var user_id = $(this).attr("id");
      $.ajax({
        url: '<?php echo base_url().'Examenes/Examenes/mostrar_datos_a_imprimir_detalles/';?>',
        type: 'POST',
        // dataType: "JSON",
        data: {user_id:user_id},
      })
      .done(function(data) {
        //console.log("success");

          var resultado = JSON.parse(data);
          var contenido = '';               
          $.each(resultado, function(index, value) {
              var $srx = ($(".jdr1s").length += 1);
            contenido += `<tr>
                            <td class="jdr1">`+ $srx+ `</td>
                            <td>`+value.descripcion+`</td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>`;
            /**/
            })
        $("#registrodetalle tbody").html(contenido); 

      })
      .fail(function() {
        console.log("error");
      })
      .always(function() {
        console.log("complete");
      });
      

    });

    //detalle por laboratorio


    $(document).on('click', '.detalle_info_print', function(event) {
      event.preventDefault();
      /* Act on the event */
      var user_id = $(this).attr("id");
      $.ajax({
        url: '<?php echo base_url().'Examenes/Examenes/mostrar_datos_a_imprimir_detalles_laboratorio/';?>',
        type: 'POST',
        // dataType: "JSON",
        data: {user_id:user_id},
      })
      .done(function(data) {
        //console.log("success");

          var resultado = JSON.parse(data);
          var contenido = '';               
          $.each(resultado, function(index, value) {
              var $srx = ($(".jdr1s").length += 1);
            contenido += `<tr>
                            <td class="jdr1">`+ $srx+ `</td>
                            <td>`+value.descripcion+`</td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>`;
            /**/
            })
        $("#registrodetalle_cstegoria tbody").html(contenido); 

      })
      .fail(function() {
        console.log("error");
      })
      .always(function() {
        console.log("complete");
      });
      

    });

    // Para activar el checkbox de paquetes como predeterminado
    document.getElementById("customRadio1_xxxx").click();
  }); 

  // Para activar el checkbox de paquetes como rpedeterminado siempre que se quiere agregar un examen
  $("#add_exam_trigger").click(function(event) {
    document.getElementById("customRadio1_xxxx").click();    
  });







</script>
<!-- Scripts related to the forms -->
<script src="<?php echo base_url().'application/JavaScript/examen-forms.js'?>"></script>

<?php //Se define el timezone que sea necesario
function fechaES($fecha){
$mes = array(
'January' => 'Enero',
'February' => 'Febrero',
'March' => 'Marzo',
'April' => 'Abril',
'May' => 'Mayo',
'June' => 'Junio',
'July' => 'Julio',
'August' => 'Agosto',
'September' => 'Septiembre',
'October' => 'Octubre',
'November' => 'Noviembre',
'December' => 'Diciembre'
);

return strtr($fecha, $mes);
}



ini_set('date.timezone', 'America/LIma'); 

//Dia-Mes-Año Hora:Minutos:Segundos
$fecha = date('d-m-Y H:i:s'); 
?>
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








              