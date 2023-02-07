<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CotizacionBody extends Model
{
    use HasFactory;
    protected $table = 'cotizaciones_body';
    protected $key = 'id';
    protected $fillable = [
        'id',
        'bodyCotizaciones',
    ];
}
