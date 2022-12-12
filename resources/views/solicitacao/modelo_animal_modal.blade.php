<input type="hidden" name="solicitacao_id" value="{{$solicitacao->id}}">
<div class="row">
    <h3 class="subtitulo">Informações do Animal/Uso</h3>
    <div class="col-sm-6">
        <label for="nome_cientifico">Nome ciêntifico:</label>
        <input class="form-control @if($errors->modelo->has('nome_cientifico')) is-invalid @endif" id="nome_cientifico"
               type="text"
               name="nome_cientifico" @if(isset($modelo_animal)) value="{{$modelo_animal->nome_cientifico}}"
               @else value="{{old('nome_cientifico')}}" @endif required
               autocomplete="nome_cientifico" autofocus>
        @if($errors->modelo->has('nome_cientifico'))
            <span class="invalid-feedback" role="alert">
                <strong>{{ $errors->modelo->first('nome_cientifico') }}</strong>
            </span>
        @endif
    </div>

    <div class="col-sm-6">
        <label for="nome_vulgar">Nome vulgar:</label>
        <input class="form-control @if($errors->modelo->has('nome_vulgar')) is-invalid @endif" id="nome_vulgar"
               type="text"
               name="nome_vulgar" @if(isset($modelo_animal)) value="{{$modelo_animal->nome_vulgar}}"
               @else value="{{old('nome_vulgar')}}" @endif required
               autocomplete="nome_vulgar"
               autofocus>
        @if($errors->modelo->has('nome_vulgar'))
            <span class="invalid-feedback" role="alert">
                <strong>{{ $errors->modelo->first('nome_vulgar') }}</strong>
            </span>
        @endif
    </div>

    <div class="col-sm-12 mt-2">
        <label for="justificativa">Justificar o uso dos procedimentos e da espécie animal:</label>
        <textarea class="form-control @if($errors->modelo->has('justificativa')) is-invalid @endif" id="justificativa"
                  name="justificativa" required autocomplete="justificativa"
                  autofocus>@if(isset($modelo_animal))
                {{$modelo_animal->justificativa}}
            @else
                {{old('justificativa')}}
            @endif</textarea>
        @if($errors->modelo->has('justificativa'))
            <span class="invalid-feedback" role="alert">
                <strong>{{ $errors->modelo->first('justificativa') }}</strong>
            </span>
        @endif
    </div>

</div>

