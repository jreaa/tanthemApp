<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\SubProcesoCostos;
use App\Http\Requests\SubProcesoCostosRequest;
use Illuminate\Support\Facades\DB;

class SubProcesoCostosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getProcesos() 
    {
        
        $id_proyecto = request('id_proyecto');
        $sql = "SELECT pc.*, IFNULL((SELECT SUM(c.value) from costeo c 
        where c.id_leaf = cc.id and c.pendiente = 0 and id_proyecto = $id_proyecto),0) as 'total', 
        IFNULL((SELECT COUNT(c.id) from costeo c where c.id_leaf = cc.id and id_proyecto = $id_proyecto),0) 'total_pendientes' 
        FROM procesos_costos pc JOIN centro_costos cc on cc.id_proceso = pc.name GROUP by pc.id;";

        $procesos = DB::select($sql);

        return ['procesos' => $procesos];
    }

    public function getProceso($id) 
    {
        
        $proceso = DB::table('procesos_costos')->where('id', $id)->get();

        return ['proceso' => $proceso];
    }
    
    public function index()
    {
        if(request('id_proceso')){
            $id_proceso = request('id_proceso');
            $id_proyecto = request('id_proyecto');
            $sql = "SELECT sc.*, pc.name as 'costo_nombre', 
            IFNULL((SELECT SUM(c.value) from costeo c where c.id_leaf = sc.id and c.pendiente = 0 and id_proyecto = $id_proyecto), 0) 
            as 'total_monto', 
            IFNULL((SELECT SUM(c.value) from costeo c where c.id_leaf = sc.id and c.pendiente = 1 and id_proyecto = $id_proyecto), 0) 
            as 'total_monto_pendiente', 
            (SELECT COUNT(id) from costeo c where c.id_leaf = sc.id and c.pendiente = 1 ) 
            as 'total_pendientes' FROM sub_procesos_costos sc JOIN procesos_costos pc on pc.id = sc.id_proceso_costos 
            where sc.id_proceso_costos = $id_proceso
            and sc.id_proyecto = $id_proyecto
            ";
            $subProcesoCostos = DB::select($sql);


        } else {
            $subProcesoCostos = SubProcesoCostos::select('sub_procesos_costos.*')
            ->get();
        }

        return ['sub_procesos' => $subProcesoCostos];
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
    public function store(SubProcesoCostosRequest $request)
    {
        try {
            $subProcesoCostos = SubProcesoCostos::create($request->validated());
            return response()->json(['message' => 'sub proceso creado correctamente', 
            'status' => 'error']);
        }catch(PDOException $e) {
            return response()->json(['message' => $e, 'status' => 'error']);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

        if($subProcesoCostos = SubProcesoCostos::findOrFail($id)){
            return ['sub_procesos' => $subProcesoCostos];
        } else {
            return response()->json(['message' => 'Sub proceso no encontrado', 'status' => 'error']);
        }
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
    public function update(SubProcesoCostosRequest $request, $id)
    {
        if($subProcesoCostos = SubProcesoCostos::findOrFail($id)){
            try {
                $subProcesoCostos->update($request->validated());
                return response()->json(['message' => 'sub proceso creado correctamente', 
                'status' => 'error']);
            }catch(PDOException $e) {
                return response()->json(['message' => $e, 'status' => 'error']);
            }
        } else {
            return response()->json(['message' => $e, 'Sub proceso no encontrado' => 'error']);
        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if($subProcesoCostos = SubProcesoCostos::findOrFail($id)){
            $subProcesoCostos->delete();
        } else {
            return response()->json(['message' => 'Sub proceso no encontrado', 'status' => 'error']);
        }
    }
}
