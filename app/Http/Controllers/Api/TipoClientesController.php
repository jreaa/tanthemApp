<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\TipoClientesRequest;
use App\Http\Resources\ClienteResource;
use App\Http\Resources\TipoClientesResource;
use App\Models\EstudioUsuarios;
use App\Models\TipoClientes;
use Illuminate\Http\Request;

class TipoClientesController extends Controller
{
    public function index()
    {
        $paginate = request('paginate', 10);
        $search = request('q', '');
        $sort = request('sort', 'asc');
        $table = request('table','name');

        $cliente = TipoClientes::select()->search($search)->orderBy($table, $sort)->paginate($paginate);
        
        return TipoClientesResource::collection($cliente);

    }

    public function store(TipoClientesRequest $request)
    {
        $cliente = TipoClientes::create($request->validated());
        $estudioUsuario = EstudioUsuarios::create([
            'id_user' => request('id_usuario'),
            'modificacion' => "Ingreso de tipo de clientes"
        ]);
        return new TipoClientesResource($cliente);

    }
    public function show($id)
    {
        $cliente = TipoClientes::where('id', $id)->get();
        return new TipoClientesResource($cliente[0]);
    }

    public function update($id, TipoClientesRequest $request)
    {
        $cliente = TipoClientes::where('id', $id)->update($request->validated());
        $estudioUsuario = EstudioUsuarios::create([
            'id_user' => request('id_usuario'),
            'modificacion' => "Actualizacion de tipo de clientes"
        ]);
        //return new TipoClientesResource($cliente);
    }
    
    public function destroy($id)
    {
        TipoClientes::where('id', $id)->delete();
        $estudioUsuario = EstudioUsuarios::create([
            'id_user' => request('id_usuario'),
            'modificacion' => "Eliminacion de tipo de clientes"
        ]);
        return response()->noContent();
    }

}
