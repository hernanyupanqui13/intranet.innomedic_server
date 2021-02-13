<!--datos familiares-->

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
                $nombres_completosx = $xx->apellido_paterno."" . $xx->apellido_materno.", ".$xx->nombres;
                $apellido_paternox = $xx->apellido_paterno;
                $apellido_maternox = $xx->apellido_materno;
                $departamentox = $xx->departamento;
                $provinciax = $xx->provincia;
                $distritox = $xx->distrito;
                $dni_mostrar_dni = $xx->nro_documento;
                $direccionx = $xx->direccion;
                $fecha_nacimientox =$xx->fecha_nacimiento;
                $id_departamentox = $xx->id_departamento;
                $id_provinciax = $xx->id_provincia;
                $id_distritox = $xx->id_distrito;
                $id_estadox = $xx->id_estado;
                $estado_civilx = $xx->estado_civil;
                $generox = $xx->id_genero;
                $id_lugar_nacimiento_dep_x = $xx->id_lugar_nacimiento_dep;
                $nacimiento = $xx->nacimiento;
                $telefono_movilx = $xx->telefono_movil;
                $telefono_domiciliox = $xx->telefono_domicilio;
                $emailx = $xx->email;
                $talla_pantalon_x = $xx->talla_pantalon;
                $tallax  = $xx->talla;
                $comunicarse_con_x = $xx->comunicarse_con;
                $nro_emergenciax = $xx->nro_emergencia;
                $imagenx = $xx->imagen;
                $fecha_nac = $xx->fecha_nac_dia;
                $urlx = $xx->url;

                

            } ?>


			<?php foreach ($datos_familiares as $fam) {
				$cantidad_hijosx= $fam->cantidad_hijos;
				$hijos_estudianx = $fam->hijos_estudian;
				$hijos_menores_18x = $fam->hijos_menores_18;
				$hijos_menores_3x = $fam->hijos_menores_3;
			} ?>

			<div class="row">

			    <div class="col-lg-12">
			        <div class="card" id="datos_fa_1" style="display: none;">
                        <div class="container-fluid">
                           <h5 class="mt-2">2 DATOS FAMILIARES</h5>
                        </div>
			            <div class="card-body" id="ocultar_datos_familiares_hijos" style="display: none" >
			            	<form action="#" method="post" id="updating_hijos_ficha_id">
			            		<div class="row">
		                    	    <div class="col-md-3">
		                                <div class="form-group ">
		                                    <label class="control-label">Cantidad Hijos</label>
											<input type="text" id="cantidad_hijos"placeholder="5" maxlength="2" class="form-control form-control-danger" value='<?php echo $cantidad_hijosx;?>' name="cantidad_hijos" onkeydown="return soloNumeros(event);">
											
		                                </div>
		                            </div>
		                            <div class="col-md-3">
		                                <div class="form-group ">
		                                    <label class="control-label">Hijos Estudian</label>
		                                    <input type="text" id="hijos_estudian" class="form-control form-control-danger" maxlength="1" placeholder="3" value="<?php echo $hijos_estudianx;?>" name="hijos_estudian"  onkeydown="return soloNumeros(event);">
											
		                                </div>
		                            </div>
		                         
		                            <div class="col-md-3">
		                                <div class="form-group ">
		                                    <label class="control-label">Hijos mayores de 18 años</label>
		                                    <input type="text" id="hijos_menores_18" class="form-control form-control-danger" maxlength="1" placeholder="2" value="<?php echo $hijos_menores_18x; ?>" name="hijos_menores_18"  onkeydown="return soloNumeros(event);">
											
		                                </div>
		                            </div>
		                            <div class="col-md-3">
		                                <div class="form-group ">
		                                    <label class="control-label">Hijos Menores de 3 años</label>
		                                    <input type="text" id="hijos_menores_3" class="form-control form-control-danger" maxlength="1" placeholder="2" value="<?php echo $hijos_menores_3x; ?>" name="hijos_menores_3"  onkeydown="return soloNumeros(event);">
											
		                                </div>
		                            </div> 
				                </div>
				                <div class="text-left ">
		                        	<button class="btn btn-outline-success btn-rounded" type="submit"><i class=" fas fa-plus-circle"></i> Guardar</button>
		                        	  <a href="javascript:vodi(0)" id="regresar_id_x" class="btn btn-outline-danger btn-rounded">Cancelar</a>
		                        </div>
			            	</form>
			            </div>

			             
			        </div>
			        <!--2.1 DATOS REFERENTES A LA FAMILIA DEL TRABAJADOR (PADRES, CONYUGE, HIJOS DEL TRABAJADOR)-->
			        <div class="card" >
                        <div class="container-fluid">
                           <h5 class="mt-2">2 DATOS FAMILIARES</h5>
                        </div>
			            <div class="card-body" id="mostrar_datos_familiares_hijos">
			               <form action="">
			               		<div class="row" id="upload">
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label class="control-label">Cantidad Hijos</label>
                                            <p class="form-text text-dark">Total de Hijos &nbsp;<b><?php echo $cantidad_hijosx;?></b></p>
                                          </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label class="control-label">Hijos Estudian</label>
                                            <p class="form-text text-dark">Hijos que estudian &nbsp;<b><?php echo $hijos_estudianx;?></b></p>
                                          </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label class="control-label">Hijos Mayores de 18 años</label>
                                            <p class="form-text text-dark">Hijos Mayores &nbsp;<b><?php echo $hijos_menores_18x;?></b></p>
                                          </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label class="control-label">Hijos Menores de 3 años</label>
                                            <p class="form-text text-dark">Hijos menores &nbsp;<b><?php echo $hijos_menores_3x;?></b></p>
                                          </div>
                                    </div>
			               		</div>
			               		

			               </form> 

			               <div class="text-left ">
	                        	<button id="ocultando" class="btn btn-outline-success btn-rounded" ><i class=" fas fa-pencil-alt"></i>&nbsp;Editar Datos Familiares</button>
	                        	
	                        </div>	
			            </div>

			            
			           <div class="container-fluid">
                           <h5 class="mt-2">2.1 DATOS REFERENTES A LA FAMILIA DEL TRABAJADOR (PADRES, CONYUGE, HIJOS DEL TRABAJADOR</h5>
                       </div>
			            <div class="table-responsive" id="update_table" >


                            <table class="display nowrap table table-hover table-striped table-bordered table" cellspacing="0" width="100%"> 
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Opciones</th>
                                        <th>Apellidos y nombres</th>
                                        <th>Parentescos</th>
                                        <th>Fecha Nacimiento</th>
                                        <th>Ocupación</th>
                                        <th>Estado Civil</th>
                                        <th>Vive</th>
                                    </tr>
                                </thead>
                                <tbody id="div_load_id">
                                	<?php
                                	$cont =0;
                                	 foreach ($datos_referentes as $xx) {
                                	 $cont +=1	;?>
                                	<tr>
                                        <td><?php echo $cont; ?></td>
                                        <td>
                                        	<a class="btn btn-success update" id="<?php echo $xx->Id;?>" href="javascript:void(0)"><i class="fas fa-edit"></i></a>
                                        	<a class="btn btn-danger delete" id="<?php echo $xx->Id;?>" href="javascript:void(0)"><i class=" fas fa-trash-alt"></i></a>
                                        </td>
                                        <td class="text-dark "><?php echo $xx->nombres;?></td>
                                        <td  class="text-dark "><?php echo $xx->parentescos;?></td>
                                        <td  class="text-dark "><?php echo $xx->fecha_nacimiento;?></td>
                                        <td  class="text-dark "><?php echo $xx->ocupacion;?></td>
                                        <td  class="text-dark "><?php if ($xx->id_estado_civil==1) {
                                        	echo "<span class='label label-success'>Soltero</span>";
                                        }else if($xx->id_estado_civil==2){
                                        	echo "<span class='label label-danger'>Casado</span>";
                                        }else if($xx->id_estado_civil==3){
                                        	echo "<span class='label label-warning'>Divorciado</span>";
                                        }else if ($xx->id_estado_civil==4) {
                                        	echo "<span class='label label-info'>Viudo</span>";
                                        }else if ($xx->id_estado_civil==5) {
                                        	echo "<span class='label label-primary'>Conviviente</span>";
                                        }else{
                                        	echo "<span class='label label-info'>Falta Asignar</span>";
                                        } ?></td>
                                        <td><?php if ($xx->vive=="SI") {?>
                                        	<span class="label label-success">SI</span>
                                        <?php }else if($xx->vive=="NO"){?>
											<span class="label label-danger">NO</span>
                                       <?php  }else{
                                       	echo "<span class='label label-info'>Falta Asignar</span>";
                                       } ?> </td>
                                    </tr>
                                	<?php } ?>
                                    
                                </tbody>
                            </table>
                        
                        </div>
                        

                        <div class="text-right p-2" id="return_false">
                       
                                <div class="col-md-12 text-left">
                                    <a href="javascript:void(0)" data-toggle='modal' data-target='#exampleModal' class="btn btn-outline-success btn-rounded "><i class=" fas fa-plus-circle"></i>&nbsp;Agregar Datos Referentes</a>
                                </div>
                   
                           
                        </div>
                             
                       
			        </div>
			    </div>
			</div>

            <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

            <!-- actualizar los registro de numero de hijos-->

            <script>

                $(document).ready(function() {
                    $(document).on('submit', '#updating_hijos_ficha_id', function(event){
                   event.preventDefault(); 
                   $.ajax({
                        url: '<?php echo base_url().'View_intranet/Ficha_personal/datos_familiares_update/';?>',
                        method:'POST',  
                        data:new FormData(this),  
                        contentType:false,  
                        processData:false,  
                        success:function(data){
                            //devolvemos los datos del from
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
                            $("#ocultar_datos_familiares_hijos").hide();
                            $("#datos_fa_1").hide();
                            $("#mostrar_datos_familiares_hijos").show();
                            //$("#upload").load("#upload");
                            $("#upload").load(location.href+" #upload>*","");

                        }

                   });
                  });


                });
                
            </script>

            <script>
                $(document).ready(function() {
                    $(document).on('click', '.update', function(){  
                       var user_id = $(this).attr("id");  
                       $.ajax({  
                           url:"<?php echo base_url().'View_intranet/Ficha_personal/fetch_single_user/';?>",
                            method:"POST",  
                            data:{user_id:user_id},  
                            dataType:"json",  
                            success:function(data)  
                            {  
                                 $('#userModal').modal('show');  
                                 $('#nombrex').val(data.nombre);  
                                 $('#parentescos').val(data.parentescos);  
                                 //$('.modal-title').text("Edit User");  
                                 $('#user_id').val(user_id);  
                                 $('#ocupacion').val(data.ocupacion);
                                 $('#fecha_nacimiento_x').html(data.fecha_nacimiento);
                                 $('#estado_x option').filter('option[value="' + data.id_estado_civil + '"]').attr('selected', true);
                                 $('#buscar input:radio[name="options"]').filter('[value="'+data.vive+'"]').attr('checked', true);

                                 
                            }  
                       })  
                  });
                });
            </script>

                 <!--modal de actualizar datps-->
            <div class="modal fade bd-example-modal-lgsd" id="userModal" data-backdrop="static" data-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-lg">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h3 class="modal-title text-center" id="exampleModalLabel">Actualizar datos de <?php echo $nombres_completosx;?></h3>                           
                                </div>
                                <div class="modal-body">
                                    <form autocomplete="on" method="post" id="user_form" class="form-material">
                                        
                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="" class="col-form-label">Nombres</label>
                                                    <input type="text" name="nombres" id="nombrex" class="form-control" placeholder="Ingrese nombres">
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="" class="col-form-label">Parentescos</label>
                                                    <input type="text" name="parentescos" id="parentescos" class="form-control" placeholder="" >
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="" class="col-form-label">Ocupación</label>
                                                    <input type="text" name="ocupacion" id="ocupacion" class="form-control" placeholder="" >
                                                </div>
                                            </div>
                                           
                                        </div>
                                        <div class="row">
                                             <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="" class="col-form-label">Fecha Nacimiento</label>
                                                    <div id="fecha_nacimiento_x"></div>
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label for="">Estado civil&nbsp;</label>
                                                        <select name="estado" id="estado_x" class="form-control">
                                                            <option value="">--Seleccione--</option>
                                                            <?php $query_x = $this->db->query("select * from ts_estado_civil");
                                                            foreach ($query_x->result() as $ds) {?>
                                                                
                                                            <option value="<?php echo $ds->Id;?>"><?php echo $ds->civil;?></option>
                                                            <?php } ?>

                                                        </select>
                                                </div>
                                               
                                            </div>
                                            <div class="col-md-5">
                                                 <label for="">Vive</label>
                                                <div class="form-group">
                                                    <div class="btn-group" data-toggle="buttons" role="group" id="buscar">
                                                        <label class="btn btn-outline btn-info">
                                                            <div class="custom-control custom-radio">
                                                                <input type="radio" id="customRadio1_xx" name="options" value="SI" class="custom-control-input">
                                                                <label class="custom-control-label" for="customRadio1"> <i class="ti-check text-active" aria-hidden="true"></i> SI</label>
                                                            </div>
                                                        </label>
                                                        <label class="btn btn-outline btn-info">
                                                            <div class="custom-control custom-radio">
                                                                <input type="radio" id="customRadio2_xx" name="options" value="NO" class="custom-control-input">
                                                                <label class="custom-control-label" for="customRadio2"> <i class="ti-check text-active" aria-hidden="true"></i> NO</label>
                                                            </div>
                                                        </label>
                                                    </div>
                                                </div>
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

            <!--agregar- row-- file-->

            <script>
                $(document).ready(function (){
  
                $("#frm_submit").on('submit', function (e) {
                    e.preventDefault();      
                   //Validacion para nombres
                    $.ajax({
                        url: '<?php echo base_url() ?>View_intranet/Ficha_personal/insertar_datos_xx/',
                        type: 'POST',
                        data: $("#frm_submit").serialize()
                    }).always(function (response){

                       var r = (response.trim());
                        if(r == 1){
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
                                  title: 'Se registro Correctamente'
                                }) 
                            $("#update_table").show();
                            $("#xx").show();
                            $("#return_false").show();
                            $("#xxx_xxx").show();
                            $("#ocultar_tabla_familiares_ok").hide();
                            $("#update_table").load(location.href+" #update_table>*","");
                            //$("#update_table").load("#update_table");
                        }
                        else{
                           // $(".alert-danger").show();
                        }
                    });
                });
                });
            </script>

            <script>
                    $("#regresar_id").on( "click", function() {
                        $('#ocultar_mostrar').hide();
                        $('#cargar').show(); //muestro mediante id
                        $('#mostrar_view').show();

                    });

                    $("#ocultar_estado_civil").click(function() {
                        if(!$(this).prop('checked')){
                            $('#ocultar_estado_civi').hide();
                        }else{
                            $('#ocultar_estado_civi').show();
                        }
                       // $("#ocultar_estado_civi").show();
                        
                    }); 

                     $("#id_ocultar").click(function() {
                        if(!$(this).prop('checked')){
                            $('#ocultar_vive').hide();
                        }else{
                            $('#ocultar_vive').show();
                        }
                       // $("#ocultar_estado_civi").show();
                        
                    }); 

                    

                    

                    $("#xxx_xxx").on( "click", function() {
                        $('#update_table').hide();
                        $("#xx").hide();
                        $("#xx_x").hide();
                        $("#xxx_xxx").hide();
                        $("#return_false").hide(); //oculto mediante id
                        $('#ocultar_tabla_familiares_ok').show();
                        $("#datos_fa_1").show(); //muestro mediante clase
                    });
                    $("#regresar_tabla_al_mimsmo").on( "click", function() {
                        $('#update_table').show();
                        $("#xx").show();
                        $("#xx_x").show();
                        $("#xxx_xxx").show();
                        $("#return_false").show(); //oculto mediante id
                        $('#ocultar_tabla_familiares_ok').hide();
                        $("#datos_fa_1").hide(); //muestro mediante clase
                    });

                    $("#regresar_id_x").on( "click", function() {
                        $("#ocultar_datos_familiares_hijos").hide();
                        $("#datos_fa_1").hide();
                        $("#mostrar_datos_familiares_hijos").show();
                    });

                    //mostramos y ocultamos llos datos de familiares
                    
                    $("#ocultando").on( "click", function() {
                        $("#ocultar_datos_familiares_hijos").show();
                        $("#datos_fa_1").show();
                        $("#mostrar_datos_familiares_hijos").hide();
                        //$('#target').hide(); //oculto mediante id
                        //$('.target').hide(); //muestro mediante clase
                    });
            </script>


             <script type="text/javascript">
                //eliminar pedido sin recargar la pagina web
                
               $(document).on('click', '.delete', function(){  
                   var user_id = $(this).attr("Id"); 
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
                             url:"<?php echo base_url().'View_intranet/Ficha_personal/eliminar_datos_referentes/';?>",  
                             method:"POST",  
                             data:{user_id:user_id},  
                             success:function(data)  
                             {  
                                 c_obj.remove();
                                 table.ajax.reload();  
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
            </script>



            <script>
                $(document).ready(function(){
                    
                    $(document).on('submit', '#user_form', function(event){  
                       event.preventDefault();  
                        $.ajax({  
                             url:"<?php echo base_url().'View_intranet/Ficha_personal/user_action/';?>",
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
                                    //limpiar campos de formulario
                                    $('#user_form')[0].reset(); 
                                    $('input[name="options"]').attr('checked', false);
                                    $("#estado_x option").attr("selected",false);
                                    //Viene hasta aqui la limpieza General de cabezado

                                    $('#userModal').modal('hide');   
                                    $("#return_false").show();
                                    $("#xxx_xxx").show();
                                    $("#xx").show();
                                    $("#div_load_id").load(location.href+" #div_load_id>*","");    
  
                             }  
                        });  
                       
                        
                  }); 


                     
                });

                
            </script>


            <div class="modal fade bd-example-modal-lgsd" id="exampleModal" data-backdrop="static" data-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg ">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h3 class="modal-title text-center" id="exampleModalLabel">Nuevos Datos Referentes</h3>                           
                        </div>
                        <div class="modal-body">
                            <form autocomplete="on" method="post" id="insert_data" class="form-material" role="form">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="" class="col-form-label">Nombres Completos</label>
                                           <input type="text" name="nombres_completos_xx" id="nombres_completos_xx" placeholder="Ingrese nombres" class="form-control" onkeypress="return sololetras(event);">
                                           
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="" class="col-form-label">Parentesco </label>
                                            <input type="text" name="parentescos_xx" id="parentescos_xx" class="form-control" placeholder="Ingrese Parentesco" onkeypress="return sololetrasnumeros(event);">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="" class="col-form-label">Fecha Nacimiento</label>
                                           <input type="text" name="fecha_nacimiento_xx" id="mdate" placeholder="<?php echo date('Y-m-d') ?>" class="form-control">
                                           
                                        </div>
                                    </div>
                                   
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <label for="" class="col-form-label">Ocupación</label>
                                           <input type="text" name="ocupacion_xx" id="ocupacion_xx" placeholder="Ocupación" class="form-control" onkeydown="return sololetras(event);">
                                           
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="" class="col-form-label">Estado Civil </label>
                                            <select name="estado_xx" id="estado_xx" class="form-control">
                                                <option value="">--Seleccione--</option>
                                                <?php $query_x = $this->db->query("select * from ts_estado_civil");
                                                foreach ($query_x->result() as $ds) {?>
                                                    
                                                <option value="<?php echo $ds->Id;?>"><?php echo $ds->civil;?></option>
                                                <?php } ?>

                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                         <label for="">Vive</label>
                                            <div class="form-group">
                                                <div class="btn-group" data-toggle="buttons" role="group">
                                                    <label class="btn btn-outline btn-info">
                                                        <div class="custom-control custom-radio">
                                                            <input type="radio" id="customRadio1" name="options_xx" value="SI" class="custom-control-input">
                                                            <label class="custom-control-label" for="customRadio1"> <i class="ti-check text-active" aria-hidden="true"></i> SI</label>
                                                        </div>
                                                    </label>
                                                    <label class="btn btn-outline btn-info">
                                                        <div class="custom-control custom-radio">
                                                            <input type="radio" id="customRadio2" name="options_xx" value="NO" class="custom-control-input">
                                                            <label class="custom-control-label" for="customRadio2"> <i class="ti-check text-active" aria-hidden="true"></i> NO</label>
                                                        </div>
                                                    </label>
                                                </div>
                                            </div>
                                    </div>
                                </div>
                                <div class="row text-center">
                                    <div class="col-md-12">
                                        <div class="form-actions">
                                           <input type="hidden" name="url_xx" value="<?php echo $urlx;?>">
                                            <button type="submit" class="btn btn-success btn-rounded"> <i class="fa fa-check"></i> Registrar</button>
                                            <button type="button" data-dismiss="modal" class="btn btn-danger btn-rounded"><i class="fa fa-times-circle"></i>&nbsp;Cancelar</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <script>
                $(document).ready(function() {
                    $(document).on('submit', '#insert_data', function(event) {
                        event.preventDefault();

                         var nombres_completos_xx = $("#nombres_completos_xx").val();
                         var parentescos_xx = $("#parentescos_xx").val();
                         var mdate = $("#mdate").val();
                         var ocupacion_xx = $("#ocupacion_xx").val();
                         var estado_xx = $("#estado_xx").val();
                         //DIRECCION

                    if (nombres_completos_xx == null || nombres_completos_xx.length == 0 || /^\s+$/.test(nombres_completos_xx) ) {
                        Swal.fire({
                          title: 'Nombres Completos',
                          text: "Ingrese Nombres Completos",
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
                       }else if(nombres_completos_xx.length<=10){
                            Swal.fire({
                              title: 'Nombres Completos',
                              text: "Nombres Completos no puede ser menor a 10 caracteres",
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
                       }else if(nombres_completos_xx.length>=100){
                            Swal.fire({
                              title: 'Nombres Completos',
                              text: "Nombres Completos no puede  ser mayor a 100 caracteres",
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

                       //parentescos
                        if (parentescos_xx == null || parentescos_xx.length == 0 || /^\s+$/.test(parentescos_xx) ) {
                        Swal.fire({
                          title: 'Parentesco',
                          text: "Ingrese Parentescos",
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
                       }else if(parentescos_xx.length<=2){
                            Swal.fire({
                              title: 'Parentesco',
                              text: "Campo Parentesco no puede ser menor a 3 caracteres",
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
                       }else if(parentescos_xx.length>=100){
                            Swal.fire({
                              title: 'Parentesco',
                              text: "Campo Parentesco no puede  ser mayor a 100 caracteres",
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
                       //fecha nacimiento

                       if (mdate == null || mdate.length == 0 || /^\s+$/.test(mdate) ) {
                        Swal.fire({
                          title: 'Fecha Nacimiento',
                          text: "Ingrese Fecha Nacimiento",
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

                       //ocupacion
                        if (ocupacion_xx == null || ocupacion_xx.length == 0 || /^\s+$/.test(ocupacion_xx) ) {
                        Swal.fire({
                          title: 'Ocupación',
                          text: "Ingrese Ocupación",
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
                       }else if(ocupacion_xx.length<=5){
                            Swal.fire({
                              title: 'Ocupación',
                              text: "Campo Ocupación no puede ser menor a 5 caracteres",
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
                       }else if(ocupacion_xx.length>=100){
                            Swal.fire({
                              title: 'Ocupación',
                              text: "Campo Ocupación no puede  ser mayor a 100 caracteres",
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

                       if (estado_xx == null || estado_xx.length == 0 || /^\s+$/.test(estado_xx) ) {
                        Swal.fire({
                          title: 'Estado Civil',
                          text: "Ingrese Estado Civil",
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

                         if(!$("input[name='options_xx']").is(':checked')){
                        Swal.fire({
                          title: 'Pariente Vive?',
                          text: "Seleccione el campo Vive",
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
                      
                        /* Act on the event */
                        $.ajax({
                            url: '<?php echo base_url() ?>View_intranet/Ficha_personal/insertar_datos_xx/',
                            type: 'POST',
                            data: $("#insert_data").serialize(),
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
                            $('#insert_data')[0].reset();
                            $("#update_table").load(location.href+" #update_table>*","");
                           

                           // $('input[@name="correctAnswer"]')[0].checked = false;
                        })
                        .fail(function() {
                            console.log("error");
                        })
                        .always(function() {
                            console.log("complete");
                       
                        });
                        
                    });
                });
            </script>


                <script>
                    function soloNumeros(event)
                    {
                        if(event.shiftKey)
                       {
                            event.preventDefault();
                       }

                       if (event.keyCode == 46 || event.keyCode == 8)    {
                       }
                       else {
                            if (event.keyCode < 95) {
                              if (event.keyCode < 48 || event.keyCode > 57) {
                                    event.preventDefault();
                              }
                            } 
                            else {
                                  if (event.keyCode < 96 || event.keyCode > 105) {
                                      event.preventDefault();
                                  }
                            }
                          }
                    }

                    function sololetras(e) {
                          if(e.key.match(/[a-zñçáéíóú,.\s]/i)===null) {
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

                </script>

              