<div class="card shadow-lg p-3 bg-white" style="border-radius: 0px 0px 10px 10px">
    @if($solicitacao->status == 'avaliado' && $solicitacao->avaliacao->first()->status == 'aprovadaPendencia')
        <a type="button" class="btn btn-info text-start" style="position: absolute;pointer-events: all;z-index:10;" data-toggle="modal" data-target="#pendenciaVisuModal" title="Pendência"><img src="{{asset('images/pendencia.svg')}}" width="30px"></a>
    @endif

    <form id="form7" method="POST" action="{{route('solicitacao.condicoes_animal.criar')}}">
        @csrf
        <input type="hidden" name="planejamento_id" @if(!empty($planejamento)) value="{{$planejamento->id}}" @endif>
        <div class="row">
            <div class="col-12">
                <h3 class="subtitulo">Condições de alojamento e alimentação dos animais</h3>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12">
                <label for="condicoes_particulares" style="margin-bottom: 0px">Comentar obrigatoriamente sobre os itens abaixo e as demais condições que forem particulares à espécie:</label><br>
                <span style="margin: 0px; font-weight: lighter; font-size: 14px; color: gray">
                        1. Alimentação; 2. Fonte de Água; 3. Lotação - Número de animais/área; 4. Exaustão do ar: sim ou não;
                   </span>
                <textarea class="form-control @error('condicoes_particulares') is-invalid @enderror" id="condicoes_particulares" name="condicoes_particulares" required
                          autocomplete="condicoes_particulares"
                          autofocus>@if(!empty($condicoes_animal) && $condicoes_animal->condicoes_particulares != null){{$condicoes_animal->condicoes_particulares}}@else{{old('condicoes_particulares')}}@endif</textarea>
                @error('condicoes_particulares')
                <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
                @enderror
            </div>

            <div class="col-sm-12 mt-2">
                <label for="local">Local onde será mantido o animal durante o procedimento experimental (biotério, fazenda, aviário, laboratório, outro):</label>
                <textarea class="form-control @error('local') is-invalid @enderror" id="local" name="local" required autocomplete="local"
                          autofocus>@if(!empty($condicoes_animal) && $condicoes_animal->local != null){{$condicoes_animal->local}}@else{{old('local')}}@endif</textarea>
                @error('local')
                <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
                @enderror
            </div>

        </div>


        <div class="row mt-2">
            <div class="col-sm-6">
                <label for="ambiente_alojamento">Ambiente de alojamento:</label>
                <select class="form-control @error('ambiente_alojamento') is-invalid @enderror" id="ambiente_alojamento" name="ambiente_alojamento">
                    <option disabled selected>Selecione o Ambiente de Alojamento</option>
                    <option @if(!empty($condicoes_animal) && $condicoes_animal->ambiente_alojamento == "baia") selected @endif value="baia" >Baia</option>
                    <option @if(!empty($condicoes_animal) && $condicoes_animal->ambiente_alojamento == "gaiola") selected @endif value="gaiola">Gaiola</option>
                    <option @if(!empty($condicoes_animal) && $condicoes_animal->ambiente_alojamento == "galpao") selected @endif value="galpao">Galpão</option>
                    <option @if(!empty($condicoes_animal) && $condicoes_animal->ambiente_alojamento == "jaula") selected @endif value="jaula">Jaula</option>
                    <option @if(!empty($condicoes_animal) && $condicoes_animal->ambiente_alojamento == "outro") selected @endif value="outro">Outro</option>
                </select>
                @error('ambiente_alojamento')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>

            <div class="col-sm-6">
                <label for="tipo_cama">Tipo de cama:</label>
                <select class="form-control @error('tipo_cama') is-invalid @enderror" id="tipo_cama" name="tipo_cama">
                    <option disabled selected>Selecione o Tipo de Cama</option>
                    <option @if(!empty($condicoes_animal) && $condicoes_animal->tipo_cama == "estrado") selected @endif value="estrado">Estrado</option>
                    <option @if(!empty($condicoes_animal) && $condicoes_animal->tipo_cama == "maravalha") selected @endif value="maravalha">Maravalha</option>
                    <option @if(!empty($condicoes_animal) && $condicoes_animal->tipo_cama == "outra") selected @endif value="outra">Outra</option>
                </select>
                @error('tipo_cama')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
        </div>

        <div class="row mt-2">
            <div class="col-sm-4">
                <label for="num_animais_ambiente">Número de animais por ambiente de contenção:</label>
                <input class="form-control @error('num_animais_ambiente') is-invalid @enderror" id="num_animais_ambiente" type="number" name="num_animais_ambiente"
                       @if(!empty($condicoes_animal) && $condicoes_animal->num_animais_ambiente != null) value="{{$condicoes_animal->num_animais_ambiente}}" @else value="{{old('num_animais_ambiente')}}" @endif required
                       autocomplete="num_animais_ambiente" autofocus>
                @error('num_animais_ambiente')
                <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
                @enderror
            </div>
            <div class="col-sm-4">
                <label for="dimensoes_ambiente">Dimensões do ambiente de contenção dos animais:</label>
                <input class="form-control @error('dimensoes_ambiente') is-invalid @enderror" id="dimensoes_ambiente" type="text" name="dimensoes_ambiente"
                       @if(!empty($condicoes_animal) && $condicoes_animal->dimensoes_ambiente != null) value="{{$condicoes_animal->dimensoes_ambiente}}" @else value="{{old('dimensoes_ambiente')}}" @endif
                       required
                       autocomplete="dimensoes_ambiente" autofocus>
                @error('dimensoes_ambiente')
                <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
                @enderror
            </div>
            <div class="col-sm-4">
                <label for="periodo">Período total de manutenção dos animais no experimento:</label>
                <input class="form-control @error('periodo') is-invalid @enderror" id="periodo" type="text" name="periodo"
                       @if(!empty($condicoes_animal) && $condicoes_animal->periodo != null) value="{{$condicoes_animal->periodo}}" @else value="{{old('periodo')}}" @endif
                       required
                       autocomplete="periodo" placeholder="Exemplo1: 30 dias / Exemplo2: 4 anos / etc" autofocus>
                @error('periodo')
                <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
                @enderror
            </div>
        </div>

        <div class="row mt-2">
            <div class="col-6">
                <label for="profissional_responsavel">Profissional responsável:</label>
                <input class="form-control @error('profissional_responsavel') is-invalid @enderror" id="profissional_responsavel" type="text" name="profissional_responsavel"
                       @if(!empty($condicoes_animal) && $condicoes_animal->profissional_responsavel != null) value="{{$condicoes_animal->profissional_responsavel}}" @else value="{{old('profissional_responsavel')}}" @endif required
                       autocomplete="profissional_responsavel" autofocus>
                @error('profissional_responsavel')
                <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
                @enderror
            </div>

            <div class="col-6">
                <label for="email_responsavel">Email do responsável:</label>
                <input class="form-control @error('email_responsavel') is-invalid @enderror" id="email_responsavel" type="email" name="email_responsavel"
                       @if(!empty($condicoes_animal) && $condicoes_animal->email_responsavel != null) value="{{$condicoes_animal->email_responsavel}}" @else value="{{old('email_responsavel')}}" @endif
                       required
                       autocomplete="email_responsavel" autofocus>
                @error('email_responsavel')
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

