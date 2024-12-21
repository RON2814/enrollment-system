<?php

namespace Database\Seeders;

use App\Models\Program;
use App\Models\Role;
use App\Models\User;
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

        Role::create(["id" => 1, "title" => "Student"]);
        Role::create(["id" => 2, "title" => "Department"]);
        Role::create(["id" => 3, "title" => "Registrar"]);
        Role::create(["id" => 4, "title" => "Admin"]);

        Program::create(["id" => 1, "title" => "BSCS", "description" => "Bachelor of Science in Computer Science",]);
        Program::create(["id" => 2, "title" => "BSIT", "description" => "Bachelor of Science in Information Technology",]);

        // Ensure no duplicates for users
        User::updateOrInsert(['id' => "1"], [
            "name" => "Test User Student",
            "email" => "student@email.com",
            "password" => bcrypt("password"),
            "role_id" => 1,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        User::updateOrInsert(['id' => "2"], [
            "name" => "Test User Department",
            "email" => "department@email.com",
            "password" => bcrypt("password"),
            "role_id" => 2,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        User::updateOrInsert(['id' => "3"], [
            "name" => "Test User Registrar",
            "email" => "registrar@email.com",
            "password" => bcrypt("password"),
            "role_id" => 3,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        User::updateOrInsert(['id' => "4"], [
            "name" => "Test User Admin",
            "email" => "admin@email.com",
            "password" => bcrypt("password"),
            "role_id" => 4,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        $this->call([
            CourseSeeder::class,
            InstructorSeeder::class,
            StudentSeeder::class,
            ChecklistSeeder::class,

        ]);
    }
}
