@extends('layouts.formulario')

@section('content')
    <!-- Indicador de Etapas -->
    <ul class="nav nav-pills mb-5">
        <li class="nav-item">
            <a class="nav-link active" id="step-1-tab" data-bs-toggle="pill" href="#step-1">1. Dados Iniciais</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" id="step-2-tab" data-bs-toggle="pill" href="#step-2">Etapa 2</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" id="step-3-tab" data-bs-toggle="pill" href="#step-3">Etapa 3</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" id="step-4-tab" data-bs-toggle="pill" href="#step-4">Etapa 4</a>
        </li>
    </ul>


    <!-- Formulário Multi-Etapas -->
    <div class="tab-content">
        <div class="tab-pane fade show active" id="step-1">
            @include('component.modal_fail')
            <div id="dados_iniciais">
                @if (Auth::user()->hasRole('Solicitante') &&
                        $solicitacao->status == 'avaliado' &&
                        $solicitacao->avaliacao->first()->status == 'aprovadaPendencia')
                    @include('solicitacao.solicitante.solicitacao', [
                        'tipo' => 0,
                        'id' => $solicitacao->id,
                        'status' => $solicitacao->avaliacao_individual->status,
                    ])
                @else
                    @include('solicitacao.solicitante.solicitacao')
                @endif
            </div>
            <button class="btn btn-primary mt-3" onclick="switchStep(2)">Próximo</button>
        </div>
        <div class="tab-pane fade" id="step-2">
            <h4>Etapa 2</h4>
            <!-- Campos do formulário da etapa 2 -->
            <button class="btn btn-secondary mt-3" onclick="switchStep(1)">Anterior</button>
            <button class="btn btn-primary mt-3" onclick="switchStep(3)">Próximo</button>
        </div>
        <div class="tab-pane fade" id="step-3">
            <h4>Etapa 3</h4>
            <!-- Campos do formulário da etapa 3 -->
            <button class="btn btn-secondary mt-3" onclick="switchStep(2)">Anterior</button>
            <button class="btn btn-primary mt-3" onclick="switchStep(4)">Próximo</button>
        </div>
        <div class="tab-pane fade" id="step-4">
            <h4>Etapa 4</h4>
            <!-- Campos do formulário da etapa 4 -->
            <button class="btn btn-secondary mt-3" onclick="switchStep(3)">Anterior</button>
            <button class="btn btn-success mt-3" type="submit">Enviar</button>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        function switchStep(step) {
            var nextTab = document.getElementById('step-' + step + '-tab');
            var tab = new bootstrap.Tab(nextTab);
            tab.show();
        }
    </script>
@endsection
