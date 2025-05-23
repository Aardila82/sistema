<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Entrada; //Se debe llamar el Modelo
use App\Models\User;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Entrada>
 */
class EntradaFactory extends Factory
{
    protected $model = Entrada::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'titulo' => $this->faker->lexify(str_repeat('?', 50)),
            'tag' => $this->faker->word,
            'iamagen' => $this->faker->word,
            'contenido' => $this->faker->paragraph,
            'user_id' => User::inRandomOrder()->first()->id,
        ];
    }
}
