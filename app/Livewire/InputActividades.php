<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\Attributes\Validate;

class InputActividades extends Component
{
    public array $actividades = [];

    #[Validate('required|string|max:255')]
    public $nombreActividad = '';

    #[Validate('required|date')]
    public $fechaInicio = '';

    #[Validate('required|date|after:fechaInicio')]
    public $fechaFin = '';

    public function mount($actividades = [])
    {
        $this->actividades = old('actividades', $actividades) ?? [];
    }

    public function addActividad()
    {
        $this->validate();

        $this->actividades[] = [
            'nombre' => $this->nombreActividad,
            'fecha_inicio' => $this->fechaInicio,
            'fecha_fin' => $this->fechaFin,
        ];

        // Resetear los campos
        $this->reset(['nombreActividad', 'fechaInicio', 'fechaFin']);
        // Resetear la validación
        $this->resetValidation();
        // Emitir evento para actualizar el formulario padre
        $this->dispatch('actividadesUpdated', $this->actividades);
    }

    public function removeActividad($index)
    {
        unset($this->actividades[$index]);
        $this->actividades = array_values($this->actividades);
        // Emitir evento para actualizar el formulario padre
        $this->dispatch('actividadesUpdated', $this->actividades);
    }

    public function render()
    {
        return view('livewire.input-actividades');
    }
} 