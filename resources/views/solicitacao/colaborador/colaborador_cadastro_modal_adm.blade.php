<!-- Modal -->
<div class="modal fade" id="modalAdicionarColaborador" tabindex="-1" role="dialog" aria-labelledby="modalAdicionarColaboradorLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalAdicionarColaboradorLabel">Adicionar Colaborador</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <form id="form2" method="POST" action="javascript:void(0)" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="solicitacao_id" value="{{$solicitacao->id}}">
                <div class="modal-body">
                    <div class="mt-2">
                        <h3 class="h5">Informações Pessoais / Contato</h3>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="nome">Nome:</label>
                                    <input type="text" name="nome" class="form-control" value="" id="nome" placeholder="Digite o nome do colaborador" required>
                                </div>
                                <div class="div_error nome_error" style="display: none">
                                    <span class="invalid-input">
                                        <strong class="nome_error_message"></strong>
                                    </span>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="email">E-mail:</label>
                                    <input type="email" name="email" class="form-control" value="" id="email" placeholder="Digite o e-mail do colaborador" required>
                                </div>
                                <div class="div_error email_error" style="display: none">
                                    <span class="invalid-input">
                                        <strong class="email_error_message"></strong>
                                    </span>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="cpf">CPF:</label>
                                    <input type="text" name="cpf" class="form-control cpf" value="" id="cpf" placeholder="Digite o CPF do colaborador" required>
                                    <div class="div_error cpf_error" style="display: none">
                                        <span class="invalid-input">
                                            <strong class="cpf_error_message"></strong>
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="telefone">Telefone:</label>
                                    <input type="text" name="telefone" class="form-control telefone" value="" id="telefone" placeholder="Digite o telefone do colaborador" required>
                                </div>
                                <div class="div_error telefone_error" style="display: none">
                                    <span class="invalid-input">
                                        <strong class="telefone_error_message"></strong>
                                    </span>
                                </div>
                            </div>
                        </div>
                        <h5>Informações Institucionais</h5>
                        <div class="row">
                            <div class="col-md-6">
                                <label for="instituicao">Instituição:<strong
                                        style="color: red">*</strong></label>
                                <select class="form-control" name='instituicao_id'
                                        onchange="unidades()" required>
                                    <option class="default" disabled selected>Selecione uma Instituição</option>
                                    @foreach($instituicaos as $instituicao)
                                        <option value="{{$instituicao->id}}">{{$instituicao->nome}}</option>
                                    @endforeach
                                </select>
                                <div class="div_error instituicao_error" style="display: none">
                                    <span class="invalid-input">
                                        <strong class="instituicao_error_message"></strong>
                                    </span>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <label for="grau_escolaridade">Grau de Escolaridade:<strong
                                        style="color: red">*</strong></label>
                                <select class="form-control" id="grau_escolaridade" name="grau_escolaridade" required>
                                    <option class="default" disabled selected>Selecione um Grau de Escolaridade</option>
                                    <option
                                         value="graduacao_completa">
                                        Graduação Completa
                                    </option>
                                    <option
                                         value="graduacao_incompleta">
                                        Graduação Incompleta
                                    </option>
                                    <option
                                         value="pos_graduacao_incompleta">
                                        Pós-Gradução Incompleta
                                    </option>
                                    <option
                                         value="pos_graduacao_completa">
                                        Pós-Gradução Completa
                                    </option>
                                    <option
                                         value="mestrado_incompleto">
                                        Mestrado Incompleto
                                    </option>
                                    <option
                                         value="mestrado_completo">
                                        Mestrado Completo
                                    </option>
                                    <option
                                         value="doutorado_completo">
                                        Doutorado Incompleto
                                    </option>
                                    <option value="doutorado_incompleto">
                                        Doutorado Completo
                                    </option>
                                </select>
                                <div class="div_error grau_escolaridade_error" style="display: none">
                                    <span class="invalid-input">
                                        <strong class="grau_escolaridade_error_message"></strong>
                                    </span>
                                </div>
                            </div>
                        </div>
                        <h5 class="py-3">Informações Complementares</h5>
                        <div class="row">
                            <div class="col-md-6">
                                <div>
                                    <label>Experiência Prévia:</label>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="opcao_experiencia_previa" id="opcaoSim" value="on" required>
                                        <label class="form-check-label" for="opcaoSim">Sim</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input default" type="radio" name="opcao_experiencia_previa" id="opcaoNao" value="off" required checked>
                                        <label class="form-check-label" for="opcaoNao">Não</label>
                                    </div>
                                </div>
                                <div class="col-sm-12" id="divexperiencia" style="display: none;">
                                    <label>Enviar Arquivo de Experiência Prévia:</label>
                                    <input required name="experiencia_previa" class="form-control" value="" id="experiencia_previa" type="file" accept="application/pdf">
                                    <div class="div_error experiencia_previa_error" style="display: none">
                                        <span class="invalid-input">
                                            <strong class="experiencia_previa_error_message"></strong>
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div>
                                    <label class="mt-2">Termo de Responsabilidade:</label>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="opcao_termo_responsabilidade" id="opcaoSim" value="on" required>
                                        <label class="form-check-label" for="opcaoSim">Sim</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input default" type="radio" name="opcao_termo_responsabilidade" id="opcaoNao" value="off" required checked>
                                        <label class="form-check-label" for="opcaoNao">Não</label>
                                    </div>
                                </div>
                                <div class="col-sm-12" id="divresponsabilidade" style="display: none;">
                                    <label>Enviar arquivo de Responsabilidade:</label>
                                    <input required class="form-control" id="termo_responsabilidade" type="file" accept="application/pdf" name="termo_responsabilidade" value="">
                                    <div class="div_error termo_responsabilidade_error" style="display: none">
                                        <span class="invalid-input">
                                            <strong class="termo_responsabilidade_error_message"></strong>
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12 mt-2">
                                <label class="py-3">Treinamento:</label>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="opcao_treinamento" id="opcaoSim" value="on" required>
                                    <label class="form-check-label" for="opcaoSim">Sim</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input default" type="radio" name="opcao_treinamento" id="opcaoNao" value="off" required checked>
                                    <label class="form-check-label" for="opcaoNao">Não</label>
                                </div>
                            </div>
                        </div>

                        <div class="row" id="divTreinamento" style="display: none;">
                            <div class="col-sm-12 mt-2">
                                <label for="treinamento">Descrever o treinamento:<strong style="color: red">*</strong></label>
                                <input class="form-control" id="treinamento" type="text" name="treinamento" value="Não" required autocomplete="treinamento" autofocus>
                            </div>
                            <div class="div_error treinamento_error" style="display: none">
                                <span class="invalid-input">
                                    <strong class="treinamento_error_message"></strong>
                                </span>
                            </div>
                        </div>

                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary btn-salvar-colaborador" id="btnEnviar">Salvar</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script src="{{ asset('js/masks.js') }}"></script>
