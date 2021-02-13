                
                <?php foreach ($empresa as $xx) {
                $Id = $xx->Id;
                $urlx = $xx->url;
                $empresax = $xx->razon_social;  
                $rucx = $xx->ruc;
                $t_rubro = $xx->id_rubro;
                $direccionx = $xx->direccion;
                   $empresa = "<strong>Empresa</strong>: ".$xx->razon_social." -  <strong>Ruc</strong>: ".$xx->ruc." - <strong>Domicilio fiscal</strong>: ".$xx->direccion." <strong>Act Economica</strong>: ".$xx->actividad_economica;
                } ?>                
                <div class="row animated pulse">
                    <div class="col-lg-12">
                        <div class="card" id="accordionTable">
                            <div class="m-4" id="heading2">
                              <h5 class="mb-0">
                              
                                <button class="btn btn-rounded btn-success collapsed" type="button" data-toggle="collapse" data-target="#col2" aria-expanded="false" aria-controls="col2"><i class=" fas fa-upload"></i>&nbsp;
                                  Importar Datos desde el Excel
                                </button>
                                <a href="<?php echo base_url().'upload_file/';?>Citas - MEDIWEB.xlsx" download="" class="btn btn-outline-dark btn-rounded"><i class="fas fa-database"></i>&nbsp; Descargar formato Excel</a>

                                <a href="<?php echo base_url().'upload_file/';?>Citas - MEDIWEB1.xlsx" download="" class="btn btn-outline-info btn-rounded"><i class="fas fa-database"></i>&nbsp; Descargar formato final</a>
                              </h5>
                            </div>
                            <div id="col2" class="collapse" aria-labelledby="heading2" data-parent="#accordionTable">
                                <div class="col-md-12">
                                    <form method="post" id="import_form" class="text-left" enctype="multipart/form-data">
                                    <div class="form-group text-center">
                                       <input type="file" name="file" id="file" required accept=".xls, .xlsx" class="dropify"/></p>
                                    </div>
                                  
                                    
                                    <button type="submit" name="import" class="btn-outline-success btn btn-rounded"><i class=" fas fa-upload"></i>&nbsp;Importar Datos</button>     
                                  </form>
                                </div>
                            </div>
                            <div class="card-body">
                                <h2 class="card-title"><?php echo $title[1];?></h2>
                            <?php if ($this->session->userdata("session_perfil")==3) {?>
                            <div class="row">
                                <div class="col-md-4">
                                    <h4 class="card-title">Empresa</h4><p><?php echo $empresax;?></p>
                                </div>
                                <div class="col-md-4">
                                    <h4 class="card-title">Ruc:</h4><p><?php echo $rucx;?></p>
                                </div>
                                <div class="col-md-4">
                                     <h4 class="card-title">Domicilio Fiscal:</h4><p><?php echo $direccionx;?></p>
                                </div>

                            </div> 
                            <?php 
                              if ($t_rubro===0) {?>
                                <div class="alert alert-danger btn-rounded"> <img src="<?php echo base_url().'assets_sistema/';?>images/users/1.jpg" width="30" class="img-circle" alt="img"> <a href="<?php echo base_url().'Mantenimiento/Empresas/actualizar_datos/'.$urlx;?>/?=entrada=<?php echo rand(100000000000,000000000000);?>?=ruc=<?php echo $rucx;?>"><span class="font-weight-normal text-dark">Click aqui : Falta Completar Datos de <?php echo $empresax;?></span></a>
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">&times;</span> </button>
                            </div>
                            <?php }else{

                            } ?> 
                            <?php } ?>
                           
                            <!--<div class="alert alert-danger btn-rounded"> <img src="<?php echo base_url().'assets_sistema/';?>images/users/1.jpg" width="30" class="img-circle" alt="img"> Aun no se a agregado Perfil 
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">&times;</span> </button>
                            </div>-->
                            <form method="POST" action="" id="frm_submit">
                               <!--  <input type="hidden" value="<?php echo $this->session->userdata('session_id');?>" name="Id">
                              <input type="hidden" name="fecha_atencion" value="<?php echo date('Y-m-d');?>">-->
                              <div class="row">
                                  <div class="col-md-4">
                                    <label for="">Empresa</label>
                                      <select name="empresaxx[]" id="" class="form-control select2" required="">
                                        <option value="" selected="">Seleccione Empresa</option>
                                        <option value="Sodexo">Sodexo</option>
                                      </select>
                                  </div>
                                  <div class="col-md-4">
                                    <label for="">Sub Contrata</label>
                                      <select name="subcontratoxx[]" id="" class="form-control select2" required="">
                                        <option value="" selected="">Seleccione Sub contrata</option>
                                        <option value="Sodexo Sub Contrata">Sodexo Sub Contrata</option>
                                      </select>
                                  </div>
                              </div>
                              <span class="m-4"></span>
                                <div class="table-responsive" >
                                    <table class="table color-table info-table table-hover" >
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Nombres</th>
                                                <th>Apellido Paterno</th>
                                                <th>Apellido Materno</th>
                                                <th>Nº Doc</th>
                                                <th>Fecha Nac</th>
                                                <th>Sexo</th>
                                                <th>Perfil</th>
                                                <th>Area</th>
                                                <th>Puesto</th>
                                                <th>Tipo Examen</th>
                                                <th>Fecha. Atención</th>
                                              
                                            </tr>
                                        </thead>
                                        <tbody id="table-details">
                                            <tr id="row1" class="jdr1">
                                                <td><span  class="btn btn-sm btn-default"></span>1<input type="hidden" value="6437" name="count[]"></td>
                                                <td><input type="text" name="nombres[]" id="nombres[]" class="form-control tamano_sm" placeholder="Nombres"></td>
                                                <td><input type="text" class="form-control tamano_sm" name="apellidop[]" id="apellidop[]" placeholder="Apellido Paterno"></td>
                                                <td><input type="text" class="form-control tamano_sm" name="apellidom[]" id="apellidom[]" placeholder="Apellido Materno"></td>
                                                <td><input type="text" name="dni[]" id="dni[]" class="form-control tamano_sm" placeholder="Nº DNI"></td>
                                                <td><input type="date" class="form-control  tamano_sm"  id="date"  placeholder="Fecha Nacimiento" name="date[]"></td>
                                                <td>
                                                    <select class="form-control tamano_sm" name="sexo[]" style="border: none !important;" >
                                                    <option>--Seleccione Sexo--</option>
                                                    <?php $query = $this->db->query("select * from ts_sexo");
                                                    foreach ($query->result()as $xx) {?>
                                                        <option value="<?php echo $xx->nombre;?>"><?php echo $xx->nombre;?></option>
                                                    <?php }
                                                     ?>
                                                    
                                                </td>
                                                <td>
                                                    <select class="form-control tamano_sm" name="perfil[]" style="border: none !important;" >
                                                    <option>--Seleccione Perfil--</option>
                                                    <?php $query = $this->db->query("select * from ts_perfil");
                                                    foreach ($query->result()as $xx) {?>
                                                         <option value="<?php echo $xx->nombre;?>"><?php echo $xx->nombre;?></option>
                                                    <?php }
                                                     ?>
                                                    
                                                 </td>
                                                <td><select class="form-control tamano_sm" name="area[]" style="border: none !important;" >
                                                    <option>--Seleccione Área--</option>
                                                    <?php $query = $this->db->query("select * from ts_area");
                                                    foreach ($query->result()as $xx) {?>
                                                        <option value="<?php echo $xx->nombre;?>"><?php echo $xx->nombre;?></option>
                                                    <?php }
                                                     ?>
                                                   
                                                </td>
                                                <td><input type="text" class="form-control tamano_sm" name="puesto[]" placeholder="Puesto"></td>
                                                <td>
                                                     <select class="form-control tamano_sm" name="tipoexamen[]" style="border: none !important;" >
                                                    <option>--Tipo Exámen--</option>
                                                    <?php $query = $this->db->query("select * from ts_tipo_evaluacion ");
                                                    foreach ($query->result()as $xx) {?>
                                                        <option value="<?php echo $xx->nombre;?>"><?php echo $xx->nombre;?></option>
                                                    <?php }
                                                     ?>
                                                   
                                                </td>
                                                <td><input type="date" class="form-control  tamano_sm"  id="date_fec"  placeholder="Fecha Nacimiento" name="date_fec[]"></td>
                                                <input type="hidden" name="fecha_atencion[]" value="<?php echo date('Y-m-d');?>">
                                                <input type="hidden" value="<?php echo $this->session->userdata('session_id');?>" name="Id[]">
                                                <input type="hidden" value="<?php echo date('Y-m-d h:i:s');?>" name="fec_rec[]">
                                                

                                            </tr>
                                        </tbody>
                                    </table>
                                    
                                </div>
                                <br>
                                <div class="row">
                                    <div class="col-12">
                                        <button class="btn btn-md btn-success btn-sm btn-add-more btn-rounded"><i class=" fas fa-street-view"></i>&nbsp;Agregar Mas</button>
                                        <button class="btn btn-md btn-sm btn-danger btn-remove-detail-row btn-rounded"><i class="fas fa-times-circle"></i>&nbsp;Eliminar Fila</button>
                                        <button onclick="return alertyty();" class="btn btn-md btn-sm btn-info btn-remove-detail-row-detalles btn-rounded"><i class="fas fa-times-circle"></i>&nbsp;All delete</button>
                                    </div>
                                </div>

                                <div class="col-md-12 text-right">
                                   <!--<input class="btn btn-success pull-right" type="submit" value="Registrar" name="submit">-->
                                   <button class="btn btn-success pull-right btn-rounded btn-lg" type="submit" name="submit"><i class=" fas fa-window-restore"></i>&nbsp;Registrar</button>
                               </div>
                            </form>
                            </div>
                        </div>
                    </div>
                   
                </div>
                <!-- row -->
                <!--codeigniter batch insert-->

                <style>
                    .tamano_sm{
                        width: 180px; 
                        height: auto;
                        outline: 0;
                        border:0;
                        border-bottom: 1px solid #0ed1ab;
                        padding: 5px 0;
                        -o-transition: padding .3s ease-out;
                        -moz-transition: padding .3s ease-out;
                        -webkit-transition: padding .3s ease-out;
                        transition: padding .3s ease-out;
                        color: black;
                            }
                </style>
      <script src="<?php echo base_url().'assets_sistema/';?>node_modules/jquery/jquery-3.2.1.min.js"></script>
      <script>

        function alertyty() {
           Swal.fire({
              title: '¿Estás seguro?',
              text: "¡No podrás revertir esto!",
              icon: 'warning',
              showCancelButton: true,
              confirmButtonColor: '#3085d6',
              cancelButtonColor: '#d33',
              confirmButtonText: 'Si, eliminar!',
              cancelButtonText: 'No, please!',
            }).then((result) => {
              if (result.value) {
                if($("#table-details tr:last-child").attr('id') != 'row1'){
                    $('#table-details tr:not(:first-child)')
                .slice(0)
                .remove();
                }
              }
            })

            return false;
        }
         /* $("body").on('click', '.btn-remove-detail-row-detalles', function (e) {
           // $(document).on('click', '[data-action=finish]', function(){
                e.preventDefault();
                if($("#table-details tr:last-child").attr('id') != 'row1'){
                    $('#table-details tr:not(:first-child)')
                .slice(0)
                .remove();
                }
                
            });*/
      </script>

        <script>
            $(document).ready(function (){
                $("body").on('click', '.btn-add-more', function (e) {
            e.preventDefault();
            var $sr = ($(".jdr1").length + 1);
            var rowid = Math.random();
            var $html = '<tr class="jdr1" id="' + rowid + '">' +
                    '<td><span class="btn btn-sm btn-default"></span>' + $sr + '</span><input type="hidden" name="count[]" value="'+Math.floor((Math.random() * 10000) + 1)+'"></td>' +
                    '<td><input type="text" name="nombres[]" id="nombres[]" class="form-control tamano_sm" placeholder="Nombres"></td>' +
                    '<td><input type="text" class="form-control tamano_sm" id="apellidop[]" name="apellidop[]" placeholder="Apellido Paterno"></td>' +
                    '<td><input type="text" class="form-control tamano_sm"  name="apellidom[]" id="apellidom[]" placeholder="Apellido Materno"></td>' + 
                    '<td><input type="text" name="dni[]" id="dni[]" class="form-control tamano_sm" placeholder="Nº DNI"></td>' +
                    `<td><input type="date" class="form-control tamano_sm" id="date"    placeholder="Fecha Nacimiento" name="date[]">
                    </td>`+
                    `<td>
                        <select class="form-control tamano_sm" name="sexo[]" style="border: none !important;" >
                        <option>--Seleccione Sexo--</option>
                        <?php $query = $this->db->query("select * from ts_sexo");
                        foreach ($query->result()as $xx) {?>
                            <option value="<?php echo $xx->nombre;?>"><?php echo $xx->nombre;?></option>
                        <?php } ?></td>` +
                    `<td><select class="form-control tamano_sm" name="perfil[]" style="border: none !important;" >
                        <option>--Seleccione Perfil--</option>
                        <?php $query = $this->db->query("select * from ts_perfil ");
                        foreach ($query->result()as $xx) {?>
                            <option value="<?php echo $xx->nombre;?>"><?php echo $xx->nombre;?></option>
                        <?php }
                         ?></td>` +
                    '<td><select class="form-control tamano_sm" name="area[]" style="border: none !important;" ><option>--Seleccione Área--</option><?php $query = $this->db->query("select * from ts_area");foreach ($query->result()as $xx) {?> <option value="<?php echo $xx->nombre;?>"><?php echo $xx->nombre;?></option><?php } ?></td>' +
                    '<td><input type="text" class="form-control tamano_sm" name="puesto[]" placeholder="Puesto"></td>' +
                    '<td><select class="form-control tamano_sm" name="tipoexamen[]" style="border: none !important;" ><option>--Tipo Examen--</option><?php $query = $this->db->query("select * from ts_tipo_evaluacion");foreach ($query->result()as $xx) {?><option value="<?php echo $xx->nombre;?>"><?php echo $xx->nombre;?></option><?php }?></td>' +
                    `<td><input type="date" class="form-control tamano_sm" id="date_fec"    placeholder="Fecha Nacimiento" name="date_fec[]">
                    </td>`+
                    '<input type="hidden" name="fecha_atencion[]" value="<?php echo date('Y-m-d');?>">'+
                    '<input type="hidden" value="<?php echo $this->session->userdata('session_id');?>" name="Id[]">'+
                    '<input type="hidden" value="<?php echo date('Y-m-d h:i:s');?>" name="fec_rec[]">'
                    '</tr>';
            $("#table-details").append($html);

            });
            $("body").on('click', '.btn-remove-detail-row', function (e) {
                e.preventDefault();
                if($("#table-details tr:last-child").attr('id') != 'row1'){
                    $("#table-details tr:last-child").remove();
                }
                
            });
            //eliminar toda las filas

            

          
            //
            //termina aquoi
            $("body").on('focus', ' .datepicker', function () {
                $(this).datepicker({
                    dateFormat: "yy-mm-dd"
                });
            });
            
            $("#frm_submit").on('submit', function (e) {
                e.preventDefault();      

               //Validacion para nombres
                var nombresx = document.getElementsByName('nombres[]');
                
                  for (i=0; i<nombresx.length; i++)
                    {
                     if (nombresx[i].value == "")
                        {
                        Swal.fire({
                          position: 'top-end',
                          icon: 'error',
                          text: 'El campo nombre esta vacio',
                          showConfirmButton: false,
                          timer: 1500
                        })



                        $("[name='nombres[]']").focus();
                        $("#input:text:visible:first").focus()
                        $("[name='nombres[]']").css("border","1px solid #117864");
                        $("[name='nombres[]']").focus(function(){
                          $(this).css({"background":"#1ABC9C","color":"#ffffff"})
                        })
                         $("[name='nombres[]']").blur(function(){
                          $(this).css({"background":"transparent","color":"#000000"})
                        })        
                       
                       return false;
                        }
                    }

                //validacion para apellidos paterno
                var apellidopx = document.getElementsByName('apellidop[]');
                
                  for (i=0; i<apellidopx.length; i++)
                    {
                     if (apellidopx[i].value == "")
                        {
                        Swal.fire({
                          position: 'top-end',
                          icon: 'error',
                          text: 'El campo apellido paterno esta vacio',
                          showConfirmButton: false,
                          timer: 1500
                        })
                        $("[name='apellidop[]']").focus();
                        $("#input:text:visible:first").focus()
                        $("[name='apellidop[]']").css("border","1px solid #117864");
                        $("[name='apellidop[]']").focus(function(){
                          $(this).css({"background":"#1ABC9C","color":"#ffffff"})
                        })
                         $("[name='apellidop[]']").blur(function(){
                          $(this).css({"background":"transparent","color":"#000000"})
                        })        
                       
                       return false;
                        }
                    }

                //validacion para aopellidosmaterno
                var apellidomx = document.getElementsByName('apellidom[]');
                
                  for (i=0; i<apellidomx.length; i++)
                    {
                     if (apellidomx[i].value == "")
                        {
                        Swal.fire({
                          position: 'top-end',
                          icon: 'error',
                          text: 'El campo apellido materno esta vacio',
                          showConfirmButton: false,
                          timer: 1500
                        })
                        $("[name='apellidom[]']").focus();
                        $("#input:text:visible:first").focus()
                        $("[name='apellidom[]']").css("border","1px solid #117864");
                        $("[name='apellidom[]']").focus(function(){
                          $(this).css({"background":"#1ABC9C","color":"#ffffff"})
                        })
                         $("[name='apellidom[]']").blur(function(){
                          $(this).css({"background":"transparent","color":"#000000"})
                        })        
                       
                       return false;
                        }
                    }

                //Validacion para campos DNI
                var dnix = document.getElementsByName('dni[]');
                
                  for (i=0; i<dnix.length; i++)
                    {
                     if (dnix[i].value == "")
                    {
                        Swal.fire({
                          position: 'top-end',
                          icon: 'error',
                          text: 'El campo DNI esta vacio',
                          showConfirmButton: false,
                          timer: 1500
                        })
                        $("[name='dni[]']").focus();
                        $("#input:text:visible:first").focus()
                        $("[name='dni[]']").css("border","1px solid #117864");
                        $("[name='dni[]']").focus(function(){
                          $(this).css({"background":"#1ABC9C","color":"#ffffff"})
                        })
                         $("[name='dni[]']").blur(function(){
                          $(this).css({"background":"transparent","color":"#000000"})
                        })        
                       
                       return false;
                    }else if(dnix[i].value<8) {
                        Swal.fire({
                          position: 'top-end',
                          icon: 'error',
                          text: 'DNI tiene el formato 0-8 digitos',
                          showConfirmButton: false,
                          timer: 1500
                        })
                        return false;
                    }else{

                    }

                    }

                $.ajax({
                    url: '<?php echo base_url() ?>Sistema/batchInsert/',
                    type: 'POST',
                    data: $("#frm_submit").serialize()
                }).done(function() {
                    console.log("success");
                })
                .fail(function() {
                    console.log("error");
                  //  alert("Duplicidad de datos");
                })
                .always(function(response) {
                    console.log("complete");
                    var r = (response);
                    if(r == 1){
                        Swal.fire({
                          title: 'Muy Bien',
                          text: "Se a realizado de manera exitosa",
                          icon: 'success',
                          showCancelButton: false,
                          confirmButtonColor: '#3085d6',
                          cancelButtonColor: '#d33',
                          confirmButtonText: 'ok'
                        }).then((result) => {
                          if (result.value) {
                           
                          }
                        })
                    }
                    else{
                       Swal.fire({
                          icon: 'error',
                          title: 'Oops...',
                          text: 'Algo pasó con el sistema!',
          
                        })
                    }
                });

            });
            });
        </script>



        <!--VALIDACION DE LA FECHA CUAL QUE CONVIERTE DE ALREVES DE Y-M-D-->
        <script>
            var today = new Date();
            var dd = today.getDate();
            var mm = today.getMonth() + 1; //January is 0!

            var yyyy = today.getFullYear();
            if (dd < 10) {
              dd = '0' + dd;
            } 
            if (mm < 10) {
              mm = '0' + mm;
            } 
            var today = dd + '/' + mm + '-' + yyyy;
            document.getElementById('date').value = today;
        </script>
        <!--la otra fecha-->
        <script>
            var today = new Date();
            var dd = today.getDate();
            var mm = today.getMonth() + 1; //January is 0!

            var yyyy = today.getFullYear();
            if (dd < 10) {
              dd = '0' + dd;
            } 
            if (mm < 10) {
              mm = '0' + mm;
            } 
            var today = dd + '/' + mm + '-' + yyyy;
            document.getElementById('date_fec').value = today;
        </script>

          <script>
    $(document).ready(function(){ 

     $('#import_form').on('submit', function(event){
      event.preventDefault();
      $.ajax({
       url:"<?php echo base_url().'Sistema/import/';?>",
       method:"POST",
       data:new FormData(this),
       contentType:false,
       cache:false,
       processData:false,
       success:function(data){
        $('#file').val('');
      
        var json = JSON.parse(data);
        Swal.fire({
          position: 'top-end',
          icon: 'success',
          text: ''+json.mensaje+'',
          showConfirmButton: false,
          timer: 1500
        })
       },
      statusCode:{
        400: function(xhr){
          var json = JSON.parse(xhr.responseText);
          Swal.fire(
            'Error',
            ''+json.msg+'',
            'error'
          )
         return false;
         
        },401: function(xhr){
          var json = JSON.parse(xhr.responseText);
          Swal.fire({
            title: '<strong>Duplicidad de <u>Registros</u></strong>',
            icon: 'info',
            html:
              ''+json.error+',' +
              '<a href="<?php echo base_url().'Mantenimiento/Lista_registro/';?>">&nbsp;links</a> ' +
              'Ver lista de registro',
            showCloseButton: true,
            showCancelButton: true,
            focusConfirm: false,
            confirmButtonText:
              '<i class="fa fa-thumbs-up"></i> Great!',
            confirmButtonAriaLabel: 'Thumbs up, Gracias!',
            cancelButtonText:
              '<i class="fa fa-thumbs-down"></i>',
            cancelButtonAriaLabel: 'Thumbs down'
          })
         return false;
        },
        error: function()
                             {
                   Swal.fire({
                    title: 'Lo siento mucho (︶︿︶)',
                    text: "Algo paso con el sistema Vuelva a intentar una vez mas",
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

      }
        


      })
     });

    });
  </script>
