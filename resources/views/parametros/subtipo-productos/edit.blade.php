<x-layouts.app title="Tipo Productos">
    <div class="container mx-auto">
        <div class="bg-muted flex min-h-svh flex-col items-center justify-center gap-6 ">
            <div class="flex w-full max-w-md flex-col gap-6 p-5 bg-neutral-700  rounded-xl">
                <div class="flex w-full flex-col text-center mb-4">
                    <flux:heading size="xl">Editar Subtipo Producto</flux:heading>
                    <flux:subheading>Actualizar un subtipo producto investigativo.</flux:subheading>
                </div>
                <form action="{{ route('parametros.subtipo-productos.update', $subtipo_producto->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="mb-4">
                        <flux:input label="Nombre" value="{{ $subtipo_producto->nombre }}" type="text" name="nombre"
                            id="nombre" placeholder="Nombre del subtipo producto" />
                    </div>
                    <div class="mb-4">
                        <flux:select label="Tipo Producto" name="tipo_producto_id" >
                            @foreach ($tipoProductos as $tipoProducto)
                                <flux:select.option value="{{ $tipoProducto->id }}" selected="{{ $subtipo_producto->tipoProducto->id == $tipoProducto->id }}">
                                    {{ $tipoProducto->nombre }}
                                </flux:select.option>
                            @endforeach
                        </flux:select>
                    </div>
                    <div class="flex">
                        <flux:spacer />
                        <flux:button type="submit" variant="primary">Actualizar</flux:button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-layouts.app>