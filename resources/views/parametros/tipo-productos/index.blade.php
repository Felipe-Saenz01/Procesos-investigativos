<x-layouts.app title="Tipo Productos">
    <div class="flex h-full w-full flex-1 flex-col gap-4 rounded-xl">
        <div class="relative h-full flex-1 overflow-hidden rounded-xl border border-neutral-200 dark:border-neutral-700">
            <div class="flex flex-row gap-4 p-4 items-center">
                <h1 class="text-3xl font-bold text-center my-5">Tipo Productos Investigativos</h1>
                <flux:button variant="primary" icon="plus" href="{{ route('parametros.tipo-productos.create') }}"
                    class="mt-2" square />
            </div>

            @if ($tipoProductos->isEmpty())
                <div class="alert alert-info">No hay tipos de productos investigativos registrados.</div>
            @else
                <div class="px-4 mb-4">
                    <table class="min-w-full bg-white-200 rounded-xl ">
                        <thead class="bg-green-600 text-white">
                            <tr>
                                <th class="py-2 px-4 border-b">Nombre</th>
                                <th class="py-2 px-4 border-b">Fecha Creacion</th>
                                <th class="py-2 px-4 border-b">Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($tipoProductos as $tipo_producto)
                                <tr>
                                    <td class="py-2 px-4 border-b">{{ $tipo_producto->nombre }}</td>
                                    <td class="py-2 px-4 border-b">{{ $tipo_producto->updated_at->format('d/m/Y H:i') }}
                                    </td>
                                    <td class="py-2 px-4 border-b">

                                        <flux:button
                                            href="{{ route('parametros.tipo-productos.edit', $tipo_producto) }}">
                                            Editar</flux:button>

                                        <form
                                            action="{{ route('parametros.tipo-productos.destroy', $tipo_producto) }}"
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
