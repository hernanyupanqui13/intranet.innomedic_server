<div class="reglamento_container">
    <iframe id="reglamentos_sst_viewer" class="pdf_document"
        title="Reglamentos SST"
        style="position: relative; height: calc(100vh - 210px); width: 100%;"
        src="<?=$reglamento_file_path?>"
        frameborder="0"
    >
    </iframe>
</div>
<div style="dispay:none" class="data_container"
    data-document_number="<?= $nombre_documento;?>"
></div>

<script type="module" src="<?=base_url();?>/application/views/sst/document_viewer-script.js"></script>
