<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Butaca extends Model
{
    use HasFactory;

    protected $table = 'butacas';
    public $timestamps = true;

    protected $fillable = [
        'id',
        'sala',
        'estado',
        'asiento',
        'fila',
        'columna',
        'created_at',
        'updated_at'
    ];    

}
