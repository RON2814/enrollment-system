<?php

namespace App\Models\Checklist;

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
}
