<?php

namespace App\Http\Livewire;

use Livewire\Component;

class FormColaborador extends Component
{
    public $solicitacao;
    public $avaliacao;
    
    public function render()
    {
        return view('livewire.form-colaborador');
    }
}
