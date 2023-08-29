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
            Olá Administrador, {{$admin->name}}.<br>
            Avaliação APROVADA pelo avaliador e aguardando aprovação pelo Colegiado.
            </b>.<br>
            Entre no sistema para maiores detalhes.
        </font>
    </p>
    <a href="{{route('welcome')}}">CEUA - LMTS</a>
</div>
