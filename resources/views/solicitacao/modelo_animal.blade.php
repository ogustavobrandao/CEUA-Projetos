<input type="hidden" name="solicitacao_id" value="{{$solicitacao->id}}">
<div class="row">
    <h3 class="subtitulo">Informações do Animal/Uso</h3>
    <div class="col-sm-6">
        <label for="nome_cientifico">Nome ciêntifico:</label>
        <input class="form-control @error('nome_cientifico') is-invalid @enderror" id="nome_cientifico" type="text"
               name="nome_cientifico" @if(isset($modelo_animal)) value="{{$modelo_animal->nome_cientifico}}"
               @else value="{{old('nome_cientifico')}}" @endif required
               autocomplete="nome_cientifico" autofocus>
        @error('nome_cientifico')
        <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>

    <div class="col-sm-6">
        <label for="nome_vulgar">Nome vulgar:</label>
        <input class="form-control @error('nome_vulgar') is-invalid @enderror" id="nome_vulgar" type="text"
               name="nome_vulgar" @if(isset($modelo_animal)) value="{{$modelo_animal->nome_vulgar}}"
               @else value="{{old('nome_vulgar')}}" @endif required
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
        <textarea class="form-control @error('justificativa') is-invalid @enderror" id="justificativa"
                  name="justificativa" required autocomplete="justificativa"
                  autofocus>@if(isset($modelo_animal))
                {{$modelo_animal->justificativa}}
            @else
                {{old('justificativa')}}
            @endif</textarea>
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
            <select class="form-control @error('procedencia') is-invalid @enderror" id="procedencia" name="procedencia">
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
            @error('procedencia')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
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
                @error('geneticamente_modificado')
                <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
                @enderror
            </div>
        </div>
    </div>

    <div class="row mt-2">
        <h3 class="subtitulo">Tipo e Característica</h3>
        <div class="col-sm-6">
            <label for="grupo_animal">Grupo Animal:</label>
            <select class="form-control @error('grupo_animal') is-invalid @enderror" id="grupo_animal"
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
            @error('grupo_animal')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>

        <div class="col-sm-6">
            <label for="linhagem">Linhagem/Raça:</label>
            <input class="form-control @error('linhagem') is-invalid @enderror" id="linhagem" type="text"
                   name="linhagem" @if(isset($modelo_animal->perfil)) value="{{$modelo_animal->perfil->linhagem}}" @else
                       value="{{old('linhagem')}}" @endif required autocomplete="linhagem"
                   autofocus>
            @error('linhagem')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>

    </div>

    <div class="row mt-2">
        <div class="col-sm-4 pr-0">
            <label for="idade">Idade:</label>
            <input class="form-control @error('idade') is-invalid @enderror" id="idade" type="number" name="idade"
                   @if(isset($modelo_animal->perfil)) value="{{$modelo_animal->perfil->idade}}"
                   @else value="{{old('idade')}}" @endif required autocomplete="idade" autofocus>
            @error('idade')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
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
            <input class="form-control @error('peso') is-invalid @enderror" id="peso" type="text" name="peso"
                   @if(isset($modelo_animal->perfil)) value="{{$modelo_animal->perfil->peso}}"
                   @else value="{{old('peso')}}" @endif required autocomplete="peso"
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
            <input class="form-control @error('machos') is-invalid @enderror" id="machos" type="number" name="machos"
                   @if(isset($modelo_animal->perfil)) value="{{$modelo_animal->perfil->machos}}"
                   @else value="{{old('machos')}}" @endif required autocomplete="machos"
                   autofocus>
            @error('machos')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>

        <div class="col-sm-4">
            <label for="femeas">Quantidade de fêmeas:</label>
            <input class="form-control @error('femeas') is-invalid @enderror" id="femeas" type="number" name="femeas"
                   @if(isset($modelo_animal->perfil)) value="{{$modelo_animal->perfil->femeas}}"
                   @else value="{{old('femeas')}}" @endif required autocomplete="femeas"
                   autofocus>
            @error('femeas')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>

        <div class="col-sm-4">
            <label for="quantidade">Quantidade:</label>
            <input class="form-control @error('quantidade') is-invalid @enderror" id="quantidade" type="number"
                   name="quantidade"
                   @if(isset($modelo_animal->perfil)) value="{{$modelo_animal->perfil->quantidade}}"
                   @else value="{{old('quantidade')}}" @endif required autocomplete="quantidade"
                   autofocus>
            @error('quantidade')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>

        <div class="col-sm-12 mt-2">
            <label for="termo_consentimento">Termo de Consentimento Livre e Esclarecido (TCLE):</label>
            @if(\Illuminate\Support\Facades\Auth::user()->tipo_usuario_id == 2)
                <a class="btn btn-primary"
                   href="{{route('termo.download', ['modelo_animal_id' => $modelo_animal->id])}}">Baixar
                    Termo de Consentimento</a>
            @else
                @if(!empty($modelo_animal))
                    <input class="form-control @error('termo_consentimento') is-invalid @enderror"
                           id="termo_consentimento"
                           type="file" name="termo_consentimento"
                           value="" autocomplete="termo_consentimento" autofocus
                           @if($modelo_animal->termo_consentimento != null) style="width: 135px" @endif>
                    @error('termo_consentimento')
                    <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
                    @enderror
                    @if($modelo_animal->termo_consentimento != null)
                        <span
                            style="border: 1px gray solid; border-radius: 10px; text-align: center; width: 250px; position: absolute; bottom: 0px; left: 155px; height: 38px; padding-top: 5px; background-color: #dcfadf">Um Arquivo Já Foi Enviado</span>
                    @endif
                @else
                    <input class="form-control @error('termo_consentimento') is-invalid @enderror"
                           id="termo_consentimento"
                           type="file" name="termo_consentimento"
                           @if(isset($modelo_animal)) value="{{$modelo_animal->termo_consentimento}}"
                           @else value="{{old('termo_consentimento')}}" @endif autocomplete="termo_consentimento"
                           autofocus required>
                    @error('termo_consentimento')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                @endif
            @endif
        </div>

    </div>

</div>
