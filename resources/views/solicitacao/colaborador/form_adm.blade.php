<div class="card p-3 borda-bottom" style="border-radius: 10px 10px 0px 0px;" id="fundo_2">
    <div class="row">
        <div class="col-md-12" id="check-responsavel">
            
            <h2 class="titulo" id="titulo_2">3. Dados do(s) Colaborador(es) <strong style="color: red">*</strong>
                @csrf
                @if(!isset($solicitacao->responsavel))
                    <small style="color: red; font-weight: bold">Necessária a criação de um
                        responsável</small>
                @endif
                <a class="float-end" id="2_btn_up"><i
                        class="fa-solid fa-circle-chevron-up"></i></a>
                <a class="float-end" id="2_btn_down" style="display: none"><i
                        class="fa-solid fa-circle-chevron-down"></i></a>
            </h2>
            
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
                        
                        <td>
                            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalEditarColaborador{{$colaborador->id}}">
                                Abrir
                            </button>
                            @include('solicitacao.colaborador.colaborador_edicao_modal_solicitante', ['solicitacao'=> $solicitacao, 'colaborador' => $colaborador, 'visualizar' => true])
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        
        @if(!isset($visualizar) && $solicitacao->status == 'avaliado' && $solicitacao->avaliacao->first()->status == 'aprovadaPendencia'
            && $status == "reprovado" )
            <div class="row justify-content-end">
                <div class="col-3">
                    <a type="button" class="btn btn-danger w-100"
                        onclick="showAvaliacaoIndividual({{$tipo}},{{$solicitacao->avaliacao->first()->id}},{{$id}})"
                    >Pendência</a>

                </div>
            </div>
            <div class="modal-footer"></div>
        @endif

    </div>
</div>
<script>
    
    $(document).ready(function() {
        atualizarTabela();
    });

    $(document).on('click', '.btn-deletar-colaborador', function (event) {
        event.preventDefault();

        var colaboradorId = $(this).data('colaborador-id');

        $.ajax({
            url: '/solicitacao/colaborador/' + colaboradorId,
            data: {
                _token: '{{ csrf_token() }}',
            },
            dataType: 'json',
            success: function (response) {
                var message = response.message;
                if (message == 'success') {
                    atualizarTabela();
                }
            },
            error: function (xhr, status, error) {
                alert("Erro na requisição Ajax: " + error);
            }
        });

        return false;
    });
</script>
