<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\TipoRubro;
use App\Http\Resources\TipoRubroResource;
use App\Http\Requests\TipoRubroRequest;
use App\Models\EstudioUsuarios;

class TipoRubroController extends Controller
{
    public function index()
    {
        $paginate = request('paginate', 10);
        $search = request('q', '');
        $sort = request('sort', 'asc');
        $table = request('table','name');

        $cliente = TipoRubro::select()->search($search)->orderBy($table, $sort)->paginate($paginate);
        
        return TipoRubroResource::collection($cliente);

    }

    public function store(TipoRubroRequest $request)
    {
        $cliente = TipoRubro::create($request->validated());
        $estudioUsuario = EstudioUsuarios::create([
            'id_user' => request('id_usuario'),
            'modificacion' => "Ingreso de tipo de rubro"
        ]);
        return new TipoRubroResource($cliente);

    }
    public function show($id)
    {
        $cliente = TipoRubro::where('id', $id)->get();
        return new TipoRubroResource($cliente[0]);
    }

    public function update($id, TipoRubroRequest $request)
    {
        $cliente = TipoRubro::where('id', $id)->update($request->validated());
        $estudioUsuario = EstudioUsuarios::create([
            'id_user' => request('id_usuario'),
            'modificacion' => "Actualizacion de tipo de rubro"
        ]);
        //return new TipoClientesResource($cliente);
    }
    
    public function destroy($id)
    {
        TipoRubro::where('id', $id)->delete();
        $estudioUsuario = EstudioUsuarios::create([
            'id_user' => request('id_usuario'),
            'modificacion' => "Eliminacion de tipo de rubro"
        ]);
        return response()->noContent();
    }
}
