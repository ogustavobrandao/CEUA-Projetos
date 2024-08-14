@extends('layouts.app')

@section('content')
<div>
    @yield('login')
    <div class="row my-5 justify-content-center">

        <ul class="nav justify-content-center">
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="{{route('solicitacao.index', ['solicitacao_id' => $solicitacao->id])}}">Dados Iniciais</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">Dados do Responsável</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">Dados dos(as) Colaborador(es)</a>
            </li>
            <li class="nav-item">
              <a class="nav-link disabled" aria-disabled="true">Disabled</a>
            </li>
          </ul>

        <div class="col-10 offset-0 mt-5 pt-3 shadow-lg  Background-container">
            @yield('form')
        </div>

    </div>
</div>
@endsection

<script type="text/javascript" src="https://code.jquery.com/jquery-1.7.2.min.js"></script>
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
