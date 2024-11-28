<?php

namespace App\Models\Roles;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;

    protected $fillable = [
        "student_number",
        "first_name",
        "last_name",
        "middle_name",
        "contact_number",
        "program_id",
        "classification",
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
