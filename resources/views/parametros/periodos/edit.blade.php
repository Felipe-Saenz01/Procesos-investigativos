<x-layouts.app>
    <div class="container mx-auto">
        <div class="bg-muted flex min-h-svh flex-col items-center justify-center gap-6 ">
            <div class="flex w-full max-w-md flex-col gap-6 p-5 dark:bg-neutral-700 bg-gray-100  rounded-xl">
                {{-- <h1 class="text-3xl font-bold text-center my-5">Editar Periodo</h1> --}}
                <div class="flex w-full flex-col text-center mb-4">
                    <flux:heading size="xl">Actualizar periodo</flux:heading>
                    <flux:subheading>Realizar cambios a un periodo.</flux:subheading>
                </div>
                {{-- @if ($errors->any())
                    <div class="text-red-500 text-sm">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif --}}
                <form action="{{ route('parametros.periodos.update', $periodo->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="mb-4">
                        <flux:input label="Nombre" type="text" name="nombre" id="nombre"
                            placeholder="Nombre del periodo" value="{{ $periodo->nombre }}" />
                    </div>
                    <div class="mb-4">
                        <flux:input label="Fecha Limite Planeación" type="date" name="fecha_limite_planeacion"
                            id="fecha_limite_planeacion" value="{{ $periodo->fecha_limite_planeacion->format('Y-m-d') }}" />
                    </div>
                    <div class="mb-4">
                        <flux:input label="Fecha Limite Evidencias" type="date" name="fecha_limite_evidencias"
                            id="fecha_limite_evidencias" value="{{ $periodo->fecha_limite_evidencias->format('Y-m-d') }}" />
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
