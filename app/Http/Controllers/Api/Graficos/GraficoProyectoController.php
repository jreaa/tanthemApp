<?php

namespace App\Http\Controllers\Api\Graficos;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use App\Http\Controllers\Api\Graficos\Utils\EstudioProyectoEstado;

class GraficoProyectoController extends EstudioProyectoEstado
{

    private $dateBegin;
    private $dateEnd;

    public function __construct()
    {
        $this->dateEnd = date("Y-m-d");
        $this->dateBegin   = date("Y-m-d", strtotime($this->dateBegin." -60 day"));
    }
    
    public function get_data() 
    {
        $sql = "SELECT year(ee.fecha) as 'year',week(ee.fecha) as 'time_data',count(id_estado) as 'total', id_estado, e.name as 'estado', e.color as 'color', e.colorFont as 'color_font' 
        FROM `cotizaciones` ee
        INNER JOIN estados_proyectos e on e.id = ee.id_estado
        WHERE ee.fecha BETWEEN '".$this->dateBegin."' AND '".$this->dateEnd."' 
        GROUP BY ee.id_estado, week(ee.fecha) ORDER BY week(ee.fecha) desc";

        $estudio_estado = DB::select($sql);
        return $this->sql_search($estudio_estado);
    }
}
