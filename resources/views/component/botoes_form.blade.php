@if(!isset($disabled))
    <div class="row mt-4">
        <div class="col-3">
            <a class="btn btn-secondary w-100" href="#">Voltar</a>
        </div>

        <div class="col-6">
        </div>

        <div class="col-3">
            <button type="submit" class="btn btn-success w-100">@if($solicitacao->estado_pagina == 11) Concluir @else Próximo @endif</button>
        </div>
    </div>
@elseif(\Illuminate\Support\Facades\Auth::user()->tipo_usuario_id == 2)
    <div class="row mt-4">
        <div class="col-3">
            <a class="btn btn-secondary w-100" href="#">Voltar</a>
        </div>
        <div class="col-auto"></div>
        <div class="col-3">
            <a class="btn btn-danger w-100" data-toggle="modal" data-target="#reprovarModal">Reprovar</a>
        </div>
        <div class="col-auto"></div>
        <div class="col-3">
            <button type="submit" class="btn btn-success w-100">Aprovar</button>
        </div>
    </div>


    <!-- Modal -->
    <div class="modal fade" id="reprovarModal" tabindex="-1" role="dialog" aria-labelledby="reprovarModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="reprovarModalLabel">Reprovar Solicitação</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form method="POST" action="#">
                    <div class="modal-body">
                        <div class="col-sm-12 mt-2">
                            <label for="parecer">Parecer:</label>
                            <textarea class="form-control @error('parecer') is-invalid @enderror" id="parecer" name="parecer" required autocomplete="parecer"
                                      autofocus></textarea>
                            @error('parecer')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{$message}}</strong>
                            </span>
                            @enderror
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                        <button type="submit" class="btn btn-danger">Reprovar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endif
