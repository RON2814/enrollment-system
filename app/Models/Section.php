<?php

namespace App\Models;

use App\Models\Checklist\Enrollment;
use App\Models\Checklist\Instructor;
use App\Models\Roles\Student;
use Illuminate\Database\Eloquent\Model;

class Section extends Model
{
    protected $fillable = [
        "student_number",
        "section",
        "program_id",
        "current_student_enrolled",
        "max_capacity",
    ];

    public function program()
    {
        return $this->belongsTo(Program::class, "program_id", "id");
    }

    public function enrollment()
    {
        return $this->hasOne(Enrollment::class, "section_id", "id");
    }



    public function fullSectionName()
    {
        $yearMapping = [
            'First Year' => 1,
            'Second Year' => 2,
            'Third Year' => 3,
            'Fourth Year' => 4,
        ];
    
        // Get the latest enrollment and use its year_level
        $latestEnrollment = $this->enrollment()->latest()->first();
    
        // If there's a latest enrollment, use its year_level; otherwise, default to 'Unknown'
        $yearLevel = $latestEnrollment ? $latestEnrollment->year_level : 'Unknown';
    
        // Ensure the year_level value is valid
        if (!array_key_exists($yearLevel, $yearMapping)) {
            // Default to 'Unknown Year' if the year_level is invalid
            $yearLevelNumeric = 'Unknown Year';
        } else {
            // Map the year level to numeric value
            $yearLevelNumeric = $yearMapping[$yearLevel];
        }
    
        // Ensure the section exists before accessing it
        $sectionName = $this->section ? $this->section : 'Unknown Section';
    
        return $sectionName;
    }
    
}
