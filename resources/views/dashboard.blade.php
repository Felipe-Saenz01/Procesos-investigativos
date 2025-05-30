@push('scripts')
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
@endpush

<x-app-layout title="Dashboard">
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
                <div class="h-80">
                    <canvas id="productosChart"></canvas>
                </div>
            </div>
            <!-- Gráfica de Horas de Investigación -->
            <div class="rounded-lg bg-white p-4 shadow dark:bg-gray-800">
                <h3 class="mb-4 text-lg font-semibold text-gray-700 dark:text-gray-200">Horas de Investigación</h3>
                <div class="h-80">
                    <canvas id="horasChart"></canvas>
                </div>
            </div>
        </div>

        <!-- Gráfica inferior -->
        <div class="rounded-lg bg-white p-4 shadow dark:bg-gray-800">
            <h3 class="mb-4 text-lg font-semibold text-gray-700 dark:text-gray-200">Progreso de Proyectos</h3>
            <div class="h-80">
                <canvas id="proyectosChart"></canvas>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Configuración común para modo oscuro
            Chart.defaults.color = document.documentElement.classList.contains('dark') ? '#9ca3af' : '#374151';
            Chart.defaults.borderColor = document.documentElement.classList.contains('dark') ? '#374151' : '#e5e7eb';

            // Gráfica de Productos por Tipo
            new Chart(document.getElementById('productosChart'), {
                type: 'bar',
                data: {
                    labels: ['Artículos', 'Libros', 'Patentes', 'Ponencias', 'Software'],
                    datasets: [{
                        label: 'Cantidad',
                        data: [44, 55, 41, 37, 22],
                        backgroundColor: '#6366f1',
                        borderRadius: 4
                    }]
                },
                options: {
                    indexAxis: 'y',
                    responsive: true,
                    maintainAspectRatio: false
                }
            });

            // Gráfica de Horas de Investigación
            new Chart(document.getElementById('horasChart'), {
                type: 'line',
                data: {
                    labels: ['Ene', 'Feb', 'Mar', 'Abr', 'May', 'Jun', 'Jul'],
                    datasets: [{
                        label: 'Horas',
                        data: [30, 40, 45, 50, 49, 60, 70],
                        fill: true,
                        backgroundColor: 'rgba(139, 92, 246, 0.2)',
                        borderColor: '#8b5cf6',
                        tension: 0.4
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false
                }
            });

            // Gráfica de Progreso de Proyectos
            new Chart(document.getElementById('proyectosChart'), {
                type: 'line',
                data: {
                    labels: ['Ene', 'Feb', 'Mar', 'Abr', 'May', 'Jun', 'Jul'],
                    datasets: [{
                        label: 'En Proceso',
                        data: [44, 55, 57, 56, 61, 58, 63],
                        borderColor: '#10b981',
                        tension: 0.4
                    }, {
                        label: 'Completados',
                        data: [76, 85, 101, 98, 87, 105, 91],
                        borderColor: '#f59e0b',
                        tension: 0.4
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    interaction: {
                        intersect: false,
                        mode: 'index'
                    }
                }
            });
        });

        // Actualizar gráficas cuando cambie el tema
        window.addEventListener('theme-changed', () => {
            Chart.instances.forEach(chart => {
                chart.destroy();
            });
            // Re-ejecutar el código de inicialización
            document.dispatchEvent(new Event('DOMContentLoaded'));
        });
    </script>
</x-app-layout>
