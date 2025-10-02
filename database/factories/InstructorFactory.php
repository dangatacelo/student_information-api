<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Instructor;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Instructor>
 */
class InstructorFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->randomElement([
                'Sheila Lee', 'Jopet Vincent B. Medalla', 'Mark Anthony D. Dipad', 'Krishia Lachica', 'Mary Ann D. Especial',
                'Aldin D. Labo','Christian Paulo B. De Vera','John Mark Gabrentina','Richard Rabulan','Kenneth Gisalan'
            ]),
            'email' => $this->faker->unique()->safeEmail(),
            'phone_number' => $this->faker->phoneNumber(),
            'department' => $this->faker->randomElement(['College of Information and Communications Technology (ICT)', 'College of Business Management and Education (BME)']),
            'employee_id' => $this->faker->unique()->numberBetween(1000, 9999),
        ];
    }
}
