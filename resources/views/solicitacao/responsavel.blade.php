<div class="card shadow-lg p-3 bg-white" style="border-radius: 0px 0px 10px 10px">
    @if($solicitacao->status == 'avaliado' && $solicitacao->avaliacao->first()->status == 'aprovadaPendencia')
        <a type="button" class="btn btn-info text-start" style="position: absolute;pointer-events: all;z-index:10;" data-toggle="modal" data-target="#pendenciaVisuModal" title="Pendência"><img src="{{asset('images/pendencia.svg')}}" width="30px"></a>
    @endif

    <form id="form1" method="POST" action="{{route('solicitacao.responsavel.criar')}}">
        @csrf
        <input type="hidden" name="solicitacao_id" value="{{$solicitacao->id}}">
        <div class="row">
            <h3 class="subtitulo">Informações Pessoais/Contato</h3>
            <div class="col-sm-4">
                <label for="nome">Nome Completo:</label>
                <input class="form-control @error('nome') is-invalid @enderror" id="nome" type="text" name="nome"
                       value="@if(!empty($responsavel) && $responsavel->nome != null){{$responsavel->nome}}@else{{old('nome')}}@endif" required autocomplete="nome" autofocus>
                @error('nome')
                <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
                @enderror
            </div>

            <div class="col-sm-4">
                <label for="nome">E-mail:</label>
                <input class="form-control @error('email') is-invalid @enderror" id="email" type="email" name="email"
                       value="@if(!empty($responsavel) && $responsavel->contato->email != null){{$responsavel->contato->email}} @else {{old('email')}} @endif" required autocomplete="email" autofocus>
                @error('email')
                <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
                @enderror
            </div>

            <div class="col-sm-4">
                <label for="telefone">Telefone:</label>
                <input class="form-control @error('telefone') is-invalid @enderror" id="telefone" type="text" name="telefone"
                       value="@if(!empty($responsavel) && $responsavel->contato->telefone != null){{$responsavel->contato->telefone}} @else{{old('telefone') }} @endif" required autocomplete="telefone" autofocus>
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
                    <select class="form-control" id="instituicao" name="instituicao_id" onchange="unidades('')">
                        <option disabled selected>Selecione uma Instituição</option>
                        @foreach($instituicaos as $instituicao)
                            <option @if(!empty($responsavel) && $responsavel->departamento->unidade->instituicao->id == $instituicao->id) selected @endif value="{{$instituicao->id}}">{{$instituicao->nome}}</option>
                        @endforeach
                    </select>
                </div>

                <div class="col-sm-6">
                    <label for="vinculo_instituicao">Vinculo:</label>
                    <select class="form-control" id="vinculo_instituicao" name="vinculo_instituicao">
                        <option disabled selected>Selecione um Vinculo</option>
                        <option @if(old('vinculo_instituicao') == "pesquisador_docente" || !empty($responsavel) && $responsavel->vinculo_instituicao == "pesquisador_docente") selected @endif value="pesquisador_docente">Docente/Pesquisador</option>
                        <option @if(old('vinculo_instituicao') == "pesquisador_ic" || !empty($responsavel) && $responsavel->vinculo_instituicao == "pesquisador_ic") selected @endif value="pesquisador_ic">Pesquisador/Iniciação científica</option>
                        <option @if(old('vinculo_instituicao') == "pesquisador_pos_graduando" || !empty($responsavel) && $responsavel->vinculo_instituicao == "pesquisador_pos_graduando") selected @endif value="pesquisador_pos_graduando">Pesquisador/Pós - graduando</option>
                        <option @if(old('vinculo_instituicao') == "pesquisador_tecnico_superior" || !empty($responsavel) && $responsavel->vinculo_instituicao == "pesquisador_tecnico_superior") selected @endif value="pesquisador_tecnico_superior">Pesquisador/Técnico Nível Superior</option>
                    </select>
                </div>
            </div>
            <div class="row mt-2">
                <div class="col-sm-6">
                    <label for="unidade">Unidade:</label>
                    <select class="form-control" id="unidade" name="unidade_id" onchange="departamentos()">
                        <option disabled selected>Selecione uma Unidade</option>
                        @if(isset($responsavel))
                            <option value="{{$responsavel->departamento->unidade->id}}" selected>{{$responsavel->departamento->unidade->nome}}</option>
                        @endif
                    </select>
                </div>

                <div class="col-sm-6">
                    <label for="departamento">Departamento:</label>
                    <select class="form-control" id="departamento" name="departamento_id">
                        <option disabled selected>Selecione um Departamento</option>
                        @if(isset($responsavel))
                            <option value="{{$responsavel->departamento->id}}" selected>{{$responsavel->departamento->nome}}</option>
                        @endif
                    </select>
                </div>
            </div>

        </div>

        <div class="row">
            <h3 class="subtitulo">Informações Complementares</h3>
            <div class="col-sm-2">
                <label for="experiencia">Experiência Prévia:</label>
                <div class="row ml-1 mt-2">
                    <div class="col-sm-6">
                        <input class="form-check-input" type="radio" name="experiencia_previa_radio" id="experiencia_previa_sim" @if(!empty($responsavel) && $responsavel->experiencia_previa == true) checked @endif>
                        <label class="form-check-label" for="experiencia_previa">Sim</label>
                    </div>
                    <div class="col-sm-6">
                        <input class="form-check-input" type="radio" name="experiencia_previa_radio" id="experiencia_previa_nao" @if(!empty($responsavel) && $responsavel->experiencia_previa == false || empty($responsavel)) checked @endif>
                        <label class="form-check-label" for="experiencia_previa">
                            Não
                        </label>
                    </div>
                </div>
            </div>
            <div class="col-sm-4" id="anexo_experiencia" style="display: none;">
                <label for="experiencia_previa">Anexo Experiência Prévia:</label>
                <input class="form-control @error('experiencia_previa') is-invalid @enderror" id="anexo_experiencia_previa" type="file" name="experiencia_previa"
                       value="{{old('experiencia_previa')}}" autocomplete="treinamento" autofocus disabled required>
                @error('experiencia_previa')
                <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div class="col-sm-2">
                <label for="experiencia">Treinamento:</label>
                <div class="row ml-1 mt-2">
                    <div class="col-sm-6">
                        <input class="form-check-input" type="radio" name="treinamento_radio" id="treinamento_sim" @if(!empty($responsavel) && $responsavel->treinamento == true) checked @endif>
                        <label class="form-check-label" for="treinamento">Sim</label>
                    </div>
                    <div class="col-sm-6">
                        <input class="form-check-input" type="radio" name="treinamento_radio" id="treinamento_nao" @if(!empty($responsavel) && $responsavel->treinamento == false || $responsavel == null) checked @endif>
                        <label class="form-check-label" for="treinamento">
                            Não
                        </label>
                    </div>
                </div>
            </div>
            <div class="col-sm-4" id="anexo_treinamento" style="display: none;">
                <label for="telefone">Anexo Treinamento:</label>
                <input class="form-control @error('treinamento') is-invalid @enderror" id="treinamento" type="file" name="treinamento"
                       value="{{old('treinamento')}}" autocomplete="treinamento" autofocus disabled required>
                @error('treinamento')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

        </div>

        @include('component.botoes_form')

    </form>

</div>


<script>

    $(document).ready(function () {
        @if(!empty($resultado) && $resultado->abate != null)
            $("#treinamento_sim").attr('checked', true);
            $("#treinamento_sim").click();
        @else
            $("#treinamento_nao").attr('checked', true);
        @endif

        @if(!empty($resultado) && $resultado->abate != null)
        $("#experiencia_previa_sim").attr('checked', true);
        $("#experiencia_previa_sim").click();
        @else
        $("#experiencia_previa_nao").attr('checked', true);
        @endif
    });

    $( "#treinamento_sim" ).click(function() {
        $("#anexo_treinamento").show().find('input, textarea').prop('disabled', false);
    });
    $( "#treinamento_nao" ).click(function() {
        $("#anexo_treinamento").hide().find('input, textarea').prop('disabled', true);
    });

    $( "#experiencia_previa_sim" ).click(function() {
        $("#anexo_experiencia").show().find('input, textarea').prop('disabled', false);
    });
    $( "#experiencia_previa_nao" ).click(function() {
        $("#anexo_experiencia").hide().find('input, textarea').prop('disabled', true);
    });
</script>
