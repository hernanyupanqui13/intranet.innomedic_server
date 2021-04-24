<div class="row">
    <div class="col-lg-6 col-md-9 col-sm-12">
        <h2>Reportes</h2>
        <ul class="list-group">
            <li class="list-group-item item_with_options">
                <span class="description">Descargar Reporte completo</span>
                <button type="button" class="btn btn-primary option" id="full_report-download-btn">
                    <i class="fas fa-file-download"></i>
                </button>
            </li>            
        </ul>
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

</style>
<script src="<?=base_url() . '/application/views/sst/sst_admin_panel-script.js?';?>"></script>
