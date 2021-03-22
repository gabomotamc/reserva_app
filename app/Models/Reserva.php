<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reserva extends Model
{
    use HasFactory;

    protected $table = 'reservas';
    public $timestamps = true;

    protected $fillable = [
        'id',
        'id_usuario',
        'disponibilidad',
        'fecha',
        'nro_sala',
        'nro_persona',
        'butaca',
        'created_at',
        'updated_at'
    ];  

    protected $casts = [
    'butaca' => 'array',
    ];

    protected $dates = ['fecha'];   
}
