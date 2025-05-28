<x-layouts.app title="Periodos">
    <div class="flex h-full w-full flex-1 flex-col gap-4 rounded-xl">
        <div class="relative h-full flex-1 overflow-hidden rounded-xl border border-neutral-200 dark:border-neutral-700">
            <div class="flex flex-row gap-4 p-4 items-center">
                <h1 class="text-3xl font-bold text-center my-5">Periodos</h1>
                <flux:button variant="primary" icon="plus" href="{{ route('parametros.periodos.create') }}"
                    class="mt-2" square />
            </div>

            @if ($periodos->isEmpty())
                <div class="alert alert-info font-bold mx-5 text-xl">No hay períodos registrados.</div>
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
                                <th class="py-2 px-4 border-b">Fecha Limite Planeacion</th>
                                <th class="py-2 px-4 border-b">Fecha Limite Evidencias</th>
                                <th class="py-2 px-4 border-b">Estado</th>
                                <th class="py-2 px-4 border-b">Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($periodos as $periodo)
                                <tr>
                                    <td class="py-2 px-4 border-b">{{ $periodo->nombre }}</td>
                                    <td class="py-2 px-4 border-b">
                                        {{ $periodo->fecha_limite_planeacion->format('d/m/Y') }}</td>
                                    <td class="py-2 px-4 border-b">
                                        {{ $periodo->fecha_limite_evidencias->format('d/m/Y') }}</td>
                                    <td class="py-2 px-4 border-b">
                                        @if ($periodo->estado == 'Activo')
                                            <flux:badge color="lime">{{ $periodo->estado }}</flux:badge>
                                        @else
                                            <flux:badge color="orange">{{ $periodo->estado }}</flux:badge>
                                        @endif
                                    </td>
                                    <td class="py-2 px-4 border-b">
                                        {{-- <a href="{{ route('parametros.periodos.edit', $periodo->id) }}"
                                            class="text-blue-500 hover:underline">Editar</a> --}}
                                        <flux:button href="{{ route('parametros.periodos.edit', $periodo->id) }}">
                                            Editar</flux:button>
                                        {{-- <flux:modal.trigger :name="'edit-profile-'.$periodo->id">
                                        </flux:modal.trigger> --}}
                                        <form action="{{ route('parametros.periodos.destroy', $periodo->id) }}"
                                            method="POST" class="inline">
                                            @csrf
                                            @method('DELETE')
                                            <flux:button variant="danger" icon="trash" type="submit"
                                                class="text-red-500 hover:underline ml-2">Eliminar</flux:button>
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
