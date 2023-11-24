<div class="card p-3 bg-white" style="border-radius: 0px 0px 10px 10px">
    <form id="form3" method="POST" action="{{route('solicitacao.solicitacao_fim.criar')}}">
        @csrf
        <input type="hidden" name="solicitacao_id" value="{{$solicitacao->id}}">
        <div class="row col-md-12">
            <h3 class="subtitulo">Informações</h3>

            <div class="col-sm-12 mt-2">
                <label for="resumo">Resumo do Projeto de Pesquisa / de Extensão / de Aula Prática / de Treinamento:<strong style="color: red">*</strong></label>
                <textarea class="form-control @error('resumo') is-invalid @enderror" name="resumo" id="resumo" autocomplete="resumo" autofocus
                          required>@if(!empty($solicitacao->dadosComplementares) && $solicitacao->dadosComplementares->resumo != null){{$solicitacao->dadosComplementares->resumo}}@else{{old('resumo')}}@endif</textarea>
                <div class="div_error" id="resumo_error" style="display: none">
                    <span class="invalid-input">
                        <strong id="resumo_error_message"></strong>
                    </span>
                </div>
            </div>

            <div class="col-sm-12 mt-2">
                <label for="objetivos">Objetivos (na íntegra):<strong style="color: red">*</strong></label>
                <textarea class="form-control @error('objetivos') is-invalid @enderror" name="objetivos" id="objetivos" autocomplete="objetivos" autofocus
                          required>@if(!empty($solicitacao->dadosComplementares) && $solicitacao->dadosComplementares->objetivos != null){{$solicitacao->dadosComplementares->objetivos}}@else{{old('objetivos')}}@endif</textarea>
                <div class="div_error" id="objetivos_error" style="display: none">
                    <span class="invalid-input">
                        <strong id="objetivos_error_message"></strong>
                    </span>
                </div>
            </div>

            <div class="col-sm-12 mt-2">
                <label for="justificativa">Justificativa:<strong style="color: red">*</strong></label>
                <textarea class="form-control @error('justificativa') is-invalid @enderror" name="justificativa" id="justificativa" autocomplete="justificativa"
                          autofocus required>@if(!empty($solicitacao->dadosComplementares) && $solicitacao->dadosComplementares->justificativa != null){{$solicitacao->dadosComplementares->justificativa}}@else{{old('justificativa')}}@endif</textarea>
                <div class="div_error" id="justificativa_error" style="display: none">
                    <span class="invalid-input">
                        <strong id="justificativa_error_message"></strong>
                    </span>
                </div>
            </div>

            <div class="col-sm-12 mt-2">
                <label for="relevancia">Relevância:<strong style="color: red">*</strong></label>
                <textarea class="form-control @error('relevancia') is-invalid @enderror" name="relevancia" id="relevancia" autocomplete="relevancia" autofocus
                          required>@if(!empty($solicitacao->dadosComplementares) && $solicitacao->dadosComplementares->relevancia != null){{$solicitacao->dadosComplementares-> relevancia}}@else{{old('relevancia')}}@endif</textarea>
                <div class="div_error" id="relevancia_error" style="display: none">
                    <span class="invalid-input">
                        <strong id="relevancia_error_message"></strong>
                    </span>
                </div>
            </div>

            <div class="col-sm-12 mt-2">
                <label for="referencias">Referências:</label>
                <textarea class="form-control @error('referencias') is-invalid @enderror" name="referencias" id="referencias" autocomplete="referencias" autofocus
                          >@if(!empty($solicitacao->dadosComplementares) && $solicitacao->dadosComplementares->referencias != null){{$solicitacao->dadosComplementares-> referencias}}@else{{old('referencias')}}@endif</textarea>
                <div class="div_error" id="referencias_error" style="display: none">
                    <span class="invalid-input">
                        <strong id="referencias_error_message"></strong>
                    </span>
                </div>
            </div>


        </div>
        @include('component.botoes_new_form')
    </form>
</div>
<script>
    $('#form3').submit(function (event) {
        event.preventDefault()
        var formData = $(this).serialize();
        $.ajax({
            type: 'POST',
            url: '{{ route('solicitacao.solicitacao_fim.criar') }}',
            data: formData,
            headers:
                {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
            dataType: 'json',
            success: function (response) {
                var message = response.message;
                if (message == 'success') {
                    var campo = response.campo;
                    $('#successModal').modal('show');
                    $('#successModal').find('.msg-success').text('Os ' + campo + ' foram salvos com sucesso!');

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
        })
    })
</script>

