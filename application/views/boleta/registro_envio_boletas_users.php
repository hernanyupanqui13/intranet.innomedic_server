<div class="row">
	<div class="col-md-12">
		<div class="card">
			<div class="card-body">
				 <h3>Registro de envio de Boletas</h3>
         <hr>
				<form action="#" method="POST" id="buscar_registro_por_orden_fecha">
                       <div class="row text-center">
                        	<div class='col-md-5 col-lg-3'>
                               <label for=""><b>Apellidos y Nombres</b></label>
                               <input type="text" class="form-control" name="nombres" id="nombres" placeholder="Ingrese apellido a buscar">
                            </div>
                            <div class='col-md-4 col-lg-3 text-center'>
                                   <div class="form-group">
                                       <label class="control-label"><b>Nº DE DOCUMENTO:</b></label>
                                       <input type="text" maxlength="8" minlength="8" id="dni"  class="form-control" placeholder="Busqueda por DNI : 00000000" value="<?php echo $num; ?>" name="numcomdni"  id="numcomprobante">
                                   </div>
                            </div>
                            <div class='col-md-2 col-lg-3'>
                              <div class="form-group ">
                                      <br>
                                       <button type="submit" class="btn btn-success waves-effect waves-light">
                                           <i class="fa fa-search m-r-5"></i><span> Buscar </span>
                                       </button>
                                       <a href="javascript:void(0)" id="limpiar_campos" class="btn btn-outline-danger"><i class=" fas fa-history"></i> Limpiar</a>
                               </div>
                            </div>
                        
                       </div>
                 </form>

				        <div class="table-responsive pt-4 ver_cabcera" style="display: none;">
                    <table id="table" class="table table-bordered table-hover contact-list" data-paging="true" data-paging-size="7" >
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Apellidos y Nombres</th>
                                <th>DNI</th>
                                <th>Puesto</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                        	

                        </tbody>
                    </table>
                </div>
                <hr>
                <h3 class="ver" style="display: none;">Detalle de Envio de Boletas</h3>
                <div class="table-responsive ver pt-4" style="display: none;">
                    <table id="myTable_wrapper" class="table table-bordered table-hover contact-list" data-paging="true" data-paging-size="7" >
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Colaborador</th>
                                <th>DNI</th>
                                <th>Tipo Boleta</th>
                                <th>Año</th>
                                <th>Periodo</th>
                                <th>Estado</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                          

                        </tbody>
                    </table>
                </div>
                <span id="mostrar_data_dowload" style="display: none;">
                     <div class="row "  >
                      
                      <div class="col-md-12  text-right">
                        <form action="">
                          <input type="hidden" value="" id="id_usuario_xxx" name="id_usuario">
                          <input type="hidden" value="" id="ano_xx" name="ano">
                          <a href="javascript:void(0)"  class="btn btn-outline-success btn_ver_excel"><i class="fas fa-file-excel fa-2x"></i></a>
                         <a href="javascript:void(0)" class="btn btn-outline-danger btn_ver_pdf_view"><i class="fas fa-file-pdf fa-2x"></i></a>
                       </form>
                      </div>
                      
                     </div>
                </span>
				
			</div>
		</div>
	</div>
	
</div>


<script type="text/javascript">
	function mensaje() {
		Swal.fire(
		  'Oops...',
		  'No disponible por el momento',
		  'info'
		)
	}
</script>



  
</form>



