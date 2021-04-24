
$(document).on('submit', '#user_form_insert', function(event){  
    event.preventDefault();  

    var usuario = $('#usuario').val();  
    var clavexx = $("#clave").val();
    var clavexx1 = $("#repeat_clave").val();
    var perfil = $("#id_perfil").val();
    var puesto_txt_busqueda = $("#puesto_txt_busqueda").val();
    
    
    // var area_txt_busqueda=$("#area_txt_busqueda").val();

    
    var fecha_ingreso = $("#mdate").val();
    var dnix = $("#dni").val();
    var nombres_completos = $("#nombres_completos").val();
    var apellido_paterno = $("#apellido_paterno_x").val();
    var apellido_materno = $("#apellido_materno").val();
    var emailxx = $("#email").val();
    var sexo = $("#id_genero").val();
    var telefono_movil=$("#celular").val();
    var imagen = $('#input_file').val();  
   


   //Campo Usuario
   if (usuario=='' || usuario.length == 0 || /^\s+$/.test(usuario)) {
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
             title: 'El campo usuario esta vacio'
           })
           $(".register_data").text('Registrar');
         return false;
     }else if(usuario.length<6 || usuario.length>20){
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
             title: 'usuario no puede ser menor a 6 caracteres ni mayor a  20'
           })
           $(".register_data").text('Registrar');
         return false;

     }

     //VALIDACION DE DOS CLAVES IGUALES

     if (clavexx=="" || clavexx==0) {
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
           title: 'Ingrese clave'
         })
         $(".register_data").text('Registrar');
        return false;

      }

      //clave2 

      if (clavexx1=="" || clavexx1==0) {
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
           title: 'Repetir la nueva contraseña'
         })
         $(".register_data").text('Registrar');
        return false;

      }

     if (clavexx != clavexx1) {
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
           title: 'Las contraseñas no son iguales'
         })
         $(".register_data").text('Registrar');
        return false;
      }

      //Validar para que ingrese  perfil

       if( perfil == null || perfil == 0 ) {
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
             title: 'Seleccione Perfil'
           })
           $(".register_data").text('Registrar');
         return false;
       }

   //validacion de puesto

   if (puesto_txt_busqueda=='' || puesto_txt_busqueda.length == 0 || /^\s+$/.test(puesto_txt_busqueda)) {
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
               title: 'Buscar puesto (Presiona "ENTER")'
             })
             $(".register_data").text('Registrar');
         return false;

   }
   //VALIDACION DE AREA

   /*if (area_txt_busqueda=='' || area_txt_busqueda.length == 0 || /^\s+$/.test(area_txt_busqueda)) {
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
               title: 'Buscar Area (Presiona "ENTER")'
             })
         return false;

   }*/

   // validar fecha ingreso
    
   if (fecha_ingreso == null || fecha_ingreso.length == 0 || /^\s+$/.test(fecha_ingreso) ) {
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
             title: 'Ingrese fecha Ingreso'
           })
           $(".register_data").text('Registrar');
     return false;
    
   }
  // varables =  /^(0[1-9]|[12]\d|3[01])\/(0[1-9]|1[0-2])\/(19|20)\d{2}$/.test(fecha);
  
     //validacion de dni 


     if (dnix == null || dnix.length == 0 || /^\s+$/.test(dnix) ) {
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
             title: 'Ingrese DNI y precione Enter'
           })
           $(".register_data").text('Registrar');
     return false;
    }

     /*if( !(/^\d{9}$/.test(dnix)) ) {
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
         title: 'Ingrese DNI valido'
       })
       return false;
     }*/

     //validar campos que estan en reonly


     if (nombres_completos.length =="" ) {
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
             title: 'Ingrese campos vacios, Realiza una busqueda  por DNI'
           })
           $(".register_data").text('Registrar');
           return false;
     }

     //email

     expr = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;

       if ( !expr.test(emailxx) ){
             Swal.fire({
               title: 'E-mail',
               text: "La dirección de correo " + emailxx + " es incorrecta.",
               icon: 'error',
               showCancelButton: false,
               confirmButtonColor: '#3085d6',
               cancelButtonColor: '#d33',
               confirmButtonText: 'ok'
             }).then((result) => {
               if (result.value) {
                 
               }
             })
      $(".register_data").text('Registrar');
         return false;
       }

     //validar sexo

     //Validar para que ingrese  perfil

     if( sexo == null || sexo == 0 ) {
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
             title: 'Seleccione Sexo'
           })
         return false;
       }
   $(".register_data").text('Registrar');
     //celular

     if( !(/^\d{9}$/.test(telefono_movil)) ) {
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
             title: 'Ingrese celular valido'
           })
           $(".register_data").text('Registrar');
       return false;
     }

    $(".register_data").text('Registrando.....');
  
     $.ajax({  
       url:`${window.location.origin}/Mantenimiento/Usuario/Agregar_nuevo/`,  
       method:'POST',  
       data:new FormData(this),  
       contentType:false,  
       processData:false,  
       success:function(data) {  
         console.log("sucess in email");

         Swal.fire({
           title: 'Muy Bien',
           text: 'El usuario ha sido creado, y le hemos enviado sus accesos por correo',
           icon: 'success',
           showCancelButton: false,
           confirmButtonColor: '#3085d6',
           cancelButtonColor: '#d33',
           confirmButtonText: 'OK'
         }).then((result) => {
           if (result.value) {  
             location.href= `${window.location.origin}/Mantenimiento/Trabajador/`;
           }
         })

         $(".bd-example-modal-xl").modal('hide');


         //clear on focus
         $('#usuario').val("");
         $('#picture').val("");
         $(".register_data").text('Registrar');

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
               $('#btnSave_x').html('<i class="fas fa-circle-notch"></i> Reintentar'); //change button text
               $('#btnSave_x').attr('disabled',false);
                 $(".register_data").text('Registrar');
              /* $("#alert").html('<div class="alert alert-success text-center" id="alerta" role="alert">'+json.alerta+'</div>'); */
             }
             
           },
           401: function(xhr){
               var json = JSON.parse(xhr.responseText);
                 Swal.fire(
                   'No se puedo enviar el correo!',
                   ''+json.corereo_error+'',
                   'error'
                 )
                  $(".register_data").text('Registrar');
             
             },
             
           402: function(xhr){
               var json = JSON.parse(xhr.responseText);
                 Swal.fire(
                   'Ingrese Email nuevo!',
                   ''+json.error_email+'',
                   'error'
                 )
                 $(".register_data").text('Registrar');
             
             },
             
           403: function(xhr){
               var json = JSON.parse(xhr.responseText);
                 Swal.fire(
                   'Ingrese Usuario nuevo!',
                   ''+json.error_users+'',
                   'error'
                 )
                 $(".register_data").text('Registrar');
             
             },
             
           404: function(xhr){
               var json = JSON.parse(xhr.responseText);
                 Swal.fire(
                   'Ingrese DNI nuevo!',
                   ''+json.error_dni+'',
                   'error'
                 )
                 $(".register_data").text('Registrar');
             
             },
       error: function(jqXHR, textStatus, errorThrown)
                            {
                  Swal.fire({
                   title: 'Lo siento mucho',
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
         }  


   });  
    
    

});  


























