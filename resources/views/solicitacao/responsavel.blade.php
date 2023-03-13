<div class="card shadow-lg p-3 bg-white" style="border-radius: 0px 0px 10px 10px">

    <form id="form1" method="POST" action="{{route('solicitacao.responsavel.criar')}}" enctype="multipart/form-data">
        @csrf
        <input type="hidden" name="solicitacao_id" value="{{$solicitacao->id}}">
        <div class="row">
            <h3 class="subtitulo">Informações Pessoais / Contato</h3>
            <div class="col-sm-4">
                <label for="nome">Nome Completo:<strong style="color: red">*</strong></label>
                <input class="form-control @error('nome') is-invalid @enderror" id="nome" type="text" name="nome"
                       value="@if(!empty($solicitacao->responsavel) && $solicitacao->responsavel->nome != null){{$solicitacao->responsavel->nome}}@else{{old('nome')}}@endif"
                       required autocomplete="nome" autofocus>
                @error('nome')
                <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
                @enderror
            </div>

            <div class="col-sm-4">
                <label for="nome">E-mail:<strong style="color: red">*</strong></label>
                <input class="form-control @error('email') is-invalid @enderror" id="email" type="email" name="email"
                       value="@if(!empty($solicitacao->responsavel) && $solicitacao->responsavel->contato->email != null){{$solicitacao->responsavel->contato->email}} @else {{old('email')}} @endif"
                       required autocomplete="email" autofocus>
                @error('email')
                <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
                @enderror
            </div>

            <div class="col-sm-4">
                <label for="telefone">Telefone:<strong style="color: red">*</strong></label>
                <input class="form-control @error('telefone') is-invalid @enderror" id="telefone" type="text"
                       name="telefone"
                       value="@if(!empty($solicitacao->responsavel) && $solicitacao->responsavel->contato->telefone != null){{$solicitacao->responsavel->contato->telefone}} @else{{old('telefone') }} @endif"
                       required autocomplete="telefone" autofocus>
                @error('telefone')
                <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
                @enderror
            </div>

            <div class="col-sm-4">
                <label for="cpf">CPF:<strong style="color: red">*</strong></label>
                <input class="form-control @error('cpf') is-invalid @enderror" id="cpf" type="text"
                       name="cpf"
                       value="@if(!empty($solicitacao->responsavel) && $solicitacao->responsavel->cpf != null){{$solicitacao->responsavel->cpf}} @else{{old('cpf') }} @endif"
                       required autocomplete="cpf" autofocus>
                @error('cpf')
                <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
                @enderror
            </div>

        </div>

        <div>
            <h3 class="subtitulo">Informações Institucionais</h3>
            <div class="row">
                <div class="col-sm-4">
                    <label for="instituicao">Instituição:<strong style="color: red">*</strong></label>
                    <select class="form-control" id="instituicao" name="instituicao_id" onchange="unidades('')" required>
                        <option disabled selected>Selecione uma Instituição</option>
                        @foreach($instituicaos as $instituicao)
                            <option
                                @if(!empty($solicitacao->responsavel) && $solicitacao->responsavel->departamento->unidade->instituicao->id == $instituicao->id) selected
                                @endif value="{{$instituicao->id}}">{{$instituicao->nome}}</option>
                        @endforeach
                    </select>
                </div>

                <div class="col-sm-4">
                    <label for="unidade">Unidade:<strong style="color: red">*</strong></label>
                    <select class="form-control" id="unidade" name="unidade_id" onchange="departamentos()" required>
                        <option disabled selected>Selecione uma Unidade</option>
                        @if(isset($solicitacao->responsavel))
                            <option value="{{$solicitacao->responsavel->departamento->unidade->id}}"
                                    selected>{{$solicitacao->responsavel->departamento->unidade->nome}}</option>
                        @endif
                    </select>
                </div>

                <div class="col-sm-4">
                    <label for="departamento">Departamento:<strong style="color: red">*</strong></label>
                    <select class="form-control" id="departamento" name="departamento_id" required>
                        <option disabled selected>Selecione um Departamento</option>
                        @if(isset($solicitacao->responsavel))
                            <option value="{{$solicitacao->responsavel->departamento->id}}"
                                    selected>{{$solicitacao->responsavel->departamento->nome}}</option>
                        @endif
                    </select>
                </div>

            </div>
            <div class="row mt-2">
                <div class="col-sm-6">
                    <label for="vinculo_instituicao">Vínculo:<strong style="color: red">*</strong></label>
                    <select class="form-control" id="vinculo_instituicao" name="vinculo_instituicao" required>
                        <option disabled selected>Selecione um Vinculo</option>
                        <option
                            @if(old('vinculo_instituicao') == "pesquisador_docente" || !empty($solicitacao->responsavel) && $solicitacao->responsavel->vinculo_instituicao == "pesquisador_docente") selected
                            @endif value="pesquisador_docente">Docente/Pesquisador
                        </option>
                        <option
                            @if(old('vinculo_instituicao') == "pesquisador_pos_graduando" || !empty($solicitacao->responsavel) && $solicitacao->responsavel->vinculo_instituicao == "pesquisador_pos_graduando") selected
                            @endif value="pesquisador_pos_graduando">Pesquisador/Pós - graduando
                        </option>
                        <option
                            @if(old('vinculo_instituicao') == "pesquisador_tecnico_superior" || !empty($solicitacao->responsavel) && $solicitacao->responsavel->vinculo_instituicao == "pesquisador_tecnico_superior") selected
                            @endif value="pesquisador_tecnico_superior">Pesquisador/Técnico Nível Superior
                        </option>
                        <option
                            @if(old('vinculo_instituicao') == "pesquisador_graduacao_incompleto" || !empty($solicitacao->responsavel) && $solicitacao->responsavel->vinculo_instituicao == "pesquisador_graduacao_incompleto") selected
                            @endif value="pesquisador_tecnico_superior">Pesquisador/Graduação Incompleta
                        </option>
                    </select>
                </div>

                <div class="col-sm-6">
                    <label for="grau_escolaridade">Grau de Escolaridade:<strong style="color: red">*</strong></label>
                    <select class="form-control" id="grau_escolaridade" name="grau_escolaridade" required>
                        <option disabled selected>Selecione um Grau de Escolaridade</option>
                        <option
                            @if(old('grau_escolaridade') == "graduacao_completa" || !empty($solicitacao->responsavel) && $solicitacao->responsavel->grau_escolaridade == "graduacao_completa") selected
                            @endif value="graduacao_completa">Graduação Completa
                        </option>
                        <option
                            @if(old('grau_escolaridade') == "graduacao_incompleta" || !empty($solicitacao->responsavel) && $solicitacao->responsavel->grau_escolaridade == "graduacao_incompleta") selected
                            @endif value="graduacao_incompleta">Graduação Incompleta
                        </option>
                        <option
                            @if(old('grau_escolaridade') == "pos_graduacao_incompleta" || !empty($solicitacao->responsavel) && $solicitacao->responsavel->grau_escolaridade == "pos_graduacao_incompleta") selected
                            @endif value="pos_graduacao_incompleta">Pós-Gradução Incompleta
                        </option>
                        <option
                            @if(old('grau_escolaridade') == "pos_graduacao_completa" || !empty($solicitacao->responsavel) && $solicitacao->responsavel->grau_escolaridade == "pos_graduacao_completa") selected
                            @endif value="pos_graduacao_completa">Pós-Gradução Completa
                        </option>
                        <option
                            @if(old('grau_escolaridade') == "mestrado_incompleto" || !empty($solicitacao->responsavel) && $solicitacao->responsavel->grau_escolaridade == "mestrado_incompleto") selected
                            @endif value="mestrado_incompleto">Mestrado Incompleto
                        </option>
                        <option
                            @if(old('grau_escolaridade') == "mestrado_completo" || !empty($solicitacao->responsavel) && $solicitacao->responsavel->grau_escolaridade == "mestrado_completo") selected
                            @endif value="mestrado_completo">Mestrado Completo
                        </option>
                        <option
                            @if(old('grau_escolaridade') == "doutorado_completo" || !empty($solicitacao->responsavel) && $solicitacao->responsavel->grau_escolaridade == "doutorado_completo") selected
                            @endif value="doutorado_completo">Doutorado Incompleto
                        </option>
                        <option
                            @if(old('grau_escolaridade') == "doutorado_incompleto" || !empty($solicitacao->responsavel) && $solicitacao->responsavel->grau_escolaridade == "doutorado_incompleto") selected
                            @endif value="doutorado_incompleto">Doutorado Completo
                        </option>
                    </select>
                </div>
            </div>

        </div>

        <div class="row">
            <h3 class="subtitulo">Informações Complementares</h3>
            <div class="col-sm-2">
                <label for="experiencia">Experiência Prévia:</label>
                @if(\Illuminate\Support\Facades\Auth::user()->tipo_usuario_id == 2)
                    @if($solicitacao->responsavel->experiencia_previa == null)
                        <a class="btn btn-secondary"
                           href="#">Não Enviado</a>
                    @else
                    <div class="col-sm-9" id="anexo_experiencia" style="display: none;">
                        <label>Descreva sua Experiência Prévia:</label>
                        <textarea class="form-control @error('experiencia_previa') is-invalid @enderror" name="experiencia_previa" id="experiencia_previa" autocomplete="experiencia_previa" autofocus
                          required>@if(!empty($solicitacao->responsavel) && $solicitacao->responsavel->experiencia_previa != null){{$solicitacao->responsavel->experiencia_previa}}@else{{old('experiencia_previa')}}@endif</textarea>
                    @endif
                    </div>
            @else
                <div class="row ml-1 mt-2">
                    <div class="col-sm-6">
                        <input class="form-check-input" type="radio" name="experiencia_previa_radio"
                               id="experiencia_previa_sim"
                               @if(!empty($solicitacao->responsavel) && $solicitacao->responsavel->experiencia_previa != null) checked @endif>
                        <label class="form-check-label" for="experiencia_previa_sim">Sim</label>
                    </div>
                    <div class="col-sm-6">
                        <input class="form-check-input" type="radio" name="experiencia_previa_radio"
                               id="experiencia_previa_nao"
                               @if(!empty($solicitacao->responsavel) && $solicitacao->responsavel->experiencia_previa == null || empty($solicitacao->responsavel)) checked
                               @endif value="false">
                        <label class="form-check-label" for="experiencia_previa_nao">
                            Não
                        </label>
                    </div>
                </div>
            </div>
        {{-- <div class="col-sm-4" id="anexo_experiencia" style="display: none;">
            <label>Anexar Comprovante de Experiência Prévia:</label>
            <input class="form-control @error('experiencia_previa') is-invalid @enderror"
                   id="experiencia_previa"
                   type="file" name="experiencia_previa"
                   value="" autocomplete="experiencia_previa"
                   @if(isset($solicitacao->responsavel) && $solicitacao->responsavel->experiencia_previa != null) style="width: 135px" @endif >
            @error('experiencia_previa')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
            @if(isset($solicitacao->responsavel) && $solicitacao->responsavel->experiencia_previa != null)
                <span
                    style="border: 1px gray solid; border-radius: 10px; text-align: center; width: 250px; position: absolute; bottom: 0px; left: 155px; height: 38px; padding-top: 5px; background-color: #dcfadf">Um Arquivo Já Foi Enviado</span>
            @endif
        </div> --}}
        <div class="col-sm-9" id="anexo_experiencia" style="display: none;">
            <label>Descreva sua Experiência Prévia:</label>
            <textarea class="form-control @error('experiencia_previa') is-invalid @enderror" name="experiencia_previa" id="experiencia_previa" autocomplete="experiencia_previa" autofocus
                      required> @if(!empty($solicitacao->responsavel) && $solicitacao->responsavel->experiencia_previa != null){{$solicitacao->responsavel->experiencia_previa}}@else{{old('experiencia_previa')}}@endif </textarea>
            @error('experiencia_previa')
            <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
            @enderror
        </div>
        @endif
        
        <div class="col-sm-2">
            <label>Treinamento:</label>
            @if(\Illuminate\Support\Facades\Auth::user()->tipo_usuario_id == 2)
                @if($solicitacao->responsavel->treinamento == null)
                    <br>
                    <a class="btn btn-secondary"
                       href="#">Não Enviado</a>
                @else
                <div class="col-sm-9" id="treinamento" style="display: none;">
                    <label>Descreva seu Treinamento:</label>
                    <textarea class="form-control @error('treinamento') is-invalid @enderror" name="treinamento" id="treinamento" autocomplete="treinamento" autofocus
                          required>@if(!empty($solicitacao->responsavel) && $solicitacao->responsavel->treinamento != null){{$solicitacao->responsavel->treinamento}}@else{{old('treinamento')}}@endif</textarea>
                @endif
        </div>
            @else
            <div class="row ml-1 mt-2">
                <div class="col-sm-6">
                    <input class="form-check-input" type="radio" name="treinamento_radio" id="treinamento_sim"
                           @if(!empty($solicitacao->responsavel) && $solicitacao->responsavel->treinamento != null) checked @endif>
                    <label class="form-check-label" for="treinamento">Sim</label>
                </div>
                <div class="col-sm-6">
                    <input class="form-check-input" type="radio" name="treinamento_radio" id="treinamento_nao"
                           @if(!empty($solicitacao->responsavel) && $solicitacao->responsavel->treinamento == null || $solicitacao->responsavel == null) checked
                           @endif value="false">
                    <label class="form-check-label" for="treinamento">
                        Não
                    </label>
                </div>
            </div>
        </div>
{{-- <div class="col-sm-4" id="treinamento" style="display: none;">
    <label>Anexar Comprovante de Treinamento:</label>
    <input class="form-control @error('treinamento') is-invalid @enderror"
           id="treinamento"
           type="file" name="treinamento"
           value="" autocomplete="treinamento"
           @if(isset($solicitacao->responsavel) && $solicitacao->responsavel->treinamento != null) style="width: 135px" @endif>
    @error('treinamento')
    <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
    @enderror
    @if(isset($solicitacao->responsavel) && $solicitacao->responsavel->treinamento != null)
        <span
            style="border: 1px gray solid; border-radius: 10px; text-align: center; width: 250px; position: absolute; bottom: 0px; left: 155px; height: 38px; padding-top: 5px; background-color: #dcfadf">Um Arquivo Já Foi Enviado</span>
    @endif
</div> --}}
        <div class="col-sm-9" id="treinamento" style="display: none;">
            <label>Descreva seu Treinamento:</label>
            <textarea class="form-control @error('treinamento') is-invalid @enderror" name="treinamento" id="treinamento" autocomplete="treinamento" autofocus
            required> @if(!empty($solicitacao->responsavel) && $solicitacao->responsavel->treinamento != null){{$solicitacao->responsavel->treinamento}}@else{{old('treinamento')}}@endif </textarea>
            @error('treinamento')
            <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
            @enderror
        </div>
        @endif

        <div class="col-sm-2">
            <label>Termo de Responsabilidade:</label>
            @if(\Illuminate\Support\Facades\Auth::user()->tipo_usuario_id == 2)
                @if($solicitacao->responsavel->termo_responsabilidade == null)
                    <br>
                    <a class="btn btn-secondary"
                       href="#">Não Enviado</a>
                @else
                     <a class="btn btn-primary"
                           href="{{route('termo_responsabilidade.downloadTermoResponsabilidade', ['responsavel_id' => $solicitacao->responsavel->id])}}">Baixar
                            Termo de Responsabilidade</a>
                @endif
        </div>
            @else
            <div class="row ml-1 mt-2">
                <div class="col-sm-6">
                    <input class="form-check-input" type="radio" name="termo_responsabilidade_radio" id="termo_responsabilidade_sim"
                           @if(!empty($solicitacao->responsavel) && $solicitacao->responsavel->termo_responsabilidade != null) checked @endif>
                    <label class="form-check-label" for="termo_responsabilidade">Sim</label>
                </div>
                <div class="col-sm-6">
                    <input class="form-check-input" type="radio" name="termo_responsabilidade_radio" id="termo_responsabilidade_nao"
                           @if(!empty($solicitacao->responsavel) && $solicitacao->responsavel->termo_responsabilidade == null || $solicitacao->responsavel == null) checked
                           @endif value="false">
                    <label class="form-check-label" for="termo_responsabilidade">
                        Não
                    </label>
                </div>
            </div>
        </div>
        <div class="col-sm-4" id="anexo_termo_responsabilidade" style="display: none;">
            <label>Anexar Termo de Responsabilidade:</label>
            <li><a href="" target="blank">Modelo Termo de Responsabilidade</a> </li>
            <input class="form-control @error('termo_responsabilidade') is-invalid @enderror"
                id="termo_responsabilidade"
                type="file" name="termo_responsabilidade"
                value="" autocomplete="termo_responsabilidade"
                @if(isset($solicitacao->responsavel) && $solicitacao->responsavel->termo_responsabilidade != null) style="width: 135px" @endif>
            @error('termo_responsabilidade')
            
            <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
            @enderror
            @if(isset($solicitacao->responsavel) && $solicitacao->responsavel->termo_responsabilidade != null)
                <span
                    style="border: 1px gray solid; border-radius: 10px; text-align: center; width: 250px; position: absolute; bottom: 0px; left: 155px; height: 38px; padding-top: 5px; background-color: #dcfadf">Um Arquivo Já Foi Enviado</span>
            @endif
        </div>
        @endif

        </div>

        

