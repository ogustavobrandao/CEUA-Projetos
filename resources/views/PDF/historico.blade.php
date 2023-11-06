<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>PDF</title>
    <style>
        .list-group {
            margin-bottom: 10px;
            overflow-y: scroll;
            display: flex;
            flex-direction: column;
            padding-left: 0;
            border-radius: 0.25rem;
        }
        .list-group-item {
            border-top-left-radius: inherit;
            border-top-right-radius: inherit;
            position: relative;
            display: block;
            padding: 0.75rem 1.25rem;
            background-color: #fff;
            border: 1px solid rgba(0, 0, 0, 0.125);
            color: #212529;
            text-decoration: none;
        }
    </style>
</head>
<body>
	<h2>CEUA | Histórico da Solicitação | Pedido de nº: {{ $solicitacao->id }}</h2>
    <p>
        <b>Solicitante:</b> <span>{{ $solicitacao->user->name }}</span>
    </p>
    <p>
        <b>Título:</b> <span>{{ $solicitacao->titulo_pt }}</span>
    </p>
    <ul class="list-group">
        @foreach ($historicos as $historico)
            <li class="list-group-item">
                <p>
                    <strong>Status:</strong>
                    @if($historico->status_solicitacao == 'aprovado_colegiado')
                        Aprovado pelo Colegiado
                    @elseif($historico->status_solicitacao == 'aprovado_avaliador')
                        Aprovado pelo Avaliador
                    @elseif($historico->status_solicitacao == 'nao_avaliado')
                        Não avaliado
                    @elseif($historico->status_solicitacao == 'aprovadaPendencia')
                        Aprovado com Pendência
                    @else
                        Reprovado
                    @endif
                </p>
                <p>
                    <strong>Usuário que Modificou:</strong> {{ $historico->nome_usuario_modificador }}
                </p>
                <p>
                    <strong>Data da Modificação:</strong> {{ $historico->created_at->format('d/m/Y H:i:s') }}
                </p>
            </li>
        @endforeach
    </ul>
</body>
</html>

