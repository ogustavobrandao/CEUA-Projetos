<div class="card shadow-lg p-3 bg-white" style="border-radius: 0px 0px 10px 10px">
    <form id="form3" method="POST" action="{{route('solicitacao.solicitacao_fim.criar')}}">
        @csrf
        <input type="hidden" name="solicitacao_id" value="{{$solicitacao->id}}">
        <div class="row col-md-12">
            <h3 class="subtitulo">Informações</h3>

            <div class="col-sm-12 mt-2">
                <label for="resumo">Resumo do Projeto de Pesquisa / de Extensão / de Aula Prática / de Treinamento:<strong style="color: red">*</strong></label>
                <textarea class="form-control @error('resumo') is-invalid @enderror" name="resumo" id="resumo" maxlength="400" autocomplete="resumo" autofocus
                          required>@if(!empty($solicitacao->dadosComplementares) && $solicitacao->dadosComplementares->resumo != null){{$solicitacao->dadosComplementares->resumo}}@else{{old('resumo')}}@endif</textarea>
                @error('resumo')
                <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
                @enderror
            </div>

            <div class="col-sm-12 mt-2">
                <label for="objetivos">Objetivos (na íntegra):<strong style="color: red">*</strong></label>
                <textarea class="form-control @error('objetivos') is-invalid @enderror" name="objetivos" id="objetivos" autocomplete="objetivos" autofocus
                          required>@if(!empty($solicitacao->dadosComplementares) && $solicitacao->dadosComplementares->objetivos != null){{$solicitacao->dadosComplementares->objetivos}}@else{{old('objetivos')}}@endif</textarea>
                @error('objetivos')
                <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
                @enderror
            </div>

            <div class="col-sm-12 mt-2">
                <label for="justificativa">Justificativa:<strong style="color: red">*</strong></label>
                <textarea class="form-control @error('justificativa') is-invalid @enderror" name="justificativa" id="justificativa" autocomplete="justificativa"
                          autofocus required>@if(!empty($solicitacao->dadosComplementares) && $solicitacao->dadosComplementares->justificativa != null){{$solicitacao->dadosComplementares->justificativa}}@else{{old('justificativa')}}@endif</textarea>
                @error('justificativa')
                <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
                @enderror
            </div>

            <div class="col-sm-12 mt-2">
                <label for="relevancia">Relevância:<strong style="color: red">*</strong></label>
                <textarea class="form-control @error('relevancia') is-invalid @enderror" name="relevancia" id="relevancia" autocomplete="relevancia" autofocus
                          required>@if(!empty($solicitacao->dadosComplementares) && $solicitacao->dadosComplementares->relevancia != null){{$solicitacao->dadosComplementares-> relevancia}}@else{{old('relevancia')}}@endif</textarea>
                @error('relevancia')
                <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
                @enderror
            </div>


        </div>
        @include('component.botoes_new_form')
    </form>
</div>

