<div class="reglamento_container">
    <iframe class="pdf_document"
        title=""
        style="position: relative; height: calc(100vh - 210px); width: 100%;"
        src="<?=$reglamento_file_path?>"
        frameborder="0"
    >
    </iframe>
</div>
<div class="data_container"
    data-document_name="<?= $nombre_documento;?>"
    data-user_data = '<?=$user_data;?>'
></div>

<script type="module" src="<?=base_url() . '/application/views/areaSistemas/one_document_viewer.js';?>"></script>
