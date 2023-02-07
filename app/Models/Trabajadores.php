<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Trabajadores extends Model
{
    use HasFactory;
    protected $table = "trabajadores";
    protected $key = "id";

    protected $fillable = [
        'id',
        'name',
        'email',
        'phone',
        'rut',
        'fecha_nacimiento',
        'direccion'
    ];

    public function scopeSearch($query, $term)
    {
        $term = "%$term%";

        $query->where(function ($query) use ($term) {
            $query->where('trabajadores.name', 'like', $term)
            ->orWhere('trabajadores.rut', 'like', $term)
            ->orWhere('trabajadores.email', 'like', $term);
        });
    }
}
