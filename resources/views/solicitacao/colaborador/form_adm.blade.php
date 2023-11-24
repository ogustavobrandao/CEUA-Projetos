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
    @include('solicitacao.colaborador.colaborador_cadastro_modal_adm')
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
                <tbody id="colaboradores-info">

                </tbody>
            </table>
            
            @if($solicitacao->status == 'avaliado' && $solicitacao->avaliacao->first()->status == 'aprovadaPendencia'
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

            
            <div class="modalColaborador">

            </div>
        </div>
</div>
<script>
    function atualizarTabela() {
        $.ajax({
            url: '/solicitacao/colaborador_tabela/adm/' + {{$solicitacao->id}},
            method: 'GET',
            success: function(response) {
                $('#colaboradores-info').html(response.html);
            },
            error: function(response) {

                console.log('Erro ao atualizar a tabela.');
            }
        });
    }
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

    $(document).on('click', '.btn-abrirModal-colaborador', function (event) {
        event.preventDefault();
        var colaborador_id = $(this).data('colaborador-id');
        $.ajax({
            url: '/solicitacao/modal_atualizacao_colaborador/adm/' + colaborador_id,
            method: 'GET',
            success: function(response) {
                $('.modalColaborador').html('')
                $('.modalColaborador').html(response.colaborador_modal);
                $('#modalEditarColaborador').modal('show');
            },
            error: function(response) {
                console.log('Erro ao atualizar a modal.');
            }
        });
    });
    $(document).on('click', '[data-dismiss="modal"]', function() {
        $('#modalEditarColaborador').modal('hide');
    });
</script>
