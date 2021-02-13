
              <!-- ============================================================== -->
                <!-- End Bread crumb and right sidebar toggle -->
                <!-- ============================================================== -->
                <!-- ============================================================== -->
                <!-- Start Page Content -->
                <!-- ============================================================== -->

                <?php $queryx = $this->db->query("select Id,imagen,nombres, CONCAT(nombres,' ', apellido_paterno,' ', apellido_materno) AS nombres,
                 
                    CASE
                        WHEN id_genero = 1 THEN 'varon.png'
                        WHEN id_genero = 2 THEN 'mujer.png'
                        WHEN id_genero = 3 THEN 'medio.png'
                        ELSE 'distinto.png'
                    END as id_otros
                 from ts_datos_personales as t where id_usuario=".$this->session->userdata("session_id")."");
                foreach ($queryx->result() as $xx) {
                   $nombres_completosxx = $xx->nombres;
                   $nombres = $xx->nombres;
                   $imagen = $xx->imagen;
                   $id_otrosx = $xx->id_otros;
                 } ?>

                <?php if ($this->session->userdata("session_perfil")==36) {?>
                  <div class="row post-center">
                    <div class="col-md-6">
                        <div class="card" >
                            <div class="card-body">
                                <div class="sidebar-nav">
                                  <!-- Display status message -->
                                        <!-- Display status message -->
                                      <ul id="sidebarnav_id" style=" text-decoration: none;">
                                        <li class="user-pro"> <a class="waves-effect waves-dark" href="javascript:void(0)" ><?php if ($imagen=="") {?>
                                         <img src="<?php echo base_url()."upload/";?>images/<?php  echo $id_otrosx;?>" alt="user-img" class="img-circle">
                                       <?php  }else{?>
                                          <img src="<?php echo base_url()."upload/";?>images/<?php  echo $imagen;?>" alt="user-img" class="img-circle">
                                       <?php } ?><span class="hide-menu"><?php echo $nombres_completosxx; ?></span></a> 

                                        </li>

                                        
                                      
                                        <div class="card card-body">
                                          <form action="#" id="data_registrar">
                                              <input type="hidden" name="imagen_users" id="imagen_users" value="<?php echo $imagen;?>">
                                              <input type="hidden" name="nombres" id="nombres" value="<?php echo $nombres_completosxx;?>">
                                              <input type="hidden" name="id_usuarios" id="id_usuarios" id="id_usuarios" value="<?php echo $this->session->userdata("session_id");?>">
                                              <label for="">  <span>¿Qué estás pensando, <?php echo $nombres;?>?</span>
                                               </label>
                                             <div class="summernote">
                                                <div>Escribe aquí tu mensaje.......</div>
                                            </div>
                                         
                                            <div class=" text-right m-2">
                                                <button type="submit" class=" btn btn-rounded btn-outline-success"><i class=" fas fa-sign-out-alt">&nbsp;</i>Publicar</button>
                                            </div>
                                            </form>
                                         
                                            
                                        </div>
                                       
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>   
                </div>
                  <!--<textarea id="mymce" name="title"></textarea>-->
                <?php }else if($this->session->userdata("session_perfil")==1){?>

                  <div class="row post-center">
                    <div class="col-md-6">
                        <div class="card">
                            <div class="card-body">
                                <div class="sidebar-nav">
                                  <!-- Display status message -->
                                        <!-- Display status message -->
                                      <ul id="sidebarnav_id" style=" text-decoration: none;">
                                        <li class="user-pro"> <a class="waves-effect waves-dark" href="javascript:void(0)" ><?php if ($imagen=="") {?>
                                         <img src="<?php echo base_url()."upload/";?>images/<?php  echo $id_otrosx;?>" alt="user-img" class="img-circle">
                                       <?php  }else{?>
                                          <img src="<?php echo base_url()."upload/";?>images/<?php  echo $imagen;?>" alt="user-img" class="img-circle">
                                       <?php } ?><span class="hide-menu"><?php echo $nombres_completosxx; ?></span></a>   
                                        </li>
                                        <form action="#" id="data_registrar_xxx">
                                          <input type="hidden" name="imagen_users" value="<?php echo $imagen;?>">
                                          <input type="hidden" name="nombres" value="<?php echo $nombres_completosxx;?>">
                                          <input type="hidden" name="id_usuarios" id="id_usuarios" value="<?php echo $this->session->userdata("session_id");?>">
                                        <textarea name="title" id="pensando" class="form-control" cols="30" rows="5" placeholder="¿Qué estás pensando, <?php echo $nombres;?>?"></textarea>
                                        <li class="user-pro"> <a class="text-success" href="javascript:void(0)" ><i class="fas fa-file-image"></i><!--<span class="hide-menu">&nbsp;Foto/Video/Archivo&nbsp; <input type="file" name="images[]" class="form-control" multiple></span>--><span class="hide-menu">&nbsp;Foto/Video/Archivo&nbsp; <input type="file" name="images" id="archivo_file" class="form-control" onchange="fileValidatiosn(this);" ></span>
                                        </li>
                                        <div class="text-right">
                                          <button class="btn btn-primary  mostrar" type="button" style="display: none;">
                                          <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
                                          <span class="">Loading...</span>
                                        </button>
                                        <button type="submit" class=" btn btn-rounded btn-outline-success cambio"><i class=" fas fa-sign-out-alt">&nbsp;</i>Publicar</button>

                                        </div>
                                        </form>


               
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>  

                </div>
                  
                <?php } ?>






               
          
                


                <div class="row post-center">
                    <div class="col-md-6 col-sm-6 col-lg-6  ">
                        <div class="card">
                            <div class="card-body" id="cargar_resulktado_xxx" style="color: #000000;">

                            </div>
                        </div>
                    </div>
                    <!--<div class="col-md-3 ocultar-div " >
                        <div class="card m-1" ><br>
                           <div class="text-center">&nbsp;<input style="width: 90%;" type="text" class="btn-rounded  btn-md"  id="myInput" name="descripcion" placeholder="Buscar Contacto"></div>
                          
                          <div class="card-body modal-body lista_resultados_xx" id="lista_data_result_xx">
                            
                          </div>
                         
                      </div>
                    </div>-->
                </div>

                <style>
                  @media screen and (max-width: 937px) {
                    .ocultar-div{
                    display:none;
                    }
                    }

                   
                /*  .modal-body{
                    height: 1000px;
                    width: 100%;
                    overflow-y: auto;
                    position: static;
                  }*/

                 .imagenes {
                    width: 650px;
                    max-width: 100%;
                    height: auto;
                  }
                  span .color_negro p{
                    color:#000000;
                  }

                  

                </style>


                <!-- ============================================================== -->
                <!-- End PAge Content -->
                <!-- ============================================================== -->
                <!-- ============================================================== -->
                <!-- Right sidebar -->
                <!-- ============================================================== -->
                <!-- .right-sidebar -->


                <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script> 

                <script>   
                    $(document).on('submit', '#data_registrar', function(event){  
                         event.preventDefault();  
                         var title = $('.summernote').summernote('code');
                         var imagen_users = $('#imagen_users').val();
                         var id_usuarios = $('#id_usuarios').val();

                         var nombres = $('#nombres').val();
                         var imagen_users = $('#imagen_users').val();

                          //
                          if (title == null || title.length == 0 || /^\s+$/.test(title) ) {
                                Swal.fire({
                                  title: 'warning',
                                  text: "Intentalo Nuevamente, Y ingrese imagen o texto, video, etc a publicar.",
                                  icon: 'warning',
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

                      
                     // var title = $('.summernote').summernote('code')
                       
                      $.ajax({
                        url: '<?php echo base_url().'Intranet_view/subir_multiples/'?>',
                        type: 'POST',
                    
                       // dataType: 'default: Intelligent Guess (Other values: xml, json, script, or html)',
                        data: {imagen_users:imagen_users,title:title,id_usuarios:id_usuarios,nombres:nombres,imagen_users,imagen_users},
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
                            title: 'Muy Bien ◉‿◉',
                            text: "Se publico de Manera Correcta",
                            icon: 'success',
                            showCancelButton: false,
                            confirmButtonColor: '#3085d6',
                            cancelButtonColor: '#d33',
                            confirmButtonText: 'Gracias ◉‿◉!'
                          }).then((result) => {
                            if (result.value) {

                               cargar_comentarios();
                              $('#data_registrar')[0].reset();
                              $("#click").show(1000);
                              $("#collapseExample").hide(2000);
                            }
                          })
                      })
                      .fail(function() {
                        console.log("error");
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
                      })
                      .always(function() {
                        console.log("complete");
                      });
                      
                          

                     /* $.ajax({  
                           url:"<?php echo base_url().'Intranet_view/subir_multiples/'?>",  
                           method:'POST',  
                           data:new FormData(this),  
                           contentType:false,  
                           processData:false, 
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
                           success:function(data)  
                           {  
                           // var json = JSON.parse(data);
                              Swal.fire({
                                title: 'Muy Bien ◉‿◉',
                                text: "Se publico de Manera Correcta",
                                icon: 'success',
                                showCancelButton: false,
                                confirmButtonColor: '#3085d6',
                                cancelButtonColor: '#d33',
                                confirmButtonText: 'Gracias ◉‿◉!'
                              }).then((result) => {
                                if (result.value) {

                                   cargar_comentarios();
                                  $('#data_registrar')[0].reset();
                                  $("#click").show(1000);
                                  $("#collapseExample").hide(2000);
                                }
                              })

                            //$('#div_load').load(location.href+" #div_load>*","");
                             
                            
                             
                           },error: function()
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
                        
                      });  */
                    });  
                </script> 

                <!--es para otors usurios-->
                <script>   
                    $(document).on('submit', '#data_registrar_xxx', function(event){  
                         event.preventDefault();  
                         var mymce = $("#pensando").val();
                       
                         $(".mostrar").show();
                           $(".cambio").hide();

                          //
                          if (mymce == null || mymce.length == 0 || /^\s+$/.test(mymce) ) {
                                Swal.fire({
                                  title: 'warning',
                                  text: "Intentalo Nuevamente, Y ingrese imagen o texto, video, etc a publicar.",
                                  icon: 'warning',
                                  showCancelButton: false,
                                  confirmButtonColor: '#3085d6',
                                  cancelButtonColor: '#d33',
                                  confirmButtonText: 'ok'
                                }).then((result) => {
                                  if (result.value) {
                                     $(".mostrar").hide();
                                      $(".cambio").show();
                                    
                                  }
                                })
                            return false;
                          }
                          

                      $.ajax({  
                           url:"<?php echo base_url().'Intranet_view/subir_multiples/'?>",  
                           method:'POST',  
                           data:new FormData(this),  
                           contentType:false,  
                           processData:false,  
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
                                            $(".mostrar").hide();
                                      $(".cambio").show();
                                          }
                                      })


                                  }

                              }
                          },
                          success:function(data)  
                           {  
                           //var json = JSON.parse(data);
                              Swal.fire({
                                title: 'Muy Bien ◉‿◉',
                                text: "Se publico de Manera Correcta",
                                icon: 'success',
                                showCancelButton: false,
                                confirmButtonColor: '#3085d6',
                                cancelButtonColor: '#d33',
                                confirmButtonText: 'Gracias ◉‿◉!'
                              }).then((result) => {
                                if (result.value) {

                                   cargar_comentarios();
                                    $('#data_registrar_xxx')[0].reset();
                                     $(".cambio").show();
                                     $(".mostrar").hide();
                                   
                                }
                              })
                            //$('#div_load').load(location.href+" #div_load>*","");
                            
                             
                            
                             
                           },error: function()
                                         {
                               Swal.fire({
                                title: 'Lo siento mucho (︶︿︶)',
                                text: "Algo paso con el sistema Vuelva a intentar una vez mas",
                                icon: 'warning',
                                showCancelButton: false,
                                confirmButtonColor: '#3085d6',
                                cancelButtonColor: '#d33',
                                confirmButtonText: 'Ok!(︶︿︶)!'
                              }).then((result) => {
                                if (result.value) {
                                 
                                }
                              })
                          }
                        
                      });  
                    });  
                </script> 

      

                <script type="text/javascript">

                        function cargar_comentarios() {


                            $.ajax({
                            url: "<?php echo base_url().'Intranet_view/Cargar_comentarioas/';?>",
                            method:"POST",
                            contentType:false,
                            processData:false,
                            success:function(data){
                                var resultado = JSON.parse(data);
                                var contenido = '';
                                $.each(resultado, function(index, value) {

                                let str = value.img_post; 
                                     // '(-3): hij'
                                let cadena = str.substr(-3);
                                //let extension = substr(value.img_post -3);
                               // let imagen_post
                                

                                if (cadena == 'mp4') {
                                  imagen_post = `<div class="embed-responsive embed-responsive-16by9">
                                            <!--<iframe  class="embed-responsive-item" src="<?php echo base_url().'upload/';?>archivos/`+value.img_post+`?rel=0&amp;controls=0&amp;showinfo=0&amp;autoplay=0" allowfullscreen></iframe>-->
                                            <video class="video-fluid z-depth-1" loop controls muted>
                                                <source src="<?php echo base_url().'upload/';?>archivos/`+value.img_post+`" type="video/mp4" />
                                              </video>
                                          </div>
                                          `
                                }else if(cadena == 'mp3' ){
                                  imagen_post = `<div class="card-body text-center">
                                  <div class="view">
                                      <img style="width:30%;" class="" src="<?php echo base_url().'upload/';?>audio/sonido.png?v=<?php echo rand(); ?>"
                                        alt="Card image cap">
                                      
                                    </div>
                                    <br />  
                                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12  embed-responsive embed-responsive-4by3">
                                    <h1> &nbsp;</h1>

                                        <audio controls class="embed-responsive-item">
                                            <source src="<?php echo base_url().'upload/';?>archivos/`+value.img_post+`">
                                        </audio>
                                    </div>

                                  </div>`
                                }else if(cadena == "jpg" || cadena == "png" || cadena == "svg" || cadena == "gif"){
                                   imagen_post = `<a href="javascript:void(0);" id="`+value.Id+`"><img class="imagenes" src="<?php echo base_url().'upload/';?>archivos/`+value.img_post+`" alt="" class="img-fluid img-thumbnail"></a> <br><br/>`
                                }else{
                                    imagen_post = `<a target="_blank" href="<?php echo base_url().'upload/';?>archivos/`+value.img_post+`" id="`+value.Id+`"><i class="fas fa-eye"> </i>Ver archivo</a> <a download href="<?php echo base_url().'upload/';?>archivos/`+value.img_post+`" id="`+value.Id+`"><i class="fas fa-download"> </i>Descargar</a> <br><br/><br>`
                                }


                                 let variable
                                  if (value.imagen_users=="" || value.imagen_users==null ) {
                                    variable ="foto.png"
                                  }else{
                                    variable = ""+value.imagen_users+""
                                  }

                                  if (value.img_post=="" || value.img_post==null) {
                                    imagen_post = ``
                                  }
                                  

                                /*  let imagen_post
                                  if (value.img_post=="" || value.img_post==null) {
                                    imagen_post = ``
                                  }else{
                                    imagen_post = `<a href="javascript:void(0);" id="`+value.Id+`"><img src="<?php echo base_url().'upload/';?>archivos/`+value.img_post+`" alt="" class="img-fluid img-thumbnail" width="600" height="600"></a> <br><br/>`
                                  }*/
                                  /*<div align="center" class="embed-responsive embed-responsive-16by9">
                                        <video autoplay loop class="embed-responsive-item">
                                            <source src="<?php echo base_url().'upload/';?>archivos/`+value.img_post+`" type="video/mp4">
                                        </video>
                                    </div>*/
                                  


                                  contenido += `
                                
                                    <div id="item-` + value.Id +`"><div class="sidebar-nav">
                                      <ul id="sidebarnav_id" style=" text-decoration: none;">
                                        <li class="user-pro"> <a class="waves-effect waves-dark" href="javascript:void(0)" ><img src="<?php echo base_url().'upload/';?>images/`+variable+`" alt="img users" class="img-circle"><span class="hide-menu">`+value.nombres_completosxx+`</span> <span class="label label-success">Fecha de Publicación&nbsp;&nbsp;`+value.created+`</span></a>   
                                        </li>
                                      </ul>
                                    </div>
                                   
                                    <span class="color_negro"><p class="h4 cambios_reailizados text-dark text-justify" style="color: #000000;">`+value.descripcion+`</p></span>
                                    <div class="text-center">
                                        `+imagen_post+`
                                        <a class="mytooltip btn-success btn agregar text-white" href="javascript:void(0)" id="`+value.Id+`" > <i class="far fa-hand-point-right"></i><span class="tooltip-content5"><span class="tooltip-text3"><span class="tooltip-inner2">Hola <?php echo $this->session->userdata("nombre");?>!<br /> Hay <b id="resultados_x">`+value.megusta+`</b> Me gustas.</span></span></span></a>
                                        <!--<a class="mytooltip btn-info btn caritas text-white" href="javascript:void(0)" id="`+value.Id+`" > <i class="far fa-frown"></i><span class="tooltip-content5"><span class="tooltip-text3"><span class="tooltip-inner2">Hola <?php echo $this->session->userdata("nombre");?>!<br />  Hay <b id="resultados_xx">`+value.triste+`</b> una carita triste</span></span></span></a>
                                        <a class="mytooltip btn-danger btn ignorados text-white" href="javascript:void(0)" id="`+value.Id+`" > <i class="far fa-hand-point-down "></i><span class="tooltip-content5"><span class="tooltip-text3"><span class="tooltip-inner2">Hola <?php echo $this->session->userdata("nombre");?>!<br />  Hay <b id="resultados_xxx">`+value.ignorados+`</b> Ignorados.</span></span></span></a>-->
                                    </div>
                                    <?php if ($this->session->userdata("session_perfil")==36 || $this->session->userdata("session_perfil")==1) {?>
                                      <div class="row">
                                       <div class="col-md-12">
                                       <br><br/>
                                          <a class="btn-outline-success btn "  id="`+value.Id+`" href="javascript:void(0)"><i class="fas fa-eye"></i></a>
                                          <a class="btn-outline-primary btn "  id="`+value.Id+`" href="javascript:void(0)"><i class="fas fa-edit"></i></a>
                                          <a class="btn-outline-danger btn " onclick='eliminarPost("`+ value.Id + `")' id="`+value.Id+`" href="javascript:void(0)"><i class="fas fa-window-close"></i></a>
                                       </div>
                                    </div>

                                    <?php } ?>
                                   <hr>
                                   <br>
                                   <br></div>
                                   
                                `;
                                });
                                $("#cargar_resulktado_xxx").html(contenido);
                            },
                      complete: function() { 
                  /* solo una vez que la petición se completa (success o no success) 
                     pedimos una nueva petición en 3 segundos */
                        /* setTimeout(function(){
                           cargar_comentarios();
                         }, 3000);*/
                        }
                      });
                        };

                        $(function() {
                            cargar_comentarios();
                        });
                        
                </script>
                <script>
                  $("#audioplayer").click(function(event) {
                    /* Act on the event */

                    $("#music")[0].play();
                  });
                </script>
                  


                <script>
                  $(document).ready(function() {
                    $("#click").click(function(event) {
                      $("#click").hide(1000);
                      $("#collapseExample").show(2000);
                    });
                  });
                </script>
 
                <script>
            function fileValidatiosn(obj){
                var uploadFile = obj.files[0];

                if (!window.FileReader) {
                    alert('El navegador no soporta la lectura de archivos');
                    return;
                }
                /*docx|docm|dotx|dotm|odt*/

                if (!(/\.(jpg|png|gif|pdf|MP3|MP4|AVI|3GP|FLV|doc|docm|docx|dot|dotm|dotx|htm|html|odt|csv|txt|xls|xlsm|xlsx|xps|bmp|emf|odp|ppt|pptx|)$/i).test(uploadFile.name)) {
                  Swal.fire({
                  title: 'Files',
                  text: "Solo acepta archivos con las siguientes extensiones jpg|png|gif|mp4",
                  icon: 'warning',
                  showCancelButton: false,
                  confirmButtonColor: '#3085d6',
                  cancelButtonColor: '#d33',
                  confirmButtonText: 'ok'
                }).then((result) => {
                  if (result.value) {
                    $("#archivo_file").val("");
                   // $("#user_image").val("");
                  }
                })
                   
                }

                var uploadFile = obj.files[0];
                var img = new Image();
                img.onload = function ()
                {
                /*if (this.width.toFixed(0) != 600 && this.height.toFixed(0) != 600)
                if (this.width.toFixed(0) != 100 && this.height.toFixed(0) != 1000)
                {
                  Swal.fire({
                  title: 'Files',
                  text: "La imagen debe ser de tamaño 600px por 600px.",
                  icon: 'warning',
                  showCancelButton: false,
                  confirmButtonColor: '#3085d6',
                  cancelButtonColor: '#d33',
                  confirmButtonText: 'ok'
                }).then((result) => {
                  if (result.value) {
                    $("#archivo").val("");
                   // $("#user_image").val("");
                  }
                })

              
                }*/
                };
                img.src = URL.createObjectURL(uploadFile);
                
                                                       
            }
        </script>

          <script type="text/javascript">

      // //obtener la lista de usuarios conectados al sistema
        function connected_xx() {
            $.ajax({
            url: "<?php echo base_url().'Intranet/obtener_lista_usuarios_connect/';?>",
            method:"POST",
            contentType:false,
            processData:false,
            success:function(data){
                var resultado = JSON.parse(data);
                var contenido = '';
                

                $.each(resultado, function(index, value) {
                  let variable
                  if (value.imagen=="" || value.imagen==null ) {
                    variable ="foto.png"
                  }else{
                    variable = ""+value.imagen+""
                  }
                    contenido += `<div class="blog-inner">
                    <ul style="text-decoration: none;"><li style="list-style:none;" >
                                    <a class="text-dark" href="javascript:void(0)" id="data_registrarxxxxxxx"><img src="<?php echo base_url().'upload/';?>images/`+variable+`" alt="user-img" class="img-circle " style="width:50px; height:50px; color:#000000;" > <span>`+value.nombres+`&nbsp;&nbsp;<br/><small class="`+value.color+`">`+value.conec+`</small></span></a>
                                </li></ul>
                    </div>
                    `;
                });

                $("#lista_data_result_xx").html(contenido);
            },
            complete: function() { 
        /* solo una vez que la petición se completa (success o no success) 
           pedimos una nueva petición en 3 segundos */
               setTimeout(function(){
                 connected_xx();
               }, 10000);
              }
        })
        };

        $(function() {
            connected_xx();
        });
        
    </script>

    <script>
      $(document).ready(function() {
        $(document).on('click', '.agregar', function(event) {
          event.preventDefault();
          var user_id = $(this).attr("id"); 
          $.ajax({
            url: '<?php echo base_url().'Intranet_view/Cargar_me_gusta/';?>',
            type: 'POST',
            data: {user_id:user_id},
          })
          .done(function() {
            console.log("success");
            cargar_comentarios();
          })
          .fail(function() {
            console.log("error");
          })
          .always(function() {
            console.log("complete");
          });
          
        });

        //ver el triste

        $(document).on('click', '.caritas', function(event) {
          event.preventDefault();
          /* Act on the event */
          var user_id = $(this).attr("id"); 
          $.ajax({
            url: '<?php echo base_url().'Intranet_view/Cargar_me_triste/';?>',
            type: 'POST',
            data: {user_id:user_id},
          })
          .done(function() {
            console.log("success");
            cargar_comentarios();
          })
          .fail(function() {
            console.log("error");
          })
          .always(function() {
            console.log("complete");
          });
          
        });

        //ignorados

        $(document).on('click', '.ignorados', function(event) {
          event.preventDefault();
          /* Act on the event */
          var user_id = $(this).attr("id"); 
          $.ajax({
            url: '<?php echo base_url().'Intranet_view/Cargar_me_ignorados/';?>',
            type: 'POST',
            data: {user_id:user_id},
          })
          .done(function() {
            console.log("success");
            cargar_comentarios();
          })
          .fail(function() {
            console.log("error");
          })
          .always(function() {
            console.log("complete");
          });
          
        });

        $(document).on('click', '#data_registrarxxxxxxx', function(event) {
          event.preventDefault();
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
          icon: 'info',
          title: 'Verificamos en el sistema, que aun no esta disponible'
        })
        });


      });

      $("#myInput").on("keyup", function() {
        var value = $(this).val().toLowerCase();
        $("#lista_data_result_xx .blog-inner").filter(function() {
          $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
        });
      });



     /* function sendRequest(){
        $.ajax({
          url: "<?php echo base_url().'Intranet_view/cantidad_registro/';?>",
          success:
          function(result){ 
      /* si es success mostramos resultados *
             $('#results').text(result);
          },
          complete: function() { 
      /* solo una vez que la petición se completa (success o no success) 
         pedimos una nueva petición en 3 segundos *
             setTimeout(function(){
               sendRequest();
             }, 3000);
            }
          });
        };

      /* primera petición que echa a andar la maquinaria *
      $(function() {
          sendRequest();
      });*/

      /*
      Esta funcion elimina el post en el servideory cliente. No verifica si el proceso se cumplio en el servidor, por mejorar
      */
      function eliminarPost(id) {

        $.ajax({
            url: '<?php echo base_url().'Intranet_view/eliminarPost/';?>',
            type: 'POST',
            data: {post_id:id},
          })
          .done(function() {
            console.log("success");
            let item_name = "item-" + id;
            document.getElementById(item_name).remove();
          })
          .fail(function() {
            console.log("error");
          })
          .always(function() {
            console.log("complete");
          });

      }
    </script>

    <style>
      
      @media screen and (max-width: 996px) {
        iframe{
        width: 100%;
        height: 100%;
      }
      img{
        width: 100%;
        height: auto;
        }
      }

      .post-center {
        display: flex;
        justify-content: center;
      }
    </style>


    
  






                  






          