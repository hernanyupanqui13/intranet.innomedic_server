/*
Esta funcion valida si es que un documento de SST ha sido visto y confirmado en la base de datos
Llama a las demas funciones en este documento para lograrlo
*/

export function viewValidator(document_name, user) {
    let data = new FormData;
    data.append("document_name", document_name);

    fetch(`${window.location.origin}/sst/Sst/checkIfWasConfirmed`, {
        method: "post",
        body: data
    })
    .then(response => response.text())
    .then(data => {
        if (data != "1") {  // 1 means that it was confirmed before
            requestConfirmation(document_name, user);
        }
    });


};

// Esta funcion se encarga de solicitar la confirmacion al cliente y comunicar si fue confirmado o no
export function requestConfirmation(the_document_name, user) {
    
    let current_date = new Date();
    current_date = `${current_date.getDate()}/${current_date.getMonth() + 1}/${current_date.getFullYear()}`;


    let confirmation_message = "";
    let confirmation_title = "";
    if(the_document_name == "Reglamento Interno de SST") {

        confirmation_message = `<p>Conste por el presente documento, que, he recibido y se me ha capacitado 
            sobre el Reglamento Interno de Seguridad y Salud en el Trabajo de INNOMEDIC INTERNATIONAL 
            E.I.R.L. El cual me comprometo a cumplir estrictamente en todas sus normas y dispositivos, 
            para lo cual firmo el presente cargo.</p>
        `;
        confirmation_title = "CARGO DE RECEPCIÓN DE RISST";

    } else {

        confirmation_message = `<p>Conste por el presente documento, que, he recibido y se me ha capacitado 
            sobre el documento llamado  "${the_document_name}" de INNOMEDIC INTERNATIONAL 
            E.I.R.L. El cual me comprometo a cumplir estrictamente en todas sus normas y dispositivos, 
            para lo cual firmo el presente cargo.</p>
        `;       
        confirmation_title = `CARGO DE RECEPCIÓN DE "${the_document_name.toUpperCase()}"`;

    }
     

    Swal.fire({
        title: `${confirmation_title}`,
        html: `
        ${confirmation_message}
        <div><strong>Nombre: </strong>
            <span>${!user.nombres ? "": user.nombres} 
                ${!user.apellido_paterno ? "": user.apellido_paterno} 
                ${!user.apellido_materno ? "": user.apellido_materno}
            </span>
        </div>
        <div><strong>Puesto de trabajo: </strong><span>${user.puesto}</span></div>
        <div><strong>DNI: </strong><span>${user.nro_documento}</span></div>
        <div><strong>Fecha: </strong><span>${current_date}</span></div>`,
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Firmar',
        cancelButtonText: 'Cancelar'
      }).then(async (result) => {
        if (result.value) {
            let ajax_state = await confirmViewedDocument(the_document_name);
            
            // Si se guardo la informacion correctamente o si hubo un problema
            if(ajax_state) {  // Nombre completo del documento en la db
                Swal.fire(
                    'Listo!',
                    'Hemos guardado tu confirmacion en el sistema',
                    'success'
                );
            } else {
                Swal.fire(
                    'Chispas!',
                    'Lo sentimos, ha ocurrido un problema. Por favor reportalo al administrador de T.I',
                    'error'
                );
            }
          
        } else {
            document.querySelector(".pdf_document").src = "";
        }
    })
    .catch(e => {
        Swal.fire(
            'Chispas!',
            'Lo sentimos, ha ocurrido un problema. Por favor reportalo al administrador de T.I',
            'error'
        );
    });
}


// Esta funcion confirma que un usuario recibio el documento en la base de datos
export async function confirmViewedDocument(document_name) {
    let document_id;
    let formData_1 = new FormData();
    formData_1.append("document_name", document_name);
    // Obtaining document id
    let the_feth = fetch(`${window.location.origin}/sst/Sst/getDocumentIdByName/`, 
        {"method": "post",
            "body": formData_1
        })
    .then(response => response.text()) 
    .then(data => {
        document_id = data;
        let formData = new FormData();
        formData.append("document_id", document_id);
        // Changing the state of the document to viewed
        return fetch(`${window.location.origin}/sst/Sst/viewSstDocuments`,
            {"method": "post", 
            "body": formData
        });
    })
    .then(response_2 => response_2.text())
    .then( data => 
    {
        if(data==1) {
            return true;
        } else {
            return false;
        }

    });

    return the_feth;
    
}
