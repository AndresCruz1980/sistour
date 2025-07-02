<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Miembro extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'licencia',
        'numero',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
