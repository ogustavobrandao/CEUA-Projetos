<!-- Modal Edicao-->
<div class="modal fade" id="modalEditarColaborador{{$colaborador->id}}" tabindex="-1" role="dialog" aria-labelledby="modalEditarColaborador{{$colaborador->id}}Label" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                @if(isset($visualizar))
                    <h5 class="modal-title" id="modalEditarColaboradorLabel">Visualizar Colaborador</h5>
                @else
                    <h5 class="modal-title" id="modalEditarColaboradorLabel">Editar Colaborador</h5>
                @endif
                <a href="#" data-bs-dismiss="modal" aria-label="Fechar" class="btn btn-lg text-decoration-none">
                    <span aria-hidden="true"><strong>&times;</strong></span>
                </a>
            </div>
            <!-- Conteúdo do formulário para adicionar colaboradores -->

            <form method="POST" action="{{route('solicitacao.colaborador.editar')}}" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="solicitacao_id" value="{{$solicitacao->id}}">
                <input type="hidden" name="colaborador_id" value="{{$colaborador->id}}">
                <div class="modal-body">
                    <div class="mt-2">
                        <h3 class="h5">Informações Pessoais / Contato</h3>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="colab_nome">Nome:<strong style="color: red">*</strong></label>
                                    <input type="text" name="colab_nome" class="form-control @error('colab_nome') is-invalid @enderror" value="{{$colaborador->nome}}" id="colab_nome" placeholder="Digite o nome do colaborador">

                                    @error('colab_nome')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="colab_email">E-mail:<strong style="color: red">*</strong></label>
                                    <input type="email" name="colab_email" class="form-control @error('colab_email') is-invalid @enderror" value="{{$colaborador->contato->email}}" id="colab_email" placeholder="Digite o e-mail do colaborador">

                                    @error('colab_email')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="colab_cpf">CPF:<strong style="color: red">*</strong></label>
                                    <input type="text" name="colab_cpf" class="form-control cpf @error('colab_cpf') is-invalid @enderror" value="{{$colaborador->cpf}}" id="colab_cpf" placeholder="Digite o CPF do colaborador">

                                    @error('colab_cpf')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="telefone">Telefone:<strong style="color: red">*</strong></label>
                                    <input type="text" name="colab_telefone" class="form-control telefone @error('colab_telefone') @enderror" id="colab_telefone" placeholder="Digite o telefone do colaborador" value="{{$colaborador->contato->telefone ?? 'Não Informado'}}" >
                                </div>
                            </div>

                            <div class="div_error telefone_error" style="display: none">
                                <span class="invalid-input">
                                    <strong class="telefone_error_message"></strong>
                                </span>
                            </div>
                        </div>
                        <h5>Informações Institucionais</h5>
                        <div class="row">
                            <div class="col-md-6">
                                <label for="colab_instituicao">Instituição:<strong
                                        style="color: red">*</strong></label>
                                <select class="form-control @error('colab_instituicao_id') is-invalid @enderror" name='colab_instituicao_id'
                                        onchange="unidades()">
                                    <option class="default" disabled selected>Selecione uma Instituição</option>
                                    @foreach($instituicaos as $instituicao)
                                        <option value="{{$instituicao->id}}" @if($colaborador->instituicao_id == $instituicao->id) selected @endif>{{$instituicao->nome}}</option>
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

                                @error('colab_grau_escolaridade')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                           
                        <br>
                        <h5>Informações Complementares</h5>
                        <div class="row">
                            <div class="col-md-6">
                                <div>
                                    <label>Experiência Prévia:</label>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="opcao_experiencia_previa" id="colab_experiencia_previa_sim{{$colaborador->id}}" @if($colaborador->experiencia_previa != null)checked @enderror >
                                        <label class="form-check-label" for="opcaoSim">Sim</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="opcao_experiencia_previa" id="colab_experiencia_previa_nao{{$colaborador->id}}" value="false" @if($colaborador->experiencia_previa == null)checked @enderror >
                                        <label class="form-check-label" for="opcaoNao">Não</label>
                                    </div>
                                </div>

                                @if(isset($visualizar))
                                    @if($colaborador->experiencia_previa == null)
                                        <br>
                                        <a class="btn btn-secondary"
                                        href="#">Não Enviado</a>
                                    @else
                                        <a class="btn btn-primary download-button"
                                        data-path="{{route('experiencias_previasColaborador.download', ['colaborador_id' => $colaborador->id])}}">Baixar
                                            Experiência Prévia</a>
                                    @endif
                                @else
                                    <div class="col-sm-12" id="divExperiencia{{$colaborador->id}}" style="display: none;">
                                        <label>Enviar Arquivo de Experiência Prévia:</label>
                                        <input name="colab_experiencia_previa" class="form-control" id="colab_experiencia_previa" type="file" accept="application/pdf" value="{{$colaborador->experiencia_previa ?? ''}}">

                                        @error('colab_experiencia_previa')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror

                                        @if ($colaborador->experiencia_previa != null)
                                            <span
                                                style="border: 1px gray solid; border-radius: 10px; text-align: center; width: 210px; position: absolute; bottom: 0px; left: 146px; height: 38px; padding-top: 5px; background-color: #dcfadf">Um
                                                Arquivo Já Foi Enviado</span>
                                        @endif
                                    </div>
                                @endif
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div>
                                    <label class="py-3">Treinamento:</label>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="colab_treinamento_radio" id="colab_treinamento_sim{{$colaborador->id}}" @if($colaborador->treinamento_file != null)checked @enderror>
                                        <label class="form-check-label" for="opcaoSim">Sim</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="colab_treinamento_radio" id="colab_treinamento_nao{{$colaborador->id}}" value="false" @if($colaborador->treinamento_file == null)checked @enderror>
                                        <label class="form-check-label" for="opcaoNao">Não</label>
                                    </div>
                                </div>

                                <div id="divTreinamento{{$colaborador->id}}" style="display: none;">
                                    <div class="col-sm-12 mt-2">
                                        <label>Anexar Comprovante de Treinamento:<strong style="color: red">*</strong></label>
                                        @if(isset($visualizar))
                                            @if($colaborador->treinamento_file == null)
                                                <a class="btn btn-secondary"
                                                href="#">Não Enviado</a>
                                            @else
                                                <a class="btn btn-primary download-button"
                                                data-path="{{route('treinamento_fileColaborador.download', ['colaborador_id' => $colaborador->id])}}">Baixar
                                                    Arquivo de Treinamento</a>
                                            @endif
                                        @else
                                            <input class="form-control @error('colab_treinamento_file') is-invalid @enderror" id="colab_treinamento_file{{$colaborador->id}}"
                                            type="file" accept="application/pdf" name="colab_treinamento_file" value="{{$colaborador->treinamento_file ?? ''}}"
                                            autocomplete="colab_treinamento_file">
                                            
                                            @error('colab_treinamento_file')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                            
                                            @if ($colaborador->treinamento_file != null)
                                                <span
                                                    style="border: 1px gray solid; border-radius: 10px; text-align: center; width: 210px; position: absolute; bottom: 67px; left: 146px; height: 38px; padding-top: 5px; background-color: #dcfadf">Um
                                                    Arquivo Já Foi Enviado</span>
                                            @endif
                                        @endif

                                        <label for="treinamento">Descrever o treinamento:<strong style="color: red">*</strong></label>
                                        <input class="form-control" id="colab_treinamento{{$colaborador->id}}" type="text" name="colab_treinamento" value="{{$colaborador->treinamento ?? old('colab_treinamento')}}" autocomplete="treinamento" autofocus>
                                        
                                        @error('colab_treinamento')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                    </div>
                </div>
                
                <div class="modal-footer">
                    @if(isset($visualizar))
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Voltar</button>

                    @else
                        <button type="submit" class="btn btn-primary">Atualizar</button>
                    @endif
                </div>
                
            </form>
        </div>
    </div>
