const download_button_excel = document.querySelector("#full_report-download-excel-btn");
download_button_excel.addEventListener("click", downloadFullReportExcel);

const download_button_pdf = document.querySelector("#full_report-download-pdf-btn");
download_button_pdf.addEventListener("click", downloadFullReportPdf);

console.log("loading const");   

function downloadFullReportExcel() {

    console.log("excel");
    let my_form = document.createElement("form");
    my_form.action = `${window.location.origin}/sst/sst/downloadFullReportExcel/`;
    my_form.method = "post";
    my_form.style.visibility ="hidden";
    my_form.innerHTML = `<input type="text" name="data" value=''>`;
    document.querySelector("body").appendChild(my_form);
    
    my_form.submit();

    my_form.remove();
}

function downloadFullReportPdf() {
    console.log("pdf");
    window.location = `${window.location.origin}/Sst/sst/downloadFullReportPdf`;
}