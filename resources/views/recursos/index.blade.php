@extends('layouts.admin')

@section('styles')
<link rel="stylesheet" href="{{asset('admin/datatables')}}/dataTables.css" />
@endsection

@section('content')
<div class="container py-2">
    <a class="btn btn-primary mb-2" href="{{url('admin/recursos/create')}}" class="btn mb-2 mt-4">
        <i class="fa fa-save"></i> Cadastrar Recurso
    </a>
    <div class="table-responsive radius-md">
        <table id="ajaxTable" class="table" style="width: 100%;">
            <thead>
                <tr>
                    <th class="text-primary">Id</th>
                    <th class="text-primary">Aula Id</th>
                    <th class="text-primary">Recurso</th>
                    <th class="text-primary">Tipo</th>
                </tr>
            </thead>
        </table>
    </div>
</div>
@endsection

@section('scripts')
<script type="text/javascript" src="{{asset('admin/datatables')}}/datatables.js"></script>
<script>
    const DATATABLE_PTBR = {
        "sEmptyTable": "Nenhum registro encontrado",
        "sInfo": "Mostrando de _START_ até _END_ de _TOTAL_ registros",
        "sInfoEmpty": "Mostrando 0 até 0 de 0 registros",
        "sInfoFiltered": "(Filtrados de _MAX_ registros)",
        "sInfoPostFix": "",
        "sInfoThousands": ".",
        "sLengthMenu": "_MENU_ resultados por página",
        "sLoadingRecords": "Carregando...",
        "sProcessing": "Processando...",
        "sZeroRecords": "Nenhum registro encontrado",
        "sSearch": "Pesquisar",
        "oPaginate": {
            "sNext": "Próximo",
            "sPrevious": "Anterior",
            "sFirst": "Primeiro",
            "sLast": "Último"
        },
        "oAria": {
            "sSortAscending": ": Ordenar colunas de forma ascendente",
            "sSortDescending": ": Ordenar colunas de forma descendente"
        },
        "select": {
            "rows": {
                "_": "Selecionado %d linhas",
                "0": "Nenhuma linha selecionada",
                "1": "Selecionado 1 linha"
            }
        }
    }

    $(document).ready(function () {
        $('#ajaxTable').DataTable({
            oLanguage: DATATABLE_PTBR,
            ajax: '{{url("admin/recursos")}}',
            columns: [
                { data: 'id' },
                { data: 'aula_id' },
                { data: 'nome' },
                { data: 'tipo' },
            ],
        });
    });
</script>
@endsection
