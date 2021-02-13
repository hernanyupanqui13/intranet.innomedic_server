			<?php
          $data_ficha_personal = $this->db->query("SET lc_time_names = 'es_PE'");
          $data_ficha_personal = $this->db->query("select *,(
          select departamento from ts_departamento where Id=id_departamento) as departamento,
          (select provincia from ts_provincia where Id=id_provincia) as provincia,
          (select distrito from ts_distrito where Id=id_distrito) as distrito,
          (select civil from ts_estado_civil where Id=id_estado ) as estado_civil,
          (select departamento from ts_departamento where Id=id_lugar_nacimiento_dep) as nacimiento,
          DATE_FORMAT(fecha_nacimiento,'%d de %M %Y') AS fecha_nac_dia
          from ts_datos_personales where id_usuario=".$this->session->userdata("session_id")."");
          foreach ($data_ficha_personal->result() as $xx) {
              $nombres_completosx = $xx->apellido_paterno." ". $xx->apellido_materno." ".$xx->nombres;
              $apellido_paternox = $xx->apellido_paterno;
              $apellido_maternox = $xx->apellido_materno;
              $urlx = $xx->url;


              

          } ?>


			<?php foreach ($lista_pensionario_regimen as $xx) {
				$regimenx = $xx->regimen;
			} ?>

      <?php   foreach ($lista_de_salud as $xx) {
        $id_tipo_emfermedadx = $xx->id_tipo_emfermedad;
        $id_tratamientox = $xx->id_tratamiento;
        $otros_descriptionx = $xx->otros_description;
      } ?>

      <div class="row">
        <div class="col-md-6">
          <div class="card">
            <div class="card-body">
              <a href="javascript:void(0)"  data-toggle="modal" data-target="#exampleModal" class="btn btn-rounded btn-outline-info btn-md"><i class=" fas fa-plus-circle"></i>&nbsp;Regimen Pensionario</a>
            </div>
          </div>
        </div>
         <div class="col-md-6">
          <div class="card">
            <div class="card-body">
              <a href="javascript:void(0)"  data-toggle="modal" data-target="#exampleModal_xx" class="btn btn-rounded btn-outline-danger btn-md"><i class=" fas fa-plus-circle"></i>&nbsp;Actualizar Salud</a>
            </div>
          </div>
        </div>

      </div>





				<!-- Modal https://www2.sbs.gob.pe/afiliados/paginas/Documento.aspx

				https://www2.sbs.gob.pe/afiliados/paginas/NoResultados.aspx-->


				<!--mostrando-->
              <div class="row">
                <div class="col-md-6">
                  <div class="card">
                    <div class="card-body" id="upating_rest">

                      <a class=""><?php if ($regimenx=="" || $regimenx==null) {

                        echo '<h3 class="text-success">Tipo de Regimen</h3>
                        <span class="">------------</span>';
                      }else{
                        echo '<h3 class="text-info">Tipo de Regimen</h3>
                        <span><i class="fas fa-address-book"></i>&nbsp;'.$regimenx.'</span>';
                      }?></a>
                    </div>
                  </div>
                </div>

                <div class="col-md-6">
                  <div class="card">
                    <div class="card-body" id="upating_rest_lis">
                      <?php if ($id_tipo_emfermedadx=="" || $id_tipo_emfermedadx==null) {?>
                        <div class="tags-default p-2">
                          <ul class=""><li><?php echo "" ;?></li></ul>
                      </div>
                      <?php }else{?>
                          <ul class=""><li><?php echo $id_tipo_emfermedadx;?></li></ul>
                      <?php } ?>
                      <?php if ($otros_descriptionx=="" || $otros_descriptionx==null) {?>
                        <div class="text-justify">
                          <p> <?php echo "" ?> </p>
                        </div>
                      <?php }else{?>
                          <div class="text-justify">
                            <p> <?php echo $otros_descriptionx; ?> </p>
                        </div>
                      <?php } ?>
                      <?php if ($id_tratamientox=="" || $id_tratamientox==null) {?>
                         <span></span>
                      <?php }else{?>
                        <b>Recibes tratamiento: <span class="border border-dark m-1 p-1">&nbsp;<?php echo $id_tratamientox; ?>&nbsp;</span></b>
                      <?php } ?>
                     
                    </div>
                  </div>
                </div>
              
              </div>


              <!-- Modal -->
            <div class="modal fade" id="exampleModal" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" data-backdrop="static" data-keyboard="false">
              <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ingrese Rigimen Pensionario</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body">
                    <form action="" id="regimen_pensionario">
                      <div class="row">
                        <div class="col-md-12">
                          <div class="form-group">
                            <label for="">Seleccione</label>
                            <select name="regimen" class="select2 form-control" id="regimenx" style="width: 100%; height:36px;">
                              <option value="" selected="" disabled="">--Seleccione Regimen Pensionario --</option>
                              <option value="Nuevo Ingreso">Nuevo Ingreso</option>
                              <option value="ONP">ONP</option>
                              <option value="Habitat">AFP: Habitat</option>
                              <option value="Profuturo">AFP: Profuturo</option>
                              <option value="Integra">AFP: Integra</option>
                              <option value="Prima">AFP: Prima</option>
                            </select>
                          </div>
                        </div>
                      </div>

                       <div class="modal-footer">

                          <button type="button" class="btn btn-outline-danger btn-rounded" data-dismiss="modal"><i class="fa fa-times-circle"></i>&nbsp;Cerrar</button>
                          <button type="submit" class="btn btn-outline-success btn-rounded "><i class="fa fa-check"></i>&nbsp;Guardar Cambios</button>
                        </div>
                    </form>
                     <p>Si no recuerdas en qué AFP estás,<a  target="_blank" href="https://www2.sbs.gob.pe/afiliados/paginas/Consulta.aspx"> consúltalo aquí.</a></p>
                  </div>
                 
                </div>
              </div>
            </div>

            <!--salud-->
              <div class="modal fade" id="exampleModal_xx" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLabel">Actualizar Salud</h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <div class="modal-body">
                      <form method="post" id="framework_form">
                         <div class="card-body">
                            <h4 class="card-title">Ingrese y presione ","</h4>
                            <h6 class="card-subtitle">En caso de sufrir de alguna enfermedad, ingrese en el siguiente recuadro:</h6>
                            <input type="hidden" class="" name="url" value="<?php echo $urlx; ?>">
                            
                          </div>
                          <div class="row">
                            <div class="form-group">
                              <div class="tags-default p-2">
                                <input type="text" value="<?php echo $id_tipo_emfermedadx;?>" id="enfermedades_comunes_id_xx_data_xx" name="framework" data-role="tagsinput" placeholder="Add and Press ',' " /> 
                            </div>
                            </div>
                          </div>
                          <!--/row-->
                          <div class="row" >
                              <div class="col-md-12" >
                                  <div class="form-group row">
                                      <label class="">Ingrese Descripción</label>
                                      <div class="col-md-12">
                                         <textarea class="form-control" name="otros_description" rows="5" placeholder="Ingrese descripción" ><?php echo $otros_descriptionx; ?></textarea>
                                      </div>
                                  </div>
                              </div>
                              <!--/span-->
                              <div class="col-md-6">
                                  <div class="form-group row">
                                      <label class="control-label col-md-12">Recibes atención Medica</label>
                                      <div class="btn-group mt-3" data-toggle="buttons" role="group">
                                    <label class="btn btn-outline btn-info">
                                        <div class="custom-control custom-radio">
                                            <input type="radio" id="customRadio1" name="id_tratamiento" value="NO" class="custom-control-input"  <?php 
                                                $favcolor = $id_tratamientox;

                                                switch ($favcolor) {
                                                    case "NO":
                                                        echo "checked";
                                                        break;
                                                        
                                                    default:
                                                        echo "";
                                                }
                                              
                                              ?>>
                                            <label class="custom-control-label" for="customRadio1"> <i class="ti-check text-active" aria-hidden="true"></i> NO</label>
                                        </div>
                                    </label>
                                    <label class="btn btn-outline btn-info">
                                        <div class="custom-control custom-radio">
                                            <input type="radio" id="customRadio2" name="id_tratamiento" value="SI" class="custom-control-input"
                                             <?php 
                                                  $favcolor = $id_tratamientox;

                                                  switch ($favcolor) {
                                                      case "SI":
                                                          echo "checked";
                                                          break;
                                                          
                                                      default:
                                                          echo "";
                                                  }
                                                
                                                ?>>
                                            <label class="custom-control-label" for="customRadio2"> <i class="ti-check text-active" aria-hidden="true"></i> SI</label>
                                        </div>
                                    </label>
                                   
                                </div>
                                  </div>
                              </div>
                             
                              <!--/span-->
                          </div>
                        <div class="form-group text-center">
                           <button type="button" class="btn btn-outline-danger btn-rounded" data-dismiss="modal"><i class="fa fa-times-circle"></i>&nbsp;Cerrar</button>
                          <button type="submit" class="btn btn-outline-success btn-rounded "><i class="fa fa-check"></i>&nbsp;Guardar Cambios</button>
                      
                        </div>
                       </form>
                      
                    </div>
                    
                  </div>
                </div>
              </div>

              <style>
                .select2-container--default .select2-selection--multiple .select2-selection__choice {
                  background: #fb9678;
                  color: #ffffff;
                  border-color: #fb9678;
              }
              </style>





                <!-- de aqui bajo es el script de las funciones-->


                <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

                <script>
                $(document).ready(function () {
                  $("#enfermedades_comunes_id_xx_data").keyup(function () {
                      var value = $(this).val();
                      $("#enfermedades_comunes_id_xx_data_xx").val(value);
                  });
                });
                </script>
               
                <script>
                $(document).ready(function(){
                    
                    $(document).on('submit', '#regimen_pensionario', function(event){  
                       event.preventDefault();  
                       var regimenx = $("#regimenx").val();
                       if (regimenx == null || regimenx.length == 0 || /^\s+$/.test(regimenx) ) {
                          Swal.fire({
                            title: 'Regimen Pensionario',
                            text: "Seleccione Regimen Pensionario",
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
                             url:"<?php echo base_url().'View_intranet/regimen_pensionario/update_regimen/';?>",
                             method:'POST',  
                             data:new FormData(this),  
                             contentType:false,  
                             processData:false,  
                             success:function(data)  
                             {  
                                var json = JSON.parse(data);
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
                                      icon: 'success',
                                      title: ''+json.mensaje+''
                                    })  
                                  $('#regimen_pensionario')[0].reset();  
                                  $('#ocultar_id_x').hide();
                        		      $('#mostrar_data_x').show(); 
                                  $("#upating_rest").load(location.href+" #upating_rest>*","");                            
                             }  
                        });  
                       
                        
                  }); 


                     
                });

                
            </script>

            <script>
              $(document).ready(function(){
              
               $('#framework_form').on('submit', function(event){
                event.preventDefault();
               
                $.ajax({
                 url:"<?php echo base_url().'View_intranet/Seguro_salud/Insertar_data/';?>",
                 method:"POST",
                 data:new FormData(this),  
                 contentType:false,  
                 processData:false, 
                 success:function(data)
                 {
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
                      icon: 'success',
                      title: 'Se actualizo de manera correcta'
                    }) 
                  
                  $("#upating_rest_lis").load(location.href+" #upating_rest_lis>*",""); 
                  $("#exampleModal_xx").modal("hide");
                 },statusCode: {
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


                          }

                      }
                  }
                });
               });
               
               
              });
              </script>



