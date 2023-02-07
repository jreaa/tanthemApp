<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Estados extends Model
{
    use HasFactory;
    
    protected $fillable = ['id','name', 'color','description','colorFont'];

    public function scopeSearch($query, $term)
    {
        $term = "%$term%";

        $query->where(function ($query) use ($term) {
            $query->where('name', 'like', $term)
            ->orWhere('color', 'like', $term);
        });
    }
}
