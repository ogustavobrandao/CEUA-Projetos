<!-- Modal -->
<div class="modal fade" id="modalAdicionarColaborador" tabindex="-1" role="dialog" aria-labelledby="modalAdicionarColaboradorLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                @if(isset($colaborador))
                    <h5 class="modal-title" id="modalAdicionarColaboradorLabel">Editar Colaborador</h5>
                @else
                    <h5 class="modal-title" id="modalAdicionarColaboradorLabel">Adicionar Colaborador</h5>
                @endif
                <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <form action="{{route('solicitacao.colaborador.criar')}}" method="post" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="solicitacao_id" value="{{$solicitacao->id}}">
                <div class="modal-body">
                    <div class="mt-2">
                        <h3 class="h5">Informações Pessoais / Contato</h3>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="colab_nome">Nome:<strong style="color: red">*</strong></label>
                                     @if(isset($colaborador))
                                        <input type="text" name="colab_nome" class="form-control @error('colab_nome') is-invalid @enderror" value="{{$colaborador->nome}}" id="colab_nome" placeholder="Digite o nome do colaborador">
                                     @else
                                        <input type="text" name="colab_nome" class="form-control @error('colab_nome') is-invalid @enderror" value="{{old('colab_nome')}}" id="colab_nome" placeholder="Digite o nome do colaborador">
                                    @endif

                                    @error('colab_nome')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="colab_email">E-mail:<strong style="color: red">*</strong></label>
                                    <input type="email" name="colab_email" class="form-control @error('colab_email') is-invalid @enderror" value="{{old('colab_email')}}" id="colab_email" placeholder="Digite o e-mail do colaborador">

                                    @error('colab_email')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="colab_cpf">CPF:<strong style="color: red">*</strong></label>
                                    <input type="text" name="colab_cpf" class="form-control cpf" value="" id="colab_cpf" placeholder="Digite o CPF do colaborador">

                                    @error('colab_cpf')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="colab_telefone">Telefone:<strong style="color: red">*</strong></label>
                                    <input type="text" name="colab_telefone" class="form-control telefone" value="" id="colab_telefone" placeholder="Digite o telefone do colaborador">

                                    @error('colab_telefone')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <h5>Informações Institucionais</h5>
                        <div class="row">
                            <div class="col-md-6">
                                <label for="colab_instituicao">Instituicão:<strong
                                        style="color: red">*</strong></label>
                                <select class="form-control @error('colab_instituicao_id') is-invalid @enderror" name='colab_instituicao_id'
                                        onchange="unidades()">
                                    <option class="default" disabled selected>Selecione uma Instituição</option>
                                    @foreach($instituicaos as $instituicao)
                                        <option value="{{$instituicao->id}}">{{$instituicao->nome}}</option>
                                    @endforeach
                                </select>

                                @error('colab_instituicao_id')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-6">
                                <label for="colab_grau_escolaridade">Grau de Escolaridade:<strong
                                        style="color: red">*</strong></label>
                                <select class="form-control" id="colab_grau_escolaridade" name="colab_grau_escolaridade">
                                    <option class="default" disabled selected>Selecione um Grau de Escolaridade</option>
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

                                @error('colab_grau_escolaridade')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <h5 class="py-3">Informações Complementares</h5>
                        <div class="row">
                            <div class="col-md-6">
                                <div>
                                    <label>Experiência Prévia:</label>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="opcao_experiencia_previa" id="colab_experiencia_previa_sim" checked>
                                        <label class="form-check-label" for="opcaoSim">Sim</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input default" type="radio" name="opcao_experiencia_previa" id="colab_experiencia_previa_nao" value="false">
                                        <label class="form-check-label" for="opcaoNao">Não</label>
                                    </div>
                                </div>
                                <div class="col-sm-12" id="divExperiencia" style="display: none;">
                                    <label>Enviar Arquivo de Experiência Prévia:<strong style="color: red">*</strong></label>
                                    <input name="colab_experiencia_previa" class="form-control @error('colab_experiencia_previa') is-invalid @enderror" value="" required id="colab_experiencia_previa" type="file" accept="application/pdf">

                                    @error('colab_experiencia_previa')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                 </div>
                            </div>
                       
                        </div>
                        <div class="row">
                            <div class="col-sm-12 mt-2">
                                <label class="py-3">Treinamento:</label>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="colab_treinamento_radio" id="colab_treinamento_sim">
                                    <label class="form-check-label" for="opcaoSim">Sim</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input default" type="radio" name="colab_treinamento_radio" id="colab_treinamento_nao" value="false" checked>
                                    <label class="form-check-label" for="opcaoNao">Não</label>
                                </div>
                            </div>
                        </div>

                        <div class="row" id="divTreinamento" style="display: none;">
                            
                            <div class="col-sm-12 mt-2">
                                <label>Anexar Comprovante de Treinamento:<strong style="color: red">*</strong></label>
                                <input class="form-control @error('colab_treinamento_file') is-invalid @enderror" id="colab_treinamento_file"
                                    type="file" accept="application/pdf" name="colab_treinamento_file" value=""
                                    autocomplete="colab_treinamento_file">
                    
                                @error('colab_treinamento_file')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror

                                
                                <label for="treinamento">Descrever o treinamento:<strong style="color: red">*</strong></label>
                                <input class="form-control" id="colab_treinamento" type="text" name="colab_treinamento" value="{{old('colab_treinamento')}}" autocomplete="treinamento" autofocus>
                                
                                @error('colab_treinamento')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
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


