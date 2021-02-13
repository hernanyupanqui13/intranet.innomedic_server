<div class="row">
	<div class="col-md-12"> 
		<div class="card">
            <div class="card-body">
                 <a href="javascript: history.back()" class="btn btn-danger"  style="display: none;"><i class="fa fa-reply m-r-5"></i><span> Regresar </span></a><br><br>
            	 <h4 class="card-title" style="display: none;">DATOS DE BOLETA EN GENERAL</h4> 
                 <form id="registrar_detalle" method="post">
            		<div class="row " style="display: none;">
            			<div class="col-md-4">
            				<label>RRHH:</label><br>
            				<input type="hidden" name="nombrexx" value="<?php echo $this->session->userdata("nombre").' '.$this->session->userdata("apellido_paterno").' '.$this->session->userdata("apellido_materno");?>"><span><?php echo $this->session->userdata("nombre").' '.$this->session->userdata("apellido_paterno").' '.$this->session->userdata("apellido_materno");?></span>
            			</div>
            			<div class="col-md-4">
            				<label>Empresa:</label>	<br>
            				<span>INNOMEDIC INTERNATIONAL E.I.R.L</span>
            			</div>

            			<div class="col-md-4">
            				<label>Nº Entrega Boleta:</label>	<br>
            				<!--<input type="hidden" name="nro" id="numero" value=""><span id="numerox"></span>-->
                            <input type="hidden" name="nro" id="numero" value="<?php echo "000";?><?php echo rand(10000000000,9000000000000);?>"><span ><?php echo "000";?><?php echo rand(10000000000,9000000000000);?></span>

            			</div>

            			
            		</div>
            		<div class="row " style="display: none;"><!--pt-2-->
            			<div class="col-md-4 ">
            				<label  for="">Fecha de Envio</label><br>
		                      				
              				<input type="hidden" name="fecha" id="date-format" class="form-control btn-rounded "  value="<?php echo date('Y-m-d h:i:s'); ?>" readonly="" >
              				<span readonly><?php echo date('Y-m-d h:i:s'); ?></span>
            			</div>
            		</div>
            	<!--</form>-->
            	<style>
               .colorear{
                border: 2px solid red;
               } 
              </style>
                <h4 class="card-title">Envío de Boletas</h4>
                <div class="row">
                  <div class="col-md-4">
                    <input type="text" placeholder="Buscar colaborador " id="search" class="form-control btn-rounded " style="border: 2px solid #000000;">
                  </div>
                </div>
                <div class="table-responsive pt-4">

                 <table id="evaristo" class="tablesaw no-wrap table-bordered table-hover table" data-tablesaw>
                  <!--<table id="escudero_huillcamasxcco" class="table table-bordered table-striped">-->
                     <!--<table id="demo-foo-accordion" class="table table-bordered m-b-0 toggle-arrow-tiny" data-filtering="true" data-paging="true" data-sorting="true">-->
                    <thead>
                        <tr>
                            <th scope="col" class="border">#
                                        
                            </th>
                            <th scope="col" class="border">Apellidos y Nombres
                                
                            </th>
                            <th scope="col" class="border">Tipo Boleta</th>
                            <th scope="col" class="border">Año</th>
                            <th scope="col" class="border"><abbr title="Rotten Tomato Rating">Periodo</abbr></th>
                            <th scope="col" class="border">Adjuntar Archivo</th>
                           <!--<th>#</th>-->
                        </tr>
                    </thead>
                    <tbody id="checkall-target">
                      <?php $cont=0; foreach ($lista_trabajadores as $xx) { $cont+=1; ?>
                        
                         <tr >
                              <td>
                                    <?php echo "Nº".' '.$cont; ?>
                                 <input type='hidden' name='count[]' value="<?php $digits = 16;
                                    echo mt_rand(pow(10, $digits-1), pow(10, $digits)-1); ?>">
                                    </td>
                              <td class="title"><input type="hidden" name="nombres[]" value="<?php echo $xx->apellido_paterno.' '.$xx->apellido_materno.' '.$xx->nombres; ?>"><a href="javascript:void(0)" class="has-arrow waves-effect waves-dark"><?php echo $xx->apellido_paterno.' '.$xx->apellido_materno.' '.$xx->nombres; ?></a>
                                <input type="hidden" name="id_usuario[]" value="<?php echo $xx->id_usuario;?>">
                                <input type="hidden" name="nro_documento[]" value="<?php echo $xx->nro_documento;?>">
                                <input type="hidden" name="puesto[]" value="<?php echo $xx->puesto;?>">
                                <input type="hidden" name="area[]" value="<?php echo $xx->area;?>">
                                <input type="hidden" name="email[]" value="<?php echo $xx->email;?>">
                              </td>
                              <td><select class="form-control select2 requerido" name="boleta[]" style="width:100%; " >
                                <option value="">--Seleccione--</option>
                                <?php $lista_tipo_boletas = $this->db->query("select * from do_tipo_boleta"); 
                                foreach ($lista_tipo_boletas->result() as $x) {?>
                                  <?php if ($x->Id==1) {
                                    $select = "selected";
                                  }else{
                                     $select = "";
                                  } ?>
                                  <option value="<?php echo $x->Id; ?>" <?php echo $select;?>><?php echo $x->nombre; ?></option>
                                <?php } ?>
                              </select></td>
                              <td>
                                <select name="ano[]"  class="select2xxeva form-control" style="width: 100%;">
                                  <option value="" disabled="">--Año--</option>
                                  <?php $query = $this->db->query("select * from do_ano;");
                                    foreach ($query->result() as $x) {?>
                                      <?php if ($x->ano == date('Y')) {
                                        $select = "selected";
                                      }else{
                                        $select = "";
                                      } ?>
                                      <option value="<?php echo $x->ano; ?>"<?php echo $select;?>><?php echo $x->ano; ?></option>
                                    <?php }
                                  ?>
                                </select>
                                <!--<input type="hidden" name="ano[]" value="<?php echo date('Y');?>"><?php echo date('Y');?>-->
                                
                              <td >
                                <select class="form-control select2x " name="mes[]" style="width: 100%" >
                                  <?php    
                      $Meses = array('Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio',
                             'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre');

                      for ($i=1; $i<=12; $i++) {
                           if ($i == date('m'))
                      echo '<option value="'.$Meses[($i)-1].'"selected>'.$Meses[($i)-1].'</option>';
                           else
                      echo '<option value="'.$Meses[($i)-1].'">'.$Meses[($i)-1].'</option>';
                           }
                      ?>
                                </select>
                              </td>
                              <td >
                                 
                                    <div class="input-group">
                                        <label class="input-group-btn">
                                            <span class="btn btn-danger ">
                                                Archivo&hellip; <input type="file" name="images[]"  class="requerido " style="display: none;">
                                            </span>
                                        </label>
                                        <input type="text"  class="form-control " readonly>
                                    </div>
                                    <!--<form action="#" class="validar_archivo_entregaxx">
                                      <div class="input-group evaristo">
                                        <label class="input-group-btn">
                                            <span class="btn btn-danger validar_archivo_entrega">
                                                Archivo&hellip; <input type="file" name="images[]"  class="requerido evaristo_file" style="display: none;">
                                            </span>
                                        </label>
                                        <input type="text" class="form-control denis" readonly>
                                        <button type="submit"  class="submit_eva" style="display: none;"></button>
                                    </div>
                                    </form>-->
                              </td>
                              <!--<td>
                                <a href="javascript:void();" class="btn  btn-outline-dark btn-remove-producto" ><i class="fas fa-eraser"></i></a>
                              </td>-->
                          </tr>
                        
                      <?php } ?>
                        
                    </tbody>
                </table>
                </div>

                <div class="row pt-3">
                  <div class="col-md-12 text-right enviando" style="display: none;">
                   <button class="btn btn-outline-success btn-rounded btn-lg" type="button" >
                      <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
                      Enviando...
                    </button>
                  </div>
                	<div class="col-md-12 text-right enviando_submit">
                		<button type="submit" class=" btn btn-outline-success btn-lg btn-rounded  "><i class="fas fa-location-arrow"></i>&nbsp;Enviar Boleta</button>
                	</div>
                </div>
                </form>

                
            </div>
        </div>
	</div>
