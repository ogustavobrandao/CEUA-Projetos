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

    protected $listeners = ['adicionarColaborador'];

    public function mount($colaboradores)
    {
        $this->instituicaos = Instituicao::all();
        $this->colaboradores = $colaboradores;
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
