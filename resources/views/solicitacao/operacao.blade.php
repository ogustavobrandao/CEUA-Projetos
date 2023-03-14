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
                        <div class="col-sm-2">
                            <input class="form-check-input" type="radio" name="cirurgia" id="cirurgia_nao" value="false"
                                   checked>
                            <label class="form-check-label" for="cirurgia">
                                Não
                            </label>
                        </div>
                        <div class="col-sm-2">
                            <input class="form-check-input" type="radio" name="cirurgia" id="cirurgia_unica" value="true">
                            <label class="form-check-label" for="cirurgia">Única </label>
                        </div>
                        <div class="col-sm-2">
                            <input class="form-check-input" type="radio" name="cirurgia" id="cirurgia_multipla" value="true">
                            <label class="form-check-label" for="cirurgia">Múltipla</label>
                        </div>
                    </div>
                </div>
                <div class="col-sm-12 mt-2" id="anexo_cirurgia" style="display: none;">
                    <label for="anexo_cirurgia">Descrição:<strong style="color: red">*</strong></label>
                    <textarea class="form-control @error('detalhes_cirurgia') is-invalid @enderror" name="detalhes_cirurgia" id="detalhes_cirurgia" autocomplete="detalhes_cirurgia" autofocus
                              required> @if(!empty($operacao) && $operacao->detalhes_cirurgia != null){{$operacao->detalhes_cirurgia}}@else{{old('detalhes_cirurgia')}}@endif </textarea>
                    @error('detalhes_cirurgia')
                    <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                    @enderror
                </div>
            </div>
            
            <div class="row" id="pos_operatorio1">
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
                    <div class="col-sm-8 mt-2" id="anexo_observacao_recuperacao" style="display: none;">
                        <label for="anexo_observacao_recuperacao">Descrição:<strong style="color: red">*</strong></label>
                        <textarea class="form-control @error('detalhes_observacao_recuperacao') is-invalid @enderror" name="detalhes_observacao_recuperacao" id="detalhes_observacao_recuperacao" autocomplete="detalhes_cirurgia" autofocus
                                  required> @if(!empty($operacao) && $operacao->detalhes_observacao_recuperacao != null){{$operacao->detalhes_observacao_recuperacao}}@else{{old('detalhes_observacao_recuperacao')}}@endif </textarea>
                        @error('cirurgia')
                        <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                        @enderror
                    </div>
            </div>
                
            <div class="row" id="pos_operatorio2">
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
                    <div class="col-sm-8 mt-2" id="anexo_analgesia_recuperacao" style="display: none;">
                        <label for="anexo_analgesia_recuperacao">Descrição:<strong style="color: red">*</strong></label>
                        <textarea class="form-control @error('detalhes_analgesia_recuperacao') is-invalid @enderror" name="detalhes_analgesia_recuperacao" id="detalhes_analgesia_recuperacao" autocomplete="detalhes_analgesia_recuperacao" autofocus
                                  required> @if(!empty($operacao) && $operacao->detalhes_analgesia_recuperacao != null){{$operacao->detalhes_analgesia_recuperacao}}@else{{old('detalhes_analgesia_recuperacao')}}@endif </textarea>
                        @error('cirurgia')
                        <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                        @enderror
                    </div>
            </div>
            

            <div class="row" id="pos_operatorio3">
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
                    <div class="col-sm-8 mt-2" id="anexo_outros_cuidados_recuperacao" style="display: none;">
                        <label for="anexo_outros_cuidados_recuperacao">Descrição:<strong style="color: red">*</strong></label>
                        <textarea class="form-control @error('detalhes_outros_cuidados_recuperacao') is-invalid @enderror" name="detalhes_outros_cuidados_recuperacao" id="detalhes_outros_cuidados_recuperacao" autocomplete="detalhes_outros_cuidados_recuperacao" autofocus
                                  required> @if(!empty($operacao) && $operacao->detalhes_outros_cuidados_recuperacao != null){{$operacao->detalhes_outros_cuidados_recuperacao}}@else{{old('detalhes_outros_cuidados_recuperacao')}}@endif </textarea>
                        @error('cirurgia')
                        <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                        @enderror
                    </div>
            </div>
        </div>
        @include('component.botoes_new_form')
    </form>
</div>

