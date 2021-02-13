function getExamId() {
    
    let id = window.location.pathname;
    id = id.split("/");
    id = id[id.length-1];
    return id;

}

function actualizarLabEstado(nuevo_estado="default") {
    let id = getExamId();

    $.ajax({
        url: window.location.origin + "/intranet.innomedic.pe" + "/Laboratorio/Laboratorio/actualizarLabEstado/",
        type: 'POST',
        data: {            
            status: nuevo_estado,
            the_id:id
        }
    })
}