</div>


<script type="text/javascript">
    function getCleanedString(cadena){
   // Definimos los caracteres que queremos eliminar
   var specialChars = "!@#$^&%*()+=-[]\/{}|:<>?,.+";

   // Los eliminamos todos
   for (var i = 0; i < specialChars.length; i++) {
       cadena= cadena.replace(new RegExp("\\" + specialChars[i], 'gi'), '');
   }   

   // Lo queremos devolver limpio en minusculas
   cadena = cadena.toLowerCase();

   // Quitamos espacios y los sustituimos por _ porque nos gusta mas asi
   cadena = cadena.replace(/ /g,"_");

   // Quitamos acentos y "ñ". Fijate en que va sin comillas el primer parametro
   cadena = cadena.replace(/á/gi,"a");
   cadena = cadena.replace(/é/gi,"e");
   cadena = cadena.replace(/í/gi,"i");
   cadena = cadena.replace(/ó/gi,"o");
   cadena = cadena.replace(/ú/gi,"u");
   cadena = cadena.replace(/ñ/gi,"n");
   return cadena;
}


</script>






<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>


<script>
 // Write on keyup event of keyword input element
 $(document).ready(function(){
 $("#search").keyup(function(){
 _this = this;
 // Show only matching TR, hide rest of them
 $.each($("#evaristo tbody tr"), function() {
 if($(this).text().toLowerCase().indexOf($(_this).val().toLowerCase()) === -1)
 $(this).hide();
 else
 $(this).show();
 });
 });
});
</script>