<script>
    $(document).ready(function () {

        @if(isset($operacao))
        $("#cirurgia_sim").attr('checked', true);
        $("#anexo_cirurgia").show();
        $("#pos_operatorio").show();
        @else
        $("#cirurgia_nao").attr('checked', true);
        $("#anexo_cirurgia").hide();
        $("#pos_operatorio1").hide();
        $("#pos_operatorio2").hide();
        $("#pos_operatorio3").hide();
        @endif

        @if(isset($operacao) && ($operacao->observacao_recuperacao != null))
        $("#observacao_recuperacao_sim").attr('checked', true);
        $("#anexo_observacao_recuperacao").show();
        @else
        $("#observacao_recuperacao_nao").attr('checked', true);
        $("#anexo_observacao_recuperacao").hide();
        @endif

        @if(isset($operacao) && ($operacao->outros_cuidados_recuperacao != null))
        $("#outros_cuidados_recuperacao_sim").attr('checked', true);
        $("#anexo_outros_cuidados_recuperacao").show();
        @else
        $("#outros_cuidados_recuperacao_nao").attr('checked', true);
        $("#anexo_outros_cuidados_recuperacao").hide();
        @endif

        @if(isset($operacao) && ($operacao->analgesia_recuperacao != null))
        $("#analgesia_recuperacao_sim").attr('checked', true);
        $("#anexo_analgesia_recuperacao").show();
        @else
        $("#analgesia_recuperacao_nao").attr('checked', true);
        $("#anexo_analgesia_recuperacao").hide();
        @endif

        $("#cirurgia_sim").click(function () {
            $("#anexo_cirurgia").show().find('input, radio').prop('disabled', false);
            $("#pos_operatorio1").show().find('input, radio').prop('disabled', false);
            $("#pos_operatorio2").show().find('input, radio').prop('disabled', false);
            $("#pos_operatorio3").show().find('input, radio').prop('disabled', false);
        });

        $("#cirurgia_unica").click(function () {
            $("#anexo_cirurgia").show().find('input, radio').prop('disabled', false);
            $("#pos_operatorio1").show().find('input, radio').prop('disabled', false);
            $("#pos_operatorio2").show().find('input, radio').prop('disabled', false);
            $("#pos_operatorio3").show().find('input, radio').prop('disabled', false);
        });

        $("#cirurgia_multipla").click(function () {
            $("#anexo_cirurgia").show().find('input, radio').prop('disabled', false);
            $("#pos_operatorio1").show().find('input, radio').prop('disabled', false);
            $("#pos_operatorio2").show().find('input, radio').prop('disabled', false);
            $("#pos_operatorio3").show().find('input, radio').prop('disabled', false);
        });

        $("#cirurgia_nao").click(function () {
            $("#anexo_cirurgia").hide().find('input, radio').prop('disabled', true);
            $("#pos_operatorio1").hide().find('input, radio').prop('disabled', true);
            $("#pos_operatorio2").hide().find('input, radio').prop('disabled', true);
            $("#pos_operatorio3").hide().find('input, radio').prop('disabled', true);
        });

        $("#observacao_recuperacao_sim").click(function () {
            $("#anexo_observacao_recuperacao").show().find('input, radio').prop('disabled', false);
        });

        $("#observacao_recuperacao_nao").click(function () {
            $("#anexo_observacao_recuperacao").hide().find('input, radio').prop('disabled', true);
        });

        $("#analgesia_recuperacao_sim").click(function () {
            $("#anexo_analgesia_recuperacao").show().find('input, radio').prop('disabled', false);
        });

        $("#analgesia_recuperacao_nao").click(function () {
            $("#anexo_analgesia_recuperacao").hide().find('input, radio').prop('disabled', true);
        });

        $("#outros_cuidados_recuperacao_sim").click(function () {
            $("#anexo_outros_cuidados_recuperacao").show().find('input, radio').prop('disabled', false);
        });

        $("#outros_cuidados_recuperacao_nao").click(function () {
            $("#anexo_outros_cuidados_recuperacao").hide().find('input, radio').prop('disabled', true);
        });

        $("#cirurgia_nao").click(function () {
            $("#pos_operatorio1").hide().find('input, radio').prop('disabled', true);
            $("#pos_operatorio2").hide().find('input, radio').prop('disabled', true);
            $("#pos_operatorio3").hide().find('input, radio').prop('disabled', true);
        });


    });
</script>

