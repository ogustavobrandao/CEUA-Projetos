<input type="hidden" name="solicitacao_id" value="{{$solicitacao->id}}">
<div class="row">
    <h3 class="subtitulo">Informações do Animal/Uso</h3>
    <div class="col-sm-6">
        <label for="nome_cientifico">Nome Científico:<strong style="color: red">*</strong></label>
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
        <label for="nome_vulgar">Nome Vulgar:<strong style="color: red">*</strong></label>
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
        <label for="justificativa">Justificar o uso da Espécie Animal Escolhida:<strong style="color: red">*</strong>
            <a target="_blank"
            href="https://www2.dti.ufv.br/ceua/scripts/grau-invasividade.html"
            title="O responsável deverá justificar a espécie ou grupo taxonômico e os procedimentos a serem empregados em função do sistema biológico a ser estudado. A opção por um determinado modelo animal deverá ter consistência científica e não ser influenciada por conveniência ou orçamento." style="color: darkred">
             <i class="fa-solid fa-circle-info fa-lg"></i>
         </a>
        </label>
        <textarea class="form-control @error('justificativa') is-invalid @enderror" name="justificativa" id="justificativa" autocomplete="justificativa" autofocus
            required> @if(isset($modelo_animal)){{$modelo_animal->justificativa}}@else{{old('justificativa')}}@endif </textarea>
        @error('justificativa')
        <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
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
            @error('procedencia')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>

        <div class="col-sm-6">
            <label for="experiencia">O Animal é Geneticamente Modificado?<strong style="color: red">*</strong></label>
            <div class="row ml-1">
                <div class="col-sm-2">
                    <input class="form-check-input" type="radio" name="geneticamente_modificado"
                           id="geneticamente_modificado_sim" value="true"
                           @if(isset($modelo_animal) && $modelo_animal->geneticamente_modificado) checked @endif
                    <label class="form-check-label" for="geneticamente_modificado">Sim</label>
                </div>
                <div class="col-sm-2">
                    <input class="form-check-input" type="radio" name="geneticamente_modificado"
                           id="geneticamente_modificado_nao" value="false"
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
        <h3 class="subtitulo">Tipo e Característica</h3>
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
                    Camundongo heterogênico
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
                
            @error('grupo_animal')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>

        <div class="col-sm-3" id="anexo_outro_tipo" style="display: none;">
            <label for="anexo_outro_tipo">Especifique o Tipo do Animal:</label>
            <input class="form-control @error('') is-invalid @enderror" name="tipo_grupo_animal" id="tipo_grupo_animal" autocomplete="tipo_grupo_animal" autofocus
            required @if(!empty($modelo_animal->perfil) && !$modelo_animal->perfil->tipo_grupo_animal != null){{$modelo_animal->perfil->tipo_grupo_animal }}@else{{old('tipo_grupo_animal')}}@endif> 
        </div>

        <div class="col-sm-6">
            <label for="linhagem">Linhagem / Raça:<strong style="color: red">*</strong></label>
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
            <label for="idade">Idade:<strong style="color: red">*</strong></label>
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
            @error('peso')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>

    </div>

    <div class="row mt-2">

        <div class="col-sm-4">
            <label for="machos">Quantidade de Machos:<strong style="color: red">*</strong></label>
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
            <label for="femeas">Quantidade de Fêmeas:<strong style="color: red">*</strong></label>
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
            <label for="quantidade">Quantidade Total:<strong style="color: red">*</strong></label>
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

        <div class="col-sm-12 mt-3">
            <label for="termo_consentimento">Termo de Consentimento Livre e Esclarecido (TCLE):<strong style="color: red">*</strong></label>
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

        <div class="col-sm-12 mt-3">
            <label for="licencas_previas">Licenças Prévias de outras instituições (IBAMA, FUNAI, CNEN, CTNBio, CGEN, ICMBio.):
                <a target="_blank"
                href="https://www2.dti.ufv.br/ceua/scripts/grau-invasividade.html"
                title="A autorização da CEUA não requer a existência de licença prévia de outras instituições. Entretanto, o responsável deverá obter todas as autorizações legais cabíveis que a natureza do projeto exige antes do início das atividades com animais como, por exemplo, autorizações de instituições como Instituto Brasileiro do Meio Ambiente e dos Recursos Naturais Renováveis - IBAMA, Fundação Nacional do Índio - FUNAI, Comissão Nacional de Energia Nuclear - CNEN, Conselho de Gestão do Patrimônio Genético - CGEN, Comissão Técnica Nacional de Biossegurança - CTNBio, Instituto Chico Mendes de Conservação da Biodiversidade - ICMBio, dentre outras." style="color: darkred">
                 <i class="fa-solid fa-circle-info fa-lg"></i>
             </a>
            </label>
            @if(\Illuminate\Support\Facades\Auth::user()->tipo_usuario_id == 2)
                {{-- <a class="btn btn-primary"
                   href="{{route('licencas_previas.download', ['modelo_animal_id' => $modelo_animal->id])}}">Baixar
                   Licenças</a> --}}
            @else
                @if(!empty($modelo_animal))
                    <input class="form-control @error('licencas_previas') is-invalid @enderror"
                           id="licencas_previas"
                           type="file" name="licencas_previas"
                           value="" autocomplete="licencas_previas" autofocus
                           @if($modelo_animal->licencas_previas != null) style="width: 135px" @endif>
                    @error('licencas_previas')
                    <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
                    @enderror
                    @if($modelo_animal->licencas_previas != null)
                        <span
                            style="border: 1px gray solid; border-radius: 10px; text-align: center; width: 250px; position: absolute; bottom: 0px; left: 155px; height: 38px; padding-top: 5px; background-color: #dcfadf">Um Arquivo Já Foi Enviado</span>
                    @endif
                @else
                    <input class="form-control @error('licencas_previas') is-invalid @enderror"
                           id="licencas_previas"
                           type="file" name="licencas_previas"
                           @if(isset($modelo_animal)) value="{{$modelo_animal->licencas_previas}}"
                           @else value="{{old('licencas_previas')}}" @endif autocomplete="licencas_previas"
                           autofocus required>
                    @error('licencas_previas')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                @endif
            @endif
        </div>
    </div>
</div>

<script>
    $(document).ready(function () {

        @if(isset($modelo_animal) && $modelo_animal->geneticamente_modificado == true)
        $("#geneticamente_modificado_sim").attr('checked', true);
        $("#anexo_cqb").show();
        @else
        $("#geneticamente_modificado_nao").attr('checked', true);
        $("#anexo_cqb").hide();
        @endif

        $("#geneticamente_modificado_sim").click(function () {
            $("#anexo_cqb").show().find('input, radio').prop('disabled', false);
        });

        $("#geneticamente_modificado_nao").click(function () {
            $("#anexo_cqb").hide().find('input, radio').prop('disabled', true);
        });

        $("#grupo_animal").change(function () {
            if ($(this).val() == "outro") {
                $("#anexo_outro_tipo").show().find('input, radio').prop('disabled', false);
            }else {
                $("#anexo_outro_tipo").hide().find('input, radio').prop('disabled', true);
            }
        });

    });
</script>
