<script>
    $(document).ready(function () {
        $('#tabela').DataTable({
            responsive: true,
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