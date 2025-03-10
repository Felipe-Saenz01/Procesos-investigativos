<x-layouts.app title="Productos Investigativos">
    <div class="flex h-full w-full flex-1 flex-col gap-4 rounded-xl">
        <div class="relative h-full flex-1 overflow-hidden rounded-xl border border-neutral-200 dark:border-neutral-700">
            <div class="flex flex-row gap-4 p-4 items-center">
                <h1 class="text-3xl font-bold text-center my-5"> Información producto investigativo </h1>
                {{-- <flux:button variant="primary" color="lime" icon="plus"
                    href="{{ route('productos-investigativos.create') }}" class="mt-2" square /> --}}
            </div>
            <div class="mb-5 mx-5">
                {{-- <h2 class="font-bold text-xl">{{ $productos_investigativo->titulo }}</h2>
                <p><strong>Resumen:</strong> {{ $productos_investigativo->resumen }}</p>
                <p><strong>Grupo de Investigación:</strong> {{ $productos_investigativo->grupoInvestigacion->nombre }}
                </p>
                <p><strong>Usuario:</strong> {{ $productos_investigativo->usuario->name }}</p>
                <p><strong>SubTipo de Producto:</strong> {{ $productos_investigativo->subTipoProducto->nombre }}</p>
                <p><strong>Tipo de Producto:</strong>
                    {{ $productos_investigativo->subTipoProducto->tipoProducto->nombre }}</p> --}}
                <table class="w-4/5 border border-gray-300 rounded-lg">
                    <tbody class="divide-y divide-x divide-gray-300">
                        <tr class="">
                            <td class="font-bold py-2 bg-green-600 px-2 border-gray-300">Título:</td>
                            <td class="p-2 ">{{ $productos_investigativo->titulo }}</td>
                        </tr>
                        <tr>
                            <td class="font-bold py-2 bg-green-600 px-2 border-gray-300">Resumen:</td>
                            <td class="p-2">{{ $productos_investigativo->resumen }}</td>
                        </tr>
                        <tr>
                            <td class="font-bold py-2 bg-green-600 px-2 border-gray-300">Grupo de Investigación:</td>
                            <td class="p-2">{{ $productos_investigativo->grupoInvestigacion->nombre }}</td>
                        </tr>
                        <tr>
                            <td class="font-bold py-2 bg-green-600 px-2 border-gray-300">Usuario:</td>
                            <td class="p-2">{{ $productos_investigativo->usuario->name }}</td>
                        </tr>
                        <tr>
                            <td class="font-bold py-2 bg-green-600 px-2 border-gray-300">SubTipo de Producto:</td>
                            <td class="p-2">{{ $productos_investigativo->subTipoProducto->nombre }}</td>
                        </tr>
                        <tr>
                            <td class="font-bold py-2 bg-green-600 px-2 border-gray-300">Tipo de Producto:</td>
                            <td class="p-2">{{ $productos_investigativo->subTipoProducto->tipoProducto->nombre }}
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>

            <h3 class="font-bold text-lg mb-4 ml-5">Entregas</h3>
            @if ($productos_investigativo->entregas->isEmpty())
                <div class="alert alert-info">No hay productos investigativos registrados.</div>
            @else
                <div class="px-4 mb-4">
                    <table class="min-w-full bg-white-200 rounded-xl ">
                        <thead class="bg-green-600 text-white">
                            <tr>
                                <th class="py-2 px-4 border-b">Archivo</th>
                                <th class="py-2 px-4 border-b">Periodo</th>
                                <th class="py-2 px-4 border-b">Fecha de entrega</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($productos_investigativo->entregas as $entrega)
                                <tr>
                                    <td class="py-2 px-4 border-b">
                                        <a href="{{ asset('storage/' . $entrega->archivo) }}" target="_blank"
                                            class="text-blue-500 hover:underline">
                                            Ver archivo
                                        </a>
                                    </td>
                                    <td class="py-2 px-4 border-b"> {{ $entrega->periodo->nombre }} </td>
                                    {{-- <td class="py-2 px-4 border-b"> {{ $entrega->subTipoProducto->nomrbe }} </td> --}}
                                    <td class="py-2 px-4 border-b"> {{ $entrega->created_at->format('d/m/Y - H:i') }}
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
