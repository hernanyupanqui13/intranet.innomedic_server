/*************Combo**************
(function( $ ) {
    $.widget( "custom.combobox", {
      _create: function() {
        this.wrapper = $( "<span>" )
          .addClass( "custom-combobox" )
          .insertAfter( this.element );
 
        this.element.hide();
        this._createAutocomplete();
        this._createShowAllButton();
      },
 
      _createAutocomplete: function() {
        var selected = this.element.children( ":selected" ),
          value = selected.val() ? selected.text() : "";
 
        this.input = $( "<input>" )
          .appendTo( this.wrapper )
          .val( value )
          .attr( "title", "" )
          .addClass( "custom-combobox-input ui-widget ui-widget-content ui-state-default ui-corner-left" )
          .autocomplete({
            delay: 0,
            minLength: 0,
            source: $.proxy( this, "_source" )
          })
          .tooltip({
            tooltipClass: "ui-state-highlight"
          });
 
        this._on( this.input, {
          autocompleteselect: function( event, ui ) {
            ui.item.option.selected = true;
            this._trigger( "select", event, {
              item: ui.item.option
            });
          },
 
          autocompletechange: "_removeIfInvalid"
        });
      },
 
      _createShowAllButton: function() {
        var input = this.input,
          wasOpen = false;
 
        $( "<a>" )
          .attr( "tabIndex", -1 )
          .attr( "title", "Mostrar Todos los Registros" )
          .tooltip()
          .appendTo( this.wrapper )
          .button({
            icons: {
              primary: "ui-icon-triangle-1-s"
            },
            text: false
          })
          .removeClass( "ui-corner-all" )
          .addClass( "custom-combobox-toggle ui-corner-right" )
          .mousedown(function() {
            wasOpen = input.autocomplete( "widget" ).is( ":visible" );
          })
          .click(function() {
            input.focus();
 
            // Close if already visible
            if ( wasOpen ) {
              return;
            }
 
            // Pass empty string as value to search for, displaying all results
            input.autocomplete( "search", "" );
          });
      },
 
      _source: function( request, response ) {
        var matcher = new RegExp( $.ui.autocomplete.escapeRegex(request.term), "i" );
        response( this.element.children( "option" ).map(function() {
          var text = $( this ).text();
          if ( this.value && ( !request.term || matcher.test(text) ) )
            return {
              label: text,
              value: text,
              option: this
            };
        }) );
      },
 
      _removeIfInvalid: function( event, ui ) {
 
        // Selected an item, nothing to do
        if ( ui.item ) {
          return;
        }
 
        // Search for a match (case-insensitive)
        var value = this.input.val(),
          valueLowerCase = value.toLowerCase(),
          valid = false;
        this.element.children( "option" ).each(function() {
          if ( $( this ).text().toLowerCase() === valueLowerCase ) {
            this.selected = valid = true;
            return false;
          }
        });
 
        // Found a match, nothing to do
        if ( valid ) {
          return;
        }
 
        // Remove invalid value
        this.input
          //.val( "" )
          //.attr( "title", value + " No Coincide con Ningun Registro de la lista" )
          //.tooltip( "open" );
        this.element.val( "" );
        this._delay(function() {
          this.input.tooltip( "close" ).attr( "title", "" );
        }, 2500 );
        this.input.data( "ui-autocomplete" ).term = "";
      },
 
      _destroy: function() {
        this.wrapper.remove();
        this.element.show();
      }
    });
  })( jQuery );

/********FIN COMBO************/

function asigna_nombre(nombre)
{	
posicion = nombre.lastIndexOf('\\');
nombre=nombre.substring(posicion+1,nombre.length);
document.form.descripcion.value=nombre;

}

function funcionclick(nombre,valor)
{
var elementos = document.getElementsByName(nombre);
 
for(var i=0; i<elementos.length; i++) {
     if(elementos[i].checked==true) {elementos[i].checked=false;}
  }

}
// onDblClick="if(document.getElementById(this.name).value==this.value){document.getElementById(this.name).checked=false;}"

function asignarradio()
{
	$("input[type='radio']").on('dblclick',function(){
		$(this).removeAttr("checked");
	});
}

function redondea(sVal, nDec){ 
    var n = parseFloat(sVal); 
    var s = "0.00"; 
    if (!isNaN(n)){ 
     n = Math.round(n * Math.pow(10, nDec)) / Math.pow(10, nDec); 
     s = String(n); 
     s += (s.indexOf(".") == -1? ".": "") + String(Math.pow(10, nDec)).substr(1); 
     s = s.substr(0, s.indexOf(".") + nDec + 1); 
    } 
    return s; 
   }

