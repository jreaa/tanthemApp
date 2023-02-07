<?php

namespace App\Models\Plantillas;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Otros extends Model
{
    use HasFactory;
    protected $table = 'otros';
    protected $key = 'id';

    protected $fillables = [
        'name',
        'id_proyecto',
        'description',
        'fecha',
        'precio_costo'
    ];
}
