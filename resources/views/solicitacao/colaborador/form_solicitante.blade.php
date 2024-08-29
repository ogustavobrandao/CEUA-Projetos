@extends('layouts.formulario')

@section('form')

    <div class="row">
        <div class="col-md-12" id="check-responsavel">
            @if (Auth::user()->hasRole('Avaliador') || Auth::user()->hasRole('Administrador'))
                <h2 class="titulo" id="titulo_2">3. Dados do(s) Colaborador(es) <strong style="color: red">*</strong>
                    @csrf
                    @if (!isset($solicitacao->responsavel))
                        <small style="color: red; font-weight: bold">Necessária a criação de um
                            responsável</small>
                    @endif
                    <a class="float-end" id="2_btn_up"><i class="fa-solid fa-circle-chevron-up"></i></a>
                    <a class="float-end" id="2_btn_down" style="display: none"><i
                            class="fa-solid fa-circle-chevron-down"></i></a>
                    @if (!isset($disabled) && isset($solicitacao->responsavel) && auth()->user()->hasRole('Solicitante'))
                        <a class="float-end mr-2" href="#" data-toggle="modal"
                            data-target="#modalAdicionarColaborador" style="color: green" title="Adicionar Colaborador">
                            <i class="fa-solid fa-circle-plus fa-2xl"></i></a>
                    @endif
                </h2>
            @else
                <h2 class="titulo" id="titulo_2 responsavel-check" style="color: white">3. Dados do(s) Colaborador(es)
                    @if (!isset($solicitacao->responsavel))
                        <small style="color: red; font-weight: bold">Necessária a criação de um
                            responsável</small>
                    @else
                        <a class="float-end" id="2_btn_up"><i class="fa-solid fa-circle-chevron-up"></i></a>
                        <a class="float-end" id="2_btn_down" style="display: none"><i
                                class="fa-solid fa-circle-chevron-down"></i></a>

                        <button class="float-end mr-2" type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalAdicionarColaborador" style="color: green"
                        title="Adicionar Colaborador">
                        <i class="fa-solid fa-circle-plus fa-2xl"></i>
                        </button>


                    @endif
                </h2>
            @endif
        </div>
    </div>
@include('solicitacao.colaborador.colaborador_cadastro_modal')
<div id="dados_colaborador">

    <div class="card p-3 bg-white" style="border-radius: 0px 0px 10px 10px;">
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">Nome</th>
                    <th scope="col">E-mail</th>
                    <th scope="col">CPF</th>
                    <th scope="col">Telefone</th>
                    <th class="text-center" scope="col" style="width: 20%">Ações</th>
                </tr>
                </thead>
                <tbody>
                    @if(isset($solicitacao->responsavel))
                        @foreach($solicitacao->responsavel->colaboradores as $colaborador)
                            <tr id="fundo_colaborador_{{$colaborador->id}}">
                                <td>
                                    {{$colaborador->nome}}
                                </td>
                                <td>
                                    {{$colaborador->contato->email}}
                                </td>
                                <td>
                                    {{$colaborador->cpf}}
                                </td>
                                <td>
                                    {{$colaborador->contato->telefone}}
                                </td>
                                <td>

                                    <div class="d-flex">
                                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalEditarColaborador{{$colaborador->id}}">
                                            Abrir
                                        </button>
                                        @include('solicitacao.colaborador.colaborador_edicao_modal_solicitante', ['solicitacao'=> $solicitacao, 'colaborador' => $colaborador])

                                        <button class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#modalDeletar{{$colaborador->id}}">Deletar</button>
                                        @include('solicitacao.solicitante.deletar_colaborador_modal', ['colaborador' => $colaborador])


                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    @endif


            </tbody>
        </table>
        @if (
            $solicitacao->status == 'avaliado' &&
                $solicitacao->avaliacao->first()->status == 'aprovadaPendencia' &&
                $status == 'reprovado')
            <div class="row justify-content-end">
                <div class="col-3">
                    <a type="button" class="btn btn-danger w-100"
                        onclick="showAvaliacaoIndividual({{ $tipo }},{{ $solicitacao->avaliacao->first()->id }},{{ $id }})">Pendência</a>

                </div>
            </div>
            <div class="modal-footer"></div>
        @endif
        <div class="modalColaborador">

        </div>
    </div>
</div>

<script src="{{ asset('js/masks.js') }}"></script>

<script>

    document.addEventListener('DOMContentLoaded', function() {
            var colabExperienciaPreviaSim = document.getElementById('colab_experiencia_previa_sim');
            if (colabExperienciaPreviaSim.checked) {
                colabExperienciaPreviaSim.click();
            }
        });

    $("#colab_treinamento_sim").click(function() {
        $("#colab_treinamento").show().find('input, textarea').prop('disabled', false);
        $("#colab_treinamento_file").show().find('input, textarea').prop('disabled', false);
        $("#divTreinamento").show().find('input, textarea').prop('disabled', false);

    });

    $("#colab_treinamento_nao").click(function() {
        $("#colab_treinamento").hide().find('input, textarea').prop('disabled', true);
        $("#colab_treinamento").prop('required', false);
        $("#colab_treinamento_file").hide().find('input, textarea').prop('disabled', true);
        $("#colab_treinamento_file").prop('required', false);
        $("#divTreinamento").hide().find('input, textarea').prop('disabled', true);

    });

    $("#colab_experiencia_previa_sim").click(function() {
        $("#divExperiencia").show().find('input, textarea').prop('disabled', false);
        $("#colab_treinamento_nao").prop('disabled', false);

    });

    $("#colab_experiencia_previa_nao").click(function() {
        $("#divExperiencia").hide().find('input, textarea').prop('disabled', true);
        $("#colab_experiencia_previa").prop('required', false);
        $("#colab_treinamento_sim").click();
        $("#colab_treinamento_nao").prop('disabled', true);

    });
</script>

<script>

    $(document).ready(function () {
        $('.modal').on('hidden.bs.modal', function () {
            limparErros();
        });
    });

    function limparErros() {
        $('.alert-danger').hide();
        $('select, input').removeClass('is-invalid');
    }


</script>
@if($errors->any() && session()->has('falhaValidacao'))
    @php
        $falhaValidacao = session()->get('falhaValidacao');
    @endphp

    @if($falhaValidacao == true)
        <script>
            $(document).ready(function() {
                $('#modalAdicionarColaborador').modal('show');

            });
        </script>
    @else
        <script>
            $(document).ready(function() {
                $('#modalEditarColaborador{{session()->get('colaborador')}}').modal('show');

            });
        </script>
    @endif
@endif
@endsection
