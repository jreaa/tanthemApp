<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    use HasFactory;
    protected $table = "productos";
    protected $key = "id";

    protected $fillable = [
        "id",
        "id_usuario",
        "p1",
        "carac",
        "costo",
        "pv",
        "n1",
        "n2",
        "n3",
        "n4",
    ];

    public function scopeSearch($query, $term)
    {
        $term = "%$term%";

        $query->where(function ($query) use ($term) {
            $query->where('p1', 'like', $term)
            ->orWhere('carac', 'like', $term)
            ->orWhere('costo', 'like', $term)
            ->orWhere('pv', 'like', $term);
        });
    }

}