function buscaraperturas(pagina) 
{
	idcajon=document.form.idcajon.value;
	document.location=pagina+"?idcajon="+idcajon;
}


function entero()
{
	var e_k = event.keyCode;
	if (e_k > 33 && e_k < 48 || e_k > 57)
	{
		event.returnValue = false;
	}
}

function decimales()
{
	var code
	code = window.event.keyCode
	if (((code>=48)&&(code<=57))||(code==46)||(code==45)){
		window.event.keyCode = code
	}else{
		window.event.keyCode = ""
	}
}

function mensaje_agregar(msg)
{
	alert(msg);
}

function muestrachk_control(indi){
	
	$(".clasfechacita").datepicker({ 
		changeYear: true,
		changeMonth: true
	});

	var check=$("input[name=chk"+indi+"]:checked").val();
 
	if(check=='on'){
 		$("#div_chk"+indi).css({'visibility':'visible'});
	}else{
 		$("#div_chk"+indi).css({'visibility':'hidden'});
	}	
}
function nuevodistrito()
{ 
			if(document.form.nueva2.checked==true)
			{
			document.form.nueva.value='N';	
			}
			else
			{
			document.form.nueva.value='C';
			}
			
}


function checkcita()
{
	var text=""; var mensaje="";
	
	text=this.form.idtipo.value;
	if(text==1)
	{	text=this.form.idusuario.value; if(1 > text.length)
		{mensaje += "Seleccione Doctor"+ "\n";}
	}
	text=this.form.horaini.value; if(1 > text.length)
		{mensaje += "Seleccione Hora"+ "\n";}
	text=this.form.apellidosnombres.value; if(1 > text.length)
		{mensaje += "Ingrese Paciente"+ "\n";}
	text=this.form.idprocedimiento.value; if(1 > text.length)
		{mensaje += "Seleccione Procedimiento"+ "\n";}
		
	if (mensaje.length>0) 
	{alert(mensaje); return false;}
	else {return true;}
}

function buscarcitas() 
{
	idusuario=document.form.idusuario.value;
	fecha=document.form.fecha.value;
	idtipo=document.form.idtipo.value;
	document.location="buscarcita.php?idusuario="+idusuario+"&fecha="+fecha+"&idtipo="+idtipo;
}

function postergar_cita(editar){ 
			if(editar!='')
			{
			idestado = document.form.idestado.value;
			if (idestado!=3)
				{  var objeto=document.getElementById('val');
				   objeto.style.visibility='hidden';
				}
			else { var objeto=document.getElementById('val');
				  objeto.style.visibility='visible';
				}
			}
		}	

function abrirventanapaciente(filas,links)
{ 
  miPopup3 = window.open("popuppaciente.php?filas="+filas+"&links="+links+"","Pacientes","width=450,height=350,scrollbars=yes") 
  miPopup3.focus() 
}

function limpiaformulario(pagina)
{
	 document.location =pagina;
}

function calculobmi()
{ 
  peso=document.form.fpeso.value*1; 
  altura=document.form.faltura.value*1; 
  bmi=Math.round((peso/(altura*altura)),2)*1;//
 // if(!isNaN(bmi)){bmi=0;}
 if((bmi=='Infinity')||((peso=='')&&(altura==''))){bmi=0;}
  document.form.bmi.value=bmi;        
}
function calcularbmi(fpeso,faltura,fimc)
{ 
  peso=document.getElementById(fpeso).value*1; 
  altura=document.getElementById(faltura).value*1; 
  bmi=redondea((peso/(altura*altura)),2)*1;//
 // if(!isNaN(bmi)){bmi=0;}
 if((bmi=='Infinity')||(bmi=='NaN')||((peso=='')||(altura==''))){bmi=0;}
  document.getElementById(fimc).value=bmi;        
}
function calcularimc(fpeso,faltura,fimc)
{ 
  peso=document.getElementById(fpeso).value*1; 
  altura=document.getElementById(faltura).value*1;
  altura=altura/100;
  bmi=redondea((peso/(altura*altura)),2)*1;
  //
 // if(!isNaN(bmi)){bmi=0;}
 if((bmi=='Infinity')||(bmi=='NaN')||((peso=='')||(altura==''))){bmi=0;}
  document.getElementById(fimc).value=bmi;        
}

function calcularicc(cintura,cadera,icc)
{ 
  peso=document.getElementById(cintura).value*1; 
  altura=document.getElementById(cadera).value*1; 
  bmi=redondea((peso/altura),2)*1;//
 // if(!isNaN(bmi)){bmi=0;}
 if((bmi=='Infinity')||(bmi=='NaN')||((peso=='')||(altura==''))){bmi=0;}
  document.getElementById(icc).value=bmi;        
}