</div>
@if(isset($visualizar))

    <script>
        $('form input, form select, form textarea').prop('disabled', true);
        @if ($colaborador->treinamento_file != null)
            $("#colab_treinamento{{$colaborador->id}}").show().find('input, textarea').prop('disabled', false);
            $("#divTreinamento{{$colaborador->id}}").show().find('input, textarea').prop('disabled', false);
        @endif
        @if($colaborador->experiencia_previa != null)
            $("#divExperiencia{{$colaborador->id}}").show().find('input, textarea').prop('disabled', false);
            $("#colab_treinamento_nao{{$colaborador->id}}").prop('disabled', false);
        @endif

    </script>

@endif
<script>
   $(document).ready(function() {
        @if ($colaborador->treinamento_file != null)
            $("#colab_treinamento_sim{{$colaborador->id}}").click();
        @else
            $("#colab_treinamento_nao{{$colaborador->id}}").click();
        @endif

        @if ($colaborador->experiencia_previa != null)
            $("#colab_experiencia_previa_sim{{$colaborador->id}}").click();
        @else
            $("#colab_experiencia_previa_nao{{$colaborador->id}}").click();
        @endif

       

    });

    $("#colab_treinamento_sim{{$colaborador->id}}").click(function() {
        $("#colab_treinamento{{$colaborador->id}}").show().find('input, textarea').prop('disabled', false);
        $("#divTreinamento{{$colaborador->id}}").show().find('input, textarea').prop('disabled', false);
        
    });

    $("#colab_treinamento_nao{{$colaborador->id}}").click(function() {
        $("#colab_treinamento{{$colaborador->id}}").hide().find('input, textarea').prop('disabled', true);
        $("#colab_treinamento{{$colaborador->id}}").prop('required', false);
        $("#divTreinamento{{$colaborador->id}}").hide().find('input, textarea').prop('disabled', true);

    });

    $("#colab_experiencia_previa_sim{{$colaborador->id}}").click(function() {
        $("#divExperiencia{{$colaborador->id}}").show().find('input, textarea').prop('disabled', false);
        $("#colab_treinamento_nao{{$colaborador->id}}").prop('disabled', false);

    });

    $("#colab_experiencia_previa_nao{{$colaborador->id}}").click(function() {
        $("#divExperiencia{{$colaborador->id}}").hide().find('input, textarea').prop('disabled', true);
        $("#colab_experiencia_previa{{$colaborador->id}}").prop('required', false);
        $("#colab_treinamento_sim{{$colaborador->id}}").click();
        $("#colab_treinamento_nao{{$colaborador->id}}").prop('disabled', true);

    });

</script>
