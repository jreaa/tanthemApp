<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Productos extends Model
{
    use HasFactory;
    protected $table = 'productos';
    protected $key = 'id';
    protected $fillable = [
        'id',
        'cod',
        'description',
        'precio',
        'stock',
        'uf',
        'comentarios',
        'tipo'
    ];

    public function scopeSearch($query, $term)
    {
        $term = "%$term%";

        $query->where(function ($query) use ($term) {
            $query->where('productos.cod', 'like', $term)
            ->orWhere('productos.description', 'like', $term);
        });
    }

}
