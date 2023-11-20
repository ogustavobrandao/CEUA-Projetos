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
   
        <td class="text-center">
            <a class="btn btn-primary btn-abrirModal-colaborador"
                data-toggle="modal"
                data-colaborador-id="{{$colaborador->id}}">Abrir</a>
        </td>
       
    </tr>
@endforeach


