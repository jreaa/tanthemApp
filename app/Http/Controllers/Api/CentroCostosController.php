<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use App\Models\CentrosCostos;
use App\Models\EstudioUsuarios;
use App\Http\Requests\CentrosCostosRequest;
use App\Http\Resources\CentrosCostosResource;
use App\Models\ProcesoCostos;

class CentroCostosController extends Controller
{
    public function index()
    {
        $paginate = request('paginate', 10);
        $search = request('q', '');
        $sort = request('sort', 'asc');
        $table = request('table','name');

        $id_proceso = request('id_proceso');
        $id_proyecto = request('id_proyecto');

        if(!isset($id_proceso)) {
            $centroCosto = CentrosCostos::select()->search($search)->orderBy($table, $sort)->paginate($paginate);
        } else {
            $sql = "SELECT sc.*, pc.name as 'costo_nombre', 
            IFNULL((SELECT SUM(c.value) from costeo c where c.id_leaf = sc.id and c.pendiente = 0 and id_proyecto = $id_proyecto), 0) 
            as 'total_monto', 
            IFNULL((SELECT SUM(c.value) from costeo c where c.id_leaf = sc.id and c.pendiente = 1 and id_proyecto = $id_proyecto), 0) 
            as 'total_monto_pendiente', 
            (SELECT COUNT(id) from costeo c where c.id_leaf = sc.id and c.pendiente = 1 ) 
            as 'total_pendientes' FROM centro_costos sc 
            JOIN procesos_costos pc on pc.name = sc.id_proceso 
            where pc.id = $id_proceso";

            $centroCosto = DB::select($sql);

            return response()->json(['centro_costos' => $centroCosto],200);
        }

        return CentrosCostosResource::collection($centroCosto);

    }

    public function store(CentrosCostosRequest $request)
    {
        $cliente = CentrosCostos::create($request->validated());
        return new CentrosCostosResource($cliente);

    }
    public function show($id)
    {
        $cliente = CentrosCostos::where('id', $id)->get();
        return new CentrosCostosResource($cliente[0]);
    }

    public function update($id, CentrosCostosRequest $request)
    {
        $cliente = CentrosCostos::where('id', $id)->update($request->validated());

        //return new TipoClientesResource($cliente);
    }
    
    public function destroy($id)
    {
        CentrosCostos::where('id', $id)->delete();

        $proceso = CentrosCostos::select()
                    ->where("id_proceso", request('proceso'))
                    ->where('name', 'Sin Estado')
                    ->get();


        DB::table("costeo")
            ->where("id_leaf", "=", $id)
            ->update([
                "id_leaf" => $proceso[0]->id
            ]);

        return response()->noContent();
    }
}
