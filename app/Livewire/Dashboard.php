<?php

namespace App\Livewire;

use Livewire\Component;

class Dashboard extends Component
{
    public $productosData = [
        'labels' => [
            'Generación de Nuevo Conocimiento',
            'Desarrollo Tecnológico e Innovación',
            'Apropiación Social del Conocimiento',
            'Formación de Recurso Humano para CTel',
            'Formulación de Proyectos'
        ],
        'data' => [35, 25, 20, 15, 5]
    ];

    public $estadoProyectosData = [
        'labels' => ['En Formulación', 'Formulado', 'Finalizado'],
        'data' => [15, 25, 10],
        'colors' => [
            '#F59E0B', // Naranja para En Formulación
            '#3B82F6', // Azul para Formulado
            '#10B981'  // Verde para Finalizado
        ]
    ];

    public $proyectosData = [
        'labels' => ['Ene', 'Feb', 'Mar', 'Abr', 'May', 'Jun', 'Jul'],
        'formulados' => [8, 12, 15, 10, 14, 16, 18],
        'enFormulacion' => [5, 7, 6, 8, 9, 7, 10]
    ];

    public function render()
    {
        return view('livewire.dashboard');
    }

    // Aquí puedes agregar métodos para actualizar los datos en tiempo real
    public function actualizarDatos()
    {
        // Ejemplo de actualización de datos
        $this->dispatch('actualizarGraficas', [
            'productos' => $this->productosData,
            'estadoProyectos' => $this->estadoProyectosData,
            'proyectos' => $this->proyectosData
        ]);
    }
} 