<script>
    $('input[name="opcao_termo_responsabilidade"]').change(function() {
        var selectedOption = $(this).val();
        var divresponsabilidade = $('#divresponsabilidade');

        if (selectedOption === 'on') {

            divresponsabilidade.show();
        } else {
            $(divresponsabilidade).hide().find('input').prop('value', '');
            divresponsabilidade.hide();

        }
    });

    $('input[name="opcao_experiencia_previa"]').change(function() {
        var selectedOption = $(this).val();
        var divexperiencia = $('#divexperiencia');

        if (selectedOption === 'on') {

            divexperiencia.show();
        } else {
            $(divexperiencia).hide().find('input').prop('value', '');
            divexperiencia.hide();

        }
    });

    $('input[name="opcao_treinamento"]').change(function() {
        var selectedOption = $(this).val();
        var divTreinamento = $('#divTreinamento');

        if (selectedOption === 'on') {
            $(divTreinamento).hide().find('input').prop('value', '');
            divTreinamento.show();
        } else {
            $(divTreinamento).hide().find('input').prop('value', 'Não');
            divTreinamento.hide();

        }
    });

    $(document).on('click', '.btn-salvar-colaborador', function (event) {
        event.preventDefault();

        var form = $('#form2')[0];
        var formData = new FormData(form);

        $.ajax({
            type: 'POST',
            url: '{{ route('solicitacao.colaborador.criar') }}',
            data: formData,
            contentType: false,
            processData: false,
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            dataType: 'json',
            success: function (response) {
                var message = response.message;

                if (message == 'success') {
                    atualizarTabela();
                    $('.div_error').css('display', 'none');
                    $('#modalAdicionarColaborador').find('input:not([name="solicitacao_id"]):not([name="_token"]):not([name="opcao_treinamento"]):not([name="opcao_experiencia_previa"]):not([name="opcao_termo_responsabilidade"]), textarea').val('');

                    $('#modalAdicionarColaborador').find('.default').prop('selected', true);
                    $('#modalAdicionarColaborador').find('.default').prop('checked', true);
                    $('#divexperiencia').hide();
                    $('#divTreinamento').hide();

                    $('.modal').hide();
                    $('body').removeClass('modal-open');
                    $('body').css('padding-right', '');
                    $('.modal-backdrop').remove();


                    $('#successModal').modal('show');
                    $('#successModal').find('.msg-success').text('O colaborador foi salvo com sucesso!');

                    $('.div_error').css('display', 'none');
                    setTimeout(function () {
                        $('#successModal').modal('hide');
                    }, 2000);
                }
            },
            error: function (xhr, status, error) {
                if (xhr.responseJSON && xhr.responseJSON.message) {
                    $('.div_error').css('display', 'none');
                    var errors = xhr.responseJSON.errors;
                    var statusCode = xhr.status;
                    if (statusCode == 422 && status == 'error') {
                        for (var field in errors) {
                            var fieldErrors = errors[field];
                            var errorMessage = '';
                            for (var i = 0; i < fieldErrors.length; i++) {
                                errorMessage += fieldErrors[i] + '\n';
                            }
                            var errorDiv = '.' + field + '_error';
                            var errorMessageTag = '.' + field + '_error_message';
                            $(errorMessageTag).html(errorMessage);
                            $(errorDiv).css('display', 'block');
                        }
                    }
                } else {
                    alert("Erro na requisição Ajax: " + error);
                }
            }
        });

        return false;
    });
</script>