<div>
    <h3 class="subtitulo">Procedência</h3>
    <div class="row">
        <div class="col-sm-6">
            <label for="procedencia">Procedência:</label>
            <select class="form-control @if($errors->modelo->has('procedencia')) is-invalid @endif" id="procedencia"
                    name="procedencia">
                <option disabled selected>Selecione a Procedência</option>
                <option value="animal_comprado"
                        @if(isset($modelo_animal) && $modelo_animal->procedencia == "animal_comprado") selected @endif>
                    Animal comprado
                </option>
                <option value="animal_criacao"
                        @if(isset($modelo_animal) && $modelo_animal->procedencia == "animal_criacao") selected @endif>
                    Animal de criação ou de casuística hospitalar
                </option>
                <option value="animal_doado"
                        @if(isset($modelo_animal) && $modelo_animal->procedencia == "animal_doado") selected @endif>
                    Animal doado
                </option>
                <option value="animal_silvestre"
                        @if(isset($modelo_animal) && $modelo_animal->procedencia == "animal_silvestre") selected @endif>
                    Animal Silvestre
                </option>
                <option value="aviario"
                        @if(isset($modelo_animal) && $modelo_animal->procedencia == "aviario") selected @endif>Aviário
                </option>
                <option value="bioterio"
                        @if(isset($modelo_animal) && $modelo_animal->procedencia == "bioterio") selected @endif>Biotério
                </option>
                <option value="fazenda"
                        @if(isset($modelo_animal) && $modelo_animal->procedencia == "fazenda") selected @endif>Fazenda
                </option>
                <option value="outra_procedencia"
                        @if(isset($modelo_animal) && $modelo_animal->procedencia == "outra_procedencia") selected @endif>
                    Outra Procedência
                </option>
            </select>
            @if($errors->modelo->has('procedencia'))
                <span class="invalid-feedback" role="alert">
                <strong>{{ $errors->modelo->first('procedencia') }}</strong>
            </span>
            @endif
        </div>

        <div class="col-sm-6">
            <label for="experiencia">O animal é geneticamente modificado?</label>
            <div class="row ml-1">
                <div class="col-sm-2">
                    <input class="form-check-input" type="radio" name="geneticamente_modificado"
                           id="geneticamente_modificado" value="true"
                           @if(isset($modelo_animal) && $modelo_animal->geneticamente_modificado) checked @endif
                           @if(!isset($modelo_animal)) checked @endif>
                    <label class="form-check-label" for="geneticamente_modificado">Sim</label>
                </div>
                <div class="col-sm-2">
                    <input class="form-check-input" type="radio" name="geneticamente_modificado"
                           id="geneticamente_modificado" value="false"
                           @if(isset($modelo_animal) && !$modelo_animal->geneticamente_modificado) checked @endif >
                    <label class="form-check-label" for="geneticamente_modificado">
                        Não
                    </label>
                </div>
                @if($errors->modelo->has('geneticamente_modificado'))
                    <span class="invalid-feedback" role="alert">
                <strong>{{ $errors->modelo->first('geneticamente_modificado') }}</strong>
            </span>
                @endif
            </div>
        </div>
    </div>

    <div class="row mt-2">
        <h3 class="subtitulo">Tipo e Característica</h3>
        <div class="col-sm-6">
            <label for="grupo_animal">Grupo Animal:</label>
            <select class="form-control @if($errors->modelo->has('grupo_animal')) is-invalid @endif" id="grupo_animal"
                    name="grupo_animal">
                <option disabled selected>Selecione o Grupo Animal</option>
                <option value="anfibio"
                        @if(isset($modelo_animal->perfil) && $modelo_animal->perfil->grupo_animal == "anfibio") selected @endif>
                    Anfíbio
                </option>
                <option value="ave"
                        @if(isset($modelo_animal->perfil) && $modelo_animal->perfil->grupo_animal == "ave") selected @endif>
                    Ave
                </option>
                <option value="bovino"
                        @if(isset($modelo_animal->perfil) && $modelo_animal->perfil->grupo_animal == "bovino") selected @endif>
                    Bovino
                </option>
                <option value="bubalino"
                        @if(isset($modelo_animal->perfil) && $modelo_animal->perfil->grupo_animal == "bubalino") selected @endif>
                    Bubalino
                </option>
                <option value="canino"
                        @if(isset($modelo_animal->perfil) && $modelo_animal->perfil->grupo_animal == "canino") selected @endif>
                    Canino
                </option>
                <option value="caprino"
                        @if(isset($modelo_animal->perfil) && $modelo_animal->perfil->grupo_animal == "caprino") selected @endif>
                    Caprino
                </option>
                <option value="ovino"
                        @if(isset($modelo_animal->perfil) && $modelo_animal->perfil->grupo_animal == "ovino") selected @endif>
                    Ovino
                </option>
                <option value="peixes"
                        @if(isset($modelo_animal->perfil) && $modelo_animal->perfil->grupo_animal == "peixes") selected @endif>
                    Peixes
                </option>
                <option value="roedores"
                        @if(isset($modelo_animal->perfil) && $modelo_animal->perfil->grupo_animal == "roedores") selected @endif>
                    Roedores
                </option>
                <option value="outro"
                        @if(isset($modelo_animal->perfil) && $modelo_animal->perfil->grupo_animal == "outro") selected @endif>
                    Outro a especificar
                </option>
            </select>
            @if($errors->modelo->has('grupo_animal'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->modelo->first('grupo_animal') }}</strong>
                </span>
            @endif
        </div>

        <div class="col-sm-6">
            <label for="linhagem">Linhagem/Raça:</label>
            <input class="form-control @if($errors->modelo->has('linhagem')) is-invalid @endif" id="linhagem" type="text"
                   name="linhagem" @if(isset($modelo_animal->perfil)) value="{{$modelo_animal->perfil->linhagem}}" @else
                       value="{{old('linhagem')}}" @endif required autocomplete="linhagem"
                   autofocus>
            @if($errors->modelo->has('linhagem'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->modelo->first('linhagem') }}</strong>
                </span>
            @endif
        </div>

    </div>

    <div class="row mt-2">
        <div class="col-sm-4 pr-0">
            <label for="idade">Idade:</label>
            <input class="form-control @if($errors->modelo->has('idade')) is-invalid @endif" id="idade" type="number" name="idade"
                   @if(isset($modelo_animal->perfil)) value="{{$modelo_animal->perfil->idade}}"
                   @else value="{{old('idade')}}" @endif required autocomplete="idade" autofocus>
            @if($errors->modelo->has('idade'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->modelo->first('idade') }}</strong>
                </span>
            @endif
        </div>

        <div class="col-sm-2 pl-1">
            <label for="periodo">Periodo:</label>
            <select class="form-control" name="periodo" autofocus>
                <option value="Dias"
                        @if(isset($modelo_animal->perfil) && $modelo_animal->perfil->periodo == "Dias" || isset($modelo_animal->perfil) && $modelo_animal->perfil->periodo == null) selected @endif>
                    Dias
                </option>
                <option value="Meses"
                        @if(isset($modelo_animal->perfil) && $modelo_animal->perfil->periodo == "Meses") selected @endif>
                    Meses
                </option>
                <option value="Anos"
                        @if(isset($modelo_animal->perfil) && $modelo_animal->perfil->periodo == "Anos") selected @endif>
                    Anos
                </option>
            </select>
        </div>

        <div class="col-sm-6">
            <label for="peso">Peso Aproximado:</label>
            <input class="form-control @if($errors->modelo->has('peso')) is-invalid @endif" id="peso" type="text" name="peso"
                   @if(isset($modelo_animal->perfil)) value="{{$modelo_animal->perfil->peso}}"
                   @else value="{{old('peso')}}" placeholder="Ex: 30 kg" @endif required autocomplete="peso"
                   autofocus>
            @if($errors->modelo->has('peso'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->modelo->first('peso') }}</strong>
                </span>
            @endif
        </div>

    </div>

    <div class="row mt-2">

        <div class="col-sm-4">
            <label for="machos">Quantidade de machos:</label>
            <input class="form-control @if($errors->modelo->has('machos')) is-invalid @endif" id="machos" type="number" name="machos"
                   @if(isset($modelo_animal->perfil)) value="{{$modelo_animal->perfil->machos}}"
                   @else value="{{old('machos')}}" @endif required autocomplete="machos"
                   autofocus>
            @if($errors->modelo->has('machos'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->modelo->first('peso') }}</strong>
                </span>
            @endif
        </div>

        <div class="col-sm-4">
            <label for="femeas">Quantidade de fêmeas:</label>
            <input class="form-control @if($errors->modelo->has('femeas')) is-invalid @endif" id="femeas" type="number" name="femeas"
                   @if(isset($modelo_animal->perfil)) value="{{$modelo_animal->perfil->femeas}}"
                   @else value="{{old('femeas')}}" @endif required autocomplete="femeas"
                   autofocus>
            @if($errors->modelo->has('femeas'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->modelo->first('femeas') }}</strong>
                </span>
            @endif
        </div>

        <div class="col-sm-4">
            <label for="quantidade">Quantidade:</label>
            <input class="form-control @if($errors->modelo->has('quantidade')) is-invalid @endif" id="quantidade" type="number"
                   name="quantidade"
                   @if(isset($modelo_animal->perfil)) value="{{$modelo_animal->perfil->quantidade}}"
                   @else value="{{old('quantidade')}}" @endif required autocomplete="quantidade"
                   autofocus>
            @if($errors->modelo->has('quantidade'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->modelo->first('quantidade') }}</strong>
                </span>
            @endif
        </div>

        <div class="col-sm-12 mt-2">
            <label for="termo_consentimento">Termo de Consentimento Livre e Esclarecido (TCLE):</label>
            <input class="form-control @if($errors->modelo->has('termo_consentimento')) is-invalid @endif" id="termo_consentimento"
                   type="file" name="termo_consentimento"
                   @if(isset($modelo_animal)) value="{{$modelo_animal->termo_consentimento}}"
                   @else value="{{old('termo_consentimento')}}" @endif autocomplete="termo_consentimento" autofocus
                   required>
            @if($errors->modelo->has('termo_consentimento'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->modelo->first('termo_consentimento') }}</strong>
                </span>
            @endif
        </div>

    </div>

</div>
