<div class="card p-3 bg-white" style="border-radius: 0px 0px 10px 10px">
    <form id="form1" method="POST" action="{{ route('solicitacao.responsavel.criar') }}" enctype="multipart/form-data">
        @csrf
        <input type="hidden" name="solicitacao_id" value="{{ $solicitacao->id }}">
        <div class="row">
            <h3 class="subtitulo">Informações Pessoais / Contato</h3>
            <div class="col-sm-4">
                <label for="nome">Nome Completo:<strong style="color: red">*</strong></label>
                <input class="form-control" id="nome" type="text"
                    name="nome" value="{{ $solicitacao->responsavel->nome }} autocomplete="nome">
            </div>

            <div class="col-sm-4">
                <label for="nome">E-mail:<strong style="color: red">*</strong></label>
                <input class="form-control" id="email" type="email" name="email" 
                value="{{ $solicitacao->responsavel->contato->email }}" autocomplete="email" >
            </div>

            <div class="col-sm-4">
                <label for="telefone">Telefone:<strong style="color: red">*</strong></label>
                <input class="form-control" id="telefone" type="text" name="telefone"
                    value="{{ $solicitacao->responsavel->contato->telefone }}" autocomplete="telefone">
            </div>

            <div class="col-sm-4 mt-2">
                <label for="cpf">CPF:<strong style="color: red">*</strong></label>
                <input class="form-control" id="cpf" type="text" name="cpf"
                    value="{{ $solicitacao->responsavel->cpf }}" autocomplete="cpf">
            </div>
        </div>

        <div>
            <h3 class="subtitulo">Informações Institucionais</h3>
            <div class="row">
                <div class="col-sm-4">
                    <label for="instituicao">Instituição:<strong style="color: red">*</strong></label>
                    <select class="form-control" id="instituicao" name="instituicao_id" onchange="unidades('')"
                        required>
                        <option disabled selected>Selecione uma Instituição</option>
                        @foreach ($instituicaos as $instituicao)
                            <option @if (
                                !empty($solicitacao->responsavel) &&
                                    $solicitacao->responsavel->departamento->unidade->instituicao->id == $instituicao->id) selected @endif value="{{ $instituicao->id }}">
                                {{ $instituicao->nome }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="col-sm-4">
                    <label for="unidade">Unidade:<strong style="color: red">*</strong></label>
                    <select class="form-control" id="unidade" name="unidade_id" onchange="departamentos()" required>
                        <option disabled selected>Selecione uma Unidade</option>
                        @if (isset($solicitacao->responsavel))
                            <option value="{{ $solicitacao->responsavel->departamento->unidade->id }}" selected>
                                {{ $solicitacao->responsavel->departamento->unidade->nome }}</option>
                        @endif
                    </select>
                </div>

                <div class="col-sm-4">
                    <label for="departamento">Departamento:<strong style="color: red">*</strong></label>
                    <select class="form-control" id="departamento" name="departamento_id">
                        <option disabled selected>Selecione um Departamento</option>
                        @if (isset($solicitacao->responsavel))
                            <option value="{{ $solicitacao->responsavel->departamento->id }}" selected>
                                {{ $solicitacao->responsavel->departamento->nome }}</option>
                        @else
                            <option value="" selected>Selecione um Departamento</option>
                        @endif
                    </select>
                </div>

            </div>
            <div class="row mt-2">
                <div class="col-sm-6">
                    <label for="vinculo_instituicao">Vínculo:<strong style="color: red">*</strong></label>
                    <select class="form-control" id="vinculo_instituicao" name="vinculo_instituicao" required>
                        <option disabled selected>Selecione um Vinculo</option>
                        <option @if (old('vinculo_instituicao') == 'pesquisador_docente' ||
                                (!empty($solicitacao->responsavel) && $solicitacao->responsavel->vinculo_instituicao == 'pesquisador_docente')) selected @endif value="pesquisador_docente">
                            Docente/Pesquisador
                        </option>
                        <option @if (old('vinculo_instituicao') == 'pesquisador_pos_graduando' ||
                                (!empty($solicitacao->responsavel) &&
                                    $solicitacao->responsavel->vinculo_instituicao == 'pesquisador_pos_graduando')) selected @endif value="pesquisador_pos_graduando">
                            Pesquisador/Pós - graduando
                        </option>
                        <option @if (old('vinculo_instituicao') == 'pesquisador_tecnico_superior' ||
                                (!empty($solicitacao->responsavel) &&
                                    $solicitacao->responsavel->vinculo_instituicao == 'pesquisador_tecnico_superior')) selected @endif value="pesquisador_tecnico_superior">
                            Pesquisador/Técnico Nível Superior
                        </option>
                        <option @if (old('vinculo_instituicao') == 'pesquisador_graduacao_incompleto' ||
                                (!empty($solicitacao->responsavel) &&
                                    $solicitacao->responsavel->vinculo_instituicao == 'pesquisador_graduacao_incompleto')) selected @endif
                            value="pesquisador_tecnico_superior">Pesquisador/Graduação Incompleta
                        </option>
                    </select>
                </div>

                <div class="col-sm-6">
                    <label for="grau_escolaridade">Grau de Escolaridade:<strong style="color: red">*</strong></label>
                    <select class="form-control" id="grau_escolaridade" name="grau_escolaridade" required>
                        <option disabled selected>Selecione um Grau de Escolaridade</option>
                        <option @if (old('grau_escolaridade') == 'graduacao_completa' ||
                                (!empty($solicitacao->responsavel) && $solicitacao->responsavel->grau_escolaridade == 'graduacao_completa')) selected @endif value="graduacao_completa">Graduação
                            Completa
                        </option>
                        <option @if (old('grau_escolaridade') == 'graduacao_incompleta' ||
                                (!empty($solicitacao->responsavel) && $solicitacao->responsavel->grau_escolaridade == 'graduacao_incompleta')) selected @endif value="graduacao_incompleta">
                            Graduação Incompleta
                        </option>
                        <option @if (old('grau_escolaridade') == 'pos_graduacao_incompleta' ||
                                (!empty($solicitacao->responsavel) &&
                                    $solicitacao->responsavel->grau_escolaridade == 'pos_graduacao_incompleta')) selected @endif value="pos_graduacao_incompleta">
                            Pós-Gradução Incompleta
                        </option>
                        <option @if (old('grau_escolaridade') == 'pos_graduacao_completa' ||
                                (!empty($solicitacao->responsavel) && $solicitacao->responsavel->grau_escolaridade == 'pos_graduacao_completa')) selected @endif value="pos_graduacao_completa">
                            Pós-Gradução Completa
                        </option>
                        <option @if (old('grau_escolaridade') == 'mestrado_incompleto' ||
                                (!empty($solicitacao->responsavel) && $solicitacao->responsavel->grau_escolaridade == 'mestrado_incompleto')) selected @endif value="mestrado_incompleto">
                            Mestrado Incompleto
                        </option>
                        <option @if (old('grau_escolaridade') == 'mestrado_completo' ||
                                (!empty($solicitacao->responsavel) && $solicitacao->responsavel->grau_escolaridade == 'mestrado_completo')) selected @endif value="mestrado_completo">Mestrado
                            Completo
                        </option>
                        <option @if (old('grau_escolaridade') == 'doutorado_completo' ||
                                (!empty($solicitacao->responsavel) && $solicitacao->responsavel->grau_escolaridade == 'doutorado_completo')) selected @endif value="doutorado_completo">
                            Doutorado Incompleto
                        </option>
                        <option @if (old('grau_escolaridade') == 'doutorado_incompleto' ||
                                (!empty($solicitacao->responsavel) && $solicitacao->responsavel->grau_escolaridade == 'doutorado_incompleto')) selected @endif value="doutorado_incompleto">
                            Doutorado Completo
                        </option>
                    </select>
                </div>
            </div>
        </div>

        <div class="row">
            <h3 class="subtitulo">Informações Complementares</h3>
            <div class="row ml-1 mt-2">
                <div class="col-sm-2">
                    <input class="form-check-input" type="radio" name="experiencia_previa_radio"
                        id="experiencia_previa_sim" @if (!empty($solicitacao->responsavel) && $solicitacao->responsavel->experiencia_previa != null) checked @endif>
                    <label class="form-check-label" for="experiencia_previa_sim">Sim</label>
                </div>
                <div class="col-sm-2">
                    <input class="form-check-input" type="radio" name="experiencia_previa_radio"
                        id="experiencia_previa_nao" @if (
                            (!empty($solicitacao->responsavel) && $solicitacao->responsavel->experiencia_previa == null) ||
                                empty($solicitacao->responsavel)) checked @endif value="false">
                    <label class="form-check-label" for="experiencia_previa_nao">
                        Não
                    </label>
                </div>
            </div>
        </div>

        <div class="col-sm-4 mt-4" id="anexo_experiencia">
            <label>Anexar Comprovante de Experiência Prévia:</label>
            @if($responsavel->experiencia_previa == null)
                <br>
                <a class="btn btn-secondary"
                href="#">Não Enviado</a>
            @else
                <a class="btn btn-primary download-button"
                data-path="{{route('experiencia.download', ['responsavel_id' => $responsavel->id])}}">Baixar
                    Arquivo de Experiência Prévia</a>
            @endif
        </div>

        


        <div class="row">
            <div>
                <div class="row ml-1 mt-2">
                    <div class="col-sm-2">
                        <input class="form-check-input" type="radio" name="treinamento_radio"
                            id="treinamento_sim" @if (!empty($solicitacao->responsavel) && $solicitacao->responsavel->treinamento != null) checked @endif>
                        <label class="form-check-label" for="treinamento">Sim</label>
                    </div>
                    <div class="col-sm-2">
                        <input class="form-check-input" type="radio" name="treinamento_radio"
                            id="treinamento_nao" @if ((!empty($solicitacao->responsavel) && $solicitacao->responsavel->treinamento == null) ||
                            $solicitacao->responsavel == null) checked @endif value="false">
                        <label class="form-check-label" for="treinamento">
                            Não
                        </label>
                    </div>
                </div>

            </div>
        </div>

        <div class="col-sm-4 mt-4" id="anexo_treinamento">
            <label>Anexar Comprovante de Treinamento:<strong style="color: red">*</strong></label>
            @if($responsavel->treinamento_file== null)
                <br>
                <a class="btn btn-secondary"
                href="#">Não Enviado</a>
            @else
                <a class="btn btn-primary download-button"
                data-path="{{route('treinamento_file.downloadTermoResponsabilidade', ['responsavel_id' => $responsavel->id])}}">Baixar
                    Arquivo de Treinamento</a>
            @endif
        </div>
        
  
        <div class="col-sm-10 mt-2" id="treinamento">
            <label>Descreva:<strong style="color: red">*</strong></label>
            <textarea class="form-control" name="treinamento" id="treinamento" autocomplete="treinamento"
                      >@if(!empty($solicitacao->responsavel) && $solicitacao->responsavel->treinamento != null){{$solicitacao->responsavel->treinamento}}@else{{old('treinamento')}}@endif</textarea>
        </div>

        <div class="row">
            <div class="col-sm-4 mt-4" id="anexo_termo_responsabilidade">
                <label>Termo de Responsabilidade:<strong style="color: red">*</strong></label>

                <a class="btn btn-primary download-button"
                data-path="{{route('termo_responsabilidade.downloadTermoResponsabilidade', ['responsavel_id' => $responsavel->id])}}">Baixar
                    Termo de Responsabilidade</a>

            </div>
        </div>
         
    </form>
</div>

<script src="{{ asset('js/masks.js') }}"></script>
<script>
    $('#form1').submit(function(event) {
        event.preventDefault();
        var form = $('#form1')[0];
        var formData = new FormData(form);
        $.ajax({
            type: 'POST',
            url: '{{ route('solicitacao.responsavel.criar') }}',
            data: formData,
            contentType: false,
            processData: false,
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            dataType: 'json',
            success: function(response) {
                var message = response.message;
                var responsavel = response.exist;
                if (message == 'success') {
                    var campo = response.campo;
                    $('#successModal').modal('show');
                    $('#successModal').find('.msg-success').text('A ' + campo +
                        ' foi salva com sucesso!');

                    $('.div_error').css('display', 'none');
                    setTimeout(function() {
                        $('#successModal').modal('hide');
                    }, 2000);
                }
                if (responsavel == 'true') {
                    checkResponsavel();
                }
            },
            error: function(xhr, status, error) {
                if (xhr.responseJSON && xhr.responseJSON.message) {
                    $('.div_error').css('display', 'none');
                    var errors = xhr.responseJSON.errors;
                    var statusCode = xhr.status;
                    if (statusCode == 422 && status == 'error') {
                        for (var field in errors) {
                            var fieldErrors = errors[field];
                            var errorMessage = ''
                            for (var i = 0; i < fieldErrors.length; i++) {
                                errorMessage += fieldErrors[i] + '\n';
                            }
                            var errorDiv = '#' + field + '_error'
                            var errorMessageTag = '#' + field + '_error_message';
                            $(errorMessageTag).html(errorMessage);
                            $(errorDiv).css('display', 'block')
                        }
                    }
                    if (status == 'error') {
                        $('#failModal').modal('show');
                        $('#failModal').find('.msg-fail').text(xhr.responseJSON.message);
                        setTimeout(function() {
                            $('#failModal').modal('hide');
                        }, 2000)
                    }
                } else {
                    alert("Erro na requisição Ajax: " + error);
                }
            }
        })
    })

    $(document).ready(function() {
        @if (!empty($solicitacao->responsavel) && $solicitacao->responsavel->treinamento != null)
            $("#treinamento_sim").attr('checked', true);
            $("#treinamento_sim").click();
        @else
            $("#treinamento_nao").attr('checked', true);
            $("#treinamento_nao").click();
        @endif

        @if (!empty($solicitacao->responsavel) && $solicitacao->responsavel->experiencia_previa != null)
            $("#experiencia_previa_sim").attr('checked', true);
            $("#experiencia_previa_sim").click();
        @else
            $("#experiencia_previa_nao").attr('checked', true);
            $("#experiencia_previa_nao").click();
        @endif

        @if (!empty($solicitacao->responsavel) && $solicitacao->responsavel->termo_responsabilidade != null)
            $("#termo_responsabilidade_sim").attr('checked', true);
            $("#termo_responsabilidade_sim").click();
        @else
            $("#termo_responsabilidade_nao").attr('checked', true);
            $("#termo_responsabilidade_nao").click();
        @endif

    });

    $("#treinamento_sim").click(function() {
        $("#treinamento").show().find('input, textarea').prop('disabled', false);
    });

    $("#treinamento_nao").click(function() {
        $("#treinamento").hide().find('input, textarea').prop('disabled', true);
        $("#treinamento").prop('required', false);
    });

    $("#experiencia_previa_sim").click(function() {
        $("#anexo_experiencia").show().find('input, textarea').prop('disabled', false);

    });

    $("#experiencia_previa_nao").click(function() {
        $("#anexo_experiencia").hide().find('input, textarea').prop('disabled', true);
        $("#experiencia_previa").prop('required', false);
    });

    $("#termo_responsabilidade_sim").click(function() {
        $("#anexo_termo_responsabilidade").show().find('input, textarea').prop('disabled', false);
    });

    $("#termo_responsabilidade_nao").click(function() {
        $("#anexo_termo_responsabilidade").hide().find('input, textarea').prop('disabled', true);
        $("#termo_responsabilidade").prop('required', false);
    });
</script>
<script>
    function checkResponsavel() {
        $('#responsavel-check').remove();
        $('#check-responsavel').html(`
                <h2 class="titulo" id="titulo_2">3. Dados do(s) Colaborador(es)
                    <a class="float-end" id="2_btn_up"><i class="fa-solid fa-circle-chevron-up"></i></a>
                    <a class="float-end" id="2_btn_down" style="display: none"><i class="fa-solid fa-circle-chevron-down"></i></a>
                    <a class="float-end mr-2" href="#" data-toggle="modal" data-target="#modalAdicionarColaborador"
                       style="color: green" title="Adicionar Colaborador">
                        <i class="fa-solid fa-circle-plus fa-2xl"></i>
                    </a>
                </h2>
            `);
    }
</script>
