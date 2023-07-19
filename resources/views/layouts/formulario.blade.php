
<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js"
            integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13"
            crossorigin="anonymous"></script>
    <script type="text/javascript" src="http://code.jquery.com/jquery-1.7.2.min.js"></script>
    <script type="text/javascript" charset="utf8"
            src="https://cdn.datatables.net/1.11.4/js/jquery.dataTables.js"></script>
    <script defer="defer" src="//barra.brasil.gov.br/barra_2.0.js" type="text/javascript"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.min.js" integrity="sha512-pHVGpX7F/27yZ0ISY+VVjyULApbDlD0/X0rgGbTqCE7WFW5MezNTWG/dnhtbBuICzsd0WQPgpE4REBLv+UqChw==" crossorigin="anonymous"></script>


    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css"
          integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3"
          crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css"
          integrity="sha512-1sCRPdkRXhBV2PBLUdRb4tMg1w2YPf37qatUFeS7zlBy7jJI8Lf4VHwWfZZfpXtYSLy85pkm9GaYVYMfw5BC1A=="
          crossorigin="anonymous" referrerpolicy="no-referrer"/>
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.22/css/jquery.dataTables.css">
    <!-- Styles -->
    <link rel="stylesheet" href="{{ asset ('css/app.css') }}">
</head>
<body>

<div id="barra-brasil" style="background:#7F7F7F; height: 20px; padding:0 0 0 10px;display:block;">
    <ul id="menu-barra-temp" style="list-style:none;">
        <li style="display:inline; float:left;padding-right:10px; margin-right:10px; border-right:1px solid #EDEDED">
            <a href="http://brasil.gov.br" style="font-family:sans,sans-serif; text-decoration:none; color:white;">Portal
                do Governo Brasileiro</a>
        </li>
    </ul>
</div>

@include('layouts.components.navbar2')
<div id="app">
    @yield('login')
    <div class="row my-5 justify-content-center">

        <div class="col-10 offset-0 mt-5 pt-3 shadow-lg  Background-container">
            @include('layouts.components.messages')
            @yield('content')
        </div>

    </div>
    @include('layouts.components.footer')
</div>
</body>
</html>

<script type="text/javascript" src="http://code.jquery.com/jquery-1.7.2.min.js"></script>
<script>

    function unidades(id) {
        var instituicao = $('#instituicao' + id).val();
        $.ajax({
            type: 'POST',
            url: '{{ route('unidade.consulta') }}',
            data: 'instituicao=' + instituicao,
            headers:
                {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
            success: (dados) => {
                if (dados.length > 0) {
                    $.each(dados, function (i, obj) {
                        if ("{{old('unidade')}}" == obj.id) {
                            option += '<option selected value="' + obj.id + '">' + obj.nome + '</option>';
                        } else {
                            option += '<option value="' + obj.id + '">' + obj.nome + '</option>';
                        }
                    })
                } else {
                    var option = "<option selected disabled>Não possui unidade</option>";
                }
                $('#unidade' + id).html(option).show();
                departamentos();
            },
            error: (data) => {
                console.log(data);
            }

        })
    }

    function departamentos() {
        var unidade = $('#unidade').val();
        $.ajax({
            type: 'POST',
            url: '{{ route('departamento.consulta') }}',
            data: 'unidade=' + unidade,
            headers:
                {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
            success: (dados) => {
                if (dados.length > 0) {
                    $.each(dados, function (i, obj) {
                        if ("{{old('departamento')}}" == obj.id) {
                            option += '<option selected value="' + obj.id + '">' + obj.nome + '</option>';
                        } else {
                            option += '<option value="' + obj.id + '">' + obj.nome + '</option>';
                        }
                    })
                } else {
                    var option = "<option selected disabled>Não possui departamento</option>";
                }
                $('#departamento').html(option).show();
            },
            error: (data) => {
                console.log(data);
            }

        })
    }

    $(document).ready(function () {
        unidades();
        departamentos();
    });

</script>

<script>
    $(document).ready(function ($) {
        $('.cpf').mask('000.000.000-00');

        let SPMaskBehavior = function (val) {
            return val.replace(/\D/g, '').length === 11 ? '(00) 00000-0000' : '(00) 0000-00000';
        };

        let spOptions = {
            onKeyPress: function (val, e, field, options) {
                field.mask(SPMaskBehavior.apply({}, arguments), options);
            }
        };

        $('.celular').mask(SPMaskBehavior, spOptions);

        $(".name").mask("#", {
            maxlength: true,
            translation: {
                '#': { pattern: /^[A-Za-záâãéêíóôõúçÁÂÃÉÊÍÓÔÕÚÇ\s]+$/, recursive: true }
            }
        });

        $('#cpf').mask('000.000.000-00');
        $('#celular').mask(SPMaskBehavior, spOptions);
        $("#name").mask("#", {
            maxlength: true,
            translation: {
                '#': { pattern: /^[A-Za-záâãéêíóôõúçÁÂÃÉÊÍÓÔÕÚÇ\s]+$/, recursive: true }
            }
        });
    });
</script>
