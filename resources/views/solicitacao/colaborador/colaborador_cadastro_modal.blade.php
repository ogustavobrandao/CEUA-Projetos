<!-- Modal -->
<div class="modal fade" id="modalAdicionarColaborador" tabindex="-1" role="dialog" aria-labelledby="modalAdicionarColaboradorLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalAdicionarColaboradorLabel">Adicionar Colaborador</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <!-- Conteúdo do formulário para adicionar colaboradores -->

            <form id="form2" method="POST" action="{{route('solicitacao.colaborador.criar')}}" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="solicitacao_id" value="{{$solicitacao->id}}">
                <div class="modal-body">
                    <div class="mt-2">
                        <h3 class="h5">Informações Pessoais / Contato</h3>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="nome">Nome:</label>
                                    <input type="text" name="nome" class="form-control" id="nome" placeholder="Digite o nome do colaborador">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="email">E-mail:</label>
                                    <input type="email" name="email" class="form-control" id="email" placeholder="Digite o e-mail do colaborador">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="cpf">CPF:</label>
                                    <input type="text" name="cpf" class="form-control" id="cpf" placeholder="Digite o CPF do colaborador">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="telefone">Telefone:</label>
                                    <input type="text" name="telefone" class="form-control" id="telefone" placeholder="Digite o telefone do colaborador">
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
                                        <option value="{{$instituicao->id}}">{{$instituicao->nome}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-6">
                                <label for="grau_escolaridade">Grau de Escolaridade:<strong
                                        style="color: red">*</strong></label>
                                <select class="form-control" id="grau_escolaridade" name="grau_escolaridade">
                                    <option disabled selected>Selecione um Grau de Escolaridade</option>
                                    <option
                                         value="graduacao_completa">
                                        Graduação Completa
                                    </option>
                                    <option
                                         value="graduacao_incompleta">
                                        Graduação Incompleta
                                    </option>
                                    <option
                                         value="pos_graduacao_incompleta">
                                        Pós-Gradução Incompleta
                                    </option>
                                    <option
                                         value="pos_graduacao_completa">
                                        Pós-Gradução Completa
                                    </option>
                                    <option
                                         value="mestrado_incompleto">
                                        Mestrado Incompleto
                                    </option>
                                    <option
                                         value="mestrado_completo">
                                        Mestrado Completo
                                    </option>
                                    <option
                                         value="doutorado_completo">
                                        Doutorado Incompleto
                                    </option>
                                    <option value="doutorado_incompleto">
                                        Doutorado Completo
                                    </option>
                                </select>
                            </div>
                        </div>
                        <h5>Informações Complementares</h5>
                        <div class="row">
                            <div class="col-sm-6">
                                <label>Experiência Prévia:<strong style="color: red">*</strong></label>
                                <input required name="experiencia_previa" class="form-control"
                                       id="experiencia_previa" enctype="multipart/form-data" type="file">
                            </div>
                            <div class="col-sm-6">
                                    <label>Termo de Responsabilidade:<strong
                                            style="color: red">*</strong>
                                    </label>
                                    <input required class="form-control" id="termo_responsabilidade" enctype="multipart/form-data" type="file"
                                           name="termo_responsabilidade">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12 mt-2">
                                <label for="treinamento">Treinamento:<strong style="color: red">*</strong></label>
                                <input class="form-control"
                                type="text" name="treinamento"
                                value=""
                                required autocomplete="treinamento" autofocus>
                            </div>
                        </div>
                    </div>

                </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-primary">Salvar</button>
            </div>
            </form>
        </div>
    </div>
</div>
