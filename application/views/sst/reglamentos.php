<div class="reglamentos_container">

    <div class="items_menu">
        <div class="h3 h3_template">Documentos</div>
        <ul class="view_list" id="the_view_list"></ul>
    </div>

    <div class="document_container">
        <embed id="reglamentos_sst_viewer"
            title="Reglamentos SST"
            style="position: relative; height: calc(100vh - 210px); width: 100%;"
            src=""
            frameborder="0"
        >
        </embed>
    </div>










</div>
<style>
.view_list {
    list-style:none;
    padding-left: 8px;
    margin-right: 8px;
}

.sst_document_item_container {
    padding: 10px 20px;
    cursor: pointer;
    border-radius: 5px;
    background-color: white;
    margin-bottom: 10px;
}

.reglamentos_container {
    display: grid;
    grid-template-columns: 1fr 2fr
}

.active_document {
    background-color: #03a9f3;
    color: white;
}




    
</style>

<script type="module" src="<?=base_url();?>/application/views/sst/reglamentos-script.js"></script>
