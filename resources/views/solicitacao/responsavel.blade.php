<div class="card shadow-lg p-3 bg-white" style="border-radius: 10px">
    <div class="row">
        <div class="col-md-12">
            <h1 class="borda-bottom text-center titulo">Solicitação - Dados do Responsável</h1>
        </div>
    </div>

    <div class="row">
        <h3 class="subtitulo">Informações Pessoais/Contato</h3>
        <div class="col-sm-4">
            <label for="nome">Nome Completo:</label>
            <input class="form-control @error('nome') is-invalid @enderror" id="nome" type="text" name="nome" value="{{ old('nome') }}" required autocomplete="nome" autofocus>
            @error('nome')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>

        <div class="col-sm-4">
            <label for="nome">E-mail:</label>
            <input class="form-control @error('email') is-invalid @enderror" id="email" type="email" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
            @error('email')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>

        <div class="col-sm-4">
            <label for="telefone">Telefone:</label>
            <input class="form-control @error('telefone') is-invalid @enderror" id="telefone" type="text" name="telefone" value="{{ old('telefone') }}" required autocomplete="telefone" autofocus>
            @error('telefone')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>

    </div>

    <div>
        <h3 class="subtitulo">Informações Institucionais</h3>
        <div class="row">
            <div class="col-sm-6">
                <label for="instituicao">Instituicão:</label>
                <select class="form-control" id="instituicao" name="instituicao">
                    <option disabled selected>Selecione uma Instituição</option>
                    @foreach($instituicaos as $instituicao)
                        <option value="{{$instituicao->id}}">{{$instituicao->nome}}</option>
                    @endforeach
                </select>
            </div>

            <div class="col-sm-6">
                <label for="vinculo_instituicao">Vinculo:</label>
                <select class="form-control" id="vinculo_instituicao" name="vinculo_instituicao">
                    <option disabled selected>Selecione um Vinculo</option>
                </select>
            </div>
        </div>
        <div class="row mt-2">
            <div class="col-sm-6">
                <label for="unidade">Unidade:</label>
                <select class="form-control" id="unidade" name="unidade">
                    <option disabled selected>Selecione uma Unidade</option>
                </select>
            </div>

            <div class="col-sm-6">
                <label for="departamento">Departamento:</label>
                <select class="form-control" id="departamento" name="departamento">
                    <option disabled selected>Selecione um Departamento</option>
                </select>
            </div>
        </div>

    </div>

    <div class="row">
        <h3 class="subtitulo">Informações Complementares</h3>
        <div class="col-sm-6">
            <label for="experiencia">Experiência Previa:</label>
            <div class="row ml-1">
                <div class="col-sm-2">
                    <input class="form-check-input" type="radio" name="experiencia_previa" id="experiencia_previa">
                    <label class="form-check-label" for="experiencia_previa">Sim</label>
                </div>
                <div class="col-sm-2">
                    <input class="form-check-input" type="radio" name="experiencia_previa" id="experiencia_previa" checked>
                    <label class="form-check-label" for="experiencia_previa">
                        Não
                    </label>
                </div>
            </div>
        </div>

        <div class="col-sm-6">
            <label for="experiencia">Treinamento:</label>
            <div class="row ml-1">
                <div class="col-sm-2">
                    <input class="form-check-input" type="radio" name="treinamento" id="treinamento">
                    <label class="form-check-label" for="treinamento">Sim</label>
                </div>
                <div class="col-sm-2">
                    <input class="form-check-input" type="radio" name="treinamento" id="treinamento" checked>
                    <label class="form-check-label" for="treinamento">
                        Não
                    </label>
                </div>
            </div>
        </div>

    </div>

</div>

