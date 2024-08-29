@extends('layouts.app')

@section('content')
    <div class="row my-5 justify-content-center">

        <ul class="nav justify-content-center gap-3">
            <li class="nav-item">
                <a class="nav-link border-bottom border-3 {{Route::is('solicitacao.index') ? 'text-danger border-danger' : 'text-secondary border-secondary'}}" aria-current="page"
                    href="{{ route('solicitacao.index', ['solicitacao_id' => $solicitacao->id]) }}">1. Dados Iniciais</a>
            </li>
            <li class="nav-item">
                <a class="nav-link border-bottom border-3 {{Route::is('solicitacao.create_responsavel') ? 'text-danger border-danger' : 'text-secondary border-secondary'}}" aria-current="page"
                    href="{{route('solicitacao.create_responsavel', ['solicitacao_id' => $solicitacao->id])}}">2. Dados do Responsável</a>
            </li>
            <li class="nav-item">
                <a class="nav-link border-bottom border-3 {{Route::is('solicitacao.create_colaborador') ? 'text-danger border-danger' : 'text-secondary border-secondary'}}"
                    href="{{route('solicitacao.create_colaborador', ['solicitacao_id' => $solicitacao->id])}}">3. Dados dos(as) Colaborador(es)</a>
            </li>
            <li class="nav-item">
                <a class="nav-link border-bottom border-3 {{Route::is('solicitacao.create_complementares') ? 'text-danger border-danger' : 'text-secondary border-secondary'}}"
                    href="{{route('solicitacao.create_complementares', ['solicitacao_id' => $solicitacao->id])}}">4. Dados Complementares</a>
            </li>
            <li class="nav-item">
                <a class="nav-link border-bottom border-3 {{Route::is('solicitacao.create_modelo_animal') ? 'text-danger border-danger' : 'text-secondary border-secondary'}}"
                    href="{{route('solicitacao.create_modelo_animal', ['solicitacao_id' => $solicitacao->id])}}">5. Dados dos Modelos Animais</a>
            </li>

            {{-- <li class="nav-item"> só para ficar de lembrete - apagar depois
                <a class="nav-link disabled" aria-disabled="true">Disabled</a>
            </li> --}}
        </ul>
    </div>

    <div class="row my-5 justify-content-center">

        <ul class="nav justify-content-center gap-3">
            <li class="nav-item">
                <a class="nav-link border-bottom border-3 {{Route::is('solicitacao.index') ? 'text-danger border-danger' : 'text-secondary border-secondary'}}" aria-current="page"
                    href="{{ route('solicitacao.index', ['solicitacao_id' => $solicitacao->id]) }}">5.1. Dados Base</a>
            </li>
            <li class="nav-item">
                <a class="nav-link border-bottom border-3 {{Route::is('solicitacao.create_responsavel') ? 'text-danger border-danger' : 'text-secondary border-secondary'}}" aria-current="page"
                    href="{{route('solicitacao.create_responsavel', ['solicitacao_id' => $solicitacao->id])}}">5.2. Planejamento</a>
            </li>
            <li class="nav-item">
                <a class="nav-link border-bottom border-3 {{Route::is('solicitacao.create_colaborador') ? 'text-danger border-danger' : 'text-secondary border-secondary'}}"
                    href="{{route('solicitacao.create_colaborador', ['solicitacao_id' => $solicitacao->id])}}">5.3. Condição Animal</a>
            </li>
            <li class="nav-item">
                <a class="nav-link border-bottom border-3 {{Route::is('solicitacao.create_complementares') ? 'text-danger border-danger' : 'text-secondary border-secondary'}}"
                    href="{{route('solicitacao.create_complementares', ['solicitacao_id' => $solicitacao->id])}}">5.4. Procedimento</a>
            </li>
            <li class="nav-item">
                <a class="nav-link border-bottom border-3 {{Route::is('solicitacao.create_modelo_animal') ? 'text-danger border-danger' : 'text-secondary border-secondary'}}"
                    href="{{route('solicitacao.create_modelo_animal', ['solicitacao_id' => $solicitacao->id])}}">5.5. Cirurgia</a>
            </li>
            <li class="nav-item">
                <a class="nav-link border-bottom border-3 {{Route::is('solicitacao.create_modelo_animal') ? 'text-danger border-danger' : 'text-secondary border-secondary'}}"
                    href="{{route('solicitacao.create_modelo_animal', ['solicitacao_id' => $solicitacao->id])}}">5.6. Finalização</a>
            </li>
            <li class="nav-item">
                <a class="nav-link border-bottom border-3 {{Route::is('solicitacao.create_modelo_animal') ? 'text-danger border-danger' : 'text-secondary border-secondary'}}"
                    href="{{route('solicitacao.create_modelo_animal', ['solicitacao_id' => $solicitacao->id])}}">5.7. Resultado</a>
            </li>

        </ul>
    </div>
    <div class="container shadow-lg p-3" style="border-radius: 1rem;">
        @yield('form')
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
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            success: (dados) => {
                if (dados.length > 0) {
                    $.each(dados, function(i, obj) {
                        if ("{{ old('unidade') }}" == obj.id) {
                            option += '<option selected value="' + obj.id + '">' + obj.nome +
                                '</option>';
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
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            success: (dados) => {
                if (dados.length > 0) {
                    $.each(dados, function(i, obj) {
                        if ("{{ old('departamento') }}" == obj.id) {
                            option += '<option selected value="' + obj.id + '">' + obj.nome +
                                '</option>';
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

    $(document).ready(function() {
        unidades();
        departamentos();
    });
</script>

<script>
    $(document).ready(function($) {
        $('.cpf').mask('000.000.000-00');

        let SPMaskBehavior = function(val) {
            return val.replace(/\D/g, '').length === 11 ? '(00) 00000-0000' : '(00) 0000-00000';
        };

        let spOptions = {
            onKeyPress: function(val, e, field, options) {
                field.mask(SPMaskBehavior.apply({}, arguments), options);
            }
        };

        $('.celular').mask(SPMaskBehavior, spOptions);

        $(".name").mask("#", {
            maxlength: true,
            translation: {
                '#': {
                    pattern: /^[A-Za-záâãéêíóôõúçÁÂÃÉÊÍÓÔÕÚÇ\s]+$/,
                    recursive: true
                }
            }
        });

        $('#cpf').mask('000.000.000-00');
        $('#celular').mask(SPMaskBehavior, spOptions);
        $("#name").mask("#", {
            maxlength: true,
            translation: {
                '#': {
                    pattern: /^[A-Za-záâãéêíóôõúçÁÂÃÉÊÍÓÔÕÚÇ\s]+$/,
                    recursive: true
                }
            }
        });
    });
</script>
