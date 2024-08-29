@extends('layouts.formulario')

@section('form')

    <form id="form0" method="POST" action="{{ route('solicitacao.criar') }}">
        @csrf
        <input type="hidden" name="solicitacao_id" value="{{ $solicitacao->id }}">
        <div class="row">
            <div class="col-12">
                <h3 class="subtitulo">Finalidade</h3>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-4">
                <label for="tipo">Tipo:</label>
                <input class="form-control" type="text" value="{{ $solicitacao->tipo }}" disabled>
            </div>

            <div class="col-sm-4">
                <label for="inicio">Início:<strong style="color: red">*</strong></label>
                <input class="form-control @error('inicio') is-invalid @enderror" id="inicio" type="date"
                       name="inicio"
                       @if(!empty($solicitacao) && $solicitacao->inicio != null) value="{{$solicitacao->inicio}}"
                       @else value="{{old('inicio')}}" @endif
                       autocomplete="inicio" autofocus required>

                <div class="div_error" id="inicio_error" style="display: none">
                    <span class="invalid-input">
                        <strong id="inicio_error_message"></strong>
                    </span>
                    <span class="invalid-input">
                        <strong id="inicio_error_message"></strong>
                    </span>
                </div>
            </div>

            <div class="col-sm-4">
                <label for="inicio">Fim:<strong style="color: red">*</strong></label>
                <input class="form-control @error('fim') is-invalid @enderror" id="fim" type="date" name="fim"
                       @if(!empty($solicitacao) && $solicitacao->fim != null) value="{{$solicitacao->fim}}"
                       @else value="{{old('fim')}}" @endif
                       autocomplete="fim" autofocus required>

                <div class="div_error" id="fim_error" style="display: none">
                    <span class="invalid-input">
                        <strong id="fim_error_message"></strong>
                    </span>
                    <span class="invalid-input">
                        <strong id="fim_error_message"></strong>
                    </span>
                </div>
            </div>
        </div>

        <div class="row mt-2">
            <div class="col-12">
                <h3 class="subtitulo">Título do Projeto / Aula Prática / Treinamento</h3>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-5">
                <label for="titulo_pt">Título em Português:<strong style="color: red">*</strong></label>
                <textarea title="Tá errado" class="form-control @error('titulo_pt') is-invalid @enderror" id="titulo_pt"
                        name="titulo_pt" autocomplete="titulo_pt" autofocus required>@if(!empty($solicitacao) && $solicitacao->titulo_pt != null) {{$solicitacao->titulo_pt}}@else{{ old('titulo_pt') }}@endif</textarea>

                <div class="div_error" id="titulo_pt_error" style="display: none">
                    <span class="invalid-input">
                        <strong id="titulo_pt_error_message"></strong>
                    </span>
                </div>
            </div>

            <div class="col-sm-5">
                <label for="titulo_en">Título em Inglês (apenas para projeto):</label>
                <textarea class="form-control @error('titulo_en') is-invalid @enderror" id="titulo_en"
                       name="titulo_en" autofocus>@if(!empty($solicitacao) && $solicitacao->titulo_en != null) {{$solicitacao->titulo_en}} @else {{ old('titulo_en') }} @endif</textarea>

                <div class="div_error" id="titulo_en_error" style="display: none">
                    <span class="invalid-input">
                        <strong id="titulo_en_error_message"></strong>
                    </span>
                    <span class="invalid-input">
                        <strong id="titulo_en_error_message"></strong>
                    </span>
                </div>
            </div>

            <div class="col-12 mt-2">
                <h3 class="subtitulo">Área e Subárea do Conhecimento
                    <a target="_blank"
                        href="http://lattes.cnpq.br/documents/11871/24930/TabeladeAreasdoConhecimento.pdf/d192ff6b-3e0a-4074-a74d-c280521bd5f7"
                        title="Para mais informações sobre das áreas e subáreas de conhecimento, acessar documento do CNPQ."
                        style="color: darkred">
                        <i class="fa-solid fa-circle-info fa-lg"></i>
                    </a>
                </h3>
            </div>
            <div class="form-group col-md-4">
                <label for="grandeArea" class="col-form-label">{{ __('Grande Área') }} <span
                        style="color: red; font-weight:bold">*</span></label>
                <select class="form-control @error('grandeArea') is-invalid @enderror" id="grandeArea" name="grandeArea"
                        onchange="areas()" required>
                    <option value="" disabled selected hidden>Selecione a Grande Área</option>
                    @foreach ($grandeAreas as $grandeArea)
                        <option @if (old('grandeArea') !== null
                                ? old('grandeArea')
                                : (isset($solicitacao) ? $solicitacao->grande_area_id : '') == $grandeArea->id) selected @endif value="{{ $grandeArea->id }}">
                            {{ $grandeArea->nome }}</option>
                    @endforeach
                </select>

                <div class="div_error" id="grandeArea_error" style="display: none">
                    <span class="invalid-input">
                        <strong id="grandeArea_error_message"></strong>
                    </span>
                    <span class="invalid-input">
                        <strong id="grandeArea_error_message"></strong>
                    </span>
                </div>
            </div>

            <div class="form-group col-md-4">
                <label for="area" class="col-form-label">{{ __('Área') }} <span
                        style="color: red; font-weight:bold">*</span></label>
                <input type="hidden" id="oldArea" value="{{ old('area') }}">
                <select class="form-control @error('area') is-invalid @enderror" id="area" name="area"
                        onchange="subareas()" required>
                    <option value="" disabled selected hidden>Selecione a Área</option>
                    @foreach ($areas as $area)
                        <option @if (old('area') !== null ? old('area') : (isset($solicitacao) ? $solicitacao->area_id : '') == $area->id) selected @endif value="{{ $area->id }}">
                            {{ $area->nome }}</option>
                    @endforeach
                </select>

                <div class="div_error" id="area_error" style="display: none">
                    <span class="invalid-input">
                        <strong id="area_error_message"></strong>
                    </span>
                    <span class="invalid-input">
                        <strong id="area_error_message"></strong>
                    </span>
                </div>
            </div>
            <div class="form-group col-md-4">
                <label for="subArea" class="col-form-label">{{ __('Subárea') }} <span
                        style="color: red; font-weight:bold">*</span></label>
                <input type="hidden" id="oldSubArea" value="{{ old('subArea') }}">
                <select class="form-control @error('subArea') is-invalid @enderror" id="subArea" name="subArea" required>
                    <option value="" disabled selected hidden>Selecione a Subárea</option>
                    @foreach ($subAreas as $subArea)
                        <option @if (old('subArea') !== null ? old('subArea') : (isset($solicitacao) ? $solicitacao->sub_area_id : '') == $subArea->id) selected @endif value="{{ $subArea->id }}">
                            {{ $subArea->nome }}</option>
                    @endforeach
                </select>

                <div class="div_error" id="subArea_error" style="display: none">
                    <span class="invalid-input">
                        <strong id="subArea_error_message"></strong>
                    </span>
                    <span class="invalid-input">
                        <strong id="subArea_error_message"></strong>
                    </span>
                </div>
            </div>
        </div>

        @include('component.botoes_new_form')
    </form>


