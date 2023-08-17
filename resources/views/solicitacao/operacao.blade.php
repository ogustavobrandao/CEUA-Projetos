<div class="card shadow-lg p-3 bg-white" style="border-radius: 0px 0px 10px 10px">
    <form id="form9" method="POST" action="">
        @csrf
        <input type="hidden" name="modelo_animal_id" value="{{$modelo_animal->id}}">
        <div style="@if(Auth::user()->tipo_usuario_id == 2) pointer-events: none @endif">
            <div class="row">
                <h3 class="subtitulo">Informações</h3>
                <div class="col-sm-4 mt-2">
                    <label for="cirurgia">Cirurgia:<strong style="color: red">*</strong></label>
                    <div class="row ml-1">
                        <div class="col-sm-4">
                            <input class="form-check-input" type="radio" name="flag_cirurgia" id="cirurgia_sim_unica" value="true_unica"
                            @if(!empty($operacao) && $operacao->flag_cirurgia == "true_unica") checked @endif>
                            <label class="form-check-label" for="flag_cirurgia">Sim, única</label>
                        </div>
                        <div class="col-sm-5">
                            <input class="form-check-input" type="radio" name="flag_cirurgia" id="cirurgia_sim_multipla" value="true_multipla"
                            @if(!empty($operacao) && $operacao->flag_cirurgia == "true_multipla") checked @endif>
                            <label class="form-check-label" for="flag_cirurgia">Sim, múltipla</label >
                        </div>
                        <div class="col-sm-2">
                            <input class="form-check-input" type="radio" name="flag_cirurgia" id="cirurgia_nao" value="false"
                                   checked>
                            <label class="form-check-label" for="flag_cirurgia">
                                Não
                            </label>
                        </div>
                    </div>
                </div>
                <div class="col-sm-12 mt-2" id="anexo_cirurgia" style="display: none;">
                    <label for="anexo_cirurgia">Descrição:<strong style="color: red">*</strong></label>
                    <textarea class="form-control @error('detalhes_cirurgia') is-invalid @enderror" name="detalhes_cirurgia" id="detalhes_cirurgia" autocomplete="detalhes_cirurgia" autofocus
                              required>@if(!empty($operacao) && $operacao->detalhes_cirurgia != null){{$operacao->detalhes_cirurgia}}@else{{old('detalhes_cirurgia')}}@endif</textarea>
                    <div class="div_error" id="detalhes_cirurgia_error" style="display: none">
                        <span class="invalid-input">
                            <strong id="detalhes_cirurgia_error_message"></strong>
                        </span>
                    </div>
                </div>
            </div>

            <div class="row" id="pos_operatorio1">
                <h3 id="" class="subtitulo">Pós-Operatório</h3>
                <div class="col-sm-4 mt-2">
                    <label for="observacao_recuperacao">Observação da recuperação:<strong style="color: red">*</strong></label>
                    <div class="row ml-1">
                        <div class="col-sm-2">
                            <input class="form-check-input" type="radio" name="observacao_recuperacao"
                                   id="observacao_recuperacao_sim" value="true"
                                   @if(!empty($operacao) && $operacao->observacao_recuperacao == "true") checked @endif>
                            <label class="form-check-label" for="observacao_recuperacao">Sim</label>
                        </div>
                        <div class="col-sm-2">
                            <input class="form-check-input" type="radio" name="observacao_recuperacao"
                                   id="observacao_recuperacao_nao" value="false"
                                   @if(!empty($operacao) && ($operacao->observacao_recuperacao == "false" || $operacao->observacao_recuperacao == null)) checked @endif>
                            <label class="form-check-label" for="observacao_recuperacao">
                                Não
                            </label>
                        </div>
                    </div>
                </div>
                    <div class="col-sm-8 mt-2" id="anexo_observacao_recuperacao" style="display: none;">
                        <label for="anexo_observacao_recuperacao">Período de observação (em horas):<strong style="color: red">*</strong></label>
                        <textarea class="form-control @error('detalhes_observacao_recuperacao') is-invalid @enderror" name="detalhes_observacao_recuperacao" id="detalhes_observacao_recuperacao" autocomplete="detalhes_cirurgia" autofocus
                                  required>@if(!empty($operacao) && $operacao->detalhes_observacao_recuperacao != null){{$operacao->detalhes_observacao_recuperacao}}@else{{old('detalhes_observacao_recuperacao')}}@endif </textarea>
                        <div class="div_error" id="detalhes_observacao_recuperacao_error" style="display: none">
                        <span class="invalid-input">
                            <strong id="detalhes_observacao_recuperacao_error_message"></strong>
                        </span>
                        </div>
                    </div>
            </div>

            <div class="row" id="pos_operatorio2">
                <div class="col-sm-4 mt-2">
                    <label for="analgesia_recuperacao">Uso de Analgesia:<strong style="color: red">*</strong></label>
                    <div class="row ml-1">
                        <div class="col-sm-2">
                            <input class="form-check-input" type="radio" name="analgesia_recuperacao"
                                   id="analgesia_recuperacao_sim" value="true"
                                   @if(!empty($operacao) && $operacao->analgesia_recuperacao == "true") checked @endif>
                            <label class="form-check-label" for="analgesia_recuperacao">Sim</label>
                        </div>
                        <div class="col-sm-2">
                            <input class="form-check-input" type="radio" name="analgesia_recuperacao"
                                   id="analgesia_recuperacao_nao" value="false"
                                   @if(!empty($operacao) && ($operacao->analgesia_recuperacao == "false" || $operacao->analgesia_recuperacao == null)) checked @endif>
                            <label class="form-check-label" for="analgesia_recuperacao">
                                Não
                            </label>
                        </div>
                    </div>
                </div>
                    <div class="col-sm-8 mt-2" id="anexo_analgesia_recuperacao" style="display: none;">
                        <label for="anexo_analgesia_recuperacao">Descreva o Fármaco, Dose (UI ou mg/kg), Via de Adminstração, Frequência e Duração:<strong style="color: red">*</strong></label>
                        <textarea class="form-control @error('detalhes_analgesia_recuperacao') is-invalid @enderror" name="detalhes_analgesia_recuperacao" id="detalhes_analgesia_recuperacao" autocomplete="detalhes_analgesia_recuperacao" autofocus
                                  required>@if(!empty($operacao) && $operacao->detalhes_analgesia_recuperacao != null){{$operacao->detalhes_analgesia_recuperacao}}@else{{old('detalhes_analgesia_recuperacao')}}@endif </textarea>
                        <div class="div_error" id="detalhes_analgesia_recuperacao_error" style="display: none">
                        <span class="invalid-input">
                            <strong id="detalhes_analgesia_recuperacao_error_message"></strong>
                        </span>
                        </div>
                    </div>

                    <div class="col-sm-8 mt-2" id="anexo_nao_uso_analgesia_recuperacao" style="display: none;">
                        <label for="anexo_nao_uso_analgesia_recuperacao">Justifique o NÃO-uso de analgesia pós-operatório:<strong style="color: red">*</strong></label>
                        <textarea class="form-control @error('detalhes_nao_uso_analgesia_recuperacao') is-invalid @enderror" name="detalhes_nao_uso_analgesia_recuperacao" id="detalhes_nao_uso_analgesia_recuperacao" autocomplete="detalhes_nao_uso_analgesia_recuperacao" autofocus
                                  required>@if(!empty($operacao) && $operacao->detalhes_nao_uso_analgesia_recuperacao != null){{$operacao->detalhes_nao_uso_analgesia_recuperacao}}@else{{old('detalhes_nao_uso_analgesia_recuperacao')}}@endif </textarea>
                        <div class="div_error" id="detalhes_nao_uso_analgesia_recuperacao_error" style="display: none">
                        <span class="invalid-input">
                            <strong id="detalhes_nao_uso_analgesia_recuperacao_error_message"></strong>
                        </span>
                        </div>
                    </div>
            </div>


            <div class="row" id="pos_operatorio3">
                <div class="col-sm-4 mt-2">
                    <label for="outros_cuidados_recuperacao">Outros Cuidados Pós-Operatórios:<strong style="color: red">*</strong></label>
                    <div class="row ml-1">
                        <div class="col-sm-2">
                            <input class="form-check-input" type="radio" name="outros_cuidados_recuperacao"
                                   id="outros_cuidados_recuperacao_sim" value="true"
                                   @if(!empty($operacao) && $operacao->outros_cuidados_recuperacao == "true") checked @endif>
                            <label class="form-check-label" for="outros_cuidados_recuperacao">Sim</label>
                        </div>
                        <div class="col-sm-2">
                            <input class="form-check-input" type="radio" name="outros_cuidados_recuperacao"
                                   id="outros_cuidados_recuperacao_nao" value="false"
                                   @if(!empty($operacao) && ($operacao->outros_cuidados_recuperacao == "false" || $operacao->outros_cuidados_recuperacao == null)) checked @endif>
                            <label class="form-check-label" for="outros_cuidados_recuperacao">
                                Não
                            </label>
                        </div>
                    </div>
                </div>
                    <div class="col-sm-8 mt-2" id="anexo_outros_cuidados_recuperacao" style="display: none;">
                        <label for="anexo_outros_cuidados_recuperacao">Descrição:<strong style="color: red">*</strong></label>
                        <textarea class="form-control @error('detalhes_outros_cuidados_recuperacao') is-invalid @enderror" name="detalhes_outros_cuidados_recuperacao" id="detalhes_outros_cuidados_recuperacao" autocomplete="detalhes_outros_cuidados_recuperacao" autofocus
                                  required>@if(!empty($operacao) && $operacao->detalhes_outros_cuidados_recuperacao != null){{$operacao->detalhes_outros_cuidados_recuperacao}}@else{{old('detalhes_outros_cuidados_recuperacao')}}@endif </textarea>
                        <div class="div_error" id="detalhes_outros_cuidados_recuperacao_error" style="display: none">
                        <span class="invalid-input">
                            <strong id="detalhes_outros_cuidados_recuperacao_error_message"></strong>
                        </span>
                        </div>
                    </div>
            </div>
        </div>
        @include('component.botoes_new_form')
    </form>
