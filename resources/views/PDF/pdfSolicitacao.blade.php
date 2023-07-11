<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>PDF</title>
</head>
<body>
<h2>CEUA | Dados da Solicitação | Pedido de nº: {{ $solicitacao->id }}</h2>

{{-- DADOS INICIAIS --}}
<div class="card shadow-lg p-3 borda-bottom" style="border-radius: 10px 10px 0px 0px;" id="fundo_0">
    <div class="row">
        <div class="col-md-12">
            <h3 class="titulo" id="titulo_0">1. Dados Iniciais</h3>
            <div class="col-sm-4">
                <label for="tipo">Tipo: {{ $solicitacao->tipo ?? null }}</label>
            </div>

            <div class="col-sm-4">
                <label for="inicio">Início: {{date('d/m/Y', strtotime($solicitacao->inicio ?? null))}}</label>
            </div>

            <div class="col-sm-4">
                <label for="fim">Fim: {{date('d/m/Y', strtotime($solicitacao->fim ?? null))}}</label>
            </div>

            <div class="col-sm-4">
                <label for="titulo_pt">Título em Português: {{ $solicitacao->titulo_pt ?? null}}</label>
            </div>

            <div class="col-sm-4">
                <label for="titulo_en">Titulo em Inglês (apenas para
                    projeto): {{ $solicitacao->titulo_en ?? null }}</label>
            </div>

            <div class="col-sm-4">
                @foreach($grandeAreas as $grandeArea)
                    @if($grandeArea->id == $solicitacao->grande_area_id)
                        <label>Grande Área do Conhecimento: {{ $grandeArea->nome ?? null}}</label>
                    @endif
                @endforeach
            </div>

            <div class="col-sm-4">
                @foreach($areas as $area)
                    @if($area->id == $solicitacao->area_id)
                        <label>Área do Conhecimento: {{ $area->nome ?? null}}</label>
                    @endif
                @endforeach
            </div>

            <div class="col-sm-4">
                @foreach($subAreas as $subArea)
                    @if($subArea->id == $solicitacao->sub_area_id)
                        <label>Subárea do Conhecimento: {{ $subArea->nome ?? null}}</label>
                    @endif
                @endforeach
            </div>
        </div>
    </div>
</div>

{{-- DADOS DO RESPONSAVEL --}}
<div class="card shadow-lg p-3 borda-bottom" style="border-radius: 10px 10px 0px 0px;" id="fundo_1">
    <div class="row">
        <div class="col-md-12">
            <h3 class="titulo" id="titulo_1">2. Dados do Responsável</h3>

            <div class="row">
                <div class="col-sm-4">
                    <label for="nome">Nome Completo: {{ $solicitacao->responsavel->nome ?? null}}</label>
                </div>

                <div class="col-sm-4">
                    <label for="nome">E-mail: {{ $solicitacao->responsavel->contato->email ?? null}}</label>
                </div>

                <div class="col-sm-4">
                    <label for="telefone">Telefone: {{ $solicitacao->responsavel->contato->telefone ?? null}}</label>
                </div>

                <div class="col-sm-4">
                    <label for="cpf">CPF: {{ $solicitacao->responsavel->cpf ?? null}}</label>
                </div>

                <div class="col-sm-4">
                    @foreach($instituicaos as $instituicao)
                        @if($instituicao->id == $solicitacao->responsavel->departamento->unidade->instituicao->id)
                            <label>Instituição: {{ $instituicao->nome ?? null}}</label>
                        @endif
                    @endforeach
                </div>

                <div class="col-sm-4">
                    <label>Unidade: {{ $solicitacao->responsavel->departamento->unidade->nome ?? null}}</label>
                </div>

                <div class="col-sm-4">
                    <label>Departamento: {{ $solicitacao->responsavel->departamento->nome ?? null}}</label>
                </div>

                @switch($solicitacao->responsavel->vinculo_instituicao)
                    @case("pesquisador_docente")
                        <label>Vínculo: Docente/Pesquisador</label>
                        @break
                    @case("pesquisador_pos_graduando")
                        <label>Vínculo: Pesquisador/Pós - graduando</label>
                        @break
                    @case("pesquisador_tecnico_superior")
                        <label>Vínculo: Pesquisador/Técnico Nível Superior</label>
                        @break
                    @case("pesquisador_graduacao_incompleto")
                        <label>Vínculo: Pesquisador/Graduação Incompleto</label>
                        @break
                @endswitch

                @switch($solicitacao->responsavel->grau_escolaridade)
                    @case("graduacao_completa")
                        <label>Grau de Escolaridade: Graduação Completa</label>
                        @break
                    @case("graduacao_incompleta")
                        <label>Grau de Escolaridade: Graduação Incompleta</label>
                        @break
                    @case("pos_graduacao_incompleta")
                        <label>Grau de Escolaridade: Pós-Gradução Incompleta</label>
                        @break
                    @case("pos_graduacao_completa")
                        <label>Grau de Escolaridade: Pós-Gradução Completa</label>
                        @break
                    @case("mestrado_incompleto")
                        <label>Grau de Escolaridade: Mestrado Incompleto</label>
                        @break
                    @case("mestrado_completo")
                        <label>Grau de Escolaridade: Mestrado Completo</label>
                        @break
                    @case("doutorado_incompleto")
                        <label>Grau de Escolaridade: Doutorado Incompleto</label>
                        @break
                    @case("doutorado_completo")
                        <label>Grau de Escolaridade: Doutorado Completo</label>
                        @break
                @endswitch

                <label>Treinamento: {{ $solicitacao->responsavel->treinamento ?? null}}</label>

            </div>
        </div>
    </div>
