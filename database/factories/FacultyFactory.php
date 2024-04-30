<?php

namespace Database\Factories;

use App\Models\Faculty;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Faculty>
 */
class FacultyFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */

    protected $model = Faculty::class;
    
    public function definition(): array
    {
        return [
            'id_usep' => $this->faker->numberBetween(0, 2000).'-'.$this->faker->numberBetween(0,99999),
            'first_name' => $this->faker->firstName(),
            'last_name' => $this->faker->lastName(),
            'remarks' => $this->faker->titleFemale(),
            'is_part_timer' => $this->faker->boolean(),
            'is_graduate' => $this->faker->boolean(),
            'created_at' => now(),
            'updated_at' => now(),
            'user_id' => $this->faker->numberBetween(3, 5),
        ];
    }
}
