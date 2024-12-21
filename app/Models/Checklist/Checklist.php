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
<<<<<<< HEAD
        return $this->belongsTo(Student::class, 'student_number', 'student_number');
    }

    /**
     * Relationship with the Course model.
     */
    public function course()
    {
        return $this->belongsTo(Course::class, 'course_code', 'course_code');
    }

    /**
     * Relationship with the Instructor model.
     */
=======
        return $this->belongsTo(Student::class, 'student_number');
    }

    public function course()
    {
        return $this->belongsTo(Course::class, 'course_code');
    }

>>>>>>> 1cf045b (feat: add student filtering functionality in registrar routes, update models for relationships, and enhance migrations with new fields)
    public function instructor()
    {
        return $this->belongsTo(Instructor::class, 'instructor_id');
    }
}
