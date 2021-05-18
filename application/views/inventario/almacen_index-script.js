let editor; // use a global for the submit and return data rendering in the examples
console.log("testins");
$(document).ready(function() {
    editor = new $.fn.dataTable.Editor( {
        table: "#almacenTable",
        ajax: "./almacenTableEditor",
        idSrc:  'numero',
        fields: [ {
                label: "Producto:",
                name: "producto"
            }, {
                label: "Codigo de Barra",
                name: "codigo_barra"
            }, {
                label: "Stock",
                name: "stock"
            }
        ], 
        i18n: {
            edit: {
                button:"Editar",
                title: "Editar Producto",
                submit: "Actualizar"
            }
        }
    } );

    $('#almacenTable').DataTable( {
        dom: "Bfrtip",
        columns: [
            {data: "numero"},
            { data: "producto" },
            { data: "codigo_barra" },
            { data: "stock" }
        ],
        select: true,
        buttons: [
            { extend: "edit",   editor: editor }
        ], 
        language: {
            paginate:{
                next: "Siguiente",
                previous: "Anterior",
            },
            search: "Busqueda"
        }

    } );
});
