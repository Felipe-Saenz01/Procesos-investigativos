<?php

namespace App\Livewire;

use Livewire\Component;

class ProyectoInvestigativoForm extends Component
{

    public bool $es_formulado = false;

    public function mount()
    {
        $this->es_formulado = (bool) old('es_formulado', false); // o true si quieres que sea el valor por defecto
    }

    public function render()
    {
        return view('livewire.proyecto-investigativo-form');
    }
}
