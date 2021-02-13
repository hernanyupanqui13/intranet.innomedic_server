
// Rendering the list of saved templated
renderItemList();

// This variable stores the active template HTML element to remove the active class and its styles
let activated_template;


// To change the URL and text of the footer link
document.getElementById("final_link_container").addEventListener("click", (event) => changeLink(event));
// To download the templa as image 
document.getElementById("download_button").addEventListener("click", () => downloadImage("html_page"));


/*
This function changes the name and link of the footer link in the template
*/
async function changeLink(event) {

    event.preventDefault();
    
    // Triggering a swal alert to take the name and URL of the footer link
    const { value: formValues } = await Swal.fire({
        title: 'Multiple inputs',
        html:
            '<span>URL:</span><input id="swal-url" class="swal2-input">' +
            '<span>Texto:</span><input id="swal-label" class="swal2-input">',
        focusConfirm: false,
        preConfirm: () => {
            return [
            document.getElementById('swal-url').value,
            document.getElementById('swal-label').value
            ]
        }
    })
    
    // Changin the values of the HTML elements to the ones given by the user
    if (formValues) {
        document.getElementById("final_link_container").href = formValues[0];
        document.getElementById("final_link").innerHTML = formValues[1];
    }
}



/*
This function sets the template name before saving the template in the database
*/
async function setTemplateName() {

    const { value: templateName } = await Swal.fire({
        title: 'Multiple inputs',
        html:
            '<span>Nombre de la plantilla:</span><input id="swal-nombre_plantilla" class="swal2-input">',
        focusConfirm: false,
        preConfirm: () => {
            return document.getElementById('swal-nombre_plantilla').value;
        }
    });
    
    if (templateName) {
        return templateName;
    }
}

function startRemovingTemplate(id) {
    Swal.fire({
        title: '¿Estas seguro?',
        text: "Si aceptas, esta plantilla se eliminara de tu lista",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Si, eliminar!'
      }).then((result) => {
        
        if (result.isConfirmed) {
            removeTemplate(id);
            Swal.fire(
                'Eliminado!',
                'La plantilla ha sido eliminada con exito.',
                'success'
            )
        }
    })
}




/*
Esta funcion descarga la plantilla a imagen en PNG
*/
function downloadImage(id_of_container) {
    domtoimage.toBlob(document.getElementById(id_of_container))
    .then(function (blob) {
        window.saveAs(blob, 'testings.png');
    });
}


/*
This function saves the template in the database
Before saving, it asks for the name of the template. After that, it
send all the information to the server.
Finally, it updates the saved templates list
*/
function saveTemplate() {

    setTemplateName().then( function(name) {
        
        let template = document.getElementById('html_page').innerHTML;
                
        let xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function() {
    
            if (this.readyState == 4 && this.status == 200) {
                renderItemList();  
            }
        };
        xhttp.open("POST", window.location.origin + "/intranet.innomedic.pe/" + "Correo_generator/guardarPlantilla", true);
        xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        xhttp.send("template=" + template + "&name=" + name);
    });
    
    

}

/*
This function request the data and renders it to the HTML document
*/
function renderItemList() {
    const the_main_container = document.getElementById("the_view_list");
    the_main_container.innerHTML = "";

    requestData().then(function(list_of_data) {
        list_of_data.forEach((element)=>renderTemplateItem(element, the_main_container));
    });
}


/*
This function request the templates data form the server
When it is ready, it returns the resolve of the promise object
*/
function requestData() {
    
    return new Promise(function (resolve, reject) {
        let xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function() {
    
            if (this.readyState == 4 && this.status == 200) {
                console.log("success");
                console.log(this.responseText);
    
                resolve(JSON.parse(this.responseText));

            }
        }

        xhttp.open("GET", window.location.origin + "/intranet.innomedic.pe/" + "Correo_generator/obtainSavedTemplatesList", true);
        xhttp.send();
    })
}   

