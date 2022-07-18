@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-md-12 mt-4">
            <h1 class="text-center borda-bottom">Lista de Instituições</h1>
        </div>
    </div>

    <table class="table table-hover">
        <thead>
        <tr>
            <th scope="col">Nome</th>
            <th class="w-25 text-center" scope="col">Ações</th>
        </tr>
        </thead>
        <tbody>
        @foreach($instituicaos as $instituicao)
            <tr>
                <td>{{$instituicao->nome}}</td>
                <td class="text-center"><a class="btn btn-group" href="{{route('unidade.index', ['instituicao_id' => $instituicao->id])}}"><i class="fa-solid fa-up-right-from-square"></i></a></td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection
