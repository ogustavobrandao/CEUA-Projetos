<div class="card shadow-lg p-3 bg-white" style="border-radius: 10px">
    <div class="row">
        <div class="col-md-12">
            <h1 class="borda-bottom text-center titulo">Solicitação - Resultado</h1>
        </div>
    </div>

    <div class="row col-md-12">
        <h3 class="subtitulo">Informações</h3>

        <div class="col-sm-6 mt-2">
            <label for="abate">Abate:</label>
            <div class="row ml-1">
                <div class="col-sm-2">
                    <input class="form-check-input" type="radio" name="abate" id="abate">
                    <label class="form-check-label" for="abate">Sim</label>
                </div>
                <div class="col-sm-2">
                    <input class="form-check-input" type="radio" name="abate" id="abate" checked>
                    <label class="form-check-label" for="abate">
                        Não
                    </label>
                </div>
            </div>
        </div>

        <div class="col-sm-12 mt-2">
            <label for="destino_animais">Destino dos animais sobreviventes após a conclusão do experimento/aula ou retirados no decorrer do experimento/aula:</label>
            <textarea class="form-control @error('destino_animais') is-invalid @enderror" name="destino_animais" id="destino_animais" autocomplete="destino_animais" autofocus required>{{old('destino_animais')}}</textarea>
            @error('destino_animais')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>

        <div class="col-sm-12 mt-2">
            <label for="outras_infos">Outras informações relevantes:</label>
            <textarea class="form-control @error('outras_infos') is-invalid @enderror" name="outras_infos" id="outras_infos" autocomplete="outras_infos" autofocus required>{{old('outras_infos')}}</textarea>
            @error('outras_infos')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>

        <div class="col-sm-12 mt-2">
            <label for="justificativa_metodos">Justificativa da não utilização de métodos alternativos e da necessidade do uso de animais:</label>
            <textarea class="form-control @error('justificativa_metodos') is-invalid @enderror" name="justificativa_metodos" id="justificativa_metodos" autocomplete="justificativa_metodos" autofocus required>{{old('justificativa_metodos')}}</textarea>
            @error('justificativa_metodos')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>

        <div class="col-sm-12 mt-2">
            <label for="resumo_procedimento">Resumo do procedimento(relatar todos os procedimentos com os animais):</label>
            <textarea class="form-control @error('resumo_procedimento') is-invalid @enderror" name="resumo_procedimento" id="resumo_procedimento" autocomplete="resumo_procedimento" autofocus required>{{old('resumo_procedimento')}}</textarea>
            @error('resumo_procedimento')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>


    </div>
</div>

