<?php

namespace App\Http\Controllers\Api;

use App\Estados;
use App\Models\EstudioUsuarios;
use App\Http\Controllers\Controller;
use App\Http\Requests\EstadoRequest;
use App\Http\Resources\EstadoResource;
use App\Models\Clientes;
use App\Models\EstudioEstados;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class EstadoController extends Controller
{
    public function index()
    {
        $paginate = request('paginate', 10);
        $search = request('q', '');
        $sort = request('sort', 'asc');
        $table = request('table','name');

        $cliente = Estados::select()->search($search)->orderBy($table, $sort)->paginate($paginate);
        
        return EstadoResource::collection($cliente);

    }

    public function store(EstadoRequest $request)
    {
        $cliente = Estados::create($request->validated());
        $estudioUsuario = EstudioUsuarios::create([
            'id_user' => request('id_usuario'),
            'modificacion' => "Ingreso de estado"
        ]);
        return new EstadoResource($cliente);

    }
    public function show($id)
    {
        $cliente = Estados::where('id', $id)->get();
        return new EstadoResource($cliente[0]);
    }

    public function update($id, EstadoRequest $request)
    {
        $cliente = Estados::where('id', $id)->update($request->validated());
        $estudioUsuario = EstudioUsuarios::create([
            'id_user' => request('id_usuario'),
            'modificacion' => "Modificacion de estado"
        ]);
        //return new TipoClientesResource($cliente);
    }
    
    public function destroy($id)
    {
        Estados::where('id', $id)->delete();
        $estudioUsuario = EstudioUsuarios::create([
            'id_user' => request('id_usuario'),
            'modificacion' => "Eliminacion de estados"
        ]);

        DB::table("clientes")->where("estado", "=", $id)->update([
            "estado" => 1
        ]);

        return response()->noContent();
    }
}
