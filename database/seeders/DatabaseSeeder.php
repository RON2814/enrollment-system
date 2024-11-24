<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\Roles\Admin;
use App\Models\Roles\Department;
use App\Models\Roles\Student;
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

        Role::create(["id" => 1, "name" => "Student"]);
        Role::create(["id" => 2, "name" => "Department"]);
        Role::create(["id" => 3, "name" => "Registrar"]);
        Role::create(["id" => 4, "name" => "Admin"]);

        User::factory()->create([
            "id" => 1,
            'name' => 'Test User Student',
            'email' => 'test@example.com',
            'password' => bcrypt('password'),
            'role_id' => 1,
        ]);

        User::factory()->create([
            "id" => 2,
            'name' => 'Test User Department',
            'email' => 'test@example.com',
            'password' => bcrypt('password'),
            'role_id' => 2,
        ]);

        User::factory()->create([
            "id" => 3,
            'name' => 'Test User Registrar',
            'email' => "test@examil.com",
            "password" => bcrypt("password"),
            "role_id" => 4,
        ]);

        Student::factory()->create([
            "id" => 1,
            "user_id" => 1,
            "first_name" => "Test",
            "last_name" => "User",
            "middle_name" => "Student",
            "contact_number" => "09123456789",
        ]);

        Department::factory()->create([
            "id" => 1,
            "user_id" => 2,
            "first_name" => "Test",
            "last_name" => "User",
            "middle_name" => "Department",
            "contact_number" => "09123456789",
        ]);

        Admin::factory()->create([
            "id" => 1,
            "user_id" => 3,
            "first_name" => "Test",
            "last_name" => "User",
            "middle_name" => "Admin",
            "contact_number" => "09123456789",
        ]);
    }
}
