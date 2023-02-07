<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\EstadosProyectos;
use App\Http\Requests\EstadosProyectosRequest;
use App\Http\Resources\EstadosProyectosResource;
use App\Models\EstudioEstados;
use App\Models\Plantillas\Cotizaciones;

class EstadosProyectosController extends Controller
{
    public function index()
    {
        $paginate = request('paginate', 10);
        $search = request('q', '');
        $sort = request('sort', 'asc');
        $table = request('table','name');

        $estado = EstadosProyectos::select()->search($search)->orderBy($table, $sort)->paginate($paginate);
        
        return EstadosProyectosResource::collection($estado);

    }

    public function store(EstadosProyectosRequest $request)
    {
        $estado = EstadosProyectos::create($request->validated());
        return new EstadosProyectosResource($estado);

    }
    public function show($id)
    {
        $estado = EstadosProyectos::where('id', $id)->get();
        return new EstadosProyectosResource($estado[0]);
    }

    public function update($id, EstadosProyectosRequest $request)
    {
        EstadosProyectos::where('id', $id)->update($request->validated());
    }
    
    public function destroy($id)
    {
        EstadosProyectos::where('id', $id)->delete();

        $proyectos = Cotizaciones::select()->where("estado", "=", $id)->get();


        DB::table("cotizaciones")->where("estado", "=", $id)->update([
            "estado" => 1
        ]);

        for ($i=0; $i < sizeof($proyectos) ; $i++) { 
            $date = date('Y-m-d');

            $estudioEstado = EstudioEstados::where('id_cliente', $proyectos[$i]->id)->where('date', $date)->get();
    
            if(sizeof($estudioEstado) > 0) {
                EstudioEstados::where('id', $estudioEstado[0]->id)->delete();
            } 
    
            EstudioEstados::create([
                'id_estado'  => 1,
                'id_cliente' => $proyectos[$i]->id,
                'date'       => $date
            ]);
    
        }
        
        return response()->noContent();
    }
}
