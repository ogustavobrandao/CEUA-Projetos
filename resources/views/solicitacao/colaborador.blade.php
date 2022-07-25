<div class="card shadow-lg p-3 bg-white" style="border-radius: 10px">

    <div class="row">
        <div class="col-md-12">
            <h1 class="borda-bottom text-center titulo">Solicitação - Dados do Colaborador
                <a class="float-end" onclick="criarColaborador()"><i class="fa-solid fa-user-plus" style="font-size: 30px"></i></a>
            </h1>
        </div>
    </div>

    <form method="POST" action="{{route('solicitacao.colaborador.criar')}}">
        @csrf
        <input type="hidden" name="solicitacao_id" value="{{$solicitacao->id}}">
        <div id="listaColaborador">
            <div id="colaboradorDados">
                <div class="row">
                    <h3 class="subtitulo">Informações Pessoais/Contato</h3>
                    <div class="col-sm-4">
                        <label for="nome">Nome Completo:</label>
                        <input class="form-control @error('nome') is-invalid @enderror" id="nome" type="text" name="nome[]" value="{{ old('nome') }}" required autocomplete="nome" autofocus>
                        @error('nome')
                        <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                        @enderror
                    </div>

                    <div class="col-sm-4">
                        <label for="nome">E-mail:</label>
                        <input class="form-control @error('email') is-invalid @enderror" id="email" type="email" name="email[]" value="{{ old('email') }}" required autocomplete="email" autofocus>
                        @error('email')
                        <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                        @enderror
                    </div>

                    <div class="col-sm-4">
                        <label for="telefone">Telefone:</label>
                        <input class="form-control @error('telefone') is-invalid @enderror" id="telefone" type="text" name="telefone[]" value="{{ old('telefone') }}" required autocomplete="telefone" autofocus>
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
                            <select class="form-control" id="instituicao" name="instituicao_id[]" onchange="unidades()">
                                <option disabled selected>Selecione uma Instituição</option>
                                @foreach($instituicaos as $instituicao)
                                    <option value="{{$instituicao->id}}">{{$instituicao->nome}}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="col-sm-6">
                            <label for="nivel_academico">Nível Acadêmico:</label>
                            <input class="form-control @error('nivel_academico') is-invalid @enderror" id="nivel_academico" type="text" name="nivel_academico[]" value="{{ old('nivel_academico') }}" required autocomplete="nivel_academico" autofocus>
                            @error('nivel_academico')
                            <span class="invalid-feedback" role="alert">
                              <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>
                </div>

                <div class="row">
                    <h3 class="subtitulo">Informações Complementares</h3>
                    <div class="col-sm-6">
                        <label for="experiencia_previa">Experiência Previa(anos):</label>
                        <input class="form-control @error('experiencia_previa') is-invalid @enderror" id="experiencia_previa" type="text" name="experiencia_previa[]" value="{{ old('experiencia_previa') }}" required autocomplete="experiencia_previa" autofocus>
                        @error('experiencia_previa')
                        <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                        @enderror
                    </div>

                    <div class="col-sm-6">
                        <label for="treinamento">Treinamento(especificar):</label>
                        <input class="form-control @error('treinamento') is-invalid @enderror" id="treinamento" type="text" name="treinamento[]" value="{{ old('treinamento') }}" required autocomplete="treinamento" autofocus>
                        @error('treinamento')
                        <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                        @enderror
                    </div>

                </div>
            </div>
        </div>

        @include('component.botoes_form')
    </form>

</div>

<script>
    function criarColaborador() {
        var colaborador = document.getElementById('colaboradorDados');
        var clone = colaborador.cloneNode(true);
        //document.getElementById('listaColaborador').innerHTML += "<hr class=\"mt-4 subtitulo borda-bottom\">";
        document.getElementById('listaColaborador').appendChild(clone);
    }
</script>

