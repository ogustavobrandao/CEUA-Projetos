<div class="card shadow-lg p-3 bg-white" style="border-radius: 10px">
    <div class="row">
        <div class="col-md-12">
            <h1 class="borda-bottom">Responsavel</h1>
        </div>
    </div>
    <div class="row justify-content-center">

        <div class="col-sm-7">
            <label for="nome">Nome:</label>
            <input class="form-control @error('nome') is-invalid @enderror" id="nome" type="text" name="nome" value="{{ old('nome') }}" required autocomplete="nome" autofocus>
            @error('nome')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>

        <div class="col-sm-4">
            <label for="telefone">Telefone:</label>
            <input class="form-control @error('telefone') is-invalid @enderror" id="telefone" type="text" name="telefone" value="{{ old('telefone') }}" required autocomplete="telefone" autofocus>
            @error('telefone')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>

    </div>
</div>

