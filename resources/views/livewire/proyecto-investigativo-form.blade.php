<div class="space-y-6">

    {{-- Centrado del switch --}}
    <div class="w-full flex justify-center">
        <flux:switch label="¿Proyecto ya formulado?" value="{{$es_formulado}}" name="status" wire:model.live="es_formulado" />
    </div>
    <input type="hidden" name="es_formulado" value="{{$es_formulado}}" />

    {{-- Contenido dinámico --}}
    @if ($es_formulado)
        {{-- Grid de dos columnas responsiva --}}
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <flux:input label="Título del proyecto" value="{{old('titulo')}}" name="titulo" id="titulo" />
            <flux:input label="Eje Tematico" value="{{old('eje_tematico')}}" name="eje_tematico" id="eje_tematico" />
            <flux:textarea label="Resumen ejecutivo" value="{{old('resumen_ejecutivo')}}" name="resumen_ejecutivo" id="resumen_ejecutivo" />
            <flux:textarea label="Planteamiento del problema" value="{{old('planteamiento_problema')}}" name="planteamiento_problema" id="planteamiento_problema" />
            <flux:textarea label="Antecedentes" value="{{old('antecedentes')}}" name="antecedentes" id="antecedentes" />
            <flux:textarea label="Justificación" value="{{old('justificacion')}}" name="justificacion" id="justificacion" />
            <flux:textarea label="Objetivos" value="{{old('objetivos')}}" name="objetivos" id="objetivos" />
            <flux:textarea label="Metodología" value="{{old('metodologia')}}" name="metodologia" id="metodologia" />
            <flux:textarea label="Resultados" value="{{old('resultados')}}" name="resultados" id="resultados" />
            <flux:textarea label="Riesgos" value="{{old('riesgos')}}" name="riesgos" id="riesgos" />
            <flux:textarea label="Bibliografía" value="{{old('bibliografia')}}" name="bibliografia" id="bibliografia" />
        </div>
        @else
        {{-- Campo único centrado --}}
        <div class="flex  justify-center ">
            <div class="w-full max-w-md">
                <flux:input class="mb-4" label="Título del proyecto" name="titulo" id="titulo" value="{{old('titulo')}}" />
                <flux:input label="Eje Tematico" value="{{old('eje_tematico')}}" name="eje_tematico" id="eje_tematico" />
            </div>
        </div>
    @endif

</div>
