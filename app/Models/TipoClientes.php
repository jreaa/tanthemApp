<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TipoClientes extends Model
{
    use HasFactory;

    protected $fillable = ['id','name', 'description'];

    public function scopeSearch($query, $term)
    {
        $term = "%$term%";

        $query->where(function ($query) use ($term) {
            $query->where('name', 'like', $term)
            ->orWhere('description', 'like', $term);
        });
    }
}