</div>

{{-- DADOS DO COLABORADOR --}}
<div class="card shadow-lg p-3 borda-bottom" style="border-radius: 10px 10px 0px 0px;" id="fundo_2">
    <div class="row">
        <div class="col-md-12">
            <h3 class="titulo" id="titulo_2">3. Dados do(s) Colaborador(es)</h3>

            @foreach($colaboradores as $key => $colab)
                <label>Nome Completo: {{ $colab->nome ?? null}}</label>
                <label>E-mail: {{ $colab->contato->email ?? null}}</label>
                <label>Telefone: {{ $colab->contato->telefone ?? null}}</label>
                <label>CPF: {{ $colab->cpf ?? null}}</label>

                @foreach($instituicaos as $instituicao)
                    @if($instituicao->id == $colab->instituicao->id)
                        <label>Instituição: {{ $instituicao->nome ?? null}}</label>
                    @endif
                @endforeach

                @switch($colab->grau_escolaridade)
                    @case("graduacao_completa")
                        <label>Grau de Escolaridade: Graduação Completa</label>
                        @break
                    @case("graduacao_incompleta")
                        <label>Grau de Escolaridade: Graduação Incompleta</label>
                        @break
                    @case("pos_graduacao_incompleta")
                        <label>Grau de Escolaridade: Pós-Gradução Incompleta</label>
                        @break
                    @case("pos_graduacao_completa")
                        <label>Grau de Escolaridade: Pós-Gradução Completa</label>
                        @break
                    @case("mestrado_incompleto")
                        <label>Grau de Escolaridade: Mestrado Incompleto</label>
                        @break
                    @case("mestrado_completo")
                        <label>Grau de Escolaridade: Mestrado Completo</label>
                        @break
                    @case("doutorado_incompleto")
                        <label>Grau de Escolaridade: Doutorado Incompleto</label>
                        @break
                    @case("doutorado_completo")
                        <label>Grau de Escolaridade: Doutorado Completo</label>
                        @break
                @endswitch
                <label>Treinamento: {{ $colab->treinamento ?? null}}</label>
            @endforeach

        </div>
    </div>
</div>

