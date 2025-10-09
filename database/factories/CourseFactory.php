<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Instructor;
use App\Models\Course;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class CourseFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'course_code' => $this->faker->randomElement(['IT 411','IT 412','IT 413','IT ELEC 4','IT ST 4']),
            'course_name' => $this->faker->randomElement(['CAPSTONE PROJECT 2','SYSTEMS ADMINISTRATION AND MAINTENANCE','INFORMATION ASSURANCE AND SECURITY 2','SYSTEMS INTEGRATION AND ARCHITECTURE 2','ADVANCED WEB APPLICATIONS']),
            'description' => $this->faker->paragraph,
            'units' => $this->faker->numberBetween(1, 3),
            'department' => Instructor::inRandomOrder()->value('department') ?? 'General',
            'instructor_id' => Instructor::factory(),
        ];
    }
        
    }

