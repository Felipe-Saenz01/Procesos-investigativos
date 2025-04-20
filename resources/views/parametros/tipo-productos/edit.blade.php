<x-layouts.app title="Tipo Productos">
    <div class="container mx-auto">
        <div class="bg-muted flex min-h-svh flex-col items-center justify-center gap-6 ">
            <div class="flex w-full max-w-md flex-col gap-6 p-5 dark:bg-neutral-700 bg-gray-100  rounded-xl">
                {{-- <h1 class="text-3xl font-bold text-center my-5">Editar Periodo</h1> --}}
                <div class="flex w-full flex-col text-center mb-4">
                    <flux:heading size="xl">Nuevo Tipo Producto</flux:heading>
                    <flux:subheading>Registrar un nuevo tipo producto investigativo.</flux:subheading>
                </div>
                <form action="{{ route('parametros.tipo-productos.update', $tipoProducto->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="mb-4">
                        <flux:input label="Nombre" value="{{ $tipoProducto->nombre }}" type="text" name="nombre" id="nombre" placeholder="Nombre del periodo" />
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