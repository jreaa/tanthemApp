<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductosAsoc extends Model
{
    use HasFactory;
    protected $table = 'productos_asoc';
    protected $key = 'id';
    protected $fillable = [
        'id',
        'id_producto',
        'id_cotizacion',
        'cantidad',
        'precio_asoc'
    ];

}
