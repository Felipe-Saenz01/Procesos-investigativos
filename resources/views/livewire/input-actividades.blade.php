<div>
    {{-- Formulario para agregar actividad --}}
    <div class="bg-white dark:bg-neutral-800 rounded-lg p-4 shadow-sm space-y-4">
        <h3 class="text-lg font-medium text-gray-900 dark:text-gray-100">Actividades del Proyecto</h3>
        
        <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
            <div>
                <label for="nombreActividad" class="block text-sm font-medium text-gray-700 dark:text-gray-300">
                    Nombre de la Actividad
                </label>
                <input 
                    type="text" 
                    wire:model="nombreActividad" 
                    id="nombreActividad"
                    class="mt-1 block w-full h-10 px-4 rounded-lg border-gray-300 dark:border-neutral-600 dark:bg-neutral-900 dark:text-neutral-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 shadow-sm text-sm"
                    placeholder="Ej: Revisión de literatura"
                >
                @error('nombreActividad') 
                    <span class="text-red-500 text-sm">{{ $message }}</span> 
                @enderror
            </div>

            <div>
                <label for="fechaInicio" class="block text-sm font-medium text-gray-700 dark:text-gray-300">
                    Fecha de Inicio
                </label>
                <input 
                    type="date" 
                    wire:model="fechaInicio" 
                    id="fechaInicio"
                    class="mt-1 block w-full h-10 px-4 rounded-lg border-gray-300 dark:border-neutral-600 dark:bg-neutral-900 dark:text-neutral-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 shadow-sm text-sm"
                >
                @error('fechaInicio') 
                    <span class="text-red-500 text-sm">{{ $message }}</span> 
                @enderror
            </div>

            <div>
                <label for="fechaFin" class="block text-sm font-medium text-gray-700 dark:text-gray-300">
                    Fecha de Finalización
                </label>
                <input 
                    type="date" 
                    wire:model="fechaFin" 
                    id="fechaFin"
                    class="mt-1 block w-full h-10 px-4 rounded-lg border-gray-300 dark:border-neutral-600 dark:bg-neutral-900 dark:text-neutral-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 shadow-sm text-sm"
                >
                @error('fechaFin') 
                    <span class="text-red-500 text-sm">{{ $message }}</span> 
                @enderror
            </div>
        </div>

        <div class="flex justify-end">
            <button 
                type="button" 
                wire:click="addActividad"
                class="inline-flex items-center px-4 py-2 bg-indigo-600 border border-transparent rounded-lg font-semibold text-xs text-white uppercase tracking-widest hover:bg-indigo-700 focus:bg-indigo-700 active:bg-indigo-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-neutral-800 transition ease-in-out duration-150"
            >
                <svg class="w-5 h-5 mr-1.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
                </svg>
                Agregar Actividad
            </button>
        </div>
    </div>

    {{-- Lista de actividades --}}
    <div class="mt-6 space-y-4">
        @foreach ($actividades as $index => $actividad)
            <div class="bg-gray-50 dark:bg-neutral-800 rounded-lg p-4 flex items-center justify-between">
                <div class="flex-1 grid grid-cols-1 md:grid-cols-3 gap-4">
                    <div>
                        <span class="block text-sm font-medium text-gray-500 dark:text-neutral-400">Actividad:</span>
                        <span class="text-gray-900 dark:text-neutral-200">{{ $actividad['nombre'] }}</span>
                    </div>
                    <div>
                        <span class="block text-sm font-medium text-gray-500 dark:text-neutral-400">Inicio:</span>
                        <span class="text-gray-900 dark:text-neutral-200">{{ \Carbon\Carbon::parse($actividad['fecha_inicio'])->format('d/m/Y') }}</span>
                    </div>
                    <div>
                        <span class="block text-sm font-medium text-gray-500 dark:text-neutral-400">Fin:</span>
                        <span class="text-gray-900 dark:text-neutral-200">{{ \Carbon\Carbon::parse($actividad['fecha_fin'])->format('d/m/Y') }}</span>
                    </div>
                </div>
                <button 
                    type="button" 
                    wire:click="removeActividad({{ $index }})"
                    class="ml-4 text-red-500 hover:text-red-700 dark:text-red-400 dark:hover:text-red-300 focus:outline-none focus:ring-2 focus:ring-red-500 dark:focus:ring-red-400 rounded-md p-1"
                >
                    <svg class="h-5 w-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
            <input type="hidden" name="actividades[{{ $index }}][nombre]" value="{{ $actividad['nombre'] }}">
            <input type="hidden" name="actividades[{{ $index }}][fecha_inicio]" value="{{ $actividad['fecha_inicio'] }}">
            <input type="hidden" name="actividades[{{ $index }}][fecha_fin]" value="{{ $actividad['fecha_fin'] }}">
        @endforeach
    </div>
</div> 