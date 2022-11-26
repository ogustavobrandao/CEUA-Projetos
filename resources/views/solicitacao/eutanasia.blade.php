<div class="card shadow-lg p-3 bg-white" style="border-radius: 0px 0px 10px 10px">
    @if($solicitacao->status == 'avaliado' && $solicitacao->avaliacao->first()->status == 'aprovadaPendencia')
        <a type="button" class="btn btn-info text-start" style="position: absolute;pointer-events: all;z-index:10;" data-toggle="modal" data-target="#pendenciaVisuModal" title="Pendência"><img src="{{asset('images/pendencia.svg')}}" width="30px"></a>
    @endif

    <form id="form10" method="POST" action="{{route('solicitacao.eutanasia.criar')}}">
        @csrf
        <input type="hidden" name="planejamento_id" @if(!empty($planejamento)) value="{{$planejamento->id}}" @endif>
        <div class="row col-md-12">
            <h3 class="subtitulo">Especificação</h3>

            <div class="col-sm-6 mt-2">
                <label for="eutanasia">Eutanásia:</label>
                <div class="row ml-1">
                    <div class="col-sm-2">
                        <input class="form-check-input" type="radio" name="eutanasia" id="eutanasia_sim" value="true">
                        <label class="form-check-label" for="eutanasia">Sim</label>
                    </div>
                    <div class="col-sm-2">
                        <input class="form-check-input" type="radio" name="eutanasia" id="eutanasia_nao" value="false">
                        <label class="form-check-label" for="eutanasia">
                            Não
                        </label>
                    </div>
                </div>
            </div>

            <div id="eutanasia_dados" class="row">
                <div class="col-sm-12 mt-2">
                    <label for="descricao">Descrição:</label>
                    <textarea class="form-control @error('descricao') is-invalid @enderror" name="descricao" id="descricao"
                              autocomplete="descricao" autofocus required>@if(!empty($eutanasia) && $eutanasia->descricao != null){{$eutanasia->descricao}}@else{{old('descricao')}}@endif</textarea>
                    @error('descricao')
                    <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                    @enderror
                </div>

                <div class="col-sm-12 mt-2">
                    <label for="metodo">Substância, dose, via:</label>
                    <textarea class="form-control @error('metodo') is-invalid @enderror" name="metodo" id="metodo"
                              autocomplete="metodo" autofocus required>@if(!empty($eutanasia) && $eutanasia->metodo != null){{$eutanasia->metodo}}@else{{old('metodo')}}@endif</textarea>
                    @error('metodo')
                    <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                    @enderror
                </div>

                <div class="col-sm-12 mt-2">
                    <label for="justificativa_metodo">Caso método restrito, justifique:</label>
                    <textarea class="form-control @error('justificativa_metodo') is-invalid @enderror"
                              name="justificativa_metodo" id="justificativa_metodo" autocomplete="justificativa_metodo"
                              autofocus
                              required>@if(!empty($eutanasia) &&  $eutanasia->justificativa_metodo != null){{$eutanasia->justificativa_metodo}}@else{{old('justificativa_metodo')}}@endif</textarea>
                    @error('justificativa_metodo')
                    <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                    @enderror
                </div>
            </div>

            <h3 class="subtitulo">Outras informações</h3>

            <div class="col-sm-12 mt-2">
                <label for="destino">Destino dos animais mortos e/ou tecidos/fragmentos:</label>
                <textarea class="form-control @error('destino') is-invalid @enderror" name="destino" id="destino"
                          autocomplete="destino" autofocus required>@if(!empty($eutanasia) && $eutanasia->destino != null){{$eutanasia->destino}}@else{{old('destino')}}@endif</textarea>
                @error('destino')
                <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
                @enderror
            </div>

            <div class="col-sm-12 mt-2">
                <label for="descarte">Forma de descarte da carcaça:</label>
                <textarea class="form-control @error('descarte') is-invalid @enderror" name="descarte" id="descarte"
                          autocomplete="descarte" autofocus required>@if(!empty($eutanasia) && $eutanasia->descarte != null){{$eutanasia->descarte}}@else{{old('descarte')}}@endif</textarea>
                @error('descarte')
                <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
                @enderror
            </div>


        </div>

        <div class="row mt-4 justify-content-end">
            <div class="col-3">
                <button type="submit" class="btn btn-success w-100">Salvar</button>
            </div>
        </div>

    </form>

</div>

<script>
    $(document).ready(function () {

        @if(isset($eutanasia) && $eutanasia->descricao != null)
            $("#eutanasia_sim").attr('checked', true);
            @if(!isset($disabled))
            $("#eutanasia_dados").show().find('input, textarea').prop('disabled', false);
            @else
            $("#eutanasia_dados").show().find('input, textarea');
            @endif
        @else
            $("#eutanasia_nao").attr('checked', true);
            $("#eutanasia_dados").hide().find('input, textarea').prop('disabled', true);
        @endif


        $("#eutanasia_sim").click(function () {
            $("#eutanasia_dados").show().find('input, textarea').prop('disabled', false);
        });

        $("#eutanasia_nao").click(function () {
            $("#eutanasia_dados").hide().find('input, textarea').prop('disabled', true);
        });

    });
</script>

