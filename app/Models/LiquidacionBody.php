<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LiquidacionBody extends Model
{
    use HasFactory;

    protected $table = "liquidacion_body";

    protected $key = "id";

    protected $fillable = [
        'id',
        'bodyCotizaciones',
    ];
}
