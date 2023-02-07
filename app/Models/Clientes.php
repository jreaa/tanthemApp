<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Clientes extends Model
{
    use HasFactory;

    protected $fillable = ['rut',
    'estado', 
    'rubro_id',
    'comentarios',
    'email', 
    'name', 
    'primary_phone', 
    'secondary_phone', 
    'category',
    'website', 
    'address', 
    'contact_name', 
    'type',
    'pais',
    'region_id', 
    'comuna_id'];

    public function scopeSearch($query, $term)
    {
        $term = "%$term%";

        $query->where(function ($query) use ($term) {
            $query->where('clientes.name', 'like', $term)
            ->orWhere('clientes.rut', 'like', $term)
            ->orWhere('clientes.email', 'like', $term)
            ->orWhere('clientes.contact_name', 'like', $term)
            ->orWhere('clientes.primary_phone', 'like', $term);
        });
    }
}
