<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Propietario extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'nombre',
        'apellido',
        'cedula',
        'licencia',
        'numero',
        'correo',
        'celular',
        'cuenta',
        'bancos_id',
        'referencia',
        'celref',
        'observaciones',
        'file',
        'estatus'
    ];

    protected $table = 'propietarios';

    public function banco() {
        return $this->belongsTo('App\Models\Configuracion\Banco', 'bancos_id', 'id');
    }
}
