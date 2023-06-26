<?php

namespace App\Http\Livewire;

use App\Models\Colaborador;
use App\Models\Instituicao;
use Livewire\Component;

class FormRepeaterColaborador extends Component
{
    public $colaboradores;
    public $instituicaos;
    public $solicitacao;
    public $avaliacao;
    public $tipo;
    public $avaliacao_id;

    protected $listeners = ['adicionarColaborador'];

    public function mount($colaboradores)
    {
        $this->instituicaos = Instituicao::all();
        $this->colaboradores = $colaboradores;
        $this->avaliacao_id = $this->avaliacao->id ?? null;
    }

    public function adicionarColaborador()
    {
        $this->colaboradores->push(new Colaborador());
    }

    public function removerColaborador($index)
    {
        $this->colaboradores->forget($index);
    }

    public function render()
    {
        return view('livewire.form-repeater-colaborador');
    }
}
