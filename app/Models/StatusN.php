<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StatusN extends Model
{
    protected $table = "table_status_n";
    protected $key = "id";

    protected $fillable = [
        'id',
        'table',
        'n1',
        'n2',
        'n3',
        'n4',
        'n1Value',
        'n2Value',
        'n3Value',
        'n4Value',
    ];
    use HasFactory;
}
