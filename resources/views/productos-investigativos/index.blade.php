<x-layouts.app title="Productos Investigativos">
    <div class="flex h-full w-full flex-1 flex-col gap-4 rounded-xl">
        <div class="relative h-full flex-1 overflow-hidden rounded-xl border border-neutral-200 dark:border-neutral-700">
            <div class="flex flex-row gap-4 p-4 items-center">
                <h1 class="text-3xl font-bold text-center my-5">Productos Investigativos</h1>
                <flux:button variant="primary" color="lime" icon="plus"
                    href="{{ route('productos-investigativos.create') }}" class="mt-2" square />
            </div>

            @if ($productos->isEmpty())
                <div class="alert alert-info">No hay productos de investigativos registrados.</div>
            @else
                <div class="px-4 mb-4">
                    <table class="min-w-full bg-white-200 rounded-xl ">
                        <thead class="bg-green-600 text-white">
                            <tr>
                                <th class="py-2 px-4 border-b">Producto</th>
                                <th class="py-2 px-4 border-b">Proyecto</th>
                                <th class="py-2 px-4 border-b">Investigador</th>
                                <th class="py-2 px-4 border-b">Subtipo Producto</th>
                                <th class="py-2 px-4 border-b">Tipo Producto</th>
                                <th class="py-2 px-4 border-b">Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($productos as $producto)
                            <tr>
                                <td class="py-2 px-4 border-b">
                                    <a href="{{ route('productos-investigativos.show', $producto->id) }}" class="text-blue-500 text-sm hover:underline">
                                        {{ $producto->titulo }}
                                    </a>
                                </td>
                                <td class="py-2 px-4 border-b text-sm">{{ $producto->proyecto->titulo}}</td>
                                <td class="py-2 px-4 border-b">
                                    @foreach ($producto->usuarios as $usuario)
                                        <span class="mb-2 text-sm">
                                            {{ $usuario->name }}
                                            <flux:badge color="lime">{{ $usuario->role }}</flux:badge>
                                        </span>
                                        
                                    @endforeach
                                </td>
                                <td class="py-2 px-4 border-b text-sm">{{ $producto->subTipoProducto->nombre }}</td>
                                <td class="py-2 px-4 border-b text-sm">{{ $producto->subTipoProducto->tipoProducto->nombre }}</td>
                                <td class="py-2 px-4 border-b text-sm">
                                    <div class="flex justify-center items-center space-x-2">
                                        <flux:button icon="pencil-square" href="{{ route('grupos-investigacion.edit', $producto) }}">
                                            </flux:button>

                                        <form action="{{ route('grupos-investigacion.destroy', $producto) }}"
                                            method="POST" class="inline">
                                            @csrf
                                            @method('DELETE')
                                            <flux:button variant="danger" icon="trash" type="submit"
                                                class="text-red-500 hover:underline ml-2"></flux:button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                                {{-- @if (!$proyecto->productos->isEmpty())
                                    @foreach ($proyecto->productos as $producto)
                                    @endforeach
                                @endif --}}
                            @endforeach
                        </tbody>
                    </table>
                </div>
            @endif
        </div>
    </div>
</x-layouts.app>
