<!-- Modal Edicao-->
<div class="modal fade" id="modalEditarColaborador" tabindex="-1" role="dialog" aria-labelledby="modalEditarColaboradorLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalEditarColaboradorLabel">Editar Colaborador</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <!-- Conteúdo do formulário para adicionar colaboradores -->

            <form id="form2-1" method="POST" action="javascript:void(0)" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="solicitacao_id" value="{{$solicitacao_id}}">
                <input type="hidden" name="colaborador_id" value="{{$colaborador->id}}">
                <div class="modal-body">
                    <div class="mt-2">
                        <h3 class="h5">Informações Pessoais / Contato</h3>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="nome">Nome:</label>
                                    <input type="text" name="nome" class="form-control" id="nome" placeholder="Digite o nome do colaborador" value="{{$colaborador->nome}}" @if(Auth::user()->hasRole('Administrador') || Auth::user()->hasRole('Avaliador')) disabled @endif>
                                </div>
                            </div>
                            <div class="div_error nome_error" style="display: none">
                                    <span class="invalid-input">
                                        <strong class="nome_error_message"></strong>
                                    </span>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="email">E-mail:</label>
                                    <input type="email" name="email" class="form-control" id="email" placeholder="Digite o e-mail do colaborador" value="{{$colaborador->contato->email ?? 'Não informado'}}" @if(Auth::user()->hasRole('Administrador') || Auth::user()->hasRole('Avaliador')) disabled @endif>
                                </div>
                            </div>
                            <div class="div_error email_error" style="display: none">
                                    <span class="invalid-input">
                                        <strong class="email_error_message"></strong>
                                    </span>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="cpf">CPF:</label>
                                    <input type="text" name="cpf" class="form-control cpf" id="cpf" placeholder="Digite o CPF do colaborador" value="{{$colaborador->cpf}}" @if(Auth::user()->hasRole('Administrador') || Auth::user()->hasRole('Avaliador')) disabled @endif>
                                </div>
                            </div>
                            <div class="div_error cpf_error" style="display: none">
                                        <span class="invalid-input">
                                            <strong class="cpf_error_message"></strong>
                                        </span>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="telefone">Telefone:</label>
                                    <input type="text" name="telefone" class="form-control telefone" id="telefone" placeholder="Digite o telefone do colaborador" value="{{$colaborador->contato->telefone ?? 'Não Informado'}}" @if(Auth::user()->hasRole('Administrador') || Auth::user()->hasRole('Avaliador')) disabled @endif>
                                </div>
                            </div>
                            <div class="div_error telefone_error" style="display: none">
                                    <span class="invalid-input">
                                        <strong class="telefone_error_message"></strong>
                                    </span>
                            </div>
                        </div>
                        <h5>Informações Institucionais</h5>
                        <div class="row">
                            <div class="col-md-6">
                                <label for="instituicao">Instituicão:<strong
                                        style="color: red">*</strong></label>
                                <select class="form-control" name='instituicao_id'
                                        onchange="unidades()" @if(Auth::user()->hasRole('Administrador') || Auth::user()->hasRole('Avaliador')) disabled @endif>
                                    <option disabled selected>Selecione uma Instituição</option>
                                    @foreach($instituicaos as $instituicao)
                                        <option value="{{$instituicao->id}}" @if($colaborador->instituicao_id == $instituicao->id) selected @endif>{{$instituicao->nome}}</option>
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
                                <select class="form-control" id="grau_escolaridade" name="grau_escolaridade" @if(Auth::user()->hasRole('Administrador') || Auth::user()->hasRole('Avaliador')) disabled @endif>
                                    <option disabled selected>Selecione um Grau de Escolaridade</option>
                                    <option
                                         value="graduacao_completa" @if($colaborador->grau_escolaridade == 'graduacao_completa') selected @endif>
                                        Graduação Completa
                                    </option>
                                    <option value="graduacao_incompleta" @if($colaborador->grau_escolaridade == 'graduacao_incompleta') selected @endif>
                                        Graduação Incompleta
                                    </option>
                                    <option
                                         value="pos_graduacao_incompleta" @if($colaborador->grau_escolaridade == 'pos_graduacao_incompleta') selected @endif>
                                        Pós-Gradução Incompleta
                                    </option>
                                    <option
                                         value="pos_graduacao_completa" @if($colaborador->grau_escolaridade == 'pos_graduacao_completa') selected @endif>
                                        Pós-Gradução Completa
                                    </option>
                                    <option
                                         value="mestrado_incompleto" @if($colaborador->grau_escolaridade == 'mestrado_incompleto') selected @endif>
                                        Mestrado Incompleto
                                    </option>
                                    <option
                                         value="mestrado_completo" @if($colaborador->grau_escolaridade == 'mestrado_completo') selected @endif>
                                        Mestrado Completo
                                    </option>
                                    <option
                                         value="doutorado_completo" @if($colaborador->grau_escolaridade == 'doutorado_completo') selected @endif>
                                        Doutorado Incompleto
                                    </option>
                                    <option value="doutorado_incompleto" @if($colaborador->grau_escolaridade == 'doutorado_incompleto') selected @endif>
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
                        <br>
                        <h5>Informações Complementares</h5>
                        <div class="row">
                            <div class="col-md-6">
                                <div>
                                    <label>Experiência Prévia:</label>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="opcao_experiencia_previa-{{$colaborador->id}}" id="opcaoSim" value="on" required @if($colaborador->experiencia_previa != '') checked @endif
                                        @if(Auth::user()->hasRole('Administrador') || Auth::user()->hasRole('Avaliador')) disabled @endif>
                                        <label class="form-check-label" for="opcaoSim">Sim</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="opcao_experiencia_previa-{{$colaborador->id}}" id="opcaoNao" value="off" required @if($colaborador->experiencia_previa == '') checked @endif
                                        @if(Auth::user()->hasRole('Administrador') || Auth::user()->hasRole('Avaliador')) disabled @endif>
                                        <label class="form-check-label" for="opcaoNao">Não</label>
                                    </div>
                                </div>
                                <div class="row col-sm-12">
                                    <div class="col-sm-12" id="divexperiencia-{{$colaborador->id}}" @if($colaborador->experiencia_previa == '') style="display: none;" @endif>
                                        <label>Enviar Arquivo de Experiência Prévia:<strong style="color: red">*</strong></label>
                                        @if(Auth::user()->hasRole('Avaliador') || Auth::user()->hasRole('Administrador'))
                                            @if($colaborador->experiencia_previa == null)
                                                <br>
                                                <a class="btn btn-secondary" href="#">Não Enviado</a>
                                            @else
                                                <br>
                                                <a class="btn btn-primary m-3 download-button"
                                                            data-path="{{route('experiencias_previasColaborador.download', ['colaborador_id' => $colaborador->id])}}">Baixar
                                                            Experiência Prévia
                                                    </a>
                                            @endif
                                        @else
                                            <input name="experiencia_previa" class="form-control"
                                                   id="experiencia_previa" type="file" accept="application/pdf" style="width: 135px">
                                            @if($colaborador->experiencia_previa != null)
                                                <span style="border: 1px gray solid; border-radius: 10px; text-align: center; width: 180px; position: absolute; bottom: 0px; left: 155px; height: 38px; padding-top: 5px; background-color: #dcfadf">Um Arquivo Já Foi Enviado</span>
                                            @endif
                                        @endif
                                    </div>
                                    <div class="div_error experiencia_previa_error" style="display: none">
                                        <span class="invalid-input">
                                            <strong class="experiencia_previa_error_message"></strong>
                                        </span>
                                    </div>
                                </div>
                            </div>

                                <div class="col-sm-6">
                                    <div>
                                        <label class=" mt-2">Termo de Responsabilidade:</label>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="opcao_termo_responsabilidade-{{$colaborador->id}}" id="opcaoSim" value="on" required @if($colaborador->termo_responsabilidade != '') checked @endif
                                            @if(Auth::user()->hasRole('Administrador') || Auth::user()->hasRole('Avaliador')) disabled @endif>
                                            <label class="form-check-label" for="opcaoSim">Sim</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input default" type="radio" name="opcao_termo_responsabilidade-{{$colaborador->id}}" id="opcaoSim" value="off" required @if($colaborador->termo_responsabilidade == '') checked @endif
                                            @if(Auth::user()->hasRole('Administrador') || Auth::user()->hasRole('Avaliador')) disabled @endif>
                                            <label class="form-check-label" for="opcaoNao">Não</label>
                                        </div>
                                    </div>
                                    <div class="row col-sm-12">
                                        <div class="col-sm-12" id="divresponsabilidade-{{$colaborador->id}}" @if($colaborador->termo_responsabilidade == '') style="display: none;" @endif>
                                            <label>Enviar arquivo de Responsabilidade:</label>
                                                @if(Auth::user()->hasRole('Avaliador') || Auth::user()->hasRole('Administrador'))
                                                    @if($colaborador->termo_responsabilidade == null)
                                                        <br>
                                                        <a class="btn btn-secondary" href="#">Não Enviado</a>
                                                    @else
                                                        <a class="btn btn-primary m-3 download-button"
                                                           href="{{route('termo_responsabilidadeColaborador.download', ['colaborador_id' => $colaborador->id])}}"
                                                           data-path="{{route('termo_responsabilidadeColaborador.download', ['colaborador_id' => $colaborador->id])}}">Baixar
                                                            Termo de Responsabilidade</a>
                                                    @endif
                                                @else
                                                <input class="form-control" id="termo_responsabilidade" type="file" accept="application/pdf"
                                                       name="termo_responsabilidade" style="width: 135px" @if(Auth::user()->hasRole('Administrador') || Auth::user()->hasRole('Avaliador')) disabled @endif>

                                                @if($colaborador->termo_responsabilidade != null)
                                                    <span style="border: 1px gray solid; border-radius: 10px; text-align: center; width: 180px; position: absolute; bottom: 0px; left: 155px; height: 38px; padding-top: 5px; background-color: #dcfadf">Um Arquivo Já Foi Enviado</span>
                                                @endif
                                            @endif
                                        </div>
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
                                <label>Treinamento:</label>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="opcao_treinamento-{{$colaborador->id}}" id="opcaoSim" value="on" required @if($colaborador->treinamento != 'Não') checked @endif
                                    @if(Auth::user()->hasRole('Administrador') || Auth::user()->hasRole('Avaliador')) disabled @endif>
                                    <label class="form-check-label" for="opcaoSim">Sim</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="opcao_treinamento-{{$colaborador->id}}" id="opcaoNao" value="off" required @if($colaborador->treinamento == 'Não') checked @endif
                                    @if(Auth::user()->hasRole('Administrador') || Auth::user()->hasRole('Avaliador')) disabled @endif>
                                    <label class="form-check-label" for="opcaoNao">Não</label>
                                </div>
                            </div>
                            <div class="row" id="divTreinamento-{{$colaborador->id}}"  @if($colaborador->treinamento == 'Não') style="display: none;" @endif>
                                <div class="col-sm-12 mt-2">
                                    <label for="treinamento">Descrever o treinamento:<strong style="color: red">*</strong></label>
                                    <input class="form-control" id="treinamento"
                                    type="text" name="treinamento"
                                    value="{{$colaborador->treinamento}}"
                                    required autocomplete="treinamento" autofocus @if(Auth::user()->hasRole('Administrador') || Auth::user()->hasRole('Avaliador')) disabled @endif>
                                </div>
                            </div>
                        </div>
                        <div class="div_error treinamento_error" style="display: none">
                                    <span class="invalid-input">
                                        <strong class="treinamento_error_message"></strong>
                                    </span>
                        </div>
                    </div>

                </div>
                @if(Auth::user()->hasRole('Solicitante'))
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary btn-atualizar-colaborador">Atualizar</button>
                    </div>
                @else
                    <div class="modal-footer">
                    <button class="btn btn-secondary w-auto" data-dismiss="modal">Voltar</button>
                    </div>
                @endif
            </form>
        </div>
    </div>
