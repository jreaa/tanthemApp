<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TipoCostos extends Model
{
    use HasFactory;

    protected $table ='tipos_costos';
    protected $key = 'id';

    protected $fillable = ['id','name', 'color','description', 'colorFont'];

    public function scopeSearch($query, $term)
    {
        $term = "%$term%";

        $query->where(function ($query) use ($term) {
            $query->where('name', 'like', $term)
            ->orWhere('color', 'like', $term);
        });
    }
}
