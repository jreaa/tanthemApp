<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Costeo extends Model
{
    use HasFactory;
    protected $table = "costeo";
    protected $key = "id";

    protected $fillable = [
        'id',
        'name',	
        'description',
        'date',
        'status',
        'value',
        'id_proyecto',
        'id_leaf',
        'pendiente'
    ];

    public function scopeSearch($query, $term)
    {
        $term = "%$term%";

        $query->where(function ($query) use ($term) {
            $query->where('costeo.name', 'like', $term)
            ->orWhere('costeo.description', 'like', $term);
        });
    }
}
