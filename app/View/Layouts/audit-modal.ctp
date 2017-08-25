<?= $this->fetch('content'); ?>

<script type="text/javascript">
    $(document).ready(function () {
        if (myDataTable) {
            myDataTable.destroy();
        }

        var myDataTable = $('.datatable').DataTable({
            initComplete: function () {
                $(".dataTables_filter input").addClass("form-control");
                $(".dataTables_length select").addClass("form-control");
            },
            retrieve: true,
            "order": [[ 0, "desc" ]],
            "columns": [
                {"orderable": false},
                {"orderable": false},
                {"orderable": false}
            ],
            language: {
                "sEmptyTable": "Nenhum registro encontrado",
                "sInfo": "Mostrando de _START_ até _END_ de _TOTAL_ registros",
                "sInfoEmpty": "Mostrando 0 até 0 de 0 registros",
                "sInfoFiltered": "(Filtrados de _MAX_ registros)",
                "sInfoPostFix": "",
                "sInfoThousands": ".",
                "sLengthMenu": "_MENU_ por página",
                "sLoadingRecords": "Carregando...",
                "sProcessing": "Processando...",
                "sZeroRecords": "Nenhum registro encontrado",
                "sSearch": "",
                "searchPlaceholder": "Pesquisar...",
                "oPaginate": {
                    "sNext": "Próximo",
                    "sPrevious": "Anterior",
                    "sFirst": "Primeiro",
                    "sLast": "Último"
                },
                "oAria": {
                    "sSortAscending": ": Ordenar colunas de forma ascendente",
                    "sSortDescending": ": Ordenar colunas de forma descendente"
                }
            }
        });
    });
</script>