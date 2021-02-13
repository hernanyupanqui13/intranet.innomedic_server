
  <div class="row">
    <div class="col-md-12">
      <div class="card">
        <div class="card-body">
          <div class="table-responsive  m-t-40">
              <table id="demo-foo-accordion" class="table display nowrap table-hover table-striped table-bordered m-b-0 toggle-arrow-tiny" data-filtering="true" data-paging="true" data-sorting="true"  data-paging-size="7" cellspacing="0" width="100%">
                 
                  <thead>
                      <tr>
                        <th >Opciones</th>
                        <th>Nombres</th>
                        <th >Apellido Paterno</th>
                        <th >Apellido Materno</th>
                        <th>Dni</th>
                        <th>Fecha Nac.</th>
                        <th>Sexo</th>
                        <th>Perfil</th>
                        <th>Area</th>
                        <th>Puesto</th>
                        <th>T. Examen</th>
                        <th>Fecha Atención</th>
                      </tr>
                  </thead>
                  <tbody>
                      <?php foreach ($Listar_data_programacion as $row) {?>
                        <tr>
                          <td>
                          <a href="Javascript:void(0);" class="btn waves-effect waves-light btn-outline-danger deletex" Id="'.$row->Id.'"><i class="far fa-times-circle"></i></a>
                          <a href="javascript:void(0);" class="btn waves-effect waves-light btn-outline-success update" id="'.$row->Id.'"><i class=" far fa-edit"></i></a>
                          </td>
                          <td><?php echo $row->nombres ?></td>
                          <td><?php echo $row->apellido_paterno ?></td>
                          <td ><?php echo $row->apellido_materno ?></td>
                          <td><?php echo $row->dni ?></td>
                          <td ><?php echo $row->fecha_nacimiento ?></td>
                          <td><?php echo $row->sexo ?></td>
                          <td><?php echo $row->perfil ?></td>
                          <td><?php echo $row->area ?></td>
                          <td><?php echo $row->puesto ?></td>
                          <td><?php echo $row->tipo_examen ?></td>
                          <td><?php echo $row->fecha_atencion ?></td>
                       </tr>
                      <?php } ?>
                  </tbody>
              </table>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!--<div class="row">
    <div class="col-lg-12">
      <div class="card">
        <div class="card-body" id="ocultar">

          <div class=" ocultar_all" id="customer_data" >
            
          </div>
          
          
        </div>
       
      </div>

    </div>

  </div>-->
  <table id="ajax-example-1" class="table" data-paging="true"></table>




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


<!--<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script> -->
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>

<!--<script>
  //*ocultar canmpo
  //
<?php $query = $this->db->query("select * from t_programacion where id_usuario='".$this->session->userdata("session_id")."' ");
foreach ($query->result() as $xx) {
  $statusx = $xx->status;
}


?>
if (<?php echo $statusx==1;?>) {
$("#ocultar").hide();
}else{
  $("#ocultar").show();
}

</script>-->



<script>
  jQuery(function($){
    $('#ajax-example-1').footable({
      "columns": $.Deferred(function(d){
        setTimeout(function(){
          $.get('<?php echo base_url().'Sistema/Obtener_columnas/';?>').then(d.resolve, d.reject);
        }, 3000);
      }),
      "rows": $.get('<?php echo base_url().'Sistema/Obtener_filas/';?>')
    });
  });
</script>






<script type="text/javascript" >
    function load_data()
     {
      $.ajax({
       url:"<?php echo base_url().'Sistema/fetch/';?>",
       method:"POST",
       success:function(data){
        $('#customer_data').html(data);

       }
      })
      
     }

     load_data();
</script>
  




 <script type="text/javascript">
                //eliminar pedido sin recargar la pagina web
                
       $(document).on('click', '.deletex', function(){  
           
           var user_id = $(this).attr("id"); 
           var c_obj = $(this).parents("tr");
           if(Swal.fire({
              title: '¿Estás seguro?',
              text: "¡No podrás revertir esto!",
              icon: 'warning',
              showCancelButton: true,
              confirmButtonColor: '#3085d6',
              cancelButtonColor: '#d33',
              confirmButtonText: 'Yes, delete it!',
              cancelButtonText: 'No, Cancelar!',

            }).then((result) => {
              if (result.value) {
                $.ajax({  
                     url:"<?php echo base_url().'Sistema/eliminar_paciente/';?>",  
                     method:"POST",  
                     data:{user_id:user_id},  
                     success:function(data)  
                     {  
                         c_obj.remove();
                         load_data();
                         
                     }  
                }); 
                Swal.fire(
                  'Eliminado!',
                  'Se elimino de manera Correcta.',
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

    <!--seleccionar y eliminar todo el registro-->

     <script type="text/javascript">
                //eliminar pedido sin recargar la pagina web
                
    

    $(document).on('click', '.delete_all', function(){  
             var user_id_all = $(this).attr("id"); 
            // var c_obj = $(this).parents("tr");
             if(Swal.fire({
                title: '¿Estás seguro?',
                text: "Eliminar todo los registros ¡No podrás revertir esto!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!',
                cancelButtonText: 'No, Cancelar!',

              }).then((result) => {
                if (result.value) {
                  $.ajax({  
                       url:"<?php echo base_url().'Sistema/delete_all/';?>",  
                       method:"POST",  
                       data:{user_id_all:user_id_all},  
                       success:function(data)  
                       {  
                           //c_obj.remove();
                           //$('.div_load').load(location.href+" .div_load>*","");
                             //$("#example23").load(" #example23");
                            
                           load_data();

                           //table.ajax.reload();  
                       }  
                  }); 
                  Swal.fire(
                    'Eliminado!',
                    'Se elimino de manera Correcta.',
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
    function sendRequest(){
      $.ajax({
        url: "<?php echo base_url().'Sistema/cantidad_registro/';?>",
        success:
          function(result){ 
    /* si es success mostramos resultados */
           $('#results').text(result);
        },
        complete: function() { 
    /* solo una vez que la petición se completa (success o no success) 
       pedimos una nueva petición en 3 segundos */
           setTimeout(function(){
             sendRequest();
           }, 2000);
          }
        });
      };

    /* primera petición que echa a andar la maquinaria */
    $(function() {
        sendRequest();
    });

</script>
   
