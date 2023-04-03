<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>PDF</title>
</head>
<body>
	<h2>CEUA -> Dados da Solicitação | Pedido de nº: {{ $solicitacao->id }}</h2>

	{{-- DADOS INICIAIS --}}
	<div class="col mt-3">
		<h3>Dados Iniciais</h3>
		<p></p>
		
			<p>Tipo: {{ $solicitacao->tipo }}</p>
			<p>Inicio: {{date('d/m/Y', strtotime($solicitacao->inicio))}}</p>
			<p>Fim: {{date('d/m/Y', strtotime($solicitacao->fim))}}</p>
			<p>Titulo em Português: {{ $solicitacao->titulo_pt }}</p>
			<p>Titulo em Inglês: {{ $solicitacao->titulo_en }}</p>
			@foreach($grandeAreas as $grandeArea)
				@if($grandeArea->id == $solicitacao->grande_area_id)
					<p>Grande Área do Conhecimento: {{ $grandeArea->nome }}</p>
				@endif
			@endforeach
			@foreach($areas as $area)
				@if($area->id == $solicitacao->area_id)
					<p>Área do Conhecimento: {{ $area->nome }}</p>
				@endif
			@endforeach
			@foreach($subAreas as $subArea)
				@if($subArea->id == $solicitacao->sub_area_id)
					<p>Subárea do Conhecimento: {{ $subArea->nome }}</p>
				@endif
			@endforeach	
	</div>

	{{-- DADOS DO RESPONSÁVEL --}}
	<div class="col mt-3">
		
		<h3>Dados do Responsável</h3>
		<p></p>

			<u> Informações Pessoais / Contato</u>
			<p>Nome Completo: {{ $solicitacao->responsavel->nome }}</p>
			<p>E-mail: {{ $solicitacao->responsavel->contato->email }}</p>
			<p>Telefone: {{ $solicitacao->responsavel->contato->telefone }}</p>
			<p>CPF: {{ $solicitacao->responsavel->cpf }}</p>
			<p></p>
			<u>Informações Institucionais</u>
			@foreach($instituicaos as $instituicao)
				@if($instituicao->id == $solicitacao->responsavel->departamento->unidade->instituicao->id)
					<p>Instituição: {{ $instituicao->nome }}</p>
				@endif
			@endforeach
			<p>Unidade: {{ $solicitacao->responsavel->departamento->unidade->nome }}</p>
			<p>Departamento: {{ $solicitacao->responsavel->departamento->nome }}</p>
			@switch($solicitacao->responsavel->vinculo_instituicao)
				@case("pesquisador_docente")
					<p>Vínculo: Docente/Pesquisador</p>
					@break
				@case("pesquisador_pos_graduando")
					<p>Vínculo: Pesquisador/Pós - graduando</p>
					@break
				@case("pesquisador_tecnico_superior")
					<p>Vínculo: Pesquisador/Técnico Nível Superior</p>
					@break
				@case("pesquisador_graduacao_incompleto")
					<p>Vínculo: Pesquisador/Graduação Incompleto</p>
					@break
			@endswitch
			@switch($solicitacao->responsavel->grau_escolaridade)
				@case("graduacao_completa")
					<p>Grau de Escolaridade: Graduação Completa</p>
					@break
				@case("graduacao_incompleta")
					<p>Grau de Escolaridade: Graduação Incompleta</p>
					@break
				@case("pos_graduacao_incompleta")
					<p>Grau de Escolaridade: Pós-Gradução Incompleta</p>
				@break
				@case("pos_graduacao_completa")
					<p>Grau de Escolaridade: Pós-Gradução Completa</p>
					@break
				@case("mestrado_incompleto")
					<p>Grau de Escolaridade: Mestrado Incompleto</p>
					@break
				@case("mestrado_completo")
					<p>Grau de Escolaridade: Mestrado Completo</p>
					@break
				@case("doutorado_incompleto")
					<p>Grau de Escolaridade: Doutorado Incompleto</p>
					@break
				@case("doutorado_completo")
					<p>Grau de Escolaridade: Doutorado Completo</p>
					@break
			@endswitch
			<p></p>
			<u>Informações Complementares</u>
			<p>Treinamento: {{ $solicitacao->responsavel->treinamento }}</p>
	</div>

	{{-- DADOS DO COLABORADOR --}}
	<div class="col mt-3">
		<h3>Dados do Colaborador</h3>
			<u>Informações Pessoais / Contato</u>
			@foreach($colaboradores as $key => $colab)
				<p>Nome Completo: {{ $colab->nome }}</p>
				<p>E-mail: {{ $colab->contato->email }}</p>
				<p>Telefone: {{ $colab->contato->telefone }}</p>
				<p>CPF: {{ $colab->cpf }}</p>
				<p></p>

				<u>Informações Institucionais</u>
				@foreach($instituicaos as $instituicao)
					@if($instituicao->id == $colab->instituicao->id)
						<p>Instituição: {{ $instituicao->nome }}</p>
					@endif
				@endforeach
				@switch($colab->grau_escolaridade)
					@case("graduacao_completa")
						<p>Grau de Escolaridade: Graduação Completa</p>
						@break
					@case("graduacao_incompleta")
						<p>Grau de Escolaridade: Graduação Incompleta</p>
						@break
					@case("pos_graduacao_incompleta")
						<p>Grau de Escolaridade: Pós-Gradução Incompleta</p>
					@break
					@case("pos_graduacao_completa")
						<p>Grau de Escolaridade: Pós-Gradução Completa</p>
						@break
					@case("mestrado_incompleto")
						<p>Grau de Escolaridade: Mestrado Incompleto</p>
						@break
					@case("mestrado_completo")
						<p>Grau de Escolaridade: Mestrado Completo</p>
						@break
					@case("doutorado_incompleto")
						<p>Grau de Escolaridade: Doutorado Incompleto</p>
						@break
					@case("doutorado_completo")
						<p>Grau de Escolaridade: Doutorado Completo</p>
						@break
				@endswitch
				<p></p>
				<u>Informações Complementares</u>
				<p>Treinamento: {{ $colab->treinamento }}</p>
			@endforeach
	</div>

	{{-- DADOS COMPLEMENTARES --}}
	<div class="col mt-3">
		<h3>Dados Complementares</h3>
		<p></p>

			<u>Informações</u>
			<p>Resumo do Projeto de Pesquisa / de Extensão / de Aula Prática / de Treinamento: {{ $solicitacao->dadosComplementares->resumo }}</p>
			<p>Objetivos (na íntegra): {{ $solicitacao->dadosComplementares->objetivos }}</p>
			<p>Justificativa: {{ $solicitacao->dadosComplementares->justificativa }}</p>
			<P>Relevância: {{ $solicitacao->dadosComplementares->relevancia }}</P>
	</div>
	
	{{-- MODELO ANIMAL --}}
	<div class="col mt-3">
		<h2>Modelo Animal</h2>
		<h3>Dados Base do Modelo Animal</h3>
		<p></p>

		<u>Informações do Animal/Uso</u>
		<p>Nome Científico: {{ $modelo_animal->nome_cientifico }}</p>
		<p>Nome Vulgar: {{ $modelo_animal->nome_vulgar }}</p>
		<p>Justificar o uso da Espécie Animal Escolhida: {{ $modelo_animal->justificativa }}</p>
		<p></p>

		<u>Procedência</u>
		@switch($modelo_animal->procedencia)
			@case("animal_comprado")
				<p>Procedência: Animal Comprado</p>
				@break
			@case("animal_criacao")
				<p>Procedência: Animal de Criação</p>
				@break
			@case("animal_doado")
				<p>Procedência: Animal Doado</p>
				@break
			@case("animal_silvestre")
				<p>Procedência: Animal Silvestre</p>
				@if ($modelo_animal->captura != null)
					<p>Captura: {{ $modelo_animal->captura }}</p>
				@endif
				@if ($modelo_animal->coleta_especimes != null)
					<p>Coleta de Espécimes: {{ $modelo_animal->coleta_especimes }}</p>
				@endif
				@if ($modelo_animal->marcacao != null)
					<p>Marcação: {{ $modelo_animal->marcacao }}</p>
				@endif
				@if ($modelo_animal->outras_info != null)
					<p>Outros: {{ $modelo_animal->outras_info }}</p>
				@endif
				@break
			@case("aviario")
				<p>Procedência: Aviário</p>
				@break
			@case("bioterio")
				<p>Procedência: Biotério</p>
				@break
			@case("fazenda")
				<p>Procedência: Fazenda</p>
				@break
			@case("outra_procedencia")
				<p>Procedência: {{ $modelo_animal->tipo_outra_procedencia }}</p>
			@break
		@endswitch
		@if ($modelo_animal->geneticamente_modificado == "true")
			<p>O Animal é Geneticamente Modificado.</p>
			<p>Número CQB: {{ $modelo_animal->numero_cqb }}</p>
		@endif
		<p></p>

		<u>Tipo Animal</u>
		@switch($modelo_animal->perfil->grupo_animal)
			@case("anfibio")
				<p>Tipo Animal: Anfíbio</p>
				@break
			@case("ave")
				<p>Tipo Animal: Ave</p>
				@break
			@case("bovino")
				<p>Tipo Animal: Bovino</p>
				@break
			@case("bubalino")
				<p>Tipo Animal: Bubalino</p>
				@break
			@case("canino")
				<p>Tipo Animal: Canino</p>
				@break
			@case("camudongo_heterogenico")
				<p>Tipo Animal: Camundongo Heterogênico</p>
				@break
			@case("camudongo_isogenico")
				<p>Tipo Animal: Camundongo Isogênico</p>
				@break
			@case("camudongo_knockout")
				<p>Tipo Animal: Camundongo Knockout</p>
				@break
			@case("camudongo_transgenico")
				<p>Tipo Animal: Camundongo Transgênico</p>
				@break
			@case("caprino")
				<p>Tipo Animal: Caprino</p>
				@break
			@case("chinchila")
				<p>Tipo Animal: Chinchila</p>
				@break
			@case("cobaia")
				<p>Tipo Animal: Cobaia</p>
				@break
			@case("coelhos")
				<p>Tipo Animal: Coelhos</p>
				@break
			@case("equideo")
				<p>Tipo Animal: Equídeo</p>
				@break
			@case("especie_silvestre_brasileira")
				<p>Tipo Animal: Espécie Silvestre Brasileira</p>
				@break
			@case("especie_silvestre_nao_rasileira")
				<p>Tipo Animal: Espécie Silvestre Não-Brasileira</p>
				@break
			@case("gato")
				<p>Tipo Animal: Gato</p>
				@break
			@case("gerbil")
				<p>Tipo Animal: Gerbil</p>
				@break
			@case("hamster")
				<p>Tipo Animal: Hamster</p>
				@break
			@case("ovino")
				<p>Tipo Animal: Ovino</p>
				@break
			@case("peixe")
				<p>Tipo Animal: Peixe</p>
				@break
			@case("primata_nao_humano")
				<p>Tipo Animal: Primata Não-Humano</p>
				@break
			@case("rato_heterogenico")
				<p>Tipo Animal: Rato Heterogênico</p>
				@break
			@case("rato_isogenico")
				<p>Tipo Animal: Rato Isogênico</p>
				@break
			@case("rato_knockout")
				<p>Tipo Animal: Rato Knockout</p>
				@break
			@case("rato_transgenico")
				<p>Tipo Animal: Rato Transgênico</p>
				@break
			@case("reptil")
				<p>Tipo Animal: Réptil</p>
				@break
			@case("suino")
				<p>Tipo Animal: Suíno</p>
				@break
			@case("outro")
				<p>Tipo Animal: {{ $modelo_animal->perfil->tipo_grupo_animal }}</p>
				@break
			@endswitch
			<p>Linhagem / Raça: {{ $modelo_animal->perfil->linhagem }}</p>
			<p>Idade: {{ $modelo_animal->perfil->idade }} | @if ($modelo_animal->perfil->periodo == "Dias")Período: Dias @elseif ($modelo_animal->perfil->periodo == "Meses")Período: Meses @else Período: Anos @endif </p>
			<p>Peso Aproximado: {{ $modelo_animal->perfil->peso }}</p>
			<p>Quantidade de Machos: {{ $modelo_animal->perfil->machos }}</p>
			<p>Quantidade de Fêmeas: {{ $modelo_animal->perfil->femeas }}</p>
			<p>Quantidade de Total: {{ $modelo_animal->perfil->quantidade }}</p>
			<p></p>

			
			<h2>Planejamento</h2>
			<h3>Dados Base do Planejamento</h3>
			<p></p>

			<u>Planejamento Estatístico / Delineamento Experimental / Desenho Experimental</u>
			<p>Número de Grupos: {{ $planejamento->num_animais_grupo }}</p>
			<p>Especificar cada grupo (controle, tratado, utilizado para treinamento, se for o caso)
				e número de animais por grupo: {{ $planejamento->especificar_grupo }}</p>
			<p>Quais critérios e / ou referências científicas foram utilizados para definir o
				tamanho da amostra: {{ $planejamento->criterios }}</p>
			<p>Descrição de Materiais e Métodos: {{ $planejamento->desc_materiais_metodos }}</p>
			<p>Análise Estatística: {{ $planejamento->analise_estatistica }}</p>
			<p>Outras Informações Relevantes: {{ $planejamento->outras_infos }}</p>
			<p></p>

			<u>Grau de Invasividade</u>
			@switch($planejamento->grau_invasividade)
				@case("GI1")
					<p>Grau de Invasividade: GI1 =
                        Experimentos que causam pouco ou nenhum desconforto ou estresse</p>
					@break
				@case("GI2")
					<p>Grau de Invasividade: GI2 =
                        Experimentos que causam estresse, desconforto ou dor, de leve
                        intensidade</p>
					@break
				@case("GI3")
					<p>Grau de Invasividade: GI3 =
                        Experimentos que causam estresse, desconforto ou dor, de intensidade
                        intermediária</p>
					@break
				@case("GI4")
					<p>Grau de Invasividade: GI4 =
                        Experimentos que causam dor de alta intensidade</p>
					@break
			@endswitch
			<p></p>

			<h2>Componentes Conjuntos ao Planejamento</h2>
			<h3>Condição Animal</h3>
			<p></p>

			<u>Condições de alojamento e alimentação dos animais</u>
			<p>Comentar obrigatoriamente sobre os itens abaixo e as demais condições que forem particulares à espécie</p>
			<small>1. Alimentação; 2. Fonte de Água; 3. Lotação - Número de animais/área; 4. Exaustão do ar: sim ou não;</small>
			<p>{{$condicoes_animal->condicoes_particulares}}</p>
			<p>Endereço e local onde será mantido o animal durante o procedimento experimental (biotério, fazenda, aviário, laboratório, outro): {{ $condicoes_animal->local }}</p>
			@switch($condicoes_animal->ambiente_alojamento)
				@case("baia")
					<p>Ambiente de Alojamento: Baia</p>
					@break
				@case("gaiola")
					<p>Ambiente de Alojamento: Gaiola</p>
					@break
				@case("galpao")
					<p>Ambiente de Alojamento: Galpão</p>
					@break
				@case("jaula")
					<p>Ambiente de Alojamento: Jaula</p>
					@break
				@case("nao_se_aplica")
					<p>Ambiente de Alojamento: Não se Aplica</p>
					@break
				@case("outro")
					<p>Ambiente de Alojamento: Outro</p>
					@break
			@endswitch

			@switch($condicoes_animal->tipo_cama)
				@case("estrado")
					<p>Tipo de Cama: Estrado</p>
					@break
				@case("maravalha")
					<p>Tipo de Cama: Maravalha</p>
					@break
				@case("nao_se_aplica")
					<p>Tipo de Cama: Não se Aplica</p>
					@break
				@case("outro")
					<p>Tipo de Cama: Outro</p>
					@break
			@endswitch		
			
			<p>Número de Animais por Ambiente de Contenção: {{ $condicoes_animal->num_animais_ambiente }}</p>
			<p>Dimensões do Ambiente de Contenção dos Animais: {{ $condicoes_animal->dimensoes_ambiente }}</p>
			<p>Período Total de Manutenção dos Animais no Experimento: {{ $condicoes_animal->periodo }}</p>
			<p>Profissional Responsável: {{ $condicoes_animal->profissional_responsavel }}</p>
			<p>E-Mail do Responsável: {{ $condicoes_animal->email_responsavel }}</p>
			<p></p>

			<h3>Procedimento</h3>
			<p></p>

			<u>Informações</u>
			@if ($procedimento->estresse != null)
				<p>Descreva o estresse / dor Intencional nos animais e justifique: {{ $procedimento->estresse }}</p>
			@endif

			@if ($procedimento->anestesico != null)
				<p>Uso de anestésicos com dose (UI ou mg/kg), via de administração:: {{ $procedimento->anestesico }}</p>
			@endif

			@if ($procedimento->relaxante != null)
				<p>Uso de Relaxante Muscular: {{ $procedimento->relaxante }}</p>
			@endif

			@if ($procedimento->analgesico != null)
				<p>Uso de analgésicos com dose (UI ou mg/kg), via de administração:: {{ $procedimento->analgesico }}</p>
			@endif
			<p></p>

			<u>Imobilização / Contenção do Animal</u>
			@if ($procedimento->imobilizacao != null)
				<p>Imobilização / Contenção do Animal: {{ $procedimento->imobilizacao }}</p>
			@endif
			<p></p>

			<u>Exposição / Inoculação / Administração</u>
			@if ($procedimento->inoculacao_substancia != null)
				<p>Exposição / Inoculação / Administração: {{ $procedimento->inoculacao_substancia }}</p>
			@endif
			<p></p>

			<u>Extração de Materiais Biológicos</u>
			@if ($procedimento->extracao != null)
				<p>Extração de Materiais Biológicos: {{ $procedimento->extracao }}</p>
			@endif
			<p></p>

			<u>Condições Alimentares</u>
			@if ($procedimento->jejum != null)
					<p>Jejum (em horas): {{ $procedimento->jejum }}</p>
			@endif
			@if ($procedimento->restricao_hidrica)
				<p>Restrição Hídrica (em horas): {{ $procedimento->restricao_hidrica }}</p>
			@endif
			<p></p>

			<h3>Cirurgia</h3>
			<u>Informações</u>

			<u>Cirurgia</u>
			@if ($operacao->flag_cirurgia == "cirurgia_sim_unica" || $operacao->flag_cirurgia == "cirurgia_sim_multipla")
				<p>Descrição: {{ $operacao->detalhes_cirurgia }}</p>
			@endif
			<p></p>

			<u>Pós-Operatório</u>
			@if ($operacao->observacao_recuperacao == "true")
				<p>Período de observação (em horas): {{ $operacao->detalhes_observacao_recuperacao }}</p>
			@endif

			@if ($operacao->analgesia_recuperacao  == "true")
				<p>Descreva o Fármaco, Dose (UI ou mg/kg), Via de Adminstração, Frequência e Duração: {{ $operacao->detalhes_analgesia_recuperacao }}</p>
			@elseif ($operacao->analgesia_recuperacao  == "false")
				<p>Justifique o NÃO-uso de analgesia pós-operatório: {{ $operacao->detalhes_nao_uso_analgesia_recuperacao }}</p>
			@endif

			@if ($operacao->outros_cuidados_recuperacao == "true")
				<p>Descrição: {{ $operacao->outros_cuidados_recuperacao }}</p>
			@endif
			<p></p>

			<h3>Finalização</h3>
			<p></p>

			<u>Especificação</u>
			
			@if ($eutanasia->descricao != null)
				<p>Descrição: {{ $eutanasia->descricao }}</p>
				<p>Substância, Dose, Via: {{ $eutanasia->metodo }}</p>
				<p>Caso Método Restrito, Justifique: {{ $eutanasia->justificativa_metodo }}</p>
			@endif
			<p>Destino dos Animais Mortos e / ou Tecidos / Fragmentos: {{ $eutanasia->destino }}</p>
			<p>Forma de Descarte da Carcaça: {{ $eutanasia->descarte }}</p>
			<p></p>

			<u>Abate</u>
			@if ($resultado->abate != null)
				<p>Destino dos Animais Abatidos: {{ $resultado->abate }}</p>
			@endif
			<p>Destino dos animais sobreviventes após a conclusão do experimento / aula ou retirados no decorrer do experimento / aula: {{ $resultado->destino_animais }}</p>
			<p>Outras Informações Relevantes: {{ $resultado->outras_infos }}</p>
			<p>Justificativa da não utilização de métodos alternativos e da necessidade do uso de animais: {{ $resultado->justificativa_metodos }}</p>
			<p>Resumo do procedimento (relatar todos os procedimentos com os animais): {{ $resultado->resumo_procedimento }}</p>				
			
	</div>

</body>
</html>


