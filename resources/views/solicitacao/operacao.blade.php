<div class="card shadow-lg p-3 bg-white" style="border-radius: 0px 0px 10px 10px">

    <form id="form9" method="POST" action="{{route('solicitacao.operacao.criar')}}">
        @csrf
        <input type="hidden" name="planejamento_id" @if(!empty($planejamento)) value="{{$planejamento->id}}" @endif>
        <div style="@if(Auth::user()->tipo_usuario_id == 2) pointer-events: none @endif">
            <div class="row">
                <h3 class="subtitulo">Informações</h3>
                <div class="col-sm-4 mt-2">
                    <label for="cirurgia">Cirurgia:<strong style="color: red">*</strong></label>
                    <div class="row ml-1">
                        <div class="col-sm-2">
                            <input class="form-check-input" type="radio" name="cirurgia" id="cirurgia_sim" value="true">
                            <label class="form-check-label" for="cirurgia">Sim</label>
                        </div>
                        <div class="col-sm-3">
                            <input class="form-check-input" type="radio" name="cirurgia" id="cirurgia_unica" value="true">
                            <label class="form-check-label" for="cirurgia">Única</label>
                        </div>
                        <div class="col-sm-3">
                            <input class="form-check-input" type="radio" name="cirurgia" id="cirurgia_multipla" value="true">
                            <label class="form-check-label" for="cirurgia">Múltipla</label>
                        </div>
                        <div class="col-sm-2">
                            <input class="form-check-input" type="radio" name="cirurgia" id="cirurgia_nao" value="false"
                                   checked>
                            <label class="form-check-label" for="cirurgia">
                                Não
                            </label>
                        </div>
                    </div>
                </div>
                <div class="col-sm-12" id="anexo_cirurgia" style="display: none;">
                    <label for="anexo_cirurgia">Descrever Cirurgia:<strong style="color: red">*</strong></label>
                    <textarea class="form-control @error('detalhes_cirurgia') is-invalid @enderror" name="detalhes_cirurgia" id="detalhes_cirurgia" autocomplete="detalhes_cirurgia" autofocus
                              required> @if(!empty($operacao) && $operacao->cirurgia != null){{$operacao->cirurgia}}@else{{old('detalhes_cirurgia')}}@endif </textarea>
                    @error('cirurgia')
                    <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                    @enderror
                </div>
            </div>
            

            <div class="row" id="pos_operatorio">

                <h3 id="" class="subtitulo">Pós-Operatório</h3>

                <div class="col-sm-4 mt-2">
                    <label for="observacao_recuperacao">Observação da recuperação:<strong style="color: red">*</strong></label>
                    <div class="row ml-1">
                        <div class="col-sm-2">
                            <input class="form-check-input" type="radio" name="observacao_recuperacao"
                                   id="observacao_recuperacao_sim" value="true"
                                   @if(!empty($operacao) && $operacao->observacao_recuperacao == "true") checked @endif>
                            <label class="form-check-label" for="observacao_recuperacao">Sim</label>
                        </div>
                        <div class="col-sm-2">
                            <input class="form-check-input" type="radio" name="observacao_recuperacao"
                                   id="observacao_recuperacao_nao" value="false"
                                   @if(!empty($operacao) && ($operacao->observacao_recuperacao == "false" || $operacao->observacao_recuperacao == null)) checked @endif>
                            <label class="form-check-label" for="observacao_recuperacao">
                                Não
                            </label>
                        </div>
                    </div>
                </div>

                <div class="col-sm-4 mt-2">
                    <label for="analgesia_recuperacao">Uso de Analgesia:<strong style="color: red">*</strong></label>
                    <div class="row ml-1">
                        <div class="col-sm-2">
                            <input class="form-check-input" type="radio" name="analgesia_recuperacao"
                                   id="analgesia_recuperacao_sim" value="true"
                                   @if(!empty($operacao) && $operacao->analgesia_recuperacao == "true") checked @endif>
                            <label class="form-check-label" for="analgesia_recuperacao">Sim</label>
                        </div>
                        <div class="col-sm-2">
                            <input class="form-check-input" type="radio" name="analgesia_recuperacao"
                                   id="analgesia_recuperacao_nao" value="false"
                                   @if(!empty($operacao) && ($operacao->analgesia_recuperacao == "false" || $operacao->analgesia_recuperacao == null)) checked @endif>
                            <label class="form-check-label" for="analgesia_recuperacao">
                                Não
                            </label>
                        </div>
                    </div>
                </div>
                <div class="col-sm-4 mt-2">
                    <label for="outros_cuidados_recuperacao">Outros Cuidados Pós-Operatórios:<strong style="color: red">*</strong></label>
                    <div class="row ml-1">
                        <div class="col-sm-2">
                            <input class="form-check-input" type="radio" name="outros_cuidados_recuperacao"
                                   id="outros_cuidados_recuperacao_sim" value="true"
                                   @if(!empty($operacao) && $operacao->outros_cuidados_recuperacao == "true") checked @endif>
                            <label class="form-check-label" for="outros_cuidados_recuperacao">Sim</label>
                        </div>
                        <div class="col-sm-2">
                            <input class="form-check-input" type="radio" name="outros_cuidados_recuperacao"
                                   id="outros_cuidados_recuperacao_nao" value="false"
                                   @if(!empty($operacao) && ($operacao->outros_cuidados_recuperacao == "false" || $operacao->outros_cuidados_recuperacao == null)) checked @endif>
                            <label class="form-check-label" for="outros_cuidados_recuperacao">
                                Não
                            </label>
                        </div>
                    </div>
                </div>


            </div>
        </div>

        @include('component.botoes_new_form')

    </form>
</div>

<script>
    $(document).ready(function () {

        @if(isset($operacao) && $operacao->observacao_recuperacao != null && $operacao->outros_cuidados_recuperacao != null && $operacao->analgesia_recuperacao != null)
        $("#cirurgia_sim").attr('checked', true);
        $("#pos_operatorio").show();
        @else
        $("#cirurgia_nao").attr('checked', true);
        $("#pos_operatorio").hide();
        @endif

        $("#cirurgia_sim").click(function () {
            $("#anexo_cirurgia").show().find('input, radio').prop('disabled', false);
            $("#pos_operatorio").show().find('input, radio').prop('disabled', false);
        });

        $("#cirurgia_unica").click(function () {
            $("#anexo_cirurgia").show().find('input, radio').prop('disabled', false);
            $("#pos_operatorio").show().find('input, radio').prop('disabled', false);
        });

        $("#cirurgia_multipla").click(function () {
            $("#anexo_cirurgia").show().find('input, radio').prop('disabled', false);
            $("#pos_operatorio").show().find('input, radio').prop('disabled', false);
        });

        $("#cirurgia_nao").click(function () {
            $("#pos_operatorio").hide().find('input, radio').prop('disabled', true);
        });
    });
</script>

