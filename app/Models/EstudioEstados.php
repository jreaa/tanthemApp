<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EstudioEstados extends Model
{
    protected $fillable = [
        'id',
        'id_estado',
        'id_cliente',
        'date'
    ];

    protected $table = "estudio_estados";
    protected $key = "id";
}
