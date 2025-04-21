<x-layouts.app>
    <div class="container mx-auto">
        <div class="bg-muted flex min-h-svh flex-col items-center justify-center gap-6 ">
            <div class="flex w-full max-w-md flex-col gap-6 p-5 dark:bg-neutral-700 bg-gray-100  rounded-xl">
                {{-- <h1 class="text-3xl font-bold text-center my-5">Editar Periodo</h1> --}}
                <div class="flex w-full flex-col text-center mb-4">
                    <flux:heading size="xl">Nuevo Grupo de Investigación</flux:heading>
                    <flux:subheading>Registrar un nuevo grupo de investigación.</flux:subheading>
                </div>
                <form action="{{ route('grupos-investigacion.update', $grupos_investigacion->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="mb-4">
                        <flux:input label="Nombre" type="text" value="{{old('nombre', $grupos_investigacion->nombre)}}" name="nombre" id="nombre"
                            placeholder="Nombre del periodo" />
                    </div>
                    <div class="mb-4">
                        <flux:input label="Correo" type="email" value="{{old('correo', $grupos_investigacion->correo)}}" name="correo" id="correo"
                            placeholder="Correo grupo investigación" />
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
