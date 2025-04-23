{{-- <div class="space-y-4">
    @foreach ($usuarios as $index => $usuario)
        <div class="flex gap-2 items-center">
            <select wire:model="usuarios.{{ $index }}" name="usuarios[]" class="form-select w-full">
                <option value="">Seleccione un usuario</option>
                @foreach ($allUsers as $user)
                    <option value="{{ $user->id }}">{{ $user->name }}</option>
                @endforeach
            </select>
            <flux:button color="red" icon="x-mark" wire:click="removeUsuario({{ $index }})" />
        </div>
    @endforeach

    <flux:button color="lime" icon="plus" wire:click="addUsuario">Agregar Usuario</flux:button>
</div> --}}

<div>
    {{-- Selector para agregar --}}
    <div class="mb-4">
        <label for="user-select" class="block font-bold mb-1">Agregar usuario</label>
        <select wire:change="addUsuario($event.target.value)" id="user-select" class="w-full rounded p-2">
            <option value="">-- Selecciona un usuario --</option>
            @foreach ($usuariosDisponibles as $usuario)
                @if ($usuario->role == 'Investigador' || $usuario->role == 'Lider Grupo')
                    <option value="{{ $usuario->id }}">{{ $usuario->name }} ({{ $usuario->role }})</option>
                @endif
            @endforeach
        </select>
    </div>

    {{-- Lista de seleccionados --}}
    <div class="space-y-2">
        @foreach ($usuariosSeleccionados as $index => $id)
            @php
                $usuario = \App\Models\User::find($id);
            @endphp
            @if ($usuario)
                <div class="flex justify-between items-center bg-gray-100 p-2 rounded">
                    <span>{{ $usuario->name }} ({{ $usuario->role }})</span>
                    <button type="button" wire:click="removeUsuario({{ $index }})" class="text-red-500 font-bold">X</button>
                </div>
                <input type="hidden" name="usuarios[]" value="{{ $usuario->id }}">
            @endif
        @endforeach
    </div>
</div>