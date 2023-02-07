<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class GraficoClientesController extends Controller
{
    public function orderData($consulta)
    {
        $fecha = [];
        $estados = [];
        $array = [];

        foreach($consulta as $c){


            if(in_array($c->estado, $estados) == false){
                array_push($estados, $c->estado);
            }
            if(in_array($c->fecha_ingreso, $fecha) == false){
                array_push($fecha, $c->fecha_ingreso);
            }
            $value = [
                'name' => $c->estado,
                'value' => $c->n_clientes,
                'fecha' => $c->fecha_ingreso
            ];
            array_push($array, $value);
        }  

        $estadosColor = $this->estadosColor($estados);

        $estadosName = $this->estadosName($estados);

        $qTable = $this->getPorcentajes($estados,true);

        $qporcentajeTable = $this->getPorcentajes($estados, false);

        $values = $this->orderEstados($estados, $fecha);

        return [
            'estadosNames' => $estadosName,
            'estadosColor' => $estadosColor,
            'qTable'       => $qTable,
            'qporcentaje'  => $qporcentajeTable,
            'fechas' => $fecha,
            'values' => $values
        ];
    }

    public function getVal($fecha, $estados, $i, $totales){
        $val = [];

        for($w=0; $w<sizeof($fecha);$w++){
            $con= DB::select("select count(c.id) as 'values' from estudio_clientes c 
            WHERE c.estado = ".$estados[$i]." and DATE_FORMAT(c.created_at,'%Y-%m-%d') = '".$fecha[$w]."';");
            $t = (int) $totales[$w];
            $v = (int) $con[0]->values;
            $valoPush = number_format(($v*100)/$t, 1);
            
            array_push($val,$valoPush); 

        }
        return $val;
    }

    public function orderEstados($estados, $fecha) 
    {
        $values = [];

        $totales = $this->getTotal();

        for($i=0;$i<sizeof($estados);$i++){
            array_push($values, $this->getVal($fecha, $estados, $i, $totales));
        }
        return $values;
    }

    public function estadosColor($estados)
    {
        $estadosColor = [];
        for($i=0; $i<sizeof($estados);$i++){
            $con= DB::select("select e.color as 'color' from estados e WHERE e.id = ".$estados[$i]);
            //$con = $mbd->query($sql);
            foreach($con as $c){
                array_push($estadosColor, $c->color);
            }
        }

        return $estadosColor;
    }

    public function estadosName($estados)
    {
        $estadosName = [];
        for($i=0; $i<sizeof($estados);$i++){
            $con= DB::select("select e.name as 'name' from estados e WHERE e.id = ".$estados[$i]);
            //$con = $mbd->query($sql);
            foreach($con as $c){
                array_push($estadosName, $c->name);
            }
        }
        return $estadosName;
    }


    public function getPorcentajes($estados,$bandera) 
    {
        $q = $this->getQ();
        $qTable = [];
        $qporcentajeTable = [];
        $fechatoday = date('Y-m-d');
        for($i=0; $i<sizeof($estados);$i++){
            $con= DB::select("SELECT COUNT(c.id) as 'q' from estudio_clientes c WHERE c.estado = ".$estados[$i]." AND DATE_FORMAT(created_at, '%Y-%m-%d') = '$fechatoday'");
            //$con = $mbd->query($sql);
            foreach($con as $c){
                $v = (int) $c->q;
                $valoPush = number_format(($v*100)/$q, 1);
    
                array_push($qTable, $c->q);
                array_push($qporcentajeTable, $valoPush);
            }
        }

        if($bandera){
            return $qTable;
        }

        return $qporcentajeTable;
    }

    public function getTotal()
    {
        $f = date("Y-m-d");
        $lastday = date("Y-m-d", strtotime("$f   -30 day"));

        $consulta2 = DB::select("SELECT count(c.id) as 'total', DATE_FORMAT(c.created_at, '%Y-%m-%d') 
        as 'fechas' from estudio_clientes c where DATE_FORMAT(c.created_at, '%Y-%m-%d') BETWEEN '$lastday' and '$f' group by DATE_FORMAT(c.created_at, '%Y-%m-%d') ORDER by c.created_at;");
        $totales = [];
        foreach($consulta2 as $c){
            array_push($totales, $c->total);
        }

        return $totales;
    }

    public function getQ()
    {
        $fechatoday = date('Y-m-d');
        $consulta3 = DB::select("SELECT COUNT(c.id) as 'Q' FROM estudio_clientes c WHERE DATE_FORMAT(c.created_at, '%Y-%m-%d') = '$fechatoday'");


        foreach($consulta3 as $c){
            $q = $c->Q;
        }

        return $q;
    }   

    public function index(){
        
        $f = date("Y-m-d");
        $lastday = date("Y-m-d", strtotime("$f   -30 day"));

        $consulta = DB::select("SELECT e.id as 'estado', count(c.id) as 'n_clientes', DATE_FORMAT(c.created_at, '%Y-%m-%d') as 'fecha_ingreso' 
        FROM `estudio_clientes` c
        inner join estados e on e.id = c.estado
        where DATE_FORMAT(c.created_at, '%Y-%m-%d') BETWEEN '$lastday' and '$f'
        group by e.id, DATE_FORMAT(c.created_at,'%Y-%m-%d')
        ORDER by c.created_at");

        return $this->orderData($consulta);

    }
}
