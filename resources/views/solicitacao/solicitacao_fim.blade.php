<div class="card shadow-lg p-3 bg-white" style="border-radius: 10px">
    <div class="row">
        <div class="col-md-12">
            <h1 class="borda-bottom text-center titulo">Solicitação - Dados Complementares</h1>
        </div>
    </div>

    <form method="POST" action="{{route('solicitacao.solicitacao_fim.criar')}}">
        @csrf
        <input type="hidden" name="solicitacao_id" value="{{$solicitacao->id}}">
        <div class="row col-md-12">
            <h3 class="subtitulo">Informações</h3>

            <div class="col-sm-12 mt-2">
                <label for="resumo">Resumo do Projeto de Pesquisa/de Extensão/de Aula Prática/de Treinamento:</label>
                <textarea class="form-control @error('resumo') is-invalid @enderror" name="resumo" id="resumo" autocomplete="resumo" autofocus
                          required>@if($solicitacao->resumo != null) {{$solicitacao->resumo}} @else {{old('resumo')}} @endif</textarea>
                @error('resumo')
                <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
                @enderror
            </div>

            <div class="col-sm-12 mt-2">
                <label for="objetivos">Objetivos(na íntegra):</label>
                <textarea class="form-control @error('objetivos') is-invalid @enderror" name="objetivos" id="objetivos" autocomplete="objetivos" autofocus
                          required>@if($solicitacao->objetivos != null) {{$solicitacao->objetivos}} @else {{old('objetivos')}}@endif</textarea>
                @error('objetivos')
                <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
                @enderror
            </div>

            <div class="col-sm-12 mt-2">
                <label for="justificativa">Justificativa:</label>
                <textarea class="form-control @error('justificativa') is-invalid @enderror" name="justificativa" id="justificativa" autocomplete="justificativa"
                          autofocus required>@if($solicitacao->justificativa != null) {{$solicitacao->justificativa}} @else {{old('justificativa')}} @endif</textarea>
                @error('justificativa')
                <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
                @enderror
            </div>

            <div class="col-sm-12 mt-2">
                <label for="relevancia">Relevância:</label>
                <textarea class="form-control @error('relevancia') is-invalid @enderror" name="relevancia" id="relevancia" autocomplete="relevancia" autofocus
                          required>@if($solicitacao->relevancia != null) {{$solicitacao->relevancia}} @else {{old('relevancia')}} @endif</textarea>
                @error('relevancia')
                <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
                @enderror
            </div>


        </div>
        @include('component.botoes_form')
    </form>
</div>

