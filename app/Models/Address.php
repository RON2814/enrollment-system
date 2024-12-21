<?php

namespace App\Models;

use App\Models\Roles\Student;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    use HasFactory;

    protected $fillable = [
        'address',
        'barangay',
        'city',
        'province',
        'zip_code',
    ];

    public function students()
    {
        return $this->hasMany(Student::class);
    }
}
