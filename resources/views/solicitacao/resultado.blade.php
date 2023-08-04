<div class="card shadow-topoff border-top-0 p-3 my-n3 bg-white" style="border-radius: 0px 0px 10px 10px">

    <form id="form11" method="POST" action="">
        @csrf
        <input type="hidden" name="planejamento_id" @if(!empty($planejamento)) value="{{$planejamento->id}}" @endif>
        <div class="row col-md-12" style=" @if(Auth::user()->tipo_usuario_id == 2) pointer-events: none @endif">
            <div class="col-sm-6 mt-2">
                <label for="abate">Abate:<strong style="color: red">*</strong></label>
                <div class="row ml-1">
                    <div class="col-sm-2">
                        <input class="form-check-input" type="radio" name="abate_radio" id="abate_sim" value="true"
                               @if(!empty($resultado) && $resultado->abate != null) checked @endif>
                        <label class="form-check-label" for="abate">Sim</label>
                    </div>
                    <div class="col-sm-2">
                        <input class="form-check-input" type="radio" name="abate_radio" id="abate_nao" value="false"
                               @if(!empty($resultado) && $resultado->abate == null) checked @endif>
                        <label class="form-check-label" for="abate">
                            Não
                        </label>
                    </div>
                </div>
            </div>
            <div class="col-sm-12 mt-2" id="destino_animal_abatido" style="display: none;">
                <label for="destino_animais">Destino dos Animais Abatidos:<strong style="color: red">*</strong></label>
                <textarea class="form-control @error('abate') is-invalid @enderror" name="abate" id="destino_animais"
                          autocomplete="destino_animais" autofocus
                          required disabled>@if(!empty($resultado) && $resultado->abate != null)
                        {{$resultado->abate}}
                    @else
                        {{old('abate')}}
                    @endif</textarea>
                <div class="div_error" id="abate_error" style="display: none">
                    <span class="invalid-input">
                        <strong id="abate_error_message"></strong>
                    </span>
                </div>
            </div>

            <div class="col-sm-12 mt-2">
                <label for="destino_animais">Destino dos animais sobreviventes após a conclusão do experimento / aula ou
                    retirados no decorrer do experimento / aula:<strong style="color: red">*</strong></label>
                <textarea class="form-control @error('destino_animais') is-invalid @enderror" name="destino_animais"
                          id="destino_animais" autocomplete="destino_animais" autofocus
                          required>@if(!empty($resultado) && $resultado->destino_animais != null)
                        {{$resultado->destino_animais}}
                    @else
                        {{old('destino_animais')}}
                    @endif</textarea>
                <div class="div_error" id="destino_animais_error" style="display: none">
                    <span class="invalid-input">
                        <strong id="destino_animais_error_message"></strong>
                    </span>
                </div>
            </div>

            <div class="col-sm-12 mt-2">
                <label for="outras_infos">Outras Informações Relevantes:<strong style="color: red">*</strong></label>
                <textarea class="form-control @error('outras_infos') is-invalid @enderror" name="outras_infos"
                          id="outras_infos" autocomplete="outras_infos" autofocus
                          required>@if(!empty($resultado) && $resultado->outras_infos != null)
                        {{$resultado->outras_infos}}
                    @else
                        {{old('outras_infos')}}
                    @endif</textarea>
                <div class="div_error" id="outras_infos_error" style="display: none">
                    <span class="invalid-input">
                        <strong id="outras_infos_error_message"></strong>
                    </span>
                </div>
            </div>

            <div class="col-sm-12 mt-2">
                <label for="justificativa_metodos">Justificativa da não utilização de métodos alternativos e da
                    necessidade do uso de animais:<strong style="color: red">*</strong></label>
                <textarea class="form-control @error('justificativa_metodos') is-invalid @enderror"
                          name="justificativa_metodos" id="justificativa_metodos" autocomplete="justificativa_metodos"
                          autofocus required>@if(!empty($resultado) && $resultado->justificativa_metodos != null)
                        {{$resultado->justificativa_metodos}}
                    @else
                        {{old('justificativa_metodos')}}
                    @endif</textarea>
                <div class="div_error" id="justificativa_metodos_error" style="display: none">
                        <span class="invalid-input">
                            <strong id="justificativa_metodos_error_message"></strong>
                        </span>
                </div>
            </div>

            <div class="col-sm-12 mt-2">
                <label for="resumo_procedimento">Resumo do procedimento (relatar todos os procedimentos com os animais):<strong
                        style="color: red">*</strong></label>
                <textarea class="form-control @error('resumo_procedimento') is-invalid @enderror"
                          name="resumo_procedimento" id="resumo_procedimento" autocomplete="resumo_procedimento"
                          autofocus
                          required>@if(!empty($resultado) && $resultado->resumo_procedimento != null)
                        {{$resultado->resumo_procedimento}}
                    @else
                        {{old('resumo_procedimento')}}
                    @endif</textarea>
                <div class="div_error" id="resumo_procedimento_error" style="display: none">
                        <span class="invalid-input">
                            <strong id="resumo_procedimento_error_message"></strong>
                        </span>
                </div>
            </div>


        </div>

        @include('component.botoes_new_form')

    </form>
</div>

<script>

    $(document).ready(function () {
        @if(!empty($resultado) && $resultado->abate != null)
        $("#abate_sim").attr('checked', true);
        $("#abate_sim").click();
        @else
        $("#abate_nao").attr('checked', true);
        @endif
    });

    $("#abate_sim").click(function () {
        $("#destino_animal_abatido").show().find('input, textarea').prop('disabled', false);
    });
    $("#abate_nao").click(function () {
        $("#destino_animal_abatido").hide().find('input, textarea').prop('disabled', true);
    });
</script>
<script>
    $('#form11').submit(function (event) {
        event.preventDefault();

        var formData = new FormData(this);

        $.ajax({
            type: 'POST',
            url: '{{route('solicitacao.resultado.criar')}}',
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
                } else {
                    alert("Erro na requisição Ajax: " + error);
                }
            }
        });
    });
</script>

