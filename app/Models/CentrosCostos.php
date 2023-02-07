<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CentrosCostos extends Model
{
    use HasFactory;

    protected $key = "id";
    protected $table = "centro_costos";

    protected $fillable = ['id','name', 'color','description','colorFont', 'id_proceso'];

    public function scopeSearch($query, $term)
    {
        $term = "%$term%";

        $query->where(function ($query) use ($term) {
            $query->where('name', 'like', $term)
            ->orWhere('color', 'like', $term);
        });
    }
}