function fileValidatiosn(obj){
    var uploadFile = obj.files[0];

    if (!window.FileReader) {
        alert('El navegador no soporta la lectura de archivos');
        return;
    }

    if (!(/\.(jpg|png|gif|pdf|docx|)$/i).test(uploadFile.name)) {
      Swal.fire({
      title: 'Files',
      text: "El archivo a adjuntar no es una imagen solo acepta jpg|png|gif",
      icon: 'warning',
      showCancelButton: false,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      confirmButtonText: 'ok'
    }).then((result) => {
      if (result.value) {
        $("#input_file").val("");
       // $("#user_image").val("");
      }
    })
       
    }

    var uploadFile = obj.files[0];
    var img = new Image();
    img.onload = function ()
    {
    if (this.width.toFixed(0) != 128 && this.height.toFixed(0) != 128)
    {
      Swal.fire({
      title: 'Files',
      text: "La imagen debe ser de tamaño 128px por 128px.",
      icon: 'warning',
      showCancelButton: false,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      confirmButtonText: 'ok'
    }).then((result) => {
      if (result.value) {
        $("#input_file").val("");
       // $("#user_image").val("");
      }
    })
    }
    };
    img.src = URL.createObjectURL(uploadFile);
    
                                           
}






















$(function(){
    $('.fantasmass').change(function(){
    if(!$(this).prop('checked')){
        $('#dvOcultar').hide();
    }else{
        $('#dvOcultar').show();
    }
  
  })


    $('#checkbox2').change(function(){
      if(!$(this).prop('checked')){
          $("#nombres_completos").attr('readonly', true);
          $("#apellido_paterno_x").attr('readonly', true);
          $("#apellido_materno").attr('readonly', true);  
           $("#nombres_completos").attr('placeholder','');
          $("#apellido_paterno_x").attr('placeholder','');
          $("#apellido_materno").attr('placeholder','');
      }else{
          $("#nombres_completos").attr('readonly', false);
          $("#apellido_paterno_x").attr('readonly', false);
          $("#apellido_materno").attr('readonly', false);
          $("#nombres_completos").attr("placeholder", "Ingrese nombres").val("").focus().blur();
          $("#apellido_paterno_x").attr("placeholder", "Ingrese apellido paterno").val("").focus().blur();
          $("#apellido_materno").attr("placeholder", "Ingrese apellido materno").val("").focus().blur();
      }

      
    
    })

})
             
