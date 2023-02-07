<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Liquidacion extends Model
{
    use HasFactory;

    protected $table = "liquidaciones";
    protected $key = "id";

    protected $fillable = [
        'id',
        'description',
        'fecha',
        'id_body',
        'id_trabajador'
    ];

    
    public function scopeSearch($query, $term)
    {
        $term = "%$term%";

        $query->where(function ($query) use ($term) {
            $query->where('liquidaciones.description', 'like', $term);
        });
    }
}
