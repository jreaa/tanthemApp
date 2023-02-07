<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Seguimiento extends Model
{
    use HasFactory;

    protected $fillable = ['id','contact', 'action', 'comment', 'date', 'client_id', 'prox_agendamiento'];

    public function scopeSearch($query, $term)
    {
        $term = "%$term%";

        $query->where(function ($query) use ($term) {
            $query->where('contact', 'like', $term)
            ->orWhere('action', 'like', $term);
        });
    }
}
