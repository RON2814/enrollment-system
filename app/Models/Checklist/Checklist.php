<?php

namespace App\Models\Checklist;

use App\Models\Roles\Student;
use Illuminate\Database\Eloquent\Model;

class Checklist extends Model
{
    protected $table = "checklists";
    public $incrementing = false;

    protected $fillable = [
        "student_number",
        "course_code",
        "grade",
        "instructor_id",
        "year",
        "semester",
    ];

    public function student()
    {
        return $this->belongsTo(Student::class, 'student_number', 'student_number');
    }

    public function course()
    {
        return $this->belongsTo(Course::class, 'course_code', 'course_code');
    }

    public function instructor()
    {
        return $this->belongsTo(Instructor::class, 'instructor_id');
    }
}
