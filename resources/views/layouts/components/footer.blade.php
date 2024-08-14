<footer class="container-fluid pt-1 mt-5" style="background-color: #972E3F">
    <div class="container-fluid px-lg-5">
        <div class="row justify-content-between  my-2">
            <div class="col-md-4 d-flex align-items-center justify-content-center py-1">
                <a class="navbar-brand mx-3" href="">
                    <img width="230px" src="{{asset('images/logo-branca.png')}}">
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
                        <div class="row justify-content-center">
                            <div class="col-1"></div>
                            <div class="col-5 d-flex align-items-center justify-content-end">
                                <a href="http://ufape.edu.br/" target="_blank"><img
                                        src="{{ asset('images/logo-ufape.png') }}" alt="Logo" height="94px;" style="float: right; margin-right: -20px; margin-top: -2%"></a>
                            </div>
                            <div class="col-5">
                                <a href="http://lmts.uag.ufrpe.br/" target="_blank"><img
                                        src="{{ asset('images/logo-lmts.png') }}" alt="Logo" height="70px"
                                        style="margin-top: 3%; float: left "></a>
                            </div>
                            <div class="col-1"></div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-3 text-center mt-1">
                <span class="textoRodape">Redes do LMTS:</span>
                <div class="row justify-content-center text-center mt-2 p-2" style="margin: 0 -8rem">

                    <a href="https://www.facebook.com/LMTSUFAPE/" target="_blank" class="col-md-1 p-0"> <img height="40"
                                                                                                             src="{{asset('images/facebook_logo.png')}}"></a>
                    <a href="https://www.instagram.com/lmts_ufape/" target="_blank" class="col-md-1 p-0 mx-2"> <img
                            height="40" src="{{asset('images/instagram_logo.png')}}"></a>
                    <a href="mailto:lmts@ufrpe.br" class="col-md-1 p-0"> <img height="40"
                                                                              src="{{asset('images/google_logo.png')}}"></a>
                </div>
            </div>
        </div>
    </div>
</footer>
