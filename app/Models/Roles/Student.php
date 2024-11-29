<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;

    protected $fillable = [
        'student_number',
        'last_name',
        'first_name',
        'middle_name',
        'contact_number',
        'program_id',
        'classification',
        'address_id',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }


    public function program()
    {
        return $this->belongsTo(Program::class, 'program_id');
    }

    public function address()
    {
        return $this->belongsTo(Address::class, 'address_id');
    }
}