</div>

<script>
    $('input[name="opcao_termo_responsabilidade-{{$colaborador->id}}"]').change(function() {
        var selectedOption = $(this).val();
        var divresponsabilidade = $('#divresponsabilidade-{{$colaborador->id}}');

        if (selectedOption === 'on') {
            divresponsabilidade.show();
        } else {
            $(divresponsabilidade).hide().find('input').prop('value', '');
            divresponsabilidade.hide();

        }
    });
    $('input[name="opcao_experiencia_previa-{{$colaborador->id}}"]').change(function() {
        var selectedOption = $(this).val();
        var divexperiencia = $('#divexperiencia-{{$colaborador->id}}');

        if (selectedOption === 'on') {

            divexperiencia.show();
        } else {
            $(divexperiencia).hide().find('input').prop('value', '');
            divexperiencia.hide();

        }
    });
    $('input[name="opcao_treinamento-{{$colaborador->id}}"]').change(function() {
        var selectedOption = $(this).val();
        var divTreinamento = $('#divTreinamento-{{$colaborador->id}}');

        if (selectedOption === 'on') {
            $(divTreinamento).hide().find('input').prop('value', '');
            divTreinamento.show();
        } else {
            $(divTreinamento).hide().find('input').prop('value', 'Não');
            divTreinamento.hide();

        }
    });

    $(document).on('click', '.btn-atualizar-colaborador', function (event) {
        event.preventDefault();

        var form = $('#form2-1')[0];
        var formData = new FormData(form);

        $.ajax({
            type: 'POST',
            url: '{{ route('solicitacao.colaborador.editar') }}',
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

<script>
    $(document).ready(function() {
        $('.download-button').click(function(e) {
            e.preventDefault();
            var downloadLink = $(this).attr('href');
            var verifyLink = $(this).data('path');

            $.ajax({
                url: verifyLink,
                method: 'GET',
                error: function (xhr, status) {

                    if (status == 'error') {
                        $('.modal').hide();
                        $('body').removeClass('modal-open');
                        $('body').css('padding-right', '');
                        $('body').css('overflow', '');
                        $('.modal-backdrop').remove();


                        $('#failModal').modal('show');
                        $('#failModal').find('.msg-fail').text('Arquivo não encontrado, é necessário solicitar o reenvio!');
                        setTimeout(function (){
                            $('#failModal').modal('hide');

                        },2000)
                        }
                }
            });
        });
    });
</script>
