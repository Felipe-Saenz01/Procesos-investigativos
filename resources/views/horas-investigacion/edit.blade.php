<x-layouts.app title="Editar Horas de Investigación">
    <div class="flex h-full w-full flex-1 flex-col gap-4 rounded-xl">
        <div class="relative h-full flex-1 overflow-hidden rounded-xl border border-neutral-200 dark:border-neutral-700">
            <div class="flex flex-row gap-4 p-4 items-center">
                <h1 class="text-3xl font-bold text-center my-5">Editar Horas de Investigación</h1>
            </div>

            <div class="p-6">
                <form action="{{ route('horas-investigacion.update', $horaInvestigacion) }}" method="POST" class="space-y-6">
                    @csrf
                    @method('PUT')

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <flux:input 
                                label="Investigador" 
                                value="{{ $horaInvestigacion->user->name }}"
                                disabled
                            />
                        </div>

                        <div>
                            <flux:input 
                                label="Grupo de Investigación" 
                                value="{{ $horaInvestigacion->user->gruposInvestigacion->nombre }}"
                                disabled
                            />
                        </div>

                        <div>
                            <flux:select
                                name="periodo_id"
                                label="Periodo"
                                :options="$periodos"
                                :value="old('periodo_id', $horaInvestigacion->periodo_id)"
                                placeholder="Seleccione un periodo"
                            >
                                @foreach($periodos as $periodo)
                                    <option value="{{ $periodo['value'] }}" {{ old('periodo_id', $horaInvestigacion->periodo_id) == $periodo['value'] ? 'selected' : '' }}>
                                        {{ $periodo['label'] }}
                                    </option>
                                @endforeach
                            </flux:select>
                        </div>

                        <div>
                            <flux:input 
                                type="number"
                                name="horas"
                                label="Horas Asignadas"
                                value="{{ old('horas', $horaInvestigacion->horas) }}"
                                min="1"
                                max="40"
                            />
                        </div>
                    </div>

                    <div class="flex justify-end gap-4 mt-6">
                        <a 
                            href="{{ route('horas-investigacion.index') }}" 
                            class="inline-flex items-center px-4 py-2 bg-gray-200 dark:bg-gray-700 border border-transparent rounded-lg font-semibold text-xs text-gray-700 dark:text-gray-300 uppercase tracking-widest hover:bg-gray-300 dark:hover:bg-gray-600 focus:bg-gray-300 dark:focus:bg-gray-600 active:bg-gray-400 dark:active:bg-gray-500 focus:outline-none focus:ring-2 focus:ring-gray-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition ease-in-out duration-150"
                        >
                            Cancelar
                        </a>
                        <button 
                            type="submit"
                            class="inline-flex items-center px-4 py-2 bg-indigo-600 border border-transparent rounded-lg font-semibold text-xs text-white uppercase tracking-widest hover:bg-indigo-700 focus:bg-indigo-700 active:bg-indigo-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition ease-in-out duration-150"
                        >
                            Guardar Cambios
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-layouts.app> 