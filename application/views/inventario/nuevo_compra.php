<div class="row">
    <div class="col-md-12">
        <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-md-3">
     
            
            <div class="row">
               
               <div class="modal fade bd-example-modal-lgs" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                  <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Buscar Proveedor</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form class="form-horizontal" role="form" method="post" name="busqueda" id="busqueda" >
                                <div class="card border-info">
                                  <div class="card-body">
                                    <div class="row">
                                      <div class="col-md-12">
                                        <input type="number" class="form-control" name="nruc" id="nruc" placeholder="Ingrese RUC" pattern="([0-9][0-9][0-9][0-9][0-9][0-9][0-9][0-9][0-9][0-9][0-9]|[0-9][0-9][0-9][0-9][0-9][0-9][0-9][0-9])" autofocus onkeypress="return soloNumeros(event);">
                                      </div>
                                    </div>
                                  </div>
                                  <div class="text-center">
                                    <button type="submit" class="btn btn-outline-success btn-rounded btn-md" name="btn-submit" id="btn-submit">
                                      <i class="fa fa-search"></i> Buscar
                                    </button>
                                  </div>
                                </div>
                            </form>
                            <br>
                            <b>Nombre:</b> <span id="usuarioxx"></span>
                            <br>
                            <b>Ruc:</b> <span id="rucxxx"></span>
                            <br>
                            <b>Telefono:</b> <span id="txt_telefonoxx"></span>
                            <br>
                            <b>Direccion:</b> <span id="direccionxxx"></span>
                            <hr>
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
               
                <div class="col-md-12">
                    <h5><b>Nota:</b> Si en la lista no estan los datos del proveedor. busquelos para agregarlo a la lista. Despues actualice la lista de proveedor. &nbsp; <i class="fa fa-refresh m-r-5"></i></h5>
                </div>
                <div class='col-md-8'>
                    <a href="javascript:void(0)" data-toggle="modal" data-target=".bd-example-modal-lgs" class="btn btn-info model_img img-responsive">Buscar proveedor
                    <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true">
                    
                    </a>
                </div>
                <div class="col-md-4">
                    
                    <a href="javascript:void()" class="btn btn-info waves-effect waves-light" data-toggle="tooltip" data-original-title="Actualizar lista" href="<?php echo base_url().'compra/nuevo';?>">
                        <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
                        Actualizar
                    </a>
                </div>
            </div>
            
       
            </div>

            <div class="col-md-9">
                <div class="white-box">
                    
                    <form onsubmit="return validar();" method="post" autocomplete="off" action="<?php echo $action;?>">
                    <div class="row">
                       
                        <div class="col-md-6">
                            <div class="form-group">
                                <label><b>Proveedor</b></label>
                                <select class="form-control select2" name="razon_social" id="razon_social" style="width: 100%;" onchange="datoscombo(this.value);">
                                    <option>Seleccionar</option>
                                    <?php foreach($listacombo1 as $x){ ?>
                                        <option value="<?php echo $x->Id;?>"><?php echo $x->nombre;?></option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                        
                        <div class="col-md-3">
                           <div class="form-group">
                               <label class="control-label"><b>R.U.C. / DNI</b></label>
                               <input type="text" name="ruc" id="ruc" class="form-control" placeholder="..." value="" maxlength="11">  
                           </div>
                       </div>
                       
                       <div class="col-md-3">
                            <div class="form-group">
                                   <label class="control-label"><b>Telefono:</b></label>
                                   <input type="text" name="telefono" id="telefono" class="form-control" placeholder="" value="" <?php echo mayuscula();?>>  
                               </div>
                        </div>
                        
                        <div class="col-md-2">
                           <div class="form-group">
                               <label class="control-label"><b>Numero de serie</b></label>
                               <input type="text" name="serie" class="form-control" placeholder="0000" value="" id="serie" maxlength="4" <?php echo mayuscula();?>>  
                           </div>
                       </div>
                       
                       <div class="col-md-2">
                           <div class="form-group">
                               <label class="control-label"><b>Numero de comprobante</b></label>
                               <input type="text" name="numboleta" class="form-control" placeholder="0000" value="" id="numboleta" >  
                           </div>
                       </div>
                       
                       <div class="col-md-2">
                            <div class="form-group">
                            <label><b>Tipo de Comprobante:</b></label>
                            <select class="form-control select2" style="width: 100%;" name="tipocomprobante" id="tipocomprobante">
                                <option>Seleccionar</option>
                                <?php foreach($combotipo as $x){ ?>
                                    <option value="<?php echo $x->Id;?>"><?php echo $x->tipocomprobante;?></option>
                                <?php } ?>
                            </select>
                            </div>
                        </div>
                        
                        <div class="col-md-6">
                           <div class="form-group">
                               <label class="control-label"><b>Direccion:</b></label>
                               <input type="text" name="direccion" id="direccion" class="form-control" placeholder="..." value="" <?php echo mayuscula();?>> 
                           </div>
                       </div>
                       
                       
                        <div class="col-md-3">
                                <div class="form-group">
                                    <label><b>Tipo de moneda</b></label>
                                    <select class="form-control select2" style="width: 100%;" name="tipo" id="tipo" onchange="cambio(this.value);">
                                        <option>Seleccionar</option>
                                        <?php foreach($listamoneda as $x){ ?>
                                            <option value="<?php echo $x->Id;?>"><?php echo $x->tipo;?></option>
                                        <?php } ?>
                                    </select>
                                    <input type="hidden" name="txt_cambio" id="txt_cambio">
                                </div>
                        </div>
                        <div class="col-md-3">
                                <div class="form-group">
                                    <label class="control-label"><b>Tipo de Cambio:</b></label>
                                    <br>
                                    <div id='tipocambio'></div>
                                </div>
                        </div>


                   
                    </div>
                    <div class="col-md-12">
                            <a href="javascript:void(0)" class="btn btn-danger waves-effect waves-light" href="<?php echo base_url().'compra';?>">
                                <i class="fa fa-reply m-r-5"></i><span> Regresar </span>
                            </a>
                            
                            <button class="btn btn-success waves-effect waves-light" type="submit">
                                <span> Guardar, Siguiente. </span>
                            </button>
                        </div>
                    </form>
                    
                </div>
            </div>
            </div>
        </div>
    </div>
    </div>
</div>

<script>

    function validar(){
        if(document.getElementById("razon_social").value=='Seleccionar'){
            Swal.fire("Error!", "Seleccione un Proveedor", "error", {
                button: "ok!",
            });
            return false;
        }
        
        if(document.getElementById("serie").value.length==0){
            Swal.fire("Error!", "Llene el numero de serie", "error", {
                button: "ok!",
            });
            return false;
        }
        
        if(document.getElementById("numboleta").value.length==0){
            Swal.fire("Error!", "Llene el numero de comprobante", "error", {
                button: "ok!",
            });
            return false;
        }

        if(document.getElementById("tipocomprobante").value=='Seleccionar'){
            Swal.fire("Error!", "Seleccione el tipo de comprobante", "error", {
                button: "ok!",
            });
            return false;
        }
        
        if(document.getElementById("tipo").value=='Seleccionar'){
            Swal.fire("Error!", "Seleccione el tipo de moneda", "error", {
                button: "ok!",
            });
            return false;
        }

        //validamos que el tipo de cambio dolar no este vacio
        

    }
    

    
    function datoscombo(e){ 
        if(e=='Seleccionar'){
            $("#direccion").val("");
            $("#ruc").val("");
            $("#telefono").val("");
        };
        // enviamos los datos de los dos select a una tabla temporal para el detalle de los peddidos ----------
        $.ajax({                        
            type: "POST",                 
            url: "<?php echo base_url()."Inventario/Compras/comborazonsocial";?>",                    
            data: {id:e}, /*id:1,id:2*/
            dataType:"JSON",
            success: function(data)            
           {
               $("#direccion").val(data.direccion);
               $("#ruc").val(data.ruc);
               $("#telefono").val(data.telefono);
           }
         });
        // ----------------------------------------------------------------------------------------------------    
    }
    
    function cambio(e){ 
        if(e=='Seleccionar'){
            $("#tipocambio").html("");
            $("#txt_cambio").val("");
        };
        $.ajax({                        
            type: "POST",                 
            url: "<?php echo base_url()."Inventario/Compras/cambio";?>",                    
            data: {id:e},
            dataType:"JSON",
            success: function(data)            
           {
               $("#tipocambio").html("<h3><b>"+data.cantidad+"</b></h3>");
               $("#txt_cambio").val(data.cantidad);
           }
         });
    }

     
              
</script>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

<script>
    //registro desde la sunat
    $(document).ready(function() {
        $(document).on('submit', '#registrar_nuevo_proveedor_sunat', function(event) {
            event.preventDefault();
            /* Act on the event */
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
                       // $('.bd-example-modal-lg').modal('hide')
                       window.location.reload(); 
                       // $("#demo-foo-accordion").load(location.href+" #demo-foo-accordion>*","");
                        setTimeout(function () { $('#demo-foo-accordion').footable(); }, 1000);
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
    });
    
</script>