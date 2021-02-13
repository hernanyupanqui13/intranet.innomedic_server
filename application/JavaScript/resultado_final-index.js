function fillEstadoProgreso() {
    const estado_progreso_array = document.getElementsByClassName("estado_progress_container");
    
    for(let i=1; i<estado_progreso_array.length; i++) {
        let value = estado_progreso_array[i].innerText;

        estado_progreso_array[i].innerText = "";
        estado_progreso_array[i].innerHTML = "";

        const container = document.createElement("div");
        const container2 = document.createElement("div");





        let bar = new ldBar(container2);        
        let progress_value;

        if(value== "1") {           // Orden Creada
            progress_value = 0;
        } else if(value== "2") {    // Laboratorio llenado
            progress_value = 50;
        } else if (value == "3") {  // Resultado Enviado
            progress_value = 100;
        }

        bar.set(progress_value);


        container2.setAttribute("id", "bar-" + i);
        let ident = "#" + container2.id + " svg";
        let the_svg = container2.querySelector(ident);
        the_svg.setAttribute("viewBox", "-4.5 -4.5 109 25");

    

        container.appendChild(container2);
        container.setAttribute("style", "display: flex; flex-direction: column;");
        container2.setAttribute("style", "");


        estado_progreso_array[i].appendChild(container);

    }
    
}

function actualizarResultadoEnviadoEstado() {
    // Por terminar, aunque parece que ya no se ne3cesita porque ya actualiza el estado cuando envia el correo
}


