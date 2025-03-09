<x-layouts.app>
    <div class="container mx-auto">
        <div class="bg-muted flex min-h-svh flex-col items-center justify-center gap-6 ">
            <div class="flex w-full max-w-md flex-col gap-6 p-5 bg-neutral-700  rounded-xl">
                {{-- <h1 class="text-3xl font-bold text-center my-5">Editar Periodo</h1> --}}
                <div class="flex w-full flex-col text-center mb-4">
                    <flux:heading size="xl">Actualizar periodo</flux:heading>
                    <flux:subheading>Realizar cambios a un periodo.</flux:subheading>
                </div>
                <form action="{{ route('parametros.periodos.update', $periodo->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="mb-4">
                        <flux:input label="Nombre" type="text" name="nombre" id="nombre" placeholder="Nombre del periodo"    
                        value="{{ $periodo->nombre }}" />
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