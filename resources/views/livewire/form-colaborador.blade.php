<div id="listaColaborador">
    <div class="card p-3 borda-bottom" style="border-radius: 10px 10px 0px 0px;" id="fundo_2">
        <div class="row">
            <div class="col-md-12">
                @if(Auth::user()->tipo_usuario_id == 2)
                    <h2 class="titulo" id="titulo_2">3. Dados do(s) Colaborador(es) <strong style="color: red">*</strong>
                        @if(!isset($solicitacao->responsavel))
                            <small style="color: red; font-weight: bold">Necessária a criação de um
                                responsável</small>
                        @endif
                        <a class="float-end" id="2_btn_up"><i
                                class="fa-solid fa-circle-chevron-up"></i></a>
                        <a class="float-end" id="2_btn_down" style="display: none"><i
                                class="fa-solid fa-circle-chevron-down"></i></a>
                        @if(!isset($disabled) && isset($solicitacao->responsavel))
                            <a class="float-end mr-2" wire:click="$emit('adicionarColaborador')" style="color: green"
                                title="Adicionar Colaborador">
                                <i class="fa-solid fa-circle-plus fa-2xl"></i></a>
                        @endif
                    </h2>
                @else
                    <h2 class="titulo" id="titulo_2">3. Dados do(s) Colaborador(es)
                        @if(!isset($solicitacao->responsavel))
                            <small style="color: red; font-weight: bold">Necessária a criação de um
                                responsável</small>
                        @endif
                        <a class="float-end" id="2_btn_up"><i
                                class="fa-solid fa-circle-chevron-up"></i></a>
                        <a class="float-end" id="2_btn_down" style="display: none"><i
                                class="fa-solid fa-circle-chevron-down"></i></a>
                        @if(!isset($disabled) && isset($solicitacao->responsavel))
                            <a class="float-end mr-2" wire:click="$emit('adicionarColaborador')" style="color: green"
                                title="Adicionar Colaborador">
                                <i class="fa-solid fa-circle-plus fa-2xl"></i></a>
                        @endif
                    </h2>
                @endif
            </div>
        </div>
    </div>
    <div id="dados_colaborador">
        @if(Auth::user()->tipo_usuario_id == 2)
            @livewire('form-repeater-colaborador', ['solicitacao' => $solicitacao, 'colaboradores' => $solicitacao->responsavel?->colaboradores, 'avaliacao_id' => $avaliacao->id, 'id' => -1, 'tipo'=>2])
        @elseif(Auth::user()->tipo_usuario_id == 3 && $solicitacao->status == 'avaliado'
                && $solicitacao->avaliacao->first()->status == 'aprovadaPendencia')
            @livewire('form-repeater-colaborador', ['solicitacao' => $solicitacao, 'colaboradores' => $solicitacao->responsavel?->colaboradores, 'tipo'=>2, 'id' => -1, 'status' => $solicitacao->avaliacao->first()->avaliacao_individual->where('tipo',2)->first()->status])
        @else
            @livewire('form-repeater-colaborador', ['solicitacao' => $solicitacao, 'colaboradores' => $solicitacao->responsavel?->colaboradores])
        @endif
    </div>
</div>