@include('component.botoes_new_form')

</form>

</div>


<script>

    $(document).ready(function () {
        @if(!empty($solicitacao->responsavel) && $solicitacao->responsavel->treinamento != null)
        $("#treinamento_sim").attr('checked', true);
        $("#treinamento_sim").click();
        @else
        $("#treinamento_nao").attr('checked', true);
        @endif

        @if(!empty($solicitacao->responsavel) && $solicitacao->responsavel->experiencia_previa != null)
        $("#experiencia_previa_sim").attr('checked', true);
        $("#experiencia_previa_sim").click();
        @else
        $("#experiencia_previa_nao").attr('checked', true);
        @endif

        @if(!empty($solicitacao->responsavel) && $solicitacao->responsavel->termo_responsabilidade != null)
        $("#termo_responsabilidade_sim").attr('checked', true);
        $("#termo_responsabilidade_sim").click();
        @else
        $("#termo_responsabilidade_nao").attr('checked', true);
        @endif
        
    });

    $("#treinamento_sim").click(function () {
        $("#treinamento").show().find('input, textarea').prop('disabled', false);
        @if(isset($solicitacao->responsavel) && $solicitacao->responsavel->treinamento == null)
        $("#treinamento").prop('required', true);
        @endif
    });
    $("#treinamento_nao").click(function () {
        $("#treinamento").hide().find('input, textarea').prop('disabled', true);
        $("#treinamento").prop('required', false);
    });

    $("#experiencia_previa_sim").click(function () {
        $("#anexo_experiencia").show().find('input, textarea').prop('disabled', false);
        @if(isset($solicitacao->responsavel) && $solicitacao->responsavel->experiencia_previa == null)
        $("#experiencia_previa").prop('required', true);
        @endif

    });
    $("#experiencia_previa_nao").click(function () {
        $("#anexo_experiencia").hide().find('input, textarea').prop('disabled', true);

        $("#experiencia_previa").prop('required', false);

    });



    $("#termo_responsabilidade_sim").click(function () {
        $("#anexo_termo_responsabilidade").show().find('input, textarea').prop('disabled', false);
        @if(isset($solicitacao->responsavel) && $solicitacao->responsavel->termo_responsabilidade == null)
        $("#termo_responsabilidade").prop('required', true);
        @endif
    });

    $("#termo_responsabilidade_nao").click(function () {
        $("#anexo_termo_responsabilidade").hide().find('input, textarea').prop('disabled', true);
        $("#termo_responsabilidade").prop('required', false);
    });

    
</script>
