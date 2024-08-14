<div class="card shadow-topoff border-top-0 p-3 my-n3 bg-white" style="border-radius: 0px 0px 10px 10px">

    <form id="form11" method="POST" action="">
        @csrf
        <input type="hidden" name="modelo_animal_id" value="{{$modelo_animal->id}}">
        <div class="row col-md-12">
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
                <textarea class="form-control" name="abate" id="destino_animais" autocomplete="destino_animais"
                          readonly>{{$resultado->abate}}</textarea>
            </div>

            <div class="col-sm-12 mt-2">
                <label for="destino_animais">Destino dos animais sobreviventes após a conclusão do experimento / aula ou
                    retirados no decorrer do experimento / aula:<strong style="color: red">*</strong></label>
                <textarea class="form-control" name="destino_animais" id="destino_animais" autocomplete="destino_animais"
                    readonly>{{$resultado->destino_animais}}</textarea>
            </div>

            <div class="col-sm-12 mt-2">
                <label for="outras_informacoes">Outras Informações Relevantes:<strong style="color: red">*</strong></label>
                <textarea class="form-control" name="outras_informacoes"
                          id="outras_informacoes" autocomplete="outras_informacoes"
                          minlength="4" readonly>{{$resultado->outras_informacoes}}</textarea>
            </div>

            <div class="col-sm-12 mt-2">
                <label for="justificativa_metodos">Justificativa da não utilização de métodos alternativos e da
                    necessidade do uso de animais:<strong style="color: red">*</strong></label>
                <textarea class="form-control" name="justificativa_metodos" id="justificativa_metodos" autocomplete="justificativa_metodos"
                          readonly>{{$resultado->justificativa_metodos}}</textarea>
            </div>

            <div class="col-sm-12 mt-2">
                <label for="resumo_procedimento">Resumo do procedimento (relatar todos os procedimentos com os animais):<strong
                        style="color: red">*</strong></label>
                <textarea class="form-control" name="resumo_procedimento" id="resumo_procedimento" autocomplete="resumo_procedimento"
                          readonly>{{$resultado->resumo_procedimento}}</textarea>
            </div>


        </div>


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

