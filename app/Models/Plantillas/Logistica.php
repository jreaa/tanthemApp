<?php

namespace App\Models\Plantillas;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Logistica extends Model
{
    use HasFactory;
    protected $table = 'logistica';
    protected $key = 'id';

    protected $fillables = [
        'name',
        'description',
        'fecha',
        'precio_costo'
    ];
}
