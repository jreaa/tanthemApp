<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Liquidacion;
use App\Models\LiquidacionBody;
use App\Http\Requests\LiquidacionRequest;
use App\Http\Resources\LiquidacionResource;

class LiquidacionController extends Controller
{
        /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $paginate = request('paginate', 10);
        $search = request('q', '');
        $sort = request('sort', 'asc');
        $table = request('table','name');

        $liquidacion = Liquidacion::select('liquidaciones.*',"trabajadores.name as nameCliente", "trabajadores.phone as phoneClientes")
        ->join('trabajadores', 'trabajadores.id', 'liquidaciones.id_trabajador')
        ->search($search)
        ->orderBy($table, $sort)
        ->paginate($paginate);
        return LiquidacionResource::collection($liquidacion);

    }

    public function getBody($id)
    {
        $liquidacionBody = LiquidacionBody::select('liquidacion_body.*', 'trabajadores.name as trabajador_name', 'trabajadores.rut as trabajador_rut')
            ->join('liquidaciones', 'liquidaciones.id_body', 'liquidacion_body.id' )
            ->join('trabajadores', 'trabajadores.id', 'liquidaciones.id_trabajador')
            ->where('liquidacion_body.id',$id)                       
            ->get();
        return $liquidacionBody; 
    }

    public function storeBody(Request $request)
    {
        $array = [];
        array_push($array,$request->body);
        LiquidacionBody::where('id', request('id'))->update([
            'bodyCotizaciones' => json_encode($array)
        ]);
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
        $liquidacionBody = LiquidacionBody::create();
        
        $liquidacion = Liquidacion::create([
            'id_body' => $liquidacionBody->id,
            'description' => $request->description,
            'fecha' => $request->fecha,
            'id_trabajador' => $request->id_trabajador['code']
        ]);
        
        return new LiquidacionResource($liquidacion);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $liquidaciones = Liquidacion::select("liquidaciones.*" ,"trabajadores.name as nameCliente", "trabajadores.phone as phoneClientes")
        ->join('trabajadores', 'trabajadores.id', 'liquidaciones.id_trabajador')->where('liquidaciones.id', $id)->get();
        return new LiquidacionResource($liquidaciones[0]);
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
    public function update($id, LiquidacionRequest $request)
    {
        $liquidacion = Liquidacion::where('id', $id)->update($request->validated());
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Liquidacion::where('id', $id)->delete();
        return response()->noContent();
    }
}