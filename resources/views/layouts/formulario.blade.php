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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"
            integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ=="
            crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/js/all.min.js"
            integrity="sha512-8pHNiqTlsrRjVD4A/3va++W1sMbUHwWxxRPWNyVlql3T+Hgfd81Qc6FC5WMXDC+tSauxxzp1tgiAvSKFu1qIlA=="
            crossorigin="anonymous" referrerpolicy="no-referrer"></script>


    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css"
          integrity="sha512-1sCRPdkRXhBV2PBLUdRb4tMg1w2YPf37qatUFeS7zlBy7jJI8Lf4VHwWfZZfpXtYSLy85pkm9GaYVYMfw5BC1A=="
          crossorigin="anonymous" referrerpolicy="no-referrer"/>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css"
          integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3"
          crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css"
          integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g=="
          crossorigin="anonymous" referrerpolicy="no-referrer"/>

    <!-- Styles -->
    <link rel="stylesheet" href="{{ asset ('css/app.css') }}">
    @livewireStyles
</head>
<body>
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
@livewireScripts
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
