<div class="card shadow-lg p-3 bg-white" style="border-radius: 10px">
    <div class="row">
        <div class="col-md-12">
            <h1 class="borda-bottom text-center titulo">Solicitação - Perfil</h1>
        </div>
    </div>

    <form method="POST" action="{{route('solicitacao.perfil.criar')}}">
        @csrf
        <input type="hidden" name="solicitacao_id" value="{{$solicitacao->id}}">
        <div class="row">
            <h3 class="subtitulo">Tipo e Característica</h3>
            <div class="col-sm-6">
                <label for="grupo_animal">Grupo Animal:</label>
                <select class="form-control" id="grupo_animal" name="grupo_animal" onchange="unidades()">
                    <option disabled selected>Selecione o Grupo Animal</option>
                    <option @if($perfil !=null && $perfil->grupo_animal == "anfibio") selected @endif value="anfibio">Anfíbio</option>
                    <option @if($perfil !=null && $perfil->grupo_animal == "ave") selected @endif value="ave">Ave</option>
                    <option @if($perfil !=null && $perfil->grupo_animal == "bovino") selected @endif value="bovino">Bovino</option>
                    <option @if($perfil !=null && $perfil->grupo_animal == "bubalino") selected @endif value="bubalino">Bubalino</option>
                    <option @if($perfil !=null && $perfil->grupo_animal == "canino") selected @endif value="canino">Canino</option>
                    <option @if($perfil !=null && $perfil->grupo_animal == "caprino") selected @endif value="caprino">Caprino</option>
                    <option @if($perfil !=null && $perfil->grupo_animal == "outro") selected @endif value="outro">Outro a especificar</option>
                    <option @if($perfil !=null && $perfil->grupo_animal == "ovino") selected @endif value="ovino">Ovino</option>
                    <option @if($perfil !=null && $perfil->grupo_animal == "peixes") selected @endif value="peixes">Peixes</option>
                    <option @if($perfil !=null && $perfil->grupo_animal == "roedores") selected @endif value="roedores">Roedores</option>
                </select>
            </div>

            <div class="col-sm-6">
                <label for="linhagem">Linhagem:</label>
                <input class="form-control @error('linhagem') is-invalid @enderror" id="linhagem" type="text" name="linhagem" @if($perfil !=null && $perfil->linhagem !=null) value="{{$perfil->linhagem}}" @else value="{{old('linhagem')}}" @endif required autocomplete="linhagem"
                       autofocus>
                @error('linhagem')
                <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
                @enderror
            </div>

        </div>

        <div class="row mt-2">
            <div class="col-sm-6">
                <label for="idade">Idade:</label>
                <input class="form-control @error('idade') is-invalid @enderror" id="idade" type="text" name="idade" @if($perfil !=null && $perfil->idade !=null) value="{{$perfil->idade}}" @else value="{{old('idade')}}" @endif required autocomplete="idade"
                       autofocus>
                @error('idade')
                <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
                @enderror
            </div>

            <div class="col-sm-6">
                <label for="peso">Peso Aproximado:</label>
                <input class="form-control @error('peso') is-invalid @enderror" id="peso" type="text" name="peso" @if($perfil !=null && $perfil->peso !=null) value="{{$perfil->peso}}" @else value="{{old('peso')}}" @endif required autocomplete="peso"
                       autofocus>
                @error('peso')
                <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
                @enderror
            </div>

        </div>

        <div class="row mt-2">

            <div class="col-sm-4">
                <label for="machos">Quantidade de machos:</label>
                <input class="form-control @error('machos') is-invalid @enderror" id="machos" type="number" name="machos" @if($perfil !=null && $perfil->machos !=null) value="{{$perfil->machos}}" @else value="{{old('machos')}}" @endif required autocomplete="machos"
                       autofocus>
                @error('machos')
                <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
                @enderror
            </div>

            <div class="col-sm-4">
                <label for="femeas">Quantidade de fêmeas:</label>
                <input class="form-control @error('femeas') is-invalid @enderror" id="femeas" type="number" name="femeas" @if($perfil !=null && $perfil->femeas !=null) value="{{$perfil->femeas}}" @else value="{{old('femeas')}}" @endif required autocomplete="femeas"
                       autofocus>
                @error('femeas')
                <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
                @enderror
            </div>

            <div class="col-sm-4">
                <label for="quantidade">Quantidade:</label>
                <input class="form-control @error('quantidade') is-invalid @enderror" id="quantidade" type="number" name="quantidade" @if($perfil !=null && $perfil->quantidade !=null) value="{{$perfil->quantidade}}" @else value="{{old('quantidade')}}" @endif required autocomplete="quantidade"
                       autofocus>
                @error('quantidade')
                <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
                @enderror
            </div>

        </div>

        @include('component.botoes_form')
    </form>

</div>

