<input type="hidden" name="solicitacao_id" value="{{$solicitacao->id}}">
<div class="row">
    <h3 class="subtitulo">Informações do Animal/Uso</h3>
    <div class="col-sm-6">
        <label for="nome_cientifico">Nome Científico:<strong style="color: red">*</strong></label>
        <input class="form-control @error('nome_cientifico') is-invalid @enderror" id="nome_cientifico" type="text"
               name="nome_cientifico" @if(isset($modelo_animal)) value="{{$modelo_animal->nome_cientifico}}"
               @else value="{{old('nome_cientifico')}}" @endif required
               autocomplete="nome_cientifico" autofocus>
        <div class="div_error" id="nome_cientifico_error" style="display: none">
            <span class="invalid-input">
                <strong id="nome_cientifico_error_message"></strong>
            </span>
        </div>
    </div>

    <div class="col-sm-6">
        <label for="nome_vulgar">Nome Vulgar:<strong style="color: red">*</strong></label>
        <input class="form-control @error('nome_vulgar') is-invalid @enderror" id="nome_vulgar" type="text"
               name="nome_vulgar" @if(isset($modelo_animal)) value="{{$modelo_animal->nome_vulgar}}"
               @else value="{{old('nome_vulgar')}}" @endif required
               autocomplete="nome_vulgar"
               autofocus>
        <div class="div_error" id="nome_vulgar_error" style="display: none">
            <span class="invalid-input">
                <strong id="nome_vulgar_error_message"></strong>
            </span>
        </div>
    </div>

    <div class="col-sm-12 mt-2">
        <label for="justificativa">Justificar o uso da Espécie Animal Escolhida:<strong style="color: red">*</strong>
            <a target="_blank"
            href="https://www2.dti.ufv.br/ceua/scripts/grau-invasividade.html"
            title="O responsável deverá justificar a espécie ou grupo taxonômico e os procedimentos a serem empregados em função do sistema biológico a ser estudado. A opção por um determinado modelo animal deverá ter consistência científica e não ser influenciada por conveniência ou orçamento." style="color: darkred">
             <i class="fa-solid fa-circle-info fa-lg"></i>
         </a>
        </label>
        <textarea class="form-control @error('justificativa') is-invalid @enderror" name="justificativa" id="justificativa" autocomplete="justificativa" autofocus
            required> @if(isset($modelo_animal)){{$modelo_animal->justificativa}}@else{{old('justificativa')}}@endif </textarea>
        <div class="div_error" id="justificativa_error" style="display: none">
            <span class="invalid-input">
                <strong id="justificativa_error_message"></strong>
            </span>
        </div>
    </div>

</div>

