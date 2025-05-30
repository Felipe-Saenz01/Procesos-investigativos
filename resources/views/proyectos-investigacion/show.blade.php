<x-layouts.app title="Proyectos de Investigación">
    <div class="flex h-full w-full flex-1 flex-col gap-4 rounded-xl">
        <div class="relative h-full flex-1 overflow-hidden rounded-xl border border-neutral-200 dark:border-neutral-700">
            <div class="flex flex-row gap-4 p-4 items-center">
                <h1 class="text-3xl font-bold text-center my-5"> Información Proyecto Investigación </h1>
                {{-- <flux:button variant="primary" color="lime" icon="plus"
                    href="{{ route('productos-investigativos.create') }}" class="mt-2" square /> --}}
            </div>
            <div class="mb-5 mx-5">
                <table class="w-4/5 border border-gray-300 rounded-lg">
                    <tbody class="divide-y divide-x divide-gray-300">
                        <tr class="">
                            <td class="font-bold py-2 bg-green-600 w-1/3 text-white px-2 border-gray-300">Título:</td>
                            <td class="p-2 ">{{ $proyecto->titulo }}</td>
                        </tr>
                        <tr>
                            <td class="font-bold py-2 bg-green-600 w-1/3 text-white px-2 border-gray-300">Eje temático:</td>
                            <td class="p-2">{{ $proyecto->eje_tematico }}</td>
                        </tr>
                        <tr>
                            <td class="font-bold py-2 bg-green-600 w-1/3 text-white px-2 border-gray-300">Estado:</td>
                            <td class="p-2">
                                @if ($proyecto->estado == 'Formulado')
                                    <flux:badge color="lime">{{ $proyecto->estado }}</flux:badge>
                                @else
                                    <flux:badge color="orange">{{ $proyecto->estado }}</flux:badge>
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <td class="font-bold py-2 bg-green-600 w-1/3 text-white px-2 border-gray-300">Planteamiento del Problema:
                            </td>
                            <td class="p-2">{{ $proyecto->planteamiento_problema }}</td>
                        </tr>
                        <tr>
                            <td class="font-bold py-2 bg-green-600 w-1/3 text-white px-2 border-gray-300">Investigadores:</td>
                            <td class="p-2">{{ $proyecto->usuario->name }}
                                @if ($proyecto->usuario->role == 'Lider Grupo')
                                    <flux:badge color="orange">{{ $proyecto->usuario->role }}</flux:badge>
                                @else
                                    <flux:badge color="lime">{{ $proyecto->usuario->role }}</flux:badge>
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <td class="font-bold py-2 bg-green-600 w-1/3 text-white px-2 border-gray-300">Antecedentes:</td>
                            <td class="p-2">{{ $proyecto->antecedentes }}</td>
                        </tr>
                        <tr>
                            <td class="font-bold py-2 bg-green-600 w-1/3 text-white px-2 border-gray-300">Justificación:</td>
                            <td class="p-2">{{ $proyecto->justificacion }}
                            </td>
                        </tr>
                        <tr>
                            <td class="font-bold py-2 bg-green-600 w-1/3 text-white px-2 border-gray-300">Objetivos:</td>
                            <td class="p-2">{{ $proyecto->objetivos }}
                            </td>
                        </tr>
                        <tr>
                            <td class="font-bold py-2 bg-green-600 w-1/3 text-white px-2 border-gray-300">Metodología:</td>
                            <td class="p-2">{{ $proyecto->metodologia }}
                            </td>
                        </tr>
                        <tr>
                            <td class="font-bold py-2 bg-green-600 w-1/3 text-white px-2 border-gray-300">Resultados:</td>
                            <td class="p-2">{{ $proyecto->resultados }}
                            </td>
                        </tr>
                        <tr>
                            <td class="font-bold py-2 bg-green-600 w-1/3 text-white px-2 border-gray-300">Riesgos:</td>
                            <td class="p-2">{{ $proyecto->riesgos }}
                            </td>
                        </tr>
                        <tr>
                            <td class="font-bold py-2 bg-green-600 w-1/3 text-white px-2 border-gray-300">Bibliografía:</td>
                            <td class="p-2">{{ $proyecto->bibliografia }}
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <flux:separator />
            <h3 class="font-bold text-3xl mb-4 my-5 ml-5">Actividades del Proyecto</h3>
            @if (empty($proyecto->actividades))
                <div class="alert alert-info font-bold text-lg m-5">No hay actividades registradas.</div>
            @else
                <div class="px-4 mb-4">
                    <table class="min-w-full bg-white-200 rounded-xl">
                        <thead class="bg-green-600 w-1/3 text-white">
                            <tr>
                                <th class="py-2 px-4 border-b">Nombre de la Actividad</th>
                                <th class="py-2 px-4 border-b">Fecha de Inicio</th>
                                <th class="py-2 px-4 border-b">Fecha de Fin</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($proyecto->actividades as $actividad)
                                <tr>
                                    <td class="py-2 px-4 border-b">{{ $actividad['nombre'] }}</td>
                                    <td class="py-2 px-4 border-b">{{ \Carbon\Carbon::parse($actividad['fecha_inicio'])->format('d/m/Y') }}</td>
                                    <td class="py-2 px-4 border-b">{{ \Carbon\Carbon::parse($actividad['fecha_fin'])->format('d/m/Y') }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            @endif
            <flux:separator />
            <h3 class="font-bold text-3xl mb-4 my-5 ml-5">Productos Investigativos</h3>
            @if ($proyecto->productos->isEmpty())
                <div class="alert alert-info font-bold text-lg m-5">No hay productos investigativos registrados.</div>
            @else
                <div class="px-4 mb-4">
                    <table class="min-w-full bg-white-200 rounded-xl ">
                        <thead class="bg-green-600 w-1/3 text-white text-white">
                            <tr>
                                <th class="py-2 px-4 border-b">Titulo</th>
                                <th class="py-2 px-4 border-b">Resumen</th>
                                <th class="py-2 px-4 border-b">Fecha de creacion</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($proyecto->productos as $producto)
                                <tr>
                                    <td class="py-2 px-4 border-b">
                                        <a href="{{ route('productos-investigativos.show', $producto)}}"
                                            class="text-blue-500 hover:underline">
                                            {{ $producto->titulo }}
                                        </a>
                                    </td>
                                    <td class="py-2 px-4 border-b"> {{ $producto->resumen }} </td>
                                    <td class="py-2 px-4 border-b"> {{ $producto->updated_at->format('d/m/Y - H:i') }}
                                    </td>

                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            @endif
        </div>
    </div>
</x-layouts.app>
