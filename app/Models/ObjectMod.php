<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ObjectMod extends Model
{
    use HasFactory;

    protected $fillable = [
        'speciality', 'specialization', 'idop', 'nasva'
    ];
}