@include('component.modal_success')

<script>
    $('#form0').submit(function(event) {
        event.preventDefault()
        var formData = $(this).serialize();
        $.ajax({
            type: 'POST',
            url: '{{ route('solicitacao.criar') }}',
            data: formData,
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            dataType: 'json',
            success: function(response) {
                submitButton = $('#form0').find(':submit');
                markSaved(submitButton, true);

                var message = response.message;
                if (message == 'success') {
                    var campo = response.campo;
                    $('#successModal').modal('show');
                    $('#successModal').find('.msg-success').text('Os ' + campo +
                        ' foram salvos com sucesso!');

                    $('.div_error').css('display', 'none');
                    setTimeout(function() {
                        $('#successModal').modal('hide');
                    }, 2000);
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

    @if (!empty($solicitacao) && $solicitacao->outra_area_conhecimento != null)
        $(function() {
            if ($('#area_conhecimento').val() == 'outras') {
                $('#outra_area_conhecimento_div').show();
            }
        })
    @endif

    $('#area_conhecimento').on('change', function() {
        if ($('#area_conhecimento').val() != 'outras') {
            $('#outra_area_conhecimento_div').hide();
            $('#outra_area_conhecimento').prop('required', false);
        } else {
            $('#outra_area_conhecimento_div').show();
            $('#outra_area_conhecimento').prop('required', true);

        }
    });

    /*
     * FUNCAO: Gerar as areas
     *
     */
    function areas() {
        var grandeArea = $('#grandeArea').val();
        $.ajax({
            type: 'POST',
            url: '{{ route('area.consulta') }}',
            data: 'id=' + grandeArea,
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            success: (dados) => {

                if (dados.length > 0) {
                    if ($('#oldArea').val() == null || $('#oldArea').val() == "") {
                        var option = '<option selected disabled>-- Área --</option>';
                    }
                    $.each(dados, function(i, obj) {
                        if ($('#oldArea').val() != null && $('#oldArea').val() == obj.id) {
                            option += '<option selected value="' + obj.id + '">' + obj.nome +
                                '</option>';
                        } else {
                            option += '<option value="' + obj.id + '">' + obj.nome + '</option>';
                        }
                    })
                } else {
                    var option = "<option selected disabled>-- Área --</option>";
                }
                $('#area').html(option).show();
                subareas();
            },
            error: (data) => {
                console.log(data);
            }

        })
    }

    /*
     * FUNCAO: Gerar as subareas
     *
     */
    function subareas() {
        var area = $('#area').val();
        $.ajax({
            type: 'POST',
            url: '{{ route('subarea.consulta') }}',
            data: 'id=' + area,
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            success: (dados) => {
                if (dados.length > 0) {
                    if ($('#oldSubArea').val() == null || $('#oldSubArea').val() == "") {
                        var option = '<option selected disabled>-- Subárea --</option>';
                    }
                    $.each(dados, function(i, obj) {
                        if ($('#oldSubArea').val() != null && $('#oldSubArea').val() == obj.id) {
                            option += '<option selected value="' + obj.id + '">' + obj.nome +
                                '</option>';
                        } else {
                            option += '<option value="' + obj.id + '">' + obj.nome + '</option>';
                        }
                    })
                } else {
                    var option = "<option selected disabled>-- Subárea --</option>";
                }
                $('#subArea').html(option).show();
            },
            error: (dados) => {
                console.log(dados);
            }

        })

    }
</script>
@endsection
