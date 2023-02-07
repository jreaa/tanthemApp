<?php

namespace App\Http\Controllers\Api;
use App\Models\TiposIngresos;
use App\Http\Requests\TiposIngresosRequest;
use App\Http\Resources\TiposIngresosResource;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class TiposIngresosController extends Controller
{
    public function index()
    {
        $paginate = request('paginate', 10);
        $search = request('q', '');
        $sort = request('sort', 'asc');
        $table = request('table','name');

        $cliente = TiposIngresos::select()->search($search)->orderBy($table, $sort)->paginate($paginate);
        
        return TiposIngresosResource::collection($cliente);

    }

    public function store(TiposIngresosRequest $request)
    {
        $cliente = TiposIngresos::create($request->validated());
        return new TiposIngresosResource($cliente);

    }
    public function show($id)
    {
        $cliente = TiposIngresos::where('id', $id)->get();
        return new TiposIngresosResource($cliente[0]);
    }

    public function update($id, TiposIngresosRequest $request)
    {
        $cliente = TiposIngresos::where('id', $id)->update($request->validated());
        //return new TipoClientesResource($cliente);
    }
    
    public function destroy($id)
    {
        TiposIngresos::where('id', $id)->delete();
        return response()->noContent();
    }
}