{{-- DADOS COMPLEMENTARES --}}
<div class="card shadow-lg p-3 borda-bottom" style="border-radius: 10px 10px 0px 0px;" id="fundo_3">
    <div class="row">
        <div class="col-md-12">
            <h3 class="titulo" id="titulo_3">4. Dados Complementares</h3>

            <div class="col-sm-12">
                <label for="resumo">Resumo do Projeto de Pesquisa / de Extensão / de Aula Prática / de
                    Treinamento: {{$solicitacao->dadosComplementares->resumo ?? null}}</label>
            </div>

            <div class="col-sm-12">
                <label for="objetivos">Objetivos (na
                    íntegra): {{$solicitacao->dadosComplementares->objetivos ?? null}}</label>
            </div>

            <div class="col-sm-12">
                <label
                    for="justificativa">Justificativa: {{$solicitacao->dadosComplementares->justificativa ?? null}}</label>
            </div>

            <div class="col-sm-12">
                <label for="relevancia">Relevância: {{$solicitacao->dadosComplementares->relevancia ?? null}}</label>
            </div>
        </div>
    </div>
</div>

{{-- MODELO ANIMAL --}}
<div class="card shadow-lg p-3 borda-bottom" style="border-radius: 10px 10px 0px 0px;" id="fundo_4">
    <div class="row">
        <div class="col-md-12">
            <h3 class="titulo" id="titulo_4">5. Dados dos Modelos Animais</h3>

            @foreach($modelos_animais as $modelo_animal)

                <h4>Modelo Animal</h4>

                <div class="col-sm-12">
                    <label>Nome Científico: {{ $modelo_animal->nome_cientifico ?? null}}</label>
                </div>

                <div class="col-sm-12">
                    <label>Nome Vulgar: {{ $modelo_animal->nome_vulgar ?? null}}</label>
                </div>

                <div class="col-sm-12">
                    <label>Justificar o uso da Espécie Animal
                        Escolhida: {{ $modelo_animal->justificativa ?? null}}</label>
                </div>

                <h4>Procedência</h4>
                @switch($modelo_animal->procedencia)
                    @case("animal_comprado")

                        <label>Procedência: Animal Comprado</label>
                        @break
                    @case("animal_criacao")
                        <label>Procedência: Animal de Criação</label>
                        @break
                    @case("animal_doado")
                        <label>Procedência: Animal Doado</label>
                        @break
                    @case("animal_silvestre")
                        <label>Procedência: Animal Silvestre</label>
                        @if ($modelo_animal->captura != null)
                            <label>Captura: {{ $modelo_animal->captura }}</label>
                        @endif
                        @if ($modelo_animal->coleta_especimes != null)
                            <label>Coleta de Espécimes: {{ $modelo_animal->coleta_especimes }}</label>
                        @endif
                        @if ($modelo_animal->marcacao != null)
                            <label>Marcação: {{ $modelo_animal->marcacao }}</label>
                        @endif
                        @if ($modelo_animal->outras_info != null)
                            <label>Outros: {{ $modelo_animal->outras_info }}</label>
                        @endif
                        @break
                    @case("aviario")
                        <label>Procedência: Aviário</label>
                        @break
                    @case("bioterio")
                        <label>Procedência: Biotério</label>
                        @break
                    @case("fazenda")
                        <label>Procedência: Fazenda</label>
                        @break
                    @case("outra_procedencia")
                        <label>Procedência: {{ $modelo_animal->tipo_outra_procedencia  ?? null}}</label>
                        @break
                @endswitch

                @if ($modelo_animal->geneticamente_modificado == "true")
                    <div class="col-sm-12">
                        <label>O Animal é Geneticamente Modificado.</label>
                        <label>Número CQB: {{ $modelo_animal->numero_cqb ?? null}}</label>
                    </div>
                @endif
                @switch($modelo_animal->perfil->grupo_animal)
                    @case("anfibio")
                        <label>Tipo Animal: Anfíbio</label>
                        @break
                    @case("ave")
                        <label>Tipo Animal: Ave</label>
                        @break
                    @case("bovino")
                        <label>Tipo Animal: Bovino</label>
                        @break
                    @case("bubalino")
                        <label>Tipo Animal: Bubalino</label>
                        @break
                    @case("canino")
                        <label>Tipo Animal: Canino</label>
                        @break
                    @case("camudongo_heterogenico")
                        <label>Tipo Animal: Camundongo Heterogênico</label>
                        @break
                    @case("camudongo_isogenico")
                        <label>Tipo Animal: Camundongo Isogênico</label>
                        @break
                    @case("camudongo_knockout")
                        <label>Tipo Animal: Camundongo Knockout</label>
                        @break
                    @case("camudongo_transgenico")
                        <label>Tipo Animal: Camundongo Transgênico</label>
                        @break
                    @case("caprino")
                        <label>Tipo Animal: Caprino</label>
                        @break
                    @case("chinchila")
                        <label>Tipo Animal: Chinchila</label>
                        @break
                    @case("cobaia")
                        <label>Tipo Animal: Cobaia</label>
                        @break
                    @case("coelhos")
                        <label>Tipo Animal: Coelhos</label>
                        @break
                    @case("equideo")
                        <label>Tipo Animal: Equídeo</label>
                        @break
                    @case("especie_silvestre_brasileira")
                        <label>Tipo Animal: Espécie Silvestre Brasileira</label>
                        @break
                    @case("especie_silvestre_nao_rasileira")
                        <label>Tipo Animal: Espécie Silvestre Não-Brasileira</label>
                        @break
                    @case("gato")
                        <label>Tipo Animal: Gato</label>
                        @break
                    @case("gerbil")
                        <label>Tipo Animal: Gerbil</label>
                        @break
                    @case("hamster")
                        <label>Tipo Animal: Hamster</label>
                        @break
                    @case("ovino")
                        <label>Tipo Animal: Ovino</label>
                        @break
                    @case("peixe")
                        <label>Tipo Animal: Peixe</label>
                        @break
                    @case("primata_nao_humano")
                        <label>Tipo Animal: Primata Não-Humano</label>
                        @break
                    @case("rato_heterogenico")
                        <label>Tipo Animal: Rato Heterogênico</label>
                        @break
                    @case("rato_isogenico")
                        <label>Tipo Animal: Rato Isogênico</label>
                        @break
                    @case("rato_knockout")
                        <label>Tipo Animal: Rato Knockout</label>
                        @break
                    @case("rato_transgenico")
                        <label>Tipo Animal: Rato Transgênico</label>
                        @break
                    @case("reptil")
                        <label>Tipo Animal: Réptil</label>
                        @break
                    @case("suino")
                        <label>Tipo Animal: Suíno</label>
                        @break
                    @case("outro")
                        <label>Tipo Animal: {{ $modelo_animal->perfil->tipo_grupo_animal ?? null}}</label>
                        @break
                @endswitch

                <div class="col-sm-12">
                    <label>Linhagem / Raça: {{ $modelo_animal->perfil->linhagem ?? null}}</label>
                </div>

                <div class="col-sm-12">
                    <label>Idade: {{ $modelo_animal->perfil->idade ?? null}}
                        | @if ($modelo_animal->perfil->periodo == "Dias")
                            Período: Dias
                        @elseif ($modelo_animal->perfil->periodo == "Meses")
                            Período: Meses
                        @else
                            Período: Anos
                        @endif </label>
                </div>

                <div class="col-sm-12">
                    <label>Peso Aproximado: {{ $modelo_animal->perfil->peso ?? null}}</label>
                </div>

                <div class="col-sm-12">
                    <label>Quantidade de Machos: {{ $modelo_animal->perfil->machos ?? null}}</label>
                </div>

                <div class="col-sm-12">
                    <label>Quantidade de Fêmeas: {{ $modelo_animal->perfil->femeas ?? null}}</label>
                </div>

                <div class="col-sm-12">
                    <label>Quantidade de Total: {{ $modelo_animal->perfil->quantidade ?? null}}</label>
                </div>

                <h4>Planejamento</h4>

                <div class="col-sm-12">
                    <label>Número de Grupos: {{ $modelo_animal->planejamento->num_animais_grupo ?? null}}</label>
                </div>

                <div class="col-sm-12">
                    <label>Especificar cada grupo (controle, tratado, utilizado para treinamento, se for o caso)
                        e número de animais por
                        grupo: {{ $modelo_animal->planejamento->especificar_grupo ?? null}}</label>
                </div>

                <div class="col-sm-12">
                    <label>Quais critérios e / ou referências científicas foram utilizados para definir o
                        tamanho da amostra: {{ $modelo_animal->planejamento->criterios ?? null}}</label>
                </div>

                <div class="col-sm-12">
                    <label>Descrição de Materiais e
                        Métodos: {{ $modelo_animal->planejamento->desc_materiais_metodos ?? null}}</label>
                </div>

                <div class="col-sm-12">
                    <label>Análise Estatística: {{ $modelo_animal->planejamento->analise_estatistica ?? null}}</label>
                </div>

                <div class="col-sm-12">
                    <label>Outras Informações
                        Relevantes: {{ $modelo_animal->planejamento->outras_infos ?? null}}</label>
                </div>

                @switch($modelo_animal->planejamento->grau_invasividade)
                    @case("GI1")
                        <label>Grau de Invasividade: GI1 =
                            Experimentos que causam pouco ou nenhum desconforto ou estresse</label>
                        @break
                    @case("GI2")
                        <label>Grau de Invasividade: GI2 =
                            Experimentos que causam estresse, desconforto ou dor, de leve
                            intensidade</label>
                        @break
                    @case("GI3")
                        <label>Grau de Invasividade: GI3 =
                            Experimentos que causam estresse, desconforto ou dor, de intensidade
                            intermediária</label>
                        @break
                    @case("GI4")
                        <label>Grau de Invasividade: GI4 =
                            Experimentos que causam dor de alta intensidade</label>
                        @break
                @endswitch

                <h4>Condição Animal</h4>

                <div class="col-sm-12">
                    <label>Comentar obrigatoriamente sobre os itens abaixo e as demais condições que forem particulares
                        à
                        espécie: {{$modelo_animal->planejamento->condicoesAnimal->condicoes_particulares ?? null}}</label>
                </div>

                <div class="col-sm-12">
                    <label>Endereço e local onde será mantido o animal durante o procedimento experimental (biotério,
                        fazenda, aviário, laboratório,
                        outro): {{ $modelo_animal->planejamento->condicoesAnimal->local ?? null}}</label>
                </div>

                @switch($modelo_animal->planejamento->condicoesAnimal->ambiente_alojamento)
                    @case("baia")
                        <label>Ambiente de Alojamento: Baia</label>
                        @break
                    @case("gaiola")
                        <label>Ambiente de Alojamento: Gaiola</label>
                        @break
                    @case("galpao")
                        <label>Ambiente de Alojamento: Galpão</label>
                        @break
                    @case("jaula")
                        <label>Ambiente de Alojamento: Jaula</label>
                        @break
                    @case("nao_se_aplica")
                        <label>Ambiente de Alojamento: Não se Aplica</label>
                        @break
                    @case("outro")
                        <label>Ambiente de Alojamento: Outro</label>
                        @break
                @endswitch

                @switch($modelo_animal->planejamento->condicoesAnimal->tipo_cama)
                    @case("estrado")
                        <label>Tipo de Cama: Estrado</label>
                        @break
                    @case("maravalha")
                        <label>Tipo de Cama: Maravalha</label>
                        @break
                    @case("nao_se_aplica")
                        <label>Tipo de Cama: Não se Aplica</label>
                        @break
                    @case("outro")
                        <label>Tipo de Cama: Outro</label>
                        @break
                @endswitch

                <div class="col-sm-12">
                    <label>Número de Animais por Ambiente de
                        Contenção: {{ $modelo_animal->planejamento->condicoesAnimal->num_animais_ambiente ?? null}}</label>
                </div>

                <div class="col-sm-12">
                    <label>Dimensões do Ambiente de Contenção dos
                        Animais: {{ $modelo_animal->planejamento->condicoesAnimal->dimensoes_ambiente ?? null}}</label>
                </div>

                <div class="col-sm-12">
                    <label>Período Total de Manutenção dos Animais no
                        Experimento: {{ $modelo_animal->planejamento->condicoesAnimal->periodo ?? null}}</label>
                </div>

                <div class="col-sm-12">
                    <label>Profissional
                        Responsável: {{ $modelo_animal->planejamento->condicoesAnimal->profissional_responsavel ?? null}}</label>
                </div>

                <div class="col-sm-12">
                    <label>E-Mail do
                        Responsável: {{ $modelo_animal->planejamento->condicoesAnimal->email_responsavel ?? null}}</label>
                </div>

                <h4>Procedimento</h4>

                @if (isset($modelo_animal->planejamento->procedimento->estresse) &&$modelo_animal->planejamento->procedimento->estresse != null)
                    <div class="col-sm-12">
                        <label>Descreva o estresse / dor Intencional nos animais e
                            justifique: {{ $modelo_animal->planejamento->procedimento->estresse ?? null}}</label>
                    </div>
                @endif

                @if (isset($modelo_animal->planejamento->procedimento->anestesico) && $modelo_animal->planejamento->procedimento->anestesico != null)
                    <div class="col-sm-12">
                        <label>Uso de anestésicos com dose (UI ou mg/kg), via de
                            administração:: {{ $modelo_animal->planejamento->procedimento->anestesico ?? null}}</label>
                    </div>
                @endif

                @if (isset($modelo_animal->planejamento->procedimento->relaxante) && $modelo_animal->planejamento->procedimento->relaxante != null)
                    <div class="col-sm-12">
                        <label>Uso de Relaxante
                            Muscular: {{ $modelo_animal->planejamento->procedimento->relaxante ?? null}}</label>
                    </div>
                @endif

                @if (isset($modelo_animal->planejamento->procedimento->analgesico) && $modelo_animal->planejamento->procedimento->analgesico != null)
                    <div class="col-sm-12">
                        <label>Uso de analgésicos com dose (UI ou mg/kg), via de
                            administração:: {{ $modelo_animal->planejamento->procedimento->analgesico ?? null}}</label>
                    </div>
                @endif

                @if (isset($modelo_animal->planejamento->procedimento->imobilizacao) && $modelo_animal->planejamento->procedimento->imobilizacao != null)
                    <div class="col-sm-12">
                        <label>Imobilização / Contenção do
                            Animal: {{ $modelo_animal->planejamento->procedimento->imobilizacao ?? null}}</label>
                    </div>
                @endif

                @if (isset($modelo_animal->planejamento->procedimento->inoculacao_substancia) && $modelo_animal->planejamento->procedimento->inoculacao_substancia != null)
                    <div class="col-sm-12">
                        <label>Exposição / Inoculação /
                            Administração: {{ $modelo_animal->planejamento->procedimento->inoculacao_substancia ?? null}}</label>
                    </div>
                @endif

                @if (isset($modelo_animal->planejamento->procedimento->extracao) && $modelo_animal->planejamento->procedimento->extracao != null)
                    <div class="col-sm-12">
                        <label>Extração de Materiais
                            Biológicos: {{ $modelo_animal->planejamento->procedimento->extracao ?? null}}</label>
                    </div>
                @endif

                @if (isset($modelo_animal->planejamento->procedimento->jejum) && $modelo_animal->planejamento->procedimento->jejum != null)
                    <div class="col-sm-12">
                        <label>Jejum (em horas): {{ $modelo_animal->planejamento->procedimento->jejum ?? null}}</label>
                    </div>
                @endif

                @if (isset($modelo_animal->planejamento->procedimento->restricao_hidrica))
                    <div class="col-sm-12">
                        <label>Restrição Hídrica (em
                            horas): {{ $modelo_animal->planejamento->procedimento->restricao_hidrica ?? null}}</label>
                    </div>
                @endif

                <h4>Cirurgia</h4>

                @if (isset($modelo_animal->planejamento->operacao->flag_cirurgia) && ($modelo_animal->planejamento->operacao->flag_cirurgia == "cirurgia_sim_unica" || $modelo_animal->planejamento->operacao->flag_cirurgia == "cirurgia_sim_multipla"))
                    <div class="col-sm-12">
                        <label>Descrição: {{ $modelo_animal->planejamento->operacao->detalhes_cirurgia ?? null}}</label>
                    </div>
                @endif

                @if (isset($modelo_animal->planejamento->operacao->observacao_recuperacao) && $modelo_animal->planejamento->operacao->observacao_recuperacao == "true")
                    <div class="col-sm-12">
                        <label>Período de observação (em
                            horas): {{ $modelo_animal->planejamento->operacao->detalhes_observacao_recuperacao ?? null}}</label>
                    </div>
                @endif

                @if (isset($modelo_animal->planejamento->operacao->analgesia_recuperacao) && $modelo_animal->planejamento->operacao->analgesia_recuperacao  == "true")
                    <div class="col-sm-12">
                        <label>Descreva o Fármaco, Dose (UI ou mg/kg), Via de Adminstração, Frequência e
                            Duração: {{ $modelo_animal->planejamento->operacao->detalhes_analgesia_recuperacao ?? null}}</label>
                    </div>
                @elseif (isset($modelo_animal->planejamento->operacao->analgesia_recuperacao) &&  $modelo_animal->planejamento->operacao->analgesia_recuperacao  == "false")
                    <div class="col-sm-12">
                        <label>Justifique o NÃO-uso de analgesia
                            pós-operatório: {{ $modelo_animal->planejamento->operacao->detalhes_nao_uso_analgesia_recuperacao ?? null}}</label>
                    </div>
                @endif

                @if (isset($modelo_animal->planejamento->operacao->outros_cuidados_recuperacao) && $modelo_animal->planejamento->operacao->outros_cuidados_recuperacao == "true")
                    <div class="col-sm-12">
                        <label>Descrição: {{ $modelo_animal->planejamento->operacao->outros_cuidados_recuperacao ?? null}}</label>
                    </div>
                @endif

                <h4>Finalização</h4>

                @if (isset($modelo_animal->planejamento->eutanasia->descricao) && $modelo_animal->planejamento->eutanasia->descricao != null)
                    <div class="col-sm-12">
                        <label>Descrição: {{ $modelo_animal->planejamento->eutanasia->descricao ?? null}}</label>
                        <label>Substância, Dose,
                            Via: {{ $modelo_animal->planejamento->eutanasia->metodo ?? null}}</label>
                        <label>Caso Método Restrito,
                            Justifique: {{ $modelo_animal->planejamento->eutanasia->justificativa_metodo ?? null}}</label>
                    </div>
                @endif

                <div class="col-sm-12">
                    <label>Destino dos Animais Mortos e / ou Tecidos /
                        Fragmentos: {{ $modelo_animal->planejamento->eutanasia->destino ?? null}}</label>
                </div>

                <div class="col-sm-12">
                    <label>Forma de Descarte da
                        Carcaça: {{ $modelo_animal->planejamento->eutanasia->descarte ?? null}}</label>
                </div>

                @if (isset($modelo_animal->planejamento->resultado->abate) && $modelo_animal->planejamento->resultado->abate != null)
                    <div class="col-sm-12">
                        <label>Destino dos Animais
                            Abatidos: {{ $modelo_animal->planejamento->resultado->abate ?? null}}</label>
                    </div>
                @endif

                <div class="col-sm-12">
                    <label>Destino dos animais sobreviventes após a conclusão do experimento / aula ou retirados no
                        decorrer do experimento /
                        aula: {{ $modelo_animal->planejamento->resultado->destino_animais ?? null}}</label>
                    <label>Outras Informações
                        Relevantes: {{ $modelo_animal->planejamento->resultado->outras_infos ?? null}}</label>
                    <label>Justificativa da não utilização de métodos alternativos e da necessidade do uso de
                        animais: {{ $modelo_animal->planejamento->resultado->justificativa_metodos ?? null}}</label>
                    <label>Resumo do procedimento (relatar todos os procedimentos com os
                        animais): {{ $modelo_animal->planejamento->resultado->resumo_procedimento ?? null}}</label>
                </div>
            @endforeach

        </div>
    </div>
</div>
</body>
</html>