</div>

<script>
    $(document).ready(function () {

        @if(isset($operacao) && ($operacao->flag_cirurgia == "true_unica"))
        $("#cirurgia_sim_unica").attr('checked', true);
        $("#cirurgia_sim_unica").click();
        $("#anexo_cirurgia").show();
        $("#pos_operatorio").show();
        @elseif(isset($operacao) && ($operacao->flag_cirurgia == "true_multipla"))
        $("#cirurgia_sim_multipla").attr('checked', true);
        $("#cirurgia_sim_multipla").click();
        $("#anexo_cirurgia").show();
        $("#pos_operatorio").show();
        @else
        $("#cirurgia_nao").attr('checked', true);
        $("#anexo_cirurgia").hide();
        $("#pos_operatorio1").hide();
        $("#pos_operatorio2").hide();
        $("#pos_operatorio3").hide();
        @endif

        @if(isset($operacao) && ($operacao->observacao_recuperacao != null))
        $("#observacao_recuperacao_sim").attr('checked', true);
        $("#anexo_observacao_recuperacao").show();
        @else
        $("#observacao_recuperacao_nao").attr('checked', true);
        $("#anexo_observacao_recuperacao").hide();
        @endif

        @if(isset($operacao) && ($operacao->outros_cuidados_recuperacao != null))
        $("#outros_cuidados_recuperacao_sim").attr('checked', true);
        $("#anexo_outros_cuidados_recuperacao").show();
        @else
        $("#outros_cuidados_recuperacao_nao").attr('checked', true);
        $("#anexo_outros_cuidados_recuperacao").hide();
        @endif

        @if(isset($operacao) && ($operacao->analgesia_recuperacao == true))
        $("#analgesia_recuperacao_sim").attr('checked', true);
        $("#anexo_analgesia_recuperacao").show();
        @else
        $("#analgesia_recuperacao_nao").attr('checked', true);
        $("#anexo_nao_uso_analgesia_recuperacao").show();
        @endif

        $("#cirurgia_sim_unica").click(function () {
            $("#anexo_cirurgia").show().find('input, radio').prop('disabled', false);
            $("#pos_operatorio1").show().find('input, radio').prop('disabled', false);
            $("#pos_operatorio2").show().find('input, radio').prop('disabled', false);
            $("#pos_operatorio3").show().find('input, radio').prop('disabled', false);
        });

        $("#cirurgia_sim_multipla").click(function () {
            $("#anexo_cirurgia").show().find('input, radio').prop('disabled', false);
            $("#pos_operatorio1").show().find('input, radio').prop('disabled', false);
            $("#pos_operatorio2").show().find('input, radio').prop('disabled', false);
            $("#pos_operatorio3").show().find('input, radio').prop('disabled', false);
        });

        $("#cirurgia_nao").click(function () {
            $("#anexo_cirurgia").hide().find('input, radio').prop('disabled', true);
            $("#pos_operatorio1").hide().find('input, radio').prop('disabled', true);
            $("#pos_operatorio2").hide().find('input, radio').prop('disabled', true);
            $("#pos_operatorio3").hide().find('input, radio').prop('disabled', true);
        });

        $("#observacao_recuperacao_sim").click(function () {
            $("#anexo_observacao_recuperacao").show().find('input, radio').prop('disabled', false);
        });

        $("#observacao_recuperacao_nao").click(function () {
            $("#anexo_observacao_recuperacao").hide().find('input, radio').prop('disabled', true);
        });

        $("#analgesia_recuperacao_sim").click(function () {
            $("#anexo_analgesia_recuperacao").show().find('input, radio').prop('disabled', false);
            $("#anexo_nao_uso_analgesia_recuperacao").hide().find('input, radio').prop('disabled', true);
        });

        $("#analgesia_recuperacao_nao").click(function () {
            $("#anexo_nao_uso_analgesia_recuperacao").show().find('input, radio').prop('disabled', false);
            $("#anexo_analgesia_recuperacao").hide().find('input, radio').prop('disabled', true);
        });

        $("#outros_cuidados_recuperacao_sim").click(function () {
            $("#anexo_outros_cuidados_recuperacao").show().find('input, radio').prop('disabled', false);
        });

        $("#outros_cuidados_recuperacao_nao").click(function () {
            $("#anexo_outros_cuidados_recuperacao").hide().find('input, radio').prop('disabled', true);
        });
        @if(isset($operacao) && ($operacao->flag_cirurgia == "false")) {
            $("#cirurgia_nao").click();
            $("#anexo_cirurgia").hide().find('input, radio').prop('disabled', true);
            $("#pos_operatorio1").hide().find('input, radio').prop('disabled', true);
            $("#pos_operatorio2").hide().find('input, radio').prop('disabled', true);
            $("#pos_operatorio3").hide().find('input, radio').prop('disabled', true);
        }
        @endif


    });
</script>
<script>
    $('#form9').submit(function (event) {
        event.preventDefault();

        var formData = new FormData(this);

        $.ajax({
            type: 'POST',
            url: '{{ route('solicitacao.operacao.criar') }}',
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
                    var campo = response.campo;
                    $('#successModal').modal('show');
                    $('#successModal').find('.msg-success').text('A ' + campo + ' foi salva com sucesso!');

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
                    if(statusCode === 412 && status === 'error'){
                        $('#failModal').modal('show');
                        $('#failModal').find('.msg-fail').text(xhr.responseJSON.message);
                        setTimeout(function (){
                            $('#failModal').modal('hide');
                        },2000)
                    }
                } else {
                    alert("Erro na requisição Ajax: " + error);
                }
            }
        });
    });
</script>

