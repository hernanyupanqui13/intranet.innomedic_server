<div class="row">
    <div class="col-lg-6 col-md-9 col-sm-12">
        <h2>Reportes</h2>
        <ul class="list-group">
            <li class="list-group-item item_with_options">
                <span class="description">Descargar Reporte completo - Excel</span>
                <button type="button" class="btn btn-primary option" id="full_report-download-excel-btn">
                    <i class="fas fa-file-excel"></i>
                </button>
            </li>
            <li class="list-group-item item_with_options">
                <span class="description">Descargar Reporte completo - Pdf</span>
                <button type="button" class="btn btn-primary option" id="full_report-download-pdf-btn">
                    <i class="fas fa-file-pdf"></i>
                </button>
            </li>   
        </ul>
    </div>
</div>
<div class="row">
    <div class="col" id="main_table_container">
        <table id="sst-reportes-table" class="table" data-paging="true" data-sorting="true" data-filtering="true"></table>
    </div>
</div>

<style>
.item_with_options {
    display: grid;
    grid-template-columns: max-content 1fr max-content;
    align-items: center;

}

.item_with_options .description {
    grid-column: 1/2;
}

.item_with_options .option {
    grid-column: 3/4;
}

#main_table_container > table > tr > td:nth-child(1) {
    background-color: red;
}

</style>
<script src="<?=base_url() . '/application/views/sst/sst_admin_panel-script.js?v=3';?>"></script>
