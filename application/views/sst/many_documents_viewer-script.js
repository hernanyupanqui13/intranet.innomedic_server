import {viewValidator, requestConfirmation, confirmViewedDocument} from './viewValidator.js';



/*
Aqui se tiene toda la informacion sobre el documento de SST y su ubicacion
Ident_name es el nombre con el que el archivo es guardado en la base de datos. Ahi tambien esta nuevamente el nombre del pdf
Sin emabargo, no se usa esa informacion aun. Debidoa  que hay pocos documentos se usa esta lista
De incrementar el numero se puede hacer el pedido a la bd

*/
let data = [
    {nombre: "Plan de Capacitacion de Seguridad y Salud en el Trabajo", url: `${window.location.origin}/upload/archivos/sst/plan_programa_sst.pdf`, ident_name: "Plan de Capacitacion de SST"}
    , {nombre: "Plan de Seguridad y Evacuacion en caso de Emergencia", url: `${window.location.origin}/upload/archivos/sst/plan_evacuacion.pdf`, ident_name: "Plan de Evacuacion"}
    , {nombre: "Programa Anual de Seguridad y Salud en Trabajo", url: `${window.location.origin}/upload/archivos/sst/plan_anual_sst.pdf`, ident_name:"Programa Anual de SST"}
];

let activated_template;

// Rendering items
const container = document.getElementById("the_view_list");
data.forEach((item) => renderTemplateItem(item, container));

// Giving the confirmation restrictions to all the elements


function renderTemplateItem(item, main_container) {

    const one_item = document.createElement("li");

    one_item.innerHTML = `
        <div class="document_name">${item.nombre}</div>
    `;

    one_item.classList.add("sst_document_item_container");
    one_item.classList.add("list-group-item-action");
    
    one_item.addEventListener("click", () => {
        viewValidator(item.ident_name);
        viewDocument(item.url, item.nombre, one_item);
    
    });
    
    main_container.appendChild(one_item);
    
}



function viewDocument(the_url, nombre_documento, event_target)  {
    
    if(activated_template!= null && activated_template != undefined) {
        activated_template.classList.remove("active_document");
        activated_template.classList.add("list-group-item-action");
    }
    event_target.classList.add("active_document");  
    event_target.classList.remove("list-group-item-action");
    activated_template = event_target;

    document.querySelector(".pdf_document").src = the_url;
    document.querySelector(".pdf_document").title = nombre_documento;

}


function getData() {
    fetch(`${window.location.origin}/sst/Sst/getDocuments/`)
}