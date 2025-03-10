<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\TipoProducto;
use App\Models\SubTipoProducto;
use App\Models\Periodo;
use App\Models\GrupoInvestigacion;
use App\Models\ProductoInvestigativo;
use App\Models\EntregaProducto;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        // User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        // Crear tipos de productos
        $tiposProducto = [
            [
                'nombre' => 'Generación de Nuevo Conocimiento',
                'subtipos' => [
                    'Artículos de investigación A1, A2, B y C',
                    'Artículos de investigación D',
                    'Notas científicas',
                    'Libros resultados de investigación',
                    'Capítulos en libro resultado de investigación',
                    'Libros de Formación Q1',
                    'Productos tecnológicos patentados o en proceso de solicitud de patente',
                    'Variedades vegetales, nuevas razas animales y poblaciones mejoradas de razas pecuarias',
                    'Productos resultados de la creación o investigación-creación',
                ],
            ],
            [
                'nombre' => 'Desarrollo Tecnológico e Innovación',
                'subtipos' => [
                    'Productos tecnológicos certificados o validados',
                    'Productos empresariales',
                    'Regulaciones, normas, reglamentos o legislaciones',
                    'Conceptos técnicos',
                    'Registros de Acuerdos de licencia para explotación de obras de Investigación + Creación en Artes, Arquitectura y Diseño protegidas por derechos de autor',
                ],
            ],
            [
                'nombre' => 'Apropiación Social del Conocimiento',
                'subtipos' => [
                    'Procesos de Apropiación Social del Conocimiento',
                    'Circulación de conocimiento especializado',
                    'Divulgación Pública de la CTeI',
                    'Producción Bibliográfica',
                ],
            ],
            [
                'nombre' => 'Formación de Recurso Humano para CTel',
                'subtipos' => [
                    'Direcciones de Tesis de doctorado',
                    'Direcciones de Trabajo de grado de maestría',
                    'Direcciones de Trabajo de pregrado',
                    'Proyectos de Investigación y Desarrollo, Investigación - Creación, e Investigación, Desarrollo e Innovación (ID+I)',
                    'Proyectos de extensión y de responsabilidad social en CTel',
                    'Apoyos a la creación de programas y cursos de formación de investigadores',
                    'Acompañamientos y asesorías de línea temática del Programa Ondas',
                ],
            ],
        ];

        // Crear tipos de productos y sus subtipos
        foreach ($tiposProducto as $tipo) {
            $tipoProducto = TipoProducto::create(['nombre' => $tipo['nombre']]);

            foreach ($tipo['subtipos'] as $subtipoNombre) {
                SubTipoProducto::create([
                    'nombre' => $subtipoNombre,
                    'tipo_producto_id' => $tipoProducto->id,
                ]);
            }
        }

        // Crear grupos de investigación
        $grupos = GrupoInvestigacion::factory()->count(5)->create();

        // Crear periodos
        $nombresPeriodos = ['2023-A', '2023-B', '2024-A', '2024-B', '2025-A'];
        $periodos = collect(); // Crear una colección para almacenar los periodos

        foreach ($nombresPeriodos as $nombre) {
            $periodo = Periodo::create([
                'nombre' => $nombre,
            ]);
            $periodos->push($periodo); // Agregar el periodo a la colección
        }

        // Crear usuarios (todos serán investigadores)
        $roles_users = ['Investigador', 'Lider Grupo'];
        $investigadores = User::factory()->count(10)->create([
            'role' => function () use ($roles_users) {
                return $roles_users[array_rand($roles_users)]; // Asignar un rol aleatorio
            }, // Todos serán investigadores
            'grupo_investigacion_id' => function () use ($grupos) {
                return $grupos->random()->id; // Asignar a un grupo aleatorio
            },
        ]);

        // Crear productos investigativos
        $productos = ProductoInvestigativo::factory()->count(10)->create([
            'user_id' => function () use ($investigadores) {
                return $investigadores->random()->id;
            },
            'grupo_investigacion_id' => function () use ($grupos) {
                return $grupos->random()->id;
            },
            'sub_tipo_producto_id' => function () {
                return SubTipoProducto::inRandomOrder()->first()->id;
            },
        ]);

        // Crear entregas de productos
        $productos->each(function ($producto) use ($periodos) {
            $numeroEntregas = 3; // Cambia este valor según tus necesidades

            // Crear múltiples entregas para el producto actual
            for ($i = 0; $i < $numeroEntregas; $i++) {
                EntregaProducto::factory()->create([
                    'producto_investigativo_id' => $producto->id,
                    'periodo_id' => $periodos->random()->id,
                ]);
            }
        });
    }
}
