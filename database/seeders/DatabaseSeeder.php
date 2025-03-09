<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\TipoProducto;
use App\Models\SubTipoProducto;
use App\Models\Periodo;
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

        Periodo::factory(20)->create();
    }
}
