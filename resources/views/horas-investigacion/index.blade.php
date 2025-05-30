<x-layouts.app title="Horas de Investigación">
    <div class="flex h-full w-full flex-1 flex-col gap-4 rounded-xl">
        <div class="relative h-full flex-1 overflow-hidden rounded-xl border border-neutral-200 dark:border-neutral-700">
            <div class="flex flex-row justify-between items-center p-4">
                <h1 class="text-3xl font-bold">Horas de Investigación</h1>
                <flux:button 
                    variant="primary" 
                    icon="plus" 
                    href="{{ route('horas-investigacion.create') }}"
                    class="mt-2"
                    square 
                />
            </div>

            @if (session('success'))
                <div class="mx-4 mb-4 p-4 bg-green-100 dark:bg-green-900 border border-green-200 dark:border-green-800 text-green-700 dark:text-green-300 rounded-lg">
                    {{ session('success') }}
                </div>
            @endif

            @if ($horasInvestigacion->isEmpty())
                <div class="p-4">
                    <div class="p-4 bg-blue-100 dark:bg-blue-900 border border-blue-200 dark:border-blue-800 text-blue-700 dark:text-blue-300 rounded-lg">
                        No hay horas de investigación registradas.
                    </div>
                </div>
            @else
                <div class="px-4 mb-4">
                    <div class="overflow-x-auto">
                        <table class="min-w-full bg-white dark:bg-neutral-800 rounded-xl">
                            <thead class="bg-green-600 text-white">
                                <tr>
                                    <th class="py-3 px-4 text-left">Investigador</th>
                                    <th class="py-3 px-4 text-left">Periodo</th>
                                    <th class="py-3 px-4 text-left">Grupo de Investigación</th>
                                    <th class="py-3 px-4 text-center">Rol</th>
                                    <th class="py-3 px-4 text-center">Horas</th>
                                    <th class="py-3 px-4 text-center">Acciones</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-neutral-200 dark:divide-neutral-700">
                                @foreach ($horasInvestigacion as $horaInvestigador)
                                    <tr class="hover:bg-neutral-50 dark:hover:bg-neutral-700/50">
                                        <td class="py-3 px-4">{{ $horaInvestigador->user->name }}</td>
                                        <td class="py-3 px-4">{{ $horaInvestigador->periodo->nombre }}</td>
                                        <td class="py-3 px-4">{{ $horaInvestigador->user->gruposInvestigacion->nombre }}</td>
                                        <td class="py-3 px-4 text-center">
                                            @if ($horaInvestigador->user->role == 'Lider Grupo')
                                                <flux:badge color="orange">{{ $horaInvestigador->user->role }}</flux:badge>
                                            @else
                                                <flux:badge color="lime">{{ $horaInvestigador->user->role }}</flux:badge>
                                            @endif
                                        </td>
                                        <td class="py-3 px-4 text-center">
                                            <flux:badge color="blue">{{ $horaInvestigador->horas }} horas</flux:badge>
                                        </td>
                                        <td class="py-3 px-4 text-center">
                                            <div class="flex justify-center gap-2">
                                                <flux:button
                                                    icon="pencil-square"
                                                    href="{{ route('horas-investigacion.edit', $horaInvestigador) }}"
                                                    title="Editar"
                                                />
                                                <form action="{{ route('horas-investigacion.destroy', $horaInvestigador) }}"
                                                    method="POST" class="inline">
                                                    @csrf
                                                    @method('DELETE')
                                                    <flux:button
                                                        variant="danger"
                                                        icon="trash"
                                                        type="submit"
                                                        title="Eliminar"
                                                        onclick="return confirm('¿Está seguro de que desea eliminar este registro?')"
                                                    />
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            @endif
        </div>
    </div>
</x-layouts.app>
