<footer class="pt-1 borda-top" style="background-color: #F8FAFC">
    <div class="row justify-content-between  my-2">
        <div class="col-md-4 text-center py-1">
            <a class="navbar-brand mx-3" href="">
                <img class="img-fluid" width="120px" src="{{asset('images/logo.png')}}">
            </a>
        </div>

        <div class="col-md-4 text-center py-1">
            <div class="form-row">
                <div class="col-md-12">
                    <h6 class="textoRodape">Desenvolvido por:</h6>
                </div>
            </div>
            <div class="form-row">
                <div class="col-md-12" style="margin-bottom: 1rem;">
                    <div class="row justify-content-between">
                        <div class="col-md-3">
                            <a href="http://ufape.edu.br/" target="_blank"><img class="img-fluid"
                                    src="{{ asset('images/logo_ufape_blue.png') }}" alt="Logo" width="30px;"
                                    style="float: right"></a>
                        </div>
                        <div class="col-md-5">
                            <a href="http://lmts.uag.ufrpe.br/" target="_blank"><img class="img-fluid"
                                    src="{{ asset('images/logo_ufape_color.png') }}" alt="Logo" width="160px;"
                                    style="border-left: 1px rgba(0, 0, 255, 0.274) solid; padding-left: 15px"></a>
                        </div>
                        <div class="col-md-4">
                            <a href="http://lmts.uag.ufrpe.br/" target="_blank"><img class="img-fluid"
                                    src="{{ asset('images/logo_secSaude.png') }}" alt="Logo" width="120px;"
                                    style="border-left: 1px rgba(0, 0, 255, 0.274) solid; padding-left: 15px;"></a>
                        </div>

                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-4 text-center mb-2">
            <span class="textoRodape">Redes do LMTS:</span>
            <div class="row justify-content-center text-center">
                <a href="https://www.facebook.com/LMTSUFAPE/" target="_blank" class="col-md-1 p-0"> <img height="40"
                                                                                                         src="{{asset('images/facebook_logo.png')}}"></a>
                <a href="https://www.instagram.com/lmts_ufape/" target="_blank" class="col-md-1 p-0 mx-2"> <img
                        height="40" src="{{asset('images/instagram_logo.png')}}"></a>
                <a href="mailto:lmts@ufrpe.br" class="col-md-1 p-0"> <img height="40"
                                                                          src="{{asset('images/google_logo.png')}}"></a>
            </div>
        </div>
    </div>
</footer>
