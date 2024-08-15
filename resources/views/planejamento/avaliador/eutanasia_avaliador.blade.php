<div class="card shadow-lg p-3 bg-white" style="border-radius: 0px 0px 10px 10px; border: 0;">

    <form id="form10" method="POST" action="">
        @csrf
        <input type="hidden" name="modelo_animal_id" value="{{$modelo_animal->id}}">
        <div class="row col-md-12">
            <h3 class="subtitulo">Especificação<strong style="color: red">*</strong></h3>

            <div class="col-sm-6 mt-2">
                <label for="eutanasia">Eutanásia:<strong style="color: red">*</strong></label>
                <div class="row ml-1">
                    <div class="col-sm-2">
                        <input class="form-check-input" type="radio" name="eutanasia" id="eutanasia_sim" value="true">
                        <label class="form-check-label" for="eutanasia">Sim</label>
                    </div>
                    <div class="col-sm-2">
                        <input class="form-check-input" type="radio" name="eutanasia" id="eutanasia_nao" value="false">
                        <label class="form-check-label" for="eutanasia">
                            Não
                        </label>
                    </div>
                </div>
            </div>

            <div id="eutanasia_dados" class="row">
                <div class="col-sm-12 mt-2">
                    <label for="descricao">Descrição:<strong style="color: red">*</strong></label>
                    <textarea class="form-control" name="descricao" id="descricao"
                              autocomplete="descricao" autofocus required readonly>@if(!empty($eutanasia) && $eutanasia->descricao != null){{$eutanasia->descricao}}@else{{old('descricao')}}@endif</textarea>

                </div>

                <div class="col-sm-12 mt-2">
                    <label for="metodo">Substância, Dose, Via:<strong style="color: red">*</strong></label>
                    <textarea class="form-control" name="metodo" id="metodo"
                              autocomplete="metodo" autofocus required readonly>@if(!empty($eutanasia) && $eutanasia->metodo != null){{$eutanasia->metodo}}@else{{old('metodo')}}@endif</textarea>

                </div>

                <div class="col-sm-12 mt-2">
                    <label for="justificativa_metodo">Caso Método Restrito, Justifique:<strong
                            style="color: red">*</strong></label>
                    <textarea class="form-control"
                              name="justificativa_metodo" id="justificativa_metodo" autocomplete="justificativa_metodo"
                              autofocus
                              required readonly>@if(!empty($eutanasia) &&  $eutanasia->justificativa_metodo != null){{$eutanasia->justificativa_metodo}}@else{{old('justificativa_metodo')}}@endif</textarea>

                </div>
            </div>

            <div class="col-sm-12 mt-2">
                <label for="destino">Destino dos Animais Mortos e / ou Tecidos / Fragmentos:<strong
                        style="color: red">*</strong></label>
                <textarea class="form-control" name="destino" id="destino"
                          autocomplete="destino" autofocus required readonly>@if(!empty($eutanasia) && $eutanasia->destino != null){{$eutanasia->destino}}@else{{old('destino')}}@endif</textarea>

            </div>

            <div class="col-sm-12 mt-2">
                <label for="descarte">Forma de Descarte da Carcaça:<strong style="color: red">*</strong></label>
                <textarea class="form-control" name="descarte" id="descarte"
                          autocomplete="descarte" autofocus required readonly>@if(!empty($eutanasia) && $eutanasia->descarte != null){{$eutanasia->descarte}}@else{{old('descarte')}}@endif</textarea>

            </div>
        </div>
        @include('component.botoes_new_form_avaliador')
    </form>

</div>

<script>
    $(document).ready(function () {

        @if(isset($eutanasia) && $eutanasia->descricao != null)
        $("#eutanasia_sim").attr('checked', true);
        @if(!isset($disabled))
        $("#eutanasia_dados").show().find('input, textarea').prop('disabled', false);
        @else
        $("#eutanasia_dados").show().find('input, textarea');
        @endif
        @else
        $("#eutanasia_nao").attr('checked', true);
        $("#eutanasia_dados").hide().find('input, textarea').prop('disabled', true);
        @endif


        $("#eutanasia_sim").click(function () {
            $("#eutanasia_dados").show().find('input, textarea').prop('disabled', false);
        });

        $("#eutanasia_nao").click(function () {
            $("#eutanasia_dados").hide().find('input, textarea').prop('disabled', true);
        });

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
    $('#form10').submit(function (event) {
        event.preventDefault();

        var formData = new FormData(this);

        $.ajax({
            type: 'POST',
            url: '{{route('solicitacao.eutanasia.criar')}}',
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

