<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubProcesoCostos extends Model
{
    use HasFactory;

    protected $key = "id";
    protected $table = "sub_procesos_costos";

    protected $fillable = [
        'id',
        'id_proceso_costos',
        'name',
        'color',
        'colorFont',
        'description',
        'id_proyecto'
    ];
}
