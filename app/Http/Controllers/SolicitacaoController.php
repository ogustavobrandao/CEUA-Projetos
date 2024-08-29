<?php

namespace App\Http\Controllers;

use App\Api\Responses;
use App\Http\Requests\Solicitacao\AtualizarModeloAnimalRequest;
use App\Http\Requests\Solicitacao\CriarColaboradorRequest;
use App\Http\Requests\Solicitacao\CriarCondicoesAnimalRequest;
use App\Http\Requests\Solicitacao\CriarEutanasiaRequest;
use App\Http\Requests\Solicitacao\CriarModeloAnimalRequest;
use App\Http\Requests\Solicitacao\CriarOperacaoRequest;
use App\Http\Requests\Solicitacao\CriarPlanejamentoRequest;
use App\Http\Requests\Solicitacao\CriarProcedimentoRequest;
use App\Http\Requests\Solicitacao\CriarResponsavelRequest;
use App\Http\Requests\Solicitacao\CriarResultadoRequest;
use App\Http\Requests\Solicitacao\CriarSolicitacaoFimRequest;
use App\Http\Requests\Solicitacao\CriarSolicitacaoRequest;
use App\Http\Requests\Solicitacao\EditarColaboradorRequest;
use App\Http\Requests\Solicitacao\UpdateColaboradorRequest;
use App\Mail\SendAvaliadorReavaliar;
use App\Mail\SendNotificacaoSolicitacao;
use App\Models\AvaliacaoIndividual;
use App\Models\HistoricoSolicitacao;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;
use App\Mail\SendSolicitacaoReprovada;
use App\Models\Avaliacao;
use App\Models\Colaborador;
use App\Models\CondicoesAnimal;
use App\Models\Contato;
use App\Models\DadosComplementares;
use App\Models\Eutanasia;
use App\Models\Instituicao;
use App\Models\ModeloAnimal;
use App\Models\Operacao;
use App\Models\Perfil;
use App\Models\Planejamento;
use App\Models\Procedimento;
use App\Models\Responsavel;
use App\Models\Resultado;
use App\Models\Solicitacao;
use App\Models\User;
use App\Models\GrandeArea;
use App\Models\Area;
use App\Models\SubArea;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SolicitacaoController extends Controller
{

    public function create_inicio($solicitacao_id){
        $solicitacao = Solicitacao::find($solicitacao_id);
        $instituicaos = Instituicao::orderByRaw("nome = 'Universidade Federal do Agreste de Pernambuco (UFAPE)' DESC, nome ASC")->get();
        $grandeAreas = GrandeArea::orderBy('nome')->get();
        $areas = Area::orderBy('nome')->get();
        $subAreas = SubArea::orderBy('nome')->get();

        if($solicitacao->status == 'avaliado' &&
            $solicitacao->avaliacao->first()->status == 'aprovadaPendencia'){

            $avaliacao = Avaliacao::where('solicitacao_id', $solicitacao_id)->where('user_id', $solicitacao->avaliacao->first()->user_id)->first();

            $avaliacaoDadosComp = AvaliacaoIndividual::where('avaliacao_id', $avaliacao->id)->where('dados_complementares_id', $solicitacao->dadosComplementares->id)->first();
            $avaliacaoDadosini = AvaliacaoIndividual::where('avaliacao_id', $avaliacao->id)->where('solicitacao_id', $solicitacao->id)->first();
            $avaliacaoResponsavel = AvaliacaoIndividual::where('avaliacao_id', $avaliacao->id)->where('responsavel_id', $solicitacao->responsavel->id)->first();
            $avaliacaoColaborador = AvaliacaoIndividual::where('avaliacao_id', $avaliacao->id)->where('tipo', 2)->first();

                return view('solicitacao.solicitante.solicitacao', ['tipo' => 0,
                'id' => $solicitacao->id,
                'status' => $solicitacao->avaliacao_individual->status, 'solicitacao',
                'instituicaos', 'grandeAreas', 'areas', 'subAreas', 'avaliacaoDadosComp', 'avaliacaoDadosini', 'avaliacaoResponsavel', 'avaliacaoColaborador', 'avaliacao']);
        }

        return view('solicitacao.solicitante.solicitacao', compact('solicitacao', 'instituicaos', 'grandeAreas', 'areas', 'subAreas'));

    }

    public function create_responsavel($solicitacao_id)
    {
        $solicitacao = Solicitacao::find($solicitacao_id);
        $instituicaos = Instituicao::orderByRaw("nome = 'Universidade Federal do Agreste de Pernambuco (UFAPE)' DESC, nome ASC")->get();


        if($solicitacao->status == 'avaliado' &&
            $solicitacao->avaliacao->first()->status == 'aprovadaPendencia'){

                return view('solicitacao.solicitante.responsavel', ['tipo' => 1,
                'id' => $solicitacao->responsavel->id,
                'status' => $solicitacao->responsavel->avaliacao_individual->status,]);
        }

        return view('solicitacao.solicitante.responsavel', compact('solicitacao', 'instituicaos'));
    }

    public function create_colaborador($solicitacao_id){
        $solicitacao = Solicitacao::find($solicitacao_id);
        $instituicaos = Instituicao::orderByRaw("nome = 'Universidade Federal do Agreste de Pernambuco (UFAPE)' DESC, nome ASC")->get();


        if($solicitacao->status == 'avaliado' &&
        $solicitacao->avaliacao->first()->status == 'aprovadaPendencia'){
            return view('solicitacao.colaborador.form_solicitante', [  'solicitacao' => $solicitacao,
            'status' => $solicitacao->avaliacao->first()->avaliacao_individual->where('tipo', 2)->first()->status,
            'tipo' => 2,
            'id' => -1,]);
        }

        return view('solicitacao.colaborador.form_solicitante', compact('solicitacao', 'instituicaos'));

    }

    public function create_complementares($solicitacao_id){
        $solicitacao = Solicitacao::find($solicitacao_id);

        if( $solicitacao->status == 'avaliado' &&
        $solicitacao->avaliacao->first()->status == 'aprovadaPendencia'){
            return view('solicitacao.solicitante.solicitacao_fim', [ 'tipo' => 3,
            'id' => $solicitacao->dadosComplementares->id,
            'status' => $solicitacao->dadosComplementares->avaliacao_individual->status,]);
        }
        return view('solicitacao.solicitante.solicitacao_fim', compact('solicitacao'));
    }

    public function create_modelo_animal($solicitacao_id){
        $solicitacao = Solicitacao::find($solicitacao_id);

        return view('solicitacao.solicitante.modelo_animal', compact('solicitacao'));
    }

    public function create_planejamento_modelo_animal(){
        return view('solicitacao.planejamento.solicitante.modelo_animal_solicitante');
    }

    public function create_planejamento($solicitacao_id){
        $solicitacao = Solicitacao::find($solicitacao_id);

        if($solicitacao->status == 'avaliado' && $solicitacao->avaliacao->first()->status == 'aprovadaPendencia'){
            return view('solicitacao.planejamento.solicitante.planejamento',['tipo'=>5,'id'=>$planejamento->id,'status'=>$avaliacaoPlanejamento->status]);

        }
        return view('solicitacao.planejamento.solicitante.planejamento');

    }

    public function create_planejamento_condicao_animal($solicitacao_id){
        $solicitacao = Solicitacao::find($solicitacao_id);
        if($solicitacao->status == 'avaliado' && $solicitacao->avaliacao->first()->status == 'aprovadaPendencia'){
            return view('solicitacao.planejamento.solicitante.condicoes_animais',['tipo'=>6,'id'=>$condicoes_animal->id,'status'=>$avaliacaoCondicoesAnimal->status]);

        }
        return view('solicitacao.planejamento.solicitante.condicoes_animais');
    }

    public function create_planejamento_procedimento($solicitacao_id){
        $solicitacao = Solicitacao::find($solicitacao_id);

        if($solicitacao->status == 'avaliado' && $solicitacao->avaliacao->first()->status == 'aprovadaPendencia'){
            return view('solicitacao.planejamento.solicitante.procedimento',['tipo'=>7,'id'=>$procedimento->id,'status'=>$avaliacaoProcedimento->status]);
        }
        return view('solicitacao.planejamento.solicitante.procedimento',['tipo'=>7]);
    }

    public function create_planejamento_operacao($solicitacao_id){
        $solicitacao = Solicitacao::find($solicitacao_id);

        if($solicitacao->status == 'avaliado' && $solicitacao->avaliacao->first()->status == 'aprovadaPendencia'){
            return view('solicitacao.planejamento.solicitante.operacao',['tipo'=>8,'id'=>$operacao->id,'status'=>$avaliacaoOperacao->status]);

        }

        return view('solicitacao.planejamento.solicitante.operacao');
    }
    public function create_planejamento_finalizacao($solicitacao_id){
        $solicitacao = Solicitacao::find($solicitacao_id);

        if($solicitacao->status == 'avaliado' && $solicitacao->avaliacao->first()->status == 'aprovadaPendencia'){
            return view('solicitacao.planejamento.solicitante.eutanasia',['tipo'=>9,'id'=>$eutanasia->id,'status'=>$avaliacaoEutanasia->status]);

        }
        return view('solicitacao.planejamento.solicitante.eutanasia');
    }
    public function create_plamenento_resultado($solicitacao_id){
        $solicitacao = Solicitacao::find($solicitacao_id);

        if($solicitacao->status == 'avaliado' && $solicitacao->avaliacao->first()->status == 'aprovadaPendencia'){
            return view('solicitacao.planejamento.solicitante.resultado',['tipo'=>10,'id'=>$resultado->id,'status'=>$avaliacaoResultado->status]);
        }

        return view('solicitacao.planejamento.solicitante.resultado');
    }

    public function index_planejamento($modelo_animal_id)
    {
        $modelo_animal = ModeloAnimal::find($modelo_animal_id);
        $planejamento = Planejamento::where('modelo_animal_id', $modelo_animal_id)->first();
        $solicitacao = Solicitacao::find($modelo_animal->solicitacao_id);

        //Componentes que requerem ter Planejamento
        if ($planejamento != null) {
            $condicoes_animal = CondicoesAnimal::where('planejamento_id', $planejamento->id)->first();
            $procedimento = Procedimento::where('planejamento_id', $planejamento->id)->first();
            $operacao = Operacao::where('planejamento_id', $planejamento->id)->first();
            $eutanasia = Eutanasia::where('planejamento_id', $planejamento->id)->first();
            $resultado = Resultado::where('planejamento_id', $planejamento->id)->first();
        } else {
            $condicoes_animal = null;
            $procedimento = null;
            $operacao = null;
            $eutanasia = null;
            $resultado = null;
        }

        if (Auth::user()->hasRole('Solicitante') && $solicitacao->status == 'avaliado' && $solicitacao->avaliacao->first()->status == 'aprovadaPendencia') {
            $avaliacao = Avaliacao::where('solicitacao_id', $solicitacao->id)->where('user_id', $solicitacao->avaliacao->first()->user_id)->first();
            // Avaliações Individuais
            $avaliacaoPlanejamento = AvaliacaoIndividual::where('avaliacao_id', $avaliacao->id)->where('planejamento_id', $planejamento->id)->first();
            $avaliacaoCondicoesAnimal = AvaliacaoIndividual::where('avaliacao_id', $avaliacao->id)->where('condicoes_animal_id', $condicoes_animal->id)->first();
            $avaliacaoProcedimento = AvaliacaoIndividual::where('avaliacao_id', $avaliacao->id)->where('procedimento_id', $procedimento->id)->first();
            $avaliacaoOperacao = AvaliacaoIndividual::where('avaliacao_id', $avaliacao->id)->where('operacao_id', $operacao->id)->first();
            $avaliacaoEutanasia = AvaliacaoIndividual::where('avaliacao_id', $avaliacao->id)->where('eutanasia_id', $eutanasia->id)->first();
            $avaliacaoResultado = AvaliacaoIndividual::where('avaliacao_id', $avaliacao->id)->where('resultado_id', $resultado->id)->first();
            $avaliacaoModeloAnimal = AvaliacaoIndividual::where('avaliacao_id', $avaliacao->id)->where('modelo_animal_id', $modelo_animal->id)->first();

            return view('solicitacao.planejamento.solicitante.index',
                compact('modelo_animal', 'planejamento', 'solicitacao', 'condicoes_animal', 'procedimento', 'operacao', 'eutanasia', 'resultado', 'avaliacao',
                    'avaliacaoPlanejamento', 'avaliacaoCondicoesAnimal', 'avaliacaoProcedimento', 'avaliacaoOperacao',
                    'avaliacaoEutanasia', 'avaliacaoResultado', 'avaliacaoModeloAnimal'));
        }

        return view('solicitacao.planejamento.solicitante.index',
            compact('modelo_animal', 'planejamento', 'solicitacao', 'condicoes_animal', 'procedimento', 'operacao', 'eutanasia', 'resultado'));
    }

    public function avaliarSolicitacao($solicitacao_id)
    {
        $solicitacao = Solicitacao::find($solicitacao_id);
        $instituicaos = Instituicao::all();
        $grandeAreas = GrandeArea::all();
        $areas = Area::all();
        $subAreas = SubArea::all();

        $disabled = true;
        $responsavel = $solicitacao->responsavel;
        $colaboradores = $solicitacao->responsavel->colaboradores;
        $modelo_animais = $solicitacao->modeloAnimal;
        $solicitacao->avaliador_atual_id = Auth::user()->id;
        $solicitacao->update();
        $avaliacao = Avaliacao::where('solicitacao_id', $solicitacao_id)->where('user_id', $solicitacao->avaliacao->first()->user_id)->first();

        $avaliacaoDadosComp = AvaliacaoIndividual::where('avaliacao_id', $avaliacao->id)->where('dados_complementares_id', $solicitacao->dadosComplementares->id)->first();
        $avaliacaoDadosini = AvaliacaoIndividual::where('avaliacao_id', $avaliacao->id)->where('solicitacao_id', $solicitacao->id)->first();
        $avaliacaoResponsavel = AvaliacaoIndividual::where('avaliacao_id', $avaliacao->id)->where('responsavel_id', $responsavel->id)->first();
        $avaliacaoColaborador = AvaliacaoIndividual::where('avaliacao_id', $avaliacao->id)->where('tipo', 2)->first();

        if ($avaliacao->status == 'nao_realizado' ||
            ($avaliacao->solicitacao->status == "nao_avaliado" && $avaliacao->status == "aprovadaPendencia")) {
            $avaliado = 'false';
        } else {
            $avaliado = 'true';
        }
        return view('solicitacao.avaliador.index_avaliador', compact('disabled', 'solicitacao', 'grandeAreas', 'areas', 'subAreas',
            'instituicaos', 'responsavel', 'colaboradores', 'modelo_animais', 'avaliacao',
            'avaliacaoDadosComp', 'avaliacaoDadosini', 'avaliacaoResponsavel', 'avaliacaoColaborador', 'avaliado'));

    }

    public function index_solicitante()
    {
        $solicitante = Auth::user();
        $solicitacoes = Solicitacao::where('user_id', $solicitante->id)->orderByDesc("created_at")->get();
        return view('solicitante.minhas_solicitacoes', compact('solicitacoes'));
    }

    public function index_avaliador()
    {
        $avaliacoes = Avaliacao::where('user_id', Auth::user()->id)->get();
        $horario = Carbon::now('UTC')->toDateTime();
        return view('avaliador.minhas_avaliacoes', compact('avaliacoes', 'horario'));
    }

    public function inicio(Request $request)//apagar depois
    {
        $solicitacao = new Solicitacao();
        $solicitacao->tipo = $request->tipo;
        $solicitacao->user_id = Auth::user()->id;


        $solicitacao->save();

        return redirect(route('solicitacao.index', ['solicitacao_id' => $solicitacao->id, 'solicitacao_user_id' => $solicitacao->user_id]));
    }


    public function criar(CriarSolicitacaoRequest $request)
    {
        $solicitacao = Solicitacao::find($request->solicitacao_id);
        $solicitacao->titulo_pt = $request->titulo_pt;
        $solicitacao->titulo_en = $request->titulo_en;
        $solicitacao->inicio = $request->inicio;
        $solicitacao->fim = $request->fim;
        $solicitacao->grande_area_id = $request->grandeArea;
        $solicitacao->area_id = $request->area;
        $solicitacao->sub_area_id = $request->subArea;
        $solicitacao->update();

        return response()->json([
            'message' => 'success',
            'campo' => 'Dados iniciais'
        ]);
    }

    public function criar_responsavel(CriarResponsavelRequest $request)
    {

        $solicitacao = Solicitacao::find($request->solicitacao_id);

        if (isset($solicitacao->responsavel)) {
            $responsavel = $solicitacao->responsavel;
        } else {
            $responsavel = new Responsavel();
        }
        if (($request->hasFile('experiencia_previa') && $request->file('experiencia_previa')->isValid())) {
            $anexo = $request->experiencia_previa->extension();
            $nomeAnexo = "experiencia_" . $solicitacao->id . date('Ymd') . date('His') . '.' . $anexo;
            if ($responsavel->experiencia_revia != null) {
                $nomeAnexo = $responsavel->experiencia_previa;
            }
            $request->experiencia_previa->storeAs('experiencias/', $nomeAnexo);
            $request->experiencia_previa = $nomeAnexo;
        }

        if (($request->hasFile('termo_responsabilidade') && $request->file('termo_responsabilidade')->isValid())) {
            $anexo = $request->termo_responsabilidade->extension();
            $nomeAnexo = "termo_responsabilidade_" . $solicitacao->id . date('Ymd') . date('His') . '.' . $anexo;
            if ($responsavel->termo_responsabilidade != null) {
                $nomeAnexo = $responsavel->termo_responsabilidade;
            }
            $request->termo_responsabilidade->storeAs('termos_responsabilidades/', $nomeAnexo);
            $request->termo_responsabilidade = $nomeAnexo;
        }

        if (($request->hasFile('treinamento_file') && $request->file('treinamento_file')->isValid())) {
            $anexo = $request->treinamento_file->extension();
            $nomeAnexo = "treinamento_file_" . $solicitacao->id . date('Ymd') . date('His') . '.' . $anexo;
            if ($responsavel->treinamento_file != null) {
                $nomeAnexo = $responsavel->treinamento_file;
            }
            $request->treinamento_file->storeAs('treinamento/', $nomeAnexo);
            $request->treinamento_file = $nomeAnexo;
        }

        $responsavel->solicitacao_id = $request->solicitacao_id;
        $responsavel->nome = $request->nome;
        $responsavel->cpf = $request->cpf;
        $responsavel->departamento_id = $request->departamento_id;
        if ($request->experiencia_previa == null && $responsavel->experiencia_previa != null)
            $request->experiencia_previa = $responsavel->experiencia_previa;
        if ($request->experiencia_previa_radio == "false")
            $request->experiencia_previa = null;
        $responsavel->experiencia_previa = $request->experiencia_previa;
        $responsavel->vinculo_instituicao = $request->vinculo_instituicao;
        $responsavel->grau_escolaridade = $request->grau_escolaridade;
        if ($request->treinamento == null && $responsavel->treinamento != null)
            $request->treinamento = $responsavel->treinamento;
        if ($request->treinamento_radio == "false")
            $request->treinamento = null;
        $responsavel->treinamento = $request->treinamento;
        if ($request->termo_responsabilidade == null && $responsavel->termo_responsabilidade != null)
            $request->termo_responsabilidade = $responsavel->termo_responsabilidade;
        if ($request->termo_responsabilidade_radio == "false")
            $request->termo_responsabilidade = null;
        $responsavel->termo_responsabilidade = $request->termo_responsabilidade;

        if ($request->treinamento_file == null && $responsavel->treinamento_file != null)
            $request->treinamento_file = $responsavel->treinamento_file;
        if ($request->treinamento_radio == "false")
            $request->treinamento_file = null;
        $responsavel->treinamento_file = $request->treinamento_file;

        if (isset($solicitacao->responsavel)) {
            $responsavel->update();
        } else {
            $responsavel->save();
        }

        if (isset($responsavel->contato)) {
            $contato = $responsavel->contato;
        } else {
            $contato = new Contato();
        }

        $contato->email = $request->email;
        $contato->telefone = $request->telefone;
        $contato->responsavel_id = $responsavel->id;

        if (isset($responsavel->contato)) {
            $contato->update();
        } else {
            $contato->save();
        }
        return response()->json([
            'message' => 'success',
            'campo' => 'Responsavel',
            'exist' => 'true'
        ]);
    }

    public function criar_colaborador(CriarColaboradorRequest $request)
    {
        $data = [
            'nome' => $request->colab_nome,
            'cpf' => $request->colab_cpf,
            'treinamento' => $request->colab_treinamento,
            'grau_escolaridade' => $request->colab_grau_escolaridade,
            'instituicao_id' => $request->colab_instituicao_id,
        ];


        $responsavel = Solicitacao::find($request->solicitacao_id)->responsavel;
        if (isset($responsavel)) {
            $data['responsavel_id'] = $responsavel->id;

            $data = array_merge($data, $this->salvarArquivosColaborador($request));

            $colaborador = Colaborador::create($data);

            $contato = new Contato();

            $contato->email = $request->colab_email;
            $contato->telefone = $request->colab_telefone;
            $contato->colaborador_id = $colaborador->id;
            $contato->save();

            return redirect()->back()->with('success');
        }
        return redirect()->back();
    }

    private function salvarArquivosColaborador($request, $nomes = null)
    {
        $nomeAnexos = [];

        if (($request->hasFile('colab_experiencia_previa') && $request->file('colab_experiencia_previa')->isValid())) {
            $extensao = $request->colab_experiencia_previa->extension();
            $nomeAnexoExperiencia = "experiencia_" . $request->solicitacao_id . date('Ymd') . date('His') . '.' . $extensao;
            $request->colab_experiencia_previa->storeAs('colaborador/experiencias/', $nomes['experiencia_previa'] ?? $nomeAnexoExperiencia);
            $nomeAnexos['experiencia_previa'] = $nomeAnexoExperiencia;
        }

        if (($request->hasFile('colab_treinamento_file') && $request->file('colab_treinamento_file')->isValid())) {
            $extensao = $request->colab_treinamento_file->extension();
            $nomeAnexoTermo = "treinamento_file_" . $request->solicitacao_id . date('Ymd') . date('His') . '.' . $extensao;
            $request->colab_treinamento_file->storeAs('colaborador/treinamentos/', $nomes['treinamento_file'] ?? $nomeAnexoTermo);
            $nomeAnexos['treinamento_file'] = $nomeAnexoTermo;
        }

        return $nomeAnexos;
    }

    public function editar_colaborador(UpdateColaboradorRequest $request)
    {
        $data = [
            'nome' => $request->colab_nome,
            'cpf' => $request->colab_cpf,
            'treinamento' => $request->colab_treinamento,
            'grau_escolaridade' => $request->colab_grau_escolaridade,
            'instituicao_id' => $request->colab_instituicao_id,
            'email' => $request->colab_email,
            'telefone' => $request->colab_telefone,
        ];

        $colaborador = Colaborador::find($request->colaborador_id);

        if($request->input('opcao_experiencia_previa') == 'false'){

            $this->deletar_documento($colaborador->experiencia_previa, 'colaborador/experiencias/');
            $colaborador->experiencia_previa = null;
        }

        if($request->input('colab_treinamento_radio') == 'false'){
            $this->deletar_documento($colaborador->treinamento_file, 'colaborador/treinamentos/');
            $colaborador->treinamento_file = null;

        }

        $nomes = [
            'experiencia_previa' => $colaborador->colab_experiencia_previa ?? null,
            'treinamento_file' => $colaborador->colab_treinamento_file ?? null,
        ];

        $data = array_merge($data, $this->salvarArquivosColaborador($request, $nomes));

        $colaborador->update($data);
        $colaborador->contato->update($data);

        return redirect()->back();

    }

    public function deletar_documento($arquivo, $caminho){
        if (!empty($arquivo)) {
            $diretorioArquivo = $caminho . $arquivo;
            $caminhoCompleto = Storage::path($diretorioArquivo);
            if (file_exists($caminhoCompleto)) {
                Storage::delete($diretorioArquivo);
            }
        }
    }

    public function deletar_colaborador($id)
    {
        $colaborador = Colaborador::find($id);

        if (!$colaborador) {
            return redirect()->back()->with('fail', 'Colaborador não encontrado.');
        }

        $caminhos = [
            'colaborador/experiencias/',
            'colaborador/treinamentos/'
        ];

        $arquivos = [
            $colaborador->experiencia_previa,
            $colaborador->treinamento_file,
        ];

        foreach ($arquivos as $index => $arquivo) {
            if (!empty($arquivo)) {
                $diretorioArquivo = $caminhos[$index] . $arquivo;
                $caminhoCompleto = Storage::path($diretorioArquivo);
                if (file_exists($caminhoCompleto)) {
                    Storage::delete($diretorioArquivo);
                }
            }
        }

        $colaborador->delete();

       return redirect()->back();
    }

    public function criar_solicitacao_fim(CriarSolicitacaoFimRequest $request)
    {

        $solicitacao = Solicitacao::find($request->solicitacao_id);

        if (isset($solicitacao->dadosComplementares)) {
            $solicitacao->dadosComplementares->update($request->all());
        } else {
            DadosComplementares::create($request->all());
        }

        $solicitacao->update();
        return response()->json([
            'message' => 'success',
            'campo' => 'Dados complementares'
        ]);
    }

    public function criar_modelo_animal(CriarModeloAnimalRequest $request)
    {
        $data = $request->all();

        if (($request->hasFile('termo_consentimento') && $request->file('termo_consentimento')->isValid())) {
            $extensao = $request->termo_consentimento->extension();
            $nomeAnexo = "tcle_" . $request->solicitacao_id . date('Ymd') . date('His') . '.' . $extensao;
            $request->termo_consentimento->storeAs('termos/', $nomeAnexo);
            $data['termo_consentimento'] = $nomeAnexo;
        }

        if (($request->hasFile('licencas_previas') && $request->file('licencas_previas')->isValid())) {
            $extensao = $request->licencas_previas->extension();
            $nomeAnexo = "licencas_previas" . $request->solicitacao_id . date('Ymd') . date('His') . '.' . $extensao;
            $request->licencas_previas->storeAs('licencas_previas/', $nomeAnexo);
            $data['licencas_previas'] = $nomeAnexo;
        }

        $modelo_animal = ModeloAnimal::create($data);


        $perfil = new Perfil();
        $perfil->grupo_animal = $request->grupo_animal;
        $perfil->linhagem = $request->linhagem;
        $perfil->idade = $request->idade;
        $perfil->periodo = $request->periodo;
        $perfil->tipo_grupo_animal = $request->tipo_grupo_animal;
        $perfil->peso = $request->peso;
        $perfil->quantidade = $request->quantidade;
        $perfil->machos = $request->machos;
        $perfil->femeas = $request->femeas;
        $perfil->total = $request->quantidade;
        $perfil->modelo_animal_id = $modelo_animal->id;
        $perfil->observacao = $request->observacao;
        $perfil->save();

        return redirect()->back()->with('success','Modelo animal criado com sucesso');
    }

    public function atualizar_modelo_animal(Request $request, $id)
    {
        $modelo_animal = ModeloAnimal::find($id);
        $data = $request->all();

        if (($request->hasFile('termo_consentimento') && $request->file('termo_consentimento')->isValid())) {
            $extensao = $request->termo_consentimento->extension();
            $nomeAnexo = "tcle_" . $request->solicitacao_id . date('Ymd') . date('His') . '.' . $extensao;
            $request->termo_consentimento->storeAs('termos/', $modelo_animal->termo_consentimento ?? $nomeAnexo);
            $data['termo_consentimento'] = $nomeAnexo;
        }

        if (($request->hasFile('licencas_previas') && $request->file('licencas_previas')->isValid())) {
            $extensao = $request->licencas_previas->extension();
            $nomeAnexo = "licencas_previas" . $request->solicitacao_id . date('Ymd') . date('His') . '.' . $extensao;
            $request->licencas_previas->storeAs('licencas_previas/', $modelo_animal->licencas_previas ?? $nomeAnexo);
            $data['licencas_previas'] = $nomeAnexo;
        }

        unset($data['termo_consentimento']);
        if ($modelo_animal->licencas_previas != null)
            unset($data['licencas_previas']);


        $modelo_animal->update($data);


        $perfil = $modelo_animal->perfil;
        $perfil->grupo_animal = $request->grupo_animal;
        $perfil->linhagem = $request->linhagem;
        $perfil->idade = $request->idade;
        $perfil->tipo_grupo_animal = $request->tipo_grupo_animal;
        $perfil->peso = $request->peso;
        $perfil->quantidade = $request->quantidade;
        $perfil->machos = $request->machos;
        $perfil->femeas = $request->femeas;
        $perfil->total = $request->quantidade;
        $perfil->modelo_animal_id = $modelo_animal->id;
        $perfil->observacao = $request->observacao;
        $perfil->update();

        return redirect()->back()->with('success', 'Modelo animal atualizado com sucesso.');
    }

    public function deletar_modelo_animal($id)
    {
        ModeloAnimal::find($id)->delete();
        return redirect()->back()->with('success', 'Modelo de animal excluído com sucesso.');

    }

    public function atualizar_modelo_animal_tabela($solicitacao_id)
    {
        $solicitacao = Solicitacao::find($solicitacao_id);
        $modelosAnimais = ModeloAnimal::where('solicitacao_id', $solicitacao_id)->get();

        $tabela_modelo_animal = view('solicitacao.solicitante.modelo_animal_tabela', ['solicitacao' => $solicitacao, 'modelosAnimais' => $modelosAnimais])->render();

        return response()->json(['html' => $tabela_modelo_animal]);

    }
    public function atualizar_modelo_animal_tabela_adm($solicitacao_id)
    {
        $solicitacao = Solicitacao::find($solicitacao_id);
        $modelosAnimais = ModeloAnimal::where('solicitacao_id', $solicitacao_id)->get();

        $tabela_modelo_animal = view('solicitacao.modelo_animal_tabela_adm', ['solicitacao' => $solicitacao, 'modelosAnimais' => $modelosAnimais])->render();

        return response()->json(['html' => $tabela_modelo_animal]);

    }
    public function atualizar_modelo_animal_tabela_avaliador($solicitacao_id)
    {
        $solicitacao = Solicitacao::find($solicitacao_id);
        $modelosAnimais = ModeloAnimal::where('solicitacao_id', $solicitacao_id)->get();

        $tabela_modelo_animal = view('solicitacao.modelo_animal_tabela_avaliador', ['solicitacao' => $solicitacao, 'modelosAnimais' => $modelosAnimais])->render();

        return response()->json(['html' => $tabela_modelo_animal]);

    }

    public function criar_perfil(Request $request)
    {
        $solicitacao = Solicitacao::find($request->solicitacao_id);
        $modelo_animal = ModeloAnimal::where('solicitacao_id', $solicitacao->id)->first();

        if (isset($modelo_animal->perfil)) {
            $perfil = $modelo_animal->perfil;
        } else {
            $perfil = new Perfil();
        }

        $perfil->grupo_animal = $request->grupo_animal;
        $perfil->linhagem = $request->linhagem;
        $perfil->idade = $request->idade;
        $perfil->periodo = $request->periodo;
        $perfil->peso = $request->peso;
        $perfil->machos = $request->machos;
        $perfil->femeas = $request->femeas;
        $perfil->quantidade = $request->quantidade;
        $perfil->modelo_animal_id = $modelo_animal->id;
        $perfil->total = $request->quantidade; //Verificar depois com o pessoal da CEUA

        if (isset($modelo_animal->perfil)) {
            $perfil->update();
        } else {
            $perfil->save();
        }

        $solicitacao->update();

        return redirect(route('solicitacao.form', ['solicitacao_id' => $request->solicitacao_id]));
    }

    private function verifyPath($path)
    {
        $validPath = Storage::exists($path);
        if (!$validPath){
            return abort(404);
        }
    }

    public function downloadExperienciaPreviaColaborador($colaborador_id)
    {
        $colaborador = Colaborador::find($colaborador_id);
        $path = 'colaborador/experiencias/' . $colaborador->experiencia_previa;
        $this->verifyPath($path);
        return Storage::download($path);
    }

    public function downloadTreinamento_fileColaborador($colaborador_id){
        $colaborador = Colaborador::find($colaborador_id);
        $path = 'colaborador/treinamentos/' . $colaborador->treinamento_file;
        $this->verifyPath($path);
        return Storage::download($path);
    }


    public function downloadTermoResponsabilidadeColaborador($colaborador_id)
    {
        $colaborador = Colaborador::find($colaborador_id);
        $path = 'colaborador/termo_responsabilidade/' . $colaborador->termo_responsabilidade;
        $this->verifyPath($path);
        return Storage::download($path);
    }

    public function downloadTreinamento_fileResponsavel($responsavel_id){
        $responsavel = Responsavel::find($responsavel_id);
        $path = 'treinamento/' . $responsavel->treinamento_file;
        $this->verifyPath($path);
        return Storage::download($path);
    }

    public function downloadAnexoAmostraPlanejamento($planejamento_id)
    {
        $planejamento = Planejamento::find($planejamento_id);
        $path = 'anexo_amostra_planejamento/' . $planejamento->anexo_amostra_planejamento;
        $this->verifyPath($path);
        return Storage::download($path);
    }

    public function downloadLicencasPrevias($modelo_animal_id)
    {
        $modelo_animal = ModeloAnimal::find($modelo_animal_id);
        $path = 'licencas_previas/' . $modelo_animal->licencas_previas;
        $this->verifyPath($path);
        return Storage::download($path);
    }

    public function downloadTermoResponsabilidade($responsavel_id)
    {
        $responsavel = Responsavel::find($responsavel_id);
        $path = 'termos_responsabilidades/' . $responsavel->termo_responsabilidade;
        $this->verifyPath($path);
        return Storage::download($path);
    }

    public function downloadFormula($planejamento_id)
    {
        $planejamento = Planejamento::find($planejamento_id);
        $path = 'formulas/' . $planejamento->anexo_formula;
        $this->verifyPath($path);
        return Storage::download($path);
    }

    public function downloadTermo($modelo_animal_id)
    {
        $modelo_animal = ModeloAnimal::find($modelo_animal_id);
        $path = 'termos/' . $modelo_animal->termo_consentimento;
        $this->verifyPath($path);
        return Storage::download($path);
    }

    public function downloadExperiencia($responsavel_id)
    {
        $responsavel = Responsavel::find($responsavel_id);
        $path = 'experiencias/' . $responsavel->experiencia_previa;
        $this->verifyPath($path);
        return Storage::download($path);
    }

    public function DeclaracaoIsencao_download()
    {
        $file = public_path('assets/DECLARAÇÃO-DE-NÃO-NECESSIDADE-DE-LICENÇAS.pdf');
        return response()->download($file, 'DECLARAÇÃO DE NÃO NECESSIDADE DE LICENÇAS.pdf');
    }

    public function ModeloTermoResponsabilidade_download()
    {
        $file = public_path('assets/TERMO-DE-RESPONSABILIDADE.pdf');
        return response()->download($file, 'Modelo de Termo de Responsabilidade.pdf');
    }

    public function DeclaracaoConsentimento_download()
    {
        $file = public_path('assets/TERMO-CONSENTIMENTO-LIVRE-ESCLARECIDO(TCLE).pdf');
        return response()->download($file, 'TERMO CONSENTIMENTO LIVRE ESCLARECIDO(TCLE).pdf');
    }

    public function termoExperienciaPreviaDownload(){
        $file = public_path('/assets/TERMO-DE-EXPERIENCIA-PREVIA.pdf');
        return response()->download($file, 'Termo de Experiência Prévia.pdf');
    }




    public function index_planejamento_adm($modelo_animal_id)
    {
        $modelo_animal = ModeloAnimal::find($modelo_animal_id);
        $planejamento = Planejamento::where('modelo_animal_id', $modelo_animal_id)->first();
        $solicitacao = Solicitacao::find($modelo_animal->solicitacao_id);

        //Componentes que requerem ter Planejamento
        if ($planejamento != null) {
            $condicoes_animal = CondicoesAnimal::where('planejamento_id', $planejamento->id)->first();
            $procedimento = Procedimento::where('planejamento_id', $planejamento->id)->first();
            $operacao = Operacao::where('planejamento_id', $planejamento->id)->first();
            $eutanasia = Eutanasia::where('planejamento_id', $planejamento->id)->first();
            $resultado = Resultado::where('planejamento_id', $planejamento->id)->first();
        } else {
            $condicoes_animal = null;
            $procedimento = null;
            $operacao = null;
            $eutanasia = null;
            $resultado = null;
        }

        return view('planejamento.administrador.index_adm',
            compact('modelo_animal', 'planejamento', 'solicitacao', 'condicoes_animal', 'procedimento', 'operacao', 'eutanasia', 'resultado'));
    }

    public function avaliarPlanejamento($modelo_animal_id)
    {
        $modelo_animal = ModeloAnimal::find($modelo_animal_id);
        $planejamento = Planejamento::where('modelo_animal_id', $modelo_animal_id)->first();
        $solicitacao = Solicitacao::find($modelo_animal->solicitacao_id);


        $condicoes_animal = CondicoesAnimal::where('planejamento_id', $planejamento->id)->first();
        $procedimento = Procedimento::where('planejamento_id', $planejamento->id)->first();
        $operacao = Operacao::where('planejamento_id', $planejamento->id)->first();
        $eutanasia = Eutanasia::where('planejamento_id', $planejamento->id)->first();
        $resultado = Resultado::where('planejamento_id', $planejamento->id)->first();

        $avaliacao = Avaliacao::where('solicitacao_id', $solicitacao->id)->where('user_id', Auth::user()->id)->first();
        // Avaliações Individuais
        $avaliacaoPlanejamento = AvaliacaoIndividual::where('avaliacao_id', $avaliacao->id)->where('planejamento_id', $planejamento->id)->first();
        $avaliacaoCondicoesAnimal = AvaliacaoIndividual::where('avaliacao_id', $avaliacao->id)->where('condicoes_animal_id', $condicoes_animal->id)->first();
        $avaliacaoProcedimento = AvaliacaoIndividual::where('avaliacao_id', $avaliacao->id)->where('procedimento_id', $procedimento->id)->first();
        $avaliacaoOperacao = AvaliacaoIndividual::where('avaliacao_id', $avaliacao->id)->where('operacao_id', $operacao->id)->first();
        $avaliacaoEutanasia = AvaliacaoIndividual::where('avaliacao_id', $avaliacao->id)->where('eutanasia_id', $eutanasia->id)->first();
        $avaliacaoResultado = AvaliacaoIndividual::where('avaliacao_id', $avaliacao->id)->where('resultado_id', $resultado->id)->first();
        $avaliacaoModeloAnimal = AvaliacaoIndividual::where('avaliacao_id', $avaliacao->id)->where('modelo_animal_id', $modelo_animal->id)->first();

        if ($avaliacao->status == 'nao_realizado' ||
            ($avaliacao->solicitacao->status == "nao_avaliado" && $avaliacao->status == "aprovadaPendencia")) {
            $avaliado = 'false';
        } else {
            $avaliado = 'true';
        }
        return view('planejamento.avaliador.index_avaliador',
            compact('modelo_animal', 'planejamento', 'solicitacao', 'condicoes_animal', 'procedimento', 'operacao', 'eutanasia', 'resultado', 'avaliacao',
                'avaliacaoPlanejamento', 'avaliacaoCondicoesAnimal', 'avaliacaoProcedimento', 'avaliacaoOperacao',
                'avaliacaoEutanasia', 'avaliacaoResultado', 'avaliacaoModeloAnimal', 'avaliado'));
    }

    public function criar_planejamento(CriarPlanejamentoRequest $request)
    {
        $request->validated();
        $modelo_animal = ModeloAnimal::find($request->modelo_animal_id);
        if (isset($modelo_animal->planejamento)) {
            $planejamento = $modelo_animal->planejamento;

            if (($request->hasFile('anexo_formula') && $request->file('anexo_formula')->isValid())) {
                if ($planejamento->anexo_formula != null) {
                    $nomeAnexo = $planejamento->anexo_formula;
                } else {
                    $anexo = $request->anexo_formula->extension();
                    $nomeAnexo = "formula_" . date('Ymd') . date('His') . '.' . $anexo;
                }
                $planejamento->anexo_formula = $nomeAnexo;
                $request->anexo_formula->storeAs('formulas/', $nomeAnexo);
            }

            if (($request->hasFile('anexo_amostra_planejamento') && $request->file('anexo_amostra_planejamento')->isValid())) {
                if ($planejamento->anexo_amostra_planejamento != null) {
                    $nomeAnexo = $planejamento->anexo_amostra_planejamento;
                } else {
                    $anexo = $request->anexo_amostra_planejamento->extension();
                    $nomeAnexo = "anexo_amostra_planejamento_" . date('Ymd') . date('His') . '.' . $anexo;
                }
                $planejamento->anexo_amostra_planejamento = $nomeAnexo;
                $request->anexo_amostra_planejamento->storeAs('anexo_amostra_planejamento/', $nomeAnexo);
            }

        } else {
            $planejamento = new Planejamento();

            if (($request->hasFile('anexo_formula') && $request->file('anexo_formula')->isValid())) {

                $anexo = $request->anexo_formula->extension();
                $nomeAnexo = "formula_" . date('Ymd') . date('His') . '.' . $anexo;
                $planejamento->anexo_formula = $nomeAnexo;
                $request->anexo_formula->storeAs('formulas/', $nomeAnexo);
                $request->anexo_formula = $nomeAnexo;
            }

            if (($request->hasFile('anexo_amostra_planejamento') && $request->file('anexo_amostra_planejamento')->isValid())) {

                $anexo = $request->anexo_amostra_planejamento->extension();
                $nomeAnexo = "anexo_amostra_planejamento_" . date('Ymd') . date('His') . '.' . $anexo;
                $planejamento->anexo_amostra_planejamento = $nomeAnexo;
                $request->anexo_amostra_planejamento->storeAs('anexo_amostra_planejamento/', $nomeAnexo);
                $request->anexo_amostra_planejamento = $nomeAnexo;
            }
        }


        if (isset($modelo_animal->planejamento)) {
            $planejamento = $modelo_animal->planejamento;
        } else {
            $planejamento = new Planejamento();
        }
        $planejamento->modelo_animal_id = $modelo_animal->id;
        $planejamento->num_animais_grupo = $request->num_animais_grupo;
        $planejamento->especificar_grupo = $request->especificar_grupo;
        $planejamento->criterios = $request->criterios;
        $planejamento->desc_materiais_metodos = $request->desc_materiais_metodos;
        $planejamento->analise_estatistica = $request->analise_estatistica;
        $planejamento->outras_infos = $request->outras_infos;
        $planejamento->grau_invasividade = $request->grau_invasividade;

        if (isset($modelo_animal->planejamento)) {
            $planejamento->update();
        } else {
            $planejamento->save();
        }
        return response()->json([
            'message' => 'success',
            'campo' => 'Planejamento'
        ]);
    }

    public function criar_condicoes_animal(CriarCondicoesAnimalRequest $request)
    {
        try {
            $request->validated();
            $modelo_animal = ModeloAnimal::find($request->modelo_animal_id);
            $planejamento = $modelo_animal->planejamento;
            if (!$planejamento) {
                throw new \Exception('É necessário que o planejamento seja criado', 412);
            }


            if (isset($planejamento->condicoesAnimal)) {
                $condicoes_animal = $planejamento->condicoesAnimal;
            } else {
                $condicoes_animal = new CondicoesAnimal();
                $condicoes_animal->planejamento_id = $planejamento->id;
            }

            $condicoes_animal->condicoes_particulares = $request->condicoes_particulares;
            $condicoes_animal->local = $request->local;
            $condicoes_animal->ambiente_alojamento = $request->ambiente_alojamento;
            $condicoes_animal->tipo_cama = $request->tipo_cama;
            $condicoes_animal->num_animais_ambiente = $request->num_animais_ambiente;
            $condicoes_animal->dimensoes_ambiente = $request->dimensoes_ambiente;
            $condicoes_animal->periodo = $request->periodo;
            $condicoes_animal->profissional_responsavel = $request->profissional_responsavel;
            $condicoes_animal->email_responsavel = $request->email_responsavel;

            if (isset($planejamento->condicoesAnimal)) {
                $condicoes_animal->update();
            } else {
                $condicoes_animal->save();
            }

            return response()->json([
                'message' => 'success',
                'campo' => 'Condição animal'
            ]);
        } catch (\Exception $e) {
            return Responses::errorResponse($e);
        }
    }

    public function criar_procedimento(CriarProcedimentoRequest $request)
    {
        try {
            $request->validated();
            $modelo_animal = ModeloAnimal::find($request->modelo_animal_id);
            $planejamento = $modelo_animal->planejamento;
            if (!$planejamento) {
                throw new \Exception('É necessário que o planejamento seja criado', 412);
            }

            if (isset($planejamento->procedimento)) {
                $procedimento = $planejamento->procedimento;
                $procedimento->update($request->all());
            } else {
                $procedimento = new Procedimento();
                $procedimento->planejamento_id = $planejamento->id;
                $procedimento->fill($request->all());
                $procedimento->save();
            }

            return response()->json([
                'message' => 'success',
                'campo' => 'Procedimento'
            ]);
        } catch (\Exception $e) {
            return Responses::errorResponse($e);
        }
    }

    public function criar_operacao(CriarOperacaoRequest $request)
    {
        try {
            $request->validated();
            $modelo_animal = ModeloAnimal::find($request->modelo_animal_id);
            $planejamento = $modelo_animal->planejamento;
            if (!$planejamento) {
                throw new \Exception('É necessário que o planejamento seja criado', 412);
            }

            if (isset($planejamento->operacao)) {
                $operacao = $planejamento->operacao;
            } else {
                $operacao = new Operacao();
                $operacao->planejamento_id = $planejamento->id;
            }

            if ($request->flag_cirurgia == "false") {
                $operacao->detalhes_cirurgia = null;
                $operacao->detalhes_observacao_recuperacao = null;
                $operacao->detalhes_outros_cuidados_recuperacao = null;
                $operacao->detalhes_analgesia_recuperacao = null;
                $operacao->detalhes_nao_uso_analgesia_recuperacao = null;
                $operacao->observacao_recuperacao = null;
                $operacao->outros_cuidados_recuperacao = null;
                $operacao->analgesia_recuperacao = null;
                $operacao->flag_cirurgia = null;
            } else {
                $operacao->detalhes_cirurgia = $request->detalhes_cirurgia;
                $operacao->detalhes_observacao_recuperacao = $request->detalhes_observacao_recuperacao;
                $operacao->detalhes_outros_cuidados_recuperacao = $request->detalhes_outros_cuidados_recuperacao;
                $operacao->detalhes_analgesia_recuperacao = $request->detalhes_analgesia_recuperacao;
                $operacao->observacao_recuperacao = $request->observacao_recuperacao;
                $operacao->detalhes_nao_uso_analgesia_recuperacao = $request->detalhes_nao_uso_analgesia_recuperacao;
                $operacao->outros_cuidados_recuperacao = $request->outros_cuidados_recuperacao;
                $operacao->analgesia_recuperacao = $request->analgesia_recuperacao;
                $operacao->flag_cirurgia = $request->flag_cirurgia;
            }

            if (isset($planejamento->operacao)) {
                $operacao->update();
            } else {
                $operacao->save();
            }


            return response()->json([
                'message' => 'success',
                'campo' => 'Cirurgia'
            ]);
        } catch (\Exception $e) {
            return Responses::errorResponse($e);
        }
    }

    public function criar_eutanasia(CriarEutanasiaRequest $request)
    {
        try {
            $request->validated();
            $modelo_animal = ModeloAnimal::find($request->modelo_animal_id);
            $planejamento = $modelo_animal->planejamento;
            if (!$planejamento) {
                throw new \Exception('É necessário que o planejamento seja criado', 412);
            }

            if ($planejamento->eutanasia) {
                $eutanasia = $planejamento->eutanasia;
            } else {
                $eutanasia = new Eutanasia();
                $eutanasia->planejamento_id = $planejamento->id;
            }

            if ($request->eutanasia == "true") {
                $eutanasia->descricao = $request->descricao;
                $eutanasia->metodo = $request->metodo;
                $eutanasia->justificativa_metodo = $request->justificativa_metodo;
            } else {
                $eutanasia->descricao = null;
                $eutanasia->metodo = null;
                $eutanasia->justificativa_metodo = null;
            }

            $eutanasia->destino = $request->destino;
            $eutanasia->descarte = $request->descarte;

            if (isset($planejamento->eutanasia)) {
                $eutanasia->update();
            } else {
                $eutanasia->save();
            }

            return response()->json([
                'message' => 'success',
                'campo' => 'Expecificação Eutanásia'
            ]);

        } catch (\Exception $e) {
            return Responses::errorResponse($e);
        }
    }

    public function criar_resultado(CriarResultadoRequest $request)
    {
        try {
            $request->validated();
            $modelo_animal = ModeloAnimal::find($request->modelo_animal_id);
            $planejamento = $modelo_animal->planejamento;
            if (!$planejamento) {
                throw new \Exception('É necessário que o planejamento seja criado', 412);
            }

            if (isset($planejamento->resultado)) {
                $resultado = $planejamento->resultado;
                $resultado->update($request->all());
            } else {
                $resultado = new Resultado();
                $resultado->planejamento_id = $planejamento->id;
                $resultado->fill($request->all());
                $resultado->save();

            }
            return response()->json([
                'message' => 'success',
                'campo' => 'Especificação Abate'
            ]);
        } catch (\Exception $e) {
            return Responses::errorResponse($e);
        }
    }

    public function index_admin()
    {
        $avaliacoes = Avaliacao::all();
        $horario = Carbon::now('UTC')->toDateTime();
        $solicitacoes = Solicitacao::all();
        $avaliadores = User::whereHas('roles', function (Builder $query) {
            $query->where('nome', 'Avaliador');
        })->get();

        return view('admin.solicitacoes', compact('solicitacoes', 'avaliadores', 'avaliacoes', 'horario'));
    }

    public function concluir($solicitacao_id)
    {
        $concluir = true;
        $solicitacao = Solicitacao::where('id', $solicitacao_id)->where('user_id', Auth::user()->id)->first();
        foreach ($solicitacao->modelosAnimais as $modelo) {

            if (!isset($modelo->planejamento) || !isset($modelo->planejamento->operacao) || !isset($modelo->planejamento->eutanasia)
                || !isset($modelo->planejamento->resultado) || !isset($modelo->planejamento->procedimento) || !isset($modelo->planejamento->condicoesAnimal)) {
                $concluir = false;
            }
        }

        if ($concluir == false) {
            return redirect()->back()->with('fail', 'É necessário preencher todas as informações obrigatórias!');
        }
        if ($solicitacao == null) {
            return redirect()->back()->with('fail', 'Solicitação não encontrada');
        }

        $solicitacao->status = 'nao_avaliado';
        $solicitacao->update();

        HistoricoSolicitacao::Create([
            'solicitacao_id' => $solicitacao_id,
            'status_solicitacao' => $solicitacao->status,
            'nome_usuario_modificador' => Auth::user()->name,
        ]);
        if($solicitacao->avaliacao()->exists()){
            $avaliador = User::find($solicitacao->avaliador_atual_id);
            Mail::to($avaliador->email)->send(new SendAvaliadorReavaliar($avaliador));
        }else{
            $admin = User::find(1);
            Mail::to($admin->email)->send(new SendNotificacaoSolicitacao($admin));
        }
        return redirect(route('solicitacao.solicitante.index'))->with(['success' => 'Solicitação concluída com sucesso!']);
    }

    public function visualizar($id)
    {
        $solicitacao = Solicitacao::find($id);
        $instituicaos = Instituicao::all();
        $grandeAreas = GrandeArea::all();
        $areas = Area::all();
        $subAreas = SubArea::all();


        return view('solicitacao.administrador.visualizar_adm', compact('solicitacao', 'grandeAreas', 'areas', 'subAreas', 'instituicaos'));
    }

    public function apreciacao_index()
    {
        $avaliacoes = Avaliacao::all();

        $horario = Carbon::now('UTC')->toDateTime();

        return view('admin.apreciacao_index', compact('avaliacoes', 'horario'));

    }

    public function aprovar_avaliacao($solicitacao_id)
    {

        $solicitacao = Solicitacao::find($solicitacao_id);
        $instituicaos = Instituicao::all();
        $grandeAreas = GrandeArea::all();
        $areas = Area::all();
        $subAreas = SubArea::all();

        $disabled = true;
        $responsavel = $solicitacao->responsavel;
        $colaboradores = $solicitacao->responsavel->colaboradores;
        $modelo_animais = $solicitacao->modeloAnimal;
        $avaliacao = Avaliacao::where('solicitacao_id', $solicitacao_id)->where('user_id', $solicitacao->avaliador_atual_id)->first();

        $avaliacaoDadosComp = AvaliacaoIndividual::where('avaliacao_id', $avaliacao->id)->where('dados_complementares_id', $solicitacao->dadosComplementares->id)->first();
        $avaliacaoDadosini = AvaliacaoIndividual::where('avaliacao_id', $avaliacao->id)->where('solicitacao_id', $solicitacao->id)->first();
        $avaliacaoResponsavel = AvaliacaoIndividual::where('avaliacao_id', $avaliacao->id)->where('responsavel_id', $responsavel->id)->first();
        $avaliacaoColaborador = AvaliacaoIndividual::where('avaliacao_id', $avaliacao->id)->where('tipo', 2)->first();

        return view('solicitacao.administrador.index_adm', compact('disabled', 'solicitacao', 'grandeAreas', 'areas', 'subAreas',
            'instituicaos', 'responsavel', 'colaboradores', 'modelo_animais', 'avaliacao',
            'avaliacaoDadosComp', 'avaliacaoDadosini', 'avaliacaoResponsavel', 'avaliacaoColaborador'));

    }

    public function HistoricoModal($solicitacao_id)
    {

        $historicoModificacoes = HistoricoSolicitacao::where('solicitacao_id', $solicitacao_id)->get();
        $solicitacao = Solicitacao::find($solicitacao_id);

        $html = view('admin.modal_historico_solicitacao', compact('historicoModificacoes', 'solicitacao'))->render();

        return response()->json(['html' => $html]);
    }

    public function historicoDownload(Solicitacao $solicitacao)
    {
        $historicos = $solicitacao->historico_solicitacao;
        $pdf = \PDF::loadView('PDF/historico', compact('solicitacao', 'historicos'));
        return $pdf->download('historico.pdf');
    }

    public function destroySolicitacao($solicitacao_id){
        $solicitacao = Solicitacao::find($solicitacao_id);
        $solicitacao->delete();
        return redirect()->back();

    }
}
