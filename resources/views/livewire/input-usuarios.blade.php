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
        <label for="user-select" class="block font-medium text-sm text-gray-700 dark:text-gray-300 mb-1">
            Agregar usuario
        </label>
        <select 
            wire:model="selectedUserId"
            wire:change="addUsuario($event.target.value)" 
            id="user-select" 
            class="block w-full h-10 py-2 px-3 rounded-lg border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 shadow-sm text-sm"
        >
            <option value="">-- Selecciona un usuario --</option>
            @foreach ($usuariosDisponibles as $usuario)
                <option value="{{ $usuario->id }}" class="dark:bg-gray-700">
                    {{ $usuario->name }} ({{ $usuario->role }})
                </option>
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
                <div class="flex justify-between items-center bg-gray-100 dark:bg-gray-700 p-2 rounded-lg">
                    <span class="text-gray-900 dark:text-gray-200">
                        {{ $usuario->name }} ({{ $usuario->role }})
                    </span>
                    <button 
                        type="button" 
                        wire:click="removeUsuario({{ $index }})" 
                        class="text-red-500 hover:text-red-700 dark:text-red-400 dark:hover:text-red-300 focus:outline-none focus:ring-2 focus:ring-red-500 dark:focus:ring-red-400 rounded-md p-1"
                    >
                        <svg class="h-5 w-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </button>
                </div>
                <input type="hidden" name="usuarios[]" value="{{ $usuario->id }}">
            @endif
        @endforeach
    </div>
</div>