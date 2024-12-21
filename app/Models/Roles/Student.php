<?php

namespace App\Models\Roles;

use App\Models\Address;
use App\Models\Checklist\Checklist;
use App\Models\Program;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;
    protected $primaryKey = 'student_number';
    protected $keyType = 'string';
    public $incrementing = false;

    protected $fillable = [
        'student_number',
        'last_name',
        'first_name',
        'middle_name',
        "extension_name",
        'contact_number',
        "birthday",
        "sex",
        'program_id',
        'classification',
        'address_id',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'student_number', 'id');
    }

    public function address()
    {
        return $this->belongsTo(Address::class);
    }
    public function program()
    {
        return $this->belongsTo(Program::class);
    }

    public function checklist()
    {
        return $this->hasMany(Checklist::class, 'student_number', 'student_number');
    }
}