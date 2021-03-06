let data = [
    {nombre: "Plan de capacitacion de seguridad y salud en el trabajo", url: `${window.location.origin}/upload/archivos/sst/plan_capacitacion.pdf`}
]

let activated_template;

const container = document.getElementById("the_view_list");
data.forEach((item)=> renderTemplateItem(item, container));

function renderTemplateItem(item, main_container) {
    const one_item = document.createElement("li");
    one_item.innerHTML = `
        <div class="document_name">${item.nombre}</div>
    `;
    one_item.classList.add("sst_document_item_container");
    one_item.classList.add("list-group-item-action");
    
    one_item.addEventListener("click", () => viewDocument(item.url, one_item));
    

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

    console.log(document.querySelector("iframe"));
    document.querySelector("iframe").src = the_url;
}