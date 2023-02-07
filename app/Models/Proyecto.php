<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Proyecto extends Model
{
    use HasFactory;

    protected $table = 'proyectos';

    protected $key = 'id';

    protected $fillable = [
        'name',
        'description',
        'estado',
        'proyecto',
        'costo',
        'costo_iva',
        'ganancias',
        'fecha_inicio',
        'usersSelectedAll',
        'correo',
        'telefono',
        'direccion',
         
    ];

    public function scopeSearch($query, $term)
    {
        $term = "%$term%";

        $query->where(function ($query) use ($term) {
            $query->where('proyectos.name', 'like', $term)
            ->orWhere('proyectos.description', 'like', $term);
        });
    }
}
