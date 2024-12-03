<?php

namespace Database\Seeders;

use App\Models\Checklist\course;
use App\Models\Program;
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

        Role::create(["id" => 1, "title" => "Student"]);
        Role::create(["id" => 2, "title" => "Department"]);
        Role::create(["id" => 3, "title" => "Registrar"]);
        Role::create(["id" => 4, "title" => "Admin"]);

        Program::create(["id" => 1, "title" => "BSCS", "description" => "Bachelor of Science in Computer Science", 'department' => 'DCS']);
        Program::create(["id" => 2, "title" => "BSIT", "description" => "Bachelor of Science in Information Technology", 'department' => 'DCS']);

        User::create([
            "id" => "1",
            "name" => "Test User Student",
            "email" => "student@email.com",
            "password" => bcrypt("password"),
            "role_id" => 1,
        ]);

        User::create([
            "id" => "2",
            'name' => 'Test User Department',
            'email' => 'department@email.com',
            'password' => bcrypt('password'),
            'role_id' => 2,
        ]);

        User::create([
            "id" => "3",
            'name' => 'Test User Registrar',
            'email' => "registrar@email.com",
            "password" => bcrypt("password"),
            "role_id" => 3,
        ]);

        User::create([
            "id" => "4",
            'name' => 'Test User Admin',
            'email' => "admin@email.com",
            "password" => bcrypt("password"),
            "role_id" => 4,
        ]);

    }
}
