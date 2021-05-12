const download_button_excel = document.querySelector("#full_report-download-excel-btn");
download_button_excel.addEventListener("click", downloadFullReportExcel);

const download_button_pdf = document.querySelector("#full_report-download-pdf-btn");
download_button_pdf.addEventListener("click", downloadFullReportPdf);


function downloadFullReportExcel() {

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
    window.location = `${window.location.origin}/sst/sst/downloadFullReportPdf`;
}


const footable_columns = [
    { "name": "counter", "title": "#", "breakpoints": "xs", "sorted": "true" },
    { "name": "tipo_documento", "title": "Tipo Documento" },
    { "name": "nombre", "title": "Nombre" },
    { "name": "apellido_paterno", "title": "Apellido Paterno" },
    { "name": "apellido_materno", "title": "Apellido Materno" },
    { "name": "fecha_visto", "title": "Fecha Visto" ,"breakpoints": "xs"},
    { "name": "opciones", "title": "Opciones" ,"breakpoints": "xs"},
];

jQuery(function($) {
	// init the plugin and hold a reference to the instance
	var ft = FooTable.init('#sst-reportes-table', {
		// we only load the column definitions as the row data is loaded through the function
		"columns": footable_columns,
        "rows": getRowsData(),

	});
});

// Obtiene las filas para el footble de SST
function getRowsData() {

    return jQuery.get({
        "url": `${window.location.origin}/sst/sst/getFullReportRows/`,
        "dataType": "json"		
    })
    .then(r => r);

}
// Descarga un pdf con el cargo individual
function dowloadIndividualReport(userId) {
    window.location = `${window.location.origin}/sst/sst/downloadIndividualReport/${userId}`;
}