<div>
    <h3 class="subtitulo mt-2">Procedência</h3>
    <div class="row">
        <div class="col-sm-6">
            <label for="procedencia">Procedência:<strong style="color: red">*</strong></label>
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
            <div class="div_error" id="procedencia_error" style="display: none">
                <span class="invalid-input">
                    <strong id="procedencia_error_message"></strong>
                </span>
            </div>
        </div>

        <div class="col-sm-3" id="anexo_outra_procedencia" style="display: none;">
            <label for="anexo_outra_procedencia">Especifique a procedência:</label>
            <input class="form-control @error('') is-invalid @enderror" name="tipo_outra_procedencia" id="tipo_outra_procedencia"
                   autocomplete="tipo_outra_procedencia" autofocus d @if(isset($modelo_animal->perfil) && $modelo_animal->tipo_outra_procedencia != null)
                       value="{{$modelo_animal->tipo_outra_procedencia}}"@endif>
        </div>

        <div class="row">
        <div class="col-sm-6 mt-2" id="anexo_animal_silvestre_captura">
            <label>Captura:<strong style="color: red">*</strong></label>
            <div class="row ml-1">
                <div class="col-sm-2">
                    <input class="form-check-input" type="radio" name="flag_captura"
                           id="captura_sim" value="true"
                           @if(isset($modelo_animal) && $modelo_animal->flag_captura) checked @endif >
                    <label class="form-check-label" for="flag_captura">Sim</label>
                </div>
                <div class="col-sm-2">
                    <input class="form-check-input" type="radio" name="flag_captura"
                           id="captura_nao" value="false"
                           @if(isset($modelo_animal) && !$modelo_animal->flag_captura) checked @endif >
                    <label class="form-check-label" for="flag_captura">
                        Não
                    </label>
                </div>
                <div class="div_error" id="flag_captura_cientifico_error" style="display: none">
                    <span class="invalid-input">
                <strong id="flag_captura_error_message"></strong>
            </span>
                </div>
                <div class="col-sm-13 mt-2" id="anexo_captura" style="display: none;">
                    <label for="anexo_captura">Descreva:<strong style="color: red">*</strong></label>
                    <input class="form-control @error('captura') is-invalid @enderror" id="captura" type="text" name="captura"
                    @if(isset($modelo_animal) && ($modelo_animal->captura != null)) value="{{$modelo_animal->captura}}"
                    @else value="{{old('captura')}}" @endif required autocomplete="captura" autofocus>
                </div>
            </div>
        </div>

        <div class="col-sm-6 mt-2" id="anexo_animal_silvestre_coleta">
            <label>Coleta de Espécimes:<strong style="color: red">*</strong></label>
            <div class="row ml-1">
                <div class="col-sm-2">
                    <input class="form-check-input" type="radio" name="flag_coleta_especimes"
                           id="coleta_especimes_sim" value="true"
                           @if(isset($modelo_animal) && $modelo_animal->flag_coleta_especimes) checked @endif >
                    <label class="form-check-label" for="flag_coleta_especimes">Sim</label>
                </div>
                <div class="col-sm-2">
                    <input class="form-check-input" type="radio" name="flag_coleta_especimes"
                           id="coleta_especimes_nao" value="false"
                           @if(isset($modelo_animal) && !$modelo_animal->flag_coleta_especimes) checked @endif >
                    <label class="form-check-label" for="flag_coleta_especimes">
                        Não
                    </label>
                </div>
                <div class="div_error" id="flag_coleta_especimes_error" style="display: none">
            <span class="invalid-input">
                <strong id="flag_coleta_especimes_error_message"></strong>
            </span>
                </div>
                <div class="col-sm-13 m-2" id="anexo_coleta_especimes" style="display: none;">
                    <label for="anexo_coleta_especimes">Descreva:<strong style="color: red">*</strong></label>
                    <input class="form-control @error('coleta_especimes') is-invalid @enderror" id="coleta_especimes" type="text" name="coleta_especimes"
                    @if(isset($modelo_animal) && ($modelo_animal->coleta_especimes != null)) value="{{$modelo_animal->coleta_especimes}}"
                    @else value="{{old('coleta_especimes')}}" @endif required autocomplete="coleta_especimes" autofocus>
                </div>
            </div>
        </div>

        <div class="col-sm-6 mt-2" id="anexo_animal_marcacao">
            <label>Marcação:<strong style="color: red">*</strong></label>
            <div class="row ml-1">
                <div class="col-sm-2">
                    <input class="form-check-input" type="radio" name="flag_marcacao"
                           id="animal_marcacao_sim" value="true"
                           @if(isset($modelo_animal) && $modelo_animal->flag_marcacao) checked @endif >
                    <label class="form-check-label" for="flag_marcacao">Sim</label>
                </div>
                <div class="col-sm-2">
                    <input class="form-check-input" type="radio" name="flag_marcacao"
                           id="animal_marcacao_nao" value="false"
                           @if(isset($modelo_animal) && !$modelo_animal->flag_marcacao) checked @endif >
                    <label class="form-check-label" for="flag_marcacao">
                        Não
                    </label>
                </div>
                <div class="div_error" id="flag_marcacao_error" style="display: none">
                    <span class="invalid-input">
                <strong id="flag_marcacao_error_message"></strong>
            </span>
                </div>
                <div class="col-sm-13 mt-2" id="anexo_marcacao" style="display: none;">
                    <label for="anexo_marcacao">Descreva:<strong style="color: red">*</strong></label>
                    <input class="form-control @error('marcacao') is-invalid @enderror" id="marcacao" type="text" name="marcacao"
                    @if(isset($modelo_animal) && ($modelo_animal->marcacao != null)) value="{{$modelo_animal->marcacao}}"
                    @else value="{{old('marcacao')}}" @endif required autocomplete="marcacao" autofocus>
                </div>
            </div>
        </div>

        <div class="col-sm-6 mt-2" id="anexo_outras_informações">
            <label>Outros:<strong style="color: red">*</strong></label>
            <div class="row ml-1">
                <div class="col-sm-2">
                    <input class="form-check-input" type="radio" name="flag_outras_info"
                           id="outras_info_sim" value="true"
                           @if(isset($modelo_animal) && $modelo_animal->flag_outras_info) checked @endif >
                    <label class="form-check-label" for="flag_outras_info">Sim</label>
                </div>
                <div class="col-sm-2">
                    <input class="form-check-input" type="radio" name="flag_outras_info"
                           id="outras_info_nao" value="false"
                           @if(isset($modelo_animal) && !$modelo_animal->flag_outras_info) checked @endif >
                    <label class="form-check-label" for="flag_outras_info">
                        Não
                    </label>
                </div>
                <div class="div_error" id="flag_outras_info_error" style="display: none">
                    <span class="invalid-input">
                        <strong id="flag_outras_info_error_message"></strong>
                    </span>
                </div>
                <div class="col-sm-13 mt-2" id="anexo_outras_info" style="display: none;">
                    <label for="anexo_outras_info">Descreva:<strong style="color: red">*</strong></label>
                    <input class="form-control @error('outras_info') is-invalid @enderror" id="outras_info" type="text" name="outras_info"
                    @if(isset($modelo_animal) && ($modelo_animal->outras_info != null)) value="{{$modelo_animal->outras_info}}"
                    @else value="{{old('outras_info')}}" @endif required autocomplete="outras_info" autofocus>
                </div>
            </div>
        </div>
    </div>

        <div class="col-sm-6 mt-2">
            <label for="experiencia">O Animal é Geneticamente Modificado?<strong style="color: red">*</strong></label>
            <div class="row ml-1">
                <div class="col-sm-2">
                    <input class="form-check-input" type="radio" name="geneticamente_modificado"
                           id="geneticamente_modificado_sim"
                           @if(isset($modelo_animal) && $modelo_animal->geneticamente_modificado) checked @endif >
                    <label class="form-check-label" for="geneticamente_modificado_sim">Sim</label>
                </div>
                <div class="col-sm-2">
                    <input class="form-check-input" type="radio" name="geneticamente_modificado"
                           id="geneticamente_modificado_nao"
                           @if(isset($modelo_animal) && !$modelo_animal->geneticamente_modificado) checked @endif value="false">
                    <label class="form-check-label" for="geneticamente_modificado_nao">
                        Não
                    </label>
                </div>
                <div class="div_error" id="geneticamente_modificado_error" style="display: none">
                    <span class="invalid-input">
                        <strong id="geneticamente_modificado_error_message"></strong>
                    </span>
                </div>
                <div class="col-sm-4" id="anexo_cqb" style="display: none;">
                    <label for="anexo_cqb">Número CQB:<strong style="color: red">*</strong></label>
                    <input class="form-control @error('numero_cqb') is-invalid @enderror" id="numero_cqb" type="number" name="numero_cqb"
                    @if(isset($modelo_animal) && ($modelo_animal->numero_cqb != null)) value="{{$modelo_animal->numero_cqb}}"
                    @else value="{{old('numero_cqb')}}" @endif required autocomplete="numero_cqb" autofocus>
                </div>
            </div>
        </div>
    </div>

    <div class="row mt-2">
        <h3 class="subtitulo">Tipo Animal</h3>
        <div class="col-sm-6">
            <label for="grupo_animal">Grupo Animal:<strong style="color: red">*</strong></label>
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
                    <option value="camudongo_heterogenico"
                        @if(isset($modelo_animal->perfil) && $modelo_animal->perfil->grupo_animal == "camudongo_heterogenico") selected @endif>
                    Camundongo Heterogênico
                    </option>
                    <option value="camudongo_isogenico"
                        @if(isset($modelo_animal->perfil) && $modelo_animal->perfil->grupo_animal == "camudongo_isogenico") selected @endif>
                    Camundongo Isogênico
                    </option>
                    <option value="camudongo_knockout"
                        @if(isset($modelo_animal->perfil) && $modelo_animal->perfil->grupo_animal == "camudongo_knockout") selected @endif>
                    Camundongo Knockout
                    </option>
                    <option value="camudongo_transgenico"
                        @if(isset($modelo_animal->perfil) && $modelo_animal->perfil->grupo_animal == "camudongo_transgenico") selected @endif>
                    Camundongo Transgênico
                    </option>
                    <option value="caprino"
                            @if(isset($modelo_animal->perfil) && $modelo_animal->perfil->grupo_animal == "caprino") selected @endif>
                    Caprino
                    </option>
                    <option value="chinchila"
                        @if(isset($modelo_animal->perfil) && $modelo_animal->perfil->grupo_animal == "chinchila") selected @endif>
                    Chinchila
                    </option>
                    <option value="cobaia"
                            @if(isset($modelo_animal->perfil) && $modelo_animal->perfil->grupo_animal == "cobaia") selected @endif>
                    Cobaia
                    </option>
                    <option value="coelhos"
                    @if(isset($modelo_animal->perfil) && $modelo_animal->perfil->grupo_animal == "coelhos") selected @endif>
                    Coelhos
                    </option>
                    <option value="equideo"
                    @if(isset($modelo_animal->perfil) && $modelo_animal->perfil->grupo_animal == "equideo") selected @endif>
                    Equídeo
                    </option>
                    <option value="especie_silvestre_brasileira"
                    @if(isset($modelo_animal->perfil) && $modelo_animal->perfil->grupo_animal == "especie_silvestre_brasileira") selected @endif>
                    Espécie Silvestre Brasileira
                    </option>
                    <option value="especie_silvestre_nao_rasileira"
                    @if(isset($modelo_animal->perfil) && $modelo_animal->perfil->grupo_animal == "especie_silvestre_nao_rasileira") selected @endif>
                    Espécie Silvestre Não-Brasileira
                    </option>
                    <option value="gato"
                            @if(isset($modelo_animal->perfil) && $modelo_animal->perfil->grupo_animal == "gato") selected @endif>
                        Gato
                    </option>
                    <option value="gerbil"
                            @if(isset($modelo_animal->perfil) && $modelo_animal->perfil->grupo_animal == "gerbil") selected @endif>
                        Gerbil
                    </option>
                    <option value="hamster"
                    @if(isset($modelo_animal->perfil) && $modelo_animal->perfil->grupo_animal == "hamster") selected @endif>
                    Hamster
                    </option>
                    <option value="ovino"
                            @if(isset($modelo_animal->perfil) && $modelo_animal->perfil->grupo_animal == "ovino") selected @endif>
                        Ovino
                    </option>
                    <option value="peixe"
                            @if(isset($modelo_animal->perfil) && $modelo_animal->perfil->grupo_animal == "peixe") selected @endif>
                        Peixe
                    </option>
                    <option value="primata_nao_humano"
                    @if(isset($modelo_animal->perfil) && $modelo_animal->perfil->grupo_animal == "primata_nao_humano") selected @endif>
                        Primata Não-Humano
                    </option>
                    <option value="rato_heterogenico"
                    @if(isset($modelo_animal->perfil) && $modelo_animal->perfil->grupo_animal == "rato_heterogenico") selected @endif>
                        Rato Heterogênico
                    </option>
                    <option value="rato_isogenico"
                    @if(isset($modelo_animal->perfil) && $modelo_animal->perfil->grupo_animal == "rato_isogenico") selected @endif>
                        Rato Isogênico
                    </option>
                    <option value="rato_knockout"
                    @if(isset($modelo_animal->perfil) && $modelo_animal->perfil->grupo_animal == "rato_knockout") selected @endif>
                        Rato Knockout
                    </option>
                    <option value="rato_transgenico"
                    @if(isset($modelo_animal->perfil) && $modelo_animal->perfil->grupo_animal == "rato_transgenico") selected @endif>
                        Rato Transgênico
                    </option>
                    <option value="reptil"
                            @if(isset($modelo_animal->perfil) && $modelo_animal->perfil->grupo_animal == "reptil") selected @endif>
                        Réptil
                    </option>
                    <option value="suino"
                            @if(isset($modelo_animal->perfil) && $modelo_animal->perfil->grupo_animal == "suino") selected @endif>
                        Suíno
                    </option>
                    <option value="outro"
                            @if(isset($modelo_animal->perfil) && $modelo_animal->perfil->grupo_animal == "outro") selected @endif>
                        Outro a especificar
                    </option>
                </select>

            <div class="div_error" id="grupo_animal_error" style="display: none">
            <span class="invalid-input">
                <strong id="grupo_animal_error_message"></strong>
            </span>
            </div>
        </div>

        <div class="col-sm-3" id="anexo_outro_tipo" style="display: none;">
            <label for="anexo_outro_tipo">Especifique:</label>
            <input class="form-control @error('') is-invalid @enderror" name="tipo_grupo_animal" autocomplete="tipo_grupo_animal" autofocus
            required @if(!empty($modelo_animal->perfil) && $modelo_animal->perfil->tipo_grupo_animal != null) value="{{$modelo_animal->perfil->tipo_grupo_animal}}"@endif>
        </div>

        <div class="col-sm-6">
            <label for="linhagem">Linhagem / Raça:<strong style="color: red">*</strong></label>
            <input class="form-control @error('linhagem') is-invalid @enderror" id="linhagem" type="text"
                   name="linhagem" @if(isset($modelo_animal->perfil)) value="{{$modelo_animal->perfil->linhagem}}" @else
                       value="{{old('linhagem')}}" @endif required autocomplete="linhagem"
                   autofocus>
            <div class="div_error" id="linhagem_error" style="display: none">
                <span class="invalid-input">
                    <strong id="linhagem_error_message"></strong>
                </span>
            </div>
        </div>

    </div>

    <div class="row mt-2">
        <div class="col-sm-4 pr-0">
            <label for="idade">Idade:<strong style="color: red">*</strong></label>
            <input class="form-control @error('idade') is-invalid @enderror" id="idade" type="number" name="idade"
                   @if(isset($modelo_animal->perfil)) value="{{$modelo_animal->perfil->idade}}"
                   @else value="{{old('idade')}}" @endif required autocomplete="idade" autofocus>
            <div class="div_error" id="idade_error" style="display: none">
                <span class="invalid-input">
                    <strong id="idade_error_message"></strong>
                </span>
            </div>
        </div>

        <div class="col-sm-2 pl-1">
            <label for="periodo">Periodo:<strong style="color: red">*</strong></label>
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
            <label for="peso">Peso Aproximado:<strong style="color: red">*</strong></label>
            <input class="form-control @error('peso') is-invalid @enderror" id="peso" type="text" name="peso"
                   @if(isset($modelo_animal->perfil)) value="{{$modelo_animal->perfil->peso}}"
                   @else value="{{old('peso')}}" @endif required autocomplete="peso"
                   autofocus>
            <div class="div_error" id="peso_error" style="display: none">
                <span class="invalid-input">
                    <strong id="peso_error_message"></strong>
                </span>
            </div>
        </div>

    </div>

    <div class="row mt-2">

        <div class="col-sm-4">
            <label for="machos">Quantidade de Machos:<strong style="color: red">*</strong></label>
            <input class="form-control @error('machos') is-invalid @enderror" id="machos" type="number" name="machos"
                   @if(isset($modelo_animal->perfil)) value="{{$modelo_animal->perfil->machos}}"
                   @else value="{{old('machos')}}" @endif required autocomplete="machos"
                   autofocus>
            <div class="div_error" id="machos_error" style="display: none">
                <span class="invalid-input">
                    <strong id="machos_error_message"></strong>
                </span>
            </div>
        </div>

        <div class="col-sm-4">
            <label for="femeas">Quantidade de Fêmeas:<strong style="color: red">*</strong></label>
            <input class="form-control @error('femeas') is-invalid @enderror" id="femeas" type="number" name="femeas"
                   @if(isset($modelo_animal->perfil)) value="{{$modelo_animal->perfil->femeas}}"
                   @else value="{{old('femeas')}}" @endif required autocomplete="femeas"
                   autofocus>
            <div class="div_error" id="femeas_error" style="display: none">
                <span class="invalid-input">
                    <strong id="femeas_error_message"></strong>
                </span>
            </div>
        </div>

        <div class="col-sm-4">
            <label for="quantidade">Quantidade Total:<strong style="color: red">*</strong></label>
            <input class="form-control @error('quantidade') is-invalid @enderror" id="quantidade" type="number"
                   name="quantidade"
                   @if(isset($modelo_animal->perfil)) value="{{$modelo_animal->perfil->quantidade}}"
                   @else value="{{old('quantidade')}}" @endif required autocomplete="quantidade"
                   autofocus readonly>
            <div class="div_error" id="quantidade_error" style="display: none">
                <span class="invalid-input">
                    <strong id="quantidade_error_message"></strong>
                </span>
            </div>
        </div>

        <div class="col-sm-12 mt-3">
            <label for="termo_consentimento">Termo de Consentimento Livre e Esclarecido (TCLE):<strong style="color: red">*</strong></label>
            
            @if (!empty($modelo_animal->termo_consentimento))
            <a class="btn btn-primary download-button"
                data-path="{{route('termo.download', ['modelo_animal_id' => $modelo_animal->id])}}">Baixar
                Termo de Consentimento</a>
            @else
                <br>
                <a class="btn btn-secondary"
                href="#">Não Enviado</a>
            @endif
            
        </div>

        <div class="col-sm-12 mt-3">
            <label for="licencas_previas">Licenças Prévias de outras instituições (IBAMA, FUNAI, CNEN, CTNBio, CGEN, ICMBio.):</label>
            <a target="_blank"
            href="https://www2.dti.ufv.br/ceua/scripts/grau-invasividade.html"
            title="A autorização da CEUA não requer a existência de licença prévia de outras instituições. Entretanto, o responsável deverá obter todas as autorizações legais cabíveis que a natureza do projeto exige antes do início das atividades com animais como, por exemplo, autorizações de instituições como Instituto Brasileiro do Meio Ambiente e dos Recursos Naturais Renováveis - IBAMA, Fundação Nacional do Índio - FUNAI, Comissão Nacional de Energia Nuclear - CNEN, Conselho de Gestão do Patrimônio Genético - CGEN, Comissão Técnica Nacional de Biossegurança - CTNBio, Instituto Chico Mendes de Conservação da Biodiversidade - ICMBio, dentre outras." style="color: darkred">
             <i class="fa-solid fa-circle-info fa-lg"></i></a>
            <small>Caso seja mais de um documento, anexar em um único PDF.</small>
            
            @if (!empty($modelo_animal->licencas_previas))
                <a class="btn btn-primary download-button"
                    data-path="{{route('licencas_previas.download', ['modelo_animal_id' => $modelo_animal])}}">Baixar
                Licenças</a>
            @else
                <br>
                <a class="btn btn-secondary"
                href="#">Não Enviado</a>
            @endif
            
        </div>
    </div>
