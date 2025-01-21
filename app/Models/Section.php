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

        return $this->program->title . " " . ($yearMapping[$this->year_level] ?? 'Unknown') . "-" . $this->section;
    }
}
