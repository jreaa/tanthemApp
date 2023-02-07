<?php

namespace App\Models\Plantillas;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cotizaciones extends Model
{
    use HasFactory;
    protected $table = 'cotizaciones';
    protected $key = 'id';

    protected $fillables = [
        'name',
        'id_proyecto',
        'description',
        'fecha',
        'precio_costo'
    ];
}
