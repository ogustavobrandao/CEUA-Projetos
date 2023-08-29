@foreach($colaboradores as $colaborador)

    <tr id="fundo_colaborador_{{$colaborador->id}}">
        <td>
            {{$colaborador->nome}}
        </td>
        <td>
            {{$colaborador->contato->email}}
        </td>
        <td>
            {{$colaborador->cpf}}
        </td>
        <td>
            {{$colaborador->contato->telefone}}
        </td>
        @if(\Illuminate\Support\Facades\Auth::user()->tipo_usuario_id == 3)
            <td class="text-center">
                <a class="btn btn-primary btn-abrirModal-colaborador"
                   data-toggle="modal"
                   data-colaborador-id="{{$colaborador->id}}">Abrir</a>
                <a class="btn btn-danger btn-deletar-colaborador" href="#"
                   data-colaborador-id="{{$colaborador->id}}">Deletar</a>
            </td>
        @elseif(\Illuminate\Support\Facades\Auth::user()->tipo_usuario_id == 2 || \Illuminate\Support\Facades\Auth::user()->tipo_usuario_id == 1)
            <td class="text-center">
                <a class="btn btn-primary btn-abrirModal-colaborador"
                   data-toggle="modal"
                   data-colaborador-id="{{$colaborador->id}}">Abrir</a>
            </td>
        @endif
    </tr>
@endforeach


