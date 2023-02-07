<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tree extends Model
{
    use HasFactory;
    protected $table = "tree_list_costeo";
    protected $key = "id";

    protected $fillable = [ 
        'id',
        'body',
        'id_proyecto',
        'id_costo'
    ];
}
