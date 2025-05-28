<x-layouts.app title="Horas de Investigacion">
    <div class="flex h-full w-full flex-1 flex-col gap-4 rounded-xl">
        <div class="relative h-full flex-1 overflow-hidden rounded-xl border border-neutral-200 dark:border-neutral-700">
            <div class="flex flex-row gap-4 p-4 items-center">
                <h1 class="text-3xl font-bold text-center my-5">Horas de Investigacion</h1>
                <flux:button variant="primary" icon="plus" href="{{ route('horas-investigacion.create') }}" class="mt-2"
                    square />
            </div>

            @if ($horasInvestigacion->isEmpty())
                <div class="alert alert-info font-bold mx-5 text-xl">No hay horas de investigacion registradas.</div>
            @else
                <div class="px-4 mb-4">
                    @if (session('success'))
                        <div class="text-green-600 bg-green-100 border border-green-300 p-4 rounded-md mb-4">
                            {{ session('success') }}
                        </div>
                    @endif
                    <table class="min-w-full bg-white-200 rounded-xl ">
                        <thead class="bg-green-600 text-white">
                            <tr>
                                <th class="py-2 px-4 border-b">Nombre</th>
                                <th class="py-2 px-4 border-b">Periodo</th>
                                <th class="py-2 px-4 border-b">Grupo Investigacion</th>
                                <th class="py-2 px-4 border-b">Tipo</th>
                                <th class="py-2 px-4 border-b">Horas</th>
                                <th class="py-2 px-4 border-b">Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($horasInvestigacion as $horaInvestigador)
                                <tr>
                                    <td class="py-2 px-4 border-b">{{ $horaInvestigador->user->name }}</td>
                                    <td class="py-2 px-4 border-b">{{ $horaInvestigador->peroido->nombre }}</td>
                                    <td class="py-2 px-4 border-b">{{ $horaInvestigador->user->gruposInvestigacion->nombre }}</td>
                                    <td class="py-2 px-4 border-b">
                                        @if ($horaInvestigador->user->role == 'Lider Grupo')
                                        <flux:badge color="orange">{{ $horaInvestigador->user->role }}</flux:badge>
                                        @else
                                        <flux:badge color="lime">{{ $horaInvestigador->user->role}}</flux:badge>
                                        @endif
                                    </td>
                                    <td class="py-2 px-4 border-b">{{ $horaInvestigador->horas }}</td>

                                    <td class="py-2 px-4 border-b">

                                        <flux:button  icon="pencil-square"  href="{{ route('horas-investigacion.edit', $horaInvestigador) }}"></flux:button>
                                        <form action="{{ route('horas-investigacion.destroy', $horaInvestigador) }}"
                                            method="POST" class="inline">
                                            @csrf
                                            @method('DELETE')
                                            <flux:button variant="danger" icon="trash" type="submit"
                                                class="text-red-500 hover:underline ml-2"></flux:button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            @endif
        </div>
    </div>
</x-layouts.app>
