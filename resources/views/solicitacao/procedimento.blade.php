<div class="card shadow-lg p-3 bg-white" style="border-radius: 0px 0px 10px 10px">
    @if($solicitacao->status == 'avaliado' && $solicitacao->avaliacao->first()->status == 'aprovadaPendencia')
        <a type="button" class="btn btn-info text-start" style="position: absolute;pointer-events: all;z-index:10;" data-toggle="modal" data-target="#pendenciaVisuModal" title="Pendência"><img src="{{asset('images/pendencia.svg')}}" width="30px"></a>
    @endif

    <form id="form8" method="POST" action="{{route('solicitacao.procedimento.criar')}}" enctype="multipart/form-data">
        @csrf
        <input type="hidden" name="planejamento_id" @if(!empty($planejamento)) value="{{$planejamento->id}}" @endif>

        <div class="row col-md-12" style="@if(Auth::user()->tipo_usuario_id == 2) pointer-events: none @endif">
            <h3 class="subtitulo">Informações</h3>

            <div class="col-sm-4 mt-2">
                <label for="estresse_radio">Estresse/dor intencional nos animais:<strong style="color: red">*</strong></label>
                <div class="row ml-1">
                    <div class="col-sm-2">
                        <input class="form-check-input" type="radio" name="estresse_radio" id="estresse_sim" @if(!empty($procedimento) && $procedimento->estresse != null) checked @endif>
                        <label class="form-check-label" for="estresse_radio">Sim</label>
                    </div>
                    <div class="col-sm-2">
                        <input class="form-check-input" type="radio" name="estresse_radio" id="estresse_nao" value="false" @if((!empty($procedimento) && $procedimento->estresse == null) || empty($procedimento)) checked @endif>
                        <label class="form-check-label" for="estresse_radio">
                            Não
                        </label>
                    </div>
                </div>
            </div>

            <div class="col-sm-4 mt-2">
                <label for="anestesico_radio">Uso de fármacos anestésicos:<strong style="color: red">*</strong></label>
                <div class="row ml-1">
                    <div class="col-sm-2">
                        <input class="form-check-input" type="radio" name="anestesico_radio" id="anestesico_sim" @if(!empty($procedimento) && $procedimento->anestesico != null) checked @endif>
                        <label class="form-check-label" for="anestesico_radio">Sim</label>
                    </div>
                    <div class="col-sm-2">
                        <input class="form-check-input" type="radio" name="anestesico_radio" id="anestesico_nao" value="false" @if((!empty($procedimento) && $procedimento->anestesico == null) || empty($procedimento)) checked @endif>
                        <label class="form-check-label" for="anestesico_radio">
                            Não
                        </label>
                    </div>
                </div>
            </div>

            <div class="col-sm-4 mt-2">
                <label for="relaxante_radio">Uso de relaxante muscular:<strong style="color: red">*</strong></label>
                <div class="row ml-1">
                    <div class="col-sm-2">
                        <input class="form-check-input" type="radio" name="relaxante_radio" id="relaxante_sim" @if(!empty($procedimento) && $procedimento->relaxante != null) checked @endif>
                        <label class="form-check-label" for="relaxante_radio">Sim</label>
                    </div>
                    <div class="col-sm-2">
                        <input class="form-check-input" type="radio" name="relaxante_radio" id="relaxante_nao" value="false" @if((!empty($procedimento) && $procedimento->relaxante == null) || empty($procedimento)) checked @endif>
                        <label class="form-check-label" for="relaxante_radio">
                            Não
                        </label>
                    </div>
                </div>
            </div>

            <div class="col-sm-4 mt-2">
                <label for="analgesico_radio">Uso de fármacos analgésicos:<strong style="color: red">*</strong></label>
                <div class="row ml-1">
                    <div class="col-sm-2">
                        <input class="form-check-input" type="radio" name="analgesico_radio" id="analgesico_sim" @if(!empty($procedimento) && $procedimento->analgesico != null) checked @endif>
                        <label class="form-check-label" for="analgesico_radio">Sim</label>
                    </div>
                    <div class="col-sm-2">
                        <input class="form-check-input" type="radio" name="analgesico_radio" id="analgesico_nao" value="false" @if((!empty($procedimento) && $procedimento->analgesico == null) || empty($procedimento)) checked @endif>
                        <label class="form-check-label" for="analgesico_radio">
                            Não
                        </label>
                    </div>
                </div>
            </div>

            <div class="col-sm-4 mt-2">
                <label for="imobilizacao_radio">Imobilização/Contenção do animal:<strong style="color: red">*</strong></label>
                <div class="row ml-1">
                    <div class="col-sm-2">
                        <input class="form-check-input" type="radio" name="imobilizacao_radio" id="imobilizacao_sim" @if(!empty($procedimento) && $procedimento->imobilizacao != null) checked @endif>
                        <label class="form-check-label" for="imobilizacao_radio">Sim</label>
                    </div>
                    <div class="col-sm-2">
                        <input class="form-check-input" type="radio" name="imobilizacao_radio" id="imobilizacao_nao" value="false" @if((!empty($procedimento) && $procedimento->imobilizacao == null) || empty($procedimento)) checked @endif>
                        <label class="form-check-label" for="imobilizacao_radio">
                            Não
                        </label>
                    </div>
                </div>
            </div>

            <div class="col-sm-4 mt-2">
                <label for="inoculacao_substancia_radio">Exposição / Inoculação / Administração:<strong style="color: red">*</strong></label>
                <div class="row ml-1">
                    <div class="col-sm-2">
                        <input class="form-check-input" type="radio" name="inoculacao_substancia_radio" id="inoculacao_substancia_sim" @if(!empty($procedimento) && $procedimento->inoculacao_substancia != null) checked @endif>
                        <label class="form-check-label" for="inoculacao_substancia_radio">Sim</label>
                    </div>
                    <div class="col-sm-2">
                        <input class="form-check-input" type="radio" name="inoculacao_substancia_radio" id="inoculacao_substancia_nao" value="false" @if((!empty($procedimento) && $procedimento->inoculacao_substancia == null) || empty($procedimento)) checked @endif>
                        <label class="form-check-label" for="inoculacao_substancia_radio">
                            Não
                        </label>
                    </div>
                </div>
            </div>

            <div class="col-sm-4 mt-2">
                <label for="extracao_radio">Extração de materiais biológicos:<strong style="color: red">*</strong></label>
                <div class="row ml-1">
                    <div class="col-sm-2">
                        <input class="form-check-input" type="radio" name="extracao_radio" id="extracao_sim" @if(!empty($procedimento) && $procedimento->extracao != null) checked @endif>
                        <label class="form-check-label" for="extracao_radio">Sim</label>
                    </div>
                    <div class="col-sm-2">
                        <input class="form-check-input" type="radio" name="extracao_radio" id="extracao_nao" value="false" @if((!empty($procedimento) && $procedimento->extracao == null) || empty($procedimento)) checked @endif>
                        <label class="form-check-label" for="extracao_radio">
                            Não
                        </label>
                    </div>
                </div>
            </div>

            {{-- Campos de textos das Informações --}}

            <div class="col-sm-12 mt-2" id="estresse" style="display: none;">
                <label for="estresse">Estresse/dor intencional nos animais:<strong style="color: red">*</strong></label>
                <textarea class="form-control @error('estresse') is-invalid @enderror" name="estresse" id="estresse" autocomplete="estresse" autofocus
                          required disabled>@if(!empty($procedimento) && $procedimento->estresse != null) {{$procedimento->estresse}} @else {{old('estresse')}} @endif</textarea>
                @error('estresse')
                <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
                @enderror
            </div>

            <div class="col-sm-12 mt-2" id="anestesico" style="display: none;">
                <label for="anestesico">Uso de fármacos anestésicos:<strong style="color: red">*</strong></label>
                <textarea class="form-control @error('anestesico') is-invalid @enderror" name="anestesico" id="anestesico" autocomplete="anestesico" autofocus
                          required disabled>@if(!empty($procedimento) && $procedimento->anestesico != null) {{$procedimento->anestesico}} @else {{old('anestesico')}} @endif</textarea>
                @error('anestesico')
                <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
                @enderror
            </div>

            <div class="col-sm-12 mt-2" id="relaxante" style="display: none;">
                <label for="relaxante">Uso de relaxante muscular:<strong style="color: red">*</strong></label>
                <textarea class="form-control @error('relaxante') is-invalid @enderror" name="relaxante" id="relaxante" autocomplete="relaxante" autofocus
                          required disabled>@if(!empty($procedimento) && $procedimento->relaxante != null) {{$procedimento->relaxante}} @else {{old('relaxante')}} @endif</textarea>
                @error('relaxante')
                <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
                @enderror
            </div>

            <div class="col-sm-12 mt-2" id="analgesico" style="display: none;">
                <label for="analgesico">Uso de fármacos analgésicos:<strong style="color: red">*</strong></label>
                <textarea class="form-control @error('analgesico') is-invalid @enderror" name="analgesico" id="analgesico" autocomplete="analgesico" autofocus
                          required disabled>@if(!empty($procedimento) && $procedimento->analgesico != null) {{$procedimento->analgesico}} @else {{old('analgesico')}} @endif</textarea>
                @error('analgesico')
                <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
                @enderror
            </div>

            <div class="col-sm-12 mt-2" id="imobilizacao" style="display: none;">
                <label for="imobilizacao">Imobilização/Contenção do animal:<strong style="color: red">*</strong></label>
                <textarea class="form-control @error('imobilizacao') is-invalid @enderror" name="imobilizacao" id="imobilizacao" autocomplete="imobilizacao" autofocus
                          required disabled>@if(!empty($procedimento) && $procedimento->imobilizacao != null) {{$procedimento->imobilizacao}} @else {{old('imobilizacao')}} @endif</textarea>
                @error('imobilizacao')
                <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
                @enderror
            </div>

            <div class="col-sm-12 mt-2" id="inoculacao_substancia" style="display: none;">
                <label for="inoculacao_substancia">Exposição / Inoculação / Administração:<strong style="color: red">*</strong></label>
                <textarea class="form-control @error('inoculacao_substancia') is-invalid @enderror" name="inoculacao_substancia" id="inoculacao_substancia" autocomplete="inoculacao_substancia" autofocus
                          required disabled>@if(!empty($procedimento) && $procedimento->inoculacao_substancia != null) {{$procedimento->inoculacao_substancia}} @else {{old('inoculacao_substancia')}} @endif</textarea>
                @error('inoculacao_substancia')
                <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
                @enderror
            </div>

            <div class="col-sm-12 mt-2" id="extracao" style="display: none;">
                <label for="extracao">Extração de materiais biológicos:<strong style="color: red">*</strong></label>
                <textarea class="form-control @error('extracao') is-invalid @enderror" name="extracao" id="extracao" autocomplete="extracao" autofocus
                          required disabled>@if(!empty($procedimento) && $procedimento->extracao != null) {{$procedimento->extracao}} @else {{old('extracao')}} @endif</textarea>
                @error('extracao')
                <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
                @enderror
            </div>

            <h3 class="subtitulo">Condições alimentares</h3>

            <div class="col-sm-4 mt-2">
                <label for="jejum">Jejum:<strong style="color: red">*</strong></label>
                <div class="row ml-1">
                    <div class="col-sm-2">
                        <input class="form-check-input" type="radio" name="jejum_radio" id="jejum_sim" @if(!empty($procedimento) && $procedimento->jejum != null) checked @endif>
                        <label class="form-check-label" for="jejum">Sim</label>
                    </div>
                    <div class="col-sm-2">
                        <input class="form-check-input" type="radio" name="jejum_radio" id="jejum_nao" value="false" @if((!empty($procedimento) && $procedimento->jejum == null) || empty($procedimento)) checked @endif>
                        <label class="form-check-label" for="jejum">
                            Não
                        </label>
                    </div>
                </div>
            </div>

            <div class="col-sm-4 mt-2">
                <label for="restricao_hidrica">Restrição Hídrica:<strong style="color: red">*</strong></label>
                <div class="row ml-1">
                    <div class="col-sm-2">
                        <input class="form-check-input" type="radio" name="restricao_hidrica_radio" id="restricao_hidrica_sim" @if(!empty($procedimento) && $procedimento->restricao_hidrica != null) checked @endif>
                        <label class="form-check-label" for="restricao_hidrica_radio">Sim</label>
                    </div>
                    <div class="col-sm-2">
                        <input class="form-check-input" type="radio" name="restricao_hidrica_radio" id="restricao_hidrica_nao"  value="false" @if((!empty($procedimento) && $procedimento->restricao_hidrica == null) || empty($procedimento)) checked @endif>
                        <label class="form-check-label" for="restricao_hidrica_radio">
                            Não
                        </label>
                    </div>
                </div>
            </div>

            {{-- Campos de textos das Condições Alimentares --}}
            <div class="col-sm-12 mt-2" id="jejum" style="display: none;">
                <label for="jejum">Jejum:<strong style="color: red">*</strong></label>
                <textarea class="form-control @error('jejum') is-invalid @enderror" name="jejum" id="jejum" autocomplete="jejum" autofocus
                          required disabled>@if(!empty($procedimento) && $procedimento->jejum != null) {{$procedimento->jejum}} @else {{old('jejum')}} @endif</textarea>
                @error('jejum')
                <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
                @enderror
            </div>

            <div class="col-sm-12 mt-2" id="restricao_hidrica" style="display: none;">
                <label for="restricao_hidrica">Restrição Hídrica:<strong style="color: red">*</strong></label>
                <textarea class="form-control @error('restricao_hidrica') is-invalid @enderror" name="restricao_hidrica" id="restricao_hidrica" autocomplete="restricao_hidrica" autofocus
                          required disabled>@if(!empty($procedimento) && $procedimento->restricao_hidrica != null) {{$procedimento->restricao_hidrica}} @else {{old('restricao_hidrica')}} @endif</textarea>
                @error('restricao_hidrica')
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
    $( "#restricao_hidrica_sim" ).click(function() {
        $("#restricao_hidrica").show().find('input, textarea').prop('disabled', false);
    });
    $( "#restricao_hidrica_nao" ).click(function() {
        $("#restricao_hidrica").hide().find('input, textarea').prop('disabled', true);
    });

    //Restrição Alimentar / Jejum Alimentar
    $( "#jejum_sim" ).click(function() {
        $("#jejum").show().find('input, textarea').prop('disabled', false);
    });
    $( "#jejum_nao" ).click(function() {
        $("#jejum").hide().find('input, textarea').prop('disabled', true);
    });

    // Informações
    //Extração de materiais biológicos
    $( "#extracao_sim" ).click(function() {
        $("#extracao").show().find('input, textarea').prop('disabled', false);
    });
    $( "#extracao_nao" ).click(function() {
        $("#extracao").hide().find('input, textarea').prop('disabled', true);
    });

    //Inoculação de substância
    $( "#inoculacao_substancia_sim" ).click(function() {
        $("#inoculacao_substancia").show().find('input, textarea').prop('disabled', false);
    });
    $( "#inoculacao_substancia_nao" ).click(function() {
        $("#inoculacao_substancia").hide().find('input, textarea').prop('disabled', true);
    });

    //Imobilização
    $( "#imobilizacao_sim" ).click(function() {
        $("#imobilizacao").show().find('input, textarea').prop('disabled', false);
    });
    $( "#imobilizacao_nao" ).click(function() {
        $("#imobilizacao").hide().find('input, textarea').prop('disabled', true);
    });

    //Analgésico
    $( "#analgesico_sim" ).click(function() {
        $("#analgesico").show().find('input, textarea').prop('disabled', false);
    });
    $( "#analgesico_nao" ).click(function() {
        $("#analgesico").hide().find('input, textarea').prop('disabled', true);
    });

    //Relaxante
    $( "#relaxante_sim" ).click(function() {
        $("#relaxante").show().find('input, textarea').prop('disabled', false);
    });
    $( "#relaxante_nao" ).click(function() {
        $("#relaxante").hide().find('input, textarea').prop('disabled', true);
    });

    //Anestesico
    $( "#anestesico_sim" ).click(function() {
        $("#anestesico").show().find('input, textarea').prop('disabled', false);
    });
    $( "#anestesico_nao" ).click(function() {
        $("#anestesico").hide().find('input, textarea').prop('disabled', true);
    });

    //Extresse
    $( "#estresse_sim" ).click(function() {
        $("#estresse").show().find('input, textarea').prop('disabled', false);
    });
    $( "#estresse_nao" ).click(function() {
        $("#estresse").hide().find('input, textarea').prop('disabled', true);
    });

</script>

