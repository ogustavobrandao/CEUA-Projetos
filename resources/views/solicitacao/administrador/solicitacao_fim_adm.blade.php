<div class="card p-3 bg-white" style="border-radius: 0px 0px 10px 10px">
    <form id="form3" method="POST" action="{{route('solicitacao.solicitacao_fim.criar')}}">
        @csrf
        <input type="hidden" name="solicitacao_id" value="{{$solicitacao->id}}">
        <div class="row col-md-12">
            <h3 class="subtitulo">Informações</h3>

            <div class="col-sm-12 mt-2">
                <label for="resumo">Resumo do Projeto de Pesquisa / de Extensão / de Aula Prática / de Treinamento:<strong style="color: red">*</strong></label>
                <textarea class="form-control" name="resumo" id="resumo" autocomplete="resumo"
                        >{{$solicitacao->dadosComplementares->resumo}}</textarea>
            </div>

            <div class="col-sm-12 mt-2">
                <label for="objetivos">Objetivos (na íntegra):<strong style="color: red">*</strong></label>
                <textarea class="form-control" name="objetivos" id="objetivos" autocomplete="objetivos" autofocus
                    >{{$solicitacao->dadosComplementares->objetivos}}</textarea>
            </div>

            <div class="col-sm-12 mt-2">
                <label for="justificativa">Justificativa:<strong style="color: red">*</strong></label>
                <textarea class="form-control" name="justificativa" id="justificativa" autocomplete="justificativa"
                    >{{$solicitacao->dadosComplementares->justificativa}}</textarea>
            </div>

            <div class="col-sm-12 mt-2">
                <label for="relevancia">Relevância:<strong style="color: red">*</strong></label>
                <textarea class="form-control" name="relevancia" id="relevancia" autocomplete="relevancia"
                    >{{$solicitacao->dadosComplementares->relevancia}}</textarea>
            </div>

            <div class="col-sm-12 mt-2">
                <label for="referencias">Referências:</label>
                <textarea class="form-control" name="referencias" id="referencias" autocomplete="referencias"
                    >{{$solicitacao->dadosComplementares-> referencias}}</textarea>
            </div>
        </div>
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