function soloNumeros(e)
{
   var key = window.Event ? e.which : e.keyCode
    return ((key >= 48 && key <= 57) || (key==8))
}

function sololetras(e) {
      if(e.key.match(/[a-zñçáéíóú\s]/i)===null) {
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
































$(document).on('click', '.btn_actualizar_colaborador', function(event) {
  console.log("emepzando");
    event.preventDefault();

    const perfil_id = document.querySelector(".data-container").dataset.session_perfil;


    // Dando permiso al administrador para que pueda editar lo que necesite
    if(perfil_id == 1) {
      $("#usuario-actualizar").removeAttr("disabled");
      //$("#clave-actualizar").removeAttr("disabled");
      //$("#repeat_clave-actualizar").removeAttr("disabled");
      $("#nombres_completos-actualizar").removeAttr("readonly");
      $("#apellido_paterno_x-actualizar").removeAttr("readonly");
      $("#apellido_materno-actualizar").removeAttr("readonly");
    }

    var user_id = $(this).attr("id"); 
    $.ajax({
      url: `${window.location.origin}/Mantenimiento/Trabajador/Mostrar_datos_para_actualiozar/`,
      type: 'POST',
      dataType: 'json',
      data: {user_id:user_id},
    })

    .done(function(data) {
      console.log("success");

      $(".bd-example-modal-lg").modal('show');
      $("#nombres").text(data.nombre);

      $("#id_usuario").val(data.id_usuario);


      
      $("#apellido_paterno_x-actualizar").val(data.apellido_paterno);
      $("#nombres_completos-actualizar").val(data.nombres);
      $("#apellido_materno-actualizar").val(data.apellido_materno);
      $("#puesto").val(data.puesto);
      $("#correo").val(data.correo);

      //$("#dni").val(data.nro_documento);
      $("#puesto_txt_busqueda").val(data.puesto);
      $("#email").val(data.email);
      
      $("#celular-actualizar").val(data.celular);
      $("#id_genero-actualizar").val(data.id_genero);
      
      $("#mdatexxxxxx").val(data.fecha_ingreso);
      $("#usuario-actualizar").val(data.el_usuario);
      $("#clave-actualizar").val(data.la_clave);
      $("#repeat_clave-actualizar").val(data.la_clave_repeat);
      $("#id_perfil-actualizar").val(data.el_id_perfil);


      


      console.log("success fin");

     
    })

    .fail(function() {
      console.log("error");
    })

    .always(function() {
      console.log("complete");
    });
  });

  //actualizar el estado el emaio el puesto en donde estan trabajando y los demas

  $(document).on('submit', '#evaristoescudero', function(event) {
    event.preventDefault();
    
    // Obteniendo el valor de los inputs
    var puesto = $("#puesto").val();
    var emailxx = $("#correo").val();
    var estado = $("#estado").val();
    var mdatexxxxxxx = $("#mdatexxxxxxx").val();
    let celular_actualizar = $("#celular-actualizar").val();
    let id_perfil_actualizar = $("id_perfil-actualizar").val();
    let usuario_actualizar = $("#usuario-actualizar").val();
    let nueva_clave = $("#clave-actualizar").val();
    let repetir_clave = $("#repeat_clave-actualizar").val();
   
    expr = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;

    if ( !expr.test(emailxx) ){
      Swal.fire({
        position: 'top-end',
        icon: 'warning',
        text: "La dirección de correo " + emailxx + " es incorrecta.",
        showConfirmButton: false,
        timer: 1500
      })
      $("#correo").focus();
      return false;
    }

    if ($('#checkbox2').prop('checked')) {
      if (estado == null || estado.length == 0 || /^\s+$/.test(estado)) {
        Swal.fire(
          'Campo estado ',
          'Seleccione Estado',
          'error'
        )
        return false;
      }
      if (mdatexxxxxxx == null || mdatexxxxxxx.length == 0 || /^\s+$/.test(mdatexxxxxxx)) {
        Swal.fire(
          'Ingrese Fecha ',
          'Fecha de estado vacio',
          'error'
        )
        return false;
      }
    }

    // Registrando los cambios en el servidor 
    $.ajax({
      url:`${window.location.origin}/Mantenimiento/Trabajador/actualizar_area_emaail_puesto/`,
      type: 'POST',
      data:new FormData(this),  
      contentType:false,  
      processData:false,  
    })
    .done(function() {
      console.log("success");

       Swal.fire(
          'Muy Bien!',
          'Se actualizo correctamente!',
          'success'
        )

       $(".bd-example-modal-lg").modal("hide");
    })
    .fail(function() {
      console.log("error");
    })
    .always(function() {
      console.log("complete");
    });
    


  });
    //eliminar pedido sin recargar la pagina web
    
   $(document).on('click', '.delete', function(){  
       var user_id = $(this).attr("Id"); 
       var c_obj = $(this).parents("tr");
     // var c_objee = $("#your_div_id").load("div");
     //  var dataTable = $('#user_data').dataTable(); 
       if(Swal.fire({
          title: '¿Estás seguro?',
          text: "¡No podrás revertir esto!",
          icon: 'warning',
          showCancelButton: true,
          confirmButtonColor: '#3085d6',
          cancelButtonColor: '#d33',
          confirmButtonText: 'Si, eliminar!'
        }).then((result) => {
          if (result.value) {
            $.ajax({  
                 url:`${window.location.origin}/Mantenimiento/Usuario/eliminar_usuario/`,  
                 method:"POST",  
                 data:{user_id:user_id},  
                 success:function(data)  
                 {  
                     c_obj.remove();
                       //$("#example23").load(" #example23");
                      
                     //$('#div_load').load(location.href+" #div_load>*","");

                     table.ajax.reload();  
                 }  
            }); 
            let timerInterval
              Swal.fire({
                title: 'eliminado',
                html: 'Se esta eliminando <b></b> paciencia.',
                timer: 2000,
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
          }
        }))

      {  
            
       }  
       else  
       {  
          return false;       
       }  
  });  


















/*
Carga masiva de datos
*/

  $(document).ready(function() {

    $(document).on('click', '.ficha_personal', function(){ 
     $("#modal_ficha_personal").modal('show');
   });


    $(document).on('click', '.cargar_modal_hora', function(event) {
      event.preventDefault();
      /* Act on the event */

      var user_id = $(this).attr("Id"); 
     $.ajax({
       url: `${window.location.origin}/Mantenimiento/Trabajador/ultimo_acceso/`,
       type: 'POST',
       dataType: 'json',
       data: {user_id: user_id},
     })
     .done(function(data) {
       console.log("success");
       if (data.fecha_ingreso_sistema=="0000-00-00 00:00:00" || data.fecha_ingreso_sistema==null) {
        horas_view = 'Aun no ingreso al sistema';
       }else{
        horas_view = data.fecha_ingreso_sistema; 
       }
        Swal.fire({
          title: '<strong>Ultimo Ingreso a <u>Intranet</u></strong>',
          icon: 'info',
          html:
            `Colaborador: <b>${data.nombres}</b>,<br/>  <a href="${window.location.origin}">Intranet | Innomedic</a> <br/>   <b>Fecha ingreso</b>: ${horas_view}`,
          showCloseButton: true,
          showCancelButton: true,
          focusConfirm: false,
          confirmButtonText:
            '<i class="fa fa-thumbs-up"></i> Great!',
          confirmButtonAriaLabel: 'Thumbs up, great!',
          cancelButtonText:
            '<i class="fa fa-thumbs-down"></i>',
          cancelButtonAriaLabel: 'Thumbs down'
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



  /*
  Se activa cuando se da click a descargar, descarga la informacion personal en pdf
  */
  function descargarInformacion(id) {
    window.location = `${window.location.origin}/View_intranet/Ficha_personal/descargarInformacion/${id}`;

  }

  console.log("externos final bien");