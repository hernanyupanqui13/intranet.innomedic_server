$('[data-page-size]').on('click', function(e){
    e.preventDefault();
    var newSize = $(this).data('pageSize');
    FooTable.get('#showcase-example-1').pageSize(newSize);

});

console.log("order exterenalll");


jQuery(function($){
    ft = FooTable.init('#showcase-example-1', {

        "columns": [
                { "name": "nro_identificador", "title": "Codigo", "breakpoints": "xs", "sorted": "true" },
                { "name": "fecha_registro", "title": "Fecha Atención" ,"breakpoints": "xs"},
                { "name": "nombrex", "title": "Paciente" },
                { "name": "empresa", "title": "Empresa", "breakpoints": "xs", "classes":"centrado"},
                { "name": "tipo_examen", "title": "Examen", "breakpoints": "xs sm md", "classes":"centrado"},
                { "name": "laboratorio", "title": "Laboratorio", "breakpoints": "xs sm md" , "classes":"centrado"},
                { "name": "rayox", "title": "Rayox X", "breakpoints": "xs sm md", "classes":"centrado"},
                { "name": "final", "title": "Impresión Final", "breakpoints": "xs sm md", "classes":"centrado"}
                
            ],
        "rows": jQuery.get({
            "url": `${window.location.origin}/Examenes/Ordenes/obtener_registro_ajax/`,
            "dataType": "json",					
        }),		
    })		
});


$(document).ready(function() {

    $(document).on('click', '#buscar_registro_por_ajax', function(event) {
        event.preventDefault();

        // Obteniendo la fecha y dando formato para que sea complatible con MySql
        fecha_inicio = $("#fecha_inicio").val();

        if(fecha_inicio!="") {
            fecha_inicio = fecha_inicio.split("/");
            fecha_inicio = fecha_inicio[2] + "-" + fecha_inicio[0] + "-" + fecha_inicio[1];
        } else {
            fecha_inicio="null";
        }
        
        
        // Obteniendo la fecha y dando formato para que sea complatible con MySql
        fecha_fin = $("#fecha_fin").val();
        if(fecha_fin!="") {
            fecha_fin = fecha_fin.split("/");
            fecha_fin = fecha_fin[2] + "-" + fecha_fin[0] + "-" + fecha_fin[1];    
        } else {
            fecha_fin = "null";
        }
        
        nombre_busqueda = $("#nombre_busqueda").val();
        dni_busqueda = $("#dni_busqueda").val();
        
        parameters = fecha_inicio + "/" + fecha_fin + "/";


        if(nombre_busqueda == null || nombre_busqueda =="") {
            parameters+= "null/";		
        } else {
            parameters+= nombre_busqueda + "/";
        }

        if(dni_busqueda == null || dni_busqueda =="") {
            parameters+=  "null/";					
        } else {
            parameters += dni_busqueda + "/";
        }   

        $('#showcase-example-1').footable({			

            "columns": [
                { "name": "nro_identificador", "title": "Codigo", "breakpoints": "xs", "sorted": "true" },
                { "name": "fecha_registro", "title": "Fecha Atención" ,"breakpoints": "xs"},
                { "name": "nombrex", "title": "Paciente" },
                { "name": "empresa", "title": "Empresa", "breakpoints": "xs", "classes":"centrado"},
                { "name": "tipo_examen", "title": "Examen", "breakpoints": "xs sm md", "classes":"centrado"},
                { "name": "laboratorio", "title": "Laboratorio", "breakpoints": "xs sm md" , "classes":"centrado"},
                { "name": "rayox", "title": "Rayox X", "breakpoints": "xs sm md", "classes":"centrado"},
                { "name": "final", "title": "Impresión Final", "breakpoints": "xs sm md", "classes":"centrado"}						
            ],

            "rows": jQuery.get({
                "url": `${window.location.origin}/Examenes/Ordenes/obtener_registro_ajax/${parameters}`,
                "dataType": "json",					
            }),
       });                  
    });
});

function limpiar_campos() {

    $("#fecha_inicio").val("");
    $("#fecha_fin").val("");
    $("#nombre_busqueda").val("");
    $("#dni_busqueda").val("");
}		

function laboraorio(id) {
    window.open(`${window.location.origin}/Laboratorio/Laboratorio/Mostrar_registros/${id}`, '_blank');
}

function rayosx(url) {
    window.open(`${window.location.origin}/Rayos/Rayos/Mostrar_registros/${url}`, '_blank');
}