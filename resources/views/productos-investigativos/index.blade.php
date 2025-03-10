<x-layouts.app title="Productos Investigativos">
    <div class="flex h-full w-full flex-1 flex-col gap-4 rounded-xl">
        <div class="relative h-full flex-1 overflow-hidden rounded-xl border border-neutral-200 dark:border-neutral-700">
            <div class="flex flex-row gap-4 p-4 items-center">
                <h1 class="text-3xl font-bold text-center my-5">Productos Investigativos</h1>
                {{-- <flux:button variant="primary" color="lime" icon="plus"
                    href="{{ route('productos-investigativos.create') }}" class="mt-2" square /> --}}
            </div>

            @if ($grupos->isEmpty())
                <div class="alert alert-info">No hay productos investigativos registrados.</div>
            @else
                <div class="px-4 mb-4">
                    <table class="min-w-full bg-white-200 rounded-xl ">
                        <thead class="bg-green-600 text-white">
                            <tr>
                                <th class="py-2 px-4 border-b">Grpo de Investigación</th>
                                <th class="py-2 px-4 border-b">Producto</th>
                                <th class="py-2 px-4 border-b">Resumen</th>
                                <th class="py-2 px-4 border-b">Investigador</th>
                                <th class="py-2 px-4 border-b">Subtipo Producto</th>
                                <th class="py-2 px-4 border-b">Tipo Producto</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($grupos as $grupo)
                                @if ($grupo->productosInvestigativos->isEmpty())
                                    <tr>
                                        <td class="py-2 px-4 border-b">{{ $grupo->nombre }}</td>
                                        <td class="py-2 px-4 border-b" colspan="5">No hay productos investigativos en este grupo.</td>
                                    </tr>
                                @else
                                    @foreach ($grupo->productosInvestigativos as $producto)
                                        <tr>
                                            <td class="py-2 px-4 border-b">{{ $grupo->nombre }}</td>
                                            <td class="py-2 px-4 border-b">
                                                <a href="{{ route('productos-investigativos.show', $producto->id) }}" class="text-blue-500 hover:underline">
                                                    {{ $producto->titulo }}
                                                </a>
                                            </td>
                                            <td class="py-2 px-4 border-b">{{ $producto->resumen }}</td>
                                            <td class="py-2 px-4 border-b">{{ $producto->usuario->name }}</td>
                                            <td class="py-2 px-4 border-b">{{ $producto->subTipoProducto->nombre }}</td>
                                            <td class="py-2 px-4 border-b">{{ $producto->subTipoProducto->tipoProducto->nombre }}</td>
                                        </tr>
                                    @endforeach
                                @endif
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
                            @endforeach
                        </tbody>
                    </table>
                </div>
            @endif
        </div>
    </div>
</x-layouts.app>
