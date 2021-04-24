console.log("working");

const dowload_button = document.querySelector("#full_report-download-btn");

dowload_button.addEventListener("click", downloadFullReport);


function downloadFullReport() {
    let my_form = document.createElement("form");
    my_form.action = `${window.location.origin}/sst/sst/downloadFullReportExcel/`;
    my_form.method = "post";
    my_form.style.visibility ="hidden";
    my_form.innerHTML = `<input type="text" name="data" value=''>`;
    document.querySelector("body").appendChild(my_form);
    
    my_form.submit();

    my_form.remove();
}