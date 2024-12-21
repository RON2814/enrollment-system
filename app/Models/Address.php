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
<<<<<<< HEAD
        return $this->hasMany(Student::class);
=======
        return $this->hasOne(Student::class, 'address_id');
>>>>>>> 1cf045b (feat: add student filtering functionality in registrar routes, update models for relationships, and enhance migrations with new fields)
    }
}
