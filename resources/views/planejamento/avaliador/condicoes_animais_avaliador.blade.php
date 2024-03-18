<div class="card shadow-lg p-3 bg-white" style="border-radius: 0px 0px 10px 10px">

    <form id="form7" method="POST" action="">
        @csrf
        <input type="hidden" name="modelo_animal_id" value="{{$modelo_animal->id}}">
        <div class="row">
            <div class="col-12">
                <h3 class="subtitulo">Condições de alojamento e alimentação dos animais</h3>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12">
                <label for="condicoes_particulares" style="margin-bottom: 0px">Comentar obrigatoriamente sobre os itens abaixo e as demais condições que forem particulares à espécie:<strong style="color: red">*</strong></label><br>
                <span style="margin: 0px; font-weight: lighter; font-size: 14px; color: gray">
                        1. Alimentação; 2. Fonte de Água; 3. Lotação - Número de animais/área; 4. Exaustão do ar: sim ou não;
                   </span>
                <textarea class="form-control" id="condicoes_particulares" name="condicoes_particulares" required
                          autocomplete="condicoes_particulares"
                          autofocus>@if(!empty($condicoes_animal) && $condicoes_animal->condicoes_particulares != null){{$condicoes_animal->condicoes_particulares}}@else{{old('condicoes_particulares')}}@endif</textarea>

            </div>

            <div class="col-sm-12 mt-2">
                <label for="local">Endereço e local onde será mantido o animal durante o procedimento experimental (biotério, fazenda, aviário, laboratório, outro):<strong style="color: red">*</strong></label>
                <textarea class="form-control" id="local" name="local" required autocomplete="local"
                          autofocus>@if(!empty($condicoes_animal) && $condicoes_animal->local != null){{$condicoes_animal->local}}@else{{old('local')}}@endif</textarea>

            </div>

        </div>


        <div class="row mt-2">
            <div class="col-sm-6">
                <label for="ambiente_alojamento">Ambiente de Alojamento:<strong style="color: red">*</strong></label>
                <select class="form-control" id="ambiente_alojamento" name="ambiente_alojamento">
                    <option disabled selected>Selecione o Ambiente de Alojamento</option>
                    <option @if(!empty($condicoes_animal) && $condicoes_animal->ambiente_alojamento == "baia") selected @endif value="baia" >Baia</option>
                    <option @if(!empty($condicoes_animal) && $condicoes_animal->ambiente_alojamento == "gaiola") selected @endif value="gaiola">Gaiola</option>
                    <option @if(!empty($condicoes_animal) && $condicoes_animal->ambiente_alojamento == "galpao") selected @endif value="galpao">Galpão</option>
                    <option @if(!empty($condicoes_animal) && $condicoes_animal->ambiente_alojamento == "jaula") selected @endif value="jaula">Jaula</option>
                    <option @if(!empty($condicoes_animal) && $condicoes_animal->ambiente_alojamento == "nao_se_aplica") selected @endif value="nao_se_aplica">Não se Aplica</option>
                    <option @if(!empty($condicoes_animal) && $condicoes_animal->ambiente_alojamento == "outro") selected @endif value="outro">Outro</option>
                </select>

            </div>

            <div class="col-sm-6">
                <label for="tipo_cama">Tipo de Cama:<strong style="color: red">*</strong></label>
                <select class="form-control" id="tipo_cama" name="tipo_cama">
                    <option disabled selected>Selecione o Tipo de Cama</option>
                    <option @if(!empty($condicoes_animal) && $condicoes_animal->tipo_cama == "estrado") selected @endif value="estrado">Estrado</option>
                    <option @if(!empty($condicoes_animal) && $condicoes_animal->tipo_cama == "maravalha") selected @endif value="maravalha">Maravalha</option>
                    <option @if(!empty($condicoes_animal) && $condicoes_animal->tipo_cama == "nao_se_aplica") selected @endif value="nao_se_aplica">Não se Aplica</option>
                    <option @if(!empty($condicoes_animal) && $condicoes_animal->tipo_cama == "outra") selected @endif value="outra">Outra</option>
                </select>

            </div>
        </div>

        <div class="row mt-2">
            <div class="col-sm-4">
                <label for="num_animais_ambiente">Número de Animais por Ambiente de Contenção:<strong style="color: red">*</strong></label>
                <input class="form-control" id="num_animais_ambiente" type="number" name="num_animais_ambiente"
                       @if(!empty($condicoes_animal) && $condicoes_animal->num_animais_ambiente != null) value="{{$condicoes_animal->num_animais_ambiente}}" @else value="{{old('num_animais_ambiente')}}" @endif required
                       autocomplete="num_animais_ambiente" autofocus>

            </div>
            <div class="col-sm-4">
                <label for="dimensoes_ambiente">Dimensões do Ambiente de Contenção dos Animais:<strong style="color: red">*</strong></label>
                <input class="form-control" id="dimensoes_ambiente" type="text" name="dimensoes_ambiente"
                       @if(!empty($condicoes_animal) && $condicoes_animal->dimensoes_ambiente != null) value="{{$condicoes_animal->dimensoes_ambiente}}" @else value="{{old('dimensoes_ambiente')}}" @endif
                       required
                       autocomplete="dimensoes_ambiente" placeholder="Altura x Largura x Comprimento" autofocus>

            </div>
            <div class="col-sm-4">
                <label for="periodo">Período Total de Manutenção dos Animais no Experimento:<strong style="color: red">*</strong></label>
                <input class="form-control" id="periodo" type="text" name="periodo"
                       @if(!empty($condicoes_animal) && $condicoes_animal->periodo != null) value="{{$condicoes_animal->periodo}}" @else value="{{old('periodo')}}" @endif
                       required
                       autocomplete="periodo" placeholder="Exemplo1: 30 dias / Exemplo2: 4 anos / etc" autofocus>

            </div>
        </div>

        <div class="row mt-2">
            <div class="col-6">
                <label for="profissional_responsavel">Profissional Responsável:<strong style="color: red">*</strong></label>
                <input class="form-control" id="profissional_responsavel" type="text" name="profissional_responsavel"
                       @if(!empty($condicoes_animal) && $condicoes_animal->profissional_responsavel != null) value="{{$condicoes_animal->profissional_responsavel}}" @else value="{{old('profissional_responsavel')}}" @endif required
                       autocomplete="profissional_responsavel" autofocus>

            </div>

            <div class="col-6">
                <label for="email_responsavel">E-Mail do Responsável:<strong style="color: red">*</strong></label>
                <input class="form-control" id="email_responsavel" type="email" name="email_responsavel"
                       @if(!empty($condicoes_animal) && $condicoes_animal->email_responsavel != null) value="{{$condicoes_animal->email_responsavel}}" @else value="{{old('email_responsavel')}}" @endif
                       required
                       autocomplete="email_responsavel" autofocus>

            </div>

        </div>

        @include('component.botoes_new_form_avaliador')

    </form>

</div>
<script>
    $('#form7').submit(function (event) {
        event.preventDefault();

        var formData = new FormData(this);

        $.ajax({
            type: 'POST',
            url: '{{ route('solicitacao.condicoes_animal.criar') }}',
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
                    if(status == 'error'){
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
