    <input type="hidden" name="solicitacao_id" value="{{$solicitacao->id}}">
    <div class="row">
        <h3 class="subtitulo">Informações do Animal/Uso</h3>
        <div class="col-sm-6">
            <label for="nome_cientifico">Nome ciêntifico:</label>
            <input class="form-control @error('nome_cientifico') is-invalid @enderror" id="nome_cientifico" type="text" name="nome_cientifico" value="{{old('nome_cientifico')}}" required
                   autocomplete="nome_cientifico" autofocus>
            @error('nome_cientifico')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>

        <div class="col-sm-6">
            <label for="nome_vulgar">Nome vulgar:</label>
            <input class="form-control @error('nome_vulgar') is-invalid @enderror" id="nome_vulgar" type="text" name="nome_vulgar" value="{{old('nome_vulgar')}}" required
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
                      autofocus>{{old('justificativa')}}</textarea>
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
                    <option value="animal_comprado">Animal comprado</option>
                    <option value="animal_criacao">Animal de criação ou de casuística hospitalar</option>
                    <option value="animal_doado">Animal doado</option>
                    <option value="animal_silvestre">Animal Silvestre</option>
                    <option value="aviario">Aviário</option>
                    <option value="bioterio">Biotério</option>
                    <option value="fazenda">Fazenda</option>
                    <option value="outra_procedencia">Outra Procedência</option>
                </select>
            </div>

            <div class="col-sm-6">
                <label for="experiencia">O animal é geneticamente modificado?</label>
                <div class="row ml-1">
                    <div class="col-sm-2">
                        <input class="form-check-input" type="radio" name="geneticamente_modificado" id="geneticamente_modificado" value="true">
                        <label class="form-check-label" for="geneticamente_modificado">Sim</label>
                    </div>
                    <div class="col-sm-2">
                        <input class="form-check-input" type="radio" name="geneticamente_modificado" id="geneticamente_modificado" value="false">
                        <label class="form-check-label" for="geneticamente_modificado">
                            Não
                        </label>
                    </div>
                </div>
            </div>
        </div>

    </div>
