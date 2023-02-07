<?php

namespace App\Http\Controllers\Api;

use App\EstadosCostos;
use App\Http\Controllers\Controller;
use App\Http\Requests\EstadoRequest;
use App\Http\Resources\EstadoResource;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class EstadosCostosController extends Controller
{
    public function index()
    {
        $paginate = request('paginate', 10);
        $search = request('q', '');
        $sort = request('sort', 'asc');
        $table = request('table','name');

        $cliente = EstadosCostos::select()->search($search)->orderBy($table, $sort)->paginate($paginate);
        
        return EstadoResource::collection($cliente);

    }

    public function store(EstadoRequest $request)
    {
        $cliente = EstadosCostos::create($request->validated());
        return new EstadoResource($cliente);

    }
    public function show($id)
    {
        $cliente = EstadosCostos::where('id', $id)->get();
        return new EstadoResource($cliente[0]);
    }

    public function update($id, EstadoRequest $request)
    {
        $cliente = EstadosCostos::where('id', $id)->update($request->validated());
        //return new TipoClientesResource($cliente);
    }
    
    public function destroy($id)
    {
        EstadosCostos::where('id', $id)->delete();

        DB::table("clientes")->where("estado", "=", $id)->update([
            "estado" => 1
        ]);
        return response()->noContent();
    }
}
