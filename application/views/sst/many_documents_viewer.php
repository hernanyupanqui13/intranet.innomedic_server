<div class="reglamentos_container">

    <div class="items_menu">
        <div class="h3 h3_template">Documentos</div>
        <ul class="view_list" id="the_view_list"></ul>
    </div>

    <div class="document_container">
        <iframe class="pdf_document"
            title=""
            style="position: relative; height: calc(100vh - 210px); width: 100%;"
            src=""
            frameborder="0"
        >
        </iframe>
    </div>

</div>
<div class="data_container"
    data-user_data = '<?=$user_data;?>'
></div>



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

@media (max-width: 1050px) {
    .reglamentos_container {
        grid-template-columns: 1fr;
    }

    .sst_document_item_container {
        width: fit-content;
    }
}




    
</style>

<script type="module" src="<?=base_url();?>/application/views/sst/many_documents_viewer-script.js?v=5"></script>
