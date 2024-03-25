<div class="card p-3 bg-white" style="border-radius: 0px 0px 10px 10px">
    <form id="form3" method="POST" action="{{route('solicitacao.solicitacao_fim.criar')}}">
        @csrf
        <input type="hidden" value="{{$solicitacao->id}}">
        <div class="row col-md-12">
            <h3 class="subtitulo">Informações</h3>

            <div class="col-sm-12 mt-2">
                <label for="resumo">Resumo do Projeto de Pesquisa / de Extensão / de Aula Prática / de Treinamento:<strong style="color: red">*</strong></label>
                <textarea class="form-control" id="resumo" autocomplete="resumo"
                    >{{$solicitacao->dadosComplementares->resumo}}</textarea>
            </div>

            <div class="col-sm-12 mt-2">
                <label for="objetivos">Objetivos (na íntegra):<strong style="color: red">*</strong></label>
                <textarea class="form-control" id="objetivos" autocomplete="objetivos"
                    >{{$solicitacao->dadosComplementares->objetivos}}</textarea>
            </div>

            <div class="col-sm-12 mt-2">
                <label for="justificativa">Justificativa:<strong style="color: red">*</strong></label>
                <textarea class="form-control" id="justificativa" autocomplete="justificativa"
                    >{{$solicitacao->dadosComplementares->justificativa}}</textarea>
              
            </div>

            <div class="col-sm-12 mt-2">
                <label for="relevancia">Relevância:<strong style="color: red">*</strong></label>
                <textarea class="form-control" id="relevancia" autocomplete="relevancia"
                    >{{$solicitacao->dadosComplementares->relevancia}}</textarea>
              
            </div>

            <div class="col-sm-12 mt-2">
                <label for="referencias">Referências:</label>
                <textarea class="form-control " id="referencias" autocomplete="referencias"
                          >{{$solicitacao->dadosComplementares->referencias}}</textarea>
            </div>


        </div>
        @include('component.botoes_new_form_avaliador')
    </form>
</div>


