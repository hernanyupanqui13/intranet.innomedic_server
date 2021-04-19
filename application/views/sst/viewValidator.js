/*
Esta funcion valida si es que el documentos ha sido visto y confirmado en la base de datos
Llama a las demas funciones en este documento para lograrlo
*/

export function viewValidator(document_name) {
    let data = new FormData;
    data.append("document_name", document_name);

    fetch(`${window.location.origin}/sst/Sst/checkIfWasConfirmed`, {
        method: "post",
        body: data
    })
    .then(response => response.text())
    .then(data => {
        if (data != "1") {  // 1 means that it was confirmed before
            requestConfirmation(document_name);
        }
    });


};

// Esta funcion se encarga de solicitar la confirmacion al cliente y comunicar si fue confirmado o no
export function requestConfirmation(the_document_name) {
    Swal.fire({
        title: 'Confirmacion de lectura',
        text: `Estas a punto de leer "${the_document_name}". 
            Al dar click en continuar confirmas las recepcion y lectura 
            de este documento, el cual quedara registrado en el sistema. Si
            das click en cancelar no podras leer el documento`,
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Continuar',
        cancelButtonText: 'Cancelar'
      }).then(async (result) => {
        console.log(result);
        if (result.value) {
            let ajax_state = await confirmViewedDocument(the_document_name);
            console.log(ajax_state);
            
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
            console.log("canceled");
            document.querySelector("embed").src = "";
        }
    })
    .catch(e => {
        console.log("Hubo un error");
        console.log(e);
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
        console.log(data);
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
        console.log(data);
        if(data==1) {
            return true;
        } else {
            return false;
        }

    });

    return the_feth;
    
}