<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>


                    <script>
                       
                       $(document).ready(function() {
                           $(document).on('submit', '#buscar_registro_por_orden_fecha', function(event) {

                           event.preventDefault();
                          var dni = $("#dni").val();

                          /*if (dni==="" || dni ===null) {
                           // table.ajax.reload();
                           alert("ingrese un numero dni a buscar");        
                          }*/

                           /* Act on the event */
                           $.ajax({
                               url: '<?php echo base_url().'Boleta/Boleta/buscar_ajax/';?>',
                               type: 'POST',
                               data: $("form").serialize()
                           })
                           .done(function(data) {

                            var resultado = JSON.parse(data);
                            var contenido = '';  
                            if (resultado =="" || resultado ==null) {
                              Swal.fire(
                                        'Oopss',
                                        'No se encontro ningun registro con la busqueda',
                                        'error'
                                      )

                                $(".ver_cabcera").hide();
                                 $(".ver").hide();
                                 $("#mostrar_data_dowload").hide();

                             //  $(".ver_cabcera").load(location.href+" .ver_cabcera>*","");
                            }else{
                               $.each(resultado,function(index, value) {
                                var $sr = ($(".jdr1").length += 1);
                                contenido +=`
                                <tr>
                                    <td  class="jdr1">`+$sr+`</td>
                                    <td>`+value.nombres+`</td>
                                    <td>`+value.nro_documento+`</td>
                                    <td>`+value.puesto+`</td>
                                    
                                    <td><a class="btn-outline-success btn btn_imprimir_data" Id="`+value.id_usuario+`" href="javascript:void(0)"><i class="fas fa-eye"></i> Ver detalle</a> </td>
                                </tr>
                                `;
                                $("#table tbody").html(contenido);
                                $(".ver_cabcera").show();
                            });
                            }              
                           
                            //<input type="text"  id="btn_ano" value="">

                                 
                           })



                           .fail(function() {
                               console.log("error");
                           })
                           .always(function(data) {
                               console.log("complete");
                              

                           });
                           
                       });

                       $(document).on('click', '#limpiar_campos', function(event) {
                         event.preventDefault();
                         /* Act on the event */
                          $("#nombres").val("");
                          $("#dni").val("");
                          $(".ver").hide();
                          $("#mostrar_data_dowload").hide();
                          $(".ver_cabcera").hide();
                       });

                       





                       });


                       $(document).on('click', '.btn_imprimir_data', function(event) {
                         event.preventDefault();
                         /* Act on the event */
                          var user_id = $(this).attr("id"); 
                          
                          //var ano = $(".ano").val(); 
                          if (user_id=="" || user_id==null) {

                          }else{
                             (async () => { 
                                 const { value: fruit } = await Swal.fire({
                                  title: 'Seleccionar validación de campo',
                                  input: 'select',
                                  inputOptions: {
                                    <?php $ano = $this->db->query("select YEAR(fecha_enviado) as ano  from ts_entrega_boleta  group by ano order by ano desc");
                                    foreach ($ano->result() as $xx) {?>
                                     <?php echo $xx->ano; ?>: '<?php echo $xx->ano; ?>',
                                   <?php } ?>
                                  },
                                  inputPlaceholder: 'Seleccione el año',
                                  showCancelButton: true,
                                  inputValidator: (value) => {
                                    return new Promise((resolve) => {
                                      if (value =="" ) {
                                        resolve('Necesitas seleccionar el año :)')
                                      } else {
                                        resolve()
                                      }
                                    })
                                  }
                                })
                                if (fruit) {
                                  $("#id_usuario_xxx").val(user_id);
                                  $("#ano_xx").val(fruit);
                                 // Swal.fire('You selected: ' + fruit)
                                 // $("#btn_ano").val(fruit);
                                  $.ajax({
                                    url: '<?php echo base_url().'Boleta/Boleta/obtener_detalle_de_boleta_por_usuario/';?>',
                                    type: 'POST',
                                   // dataType: 'json',
                                    data: {user_id: user_id,fruit:fruit},
                                  })
                                  .done(function(data) {
                                    var resultado = JSON.parse(data);
                                    var contenido = '';   
                                    if (resultado=="" || resultado==null) {
                                      Swal.fire(
                                        'Oopss',
                                        'No existe ninguna información',
                                        'error'
                                      )
                                      $(".ver").hide();
                                       $("#mostrar_data_dowload").hide();
                                    }else{
                                    $.each(resultado,function(index, value) {
                                       var $sr = ($(".jdr1s").length += 1);
                                      if (value.fecha_enviado_xx=="" || value.fecha_enviado_xx==null || value.fecha_enviado_xx=="0000-00-00 00:00:00" ) {
                                          data_fecha = "<span class='label label-danger'> No se ha visualizado la boleta</span>";
                                        }else if (value.view == "2" && value.conforme == null){
                                          data_fecha = "<span class='label label-warning'>"+value.fecha_enviado_xx+"</span>";
                                        } else if(value.view == "2" && value.conforme == "1") {
                                          data_fecha = "<span class='label label-success'>"+value.fecha_enviado_xx+"</span>";
                                        }
                                        contenido +=`
                                        <tr>
                                            <td class="jdr1s">`+ $sr + `</td>
                                            <td>`+value.para+`</td>
                                            <td>`+value.dni+`</td>
                                            <td>`+value.boleta+`</td>
                                            <td>`+value.ano+`</td>
                                            <td>`+value.mes+`</td>
                                            <td><small>`+value.estado_xx+` </br>`+data_fecha+`</small></td>
                                            <td><a class="btn-outline-success btn btn_ver_pdf" Id="`+value.archivo+`" href="javascript:void(0)"><i class="fas fa-eye"></i> Ver Boleta</a> </td>
                                        </tr>
                                       
                                        `;
                                        $("#myTable_wrapper tbody").html(contenido);
                                        $(".ver").show();
                                        $("#mostrar_data_dowload").show(1500);
                                    });

                                   

                                    }//end else

                                  })
                                  .fail(function() {
                                    console.log("error");
                                  })
                                  .always(function() {
                                    console.log("complete");
                                  });
                                  
                                }
                          
                                })() 
                          }
                          //
                          

                       });

                        $(document).on('click', '.btn_ver_pdf', function(event) {
                          event.preventDefault();
                          /* Act on the event */

                          var user_id = $(this).attr("id"); 
                          //$("#pdfdoc").text(user_id);//"<span><?php echo base_url().'upload/boletas/'?>'"+user_id+"'</span>"

                          
                          $("#reruanas").modal({
                              show: true
                          });
                         // $("#pdf").attr('src',user_id);
                          $("#pdfdoc").html('<iframe src="<?php echo base_url().'upload/boletas/'?>'+user_id+'"  width="100%" height="700px"></iframe>');


                        });


                        //reporte en excel

                        $(document).on('click', '.btn_ver_excel', function(event) {
                          event.preventDefault();
                          /* Act on the event */

                          var id_usuario = $("#id_usuario_xxx").val();
                          var ano_xx = $("#ano_xx").val();
                        window.location ="<?php echo base_url().'Boleta/Boleta/descargar_excel/'?>"+id_usuario+"/"+ano_xx;
                          //alert(id_usuario +" excel " +ano_xx);
                         /* $.ajax({
                            url: '<?php echo base_url().'Boleta/Boleta/descargar_excel/';?>',
                            type: 'POST',
                           // dataType: 'default: Intelligent Guess (Other values: xml, json, script, or html)',
                            data: {id_usuario: id_usuario,ano_xx:ano_xx},
                          })
                          .done(function() {
                            console.log("success");
                          })
                          .fail(function() {
                            console.log("error");
                          })
                          .always(function() {
                            console.log("complete");
                          });*/
                          
                        });

                        //reporte en pdf

                        $(document).on('click', '.btn_ver_pdf_view', function(event) {
                          event.preventDefault();
                          /* Act on the event */

                          var id_usuario = $("#id_usuario_xxx").val();
                          var ano_xx = $("#ano_xx").val();

                          window.location ="<?php echo base_url().'Boleta/Boleta/descargar_pdf_view/'?>"+id_usuario+"/"+ano_xx;


                          
                        });


                   </script>

                   <span id="evaristo"></span>



                   <div class="modal fade bd-example-modal-lg" id="reruanas" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" data-backdrop="static">
                      <div class="modal-dialog modal-xl">
                        <div class="modal-content">
                          <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true" style="
                                border: 2px solid #210202;
                                border-radius: 50%;
                            ">&nbsp;&nbsp;&times;&nbsp;&nbsp;</span>
                            </button>
                          </div>
                          <div class="modal-body">
                            <span id="pdfdoc"></span>
                            </div>
                        </div>
                      </div>
                    </div>




