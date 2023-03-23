<div class="card shadow-lg p-3 bg-white" style="border-radius: 0px 0px 10px 10px">

    <form id="form10" method="POST" action="{{route('solicitacao.eutanasia.criar')}}">
        @csrf
        <input type="hidden" name="planejamento_id" @if(!empty($planejamento)) value="{{$planejamento->id}}" @endif>
        <div class="row col-md-12" style=" @if(Auth::user()->tipo_usuario_id == 2) pointer-events: none @endif">
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
                    <textarea class="form-control @error('descricao') is-invalid @enderror" name="descricao" id="descricao"
                              autocomplete="descricao" autofocus required>@if(!empty($eutanasia) && $eutanasia->descricao != null){{$eutanasia->descricao}}@else{{old('descricao')}}@endif</textarea>
                    @error('descricao')
                    <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                    @enderror
                </div>

                <div class="col-sm-12 mt-2">
                    <label for="metodo">Substância, Dose, Via:<strong style="color: red">*</strong></label>
                    <textarea class="form-control @error('metodo') is-invalid @enderror" name="metodo" id="metodo"
                              autocomplete="metodo" autofocus required>@if(!empty($eutanasia) && $eutanasia->metodo != null){{$eutanasia->metodo}}@else{{old('metodo')}}@endif</textarea>
                    @error('metodo')
                    <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                    @enderror
                </div>

                <div class="col-sm-12 mt-2">
                    <label for="justificativa_metodo">Caso Método Restrito, Justifique:<strong style="color: red">*</strong></label>
                    <textarea class="form-control @error('justificativa_metodo') is-invalid @enderror"
                              name="justificativa_metodo" id="justificativa_metodo" autocomplete="justificativa_metodo"
                              autofocus
                              required>@if(!empty($eutanasia) &&  $eutanasia->justificativa_metodo != null){{$eutanasia->justificativa_metodo}}@else{{old('justificativa_metodo')}}@endif</textarea>
                    @error('justificativa_metodo')
                    <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                    @enderror
                </div>
            </div>

            <div class="col-sm-12 mt-2">
                <label for="destino">Destino dos Animais Mortos e / ou Tecidos / Fragmentos:<strong style="color: red">*</strong></label>
                <textarea class="form-control @error('destino') is-invalid @enderror" name="destino" id="destino"
                          autocomplete="destino" autofocus required>@if(!empty($eutanasia) && $eutanasia->destino != null){{$eutanasia->destino}}@else{{old('destino')}}@endif</textarea>
                @error('destino')
                <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
                @enderror
            </div>

            <div class="col-sm-12 mt-2">
                <label for="descarte">Forma de Descarte da Carcaça:<strong style="color: red">*</strong></label>
                <textarea class="form-control @error('descarte') is-invalid @enderror" name="descarte" id="descarte"
                          autocomplete="descarte" autofocus required>@if(!empty($eutanasia) && $eutanasia->descarte != null){{$eutanasia->descarte}}@else{{old('descarte')}}@endif</textarea>
                @error('descarte')
                <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
                @enderror
            </div>
        </div>
        @include('component.botoes_new_form')
    </form>

    <form id="form11" method="POST" action="{{route('solicitacao.resultado.criar')}}">
        @csrf
        <input type="hidden" name="planejamento_id" @if(!empty($planejamento)) value="{{$planejamento->id}}" @endif>
        <div class="row col-md-12" style=" @if(Auth::user()->tipo_usuario_id == 2) pointer-events: none @endif">
            <h3 class="subtitulo">Outras Informações</h3>

            <div class="col-sm-12 mt-2">
                <label for="destino_animais">Destino dos animais sobreviventes após a conclusão do experimento / aula ou retirados no decorrer do experimento / aula:<strong style="color: red">*</strong></label>
                <textarea class="form-control @error('destino_animais') is-invalid @enderror" name="destino_animais" id="destino_animais" autocomplete="destino_animais" autofocus
                          required>@if(!empty($resultado) && $resultado->destino_animais != null){{$resultado->destino_animais}} @else{{old('destino_animais')}}@endif</textarea>
                @error('destino_animais')
                <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
                @enderror
            </div>

            <div class="col-sm-12 mt-2">
                <label for="outras_infos">Outras Informações Relevantes:<strong style="color: red">*</strong></label>
                <textarea class="form-control @error('outras_infos') is-invalid @enderror" name="outras_infos" id="outras_infos" autocomplete="outras_infos" autofocus
                          required>@if(!empty($resultado) && $resultado->outras_infos != null){{$resultado->outras_infos}} @else{{old('outras_infos')}}@endif</textarea>
                @error('outras_infos')
                <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
                @enderror
            </div>

            <div class="col-sm-12 mt-2">
                <label for="justificativa_metodos">Justificativa da não utilização de métodos alternativos e da necessidade do uso de animais:<strong style="color: red">*</strong></label>
                <textarea class="form-control @error('justificativa_metodos') is-invalid @enderror" name="justificativa_metodos" id="justificativa_metodos" autocomplete="justificativa_metodos"
                          autofocus required>@if(!empty($resultado) && $resultado->justificativa_metodos != null){{$resultado->justificativa_metodos}} @else{{old('justificativa_metodos')}}@endif</textarea>
                @error('justificativa_metodos')
                <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
                @enderror
            </div>

            <div class="col-sm-12 mt-2">
                <label for="resumo_procedimento">Resumo do procedimento (relatar todos os procedimentos com os animais):<strong style="color: red">*</strong></label>
                <textarea class="form-control @error('resumo_procedimento') is-invalid @enderror" name="resumo_procedimento" id="resumo_procedimento" autocomplete="resumo_procedimento" autofocus
                          required>@if(!empty($resultado) && $resultado->resumo_procedimento != null){{$resultado->resumo_procedimento}} @else{{old('resumo_procedimento')}}@endif</textarea>
                @error('resumo_procedimento')
                <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
                @enderror
            </div>

            <div class="col-sm-6 mt-2">
                <label for="abate">Abate:<strong style="color: red">*</strong></label>
                <div class="row ml-1">
                    <div class="col-sm-2">
                        <input class="form-check-input" type="radio" name="abate_radio" id="abate_sim" value="true" @if(!empty($resultado) && $resultado->abate != null) checked @endif>
                        <label class="form-check-label" for="abate">Sim</label>
                    </div>
                    <div class="col-sm-2">
                        <input class="form-check-input" type="radio" name="abate_radio" id="abate_nao" value="false" @if(!empty($resultado) && $resultado->abate == null) checked @endif>
                        <label class="form-check-label" for="abate">
                            Não
                        </label>
                    </div>
                </div>
            </div>
            <div class="col-sm-12 mt-2" id="destino_animal_abatido" style="display: none;">
                <label for="destino_animais">Destino dos Animais Abatidos:<strong style="color: red">*</strong></label>
                <textarea class="form-control @error('abate') is-invalid @enderror" name="abate" id="destino_animais" autocomplete="destino_animais" autofocus
                          required disabled>@if(!empty($resultado) && $resultado->abate != null){{$resultado->abate}} @else{{old('abate')}}@endif</textarea>
                @error('abate')
                <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
                @enderror
            </div>
        </div>

        @include('component.botoes_new_form')

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

    $( "#abate_sim" ).click(function() {
        $("#destino_animal_abatido").show().find('input, textarea').prop('disabled', false);
    });
    $( "#abate_nao" ).click(function() {
        $("#destino_animal_abatido").hide().find('input, textarea').prop('disabled', true);
    });

    
</script>

