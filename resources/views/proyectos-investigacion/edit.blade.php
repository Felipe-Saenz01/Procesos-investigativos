<x-layouts.app>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                Editar Proyecto de Investigación
            </h2>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-neutral-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6">
                    <form action="{{ route('proyecto-investigacion.update', $proyecto) }}" method="POST" class="space-y-6">
                        @csrf
                        @method('PUT')

                        {{-- Grid de dos columnas responsiva --}}
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <flux:input 
                                label="Título del proyecto" 
                                name="titulo" 
                                id="titulo" 
                                value="{{ old('titulo', $proyecto->titulo) }}" 
                            />
                            <flux:input 
                                label="Eje Tematico" 
                                name="eje_tematico" 
                                id="eje_tematico" 
                                value="{{ old('eje_tematico', $proyecto->eje_tematico) }}" 
                            />
                            <flux:textarea 
                                label="Resumen ejecutivo" 
                                name="resumen_ejecutivo" 
                                id="resumen_ejecutivo" 
                            >{{ old('resumen_ejecutivo', $proyecto->resumen_ejecutivo) }}</flux:textarea>
                            <flux:textarea 
                                label="Planteamiento del problema" 
                                name="planteamiento_problema" 
                                id="planteamiento_problema" 
                            >{{ old('planteamiento_problema', $proyecto->planteamiento_problema) }}</flux:textarea>
                            <flux:textarea 
                                label="Antecedentes" 
                                name="antecedentes" 
                                id="antecedentes" 
                            >{{ old('antecedentes', $proyecto->antecedentes) }}</flux:textarea>
                            <flux:textarea 
                                label="Justificación" 
                                name="justificacion" 
                                id="justificacion" 
                            >{{ old('justificacion', $proyecto->justificacion) }}</flux:textarea>
                            <flux:textarea 
                                label="Objetivos" 
                                name="objetivos" 
                                id="objetivos" 
                            >{{ old('objetivos', $proyecto->objetivos) }}</flux:textarea>
                            <flux:textarea 
                                label="Metodología" 
                                name="metodologia" 
                                id="metodologia" 
                            >{{ old('metodologia', $proyecto->metodologia) }}</flux:textarea>
                            <flux:textarea 
                                label="Resultados" 
                                name="resultados" 
                                id="resultados" 
                            >{{ old('resultados', $proyecto->resultados) }}</flux:textarea>
                            <flux:textarea 
                                label="Riesgos" 
                                name="riesgos" 
                                id="riesgos" 
                            >{{ old('riesgos', $proyecto->riesgos) }}</flux:textarea>
                            <flux:textarea 
                                label="Bibliografía" 
                                name="bibliografia" 
                                id="bibliografia" 
                            >{{ old('bibliografia', $proyecto->bibliografia) }}</flux:textarea>
                        </div>

                        {{-- Componente de Actividades --}}
                        <div class="col-span-2 mt-6">
                            <livewire:input-actividades :actividades="old('actividades', $proyecto->actividades ?? [])" />
                        </div>

                        <div class="flex justify-end gap-4">
                            <a 
                                href="{{ route('proyecto-investigacion.show', $proyecto) }}" 
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
    </div>
</x-layouts.app> 