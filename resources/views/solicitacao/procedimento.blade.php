<div class="card shadow-lg p-3 bg-white" style="border-radius: 10px">
    <div class="row">
        <div class="col-md-12">
            <h1 class="borda-bottom text-center titulo">Solicitação - Procedimento</h1>
        </div>
    </div>

    <form method="POST" action="{{route('solicitacao.procedimento.criar')}}" enctype="multipart/form-data">
        @csrf
        <input type="hidden" name="solicitacao_id" value="{{$solicitacao->id}}">
        <div class="row col-md-12">
            <h3 class="subtitulo">Informações</h3>

            <div class="col-sm-4 mt-2">
                <label for="estresse">Estresse/dor intencional nos animais:</label>
                <div class="row ml-1">
                    <div class="col-sm-2">
                        <input class="form-check-input" type="radio" name="estresse" id="estresse">
                        <label class="form-check-label" for="estresse">Sim</label>
                    </div>
                    <div class="col-sm-2">
                        <input class="form-check-input" type="radio" name="estresse" id="estresse" value="false" checked>
                        <label class="form-check-label" for="estresse">
                            Não
                        </label>
                    </div>
                </div>
            </div>

            <div class="col-sm-4 mt-2">
                <label for="anestesico">Uso de fármacos anestésicos:</label>
                <div class="row ml-1">
                    <div class="col-sm-2">
                        <input class="form-check-input" type="radio" name="anestesico" id="anestesico">
                        <label class="form-check-label" for="anestesico">Sim</label>
                    </div>
                    <div class="col-sm-2">
                        <input class="form-check-input" type="radio" name="anestesico" id="anestesico" value="false" checked>
                        <label class="form-check-label" for="anestesico">
                            Não
                        </label>
                    </div>
                </div>
            </div>

            <div class="col-sm-4 mt-2">
                <label for="relaxante">Uso de relaxante muscular:</label>
                <div class="row ml-1">
                    <div class="col-sm-2">
                        <input class="form-check-input" type="radio" name="relaxante" id="relaxante">
                        <label class="form-check-label" for="relaxante">Sim</label>
                    </div>
                    <div class="col-sm-2">
                        <input class="form-check-input" type="radio" name="relaxante" id="relaxante" value="false" checked>
                        <label class="form-check-label" for="relaxante">
                            Não
                        </label>
                    </div>
                </div>
            </div>

            <div class="col-sm-4 mt-2">
                <label for="analgesico">Uso de fármacos analgésicos:</label>
                <div class="row ml-1">
                    <div class="col-sm-2">
                        <input class="form-check-input" type="radio" name="analgesico" id="analgesico">
                        <label class="form-check-label" for="analgesico">Sim</label>
                    </div>
                    <div class="col-sm-2">
                        <input class="form-check-input" type="radio" name="analgesico" id="analgesico" value="false" checked>
                        <label class="form-check-label" for="analgesico">
                            Não
                        </label>
                    </div>
                </div>
            </div>

            <div class="col-sm-4 mt-2">
                <label for="imobilizacao">Imobilização/Contenção do animal:</label>
                <div class="row ml-1">
                    <div class="col-sm-2">
                        <input class="form-check-input" type="radio" name="imobilizacao" id="imobilizacao">
                        <label class="form-check-label" for="imobilizacao">Sim</label>
                    </div>
                    <div class="col-sm-2">
                        <input class="form-check-input" type="radio" name="imobilizacao" id="imobilizacao" value="false" checked>
                        <label class="form-check-label" for="imobilizacao">
                            Não
                        </label>
                    </div>
                </div>
            </div>

            <div class="col-sm-4 mt-2">
                <label for="inoculacao_substancia">Exposição / Inoculação / Administração:</label>
                <div class="row ml-1">
                    <div class="col-sm-2">
                        <input class="form-check-input" type="radio" name="inoculacao_substancia" id="inoculacao_substancia">
                        <label class="form-check-label" for="inoculacao_substancia">Sim</label>
                    </div>
                    <div class="col-sm-2">
                        <input class="form-check-input" type="radio" name="inoculacao_substancia" id="inoculacao_substancia" value="false" checked>
                        <label class="form-check-label" for="inoculacao_substancia">
                            Não
                        </label>
                    </div>
                </div>
            </div>

            <div class="col-sm-4 mt-2">
                <label for="extracao">Extração de materiais biológicos:</label>
                <div class="row ml-1">
                    <div class="col-sm-2">
                        <input class="form-check-input" type="radio" name="extracao" id="extracao">
                        <label class="form-check-label" for="extracao">Sim</label>
                    </div>
                    <div class="col-sm-2">
                        <input class="form-check-input" type="radio" name="extracao" id="extracao" value="false" checked>
                        <label class="form-check-label" for="extracao">
                            Não
                        </label>
                    </div>
                </div>
            </div>

            <h3 class="subtitulo">Condições alimentares</h3>

            <div class="col-sm-4 mt-2">
                <label for="jejum">Jejum:</label>
                <div class="row ml-1">
                    <div class="col-sm-2">
                        <input class="form-check-input" type="radio" name="jejum" id="jejum">
                        <label class="form-check-label" for="jejum">Sim</label>
                    </div>
                    <div class="col-sm-2">
                        <input class="form-check-input" type="radio" name="jejum" id="jejum" value="false" checked>
                        <label class="form-check-label" for="jejum">
                            Não
                        </label>
                    </div>
                </div>
            </div>

            <div class="col-sm-4 mt-2">
                <label for="restricao_hidrica">Restrição Hídrica:</label>
                <div class="row ml-1">
                    <div class="col-sm-2">
                        <input class="form-check-input" type="radio" name="restricao_hidrica" id="restricao_hidrica">
                        <label class="form-check-label" for="restricao_hidrica">Sim</label>
                    </div>
                    <div class="col-sm-2">
                        <input class="form-check-input" type="radio" name="restricao_hidrica" id="restricao_hidrica"  value="false"checked>
                        <label class="form-check-label" for="restricao_hidrica">
                            Não
                        </label>
                    </div>
                </div>
            </div>

        </div>
        @include('component.botoes_form')
    </form>
</div>

