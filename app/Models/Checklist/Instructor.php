<?php

namespace App\Models\Checklist;

use Illuminate\Database\Eloquent\Model;

class Instructor extends Model
{
    protected $fillable = [
        "last_name",
        "first_name",
        "middle_name",
    ];
}
