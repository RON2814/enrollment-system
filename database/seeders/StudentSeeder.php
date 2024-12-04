<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class StudentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Insert addresses
        DB::table('addresses')->insert([
            [
                'id' => 1,
                'house_number' => 'Blk 12 Lt 6',
                'street' => 'Sampaguita',
                'barangay' => 'Queens Row West',
                'city' => 'Bacoor',
                'province' => 'Cavite',
                'zip_code' => '4102',
            ],
            [
                'id' => 2,
                'house_number' => 'Blk 8 Lot 7',
                'street' => 'Side Street',
                'barangay' => 'Zapote',
                'city' => 'Bacoor',
                'province' => 'Cavite',
                'zip_code' => '4102',
            ],
            [
                'id' => 3,
                'house_number' => 'Blk 22 Lot 31',
                'street' => 'F. Roxas St.',
                'barangay' => 'Molino IV',
                'city' => 'Bacoor',
                'province' => 'Cavite',
                'zip_code' => '4102',
            ],
        ]);

        // Create users
        DB::table('users')->insert([
            [
                'id' => '202211717',
                'name' => 'Rances Cuizon',
                'email' => 'bc.rances.cuizon@cvsu.edu.ph',
                'email_verified_at' => now(),
                'password' => Hash::make('password123'),
                'role_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => '202211781',
                'name' => 'John Aaron Apayong',
                'email' => 'bc.jane.smithn@cvsu.edu.ph',
                'email_verified_at' => now(),
                'password' => Hash::make('password123'),
                'role_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => '202211711',
                'name' => 'Mikaela Anne Cortes',
                'email' => 'mikaelannevistrocortes@gmail.com',
                'email_verified_at' => now(),
                'password' => Hash::make('password123'),
                'role_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);

        // Create students
        DB::table('students')->insert([
            [
                'student_number' => '202211717',
                'last_name' => 'Cuizon',
                'first_name' => 'Rances',
                'middle_name' => 'Sabate',
                'extension_name' => null,
                'contact_number' => '09664471234',
                'birthday' => '2003-08-24',
                'sex' => 'male',
                'program_id' => 1, 
                'classification' => 'regular',
                'address_id' => 1, // Example address ID
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'student_number' => '202211781',
                'last_name' => 'Apayong',
                'first_name' => 'John Aaron',
                'middle_name' => 'Santos',
                'extension_name' => null,
                'contact_number' => '0987654321',
                'birthday' => '2002-05-15',
                'sex' => 'female',
                'program_id' => 1,
                'classification' => 'regular',
                'address_id' => 2,
                'created_at' => now(),
                'updated_at' => now(),
            ],

            [
                'student_number' => '202211711',
                'last_name' => 'Cortes',
                'first_name' => 'Mikaela Anne',
                'middle_name' => 'Vistro',
                'extension_name' => null,
                'contact_number' => '09165610614',
                'birthday' => '2004-09-15',
                'sex' => 'female',
                'program_id' => 1, 
                'classification' => 'regular',
                'address_id' => 1, 
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);

        // Insert checklists data
        // DB::table('checklists')->insert([
        //     [
        //         'student_number' => '202211717',
        //         'course_code' => 'GNED 02',
        //         'grade' => '1.00',
        //         'instructor_id' => 1, 
        //         'year' => 'First Year',
        //         'semester' => 'First Semester',
        //     ],
        //     [
        //         'student_number' => '202211717', 
        //         'course_code' => 'GNED 02',
        //         'grade' => '1.25',
        //         'instructor_id' => 2,
        //         'year' => 'First Year',
        //         'semester' => 'First Semester',
        //     ],
        //     [
        //         'student_number' => '202211781',
        //         'course_code' => 'GNED 02',
        //         'grade' => '1.50',
        //         'instructor_id' => 1,
        //         'year' => 'Second Year',
        //         'semester' => 'Second Semester',
        //     ],
        //     [
        //         'student_number' => '202211781',
        //         'course_code' => 'GNED 02',
        //         'grade' => '1.75',
        //         'instructor_id' => 2,
        //         'year' => 'Second Year',
        //         'semester' => 'Second Semester',
        //     ],
        // ]);
    }
}
