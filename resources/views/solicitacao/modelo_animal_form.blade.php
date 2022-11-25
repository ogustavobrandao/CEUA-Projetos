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

        <div class="row mt-2">
            <h3 class="subtitulo">Tipo e Característica</h3>
            <div class="col-sm-6">
                <label for="grupo_animal">Grupo Animal:</label>
                <select class="form-control" id="grupo_animal" name="grupo_animal">
                    <option disabled selected>Selecione o Grupo Animal</option>
                    <option value="anfibio">Anfíbio</option>
                    <option value="ave">Ave</option>
                    <option value="bovino">Bovino</option>
                    <option value="bubalino">Bubalino</option>
                    <option value="canino">Canino</option>
                    <option value="caprino">Caprino</option>
                    <option value="outro">Outro a especificar</option>
                    <option value="ovino">Ovino</option>
                    <option value="peixes">Peixes</option>
                    <option value="roedores">Roedores</option>
                </select>
            </div>

            <div class="col-sm-6">
                <label for="linhagem">Linhagem:</label>
                <input class="form-control @error('linhagem') is-invalid @enderror" id="linhagem" type="text" name="linhagem"
                       value="{{old('linhagem')}}" required autocomplete="linhagem"
                       autofocus>
                @error('linhagem')
                <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
                @enderror
            </div>

        </div>

        <div class="row mt-2">
            <div class="col-sm-6">
                <label for="idade">Idade:</label>
                <input class="form-control @error('idade') is-invalid @enderror" id="idade" type="text" name="idade" value="{{old('idade')}}" required autocomplete="idade" placeholder="Exemplo1: 30 dias / Exemplo2: 4 anos / etc" autofocus>
                @error('idade')
                <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
                @enderror
            </div>

            <div class="col-sm-6">
                <label for="peso">Peso Aproximado:</label>
                <input class="form-control @error('peso') is-invalid @enderror" id="peso" type="text" name="peso"value="{{old('peso')}}" required autocomplete="peso"
                       autofocus>
                @error('peso')
                <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
                @enderror
            </div>

        </div>

        <div class="row mt-2">

            <div class="col-sm-4">
                <label for="machos">Quantidade de machos:</label>
                <input class="form-control @error('machos') is-invalid @enderror" id="machos" type="number" name="machos" value="{{old('machos')}}" required autocomplete="machos"
                       autofocus>
                @error('machos')
                <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
                @enderror
            </div>

            <div class="col-sm-4">
                <label for="femeas">Quantidade de fêmeas:</label>
                <input class="form-control @error('femeas') is-invalid @enderror" id="femeas" type="number" name="femeas" value="{{old('femeas')}}" required autocomplete="femeas"
                       autofocus>
                @error('femeas')
                <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
                @enderror
            </div>

            <div class="col-sm-4">
                <label for="quantidade">Quantidade:</label>
                <input class="form-control @error('quantidade') is-invalid @enderror" id="quantidade" type="number" name="quantidade"
                       value="{{old('quantidade')}}" required autocomplete="quantidade"
                       autofocus>
                @error('quantidade')
                <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
                @enderror
            </div>

            <div class="col-sm-12 mt-2">
                <label for="termo_consentimento">Termo de Consentimento Livre e Esclarecido (TCLE):</label>
                <input class="form-control @error('termo_consentimento') is-invalid @enderror" id="termo_consentimento" type="file" name="termo_consentimento"
                       value="{{old('termo_consentimento')}}" autocomplete="termo_consentimento" autofocus required>
                @error('termo_consentimento')
                <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

        </div>

    </div>
