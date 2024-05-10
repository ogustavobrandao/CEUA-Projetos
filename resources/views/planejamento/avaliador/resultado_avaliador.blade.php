<div class="card shadow-topoff border-top-0 p-3 my-n3 bg-white" style="border-radius: 0px 0px 10px 10px">

    <form id="form11" method="POST" action="">
        @csrf
        <input type="hidden" name="modelo_animal_id" value="{{$modelo_animal->id}}">
        <div class="row col-md-12">
            <div class="col-sm-6 mt-2">
                <label for="abate">Abate:<strong style="color: red">*</strong></label>
                <div class="row ml-1">
                    <div class="col-sm-2">
                        <input class="form-check-input" type="radio" name="abate_radio" id="abate_sim" value="true"
                               @if(!empty($resultado) && $resultado->abate != null) checked @endif>
                        <label class="form-check-label" for="abate">Sim</label>
                    </div>
                    <div class="col-sm-2">
                        <input class="form-check-input" type="radio" name="abate_radio" id="abate_nao" value="false"
                               @if(!empty($resultado) && $resultado->abate == null) checked @endif>
                        <label class="form-check-label" for="abate">
                            Não
                        </label>
                    </div>
                </div>
            </div>
            <div class="col-sm-12 mt-2" id="destino_animal_abatido" style="display: none;">
                <label for="destino_animais">Destino dos Animais Abatidos:<strong style="color: red">*</strong></label>
                <textarea class="form-control" name="abate" id="destino_animais"
                          autocomplete="destino_animais" autofocus
                          required disabled>@if(!empty($resultado) && $resultado->abate != null){{$resultado->abate}}@else{{old('abate')}}@endif</textarea>

            </div>

            <div class="col-sm-12 mt-2">
                <label for="destino_animais">Destino dos animais sobreviventes após a conclusão do experimento / aula ou
                    retirados no decorrer do experimento / aula:<strong style="color: red">*</strong></label>
                <textarea class="form-control" name="destino_animais"
                          id="destino_animais" autocomplete="destino_animais" autofocus
                          required readonly>@if(!empty($resultado) && $resultado->destino_animais != null){{$resultado->destino_animais}}@else{{old('destino_animais')}}@endif</textarea>

            </div>

            <div class="col-sm-12 mt-2">
                <label for="outras_informacoes">Outras Informações Relevantes:<strong style="color: red">*</strong></label>
                <textarea class="form-control" name="outras_informacoes"
                          id="outras_informacoes" autocomplete="outras_informacoes" autofocus
                          required minlength="4" readonly>@if(!empty($resultado) && $resultado->outras_informacoes != null){{$resultado->outras_informacoes}}@endif</textarea>

            </div>

            <div class="col-sm-12 mt-2">
                <label for="justificativa_metodos">Justificativa da não utilização de métodos alternativos e da
                    necessidade do uso de animais:<strong style="color: red">*</strong></label>
                <textarea class="form-control"
                          name="justificativa_metodos" id="justificativa_metodos" autocomplete="justificativa_metodos"
                          autofocus required readonly>@if(!empty($resultado) && $resultado->justificativa_metodos != null){{$resultado->justificativa_metodos}}@else{{old('justificativa_metodos')}}@endif</textarea>

            </div>

            <div class="col-sm-12 mt-2">
                <label for="resumo_procedimento">Resumo do procedimento (relatar todos os procedimentos com os animais):<strong
                        style="color: red">*</strong></label>
                <textarea class="form-control"
                          name="resumo_procedimento" id="resumo_procedimento" autocomplete="resumo_procedimento"
                           readonly>@if(!empty($resultado) && $resultado->resumo_procedimento != null){{$resultado->resumo_procedimento}}@endif</textarea>

            </div>


        </div>

        @include('component.botoes_new_form_avaliador')

    </form>
</div>

<script>

    $(document).ready(function () {
        if($("#abate_sim").prop('checked')){
            $("#destino_animal_abatido").show();
        }
    });

    $("#abate_sim").click(function () {
        $("#destino_animal_abatido").show().find('input, textarea').prop('disabled', false);
    });
    $("#abate_nao").click(function () {
        $("#destino_animal_abatido").hide().find('input, textarea').prop('disabled', true);
    });
</script>