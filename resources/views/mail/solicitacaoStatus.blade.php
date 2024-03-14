<div class="container">
    <div class="row justify-content-center" style="margin-top:100px">
        <div class="col-sm-12" align="center">
            <a target="_blank" href="http://ww3.uag.ufrpe.br/">
                <img src="{{$message->embed(public_path() . '/images/logoUfapeAzul.png')}}" width="30px">
            </a>
        </div>
    </div>

    <p>
        <font face="Times New Roman" font size="4" color="black">
            Olá, {{$responsavel->nome}}.<br>
            O status da solicitação de projeto <strong>{{strtoupper($avaliacao->solicitacao->titulo_pt)}}</strong> que você é responsável foi atualizado e encontra-se
            <b>
                @if($avaliacao->status == 'aprovado_colegiado')
                    APROVADA!
                @elseif($avaliacao->status == 'reprovada')
                    REPROVADA!
                @elseif($avaliacao->status == 'aprovado_avaliador')
                    APROVADA na primeira fase de avaliação - Aguardando Revisão pelo Colegiado
                @else
                    APROVADA COM PENDÊNCIAS!
                @endif
            </b>.<br>
            Entre no sistema para maiores detalhes.
        </font>
    </p>
    <a href="{{route('welcome')}}">CEUA - LMTS</a>
</div>