function cargaimagen(img,obj) {
         //alert(obj.value);
         img.src ="file://" + obj.value;

}


function abrirventanacita()
{ 
   
  miPopup4 = window.open("../../Citas/Cita/buscarcita.php","Citas","width=1000,left=20,top=30,height=650,scrollbars=yes") 
  miPopup4.focus() 
}

function areatexto(p,l,num,lin)
{

var t=p.value;var n=0;
y=t.split('\n');
n=y.length;

	if(n>num)
	{
	l=t.lastIndexOf('\n')-2;
	t=t.substring(0,l);
	p.value=t;
	}
	else
	{
		if(n==num)
		{
		j=t.lastIndexOf('\n')-2;
		h=t.length;
		yu=t.substring(0,j);
		yl=yu.length;
		jh=t.substring(j,h);

			if((jh.length>=lin))
			{
			t=t.substring(0,yl+lin);
			 p.value=t;
			}
		}
		else
		{
			if((t.length>=lin)&&(n<num))
			{
			t=t.substring(0,lin*n);
			 p.value=t;
			}
			else
			{	if((t.length>=l))
				 {
				 t=t.substring(0,l);
				 p.value=t;
				 }
			}
		}
	}

}
/////////////////
function fecha_hora_actual(){
	var now = new Date();
	var mes = now.getMonth()+1;
	var dia = now.getDate();
	var seg = now.getSeconds();
	var mnt = now.getMinutes();
	if(mes<10)mes='0'+mes;
	if(dia<10)dia='0'+dia;
	if(seg<10)seg='0'+seg;
	if(mnt<10)mnt='0'+mnt;
	
	return now.getFullYear() + "-" + mes + "-" + dia +" "+now.getHours()+":"+mnt+":"+seg;
}

function mensaje_alerta(id,mensaje){
	
$("#"+id).html(mensaje).dialog("option", {buttons: [{
	text: "Aceptar",
	click: function() {
	$(this).dialog({close: function() {
	}});
	$(this).dialog("close");
	}
	}]
});
	$("#"+id).dialog("open");
}

function mostrar_mensaje(tipo,mensaje,campo){
	if(tipo=='1'){
		$("#"+campo).removeClass("error");
		$("#"+campo).addClass("exito");
	}else{
		$("#"+campo).removeClass("exito");
		$("#"+campo).addClass("error");
	}
	
	$("#msg").html(mensaje).dialog("open");
	//alert(mensaje);
	
}

function mostrar_mensaje2(tipo,mensaje,campo){
	if(tipo=='1'){
		$("#"+campo).removeClass("error");
		$("#"+campo).addClass("exito");
		//$("#msg").html(mensaje).dialog("open");
	}else{
		$("#"+campo).removeClass("exito");
		$("#"+campo).addClass("error");
		//$(campo).html(mensaje);
		//setTimeout('$("'+campo+'").html("")',2500);
	}
	$("#msg").html(mensaje).dialog("open");
	
	//$("#"+campo).html(mensaje);
	
	
}

function mostrar_mensaje3(mensaje, tipo, campo){
	
	$(campo).html(mensaje);
	if(tipo=='0'){
		$(campo).css({'font-weight':'bold','color':'#F00'})
	}else{
		$(campo).css({'font-weight':'bold','color':'#00F'})
	}
	$(campo).show();
	setTimeout('$("'+campo+'").hide()',4000);
		
	
}

//balanceo
function iniciar_atencion(){
	
	idcomprobante=$("#idcomprobante").val();
	idareaactual=$("#idareaactual").val();
	if(accion=='1'){
		accion='0';
		$(this).val("Cerrar Atencion");
		fecha_hora = fecha_hora_actual();
		
		$("#registro_inicio").val(fecha_hora);
		
	}else if(accion=='0'){
		accion='1';
		$(this).val("Atencion Cerrada");
		$(this).prop("disabled",true);
		fecha_hora = fecha_hora_actual();
		
		$("#registro_salida").val(fecha_hora);
		
		$.ajax({
			url	:'accion_balanceo.php',
			data:'idcomprobante='+idcomprobante+'&idareaactual='+idareaactual,
			type:'post',
			success: function(ret){
				console.info(ret);
				json_datos=JSON.parse(ret);
				var mensaje = json_datos.mensaje;
				var tipo = json_datos.tipo;
				mostrar_mensaje(tipo,mensaje,"div_mensaje");
			}
		});
		
	}
}
function marcar_radio(obj){
	$(obj).prop("checked",true);
}
function mostrar_select(campo1, campo2, valor){
	var valores_validos = valor.split(',');
	
	if($.inArray($(campo1).val(),valores_validos)>=0){
		$(campo2).css("display", "block");
	}else{
		$(campo2).css("display", "none");
		$(campo2).val("");
	}
}
function mostrar_radio(campo1, campo2, valor){
	var valores_validos = valor.split(',');
	var valor1=$("input:radio[name="+campo1+"]:checked").val();
	if($.inArray(valor1,valores_validos)>=0){
		$(campo2).css("display", "inline");
	}else{
		$(campo2).css("display", "none");
		$(campo2).val("");
	}
}



