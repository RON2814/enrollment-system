<?php

namespace Database\Seeders;

use App\Models\Checklist\Instructor;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class InstructorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('instructors')->updateOrInsert(
            ['email' => 'bc.edan.belgica@cvsu.edu.ph'], 
            [
                'first_name' => 'Edan',
                'middle_name' => 'Doe',
                'last_name' => 'Belgica',
                'extention_name' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ]
        );
        DB::table('instructors')->updateOrInsert(
            ['email' => 'bc.jessica.sambrano@cvsu.edu.ph'],
            [
                'first_name' => 'Jessica',
                'middle_name' => 'Bautista',
                'last_name' => 'Sambrano',
                'extention_name' => null, 
                'created_at' => now(),
                'updated_at' => now(),
            ]
        );
        
        
    }
}
