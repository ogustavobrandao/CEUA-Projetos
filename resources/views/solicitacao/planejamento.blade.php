<div class="card shadow-lg p-3 bg-white" style="border-radius: 0px 0px 10px 10px">

    <form id="form6" method="POST" action="{{route('solicitacao.planejamento.criar')}}" enctype="multipart/form-data">
        @csrf
        <input type="hidden" name="modelo_animal_id" value="{{$modelo_animal->id}}">
        <div class="row">
            <h3 class="subtitulo">Planejamento Estatístico / Delineamento Experimental / Desenho Experimental</h3>
            <div class="col-sm-2">
                <label for="num_animais_grupo">Número de Grupos:<strong style="color: red">*</strong></label>
                <input class="form-control @error('num_animais_grupo') is-invalid @enderror" id="num_animais_grupo"
                       type="number" name="num_animais_grupo"
                       value="@if(!empty($planejamento) && $planejamento->num_animais_grupo != null){{$planejamento->num_animais_grupo}}@else{{ old('num_animais_grupo')}} @endif"
                       required
                       autocomplete="num_animais_grupo" autofocus>
                <div class="div_error" id="num_animais_grupo_error" style="display: none">
                    <span class="invalid-input">
                        <strong id="num_animais_grupo_error_message"></strong>
                    </span>
                </div>
            </div>

            <div class="col-sm-5">
                <label for="especificar_grupo">Especificar cada grupo (controle, tratado, utilizado para treinamento, se for o caso)
                    e número de animais por grupo:<strong style="color: red">*</strong></label>
                <textarea class="form-control @error('especificar_grupo') is-invalid @enderror" id="especificar_grupo"
                          name="especificar_grupo" required autocomplete="especificar_grupo"
                          autofocus>@if(!empty($planejamento) && $planejamento->especificar_grupo != null){{$planejamento->especificar_grupo}}@else{{ old('especificar_grupo')}}@endif</textarea>
                <div class="div_error" id="especificar_grupo_error" style="display: none">
                    <span class="invalid-input">
                        <strong id="especificar_grupo_error_message"></strong>
                    </span>
                </div>
            </div>

            <div class="col-sm-5">
                <label for="criterios">Quais critérios e / ou referências científicas foram utilizados para definir o
                    tamanho da amostra:<strong style="color: red">*</strong> </label>
                <textarea class="form-control @error('criterios') is-invalid @enderror" id="criterios" name="criterios"
                          required autocomplete="criterios"
                          autofocus>@if(!empty($planejamento) && $planejamento->criterios != null){{$planejamento->criterios}}@else{{ old('criterios')}}@endif</textarea>
                <div class="div_error" id="criterios_error" style="display: none">
                    <span class="invalid-input">
                        <strong id="criterios_error_message"></strong>
                    </span>
                </div>
            </div>

            {{-- <div class="col-sm-12 mt-2">
                <label>Anexar <span style="color: darkred">PDF</span> de amostra:</label>
            </div>
            <div class="col-sm-6">
                @if(\Illuminate\Support\Facades\Auth::user()->tipo_usuario_id == 2)
                    @if($planejamento->anexo_amostra_planejamento == null)
                        <br>
                        <a class="btn btn-secondary"
                        href="#">Não Enviado</a>
                    @else
                    <a class="btn btn-primary"
                       href="{{route('anexo_amostra_planejamento.download', ['planejamento_id' => $planejamento->id])}}">Baixar
                        Amostra</a>
                    @endif
                @else
                    @if(!empty($planejamento))
                        <input class="form-control @error('anexo_amostra_planejamento') is-invalid @enderror" id="anexo_amostra_planejamento"
                               type="file" name="anexo_amostra_planejamento"
                               value="" autocomplete="anexo_amostra_planejamento" autofocus
                               @if($planejamento->anexo_amostra_planejamento != null) style="width: 135px" @endif>
                        @error('anexo_amostra_planejamento')
                        <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
                        @enderror
                        @if($planejamento->anexo_amostra_planejamento != null)
                            <span
                                style="border: 1px gray solid; border-radius: 10px; text-align: center; width: 250px; position: absolute; bottom: 0px; left: 155px; height: 38px; padding-top: 5px; background-color: #dcfadf">Um Arquivo Já Foi Enviado</span>
                        @endif
                    @else
                        <input class="form-control @error('anexo_amostra_planejamento') is-invalid @enderror" id="anexo_amostra_planejamento"
                               type="file" name="anexo_amostra_planejamento"
                               value="{{old('anexo_amostra_planejamento')}}" autocomplete="anexo_amostra_planejamento" autofocus>
                        @error('anexo_amostra_planejamento')
                        <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
                        @enderror
                    @endif
                @endif
            </div> --}}

        </div>

        <div class="row mt-2">
            <div class="col-sm-12 mt-2">
                <label>Apresentar, em anexo no formato <span style="color: darkred">PDF</span>, a
                    Fórmula Matemática que defina o "n" amostral. Apresentar o Desenho Experimental completo.
                    Quando não for o caso, justifique.</label>
            </div>
            <div class="col-sm-6">
                @if(\Illuminate\Support\Facades\Auth::user()->tipo_usuario_id == 2 || \Illuminate\Support\Facades\Auth::user()->tipo_usuario_id == 1)
                    @if($planejamento->anexo_formula == null)
                        <br>
                        <a class="btn btn-secondary"
                        href="#">Não Enviado</a>
                    @else
                        <a class="btn btn-primary"
                        href="{{route('planejamento.formula.download', ['planejamento_id' => $planejamento->id])}}">Baixar
                            Fórmula</a>
                    @endif
                @else
                    @if(!empty($planejamento))
                        <input class="form-control @error('anexo_formula') is-invalid @enderror" id="anexo_formula"
                               type="file" accept="application/pdf" name="anexo_formula"
                               value="" autocomplete="anexo_formula" autofocus
                               @if($planejamento->anexo_formula != null) style="width: 135px" @endif>
                        <div class="div_error" id="anexo_formula_error" style="display: none">
                            <span class="invalid-input">
                                <strong id="anexo_formula_error_message"></strong>
                            </span>
                        </div>
                        @if($planejamento->anexo_formula != null)
                            <span
                                style="border: 1px gray solid; border-radius: 10px; text-align: center; width: 250px; position: absolute; bottom: 0px; left: 155px; height: 38px; padding-top: 5px; background-color: #dcfadf">Um Arquivo Já Foi Enviado</span>
                        @endif
                    @else
                        <input class="form-control @error('anexo_formula') is-invalid @enderror" id="anexo_formula"
                               type="file" accept="application/pdf" name="anexo_formula"
                               value="{{old('anexo_formula')}}" autocomplete="anexo_formula" autofocus>
                        <div class="div_error" id="anexo_formula_error" style="display: none">
                            <span class="invalid-input">
                                <strong id="anexo_formula_error_message"></strong>
                            </span>
                        </div>
                    @endif
                @endif
            </div>
        </div>

        <div class="row mt-2 mt-2">
            <div class="col-sm-6">
                <label for="desc_materiais_metodos">Descrição de Materiais e Métodos:<strong style="color: red">*</strong></label>
                <textarea class="form-control @error('desc_materiais_metodos') is-invalid @enderror"
                          id="desc_materiais_metodos" name="desc_materiais_metodos" required
                          autocomplete="desc_materiais_metodos" maxlength="1000"
                          autofocus>@if(!empty($planejamento) && $planejamento->desc_materiais_metodos != null){{$planejamento->desc_materiais_metodos}}@else{{old('desc_materiais_metodos')}}@endif</textarea>
                <div class="div_error" id="des_materiais_metodos_error" style="display: none">
                    <span class="invalid-input">
                        <strong id="des_materiais_metodos_error_message"></strong>
                    </span>
                </div>
            </div>

            <div class="col-sm-6">
                <label for="analise_estatistica">Análise Estatística:<strong style="color: red">*</strong></label>
                <textarea class="form-control @error('analise_estatistica') is-invalid @enderror"
                          id="analise_estatistica" name="analise_estatistica" required
                          autocomplete="analise_estatistica"
                          autofocus>@if(!empty($planejamento) && $planejamento->analise_estatistica != null){{$planejamento->analise_estatistica}}@else{{old('analise_estatistica')}}@endif</textarea>
                <div class="div_error" id="analise_estatistica_error" style="display: none">
                    <span class="invalid-input">
                        <strong id="analise_estatistica_error_message"></strong>
                    </span>
                </div>
            </div>
        </div>

        <div class="row mt-2">
            <div class="col-sm-12">
                <label for="outras_infos">Outras Informações Relevantes:<strong style="color: red">*</strong></label>
                <textarea class="form-control @error('outras_infos') is-invalid @enderror" id="outras_infos"
                          name="outras_infos" required autocomplete="outras_infos"
                          autofocus>@if(!empty($planejamento) && $planejamento->outras_infos != null){{$planejamento->outras_infos}}@else{{old('outras_infos')}}@endif</textarea>
                <div class="div_error" id="outras_infos_error" style="display: none">
                    <span class="invalid-input">
                        <strong id="outras_infos_error_message"></strong>
                    </span>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="row">
                <div class="col-auto">
                    <h3 class="subtitulo">Grau de Invasividade</h3>
                </div>
                <div class="col-auto mt-3" style="margin-left: -20px">
                    <span
                        style="font-weight: lighter!important; font-size: 14px!important; color: dimgray; text-decoration: none!important;">(1,2,3 ou 4)</span>
                </div>
            </div>
            <div class="col-sm-12">
                <label for="grau_select">Grau de Invasividade:<strong style="color: red">*</strong>
                    <a target="_blank"
                       href="https://www2.dti.ufv.br/ceua/scripts/grau-invasividade.html"
                       title="Informações sobre o grau de invasividade" style="color: darkred">
                        <i class="fa-solid fa-circle-info fa-lg"></i>
                    </a>
                </label>
                <select class="form-control" name="grau_invasividade" id="grau_invasividade" required>
                    <option value="GI1"
                            @if($planejamento != null && $planejamento->grau_invasividade == "GI1") selected @endif>GI1 =
                        Experimentos que causam pouco ou nenhum desconforto ou estresse
                    </option>
                    <option value="GI2"
                            @if($planejamento != null && $planejamento->grau_invasividade == "GI2") selected @endif>GI2 =
                        Experimentos que causam estresse, desconforto ou dor, de leve
                        intensidade
                    </option>
                    <option value="GI3"
                            @if($planejamento != null && $planejamento->grau_invasividade == "GI3") selected @endif>GI3 =
                        Experimentos que causam estresse, desconforto ou dor, de intensidade
                        intermediária
                    </option>
                    <option value="GI4"
                            @if($planejamento != null && $planejamento->grau_invasividade == "GI4") selected @endif>GI4 =
                        Experimentos que causam dor de alta intensidade
                    </option>
                </select>
            </div>

        </div>
        <br>
        @include('component.botoes_new_form')

    </form>

</div>
<script>
    $('#form6').submit(function (event) {
        event.preventDefault();

        var formData = new FormData(this);

        $.ajax({
            type: 'POST',
            url: '{{ route('solicitacao.planejamento.criar') }}',
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
                } else {
                    alert("Erro na requisição Ajax: " + error);
                }
            }
        });
    });
</script>
