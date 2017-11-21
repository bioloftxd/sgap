<script type="text/javascript" src="https://cdn.datatables.net/1.10.16/js/dataTables.material.min.js"></script>

<script>
    $(document).ready(function () {
        $('#tabela').DataTable({
            responsive: true,
            "columnDefs": [
                {"type": "date-dd-MMM-yyyy", targets: 0},
                {"className": "dt-center", "targets": "_all"}
            ],
            dom: 'Bfrtip',
            buttons: [
                {
                    extend: 'pdf',
                    exportOptions: {
                        columns: ':visible'
                    },
                    text: 'Salvar(PDF)',
                    key: {
                        key: 's',
                        altkey: true
                    }
                },
                {
                    extend: 'print',
                    exportOptions: {
                        columns: ':visible'
                    },
                    text: 'Imprimir',
                    key: {
                        key: 'p',
                        altkey: true
                    }
                },
                {
                    extend: 'colvis',
                    text: 'Mostrar colunas'
                },
            ],
            "language": {
                "decimal": "",
                "emptyTable": "Nenhum registros para exibir!",
                "info": "Página _PAGE_ de _PAGES_",
                "infoEmpty": "Sem registros",
                "infoFiltered": "(Busca em um total de _MAX_ registros)",
                "infoPostFix": "",
                "thousands": ",",
                "lengthMenu": "Mostrar _MENU_ registros por página.",
                "loadingRecords": "Carregando...",
                "processing": "Processando...",
                "search": "Buscar:",
                "zeroRecords": "Nada encontrado!",
                "buttons.print": "Imprimir",
                "paginate": {
                    "first": "Primeira",
                    "last": "Ultima",
                    "next": "Prox.",
                    "previous": "Ant."
                },
                "aria": {
                    "sortAscending": ": ordem crescente",
                    "sortDescending": ": ordem decrescente"
                }
            }
        });
    });
</script>