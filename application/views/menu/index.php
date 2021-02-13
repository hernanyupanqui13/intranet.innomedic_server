<!--             <div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header bg-info">
                <h4 class="m-b-0 text-white">Seleccione Para dar ciertos acceso al cliente</h4>
            </div>
          <div class="card-body">
            <div class="form-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group has-success">
                              <h3 class="card-title">Perfil</h3>
                                <select class="select2 form-control " id="perfil" name="perfil" onchange="return validar(this.value);" style="width: 100%; height:60px;">
                            <option value="">--Seleccione--</option>
                            <?php foreach ($perfil as $xx ) { ?>
                              <?php 
                              if ($this->uri->segment(3,0)==$xx->Id) {
                                $act ="selected";
                              }else{
                                $act="";
                              }
                              ?>
                              <option value="<?php echo $xx->Id;?>"<?php echo $act;?>><?php echo $xx->perfil;?></option>
                            <?php  } ?>
                        </select>
                          </div>
                        </div>
                        <!--/span--
                        <?php if($this->uri->segment(3,0)>0){ ?>
                        <div class="col-md-6">
                            <div class="form-group">
                              <h3 class="card-title">Lista de Menu</h3>
                                <select class="select2 form-control " id="perfil" name="perfil" onchange="return agregar(this.value);" style="width: 100%; height:60px;">
                            <option value="">--Seleccione--</option>
                            <?php foreach ($menu as $xxx) {?>
                              <option value="<?php echo $xxx->Id?>"><?php echo $xxx->menu; ?></option>
                            <?php } ?>
                        </select>
                            </div>
                        </div>
                        <!--/span--
                        <?php } ?>

                    </div>
              </div>
          </div>
      </div>
  </div>
</div>--

