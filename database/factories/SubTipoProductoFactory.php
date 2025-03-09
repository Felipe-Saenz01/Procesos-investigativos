<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\TipoProducto;


/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\SubTipoProducto>
 */
class SubTipoProductoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'nombre' => $this->faker->word,
            'tipo_producto_id' => TipoProducto::factory(),
        ];
    }
}
