<?php

namespace Database\Seeders;

use App\Models\Checklist\Instructor;
use Illuminate\Database\Seeder;

class InstructorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Instructor::create([
            'first_name' => 'Edan',
            'middle_name' => 'Doe',
            'last_name' => 'Belgiva',
            'extention_name' => null,
            'email' => 'bc.edan.belgica@cvsu.edu.ph',
        ]);
        Instructor::create([
            'first_name' => 'Jessica',
            'middle_name' => 'Bautista',
            'last_name' => 'Sambrano',
            'extention_name' => null,
            'email' => 'bc.jessica.sambrano@cvsu.edu.ph',
        ]);

        Instructor::create([
            'first_name' => 'Kim',
            'middle_name' => 'Seventeen',
            'last_name' => 'Mingyu',
            'extention_name' => null,
            'email' => 'bc.kim.mingyu@cvsu.edu.ph',
        ]);

        Instructor::create([
            'first_name' => 'Wonwoo',
            'middle_name' => 'Seventeen',
            'last_name' => 'Jeon',
            'extention_name' => null,
            'email' => 'bc.jeon.wonu@cvsu.edu.ph',
        ]);
    }
}
