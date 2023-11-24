<div class="container">
    <div class="row justify-content-center" style="margin-top:100px">
        <div class="col-sm-12" align="center">
            <a target="_blank" href="http://ww3.uag.ufrpe.br/">
                <img src="{{$message->embed(public_path() . '/images/CEUA_logo_vinho.png')}}" width="400px">
            </a>
        </div>
    </div>

    <p>
        <font face="Times New Roman" font size="4" color="black">
            Caro(a) {{$user->name}}, <br>
            Informamos que as contas duplicadas associadas ao seu CPF foram unificadas. <br>
            Utilize o email {{$user->email}} para acessar sua conta.
        </font>
    </p>
    <a href="{{route('welcome')}}">CEUA - LMTS</a>
</div>
