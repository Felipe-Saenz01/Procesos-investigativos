<x-layouts.app title="Productos Investigativos">
    <div class="flex h-full w-full flex-1 flex-col gap-4 rounded-xl">
        <div class="relative h-full flex-1 overflow-hidden rounded-xl border border-neutral-200 dark:border-neutral-700">
            <div class="flex flex-row gap-4 p-4 items-center">
                <h1 class="text-3xl font-bold text-center my-5"> Información Horas de Investigacion del Investigador</h1>
            </div>
            <div class="mb-5 mx-5">
                <table class="w-4/5 border border-gray-300 rounded-lg">
                    <tbody class="divide-y divide-x divide-gray-300">
                        <tr class="">
                            <td class="font-bold py-2 bg-green-600 px-2 border-gray-300 text-white w-1/3">Investigador:</td>
                            <td class="p-2 ">{{ $user->name }}</td>
                        </tr>
                        <tr>
                            <td class="font-bold py-2 bg-green-600 px-2 border-gray-300 text-white">Correo:</td>
                            <td class="p-2">{{ $user->email }}</td>
                        </tr>
                        <tr>
                            <td class="font-bold py-2 bg-green-600 px-2 border-gray-300 text-white">Grupo Investigación:</td>
                            <td class="p-2">{{ $user->gruposInvestigacion->nombre }}</td>
                        </tr>
                        <tr>
                            <td class="font-bold py-2 bg-green-600 px-2 border-gray-300 text-white">Tipo:</td>
                            <td class="p-2">
                                {{-- {{ $productos_investigativo->usuario->name }} --}}
                                @if ($user->role == 'Investigador')
                                    <flux:badge color="lime">{{ $user->role }}</flux:badge>
                                @else
                                    <flux:badge color="orange">{{ $user->role }}</flux:badge>
                                @endif
                                {{-- @foreach ($productos_investigativo->usuarios as $usuario)
                                <ul>
                                    <li class="mb-2 text-sm">
                                    </li>
                                </ul>
                                @endforeach --}}
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <flux:separator />
            <h3 class="font-bold text-2xl mb-4 m-5">Horas de Investigacion</h3>
            @if ($user->horasInvestigacion->isEmpty())
                <div class="alert alert-info font-bold mx-5 text-xl">No hay registros de Horas de investigación de este usuario.</div>
            @else
                <div class="px-4 mb-4">
                    <table class="min-w-full bg-white-200 rounded-xl ">
                        <thead class="bg-green-600 text-white">
                            <tr>
                                <th class="py-2 px-4 border-b">Num. Horas</th>
                                <th class="py-2 px-4 border-b">Periodo</th>
                                <th class="py-2 px-4 border-b">Estado</th>
                                <th class="py-2 px-4 border-b">Fecha de actualización</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($user->horasInvestigacion as $hora)
                                <tr>
                                    <td class="py-2 px-4 border-b"> {{ $hora->horas }} </td>
                                    <td class="py-2 px-4 border-b"> {{ $hora->periodo->nombre }} </td>
                                    <td class="py-2 px-4 border-b">
                                        @if ($hora->estado == 'Activo')
                                            <flux:badge color="lime">{{ $hora->estado }}</flux:badge>
                                        @else
                                            <flux:badge color="orange">{{ $hora->estado }}</flux:badge>
                                        @endif
                                    </td>
                                    <td class="py-2 px-4 border-b"> {{ $hora->updated_at->format('d/m/Y - H:i') }}
                                    </td>

                                </tr>
                            @endforeach
                            {{-- <tr>
                                    <td class="py-2 px-4 border-b">{{ $grupo->correo }}</td>
                                    <td class="py-2 px-4 border-b">
                                        @if ($grupo->usuarios->isEmpty())
                                            No hay Investigadores en este grupo.
                                        @else
                                            <ul>
                                                @foreach ($grupo->usuarios as $usuario)
                                                    <li class="mb-2">
                                                        {{ $usuario->name }}
                                                        <flux:badge color="lime">{{ $usuario->role }}</flux:badge>
                                                    </li>
                                                @endforeach
                                            </ul>
                                        @endif
                                    </td>
                                    <td class="py-2 px-4 border-b">
                                        <flux:button href="{{ route('grupos-investigacion.edit', $grupo) }}">
                                            Editar</flux:button>

                                        <form action="{{ route('grupos-investigacion.destroy', $grupo) }}"
                                            method="POST" class="inline">
                                            @csrf
                                            @method('DELETE')
                                            <flux:button variant="danger" icon="trash" type="submit"
                                                class="text-red-500 hover:underline ml-2">Eliminar</flux:button>
                                        </form>
                                    </td>
                                </tr> --}}

                        </tbody>
                    </table>
                </div>
            @endif
        </div>
    </div>
</x-layouts.app>
