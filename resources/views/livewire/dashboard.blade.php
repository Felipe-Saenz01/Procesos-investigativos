<div>
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
                <h3 class="mb-4 text-lg font-semibold text-gray-700 dark:text-gray-200">Distribución de Productos por Tipo</h3>
                <div class="h-80" wire:ignore>
                    <canvas id="productosChart"></canvas>
                </div>
            </div>
            <!-- Gráfica de Estado de Proyectos -->
            <div class="rounded-lg bg-white p-4 shadow dark:bg-gray-800">
                <h3 class="mb-4 text-lg font-semibold text-gray-700 dark:text-gray-200">Estado de Proyectos</h3>
                <div class="h-80" wire:ignore>
                    <canvas id="estadoProyectosChart"></canvas>
                </div>
            </div>
        </div>

        <!-- Gráfica inferior -->
        <div class="rounded-lg bg-white p-4 shadow dark:bg-gray-800">
            <h3 class="mb-4 text-lg font-semibold text-gray-700 dark:text-gray-200">Seguimiento de Formulación</h3>
            <div class="h-80" wire:ignore>
                <canvas id="proyectosChart"></canvas>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('livewire:initialized', function () {
            const isDark = document.documentElement.classList.contains('dark');
            const textColor = isDark ? '#9ca3af' : '#374151';
            const borderColor = isDark ? '#374151' : '#e5e7eb';

            // Configuración común para modo oscuro
            Chart.defaults.color = textColor;
            Chart.defaults.borderColor = borderColor;

            // Colores para el gráfico de torta de productos
            const pieColors = [
                '#3B82F6', // Azul
                '#10B981', // Verde
                '#8B5CF6', // Púrpura
                '#F59E0B', // Naranja
                '#EC4899'  // Rosa
            ];

            // Gráfica de Productos por Tipo (Torta)
            const productosChart = new Chart(document.getElementById('productosChart'), {
                type: 'doughnut',
                data: {
                    labels: @json($productosData['labels']),
                    datasets: [{
                        data: @json($productosData['data']),
                        backgroundColor: pieColors,
                        borderWidth: 1,
                        borderColor: isDark ? '#1F2937' : '#ffffff'
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    plugins: {
                        legend: {
                            position: 'right',
                            labels: {
                                color: textColor,
                                font: {
                                    size: 11
                                },
                                padding: 10,
                                usePointStyle: true,
                                pointStyle: 'circle'
                            }
                        },
                        tooltip: {
                            callbacks: {
                                label: function(context) {
                                    const label = context.label || '';
                                    const value = context.formattedValue;
                                    const total = context.dataset.data.reduce((a, b) => a + b, 0);
                                    const percentage = Math.round((context.raw / total) * 100);
                                    return `${label}: ${value} (${percentage}%)`;
                                }
                            }
                        }
                    },
                    cutout: '60%'
                }
            });

            // Gráfica de Estado de Proyectos
            const estadoProyectosChart = new Chart(document.getElementById('estadoProyectosChart'), {
                type: 'bar',
                data: {
                    labels: @json($estadoProyectosData['labels']),
                    datasets: [{
                        label: 'Cantidad de Proyectos',
                        data: @json($estadoProyectosData['data']),
                        backgroundColor: @json($estadoProyectosData['colors']),
                        borderRadius: 6,
                        maxBarThickness: 50
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    plugins: {
                        legend: {
                            display: false
                        },
                        tooltip: {
                            callbacks: {
                                label: function(context) {
                                    return `Cantidad: ${context.formattedValue} proyectos`;
                                }
                            }
                        }
                    },
                    scales: {
                        y: {
                            beginAtZero: true,
                            ticks: {
                                stepSize: 5
                            },
                            grid: {
                                drawBorder: false
                            }
                        },
                        x: {
                            grid: {
                                display: false
                            }
                        }
                    }
                }
            });

            // Gráfica de Seguimiento de Formulación
            const proyectosChart = new Chart(document.getElementById('proyectosChart'), {
                type: 'bar',
                data: {
                    labels: @json($proyectosData['labels']),
                    datasets: [{
                        label: 'Proyectos Formulados',
                        data: @json($proyectosData['formulados']),
                        backgroundColor: '#10b981',
                        borderRadius: 4
                    }, {
                        label: 'En Formulación',
                        data: @json($proyectosData['enFormulacion']),
                        backgroundColor: '#f59e0b',
                        borderRadius: 4
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    plugins: {
                        legend: {
                            labels: {
                                color: textColor
                            }
                        }
                    },
                    scales: {
                        x: {
                            stacked: true,
                            grid: {
                                display: false
                            }
                        },
                        y: {
                            stacked: true,
                            beginAtZero: true
                        }
                    }
                }
            });

            // Escuchar eventos de Livewire
            Livewire.on('actualizarGraficas', data => {
                productosChart.data.labels = data.productos.labels;
                productosChart.data.datasets[0].data = data.productos.data;
                productosChart.update();

                estadoProyectosChart.data.labels = data.estadoProyectos.labels;
                estadoProyectosChart.data.datasets[0].data = data.estadoProyectos.data;
                estadoProyectosChart.update();

                proyectosChart.data.labels = data.proyectos.labels;
                proyectosChart.data.datasets[0].data = data.proyectos.formulados;
                proyectosChart.data.datasets[1].data = data.proyectos.enFormulacion;
                proyectosChart.update();
            });

            // Actualizar gráficas cuando cambie el tema
            window.addEventListener('theme-changed', () => {
                const newIsDark = document.documentElement.classList.contains('dark');
                const newTextColor = newIsDark ? '#9ca3af' : '#374151';
                const newBorderColor = newIsDark ? '#374151' : '#e5e7eb';

                Chart.defaults.color = newTextColor;
                Chart.defaults.borderColor = newBorderColor;

                [productosChart, estadoProyectosChart, proyectosChart].forEach(chart => {
                    if (chart.config.type === 'doughnut' || chart.config.type === 'pie') {
                        chart.data.datasets[0].borderColor = newIsDark ? '#1F2937' : '#ffffff';
                    }
                    chart.options.plugins.legend.labels.color = newTextColor;
                    chart.update();
                });
            });
        });
    </script>
</div> 