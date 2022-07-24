<div class="card shadow-lg p-3 bg-white" style="border-radius: 10px">
    <div class="row">
        <div class="col-md-12">
            <h1 class="borda-bottom text-center titulo">Solicitação - Condições Animais</h1>
        </div>
    </div>

    <form method="POST" action="{{route('solicitacao.condicoes_animal.criar')}}">
        @csrf
        <input type="hidden" name="solicitacao_id" value="{{$solicitacao->id}}">
        <div class="row">
            <div class="col-12">
                <h3 class="subtitulo">Condições de alojamento e alimentação dos animais</h3>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12">
                <label for="condicoes_particulares" style="margin-bottom: 0px">Comentar obrigatoriamente sobre os itens abaixo e as demais condições que forem particulares à espécie:</label><br>
                <span style="margin: 0px; font-weight: lighter; font-size: 14px; color: gray">
                        1. Alimentação; 2. Fonte de Água; 3. Lotação - Número de animais/área; 4. Exaustão do ar: sim ou não;
                   </span>
                <textarea class="form-control @error('condicoes_particulares') is-invalid @enderror" id="condicoes_particulares" name="condicoes_particulares" required
                          autocomplete="condicoes_particulares"
                          autofocus>{{ old('condicoes_particulares') }}</textarea>
                @error('condicoes_particulares')
                <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
                @enderror
            </div>

            <div class="col-sm-12 mt-2">
                <label for="local">Local onde será mantido o animal durante o procedimento experimental (biotério, fazenda, aviário, laboratório, outro):</label>
                <textarea class="form-control @error('local') is-invalid @enderror" id="local" name="local" required autocomplete="local"
                          autofocus>{{ old('local') }}</textarea>
                @error('local')
                <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
                @enderror
            </div>

        </div>


        <div class="row mt-2">
            <div class="col-sm-6">
                <label for="ambiente_alojamento">Ambiente de alojamento:</label>
                <select class="form-control" id="ambiente_alojamento" name="ambiente_alojamento">
                    <option disabled selected>Selecione o Ambiente de Alojamento</option>
                    <option value="1">Ambiente 1</option>
                </select>
            </div>

            <div class="col-sm-6">
                <label for="tipo_cama">Tipo de cama:</label>
                <select class="form-control" id="tipo_cama" name="tipo_cama">
                    <option disabled selected>Selecione o Tipo de Cama</option>
                    <option value="1">Tipo de Cama 1</option>
                </select>
            </div>
        </div>

        <div class="row mt-2">
            <div class="col-sm-4">
                <label for="num_animais_ambiente">Número de animais por ambiente de contenção:</label>
                <input class="form-control @error('num_animais_ambiente') is-invalid @enderror" id="num_animais_ambiente" type="number" name="num_animais_ambiente"
                       value="{{ old('num_animais_ambiente') }}" required
                       autocomplete="num_animais_ambiente" autofocus>
                @error('num_animais_ambiente')
                <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
                @enderror
            </div>
            <div class="col-sm-4">
                <label for="dimensoes_ambiente">Dimensões do ambiente de contenção dos animais:</label>
                <input class="form-control @error('dimensoes_ambiente') is-invalid @enderror" id="dimensoes_ambiente" type="text" name="dimensoes_ambiente" value="{{ old('dimensoes_ambiente') }}"
                       required
                       autocomplete="dimensoes_ambiente" autofocus>
                @error('dimensoes_ambiente')
                <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
                @enderror
            </div>
            <div class="col-sm-4">
                <label for="periodo">Período total de manutenção dos animais no experimento:</label>
                <input class="form-control @error('periodo') is-invalid @enderror" id="periodo" type="number" name="periodo" value="{{ old('periodo') }}" required
                       autocomplete="periodo" autofocus>
                @error('periodo')
                <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
                @enderror
            </div>
        </div>

        <div class="row mt-2">
            <div class="col-6">
                <label for="profissional_responsavel">Profissional responsável:</label>
                <input class="form-control @error('profissional_responsavel') is-invalid @enderror" id="profissional_responsavel" type="text" name="profissional_responsavel"
                       value="{{ old('profissional_responsavel') }}" required
                       autocomplete="profissional_responsavel" autofocus>
                @error('profissional_responsavel')
                <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
                @enderror
            </div>

            <div class="col-6">
                <label for="email_responsavel">Email do responsável:</label>
                <input class="form-control @error('email_responsavel') is-invalid @enderror" id="email_responsavel" type="email" name="email_responsavel"
                       value="{{ old('email_responsavel') }}" required
                       autocomplete="email_responsavel" autofocus>
                @error('email_responsavel')
                <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
                @enderror
            </div>

        </div>

        @include('component.botoes_form')
    </form>

</div>

