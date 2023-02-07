<?php

namespace App\Http\Controllers\Api\Graficos\Utils;

use App\Estados;
use App\Models\EstadosProyectos;
use DateTime;
use Illuminate\Support\Facades\DB;

class EstudioProyectoEstado 
{
    protected function sql_search($response) 
    {
        
        $estados = $this->get_estados();

        $valores = [];
        $valores2 = [];
        $fechas = [];
        $colores = [];

        
        if(!empty($response)){
            foreach ($response as $row) {
                

                $date = ($this->getFirstDayWeek($row->time_data, $row->year));

                $fechaFormated = $date["start"]."T00:30:00".".000Z";

                //$fechaFormated = $row->time_data."T00:30:00".".000Z";
                
                if(!in_array($fechaFormated, $fechas)){
                    array_push($fechas, $fechaFormated);
                }

                foreach ($estados as $value) {

                    if(!isset($valores[$value['name']])) {
                        $valores[$value['name']] = [];
                        $valores2[$value['name']] = [];
                        $colores[$value['name']] = [];
                    }

                    if($value->name == $row->estado) {
                        array_push($valores[$value['name']], $fechaFormated);
                        array_push($valores2[$value['name']], $row->total);

                        if(!in_array($row->color,$colores[$value['name']])) {
                            array_push($colores[$value['name']], $row->color);
                        }
                        
                    }
                }
            }

            //return $this->get_diff_fechas($fechas);
            

            $valoresOrderFecha = $this->order_data_fecha($fechas, $valores);

            $valoresReseted = $this->restar_data($valores2, sizeof($fechas));

            

            $valoresFinal = $this->order_data($valoresReseted, $valoresOrderFecha);
            
            $valoresFinal = $this->order_data_sum($valoresFinal);
            
            return [
                'valores' => $valoresFinal,
                'keys'    => array_keys($valoresFinal),
                'colores' => ($colores),
                'fechas'  => $fechas
            ];
        }

    }

   /* private function get_diff_fechas($array) 
    {
        $oldValue = '';
        for ($i=0; $i < sizeof($array); $i++) { 
            $diff = 
        }
    }*/
    private function getFirstDayWeek($week, $year)
    {
        $dt = new DateTime();
        $return['start'] = $dt->setISODate($year, $week)->format('Y-m-d');
        $return['end'] = $dt->modify('+6 days')->format('Y-m-d');
        return $return;
    }

    private function order_data_fecha($fechas, $valores)
    {  
        $nuevoValores = [];

        for ($i=0; $i < sizeof($fechas); $i++) { 

            foreach ($valores as $key => $value) {
                if(!isset($nuevoValores[$key])){
                    $nuevoValores[$key] = [];
                }

                if(in_array($fechas[$i], $value)) {
                    array_push($nuevoValores[$key], 1);
                } else {
                    array_push($nuevoValores[$key], 0);
                }
            }
        }

        return ($nuevoValores);
    }

    private function restar_data($array, $size) 
    {
        foreach ($array as $key => $value) {
            if(sizeof($value) != $size) {
                $diff = ($size - sizeof($value));
                for ($i=0; $i < $diff ; $i++) { 
                    array_push($array[$key], 0);
                }
            }
        }
        return $array;
    }

    private function order_data($valores2, $valoresOrderFecha) 
    {
        foreach ($valores2 as $key => $value) {
            $s = 0; 
            for ($i=0; $i <= sizeof($value); $i++) { //data by key
                for ($w=$s; $w < sizeof($valoresOrderFecha[$key]) ; $w++) { //position by key
                    if($valoresOrderFecha[$key][$w] == 1) {
                        $valoresOrderFecha[$key][$w] = $value[$i];
                        $s = $w+1;
                        break;
                    }
                }

            }
        }
        return($valoresOrderFecha);
   }
   
   private function order_data_sum($array) 
   {
       foreach($array as $key => $values){
           $valueBefore = 0;
           for($i=0; $i<sizeof($values);$i++) {
               $array[$key][$i] += $valueBefore;
               $valueBefore = $array[$key][$i];
           }
           
            $array[$key] = array_reverse($array[$key]);
       }
        return $array;    
   }

    private function get_estados()
    {
        $estados = EstadosProyectos::all();
        return $estados;
    }
}