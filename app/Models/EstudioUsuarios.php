<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EstudioUsuarios extends Model
{
    use HasFactory;

    protected $table = "estudio_usuarios";
    protected $key = "id";

    protected $fillable = [
        "id",
        "id_user",
        "modificacion",
        "created_at",
        "updated_at"
    ];
}
