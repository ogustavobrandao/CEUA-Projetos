<div class="card shadow-lg p-3 bg-white" style="border-radius: 0px 0px 10px 10px">

    <form id="form2" method="POST" action="{{route('solicitacao.colaborador.criar')}}">
        @csrf
        <input type="hidden" name="solicitacao_id" value="{{$solicitacao->id}}">
        <div id="listaColaborador">
        </div>
        
        @include('component.botoes_new_form')
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
        $('#listaColaborador').prepend(
            '<div id="colab' + cont + '" class="mt-2">' +
            '<div class="row">' +
            '<div class="col-12">' +
            '<h3 style="font-weight: bold;">Colaborador ' + cont + ' ' +
            '@if(!isset($disabled))<a type="button" id="remover' + cont + '" onclick="removerColaborador(' + cont + ')"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="#fe0303" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polyline points="3 6 5 6 21 6"></polyline><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path><line x1="10" y1="11" x2="10" y2="17"></line><line x1="14" y1="11" x2="14" y2="17"></line></svg></a>@endif' +
            '</h3>' +
            '</div>' +
            '</div>' +
            '<div id="colaboradorDados' + cont + '">' +
            '<div id="colaboradorDados"> <div class="row"> <h3 class="subtitulo">Informações Pessoais / Contato</h3>' +
            '<div class="col-sm-4">' +
            '<input type="hidden" id="colab_id" name="colaborador[' + cont + '][colab_id]" value="">' +
            '<label for="nome">Nome Completo:<strong style="color: red">*</strong></label>' +
            '<input class="form-control @error('nome') is-invalid @enderror" id="nome" type="text" name="colaborador[' + cont + '][nome]" value="{{ old('nome') }}" required autocomplete="nome" autofocus>' +
            '@error('nome')' +
            '<span class="invalid-feedback" role="alert">' +
            '<strong>{{ $message }}</strong>' +
            '</span>' +
            '@enderror' +
            '</div>' +
            '<div class="col-sm-4">' +
            '<label for="nome">E-mail:<strong style="color: red">*</strong></label>' +
            '<input class="form-control @error('email') is-invalid @enderror" id="email" type="email" name="colaborador[' + cont + '][email]" value="{{ old('email') }}" required autocomplete="email" autofocus>' +
            '@error('email')' +
            '<span class="invalid-feedback" role="alert">' +
            '<strong>{{ $message }}</strong>' +
            '</span>' +
            '@enderror' +
            '</div>' +
            '<div class="col-sm-4">' +
            '<label for="cpf">CPF:<strong style="color: red">*</strong></label>' +
            '<input class="form-control @error('cpf') is-invalid @enderror" id="cpf" type="cpf" name="colaborador[' + cont + '][cpf]" value="{{ old('cpf') }}" required autocomplete="cpf" autofocus>' +
            '@error('cpf')' +
            '<span class="invalid-feedback" role="alert">' +
            '<strong>{{ $message }}</strong>' +
            '</span>' +
            '@enderror' +
            '</div>' +
            '<div class="col-sm-4 mt-2">' +
            '<label for="telefone">Telefone:<strong style="color: red">*</strong></label>' +
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
            '<label for="instituicao">Instituicão:<strong style="color: red">*</strong></label>' +
            '<select class="form-control" id="instituicao" name="colaborador[' + cont + '][instituicao_id]" onchange="unidades()">' +
            '<option disabled selected>Selecione uma Instituição</option>' +
            '@foreach($instituicaos as $instituicao)' +
            '<option value="{{$instituicao->id}}">{{$instituicao->nome}}</option>' +
            '@endforeach' +
            '</select>' +
            '</div>' +
            '<div class="col-sm-6">' +
                '<label for="grau_escolaridade">Grau de Escolaridade:<strong style="color: red">*</strong></label>' +
                '<select class="form-control" id="grau_escolaridade" name="colaborador[' + cont + '][grau_escolaridade]">' +
                    '<option disabled selected>Selecione um Grau de Escolaridade</option>' +
                    '<option @if(old('grau_escolaridade') == "graduacao_completa") selected @endif value="graduacao_completa">Graduação Completa</option>' +
                    '<option @if(old('grau_escolaridade') == "graduacao_incompleta") selected @endif value="graduacao_incompleta">Graduação Incompleta</option>' +
                    '<option @if(old('grau_escolaridade') == "pos_graduacao_incompleta") selected @endif value="pos_graduacao_incompleta">Pós-Gradução Incompleta</option>' +
                    '<option @if(old('grau_escolaridade') == "pos_graduacao_completa") selected @endif value="pos_graduacao_completa">Pós-Gradução Completa</option>' +
                    '<option @if(old('grau_escolaridade') == "mestrado_incompleto") selected @endif value="mestrado_incompleto">Mestrado Incompleto</option>' +
                    '<option @if(old('grau_escolaridade') == "mestrado_completo") selected @endif value="mestrado_completo">Mestrado Completo</option>' +
                    '<option @if(old('grau_escolaridade') == "doutorado_completo") selected @endif value="doutorado_completo">Doutorado Incompleto</option>' +
                    '<option @if(old('grau_escolaridade') == "doutorado_incompleto") selected @endif value="doutorado_incompleto">Doutorado Completo</option>' +
                '</select>' +
            '</div>' +
            '</div>' +
            '</div>' +
            '<div class="row">' +
            '<h3 class="subtitulo">Informações Complementares</h3>' +
            '@if(\Illuminate\Support\Facades\Auth::user()->tipo_usuario_id != 2)' +
            '<div class="col-sm-6">' +
            '<label>Experiência Prévia:<strong style="color: red">*</strong></label>' +
            '@endif' +
            '@if(\Illuminate\Support\Facades\Auth::user()->tipo_usuario_id == 2)' +
            '<div class="col-sm-15">' +
                '<label>Experiência Prévia:<strong style="color: red">*</strong></label>' +
                    '@if(old('experiencia_previa') == null)<br>' +
                        '<a class="btn btn-secondary" href="#">Não Enviado</a>' +
                    '@else' +
                        '<a class="btn btn-primary m-3" href="{{route('experiencias_previasColaborador.download', ['colaborador_id' => ['+ cont +']])}}">Baixar Experiência Prévia</a>' +
                    '@endif' +
            '@else' +
            '<input class="form-control @error('experiencia_previa') is-invalid @enderror" id="experiencia_previa" enctype="multipart/form-data" type="file" name="colaborador[' + cont + '][experiencia_previa]" value="{{ old('experiencia_previa') }}" @if(empty([' + cont + '][experiencia_previa])) style="width: 135px" @endif>' +
            '@error('experiencia_previa')' +
            '<span class="invalid-feedback" role="alert">' +
            '<strong>{{ $message }}</strong>' +
            '</span>' +
            '@enderror' +
            '@if(empty([' + cont + '][experiencia_previa])) <span style="border: 1px gray solid; border-radius: 10px; text-align: center; width: 180px; position: absolute; bottom: 0px; left: 155px; height: 38px; padding-top: 5px; background-color: #dcfadf">Um Arquivo Já Foi Enviado</span> @endif' +
            '</div>' +
            '@endif' +
            '@if(\Illuminate\Support\Facades\Auth::user()->tipo_usuario_id != 2)' +
            '<div class="col-sm-6">' +
            '<label>Termo de Responsabilidade:<strong style="color: red">*</strong></label>' +
            '@endif' +
            '@if(\Illuminate\Support\Facades\Auth::user()->tipo_usuario_id == 2)' +
            '<div class="col-sm-15 mt-2">' +
                '<label>Termo de Responsabilidade:<strong style="color: red">*</strong></label>' +
                '@if(old('termo_responsabilidade') == null)<br>' +
                        '<a class="btn btn-secondary" href="#">Não Enviado</a>' +
                    '@else' +
                        '<a class="btn btn-primary m-3" href="{{route('termo_responsabilidadeColaborador.download', ['colaborador_id' => ['+ cont +']])}}">Baixar Termo de Responsabilidade</a>' +
                    '@endif' +
            '@else' +
            '<input class="form-control @error('termo_responsabilidade') is-invalid @enderror" id="termo_responsabilidade" enctype="multipart/form-data" type="file" name="colaborador[' + cont + '][termo_responsabilidade]" value="{{ old('termo_responsabilidade') }}" @if(empty([' + cont + '][termo_responsabilidade])) style="width: 135px" @endif>' +
            '@error('termo_responsabilidade')' +
            '<span class="invalid-feedback" role="alert">' +
            '<strong>{{ $message }}</strong>' +
            '</span>' +
            '@enderror' +
            '@if(empty([' + cont + '][termo_responsabilidade])) <span style="border: 1px gray solid; border-radius: 10px; text-align: center; width: 180px; position: absolute; bottom: 0px; left: 155px; height: 38px; padding-top: 5px; background-color: #dcfadf">Um Arquivo Já Foi Enviado</span> @endif' +
            '</div>' +
            '@endif' +
            '<div class="col-m-11 mt-2">' +
            '<label for="treinamento">Treinamento:<strong style="color: red">*</strong></label>' +
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

    @if(isset($solicitacao->responsavel->colaboradores))
    @foreach($solicitacao->responsavel->colaboradores as $key => $colab)
    criarColaborador();
    $('#colab' + {{$key+1}}).find('#colab_id').val("{{$colab->id}}");
    $('#colab' + {{$key+1}}).find('#nome').val("{{$colab->nome}}");
    $('#colab' + {{$key+1}}).find('#email').val("{{$colab->contato->email}}");
    $('#colab' + {{$key+1}}).find('#cpf').val("{{$colab->cpf}}");
    $('#colab' + {{$key+1}}).find('#telefone').val("{{$colab->contato->telefone}}");
    $('#colab' + {{$key+1}}).find('#instituicao').val("{{$colab->instituicao->id}}");
    $('#colab' + {{$key+1}}).find('#grau_escolaridade').val("{{$colab->grau_escolaridade}}");
    $('#colab' + {{$key+1}}).find('#treinamento').val("{{$colab->treinamento}}");
    $('#colab' + {{$key+1}}).find('#experiencia_previa').val("{{$colab->experiencia_previa}}");
    $('#colab' + {{$key+1}}).find('#termo_responsabilidade').val("{{$colab->termo_responsabilidade}}");
    @endforeach
    @endif

</script>



