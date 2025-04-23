<x-layouts.app title="Crear Investigador">
    <div class="container mx-auto">
        <div class="bg-muted flex min-h-svh flex-col items-center justify-center gap-6 ">
            <div class="flex w-full max-w-md flex-col gap-6 p-5 dark:bg-neutral-700 bg-gray-100  rounded-xl">
                {{-- <h1 class="text-3xl font-bold text-center my-5">Editar Periodo</h1> --}}
                <div class="flex w-full flex-col text-center mb-4">
                    <flux:heading size="xl">Nuevo Investigador</flux:heading>
                    <flux:subheading>Registrar un nuevo Investigador.</flux:subheading>
                </div>
                <form action="{{ route('investigadores.store') }}" method="POST">
                    @csrf
                    @method('POST')
                    <div class="mb-4">
                        <flux:input label="Nombre" type="text" value="{{old('name')}}" name="name" id="name"
                            placeholder="Nombre del investigador" />
                    </div>
                    <div class="mb-4">
                        <flux:input label="Correo" type="email" value="{{old('email')}}" name="email" id="email"
                            placeholder="Correo del investigador" />
                    </div>
                    <div class="mb-4">
                        <flux:select label="Grupo de Investigacion" name="grupo_investigacion_id" value="" wire:model="industry" placeholder="Seleccione grupo...">
                            @foreach ($grupos as $grupo)
                            <flux:select.option value="{{$grupo->id}}" selected="{{old('grupo_investigacion_id') == $grupo->id}}" >{{ $grupo->nombre }}</flux:select.option>
                            @endforeach
                        </flux:select>
                    </div>
                    <div class="mb-4">
                        <flux:select label="Tipo/Rol" name="role" value="" wire:model="industry" placeholder="Seleccione grupo...">
                            <flux:select.option value="Investigador" selected="{{old('role') == 'Investigador'}}" >{{ __('Investigador') }}</flux:select.option>
                            <flux:select.option value="Lider Grupo" selected="{{old('role') == 'Lider Grupo'}}" >{{ __('Lider Grupo') }}</flux:select.option>
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
