<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @method static create(array $array)
 */
class Employees extends Model
{
    use HasFactory;

    protected $fillable = [
        'speciality', 'specialization', 'id_op', 'nasva'
    ];
}
