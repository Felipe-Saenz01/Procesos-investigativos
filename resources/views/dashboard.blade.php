@push('scripts')
    <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
@endpush

<x-layouts.app title="Dashboard">
    <div class="flex h-full w-full flex-1 flex-col gap-4 p-4">
        <!-- Tarjetas de resumen -->
        <div class="grid grid-cols-1 gap-4 md:grid-cols-4">
            <div class="rounded-lg bg-white p-4 shadow dark:bg-gray-800">
                <h3 class="text-lg font-semibold text-gray-700 dark:text-gray-200">Proyectos Activos</h3>
                <p class="text-3xl font-bold text-blue-600">15</p>
            </div>
            <div class="rounded-lg bg-white p-4 shadow dark:bg-gray-800">
                <h3 class="text-lg font-semibold text-gray-700 dark:text-gray-200">Investigadores</h3>
                <p class="text-3xl font-bold text-green-600">42</p>
            </div>
            <div class="rounded-lg bg-white p-4 shadow dark:bg-gray-800">
                <h3 class="text-lg font-semibold text-gray-700 dark:text-gray-200">Productos Entregados</h3>
                <p class="text-3xl font-bold text-purple-600">87</p>
            </div>
            <div class="rounded-lg bg-white p-4 shadow dark:bg-gray-800">
                <h3 class="text-lg font-semibold text-gray-700 dark:text-gray-200">Horas Registradas</h3>
                <p class="text-3xl font-bold text-orange-600">1,240</p>
            </div>
        </div>

        <!-- Gráficas principales -->
        <div class="grid grid-cols-1 gap-4 md:grid-cols-2">
            <!-- Gráfica de Productos por Tipo -->
            <div class="rounded-lg bg-white p-4 shadow dark:bg-gray-800">
                <h3 class="mb-4 text-lg font-semibold text-gray-700 dark:text-gray-200">Productos por Tipo</h3>
                <div id="productosChart" class="h-80"></div>
            </div>
            <!-- Gráfica de Horas de Investigación -->
            <div class="rounded-lg bg-white p-4 shadow dark:bg-gray-800">
                <h3 class="mb-4 text-lg font-semibold text-gray-700 dark:text-gray-200">Horas de Investigación</h3>
                <div id="horasChart" class="h-80"></div>
            </div>
        </div>

        <!-- Gráfica inferior -->
        <div class="rounded-lg bg-white p-4 shadow dark:bg-gray-800">
            <h3 class="mb-4 text-lg font-semibold text-gray-700 dark:text-gray-200">Progreso de Proyectos</h3>
            <div id="proyectosChart" class="h-80"></div>
        </div>
    </div>

    <script>
        // Gráfica de Productos por Tipo
        var productosOptions = {
            series: [{
                data: [44, 55, 41, 37, 22]
            }],
            chart: {
                type: 'bar',
                height: 320,
                foreColor: '#9ca3af'
            },
            plotOptions: {
                bar: {
                    borderRadius: 4,
                    horizontal: true,
                }
            },
            colors: ['#6366f1'],
            dataLabels: {
                enabled: false
            },
            xaxis: {
                categories: ['Artículos', 'Libros', 'Patentes', 'Ponencias', 'Software'],
            }
        };

        // Gráfica de Horas de Investigación
        var horasOptions = {
            series: [{
                name: 'Horas',
                data: [30, 40, 45, 50, 49, 60, 70]
            }],
            chart: {
                type: 'area',
                height: 320,
                foreColor: '#9ca3af'
            },
            stroke: {
                curve: 'smooth'
            },
            colors: ['#8b5cf6'],
            xaxis: {
                categories: ['Ene', 'Feb', 'Mar', 'Abr', 'May', 'Jun', 'Jul']
            },
            fill: {
                type: 'gradient',
                gradient: {
                    shadeIntensity: 1,
                    opacityFrom: 0.7,
                    opacityTo: 0.3,
                }
            }
        };

        // Gráfica de Progreso de Proyectos
        var proyectosOptions = {
            series: [{
                name: 'En Proceso',
                data: [44, 55, 57, 56, 61, 58, 63]
            }, {
                name: 'Completados',
                data: [76, 85, 101, 98, 87, 105, 91]
            }],
            chart: {
                type: 'line',
                height: 320,
                foreColor: '#9ca3af'
            },
            colors: ['#10b981', '#f59e0b'],
            stroke: {
                width: [4, 4]
            },
            xaxis: {
                categories: ['Ene', 'Feb', 'Mar', 'Abr', 'May', 'Jun', 'Jul'],
            },
            legend: {
                position: 'top'
            }
        };

        document.addEventListener('DOMContentLoaded', function() {
            var productosChart = new ApexCharts(document.querySelector("#productosChart"), productosOptions);
            var horasChart = new ApexCharts(document.querySelector("#horasChart"), horasOptions);
            var proyectosChart = new ApexCharts(document.querySelector("#proyectosChart"), proyectosOptions);
            
            productosChart.render();
            horasChart.render();
            proyectosChart.render();
        });
    </script>
</x-layouts.app>
