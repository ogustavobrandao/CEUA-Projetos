<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>PDF</title>
</head>
<body>
	<h2>CEUA | Solicitação Aprovada | Pedido de nº: {{ $solicitacao->id }}</h2>
    <h3>Licença -> {{ $licenca->codigo }}</h3>

	{{-- DADOS INICIAIS --}}
	<div class="card shadow-lg p-3 borda-bottom" style="border-radius: 10px 10px 0px 0px;" id="fundo_0">
		<div class="row">
			<div class="col-md-12">
					<h3 class="titulo" id="titulo_0">1. Dados Iniciais</h3>
					<div class="col-sm-4">
						<label for="tipo">Tipo: {{ $solicitacao->tipo }}</label>
					</div>

					<div class="col-sm-4">
						<label for="inicio">Início: {{date('d/m/Y', strtotime($solicitacao->inicio))}}</label>
					</div>

					<div class="col-sm-4">
						<label for="fim">Fim: {{date('d/m/Y', strtotime($solicitacao->fim))}}</label>
					</div>

					<div class="col-sm-4">
						<label for="titulo_pt">Título em Português: {{ $solicitacao->titulo_pt }}</label>
					</div>
			
					<div class="col-sm-4">
							<label for="titulo_en">Titulo em Inglês (apenas para projeto): {{ $solicitacao->titulo_en }}</label>
					</div>
			
					<div class="col-sm-4">
						@foreach($grandeAreas as $grandeArea)
							@if($grandeArea->id == $solicitacao->grande_area_id)
								<label>Grande Área do Conhecimento: {{ $grandeArea->nome }}</label>
							@endif
						@endforeach
					</div>

					<div class="col-sm-4">
						@foreach($areas as $area)
							@if($area->id == $solicitacao->area_id)
								<label>Área do Conhecimento: {{ $area->nome }}</label>
							@endif
						@endforeach
					</div>

					<div class="col-sm-4">
						@foreach($subAreas as $subArea)
							@if($subArea->id == $solicitacao->sub_area_id)
								<label>Subárea do Conhecimento: {{ $subArea->nome }}</label>
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
							<label for="nome">Nome Completo: {{ $solicitacao->responsavel->nome }}</label>
						</div>
			
						<div class="col-sm-4">
							<label for="nome">E-mail: {{ $solicitacao->responsavel->contato->email }}</label>
						</div>
			
						<div class="col-sm-4">
							<label for="telefone">Telefone: {{ $solicitacao->responsavel->contato->telefone }}</label>
						</div>
			
						<div class="col-sm-4">
							<label for="cpf">CPF: {{ $solicitacao->responsavel->cpf }}</label>
						</div>

						<div class="col-sm-4">
							@foreach($instituicaos as $instituicao)
								@if($instituicao->id == $solicitacao->responsavel->departamento->unidade->instituicao->id)
									<label>Instituição: {{ $instituicao->nome }}</label>
								@endif
							@endforeach
						</div>

						<div class="col-sm-4">
							<label>Unidade: {{ $solicitacao->responsavel->departamento->unidade->nome }}</label>
						</div>

						<div class="col-sm-4">
							<label>Departamento: {{ $solicitacao->responsavel->departamento->nome }}</label>
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

						<label>Treinamento: {{ $solicitacao->responsavel->treinamento }}</label>

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
				<label>Nome Completo: {{ $colab->nome }}</label>
				<label>E-mail: {{ $colab->contato->email }}</label>
				<label>Telefone: {{ $colab->contato->telefone }}</label>
				<label>CPF: {{ $colab->cpf }}</label>

				@foreach($instituicaos as $instituicao)
					@if($instituicao->id == $colab->instituicao->id)
						<label>Instituição: {{ $instituicao->nome }}</label>
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
				<label>Treinamento: {{ $colab->treinamento }}</label>
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
					<label for="resumo">Resumo do Projeto de Pesquisa / de Extensão / de Aula Prática / de Treinamento: {{$solicitacao->dadosComplementares->resumo}}</label>
				</div>
	
				<div class="col-sm-12">
					<label for="objetivos">Objetivos (na íntegra): {{$solicitacao->dadosComplementares->objetivos}}</label>
				</div>
	
				<div class="col-sm-12">
					<label for="justificativa">Justificativa: {{$solicitacao->dadosComplementares->justificativa}}</label>
				</div>
	
				<div class="col-sm-12">
					<label for="relevancia">Relevância: {{$solicitacao->dadosComplementares->relevancia}}</label>
				</div>
			</div>
		</div>
	</div>
	
	{{-- MODELO ANIMAL --}}
	<div class="card shadow-lg p-3 borda-bottom" style="border-radius: 10px 10px 0px 0px;" id="fundo_4">
		<div class="row">
			<div class="col-md-12">
					<h3 class="titulo" id="titulo_4">5. Dados dos Modelos Animais</h3>
					
					<h4>Modelo Animal</h4>

					<div class="col-sm-12">
						<label>Nome Científico: {{ $modelo_animal->nome_cientifico }}</label>
					</div>

					<div class="col-sm-12">
						<label>Nome Vulgar: {{ $modelo_animal->nome_vulgar }}</label>
					</div>

					<div class="col-sm-12">
						<label>Justificar o uso da Espécie Animal Escolhida: {{ $modelo_animal->justificativa }}</label>
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
							<label>Procedência: {{ $modelo_animal->tipo_outra_procedencia }}</label>
						@break
					@endswitch

					@if ($modelo_animal->geneticamente_modificado == "true")
						<div class="col-sm-12">
							<label>O Animal é Geneticamente Modificado.</label>
							<label>Número CQB: {{ $modelo_animal->numero_cqb }}</label>
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
							<label>Tipo Animal: {{ $modelo_animal->perfil->tipo_grupo_animal }}</label>
							@break
					@endswitch
					
					<div class="col-sm-12">
						<label>Linhagem / Raça: {{ $modelo_animal->perfil->linhagem }}</label>
					</div>

					<div class="col-sm-12">
						<label>Idade: {{ $modelo_animal->perfil->idade }} | @if ($modelo_animal->perfil->periodo == "Dias")Período: Dias @elseif ($modelo_animal->perfil->periodo == "Meses")Período: Meses @else Período: Anos @endif </label>
					</div>

					<div class="col-sm-12">
						<label>Peso Aproximado: {{ $modelo_animal->perfil->peso }}</label>
					</div>

					<div class="col-sm-12">
						<label>Quantidade de Machos: {{ $modelo_animal->perfil->machos }}</label>
					</div>

					<div class="col-sm-12">
						<label>Quantidade de Fêmeas: {{ $modelo_animal->perfil->femeas }}</label>
					</div>

					<div class="col-sm-12">
						<label>Quantidade de Total: {{ $modelo_animal->perfil->quantidade }}</label>
					</div>

					<h4>Planejamento</h4>
					
					<div class="col-sm-12">
						<label>Número de Grupos: {{ $planejamento->num_animais_grupo }}</label>
					</div>

					<div class="col-sm-12">
						<label>Especificar cada grupo (controle, tratado, utilizado para treinamento, se for o caso)
							e número de animais por grupo: {{ $planejamento->especificar_grupo }}</label>
					</div>
					
					<div class="col-sm-12">
						<label>Quais critérios e / ou referências científicas foram utilizados para definir o
							tamanho da amostra: {{ $planejamento->criterios }}</label>
					</div>

					<div class="col-sm-12">
						<label>Descrição de Materiais e Métodos: {{ $planejamento->desc_materiais_metodos }}</label>
					</div>

					<div class="col-sm-12">
						<label>Análise Estatística: {{ $planejamento->analise_estatistica }}</label>
					</div>
					
					<div class="col-sm-12">
						<label>Outras Informações Relevantes: {{ $planejamento->outras_infos }}</label>
					</div>

					@switch($planejamento->grau_invasividade)
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
						<label>Comentar obrigatoriamente sobre os itens abaixo e as demais condições que forem particulares à espécie: {{$condicoes_animal->condicoes_particulares}}</label>
					</div>

					<div class="col-sm-12">
						<label>Endereço e local onde será mantido o animal durante o procedimento experimental (biotério, fazenda, aviário, laboratório, outro): {{ $condicoes_animal->local }}</label>
					</div>

					@switch($condicoes_animal->ambiente_alojamento)
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
					
					@switch($condicoes_animal->tipo_cama)
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
						<label>Número de Animais por Ambiente de Contenção: {{ $condicoes_animal->num_animais_ambiente }}</label>
					</div>

					<div class="col-sm-12">
						<label>Dimensões do Ambiente de Contenção dos Animais: {{ $condicoes_animal->dimensoes_ambiente }}</label>
					</div>
					
					<div class="col-sm-12">
						<label>Período Total de Manutenção dos Animais no Experimento: {{ $condicoes_animal->periodo }}</label>
					</div>

					<div class="col-sm-12">
						<label>Profissional Responsável: {{ $condicoes_animal->profissional_responsavel }}</label>
					</div>

					<div class="col-sm-12">
						<label>E-Mail do Responsável: {{ $condicoes_animal->email_responsavel }}</label>
					</div>

					<h4>Procedimento</h4>

					@if ($procedimento->estresse != null)
						<div class="col-sm-12">
							<label>Descreva o estresse / dor Intencional nos animais e justifique: {{ $procedimento->estresse }}</label>
						</div>
					@endif

					@if ($procedimento->anestesico != null)
						<div class="col-sm-12">
							<label>Uso de anestésicos com dose (UI ou mg/kg), via de administração:: {{ $procedimento->anestesico }}</label>
						</div>
					@endif

					@if ($procedimento->relaxante != null)
						<div class="col-sm-12">
							<label>Uso de Relaxante Muscular: {{ $procedimento->relaxante }}</label>
						</div>
					@endif

					@if ($procedimento->analgesico != null)
						<div class="col-sm-12">
							<label>Uso de analgésicos com dose (UI ou mg/kg), via de administração:: {{ $procedimento->analgesico }}</label>
						</div>
					@endif

					@if ($procedimento->imobilizacao != null)
						<div class="col-sm-12">
							<label>Imobilização / Contenção do Animal: {{ $procedimento->imobilizacao }}</label>
						</div>
					@endif

					@if ($procedimento->inoculacao_substancia != null)
						<div class="col-sm-12">
							<label>Exposição / Inoculação / Administração: {{ $procedimento->inoculacao_substancia }}</label>
						</div>
					@endif

					@if ($procedimento->extracao != null)
						<div class="col-sm-12">
							<label>Extração de Materiais Biológicos: {{ $procedimento->extracao }}</label>
						</div>
					@endif

					@if ($procedimento->jejum != null)
						<div class="col-sm-12">
							<label>Jejum (em horas): {{ $procedimento->jejum }}</label>
						</div>
					@endif

					@if ($procedimento->restricao_hidrica)
						<div class="col-sm-12">
							<label>Restrição Hídrica (em horas): {{ $procedimento->restricao_hidrica }}</label>
						</div>
					@endif

					<h4>Cirurgia</h4>

					@if ($operacao->flag_cirurgia == "cirurgia_sim_unica" || $operacao->flag_cirurgia == "cirurgia_sim_multipla")
						<div class="col-sm-12">
							<label>Descrição: {{ $operacao->detalhes_cirurgia }}</label>
						</div>
					@endif

					@if ($operacao->observacao_recuperacao == "true")
						<div class="col-sm-12">
							<label>Período de observação (em horas): {{ $operacao->detalhes_observacao_recuperacao }}</label>
						</div>
					@endif

					@if ($operacao->analgesia_recuperacao  == "true")
						<div class="col-sm-12">
							<label>Descreva o Fármaco, Dose (UI ou mg/kg), Via de Adminstração, Frequência e Duração: {{ $operacao->detalhes_analgesia_recuperacao }}</label>
						</div>
					@elseif ($operacao->analgesia_recuperacao  == "false")
						<div class="col-sm-12">
							<label>Justifique o NÃO-uso de analgesia pós-operatório: {{ $operacao->detalhes_nao_uso_analgesia_recuperacao }}</label>
						</div>
					@endif

					@if ($operacao->outros_cuidados_recuperacao == "true")
						<div class="col-sm-12">
							<label>Descrição: {{ $operacao->outros_cuidados_recuperacao }}</label>
						</div>
					@endif
						
					<h4>Finalização</h4>

					@if ($eutanasia->descricao != null)
						<div class="col-sm-12">
							<label>Descrição: {{ $eutanasia->descricao }}</label>
							<label>Substância, Dose, Via: {{ $eutanasia->metodo }}</label>
							<label>Caso Método Restrito, Justifique: {{ $eutanasia->justificativa_metodo }}</label>
						</div>
					@endif
					
					<div class="col-sm-12">
						<label>Destino dos Animais Mortos e / ou Tecidos / Fragmentos: {{ $eutanasia->destino }}</label>
					</div>
					
					<div class="col-sm-12">
						<label>Forma de Descarte da Carcaça: {{ $eutanasia->descarte }}</label>
					</div>

					@if ($resultado->abate != null)
						<div class="col-sm-12">
							<label>Destino dos Animais Abatidos: {{ $resultado->abate }}</label>
						</div>
					@endif
					
					<div class="col-sm-12">
						<label>Destino dos animais sobreviventes após a conclusão do experimento / aula ou retirados no decorrer do experimento / aula: {{ $resultado->destino_animais }}</label>
						<label>Outras Informações Relevantes: {{ $resultado->outras_infos }}</label>
						<label>Justificativa da não utilização de métodos alternativos e da necessidade do uso de animais: {{ $resultado->justificativa_metodos }}</label>
						<label>Resumo do procedimento (relatar todos os procedimentos com os animais): {{ $resultado->resumo_procedimento }}</label>	
					</div>	
						

			</div>
		</div>
	</div>
</body>
</html>
