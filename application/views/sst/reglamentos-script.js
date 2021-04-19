import {viewValidator, requestConfirmation, confirmViewedDocument} from './viewValidator.js';



/*


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
        viewDocument(item.url, one_item);
    
    });
    
    main_container.appendChild(one_item);
}



function viewDocument(the_url, event_target)  {
    
    if(activated_template!= null && activated_template != undefined) {
        activated_template.classList.remove("active_document");
        activated_template.classList.add("list-group-item-action");
    }
    event_target.classList.add("active_document");  
    event_target.classList.remove("list-group-item-action");
    activated_template = event_target;

    console.log(document.querySelector(".pdf_document"));
    document.querySelector(".pdf_document").src = the_url;
}


function getData() {
    fetch(`${window.location.origin}/sst/Sst/getDocuments/`)
}