/*
This function render one template and appends it to
its parent in the HTML page
*/
function renderTemplateItem(item, main_container) {
    const one_item = document.createElement("li");
    one_item.innerHTML = `
        <div class="template_name">${item.template_name}</div>
        <div class="date_modification">${item.date_of_modification}</div>
        <div class="icon_container"><div class="close_icon">x</div></div>
    `;
    one_item.classList.add("item_container");
    one_item.classList.add("list-group-item-action");
    one_item.id= "" + item.Id;
    one_item.addEventListener("click", () => editSavedTemplate(item.Id, one_item))
    
    // Assignning the event to the remove button to delete templates
    let remove_button = one_item.querySelector(".icon_container");
    remove_button.addEventListener("click", function(event) {
        event.stopPropagation();
        startRemovingTemplate(item.Id);  
    });


    main_container.appendChild(one_item);
}



/*
This functions allos us to edit a saved template when it is clicked
from the saved templates list
*/
function editSavedTemplate(template_id, event_target)  {
    let xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {

        if (this.readyState == 4 && this.status == 200) {

            if(activated_template!= null && activated_template != undefined) {
                activated_template.classList.remove("active_template");
                activated_template.classList.add("list-group-item-action");
            }
            event_target.classList.add("active_template");  
            event_target.classList.remove("list-group-item-action");
            activated_template = event_target;

            template_obj = JSON.parse(this.responseText);
            document.getElementById("html_page").innerHTML = template_obj.html_content;
            document.getElementById("final_link_container").addEventListener("click", (event) => changeLink(event));                        
        }
    }

    xhttp.open("GET", window.location.origin + "/intranet.innomedic.pe/" + "Correo_generator/obtainSavedTemplate/" + template_id, true);
    xhttp.send();
}



/*
This funtions removes the template by changing its view state from true to false in the database
*/
function removeTemplate(id) {
    console.log("removing template");
    let xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {

        if (this.readyState == 4 && this.status == 200) {
            renderItemList(); 
        }
    };
    xhttp.open("POST", window.location.origin + "/intranet.innomedic.pe/" + "Correo_generator/removeTemplate", true);
    xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhttp.send("template_id=" + id);
}





/*
_____________________________________________________________________________________
-------------------------------------------------------------------------------------
DISABLED FUNCTIONS AND FEATURES OF THE PROGRAM
-------------------------------------------------------------------------------------
*/


/* 
Esta funcion se encarga de llamar a otras funciones para que se envie el correo
*/
function continueEmail() {

    email_content = document.getElementById("html_page").innerHTML
    setEmailConfig().then((value)=>sendEmail(JSON.stringify(value), email_content));
    
}

/*
This function asks the emails of the both the reciever and the transmitter users. 
It sends that inforamtio to the server in where the email is sended
This is currently not used
*/
async function setEmailConfig() {

    const { value: formValues } = await Swal.fire({
        title: 'Multiple inputs',
        html:
            '<span>Mi direccion de correo:</span><input id="swal-mi_correo" class="swal2-input">' +
            '<span>Mi contraseña:</span><input type="password" id="swal-mi_contrasena" class="swal2-input">' + 
            '<span>Para: </span><input type="text" id="swal-destination_list" class="swal2-input">' + 
            '<span>Asunto: </span><input type="text" id="swal-asunto" class="swal2-input">',
        focusConfirm: false,
        preConfirm: () => {
            return {
            mi_correo: document.getElementById('swal-mi_correo').value,
            mi_contrasena: document.getElementById('swal-mi_contrasena').value,
            destination_list: document.getElementById('swal-destination_list').value,
            asunto: document.getElementById('swal-asunto').value

            }
        }
    })
    
    if (formValues) {
        return formValues;
    }
}


// Esta funcion envia los datos (POST ajax) al servidor, el cual enviara el correo
function sendEmail(config, content) {
    
    let xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            console.log("success");
            console.log(this.responseText);
            window.location = window.location.origin + "/intranet.innomedic.pe/" + 'Correo_generator/download/';

        }
    };
    xhttp.open("POST", window.location.origin + "/intranet.innomedic.pe/" + "Correo_generator/enviarCorreo", true);
    xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhttp.send("config=" + config + "&content=" + content);

}



/*
_____________________________________________________________________________________________
---------------------------------------------------------------------------------------------
USEFUL FUNCTIONS
---------------------------------------------------------------------------------------------
*/
function removeSpacesFromHtml(the_html_string) {
    // Removing spaces, tabs, carriage returns using regex
    the_html_string = the_html_string.replace(/(\\n|\\)/g, '');

    // Removing the quotation marks
    the_html_string = the_html_string.substring(1, the_html_string.length - 1);

    return the_html_string;
}