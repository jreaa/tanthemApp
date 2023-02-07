<?php

namespace App\Http\Controllers\Api;

use App\Models\Costeo;
use App\Http\Controllers\Controller;
use App\Http\Requests\CosteoRequest;
use App\Http\Resources\CosteoResource;
use Illuminate\Http\Request;

class CosteoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
            $costeo = Costeo::select('costeo.*',
                'estados_costos.name as estadoname', 'estados_costos.color as estadocolor','estados_costos.colorFont as estadocolorfont', 'proyectos.name as nombreProyecto', 
                'proyectos.description as descriptionProyecto' )
                ->where("costeo.id_proyecto", request('id_proyecto'))
                ->join('estados_costos', 'estados_costos.id', '=', 'costeo.status')
                ->join('proyectos', 'proyectos.id', '=','costeo.id_proyecto')
                ->get();
            //dd($costeo);

            $data = [
                'data' => $costeo
            ];
            return $data;
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
    public function store(CosteoRequest $request)
    {
        
        $costeo = Costeo::create($request->validated());
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id, Request $request)
    {
 
  
        if(isset($request->id_proyecto)){
            $costeo = Costeo::where("id_leaf", $id)->where('id_proyecto',$request->id_proyecto)->get();

            $data = [
                'data' => $costeo
            ];
            return json_encode($data);
        }else{
            $costeo = Costeo::select('costeo.*', 'sub_procesos_costos.id_proceso_costos as id_proceso')->where('costeo.id', $id)
            ->join('sub_procesos_costos', 'sub_procesos_costos.id', '=', 'costeo.id_leaf')
            ->get();
            return CosteoResource::collection($costeo);
        }
    }

    public function updatePendientes(Request $request)
    {
        Costeo::where('id', $request->id)->update([
            'pendiente' => $request->pendiente
        ]);
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
    public function update($id,CosteoRequest $request)
    {
        $costeo = Costeo::where('id', $id)->update($request->validated());
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Costeo $costeo)
    {
        $costeo->delete();
        return response()->noContent();
    }

    public function getSumAll($id,Request $request){
        if($request->id_leaf){
            $costeo = Costeo::where("id_leaf", $request->id_leaf)->where('id_proyecto',$id)->get();
            $sum = 0;

            foreach($costeo as $costo){
                if($costo->id_type == 1){
                    $sum = $sum + (int) $costo->value;
                }elseif($costo->id_type == 2){
                    $sum = $sum + 0;
                }elseif($costo->id_type == 3){
                    $sum = $sum - (int) $costo->value;
                }
            }

            return $sum;
        }else{
            $costeo = Costeo::where('id_proyecto',$id)->get();
            $leaf_arr = [];
            foreach($costeo as $costo){
                if(!in_array($costo->id_leaf, $leaf_arr)){
                    array_push($leaf_arr, $costo->id_leaf);
                }
            }
            return $leaf_arr;
        }
    }
}
