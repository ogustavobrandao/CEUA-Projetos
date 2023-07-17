<!-- Modal -->
<div class="modal fade" id="modalEditarColaborador{{$colaborador->id}}" tabindex="-1" role="dialog" aria-labelledby="modalEditarColaboradorLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalEditarColaboradorLabel">Editar Colaborador</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <!-- Conteúdo do formulário para adicionar colaboradores -->

            <form id="form2" method="POST" action="{{route('solicitacao.colaborador.editar')}}" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="solicitacao_id" value="{{$solicitacao->id}}">
                <input type="hidden" name="colaborador_id" value="{{$colaborador->id}}">
                <div class="modal-body">
                    <div class="mt-2">
                        <h3 class="h5">Informações Pessoais / Contato</h3>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="nome">Nome:</label>
                                    <input type="text" name="nome" class="form-control" id="nome" placeholder="Digite o nome do colaborador" value="{{$colaborador->nome}}">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="email">E-mail:</label>
                                    <input type="email" name="email" class="form-control" id="email" placeholder="Digite o e-mail do colaborador" value="{{$colaborador->contato->email ?? 'Não informado'}}">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="cpf">CPF:</label>
                                    <input type="text" name="cpf" class="form-control" id="cpf" placeholder="Digite o CPF do colaborador" value="{{$colaborador->cpf}}">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="telefone">Telefone:</label>
                                    <input type="text" name="telefone" class="form-control" id="telefone" placeholder="Digite o telefone do colaborador" value="{{$colaborador->contato->telefone ?? 'Não Informado'}}">
                                </div>
                            </div>
                        </div>
                        <h5>Informações Institucionais</h5>
                        <div class="row">
                            <div class="col-md-6">
                                <label for="instituicao">Instituicão:<strong
                                        style="color: red">*</strong></label>
                                <select class="form-control" name='instituicao_id'
                                        onchange="unidades()">
                                    <option disabled selected>Selecione uma Instituição</option>
                                    @foreach($instituicaos as $instituicao)
                                        <option value="{{$instituicao->id}}" @if($colaborador->instituicao_id == $instituicao->id) selected @endif>{{$instituicao->nome}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-6">
                                <label for="grau_escolaridade">Grau de Escolaridade:<strong
                                        style="color: red">*</strong></label>
                                <select class="form-control" id="grau_escolaridade" name="grau_escolaridade">
                                    <option disabled selected>Selecione um Grau de Escolaridade</option>
                                    <option
                                         value="graduacao_completa" @if($colaborador->grau_escolaridade == 'graduacao_completa') selected @endif>
                                        Graduação Completa
                                    </option>
                                    <option value="graduacao_incompleta" @if($colaborador->grau_escolaridade == 'graduacao_incompleta') selected @endif>
                                        Graduação Incompleta
                                    </option>
                                    <option
                                         value="pos_graduacao_incompleta" @if($colaborador->grau_escolaridade == 'pos_graduacao_incompleta') selected @endif>
                                        Pós-Gradução Incompleta
                                    </option>
                                    <option
                                         value="pos_graduacao_completa" @if($colaborador->grau_escolaridade == 'pos_graduacao_completa') selected @endif>
                                        Pós-Gradução Completa
                                    </option>
                                    <option
                                         value="mestrado_incompleto" @if($colaborador->grau_escolaridade == 'mestrado_incompleto') selected @endif>
                                        Mestrado Incompleto
                                    </option>
                                    <option
                                         value="mestrado_completo" @if($colaborador->grau_escolaridade == 'mestrado_completo') selected @endif>
                                        Mestrado Completo
                                    </option>
                                    <option
                                         value="doutorado_completo" @if($colaborador->grau_escolaridade == 'doutorado_completo') selected @endif>
                                        Doutorado Incompleto
                                    </option>
                                    <option value="doutorado_incompleto" @if($colaborador->grau_escolaridade == 'doutorado_incompleto') selected @endif>
                                        Doutorado Completo
                                    </option>
                                </select>
                            </div>
                        </div>
                        <h5>Informações Complementares</h5>
                        <div class="row">
                            <div class="col-sm-6">
                                <label>Experiência Prévia:<strong style="color: red">*</strong></label>
                                <input name="experiencia_previa" class="form-control"
                                       id="experiencia_previa" type="file" style="width: 135px">
                                <span
                                    style="border: 1px gray solid; border-radius: 10px; text-align: center; width: 180px; position: absolute; bottom: 0px; left: 155px; height: 38px; padding-top: 5px; background-color: #dcfadf">Um Arquivo Já Foi Enviado</span>
                            </div>
                            <div class="col-sm-6">
                                    <label>Termo de Responsabilidade:<strong
                                            style="color: red">*</strong>
                                    </label>
                                    <input class="form-control" id="termo_responsabilidade" type="file"
                                           name="termo_responsabilidade" style="width: 135px">
                                <span
                                    style="border: 1px gray solid; border-radius: 10px; text-align: center; width: 180px; position: absolute; bottom: 0px; left: 155px; height: 38px; padding-top: 5px; background-color: #dcfadf">Um Arquivo Já Foi Enviado</span>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12 mt-2">
                                <label for="treinamento">Treinamento:<strong style="color: red">*</strong></label>
                                <input class="form-control"
                                type="text" name="treinamento"
                                value="{{$colaborador->treinamento}}"
                                required autocomplete="treinamento" autofocus>
                            </div>
                        </div>
                    </div>

                </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-primary">Atualizar</button>
            </div>
            </form>
        </div>
    </div>
</div>
