<div class="card shadow-lg p-3 bg-white" style="border-radius: 10px">
    <div class="row">
        <div class="col-md-12">
            <h1 class="borda-bottom text-center titulo">Solicitação - Dados Iniciais</h1>
        </div>
    </div>

    <form method="POST" action="{{route('solicitacao.criar')}}">
        @csrf
        <input type="hidden" name="solicitacao_id" value="{{$solicitacao->id}}">
        <div class="row">
            <div class="col-12">
                <h3 class="subtitulo">Finalidade</h3>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-4">
                <label for="tipo">Tipo:</label>
                <input class="form-control" type="text" value="{{ $solicitacao->tipo  }}" disabled>
            </div>

            <div class="col-sm-4">
                <label for="inicio">Inicio:</label>
                <input class="form-control @error('inicio') is-invalid @enderror" id="inicio" type="datetime-local" name="inicio" value="{{ old('inicio') }}"
                       required
                       autocomplete="inicio" autofocus>
                @error('inicio')
                <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
                @enderror
            </div>

            <div class="col-sm-4">
                <label for="inicio">Fim:</label>
                <input class="form-control @error('fim') is-invalid @enderror" id="fim" type="datetime-local" name="fim" value="{{ old('fim') }}"
                       required
                       autocomplete="fim" autofocus>
                @error('fim')
                <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
                @enderror
            </div>
        </div>

        <div class="row mt-2">
            <div class="col-12">
                <h3 class="subtitulo">Titulo do Projeto/Aula Prática/Treinamento</h3>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-4">
                <label for="titulo_pt">Título em Português:</label>
                <input class="form-control @error('titulo_pt') is-invalid @enderror" id="titulo_pt" type="text" name="titulo_pt" value="{{ old('titulo_pt') }}"
                       required
                       autocomplete="titulo_pt" autofocus>
                @error('titulo_pt')
                <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
                @enderror
            </div>

            <div class="col-sm-4">
                <label for="titulo_en">Titulo em Inglês (Apenas para projeto):</label>
                <input class="form-control @error('titulo_en') is-invalid @enderror" id="titulo_en" type="text" name="titulo_en" value="{{ old('titulo_en') }}"
                       required
                       autocomplete="titulo_en" autofocus>
                @error('titulo_en')
                <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
                @enderror
            </div>

            <div class="col-sm-4">
                <label for="area_conhecimento">Área de conhecimento:</label>
                <select class="form-control" id="area_conhecimento" name="area_conhecimento">
                    <option disabled selected>Selecione a Área de Conhecimento</option>
                </select>
            </div>
        </div>

        @include('component.botoes_form')
    </form>

</div>

