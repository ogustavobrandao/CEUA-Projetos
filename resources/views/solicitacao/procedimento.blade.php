<div class="card shadow-lg p-3 bg-white" style="border-radius: 0px 0px 10px 10px">

    <form id="form8" method="POST" action="" enctype="multipart/form-data">
        @csrf
        <input type="hidden" name="modelo_animal_id" value="{{$modelo_animal->id}}">

        <div class="row col-md-12" style="@if(Auth::user()->tipo_usuario_id == 2) pointer-events: none @endif">
            <h3 class="subtitulo">Informações</h3>

            <div class="col-sm-6 mt-2">
                <label for="estresse_radio">Estresse / dor Intencional nos Animais:<strong
                        style="color: red">*</strong></label>
                <div class="row ml-1">
                    <div class="col-sm-2 px-2">
                        <input class="form-check-input" type="radio" name="estresse_radio" id="estresse_sim"
                               @if(!empty($procedimento) && $procedimento->estresse != null) checked @endif>
                        <label class="form-check-label" for="estresse_radio">Sim</label>
                    </div>
                    <div class="col-sm-2 pl-4">
                        <input class="form-check-input" type="radio" name="estresse_radio" id="estresse_nao"
                               value="false"
                               @if((!empty($procedimento) && $procedimento->estresse == null) || empty($procedimento)) checked @endif>
                        <label class="form-check-label" for="estresse_radio">
                            Não
                        </label>
                    </div>
                </div>
                <div class="col-sm-12" id="estresse" style="display: none;">
                    <label for="estresse">Descreva o estresse / dor Intencional nos animais e justifique:<strong
                            style="color: red">*</strong></label>
                    <textarea class="form-control @error('estresse') is-invalid @enderror" name="estresse" id="estresse"
                              autocomplete="estresse" autofocus
                              required disabled>@if(!empty($procedimento) && $procedimento->estresse != null){{$procedimento->estresse}}@else{{old('estresse')}}@endif</textarea>
                    <div class="div_error" id="estresse_error" style="display: none">
                    <span class="invalid-input">
                        <strong id="estresse_error_message"></strong>
                    </span>
                    </div>
                </div>
            </div>

            <div class="col-sm-6 mt-2">
                <label for="anestesico_radio">Uso de anestésicos com dose (UI ou mg/kg), via de administração:<strong
                        style="color: red">*</strong></label>
                <div class="row ml-1">
                    <div class="col-sm-2 px-2">
                        <input class="form-check-input" type="radio" name="anestesico_radio" id="anestesico_sim"
                               @if(!empty($procedimento) && $procedimento->anestesico != null) checked @endif>
                        <label class="form-check-label" for="anestesico_radio">Sim</label>
                    </div>
                    <div class="col-sm-2 pl-4">
                        <input class="form-check-input" type="radio" name="anestesico_radio" id="anestesico_nao"
                               value="false"
                               @if((!empty($procedimento) && $procedimento->anestesico == null) || empty($procedimento)) checked @endif>
                        <label class="form-check-label" for="anestesico_radio">
                            Não
                        </label>
                    </div>
                </div>
                <div class="col-sm-12" id="anestesico" style="display: none;">
                    <label for="anestesico">Uso de anestésicos com dose (UI ou mg/kg), via de administração:<strong
                            style="color: red">*</strong></label>
                    <textarea class="form-control @error('anestesico') is-invalid @enderror" name="anestesico"
                              id="anestesico" autocomplete="anestesico" autofocus
                              required disabled>@if(!empty($procedimento) && $procedimento->anestesico != null){{$procedimento->anestesico}}@else{{old('anestesico')}}@endif</textarea>
                    <div class="div_error" id="anestesico_error" style="display: none">
                    <span class="invalid-input">
                        <strong id="anestesico_error_message"></strong>
                    </span>
                    </div>
                </div>
            </div>

            <div class="col-sm-6 mt-2">
                <label for="relaxante_radio">Uso de Relaxante Muscular:<strong style="color: red">*</strong></label>
                <div class="row ml-1">
                    <div class="col-sm-2 px-2">
                        <input class="form-check-input" type="radio" name="relaxante_radio" id="relaxante_sim"
                               @if(!empty($procedimento) && $procedimento->relaxante != null) checked @endif>
                        <label class="form-check-label" for="relaxante_radio">Sim</label>
                    </div>
                    <div class="col-sm-2 pl-4">
                        <input class="form-check-input" type="radio" name="relaxante_radio" id="relaxante_nao"
                               value="false"
                               @if((!empty($procedimento) && $procedimento->relaxante == null) || empty($procedimento)) checked @endif>
                        <label class="form-check-label" for="relaxante_radio">
                            Não
                        </label>
                    </div>
                </div>
                <div class="col-sm-12" id="relaxante" style="display: none;">
                    <label for="relaxante">Uso de Relaxante Muscular:<strong style="color: red">*</strong></label>
                    <textarea class="form-control @error('relaxante') is-invalid @enderror" name="relaxante" id="relaxante"
                              autocomplete="relaxante" autofocus
                              required disabled>@if(!empty($procedimento) && $procedimento->relaxante != null){{$procedimento->relaxante}}@else{{old('relaxante')}}@endif</textarea>
                    <div class="div_error" id="relaxante_error" style="display: none">
                    <span class="invalid-input">
                        <strong id="relaxante_error_message"></strong>
                    </span>
                    </div>
                </div>
            </div>

            <div class="col-sm-6 mt-2">
                <label for="analgesico_radio">Uso de analgésicos com dose (UI ou mg/kg), via de administração:<strong
                        style="color: red">*</strong></label>
                <div class="row ml-1">
                    <div class="col-sm-2 px-2">
                        <input class="form-check-input" type="radio" name="analgesico_radio" id="analgesico_sim"
                               @if(!empty($procedimento) && $procedimento->analgesico != null) checked @endif>
                        <label class="form-check-label" for="analgesico_radio">Sim</label>
                    </div>
                    <div class="col-sm-2 pl-4">
                        <input class="form-check-input" type="radio" name="analgesico_radio" id="analgesico_nao"
                               value="false"
                               @if((!empty($procedimento) && $procedimento->analgesico == null) || empty($procedimento)) checked @endif>
                        <label class="form-check-label" for="analgesico_radio">
                            Não
                        </label>
                    </div>
                </div>

                <div class="col-sm-12" id="analgesico" style="display: none;">
                    <label for="analgesico">Uso de analgésicos com dose (UI ou mg/kg), via de administração:<strong
                            style="color: red">*</strong></label>
                    <textarea class="form-control @error('analgesico') is-invalid @enderror" name="analgesico"
                              id="analgesico" autocomplete="analgesico" autofocus
                              required disabled>@if(!empty($procedimento) && $procedimento->analgesico != null){{$procedimento->analgesico}}@else{{old('analgesico')}}@endif</textarea>
                    <div class="div_error" id="analgesico_error" style="display: none">
                    <span class="invalid-input">
                        <strong id="analgesico_error_message"></strong>
                    </span>
                    </div>
                </div>
            </div>

            {{-- Campos de textos das Informações --}}

            <div class="col-sm-12" id="anestesico" style="display: none;">
                <label for="anestesico">Uso de anestésicos com dose (UI ou mg/kg), via de administração:<strong
                        style="color: red">*</strong></label>
                <textarea class="form-control @error('anestesico') is-invalid @enderror" name="anestesico"
                          id="anestesico" autocomplete="anestesico" autofocus
                          required disabled>@if(!empty($procedimento) && $procedimento->anestesico != null){{$procedimento->anestesico}}@else{{old('anestesico')}}@endif</textarea>
                <div class="div_error" id="anestesico_error" style="display: none">
                    <span class="invalid-input">
                        <strong id="anestesico_error_message"></strong>
                    </span>
                </div>
            </div>

            <h3 class="subtitulo">Imobilização / Contenção do Animal:</h3>

            <div class="col-sm-4 mt-2">
                <div class="row ml-1">
                    <div class="col-sm-2 px-2">
                        <input class="form-check-input" type="radio" name="imobilizacao_radio" id="imobilizacao_sim"
                               @if(!empty($procedimento) && $procedimento->imobilizacao != null) checked @endif>
                        <label class="form-check-label" for="imobilizacao_radio">Sim</label>
                    </div>
                    <div class="col-sm-2 pl-4">
                        <input class="form-check-input" type="radio" name="imobilizacao_radio" id="imobilizacao_nao"
                               value="false"
                               @if((!empty($procedimento) && $procedimento->imobilizacao == null) || empty($procedimento)) checked @endif>
                        <label class="form-check-label" for="imobilizacao_radio">
                            Não
                        </label>
                    </div>
                </div>
            </div>

            <div class="col-sm-12 mt-3" id="imobilizacao" style="display: none;">
                <label for="imobilizacao">Imobilização / Contenção do Animal:<strong
                        style="color: red">*</strong></label>
                <textarea class="form-control @error('imobilizacao') is-invalid @enderror" name="imobilizacao"
                          id="imobilizacao" autocomplete="imobilizacao" autofocus
                          required disabled>@if(!empty($procedimento) && $procedimento->imobilizacao != null){{$procedimento->imobilizacao}}@else{{old('imobilizacao')}}@endif</textarea>
                <div class="div_error" id="imobilizacao_error" style="display: none">
                    <span class="invalid-input">
                        <strong id="imobilizacao_error_message"></strong>
                    </span>
                </div>
            </div>

            <h3 class="subtitulo">Exposição / Inoculação / Administração:</h3>

            <div class="col-sm-4 mt-2">
                <div class="row ml-1">
                    <div class="col-sm-2 px-2">
                        <input class="form-check-input" type="radio" name="inoculacao_substancia_radio"
                               id="inoculacao_substancia_sim"
                               @if(!empty($procedimento) && $procedimento->inoculacao_substancia != null) checked @endif>
                        <label class="form-check-label" for="inoculacao_substancia_radio">Sim</label>
                    </div>
                    <div class="col-sm-2 pl-4">
                        <input class="form-check-input" type="radio" name="inoculacao_substancia_radio"
                               id="inoculacao_substancia_nao" value="false"
                               @if((!empty($procedimento) && $procedimento->inoculacao_substancia == null) || empty($procedimento)) checked @endif>
                        <label class="form-check-label" for="inoculacao_substancia_radio">
                            Não
                        </label>
                    </div>
                </div>
            </div>

            <div class="col-sm-12 mt-3" id="inoculacao_substancia" style="display: none;">
                <label for="inoculacao_substancia">Exposição / Inoculação / Administração:<strong
                        style="color: red">*</strong></label>
                <textarea class="form-control @error('inoculacao_substancia') is-invalid @enderror"
                          name="inoculacao_substancia" id="inoculacao_substancia" autocomplete="inoculacao_substancia"
                          autofocus
                          required disabled>@if(!empty($procedimento) && $procedimento->inoculacao_substancia != null){{$procedimento->inoculacao_substancia}}@else{{old('inoculacao_substancia')}}@endif</textarea>
                <div class="div_error" id="inoculacao_substancia_error" style="display: none">
                    <span class="invalid-input">
                        <strong id="inoculacao_substancia_error_message"></strong>
                    </span>
                </div>
            </div>

            <h3 class="subtitulo">Extração de Materiais Biológicos:</h3>

            <div class="col-sm-4 mt-2">
                <div class="row ml-1">
                    <div class="col-sm-2 px-2">
                        <input class="form-check-input" type="radio" name="extracao_radio" id="extracao_sim"
                               @if(!empty($procedimento) && $procedimento->extracao != null) checked @endif>
                        <label class="form-check-label" for="extracao_radio">Sim</label>
                    </div>
                    <div class="col-sm-2 pl-4">
                        <input class="form-check-input" type="radio" name="extracao_radio" id="extracao_nao"
                               value="false"
                               @if((!empty($procedimento) && $procedimento->extracao == null) || empty($procedimento)) checked @endif>
                        <label class="form-check-label" for="extracao_radio">
                            Não
                        </label>
                    </div>
                </div>
            </div>

            <div class="col-sm-12 mt-3" id="extracao" style="display: none;">
                <label for="extracao">Extração de Materiais Biológicos:<strong style="color: red">*</strong></label>
                <textarea class="form-control @error('extracao') is-invalid @enderror" name="extracao" id="extracao"
                          autocomplete="extracao" autofocus
                          required disabled>@if(!empty($procedimento) && $procedimento->extracao != null){{$procedimento->extracao}}@else{{old('extracao')}}@endif</textarea>
                <div class="div_error" id="extracao_error" style="display: none">
                    <span class="invalid-input">
                        <strong id="extracao_error_message"></strong>
                    </span>
                </div>
            </div>

            <h3 class="subtitulo">Condições Alimentares</h3>

            <div class="row">
                <div class="col-sm-4 mt-2">
                    <label for="jejum">Jejum:<strong style="color: red">*</strong></label>
                    <div class="row ml-1">
                        <div class="col-sm-2 px-2">
                            <input class="form-check-input" type="radio" name="jejum_radio" id="jejum_sim"
                                   @if(!empty($procedimento) && $procedimento->jejum != null) checked @endif>
                            <label class="form-check-label" for="jejum">Sim</label>
                        </div>
                        <div class="col-sm-2 pl-4">
                            <input class="form-check-input" type="radio" name="jejum_radio" id="jejum_nao" value="false"
                                @if((!empty($procedimento) && $procedimento->jejum == null) || empty($procedimento)) checked @endif>
                            <label class="form-check-label" for="jejum">
                                Não
                            </label>
                        </div>
                    </div>
                </div>

                <div class="col-sm-4 mt-2" id="jejum" style="display: none;">
                    <label for="jejum">Jejum<small> (em horas)</small>:<strong style="color: red">*</strong></label>
                    <input type="text" class="form-control @error('jejum') is-invalid @enderror" name="jejum" id="jejum"
                           autocomplete="jejum" autofocus
                           required disabled placeholder="Informar tempo de jejum em horas"
                           @if(!empty($procedimento) && $procedimento->jejum != null) value="{{$procedimento->jejum}}"
                           @else value="{{old('jejum')}}" @endif>
                    @error('jejum')
                    <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                    @enderror
                </div>
            </div>

            <div class="row">
                <div class="col-sm-4 mt-2">
                    <label for="restricao_hidrica">Restrição Hídrica:<strong style="color: red">*</strong></label>
                    <div class="row ml-1">
                        <div class="col-sm-2 px-2">
                            <input class="form-check-input" type="radio" name="restricao_hidrica_radio"
                                id="restricao_hidrica_sim"
                                @if(!empty($procedimento) && $procedimento->restricao_hidrica != null) checked @endif>
                            <label class="form-check-label" for="restricao_hidrica_radio">Sim</label>
                        </div>
                        <div class="col-sm-2 pl-4">
                            <input class="form-check-input" type="radio" name="restricao_hidrica_radio"
                                   id="restricao_hidrica_nao" value="false"
                                   @if((!empty($procedimento) && $procedimento->restricao_hidrica == null) || empty($procedimento)) checked @endif>
                            <label class="form-check-label" for="restricao_hidrica_radio">
                                Não
                            </label>
                        </div>
                    </div>
                </div>

                <div class="col-sm-4 mt-2" id="restricao_hidrica" style="display: none;">
                    <label for="restricao_hidrica">Restrição Hídrica<small> (em horas)</small>:<strong
                            style="color: red">*</strong></label>
                    <input type="text" class="form-control @error('restricao_hidrica') is-invalid @enderror"
                           name="restricao_hidrica" id="restricao_hidrica" autocomplete="restricao_hidrica" autofocus
                           required disabled placeholder="Informar tempo de restrição hídrica em horas"
                           @if(!empty($procedimento) && $procedimento->restricao_hidrica != null) value="{{$procedimento->restricao_hidrica}}"
                           @else value="{{old('restricao_hidrica')}}" @endif>
                    <div class="div_error" id="restricao_hidrica_error" style="display: none">
                    <span class="invalid-input">
                        <strong id="restricao_hidrica_error_message"></strong>
                    </span>
                    </div>
                </div>
        </div>


        </div>

        @include('component.botoes_new_form')

    </form>
