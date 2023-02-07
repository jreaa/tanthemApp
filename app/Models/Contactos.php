<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contactos extends Model
{

    protected $table = "contactos";

    protected $fillable = [
        'id',
        'name',
        'rut',
        'email',
        'telefono',
        'id_cliente'
    ];

    public function scopeSearch($query, $term)
    {
        $term = "%$term%";

        $query->where(function ($query) use ($term) {
            $query->where('contactos.name', 'like', $term)
            ->orWhere('contactos.rut', 'like', $term);
        });
    }
}
