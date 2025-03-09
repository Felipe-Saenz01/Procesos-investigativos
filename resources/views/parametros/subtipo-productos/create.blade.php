<x-layouts.app>
    <div class="container mx-auto">
        <div class="bg-muted flex min-h-svh flex-col items-center justify-center gap-6 ">
            <div class="flex w-full max-w-md flex-col gap-6 p-5 bg-neutral-700  rounded-xl">
                {{-- <h1 class="text-3xl font-bold text-center my-5">Editar Periodo</h1> --}}
                <div class="flex w-full flex-col text-center mb-4">
                    <flux:heading size="xl">Nuevo Sub Tipo Producto</flux:heading>
                    <flux:subheading>Registrar un nuevo subtipo de producto investigativo.</flux:subheading>
                </div>
                <form action="{{ route('parametros.subtipo-productos.store') }}" method="POST">
                    @csrf
                    @method('POST')
                    <div class="mb-4">
                        <flux:input label="Nombre" type="text" name="nombre" id="nombre"
                            placeholder="Nombre del periodo" />
                    </div>
                    <div class="mb-4">
                        <flux:select label="Tipo Producto" name="tipo_producto_id" value="" wire:model="industry" placeholder="Seleccione Tipo...">
                            @foreach ($tipoProductos as $tipoProducto)
                            <flux:select.option value="{{$tipoProducto->id}}">{{ $tipoProducto->nombre }}</flux:select.option>
                            @endforeach
                        </flux:select>
                    </div>
                    <div class="flex">
                        <flux:spacer />

                        <flux:button type="submit" variant="primary">Registrar</flux:button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-layouts.app>
