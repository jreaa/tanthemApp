<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProcesoCostos extends Model
{
    use HasFactory;

    protected $table = "procesos_costos";
    protected $key = "id";
}
