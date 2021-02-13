

<div class="row">
	<div class="col-md-12">
		<div class="card">
			<div class="card-body">
				<button type="button" class="btn btn-info btn-rounded m-t-10 float-right" data-toggle="modal" data-target="#staticBackdrop">Agregar Nuevo Paciente</button>
				    <!-- Add Contact Popup Model -->
				   

				<h4 class="card-title">Registro de Historial</h4>
                <h6 class="card-subtitle">Paciente - Hsitorial</h6>
                <!-- Accordian -->
                <div class="accordion" id="accordionTable">
                    <div class="card m-b-5">
                       
                        <div id="col1" class="collapse show" aria-labelledby="heading1" data-parent="#accordionTable">
                            <div class="card-body">
                                <div class="table-responsive"  >
                                	<table id="example23"
                                        class="display nowrap table table-hover table-striped table-bordered"
                                        cellspacing="0" width="100%">
                                   <!-- <table  id="example23"
                                        class="display nowrap table table-hover table-striped table-bordered"
                                        cellspacing="0" width="100%">-->
                                    	<!--id="demo-foo-accordion" class="table table-bordered m-b-0 toggle-arrow-tiny" data-filtering="true" data-paging="true" data-sorting="true" data-paging-size="7"-->
                                        <thead>
                                            <tr class="footable-filtering">
                                            	<th>#</th>
                                                <th data-toggle="true"> Fecha </th>
                                                <th data-hide="all"> Paciente </th>
                                                <th data-hide="all"> DNI </th>
                                                <th data-hide="all"> Empresa </th>
                                                <th data-hide="all"> Check </th>
                                                <th>Estado</th>
                                                <th>Opciones</th>
                                            </tr>
                                        </thead>
                                        <tbody id="cargar_resultado">
                                        	<!--<?php $cont=0; foreach ($lista_historia_registro_x_usuario as $xx) { $cont+=1;?>
                                        		<tr >
                                        			<td><?php echo $cont; ?></td>
	                                                <td><?php echo $xx->fecha;?></td>
	                                                <td><?php echo $xx->paciente;?></td>
	                                                <td><?php echo $xx->dni;?></td>
	                                                <td><?php echo $xx->empresa; ?></td>
	                                                <td><?php echo $xx->check;?></td>
	                                                <td><span class="label label-table label-success">Active</span></td>
	                                                <td>
	                                                	<a class="btn btn-outline-danger delete" id="`<?php echo $xx->Id;?>" href="javascript:void(0)"><i class="fas fa-trash-alt"></i></a>
	                                    				<a class="btn btn-outline-success update" id="`<?php echo $xx->Id;?>" href="javascript:void(0)"><i class="fas fa-edit"></i></a>
                                     					 <a class="btn btn-outline-primary update_x" id="`+value.Id+`" href="javascript:void(0)"><i class="fas fa-eye"></i></a>
	                                                </td>
	                                            </tr>
                                        	<?php } ?>-->
                                            
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




<div class="modal fade bd-example-modal-lgsd" id="staticBackdrop" data-backdrop="static" data-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog ">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title text-center" id="exampleModalLabel">Registro de nuevo Paciente </h3>                           
            </div>
            <div class="modal-body">
                <form autocomplete="on" method="post" id="registrar_historial_xx" class="form-horizontal form-material">
                    
                    <div class="row">
                        <div class="col-md-12 m-b-20">
	                    <input type="text" name="paciente" id="pacientex" class="form-control" placeholder="Paciente"> 
	                </div>
	                <div class="col-md-12 m-b-20">
	                    <input type="text" name="dni" id="dnix" class="form-control" placeholder="DNI"> 
	                </div>
	                <div class="col-md-12 m-b-20">
	                	 <h6 class="card-title">De calidad</h6>
	                	<div class="btn-group" >
                            <label class="btn btn-primary active">
                                <div class="custom-control custom-radio">
                                    <input type="radio" id="customRadio4" name="customRadio" class="custom-control-input">
                                    <label class="custom-control-label" for="customRadio4">Si</label>
                                </div>
                            </label>
                            <label class="btn btn-primary">
                                <div class="custom-control custom-radio">
                                    <input type="radio" id="customRadio5" name="customRadio" class="custom-control-input">
                                    <label class="custom-control-label" for="customRadio5">Radio 2</label>
                                </div>
                            </label>
                        </div>
	                </div>
	                <div class="col-md-12 m-b-20">
	                    <input type="text" name="empresa" id="empresax" class="form-control" placeholder="Buscar Empresa"> 
	                </div>
	                <div class="col-md-12 m-b-20">
	                    <textarea name="observaciones" id="observacionesx" cols="30" rows="10" class="form-control" placeholder="Observaciones"></textarea>
	        		</div>

                    </div>
                    <div class="row text-center">
                        <div class="col-md-12">
                            <div class="form-actions">
                               <input type="hidden" name="user_id" id="user_id" />
                                <button type="submit" class="btn btn-success btn-rounded"> <i class="fa fa-check"></i> Actualizar</button>
                                <button type="button" data-dismiss="modal" class="btn btn-danger btn-rounded"><i class="fa fa-times-circle"></i>&nbsp;Cancelar</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script> 

<script>
    $(document).ready(function(){
        
        $(document).on('submit', '#registrar_historial_xx', function(event){  
           event.preventDefault();  

            $.ajax({  
                 url:"<?php echo base_url().'Atencion/Historial/Registrar_historial/';?>",
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
                      $('#registrar_historial_xx')[0].reset();  
                      $('.bd-example-modal-lgsd').modal('hide');   
                   	//  $("#cargar_id").load(location.href+" #cargar_id>*",""); 
                   	  // location.href= "<?php echo base_url().'Atencion/Historial/';?>";
                   	   window.location.reload(); 

                   	  // $("#example23").load(location.href+" #example23>*","");
                   
                     
                 },statusCode:{
		              400: function(xhr){

		                var json = JSON.parse(xhr.responseText);
		                if (json.error) {
		                  Swal.fire({
		                      title: 'Lo siento mucho',
		                      text: ""+json.error+"",
		                      icon: 'warning',
		                      showCancelButton: false,
		                      confirmButtonColor: '#3085d6',
		                      cancelButtonColor: '#d33',
		                      confirmButtonText: 'OK'
		                    }).then((result) => {
		                      if (result.value) {
		                        
		                      }
		                    })
		                 /* $("#alert").html('<div class="alert alert-success text-center" id="alerta" role="alert">'+json.alerta+'</div>'); */
		                }
		                
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
            });  
           
            
      });   
    });

</script>






