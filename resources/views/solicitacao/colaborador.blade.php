<div class="card shadow-lg p-3 bg-white" style="border-radius: 10px">

    <div class="row">
        <div class="col-md-12">
            <h1 class="borda-bottom text-center titulo">Solicitação - Dados do Colaborador
                @if(!isset($disabled))
                    <a class="float-end" onclick="criarColaborador()"><i class="fa-solid fa-user-plus" style="font-size: 30px"></i></a>
                @endif
            </h1>
        </div>
    </div>

    <form id="form2" method="POST" action="{{route('solicitacao.colaborador.criar')}}">
        @csrf
        <input type="hidden" name="solicitacao_id" value="{{$solicitacao->id}}">
        <div id="listaColaborador">
        </div>

        @include('component.botoes_form')
    </form>

</div>

<script>
    cont = 0;

    function removerColaborador(id) {
        $('#colab' + id).remove();
        $('#separacao' + id).remove();
    }

    function criarColaborador() {
        cont += 1;
        $('#listaColaborador').prepend('<div id="colab' + cont + '" class="mt-2"><div class="row"><div class="col-auto"><h3 style="font-weight: bold;">Colaborador ' + cont + '</h3></div> <div class="col-auto">@if(!isset($disabled))<a type="button" id="remover' + cont + '" onclick="removerColaborador(' + cont + ')"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="#fe0303" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polyline points="3 6 5 6 21 6"></polyline><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path><line x1="10" y1="11" x2="10" y2="17"></line><line x1="14" y1="11" x2="14" y2="17"></line></svg></a> </div></div><div id="colaboradorDados' + cont + '">@endif' +
            '<div id="colaboradorDados"> <div class="row"> <h3 class="subtitulo">Informações Pessoais/Contato</h3>' +
            '<div class="col-sm-4">' +
            '<input type="hidden" id="colab_id" name="colaborador[' + cont + '][colab_id]" value="">' +
            '<label for="nome">Nome Completo:</label>' +
            '<input class="form-control @error('nome') is-invalid @enderror" id="nome" type="text" name="colaborador[' + cont + '][nome]" value="{{ old('nome') }}" required autocomplete="nome" autofocus>' +
            '@error('nome')' +
            '<span class="invalid-feedback" role="alert">' +
            '<strong>{{ $message }}</strong>' +
            '</span>' +
            '@enderror' +
            '</div>' +
            '<div class="col-sm-4">' +
            '<label for="nome">E-mail:</label>' +
            '<input class="form-control @error('email') is-invalid @enderror" id="email" type="email" name="colaborador[' + cont + '][email]" value="{{ old('email') }}" required autocomplete="email" autofocus>' +
            '@error('email')' +
            '<span class="invalid-feedback" role="alert">' +
            '<strong>{{ $message }}</strong>' +
            '</span>' +
            '@enderror' +
            '</div>' +
            '<div class="col-sm-4">' +
            '<label for="telefone">Telefone:</label>' +
            '<input class="form-control @error('telefone') is-invalid @enderror" id="telefone" type="text" name="colaborador[' + cont + '][telefone]" value="{{ old('telefone') }}" required autocomplete="telefone" autofocus>' +
            '@error('telefone')' +
            '<span class="invalid-feedback" role="alert">' +
            '<strong>{{ $message }}</strong>' +
            '</span>' +
            '@enderror' +
            '</div></div>' +
            '<div>' +
            '<h3 class="subtitulo">Informações Institucionais</h3>' +
            '<div class="row">' +
            '<div class="col-sm-6">' +
            '<label for="instituicao">Instituicão:</label>' +
            '<select class="form-control" id="instituicao" name="colaborador[' + cont + '][instituicao_id]" onchange="unidades()">' +
            '<option disabled selected>Selecione uma Instituição</option>' +
            '@foreach($instituicaos as $instituicao)' +
            '<option value="{{$instituicao->id}}">{{$instituicao->nome}}</option>' +
            '@endforeach' +
            '</select>' +
            '</div>' +
            '<div class="col-sm-6">' +
            '<label for="nivel_academico">Nível Acadêmico:</label>' +
            '<input class="form-control @error('nivel_academico') is-invalid @enderror" id="nivel_academico" type="text" name="colaborador[' + cont + '][nivel_academico]" value="{{ old('nivel_academico') }}" required autocomplete="nivel_academico" autofocus>' +
            '@error('nivel_academico') ' +
            '<span class="invalid-feedback" role="alert">' +
            '<strong>{{ $message }}</strong>' +
            '</span>' +
            '@enderror' +
            '</div>' +
            '</div>' +
            '</div>' +
            '<div class="row">' +
            '<h3 class="subtitulo">Informações Complementares</h3>' +
            '<div class="col-sm-6">' +
            '<label for="experiencia_previa">Experiência Previa(anos):</label>' +
            '<input class="form-control @error('experiencia_previa') is-invalid @enderror" id="experiencia_previa" type="text" name="colaborador[' + cont + '][experiencia_previa]" value="{{ old('experiencia_previa') }}" required autocomplete="experiencia_previa" autofocus>' +
            '@error('experiencia_previa')' +
            '<span class="invalid-feedback" role="alert">' +
            '<strong>{{ $message }}</strong>' +
            '</span>' +
            '@enderror' +
            '</div>' +
            '<div class="col-sm-6">' +
            '<label for="treinamento">Treinamento(especificar):</label>' +
            '<input class="form-control @error('treinamento') is-invalid @enderror" id="treinamento" type="text" name="colaborador[' + cont + '][treinamento]" value="{{ old('treinamento') }}" required autocomplete="treinamento" autofocus>' +
            '@error('treinamento')' +
            '<span class="invalid-feedback" role="alert">' +
            '<strong>{{ $message }}</strong>' +
            '</span>' +
            '@enderror' +
            '</div>' +
            '</div></div></div>'
        );
    }


    @foreach($colaboradores as $key => $colab)
    criarColaborador();
    $('#colab' + {{$key+1}}).find('#colab_id').val("{{$colab->id}}");
    $('#colab' + {{$key+1}}).find('#nome').val("{{$colab->nome}}");
    $('#colab' + {{$key+1}}).find('#email').val("{{$colab->contato->email}}");
    $('#colab' + {{$key+1}}).find('#telefone').val("{{$colab->contato->telefone}}");
    $('#colab' + {{$key+1}}).find('#nivel_academico').val("{{$colab->nivel_academico}}");
    $('#colab' + {{$key+1}}).find('#treinamento').val("{{$colab->treinamento}}");
    $('#colab' + {{$key+1}}).find('#experiencia_previa').val("{{$colab->experiencia_previa}}");
    $('#colab' + {{$key+1}}).find('#instituicao').val("{{$colab->instituicao->id}}");
    @endforeach

</script>

