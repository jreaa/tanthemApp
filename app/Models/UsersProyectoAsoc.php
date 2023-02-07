<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UsersProyectoAsoc extends Model
{
    protected $fillable = [
        'id_proyecto',
        'id_user',
    ];
    protected $table = "users_asoc";
    protected $key = "id";

    public function scopeSearch($query, $term)
    {
        $term = "%$term%";

        $query->where(function ($query) use ($term) {
            $query->where('proyectos.name', 'like', $term)
            ->orWhere('proyectos.description', 'like', $term);
        });
    }
}
