<nav class="nav w-100 justify-content-between mb-2">
    <a class="nav-link w-25 btn btn-info @if($solicitacao->estado_pagina == 0) active @endif cellNav" href="{{route('solicitacao.alterar.pagina', ['solicitacao_id' => $solicitacao->id, 'num_pagina' => 0])}}">1</a>
    <a class="nav-link w-25 btn @if($solicitacao->estado_pagina_maximo >= 1) btn-info @if($solicitacao->estado_pagina == 1) active @endif @else btn-secondary disabled @endif cellNav" href="{{route('solicitacao.alterar.pagina', ['solicitacao_id' => $solicitacao->id, 'num_pagina' => 1])}}">2</a>
    <a class="nav-link w-25 btn @if($solicitacao->estado_pagina_maximo >= 2) btn-info @if($solicitacao->estado_pagina == 2) active @endif @else btn-secondary disabled @endif cellNav" href="{{route('solicitacao.alterar.pagina', ['solicitacao_id' => $solicitacao->id, 'num_pagina' => 2])}}">3</a>
    <a class="nav-link w-25 btn @if($solicitacao->estado_pagina_maximo >= 3) btn-info @if($solicitacao->estado_pagina == 3) active @endif @else btn-secondary disabled @endif cellNav" href="{{route('solicitacao.alterar.pagina', ['solicitacao_id' => $solicitacao->id, 'num_pagina' => 3])}}">4</a>
</nav>
