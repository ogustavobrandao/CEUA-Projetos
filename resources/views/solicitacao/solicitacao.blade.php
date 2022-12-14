<div class="card shadow-lg p-3 bg-white" style="border-radius: 0px 0px 10px 10px">
    @if($solicitacao->status == 'avaliado' && $solicitacao->avaliacao->first()->status == 'aprovadaPendencia')
        <a type="button" class="btn btn-info text-start" style="position: absolute;pointer-events: all;z-index:10;"
           data-toggle="modal" data-target="#pendenciaVisuModal" title="Pendência"><img
                src="{{asset('images/pendencia.svg')}}" width="30px"></a>
    @endif

    <form id="form0" method="POST" action="{{route('solicitacao.criar')}}">
        @csrf
        <input type="hidden" name="solicitacao_id" value="{{$solicitacao->id}}">
        <div class="row">
            <div class="col-12">
                <h3 class="subtitulo">Finalidade</h3>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-4">
                <label for="tipo">Tipo:</label>
                <input class="form-control" type="text" value="{{ $solicitacao->tipo  }}" disabled>
            </div>

            <div class="col-sm-4">
                <label for="inicio">Inicio:<strong style="color: red">*</strong></label>
                <input class="form-control @error('inicio') is-invalid @enderror" id="inicio" type="datetime-local"
                       name="inicio"
                       @if(!empty($solicitacao) && $solicitacao->inicio != null) value="{{$solicitacao->inicio}}"
                       @else value="{{old('inicio')}}" @endif
                       required
                       autocomplete="inicio" autofocus>
                @error('inicio')
                <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
                @enderror
            </div>

            <div class="col-sm-4">

                <label for="inicio">Fim:<strong style="color: red">*</strong></label>
                <input class="form-control @error('fim') is-invalid @enderror" id="fim" type="datetime-local" name="fim"
                       @if(!empty($solicitacao) && $solicitacao->fim != null) value="{{$solicitacao->fim}}"
                       @else value="{{old('fim')}}" @endif
                       required
                       autocomplete="fim" autofocus>
                @error('fim')
                <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
                @enderror
            </div>
        </div>

        <div class="row mt-2">
            <div class="col-12">
                <h3 class="subtitulo">Titulo do Projeto/Aula Prática/Treinamento</h3>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-4">
                <label for="titulo_pt">Título em Português:<strong style="color: red">*</strong></label>
                <input class="form-control @error('titulo_pt') is-invalid @enderror" id="titulo_pt" type="text"
                       name="titulo_pt"
                       value="@if(!empty($solicitacao) && $solicitacao->titulo_pt != null) {{$solicitacao->titulo_pt}} @else {{ old('titulo_pt') }} @endif"
                       required
                       autocomplete="titulo_pt" autofocus>
                @error('titulo_pt')
                <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
                @enderror
            </div>

            <div class="col-sm-4">
                <label for="titulo_en">Titulo em Inglês (Apenas para projeto):<strong
                        style="color: red">*</strong></label>
                <input class="form-control @error('titulo_en') is-invalid @enderror" id="titulo_en" type="text"
                       name="titulo_en"
                       value="@if(!empty($solicitacao) && $solicitacao->titulo_en != null) {{$solicitacao->titulo_en}} @else {{ old('titulo_en') }} @endif"
                       required
                       autocomplete="titulo_en" autofocus>
                @error('titulo_en')
                <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
                @enderror
            </div>

            <div class="col-sm-4">
                <label for="area_conhecimento">Área de conhecimento:<strong style="color: red">*</strong></label>
                <select class="form-control @error('area_conhecimento') is-invalid @enderror" id="area_conhecimento"
                        name="area_conhecimento">
                    <option disabled selected>Selecione a Área de Conhecimento</option>
                    <option value="ciencias_agrarias"
                            @if(!empty($solicitacao) && $solicitacao->area_conhecimento == 'ciencias_agrarias') selected @endif>
                        Ciências Agrárias
                    </option>
                    <option value="ciencias_biologicas"
                            @if(!empty($solicitacao) && $solicitacao->area_conhecimento == 'ciencias_biologicas') selected @endif>
                        Ciências Biológicas
                    </option>
                    <option value="ciencias_saude"
                            @if(!empty($solicitacao) && $solicitacao->area_conhecimento == 'ciencias_saude') selected @endif>
                        Ciências da Saúde
                    </option>
                    <option value="ciencias_exatas_terra"
                            @if(!empty($solicitacao) && $solicitacao->area_conhecimento == 'ciencias_exatas_terra') selected @endif>
                        Ciências Exatas e da Terra
                    </option>
                    <option value="ciencias_humanas"
                            @if(!empty($solicitacao) && $solicitacao->area_conhecimento == 'ciencias_humanas') selected @endif>
                        Ciências Humanas
                    </option>
                    <option value="ciencias_sociais_aplicadas"
                            @if(!empty($solicitacao) && $solicitacao->area_conhecimento == 'ciencias_sociais_aplicadas') selected @endif>
                        Ciências Sociais Aplicadas
                    <option value="ciencias_ambientais"
                            @if(!empty($solicitacao) && $solicitacao->area_conhecimento == 'ciencias_ambientais') selected @endif>
                        Ciências Ambientais
                    </option>
                    <option value="engenharias"
                            @if(!empty($solicitacao) && $solicitacao->area_conhecimento == 'engenharias') selected @endif>
                        Engenharias
                    </option>
                    <option value="linguistica_letras_artes"
                            @if(!empty($solicitacao) && $solicitacao->area_conhecimento == 'linguistica_letras_artes') selected @endif>
                        Linguística,Letras e Artes
                    </option>
                    <option value="outras"
                            @if(!empty($solicitacao) && $solicitacao->area_conhecimento == 'outras') selected @endif>
                        Outras
                    </option>
                </select>
                @error('area_conhecimento')
                <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
                @enderror
            </div>
        </div>

        <div id="outra_area_conhecimento_div" class="row mt-2" style="display: none">
            <div class="col-4">
                <label for="outra_area_conhecimento">Outra área de conhecimento:<strong
                        style="color: red">*</strong></label>
                <input class="form-control" id="outra_area_conhecimento" type="text" name="outra_area_conhecimento"
                       value="@if(!empty($solicitacao) && $solicitacao->outra_area_conhecimento != null) {{$solicitacao->outra_area_conhecimento}} @else {{ old('outra_area_conhecimento') }} @endif"
                       autocomplete="outra_area_conhecimento" autofocus>
            </div>
        </div>

        @include('component.botoes_new_form')
    </form>

</div>

<script>
    @if(!empty($solicitacao) && $solicitacao->outra_area_conhecimento != null)
    $(function () {
        if($('#area_conhecimento').val() == 'outras')
        {
            $('#outra_area_conhecimento_div').show();
        }
    })
    @endif

    $('#area_conhecimento').on('change', function () {
        if ($('#area_conhecimento').val() != 'outras') {
            $('#outra_area_conhecimento_div').hide();
            $('#outra_area_conhecimento').prop('required', false);
        } else {
            $('#outra_area_conhecimento_div').show();
            $('#outra_area_conhecimento').prop('required', true);

        }
    });
</script>