<div class="card">
    <div class="card-body">
        <h4 class="card-title">Criterio de Acceso a cada usuario</h4>
        <div class="table-responsive m-t-20">
            <table id="myTable" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>Numero Orden</th>
                        <th>Nombre de Menu Asignado</th>
                        <th>Url</th>
                        <th>Opciones</th>
                    </tr>
                </thead>
                <tbody>
                  <?php 
                  $contador=0;
                  foreach ($lista_accesos as $xxxx ) {
                  $contador +=1;
                  ?>
                  
                    <tr>
                        <td><?php echo $contador; ?></td>
                        <td>
                          <?php $resultado=$this->db->query("select * from ts_menu where Id='".$xxxx->menu."'");
                          foreach ($resultado->result() as $x) {
                            echo $x->nombre;
                           } ?>

                        </td>
                        <td><a href="<?php echo base_url().$xxxx->urlx;?>">Ingresar al link</a></td>
                        <td>
                          <a class="btn btn-rounded btn-outline-danger" data-toggle="tooltip" data-original-title="Eliminar Menú asignado" href="<?php echo base_url().'Menu/eliminar_anadir/'.$this->uri->segment(3,0)."/".$xxxx->Id;?>">
                                <i class="fa fa-close m-r-5"></i><span> Eliminar </span>
                            </a>
                        </td>
                    </tr>

                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>


  <script>
    function validar(e){
      window.location="<?php echo base_url().'Menu/Configuracion/anadir/';?>"+e;
    }

    function agregar(e) {
      window.location="<?php echo base_url().'Menu/Configuracion/anadir_agregar/'.$this->uri->segment(3,0).'/'?>"+e;
    }
  </script>  -->

            <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Perfil de Usuario</h4>
                               <div class="row">
                                   <div class="col-md-6">
                                        <select class="select2 form-control custom-select click" style="width: 100%; height:36px;" id="click">
                                            <option id="hidde" value="0">-- Seleccione --</option>
                                           <?php foreach ($perfil as $xx) {?>
                                               <option value="<?php echo $xx->Id; ?>"><?php echo $xx->perfil;?></option>
                                           <?php } ?>
                                        </select>
                                   </div>
                                   <div id="mostrar" class="col-md-6" style="display: none;">
                                        <select class="select2 form-control custom-select" style="width: 100%; height:36px;" id="click_id" >
                                            <option >-- Seleccione --</option>
                                           <?php foreach ($menu as $xx) {?>
                                               <option  value="<?php echo $xx->Id;?>"><?php echo $xx->nombre;?></option>
                                           <?php } ?>
                                        </select>
                                   </div>
                               </div>
                               <div>
                                   <div class="col-md-12 p-25" id="lista_table" style="display: none;" >
                                        
                                         <!-- Accordian -->
                                       <div class="table-responsive ">
                                            <table class="table">
                                                <thead>
                                                    <tr>
                                                        <th> Nº # </th>
                                                        <th> Menu</th>
                                                        <th> Url - link </th>
                                                        <th> Perfil</th>
                                                        <th> Estado </th>
                                                        <th> Opciones </th>
                                                    </tr>
                                                </thead>
                                                <tbody id="lista_resultado">
                                                   <!-- <?php 
                                                    $cont=0;
                                                    foreach ($lista_accesos as $xxx) {
                                                        $cont +=1;?>
                                                        <tr>
                                                            <td><?php echo $cont;?></td>
                                                            <td><i class="<?php echo $xxx->iconox;?>"></i>&nbsp;<?php echo $xxx->menux;?></td>
                                                            <td><a href="<?php echo base_url().$xxx->urlx;?>">Ingresar al link</a></td>
                                                            <td><span class="label label-success"><?php echo $xxx->perfilx; ?></span></td>
                                                            <td><?php if ($xxx->estado==1) {?>
                                                                <span class="label label-table label-success">Link Activo</span>
                                                            <?php }else if($xxx->estado==2){?>
                                                                <span class="label label-table label-danger">Link Desactivado</span>
                                                            <?php }else{?>
                                                                <span class="label label-table label-info">Link Roto</span>
                                                           <?php  } ?></td>
                                                            <td><a href="javascript:void(0)"  id="<?php echo $xxx->Id;?>" class="btn btn-outline-danger delete_x"><i class="fas fa-trash-alt"></i></a></td>
                                                            
                                                            
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
          

         




                <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script> 

                <script>

                    $(document).ready(function() {

                        $('#click').on('change', function (){
                           // reload();//código personalizable
                            $("#mostrar").show(2000);
                            $("#listra").show(2000);
                            var perfil = $("#click").val();

                            $.ajax({
                              url: '<?php echo base_url().'Menu/Configuracion/lista_menu/'?>',
                              type: 'POST',
                              data:"perfil="+perfil,
                            })
                            .done(function(data) {
                              var resultado = JSON.parse(data);
                                var contenido = '';
                                var contador = 0;
                                $.each(resultado, function(index,value) {
                                    contador+=1;
                                    contenido += `
                                    <tr>
                                        <td>`+contador+`</td>
                                        <td><i class="`+value.iconox+`"></i>&nbsp;`+value.menux+`</td>
                                        <td><a href="<?php echo base_url();?>`+value.urlx+`">Ingresar al link</a></td>
                                        <td><span class="label label-success">`+value.perfilx+`</span></td>
                                        <td><span class="label label-success">`+value.estado+`</span></td>
                                        <td><a href="javascript:void(0)"  id="`+value.Id+`" class="btn btn-outline-danger delete_x"><i class="fas fa-trash-alt"></i></a></td>
                                    </tr>
                                       
                                    `;
                                });
                                $("#lista_resultado").html(contenido);
                                
                                 $("#lista_table").show(2000);
                              console.log("success");
                            })
                            .fail(function() {
                              console.log("error");
                            })
                            .always(function() {
                              console.log("complete");

                            });
                            
                           

                        });

                    

                    $("#click_id").on('change',function(event){
                           
                        var nombre = $('#click_id').val();
                        var perfil = $("#click").val();

                        $.ajax({
                            type: "POST",
                            url: "<?php echo base_url().'Menu/Configuracion/agregar_menu_items/';?>",
                            data: "nombrex="+nombre+"&perfilx="+perfil,
                            cache: false,
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
                          },  
                          success: function (response) {
                                alert("se registro correctamente");
                                console.log("success");
                                
                                //verificar como puedo para hacer insert de manera automatica
                                //$('#lista_table').load(location.href+" #lista_table>*","");

                            }
                        });
                    })
                   
                   

                    
                       

                    });
                </script>

                <script type="text/javascript">
                //eliminar pedido sin recargar la pagina web
                
               $(document).on('click', '.delete_x', function(){  
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
                             url:"<?php echo base_url().'Menu/Configuracion/eliminar_datos_idx/';?>",  
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