<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Authorization extends Model
{
    use HasFactory;

    protected $fillable = [
        'orden',
        'fecha',
        'litros',
        'estatus'
    ];

    protected $table = 'authorizations';
}
