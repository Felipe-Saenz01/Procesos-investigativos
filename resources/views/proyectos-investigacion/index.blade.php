<x-layouts.app title="Proyectos de Investigación">
    <div class="flex h-full w-full flex-1 flex-col gap-4 rounded-xl">
        <div class="relative h-full flex-1 overflow-hidden rounded-xl border border-neutral-200 dark:border-neutral-700">
            <div class="flex flex-row gap-4 p-4 items-center">
                <h1 class="text-3xl font-bold text-center my-5">Proyectos de Investigación</h1>
                <flux:button variant="primary" color="lime" icon="plus"
                    href="{{ route('proyecto-investigacion.create') }}" class="mt-2" square />
            </div>

            @if ($proyectos->isEmpty())
                <div class="alert alert-info font-bold text-xl mx-5">No hay proyectos de investigación registrados.
                </div>
            @else
                <div class="px-4 mb-4">
                    <table class="min-w-full bg-white-200 rounded-xl ">
                        @if (session('error'))
                            <div class="text-red-600 bg-red-100 border border-red-300 p-4 rounded-md mb-4">
                                {{ session('error') }}
                            </div>
                        @endif

                        @if (session('success'))
                            <div class="text-green-600 bg-green-100 border border-green-300 p-4 rounded-md mb-4">
                                {{ session('success') }}
                            </div>
                        @endif
                        <thead class="bg-green-600 text-white">
                            <tr>
                                <th class="py-2 px-4 border-b">Titulo</th>
                                <th class="py-2 px-4 border-b">Eje temático</th>
                                <th class="py-2 px-4 border-b">Estado</th>
                                <th class="py-2 px-4 border-b">Grupos</th>
                                <th class="py-2 px-4 border-b">Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($proyectos as $proyecto)
                                <tr>
                                    <td class="py-2 px-4 border-b">
                                        <a href="{{ route('proyecto-investigacion.show', $proyecto) }}"
                                            class="text-blue-500 hover:underline">
                                            {{ $proyecto->titulo }}
                                        </a>
                                    </td>
                                    <td class="py-2 px-4 border-b">{{ $proyecto->eje_tematico }}</td>
                                    <td class="py-2 px-4 border-b">
                                        {{-- @if ($proyecto->usuario->isEmpty())
                                            No hay Investigadores en este proyecto.
                                        @else
                                            <ul>
                                                @foreach ($proyecto->usuarios as $usuario)
                                                    <li class="mb-2">
                                                        {{ $usuario->name }}
                                                        @if ($usuario->role == 'Lider Grupo')
                                                            <flux:badge color="orange">{{ $usuario->role }}</flux:badge>
                                                        @else
                                                            <flux:badge color="lime">{{ $usuario->role }}</flux:badge>
                                                        @endif
                                                    </li>
                                                @endforeach
                                            </ul>
                                        @endif --}}
                                        @if ($proyecto->estado == 'Formulado')
                                            <flux:badge color="lime">{{ $proyecto->estado }}</flux:badge>
                                        @else
                                            <flux:badge color="orange">{{ $proyecto->estado }}</flux:badge>
                                        @endif
                                    </td>
                                    <td class="py-2 px-4 border-b">
                                        @if ($proyecto->grupos->isEmpty())
                                            No hay Grupos para este proyecto.
                                        @else
                                            <ul>
                                                @foreach ($proyecto->grupos as $grupo)
                                                    <li class="mb-2">
                                                        {{ $grupo->nombre }}
                                                    </li>
                                                @endforeach
                                            </ul>
                                        @endif
                                    </td>
                                    <td class="py-2 px-4 border-b">
                                        <flux:button href="{{ route('proyecto-investigacion.edit', $proyecto) }}">
                                            Editar</flux:button>

                                        <form action="{{ route('proyecto-investigacion.destroy', $proyecto) }}"
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
