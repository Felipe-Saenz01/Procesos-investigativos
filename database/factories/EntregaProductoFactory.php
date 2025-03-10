<?php

namespace Database\Factories;

use App\Models\Periodo;
use App\Models\ProductoInvestigativo;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\EntregaPRoducto>
 */
class EntregaProductoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'archivo' => $this->faker->word . '.pdf',
            'periodo_id' => Periodo::factory(),
            'producto_investigativo_id' => ProductoInvestigativo::factory(),
        ];
    }
}
