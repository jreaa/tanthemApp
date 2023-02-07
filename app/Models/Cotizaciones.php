<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cotizaciones extends Model
{
    use HasFactory;
    protected $table = 'cotizaciones';
    protected $key = 'id';
    protected $fillable = [
        'id',
        'id_body',
        'description',
        'fecha',
        'n_interno',
        'id_cliente',
        'id_contacto',
        'id_estado',
        'monto',
        'responsable',
        'correo',
        'unidad'
    ];

    public function scopeSearch($query, $term)
    {
        $term = "%$term%";

        $query->where(function ($query) use ($term) {
            $query->where('cotizaciones.description', 'like', $term);
        });
    }
}
