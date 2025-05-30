<?php

namespace App\Livewire;

use App\Models\User;
use Livewire\Component;

class InputUsuarios extends Component
{
    public array $usuarios = [[]];
    public array $usuariosSeleccionados  = [];
    public $selectedUserId = '';

    public function addUsuario($id)
    {
        if (!empty($id) && !in_array($id, $this->usuariosSeleccionados)) {
            $this->usuariosSeleccionados[] = $id;
        }
        $this->selectedUserId = '';
    }

    public function removeUsuario($index)
    {
        unset($this->usuariosSeleccionados[$index]);
        $this->usuariosSeleccionados = array_values($this->usuariosSeleccionados);
    }

    public function mount($usuariosSeleccionados = [])
    {
        // Esto permite persistencia si hubo errores en el submit
        $this->usuariosSeleccionados = old('usuarios', $usuariosSeleccionados);
    }

    public function render()
    {
        $usuariosDisponibles = User::whereNotIn('id', $this->usuariosSeleccionados)
            ->whereIn('role', ['Investigador', 'Lider Grupo'])
            ->orderBy('name')
            ->get();

        return view('livewire.input-usuarios', [
            'usuariosDisponibles' => $usuariosDisponibles,
        ]);
    }
}
