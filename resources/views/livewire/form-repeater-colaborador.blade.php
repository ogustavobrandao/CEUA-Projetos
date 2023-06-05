<div class="card p-3 bg-white">
    <form id="form2" method="POST" action="{{route('solicitacao.colaborador.criar')}}">
        @csrf
        <input type="hidden" name="solicitacao_id" value="{{$solicitacao->id}}">
        @if($colaboradores != null)
        @foreach ($colaboradores as $colaborador)
            <div class="mt-2">
                <div class="row">
                    <div class="col-12">
                        <h3 style="font-weight: bold;">Colaborador {{$loop->iteration}}
                            @if(!isset($disabled))
                                <a type="button" wire:click="removerColaborador({{$loop->index}})">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="#fe0303" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polyline points="3 6 5 6 21 6"></polyline><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path><line x1="10" y1="11" x2="10" y2="17"></line><line x1="14" y1="11" x2="14" y2="17"></line></svg>
                                </a>
                            @endif
                        </h3>
                    </div>
                    <div class="col-12">
                        <div class="row">
                            <h3 class="subtitulo">Informações Pessoais / Contato</h3>
                            <div class="col-sm-4">
                                <input type="hidden" id="colab_id" name="colaborador[{{$loop->index}}][colab_id]" value="{{$colaborador->id}}">
                                <label for="nome">Nome Completo:<strong style="color: red">*</strong></label>
                                <input class="form-control @error('colaborador[{{$loop->index}}][nome]') is-invalid @enderror" id="nome" type="text" name="colaborador[{{$loop->index}}][nome]" value="{{ old('colaborador['.$loop->index.'][nome]', $colaborador->nome) }}" required autocomplete="nome" autofocus>
                                @error('colaborador[{{$loop->index}}][nome]')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="col-sm-4">
                                <label for="nome">E-mail:<strong style="color: red">*</strong></label>
                                <input class="form-control @error('colaborador[{{$loop->index}}][email]') is-invalid @enderror" type="email" name="colaborador[{{$loop->index}}][email]" value="{{ old('colaborador['.$loop->index.'][email]', $colaborador->contato?->email) }}" required autocomplete="email" autofocus>
                                @error('colaborador[{{$loop->index}}][email]')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="col-sm-4">
                                <label for="cpf">CPF:<strong style="color: red">*</strong></label>
                                <input class="form-control @error('colaborador[{{$loop->index}}][cpf]') is-invalid @enderror" type="cpf" name="colaborador[{{$loop->index}}][cpf]" value="{{ old('colaborador['.$loop->index.'][cpf]', $colaborador->cpf) }}" required autocomplete="cpf" autofocus>
                                @error('colaborador[{{$loop->index}}][cpf]')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="col-sm-4 mt-2">
                                <label for="telefone">Telefone:<strong style="color: red">*</strong></label>
                                <input class="form-control @error('colaborador[{{$loop->index}}][telefone]') is-invalid @enderror" type="text" name="colaborador[{{$loop->index}}][telefone]" value="{{ old('colaborador['.$loop->index.'][telefone]', $colaborador->contato?->telefone) }}" required autocomplete="telefone" autofocus>
                                @error('colaborador[{{$loop->index}}][telefone]')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="col-md-12">
                                <h3 class="subtitulo">Informações Institucionais</h3>
                                <div class="row">
                                    <div class="col-sm-6">
                                        <label for="instituicao">Instituicão:<strong style="color: red">*</strong></label>
                                        <select class="form-control" name="colaborador[{{$loop->index}}][instituicao_id]" onchange="unidades()">
                                            <option disabled selected>Selecione uma Instituição</option>
                                            @foreach($instituicaos as $instituicao)
                                                <option @selected(old('colaborador[{{$loop->index}}][instituicao_id]', $colaborador->instituicao_id)) value="{{$instituicao->id}}">{{$instituicao->nome}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-sm-6">
                                        <label for="grau_escolaridade">Grau de Escolaridade:<strong style="color: red">*</strong></label>
                                        <select class="form-control" id="grau_escolaridade" name="colaborador[{{$loop->index}}][grau_escolaridade]">
                                            <option disabled selected>Selecione um Grau de Escolaridade</option>
                                            <option @selected(old('colaborador[{{$loop->index}}][grau_escolaridade]', $colaborador->grau_escolaridade) == "graduacao_completa") value="graduacao_completa">Graduação Completa</option>
                                            <option @selected(old('colaborador[{{$loop->index}}][grau_escolaridade]', $colaborador->grau_escolaridade) == "graduacao_incompleta") value="graduacao_incompleta">Graduação Incompleta</option>
                                            <option @selected(old('colaborador[{{$loop->index}}][grau_escolaridade]', $colaborador->grau_escolaridade) == "pos_graduacao_incompleta") value="pos_graduacao_incompleta">Pós-Gradução Incompleta</option>
                                            <option @selected(old('colaborador[{{$loop->index}}][grau_escolaridade]', $colaborador->grau_escolaridade) == "pos_graduacao_completa") value="pos_graduacao_completa">Pós-Gradução Completa</option>
                                            <option @selected(old('colaborador[{{$loop->index}}][grau_escolaridade]', $colaborador->grau_escolaridade) == "mestrado_incompleto") value="mestrado_incompleto">Mestrado Incompleto</option>
                                            <option @selected(old('colaborador[{{$loop->index}}][grau_escolaridade]', $colaborador->grau_escolaridade) == "mestrado_completo") value="mestrado_completo">Mestrado Completo</option>
                                            <option @selected(old('colaborador[{{$loop->index}}][grau_escolaridade]', $colaborador->grau_escolaridade) == "doutorado_completo") value="doutorado_completo">Doutorado Incompleto</option>
                                            <option @selected(old('colaborador[{{$loop->index}}][grau_escolaridade]', $colaborador->grau_escolaridade) == "doutorado_incompleto") value="doutorado_incompleto">Doutorado Completo</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="row">
                                    <h3 class="subtitulo">Informações Complementares</h3>
                                    <div class="col-sm-6">
                                        <label>Experiência Prévia:<strong style="color: red">*</strong></label>
                                        @if(auth()->user()->tipo_usuario_id == 2)
                                            @if($colaborador->experiencia_previa == null)<br>
                                                <a class="btn btn-secondary" href="#">Não Enviado</a>
                                            @else
                                                <a class="btn btn-primary m-3" href="{{route('experiencias_previasColaborador.download', ['colaborador_id' => $colaborador->id])}}">Baixar Experiência Prévia</a>
                                            @endif
                                        @else
                                            <input @if($colaborador->experiencia_previa == null) required @endif class="form-control @error('colaborador[{{$loop->index}}][experiencia_previa]') is-invalid @enderror" id="experiencia_previa" enctype="multipart/form-data" type="file" name="colaborador[{{$loop->index}}][experiencia_previa]" @if(($colaborador->experiencia_previa) != null) style="width: 135px" @endif>
                                            @error('colaborador[{{$loop->index}}][experiencia_previa]')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                            @if($colaborador->experiencia_previa != null)
                                                <span style="border: 1px gray solid; border-radius: 10px; text-align: center; width: 180px; position: absolute; bottom: 0px; left: 155px; height: 38px; padding-top: 5px; background-color: #dcfadf">Um Arquivo Já Foi Enviado</span>
                                            @endif
                                        @endif
                                    </div>
                                    <div class="col-sm-6">
                                        <label>Termo de Responsabilidade:<strong style="color: red">*</strong></label>
                                        @if(auth()->user()->tipo_usuario_id == 2)
                                            @if($colaborador->termo_responsabilidade == null)<br>
                                                <a class="btn btn-secondary" href="#">Não Enviado</a>
                                            @else
                                                <a class="btn btn-primary m-3" href="{{route('termo_responsabilidadeColaborador.download', ['colaborador_id' => $colaborador->id])}}">Baixar Termo de Responsabilidade</a>
                                            @endif
                                        @else
                                            <input @if($colaborador->termo_responsabilidade == null) required @endif class="form-control @error('colaborador[{{$loop->index}}][termo_responsabilidade]') is-invalid @enderror" id="termo_responsabilidade" enctype="multipart/form-data" type="file" name="colaborador[{{$loop->index}}][termo_responsabilidade]" @if($colaborador->termo_responsabilidade != null) style="width: 135px" @endif>
                                            @error('colaborador[{{$loop->index}}][termo_responsabilidade]')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                            @if($colaborador->termo_responsabilidade != null)
                                                <span style="border: 1px gray solid; border-radius: 10px; text-align: center; width: 180px; position: absolute; bottom: 0px; left: 155px; height: 38px; padding-top: 5px; background-color: #dcfadf">Um Arquivo Já Foi Enviado</span>
                                            @endif
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12 mt-2">
                                <label for="treinamento">Treinamento:<strong style="color: red">*</strong></label>
                                <input class="form-control @error('colaborador[{{$loop->index}}][treinamento]') is-invalid @enderror" type="text" name="colaborador[{{$loop->index}}][treinamento]" value="{{ old('colaborador['.$loop->index.'][treinamento]', $colaborador->treinamento) }}" required autocomplete="treinamento" autofocus>
                                @error('colaborador[{{$loop->index}}][treinamento]')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
        @include('component.botoes_new_form')
        @endif
    </form>
</div>
