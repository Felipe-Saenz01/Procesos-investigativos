<?php

namespace Database\Factories;
use App\Models\GrupoInvestigacion;
use App\Models\SubTipoProducto;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\ProductoInvestigativo>
 */
class ProductoInvestigativoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'titulo' => $this->faker->sentence,
            'resumen' => $this->faker->paragraph,
            'grupo_investigacion_id' => GrupoInvestigacion::factory(),
            'user_id' => User::factory(),
            'sub_tipo_producto_id' => SubTipoProducto::factory(),
        ];
    }
}