</div>
<script>
    $(document).ready(function () {
        $("#anexo_cqb").hide().find('input, radio').prop('disabled', true);

        @if(isset($modelo_animal) && $modelo_animal->geneticamente_modificado == true)
        $("#geneticamente_modificado_sim").attr('checked', true);
        $("#anexo_cqb").show();
        @else
        $("#geneticamente_modificado_nao").attr('checked', true);
        $("#anexo_cqb").hide();
        @endif

        $("#procedencia").change(function () {
                if ($(this).val() == "animal_silvestre") {
                    $("#anexo_animal_silvestre_captura").show().find('input, radio').prop('disabled', false);
                    $("#anexo_animal_silvestre_coleta").show().find('input, radio').prop('disabled', false);
                    $("#anexo_animal_marcacao").show().find('input, radio').prop('disabled', false);
                    $("#anexo_outras_informações").show().find('input, radio').prop('disabled', false);
                }else {
                    $("#anexo_animal_silvestre_captura").hide().find('input, radio').prop('disabled', true);
                    $("#anexo_animal_silvestre_coleta").hide().find('input, radio').prop('disabled', true);
                    $("#anexo_animal_marcacao").hide().find('input, radio').prop('disabled', true);
                    $("#anexo_outras_informações").hide().find('input, radio').prop('disabled', true);
                }
            });

        @if(isset($modelo_animal) && $modelo_animal->procedencia == "animal_silvestre")
            $("#procedencia").change(function () {
                if ($(this).val() == "animal_silvestre") {
                    $("#anexo_animal_silvestre_captura").show().find('input, radio').prop('disabled', false);
                    $("#anexo_animal_silvestre_coleta").show().find('input, radio').prop('disabled', false);
                    $("#anexo_animal_marcacao").show().find('input, radio').prop('disabled', false);
                    $("#anexo_outras_informações").show().find('input, radio').prop('disabled', false);
                }else {
                    $("#anexo_animal_silvestre_captura").hide().find('input, radio').prop('disabled', true);
                    $("#anexo_animal_silvestre_coleta").hide().find('input, radio').prop('disabled', true);
                    $("#anexo_animal_marcacao").hide().find('input, radio').prop('disabled', true);
                    $("#anexo_outras_informações").hide().find('input, radio').prop('disabled', true);
                }
            });
        @elseif(isset($modelo_animal) && $modelo_animal->procedencia == "outra_procedencia")
            $("#procedencia").change(function () {
                if ($(this).val() == "outra_procedencia") {
                    $("#anexo_outra_procedencia").show().find('input, radio').prop('disabled', false);
                }else {
                    $("#anexo_outra_procedencia").hide().find('input, radio').prop('disabled', true);
                }
            });
        @else
                $("#anexo_animal_silvestre_captura").hide().find('input, radio').prop('disabled', true);
                $("#anexo_animal_silvestre_coleta").hide().find('input, radio').prop('disabled', true);
                $("#anexo_animal_marcacao").hide().find('input, radio').prop('disabled', true);
                $("#anexo_outras_informações").hide().find('input, radio').prop('disabled', true);
                $("#anexo_outra_procedencia").hide().find('input, radio').prop('disabled', true);
        @endif


        $("#geneticamente_modificado_sim").click(function () {
            $("#anexo_cqb").show().find('input, radio').prop('disabled', false);
        });

        $("#geneticamente_modificado_nao").click(function () {
            $("#anexo_cqb").hide().find('input, radio').prop('disabled', true);
        });

        @if (isset($modelo_animal) && $modelo_animal->flag_captura == true)
            $("#anexo_captura").show().find('input, radio').prop('disabled', false);
        @else
            $("#anexo_captura").hide().find('input, radio').prop('disabled', true);
        @endif

        $("#captura_sim").click(function () {
            $("#anexo_captura").show().find('input, radio').prop('disabled', false);
        });

        $("#captura_nao").click(function () {
            $("#anexo_captura").hide().find('input, radio').prop('disabled', true);
        });

        @if (isset($modelo_animal) && $modelo_animal->flag_coleta_especimes == true)
            $("#anexo_coleta_especimes").show().find('input, radio').prop('disabled', false);
        @else
            $("#anexo_coleta_especimes").hide().find('input, radio').prop('disabled', true);
        @endif

        $("#coleta_especimes_sim").click(function () {
            $("#anexo_coleta_especimes").show().find('input, radio').prop('disabled', false);
        });

        $("#coleta_especimes_nao").click(function () {
            $("#anexo_coleta_especimes").hide().find('input, radio').prop('disabled', true);
        });

        @if (isset($modelo_animal) && $modelo_animal->flag_marcacao == true)
            $("#anexo_marcacao").show().find('input, radio').prop('disabled', false);
        @else
            $("#anexo_marcacao").hide().find('input, radio').prop('disabled', true);
        @endif

        $("#animal_marcacao_sim").click(function () {
            $("#anexo_marcacao").show().find('input, radio').prop('disabled', false);
        });

        $("#animal_marcacao_nao").click(function () {
            $("#anexo_marcacao").hide().find('input, radio').prop('disabled', true);
        });

        @if (isset($modelo_animal) && $modelo_animal->flag_outras_info == true)
            $("#anexo_outras_info").show().find('input, radio').prop('disabled', false);
        @else
            $("#anexo_outras_info").hide().find('input, radio').prop('disabled', true);
        @endif

        $("#outras_info_sim").click(function () {
            $("#anexo_outras_info").show().find('input, radio').prop('disabled', false);
        });

        $("#outras_info_nao").click(function () {
            $("#anexo_outras_info").hide().find('input, radio').prop('disabled', true);
        });

        @if(isset($modelo_animal->perfil) && $modelo_animal->perfil->grupo_animal == "outro")
            $("#anexo_outro_tipo").show().find('input, radio').prop('disabled', false);
            $("#grupo_animal").change(function () {
                if ($(this).val() == "outro") {
                    $("#anexo_outro_tipo").show().find('input, radio').prop('disabled', false);
                }else {
                    $("#anexo_outro_tipo").hide().find('input, radio').prop('disabled', true);
                }
            });
        @else
            $("#anexo_outro_tipo").hide().find('input, radio').prop('disabled', true);
        @endif

        $("#grupo_animal").change(function () {
                if ($(this).val() == "outro") {
                    $("#anexo_outro_tipo").show();
                    $("#anexo_outro_tipo").show().find('input, radio').prop('disabled', false);
                }else {
                    $("#anexo_outro_tipo").hide();
                    // $("#anexo_outro_tipo").hide().find('input, radio').prop('disabled', true);
                }
            });

        $("#procedencia").change(function () {
            if ($(this).val() == "outra_procedencia") {
                $("#anexo_outra_procedencia").show().find('input, radio').prop('disabled', false);
            }else {
                $("#anexo_outra_procedencia").hide().find('input, radio').prop('disabled', true);
            }
        });

    });
</script>

<script>
    $(document).ready(function() {
        function calcularTotal() {
            var machos = parseInt($('#machos').val()) || 0;
            var femeas = parseInt($('#femeas').val()) || 0;
            var total = machos + femeas;
            $('#quantidade').val(total);
        }
        calcularTotal();
        $('#machos, #femeas').on('input', function() {
            calcularTotal();
        });
    });
    $(document).ready(function() {

        var tipoUsuario = {{ Auth::user()->tipo_usuario_id }};

        if (tipoUsuario === 1) {

            $('input, select, textarea').prop('disabled', true);
        }
    });

    window.onload = function() {
        var isAdmin = <?php echo (Auth::user()->tipo_usuario_id == 1) ? 'true' : 'false'; ?>;

        if (isAdmin) {
            var forms = document.getElementsByTagName("form");
            for (var i = forms.length - 1; i >= 0; i--) {
                var form = forms[i];
                while (form.firstChild) {
                    form.parentNode.insertBefore(form.firstChild, form);
                }
                form.parentNode.removeChild(form);
            }
        }
    }
</script>