<style>
  .filledInputs{
  background-color: red;
}
</style>
<script type="text/javascript">
    $(function() {

  // We can attach the `fileselect` event to all file inputs on the page
  $(document).on('change', ':file', function() {

    var input = $(this),
        numFiles = input.get(0).files ? input.get(0).files.length : 1,
        label = input.val().replace(/\\/g, '/').replace(/.*\//, '');
    input.trigger('fileselect', [numFiles, label]);


      
  });

  // We can watch for our custom `fileselect` event like this
  $(document).ready( function() {
      $(':file').on('fileselect', function(event, numFiles, label) {
        
          var input = $(this).parents('.input-group').find(':text'),
              log = numFiles > 1 ? numFiles + ' files selected' : label;

          if( input.length ) {
              input.val(log);

          } else {
              if( log ) alert(log);
          }



      });
  });
  
});
</script>




<script>

      $(document).on('mousemove', '.validar_archivo_entrega', function(event) {
        event.preventDefault();

         $.ajax({
            url: '<?php echo base_url().'Boleta/Boleta/verificar_data';?>',
            type: 'POST',
            //dataType: 'default: Intelligent Guess (Other values: xml, json, script, or html)',
            data: {param1: '1'},
          })
          .done(function() {
            console.log("success");
          })
          .fail(function() {
            console.log("error");
          })
          .always(function() {
            console.log("complete");
          });




        let timerInterval
        Swal.fire({
          title: 'Auto close alert!',
          html: 'I will close in <b></b> milliseconds.',
          timer: 1000,
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
          /* Read more about handling dismissals below */
          if (result.dismiss === Swal.DismissReason.timer) {
            console.log('I was closed by the timer')


          }
        })
         return false;
        


        
          

       
       
      });

        //remover el pedido
        $(document).on('click','.btn-remove-producto', function(){
            $(this).closest('tr').remove();
           
             
        });


		$(document).ready(function() {
			$(document).on('submit', '#registrar_detalle', function(event) {
				event.preventDefault();


        $(".enviando").show(500);
        $(".enviando_submit").hide(500);

				/* Act on the event */
				$("#registrar_cabecera").submit(function(event) {
            		/* Act on the event */
            		event.preventDefault();
            		$('#registrar_cabecera').serialize();
            	});

            	$.ajax({
            		url: '<?php echo base_url().'Boleta/Boleta/regitrar_boletas/';?>',//regitrar_boletas
            		type: 'POST',
            		data:new FormData(this),  
                contentType:false,  
                processData:false,  
            		statusCode: {
                    400: function(xhr) {
                        var json = JSON.parse(xhr.responseText);
                        if (json.error_registro) {
                            Swal.fire({
                                title: 'Lo siento mucho',
                                text: "" + json.error_registro + "",
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

            	.done(function(data) {
            		console.log("success");

                // var json = JSON.parse(data);
                        Swal.fire({
                          title: 'Muy bien',
                         // text: ""+json.mensaje+"",
                         text: 'Se envío de manera correcta',
                          icon: 'success',
                          showCancelButton: false,
                          confirmButtonColor: '#3085d6',
                          cancelButtonColor: '#d33',
                          confirmButtonText: 'Muy bien!'
                        }).then((result) => { 
                          if (result.value) {
              

                           location.reload();
                            //hasta qui
                          }
                        })
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