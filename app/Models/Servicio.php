<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Servicio extends Model
{
    use HasFactory;
    protected $table = "servicios";
    protected $key = "id";

    protected $fillable = [
        "id",
        "id_usuario",
        "servicios",
        "carac",
        "costo",
        "tipo",
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
            $query->where('servicios', 'like', $term)
            ->orWhere('carac', 'like', $term)
            ->orWhere('costo', 'like', $term)
            ->orWhere('pv', 'like', $term);
        });
    }
}
