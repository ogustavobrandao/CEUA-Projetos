<div class="card shadow-lg p-3 bg-white" style="border-radius: 10px">
    @if($solicitacao->status == 'avaliado' && $solicitacao->avaliacao->first()->status == 'aprovadaPendencia')
        <a type="button" class="btn btn-info text-start" style="position: absolute;pointer-events: all;z-index:10;" data-toggle="modal" data-target="#pendenciaVisuModal" title="Pendência"><img src="{{asset('images/pendencia.svg')}}" width="30px"></a>
    @endif
    <div class="row">
        <div class="col-md-12">
            <h1 class="borda-bottom text-center titulo">Solicitação - Modelo Animal</h1>
        </div>
    </div>
    <form id="form4" method="POST" action="{{route('solicitacao.modelo_animal.criar')}}">
        @csrf
        <input type="hidden" name="solicitacao_id" value="{{$solicitacao->id}}">
        <div class="row">
            <h3 class="subtitulo">Informações do Animal/Uso</h3>
            <div class="col-sm-6">
                <label for="nome_cientifico">Nome ciêntifico:</label>
                <input class="form-control @error('nome_cientifico') is-invalid @enderror" id="nome_cientifico" type="text" name="nome_cientifico" @if($modelo_animal != null && $modelo_animal->nome_cientifico != null) value="{{$modelo_animal->nome_cientifico}}" @else value="{{old('nome_cientifico')}}" @endif required
                       autocomplete="nome_cientifico" autofocus>
                @error('nome_cientifico')
                <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
                @enderror
            </div>

            <div class="col-sm-6">
                <label for="nome_vulgar">Nome vulgar:</label>
                <input class="form-control @error('nome_vulgar') is-invalid @enderror" id="nome_vulgar" type="text" name="nome_vulgar" @if($modelo_animal != null && $modelo_animal->nome_vulgar != null) value="{{$modelo_animal->nome_vulgar}}" @else value="{{old('nome_vulgar')}}" @endif required
                       autocomplete="nome_vulgar"
                       autofocus>
                @error('nome_vulgar')
                <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
                @enderror
            </div>

            <div class="col-sm-12 mt-2">
                <label for="justificativa">Justificar o uso dos procedimentos e da espécie animal:</label>
                <textarea class="form-control @error('justificativa') is-invalid @enderror" id="justificativa" name="justificativa" required autocomplete="justificativa"
                          autofocus>@if($modelo_animal != null && $modelo_animal->justificativa != null){{$modelo_animal->justificativa}}@else{{old('justificativa')}}@endif</textarea>
                @error('justificativa')
                <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
                @enderror
            </div>

        </div>

        <div>
            <h3 class="subtitulo">Procedência</h3>
            <div class="row">
                <div class="col-sm-6">
                    <label for="procedencia">Procedência:</label>
                    <select class="form-control" id="procedencia" name="procedencia">
                        <option disabled selected>Selecione a Procedência</option>
                        <option @if($modelo_animal != null && $modelo_animal->procedencia == "animal_comprado") selected @endif value="animal_comprado">Animal comprado</option>
                        <option @if($modelo_animal != null && $modelo_animal->procedencia == "animal_criacao") selected @endif value="animal_criacao">Animal de criação ou de casuística hospitalar</option>
                        <option @if($modelo_animal != null && $modelo_animal->procedencia == "animal_doado") selected @endif value="animal_doado">Animal doado</option>
                        <option @if($modelo_animal != null && $modelo_animal->procedencia == "animal_silvestre") selected @endif value="animal_silvestre">Animal Silvestre</option>
                        <option @if($modelo_animal != null && $modelo_animal->procedencia == "aviario") selected @endif value="aviario">Aviário</option>
                        <option @if($modelo_animal != null && $modelo_animal->procedencia == "bioterio") selected @endif value="bioterio">Biotério</option>
                        <option @if($modelo_animal != null && $modelo_animal->procedencia == "fazenda") selected @endif value="fazenda">Fazenda</option>
                        <option @if($modelo_animal != null && $modelo_animal->procedencia == "outra_procedencia") selected @endif value="outra_procedencia">Outra Procedência</option>
                    </select>
                </div>

                <div class="col-sm-6">
                    <label for="experiencia">O animal é geneticamente modificado?</label>
                    <div class="row ml-1">
                        <div class="col-sm-2">
                            <input class="form-check-input" type="radio" name="geneticamente_modificado" id="geneticamente_modificado" value="true" @if($modelo_animal != null && $modelo_animal->geneticamente_modificado) checked @endif>
                            <label class="form-check-label" for="geneticamente_modificado">Sim</label>
                        </div>
                        <div class="col-sm-2">
                            <input class="form-check-input" type="radio" name="geneticamente_modificado" id="geneticamente_modificado" value="false" @if($modelo_animal == null || ($modelo_animal != null && !($modelo_animal->geneticamente_modificado))) checked @endif>
                            <label class="form-check-label" for="geneticamente_modificado">
                                Não
                            </label>
                        </div>
                    </div>
                </div>
            </div>

        </div>

        @include('component.botoes_form')
    </form>

</div>

