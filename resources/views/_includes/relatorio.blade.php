<script type="text/javascript" src="https://cdn.datatables.net/1.10.16/js/dataTables.material.min.js"></script>


<style>
    h1 {
        font-size: 15pt;
    }
</style>

<script>


    $(document).ready(function () {
        $('#tabela').DataTable({
            responsive: true,
            "columnDefs": [
                {"className": "dt-center", "targets": "_all"}
            ],
            dom: 'Bfrtip',
            buttons: [
                {
                    extend: 'pdf',
                    footer: true,
                    orientation: 'landscape',
                    pageSize: 'LEGAL',
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
                    footer: true,
                    customize: function (win) {

                        $(win.document.body)
                            .css('font-size', '10pt')
                            .prepend(
                                "<img src='{{url('icons/logo.png')}}' style='position:absolute; top:0; left:0;' />"
                            );

                        $(win.document.body).find('table')
                            .addClass('compact')
                            .css('font-size', 'inherit');
                    },
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