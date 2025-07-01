<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Servicio\Vagoneta;

class Dispatch extends Model
{
    use HasFactory;

    protected $fillable = [
        'authorization_id',
        'vagoneta_id',
        'litros_asignado',
        'litros_cargado',
        'numero_factura',
        'estatus',
    ];

    protected $table = 'dispatchs';

    public function authorization()
    {
        return $this->belongsTo(Authorization::class);
    }

    public function vagoneta()
    {
        return $this->belongsTo(Vagoneta::class);
    }
}
