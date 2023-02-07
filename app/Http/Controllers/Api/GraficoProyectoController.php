<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class GraficoProyectoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $dates = [];
        $ingreso = [];
        $pagos = [];
        $costos = [];

        $id_leaf = request('id_leaf');
        $id_proyecto = request('id_proyecto');
        $consulta = DB::select("SELECT c.id_type as 'tipo', c.value as 'monto', DATE_FORMAT(c.date, '%Y-%m-%d') AS 'fecha' FROM costeo c WHERE c.id_proyecto = $id_proyecto and c.id_leaf = $id_leaf GROUP by c.id order by c.date ASC;");
        foreach($consulta as $c) {
            if(!in_array($c->fecha,$dates)){
                array_push($dates, $c->fecha);
            }
            if($c->tipo == 1){
                array_push($ingreso, $c->monto);
            }else if($c->tipo == 2){
                array_push($pagos, $c->monto);
            }else if($c->tipo == 3){
                array_push($costos, $c->monto);
            }
        }
        return [
            'fechas' => $dates,
            'ingresos' => $ingreso,
            'pagos' => $pagos,
            'costos' => $costos
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
