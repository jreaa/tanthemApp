<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cabeceras extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'img',
        'titulo',
        'subtitulo',
        'description'
    ];

    protected $table = "cabeceras";

    protected $key = "id";
}
