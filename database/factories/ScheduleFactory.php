<?php

namespace Database\Factories;

use App\Models\Schedule;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Schedule>
 */
class ScheduleFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */

    protected $model = Schedule::class;

    public function definition(): array
    {
        return [
            'day' => $this->faker->dayOfWeek(),
            'is_lab' => $this->faker->boolean(),
            'created_at' => now(),
            'updated_at' => now(),
            'semesters_id' => $this->faker->numberBetween(1, 3),
            'sy_id' => 5,
            'faculty_id' => $this->faker->numberBetween(10, 59),
            'subject_id' => $this->faker->numberBetween(2,5),
            'classroom_id' => $this->faker->numberBetween(3,6),
            'block_id' => $this->faker->numberBetween(6,9),
        ];
    }
}
