<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
        'name' => 'Admin User',
        'email' => 'admin@example.com',
        'password' => Hash::make('password'),
        'date_of_birth' => '2004-01-01',
        'gender' => 'male',
        'address' => '123 Admin St',
        'phone_number' => '123-456-7890',
        ]);

        $this->call([
            InstructorSeeder::class,
            CourseSeeder::class
        ]);
    } 
}
