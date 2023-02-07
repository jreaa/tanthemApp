<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\EstudioUsuariosResource;
use App\Models\EstudioUsuarios;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;

class EstudioUsuariosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $id = request("id");

        $array = [];
        $day1 = [];
        $day2 = [];
        $day3 = [];
        $day4 = [];
        $day5 = [];
        $day6 = [];
        $day7 = [];
        $day8 = [];
        $day9 = [];
        $day10 = [];
        $day11 = [];
        $day12 = [];
        $day13 = [];
        $day14 = [];
        $day15 = [];
        $day16 = [];
        $day17 = [];
        $day18 = [];
        $day19 = [];
        $day20 = [];
        $day21 = [];
        $day22 = [];
        $day23 = [];
        $fechas= [];
        for ($i=0; $i < 23; $i++) { 
            for ($w=1; $w < 32 ; $w++) { 
                if($i < 10){
                    $n = '0'.$i;
                }else {
                    $n = $i;
                }
                if($i < 9 ){
                    $d = '0'.($n+1);
                }
                else{
                    $d = $n+1;
                }
                $sql = "SELECT  count(id) as 'total'
                FROM    estudio_usuarios
                where id_user = $id and (time(created_at) BETWEEN '$n:00:00' and '$d:00:00') and DATE_FORMAT(created_at, '%Y-%m-%d') = CURDATE() - INTERVAL $w DAY";

                $data = DB::select($sql);

                if($d == '01') {
                    array_push($day1 ,$data[0]->total);
                }else if($d == '02') {
                    array_push($day2 ,$data[0]->total);
                }else if($d == '03') {
                    array_push($day3 ,$data[0]->total);
                }else if($d == '04') {
                    array_push($day4 ,$data[0]->total);
                }else if($d == '05') {
                    array_push($day5 ,$data[0]->total);
                }else if($d == '06') {
                    array_push($day6 ,$data[0]->total);
                }else if($d == '07') {
                    array_push($day7 ,$data[0]->total);
                }else if($d == '08') {
                    array_push($day8 ,$data[0]->total);
                }else if($d == '09') {
                    array_push($day9 ,$data[0]->total);
                }else if($d == '10') {
                    array_push($day10 ,$data[0]->total);
                }else if($d == '11') {
                    array_push($day11 ,$data[0]->total);
                }else if($d == '12') {
                    array_push($day12 ,$data[0]->total);
                }else if($d == '13') {
                    array_push($day13 ,$data[0]->total);
                }else if($d == '14') {
                    array_push($day14 ,$data[0]->total);
                }else if($d == '15') {
                    array_push($day15 ,$data[0]->total);
                }else if($d == '16') {
                    array_push($day16 ,$data[0]->total);
                }else if($d == '17') {
                    array_push($day17 ,$data[0]->total);
                }else if($d == '18') {
                    array_push($day18 ,$data[0]->total);
                }else if($d == '19') {
                    array_push($day19 ,$data[0]->total);
                }else if($d == '20') {
                    array_push($day20 ,$data[0]->total);
                }else if($d == '21') {
                    array_push($day21 ,$data[0]->total);
                }else if($d == '22') {
                    array_push($day22 ,$data[0]->total);
                }else if($d == '23') {
                    array_push($day23 ,$data[0]->total);
                }
            }
        }
        return [
            'hora1' => array_reverse($day1),
            'hora2' => array_reverse($day2),
            'hora3' => array_reverse($day3),
            'hora4' => array_reverse($day4),
            'hora5' => array_reverse($day5),
            'hora6' => array_reverse($day6),
            'hora7' => array_reverse($day7),
            'hora8' => array_reverse($day8),
            'hora9' => array_reverse($day9),
            'hora10' => array_reverse($day10),
            'hora11' => array_reverse($day11),
            'hora12' => array_reverse($day12),
            'hora13' => array_reverse($day13),
            'hora14' => array_reverse($day14),
            'hora15' => array_reverse($day15),
            'hora16' => array_reverse($day16),
            'hora17' => array_reverse($day17),
            'hora18' => array_reverse($day18),
            'hora19' => array_reverse($day19),
            'hora20' => array_reverse($day20),
            'hora21' => array_reverse($day21),
            'hora22' => array_reverse($day22),
            'hora23' => array_reverse($day23),
        ];
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
