<x-layouts.app>
    <div class="container mx-auto">
        <div class="bg-muted flex min-h-svh flex-col items-center justify-center gap-6">
            <div class="flex w-full max-w-4xl flex-col gap-6 p-5 dark:bg-neutral-700 bg-gray-100 rounded-xl">
                <div class="flex w-full flex-col text-center mb-4">
                    <flux:heading size="xl">Nuevo Proyecto de Investigación</flux:heading>
                    <flux:subheading>Registrar un nuevo proyecto de investigación.</flux:subheading>
                </div>
                <form action="{{route('proyecto-investigacion.store')}}" method="POST">
                    @csrf
                    @method('POST')
                    <livewire:proyecto-investigativo-form />
                    <div class="flex">
                        <flux:spacer />
    
                        <flux:button type="submit" variant="primary">Registrar</flux:button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-layouts.app>