</div>
<script>

    // Verificação para exibição inicial dos campos de texto caso estejam preenchidos
    $(document).ready(function () {
        @if(!empty($procedimento) && $procedimento->restricao_hidrica != null)
        $("#restricao_hidrica_sim").click();
        @endif
        @if(!empty($procedimento) && $procedimento->jejum != null)
        $("#jejum_sim").click();
        @endif
        @if(!empty($procedimento) && $procedimento->extracao != null)
        $("#extracao_sim").click();
        @endif
        @if(!empty($procedimento) && $procedimento->inoculacao_substancia != null)
        $("#inoculacao_substancia_sim").click();
        @endif
        @if(!empty($procedimento) && $procedimento->imobilizacao != null)
        $("#imobilizacao_sim").click();
        @endif
        @if(!empty($procedimento) && $procedimento->analgesico != null)
        $("#analgesico_sim").click();
        @endif
        @if(!empty($procedimento) && $procedimento->relaxante != null)
        $("#relaxante_sim").click();
        @endif
        @if(!empty($procedimento) && $procedimento->anestesico != null)
        $("#anestesico_sim").click();
        @endif
        @if(!empty($procedimento) && $procedimento->estresse != null)
        $("#estresse_sim").click();
        @endif
    });

    //Condições Alimentares
    //Restrição Hidrica / Jejum Hídrico
    $("#restricao_hidrica_sim").click(function () {
        $("#restricao_hidrica").show().find('input, textarea').prop('disabled', false);
    });
    $("#restricao_hidrica_nao").click(function () {
        $("#restricao_hidrica").hide().find('input, textarea').prop('disabled', true);
    });

    //Restrição Alimentar / Jejum Alimentar
    $("#jejum_sim").click(function () {
        $("#jejum").show().find('input, textarea').prop('disabled', false);
    });
    $("#jejum_nao").click(function () {
        $("#jejum").hide().find('input, textarea').prop('disabled', true);
    });

    // Informações
    //Extração de materiais biológicos
    $("#extracao_sim").click(function () {
        $("#extracao").show().find('input, textarea').prop('disabled', false);
    });
    $("#extracao_nao").click(function () {
        $("#extracao").hide().find('input, textarea').prop('disabled', true);
    });

    //Inoculação de substância
    $("#inoculacao_substancia_sim").click(function () {
        $("#inoculacao_substancia").show().find('input, textarea').prop('disabled', false);
    });
    $("#inoculacao_substancia_nao").click(function () {
        $("#inoculacao_substancia").hide().find('input, textarea').prop('disabled', true);
    });

    //Imobilização
    $("#imobilizacao_sim").click(function () {
        $("#imobilizacao").show().find('input, textarea').prop('disabled', false);
    });
    $("#imobilizacao_nao").click(function () {
        $("#imobilizacao").hide().find('input, textarea').prop('disabled', true);
    });

    //Analgésico
    $("#analgesico_sim").click(function () {
        $("#analgesico").show().find('input, textarea').prop('disabled', false);
    });
    $("#analgesico_nao").click(function () {
        $("#analgesico").hide().find('input, textarea').prop('disabled', true);
    });

    //Relaxante
    $("#relaxante_sim").click(function () {
        $("#relaxante").show().find('input, textarea').prop('disabled', false);
    });
    $("#relaxante_nao").click(function () {
        $("#relaxante").hide().find('input, textarea').prop('disabled', true);
    });

    //Anestesico
    $("#anestesico_sim").click(function () {
        $("#anestesico").show().find('input, textarea').prop('disabled', false);
    });
    $("#anestesico_nao").click(function () {
        $("#anestesico").hide().find('input, textarea').prop('disabled', true);
    });

    //Extresse
    $("#estresse_sim").click(function () {
        $("#estresse").show().find('input, textarea').prop('disabled', false);
    });
    $("#estresse_nao").click(function () {
        $("#estresse").hide().find('input, textarea').prop('disabled', true);
    });

</script>
<script>
    $('#form8').submit(function (event) {
        event.preventDefault();

        var formData = new FormData(this);

        $.ajax({
            type: 'POST',
            url: '{{ route('solicitacao.procedimento.criar') }}',
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
                    $('#successModal').find('.msg-success').text('O ' + campo + ' foi salvo com sucesso!');

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

