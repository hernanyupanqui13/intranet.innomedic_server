const vista_previa_modal = "#exampleModal";


/*
Esto solo obtiene la plantilla. Hya optra funciona que obtiene los datos y los llena
Revisar que funcione bien con Molecular. El id es opcional para obtener plantillas con datos precargados 
desde el servidor
*/
function getPlantilla(plantilla, id=null) {
	
    let xhttp = new XMLHttpRequest();
    let response;

	xhttp.onreadystatechange = function() {
		if (this.readyState == 4 && this.status == 200) {
			response = this.responseText;
		}
	};

    xhttp.open("GET", `${window.location.origin}/Impresion/Impresion/getPlantilla/${plantilla}/${id}`, false);
    xhttp.send();
    return response;
}


function getData(id) {
    let xhttp = new XMLHttpRequest();
    let response;

	xhttp.onreadystatechange = function() {
		if (this.readyState == 4 && this.status == 200) {
            console.log(JSON.parse(this.responseText));
			response = JSON.parse(this.responseText);
		}
	};

	xhttp.open("GET", `${window.location.origin}/Impresion/Impresion/getData/${id}`, false);
    xhttp.send();
    return response;
}

/*
Esta funcion deberia automaticamente llenar los datos en la plantilla de impresion
No esta terminado
*/
function fillData(data) {
    $("#nombres_completos_paciente").text(data.nombre+" "+data.apellido_paterno+" "+data.apellido_materno);
    $("#nombres_completos_pacientex").text(data.nombre+" "+data.apellido_paterno+" "+data.apellido_materno);
    $("#dni_paciente").text(data.dni);

    if (data.empresa=="") {
        aplicate = ``;
        
    } else {
        aplicate = `<div class=" text-center p-2 border ">
                <div class="font-weight-bold text-dark">
                    EMPRESA:<span class="font-weight-normal" > `+data.empresa+`&nbsp;&nbsp;&nbsp;&nbsp;`+data.ruc+`</span>
                </div>
            </div>`;
        
    }

    if(data.antigeno_resultado) data.antigeno_resultado = data.antigeno_resultado.toUpperCase();
    if(data.sexo) data.sexo=data.sexo.toUpperCase();

    $("#aplicamos_cambios").html(aplicate);
    $("#sexo_id").text(data.sexo.toUpperCase());
    
    
    

    $("#igm-impr-slot").text(data.igm);
    $("#igg-impr-slot").text(data.igg);
    $("#edad-impr-slot").text(data.edad);
    $("#fecha_nacimiento-impr-slot").text(data.fecha_nacimiento);
    $("#update_covid-impr-slot").text(data.update_covid);
    $("#concentracion_igm-impr-slot").text(data.concentracion_igm);
    $("#concentracion_igg-impr-slot").text(data.concentracion_igg);  
    $("#antigeno_resultado-impr-slot").text(data.antigeno_resultado);
    $("#concentra_atig-impr-slot").text(data.concentra_atig); 
    
    
    if(data.molecular_url!= null) {
        document.getElementById("imprimir_molecular_container").src=`${window.location.origin}/upload/resultados_molecular/${data.molecular_url}`;
    }
}

function vistaPreviaImprimir(plantilla, container_id, id=null) {
    if(isAllowedToPrint(id)) { 
        
        $(vista_previa_modal).modal({show: true});	

        document.getElementById(container_id).innerHTML = getPlantilla(plantilla, id);
        let data = getData(id);
        fillData(data);
    } else {
        Swal.fire(
            '!No puedes imprimir!',
            'Llena y enviar los datos primero',
            'error'
        )
    }

}

function imprimir(element_to_print=null) {
    // Not my code, not sure what it does
    let mode = 'iframe';
    let close = mode == "popup";
    let options = {
        mode: mode,
        popClose: close
    };


    // Para que la funcion sea mutipropositos y se use mas a futuro
    if (element_to_print!=null) {
        document.getElementById(element_to_print).print();
    }

    // Imprimir elementos en un div container
    let divArea = document.querySelector("div.printableAreaprueba");
    if (divArea != null) {
        $("div.printableAreaprueba").printArea(options);
    }
    
    // Imprimir elementos en un iframe container 
    let pdfObject = document.querySelector("iframe.printableAreaprueba");
    if (pdfObject != null) {
        pdfObject.contentWindow.print();
    }
}


/*
Esta funcion reune varias plantillas o una sola para mostra un documento final
con el resultado de todos los examenes y la firma de todos los doctores
*/
function getImpresionFinal(id_del_examen) {
    let xhttp = new XMLHttpRequest();
    let response;
    xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            response = this.responseText;
        }
    };
    xhttp.open("GET", `${window.location.origin}/Impresion/Impresion/getPlantillaFinal/${id_del_examen}`, false);
    xhttp.send();
    return response;
}

/*
Funcion llamada al imprimir el resultado final de una orden clinica
Muestra una vista previa en modal de la impresion
*/
function impresion_final($id) {

    if(isAllowedToPrint($id)) {
			
        $(vista_previa_modal).modal({show: true});	

        document.getElementById("pdfdoc").innerHTML = getImpresionFinal($id);
                        
        // Fill the data with getData response
        fillData(getData($id));
    } else {        
        Swal.fire(
            '!No puedes imprimir!',
            'Llena y enviar los datos primero',
            'error'
        )
    }
}

/*
Define si el examen se puede imprimir o no basado en si se lleno y cargo toda la informacion a la base de datos
Usa el valor estado_progreso de la base de datos
*/
function isAllowedToPrint(id_del_examen) {
    let xhttp = new XMLHttpRequest();
    let response;
    xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            response = JSON.parse(this.responseText);
            response = response.respuesta;
        }
    };
    xhttp.open("GET", `${window.location.origin}/Impresion/Impresion/isAllowedToPrint/${id_del_examen}`, false);
    xhttp.send();

    return response;    

}
