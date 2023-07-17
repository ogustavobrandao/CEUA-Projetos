<div class="card p-3 borda-bottom" style="border-radius: 10px 10px 0px 0px;" id="fundo_2">
    <div class="row">
        <div class="col-md-12">
            @if(Auth::user()->tipo_usuario_id == 2 || Auth::user()->tipo_usuario_id == 1)
                <h2 class="titulo" id="titulo_2">3. Dados do(s) Colaborador(es) <strong style="color: red">*</strong>
                    @if(!isset($solicitacao->responsavel))
                        <small style="color: red; font-weight: bold">Necessária a criação de um
                            responsável</small>
                    @endif
                    <a class="float-end" id="2_btn_up"><i
                            class="fa-solid fa-circle-chevron-up"></i></a>
                    <a class="float-end" id="2_btn_down" style="display: none"><i
                            class="fa-solid fa-circle-chevron-down"></i></a>
                    @if(!isset($disabled) && isset($solicitacao->responsavel) && auth()->user()->tipo_usuario_id == 3)
                        <a class="float-end mr-2" href="#" data-toggle="modal" data-target="#colaboradorModal"
                           style="color: green"
                           title="Adicionar Colaborador">
                            <i class="fa-solid fa-circle-plus fa-2xl"></i></a>
                    @endif
                </h2>
            @else
                <h2 class="titulo" id="titulo_2">3. Dados do(s) Colaborador(es)
                    @if(!isset($solicitacao->responsavel))
                        <small style="color: red; font-weight: bold">Necessária a criação de um
                            responsável</small>
                    @endif
                    <a class="float-end" id="2_btn_up"><i
                            class="fa-solid fa-circle-chevron-up"></i></a>
                    <a class="float-end" id="2_btn_down" style="display: none"><i
                            class="fa-solid fa-circle-chevron-down"></i></a>
                    <a class="float-end mr-2" href="#" data-toggle="modal" data-target="#modalAdicionarColaborador"
                       style="color: green"
                       title="Adicionar Colaborador">
                        <i class="fa-solid fa-circle-plus fa-2xl"></i></a>
                </h2>
            @endif
        </div>
    </div>
</div>
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
                    <td class="text-center">
                        <a class="btn btn-primary"
                           data-toggle="modal"
                           data-target="#modalEditarColaborador{{$colaborador->id}}">Abrir</a>
                        <a class="btn btn-danger" href="{{route('solicitacao.colaborador.deletar', ['id' => $colaborador->id])}}">Deletar</a>
                    </td>
                </tr>
                @include('solicitacao.colaborador.colaborador_edicao_modal', ['solicitacao' => $solicitacao, 'colaborador' => $colaborador])
            @endforeach
            </tbody>
        </table>
    </div>
</div>
</div>

@include('solicitacao.colaborador.colaborador_cadastro_modal', ['solicitacao' => $solicitacao])
