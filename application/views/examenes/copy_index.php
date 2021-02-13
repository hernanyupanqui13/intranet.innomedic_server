 

                <div class="row  animated pulse delay-3s">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="card-header bg-dark">
                                    <h4 class="m-b-0 card-title text-white">Exámenes Clínicos</h4>

                                </div><br>
                                <!-- Nav tabs -->
                                <ul class="nav nav-tabs" role="tablist">
                                    <li class="nav-item"> <a class="nav-link active" data-toggle="tab" href="#home" role="tab"><span class="hidden-sm-up"><i class="ti-home"></i></span> <span class="hidden-xs-down font-weight-bold">Nueva Orden de Atención</span></a> </li>
                                    <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#profile" role="tab"><span class="hidden-sm-up"><i class="ti-user"></i></span> <span class="hidden-xs-down font-weight-bold">Lista de Exámenes Clínicos</span></a> </li>
                                   <!-- <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#messages" role="tab"><span class="hidden-sm-up"><i class="ti-email"></i></span> <span class="hidden-xs-down">Messages</span></a> </li>-->
                                </ul>
                                <!-- Tab panes gracias 12 -->
                                <div class="tab-content tabcontent-border">
                                    <div class="tab-pane active" id="home" role="tabpanel">
                                        <div class="p-20">
                                            <div class="col-lg-12">
                                                <div class="card ">
                                                    <div class="card-body">
                                                        <form class="">
                                                           <div class="row" style="display: none;">
                                                               <div class="col-md-1">
                                                                 <label for="input14" class="text-dark">Nº </label>
                                                                   <div class="form-group  m-b-40">
                                                                    
                                                                        <input type="text" class="form-control btn-rounded border border-dark " id="input14" value="00124" readonly="" style="background: #ffffff; "><span class="bar"></span>
                                                                       
                                                                       
                                                                    </div>
                                                               </div>
                                                             
                                                               <div class="col-md-3">
                                                                <label for="input14" class="text-dark">Fecha </label>
                                                                   <div class="form-group m-b-40">
                                                                        <input type="text" class="form-control btn-rounded border border-dark" id="mdate" value="<?php echo date('Y-m-d');?>" ><span class="bar"></span>
                                                                        
                                                                       
                                                                    </div>
                                                               </div>
                                                               <div class="col-md-2">
                                                                    <label  class="text-dark">Hora</label>
                                                                        <div class="form-group   m-b-40 input-group clockpicker " data-placement="left" data-align="top" data-autoclose="true">
                                                                            <input type="text" class="form-control btn-rounded border border-dark" value="<?php echo date('h:i') ?>"><span class="bar"></span>

                                                                            <div class="input-group-append">
                                                                                <span class="input-group-text"><i class=" fas fa-clock"></i></span>
                                                                            </div>
                                                                           
                                                                        </div>
                                                               </div>
                                                           </div>

                                                           <div class="row">
                                                            <div class="col-md-8">
                                                              <a href="javascript:void(0)" class="btn btn-dark btn-sm btn-rounded"><i class="fas fa-plus-circle"></i>&nbsp; Agregar Empresa</a>
                                                                  <label for="input14" class="text-dark">Empresa </label>
                                                                   <div class="form-group ">
                                                                        <input type="text" class="form-control btn-rounded border border-dark" id="empresa" value="" name="empresa" placeholder="Ingrese empresa..........."><span class="bar"></span>
                                                                         <span class="help-block"><small>Ingrese Empresa y preciona "Enter"</small></span>
                                                                    </div>
                                                               </div>
                                                                <div class="col-md-4">
                                                                  <label for="input14" class="text-dark">RUC </label>
                                                                   <div class="form-group ">
                                                                        <input type="text" class="form-control btn-rounded border border-dark" id="ruc" value="" name="ruc" placeholder="Ingrese ruc"><span class="bar"></span>
                                                                    </div>
                                                               </div>

                                                               
                                                           </div> 
                                                           <hr>
                                                           <h4 class="m-b-25 font-weight-bold ">Datos del Paciente</h4>
                                                           <div class="row">
                                                                <div class="col-md-2">
                                                                  <label for="input14" class="text-dark">DNI </label>
                                                                   <div class="form-group">
                                                                        <input type="text" class="form-control btn-rounded border border-dark" id="dni" value="" name="dni" placeholder="Ingrese DNI"><span class="bar"></span>
                                                                         <button style="display: none;" id="botoncito" class="botoncito btn btn-outline-success">Buscar</button>
                                                                        
                                                                       <span class="help-block"><small>Ingrese DNI y preciona "Enter"</small></span>
                                                                    </div>
                                                               </div>
                                                               <div class="col-md-2">
                                                                   <div class="form-group">
                                                                     <label for="input14" class="text-dark">Nombres </label>
                                                                        <input type="text" class="form-control btn-rounded border border-dark" id="nombres_completos" value="" name="nombres_completos" placeholder="Ingrese nombres"><span class="bar"></span>
                                                                       
                                                                    </div>
                                                               </div>
                                                               <div class="col-md-3">
                                                                   <div class="form-group">
                                                                      <label for="input14" class="text-dark">Apellido Paterno </label>
                                                                        <input type="text" class="form-control btn-rounded border border-dark" id="apellido_paterno" value="" name="apellido_paterno" placeholder="Ingrese apellido paterno"><span class="bar"></span>
                                                                      
                                                                    </div>
                                                               </div>
                                                               <div class="col-md-3">
                                                                   <div class="form-group">
                                                                    <label for="input14" class="text-dark">Apellido Materno </label>
                                                                        <input type="text" class="form-control btn-rounded border border-dark" id="apellido_materno" value="" name="apellido_materno" placeholder="Ingrese apellido materno"><span class="bar"></span>
                                                                        
                                                                    </div>
                                                               </div>
                                                               <div class="col-md-2">
                                                                    <div class="form-group mostrarsexo">
                                                                       <label for="input14" class="text-dark">Sexo </label>
                                                                       <select name="sexo" id="sexo" class="form-control btn-rounded border border-dark ">
                                                                        
                                                                       </select> 
                                                                    </div>
                                                               </div>
                                                               <div class="col-md-3">
                                                                   <div class="form-group"> 
                                                                    <label for="input14" class="text-dark">Fecha Nacimiento </label>
                                                                        <input type="date" class="form-control btn-rounded border border-dark" id="fecha_nacimiento" value="" name="fecha_nacimiento" placeholder="Ingrese Fecha de Nacimiento"><span class="bar"></span>
                                                                        
                                                                    </div>
                                                               </div>
                                                               <div class="col-md-6">
                                                                   <div class="form-group">
                                                                    <label for="input14" class="text-dark">Correo Electronico </label>
                                                                        <input type="email" class="form-control btn-rounded border border-dark" id="apellido_materno" value="" name="correo_electronico" placeholder="Ingrese Correo Eléctronico"><span class="bar"></span>
                                                                        
                                                                    </div>
                                                               </div>
                                                               <div class="col-md-3">
                                                                   <div class="form-group">
                                                                    <label for="input14" class="text-dark">Telefono/celular </label>
                                                                        <input type="text" class="form-control btn-rounded border border-dark" id="telefono_celular" value="" name="telefono_celular" placeholder="Ingrese Telefono celular"><span class="bar"></span>
                                                                        
                                                                    </div>
                                                               </div>
                                                               
                                                           </div>
                                                            <hr>
                                                           <h4 class="font-weight-bold">Información General</h4>
                                                           <div class="row">
                                                              
                                                               <div class="col-md-4">
                                                                  <div class="col-md-12">
                                                                    <a href="javascript:void(0)" class="btn btn-dark btn-sm btn-rounded"><i class="fas fa-plus-circle"></i>&nbsp; Agregar Paquete</a>
                                                                     <label for="input14" class="text-dark">Paquete </label>
                                                                       <div class="form-group mostrararea">
                                                                            <select name="paquete" id="paquete" class="form-control btn-rounded border border-dark ">
                                                                           
                                                                           </select>
                                                                           
                                                                        </div>
                                                                   </div>

                                                                    
      
                                                               </div>

                                                               <div class="col-md-3">
                                                                 <a href="javascript:void(0)" class="btn btn-dark btn-sm btn-rounded"><i class="fas fa-plus-circle"></i>&nbsp; Agregar Tipo Pago</a>
                                                                <label for="input14" class="text-dark">Tipo de Pago </label>
                                                                    <div class="form-group  m-b-40">
                                                                       <select name="tipo_pago" id="tipo_pago" class="form-control  btn-rounded border border-dark">
                                                                        <option value="---">--Forma de Pago--</option>
                                                                           <option value="sasa">Efectivo</option>
                                                                           <option value="as">Visa</option>
                                                                           <option value="as">Mastercard</option>
                                                                           <option value="as">Transferecia</option>
                                                                       </select>
                                                                    </div>
                                                               </div>
                                                                <div class="col-md-4">
                                                               
                                                                 <div class="col-md-12">
                                                                    <label for="input14" class="text-dark">Observación </label>
                                                                       <div class="form-group ">
                                                                            <textarea name="observacion" id="observacion" cols="2" rows="3" class="form-control border border-dark " placeholder="Ingrese observación ..........."></textarea>
                                                                            
                                                                        </div>
                                                                   </div>
                                                                
                                                               </div>
  
                                                           </div>
                                                           <hr>
                                                            <div class="row">
                                                              <div class="col-md-8">
                                                                <a href="javascript:void(0)" class="btn btn-dark btn-sm btn-rounded"><i class="fas fa-plus-circle"></i>&nbsp; Agregar Examén</a>
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

                                                            <div class="row">
                                                              <div class="table-responsive">
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
                                                                </table>
                                                            </div>
                                                            <div class="col-md-8"></div>
                                                               <div class="col-md-4">
                                                                  <div class="table-responsive">
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
                                                                                  <td width="105px"><input type="hidden" name="total"></td>
                                                                              </tr>
                                                                          </tbody>
                                                                      </table>
                                                                  </div>
                                                            </div>
                                                          </div>
                                                          <div class="row">
                                                            <div class="col-md-12 text-center">
                                                              <hr>
                                                             <a href="javascript:void(0)" class="btn btn-danger btn-rounded btn-lg"><i class="fas fa-times-circle"></i>&nbsp;Cancelar</a>
                                                              <button type="submit" class="btn btn-info btn-rounded btn-lg"><i class="fas fa-check-circle"></i>&nbsp;Nuevo Registro</button>
                                                              <hr>
                                                            </div>
                                                          </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tab-pane  p-20" id="profile" role="tabpanel">
                                        <div class="col-lg-12">
                                            <div class="card">
                                                <div class="card-body">
                                                    <h4 class="card-title">Lista de Citas</h4>
                                                    <div class="table-responsive">
                                                        <table id="myTable" class="table table-bordered table-striped ">
                                                            <thead>
                                                                <tr>
                                                                    <th>Fecha</th>
                                                                    <th>Apellidos</th>
                                                                    <th>Nombres</th>
                                                                    <th>Empresa</th>
                                                                    <th>Subcontrata</th>
                                                                    <th>Observaciones</th>
                                                                    <th>Opciones</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                <tr>
                                                                    <td>Tiger Nixon</td>
                                                                    <td>System Architect</td>
                                                                    <td>Edinburgh</td>
                                                                    <td>61</td>
                                                                     <td>2011/04/25</td>
                                                                    <td>$320,800</td>
                                                                    <td>
                                                                      <a href="javascript:void(0)">algo mas</a>
                                                                    </td>
                                                                </tr>
                                                
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                   <!-- <div class="tab-pane p-20" id="messages" role="tabpanel">3</div>-->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>



              <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
                <script>
                  $(document).ready(function() {
                 
                      // body...
                      $.ajax({
                            type: "POST",
                            async:true,
                            url: "<?php echo base_url().'Examenes/Examenes/cargar_area/' ?>",
                            success: function(response)
                            {
                                $('.mostrararea select').html(response).fadeIn();
                            }
                    });

                      //mostramos los datos de sexo

                      $.ajax({
                            type: "POST",
                            async:true,
                            url: "<?php echo base_url().'Examenes/Examenes/cargar_sexo/' ?>",
                            success: function(response)
                            {
                                $('.mostrarsexo select').html(response).fadeIn();
                            }
                    });





                 


                   
 
                });

                  $(document).ready(function() {
                    $(document).on('click', '#agregar_detalle_value', function(event) {
                      event.preventDefault();
                      /* Act on the event */
                       var id_codigo = $("#examen_evaristo_id").val();
                       var examen_idddd = $("#examen_idddd").val();
                       if (examen_idddd == null || examen_idddd.length == 0 || /^\s+$/.test(examen_idddd) ) {
                        Swal.fire(
                            'Oposs!',
                            'Primero Ingrese el tipo Exámen',
                            'error'
                          )
                        return false;
                       }

                        


                       
                       $.ajax({
                         url: '<?php echo base_url().'Examenes/Examenes/agregar_detalle_tipo_examen/';?>',
                         type: 'POST',
                         dataType: 'json',
                         data: {id_codigo:id_codigo},
                       })
                       .done(function(data) {
                        var rowid = Math.random();
                        var $sr = ($(".jdr1").length + 1);

                        $("#evaristoescuderohuillcamascco tbody tr").each(function() {
                            subtotal = $(this).find("td:eq(1)").text();
                            if (subtotal == data.nombre) {
                              Swal.fire({
                                  title: 'Verficar',
                                  text: "Ya esta en la lista de detalle",
                                  icon: 'warning',
                                  showCancelButton: true,
                                  confirmButtonColor: '#3085d6',
                                  cancelButtonColor: '#d33',
                                  confirmButtonText: 'Yes, delete it!'
                                }).then((result) => {
                                  if (result.isConfirmed) {
                                    Swal.fire(
                                      'Deleted!',
                                      'Your file has been deleted.',
                                      'success'
                                    )

                                    return false;
                                  }
                                })
                                $(this).closest("tr").remove();
                            }

                                                    
                        });
                   
                          var $html =`<tr class="jdr1" id="` + rowid + `">
                                        <td class="text-center"><input type="hidden" name="id_producto[]" value="`+data.Id+`" />` + data.codigo + `</span><input type="hidden" name="count[]" value="6437"></td>'</td>
                                        <td class="text-center"><input type="hidden" name="nombre[]" value="`+data.nombre+`" />`+data.nombre+`</td>
                                        <td class="text-center"><input type="hidden" name="stock[]" value="`+data.precio+`" /><p>`+data.precio+`</p></td>
                                        <td class="text-right"><button type='button' class='btn btn-remove-producto btn-danger '><i class='fas fa-times-circle'></i></button></td>
                                        <input type='hidden' name='codigo[]' value='`+data.codigo+`'/>
                                    </tr>`;
                          $("#evaristoescuderohuillcamascco tbody").append($html); 
                          $("#examen_idddd").val("");
                          sumar();
                  

                       })
                       .fail(function() {
                         console.log("error");
                       })
                       .always(function() {
                         console.log("complete");

                       });
                       
                     
                    });

                    //remover el pedido
                  $(document).on("click",".btn-remove-producto", function(){
                        $(this).closest("tr").remove();
                         sumar();
                       
                    });
                  });
                </script>

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
                      $("input[name=total]").val(total.toFixed(2));
                       
                  }

                    /*    $(document).ready(function() {
                   /* $("#buscar_registro_por_ajax").click(function(event) {
                      /* Act on the event *
                      event.preventDefault();
                      fecha_inicio = $("#fecha_inicio").val();
                      fecha_fin = $("#fecha_fin").val();
                      $.ajax({
                        url: '<?php echo base_url().'Examenes/Examenes/mostrar_datos_busqueda_avanzada/' ?>',
                        type: 'POST',
                      //  dataType: 'json',
                        data: {fecha_inicio: fecha_inicio,fecha_fin:fecha_fin},
                      })
                      .done(function(data) {
                        //console.log("success");

                         var resultado = JSON.parse(data);
                          var contenido = '';               
                          $.each(resultado, function(index, value) {
                            var rowid = Math.random();
                            if (value.fecha_atencion=="" || value.hora=="") {
      
                              fecha_atencion = '<span class="label label-table label-success">'+ value.fecha_registro+'</span>';
                              }else{
                                
                              fecha_atencion = '<span class="label label-table label-danger">'+value.fecha_atencion+" Hora "+value.hora+'</span>';
                              }
                              

                              if (value.status=="1") {
                                estados ='<span class="label label-table label-warning">En proceso</span>';
                              }else if(value.status=="2"){
                                estados ='<span class="label label-table label-danger">Anulado</span>';
                              }else if(value.status=="3"){
                                estados ='<span class="label label-table label-success">Atendido</span>';
                              }else{
                                estados ='<span class="label label-table label-info">Observación</span>';
                              }
                            var $sr = ($(".jdr1").length + 1);
                            contenido += `<tr class="jdr1" id="` + rowid + `">
                                            <td>`+$sr+`</td>
                                            <td>` + value.apellido_paterno +" "+value.apellido_materno + `</td>
                                            <td>`+value.nombre+`</td>
                                            <td>`+value.dni+`</td>
                                            <td>`+value.empresa+`</td>
                                            <td>`+fecha_atencion+`</td>
                                            <td>`+value.tipopago+`</td>
                                            <td>`+estados+`</td>
                                            <td><a class="btn btn-success" href="javascript:void(0)" title="Actualizar" onclick="edit_person(`+value.Id+`)"><i class="fas fa-edit"></i></a>
                                            <a class="btn  btn-info" href="javascript:void(0)"  title="Ver Detalle" id="'.$person->Id.'"><i class=" fas fa-clipboard-list"></i></a>
                                             <a class="btn  btn-danger delete" href="javascript:void(0)"  title="Eliminar" id="'.$person->Id.'"><i class="fas fa-trash-alt"></i></a></td>    
                                        </tr>`;
                            /**
                           })
                        $("#myTable tbody").html(contenido); 

                      })
                      .fail(function() {
                        console.log("error");
                      })
                      .always(function() {
                        console.log("complete");
                      });
                      


                    });*
                  });*/
                </script>
              


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
                      <div class="modal-body" style="height: 80vh;overflow-y: auto;" >
                        <div class="container-fluid" id="printableArea_desc">
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
                                    <td style="width: 50%" class="text-right font-weight-bold" >Fecha Atención :&nbsp;<span class="font-weight-normal" id="fecha_view"></span></td>
                                     <td style="width: 30%" class="text-right font-weight-bold" id="numero_historia"></td>
                                  </tr>

                                  <tbody>
                              </table>
                              <hr style="border: 1px solid #000000">
                              <table style="border-collapse: collapse; width: 100%;border-spacing:  3px" border="0" cellspacing="6" cellpadding="6">
                                    <tbody>
                                    
                                    <tr>
                                    <td style="width: 40%;" class="font-weight-bold">Nº Documento:&nbsp;<span id="dni_view" class="font-weight-normal"></span></td>
                                    <td style="width: 40%;"  class="font-weight-bold">Fecha de Nacimiento:&nbsp;<span id="fecha_nacimiento_view" class="font-weight-normal"></span></td>
                                    <td style="width: 40%;" class="font-weight-bold">Edad:&nbsp;<span id="edad_view" class="font-weight-normal"></span></td>
                            
                                    </tr>
                                    <tr>
                                    <td style="width: 40%;" class="font-weight-bold">Nombres:&nbsp; <span class="font-weight-normal" id="nombres_view"></span></td>
                                    <td style="width: 40%;" class="font-weight-bold">Apellido Paterno&nbsp; <span class="font-weight-normal" id="apellido_paterno_view"></span></td>
                                    <td style="width: 40%;" class="font-weight-bold">Apellido Materno&nbsp; <span class="font-weight-normal" id="apellido_amterno_view"></span></td>
                                    </tr>
                                    <tr>
                                    <td style="width: 40%;" class="font-weight-bold">Genero:&nbsp; <span class="font-weight-normal" id="genero_view"></span></td>
                                    <td style="width: 40%;" class="font-weight-bold">E-mail:&nbsp; <span class="font-weight-normal" id="correo_view"></span></td>
                                    <td style="width: 40%;" class="font-weight-bold">Telefono:&nbsp; <span class="font-weight-normal" id="telefono_celular_view"></span></td>

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

                          <div class="row" style="border: 2px solid #000000; border-radius: 3px;">
                            <div class="col-md-12">
                              <pn class="text-justify"><strong>CONSTANCIA DE CONSENTIMIENTO INFORMADO</strong>
                                Por lo tanto, YO, <strong id="nombres_completos_view"></strong>,&nbsp;<span id="aceptacion_view"></span> me realice un Control de Salud Ocupacional en virtud a lo dispuesto por la ley N° 29783. y afirmo que toda información declarada durante mi evaluación es verás. Los resultados de esta evaluación me serán informados personalmente por un profesional de salud y son confidenciales de acuerdo a lo establecido por ley.</p> 
                             

                              
                            </div>
                          </div>


                          <div class="row text-center">
                              <div class="table-responsive">
                                  <table border="0" width="100%">
                                      <thead ><!--<img class="img-fluid " style="width: 313px; height: 135px;" src="<?php echo base_url().'upload/';?>archivos/" alt="">-->
                                          <tr class="text-center p-5 m-5">
                                              <th> <div class="col-md-6 text-center m-5 p-5">
                                      <p ><span></span><br><span style="text-decoration: overline;">FIRMA DEL TRABAJADOR</span><br><span>DNI:<span id="dni_view_id"></span></span></p>
                                  </div></th>
                                              <th><div class="col-md-6 text-center ">
                                      <p ><span><img class="img-fluid " style="width: 150px; height: 150px;"  alt=""></span><br><span>HUELLA DIGITAL</span></p>
                                  </div></th>

                                          </tr>
                                      </thead>
                                  </table>
                              </div>

                              
                            </div>

                            <div class="text-right">
                                 <p class="">Lima <?php echo fechaES(strftime('%d de %B de %Y')); ?></p>
                              </div>
                        </div>
                        
                      </div>

                      


                    </div>
                  </div>
                </div>