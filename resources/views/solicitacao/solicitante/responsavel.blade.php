<div class="card p-3 bg-white" style="border-radius: 0px 0px 10px 10px">
    <form id="form1" method="POST" action="{{ route('solicitacao.responsavel.criar') }}" enctype="multipart/form-data">
        @csrf
        <input type="hidden" name="solicitacao_id" value="{{ $solicitacao->id }}">
        <div class="row">
            <h3 class="subtitulo">Informações Pessoais / Contato</h3>
            <div class="col-sm-4">
                <label for="nome">Nome Completo:<strong style="color: red">*</strong></label>
                <input class="form-control @error('nome') is-invalid @enderror" id="nome" type="text"
                    name="nome" required
                    value="@if(!empty($solicitacao->responsavel) && $solicitacao->responsavel->nome != null){{ $solicitacao->responsavel->nome }}@else{{ old('nome') }}@endif"
                     autocomplete="nome" autofocus>

                <div class="div_error" id="nome_error" style="display: none">
                    <span class="invalid-input">
                        <strong id="nome_error_message"></strong>
                    </span>
                </div>
            </div>

            <div class="col-sm-4">
                <label for="nome">E-mail:<strong style="color: red">*</strong></label>
                <input class="form-control @error('email') is-invalid @enderror" id="email" type="email"
                    name="email" required
                    value="@if (!empty($solicitacao->responsavel) && $solicitacao->responsavel->contato->email != null) {{ $solicitacao->responsavel->contato->email }} @else {{ old('email') }} @endif"
                     autocomplete="email" autofocus>

                <div class="div_error" id="email_error" style="display: none">
                    <span class="invalid-input">
                        <strong id="email_error_message"></strong>
                    </span>
                </div>
            </div>

            <div class="col-sm-4">
                <label for="telefone">Telefone:<strong style="color: red">*</strong></label>
                <input class="form-control @error('telefone') is-invalid @enderror" id="telefone" type="text"
                    name="telefone" required
                    value="@if(!empty($solicitacao->responsavel) && $solicitacao->responsavel->contato->telefone != null){{ $solicitacao->responsavel->contato->telefone }}@else{{old('telefone')}}@endif"
                     autocomplete="telefone" autofocus>

                <div class="div_error" id="telefone_error" style="display: none">
                    <span class="invalid-input">
                        <strong id="telefone_error_message"></strong>
                    </span>
                </div>
            </div>

            <div class="col-sm-4 mt-2">
                <label for="cpf">CPF:<strong style="color: red">*</strong></label>
                <input class="form-control @error('cpf') is-invalid @enderror" id="cpf" type="text"
                    name="cpf" required
                    value="@if (!empty($solicitacao->responsavel) && $solicitacao->responsavel->cpf != null) {{ $solicitacao->responsavel->cpf }} @else{{ old('cpf') }} @endif"
                     autocomplete="cpf" autofocus>

                <div class="div_error" id="cpf_error" style="display: none">
                    <span class="invalid-input">
                        <strong id="cpf_error_message"></strong>
                    </span>
                </div>
            </div>
        </div>

        <div>
            <h3 class="subtitulo">Informações Institucionais</h3>
            <div class="row">
                <div class="col-sm-4">
                    <label for="instituicao">Instituição:<strong style="color: red">*</strong></label>
                    <select required class="form-control @error('instituicao_id') is-invalid @enderror" id="instituicao" name="instituicao_id" onchange="unidades('')">
                        <option disabled selected>Selecione uma Instituição</option>
                        @foreach ($instituicaos as $instituicao)
                            <option @if (
                                !empty($solicitacao->responsavel) &&
                                    $solicitacao->responsavel->departamento->unidade->instituicao->id == $instituicao->id) selected @endif value="{{ $instituicao->id }}">
                                {{ $instituicao->nome }}</option>
                        @endforeach
                    </select>

                    <div class="div_error" id="instituicao_id_error" style="display: none">
                        <span class="invalid-input">
                            <strong id="instituicao_id_error_message"></strong>
                        </span>
                    </div>
                </div>

                <div class="col-sm-4">
                    <label for="unidade">Unidade:<strong style="color: red">*</strong></label>
                    <select class="form-control @error('unidade_id') is-invalid @enderror" id="unidade" name="unidade_id" onchange="departamentos()" >
                        <option disabled selected>Selecione uma Unidade</option>
                        @if (isset($solicitacao->responsavel))
                            <option value="{{ $solicitacao->responsavel->departamento->unidade->id }}" selected>
                                {{ $solicitacao->responsavel->departamento->unidade->nome }}</option>
                        @endif
                    </select>

                    <div class="div_error" id="unidade_id_error" style="display: none">
                        <span class="invalid-input">
                            <strong id="unidade_id_error_message"></strong>
                        </span>
                    </div>
                </div>

                <div class="col-sm-4">
                    <label for="departamento">Departamento:<strong style="color: red">*</strong></label>
                    <select class="form-control @error('departamento_id') is-invalid @enderror" id="departamento" name="departamento_id" >
                        <option disabled selected>Selecione um Departamento</option>
                        @if (isset($solicitacao->responsavel))
                            <option value="{{ $solicitacao->responsavel->departamento->id }}" selected>
                                {{ $solicitacao->responsavel->departamento->nome }}</option>
                        @else
                            <option value="" selected>Selecione um Departamento</option>
                        @endif
                    </select>

                    <div class="div_error" id="departamento_id_error" style="display: none">
                        <span class="invalid-input">
                            <strong id="departamento_id_error_message"></strong>
                        </span>
                    </div>
                </div>

            </div>
            <div class="row mt-2">
                <div class="col-sm-6">
                    <label for="vinculo_instituicao">Vínculo:<strong style="color: red">*</strong></label>
                    <select required class="form-control @error('vinculo_instituicao') is-invalid @enderror" id="vinculo_instituicao" name="vinculo_instituicao" >
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

                    <div class="div_error" id="vinculo_instituicao_error" style="display: none">
                        <span class="invalid-input">
                            <strong id="vinculo_instituicao_error_message"></strong>
                        </span>
                    </div>
                </div>

                <div class="col-sm-6">
                    <label for="grau_escolaridade">Grau de Escolaridade:<strong style="color: red">*</strong></label>
                    <select required class="form-control @error('grau_escolaridade') is-invalid @enderror" id="grau_escolaridade" name="grau_escolaridade" >
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
                    
                    <div class="div_error" id="grau_escolaridade_error" style="display: none">
                        <span class="invalid-input">
                            <strong id="grau_escolaridade_error_message"></strong>
                        </span>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <h3 class="subtitulo">Informações Complementares</h3>
            @if (Auth::user()->hasRole('Solicitante'))
                <div class="col-sm-2">
                    <label>Experiência Prévia:</label>
                </div>
            @endif

            <div class="row ml-1 mt-2">
                <div class="col-sm-2">
                    <input class="form-check-input" type="radio" name="experiencia_previa_radio"
                        id="experiencia_previa_sim" @if (!empty($solicitacao->responsavel) && $solicitacao->responsavel->experiencia_previa != null) checked @endif>
                    <label class="form-check-label" for="experiencia_previa_sim">Sim</label>
                </div>
                <div class="col-sm-2">
                    <input class="form-check-input" type="radio" name="experiencia_previa_radio"
                        id="experiencia_previa_nao" @if ((!empty($solicitacao->responsavel) && $solicitacao->responsavel->experiencia_previa == null) ||
                            empty($solicitacao->responsavel)) checked @endif value="false">
                    <label class="form-check-label" for="experiencia_previa_nao">
                        Não
                    </label>
                </div>
            </div>
        </div>

        <div class="col-sm-4 mt-4" id="anexo_experiencia" style="display: none;">
            <label>Anexar Comprovante de Experiência Prévia:</label>
            <input class="form-control @error('experiencia_previa') is-invalid @enderror" id="experiencia_previa"
                type="file" accept="application/pdf" name="experiencia_previa" value=""
                autocomplete="experiencia_previa" @if (isset($solicitacao->responsavel) && $solicitacao->responsavel->experiencia_previa != null) style="width: 135px" @endif>

            <div class="div_error" id="experiencia_previa_error" style="display: none">
                <span class="invalid-input">
                    <strong id="experiencia_previa_error_message"></strong>
                </span>
            </div>
            @if (isset($solicitacao->responsavel) && $solicitacao->responsavel->experiencia_previa != null)
                <span
                    style="border: 1px gray solid; border-radius: 10px; text-align: center; width: 180px; position: absolute; bottom: 0px; left: 155px; height: 38px; padding-top: 5px; background-color: #dcfadf">Um
                    Arquivo Já Foi Enviado</span>
            @endif
        </div>

        <div class="row">
            @if (Auth::user()->hasRole('Solicitante'))
                <div class="col-sm-2 mt-2">
                    <label for="treinamento">Treinamento:</label>
                </div>
            @endif
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

        <div class="col-sm-4 mt-4" id="anexo_treinamento" style="display: none;">
            <label>Anexar Comprovante de Treinamento:<strong style="color: red">*</strong></label>
            <input class="form-control @error('treinamento_file') is-invalid @enderror" id="treinamento_file"
                type="file" accept="application/pdf" name="treinamento_file" 
                autocomplete="treinamento_file" @if (isset($solicitacao->responsavel) && $solicitacao->responsavel->treinamento_file != null) value="{{$solicitacao->responsavel->treinamento_file}}" style="width: 135px"@endif>

            <div class="div_error" id="treinamento_file_error" style="display: none">
                <span class="invalid-input">
                    <strong id="treinamento_file_error_message"></strong>
                </span>
            </div>
            @if (isset($solicitacao->responsavel) && $solicitacao->responsavel->treinamento_file != null)
                <span
                    style="border: 1px gray solid; border-radius: 10px; text-align: center; width: 180px; position: absolute; bottom: 0px; left: 155px; height: 38px; padding-top: 5px; background-color: #dcfadf">Um
                    Arquivo Já Foi Enviado</span>
            @endif
        </div>
        
        {{-- @if (!empty($solicitacao->responsavel) && $solicitacao->responsavel->treinamento != null)
                    {{ $solicitacao->responsavel->treinamento }}
        @else
            {{ old('treinamento') }}
        @endif --}}
        



        <div class="col-sm-10 mt-2" id="treinamento" style="display: none;">
            <label>Descreva:<strong style="color: red">*</strong></label>
            <textarea class="form-control @error('treinamento') is-invalid @enderror"
                      name="treinamento" id="treinamento" autocomplete="treinamento" autofocus
                      >@if(!empty($solicitacao->responsavel) && $solicitacao->responsavel->treinamento != null){{$solicitacao->responsavel->treinamento}}@else{{old('treinamento')}}@endif</textarea>
        </div>

        <div class="div_error" id="treinamento_error" style="display: none">
            <span class="invalid-input">
                <strong id="treinamento_error_message"></strong>
            </span>
        </div>
                 
        
        <div class="row">
            <div class="col-sm-4 mt-4" id="anexo_termo_responsabilidade">
                <label>Termo de Responsabilidade:<strong style="color: red">*</strong></label>
                {{-- <li><a href="" target="blank">Modelo Termo de Responsabilidade</a></li> --}}
                <input class="form-control @error('termo_responsabilidade') is-invalid @enderror"
                    id="termo_responsabilidade" type="file" accept="application/pdf" name="termo_responsabilidade"
                    value="" autocomplete="termo_responsabilidade" required
                    @if (isset($solicitacao->responsavel) && $solicitacao->responsavel->termo_responsabilidade != null) style="width: 135px" @endif>
                <div class="div_error" id="termo_responsabilidade_error" style="display: none">
                    <span class="invalid-input">
                        <strong id="termo_responsabilidade_error_message"></strong>
                    </span>
                </div>
                @if (isset($solicitacao->responsavel) && $solicitacao->responsavel->termo_responsabilidade != null)
                    <span style="border: 1px gray solid; border-radius: 10px; text-align: center;
                        width: 180px; position: absolute; bottom: 0px; left: 155px; height: 38px; 
                        padding-top: 5px; background-color: #dcfadf">
                        Um Arquivo Já Foi Enviado
                    </span>
                @endif
            </div>
            
        </div>


        
        @include('component.botoes_new_form')

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
                submitButton = $('#form1').find(':submit');
                markSaved(submitButton, true);

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

       

    });

    $("#treinamento_sim").click(function() {
        $("#treinamento").show().find('input, textarea').prop('disabled', false);
        $("#anexo_treinamento").show().find('input, textarea').prop('disabled', false);
        
    });

    $("#treinamento_nao").click(function() {
        $("#treinamento").hide().find('input, textarea').prop('disabled', true);
        $("#treinamento").prop('required', false);
        $("#anexo_treinamento").hide().find('input, textarea').prop('disabled', true);

    });

    $("#experiencia_previa_sim").click(function() {
        $("#anexo_experiencia").show().find('input, textarea').prop('disabled', false);
        $("#treinamento_nao").prop('disabled', false);


    });

    $("#experiencia_previa_nao").click(function() {
        $("#anexo_experiencia").hide().find('input, textarea').prop('disabled', true);
        $("#experiencia_previa").prop('required', false);
        $("#treinamento_sim").click();
        $("#treinamento_nao").prop('disabled', true);


        
        
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
<script>
    $(document).ready(function() {
        $('.download-button').click(function(e) {
            e.preventDefault();
            var downloadLink = $(this).attr('href');
            var verifyLink = $(this).data('path');

            $.ajax({
                url: verifyLink,
                method: 'GET',
                xhrFields: {
                    responseType: 'blob'
                },
                success: function(data) {
                    var a = document.createElement('a');
                    var url = window.URL.createObjectURL(data);
                    a.href = url;
                    a.download = 'arquivo.pdf';
                    document.body.append(a);
                    a.click();
                    a.remove();
                    window.URL.revokeObjectURL(url);
                },
                error: function(xhr, status) {

                    if (status == 'error') {
                        $('.modal').hide();
                        $('body').removeClass('modal-open');
                        $('body').css('padding-right', '');
                        $('body').css('overflow', '');
                        $('.modal-backdrop').remove();


                        $('#failModal').modal('show');
                        $('#failModal').find('.msg-fail').text(
                            'Arquivo não encontrado, é necessário solicitar o reenvio!');
                        setTimeout(function() {
                            $('#failModal').modal('hide');

                        }, 2000)
                    }
                }
            });
        });
    });
</script>