function listar_cie10(diag,cie,recomendacion){
	$(diag).autocomplete({
		source:"autocompletar.php?accion=diag1",
		select:function(event,ui){
			$(cie).val(ui.item.cie10);
			if($.trim(ui.item.recomendacion)!=''){
				$(recomendacion).val(ui.item.recomendacion);
			}
		}
	});
}
function listar_porcie10(cie,diag,recomendacion){
	$(cie).autocomplete({
		source:"autocompletar.php?accion=diag2",
		select:function(event,ui){
			$(diag).val(ui.item.diag);
			if($.trim(ui.item.recomendacion)!=''){
				$(recomendacion).val(ui.item.recomendacion);
			}
		}
	});
}




function listar_cie10_muscu(diag,cie){
	$(diag).autocomplete({
		source:"autocompletar.php?accion=diag4",
		select:function(event,ui){
			$(cie).val(ui.item.diag);
		}
	});
}
function mostrar_check(check,texto){
	var idcheck="#"+check;
	var idtexto=texto;
	
	if($(idcheck).is(":checked")){
		$(idtexto).removeAttr("disabled");
		$(idtexto).show("fast");
	}else{
		$(idtexto).hide("fast");
		$(idtexto).attr("disabled","disabled");
	}
}
function revisa_estado(event){
	/*var valor = $("#registro_inicio").val();
	var idareaactual = $("#idareaactual").val();
	if(valor==''&&idareaactual!=''){
		mostrar_mensaje('0',"Necesita Iniciar la Atencion","div_mensaje")
		event.preventDefault();
	}*/
}

$(document).ready(function(e) {
    $("input[type='text'],textarea").attr("autocomplete","off");
	$("#loading-div-background").css({ opacity: 0.5 });
});

function ShowProgressAnimation(){	
	if($("#form").valid()){
		$("#loading").fadeIn(function(){			
			$("#form").submit();
		});
	}
}
function ShowProgressAnimation2(){	
	$("#loading").fadeIn(function(){			
		$("#form").submit();
	});
}

function ShowProgressAnimation3(){	
	$("#loading").fadeIn();
}

function HideProgressAnimation3(){	
	$("#loading").fadeOut();
}
function cargaimagen(img,obj) {
         //alert(obj.value);
         img.src ="file://" + obj.value;

}
function asignar_doctor(idauditor,nombre_auditor,valor1,valor2,permiso,check){
	
	if(!$(check).is(":checked")){
		if(permiso=="si"){
			$(check).prop("disabled",true);	
		}
		valor1="";
		valor2="";
	}
	$(idauditor).val(valor1);
	$(nombre_auditor).val(valor2);
	//$(idauditor).selectmenu();
}
function grabar_auditoria() {
	/*$("#botonera").hide(function(){
		$("#loader").show(function(){
			var datos=$("form").serialize();*/
			
	idformato2=$("#idformato").val();
	idcomprobante2=$("#idcomprobante").val();
	idpaciente2=$("#idpaciente").val();
	idseccion2=$("#idseccion2").val();
	
	iddoctor=$("#iddoctor").val();
	idmedico=$("#idmedico").val();
	idmedico_obs='';
	idmedico_obs=$("#idmedico_obs").val();

	var revisadofh04="";var revisadofh03="";var revisadofh02="";
	if($("#revisadofh03").is(":checked")){
		revisadofh03="ON";
	}
	if($("#revisadofh02").is(":checked")){
		revisadofh02="ON";
	}
	if($("#revisadofh04").is(":checked")){
		revisadofh04="ON";
	}
							
	$.ajax({
		url: "permiso_sql.php",
		data:{
			idformato2:idformato2,
			idcomprobante2:idcomprobante2,
			idpaciente2:idpaciente2,
			idseccion2:idseccion2,
			iddoctor:iddoctor,
			idmedico:idmedico,
			idmedico_obs:idmedico_obs,
			revisadofh02:revisadofh02,
			revisadofh03:revisadofh03,
			revisadofh04:revisadofh04
		},
		type: "POST",
		success: function (ev) {
			var retorno = ev.split('|');
			var mensaje = retorno[0];
			var idformato = retorno[1];
			actualiza_ruta();			
			cargar_cuerpo();
		}
		/*});
		});*/
	});
}