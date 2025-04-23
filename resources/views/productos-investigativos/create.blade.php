<x-layouts.app title="Productos Investigativos">
    <div class="container mx-auto">
        <div class="bg-muted flex min-h-svh flex-col items-center justify-center gap-2 ">
            <div class="flex w-full max-w-md flex-col gap-6 p-5 dark:bg-neutral-700 bg-gray-100  rounded-xl">
                {{-- <h1 class="text-3xl font-bold text-center my-5">Editar Periodo</h1> --}}
                <div class="flex w-full flex-col text-center mb-4">
                    <flux:heading size="xl">Nuevo Producto Investigativo</flux:heading>
                    <flux:subheading>Registrar un nuevo producto investigativo de un proyecto de investigación.
                    </flux:subheading>
                </div>
                <form action="{{ route('productos-investigativos.store') }}" method="POST">
                    @csrf
                    @method('POST')
                    <div class="mb-4">
                        <flux:input label="Título" value="{{ old('titulo') }}" type="text" name="titulo"
                            id="titulo" placeholder="Titulo producto investigativo" />
                    </div>
                    <div class="mb-4">
                        {{-- <flux:te label="Título" value="{{old('titulo')}}" type="text" name="titulo" id="titulo" placeholder="Titulo producto investigativo" /> --}}
                        <flux:textarea label="Resumen" value="{{ old('resumen') }}" name="resumen" id="resumen"
                            placeholder="Resumen del producto investigativo" rows="4" />
                    </div>
                    <div class="mb-4">
                        <flux:select label="Sub Tipo Producto" name="sub_tipo_producto_id" value="" wire:model="industry"
                            placeholder="Seleccione Tipo...">
                            @foreach ($subTipos as $subTipo)
                                <flux:select.option value="{{ $subTipo->id }}" selected="{{ old('sub_tipo_producto_id') == $subTipo->id }}">
                                    {{ $subTipo->nombre }}
                                </flux:select.option>
                            @endforeach
                        </flux:select>
                    </div>
                    <div class="mb-4">
                        <flux:select label="Proyecto" name="proyecto_investigacion_id" value="" wire:model="industry"
                            placeholder="Seleccione Tipo...">
                            @foreach ($proyectos as $proyecto)
                                <flux:select.option value="{{ $proyecto->id }}" selected="{{ old('proyecto_investigacion_id') == $proyecto->id }}">
                                    {{ $proyecto->titulo }}
                                </flux:select.option>
                            @endforeach
                        </flux:select>
                    </div>
                    <livewire:input-usuarios wire:model.live="usuariosSeleccionados" />
                    <div class="flex">
                        <flux:spacer />

                        <flux:button type="submit" variant="primary">Registrar</flux:button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-layouts.app>
