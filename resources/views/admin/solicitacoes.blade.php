@extends('layouts.app')

@section('content')
    <div class="container">

        <ul class="nav nav-pills nav-fill py-3 col-12 center">
            <li class="pr-2 nav-item">
                <a class="nav-link active" data-toggle="pill" href="#page1">Atribuir Avaliador</a>
            </li>
            <li class="pl-2 nav-item">
                <a class="nav-link" data-toggle="pill" href="#page2">Solicitações Avaliadas</a>
            </li>
        </ul>


        <div class="tab-content">
            <div id="page1" class="tab-pane fade show active">
                @include('admin.solicitacao_atribuir_avaliador')
            </div>
            <div id="page2" class="tab-pane fade">
                @include('admin.apreciacao_index')
            </div>
        </div>
    </div>
    <script>

        $('.table').DataTable({
            searching: true,
            "language": {
                "lengthMenu": "Mostrar _MENU_ registros por página",
                "info": "Exibindo página _PAGE_ de _PAGES_",
                "search": "",
                "infoEmpty": "",
                "zeroRecords": "Nenhuma Solicitação Cadastrada.",
                "paginate": {
                    "previous": "Anterior",
                    "next": "Próximo"
                }
            },
            "dom": '<"top"f>rt<"bottom"lp><"clear">',
            "order": [0, 1],
            "columnDefs": [{
                "targets": [-1],
                "orderable": false
            }]
        });
        $('.dataTables_filter').addClass('here');
        $('.dataTables_filter').addClass('');
        $('.here').removeClass('dataTables_filter');
        $('.table-hover').removeClass('dataTable');
        $('.here').find('input').addClass('search-input');

        $('.search-input').addClass('search-bar-input border w-100')
        $('.search-input').wrap('<div class="row col-12 my-3"><div class="col-md-11 m-0 p-0 search-bar-column" style="height: 60px"> </div></div>')

        $('.here').find('label').contents().unwrap();
        $('.search-bar-column').after('<div class="col-1 p-0 m-0 float-left search-img"><img src="{{asset('images/search.png')}}" height="42px" width="50px"><div>');

    </script>
    <style>
        .list-group {
            max-height: 300px;
            margin-bottom: 10px;
            overflow-y: scroll;
            -webkit-overflow-scrolling: auto;
        }
    </style>
@endsection
